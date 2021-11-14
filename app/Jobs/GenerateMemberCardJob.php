<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Membership;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Spatie\Browsershot\Browsershot;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use Spatie\TemporaryDirectory\TemporaryDirectory;
use Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot;

class GenerateMemberCardJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected TemporaryDirectory $temporaryDirectory;

    public $timeout = 120;

    public function __construct(
        protected User $user,
    ) {
        $this->temporaryDirectory = (new TemporaryDirectory())->create();
    }

    public function handle(): void
    {
        retry(
            callback: fn () => $this->capture(),
            times: 3,
            sleepMilliseconds: 1000,
            when: fn (\Exception $e) => $e instanceof CouldNotTakeBrowsershot,
        );

        $this->user->membership->addMedia($this->getPreviewPath())
            ->toMediaCollection('member-card-preview');

        $this->user->membership->addMedia($this->getDocumentPath())
            ->toMediaCollection('member-card-document');

        $this->temporaryDirectory->delete();
    }

    private function capture(): void
    {
        $this->getBrowserInstance()
            ->clip(64, 0, 663, 405)
            ->save($this->getPreviewPath());

        $this->getBrowserInstance()
            ->savePdf($this->getDocumentPath());
    }

    private function getBrowserInstance(): Browsershot
    {
        return Browsershot::url(route('profile.member-card', $this->user))
            ->waitUntilNetworkIdle()
            ->setDelay(2000);
    }

    private function getDocumentPath(): string
    {
        return $this->temporaryDirectory->path('member-card-document.pdf');
    }

    private function getPreviewPath(): string
    {
        return $this->temporaryDirectory->path('member-card-preview.jpg');
    }
}
