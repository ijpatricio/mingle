<div class="m-10">

    <div class="text-lg">
        Counter component with Livewire
    </div>

    <div class="mt-8">
        Initial message: {{ $message }}
    </div>

    <div class="mt-8"></div>

    <div> Livewire (Interacts with server)</div>
    <div class="mt-2 flex gap-4 items-center">
        <x-button wire:click="keepIt" label="Keep it (reset)" />
        <div> Current Count: {{ $count }} </div>
        <x-button wire:click="doubleIt" label="Double it - and give it to the next person" />
    </div>

    <div class="mt-12"></div>

    <div> AlpineJS - included in Livewire (Browser only)</div>
    <div
        x-data="{
           count: 1
       }"
        class="mt-2 flex gap-4 items-center">
        <x-button x-on:click="count = 1" label="Keep it (reset)" />
        <div> Current Count: <span x-text="count"/> </div>
        <x-button x-on:click="count *= 2" label="Double it - and give it to the next person" />
    </div>
</div>
