@props(['active' => false, 'block' => false])


<a class="{{ $active ? 'bg-gray-900 text-white' : '' }} {{ $block ? 'block' : '' }} rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
    {{ $attributes }}>{{ $slot }}</a>
