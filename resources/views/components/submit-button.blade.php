@props(['value'])

<div class="flex items-center">
    <button id="submit"
        class="bg-[#E96E53] rounded-full w-max text-white font-bold py-[12px] px-8 block mx-auto shadow-[inset_0px_2px_4px_0px_#fff,inset_0px_-2px_4px_0px_#fff,0px_-2px_16px_0px_#fff,0px_2px_16px_0px_#fff] duration-200 hover:translate-y-[5%] active:translate-y-[7%] active:shadow-[inset_0px_-2px_4px_0px_#fff,inset_0px_2px_4px_0px_#fff,0px_2px_16px_0px_#e8c8b0,0px_2px_16px_0px_#fff]">
        {{ $value ?? $slot }}
    </button>
</div>
