<?php

use Livewire\Volt\Component;
use App\Models\Setting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    use WithFileUploads;

    public $settingId;
    public $logo;
    public $newLogo;
    public $phone;
    public $phone_two;
    public $email;
    public $email_two;
    public $instagram;
    public $linkedin;
    public $tiktok;
    public $facebook;
    public $whatsapp;
    public $address;
    public $address_two;
    public $footer_text;

    public function mount()
    {
        $this->loadSettingData();
    }

    public function loadSettingData()
    {
        $setting = Setting::first();

        if ($setting) {
            $this->settingId = $setting->id;
            $this->logo = $setting->logo;
            $this->phone = $setting->phone;
            $this->phone_two = $setting->phone_two;
            $this->email = $setting->email;
            $this->email_two = $setting->email_two;
            $this->instagram = $setting->instagram;
            $this->linkedin = $setting->linkedin;
            $this->tiktok = $setting->tiktok;
            $this->facebook = $setting->facebook;
            $this->whatsapp = $setting->whatsapp;
            $this->address = $setting->address;
            $this->address_two = $setting->address_two;
            $this->footer_text = $setting->footer_text;
        }
    }

    public function save()
    {
        $this->validate([
            'phone' => 'nullable|string|max:20',
            'phone_two' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'email_two' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'address_two' => 'nullable|string',
            'footer_text' => 'nullable|string',
            'newLogo' => 'nullable|image|max:1024',
        ]);

        try {
            $setting = Setting::firstOrNew(['id' => $this->settingId]);

            // Handle logo upload if a new logo is selected
            if ($this->newLogo) {
                // Delete the old logo if it exists
                if ($setting->logo && Storage::disk('public')->exists($setting->logo)) {
                    Storage::disk('public')->delete($setting->logo);
                }

                // Store the new logo
                $logoPath = $this->newLogo->store('settings', 'public');
                $setting->logo = $logoPath;
            }

            $setting->phone = $this->phone;
            $setting->phone_two = $this->phone_two;
            $setting->email = $this->email;
            $setting->email_two = $this->email_two;
            $setting->instagram = $this->instagram;
            $setting->linkedin = $this->linkedin;
            $setting->tiktok = $this->tiktok;
            $setting->facebook = $this->facebook;
            $setting->whatsapp = $this->whatsapp;
            $setting->address = $this->address;
            $setting->address_two = $this->address_two;
            $setting->footer_text = $this->footer_text;
            $setting->save();

            $this->settingId = $setting->id;
            $this->newLogo = null;

            session()->flash('message', 'Settings successfully updated.');

        } catch (\Exception $e) {
            session()->flash('error', 'Something wrong: ' . $e->getMessage());
        }
    }
}; ?>

