<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize | TagisanAI</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-bglight dark:bg-bgdark min-h-screen w-full overflow-x-hidden font-poppins">
    @include('localMasts.localMasts-sidepanel')
    
    <div class="min-h-screen pl-28 pt-12 pr-28">
        <!-- Page Header -->
        <div>
          <p class="text-4xl font-semibold text-dark dark:text-light">Customize</p>
          <p class="text-lg text-dark/60 dark:text-light/60 py-2">
            Add more personality to your AI chatbot by adding knowledge to its dataset. 
          </p>
        </div>

        <div class=" bg-orange-200/40 dark:bg-base-200 flex justify-center items-center mt-16 mx-52 rounded-xl shadow-[0px_0px_10px_rgba(0,0,0,0.18)]">
            <!-- Main Form -->
          <form class="mt-10 space-y-10 w-full mx-10 p-5">

            <!-- Additional Data -->
            <div>
              <label class="block text-2xl font-semibold text-dark dark:text-light mb-2">Additional Data</label>

              <p class="text-dark/70 dark:text-light/70 mb-3">
                Upload any supporting files (PDF, DOCX, or TXT) that will serve as data to help the AI understand your event.
              </p>

              <!-- Drop Zone -->
              <label for="ragFiles" id="ragDropZone"
                    class="w-full h-44 border-2 border-dashed border-black/60 dark:border-white/60 rounded-lg 
                            flex flex-col items-center justify-center cursor-pointer hover:bg-primary/10 dark:hover:bg-primary/20 
                            transition text-dark dark:text-light bg-white/50 dark:bg-zinc-800">
                <div class="text-dark/80 dark:text-white/80 mb-2">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                          d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 4v8m0 0l-3-3m3 3l3-3" />
                  </svg>
                </div>
                <p class="font-medium">Click or drag files to upload</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">(Supports PDF, DOCX, and TXT)</p>
              </label>

              <!-- File Input -->
              <input id="ragFiles" name="ragFiles[]" type="file" accept=".pdf,.doc,.docx,.txt" multiple class="hidden" />

              <!-- Preview -->
              <div id="ragPreview" class="hidden mt-4 bg-white dark:bg-zinc-900 border border-gray-300 dark:border-gray-700 rounded-lg p-3">
                <p class="font-semibold text-dark dark:text-light mb-2">Files Selected:</p>
                <ul id="ragFileList" class="list-disc list-inside text-dark dark:text-light"></ul>
              </div>
            </div>

            <div class="flex justify-end items-end">
              <!-- Save Button -->
            <button type="submit" class="btn bg-green-500 px-4">Save Changes</button>
            </div>
              
            
            
          </form>
        </div>
    </div>

    <!-- Header Logo Upload -->
    <script>
    const dropZone = document.getElementById('dropZone');
    const fileInput = document.getElementById('fileInput');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');
    const fileName = document.getElementById('fileName');
    const uploadText = document.getElementById('uploadText');
    const uploadIcon = document.getElementById('uploadIcon');

    // Highlight effect
    dropZone.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropZone.classList.add('bg-primary/10');
    });

    dropZone.addEventListener('dragleave', () => {
      dropZone.classList.remove('bg-primary/10');
    });

    dropZone.addEventListener('drop', (e) => {
      e.preventDefault();
      dropZone.classList.remove('bg-primary/10');
      fileInput.files = e.dataTransfer.files;
      showPreview(fileInput.files[0]);
    });

    fileInput.addEventListener('change', () => {
      if (fileInput.files.length > 0) showPreview(fileInput.files[0]);
    });

    function showPreview(file) {
      previewContainer.classList.remove('hidden');
      uploadIcon.classList.add('hidden');
      uploadText.textContent = "Image Selected:";
      fileName.textContent = file.name;

      const reader = new FileReader();
      reader.onload = (e) => (previewImage.src = e.target.result);
      reader.readAsDataURL(file);
    }
  </script>

<!-- RAG File Upload -->
  <script>
const ragDropZone = document.getElementById('ragDropZone');
const ragFileInput = document.getElementById('ragFiles');
const ragPreview = document.getElementById('ragPreview');
const ragFileList = document.getElementById('ragFileList');

// Drag-and-drop effects
ragDropZone.addEventListener('dragover', (e) => {
  e.preventDefault();
  ragDropZone.classList.add('bg-primary/10', 'dark:bg-primary/20');
});

ragDropZone.addEventListener('dragleave', () => {
  ragDropZone.classList.remove('bg-primary/10', 'dark:bg-primary/20');
});

ragDropZone.addEventListener('drop', (e) => {
  e.preventDefault();
  ragDropZone.classList.remove('bg-primary/10', 'dark:bg-primary/20');
  ragFileInput.files = e.dataTransfer.files;
  showRagFiles(ragFileInput.files);
});

ragFileInput.addEventListener('change', () => {
  showRagFiles(ragFileInput.files);
});

function showRagFiles(files) {
  if (files.length === 0) return;
  ragPreview.classList.remove('hidden');
  ragFileList.innerHTML = '';

  Array.from(files).forEach(file => {
    const li = document.createElement('li');
    li.textContent = `${file.name} (${(file.size / 1024).toFixed(1)} KB)`;
    ragFileList.appendChild(li);
  });
}
</script>


    @include('layout.footer')
</body>
</html>