<x-guest-layout>
    <x-auth-card>
        <x-slot name="title">
            <h1 class="text-center text-xl font-semibold text-black-700 dark:text-black-200">
                Register
            </h1>
            <h1 class="text-center text-black-700 dark:text-black-200 mb-2">
                Regist your account
            </h1>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <label class="block text-sm mb-4" for="name">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input name="name" type="text"
                    class="block w-full mt-1 text-sm rounded-md focus:border-blue-400 focus:outline-none focus:shadow-outline-yellow dark:text-black-300 dark:focus:shadow-outline-gray form-input @error('name') border-red-500 @enderror"
                    placeholder="Your name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </label>

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

            <!-- Username -->
            <label class="block text-sm  mb-4" for="username">
                <span class="text-gray-700 dark:text-gray-400">Username</span>
                <input name="username" type="text"
                    class="block w-full mt-1 text-sm rounded-md focus:border-blue-400 focus:outline-none focus:shadow-outline-yellow dark:text-black-300 dark:focus:shadow-outline-gray form-input @error('username') border-red-500 @enderror"
                    placeholder="Your username" value="{{ old('username') }}">
                @error('username')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </label>

            {{-- Password --}}
            <label class="block text-sm mb-4" for="password">
                <span class="text-gray-700 dark:text-gray-400">Password</span>
                <input name="password" type="password"
                    class="block w-full mt-1 text-sm rounded-md focus:border-blue-400 focus:outline-none focus:shadow-outline-yellow dark:text-black-300 dark:focus:shadow-outline-gray form-input @error('password') border-red-500 @enderror"
                    placeholder="********">
                @error('password')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </label>

            <label class="block text-sm mb-4" for="password_confirmation">
                <span class="text-gray-700 dark:text-gray-400">Password Confirmation</span>
                <input name="password_confirmation" type="password"
                    class="block w-full mt-1 text-sm rounded-md focus:border-blue-400 focus:outline-none focus:shadow-outline-yellow dark:text-black-300 dark:focus:shadow-outline-gray form-input @error('password_confirmation') border-red-500 @enderror"
                    placeholder="********">
                @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                @enderror
            </label>

            <button type="submit"
                class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                Register
            </button>
        </form>


        <hr class="my-8" />

        <a href="{{ route('google-auth') }}"
            class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium leading-5 text-grey text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
            <svg class="mr-4 h-5 w-5 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <path d="M17.788 5.108A9 9 0 1021 12h-8" />
            </svg>
            Sign up by Google
        </a>

        <p class="mt-4">
            <a class="text-sm font-medium text-blue-600 dark:text-blue-400 hover:underline"
                href="{{ route('login') }}">
                Already have an account? Login
            </a>
        </p>
    </x-auth-card>
</x-guest-layout>
