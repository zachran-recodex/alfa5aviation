<x-layout.admin>
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Hero Section</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Hero Section</li>
        </ul>
    </div>

    @if (session('toast'))
        <div class="flex justify-end mb-6">
            <x-toast type="{{ session('toast.type') }}" message="{{ session('toast.message') }}" />
        </div>
    @endif

    <div class="col-span-12">
        <div class="card border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center flex-wrap gap-3 justify-between">
                <h5 class="card-title text-lg mb-0">Update Hero Section</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.hero-sections.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                    @csrf

                    <div class="col-span-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $heroSection->title) }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>

                        <label for="image" class="form-label pt-5">Image</label>
                        <input type="file" name="image" id="image" accept="image/*" class="mt-1 border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                    </div>

                    <div class="col-span-6">
                        <label for="current-image" class="form-label">Current Image</label>
                        <img src="{{ asset($heroSection->image) }}" alt="{{ $heroSection->title }}" class="border rounded-lg w-full h-32 object-cover">
                    </div>

                    <div class="col-span-12 flex justify-end">
                        <button type="submit" class="btn px-3 py-3 text-sm btn-sm bg-green-500 text-white rounded-lg flex items-center hover:bg-green-600 transition">
                            UPDATE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.admin>
