@extends('layouts.app')

@section('content')
    <div class="flex flex-col min-h-screen items-center justify-center">
        <h1 class="text-2xl font-bold mb-4">
            MingleJS Demo
        </h1>

        <x-navigation />

        <h1 class="mt-20 text-lg font-bold mb-4">Demo with Livewire</h1>
        @livewire(\App\Livewire\LivewireCounter::class)
    </div>
@endsection
