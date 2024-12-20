<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.abouts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" id="title" name="title"
                                value="{{ old('title', $about->title) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">
                            <p class="text-gray-500 text-sm mt-1">Current Image: <img
                                    src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}"
                                    class="mt-2 w-20 h-20 object-cover"></p>
                            @error('image')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="3"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                                required>{{ old('description', $about->description) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="vision" class="block text-sm font-medium text-gray-700">Vision</label>
                            <input type="text" id="vision" name="vision"
                                value="{{ old('vision', $about->vision) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="mission" class="block text-sm font-medium text-gray-700">Mission</label>
                            <input type="text" id="mission" name="mission"
                                value="{{ old('mission', $about->mission) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50"
                                required>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                                UPDATE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
