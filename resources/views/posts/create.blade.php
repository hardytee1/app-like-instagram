<!-- resources/views/posts/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf

                        <div>
                            <label for="caption" class="block font-medium text-sm text-gray-700">Caption</label>
                            <input type="text" name="caption" id="caption" class="mt-1 p-2 w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mt-4">
                            <label for="image_url" class="block font-medium text-sm text-gray-700">Image URL</label>
                            <input type="text" name="image_url" id="image_url" class="mt-1 p-2 w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Create Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>