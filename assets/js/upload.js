const fileInput = document.getElementById('photos');
const preview = document.getElementById('preview');
const startUpload = document.getElementById('startUpload');
const dropArea = document.getElementById('drop-area');
const progress = document.getElementById('upload-progress');
const progressBar = progress.querySelector('.progress-bar');
const sizeProgress = document.getElementById('size-progress');
const sizeText = document.getElementById('size-text');

let selectedFiles = [];

// --- Utils ---
function formatSize(bytes) {
  return (bytes / (1024*1024)).toFixed(1) + ' МБ';
}
function getTotalSize(files) {
  return files.reduce((acc,f)=>acc+f.size,0);
}

// --- Preview ---
function addPreview(files) {
  files.forEach(file => {
    // Проверка: есть ли файл уже в selectedFiles
    if (selectedFiles.find(f => f.name === file.name && f.size === file.size)) return;

    selectedFiles.push(file);

    const card = document.createElement('div');
    card.className = 'border rounded text-center small p-1 me-2';
    card.style.width = '100px';
    card.style.flex = '0 0 auto';
    card.style.position = 'relative';

    if (file.type.startsWith('image/')) {
      const img = document.createElement('img');
      img.src = URL.createObjectURL(file);
      img.style.width = '100%';
      img.style.height = '100px';
      img.style.objectFit = 'cover';
      img.className = 'rounded mb-1';
      card.appendChild(img);
    } else {
      card.innerHTML = `<div class="mb-1"><i class="bi bi-file-earmark"></i></div>
                        <div class="text-truncate" style="max-width:90px;">${file.name}</div>`;
    }

    // --- Delete button ---
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.innerHTML = '&times;';
    btn.className = 'btn btn-sm btn-danger position-absolute';
    btn.style.top = '2px';
    btn.style.right = '2px';
    btn.style.padding = '0 4px';
    btn.style.lineHeight = '1';
    btn.addEventListener('click', () => {
      selectedFiles = selectedFiles.filter(f => f !== file);
      card.remove();
      updateSize();
    });
    card.appendChild(btn);

    preview.appendChild(card);
  });

  updateSize();
}

// --- Update size ---
function updateSize() {
  const totalSize = getTotalSize(selectedFiles);
  const percent = Math.min(100,(totalSize/(500*1024*1024))*100);
  sizeProgress.style.width = percent+'%';
  sizeText.textContent = `${formatSize(totalSize)} / 500 МБ`;
}

// --- File input ---
fileInput.addEventListener('change', e => {
  addPreview([...e.target.files]);
  fileInput.value = ''; // сброс, чтобы можно было снова выбрать тот же файл
});

// --- Drag & Drop ---
dropArea.addEventListener('dragover', e => {
  e.preventDefault();
  dropArea.classList.add('bg-light');
});
dropArea.addEventListener('dragleave', () => dropArea.classList.remove('bg-light'));
dropArea.addEventListener('drop', e => {
  e.preventDefault();
  dropArea.classList.remove('bg-light');
  addPreview([...e.dataTransfer.files]);
});

// --- Upload ---
startUpload.addEventListener('click', () => {
  if (!selectedFiles.length) return alert('Выберите файлы');

  const totalSize = getTotalSize(selectedFiles);
  if (totalSize > 500*1024*1024) return alert('Общий размер превышает 500 МБ');

  const formData = new FormData();
  selectedFiles.forEach(f => formData.append('photos[]', f));
  formData.append('date', document.getElementById('date').value);
  formData.append('event', document.getElementById('event').value);

  progress.classList.remove('d-none');
  progressBar.style.width = '0%';
  progressBar.textContent = '0%';
  progressBar.classList.remove('bg-success');

  const xhr = new XMLHttpRequest();
  xhr.open('POST','/upload.php',true);

  xhr.upload.onprogress = e => {
    if(e.lengthComputable){
      const percent = Math.round((e.loaded/e.total)*100);
      progressBar.style.width = percent+'%';
      progressBar.textContent = percent+'%';
    }
  };

  xhr.onload = () => {
    if(xhr.status===200){
      let res;
      try {
        res = JSON.parse(xhr.responseText);
        console.log(res);
      } catch(e){
        console.error('Invalid JSON:', xhr.responseText);
        alert('Ошибка сервера. Смотри консоль.');
        return;
      }

      progressBar.style.width = '100%';
      progressBar.textContent = 'Загрузка завершена';
      progressBar.classList.add('bg-success');

      // очистка
      selectedFiles = [];
      preview.innerHTML = '';
      fileInput.value = '';
      document.getElementById('date').value = '';
      document.getElementById('event').value = '';
      sizeProgress.style.width='0%';
      sizeText.textContent='0 МБ / 500 МБ';

      setTimeout(() => {
        progress.classList.add('d-none');
      }, 5000);

    } else {
      alert('Ошибка загрузки!');
    }
  };

  xhr.onerror = () => alert('Ошибка запроса к серверу!');
  xhr.send(formData);
});
