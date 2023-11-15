// TODO cuando se haga click en un botón, se deje marcado hasta pulsar el siguiente
window.addEventListener("load", function () {
    var links = document.querySelectorAll("body>nav a");
    links.forEach(link => {
        link.clicked = false;
        link.onclick = function () {
            this.classList.toggle("navBtnClicked");
            this.clicked = !this.clicked;
        }
    });
});
