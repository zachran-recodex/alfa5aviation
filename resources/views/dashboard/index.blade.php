<x-dashboard-layout>

    <div class="flex justify-between items-center mb-2">
        <h2 class="text-4xl font-bold mb-2">Dashboard</h2>

        <x-breadcrumb :links="[
            ['label' => 'Dashboard', 'url' => null],
        ]" />
    </div>

    <div class="w-full mx-auto my-4">
        <div class="border border-gray-200 rounded-lg bg-gray-50 overflow-hidden shadow-sm">
            <div class="p-6">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</x-dashboard-layout>
