@props(['name'])

@error($name)
    <p class="text-red-500 sm:text-sm/6 ">{{ $message }}</p>
@enderror
