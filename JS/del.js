var myModal = document.getElementById('staticBackdrop');
    myModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var modalExcluir = myModal.querySelector('.btn-excluir');
        modalExcluir.setAttribute('href', 'excluir.php?id=' + id);
    });