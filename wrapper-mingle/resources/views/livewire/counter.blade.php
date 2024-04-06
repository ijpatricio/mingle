<div class="m-10">

    <div class="text-lg">
        Counter Component
    </div>

    <div class="mt-8 flex gap-4 items-center">

        <x-button wire:click="increment(-1)">
            Decrement -
        </x-button>

        <div>
            Current Count: {{ $count }}
        </div>

        <x-button wire:click="increment">
            Increment +
        </x-button>
    </div>
</div>
