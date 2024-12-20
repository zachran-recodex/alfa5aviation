<x-layout.admin>
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Service</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Service - Create</li>
        </ul>
    </div>

    <div class="col-span-12">
        <div class="card border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center flex-wrap gap-3 justify-between">
                <h5 class="card-title text-lg mb-0">Create Service</h5>
                <a href="{{ route('admin.services.index') }}" class="btn btn-primary text-sm btn-sm px-3 py-3 rounded-lg flex items-center gap-2">
                    <iconify-icon icon="ion:arrow-back-outline" class="icon text-xl line-height-1"></iconify-icon>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                    @csrf

                    <div class="col-span-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                    </div>

                    <div class="col-span-12">
                        <label for="image" class="form-label" >Image</label>
                        <input type="file" id="image" name="image" accept="image/*" class="border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                    </div>

                    <div class="col-span-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required></textarea>
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
