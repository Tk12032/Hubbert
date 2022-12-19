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
  comment_form(
    array(
        'title_reply'       => __( 'Commente quelque chose' ),
        'title_reply_to'    => __( 'Leave a Reply to %s' ),
        'cancel_reply_link' => __( 'Cancel Reply' ),
        'label_submit'      => __( 'Post Comment' ),
        'comment_field'     => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
    )
);
endif;
?>
<h3>Commentaires</h3>
<?php
// Comment Loop
if ( $comments ) {
  $current_post_id = get_the_ID();

	foreach ( $comments as $comment ) {
    $comment_post_id = $comment->comment_post_ID;
    if($comment_post_id==$current_post_id){
      echo '<article class="comm  ent">';
      echo '<div class="vert versprofil">';
        echo '<div>'.get_avatar($comment).'</div>';
        echo '<h5>'.$comment->comment_author.'</h5>';
        echo '</div>';
        echo '<p>' . $comment->comment_content . '</p>';
      echo '</article>';
    }
    
	}
} else {
	echo '<p>'."Cet utilisateur n'a pas encore de commentaires".'</p>';
}
?>

  </div>

    
</div>




<?php get_footer(); ?>
