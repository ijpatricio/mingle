@extends('layouts.app')

@section('content')
    <div class="flex flex-col min-h-screen items-center justify-center">
        <h1 class="text-2xl font-bold mb-4">
            MingleJS Demo
        </h1>

        <p class="mb-4">
            This is a demo of a simple counter component built with MingleJS.
        </p>

        <p class="mb-4">
            It creates an "island" of interactivity within a Livewire view, making use of the $wire to easily handle server functions.
        </p>

        <p class="mb-4">
            Navigate the demo using the links below.
        </p>

        <x-navigation />
    </div>
@endsection
