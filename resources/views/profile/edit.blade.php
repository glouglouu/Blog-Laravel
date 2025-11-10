<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-b from-white to-gray-50/30 border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                    {{ __('Profile') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="bg-pattern-warm py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 card-minimal">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 card-minimal">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 card-minimal">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
