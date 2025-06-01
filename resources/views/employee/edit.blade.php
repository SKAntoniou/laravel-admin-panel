<x-app-layout>
  <div class="py-6">
    <x-forms.form method="POST" action="{{ route('employee.update', ['employee' => $employee->id]) }}" enctype="multipart/form-data">
      @method('PATCH')
      <div class="space-y-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Edit Company</h2>
        <input name="id" type="hidden" value="{{ $employee->id }}">

        <div>
          <x-forms.label :name="'company_id'" :label="'Associated Company'"></x-forms.label>
          <select name="company_id" id="company_id_id" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            @foreach ($companies as $company)
              @if ( $company->id  == $employee->company_id )
                <option value="{{ $company->id }}" selected>{{ $company->name }}</option>
              @else
                <option value="{{ $company->id }}">{{ $company->name }}</option>
              @endif
            @endforeach
          </select>
        </div>

        <x-forms.input label="First Name" name="first_name" value="{{ $employee->first_name }}"/>
        <x-forms.input label="Last Name" name="last_name" value="{{ $employee->last_name }}"/>
        <x-forms.input label="Email" name="email" type="email"  value="{{ $employee->email }}"/>
        <x-forms.input label="Phone Number" name="phone_number"  value="{{ $employee->phone_number }}"/>

      </div>

      <div class="mt-6 flex items-center justify-between gap-x-6">
        <div class="flex gap-x-6 items-center">
          <x-forms.button :type="'delete'" :label="'Delete'"/>  
        </div>
        <div class="flex gap-x-6 items-center">
          <x-forms.button :type="'button'" :label="'Cancel'" link="{{ route('employees') }}" />        
          <x-forms.button :type="'submit'" :label="'Update'" />
        </div>

      </div>
    </x-forms.form>

    <form method="POST" action="{{ route('employee.delete', ['employee' => $employee->id]) }}" id="delete-form" class="hidden"
      x-data="{ submitting: false }" @submit="submitting = true">
        @csrf
        @method('DELETE')
    </form>

  </div>
</x-app-layout>