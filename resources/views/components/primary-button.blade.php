<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-minimal-primary']) }}>
    {{ $slot }}
</button>
