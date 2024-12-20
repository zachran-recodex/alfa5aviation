<x-layout.admin>
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Fleet</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Fleet - Edit</li>
        </ul>
    </div>

    <div class="col-span-12">
        <div class="card border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center flex-wrap gap-3 justify-between">
                <h5 class="card-title text-lg mb-0">Edit Fleet</h5>
                <a href="{{ route('admin.fleets.index') }}" class="btn btn-primary text-sm btn-sm px-3 py-3 rounded-lg flex items-center gap-2">
                    <iconify-icon icon="ion:arrow-back-outline" class="icon text-xl line-height-1"></iconify-icon>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.fleets.update', $fleet) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                    @csrf
                    @method('PUT')

                    <div class="col-span-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $fleet->title) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                    </div>

                    <div class="col-span-6">
                        <label for="model_class" class="form-label">Model Class</label>
                        <input type="text" id="model_class" name="model_class" value="{{ old('model_class', $fleet->model_class) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                    </div>

                    <div class="col-span-6">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" accept="image/*" class="mt-1 border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                    </div>

                    <div class="col-span-6">
                        <label for="current-image" class="form-label">Current Image</label>
                        <img src="{{ asset($fleet->image) }}" alt="{{ $fleet->title }}" class="border rounded-lg w-full h-32 object-cover">
                    </div>

                    <div class="col-span-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>{{ old('description', $fleet->description) }}</textarea>
                    </div>

                    <div class="col-span-12 grid grid-cols-5 gap-4">
                        <div>
                            <label for="start_model_year" class="form-label">Start Model Year</label>
                            <input type="number" id="start_model_year" name="start_model_year" value="{{ old('start_model_year', $fleet->start_model_year) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('start_model_year')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="end_model_year" class="form-label">End Model Year</label>
                            <input type="number" id="end_model_year" name="end_model_year" value="{{ old('end_model_year', $fleet->end_model_year) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('end_model_year')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="fleet_size" class="form-label">Fleet Size</label>
                            <input type="number" id="fleet_size" name="fleet_size" value="{{ old('fleet_size', $fleet->fleet_size) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('fleet_size')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="engine_count" class="form-label">Engine Count</label>
                            <input type="number" id="engine_count" name="engine_count" value="{{ old('engine_count', $fleet->engine_count) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('engine_count')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="passenger" class="form-label">Passenger</label>
                            <input type="number" id="passenger" name="passenger" value="{{ old('passenger', $fleet->passenger) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('passenger')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="range" class="form-label">Range</label>
                            <input type="number" id="range" name="range" value="{{ old('range', $fleet->range) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('range')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="max_cruising_speed" class="form-label">Max Cruising Speed</label>
                            <input type="number" id="max_cruising_speed" name="max_cruising_speed" value="{{ old('max_cruising_speed', $fleet->max_cruising_speed) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('max_cruising_speed')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="ceiling" class="form-label">Ceiling</label>
                            <input type="number" id="ceiling" name="ceiling" value="{{ old('ceiling', $fleet->ceiling) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('ceiling')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="take_off_distance" class="form-label">Take Off Distance</label>
                            <input type="number" id="take_off_distance" name="take_off_distance" value="{{ old('take_off_distance', $fleet->take_off_distance) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('take_off_distance')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="landing_distance" class="form-label">Landing Distance</label>
                            <input type="number" id="landing_distance" name="landing_distance" value="{{ old('landing_distance', $fleet->landing_distance) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('landing_distance')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-6 flex items-center">
                        <label class="inline-flex items-center cursor-pointer">
                            <!-- Hidden input for status -->
                            <input type="hidden" name="status" value="0"> <!-- default to 0 (inactive) -->

                            <!-- Checkbox for status -->
                            <input type="checkbox" id="status" name="status" value="1" class="sr-only peer" {{ old('status', $fleet->status) ? 'checked' : '' }}>
                            <span class="relative w-11 h-6 bg-gray-400 peer-focus:outline-none rounded-full peer dark:bg-gray-500 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-600"></span>
                            <span class="line-height-1 font-medium ms-3 peer-checked:text-primary-600 text-md text-gray-600 dark:text-gray-300">
                                Status
                            </span>
                        </label>
                    </div>

                    <div class="col-span-6 flex justify-end">
                        <button type="submit" class="btn px-3 py-3 text-sm btn-sm bg-green-500 text-white rounded-lg flex items-center hover:bg-green-600 transition">
                            UPDATE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.admin>
