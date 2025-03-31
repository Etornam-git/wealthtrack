
@props(['active'=>'false', 'type'=>'a'])

  
<{{ $type }} href="{{ $attributes->get('href') }}"
   class="{{ $active ? 'bg-blue-600 text-white font-medium px-4 py-2 rounded-lg shadow-md' : 'text-gray-500 hover:bg-blue-100 hover:text-blue-600 font-medium px-4 py-2 rounded-lg transition duration-200' }}" aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}
   
</{{ $type }}>
