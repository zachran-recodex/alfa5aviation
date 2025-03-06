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

    <!-- Contact List Section -->
    <div>
        <div class="mb-4">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="w-64">
                    <flux:input wire:model.debounce.300ms="search" icon="magnifying-glass" placeholder="Cari pesan..." />
                </div>

                <div class="flex items-center">
                    <flux:checkbox wire:model.live="showUnreadOnly" label="Show unread only" />
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr class="bg-gray-50">
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sender</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @forelse ($contacts as $contact)
                    <tr class="hover:bg-gray-50 {{ !$contact->is_read ? 'bg-yellow-50' : 'bg-green-50' }}">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $contact->name }}</div>
                            <div class="text-sm text-gray-500">{{ $contact->email }}</div>
                            <div class="text-sm text-gray-500">{{ $contact->phone }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ Str::limit($contact->subject, 30) }}</div>
                            <div class="text-sm text-gray-500">{{ Str::limit($contact->message, 50) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $contact->created_at->format('d M Y, H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            @if($contact->is_read)
                                <flux:badge color="green" size="sm">Read</flux:badge>
                            @else
                                <flux:badge color="yellow" size="sm">Unread</flux:badge>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                            <flux:button class="cursor-pointer bg-blue-500! hover:bg-blue-600! text-white!" wire:click="viewDetails({{ $contact->id }})" icon="eye"></flux:button>
                            <flux:button class="cursor-pointer bg-red-500! hover:bg-red-600! text-white!" wire:click="confirmDelete({{ $contact->id }})" icon="trash"></flux:button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                            <div class="flex flex-col items-center justify-center py-6">
                                <flux:icon.envelope class="size-12" />
                                <i class="fa-solid fa-envelope text-4xl text-gray-300"></i>
                                <h3 class="mt-2 text-sm font-medium text-gray-900">
                                    No contact messages found
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">
                                    @if ($search)
                                        No messages match your search criteria.
                                    @elseif ($showUnreadOnly)
                                        No unread messages found.
                                    @else
                                        You have no messages yet.
                                    @endif
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $contacts->links() }}
        </div>
    </div>

    <!-- Contact Details Modal -->
    <flux:modal name="contact-details" class="w-7xl">
        @if($selectedContact)
            <div class="space-y-6">
                <div class="flex gap-4 items-center">
                    <flux:heading size="lg">Contact Message Details</flux:heading>

                    <!-- Status badge -->
                    <div>
                        @if($selectedContact->is_read)
                            <flux:badge color="green" size="md">Read</flux:badge>
                        @else
                            <flux:badge color="yellow" size="md">Unread</flux:badge>
                        @endif
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500 mb-1">Sender Name</p>
                            <p class="text-base font-medium">{{ $selectedContact->name }}</p>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500 mb-1">Email</p>
                            <p class="text-base">{{ $selectedContact->email }}</p>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500 mb-1">Phone</p>
                            <p class="text-base">{{ $selectedContact->phone }}</p>
                        </div>
                    </div>

                    <div>
                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500 mb-1">Date Received</p>
                            <p class="text-base">{{ $selectedContact->created_at->format('d F Y, H:i') }}</p>
                        </div>

                        <div class="mb-4">
                            <p class="text-sm font-medium text-gray-500 mb-1">Subject</p>
                            <p class="text-base font-medium">{{ $selectedContact->subject }}</p>
                        </div>
                    </div>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Message</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-base">
                        {{ $selectedContact->message }}
                    </div>
                </div>

                <div class="flex justify-between">
                    @if(!$selectedContact->is_read)
                        <flux:button class="cursor-pointer bg-blue-500! hover:bg-blue-600! text-white!" wire:click="markAsRead({{ $selectedContact->id }})">
                            Mark as Read
                        </flux:button>
                    @else
                        <div></div>
                    @endif

                    <flux:button class="cursor-pointer bg-red-500! hover:bg-red-600! text-white!" wire:click="confirmDelete({{ $selectedContact->id }})">
                        Delete Message
                    </flux:button>
                </div>
            </div>
        @endif
    </flux:modal>

    <!-- Delete Confirmation Modal -->
    <flux:modal name="delete-data" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete contact message?</flux:heading>

                <flux:subheading>
                    <p>Are you sure you want to delete this contact message?</p>
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
