@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border border-gray-300 rounded-md px-3 py-2 focus:border-gray-900 focus:ring-0 transition-colors']) }}>
