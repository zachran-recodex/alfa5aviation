<x-dashboard-layout>

    <x-notification :displayDuration="8000" :soundEffect="true" />

    <div class="flex justify-between items-center mb-2">
        <h2 class="text-4xl font-bold mb-2">Setting</h2>

        <x-breadcrumb :links="[
            ['label' => 'Dashboard', 'url' => route('dashboard')],
            ['label' => 'Setting', 'url' => route('dashboard.setting.index')],
            ['label' => 'Manage Setting', 'url' => null],
        ]" />
    </div>

    <div class="w-full mx-auto my-4">
        <div class="border border-gray-200 rounded-lg bg-gray-50 shadow-sm">

            <div class="border-b border-gray-200 py-2 px-4 flex justify-between items-center">
                <h3 class="text-lg font-medium">
                    Manage Setting
                </h3>
            </div>

            <div class="p-4">
                <form action="{{ route('dashboard.setting.manage') }}" method="POST" enctype="multipart/form-data"
                      class="grid grid-cols-12 gap-4">
                    @csrf
                    @method('PUT')

                    <!-- Logo -->
                    <div class="col-span-6">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" id="logo" name="logo" class="form-input-file" />
                        @if($setting->logo)
                            <label for="current-logo" class="form-label pt-2">Current Logo</label>
                            <img src="{{ asset('storage/' . $setting->logo) }}" alt="Current Logo"
                                 class="border rounded-lg w-full h-32 object-contain">
                        @endif
                    </div>

                    <!-- Favicon -->
                    <div class="col-span-6">
                        <label for="favicon" class="form-label">Favicon</label>
                        <input type="file" id="favicon" name="favicon" class="form-input-file" />
                        @if($setting->favicon)
                            <label for="current-favicon" class="form-label pt-2">Current Favicon</label>
                            <img src="{{ asset('storage/' . $setting->favicon) }}" alt="Current Favicon"
                                 class="border rounded-lg w-full h-32 object-contain">
                        @endif
                    </div>

                    <!-- Phone Numbers -->
                    <div class="col-span-6">
                        <label for="phone_one" class="form-label">Phone Number 1</label>
                        <input type="text" id="phone_one" name="phone_one" class="form-input"
                               value="{{ old('phone_one', $setting->phone_one) }}" />
                    </div>

                    <div class="col-span-6">
                        <label for="phone_two" class="form-label">Phone Number 2</label>
                        <input type="text" id="phone_two" name="phone_two" class="form-input"
                               value="{{ old('phone_two', $setting->phone_two) }}" />
                    </div>

                    <!-- Emails -->
                    <div class="col-span-6">
                        <label for="email_one" class="form-label">Email 1</label>
                        <input type="email" id="email_one" name="email_one" class="form-input"
                               value="{{ old('email_one', $setting->email_one) }}" />
                    </div>

                    <div class="col-span-6">
                        <label for="email_two" class="form-label">Email 2</label>
                        <input type="email" id="email_two" name="email_two" class="form-input"
                               value="{{ old('email_two', $setting->email_two) }}" />
                    </div>

                    <!-- Social Media Links -->
                    <div class="col-span-6">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" id="instagram" name="instagram" class="form-input"
                               value="{{ old('instagram', $setting->instagram) }}" />
                    </div>

                    <div class="col-span-6">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" id="linkedin" name="linkedin" class="form-input"
                               value="{{ old('linkedin', $setting->linkedin) }}" />
                    </div>

                    <div class="col-span-6">
                        <label for="tiktok" class="form-label">TikTok</label>
                        <input type="text" id="tiktok" name="tiktok" class="form-input"
                               value="{{ old('tiktok', $setting->tiktok) }}" />
                    </div>

                    <div class="col-span-6">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" id="facebook" name="facebook" class="form-input"
                               value="{{ old('facebook', $setting->facebook) }}" />
                    </div>

                    <!-- Address -->
                    <div class="col-span-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" rows="3" class="form-input">{{ old('address', $setting->address) }}</textarea>
                    </div>

                    <!-- Footer Text -->
                    <div class="col-span-12">
                        <label for="footer_text" class="form-label">Footer Text</label>
                        <textarea id="footer_text" name="footer_text" rows="3" class="form-input">{{ old('footer_text', $setting->footer_text) }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-span-12 flex justify-end">
                        <button type="submit" class="btn-primary">
                            Update
                        </button>
                    </div>
                </form>
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
                        variant: 'danger',
                        title: 'Error!',
                        message: '{{ $errors->first() }}'
                    }
                }));
            });
        </script>
    @endif
</x-dashboard-layout>
