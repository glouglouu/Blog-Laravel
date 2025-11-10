<x-app-layout>
    <!-- Header Section -->
    <div class="border-b border-gray-200 bg-gradient-to-b from-white to-gray-50/30">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-semibold text-gray-900">
                Abonnements
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Accédez à du contenu premium et soutenez nos créateurs. Choisissez l'offre qui vous convient le mieux.
            </p>
        </div>
    </div>

    <!-- Messages Flash -->
    @if (session('success'))
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-6">
            <div class="mb-6 flex items-center space-x-3 border border-green-200 rounded-lg bg-green-50 p-4">
                <p class="text-sm text-green-700">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-6">
            <div class="mb-6 flex items-center space-x-3 border border-red-200 rounded-lg bg-red-50 p-4">
                <p class="text-sm text-red-700">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    <!-- Pricing Cards -->
    <div class="bg-pattern py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-2 lg:gap-12">
                @foreach ($subscriptions as $subscription)
                    @php
                        $isActive = $userSubscriptions->contains('id', $subscription->id);
                        $isPremium = $subscription->price > 0;
                    @endphp

                    <div class="card-minimal {{ $isPremium ? 'border-2 border-gray-900 bg-gradient-to-br from-white to-gray-50' : '' }}">
                        <div class="p-8">
                            @if ($isPremium)
                                <div class="mb-4">
                                    <span class="text-xs font-medium text-gray-600 border border-gray-300 rounded px-2 py-1">
                                        Populaire
                                    </span>
                                </div>
                            @endif
                            <!-- Plan Name -->
                            <h2 class="mb-2 text-2xl font-semibold text-gray-900">
                                {{ $subscription->name }}
                            </h2>
                            
                            <!-- Description -->
                            <p class="mb-6 text-sm text-gray-600">
                                {{ $subscription->description }}
                            </p>

                            <!-- Price -->
                            <div class="mb-8">
                                <div class="flex items-baseline">
                                    <span class="text-4xl font-semibold text-gray-900">
                                        {{ $subscription->price }}€
                                    </span>
                                    <span class="ml-2 text-sm text-gray-500">/mois</span>
                                </div>
                            </div>

                            <!-- Features -->
                            <ul class="mb-8 space-y-3">
                                @if ($isPremium)
                                    <li class="flex items-center space-x-2 text-sm text-gray-700">
                                        <span class="text-gray-500">✓</span>
                                        <span>Accès à tous les articles premium</span>
                                    </li>
                                    <li class="flex items-center space-x-2 text-sm text-gray-700">
                                        <span class="text-gray-500">✓</span>
                                        <span>Contenu exclusif chaque semaine</span>
                                    </li>
                                    <li class="flex items-center space-x-2 text-sm text-gray-700">
                                        <span class="text-gray-500">✓</span>
                                        <span>Support prioritaire</span>
                                    </li>
                                    <li class="flex items-center space-x-2 text-sm text-gray-700">
                                        <span class="text-gray-500">✓</span>
                                        <span>Badge membre premium</span>
                                    </li>
                                @else
                                    <li class="flex items-center space-x-2 text-sm text-gray-700">
                                        <span class="text-gray-500">✓</span>
                                        <span>Accès aux articles gratuits</span>
                                    </li>
                                    <li class="flex items-center space-x-2 text-sm text-gray-700">
                                        <span class="text-gray-500">✓</span>
                                        <span>Commentaires illimités</span>
                                    </li>
                                    <li class="flex items-center space-x-2 text-sm text-gray-400">
                                        <span>✗</span>
                                        <span class="line-through">Contenu premium</span>
                                    </li>
                                @endif
                            </ul>

                            <!-- CTA Button -->
                            <form action="{{ route('subscriptions.subscribe', $subscription->id) }}" method="POST">
                                @csrf
                                @if ($isActive)
                                    <div class="flex items-center justify-center space-x-2 border border-green-300 rounded-md bg-green-50 px-6 py-3 text-sm font-medium text-green-700">
                                        <span>✓</span>
                                        <span>Abonnement actif</span>
                                    </div>
                                @else
                                    <button type="submit" class="w-full btn-minimal-primary">
                                        S'abonner maintenant
                                    </button>
                                @endif
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Additional Info -->
            <div class="mt-16 text-center">
                <p class="text-sm text-gray-600">
                    Tous les abonnements peuvent être annulés à tout moment. Aucun engagement.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
