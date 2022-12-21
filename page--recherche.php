<?php 
/* Template Name: PageRecherche */
get_header(); ?>

<div class = "container recherchannonce"> 

    <aside style="width:270px">

    </aside>

    <div class="annoncfiltre">
        <?php $content = new WP_Query([ // je crée une variable $services
        'post_type' => 'outil', // la je précise quel post_type je veux (dans mon cas "services")
        'post_status' => 'publish', // la je précise que je veux des posts qui sont publié
        'orderby' => 'date', // je les trie par date 
        'date' => true // je récupéère ma date
        ]);
        while($content->have_posts()):?>
        <?php $content->the_post();?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php the_title() ?></h5>
                    </div>
            </div>
            <?php endwhile;?>
    </div>

</div>



<?php get_footer(); ?>
