@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'w-full rounded-full border-0 px-5 py-3
                text-gray-700 shadow-sm
                focus:ring-2 focus:ring-teal-500 focus:outline-none',
    ]) }}>
