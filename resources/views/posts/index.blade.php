<x-app-layout>
    <!-- Header Section -->
    <div class="border-b border-gray-200 bg-gradient-to-b from-white to-gray-50/30">
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-900">
                        Articles
                    </h1>
                    <p class="mt-2 text-sm text-gray-600">
                        Explorez notre collection d'articles
                    </p>
                </div>
                
                @can("create", \App\Models\Post::class)
                    <a href="{{ route('posts.create') }}" class="btn-minimal-primary">
                        Créer un article
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <!-- Articles Grid -->
    <div class="bg-pattern-warm py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @include('posts.partials.all-articles')
        </div>
    </div>
</x-app-layout>
