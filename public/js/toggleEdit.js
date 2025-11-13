document.addEventListener("DOMContentLoaded", () => {
    const buttons = document.querySelectorAll(".toggle-edit");

    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
        const targetId = btn.getAttribute("data-target");
        const target = document.querySelector(targetId);

        // Cerrar todos los demás abiertos
        document.querySelectorAll(".collapse.show").forEach(openDiv => {
            if (openDiv !== target) {
            openDiv.classList.remove("show");
            }
        });

        // Alternar el actual
        target.classList.toggle("show");
        });
    });
});