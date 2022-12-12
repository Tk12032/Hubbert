<?php get_header(); ?>

<<?php boutonpicto("messagerie", "vert-plein", "rectangle");?>  

 
<section class="garden">
        <div class="texte-central">
            <span>
                <h1>KEEP YOUR GARDEN CLEAN</h1>
                <p>La plateforme qui vous permet d’échanger entre voisins des outils et des services de jardinage à bas prix.</p>
            </span>
            <?php bouton_hubbert("Je me connecte","index.php","vert"); ?>
        </div>
    </section>

    <section class="services">
        <div class="carroussel">
            <?php carroussel_couleur("users",20); ?>
            <!-- fct php de création de card en ftc des meilleurs users -->
        </div>
        <div class="bouton-page">
        <?php bouton_hubbert("Demander un service","index.php","vert"); ?>
        <?php bouton_hubbert("Proposer un service","index.php","orange"); ?>
        </div>
    </section>

    <section class="outils">
        <span>
            <h2>Les outils les plus chauds de ta région</h2>
            <p>Trouves les outils qui te manque chez les personnes qui habitent près de chez toi. Ou alors toi aussi mets à disposition un ou plusieurs de tes outils pour aider et te faire un peu d’économie.</p>
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

