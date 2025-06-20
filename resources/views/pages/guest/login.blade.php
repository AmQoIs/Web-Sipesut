<x-guest-layout>

    <div class="mt-[3em] md:mt-[4em] flex justify-center items-center bg-white">
        <!-- Main Content -->
        <div class="flex-grow flex px-8 w-full max-w-6xl relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
                <div class="flex flex-col mt-[3em]">
                    <div class="flex flex-col items-center -mt-[2em] mb-[2em] md:hidden">
                        <img src="/image/logo.png" width="100" alt="Logo">
                        <p class="text-lg font-extrabold text-black text-center">Sistem Informasi Pengelolaan Surat <span
                                class="block">(SIPESUT)</span></p>
                        <p class="text-md text-black font-extrabold text-center">Inspektorat Jenderal TNI Republik
                            Indonesia</p>
                    </div>



                    <h1 class="text-2xl font-bold uppercase mb-6 md:mb-[95px] hidden md:flex">Selamat Datang!</h1>

                    <div class="w-full md:w-3/4">

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Username')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="email"
                                    placeholder="user@example.com" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                @if (session('fail'))
                                    <p class="text-red-400 text-sm mt-1">{{ session('fail') }}</p>
                                @endif
                            </div>

                            <!-- Password -->
                            <div class="mb-6 relative" x-data="{ show: false }">
                                <x-input-label class="block my-2 text-sm text-gray-600" for="email" :value="__('Password')" />

                                <div class="relative">
                                    <input :type="show ? 'text' : 'password'" id="password" name="password"
                                        class="w-full border-primary focus:border-primary focus:ring-[#E6694E] rounded-full shadow-sm text-primary bg-white"
                                        required>
                                    <button type="button" @click="show = !show" class="absolute top-2 right-5 w-[1.5em] text-primary">
                                        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                        </svg>
                                        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                            <path d="M1.324 11.447C2.81 6.976 7.028 3.75 12 3.75c4.97 0 9.186 3.223 10.675 7.69.12.361.12.75 0 1.112-1.488 4.47-5.705 7.696-10.675 7.696-4.97 0-9.186-3.222-10.676-7.69a1.764 1.764 0 0 1 0-1.112Zm9.476 1.893a3.752 3.752 0 1 0 5.304-5.304l-5.304 5.304Zm6.268-6.268a5.252 5.252 0 0 1-7.421 7.421l-3.6 3.601a.75.75 0 0 1-1.061-1.06l3.6-3.602a5.252 5.252 0 0 1 7.421-7.421l3.6-3.601a.75.75 0 0 1 1.06 1.06l-3.6 3.601Z"/>
                                        </svg>
                                    </button>
                                </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    @if (session('wrongpassword'))
                                        <p class="text-red-400 mt-1 text-sm">{{ session('wrongpassword') }}</p>
                                    @endif
                            </div>

                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded shadow-sm" name="remember">
                                    <span class="ms-2 text-sm text-[#444B59]">{{ __('Remember me') }}</span>
                                </label>
                            </div>


                            <div class="flex items-center mt-[55px]">
                                <button class="bg-[#E96E53] rounded-full w-full text-white font-bold py-[12px] px-[16px] shadow-[inset_0px_2px_4px_0px_#fff,inset_0px_-2px_4px_0px_#fff,0px_-2px_16px_0px_#fff,0px_2px_16px_0px_#fff] duration-200 hover:translate-y-[5%] active:translate-y-[7%] active:shadow-[inset_0px_-2px_4px_0px_#fff,inset_0px_2px_4px_0px_#fff,0px_2px_16px_0px_#e8c8b0,0px_2px_16px_0px_#fff]" type="submit">
                                    Log in
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!-- Logo -->
                <div class="hidden md:flex md:flex-col items-center mt-10 justify-center">
                    <img src="/image/logo.png" class="flex mx-auto" width="250" alt="Logo">
                    <div class="mt-2">
                        <p class="text-2xl font-extrabold text-black text-center">Sistem Informasi Pengelolaan Surat
                            <span class="block">(SIPESUT)</span></p>
                        <p class="text-lg text-black font-extrabold text-center">Inspektorat Jenderal TNI Republik
                            Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
