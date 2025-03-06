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

    <!-- Blog List Section -->
    <div>
        <div class="mb-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="w-64">
                    <flux:input wire:model.debounce.300ms="search" icon="magnifying-glass" placeholder="Cari blog..." />
                </div>

                <flux:button icon="plus" class="cursor-pointer bg-primary-600! hover:bg-primary-700! text-white!" wire:click="create">Add Blog</flux:button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr class="bg-gray-50">
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($blogs as $blog)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $blog->title }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($blog->description, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="h-10 w-auto object-cover rounded">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if($blog->is_active)
                                <flux:badge color="green" size="sm">Active</flux:badge>
                            @else
                                <flux:badge color="red" size="sm">Nonactive</flux:badge>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <flux:button class="cursor-pointer bg-yellow-400! hover:bg-yellow-500! text-white!" wire:click="edit({{ $blog->id }})" icon="pencil"></flux:button>
                            <flux:button class="cursor-pointer bg-red-500! hover:bg-red-600! text-white!" wire:click="confirmDelete({{ $blog->id }})" icon="trash"></flux:button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <flux:icon.newspaper class="size-12" />
                                <h3 class="mt-2 text-sm font-medium text-gray-900">
                                    No blogs found
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    @if ($search)
                                        No blogs match your search criteria.
                                    @else
                                        Start by creating a new blog.
                                    @endif
                                </p>
                                @if (!$search)
                                    <div class="mt-6">
                                        <flux:button icon="plus" class="cursor-pointer bg-primary-600! hover:bg-primary-700! text-white!" wire:click="create">Add Blog</flux:button>
                                    </div>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $blogs->links() }}
        </div>
    </div>

    <!-- Input Form Modal -->
    <flux:modal name="form" class="w-7xl" @close="resetForm">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $isEditing ? 'Edit Blog' : 'Add Blog' }}</flux:heading>
            </div>

            <form wire:submit.prevent="save" class="space-y-6">
                <!-- Existing Image Preview -->
                @if ($image)
                    <div>
                        <flux:label>Existing Image</flux:label>
                        <div class="mt-2">
                            <img src="{{ Storage::url($image) }}" alt="Blog Image" class="h-32 w-auto object-cover rounded">
                        </div>
                    </div>
                @endif

                <!-- Image Upload -->
                <div>
                    <flux:field>
                        <flux:label for="newImage">Image</flux:label>

                        <flux:input type="file" id="newImage" wire:model="newImage" />

                        <div wire:loading wire:target="newImage" class="text-sm text-gray-500 mt-1">Uploading...</div>

                        <flux:error name="newImage" />
                    </flux:field>

                    <!-- Preview new image -->
                    @if ($newImage)
                        <div class="mt-2">
                            <img src="{{ $newImage->temporaryUrl() }}" alt="Preview" class="h-32 w-auto object-cover rounded">
                        </div>
                    @endif
                </div>

                <div>
                    <flux:field>
                        <flux:label for="title">Title</flux:label>

                        <flux:input id="title" wire:model="title" />

                        <flux:error name="title" />
                    </flux:field>
                </div>

                <div>
                    <flux:textarea rows="4" label="Description" wire:model="description" />
                </div>

                <div>
                    <flux:checkbox wire:model="is_active" label="Active" />
                </div>

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" class="cursor-pointer bg-primary-600! hover:bg-primary-700! text-white!" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="save">{{ $isEditing ? 'Update' : 'Save' }}</span>
                        <span wire:loading wire:target="save">Saving...</span>
                    </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    <!-- Delete Confirmation Modal -->
    <flux:modal name="delete-data" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete blog?</flux:heading>

                <flux:subheading>
                    <p>Are you sure you want to delete this blog?</p>
                    <p>This action cannot be undone.</p>
                </flux:subheading>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:button class="cursor-pointer bg-red-500! hover:bg-red-600! text-white!" wire:click="delete">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        // Listen for our custom events
        Livewire.on('flux-show-modal', ({ name }) => {
            window.Flux.modal(name).show();
        });

        Livewire.on('flux-close-modal', ({ name }) => {
            window.Flux.modal(name).close();
        });
    });
</script>
