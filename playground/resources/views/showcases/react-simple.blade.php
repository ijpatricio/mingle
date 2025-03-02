@extends('layouts.app')

@section('content')

    @vite([
        'resources/js/HelloWorld/index.js',
    ])

    <div
        class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]"
    >
        <livewire:hello-world />
    </div>
@endsection
