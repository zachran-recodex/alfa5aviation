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
            <li class="font-medium dark:text-white">Fleet - Create</li>
        </ul>
    </div>

    <div class="col-span-12">
        <div class="card border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center flex-wrap gap-3 justify-between">
                <h5 class="card-title text-lg mb-0">Create Fleet</h5>
                <a href="{{ route('admin.fleets.index') }}" class="btn btn-primary text-sm btn-sm px-3 py-3 rounded-lg flex items-center gap-2">
                    <iconify-icon icon="ion:arrow-back-outline" class="icon text-xl line-height-1"></iconify-icon>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.fleets.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                    @csrf

                    <div class="col-span-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                        @error('title')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label for="model_class" class="form-label">Model Class</label>
                        <input type="text" id="model_class" name="model_class" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                        @error('model_class')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-12">
                        <label for="image" class="form-label" >Image</label>
                        <input type="file" id="image" name="image" accept="image/*" class="border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                        @error('image')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required></textarea>
                        @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-12 grid grid-cols-5 gap-4">
                        <div>
                            <label for="start_model_year" class="form-label">Start Model Year</label>
                            <input type="number" id="start_model_year" name="start_model_year" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('start_model_year')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="end_model_year" class="form-label">End Model Year</label>
                            <input type="number" id="end_model_year" name="end_model_year" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('end_model_year')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="fleet_size" class="form-label">Fleet Size</label>
                            <input type="number" id="fleet_size" name="fleet_size" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('fleet_size')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="engine_count" class="form-label">Engine Count</label>
                            <input type="number" id="engine_count" name="engine_count" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('engine_count')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="passenger" class="form-label">Passenger</label>
                            <input type="number" id="passenger" name="passenger" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('passenger')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="range" class="form-label">Range</label>
                            <input type="number" id="range" name="range" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('range')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="max_cruising_speed" class="form-label">Max Cruising Speed</label>
                            <input type="number" id="max_cruising_speed" name="max_cruising_speed" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('max_cruising_speed')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="ceiling" class="form-label">Ceiling</label>
                            <input type="number" id="ceiling" name="ceiling" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('ceiling')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="take_off_distance" class="form-label">Take Off Distance</label>
                            <input type="number" id="take_off_distance" name="take_off_distance" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('take_off_distance')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="landing_distance" class="form-label">Landing Distance</label>
                            <input type="number" id="landing_distance" name="landing_distance" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            @error('landing_distance')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-span-12 flex justify-end">
                        <button type="submit" class="btn px-3 py-3 text-sm btn-sm bg-green-500 text-white rounded-lg flex items-center hover:bg-green-600 transition">
                            CREATE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.admin>
