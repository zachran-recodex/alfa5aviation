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

    <!-- About Form Section -->
    <form wire:submit.prevent="save" class="space-y-6">
        <!-- Existing Image Preview -->
        @if ($image)
            <div>
                <flux:label>Existing Image</flux:label>
                <div class="mt-2">
                    <img src="{{ Storage::url($image) }}" alt="About Image" class="h-32 w-auto object-cover rounded">
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <flux:textarea rows="3" label="Vision" wire:model="vision" />

            <flux:textarea rows="3" label="Mission" wire:model="mission" />
        </div>

        <div class="flex">
            <flux:spacer />

            <flux:button type="submit" class="cursor-pointer bg-primary-600! hover:bg-primary-700! text-white!" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="save">Update</span>
                <span wire:loading wire:target="save">Saving...</span>
            </flux:button>
        </div>
    </form>
</div>