<div class="flex flex-col items-start">
    @include('partials.settings-heading')

    <x-settings.layout :heading="'Website Settings'" :subheading="'Update the appearance and contact settings for your website'">
        <!-- Theme Settings -->
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Theme Mode</h2>
            <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
                <flux:radio value="light" icon="sun">Light</flux:radio>
                <flux:radio value="dark" icon="moon">Dark</flux:radio>
                <flux:radio value="system" icon="computer-desktop">System</flux:radio>
            </flux:radio.group>
        </div>

        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <form wire:submit.prevent="save" class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg space-y-6">
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Website Information</h2>

            <!-- Logo Section -->
            <div>
                <!-- Existing Logo Preview -->
                @if ($logo)
                    <div class="mb-4">
                        <flux:label>Current Logo</flux:label>
                        <div class="mt-2">
                            <img src="{{ Storage::url($logo) }}" alt="Website Logo" class="h-16 w-auto object-contain rounded">
                        </div>
                    </div>
                @endif

                <!-- Logo Upload -->
                <div class="mb-4">
                    <flux:field>
                        <flux:label for="newLogo">Website Logo</flux:label>

                        <flux:input type="file" id="newLogo" wire:model="newLogo" />
                        <flux:description>
                            Recommended size: 200x80px. Transparent PNG is preferred.
                        </flux:description>

                        <div wire:loading wire:target="newLogo" class="text-sm text-gray-500 mt-1">Uploading...</div>

                        <flux:error name="newLogo" />
                    </flux:field>

                    <!-- Preview new logo -->
                    @if ($newLogo)
                        <div class="mt-2">
                            <img src="{{ $newLogo->temporaryUrl() }}" alt="Preview" class="h-16 w-auto object-contain rounded">
                        </div>
                    @endif
                </div>
            </div>

            <!-- Contact Information Section -->
            <div>
                <h3 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-4">Contact Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <flux:field>
                            <flux:label for="phone">Primary Phone Number</flux:label>
                            <flux:input id="phone" wire:model="phone" placeholder="+1 (234) 567-8900" />
                            <flux:error name="phone" />
                        </flux:field>
                    </div>

                    <div>
                        <flux:field>
                            <flux:label for="phone_two">Secondary Phone Number</flux:label>
                            <flux:input id="phone_two" wire:model="phone_two" placeholder="+1 (234) 567-8900" />
                            <flux:error name="phone_two" />
                        </flux:field>
                    </div>

                    <div>
                        <flux:field>
                            <flux:label for="email">Primary Email Address</flux:label>
                            <flux:input id="email" wire:model="email" placeholder="contact@example.com" />
                            <flux:error name="email" />
                        </flux:field>
                    </div>

                    <div>
                        <flux:field>
                            <flux:label for="email_two">Secondary Email Address</flux:label>
                            <flux:input id="email_two" wire:model="email_two" placeholder="contact@example.com" />
                            <flux:error name="email_two" />
                        </flux:field>
                    </div>
                </div>

                <div>
                    <flux:field>
                        <flux:label for="address">Primary Address</flux:label>
                        <flux:textarea id="address" wire:model="address" rows="3" />
                        <flux:error name="address" />
                    </flux:field>
                </div>

                <div>
                    <flux:field>
                        <flux:label for="address_two">Secondary Address</flux:label>
                        <flux:textarea id="address_two" wire:model="address_two" rows="3" />
                        <flux:error name="address_two" />
                    </flux:field>
                </div>
            </div>

            <!-- Social Media Section -->
            <div>
                <h3 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-4">Social Media Links</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <flux:field>
                            <flux:label for="instagram">Instagram</flux:label>
                            <flux:input id="instagram" wire:model="instagram" placeholder="https://instagram.com/youraccount" />
                            <flux:error name="instagram" />
                        </flux:field>
                    </div>

                    <div>
                        <flux:field>
                            <flux:label for="facebook">Facebook</flux:label>
                            <flux:input id="facebook" wire:model="facebook" placeholder="https://facebook.com/yourpage" />
                            <flux:error name="facebook" />
                        </flux:field>
                    </div>

                    <div>
                        <flux:field>
                            <flux:label for="linkedin">LinkedIn</flux:label>
                            <flux:input id="linkedin" wire:model="linkedin" placeholder="https://linkedin.com/company/yourcompany" />
                            <flux:error name="linkedin" />
                        </flux:field>
                    </div>

                    <div>
                        <flux:field>
                            <flux:label for="tiktok">TikTok</flux:label>
                            <flux:input id="tiktok" wire:model="tiktok" placeholder="https://tiktok.com/@youraccount" />
                            <flux:error name="tiktok" />
                        </flux:field>
                    </div>

                    <div>
                        <flux:field>
                            <flux:label for="whatsapp">WhatsApp</flux:label>
                            <flux:input id="whatsapp" wire:model="whatsapp" placeholder="+1234567890" />
                            <flux:error name="whatsapp" />
                        </flux:field>
                    </div>
                </div>
            </div>

            <!-- Footer Section -->
            <div>
                <h3 class="text-md font-medium text-gray-900 dark:text-gray-100 mb-4">Footer Information</h3>

                <div>
                    <flux:field>
                        <flux:label for="footer_text">Footer Text</flux:label>
                        <flux:textarea id="footer_text" wire:model="footer_text" rows="3" placeholder="© 2025 Your Company Name. All rights reserved." />
                        <flux:description>
                            This text will appear in the footer of your website.
                        </flux:description>
                        <flux:error name="footer_text" />
                    </flux:field>
                </div>
            </div>

            <div class="flex justify-end">
                <flux:button type="submit" class="cursor-pointer bg-primary-600! hover:bg-primary-700! text-white!" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="save">Save Settings</span>
                    <span wire:loading wire:target="save">Saving...</span>
                </flux:button>
            </div>
        </form>
    </x-settings.layout>
</div>
