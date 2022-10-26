<div class="d-flex">
    {{-- Do your work, then step back. --}}
    <i wire:click='dislike' class={{ $dislikesActive ? "material-icons" : "material-symbols-outlined"}}>thumb_down 
    </i>
    <p>{{ $dislikes }}</p>
</div>
