<x-dashboard-layout>

    <div class="flex justify-between items-center mb-2">
        <h2 class="text-4xl font-bold mb-2">SEO</h2>

        <x-breadcrumb :links="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'SEO', 'url' => route('dashboard.seo.index')],
            ['label' => ucfirst($seo->page), 'url' => route('dashboard.seo.update', $seo->page)],
            ['label' => 'Edit SEO', 'url' => null],
        ]" />
    </div>

    <div class="w-full mx-auto my-4">
        <div class="border border-gray-200 rounded-lg bg-gray-50 shadow-sm">

            <div class="border-b border-gray-200 py-2 px-4 flex justify-between items-center">
                <h3 class="text-lg font-medium">
                    Edit SEO for {{ ucfirst($seo->page) }}
                </h3>

                <a href="{{ route('dashboard.seo.index') }}" class="btn-primary">
                    Back
                </a>
            </div>

            <div class="p-4">

                <form action="{{ route('dashboard.seo.update', $seo->page) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div class="col-span-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-input" value="{{ old('title', $seo->title) }}" required />
                        @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Meta Description -->
                    <div class="col-span-12">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea id="meta_description" name="meta_description" class="form-input" rows="5">{{ old('meta_description', $seo->meta_description) }}</textarea>
                        @error('meta_description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Meta Keyword -->
                    <div class="col-span-12">
                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                        <input type="text" id="meta_keywords" name="meta_keywords" class="form-input" value="{{ old('meta_keywords', $seo->meta_keywords) }}" required />
                        @error('meta_keywords')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-12">
                        <label for="canonical_url" class="form-label">Canonical URL</label>
                        <input type="url" id="canonical_url" name="canonical_url" class="form-input" value="{{ old('canonical_url', $seo->canonical_url) }}" />
                        @error('canonical_url')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="col-span-12 flex justify-end">
                        <button type="submit" class="btn-success">
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
