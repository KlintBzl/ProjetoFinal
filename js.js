function toggleMenu() {
    const menu = document.getElementById("menuPerfil");
    menu.style.display = (menu.style.display === "flex") ? "none" : "flex";
}

// fechar ao clicar fora
document.addEventListener("click", function (event) {
    const menu = document.getElementById("menuPerfil");
    const avatar = document.querySelector(".avatar");

    if (!avatar.contains(event.target) && !menu.contains(event.target)) {
        menu.style.display = "none";
    }
});
