@assets
    @vite($this->component())
@endassets

<div data-mingle-component="{{ $this->component() }}" data-mingle-data="{{ json_encode($this->mingleData()) }}">
    <div class="mingle-root" wire:ignore></div>
</div>
