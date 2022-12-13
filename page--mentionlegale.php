<?php 
/* Template Name: PageMention */
get_header(); ?>

<div class="container">
<section class="legal">
        
<?php
  $textelegal = new WP_Query([ // je crée une variable $services
    'post_type' => 'textelegal', // la je précise quel post_type je veux (dans mon cas "services")
    'post_status' => 'publish', // la je précise que je veux des posts qui sont publié
    'limit' => 3, // dans mon cas je n'en ai besoin que de trois
    'orderby' => 'date', // je les trie par date 
    'date' => true // je récupéère ma date
  ]);

  if ($textelegal->have_posts()): // ici je vérifie que $services posède bien mes posts
?>
    <?php 
      while ($textelegal->have_posts()): // la je lance ma boucle sur mes posts contenu dans services
      $textelegal->the_post(); // la récupère mon post
    ?>
      <span class="mention">
            <h5><?php the_title(); ?></h5> 
            <p><?php the_content(); ?></p> 
      </span>
    <?php endwhile; ?>
<?php else: ?>
  <h5>On a pas encore d'avocat</h5>
<?php endif; ?>

 </section>
</div>



<?php get_footer(); ?>
