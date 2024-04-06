@extends('layouts.app')

@section('content')
    <div class="flex flex-col min-h-screen items-center justify-center">
        <h1 class="text-2xl font-bold mb-4">
            MingleJS Demo
        </h1>

        <x-navigation />

        <div class="mt-20 p-10 bg-white shadow rounded-lg">
            <p class="mb-4">
                This is a demo of a simple counter component, built with MingleJS, on the three available frameworks: Livewire, React and Vue.
            </p>

            <p class="mb-4">
                It creates an "island" of interactivity within a Livewire view, making use of the `$wire` to easily handle server functions - magically 🪄.
            </p>

            <p class="mb-4">
                Navigate the demo using the links above.
            </p>
        </div>
    </div>
@endsection
