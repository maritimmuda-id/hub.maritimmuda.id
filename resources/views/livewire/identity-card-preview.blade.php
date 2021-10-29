<img
    @if ($user->isProcessingIdentityCard())
        wire:poll
    @endif
    src="{{ $user->identity_card_link }}"
    @foreach ($attributes as $key => $value)
        {!! "{$key}=\"{$value}\"" !!}
    @endforeach
>
