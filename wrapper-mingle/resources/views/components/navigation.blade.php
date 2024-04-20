@php
    $regularClasses = "font-bold text-indigo-500 hover:text-indigo-700 hover:bg-indigo-300 rounded-lg hover:shadow-lg py-2 px-4";
    $activeClasses = "text-indigo-700 underline";

    $pageNav = [
        'Home' => 'welcome',
        'Livewire' => 'demo-with-livewire',
        'React' => 'demo-with-react',
        'Vue' => 'demo-with-vue',
        'All together' => 'demo-with-all',
    ];
@endphp

<ul class="flex flex-wrap justify-center gap-4 items">
    @foreach($pageNav as $label => $routeName)
        <li>
            <a
                @class([
                    $regularClasses,
                    $activeClasses => request()->routeIs($routeName),
                ])
                href="{{ route($routeName) }}"
            >
                {{ $label }}
            </a>
        </li>
    @endforeach
</ul>
