/******************************************************
 * 🧩 PART 1 — FILE UPLOAD, PREVIEW & DRAG-DROP HANDLER
 ******************************************************/
const fileInput = document.getElementById('ocrFileInput');
const previewContainer = document.getElementById('ocrPreview');
const dropZone = document.getElementById('ocrDropZone');
const warning = document.getElementById('ocrWarning');

let selectedFile = null; // single file only

// Show floating warning
function showWarning(message) {
  warning.textContent = message;
  warning.classList.remove('hidden');
  warning.classList.add('opacity-100', 'transition-opacity', 'duration-300');

  setTimeout(() => {
    warning.classList.add('opacity-0');
    setTimeout(() => warning.classList.add('hidden'), 300);
  }, 3000);
}

// Update preview
function previewFile() {
  previewContainer.innerHTML = '';

  if (!selectedFile) {
    previewContainer.innerHTML = '<p class="text-gray-400 text-sm">No file selected</p>';
    return;
  }

  const fileWrapper = document.createElement('div');
  fileWrapper.className = 'flex items-center justify-between bg-gray-100 dark:bg-zinc-700 text-gray-800 dark:text-gray-200 px-3 py-2 rounded-lg m-1';

  const fileName = document.createElement('span');
  fileName.textContent = selectedFile.name;
  fileName.className = 'truncate max-w-xs';
  fileWrapper.appendChild(fileName);

  const removeBtn = document.createElement('button');
  removeBtn.innerHTML = '&times;';
  removeBtn.className = 'ml-2 text-white bg-red-500 rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600';
  removeBtn.addEventListener('click', () => {
    selectedFile = null;
    fileInput.value = ''; // clear file input
    previewFile();
  });
  fileWrapper.appendChild(removeBtn);

  previewContainer.appendChild(fileWrapper);
}

// Handle file selection
fileInput.addEventListener('change', (e) => {
  const file = e.target.files[0];

  if (!file) return;
  if (!file.type.match(/image|pdf/)) {
    showWarning('Only images and PDFs are supported!');
    return;
  }

  selectedFile = file;
  previewFile();
});

// Handle drag & drop
['dragenter', 'dragover'].forEach(eventName => {
  dropZone.addEventListener(eventName, e => {
    e.preventDefault();
    dropZone.classList.add('bg-gray-100', 'dark:bg-zinc-700');
  });
});

['dragleave', 'drop'].forEach(eventName => {
  dropZone.addEventListener(eventName, e => {
    e.preventDefault();
    dropZone.classList.remove('bg-gray-100', 'dark:bg-zinc-700');
  });
});

dropZone.addEventListener('drop', e => {
  const file = e.dataTransfer.files[0]; // take only one
  if (!file) return;

  if (!file.type.match(/image|pdf/)) {
    showWarning('Only images and PDFs are supported!');
    return;
  }

  selectedFile = file;
  fileInput.files = e.dataTransfer.files; // sync input
  previewFile();
});

/********************************************************
 * 🧠 PART 2 — OCR EXTRACTION + EVENT CARD RENDERING (AJAX)
 ********************************************************/
