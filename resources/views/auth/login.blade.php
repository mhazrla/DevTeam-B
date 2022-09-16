<x-guest-layout>
    <x-auth-card>
        <x-slot name="title">
            <h1 class="text-center text-xl font-semibold text-black-700 dark:text-black-200">
                Login
            </h1>
            <h1 class="text-center text-black-700 dark:text-black-200 mb-2">
                Sign in to start your session
            </h1>
        </x-slot>

        <!-- Session Status -->

        <x-auth-session-status class="mb-4" :status="session(['status'])" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <label class="block text-sm mb-4" for="email">
                <span class="text-gray-700 dark:text-gray-400">Email</span>
                <input name="email" type="text"
                    class="block w-full mt-1 text-sm rounded-md focus:border-blue-400 focus:outline-none focus:shadow-outline-yellow dark:text-black-300 dark:focus:shadow-outline-gray form-input @error('email') border-red-500 @enderror"
                    placeholder="Your email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </label>


            {{-- Password --}}
            <label class="block text-sm mb-4" for="password">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input name="password" type="password"
                    class="block w-full mt-1 text-sm rounded-md focus:border-blue-400 focus:outline-none focus:shadow-outline-yellow dark:text-black-300 dark:focus:shadow-outline-gray form-input @error('password') border-red-500 @enderror"
                    placeholder="Your password">
                @error('password')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </label>

            <!-- Remember Me -->
            <div class="block mt-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember_me" id="remember_me" class="mr-2">
                    <label for="remember_me">Remember Me</label>
                </div>
            </div>

            <button type="submit"
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue" ">
                Log in
            </button>

            <hr class="my-8" />

            <a href="#"
                class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-grey text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                <svg class="mr-4 h-5 w-5 text-red-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M17.788 5.108A9 9 0 1021 12h-8" /></svg>
                Sign in by Google
            </a>

            <p class="mt-4">
                <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline"
                    href="./forgot-password.html">
                    Forgot your password?
                </a>
            </p>
            <p class="mt-1">
                <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline"
                    href="{{ route('register') }}">
                    Create account
                </a>
            </p>
        </form>
    </x-auth-card>
</x-guest-layout>
