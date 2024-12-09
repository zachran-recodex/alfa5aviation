<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Page Setup') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid">
                        <!-- Tabs -->
                        <ul id="tabs" class="flex justify-center border-b">
                            @foreach (['home', 'about', 'service', 'blog', 'contact', 'fleet'] as $tab)
                                <li class="mr-1">
                                    <a class="border-t-2 border-x-2 rounded-t-xl bg-white inline-block py-2 px-10 text-blue-500 hover:text-blue-700 font-semibold"
                                        href="#{{ $tab }}">{{ ucfirst($tab) }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Content -->
                        <div id="tab-contents">
                            @foreach (['home', 'about', 'service', 'blog', 'contact', 'fleet'] as $tab)
                                <div id="{{ $tab }}" class="p-6 {{ $loop->first ? '' : 'hidden' }}">
                                    <form action="{{ route('admin.page-setups.store', $tab) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div class="mb-4">
                                                <label for="title-{{ $tab }}"
                                                    class="block text-gray-700">Title</label>
                                                <input type="text" name="title" id="title-{{ $tab }}"
                                                    value="{{ old('title', $pageSetups[$tab]->title ?? '') }}"
                                                    class="mt-1 block w-full border-gray-300 rounded-md" required
                                                    oninput="updateSlug('{{ $tab }}')">
                                                @error('title')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-4">
                                                <label for="slug-{{ $tab }}"
                                                    class="block text-gray-700">Slug</label>
                                                <input type="text" name="slug" id="slug-{{ $tab }}"
                                                    value="{{ old('slug', $pageSetups[$tab]->slug ?? '') }}"
                                                    class="mt-1 block w-full border-gray-300 rounded-md" required
                                                    readonly>
                                                @error('slug')
                                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="meta_title-{{ $tab }}"
                                                class="block text-gray-700">Meta Title</label>
                                            <input type="text" name="meta_title" id="meta_title-{{ $tab }}"
                                                value="{{ old('meta_title', $pageSetups[$tab]->meta_title ?? '') }}"
                                                class="mt-1 block w-full border-gray-300 rounded-md" required>
                                            @error('meta_title')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="meta_description-{{ $tab }}"
                                                class="block text-gray-700">Meta
                                                Description</label>
                                            <textarea name="meta_description" id="meta_description-{{ $tab }}" rows="4"
                                                class="mt-1 block w-full border-gray-300 rounded-md" required>{{ old('meta_description', $pageSetups[$tab]->meta_description ?? '') }}</textarea>
                                            @error('meta_description')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="meta_keywords-{{ $tab }}"
                                                class="block text-gray-700">Meta Keywords</label>
                                            <textarea name="meta_keywords" id="meta_keywords-{{ $tab }}" rows="4"
                                                class="mt-1 block w-full border-gray-300 rounded-md" required>{{ old('meta_keywords', $pageSetups[$tab]->meta_keywords ?? '') }}</textarea>
                                            @error('meta_keywords')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mt-6">
                                            <button type="submit"
                                                class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition">
                                                UPDATE
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateSlug(tab) {
            const title = document.getElementById('title-' + tab).value;
            const slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/^-|-$/g, '');
            document.getElementById('slug-' + tab).value = slug;
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tabs functionality
            let tabsContainer = document.querySelector("#tabs");
            let tabTogglers = tabsContainer.querySelectorAll("a");

            tabTogglers.forEach(function(toggler) {
                toggler.addEventListener("click", function(e) {
                    e.preventDefault();

                    let tabName = this.getAttribute("href").substring(1);

                    // Hide all tabs
                    let tabContents = document.querySelectorAll("#tab-contents > div");
                    tabContents.forEach(function(content) {
                        content.classList.add("hidden");
                    });

                    // Show the clicked tab
                    document.getElementById(tabName).classList.remove("hidden");

                    // Update the active tab
                    tabTogglers.forEach(function(toggler) {
                        toggler.classList.remove("text-blue-700");
                        toggler.classList.add("text-blue-500");
                    });
                    this.classList.add("text-blue-700");
                });
            });
        });
    </script>
</x-app-layout>
