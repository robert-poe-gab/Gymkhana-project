let editQuill = null;

function decodeHTMLEntities(text) {
  const textarea = document.createElement('textarea');
  textarea.innerHTML = text;
  return textarea.value;
}


// Modal view ODS 
const modalODS = document.getElementById('staticBackdrop');
if (modalODS) {
  modalODS.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const odsNum = parseInt(button.getAttribute('data-bs-ods'));
    const data = ods.find(o => parseInt(o.id_ods) === odsNum || parseInt(o.id) === odsNum);

    if (!data) return;

    const modalDescription = modalODS.querySelector('#staticBackdropLabel');
    const modalContent = modalODS.querySelector('#modalContent');

    modalDescription.textContent = data.description;
    modalContent.innerHTML = decodeHTMLEntities(data.text);
  });
}

// Modal edit ODS
const modalEdit = document.getElementById('staticBackdropEdit');
if (modalEdit) {
  modalEdit.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const odsNum = parseInt(button.getAttribute('data-bs-ods'));
    const odsData = ods.find(o => parseInt(o.id_ods) === odsNum || parseInt(o.id) === odsNum);

    if (!odsData) return;

    document.getElementById('staticBackdropEditLabel').textContent = 'Editar ' + (odsData.title || `ODS ${odsData.id_ods}`);
    document.getElementById('editOdsId').value = odsData.id_ods || odsData.id;
    document.getElementById('description').value = odsData.description || '';

    

    if (!editQuill) {
      editQuill = new Quill('#editor', {
        modules: {
          syntax: true,
          toolbar: '#edit-toolbar',
        },
        placeholder: "Escriu el contingut de l'ODS...",
        theme: 'snow',
      });
    }

    if (odsData.text) {
      editQuill.root.innerHTML = decodeHTMLEntities(odsData.text);
    } else {
      editQuill.setText('');
    }

    editQuill.on('text-change', function () {
      document.getElementById('text').value = editQuill.getSemanticHTML();
    });


    document.getElementById('text').value = odsData.text || '';
  });
}

function saveEditODS() {
  document.getElementById('text').value = editQuill.getSemanticHTML();
  document.getElementById('editOdsForm').submit();
}

