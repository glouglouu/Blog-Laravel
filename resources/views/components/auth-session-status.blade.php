@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'border border-green-200 rounded-lg bg-green-50 p-4']) }}>
        <div class="flex items-center space-x-2">
            <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <p class="text-sm text-green-700">{{ $status }}</p>
        </div>
    </div>
@endif
