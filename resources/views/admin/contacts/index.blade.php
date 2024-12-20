<x-layout.admin>
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Contact</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Contact</li>
        </ul>
    </div>

    <div class="col-span-12">
        <div class="card border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center flex-wrap gap-3 justify-between">
                <h5 class="card-title text-lg mb-0">Contact List</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table bordered-table mb-0">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($contacts as $contact)
                            <tr>
                                <td>
                                    <span class="text-lg text-secondary-light font-semibold grow">{{ $contact->name }}</span>
                                </td>
                                <td>
                                    {{ $contact->phone }}
                                </td>
                                <td>
                                    {{ $contact->email }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="w-8 h-8 bg-blue-100 dark:bg-blue-600/25 text-blue-600 dark:text-blue-400 rounded-full inline-flex items-center justify-center">
                                        <iconify-icon icon="mdi:show-outline"></iconify-icon>
                                    </a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="w-8 h-8 bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 rounded-full inline-flex items-center justify-center" onclick="return confirm('Are you sure you want to delete this Contact?');">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500">No Contacts
                                    Available
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-t border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex justify-end">
                {{ $contacts->links('components.pagination') }}
            </div>
        </div>
    </div>
</x-layout.admin>
