<x-layout.admin>
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Blog</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Blog</li>
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
                <h5 class="card-title text-lg mb-0">Blog List</h5>
                <a href="{{ route('admin.blogs.create')  }}" class="btn btn-primary text-sm btn-sm px-3 py-3 rounded-lg flex items-center gap-2">
                    <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                    CREATE
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table bordered-table mb-0">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td>
                                    <span class="text-lg text-secondary-light font-semibold grow">{{ $blog->title }}</span>
                                </td>
                                <td class="flex justify-center">
                                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="border rounded-lg w-24 h-16 object-cover">
                                </td>
                                <td class="text-center">
                                    @if ($blog->status)
                                        <span class="bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 px-6 py-1.5 rounded-full font-medium text-sm">Active</span>
                                    @else
                                        <span class="bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 px-6 py-1.5 rounded-full font-medium text-sm">Disable</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="w-8 h-8 bg-success-100 dark:bg-success-600/25 text-success-600 dark:text-success-400 rounded-full inline-flex items-center justify-center">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>
                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="w-8 h-8 bg-danger-100 dark:bg-danger-600/25 text-danger-600 dark:text-danger-400 rounded-full inline-flex items-center justify-center" onclick="return confirm('Are you sure you want to delete this Blog?');">
                                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500">
                                    No Blogs Available
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-t border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex justify-end">
                {{ $blogs->links('components.pagination') }}
            </div>
        </div>
    </div>
</x-layout.admin>
