<x-dashboard-layout>

    <div class="flex justify-between items-center mb-2">
        <h2 class="text-4xl font-bold mb-2">Partner</h2>

        <x-breadcrumb :links="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Partner', 'url' => route('dashboard.partner.index')],
            ['label' => 'Create Partner', 'url' => null],
        ]" />
    </div>

    <div class="w-full mx-auto my-4">
        <div class="border border-gray-200 rounded-lg bg-gray-50 shadow-sm">

            <div class="border-b border-gray-200 py-2 px-4 flex justify-between items-center">
                <h3 class="text-lg font-medium">
                    Create Partner
                </h3>

                <a href="{{ route('dashboard.partner.index') }}" class="btn-primary">
                    Back
                </a>
            </div>

            <div class="p-4">

                <form action="{{ route('dashboard.partner.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                    @csrf

                    <div class="col-span-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-input" required />
                        @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-input-file" />
                        @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

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
