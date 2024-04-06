<div class="m-10">

    <div class="text-lg">
        Counter Component
    </div>

    <div class="mt-8 flex gap-4 items-center">

        <button type="button"
                class="rounded bg-white px-2 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                wire:click="increment(-1)"
        >
            Decrement -
        </button>

        <div>
            Current Count: {{ $count }}
        </div>

        <button type="button"
                class="rounded bg-white px-2 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
            wire:click="increment"
        >
            Increment +
        </button>
    </div>
</div>
