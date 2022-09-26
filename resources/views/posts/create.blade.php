<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Create Post') }}
        </h2>

    </x-slot>

    <div class="w-full h-full p-5 mb-5 bg-white rounded-lg border-none shadow-md dark:bg-gray-800">

        <form class="space-y-4 text-gray-700" method="post" action="{{ route('posts.store') }}"
            enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap">
                <div class="w-full">
                    <label class="block mb-1" for="formGridCode_card">Title</label>
                    <input name="title" placeholder="Post title" value="{{ old('title') }}"
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
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Category</label>
                    <select id="category_id" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected="" disabled>Choose Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == old('category')) selected @endif>
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
                            placeholder="Tags" value="{{ old('tags') }}">
                        <span class="text-xs text-gray-400">Separated by crash (#)</span>

                        <div class="my-2 ">
                            @error('tags')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex flex-wrap">
                <label for="img" class="block mb-2 text-sm font-medium ">Upload Image</label>
                <input
                    class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
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
                        placeholder="Description...">{{ old('description') }}</textarea>
                    <div class="my-2 ">
                        @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- <div class="flex flex-wrap">
                <div class="w-full">
                    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
                    <style>
                        @import url(https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css);

                        .active\:bg-gray-50:active {
                            --tw-bg-opacity: 1;
                            background-color: rgba(249, 250, 251, var(--tw-bg-opacity));
                        }
                    </style>

                    <div class="min-h-screen bg-purple-200 flex items-center justify-center px-5  rounded-lg">
                        <div class="w-full max-w-6xl mx-auto rounded-xl bg-white shadow-lg p-5 text-black"
                            x-data="app()" x-init="init($refs.wysiwyg)">
                            <div class="border border-purple-200 overflow-hidden rounded-md">
                                <div class="w-full flex border-b border-purple-200 text-xl text-purple-600">
                                    <button type="button"
                                        class="outline-none focus:outline-none border-r border-purple-200 w-10 h-10 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('bold')">
                                        <i class="mdi mdi-format-bold"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-r border-purple-200 w-10 h-10 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('italic')">
                                        <i class="mdi mdi-format-italic"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-r border-purple-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('underline')">
                                        <i class="mdi mdi-format-underline"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-l border-r border-purple-200 w-10 h-10 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('formatBlock','P')">
                                        <i class="mdi mdi-format-paragraph"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-r border-purple-200 w-10 h-10 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('formatBlock','H1')">
                                        <i class="mdi mdi-format-header-1"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-r border-purple-200 w-10 h-10 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('formatBlock','H2')">
                                        <i class="mdi mdi-format-header-2"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-r border-purple-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('formatBlock','H3')">
                                        <i class="mdi mdi-format-header-3"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-l border-r border-purple-200 w-10 h-10 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('insertUnorderedList')">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-r border-purple-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('insertOrderedList')">
                                        <i class="mdi mdi-format-list-numbered"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-l border-r border-purple-200 w-10 h-10 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('justifyLeft')">
                                        <i class="mdi mdi-format-align-left"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-r border-purple-200 w-10 h-10 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('justifyCenter')">
                                        <i class="mdi mdi-format-align-center"></i>
                                    </button>
                                    <button type="button"
                                        class="outline-none focus:outline-none border-r border-purple-200 w-10 h-10 hover:text-indigo-500 active:bg-purple-50"
                                        @click="format('justifyRight')">
                                        <i class="mdi mdi-format-align-right"></i>
                                    </button>
                                </div>
                                <div class="w-full">
                                    <iframe x-ref="wysiwyg" class="w-full h-96 overflow-y-auto"
                                        name="description"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function app() {
                            return {
                                wysiwyg: null,
                                init: function(el) {
                                    // Get el
                                    this.wysiwyg = el;
                                    // Add CSS
                                    this.wysiwyg.contentDocument.querySelector('head').innerHTML += `<style>
            *, ::after, ::before {box-sizing: border-box;}
            :root {tab-size: 4;}
            html {line-height: 1.15;text-size-adjust: 100%;}
            body {margin: 0px; padding: 1rem 0.5rem;}
            body {font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";}
            </style>`;
                                    this.wysiwyg.contentDocument.body.innerHTML += `
            <h1>Hello World!</h1>
            <p>Welcome to the pure AlpineJS and Tailwind WYSIWYG.</p>
            `;
                                    // Make editable
                                    this.wysiwyg.contentDocument.designMode = "on";
                                },
                                format: function(cmd, param) {
                                    this.wysiwyg.contentDocument.execCommand(cmd, !1, param || null)
                                }
                            }
                        }
                    </script>

                </div>
            </div> --}}


            <button type="submit"
                class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Submit</button>

        </form>

    </div>





</x-app-layout>
