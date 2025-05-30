<x-overview-layout :heading="'Company Overview - ' . $company->name" :itemName="'Employee'" :itemRoute="'/company/' . $company->id . '/edit'" :array="$employees" :gridBreakpoints="'md:grid-cols-2 lg:grid-cols-4'" :type="'employee'" :edit="true" :headerAction="'Edit'" :headerName="'Company'">

  <div class="bg-white overflow-hidden shadow-sm rounded-lg m-6">
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
        <div class="grid gap-4 justify-center sm:grid-cols-[200px_1fr] ">
          <div class="min-h-[100px] max-h-[200px] min-w-[100px] max-w-[200px]">
            <img 
              src="{{ filter_var($company->logo, FILTER_VALIDATE_URL) ? $company->logo : asset($company->logo) }}" 
              alt="{{ $company->name }} Logo"
              class="h-full object-contain m-auto" />
          </div>
          <div class="grow flex flex-col gap-2 ">
            <h2 class="text-lg font-semibold">{{ $company->name }}</h2>
            <h4>{{ $company->email }}</h4>
            <div class="flex justify-between items-center flex-wrap">
              <h4>{{ $company->website }}</h4>
              <a href="{{ $company->website }}" class="p-3 active:scale-95 transition text-sm text-white rounded-full bg-indigo-500 hover:bg-indigo-600">
                Goto Website
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <div class="text-gray-800 flex justify-between items-center">
        <h2 class="font-semibold text-xl leading-tight">
          Employees
        </h2>
        <a href="{{ route('employee.new') }}" class="p-3 active:scale-95 transition text-sm text-white rounded-full bg-indigo-500 hover:bg-indigo-600">
          Add Employee
        </a>
      </div>
    </div>
  </div>

</x-overview-layout>