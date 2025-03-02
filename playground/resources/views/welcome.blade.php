@extends('layouts.app')

@section('content')
    <div
        class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]"
    >
        <div
            class="flex flex-col gap-4 w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0"
        >
            <h1 class="mb-1 dark:text-white font-medium text-3xl">
                Welcome to
                <span
                    class="title-gradient-text font-black text-transparent
                            bg-clip-text bg-gradient-to-b
                            from-indigo-700 to-pink-400
                            dark:from-indigo-500 dark:to-pink-500"
                >
                          Mingle JS
                        </span>
            </h1>
            <main class="flex flex-col gap-4 w-full max-w-2xl">
                @foreach($showcases as $showcase)
                    <x-showcase :$showcase />
                @endforeach
            </main>
        </div>
    </div>
@endsection
