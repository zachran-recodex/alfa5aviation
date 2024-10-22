<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Partner') }}
            </h2>

            <a href="{{ route('admin.partners.index') }}"
                class="md:flex bg-alfa5-500 hover:bg-alfa5-600 px-6 py-2 rounded-md hidden items-center gap-3 text-sm font-semibold">
                <p class="text-sm text-white font-medium text-default-700">BACK</p>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto custom-scroll">
                    <div class="min-w-full inline-block align-middle whitespace-nowrap">
                        <div class="overflow-hidden">
                            <form action="{{ route('admin.partners.update', $partner) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="p-6">
                                    <div class="mb-4">
                                        <label for="title"
                                            class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" id="title"
                                            value="{{ old('title', $partner->title) }}"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                            required>
                                        @error('title')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="image"
                                            class="block text-sm font-medium text-gray-700">Image</label>
                                        <input type="file" name="image" id="image" accept="image/*"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">
                                        @if ($partner->image)
                                            <p class="text-gray-500 text-sm mt-1">Current Image: <img
                                                    src="{{ Storage::url($partner->image) }}"
                                                    alt="{{ $partner->title }}" class="mt-2 w-20 h-20 object-cover">
                                            </p>
                                        @endif
                                        @error('image')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="url"
                                            class="block text-sm font-medium text-gray-700">URL</label>
                                        <input type="url" name="url" id="url"
                                            value="{{ old('url', $partner->url) }}"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                            required>
                                        @error('url')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="status"
                                            class="block text-sm font-medium text-gray-700">Status</label>
                                        <select name="status" id="status"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                            required>
                                            <option value="active"
                                                {{ $partner->status === 'active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive"
                                                {{ $partner->status === 'inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                                            UPDATE
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
