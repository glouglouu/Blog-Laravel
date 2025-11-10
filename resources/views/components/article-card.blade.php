<article class="bg-white border border-gray-200 rounded-lg transition-all hover:border-gray-300 shadow-sm hover:shadow-md hover:-translate-y-0.5">
    <div class="p-6">
        <!-- Header avec auteur et badge -->
        <div class="mb-4 flex items-start justify-between">
            <div class="flex items-center space-x-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-900 text-xs font-medium text-white">
                    {{ substr($post->user->name, 0, 1) }}
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">{{ $post->user->name }}</p>
                    <p class="text-xs text-gray-500">{{ $post->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
            @if ($post->paid)
                <span class="text-xs font-medium text-gray-600 border border-gray-300 rounded px-2 py-1">
                    {{ __('Premium') }}
                </span>
            @else
                <span class="text-xs font-medium text-gray-500">
                    {{ __('Free') }}
                </span>
            @endif
        </div>

        <!-- Titre -->
        <h3 class="mb-3 text-lg font-semibold text-gray-900">
            <a href="{{ route('posts.show', $post) }}" class="hover:text-gray-600 transition-colors">
                {{ $post->title }}
            </a>
        </h3>
        
        <!-- Contenu -->
        <p class="mb-4 text-sm text-gray-600 line-clamp-3 leading-relaxed">
            {{ Str::limit($post->content, 150) }}
        </p>

        <!-- Meta info -->
        <div class="mb-4 flex items-center space-x-4 text-xs text-gray-500">
            <span>{{ $post->comments->count() }} {{ $post->comments->count() > 1 ? __('commentaires') : __('commentaire') }}</span>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-2 pt-4 border-t border-gray-100">
            <a href="{{ route('posts.show', $post) }}" 
               class="text-sm font-medium text-gray-900 hover:text-gray-600 transition-colors">
                {{ __('Lire l\'article →') }}
            </a>
        </div>
    </div>
</article>
