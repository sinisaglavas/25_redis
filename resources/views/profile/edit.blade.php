<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div>
                        <img class="rounded-lg" src="/storage/images/avatars/{{ \Illuminate\Support\Facades\Auth::user()->profile_image }}"
                             alt="Avatar"
                             width="100" height="100">
                    </div>
                    <form action="{{ route('profile.changeAvatar') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="profile_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Upload Profile Image
                            </label>
                            <input
                                type="file"
                                name="profile_image"
                                id="profile_image"
                                accept="image/*" {{-- prihvati bilo koju sliku --}}
                                class="mt-2 block w-full text-sm text-gray-900 dark:text-gray-100 border border-gray-300 dark:border"
                                required>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                JPG, PNG or JPEG (Max 2MB)
                            </p>
                        </div>
                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md
                                        hover:bg-blue-700 focus:outline-none">
                                Upload
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
