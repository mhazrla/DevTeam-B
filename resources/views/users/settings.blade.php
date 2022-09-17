<x-app-layout>
    <x-slot name="header">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __("Settings for") }}
            {{ Auth::user()->name }}
        </h2>

    </x-slot>

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
          <h2
            class="mb-4 text-2xl font-semibold text-gray-700 dark:text-gray-200"
          >
            User
          </h2>


          <!-- General elements -->
          <div
            class="px-4 py-3 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Name</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Jane Doe"
              />
            </label>
          </div>

          <div
            class="px-4 py-3 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Username</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="janedoe"
              />
            </label>
          </div>

          <div
              class="px-4 py-3 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Profile Image
                </span>
                <div class="relative">
                  <input
                    class="block w-full pl-20 mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                  />
                  <button
                    class="absolute inset-y-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-l-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  >
                    Choose file
                  </button>
                </div>
              </label>
          </div>

          <div
            class="px-4 py-3 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Current Password</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Current Password"
              />
            </label>
          </div>

          <div
            class="px-4 py-3 mb-6 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">New Password</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="New Password"
              />
            </label>
          </div>

          <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
          >
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Confirm New Password</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Confirm New Password"
              />
            </label>
          </div>

        <!-- CTA -->
        <a
        class="flex items-center justify-between p-4 mb-8 text-l font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
        href="#"
      >
        <div class="flex items-center">
          <span>Save</span>
        </div>
        </a>


        </div>
    </main>






</x-app-layout>
