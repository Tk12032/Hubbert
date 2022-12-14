<?php 
/* Template Name: PageHome */
get_header(); ?>

<?php boutonpicto("messagerie", "vert-plein", "rectangle");?>  

 
<section class="garden">
        <div class="texte-central">
            <span>
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
            </span>
            <?php bouton_hubbert("Je me connecte","index.php","vert nav-item menu-item"); ?>
        </div>
    </section>

    <section class="services">
        <div class="carroussel">
            <?php carroussel_couleur("profil",20); ?>
            <!-- fct php de création de card en ftc des meilleurs users -->
        </div>
        <div class="bouton-page">
        <?php bouton_hubbert("Demander un service","index.php","vert"); ?>
        <?php bouton_hubbert("Proposer un service","index.php","orange"); ?>
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
        <div class="carroussel">
            <?php carroussel_couleur("tools",20); ?>
            <!-- fct php de création de card en ftc des meilleurs annonces d'outils -->
        </div>
        <div class="bouton-page">
        <?php bouton_hubbert("Demander un outil","index.php","vert"); ?>
        <?php bouton_hubbert("Proposer un outil","index.php","orange"); ?>
       
    </section>



<?php get_footer(); ?>

