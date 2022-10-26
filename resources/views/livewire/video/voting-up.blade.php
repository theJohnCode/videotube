<div class="d-flex">
    {{-- The whole world belongs to you. --}}
    <i wire:click='like' class={{ $likesActive ? "material-icons" : "material-symbols-outlined"}}>thumb_up 
    </i>
    <p>{{ $likes }}</p>
</div>
