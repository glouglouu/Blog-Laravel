<nav x-data="{ open: false }" class="sticky top-0 z-50 border-b border-gray-200 bg-white/95 backdrop-blur-sm">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <!-- Logo & Brand -->
            <div class="flex items-center space-x-3">
                <a href="/" class="text-xl font-semibold text-gray-900">
                    TechBlog
                </a>
            </div>

            <!-- Navigation Links Desktop -->
            <div class="hidden items-center space-x-8 md:flex">
                <a href="/" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors <?php echo e(request()->routeIs('dashboard') ? 'text-gray-900' : ''); ?>">
                    <?php echo e(__('Home')); ?>

                </a>
                <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                    <a href="<?php echo e(route('dashboard')); ?>" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors <?php echo e(request()->routeIs('dashboard') ? 'text-gray-900' : ''); ?>">
                        <?php echo e(__('Dashboard')); ?>

                    </a>
                <?php endif; ?>
                <a href="<?php echo e(route('posts.index')); ?>" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors <?php echo e(request()->routeIs('posts.*') ? 'text-gray-900' : ''); ?>">
                    <?php echo e(__('Articles')); ?>

                </a>
                <a href="<?php echo e(route('subscriptions.index')); ?>" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors <?php echo e(request()->routeIs('subscriptions.*') ? 'text-gray-900' : ''); ?>">
                    <?php echo e(__('Subscriptions')); ?>

                </a>
            </div>

            <!-- Right Side - User Menu -->
            <div class="hidden items-center space-x-4 md:flex">
                <!-- Language Switcher -->
                <div x-data="{ openLang: false }" class="relative">
                    <button @click="openLang = !openLang" @click.away="openLang = false" class="flex items-center space-x-1 text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                        <span class="uppercase"><?php echo e(app()->getLocale()); ?></span>
                        <svg class="h-4 w-4" :class="{'rotate-180': openLang}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div x-show="openLang" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="absolute right-0 z-50 mt-2 w-40 origin-top-right border border-gray-200 bg-gray-50 shadow-sm"
                         style="display: none;">
                        <div class="py-1">
                            <a href="<?php echo e(route('language.switch', 'fr')); ?>" class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 transition-colors <?php echo e(app()->getLocale() == 'fr' ? 'bg-gray-200 font-medium' : ''); ?>">
                                <span>Français</span>
                            </a>
                            <a href="<?php echo e(route('language.switch', 'en')); ?>" class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 transition-colors <?php echo e(app()->getLocale() == 'en' ? 'bg-gray-200 font-medium' : ''); ?>">
                                <span>English</span>
                            </a>
                            <a href="<?php echo e(route('language.switch', 'de')); ?>" class="flex items-center space-x-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 transition-colors <?php echo e(app()->getLocale() == 'de' ? 'bg-gray-200 font-medium' : ''); ?>">
                                <span>Deutsch</span>
                            </a>
                        </div>
                    </div>
                </div>

                <?php if(auth()->guard()->check()): ?>
                    <?php if (isset($component)) { $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown','data' => ['align' => 'right','width' => '48','contentClasses' => 'py-1 bg-gray-50 dark:bg-gray-800']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['align' => 'right','width' => '48','contentClasses' => 'py-1 bg-gray-50 dark:bg-gray-800']); ?>
                         <?php $__env->slot('trigger', null, []); ?> 
                            <button class="inline-flex items-center space-x-2 text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">
                                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-gray-900 text-xs font-medium text-white">
                                    <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

                                </div>
                                <span><?php echo e(Auth::user()->name); ?></span>
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>
                         <?php $__env->endSlot(); ?>

                         <?php $__env->slot('content', null, []); ?> 
                            <div class="px-4 py-3 border-b border-gray-300 bg-white">
                                <p class="text-sm font-medium text-gray-900"><?php echo e(Auth::user()->name); ?></p>
                                <p class="text-xs text-gray-500"><?php echo e(Auth::user()->email); ?></p>
                            </div>
                            
                            <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('profile.edit')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit'))]); ?>
                                <span>Mon Profil</span>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>

                            <form method="POST" action="<?php echo e(route('logout')); ?>">
                                <?php echo csrf_field(); ?>
                                <?php if (isset($component)) { $__componentOriginal68cb1971a2b92c9735f83359058f7108 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal68cb1971a2b92c9735f83359058f7108 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dropdown-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault(); this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dropdown-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault(); this.closest(\'form\').submit();']); ?>
                                    <span class="text-gray-700">Déconnexion</span>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $attributes = $__attributesOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__attributesOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal68cb1971a2b92c9735f83359058f7108)): ?>
<?php $component = $__componentOriginal68cb1971a2b92c9735f83359058f7108; ?>
<?php unset($__componentOriginal68cb1971a2b92c9735f83359058f7108); ?>
<?php endif; ?>
                            </form>
                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $attributes = $__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__attributesOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe)): ?>
<?php $component = $__componentOriginaldf8083d4a852c446488d8d384bbc7cbe; ?>
<?php unset($__componentOriginaldf8083d4a852c446488d8d384bbc7cbe); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- Mobile menu button -->
            <button @click="open = ! open" class="p-2 text-gray-600 hover:text-gray-900 md:hidden">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-gray-200 md:hidden">
        <div class="space-y-1 px-4 pb-3 pt-2">
            <a href="/" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900">
                <?php echo e(__('Home')); ?>

            </a>
            <?php if(auth()->check() && auth()->user()->hasRole('admin')): ?>
                <a href="<?php echo e(route('dashboard')); ?>" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900">
                    <?php echo e(__('Dashboard')); ?>

                </a>
            <?php endif; ?>
            <a href="<?php echo e(route('posts.index')); ?>" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900">
                <?php echo e(__('Articles')); ?>

            </a>
            <a href="<?php echo e(route('subscriptions.index')); ?>" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900">
                <?php echo e(__('Subscriptions')); ?>

            </a>
        </div>

        <?php if(auth()->guard()->check()): ?>
            <div class="border-t border-gray-200 pb-3 pt-4">
                <div class="flex items-center px-4">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gray-900 text-sm font-medium text-white">
                        <?php echo e(substr(Auth::user()->name, 0, 1)); ?>

                    </div>
                    <div class="ml-3">
                        <div class="text-sm font-medium text-gray-900"><?php echo e(Auth::user()->name); ?></div>
                        <div class="text-xs text-gray-500"><?php echo e(Auth::user()->email); ?></div>
                    </div>
                </div>

                <div class="mt-3 space-y-1 px-4">
                    <a href="<?php echo e(route('profile.edit')); ?>" class="block px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-900">
                        Mon Profil
                    </a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="block w-full px-3 py-2 text-left text-sm font-medium text-gray-600 hover:text-gray-900">
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</nav>
<?php /**PATH C:\Users\glouglou\Documents\Projets cours\php-laravel\blog-with-laravel\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>