import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Forms
// File Upload
const fileInput = document.getElementById( 'logo' );
const fileInfoArea = document.getElementById( 'logo-file-name' );
fileInput.addEventListener( 'change', (event) => {
  const input = event.srcElement;
  const fileName = input.files[0].name;
  fileInfoArea.textContent = 'File name: ' + fileName;
});