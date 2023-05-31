<button {{ $attributes->class(
    'uppercase font-bold justify-center inline-flex items-center rounded-sm border border-pink-500 px-3 py-3 leading-4 text-pink-500 hover:bg-pink-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2'
)->merge([
    'type' => $type
])->when($name, fn($attr) => $attr->merge(['name' => $name, 'value' => $value])) }}
>
    @if(trim($slot))
        {{ $slot }}
    @else
        <div class="flex flex-row items-center justify-center">
            <svg
                v-if="@js($spinner) && form.processing"
                class="animate-spin mr-3 h-5 w-5 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            >
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
            </svg>

            <span :class="{ 'opacity-50': form.processing || form.$uploading }">
                {{ $label }}
            </span>
        </div>
    @endif
</button>
