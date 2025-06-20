@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-md text-[#444B59]']) }}>
    {{ $value ?? $slot }}
</label>
