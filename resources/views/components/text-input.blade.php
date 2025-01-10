@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 border-steel-blue   rounded-md shadow-sm']) }}>
