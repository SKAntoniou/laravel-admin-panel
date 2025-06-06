@props(['heading', 'itemName', 'itemRoute', 'array', 'gridBreakpoints', 'type', 'edit', 'headerAction', 'headerName'])

<x-app-layout>
    <x-slot name="header">
        <div class="text-gray-800 flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight">
                {{ $heading }}
            </h2>
            
            <a href="{{ $itemRoute }}" class="p-3 active:scale-95 transition text-sm text-white rounded-full bg-indigo-500 hover:bg-indigo-600">
                {{ $headerAction }} {{ $headerName }}
            </a>
        </div>
    </x-slot>

    {{ $slot }}

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 grid grid-cols-1 gap-3 {{ $gridBreakpoints }}">
            @foreach($array as $item)
                <x-company-card :$item :$itemName :$type :$edit>
                </x-company-card>
            @endforeach
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
            {{ $array->links() }}
        </div>
    </div>
</x-app-layout>