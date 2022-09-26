<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Home') }}
        </h2>

    </x-slot>

    <x-auth-session-status class="mb-4" :status="session(['status'])" />

    @forelse ($posts as $post)
        <div class="w-full h-fit mb-3 bg-white rounded-lg border-none shadow-md dark:bg-gray-800">
            @if ($post->img)
                <a href="{{ route('posts.show', $post->id) }}">
                    <img src="{{ url('/storage/' . $post->img) }}" class="rounded-t-lg w-full h-1/2" />
                </a>
            @endif
            <div class="grid mb-8 rounded-lg">
                <figure
                    class=" flex-col p-8  bg-white rounded-t-lg  md:rounded-t-none md:rounded-tl-lg  dark:bg-gray-800 dark:border-gray-700">

                    <a href="{{ route('user.show', $post->user->id) }}">
                        <figcaption class="flex space-x-3">
                            @if ($post->user->img == null)
                                <img class="w-8 h-8 rounded-full"
                                    src="https://smkstellamaris-labuanbajo.sch.id/wp-content/uploads/2022/07/profil-photo-1.jpg">
                            @else
                                <img class="w-8 h-8 rounded-full" src="{{ asset('/storage/' . $post->user->img) }}">
                            @endif
                            <div class="space-y-0.5 font-medium dark:text-white text-left">
                                <div>{{ $post->user->name }}</div>
                                <div class="text-sm font-light text-gray-500 dark:text-gray-400">
                                    {{ $post->created_at->diffForHumans() }}</div>
                            </div>
                        </figcaption>
                    </a>
                    <blockquote class="text-left ml-12 my-3 max-w-2xl text-gray-500 lg:mb-8 dark:text-gray-400">
                        <a href="{{ route('posts.show', $post->id) }}">
                            <h2 class="my-3 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                                {{ ucwords($post->title) }}
                            </h2>
                        </a>
                        <a href="{{ route('categories.show', $post->category->id) }}" class=" font-light">
                            {{ $post->category->name }}</a><br>
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('tags.show', $tag->id) }}"><span
                                    @if ($tag->name) class="my-3 font-light inline-block bg-gray-200 rounded-full px-2 text-sm font-semibold text-gray-700">
                    #{{ $tag->name }} @endif
                                    </span>
                            </a>
                        @endforeach
                    </blockquote>

                    <div>
                        @auth
                            @if (!$post->likedBy(auth()->user()))
                                <form action="{{ route('posts.likes ', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex py-2 px-3 mx-8 text-sm  text-center text-grey-50 ">
                                        <svg class="mr-3 h-5 w-5 text-black" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path
                                                d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                                        </svg>
                                        <span>{{ $post->likes->count() }}
                                            {{ Str::plural('like', $post->likes->count()) }}</span>
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('posts.likes ', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex py-2 px-3 mx-8 text-sm  text-center text-grey-50 ">
                                        <svg class="mr-3 h-5 w-5 text-black" viewBox="0 0 24 24" fill="cyan"
                                            stroke="#3134ff" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path
                                                d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                                        </svg>
                                        <span>{{ $post->likes->count() }}
                                            {{ Str::plural('like', $post->likes->count()) }}</span>
                                    </button>
                                </form>
                            @endif


                            @if (!$post->storedBy(auth()->user()))
                                <form action="{{ route('posts.readinglist ', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit"
                                        class="inline-flex float-right py-2 px-3 mx-8 text-sm  text-center text-grey-50 ">
                                        <svg class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                        </svg>

                                    </button>
                                </form>
                            @else
                                <form action="{{ route('posts.readinglist ', $post) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex float-right py-2 px-3 mx-8 text-sm  text-center text-grey-50 ">
                                        <svg class="h-6 w-6 text-black" fill="black" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                        </svg>

                                    </button>
                                </form>
                            @endif

                        @endauth

                        @guest
                            <form action="{{ route('posts.likes ', $post) }}" method="post" class="mr-1">
                                @csrf
                                <button type="submit"
                                    class="inline-flex py-2 px-3 mx-8 text-sm  text-center text-grey-50 ">
                                    <svg class="mr-3 h-5 w-5 text-black" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                                    </svg>
                                    <span>{{ $post->likes->count() }}
                                        {{ Str::plural('like', $post->likes->count()) }}</span>
                                </button>
                            </form>

                            <form action="{{ route('posts.readinglist ', $post) }}" method="post" class="mr-1">
                                @csrf
                                <button type="submit"
                                    class="inline-flex float-right py-2 px-3 mx-8 text-sm  text-center text-grey-50 ">
                                    <svg class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                    </svg>

                                </button>
                            </form>
                        @endguest
                    </div>

                </figure>
            </div>
        </div>
    @empty
        <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
            </div>
        </div>
    @endforelse



</x-app-layout>
