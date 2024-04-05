<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
            <form action="{{ route('posts.search') }}" method="GET">
            <div class="mb-4">
                <label for="user_name" class="block text-sm font-medium text-gray-700">Search by User Name:</label>
                <input type="text" name="user_name" id="user_name" class="mt-1 p-2 w-full border-gray-300 rounded-md">
            </div>
            <button type="submit" class="inline-block px-4 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-blue-600">Search</button>
            </form>
                    <div class="mt-6">
                        <a href="{{ route('dashboard') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">
                            Get All Post
                        </a>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('posts.create') }}" class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">
                            Create New Post
                        </a>
                    </div>
        <h2 class="mt-4 text-xl font-semibold">All Posts</h2>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
            @if ($posts)
                <ul>
                    @foreach ($posts as $post)
                        <li class="mb-4 border-b-2 border-gray-200 pb-4">
                            <p class="text-sm text-gray-500">Posted by: {{ $post->user->name }}</p>
                            <img src="{{ $post->image_url }}" alt="{{ $post->caption }}" class="mt-1 w-3/6 h-auto">
                            <h3 class="text-lg font-semibold">{{ $post->caption }}</h3>
                            <h2 class="text-lg font-semibold">Number of likes: {{ $post->like_count }}</h2>
                            <form action="{{ route('like.store', $post->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded-md shadow-md hover:bg-pink-600">Like Post</button>
                            </form>
                            @if (Auth::id() === $post->user_id)
                                <a href="{{ route('posts.edit', $post->id) }}" class="inline-block px-4 py-2 bg-green-500 text-white rounded-md shadow-md hover:bg-green-600">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block px-4 py-2 bg-red-500 text-white rounded-md shadow-md hover:bg-red-600">Delete</button>
                                </form>
                            @endif
                        </li>
                    @endforeach
                </ul>
                @else
                <p>No posts to display.</p>
            @endif
            </div>
        </div>
    </div>
</x-app-layout>