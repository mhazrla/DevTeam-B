<div class="flex flex-col flex-1 w-full">
    <header class="z-10 bg-white shadow-md dark:bg-gray-800">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}"
                                class="bg-purple-400 p-2  text-white font-semibold rounded-lg text-gray-900">
                                DevTeam B
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                            </x-nav-link>
                        </div>
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link :href="route('user.readinglist')" :active="request()->routeIs('user.readinglist')">
                                {{ __('Reading List') }}
                            </x-nav-link>
                        </div>
                    </div>


                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <ul class="flex items-center">
                            @auth
                                <li>
                                    <a href="{{ route('posts.create') }}"
                                        class="px-4 py-3 mr-5 text-grey-100 outline outline-offset-2 outline-2 no-underline bg-white-500 rounded hover:bg-grey-600 hover:no-underline hover:text-blue-200">
                                        Create Post</a>
                                </li>

                                <x-dropdown align="right" width="48">

                                    <x-slot name="trigger">

                                        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                                            class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                            type="button">
                                            <img class="w-8 h-8 rounded-full"
                                                src="https://smkstellamaris-labuanbajo.sch.id/wp-content/uploads/2022/07/profil-photo-1.jpg">
                                        </button>

                                        <!-- Dropdown menu -->
                                        <div id="dropdownAvatar"
                                            class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                                            data-popper-reference-hidden="" data-popper-escaped=""
                                            data-popper-placement="bottom"
                                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 1791px);">
                                            <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                                                <div>{{ Auth::user()->name }}</div>
                                                <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                                            </div>
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownUserAvatarButton">
                                                <li>
                                                    <a href="{{ route('user.dashboard') }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('posts.create') }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Create
                                                        Post</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.readinglist') }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reading
                                                        List</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('user.settings') }}"
                                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                                                </li>
                                            </ul>
                                            <div class="py-1 ">
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>

                                            </div>
                                        </div>

                                    </x-slot>

                                    <x-slot name="content">

                                    </x-slot>
                                </x-dropdown>

                            @endauth
                            @guest
                                <li>
                                    <a href="{{ route('login') }}" class="p-3">Login</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}" class="p-3">Register</a>
                                </li>
                            @endguest

                        </ul>


                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->

            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                @auth
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                        <hr class="bg-grey-500 my-2">
                    </div>
                    <div>
                        <x-responsive-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                    </div>

                    <div>
                        <x-responsive-nav-link :href="route('posts.create')" :active="request()->routeIs('posts.create')">
                            {{ __('Create Post') }}
                        </x-responsive-nav-link>
                    </div>

                    <div>
                        <x-responsive-nav-link :href="route('user.readinglist')" :active="request()->routeIs('user.readinglist')">
                            {{ __('Reading List') }}
                        </x-responsive-nav-link>
                    </div>

                    <div>
                        <x-responsive-nav-link :href="route('user.settings')" :active="request()->routeIs('user.settings')">
                            {{ __('Settings') }}
                        </x-responsive-nav-link>
                    </div>
                    <hr class="bg-grey-500">
                    <div class="mt-1 space-y-1">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                @endauth

                @guest
                    <div>
                        <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                            {{ __('Login') }}
                        </x-responsive-nav-link>
                    </div>

                    <div>
                        <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                            {{ __('Register') }}
                        </x-responsive-nav-link>
                    </div>
                @endguest

            </div>
        </nav>
    </header>
