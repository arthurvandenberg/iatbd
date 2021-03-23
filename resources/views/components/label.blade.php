@props(['value'])

<label {{ $attributes->merge(['class' => 'auth__label']) }}>
    {{ $value ?? $slot }}
</label>
