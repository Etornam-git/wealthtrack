@props(['name', 'label', 'options' => [], 'selected' => null, 'required' => false, 'disabled' => false, 'class' => '', 'error' => null])

<div class="mb-4">
    @if($label)
        <x-form-label :for="$name" :value="$label" :required="$required" />
    @endif

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $required ? 'required' : '' }}
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:border-indigo-400 dark:focus:ring-indigo-400 sm:text-sm ' . $class]) !!}
    >
        @if(!$required)
            <option value="">Select an option</option>
        @endif

        @foreach($options as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                {{ $label }}
            </option>
        @endforeach
    </select>

    @if($error)
        <x-form-error :name="$name" />
    @endif
</div>
