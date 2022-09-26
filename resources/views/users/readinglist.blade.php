<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Reading Lists') }}
        </h2>

    </x-slot>

    @forelse ($readingList as $data)
        <div class="w-full h-fit p-3 mb-3 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="grid rounded-lg">
                <figure class="flex-col  bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700">
                    <figcaption class="flex space-x-3">
                        <div class="inline-flex">
                            @if ($data->posts->img)
                                <img class="rounded-lg" width="20%" src="{{ url('/storage/' . $data->posts->img) }}">
                            @endif
                            <div class="px-5 py-2">
                                <a href="{{ route('posts.show', $data->posts->id) }}"
                                    class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                    {{ ucwords($data->posts->title) }}
                                </a>
                                <p class="my-1 font-light text-sm">{{ $data->posts->category->name }}</p>

                                <div class="text-sm font-light text-gray-500 dark:text-gray-400">Published on
                                    {{ $data->posts->created_at->diffForHumans() }}</div>

                                @if (!$data->posts->likedBy(auth()->user()))
                                    <form action="{{ route('posts.likes ', $data->posts) }}" method="post"
                                        class="mr-1">
                                        @csrf
                                        <button type="submit"
                                            class="inline-flex pt-3  text-sm  text-center text-grey-50 ">
                                            <svg class="mr-3 h-5 w-5 text-black" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path
                                                    d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                                            </svg>
                                            <span>{{ $data->posts->likes->count() }}
                                                {{ Str::plural('like', $data->posts->likes->count()) }}</span>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.likes ', $data->posts) }}" method="post"
                                        class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex pt-3  text-sm  text-center text-grey-50 ">
                                            <svg class="mr-3 h-5 w-5 text-black" viewBox="0 0 24 24" fill="cyan"
                                                stroke="#3134ff" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path
                                                    d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                                            </svg>
                                            <span>{{ $data->posts->likes->count() }}
                                                {{ Str::plural('like', $data->posts->likes->count()) }}</span>
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </div>
                        <div class=" inline-flex items-center">

                            <form action="{{ route('posts.readinglist ', $data->posts) }}" method="post"
                                class="mr-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex float-right py-2 px-3 mx-8 text-sm text-center text-grey-50 ">
                                    <svg class="h-6 w-6 text-black" fill="black" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                    </svg>

                                </button>
                            </form>

                        </div>
                    </figcaption>
                </figure>
            </div>
        </div>
    @empty
        <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info alert!</span> Reading list still empty.
            </div>
        </div>
    @endforelse



</x-app-layout>
