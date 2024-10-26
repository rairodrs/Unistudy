document.addEventListener('DOMContentLoaded', () => {
    const containers = document.querySelectorAll(".container");

    containers.forEach(container => {
        const selectBtn = container.querySelector(".select-btn");
        const items = container.querySelectorAll(".item");
        const btnText = container.querySelector(".btn-text");
        const subject = container.dataset.subject;

        //carrega itens checados da sessão
        function loadCheckedItems() {
            const checkedItems = container.querySelectorAll('.item.checked');
            btnText.innerText = `${subject} - ${checkedItems.length}`;
        }

        //carrega os itens salvos na página
        loadCheckedItems();

        // adiciona eventos de clique para cada item
        items.forEach(item => {
            item.addEventListener("click", () => {
                item.classList.toggle("checked");
                loadCheckedItems(); // Atualiza a contagem após clicar
            });
        });

        //adiciona evento de clique para o botão de seleção
        selectBtn.addEventListener("click", () => {

            //fecha todos os outros containers
            containers.forEach(otherContainer => {
                if (otherContainer !== container) {
                    otherContainer.querySelector(".select-btn").classList.remove("open");
                }
            });

            // alterna o estado do container atual
            selectBtn.classList.toggle("open");
        });
    });
});