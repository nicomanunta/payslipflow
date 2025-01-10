@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 roboto-regular medium-grey text-shadow-blue']) }}>
    {{ $value ?? $slot }}
</label>
