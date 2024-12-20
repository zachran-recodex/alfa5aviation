<x-layout.admin>
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Partner</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Partner - Create</li>
        </ul>
    </div>

    <div class="col-span-12">
        <div class="card border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center flex-wrap gap-3 justify-between">
                <h5 class="card-title text-lg mb-0">Create Partner</h5>
                <a href="{{ route('admin.partners.index') }}" class="btn btn-primary text-sm btn-sm px-3 py-3 rounded-lg flex items-center gap-2">
                    <iconify-icon icon="ion:arrow-back-outline" class="icon text-xl line-height-1"></iconify-icon>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                    @csrf

                    <div class="col-span-6">
                        <label for="title" class="form-label" >Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $partner->title) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                        @error('title')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label for="url" class="form-label" >Url</label>
                        <input type="url" id="url" name="url" value="{{ old('url', $partner->url) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                        @error('url')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label for="image" class="form-label" >Image</label>
                        <input type="file" id="image" name="image" accept="image/*" class="border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                        @error('image')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label for="current_image" class="form-label" >Current Image</label>
                        <img src="{{ asset($partner->image) }}" alt="{{ $partner->title }}" class="border rounded-lg w-full h-32 object-cover">
                    </div>

                    <div class="col-span-6 flex items-center">
                        <label class="inline-flex items-center cursor-pointer">
                            <!-- Hidden input for status -->
                            <input type="hidden" name="status" value="0"> <!-- default to 0 (inactive) -->

                            <!-- Checkbox for status -->
                            <input type="checkbox" id="status" name="status" value="1" class="sr-only peer" {{ old('status', $partner->status) ? 'checked' : '' }}>
                            <span class="relative w-11 h-6 bg-gray-400 peer-focus:outline-none rounded-full peer dark:bg-gray-500 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-600"></span>
                            <span class="line-height-1 font-medium ms-3 peer-checked:text-primary-600 text-md text-gray-600 dark:text-gray-300">
                                Status
                            </span>
                        </label>
                    </div>

                    <div class="col-span-6 flex justify-end">
                        <button type="submit" class="btn px-3 py-3 text-sm btn-sm bg-green-500 text-white rounded-lg flex items-center hover:bg-green-600 transition">
                            CREATE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.admin>
