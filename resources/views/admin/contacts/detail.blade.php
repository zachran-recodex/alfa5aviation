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
            <li class="font-medium dark:text-white">Contact - Show</li>
        </ul>
    </div>

    <div class="col-span-12">
        <div class="card border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center flex-wrap gap-3 justify-between">
                <h5 class="card-title text-lg mb-0">Show Contact</h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary text-sm btn-sm px-3 py-3 rounded-lg flex items-center gap-2">
                    <iconify-icon icon="ion:arrow-back-outline" class="icon text-xl line-height-1"></iconify-icon>
                    BACK
                </a>
            </div>
            <div class="card-body">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <h5 class="text-default-700 text-md font-semibold">Name</h5>
                        <p class="text-gray-600">{{ $contact->name }}</p>
                    </div>
                    <div>
                        <h5 class="text-default-700 text-md font-semibold">Phone</h5>
                        <p class="text-gray-600">{{ $contact->phone }}</p>
                    </div>
                    <div>
                        <h5 class="text-default-700 text-md font-semibold">Email</h5>
                        <p class="text-gray-600">{{ $contact->email }}</p>
                    </div>
                    <div>
                        <h5 class="text-default-700 text-md font-semibold">Contact</h5>
                        <p class="text-gray-600">{{ $services[$contact->service] }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <h5 class="text-default-700 text-md font-semibold">Message</h5>
                        <p class="text-gray-600">{{ $contact->message }}</p>
                    </div>
                </div>

                <!-- Start: Contact Buttons -->
                <div class="mt-6 flex flex-wrap gap-4">
                    <!-- Call Button -->
                    <a href="tel:{{ $contact->phone }}"
                       class="px-4 py-2 bg-sagala-600 text-white rounded hover:bg-sagala-700 transition">
                        Call
                    </a>

                    <!-- Email Button -->
                    <a href="mailto:{{ $contact->email }}"
                       class="px-4 py-2 bg-sagala-600 text-white rounded hover:bg-sagala-700 transition">
                        Email
                    </a>

                    <!-- WhatsApp Button -->
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" target="_blank"
                       class="px-4 py-2 bg-sagala-600 text-white rounded hover:bg-sagala-700 transition">
                        WhatsApp
                    </a>
                </div>
                <!-- End: Contact Buttons -->
            </div>
        </div>
    </div>
</x-layout.admin>
