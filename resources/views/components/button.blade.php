<button {{ $attributes->merge(['type' => 'submit', 'class' => 'auth__button']) }}>
    {{ $slot }}
</button>
