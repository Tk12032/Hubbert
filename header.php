<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <title>Hubbert</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/scss/hubscss.scss">
</head>
<body>

<header> 
<nav class="navbar navbar-expand-lg couleurnav">
  <div class="nav-container">
            <?php 
            wp_nav_menu([
              'theme_location' => 'home',
              'container' => false,
              'menu_class' => 'navbar-nav'
              ]);

            wp_nav_menu([
            'theme_location' => 'navbar',
            'container' => false,
            'menu_class' => 'navbar-nav'
            ]); ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>


<?php block_header_area(); ?>

</header>

<?php boutonpicto("messagerie", "vert-plein", "rectangle");?>  
<div class="message">

            

</div>