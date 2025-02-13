<x-dashboard-layout>

    <x-notification :displayDuration="8000" :soundEffect="true" />

    <div class="flex justify-between items-center mb-2">
        <h2 class="text-4xl font-bold mb-2">Contact</h2>

        <x-breadcrumb :links="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Contact', 'url' => route('dashboard.contact.index')],
            ['label' => 'List Contact', 'url' => null],
        ]" />
    </div>

    <div class="w-full mx-auto my-4">
        <div class="border border-gray-200 rounded-lg bg-gray-50 shadow-sm">

            <div class="p-4 relative overflow-x-auto">

                <div
                    class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                               class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Search for items">
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Name
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Email
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Subject
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($contacts as $contact)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $contact->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $contact->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $contact->subject }}
                                </td>
                                <td class="px-6 py-4 space-x-2 text-center">
                                    <a href="{{ route('dashboard.contact.show', $contact) }}"
                                       class="btn-action-success">
                                        <iconify-icon icon="lucide:eye"></iconify-icon>
                                    </a>
                                    <form action="{{ route('dashboard.contact.destroy', $contact) }}" method="POST"
                                          class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-action-danger"
                                                onclick="return confirm('Are you sure you want to delete this Hero Section?');">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    No Contacts Available
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <nav class="flex items-center justify-end p-4 border-t" aria-label="Table navigation">
                        {{ $contacts->links() }}
                    </nav>
                </div>
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
