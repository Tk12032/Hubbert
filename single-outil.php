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
        <h5>Contacter</h5><!-- en théorie actionner ce bouton devrait ouvrir une conversation dans la messagerie de l'utilisateur-->
        </button>
        </div>
        

        </div>
        
</div>

<?php get_footer(); ?>
