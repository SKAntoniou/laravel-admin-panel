@props(['name', 'label'])

<div class="inline-flex items-center gap-x-2">
    <label class="block text-sm/6 font-medium text-gray-900" for="{{ $name }}">{{ $label }}</label>
</div>