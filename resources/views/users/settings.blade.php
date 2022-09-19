<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('User Settings') }}
        </h2>

    </x-slot>

    <main class="h-full pb-16 overflow-y-auto">

        <div class="container px-6 ">

            @if (session()->has('status'))
                <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                        {{ session()->get('status') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"
                        data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <h2 class="mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Update Profile
            </h2>
            <div class="w-full h-full p-5 mb-5 bg-white rounded-lg border-none shadow-md dark:bg-gray-800">
                <form class="space-y-4 text-gray-700" method="post"
                    action="{{ route('user.updatedata', Auth::user()) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-wrap">
                        <div class="w-full">
                            <label class="block mb-1" for="name">Name</label>
                            <input name="name" value="{{ old('name', Auth::user()->name) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                type="text" />
                            <div class="my-2 ">
                                @error('name')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap">
                        <div class="w-full">

                            <label class="block mb-1" for="username">Username</label>
                            <input type="text" {{ Auth::user()->username == null ? '' : 'disabled' }}
                                value="{{ old('username', Auth::user()->username) }}" name="username"
                                class="mt-1 block w-full p-2.5  bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                    invalid:border-pink-500 invalid:text-pink-600
                                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                    " />
                            <div class="my-2 ">
                                @error('username')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>



                        </div>
                    </div>

                    <div class="flex flex-wrap">
                        <div class="w-full">
                            <label class="block mb-1" for="email">Email</label>
                            <input type="text" value="{{ old('email', Auth::user()->email) }}" disabled
                                class="mt-1 block w-full p-2.5  bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                                    focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                                    disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                                    invalid:border-pink-500 invalid:text-pink-600
                                    focus:invalid:border-pink-500 focus:invalid:ring-pink-500
                                    " />
                            <div class="my-2 ">
                                @error('email')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->img != null)
                        <img class="rounded-lg" width="20%" src="{{ url('/storage/' . Auth::user()->img) }}">
                    @endif

                    <div class="flex flex-wrap">
                        <label for="img" class="block mb-2 text-sm font-medium ">Photo Profile</label>
                        <input
                            class="block w-full text-sm text-purple-900 bg-purple-50 rounded-lg border border-purple-300 cursor-pointer dark:text-purple-400 focus:outline-none dark:bg-purple-700 dark:border-purple-600 dark:placeholder-purple-400"
                            id="img" type="file" name="img">

                        <div class="my-2 ">
                            @error('img')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container px-6 ">
            <h2 class="mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Change Password
            </h2>
            <div class="w-full h-full p-5 mb-5 bg-white rounded-lg border-none shadow-md dark:bg-gray-800">
                <form class="space-y-4 text-gray-700" method="post" action="{{ route('user.updatepassword') }}">
                    @csrf
                    @method('PUT')

                    @if (Auth::user()->password != null)
                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <label class="block mb-1" for="formGridCode_card">Current Password</label>
                                <input name="old_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    type="password" />
                                <div class="my-2 ">
                                    @error('old_password')
                                        <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="flex flex-wrap">
                        <div class="w-full">
                            <label class="block mb-1" for="formGridCode_card">New Password</label>
                            <input name="new_password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                type="password" />
                            <div class="my-2 ">
                                @error('new_password')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap">
                        <div class="w-full">
                            <label class="block mb-1" for="formGridCode_card">Confirm New Password</label>
                            <input name="new_password_confirmation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                type="password" />
                            <div class="my-2 ">
                                @error('new_password_confirmation')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>






</x-app-layout>
