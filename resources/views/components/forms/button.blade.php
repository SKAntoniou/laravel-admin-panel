@props(['type', 'label'])

@if ($type === 'submit') 
  <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
@else
  <a href="{{ url()->previous() }}"><button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button></a>
@endif