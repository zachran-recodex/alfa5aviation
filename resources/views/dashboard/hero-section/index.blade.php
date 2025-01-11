<x-dashboard-layout>

    <x-notification :displayDuration="8000" :soundEffect="true" />

    <div class="flex justify-between items-center mb-2">
        <h2 class="text-4xl font-bold mb-2">Hero Section</h2>

        <x-breadcrumb :links="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Hero Section', 'url' => route('dashboard.hero-section.index')],
            ['label' => 'Manage Hero Section', 'url' => null],
        ]" />
    </div>

    <div class="w-full mx-auto my-4">
        <div class="border border-gray-200 rounded-lg bg-gray-50 shadow-sm">

            <div class="border-b border-gray-200 py-2 px-4 flex justify-between items-center">
                <h3 class="text-lg font-medium">
                    Manage Hero Section
                </h3>
            </div>

            <div class="p-4">

                <form action="{{ route('dashboard.hero-section.manage') }}" method="POST" enctype="multipart/form-data"
                    class="grid grid-cols-12 gap-4">
                    @csrf
                    @method('PUT')

                    <div class="col-span-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-input"
                            value="{{ old('title', $heroSection->title) }}" required />

                        <label for="image" class="form-label pt-2">Image</label>
                        <input type="file" id="image" name="image" class="form-input-file" />
                    </div>

                    <div class="col-span-6">
                        <label for="current-image" class="form-label">Current Image</label>
                        <img src="{{ asset('storage/' . $heroSection->image) }}" alt="{{ $heroSection->title }}"
                            class="border rounded-lg w-full h-64 object-cover">
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

    @if (session('notification'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.dispatchEvent(new CustomEvent('notify', {
                    detail: {
                        variant: '{{ session('notification.variant') }}',
                        title: '{{ session('notification.title') }}',
                        message: '{{ session('notification.message') }}'
                    }
                }));
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                window.dispatchEvent(new CustomEvent('notify', {
                    detail: {
                        variant: 'danger', // Variant untuk notifikasi error
                        title: 'Error!',
                        message: '{{ $errors->first() }}' // Menampilkan pesan error pertama
                    }
                }));
            });
        </script>
    @endif
</x-dashboard-layout>
