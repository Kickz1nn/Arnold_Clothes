var myModal = document.getElementById('exampleModalCenter');
    myModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var modalExcluir = myModal.querySelector('.btn-editar');
        modalExcluir.setAttribute('href', 'editar.php?id=' + id);
    });