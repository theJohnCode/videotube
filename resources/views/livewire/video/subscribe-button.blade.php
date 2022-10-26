<div>
    <button wire:click='subscribe' class="btn btn-{{ $subscribed ? 'light' : 'danger' }} btn-sm">{{ $subscribed ? 'UNSUBSCRIBE' : 'SUBSCRIBE' }}</button>
</div>
