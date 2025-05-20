@props(['heading', 'itemName', 'itemRoute', 'array'])

<x-app-layout>
    <x-slot name="header">
        <div class="text-gray-800 flex justify-between items-center">
            <h2 class="font-semibold text-xl leading-tight">
                {{ $heading }}
            </h2>
            <a href="{{ $itemRoute }}" class="p-3 active:scale-95 transition text-sm text-white rounded-full bg-indigo-500 hover:bg-indigo-600">
                Add {{ $itemName }}
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-3">
            @foreach($array as $item)
                <x-company-card :$item :$itemName>
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