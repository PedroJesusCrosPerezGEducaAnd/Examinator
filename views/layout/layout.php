<?php
$thisdir = "views/layout";
?>
<!--echo '-->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="application-name" content="Proyecto HTML5, CSS3, javascript y PHP">
  <meta name="author" content="Pedro Jesús Cros Pérez">
  <meta name="description" content="Proyecto utilizando lenguajes HTML5, CSS3, javascript y PHP">
  <meta name="generator" content="Visual Studio Code">
  <meta name="keywords" content="proyecto, html, css, javascript, php, formulario, examinator, login, crud users">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--<base href="./recursos/img" target="_blank">-->
  <link rel="shortcut icon" href="views/src/icons/favicon.ico" type="image/x-icon">
  <title>Examinator login</title>



  <!-- CSS3 -->
  <!-- Hoja de reseteo de estilos CSS -->
  <link rel="stylesheet" href="<?php echo $thisdir?>/css/resetstylesheet.css"> 
  <!-- Esqueleto de la web (HEADER - NAV - MAIN - FOOTER)-->
  <link rel="stylesheet" href="<?php echo $thisdir?>/css/mainStructure.css"> 
  <!-- Detalles estéticos de la web: colores, fondos, tamaño y fuentes de letra -->
  <link rel="stylesheet" href="<?php echo $thisdir?>/css/styleCosmetic.css"> 

  <!-- Estilos para elementos (header>*) -->
  <link rel="stylesheet" href="<?php echo $thisdir?>/css/styleHeader.css">
  
  <!-- Estilos para elementos (nav>*) -->
  <link rel="stylesheet" href="<?php echo $thisdir?>/css/styleNav.css">

  <!--<link rel="stylesheet" href="<?php echo $thisdir?>/css/estiloPosicionamiento.css">-->
  <!-- Posicionamiento con flexbox. Además introduzco paddings y margin donde cuadrar los contenedores a mi gusto personal -->
  <!--<link rel="stylesheet" href="<?php echo $thisdir?>/css/estiloNav.css">-->


  <!-- JAVASCRIPT -->
  <script type="text/javascript" src="ConfigFile.js" charset="utf-8" defer></script>
  <script type="text/javascript" src="<?php echo $thisdir?>/js/jsNav.js" charset="utf-8" defer></script>
  <!--<script type="text/javascript" src="views/js/formElements.js" charset="utf-8" defer></script>
  <script type="text/javascript" src="views/js/entities/Exam.js" charset="utf-8" defer></script>-->
  <!--<script type="text/javascript" src="views/js/inicialice.js" charset="utf-8" defer></script>-->
  <!--<script type="text/javascript" src="views/js/ajax.js" charset="utf-8" defer></script>-->
</head>

<body>

  <header>
    <?php
        require_once "header.php";
    ?>
  </header>

  <nav>
    <?php
      require_once "nav.php";
    ?>
  </nav>

  <main>
  <?php
        require_once "views/Router.php";
  ?>
  </main>


  <footer>
    <?php
        require_once "footer.php";
    ?>
  </footer>

</body>
<!--<script src="views/js/ajax.js"></script>-->

</html>
<!--';-->