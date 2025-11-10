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
            <h1 class="text-3xl font-semibold text-gray-900">
                Modifier l'article
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Modifiez les informations de votre article
            </p>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-pattern-warm py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border border-gray-200 rounded-lg bg-white shadow-sm">
                <div class="p-8">
                    <form class="space-y-8" action="<?php echo e(route('posts.update', $post)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        
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
                                value="<?php echo e(old('title', $post->title)); ?>"
                                required
                            >
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                            ><?php echo e(old('content', $post->content)); ?></textarea>
                            <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Slug Field -->
                        <div>
                            <label for="slug" class="mb-2 block text-sm font-medium text-gray-900">
                                Slug (URL)
                            </label>
                            <input 
                                type="text" 
                                name="slug" 
                                id="slug"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-gray-900 focus:ring-0" 
                                placeholder="exemple-article-slug"
                                value="<?php echo e(old('slug', $post->slug)); ?>"
                            >
                            <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <p class="mt-2 text-sm text-gray-500">
                                Laissez vide pour générer automatiquement à partir du titre
                            </p>
                        </div>

                        <!-- Publication Options -->
                        <div class="border border-gray-200 rounded-lg bg-gray-50/60 p-6">
                            <h3 class="mb-4 text-base font-medium text-gray-900">
                                Options de publication
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
                                        <?php echo e(old('is_published', $post->is_published) ? 'checked' : ''); ?>

                                    >
                                    <label for="is_published" class="text-sm font-medium text-gray-900">
                                        Article publié
                                    </label>
                                </div>

                                <!-- Published Date -->
                                <div>
                                    <label for="published_at" class="mb-2 block text-sm font-medium text-gray-900">
                                        Date de publication
                                    </label>
                                    <input 
                                        type="datetime-local" 
                                        name="published_at" 
                                        id="published_at"
                                        class="w-full border border-gray-300 rounded-md px-3 py-2 focus:border-gray-900 focus:ring-0" 
                                        value="<?php echo e(old('published_at', $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '')); ?>"
                                    >
                                    <?php $__errorArgs = ['published_at'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                                <!-- Premium Status -->
                                <div class="flex items-center space-x-3">
                                    <input 
                                        type="checkbox" 
                                        name="paid" 
                                        id="paid"
                                        value="1"
                                        class="rounded border-gray-300 text-gray-900 focus:ring-0"
                                        <?php echo e(old('paid', $post->paid) ? 'checked' : ''); ?>

                                    >
                                    <label for="paid" class="text-sm font-medium text-gray-900">
                                        Article premium (réservé aux abonnés)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col-reverse gap-4 sm:flex-row sm:justify-end">
                            <a href="<?php echo e(route('posts.show', $post)); ?>" class="btn-minimal">
                                Annuler
                            </a>
                            <button type="submit" class="btn-minimal-primary">
                                Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Article Info -->
            <div class="mt-8 border border-gray-200 rounded-lg bg-gray-50/80 p-6 shadow-sm">
                <h4 class="font-medium text-gray-900">Informations de l'article</h4>
                <div class="mt-4 grid gap-3 sm:grid-cols-2 text-sm text-gray-600">
                    <div>
                        <span class="font-medium text-gray-900">Auteur :</span> <?php echo e($post->user->name); ?>

                    </div>
                    <div>
                        <span class="font-medium text-gray-900">Créé le :</span> <?php echo e($post->created_at->format('d/m/Y à H:i')); ?>

                    </div>
                    <div>
                        <span class="font-medium text-gray-900">Modifié le :</span> <?php echo e($post->updated_at->format('d/m/Y à H:i')); ?>

                    </div>
                    <div>
                        <span class="font-medium text-gray-900">Commentaires :</span> <?php echo e($post->comments->count()); ?>

                    </div>
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

<?php /**PATH C:\Users\glouglou\Documents\Projets cours\php-laravel\blog-with-laravel\resources\views/posts/edit.blade.php ENDPATH**/ ?>