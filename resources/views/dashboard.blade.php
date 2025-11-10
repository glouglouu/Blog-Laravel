<x-app-layout>
    <x-slot name="header">
        <div class="bg-gradient-to-b from-white to-gray-50/30 border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <h2 class="text-xl font-semibold leading-tight text-gray-900">
                    {{ __('Dashboard') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="bg-section py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Carte statistiques -->
                <div class="card-minimal p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-medium text-gray-900">{{ __('Statistiques') }}</h3>
                    </div>
                    <p class="mt-4 text-2xl font-semibold text-gray-900">89%</p>
                    <p class="mt-1 text-sm text-gray-500">{{ __('Augmentation ce mois') }}</p>
                </div>

                <!-- Carte activité -->
                <div class="card-minimal p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-medium text-gray-900">{{ __('Activité récente') }}</h3>
                        <span class="text-xs font-medium text-gray-600 border border-gray-300 rounded px-2 py-1">{{ __('En ligne') }}</span>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-600">{{ __("You're logged in!") }}</p>
                    </div>
                </div>

                <!-- Carte progrès -->
                <div class="card-minimal p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-medium text-gray-900">{{ __('Progrès') }}</h3>
                    </div>
                    <div class="mt-4">
                        <div class="h-1 w-full bg-gray-200 rounded-full">
                            <div class="h-1 w-2/3 bg-gray-900 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
