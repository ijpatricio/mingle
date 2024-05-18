@push(config('mingle.stack'))
    @vite($this->component())
@endpush

{{-- This is the container for the Mingle component.                                     --}}
{{-- It's an Alpine component, because this it becomes seamless to hook into Livewire's --}}
{{-- event lifecycle hooks, including some that would need PR atm (wire:navigate)       --}}
<div
        x-init="
        window.Mingle.Elements['{{ $this->component() }}']
            .boot(
                '{{ $this->mingleId }}',
                '{{ $_instance->getId() }}',
            )
    "
>
    <div id="{{ $this->mingleId }}-container" wire:ignore x-ignore>
        <div
                id="{{ $this->mingleId }}"
                data-mingle-data="{{ json_encode($this->mingleData()) }}"
        ></div>
    </div>
</div>
