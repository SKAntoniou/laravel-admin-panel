@props(['company'])

<div class="bg-white overflow-hidden shadow-sm rounded-lg flex">
    <div class="min-h-[100px] h-full min-w-[100px] max-w-[200px] p-2">
      <img class="h-full object-contain" 
          src="{{ $company->logo }}" alt="Company Logo">
    </div>
    <div class="p-6 text-gray-900 flex flex-col gap-3 grow">
        <p>{{ $company->name }}</p>
        <p>{{ $company->email }}</p>
        <div class="flex flex-wrap gap-3">
          <a class="p-3 active:scale-95 transition text-sm text-white rounded-full bg-indigo-500 hover:bg-indigo-600" 
            href="{{ $company->website }}">Visit Website</a>
          <a class="p-3 active:scale-95 transition text-sm text-white rounded-full bg-indigo-500 hover:bg-indigo-600"
            href="company/{{ $company->id }}">View Company</a>
        </div>
    </div>
</div>