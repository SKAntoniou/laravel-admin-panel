<x-app-layout>
  <div class="py-6">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">
      <form method="POST" action="{{ route('company.new') }}" enctype="multipart/form-data">
        @csrf 

        <div class="space-y-12">

          <h2 class="text-base/7 font-semibold text-gray-900">
            Add Company
          </h2>

          <div class="sm:col-span-4">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Name</label>
            <div class="mt-2">
              <input id="name" name="name" type="text" autocomplete="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="mt-2">
              <input id="email" name="email" type="email" autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="website" class="block text-sm/6 font-medium text-gray-900">Website</label>
            <div class="mt-2">
              <input id="website" name="website" type="text" autocomplete="website" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>

          <div class="sm:col-span-4">
            <label class="block text-sm/6 font-medium text-gray-900" for="logo">Upload logo</label>

            <div class="mt-2 flex items-center gap-4">
              <label for="logo" class="inline-flex items-center rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 cursor-pointer shadow-sm hover:bg-gray-100 focus:outline-indigo-600 focus:outline-2">
                Choose File
              </label>
              <input id="logo" name="logo" type="file" class="hidden" accept="image/png, image/jpeg, image/webp"/>
              <div id="logo-file-name" class="text-sm text-gray-700 truncate max-w-xs">
                No file chosen
              </div>
            </div>
            <p class="mt-1 text-sm text-gray-500" id="logo-help">Accepted formats: PNG, JPG, or WEBP.</p>
          </div>

          
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
          <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
          <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>