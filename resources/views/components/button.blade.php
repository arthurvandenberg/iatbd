<button {{ $attributes->merge(['type' => 'submit', 'class' => 'auth__button', 'onClick' => 'return confirm(\'Weet je het zeker?\')']) }}>
    {{ $slot }}
</button>
