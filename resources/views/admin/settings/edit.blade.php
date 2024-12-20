<x-layout.admin>
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Setting</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Setting</li>
        </ul>
    </div>

    <div class="col-span-12">
        <div class="card border-0 overflow-hidden">
            <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex items-center flex-wrap gap-3 justify-between">
                <h5 class="card-title text-lg mb-0">Setting</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                    @csrf

                    <div class="col-span-6">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" name="logo" id="logo" accept="image/*" class="border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                        @if ($setting && $setting->logo)
                            <img src="{{ asset($setting->logo) }}" alt="Logo" class="mt-2 w-full h-32 border rounded-lg">
                        @endif
                    </div>

                    <div class="col-span-6">
                        <label for="favicon" class="form-label">Favicon</label>
                        <input type="file" name="favicon" id="favicon" accept="image/*" class="border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                        @if ($setting && $setting->favicon)
                            <img src="{{ asset($setting->favicon) }}" alt="Favicon" class="mt-2 w-32 h-32 border rounded-lg">
                        @endif
                    </div>

                    <div class="col-span-3">
                        <label for="phone_one" class="form-label">Phone One</label>
                        <input type="text" name="phone_one" id="phone_one" value="{{ old('phone_one', $setting->phone_one ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                    </div>

                    <div class="col-span-3">
                        <label for="phone_two" class="form-label">Phone Two</label>
                        <input type="text" name="phone_two" id="phone_two" value="{{ old('phone_two', $setting->phone_two ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                    </div>

                    <div class="col-span-3">
                        <label for="email_one" class="form-label">Email One</label>
                        <input type="email" name="email_one" id="email_one" value="{{ old('email_one', $setting->email_one ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                    </div>

                    <div class="col-span-3">
                        <label for="email_two" class="form-label">Email Two</label>
                        <input type="email" name="email_two" id="email_two" value="{{ old('email_two', $setting->email_two ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                    </div>

                    <div class="col-span-12 grid grid-cols-5 gap-4">
                        <div>
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="url" name="instagram" id="instagram" value="{{ old('instagram', $setting->instagram ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                        </div>

                        <div>
                            <label for="linkedin" class="form-label">Linkedin</label>
                            <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin', $setting->linkedin ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                        </div>

                        <div>
                            <label for="tiktok" class="form-label">Tiktok</label>
                            <input type="url" name="tiktok" id="tiktok" value="{{ old('tiktok', $setting->tiktok ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                        </div>

                        <div>
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="url" name="facebook" id="facebook" value="{{ old('facebook', $setting->facebook ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                        </div>

                        <div>
                            <label for="whatsapp" class="form-label">Whatsapp</label>
                            <input type="number" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $setting->whatsapp ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                        </div>
                    </div>

                    <div class="col-span-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $setting->address ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                    </div>

                    <div class="col-span-12">
                        <label for="footer_text" class="form-label">Footer Text</label>
                        <input type="text" name="footer_text" id="footer_text" value="{{ old('footer_text', $setting->footer_text ?? '') }}" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                    </div>

                    <div class="col-span-12 flex justify-end">
                        <button type="submit" class="btn px-3 py-3 text-sm btn-sm bg-green-500 text-white rounded-lg flex items-center hover:bg-green-600 transition">
                            UPDATE
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout.admin>
