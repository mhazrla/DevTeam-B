<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Reading Lists') }}
        </h2>

    </x-slot>

    <div class="w-full h-2/3 mb-3 bg-white rounded-lg shadow-lg dark:bg-gray-800">
        @foreach ($posts as $post)
            <div class="grid mb-8 rounded-lg">
                <figure class="flex-col  bg-white rounded-lg   dark:bg-gray-800 dark:border-gray-700">
                    <figcaption class="flex space-x-3">
                        <div class="inline-flex">
                            <img class="rounded-lg" width="20%" src="https://flowbite.com/docs/images/blog/image-1.jpg"
                                alt="">
                            <div class="px-3 py-2">
                                <a href="{{ route('posts.show', $post->id) }}"
                                    class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                    Title
                                </a>
                                <div class="text-sm font-light text-gray-500 dark:text-gray-400">Published on 22 october
                                    2022</div>
                                <a href="#" class="inline-flex pt-6 text-sm  text-center text-grey-50 ">
                                    <svg class="mr-5 h-5 w-5 text-black" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                                    </svg>
                                    77 Likes
                                </a>
                            </div>
                        </div>
                        <div class=" inline-flex items-center">
                            <a href="#" class="mx-8 text-sm font-medium text-center text-grey-50 ">
                                Remove
                            </a>
                        </div>
                    </figcaption>
                </figure>
            </div>
        @endforeach
    </div>






</x-app-layout>
