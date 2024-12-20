<x-layout.admin>
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Page Setup</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Page Setup</li>
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
                <h5 class="card-title text-lg mb-0">Page Setup</h5>
            </div>
            <div class="card-body flex items-start gap-6">
                <div class="style-pill-button">
                    <ul class="flex flex-col text-sm font-medium text-start" id="vertical-tab" data-tabs-toggle="#vertical-tab-content" role="tablist">
                        @foreach (['home', 'about', 'service', 'blog', 'contact', 'fleet'] as $page)
                            <li role="presentation">
                                <button class="inline-block px-4 py-2.5 font-semibold rounded-md hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                        id="vertical-{{ $page }}-tab" data-tabs-target="#vertical-{{ $page }}"
                                        type="button" role="tab" aria-controls="vertical-{{ $page }}" aria-selected="false">
                                    {{ ucfirst($page) }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div id="vertical-tab-content" class="w-full">
                    @foreach (['home', 'about', 'service', 'blog', 'contact', 'fleet'] as $page)
                        <div id="vertical-{{ $page }}" role="tabpanel" aria-labelledby="vertical-{{ $page }}-tab">
                            <form action="{{ route('admin.page-setups.store', $page) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                                @csrf

                                <div class="col-span-12">
                                    <label for="meta_title_{{ $page }}" class="form-label">Meta Title</label>
                                    <input type="text" id="meta_title_{{ $page }}" name="meta_title"
                                           value="{{ old('meta_title', $pageSetups[$page]->meta_title ?? '') }}"
                                           class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                                    @error('meta_title')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-12">
                                    <label for="meta_description_{{ $page }}" class="form-label">Meta Description</label>
                                    <textarea id="meta_description_{{ $page }}" name="meta_description" rows="4" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>{{ old('meta_description', $pageSetups[$page]->meta_description ?? '') }}</textarea>
                                    @error('meta_description')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-12">
                                    <label for="meta_keywords_{{ $page }}" class="block text-gray-700">Meta Keywords</label>
                                    <textarea id="meta_keywords_{{ $page }}" name="meta_keywords" rows="4" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>{{ old('meta_keywords', $pageSetups[$page]->meta_keywords ?? '') }}</textarea>
                                    @error('meta_keywords')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-span-12 flex justify-end">
                                    <button type="submit" class="btn px-3 py-3 text-sm btn-sm bg-green-500 text-white rounded-lg flex items-center hover:bg-green-600 transition">
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

    <script>
        document.querySelectorAll('[data-tabs-target]').forEach(button => {
            button.addEventListener('click', () => {
                const target = document.querySelector(button.dataset.tabsTarget);
                document.querySelectorAll('#vertical-tab-content > div').forEach(tab => tab.classList.add('hidden'));
                target.classList.remove('hidden');
            });
        });
    </script>
</x-layout.admin>
