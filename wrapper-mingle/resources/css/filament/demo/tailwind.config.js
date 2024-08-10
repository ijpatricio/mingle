import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/**/*.php',
        './resources/views/**/*.{php, js, jsx, ts, tsx, vue, blade.php}',
        './vendor/filament/**/*.blade.php',
        './storage/framework/views/*.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
    ],
}
