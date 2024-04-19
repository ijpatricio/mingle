<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Process;

test('Creates Mingle React in a jsfile', function () {

    // Arrange
    $files = collect([
        base_path('app/Livewire/Example.php'),
        base_path('resources/js/Example.js'),
        base_path('resources/js/Example.jsx'),
    ]);

    File::delete($files->toArray());

    // Act
    $result = Process::run('php artisan make:mingle react Example --jsfile=resources/js/Example.js');

    $files->each(function ($file) {
        expect(File::exists($file))->toBeTrue("File $file was not created.");
    });

    expect($result->successful())->toBeTrue();

    File::delete($files->toArray());
});

test('Creates Mingle React in a folder with a index.js', function () {

    // Arrange
    $files = collect([
        base_path('app/Livewire/Example.php'),
        base_path('resources/js/Example/index.js'),
        base_path('resources/js/Example/Example.jsx'),
    ]);

    File::delete($files->toArray());

    // Act
    $result = Process::run('php artisan make:mingle react Example --jsfile=resources/js/Example/index.js');

    $files->each(function ($file) {
        expect(File::exists($file))->toBeTrue("File $file was not created.");
    });

    expect($result->successful())->toBeTrue();

    File::delete($files->toArray());
});

test('Creates Mingle Vue in a folder with a index.js', function () {

    // Arrange
    $files = collect([
        base_path('app/Livewire/Example.php'),
        base_path('resources/js/Example/index.js'),
        base_path('resources/js/Example/Example.vue'),
    ]);

    File::delete($files->toArray());

    // Act
    $result = Process::run('php artisan make:mingle vue Example --jsfile=resources/js/Example/index.js');

    $files->each(function ($file) {
        expect(File::exists($file))->toBeTrue("File $file was not created.");
    });

    expect($result->successful())->toBeTrue();

    File::delete($files->toArray());
});

test('Creates Mingle Vue in a jsfile', function () {

    // Arrange
    $files = collect([
        base_path('app/Livewire/Example.php'),
        base_path('resources/js/Example.js'),
        base_path('resources/js/Example.vue'),
    ]);

    File::delete($files->toArray());

    // Act
    $result = Process::run('php artisan make:mingle vue Example --jsfile=resources/js/Example.js');

    $files->each(function ($file) {
        expect(File::exists($file))->toBeTrue("File $file was not created.");
    });

    expect($result->successful())->toBeTrue();

    File::delete($files->toArray());
});
