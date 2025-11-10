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
    <!-- Article Content -->
    <div class="bg-section py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="mb-8 flex items-center space-x-2 text-sm text-gray-500">
                <a href="/" class="hover:text-gray-900"><?php echo e(__('Home')); ?></a>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="<?php echo e(route('posts.index')); ?>" class="hover:text-gray-900"><?php echo e(__('Articles')); ?></a>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-900"><?php echo e(Str::limit($post->title, 50)); ?></span>
            </nav>

            <!-- Article Header -->
            <article class="bg-white border border-gray-200 rounded-lg shadow-sm">
                <!-- Article Header -->
                <div class="border-b border-gray-200 p-8">
                    <div class="mb-4 flex items-start justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-900 text-sm font-medium text-white">
                                <?php echo e(substr($post->user->name, 0, 1)); ?>

                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900"><?php echo e($post->user->name); ?></p>
                                <p class="text-xs text-gray-500">
                                    <?php if($post->published_at): ?>
                                        <?php echo e($post->published_at->format('d M Y')); ?> • <?php echo e($post->published_at->diffForHumans()); ?>

                                    <?php else: ?>
                                        <?php echo e($post->created_at->format('d M Y')); ?> • <?php echo e($post->created_at->diffForHumans()); ?>

                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <?php if($post->paid): ?>
                                <span class="inline-flex items-center text-xs font-medium text-amber-700 bg-amber-50 border border-amber-200 rounded px-2 py-1">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"></path>
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"></path>
                                    </svg>
                                    <?php echo e(__('Premium')); ?>

                                </span>
                            <?php endif; ?>
                            <?php if(!$post->is_published): ?>
                                <span class="text-xs font-medium text-gray-500 border border-gray-300 rounded px-2 py-1">
                                    <?php echo e(__('Brouillon')); ?>

                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <h1 class="text-3xl font-semibold text-gray-900 mt-6">
                        <?php echo e($post->title); ?>

                    </h1>
                </div>

                <!-- Article Content -->
                <div class="p-8">
                    <!-- Actions (pour les admins) -->
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['update', 'delete'], $post)): ?>
                        <div class="mb-6 flex items-center space-x-2 border-b border-gray-200 pb-6">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $post)): ?>
                                <a href="<?php echo e(route('posts.edit', $post)); ?>" class="text-sm font-medium text-gray-700 hover:text-gray-900 transition-colors">
                                    <?php echo e(__('Modifier l\'article')); ?>

                                </a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $post)): ?>
                                <form action="<?php echo e(route('posts.destroy', $post)); ?>" method="POST" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" 
                                            class="text-sm font-medium text-red-600 hover:text-red-800 transition-colors"
                                            onclick="return confirm('<?php echo e(__('Êtes-vous sûr de vouloir supprimer cet article ?')); ?>')">
                                        <?php echo e(__('Supprimer l\'article')); ?>

                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <!-- Article Content -->
                    <div class="prose prose-lg max-w-none prose-headings:font-semibold prose-a:text-gray-900">
                        <?php echo nl2br(e($post->content)); ?>

                    </div>

                    <!-- Tags/Meta -->
                    <div class="mt-8 flex items-center space-x-4 border-t border-gray-200 pt-6">
                        <span class="text-xs font-medium text-gray-600 border border-gray-300 rounded px-2 py-1">
                            <?php echo e($post->slug); ?>

                        </span>
                        <span class="text-sm text-gray-500">
                            <?php echo e($post->comments->count()); ?> <?php echo e($post->comments->count() > 1 ? __('commentaires') : __('commentaire')); ?>

                        </span>
                    </div>
                </div>
            </article>

            <!-- Messages de succès/erreur -->
            <?php if(session('success')): ?>
                <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4">
                    <p class="text-sm font-medium text-green-800"><?php echo e(session('success')); ?></p>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4">
                    <p class="text-sm font-medium text-red-800"><?php echo e(session('error')); ?></p>
                </div>
            <?php endif; ?>

            <!-- Comments Section -->
            <div class="mt-12">
                <h2 class="mb-8 text-2xl font-semibold text-gray-900">
                    <?php echo e(__('Commentaires')); ?> (<?php echo e($post->comments->count()); ?>)
                </h2>

                <!-- Add Comment Form -->
                <?php if(auth()->guard()->check()): ?>
                    <div class="mb-8 border border-gray-200 rounded-lg bg-white p-6 shadow-sm">
                        <h3 class="mb-4 text-base font-medium text-gray-900"><?php echo e(__('Laisser un commentaire')); ?></h3>
                        <form action="<?php echo e(route('comments.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                            <textarea 
                                name="content" 
                                rows="4" 
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-gray-900 focus:ring-0 <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                placeholder="<?php echo e(__('Partagez votre avis sur cet article...')); ?>" 
                                required
                            ><?php echo e(old('content')); ?></textarea>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="mt-4 flex items-center justify-end">
                                <button type="submit" class="btn-minimal-primary">
                                    <?php echo e(__('Publier le commentaire')); ?>

                                </button>
                            </div>
                        </form>
                    </div>
                <?php else: ?>
                    <div class="mb-8 border border-dashed border-gray-300 rounded-lg bg-gray-50 p-8 text-center">
                        <h3 class="text-base font-medium text-gray-900"><?php echo e(__('Connectez-vous pour commenter')); ?></h3>
                        <p class="mt-2 text-sm text-gray-600"><?php echo e(__('Vous devez être connecté pour laisser un commentaire sur cet article.')); ?></p>
                        <div class="mt-6">
                            <a href="<?php echo e(route('login')); ?>" class="btn-minimal-primary">
                                <?php echo e(__('Se connecter')); ?>

                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Comments List -->
                <div class="space-y-4">
                    <?php $__empty_1 = true; $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="border border-gray-200 rounded-lg bg-white p-6 shadow-sm">
                            <div class="flex items-start space-x-4">
                                <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-gray-900 text-sm font-medium text-white">
                                    <?php echo e(substr($comment->user->name, 0, 1)); ?>

                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900"><?php echo e($comment->user->name); ?></h4>
                                            <p class="text-xs text-gray-500"><?php echo e($comment->created_at->diffForHumans()); ?></p>
                                        </div>
                                    </div>
                                    <p class="mt-3 text-sm text-gray-700"><?php echo e($comment->content); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="border border-dashed border-gray-300 rounded-lg bg-gray-50/50 p-12 text-center">
                            <p class="text-base font-medium text-gray-900"><?php echo e(__('Aucun commentaire pour le moment')); ?></p>
                            <p class="mt-2 text-sm text-gray-600"><?php echo e(__('Soyez le premier à partager votre avis sur cet article !')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
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
<?php /**PATH C:\Users\glouglou\Documents\Projets cours\php-laravel\blog-with-laravel\resources\views/posts/show.blade.php ENDPATH**/ ?>