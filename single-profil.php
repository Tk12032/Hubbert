<?php 
/* Template Name: PageProfilspec */


get_header(); ?>

<?php 

$current_user = get_currentuserinfo();
$idcurrent = $current_user->ID;
global $post;
$a_id=$post->post_author;
$idauthor = get_the_author_meta( 'ID', $a_id );
$type = get_post_type();
echo '<p style="display:none" id="posttype">'. $type . '</p>';
$postid = get_the_ID();
echo '<p style="display:none" id="postid">'. $postid . '</p>';
echo '<p style="display:none" id="currentuserid">'. $idcurrent . '</p>';

if(($idauthor===$idcurrent)||($type=='page'))://si l'user actuel est l'auteur OU qu'on arrive sur la page via le bouton proposer un service / outil?>
<?php //$image=get_field('profilepicture'); 

$profilcurrent = new wp_Query([
		
		
  'post_type' => 'profil', 
  'post_status' => 'publish', 
  'meta_query'    => array(
    array(
      'key'       => 'iduser',
      'value'     => $idcurrent,
      'type'      => 'NUMERIC',
      'compare'   => '='
    ),
  )]);
if($profilcurrent->have_posts()){
  $profilcurrent->the_post();?>

  <div class="container">
    <div class="info-profil">
 
        <div class="top-part">

            <div class="infotext">
              <form>
                <label><textarea id=name><?php echo the_title(); ?></textarea></label>

                <label><input id="age" style="padding-left:10px;background-color:transparent;border-radius:10px;" type="number" min="18" max="110" value="<?php if(get_field('age')!==''){
                  echo get_field('age');
                } else {
                  echo 18;
                }   ?>">ans</label>

                <label><textarea id=localite><?php if(get_field('localite')!=''){
                  echo get_field('localite');
                } else {
                  echo 'Trou perdu';
                }    ?></textarea></label>


              
              </form>         

              </div>
              <div style ="margin:30px;width:250px;">
              <?php echo get_avatar(get_field('iduser'));?>
              </div>
              
        </div>   
        <textarea style="margin-top:0px; line-height:24px;" id="description" class="descri"><?php echo get_the_content();?></textarea>           
            

        <button class="vert bouton" style="align-self:flex-end" onclick="majprofil()">Sauver</button>
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
        'label_submit'      => __( 'Post Comment' ),
        'logged_in_as' => '',
        'comment_field'     => '<p style="margin-right:15px;"><textarea id="comment" style="width:300px" name="comment" aria-required="true"></textarea></p>',
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
      echo '<article class="comment">';
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
}
?>

  </div>

    
</div>






<?php
else:
?>
<div class="container">
    <div class="info-profil">
 
        <div class="top-part">

            <div class="infotext">
                <h5><?php echo the_title(); ?></h4>
                <h5><?php if(get_field('age')!=''){
                  echo get_field('age');
                } else {
                  echo 'Immortel';
                }   ?></h5>
                <h5><?php if(get_field('localite')!=''){
                  echo get_field('localite');
                } else {
                  echo 'Trou perdu';
                }    ?></h5>

               

              </div>
              <?php echo get_avatar(get_field('iduser'));    ?>
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
        'label_submit'      => __( 'Post Comment' ),
        'logged_in_as' => '',
        'comment_field'     => '<p><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
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
      echo '<article class="comment">';
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



<?php endif; ?>
<?php get_footer(); ?>
