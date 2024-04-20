@extends('layouts.app')

@section('content')
    <div class="flex flex-col min-h-screen items-center justify-center">
        <h1 class="text-2xl font-bold mb-4">
            MingleJS Demo
        </h1>

        <x-navigation />

        <div class="max-w-lg text-balance text-center pt-16">
            <p>
                While the most common use case for MingleJS is certainly not to have Livewire, Vue and React components on the same page...
            </p>
            <p class="mt-8">
                It's certainly possible to do so!
            </p>
        </div>

        <div class="mt-20 bg-white shadow rounded-lg">
            @livewire(\App\Livewire\LivewireCounter::class)
        </div>

        <div class="mt-20 bg-white shadow rounded-lg">
            @livewire(\App\Livewire\ReactCounter::class)
        </div>


        <div class="mt-20 bg-white shadow rounded-lg">
            @livewire(\App\Livewire\VueCounter::class)
        </div>

    </div>
@endsection
