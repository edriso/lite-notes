@props(['field' => '', 'value' => ''])

<textarea {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
]) !!}>{{ $value }}</textarea>
@error($field)
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
@enderror
