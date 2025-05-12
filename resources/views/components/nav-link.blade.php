@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 dark:text-dark-text dark:border-dark-text-accent focus:outline-none focus:border-indigo-700 dark:focus:border-dark-text-accent transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-dark-text-muted hover:text-gray-700 dark:hover:text-dark-text hover:border-gray-300 dark:hover:border-dark-text-muted focus:outline-none focus:text-gray-700 dark:focus:text-dark-text focus:border-gray-300 dark:focus:border-dark-text-muted transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
