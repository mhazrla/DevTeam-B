<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            <a href="{{ route('home') }}">
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </button>
            </a>
        </h2>

    </x-slot>

    <div class="w-full h-fit mb-3 bg-white rounded-lg border-none shadow-md dark:bg-gray-800">

        <a href="#">
            <img src="{{ url('/storage/' . $post->img) }}" class="rounded-t-lg w-full h-1/2" />
        </a>
        <div class="grid  rounded-lg">
            <figure
                class="flex-col p-8  bg-white rounded-t-lg  md:rounded-t-none md:rounded-tl-lg  dark:bg-gray-800 dark:border-gray-700">
                <figcaption class="flex space-x-3 justify-between">
                    <div class="inline-flex">
                        <img class="w-9 h-9 rounded-full"
                            src="https://smkstellamaris-labuanbajo.sch.id/wp-content/uploads/2022/07/profil-photo-1.jpg">
                        <div class="px-3 font-medium dark:text-white text-left">
                            <div>{{ $post->user->name }}</div>
                            <div class="text-sm font-light text-gray-500 dark:text-gray-400">
                                {{ $post->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    <div class="inline-flex mt-3">
                        <a href="#" class="inline-flex py-2 px-3 mx-8 text-sm  text-center text-grey-50 ">
                            <svg class="mr-3 h-5 w-5 text-black" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                            </svg>
                            77 Likes
                        </a>

                        <a href="#"
                            class="inline-flex float-right py-2 px-3 mx-12 text-sm font-medium text-center text-white ">
                            <svg class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                            </svg>
                        </a>
                    </div>
                </figcaption>

                <blockquote class="text-left ml-12 my-3 max-w-2xl text-gray-500 lg:mb-8 dark:text-gray-400">
                    <a href="{{ route('posts.show', $post->id) }}">
                        <h2 class="my-3 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            {{ ucwords($post->title) }}
                        </h2>
                    </a>
                    <p class="my-1 font-light">{{ $post->category->name }}</p>
                    @foreach ($post->tags as $tag)
                        <span
                            @if ($tag->name) class=" font-light inline-block bg-gray-200 rounded-full p-1.5 text-sm font-semibold text-gray-700">
                                #{{ $tag->name }} @endif
                            </span>
                    @endforeach
                    <p class="my-6 text-gray-700 dark:text-gray-200"><?=$post->description ?></p>
                </blockquote>

            </figure>
        </div>
    </div>





</x-app-layout>
