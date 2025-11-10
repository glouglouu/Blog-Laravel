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
     <?php $__env->slot('header', null, []); ?> 
        <div class="bg-gradient-to-b from-white to-gray-50/30 border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
                <h2 class="text-xl font-semibold leading-tight text-gray-900">
                    <?php echo e(__('Dashboard')); ?>

                </h2>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="bg-section py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Carte statistiques -->
                <div class="card-minimal p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-medium text-gray-900">Statistiques</h3>
                    </div>
                    <p class="mt-4 text-2xl font-semibold text-gray-900">89%</p>
                    <p class="mt-1 text-sm text-gray-500">Augmentation ce mois</p>
                </div>

                <!-- Carte activité -->
                <div class="card-minimal p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-medium text-gray-900">Activité récente</h3>
                        <span class="text-xs font-medium text-gray-600 border border-gray-300 rounded px-2 py-1">En ligne</span>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-600"><?php echo e(__("You're logged in!")); ?></p>
                    </div>
                </div>

                <!-- Carte progrès -->
                <div class="card-minimal p-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-medium text-gray-900">Progrès</h3>
                    </div>
                    <div class="mt-4">
                        <div class="h-1 w-full bg-gray-200 rounded-full">
                            <div class="h-1 w-2/3 bg-gray-900 rounded-full"></div>
                        </div>
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
<?php /**PATH C:\Users\glouglou\Documents\Projets cours\php-laravel\blog-with-laravel\resources\views/dashboard.blade.php ENDPATH**/ ?>