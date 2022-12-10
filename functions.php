<?php
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');
register_nav_menu('header', 'En tête du menu');

function wp_bootstrap_styles_scripts() {
    wp_enqueue_style('style',get_stylesheet_uri());
    wp_enqueue_style('boostrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-bundle',' https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js',false,'1.0.0', true);
    wp_enqueue_script('jquery');
}    
add_action('wp_enqueue_scripts','wp_bootstrap_styles_scripts');

function bouton_hubbert($contenu,$adresse,$couleur) {

  echo  '<a class = "nav-link bouton-hubbert '.$couleur.'" href= $adresse >'.$contenu.'</a>';

}

function carroussel_couleur($type, $nbr){
    for($i=0; $i<$nbr;$i++){
        echo '<div class="'.$type.'"><p>'.$i.'</p></div>';
    }
}


/*function bouton_picto($type, $couleur,$shape){
    $nomimg="picto_".$type."_inact.png";
    $adresse=get_template_directory_uri().'/assets/img/'.$nomimg;
    echo '
    <button>
    <img class="'.$couleur.' '.$shape.' '.$type.'" alt="picto '.$type.'" scr="'.$adresse.'">
    </button>
    ';
}*/
function boutonpicto($type,$couleur,$shape){
    $nomimg="picto_".$type."_inact.png";
    $adresse=get_template_directory_uri().'/assets/img/'.$nomimg;
    echo '
    <button class="pictobouton '.$couleur.' '.$shape.' '.$type.'">
    <img class="pictobouton '.$type.'" src="'.$adresse.'">
    </button>';
}