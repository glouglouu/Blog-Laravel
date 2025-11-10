<x-app-layout>
    <!-- Header Section -->
    <div class="border-b border-gray-200 bg-gradient-to-b from-white to-gray-50/30">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-900">
                        {{ __('Articles') }}
                    </h1>
                    <p class="mt-2 text-sm text-gray-600">
                        {{ __('Explorez notre collection d\'articles') }}
                    </p>
                </div>
                
                @can("create", \App\Models\Post::class)
                    <a href="{{ route('posts.create') }}" class="btn-minimal-primary">
                        {{ __('Créer un article') }}
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <!-- Articles Grid -->
    <div class="bg-pattern-warm py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($posts->count() > 0)
                @include('posts.partials.all-articles')
            @else
                <div class="text-center py-16">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">{{ __('Aucun article publié') }}</h3>
                    <p class="mt-2 text-sm text-gray-600">{{ __('Il n\'y a pas encore d\'articles disponibles pour le moment.') }}</p>
                    @can("create", \App\Models\Post::class)
                        <div class="mt-6">
                            <a href="{{ route('posts.create') }}" class="btn-minimal-primary">
                                {{ __('Créer le premier article') }}
                            </a>
                        </div>
                    @endcan
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
