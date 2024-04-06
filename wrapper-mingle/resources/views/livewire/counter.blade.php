<div class="m-10">

    <div class="text-lg">
        Counter Component with Livewire
    </div>

    <div class="mt-8">
        Initial message: {{ $message }}
    </div>

    <div class="mt-8"></div>

    <div> Livewire (Interacts with server)</div>
    <div class="mt-2 flex gap-4 items-center">
        <x-button wire:click="increment(-1)">Decrement -</x-button>
        <div> Current Count: {{ $count }} </div>
        <x-button wire:click="increment()">Increment +</x-button>
    </div>

    <div class="mt-16"></div>

    <div> AlpineJS - included in Livewire (Browser only)</div>
    <div
        x-data="{
           count: 0
       }"
        class="mt-2 flex gap-4 items-center">
        <x-button x-on:click="count--">Decrement -</x-button>
        <div> Current Count: <span x-text="count"/> </div>
        <x-button x-on:click="count++">Increment +</x-button>
    </div>
</div>
