@extends('layouts.app')

@section('content')
    <div class="flex flex-col min-h-screen items-center justify-center">
        <h1 class="text-2xl font-bold mb-4">
            MingleJS Demo
        </h1>

        <x-navigation />

        <div class="mt-20 bg-white shadow rounded-lg">
            @livewire(\App\Livewire\LivewireCounter::class)
        </div>
    </div>
@endsection
