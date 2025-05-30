@props(['labelTop', 'labelBtn', 'name'])

<x-forms.field :label="$labelTop" :$name>

  <div class="mt-2 flex items-center gap-4">
    <label for="{{ $name }}" class="inline-flex items-center rounded-md bg-white px-3 py-1.5 text-base text-gray-900 border border-gray-300 cursor-pointer shadow-sm hover:bg-gray-100 focus:outline-indigo-600 focus:outline-2">
      {{ $labelBtn }}
    </label>
    <input id="{{ $name }}" name="{{ $name }}" type="file" class="hidden" accept="image/png, image/jpeg, image/webp"/>
    <div id="{{ $name }}-file-name" class="text-sm text-gray-700 truncate max-w-xs">
      No file chosen
    </div>
  </div>
  <p class="mt-1 text-sm text-gray-500" id="{{ $name }}-help">Accepted formats: PNG, JPG, or WEBP.</p>
  
  <script>
    // Forms
    // File Upload
    const fileInput = document.getElementById( 'logo' );
    const fileInfoArea = document.getElementById( 'logo-file-name' );
    fileInput.addEventListener( 'change', (event) => {
      const input = event.srcElement;
      const fileName = input.files[0].name;
      fileInfoArea.textContent = 'File name: ' + fileName;
    });
  </script>

</x-forms.field>