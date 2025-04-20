@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-red-300 dark:border-gray-700 dark:bg-zinc-900 dark:text-gray-300 focus:border-red-500 dark:focus:border-red-600 focus:ring-red-500 dark:focus:ring-red-600 rounded-md shadow-sm']) }}>
