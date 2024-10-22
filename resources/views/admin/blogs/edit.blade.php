<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Blog') }}
            </h2>

            <a href="{{ route('admin.blogs.index') }}"
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
                            <form action="{{ route('admin.blogs.update', $blog) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="p-6">
                                    <div class="mb-4">
                                        <label for="title"
                                            class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" id="title"
                                            value="{{ old('title', $blog->title) }}"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                            required oninput="updateSlug()">
                                        @error('title')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="slug"
                                            class="block text-sm font-medium text-gray-700">Slug</label>
                                        <input type="text" name="slug" id="slug"
                                            value="{{ old('slug', $blog->slug) }}"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                            required readonly>
                                        @error('slug')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="author"
                                            class="block text-sm font-medium text-gray-700">Author</label>
                                        <input type="text" name="author" id="author"
                                            value="{{ old('author', $blog->author) }}"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                            required>
                                        @error('author')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="image"
                                            class="block text-sm font-medium text-gray-700">Image</label>
                                        <input type="file" name="image" id="image" accept="image/*"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">
                                        <p class="text-gray-500 text-sm mt-1">Current Image: <img
                                                src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}"
                                                class="mt-2 w-20 h-20 object-cover"></p>
                                        @error('image')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="description" rows="4"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200" required>{{ old('description', $blog->description) }}</textarea>
                                        @error('description')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="status"
                                            class="block text-sm font-medium text-gray-700">Status</label>
                                        <select name="status" id="status"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                            required>
                                            <option value="active" {{ $blog->status === 'active' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="inactive"
                                                {{ $blog->status === 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
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

    <script>
        function updateSlug() {
            const title = document.getElementById('title').value;
            const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            document.getElementById('slug').value = slug;
        }
    </script>
</x-app-layout>
