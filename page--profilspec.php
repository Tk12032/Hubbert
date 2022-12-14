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

if ($content->have_posts()){ // ici je vérifie que $services posède bien mes posts

      $content->the_post(); // la récupère mon post
          $image=get_field('photo_de_profil');
          $nom_prenom=get_the_title();
          $description=get_the_content();
          echo '<div class="card profil" style="width: 18rem;">
              <img class="card-img-top" src="'.$image['url'].'" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">'.$nom_prenom.'</h5>
                  <p class="localite">'.get_field('localite').'</p>
                  <p class="card-text">'.$description.'</p>
              </div>
          </div>
              ';
      
  
}
else{
  echo '<h5>On a pas encore de question a vous répondre mais ça arrive !</h5>';
}
?>
<?php get_footer(); ?>
