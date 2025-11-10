<article class="bg-white border border-gray-200 rounded-lg transition-all hover:border-gray-300 shadow-sm hover:shadow-md hover:-translate-y-0.5">
    <div class="p-6">
        <!-- Header avec auteur et badge -->
        <div class="mb-4 flex items-start justify-between">
            <div class="flex items-center space-x-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-900 text-xs font-medium text-white">
                    <?php echo e(substr($post->user->name, 0, 1)); ?>

                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900"><?php echo e($post->user->name); ?></p>
                    <p class="text-xs text-gray-500"><?php echo e($post->created_at->format('d/m/Y')); ?></p>
                </div>
            </div>
            <?php if($post->paid): ?>
                <span class="text-xs font-medium text-gray-600 border border-gray-300 rounded px-2 py-1">
                    Premium
                </span>
            <?php else: ?>
                <span class="text-xs font-medium text-gray-500">
                    Gratuit
                </span>
            <?php endif; ?>
        </div>

        <!-- Titre -->
        <h3 class="mb-3 text-lg font-semibold text-gray-900">
            <a href="<?php echo e(route('posts.show', $post)); ?>" class="hover:text-gray-600 transition-colors">
                <?php echo e($post->title); ?>

            </a>
        </h3>
        
        <!-- Contenu -->
        <p class="mb-4 text-sm text-gray-600 line-clamp-3 leading-relaxed">
            <?php echo e(Str::limit($post->content, 150)); ?>

        </p>

        <!-- Meta info -->
        <div class="mb-4 flex items-center space-x-4 text-xs text-gray-500">
            <span><?php echo e($post->comments->count()); ?> commentaires</span>
        </div>

        <!-- Actions -->
        <div class="flex items-center gap-2 pt-4 border-t border-gray-100">
            <a href="<?php echo e(route('posts.show', $post)); ?>" 
               class="text-sm font-medium text-gray-900 hover:text-gray-600 transition-colors">
                Lire l'article →
            </a>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
                <a href="<?php echo e(route('posts.edit', $post)); ?>" 
                   class="ml-auto text-sm text-gray-600 hover:text-gray-900 transition-colors">
                    Modifier
                </a>
            <?php endif; ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $post)): ?>
                <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" class="inline">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" 
                            class="text-sm text-gray-600 hover:text-gray-900 transition-colors"
                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                        Supprimer
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</article>
<?php /**PATH C:\Users\glouglou\Documents\Projets cours\php-laravel\blog-with-laravel\resources\views/components/article-card.blade.php ENDPATH**/ ?>