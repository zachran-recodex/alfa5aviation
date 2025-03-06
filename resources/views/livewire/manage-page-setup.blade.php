<div class="bg-white sm:rounded-lg p-6 relative rounded-xl border border-neutral-200 dark:border-neutral-700">
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Tab Navigation -->
    <div class="mb-6">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8">
                @foreach($availablePages as $tabKey => $tabName)
                    <a
                        href="#"
                        wire:click.prevent="changeTab('{{ $tabKey }}')"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm {{ $activeTab === $tabKey ? 'border-primary-500 text-primary-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}"
                    >
                        {{ $tabName }}
                    </a>
                @endforeach
            </nav>
        </div>
    </div>

    <!-- Page Setup Form -->
    <div>
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $availablePages[$activeTab] ?? 'Page' }} SEO Setup</flux:heading>
                <flux:subheading>
                    Configure SEO settings for this page to improve visibility in search engines.
                </flux:subheading>
            </div>

            <form wire:submit.prevent="save" class="space-y-6">
                <div>
                    <flux:field>
                        <flux:label for="title">Page Title</flux:label>

                        <flux:input id="title" wire:model="title" placeholder="Enter page title" />
                        <flux:description>
                            This will appear in browser tabs and search engine results. Recommended length: 50-60 characters.
                        </flux:description>

                        <flux:error name="title" />
                    </flux:field>
                </div>

                <div>
                    <flux:field>
                        <flux:label for="meta_description">Meta Description</flux:label>

                        <flux:textarea id="meta_description" wire:model="meta_description" rows="3" placeholder="Enter meta description" />
                        <flux:description>
                            A brief summary of the page content. This appears in search engine results. Recommended length: 150-160 characters.
                        </flux:description>

                        <flux:error name="meta_description" />
                    </flux:field>
                </div>

                <div>
                    <flux:field>
                        <flux:label for="meta_keywords">Meta Keywords</flux:label>

                        <flux:input id="meta_keywords" wire:model="meta_keywords" placeholder="e.g. aviation, airline, flight, travel" />
                        <flux:description>
                            Comma-separated keywords related to this page. Less important for SEO nowadays but still used by some search engines.
                        </flux:description>

                        <flux:error name="meta_keywords" />
                    </flux:field>
                </div>

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" class="cursor-pointer bg-primary-600! hover:bg-primary-700! text-white!" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="save">Save Changes</span>
                        <span wire:loading wire:target="save">Saving...</span>
                    </flux:button>
                </div>
            </form>
        </div>
    </div>
</div>