document.getElementById('ocrForm').addEventListener('submit', async (e) => {
      e.preventDefault();

      const formData = new FormData(e.target);
      const resultDiv = document.getElementById('result');
      const eventsContainer = document.getElementById('eventsContainer');
      const loading = document.getElementById('loading');

      resultDiv.classList.add('hidden');
      loading.classList.remove('hidden');
      eventsContainer.innerHTML = '';

      try {
        // Read endpoint from form data-action (set by Blade) or fallback to known path
        const action = e.target.getAttribute('data-action') || e.target.action || '/ocr/vision-extract';

        // Read CSRF token safely (meta tag added in head) or from hidden input fallback
        const csrfMeta = document.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfMeta?.content || e.target.querySelector('input[name="_token"]')?.value || '';

        // Build headers: include Accept and X-Requested-With so Laravel treats this as an AJAX/JSON request
        const headers = {
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        };
        if (csrfToken) headers['X-CSRF-TOKEN'] = csrfToken;

        const response = await fetch(action, {
          method: 'POST',
          headers,
          body: formData
        });

        loading.classList.add('hidden');

        // Log status and content-type to help debug why server returned HTML
        console.info('OCR fetch response:', response.status, response.statusText, 'URL:', response.url);
        console.info('Response Content-Type:', response.headers.get('content-type'));

        if (!response.ok) {
          const text = await response.text();
          console.error('OCR fetch failed:', response.status, response.statusText);
          console.error('Response (text):', text);
          showWarning('Server error during OCR extraction. See console for details.');
          try { const errData = JSON.parse(text); console.warn('Parsed error JSON:', errData); } catch (_) {}
          return;
        }

        // Read the response body once as text and then attempt to parse JSON. If the server returned HTML
        // (for example a full page), this will surface the text so you can inspect it.
        const text = await response.text();
        let data;
        try {
          data = JSON.parse(text);
        } catch (err) {
          console.error('Failed to parse JSON response from', action, '\nResponse text:\n', text);
          showWarning('Invalid server response (not JSON). Check console/server logs.');
          return;
        }

        if (data.events && data.events.length > 0) {
          data.events.forEach((event, index) => {
            const card = document.createElement('div');
            card.className = "bg-white dark:bg-zinc-800 shadow-md rounded-xl border border-gray-200 dark:border-gray-700 p-6 mb-6 space-y-4";

            card.innerHTML = `
              <div class="flex justify-between items-center">
                <h4 class="text-lg font-semibold text-blue-600">Event ${index + 1}</h4>
                <button type="button" class="deleteBtn text-red-500 hover:text-red-700 font-semibold">🗑 Delete</button>
              </div>

              <div class="flex gap-10">
                <div class="flex-[40%] mb-6">
                  <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Event Name</label>
                  <input type="text" name="event_name" placeholder="Badminton" value="${event.event_name || ''}"
                    class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light">
                </div>

                <div class="flex-[30%] mb-6">
                  <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Event Icon</label>
                  <div class="flex flex-row gap-3 justify-start items-center">
                    <div class="flex items-center justify-center">
                      <div class="flex-[40%] rounded-full bg-[hsl(31,49%,49%)] p-3">
                        <img class="iconPreview w-7 h-7 object-contain" 
                            src="/icons/arnis.png" alt="Icon Preview">
                      </div>
                    </div>

                    <select class="iconSelect flex-[60%] select select-bordered w-full px-2 text-sm p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light h-full"></select>
                  </div>
                </div>
              </div>

              <div class="mb-6">
                <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Category</label>
                <input type="text" name="category" placeholder="Sports" value="${event.category || ''}"
                  class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light">
              </div>

              <div class="mb-6">
                <label class="flex text-dark dark:text-light font-medium mb-2 text-lg">Description</label>
                <textarea name="description" placeholder="Type a short description here..." rows="4" value="${event.event_description || ''}"
                  class="w-full p-3 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-zinc-700 text-dark dark:text-light resize-none">${event.description || ''}</textarea>
              </div>
            `;

            // Delete button
            card.querySelector('.deleteBtn').addEventListener('click', () => card.remove());

            // Icon selection update: populate options from template or window.ICONS
            const iconSelect = card.querySelector('.iconSelect');
            const iconPreview = card.querySelector('.iconPreview');
            const optsTemplate = document.getElementById('icon-options-template');
            if (optsTemplate) {
              iconSelect.innerHTML = optsTemplate.innerHTML;
            } else if (window.ICONS && Array.isArray(window.ICONS)) {
              let opts = '<option value="">--Select Icon--</option>';
              opts += window.ICONS.map(fn => {
                const label = fn.replace(/\.[^/.]+$/, '');
                return `<option value="${fn}">${label}</option>`;
              }).join('');
              iconSelect.innerHTML = opts;
            }

            iconSelect.addEventListener('change', function() {
              const base = (typeof ICONS_PATH !== 'undefined') ? ICONS_PATH : '/icons/';
              const val = this.value;
              iconPreview.src = val ? (base + val) : (base + 'arnis.png');
            });

            eventsContainer.appendChild(card);
          });

          resultDiv.classList.remove('hidden');
        } else if (data.raw) {
              const raw = document.createElement('div');
              raw.className = "alert alert-warning whitespace-pre-wrap";
              raw.innerText = "Could not parse structured data:\n" + data.raw;
              eventsContainer.appendChild(raw);
              resultDiv.classList.remove('hidden');
            } else {
              alert('No recognizable events found.');
            }
        } catch (error) {
            loading.classList.add('hidden');
            alert('Error during OCR extraction.');
            console.error(error);
          }
        });

  // Save extracted events to server (bulk)
  document.addEventListener('click', async (e) => {
    if (e.target && e.target.id === 'saveExtractedBtn') {
      const cards = Array.from(document.querySelectorAll('#eventsContainer > div'));
      if (cards.length === 0) {
        showWarning('No extracted events to save');
        return;
      }

      const events = cards.map(card => {
        return {
          event_name: card.querySelector('input[name="event_name"]')?.value || '',
          category: card.querySelector('input[name="category"]')?.value || '',
          description: card.querySelector('textarea[name="description"]')?.value || '',
          icon: card.querySelector('.iconSelect')?.value || '',
        };
      });

      // Basic client-side validation
      const invalid = events.find(ev => !ev.event_name || !ev.category);
      if (invalid) {
        showWarning('Each event must have a name and category before saving.');
        return;
      }

      const csrf = document.querySelector('meta[name="csrf-token"]')?.content || '';
      try {
        const res = await fetch('/intra-events/bulk', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrf,
            'Accept': 'application/json'
          },
          body: JSON.stringify({ events })
        });

        if (!res.ok) {
          const text = await res.text();
          console.error('Bulk save failed', res.status, text);
          showWarning('Save failed. See console for details.');
          return;
        }

        const data = await res.json();
        // success — clear cards and show message
        document.getElementById('eventsContainer').innerHTML = '';
        showWarning(data.message || 'Events saved');
      } catch (err) {
        console.error('Save extracted events error', err);
        showWarning('Error saving events.');
      }
    }

    if (e.target && e.target.id === 'clearExtractedBtn') {
      document.getElementById('eventsContainer').innerHTML = '';
    }
  });
    
  
