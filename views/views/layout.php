<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="application-name" content="Proyecto final HTML5, CSS3 y javascript">
  <meta name="author" content="Pedro Jesús Cros Pérez">
  <meta name="description" content="Proyecto final usando todo lo aprendido HTML5, CSS3, javascript y PHP">
  <meta name="generator" content="Visual Studio Code">
  <meta name="keywords" content="proyecto, html, css, javascript, php, formulario, examinator, login, crud users">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--<base href="./recursos/img" target="_blank">-->
  <title>Examinator login</title>

  <!-- JAVASCRIPT -->
  <script type="text/javascript" src="configFile.js" charset="utf-8" defer></script>
  <script type="text/javascript" src="views/js/formElements.js" charset="utf-8" defer></script>
  <script type="text/javascript" src="views/js/entities/Exam.js" charset="utf-8" defer></script>
  <script type="text/javascript" src="views/js/inicialice.js" charset="utf-8" defer></script>
  <script type="text/javascript" src="views/js/ajax.js" charset="utf-8" defer></script> <!-- AJAX -->


  <!-- CSS3 -->
  <link rel="stylesheet" href="views/css/hojaReseteoEstilosCss.css"> <!-- Hoja de reseteo de estilos CSS -->
  <link rel="stylesheet" href="views/css/estiloEstructura.css"> <!-- Esqueleto de la web -->
  <link rel="stylesheet" href="views/css/estiloPosicionamiento.css">
  <!-- Posicionamiento con flexbox. Además introduzco paddings y margin donde cuadrar los contenedores a mi gusto personal -->
  <link rel="stylesheet" href="views/css/estiloEstetica.css">
  <!-- Detalles estéticos de la web: colores, fondos, tamaño y fuentes de letra -->
  <link rel="stylesheet" href="views/css/estiloNav.css">

  <!-- TODO NOTAS -->
  <!-- Cuando le de al botón enviar, se quitan todos los datos de los campos y aparece el mensaje formulario enviado, que a los 5 segundos se quita (utilizando setTimeOut) -->

</head>

<body>

  <header>
    <?php
        require_once "header.php";
    ?>
  </header>


  <aside>
    <?php
        //require_once "aside.php";
    ?>
  </aside>


  <main>
    <?php
        require_once "Router.php";
    ?>
  </main>


  <footer>
    <?php
        require_once "footer.php";
    ?>
  </footer>

</body>

</html>