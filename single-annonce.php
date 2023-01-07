<?php 
/* Template Name: PageAnnoncespec */
get_header(); ?>

    <div class="container">
        <div class="infoannonce">
        <?php $image = get_field('image_dillustration');
        echo '<img style="width:700px; height:500px" src="'.$image['url'].'" alt="'.get_the_title().'">'; ?>
        <div class="infodroite">
                <h5 style="font-family:'Poppins';text-transform: uppercase;font-weight:600;font-size:24px"><?php the_title() ?></h5>
                <?php 
                global $post;
                $a_id=$post->post_author;
                $auteur = get_the_author_meta( 'user_nicename', $a_id );
                echo '<div class="vert versprofil">';
        echo get_avatar($auteur);?>
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
        <p class="description"><?php echo get_field('description'); ?> </p>
                <button style="border:none">                
        <?php echo '<div style="width:fit-content" class="vert versprofil">';?>   
        <h5 class="bouton">Contacter</h5><!-- à ranger en théorie actionner ce bouton devrait ouvrir une conversation dans la messagerie de l'utilisateur-->
        </button>
        </div>

        </div>     
</div>
<div class="carrousel" style="margin-bottom:100px; margin-top:200px">
<h3 style="margin-left:50px">Annonces qui pourraient aussi vous intéresser</h3>
        <?php carroussel_couleur('annonce','10') ?>
        </div>
<?php get_footer(); ?>
