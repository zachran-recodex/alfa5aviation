<x-dashboard-layout>
    <x-notification :displayDuration="8000" :soundEffect="true" />

    <div class="flex justify-between items-center mb-2">
        <h2 class="text-4xl font-bold mb-2">SEO</h2>

        <x-breadcrumb :links="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'SEO', 'url' => route('dashboard.seo.index')],
            ['label' => 'Manage SEO', 'url' => null],
        ]" />
    </div>

    <div class="w-full mx-auto my-4">
        <div class="border border-gray-200 rounded-lg bg-gray-50 shadow-sm">

            <div class="border-b border-gray-200 py-2 px-4 flex justify-between items-center">
                <h3 class="text-lg font-medium">
                    Manage SEO
                </h3>
            </div>

            <div class="p-4 relative overflow-x-auto">

                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Page
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Title
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($seos as $seo)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ ucfirst($seo->page) }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $seo->title ?? 'No title' }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ route('dashboard.seo.edit', $seo->page) }}"
                                       class="btn-action-success">
                                        <iconify-icon icon="lucide:edit"></iconify-icon>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
