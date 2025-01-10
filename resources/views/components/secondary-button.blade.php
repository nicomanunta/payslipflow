<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn-delete border']) }}>
    {{ $slot }}
</button>
