
@props(['active'=>'false', 'type'=>'a'])

  
<{{ $type }} href="{{ $attributes->get('href') }}"
   class="{{ $active ? 'bg-gray-900 text-white px-3 py-2 rounded-md' : 'text-gray-300 hover:bg-gray-700 px-3 py-2 hover:text-white rounded-md' }}" aria-current="{{ $active ? 'page' : 'false' }}">{{ $slot }}
   
</{{ $type }}>
