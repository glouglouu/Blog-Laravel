<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("create", \App\Models\Post::class)): ?>
                    <a href="<?php echo e(route('posts.create')); ?>" class="btn-minimal-primary">
                        Créer un article
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Articles Grid -->
    <div class="bg-pattern-warm py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <?php if($posts->count() > 0): ?>
                <?php echo $__env->make('posts.partials.all-articles', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php else: ?>
                <div class="text-center py-16">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Aucun article publié</h3>
                    <p class="mt-2 text-sm text-gray-600">Il n'y a pas encore d'articles disponibles pour le moment.</p>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("create", \App\Models\Post::class)): ?>
                        <div class="mt-6">
                            <a href="<?php echo e(route('posts.create')); ?>" class="btn-minimal-primary">
                                Créer le premier article
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\glouglou\Documents\Projets cours\php-laravel\blog-with-laravel\resources\views/posts/index.blade.php ENDPATH**/ ?>