@push(config('mingle.stack'))
    @vite($this->component())
@endpush

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
                data-mingle-boot="{{ json_encode($this->mingleBoot(collect())) }}"
                data-mingle-data="{{ json_encode($this->mingleData(collect())) }}"
        ></div>
    </div>
</div>
