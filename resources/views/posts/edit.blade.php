<x-app-layout>
    <!-- Header Section -->
    <div class="border-b border-gray-200 bg-gradient-to-b from-white to-gray-50/30">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-semibold text-gray-900">
                {{ __('Modifier l\'article') }}
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                {{ __('Modifiez les informations de votre article') }}
            </p>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-pattern-warm py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                <div class="p-8">
                    <form class="space-y-8" action="{{ route('posts.update', $post) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        
                        <!-- Title Field -->
                        <div>
                            <label for="title" class="mb-2 block text-sm font-medium text-gray-900">
                                {{ __('Titre de l\'article') }}
                                <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-gray-900 focus:ring-0" 
                                placeholder="{{ __('Ex: Les meilleures pratiques en Laravel 11') }}"
                                value="{{ old('title', $post->title) }}"
                                required
                            >
                            @error('title')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content Field -->
                        <div>
                            <label for="content" class="mb-2 block text-sm font-medium text-gray-900">
                                {{ __('Content') }}
                                <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                name="content" 
                                id="content"
                                rows="12"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-gray-900 focus:ring-0" 
                                placeholder="{{ __('Rédigez le contenu de votre article ici...') }}"
                                required
                            >{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Slug Field -->
                        <div>
                            <label for="slug" class="mb-2 block text-sm font-medium text-gray-900">
                                {{ __('Slug (URL)') }}
                            </label>
                            <input 
                                type="text" 
                                name="slug" 
                                id="slug"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-gray-900 focus:ring-0" 
                                placeholder="{{ __('exemple-article-slug') }}"
                                value="{{ old('slug', $post->slug) }}"
                            >
                            @error('slug')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500">
                                {{ __('Laissez vide pour générer automatiquement à partir du titre') }}
                            </p>
                        </div>

                        <!-- Publication Options -->
                        <div class="border border-gray-200 rounded-lg bg-gray-50/60 p-6">
                            <h3 class="mb-4 text-base font-medium text-gray-900">
                                {{ __('Options de publication') }}
                            </h3>
                            <div class="space-y-4">
                                <!-- Published Status -->
                                <div class="flex items-center space-x-3">
                                    <input 
                                        type="checkbox" 
                                        name="is_published" 
                                        id="is_published"
                                        value="1"
                                        class="rounded border-gray-300 text-gray-900 focus:ring-0"
                                        {{ old('is_published', $post->is_published) ? 'checked' : '' }}
                                    >
                                    <label for="is_published" class="text-sm font-medium text-gray-900">
                                        {{ __('Article publié') }}
                                    </label>
                                </div>

                                <!-- Published Date -->
                                <div>
                                    <label for="published_at" class="mb-2 block text-sm font-medium text-gray-900">
                                        {{ __('Date de publication') }}
                                    </label>
                                    <input 
                                        type="datetime-local" 
                                        name="published_at" 
                                        id="published_at"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-gray-900 focus:ring-0" 
                                        value="{{ old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                                    >
                                    @error('published_at')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Premium Status -->
                                <div class="flex items-center space-x-3">
                                    <input 
                                        type="checkbox" 
                                        name="paid" 
                                        id="paid"
                                        value="1"
                                        class="rounded border-gray-300 text-gray-900 focus:ring-0"
                                        {{ old('paid', $post->paid) ? 'checked' : '' }}
                                    >
                                    <label for="paid" class="text-sm font-medium text-gray-900">
                                        {{ __('Article premium (réservé aux abonnés)') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col-reverse gap-4 sm:flex-row sm:justify-end">
                            <a href="{{ route('posts.show', $post) }}" class="btn-minimal">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit" class="btn-minimal-primary">
                                {{ __('Enregistrer les modifications') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Article Info -->
            <div class="mt-8 border border-gray-200 rounded-lg bg-gray-50/80 p-6 shadow-sm">
                <h4 class="font-medium text-gray-900">{{ __('Informations de l\'article') }}</h4>
                <div class="mt-4 grid gap-3 sm:grid-cols-2 text-sm text-gray-600">
                    <div>
                        <span class="font-medium text-gray-900">{{ __('Auteur :') }}</span> {{ $post->user->name }}
                    </div>
                    <div>
                        <span class="font-medium text-gray-900">{{ __('Créé le :') }}</span> {{ $post->created_at->format('d/m/Y à H:i') }}
                    </div>
                    <div>
                        <span class="font-medium text-gray-900">{{ __('Modifié le :') }}</span> {{ $post->updated_at->format('d/m/Y à H:i') }}
                    </div>
                    <div>
                        <span class="font-medium text-gray-900">{{ __('Commentaires :') }}</span> {{ $post->comments->count() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

