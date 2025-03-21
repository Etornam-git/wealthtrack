
@props(['active'=>'false'])

  
<a
 class=
    "{{ $active  ? 'bg-gray-900 text-white px-3 py-2 rounded': 
    'text-gray-300 hover:bg-gray-700 px-3 py-2 hover:text-white rounded' }}"
    >{{ $slot }}</a>
