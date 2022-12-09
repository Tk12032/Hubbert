<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
</head>
<body>


<nav class="navbar navbar-expand-lg couleurnav">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img class="logo-navbar" src="<?php echo get_template_directory_uri(); ?>/assets/img/hubbert_noir.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#"><button>Demander un service / outil</button></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"><button>Demander un service / outil</button></a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled"><button>Profil</button></a>
        </li>
      </ul>
    </div>
  </div>
</nav>