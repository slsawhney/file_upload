const dropzone = document.getElementById('dropzone');
const fileInput = document.getElementById('fileInput');
const form = document.getElementById('uploadForm');

// Allow click to trigger file input.
dropzone.addEventListener('click', () => fileInput.click());

// Handle file dragover.
dropzone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropzone.classList.add('dragover');
});

// Handle drag leave.
dropzone.addEventListener('dragleave', () => {
    dropzone.classList.remove('dragover');
});

// Handle drop.
dropzone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropzone.classList.remove('dragover');

    if (e.dataTransfer.files.length > 0) {
        fileInput.files = e.dataTransfer.files;
        form.submit();
    }
});

// Handle file chooser.
fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
        form.submit();
    }
});
