@props([
    'label',
])
<button type="button"
        {{ $attributes->class('rounded bg-white px-2 py-1 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50') }}
>
    {{ $label }}
</button>
