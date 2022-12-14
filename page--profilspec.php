<?php 
/* Template Name: PageProfilspec */
get_header(); ?>

 
<section class="picture">
        <div class="texte-profil">
            <span>
                <h1>Jean Mérique</h1>
                <p></p>
            </span>
        </div>
    </section>

    <?php  $image=get_field('photo_de_profil'); ?>
	<?php $nom_prenom=get_the_title(); ?>
	<?php $description=get_the_content(); ?>




<?php get_footer(); ?>
