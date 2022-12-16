<?php 
/* Template Name: PageProfilspec */
get_header(); ?>

<?php

          $image=get_field('photo_de_profil');

?>
<div class="container">
    <div class="info-profil">
 
        <div class="top-part">

            <span class="infotext">
                <h5><?php echo the_title(); ?></h5>
                <h4><?php echo get_field('localite'); ?></h4>

            </span>
            <img class="pdp" src="<?php echo $image['url']; ?>" alt="Photo d'un très bel homme">

        </div>
        <span class="descri">                
            <p><?php echo the_content(); ?></p>
        </span>

    </div>
    <div id="comments">
  <?php if ( have_comments() ) : ?>
    <h3><?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'your-theme' ), get_comments_number(), '<em>' . get_the_title() . '</em>' ); ?></h3>
    <ol class="comment-list">
      <?php wp_list_comments( array( 'style' => 'ol' ) ); ?>

    </ol>
  <?php endif; ?>
  <?php comment_form(); ?>
</div>

</div>



<?php comments_template(); ?>



<?php get_footer(); ?>
