<?php 
/* Template Name: PageAnnoncespec */
get_header(); ?>

    <div class="container">
        <div class="infoannonce">
        <?php $image = get_field('ImgAnnonces');
        echo '<img style="width:700px; height:500px" src="'.$image['url'].'" alt="'.get_the_title().'">'; ?>
        <div class="infodroite">
                <h5><?php the_title() ?></h5>
                <?php 
                $auteur=get_the_author();
                echo '<div class="vert versprofil">';
        echo '<div>'.get_avatar($auteur).'</div>';?>
        <h5>
                <?php if($auteur===''){
                        echo 'Anonyme';
                }
                else{
                        echo $auteur;
                }?>
        </h5>
        <?php
        echo '</div>'; ?>
        <h5><?php echo get_field('prix') ?>€/j</h5>
        <h5><?php if(get_field('localite')==''){
                echo 'Trou perdu';}
                else{
                echo get_field('localite');} ?></h5>
        <p><?php echo get_the_content(); ?> </p>
                <button style="border:none">                
        <?php echo '<div style="width:fit-content" class="vert versprofil">';?>   
        <h5 style="font-family: 'Poppins';
font-style: normal;
font-weight: 700;
font-size: 20px;
line-height: 30px;
/* identical to box height */
color: #504136;
text-align: center;">Contacter</h5><!-- à ranger en théorie actionner ce bouton devrait ouvrir une conversation dans la messagerie de l'utilisateur-->
        </button>
        </div>

        </div>     
</div>
<div class="carrousel" style="margin-bottom:100px; margin-top:200px">
<h3 style="margin-left:50px">Annonces qui pourraient aussi vous intéresser</h3>
        <?php
$content = new WP_Query([ // je crée une variable $services
    'post_type' => 'outil', // la je précise quel post_type je veux (dans mon cas "services")
    'post_status' => 'publish', // la je précise que je veux des posts qui sont publié
    'limit' => 10, // dans mon cas je n'en ai besoin que de trois
    'orderby' => 'date', // je les trie par date 
    'date' => true // je récupéère ma date
  ]);
  
  if ($content->have_posts()){ // ici je vérifie que $services posède bien mes posts
	echo '<div class="carrousel--wrapper">';
      while ($content->have_posts()){ // la je lance ma boucle sur mes posts contenu dans services
		$content->the_post(); // la récupère mon post
			$image=get_field('ImgAnnonces');
			$nom_prenom=get_the_title();
			echo '<div class="outil carrousel--item" style="padding: 0px 10px;"> ';
			echo '<div class="card outil ">
			<figure><img src="'.$image['url'].'" alt="'.$nom_prenom.'"></figure>
				<div class="card-body">
					<h5 class="card-title">'.$nom_prenom.'</h5>
					<p class="localite">'.get_field('localite').'</p>
					<a href="'.get_the_permalink().'" class="vert boutonplus">+</a>
				</div>
			</div>
			</div>
				';
		}
		
	}
	

echo '</div>';
  
  
  
  ?>
        </div>
<?php get_footer(); ?>
