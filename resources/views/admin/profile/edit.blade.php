<x-layout.admin>
    <div class="flex flex-wrap items-center justify-between gap-2 mb-6">
        <h6 class="font-semibold mb-0 dark:text-white">Profile</h6>
        <ul class="flex items-center gap-[6px]">
            <li class="font-medium">
                <a href="{{ route('admin.dashboard.index') }}" class="flex items-center gap-2 hover:text-primary-600 dark:text-white">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li class="dark:text-white">-</li>
            <li class="font-medium dark:text-white">Profile</li>
        </ul>
    </div>

    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-6">
            <div class="card border-0 overflow-hidden">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex-row items-center flex-wrap gap-3 justify-between">
                    <h2 class="text-lg font-medium text-gray-900">
                        Profile Information
                    </h2>

                    <p class="text-sm text-gray-600">
                        Update your account's profile information.
                    </p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="grid grid-cols-12 gap-4">
                        @csrf
                        @method('PATCH')

                        <div class="col-span-6">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="mt-1 border border-neutral-200 dark:border-neutral-600 w-full rounded-lg">
                        </div>

                        <div class="col-span-6">
                            <label for="current_profile_picture" class="form-label">Current Profile Picture</label>
                            <img src="{{ asset($user->profile_picture) }}" alt="{{ $user->name }}" class="border rounded-lg w-32 h-32 object-cover">
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-span-6">
            <div class="card border-0 overflow-hidden">
                <div class="card-header border-b border-neutral-200 dark:border-neutral-600 bg-white dark:bg-neutral-700 py-4 px-6 flex-row items-center flex-wrap gap-3 justify-between">
                    <h2 class="text-lg font-medium text-gray-900">
                        Update Password
                    </h2>

                    <p class="text-sm text-gray-600">
                        Ensure your account is using a long, random password to stay secure.
                    </p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}" class="grid grid-cols-12 gap-4">
                        @csrf
                        @method('PUT')

                        <div class="col-span-12">
                            <label for="update_password_current_password" class="form-label">Current Password</label>
                            <input type="password" id="update_password_current_password" name="current_password" autocomplete="current-password" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="col-span-12">
                            <label for="update_password_password" class="form-label">New Password</label>
                            <input type="password" id="update_password_password" name="password" autocomplete="new-password" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div class="col-span-12">
                            <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password" class="form-control border border-neutral-200 dark:border-neutral-600 w-full rounded-lg" required>
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            @if (session('status') === 'password-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>
