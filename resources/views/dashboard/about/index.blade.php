<x-dashboard-layout>

    <div class="flex justify-between items-center mb-2">
        <h2 class="text-4xl font-bold mb-2">About</h2>

        <x-breadcrumb :links="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'About', 'url' => route('dashboard.about.index')],
            ['label' => 'Manage About', 'url' => null],
        ]" />
    </div>

    <div class="w-full mx-auto my-4">
        <div class="border border-gray-200 rounded-lg bg-gray-50 shadow-sm">

            <div class="border-b border-gray-200 py-2 px-4 flex justify-between items-center">
                <h3 class="text-lg font-medium">
                  Manage About
                </h3>
            </div>

            <div class="p-4">

                <form action="{{ route('dashboard.about.manage') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                    @csrf

                    <div class="col-span-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $about->title) }}" required />

                        <label for="image" class="form-label pt-2">Image</label>
                        <input id="image" type="file" class="form-input-file" />
                    </div>

                    <div class="col-span-6">
                        <label for="current-image" class="form-label">Current Image</label>
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" class="border rounded-lg w-full h-64 object-cover">
                    </div>

                    <div class="col-span-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-input" rows="5">{{ old('description', $about->description) }}</textarea>
                    </div>

                    <div class="col-span-6">
                        <label for="vision" class="form-label">Vision</label>
                        <textarea id="vision" name="vision" class="form-input" rows="2">{{ old('vision', $about->vision) }}</textarea>
                    </div>

                    <div class="col-span-6">
                        <label for="mission" class="form-label">Mission</label>
                        <textarea id="mission" name="mission" class="form-input" rows="2">{{ old('mission', $about->mission) }}</textarea>
                    </div>

                    <div class="col-span-12 flex justify-end">
                        <button type="submit" class="btn-primary">
                            Update
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-dashboard-layout>
