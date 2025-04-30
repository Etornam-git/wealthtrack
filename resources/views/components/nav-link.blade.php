@props(['active' => false, 'type' => 'a'])

<{{ $type }} {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition duration-200 ease-in-out ' . ($active ? 'bg-indigo-600 text-white shadow-md' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700')]) }} aria-current="{{ $active ? 'page' : 'false' }}">
    {{ $slot }}
</{{ $type }}>
