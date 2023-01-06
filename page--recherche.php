<?php 
/* Template Name: PageRecherche */
get_header(); ?>

<div class = "recherchannonce"> 

    <aside class="filtres" style="width:270px">
        <div class ="filtre-check-box">
            <div class="check">  
            <input class="checkbox-effect" id="outils" type="checkbox" name="outils"/>
                <label for="outils">Outils</label>
            </div>
            <div class="check">
                <input class="checkbox-effect" id="services" type="checkbox" name="services"/>
                <label for="services">Services</label>
            </div>
        </div>

            

        <div style="display:flex; flex-direction:column">
            <label for="prix">Prix</label>
            <input type="range" name="prix" value="15" min="1" max="100" oninput="this.nextElementSibling.value = this.value + ' €/j'">
            <output style="margin:10px 0px">15 €/j</output>
        </div>

        <div style="display:flex; flex-direction:column">
            <label for="distance">Distance</label>
            <input type="range" name="distance" value="10" min="1" max="100" oninput="this.nextElementSibling.value = this.value + ' km'">
            <output style="margin:10px 0px">10 km</output>
        </div>

        <div class="range_container">
            <div><label>Jours</label></div>
                <div class="sliders_control">
                    <input id="fromSlider" type="range" value="0" min="0" max="6" oninput="doublslider()">
                    
                    <input id="toSlider" type="range" value="6" min="0" max="6" oninput="doublslider()">   
                </div>
            <div style="display:flex;justify-content:space-between;margin-top:10px"><output id="startday">Lundi</output><output id="endday">Dimanche</output></div>
        </div>


        <div class="range_container">
            <div><label>Heures</label></div>
                <div class="sliders_control">
                    <input id="fromSlider2" type="range" value="7" min="7" max="20" oninput="doublslider2()">
                    
                    <input id="toSlider2" type="range" value="20" min="7" max="20" oninput="doublslider2()">   
                </div>
            <div style="display:flex;justify-content:space-between;margin-top:10px"><output id="starthour">7h</output><output id="endhour">20h</output></div>
        </div>
        
        <button class="vert" style="display:flex; width:fit-content;padding:10px;align-items:center">
            <img style="width:20px" class="recherchepicto" src="<?php echo get_template_directory_uri() ?>/assets/img/picto_recherche_inact.svg">
            <p style="margin:0px 10px;">C'est parti !</p>
        </button>
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
