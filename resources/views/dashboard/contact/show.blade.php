<x-dashboard-layout>

    <div class="flex justify-between items-center mb-2">
        <h2 class="text-4xl font-bold mb-2">Contact</h2>

        <x-breadcrumb :links="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Contact', 'url' => route('dashboard.contact.index')],
            ['label' => $contact->name, 'url' => null],
        ]" />
    </div>

    <div class="w-full mx-auto my-4">
        <div class="border border-gray-200 rounded-lg bg-gray-50 shadow-sm">

            <div class="border-b border-gray-200 py-2 px-4 flex justify-between items-center">
                <h3 class="text-lg font-medium">
                    Details Contact
                </h3>

                <a href="{{ route('dashboard.contact.index') }}" class="btn-primary">Back</a>
            </div>

            <div class="p-4">

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
                        <h5 class="text-default-700 text-md font-semibold">Subject</h5>
                        <p class="text-gray-600">{{ $contact->subject }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <h5 class="text-default-700 text-md font-semibold">Message</h5>
                        <p class="text-gray-600">{{ $contact->message }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-dashboard-layout>
