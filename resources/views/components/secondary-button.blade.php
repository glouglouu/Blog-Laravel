<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn-minimal']) }}>
    {{ $slot }}
</button>
