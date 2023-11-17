window.addEventListener("load", function () {
    function cambiarImagen(id, nuevaImagen) {
        var elemento = document.getElementById(id);
        if (elemento) {
            elemento.querySelector('img').src = nuevaImagen;
        }
    }

    function restaurarImagen(id, imagenOriginal) {
        var elemento = document.getElementById(id);
        if (elemento) {
            elemento.querySelector('img').src = imagenOriginal;
        }
    }

    var btnSiguiente = document.getElementById("btnSiguiente");
    btnSiguiente.addEventListener("mouseover", function () {
        cambiarImagen("btnSiguiente", "http://serverpedroexaminator/views/src/icons/arrow_next_hover512px.png");
    });
    btnSiguiente.addEventListener("mouseout", function () {
        restaurarImagen("btnSiguiente", "http://serverpedroexaminator/views/src/icons/arrow_next512px.png");
    });
    btnSiguiente.addEventListener("mousedown", function () {
        cambiarImagen("btnSiguiente", "http://serverpedroexaminator/views/src/icons/arrow_next_down512px.png");
    });
    btnSiguiente.addEventListener("mouseup", function () {
        restaurarImagen("btnSiguiente", "http://serverpedroexaminator/views/src/icons/arrow_next512px.png");
    });

    var btnAnterior = document.getElementById("btnAnterior");
    btnAnterior.addEventListener("mouseover", function () {
        cambiarImagen("btnAnterior", "http://serverpedroexaminator/views/src/icons/arrow_before_hover512px.png");
    });
    btnAnterior.addEventListener("mouseout", function () {
        restaurarImagen("btnAnterior", "http://serverpedroexaminator/views/src/icons/arrow_before512px.png");
    });
    btnAnterior.addEventListener("mousedown", function () {
        cambiarImagen("btnAnterior", "http://serverpedroexaminator/views/src/icons/arrow_before_down512px.png");
    });
    btnAnterior.addEventListener("mouseup", function () {
        restaurarImagen("btnAnterior", "http://serverpedroexaminator/views/src/icons/arrow_before512px.png");
    });
});


/*window.addEventListener("keydown", function () {
    document.body.style.backgroundImage = 'url("views/src/lobo.jpg")';
    this.document.body.style.position="absolute";
});*/