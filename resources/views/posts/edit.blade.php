<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Edit Post') }}
        </h2>

    </x-slot>

    <div class="w-full h-full p-5 mb-5 bg-white rounded-lg border-none shadow-md dark:bg-gray-800">
        <form class="space-y-4 text-gray-700" method="post" action="{{ route('posts.update', $post->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex flex-wrap">
                <div class="w-full">
                    <label class="block mb-1" for="formGridCode_card">Title</label>
                    <input name="title" placeholder="Post title" value="{{ old('title', $post->title) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        type="text" />
                    <div class="my-2 ">
                        @error('title')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">

                <div class="w-full px-2 md:w-1/2">
                    <label for="category_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select
                        an
                        option</label>
                    <select id="category_id" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected="" disabled>Choose a country</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id === $post->category_id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>

                    <div class="my-2 ">
                        @error('category_id')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="w-full px-2 md:w-1/2">

                    <div class="mb-6">
                        <label for="tags" class="block mb-2 text-sm font-medium ">Tags</label>
                        <input type="text" id="tags" name="tags"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Tags" value="{{ old('tags', $tags) }}">
                        <span class="text-xs text-gray-400">Separated by crash (#)</span>

                        <div class="my-2 ">
                            @error('tags')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>
            <img class="rounded-lg" width="20%" src="{{ url('/storage/' . $post->img) }}">

            <div class="flex flex-wrap">
                <label for="img" class="block mb-2 text-sm font-medium ">Upload Image</label>
                <input
                    class="block w-full text-sm text-purple-900 bg-purple-50 rounded-lg border border-purple-300 cursor-pointer dark:text-purple-400 focus:outline-none dark:bg-purple-700 dark:border-purple-600 dark:placeholder-purple-400"
                    id="img" type="file" name="img">

                <div class="my-2 ">
                    @error('img')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex flex-wrap">
                <div class="w-full">
                    <label class="block mb-1" for="formGridCode_card">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Description...">{{ old('description', $post->description) }}</textarea>
                    <div class="my-2 ">
                        @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit"
                class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Submit</button>

        </form>

    </div>





</x-app-layout>
