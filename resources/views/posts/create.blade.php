<x-app-layout>
    <!-- Header Section -->
    <div class="border-b border-gray-200 bg-gradient-to-b from-white to-gray-50/30">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-semibold text-gray-900">
                Créer un nouvel article
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Partagez vos connaissances et idées avec la communauté
            </p>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-pattern-warm py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                <div class="p-8">
                    <form class="space-y-8" action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        
                        <!-- Title Field -->
                        <div>
                            <label for="title" class="mb-2 block text-sm font-medium text-gray-900">
                                Titre de l'article
                                <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-gray-900 focus:ring-0" 
                                placeholder="Ex: Les meilleures pratiques en Laravel 11"
                                required
                            >
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500">
                                Un titre accrocheur qui résume votre article
                            </p>
                        </div>

                        <!-- Content Field -->
                        <div>
                            <label for="content" class="mb-2 block text-sm font-medium text-gray-900">
                                Contenu
                                <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                name="content" 
                                id="content"
                                rows="12"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-gray-900 focus:ring-0" 
                                placeholder="Rédigez le contenu de votre article ici..."
                                required
                            ></textarea>
                            @error('content')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500">
                                Développez votre sujet en détail. Minimum 100 caractères recommandés.
                            </p>
                        </div>

                        <!-- Additional Options -->
                        <div class="border border-dashed border-gray-300 rounded-lg bg-gray-50/60 p-6">
                            <h3 class="mb-4 text-base font-medium text-gray-900">
                                Options avancées
                            </h3>
                            <p class="text-sm text-gray-600">
                                Ces paramètres seront ajoutés automatiquement lors de la publication
                            </p>
                            <div class="mt-4 grid gap-3 sm:grid-cols-2">
                                <div class="flex items-center space-x-2 text-sm text-gray-700">
                                    <span class="text-gray-500">✓</span>
                                    <span>Slug généré automatiquement</span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-700">
                                    <span class="text-gray-500">✓</span>
                                    <span>Publication immédiate</span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-700">
                                    <span class="text-gray-500">✓</span>
                                    <span>Auteur attribué automatiquement</span>
                                </div>
                                <div class="flex items-center space-x-2 text-sm text-gray-700">
                                    <span class="text-gray-500">✓</span>
                                    <span>Horodatage automatique</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col-reverse gap-4 sm:flex-row sm:justify-end">
                            <a href="{{ route('posts.index') }}" class="btn-minimal">
                                Annuler
                            </a>
                            <button type="submit" class="btn-minimal-primary">
                                Publier l'article
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Help Section -->
            <div class="mt-8 border border-gray-200 rounded-lg bg-gray-50/80 p-6 shadow-sm">
                <h4 class="font-medium text-gray-900">Conseils pour un bon article</h4>
                <ul class="mt-2 space-y-1 text-sm text-gray-600">
                    <li>• Utilisez un titre clair et descriptif</li>
                    <li>• Structurez votre contenu avec des paragraphes</li>
                    <li>• Relisez-vous avant de publier</li>
                    <li>• Ajoutez des exemples concrets si possible</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
