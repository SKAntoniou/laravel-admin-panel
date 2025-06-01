<x-app-layout>
  <div class="py-6">
    <x-forms.form method="POST" action="{{ route('employee.new') }}" enctype="multipart/form-data">
      <div class="space-y-12">

        <h2 class="text-base/7 font-semibold text-gray-900">Add Employee</h2>
        
        @if ($companies->isEmpty())
          <div class="grid gap-2 md:grid-cols-[3fr,1fr]">
            <div class="flex items-center justify-center">
              <p class="grow text-center rounded-md bg-red-500 px-3 py-2 text-lg font-semibold text-white shadow-xs">
                There are no companies this employee could be associated with.<br>
              Please make a company first.
              </p>
            </div>

            <a href="{{ route('company.new') }}" class="flex items-center justify-center grow rounded-md px-3 py-2 text-lg font-semibold text-white shadow-xs active:scale-95 transition text-white  bg-indigo-500 hover:bg-indigo-600">
              <span class="text-center">Create Company</span>
            </a>
          </div>
        @endif

        <div>
          <x-forms.label :name="'company_id'" :label="'Associated Company'"></x-forms.label>
          <select name="company_id" id="company_id_id" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600">
            @foreach ($companies as $company)
              <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
          </select>
        </div>

        <x-forms.input label="First Name" name="first_name" />
        <x-forms.input label="Last Name" name="last_name" />
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Phone Number" name="phone_number" type="tel"/>
        


      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <x-forms.button :type="'button'" :label="'Cancel'" link="{{ route('employees') }}" />        
        <x-forms.button :type="'submit'" :label="'Save'" />

      </div>
    </x-forms.form>
  </div>
</x-app-layout>