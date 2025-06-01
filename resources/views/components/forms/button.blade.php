@props(['type', 'label', 'link'])

@if ($type === 'submit') 
  <button :disabled="submitting" type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
@elseif ($type === 'delete')
  <button :disabled="submitting" type="submit" form="delete-form" class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600">{{ $label }}</button>
@else
  <a href="{{ $link }}"><button :disabled="submitting" type="button" class="text-sm/6 font-semibold text-gray-900">{{ $label }}</button></a>
@endif

