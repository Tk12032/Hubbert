
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <!--<link rel="stylesheet" href="<?php //echo get_template_directory_uri(); ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php //echo get_template_directory_uri(); ?>/assets/scss/hubscss.scss">-->
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/Hdehubbert.png">
</head>
<body>

<header class="headerstyle"> 
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


<div class="message off" id="messagerie">
<?php 
$current_user = get_currentuserinfo();
$idcurrent = $current_user->ID;
echo '<p style="display:none" id="currentuserid">'. $idcurrent . '</p>';

$messages = new wp_Query([	
  'post_type' => 'message', // la je précise quel post_type je veux (dans mon cas "services")
  'limit' => 10,
  'meta_query'    => array(
    'relation' => 'OR',
    array(
      'key'       => 'idauthor',
      'value'     => $idcurrent,
      'type'      => 'NUMERIC',
      'compare'   => '='
    ),
    array(
      'key'       => 'idclient',
      'value'     => $idcurrent,
      'type'      => 'NUMERIC',
      'compare'   => '='
    ),
  )]);

  while($messages->have_posts()){
    $messages->the_post();
?>
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
$post_id = get_the_ID();
?>
    <div class="conversation">
  
      <button class="vert" onclick="let thismess = this.nextElementSibling;console.log(thismess); if(thismess.classList.contains('convcontent-off')){
        thismess.classList.remove('convcontent-off');
        thismess.classList.add('convcontent-on');
        }else{
        thismess.classList.remove('convcontent-on');
        thismess.classList.add('convcontent-off');
        }">Titre conv</button>
      <div class="convcontent-off">
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
              echo '</article></div>';
            }
            
          }
          } else {
            echo '<p>'."Cet utilisateur n'a pas encore de commentaires".'</p>';
          }
        }
?></div> 
      </div> 
    </div>  



</div>

<button class="pictobouton vert-plein messagerie rectangle" onclick="messagerieonoff()">
    <img style="z-index:2" class="pictobouton messagerie" alt="messagerie" src="<?php echo get_template_directory_uri()?>/assets/img/picto_messagerie_inact.png" >
</button>
</header>




