var deleteUserModal = document.getElementById('deleteUserModal')
deleteUserModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    var username = button.getAttribute('data-username')
    var userId = button.getAttribute('data-userid')

    var message = deleteUserModal.querySelector('#deleteUserMessage')
    message.textContent = 'Estas seguro que quieres eliminar el usuario "' + username + '"'

    var inputId = deleteUserModal.querySelector('#deleteUserId')
    inputId.value = userId
    })