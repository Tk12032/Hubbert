<?php 
/* Template Name: PageProfilspec */
get_header(); ?>

<?php $image=get_field('photo_de_profil'); ?>
 
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
      <h3>Commentaires</h3>
      <ol class="comment-list">
        <?php wp_list_comments( array( 'style' => 'ol' ) ); ?>

      </ol>
      <?php endif; ?>
      
  </div>

  <div class="commentaires">

  <?php
// The comment Query
$comments_query = new WP_Comment_Query();
$comments       = $comments_query->query( $args );

update_post_meta( $post_id, 'comment_status', 'open' );
if ( comments_open() || get_comments_number() ) :
    comment_form();
endif;
?>
<h3>Commentaires</h3>

// Comment Loop
if ( $comments ) {
  
	foreach ( $comments as $comment ) {
    echo '<article class="comment">';
    echo '<div class="vert versprofil">';
      echo '<div>'.get_avatar($comment).'</div>';
      echo '<h5>'.$comment->comment_author.'</h5>';
      echo '</div>';
      echo '<p>' . $comment->comment_content . '</p>';
    echo '</article>';
	}
} else {
	echo '<p>'."Cet utilisateur n'a pas encore de commentaires".'</p>';
}
?>

  </div>

    
</div>




<?php get_footer(); ?>
