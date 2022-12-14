<?php 
/* Template Name: PageFAQ */
get_header(); ?>

<div class="container">
<section class="faq">
        
<?php
  $question = new WP_Query([ // je crée une variable $q
    'post_type' => 'question', // la je précise quel post_type je veux (dans mon cas "q")
    'post_status' => 'publish', // la je précise que je veux des posts qui sont publié
    'limit' => 3, // dans mon cas je n'en ai besoin que de trois
    'orderby' => 'date', // je les trie par date 
    'date' => true // je récupéère ma date
  ]);

  if ($question->have_posts()): // ici je vérifie que $q posède bien mes posts
?>
    <?php 
      while ($question->have_posts()): // la je lance ma boucle sur mes posts contenu dans q
      $question->the_post(); // la récupère mon post
    ?>
      <span class="question">
            <h5><?php the_title(); ?></h5> 
            <p><?php the_content(); ?></p> 
      </span>
    <?php endwhile; ?>
<?php else: ?>
  <h5>On a pas encore de question a vous répondre mais ça arrive !</h5>
<?php endif; ?>

 </section>
</div>


<?php get_footer(); ?>
