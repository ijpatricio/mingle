@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Demo with Livewire</h1>
        <p class="mb-4">This is a demo of a simple counter component built with Livewire.</p>
        <div class="flex items">
        </div>
        <livewire:counter />
    </div>
@endsection
