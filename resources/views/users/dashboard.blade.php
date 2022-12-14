<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-2">
        <!-- Card -->
        <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
        <div
            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
        >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"
            ></path>
            </svg>
        </div>
        <div>
            <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
            Total Likes
            </p>
            <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
            30
            </p>
        </div>
        </div>
        <!-- Card -->
        <div
        class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
        >
        <div
            class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
        >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path
                fill-rule="evenodd"
                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                clip-rule="evenodd"
            ></path>
            </svg>
        </div>
        <div>
            <p
            class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
            Total Posts
            </p>
            <p
            class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >
            3
            </p>
        </div>
        </div>
    </div>

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ __('Posts') }}
    </h2>

    <div class="grid gap-2 mb-8 md:grid-cols-1 xl:grid-cols-1">
        <div class="w-full h-2/3 mb-3 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="grid mb-8 rounded-lg">
                <figure
                    class="flex-col  bg-white rounded-lg   dark:bg-gray-800 dark:border-gray-700">
                    <figcaption class="flex space-x-3">
                        <div class="inline-flex">
                            <img class="rounded-lg" width="20%" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="">
                            <div class="px-3 py-2">
                                <a href="{{ route('posts.show') }}" class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                    Title
                                </a>
                                <div class="text-sm font-light text-gray-500 dark:text-gray-400">Published on 22 october 2022</div>
                                <a href="#" class="inline-flex pt-6 text-sm  text-center text-grey-50 ">
                                    <svg class="mr-5 h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                                    </svg>
                                    77 Likes
                                </a>
                            </div>
                        </div>
                        <div class=" inline-flex items-center">
                            <a href="{{ route('posts.show') }}" class="mx-8 text-sm font-medium text-center text-grey-50 ">
                                Show
                            </a>
                            <a href="#" class="mx-8 text-sm font-medium text-center text-grey-50 ">
                                Edit
                            </a>
                            <a href="#" class="mx-8 text-sm font-medium text-center text-grey-50 ">
                                Delete
                            </a>
                        </div>
                    </figcaption>
                </figure>
            </div>
        </div>

        <div class="w-full h-2/3 mb-3 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="grid mb-8 rounded-lg">
                <figure
                    class="flex-col  bg-white rounded-lg   dark:bg-gray-800 dark:border-gray-700">
                    <figcaption class="flex space-x-3">
                        <div class="inline-flex">
                            <img class="rounded-lg" width="20%" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="">
                            <div class="px-3 py-2">
                                <a href="{{ route('posts.show') }}" class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                    Title
                                </a>
                                <div class="text-sm font-light text-gray-500 dark:text-gray-400">Published on 22 october 2022</div>
                                <a href="#" class="inline-flex pt-6 text-sm  text-center text-grey-50 ">
                                    <svg class="mr-5 h-5 w-5 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                                    </svg>
                                    77 Likes
                                </a>
                            </div>
                        </div>
                        <div class=" inline-flex items-center">
                            <a href="{{ route('posts.show') }}" class="mx-8 text-sm font-medium text-center text-grey-50 ">
                                Show
                            </a>
                            <a href="#" class="mx-8 text-sm font-medium text-center text-grey-50 ">
                                Edit
                            </a>
                            <a href="#" class="mx-8 text-sm font-medium text-center text-grey-50 ">
                                Delete
                            </a>
                        </div>
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>


</x-app-layout>
