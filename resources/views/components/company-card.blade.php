@props(['item', 'itemName', 'type', 'edit'=>false, ])

<div class="bg-white overflow-hidden shadow-sm rounded-lg flex">
  @if (!empty($item->logo))
    <div class="min-h-[100px] max-h-[200px] min-w-[100px] max-w-[200px] p-2">
      <img class="h-full object-contain" 
        src="{{ filter_var($item->logo, FILTER_VALIDATE_URL) ? $item->logo : asset('storage/' . $item->logo) }}" alt="Company Logo">
    </div>
  @endif
  <div class="p-6 text-gray-900 flex flex-col gap-3 grow">
    @if (!empty($item->name))
      <p>{{ $item->name }}</p>
    @elseif (!empty($item->first_name) && !empty($item->last_name))
      <p>{{ $item->first_name . " " . $item->last_name }}</p>
    @endif
    <p>{{ $item->email }}</p>
    @if (!empty($item->phone_number))
      <p>{{ $item->phone_number }}</p>
    @endif
    @if (!empty($item->company))
      <p>{{ $item->company->name }}</p>
    @endif
    <div class="flex flex-wrap gap-3">
      @if (!empty($item->website))
        <a class="p-3 active:scale-95 transition text-sm text-white rounded-full bg-indigo-500 hover:bg-indigo-600" 
          href="{{ $item->website }}">Visit Website</a>
      @endif
      @if ($edit)
        <a class="p-3 active:scale-95 transition text-sm text-white rounded-full bg-indigo-500 hover:bg-indigo-600"
          href="/{{ $type }}/{{ $item->id }}/edit">Edit {{ $itemName }}</a>
      @else 
        <a class="p-3 active:scale-95 transition text-sm text-white rounded-full bg-indigo-500 hover:bg-indigo-600"
          href="/{{ $type }}/{{ $item->id }}">View {{ $itemName }}</a>
      @endif
    </div>
  </div>
</div>