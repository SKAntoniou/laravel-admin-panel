<x-app-layout>
  <div class="py-6">
    <x-forms.form method="POST" action="{{ route('company.update', ['company' => $company->id]) }}" enctype="multipart/form-data">
      @method('PATCH')
      <div class="space-y-12">

        <h2 class="text-base/7 font-semibold text-gray-900">Edit Company</h2>
        <input name="id" type="hidden" value="{{ $company->id }}">

        <x-forms.input label="Name" name="name" value="{{ $company->name }}"/>
        <x-forms.input label="Email" name="email" type="email"  value="{{ $company->email }}"/>
        <x-forms.input label="Website" name="website"  value="{{ $company->website }}"/>

        <div class="grid grid-cols-2">
          <div>
            @if (!empty($item->logo) && $item->logo)
              <x-forms.label :label="'Current Logo'" :name="''"></x-forms.label>
              <img src="{{ filter_var($company->logo, FILTER_VALIDATE_URL) ? $company->logo : asset('storage/' . $company->logo) }}" alt="{{ $company->name }} logo" 
                class="max-h-[400px] max-w-full"/>
            @endif
          </div>
          <div>
            <x-forms.file-upload :labelTop="'Upload logo'" :labelBtn="'Choose File'" :name="'logo'" />
          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-between gap-x-6">
        <div class="flex gap-x-6 items-center">
          <x-forms.button :type="'delete'" :label="'Delete'"/>  
        </div>
        <div class="flex gap-x-6 items-center">
          <x-forms.button :type="'button'" :label="'Cancel'" :link="route('company.show', ['company' => $company->id])" />        
          <x-forms.button :type="'submit'" :label="'Update'" />
        </div>

      </div>
    </x-forms.form>

    <form method="POST" action="{{ route('company.delete', ['company' => $company->id]) }}" id="delete-form" class="hidden"
      x-data="{ submitting: false }" @submit="submitting = true">
        @csrf
        @method('DELETE')
    </form>

  </div>
</x-app-layout>