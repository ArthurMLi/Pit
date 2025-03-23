const openModalButtons = document.querySelectorAll("#open-modal");
const closeModalButton = document.querySelector("#close-modal");
const modals = document.querySelectorAll("#modal");
const fades = document.querySelectorAll("#fade");

const toggleModal = (modal, fade) => {
    modal.classList.toggle("hide");
    fade.classList.toggle("hide");
};

// Adiciona ouvintes de evento para cada botão de abrir modal
openModalButtons.forEach((button, index) => {
    button.addEventListener("click", () => {
        toggleModal(modals[index], fades[index]);
    });
});

// Adiciona o evento de clique para o fade
fades.forEach((fade, index) => {
    fade.addEventListener("click", () => {
        toggleModal(modals[index], fades[index]);
    });
});

// Se você tiver um botão de fechar, adicione os ouvintes de evento para ele também
if (closeModalButton) {
    closeModalButton.addEventListener("click", () => {
        modals.forEach(modal => modal.classList.add("hide"));
        fades.forEach(fade => fade.classList.add("hide"));
    });
};
