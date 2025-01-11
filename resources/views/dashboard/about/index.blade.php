<x-dashboard-layout>

    <x-notification :displayDuration="8000" :soundEffect="true" />

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

                <form action="{{ route('dashboard.about.manage') }}" method="POST" enctype="multipart/form-data"
                    class="grid grid-cols-12 gap-4">
                    @csrf
                    @method('PUT')

                    <div class="col-span-6">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" name="title" class="form-input"
                            value="{{ old('title', $about->title) }}" required />

                        <label for="image" class="form-label pt-2">Image</label>
                        <input type="file" id="image" name="image" class="form-input-file" />
                    </div>

                    <div class="col-span-6">
                        <label for="current-image" class="form-label">Current Image</label>
                        <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}"
                            class="border rounded-lg w-full h-64 object-cover">
                    </div>

                    <div class="col-span-12">
                        <label for="description" class="form-label">Description</label>
                        <div id="editor-description" class="form-input" style="height: 150px;">
                            {!! old('description', $about->description) !!}
                        </div>
                        <input type="hidden" id="description" name="description"
                            value="{{ old('description', $about->description) }}">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi Quill
            var quill = new Quill('#editor-description', {
                theme: 'snow',
                placeholder: 'Enter the description here...',
                modules: {
                    toolbar: [
                        [{
                            header: [1, 2, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['link', 'blockquote', 'code-block'],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }],
                        ['clean'] // Clear formatting
                    ]
                }
            });

            // Sinkronisasi konten Quill dengan input hidden saat form dikirim
            var descriptionInput = document.querySelector('#description');
            var form = document.querySelector('form');

            form.addEventListener('submit', function() {
                descriptionInput.value = quill.root.innerHTML;
            });
        });
    </script>
</x-dashboard-layout>
