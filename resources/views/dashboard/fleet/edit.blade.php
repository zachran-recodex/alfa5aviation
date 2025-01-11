<x-dashboard-layout>

    <div class="flex justify-between items-center mb-2">
        <h2 class="text-4xl font-bold mb-2">Fleet</h2>

        <x-breadcrumb :links="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Fleet', 'url' => route('dashboard.fleet.index')],
            ['label' => $fleet->title, 'url' => null],
            ['label' => 'Edit Fleet', 'url' => null],
        ]" />
    </div>

    <div class="w-full mx-auto my-4">
        <div class="border border-gray-200 rounded-lg bg-gray-50 shadow-sm">

            <div class="border-b border-gray-200 py-2 px-4 flex justify-between items-center">
                <h3 class="text-lg font-medium">
                    Create Fleet
                </h3>

                <a href="{{ route('dashboard.fleet.index') }}" class="btn-primary">
                    Back
                </a>
            </div>

            <div class="p-4">

                <form action="{{ route('dashboard.fleet.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                    @csrf

                    <!-- Title -->
                    <div class="col-span-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $fleet->title) }}" required />
                        @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" name="image" class="form-input-file" />
                        @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="col-span-6">
                        <label for="current-image" class="form-label">Current Image</label>
                        <img src="{{ asset('storage/' . $fleet->image) }}" alt="{{ $fleet->title }}" class="border rounded-lg w-full h-64 object-cover">
                    </div>

                    <!-- Description -->
                    <div class="col-span-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-input" rows="5">{{ old('description', $fleet->description) }}</textarea>
                        @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Start Model Year -->
                    <div class="col-span-6">
                        <label for="start_model_year" class="form-label">Start Model Year</label>
                        <input type="number" id="start_model_year" name="start_model_year" class="form-input" value="{{ old('start_model_year', $fleet->start_model_year) }}" />
                        @error('start_model_year')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- End Model Year -->
                    <div class="col-span-6">
                        <label for="end_model_year" class="form-label">End Model Year</label>
                        <input type="number" id="end_model_year" name="end_model_year" class="form-input" value="{{ old('end_model_year', $fleet->end_model_year) }}" />
                        @error('end_model_year')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fleet Size -->
                    <div class="col-span-4">
                        <label for="fleet_size" class="form-label">Fleet Size</label>
                        <input type="number" id="fleet_size" name="fleet_size" class="form-input" value="{{ old('fleet_size', $fleet->fleet_size) }}" />
                        @error('fleet_size')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Engine Count -->
                    <div class="col-span-4">
                        <label for="engine_count" class="form-label">Engine Count</label>
                        <input type="number" id="engine_count" name="engine_count" class="form-input" value="{{ old('engin_count', $fleet->engine_count) }}" />
                        @error('engine_count')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Passenger -->
                    <div class="col-span-4">
                        <label for="passenger" class="form-label">Passenger Capacity</label>
                        <input type="number" id="passenger" name="passenger" class="form-input" value="{{ old('passenger', $fleet->passenger) }}" />
                        @error('passenger')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Model Class -->
                    <div class="col-span-4">
                        <label for="model_class" class="form-label">Model Class</label>
                        <input type="text" id="model_class" name="model_class" class="form-input" value="{{ old('model_class', $fleet->model_class) }}" />
                        @error('model_class')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Range -->
                    <div class="col-span-4">
                        <label for="range" class="form-label">Range (km)</label>
                        <input type="number" id="range" name="range" class="form-input" value="{{ old('range', $fleet->range) }}" />
                        @error('range')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Max Cruising Speed -->
                    <div class="col-span-4">
                        <label for="max_cruising_speed" class="form-label">Max Cruising Speed (km/h)</label>
                        <input type="number" id="max_cruising_speed" name="max_cruising_speed" class="form-input" value="{{ old('max_cruising_speed', $fleet->max_cruising_speed) }}" />
                        @error('max_cruising_speed')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Ceiling -->
                    <div class="col-span-4">
                        <label for="ceiling" class="form-label">Ceiling (m)</label>
                        <input type="number" id="ceiling" name="ceiling" class="form-input" value="{{ old('ceiling', $fleet->ceiling) }}" />
                        @error('ceiling')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Take Off Distance -->
                    <div class="col-span-4">
                        <label for="take_off_distance" class="form-label">Take Off Distance (m)</label>
                        <input type="number" id="take_off_distance" name="take_off_distance" class="form-input" value="{{ old('take_off_distance', $fleet->take_off_distance) }}" />
                        @error('take_off_distance')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Landing Distance -->
                    <div class="col-span-4">
                        <label for="landing_distance" class="form-label">Landing Distance (m)</label>
                        <input type="number" id="landing_distance" name="landing_distance" class="form-input" value="{{ old('landing_distance', $fleet->landing_distance) }}" />
                        @error('landing_distance')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="col-span-12 flex justify-end">
                        <button type="submit" class="btn-success">
                            Create
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-dashboard-layout>
