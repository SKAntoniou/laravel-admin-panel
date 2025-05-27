<x-app-layout>
  <div class="py-6">
    <x-forms.form method="POST" action="{{ route('employee.new') }}" enctype="multipart/form-data">
      <div class="space-y-12">

        <h2 class="text-base/7 font-semibold text-gray-900">Add Employee</h2>
        <input type="hidden" name="redirect_to" value="{{ request('back', url()->previous()) }}">
        
        @if (empty($companies))
          <h3>There are no companies this employee could be associated with. Please make a company first.</h3>
        @endif

        <div>
          <x-forms.label :name="'company_id'" :label="'Associated Company'"></x-forms.label>
          <select name="company_id" id="company_id_id" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
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
        <x-forms.button :type="'button'" :label="'Cancel'" link="{{ url()->previous() }}" />        
        <x-forms.button :type="'submit'" :label="'Save'" />

      </div>
    </x-forms.form>
  </div>
</x-app-layout>