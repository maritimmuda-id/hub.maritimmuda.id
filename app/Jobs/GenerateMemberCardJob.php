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

    public function __construct(
        protected User $user,
    ) {
        $this->temporaryDirectory = (new TemporaryDirectory())->create();
    }

    public function handle()
    {
        $this->prepareMemberCardMetadata();

        $expiredDate = now()->createFromFormat('Y-m-d', '2021-12-31');

        if (now()->year > 2021) {
            $expiredDate = now()->addYear();
        }

        /** @var \App\Models\Membership $membership */
        $membership = $this->user
            ->memberships()
            ->create([
                'verified_at' => now(),
                'expired_at' => $expiredDate,
            ]);

        retry(
            callback: fn () => $this->capture(),
            times: 3,
            sleepMilliseconds: 1000,
            when: fn (\Exception $e) => $e instanceof CouldNotTakeBrowsershot,
        );

        $membership->addMedia($this->getPreviewPath())
            ->toMediaCollection('member-card-preview');

        $membership->addMedia($this->getDocumentPath())
            ->toMediaCollection('member-card-document');

        $this->temporaryDirectory->delete();
    }

    private function prepareMemberCardMetadata(): void
    {
        $attributes = [];
        $prefix = $this->user->province->code;
        $serialNumber = $this->user->serial_number;

        // TODO: Reserved for city
        $prefix .= '00';

        // Add 2 digit year format
        $prefix .= date('y');

        if (is_null($serialNumber)) {
            /** @var \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query */
            $query = User::query();

            /** @var int $lastSerialNumber */
            $lastSerialNumber = $query
                ->where('province_id', $this->user->province_id)
                ->max('serial_number');

            $serialNumber = ($lastSerialNumber + 1);

            $attributes['serial_number'] = $serialNumber;
        }

        $attributes['uid'] = $prefix . str_pad($serialNumber, 4, '0', STR_PAD_LEFT);

        $this->user
            ->fill($attributes)
            ->save(['timestamps' => false]);
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
