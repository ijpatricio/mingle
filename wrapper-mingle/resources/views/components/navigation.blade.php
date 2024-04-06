<ul class="flex gap-4 items">
    <li class="font-bold hover:text-indigo-600 hover:bg-indigo-300 rounded-lg px-2 text-indigo-500">
        <a href="{{ route('welcome') }}">Home</a>
    </li>
    <li class="font-bold hover:text-indigo-600 hover:bg-indigo-300 rounded-lg px-2 text-indigo-500">
        <a href="{{ route('demo-with-livewire') }}">Livewire</a>
    </li>
    <li class="font-bold hover:text-indigo-600 hover:bg-indigo-300 rounded-lg px-2 text-indigo-500">
        <a href="{{ route('demo-with-react') }}">React</a>
    </li>
    <li class="font-bold hover:text-indigo-600 hover:bg-indigo-300 rounded-lg px-2 text-indigo-500">
        <a href="{{ route('demo-with-vue') }}">Vue</a>
    </li>
    @php
     request()->routeIs('')
    @endphp
</ul>
