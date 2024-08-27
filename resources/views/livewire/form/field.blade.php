<div>
    <label for="{{ $id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
        {{ $placeholder ?? 'Input' }}
    </label>

    <div class="relative mb-6">
        @if ($icon)
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4 {{ $success ? 'text-green-500' : 'text-gray-500' }} dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    {!! $icon !!}
                </svg>
            </div>
        @endif
        <input
            type="{{ $type }}"
            id="{{ $id }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            wire:model="{{ $attributes['wire:model'] ?? 'value' }}"
            @foreach($attributes as $key => $value)
                {{ $key }}="{{ $value }}"
            @endforeach
            class="bg-gray-50 border {{ $error ? 'border-red-500' : ($success ? 'border-green-500' : 'border-gray-300') }} text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
        @if ($error)
            <span class="text-red-500 text-sm">{{ $error }}</span>
        @endif
    </div>
</div>
