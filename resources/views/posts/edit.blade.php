
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label for="caption" class="block text-sm font-medium text-gray-700">Caption</label>
                            <input type="text" name="caption" id="caption" value="{{ $post->caption }}" class="mt-1 p-2 w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="image_url" class="block text-sm font-medium text-gray-700">Image URL</label>
                            <input type="text" name="image_url" id="image_url" value="{{ $post->image_url }}" class="mt-1 p-2 w-full border-gray-300 rounded-md">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">Update Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>