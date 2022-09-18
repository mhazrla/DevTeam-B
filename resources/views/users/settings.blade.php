<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('User Settings') }}
        </h2>

    </x-slot>

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">

            <!-- General elements -->
            <div class="px-4 py-3 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input name="name" value="{{ old('name', $user->name) }}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                </label>
            </div>

            <div class="px-4 py-3 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Username</span>
                    <input value="{{ old('username', $user->username) }} "
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="janedoe" />
                </label>
            </div>

            <div class="px-4 py-3 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Profile Image
                    </span>
                    <div class="relative">
                        <input
                            class="block w-full pl-20 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" />
                        <button
                            class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-l-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            Choose file
                        </button>
                    </div>
                </label>
            </div>

            <div class="px-4 py-3 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Current Password</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Current Password" />
                </label>
            </div>

            <div class="px-4 py-3 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">New Password</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="New Password" />
                </label>
            </div>

            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Confirm New Password</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Confirm New Password" />
                </label>
            </div>

            <!-- CTA -->
            <a class="flex items-center justify-between p-4 mb-8 text-l font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                href="#">
                <div class="flex items-center">
                    <span>Save</span>
                </div>
            </a>




    <main class="h-full pb-16 overflow-y-auto">



        <div class="container px-6 ">
            @if (session()->has('status'))
                        <div class="text-green-600 mb-4">
                            {{ session()->get('status') }}
                        </div>
                    @endif
            <h2 class="mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Update Profile
            </h2>
            <div class="w-full h-full p-5 mb-5 bg-white rounded-lg border-none shadow-md dark:bg-gray-800">
                <form class="space-y-4 text-gray-700" method="post" action=""
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-wrap">
                        <div class="w-full">
                            <label class="block mb-1" for="formGridCode_card">Name</label>
                            <input name="name" value="{{ old('name',Auth::user()->name) }}"
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
                            <label class="block mb-1" for="formGridCode_card">Username</label>
                            <input name="username" value="{{ old('username',Auth::user()->username) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                type="text" />
                            <div class="my-2 ">
                            @error('username')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                    </div>

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
                <form class="space-y-4 text-gray-700" method="post" action="{{ route('user.updatepassword') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
