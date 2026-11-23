@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700', 'style' => 'color: #374151 !important;']) }}>
    {{ $value ?? $slot }}
</label>
