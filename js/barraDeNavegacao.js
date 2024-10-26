document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.querySelector(".sidebar");
    const toggle = document.querySelector(".toggle");

    console.log("Sidebar:", sidebar); 
    console.log("Toggle:", toggle); 

    if (sidebar && toggle) {
        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        });
    } else {
        if (!sidebar) {
            console.error("Elemento sidebar não encontrado."); 
        }
        if (!toggle) {
            console.error("Botão de alternância não encontrado.");
        }
    }
});