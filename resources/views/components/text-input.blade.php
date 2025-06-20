@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-primary bg-white']) !!}>
  

