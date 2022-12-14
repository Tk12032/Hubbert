<?php 
/* Template Name: PageConfigA */
get_header(); ?>



<?php wpforms(124);?>

<div class="container">
<?php
$homepage = new WP_Query([ // je crée une variable $q
                        'post_type' => 'page', // la je précise quel post_type je veux (dans mon cas "q")    
                      ]);
                      while($homepage->have_posts()){
                        $homepage->the_post();
                        echo the_content();
                      } 
?>
</div>



<?php get_footer(); ?>
