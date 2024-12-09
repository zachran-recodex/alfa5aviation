<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Fleet') }}
            </h2>

            <a href="{{ route('admin.fleets.index') }}"
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
                            <form action="{{ route('admin.fleets.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="p-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="mb-4">
                                            <label for="title"
                                                class="block text-sm font-medium text-gray-700">Title</label>
                                            <input type="text" name="title" id="title"
                                                value="{{ old('title', $fleet->title) }}"
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
                                                value="{{ old('slug', $fleet->slug) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required readonly>
                                            @error('slug')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="description"
                                            class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="description" rows="4"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200" required>{{ old('description', $fleet->description) }}</textarea>
                                        @error('description')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label for="image"
                                            class="block text-sm font-medium text-gray-700">Image</label>
                                        <input type="file" name="image" id="image" accept="image/*"
                                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200">
                                        <p class="text-gray-500 text-sm mt-1">Current Image: <img
                                                src="{{ asset('storage/' . $fleet->image) }}" alt="{{ $fleet->title }}"
                                                class="mt-2 w-20 h-20 object-cover"></p>
                                        @error('image')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                        <div class="mb-4">
                                            <label for="start_model_year"
                                                class="block text-sm font-medium text-gray-700">Start Model Year</label>
                                            <input type="number" name="start_model_year" id="start_model_year"
                                                value="{{ old('start_model_year', $fleet->start_model_year) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('start_model_year')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="end_model_year"
                                                class="block text-sm font-medium text-gray-700">End
                                                Model Year</label>
                                            <input type="number" name="end_model_year" id="end_model_year"
                                                value="{{ old('end_model_year', $fleet->end_model_year) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('end_model_year')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="fleet_size"
                                                class="block text-sm font-medium text-gray-700">Fleet
                                                Size</label>
                                            <input type="number" name="fleet_size" id="fleet_size"
                                                value="{{ old('fleet_size', $fleet->fleet_size) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('fleet_size')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="engine_count"
                                                class="block text-sm font-medium text-gray-700">Engine
                                                Count</label>
                                            <input type="number" name="engine_count" id="engine_count"
                                                value="{{ old('engine_count', $fleet->engine_count) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('engine_count')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="passenger"
                                                class="block text-sm font-medium text-gray-700">Passenger
                                                Capacity</label>
                                            <input type="number" name="passenger" id="passenger"
                                                value="{{ old('passenger', $fleet->passenger) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('passenger')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="model_class"
                                                class="block text-sm font-medium text-gray-700">Model
                                                Class</label>
                                            <input type="text" name="model_class" id="model_class"
                                                value="{{ old('model_class', $fleet->model_class) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('model_class')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="range"
                                                class="block text-sm font-medium text-gray-700">Range</label>
                                            <input type="text" name="range" id="range"
                                                value="{{ old('range', $fleet->range) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('range')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="max_cruising_speed"
                                                class="block text-sm font-medium text-gray-700">Max Cruising
                                                Speed</label>
                                            <input type="text" name="max_cruising_speed" id="max_cruising_speed"
                                                value="{{ old('max_cruising_speed', $fleet->max_cruising_speed) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('max_cruising_speed')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="ceiling"
                                                class="block text-sm font-medium text-gray-700">Ceiling</label>
                                            <input type="text" name="ceiling" id="ceiling"
                                                value="{{ old('ceiling', $fleet->ceiling) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('ceiling')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="take_off_distance"
                                                class="block text-sm font-medium text-gray-700">Take-off
                                                Distance</label>
                                            <input type="text" name="take_off_distance" id="take_off_distance"
                                                value="{{ old('take_off_distance', $fleet->take_off_distance) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('take_off_distance')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="landing_distance"
                                                class="block text-sm font-medium text-gray-700">Landing
                                                Distance</label>
                                            <input type="text" name="landing_distance" id="landing_distance"
                                                value="{{ old('landing_distance', $fleet->landing_distance) }}"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200"
                                                required>
                                            @error('landing_distance')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
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
                                            CREATE
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
