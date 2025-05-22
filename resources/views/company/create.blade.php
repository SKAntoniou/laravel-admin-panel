<x-app-layout>
  <div class="py-6">
    <x-forms.form method="POST" action="{{ route('company.new') }}" enctype="multipart/form-data">
      <div class="space-y-12">

        <h2 class="text-base/7 font-semibold text-gray-900">Add Company</h2>

        <x-forms.input label="Name" name="name" />
        <x-forms.input label="Email" name="email" type="email" />
        <x-forms.input label="Website" name="website"/>
        <x-forms.file-upload :labelTop="'Upload logo'" :labelBtn="'Choose File'" :name="''" />
        
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <x-forms.button :type="'button'" :label="'Cancel'" />        
        <x-forms.button :type="'submit'" :label="'Save'" />

      </div>
    </x-forms.form>
  </div>
</x-app-layout>