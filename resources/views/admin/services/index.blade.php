<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between flex-wrap gap-2">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Service') }}
            </h2>

            <a href="{{ route('admin.services.create') }}"
                class="md:flex bg-alfa5-500 hover:bg-alfa5-600 px-6 py-2 rounded-md hidden items-center gap-3 text-sm font-semibold">
                <p class="text-sm text-white font-medium text-default-700">ADD</p>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto custom-scroll">
                    <div class="min-w-full inline-block align-middle whitespace-nowrap">
                        <div class="overflow-hidden">
                            <table class="min-w-full table-auto border-collapse">
                                <thead class="bg-light/40 border-b border-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 text-start">Title</th>
                                        <th class="px-6 py-3 text-start">Image</th>
                                        <th class="px-6 py-3 text-start">Status</th>
                                        <th class="px-6 py-3 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($services as $service)
                                        <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                                            <td class="px-6 py-3">{{ $service->title }}</td>
                                            <td class="px-6 py-3">
                                                <img src="{{ Storage::url($service->image) }}"
                                                    alt="{{ $service->title }}" class="w-16 h-16 object-cover">
                                            </td>
                                            <td class="px-6 py-3">{{ ucfirst($service->status) }}</td>
                                            <td class="px-6 py-3 text-center">
                                                <a href="{{ route('admin.services.edit', $service) }}"
                                                    class="me-3 px-2 py-1 bg-yellow-300 text-white text-xs rounded hover:bg-yellow-400 transition">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.services.destroy', $service) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="px-2 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700 transition"
                                                        onclick="return confirm('Are you sure you want to delete this service?');">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-3 text-center text-gray-500">No services
                                                available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
