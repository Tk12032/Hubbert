<?php 
/* Template Name: PageProfilspec */
get_header(); ?>

<?php
$content = new WP_Query([ // je crée une variable $services
  'post_type' => 'profil', // la je précise quel post_type je veux (dans mon cas "services")
  'post_status' => 'publish', // la je précise que je veux des posts qui sont publié
  'limit' => 1, // dans mon cas je n'en ai besoin que de trois
  'orderby' => 'rand', // je les trie par date 
  'date' => true // je récupéère ma date
]);

if ($content->have_posts()): // ici je vérifie que $services posède bien mes posts

      $content->the_post(); // la récupère mon post
          $image=get_field('photo_de_profil');
          $nom_prenom=get_the_title();
          $description=get_the_content();
?>
<div class="container">
    <div class="info-profil">
 
        <div class="top-part">

            <span class="infotext">
                <h5><?php echo $nom_prenom; ?></h5>
                <h4><?php echo get_field('localite'); ?></h4>

            </span>
            <img class="pdp" src="<?php echo $image['url']; ?>" alt="Photo d'un très bel homme">

        </div>
        <span class="descri">                
            <p><?php echo $description; ?></p>
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

<?php
else:
  echo '</h5>'."Il n'y a personne ici !".'</h5>';
endif;
?>
<?php get_footer(); ?>
