document.addEventListener('DOMContentLoaded', (event) => {
    const confirmarCheckbox = document.getElementById('confirmar');
    const enviarButton = document.getElementById('enviar');

    // Alterar a propiredade de "disabled" do botão
    const toggleButton = () => {
        if (confirmarCheckbox.checked) {
            enviarButton.removeAttribute('disabled');
        } else {
            enviarButton.setAttribute('disabled', 'disabled');
        }
    };

    toggleButton();

    // Adiciona um EventListenar para cada vez que o estado da checkbox é alterado
    confirmarCheckbox.addEventListener('change', toggleButton);
});