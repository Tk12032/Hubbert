<?php 
/* Template Name: PageHome */
get_header(); ?>

<?php boutonpicto("messagerie", "vert-plein", "rectangle");?>  

 
<section class="garden">
        <div class="texte-central">
                <h1>
                <?php 
                    $homepage = new WP_Query([ // je crée une variable $q
                        'post_type' => 'page', // la je précise quel post_type je veux (dans mon cas "q")    
                      ]);
                      while($homepage->have_posts()){
                        $homepage->the_post();
                        echo get_field('catchphrase');
                      }                
                 ?>
                </h1>
                
                <p>

                <?php 
                    $homepage = new WP_Query([ // je crée une variable $q
                        'post_type' => 'page', // la je précise quel post_type je veux (dans mon cas "q")    
                      ]);
                      while($homepage->have_posts()){
                        $homepage->the_post();
                        echo get_field('description-catchphrase');
                      }                
                 ?>

                </p>
            <?php wp_nav_menu([
              'theme_location' => 'conect',
              'container' => false,
              'menu_class' => 'boutmid'
              ]); ?>
        </div>
    </section>

    <section class="services">
        <div class="carrousel">
            <?php carroussel_couleur("profil",10); ?>
            <!-- fct php de création de card en ftc des meilleurs users -->
        </div>
        <div class="bouton-page">
        <?php wp_nav_menu([
              'theme_location' => 'servicarr',
              'container' => false,
              'menu_class' => 'boutmid'
              ]); ?>
        </div>
    </section>

    <section class="outils">
        <span>
            <h2>

            <?php 
                    $homepage = new WP_Query([ // je crée une variable $q
                        'post_type' => 'page', // la je précise quel post_type je veux (dans mon cas "q")    
                      ]);
                      while($homepage->have_posts()){
                        $homepage->the_post();
                        echo get_field('sous_titre_middle');
                      }                
                 ?>

            </h2>
            <p>

            <?php 
                    $homepage = new WP_Query([ // je crée une variable $q
                        'post_type' => 'page', // la je précise quel post_type je veux (dans mon cas "q")    
                      ]);
                      while($homepage->have_posts()){
                        $homepage->the_post();
                        echo get_field('sous_titre_middle_description');
                      }                
                 ?>

            </p>
        </span>
        <div class="carousel">
            <?php carroussel_couleur("outil",10); ?>
            <!-- fct php de création de card en ftc des meilleurs annonces d'outils -->
        </div>
        <div class="bouton-page">
        <?php wp_nav_menu([
              'theme_location' => 'outilcarr',
              'container' => false,
              'menu_class' => 'boutmid'
              ]); ?>
        </div>

        
       
    </section>



<?php get_footer(); ?>

