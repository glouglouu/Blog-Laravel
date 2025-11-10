<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 text-sm font-medium text-white bg-red-600 border border-red-600 rounded-md transition-colors hover:bg-red-700']) }}>
    {{ $slot }}
</button>
