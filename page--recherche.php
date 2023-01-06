<?php 
/* Template Name: PageRecherche */
get_header(); ?>

<div class = "recherchannonce"> 

    <aside style="width:270px">
        <div class ="filtre-check-box">
            <div>  
                <label for="outils">Outils</label>
                <input type="checkbox" id="outils" name="outils" checked>
                
            </div>
            <div>
                <label for="services">services</label>
                <input type="checkbox" id="services" name="services">
            </div>
        </div>
    </aside>

    <section style="width:100%" class="recherche">

        <?php  $content = new WP_Query([ // je crée une variable $services
        'post_type' => 'annonce', // la je précise quel post_type je veux (dans mon cas "services")
        'post_status' => 'publish', // la je précise que je veux des posts qui sont publié
        'limit' => 10, // dans mon cas je n'en ai besoin que de trois
        'orderby' => 'date', // je les trie par date 
        'date' => true // je récupéère ma date
        ]);

        if($content->have_posts()):?>
            <?php while($content->have_posts()):
                $content->the_post();?>
                <article class="<?php echo get_field('type_dannonce').' '.get_field('type_doutil').' '.get_field('type_de_service').' '.get_field('prix').' '.get_field('localite').' '.get_field('autre_outil').' '.get_field('autre_service')?>">

                    <div class="card flex-row">
                            <img class="card-img-left example-card-img-responsive" style="min-width:460px; height:330px" src="<?php $image=get_field('image_dillustration'); echo $image['url']?>">
                            <div class="card-body">
                                <div>
                                    <h4 class="card-title h5 h4-sm" style="font-family:'Poppins';text-transform: uppercase;font-weight:600;font-size:24px"><?php echo get_the_title()?></h4>
                                    <p class="card-text"><?php echo get_field('description')?></p>
                                </div>
                                

                                <div class="bot-card-body">

                                    <?php
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
                                    }
                                    echo '</h5> </div>'; 
                                    ?>

                                    <h5><?php echo get_field('prix') ?>€ par jour</h5>

                                    <?php echo '<a href="'.get_the_permalink().'" class="vert boutonplus">+</a>';
                                    ?>
                            </div>
                    </div>
                </article>
            <?php endwhile;?>
        <?php else:
        echo "Il n'y a pas encore d'annonce sur ce site... Bizarre...";
        endif;?>


    </section>

</div>



<?php get_footer(); ?>
