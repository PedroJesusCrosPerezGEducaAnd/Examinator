window.addEventListener("load", function () {

    function changeImg(id, nuevaImagen) {
        var elemento = document.getElementById(id);
        if (elemento) {
            elemento.querySelector('img').src = nuevaImagen;
        }
    }


    var btnNext = document.getElementById("btnNext");
    btnNext.addEventListener("mouseover", function () {
        if (!btnNext.disabled) {
            changeImg("btnNext", "http://serverpedroexaminator/views/src/icons/arrow_next_hover512px.png");
        }
    });
    btnNext.addEventListener("mouseout", function () {
        if (!btnNext.disabled) {
        changeImg("btnNext", "http://serverpedroexaminator/views/src/icons/arrow_next512px.png");
        }
    });
    btnNext.addEventListener("mousedown", function () {
        if (!btnNext.disabled) {
        changeImg("btnNext", "http://serverpedroexaminator/views/src/icons/arrow_next_down512px.png");
        }
    });
    btnNext.addEventListener("mouseup", function () {
        if (!btnNext.disabled) {
        changeImg("btnNext", "http://serverpedroexaminator/views/src/icons/arrow_next512px.png");
        }
    });

    var btnBefore = document.getElementById("btnBefore");
    btnBefore.addEventListener("mouseover", function () {
        if (!btnBefore.disabled) {
            changeImg("btnBefore", "http://serverpedroexaminator/views/src/icons/arrow_before_hover512px.png");
        }
    });
    btnBefore.addEventListener("mouseout", function () {
        if (!btnBefore.disabled) {
            changeImg("btnBefore", "http://serverpedroexaminator/views/src/icons/arrow_before512px.png");
        }
    });
    btnBefore.addEventListener("mousedown", function () {
        if (!btnBefore.disabled) {
            changeImg("btnBefore", "http://serverpedroexaminator/views/src/icons/arrow_before_down512px.png");
        }
    });
    btnBefore.addEventListener("mouseup", function () {
        if (!btnBefore.disabled) {
            changeImg("btnBefore", "http://serverpedroexaminator/views/src/icons/arrow_before512px.png");
        }
    });

});


/*window.addEventListener("keydown", function () {
    document.body.style.backgroundImage = 'url("views/src/lobo.jpg")';
    this.document.body.style.position="absolute";
});*/