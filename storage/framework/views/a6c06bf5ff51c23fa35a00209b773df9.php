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
                Abonnements
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                Accédez à du contenu premium et soutenez nos créateurs. Choisissez l'offre qui vous convient le mieux.
            </p>
        </div>
    </div>

    <!-- Messages Flash -->
    <?php if(session('success')): ?>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-6">
            <div class="mb-6 flex items-center space-x-3 border border-green-200 rounded-lg bg-green-50 p-4">
                <p class="text-sm text-green-700"><?php echo e(session('success')); ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-6">
            <div class="mb-6 flex items-center space-x-3 border border-red-200 rounded-lg bg-red-50 p-4">
                <p class="text-sm text-red-700"><?php echo e(session('error')); ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!-- Pricing Cards -->
    <div class="bg-pattern py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:grid-cols-2 lg:gap-12">
                <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $isActive = $userSubscriptions->contains('id', $subscription->id);
                        $isPremium = $subscription->price > 0;
                    ?>

                    <div class="card-minimal <?php echo e($isPremium ? 'border-2 border-gray-900 bg-gradient-to-br from-white to-gray-50' : ''); ?>">
                        <div class="p-8">
                            <?php if($isPremium): ?>
                                <div class="mb-4">
                                    <span class="text-xs font-medium text-gray-600 border border-gray-300 rounded px-2 py-1">
                                        Populaire
                                    </span>
                                </div>
                            <?php endif; ?>
                            <!-- Plan Name -->
                            <h2 class="mb-2 text-2xl font-semibold text-gray-900">
                                <?php echo e($subscription->name); ?>

                            </h2>
                            
                            <!-- Description -->
                            <p class="mb-6 text-sm text-gray-600">
                                <?php echo e($subscription->description); ?>

                            </p>

                            <!-- Price -->
                            <div class="mb-8">
                                <div class="flex items-baseline">
                                    <span class="text-4xl font-semibold text-gray-900">
                                        <?php echo e($subscription->price); ?>€
                                    </span>
                                    <span class="ml-2 text-sm text-gray-500">/mois</span>
                                </div>
                            </div>

                            <!-- Features -->
                            <ul class="mb-8 space-y-3">
                                <?php if($isPremium): ?>
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
                                <?php else: ?>
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
                                <?php endif; ?>
                            </ul>

                            <!-- CTA Button -->
                            <form action="<?php echo e(route('subscriptions.subscribe', $subscription->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php if($isActive): ?>
                                    <div class="flex items-center justify-center space-x-2 border border-green-300 rounded-md bg-green-50 px-6 py-3 text-sm font-medium text-green-700">
                                        <span>✓</span>
                                        <span>Abonnement actif</span>
                                    </div>
                                <?php else: ?>
                                    <button type="submit" class="w-full btn-minimal-primary">
                                        S'abonner maintenant
                                    </button>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- Additional Info -->
            <div class="mt-16 text-center">
                <p class="text-sm text-gray-600">
                    Tous les abonnements peuvent être annulés à tout moment. Aucun engagement.
                </p>
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
<?php /**PATH C:\Users\glouglou\Documents\Projets cours\php-laravel\blog-with-laravel\resources\views/subscriptions/index.blade.php ENDPATH**/ ?>