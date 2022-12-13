<?php
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');
register_nav_menu('footer', 'navigation_footer');
register_nav_menu('logohome', 'en_tete');



//test onverra
add_theme_support( 'post-templates', array(
    'page-template-name' => 'Template Name',
) );
//fin du test lokum parano


function wp_bootstrap_styles_scripts() {
    wp_enqueue_style('style',get_stylesheet_uri());
    wp_enqueue_style('boostrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-bundle',' https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js',false,'1.0.0', true);
    wp_enqueue_script('jquery');
}    
add_action('wp_enqueue_scripts','wp_bootstrap_styles_scripts');


function create_post_type() {	 // function dans la quel j'ajouterais tous mes type de contenu
	register_post_type('services'/* le nom de mon type de contenu */, [ // tableau avec mes options 
		'labels' => [ // ça sera le nom afficher dans mon menu word press avec la traduction
			'name' => __('Services'), // __() permet a wordpress que c'est contenu de traduction
			'singular_name' => __('Services')
		],
    	'public' => true, // c'est un post_type publique
		'has_archive' => false, // en cas de suppression on peut retrouver notre post disparu
  	    'rewrite' => ['slug' => 'services'], // j'applique une réécriture d'url "services" au lieu de "slug"
		'menu_icon' => 'dashicons-clipboard' // je lui précise une icon dans la bar d'outil de l'admin wordpress
	]);
    
    register_post_type('profil'/* le nom de mon type de contenu */, [ // tableau avec mes options 
		'labels' => [ // ça sera le nom afficher dans mon menu word press avec la traduction
			'name' => __('Profil'), // __() permet a wordpress que c'est contenu de traduction
			'singular_name' => __('Profil')
		],
   		'public' => true, // c'est un post_type publique
		'has_archive' => false, // en cas de suppression on peut retrouver notre post disparu
  	    'rewrite' => ['slug' => 'services'], // j'applique une réécriture d'url "services" au lieu de "slug"
		'menu_icon' => 'dashicons-admin-users' // je lui précise une icon dans la bar d'outil de l'admin wordpress
	]);

    register_post_type('outil'/* le nom de mon type de contenu */, [ // tableau avec mes options 
		'labels' => [ // ça sera le nom afficher dans mon menu word press avec la traduction
			'name' => __('outils'), // __() permet a wordpress que c'est contenu de traduction
			'singular_name' => __('outils')
		],
		'public' => true, // c'est un post_type publique
		'has_archive' => false, // en cas de suppression on peut retrouver notre post disparu
  	'rewrite' => ['slug' => 'outils'], // j'applique une réécriture d'url "services" au lieu de "slug"
		'menu_icon' => 'dashicons-admin-tools' // je lui précise une icon dans la bar d'outil de l'admin wordpress
	]);

    register_post_type('question'/* le nom de mon type de contenu */, [ // tableau avec mes options 
		'labels' => [ // ça sera le nom afficher dans mon menu word press avec la traduction
			'name' => __('question'), // __() permet a wordpress que c'est contenu de traduction
			'singular_name' => __('question')
		],
    	'public' => true, // c'est un post_type publique
		'has_archive' => false, // en cas de suppression on peut retrouver notre post disparu
  	    'rewrite' => ['slug' => 'question'], // j'applique une réécriture d'url "services" au lieu de "slug"
		'menu_icon' => 'dashicons-clipboard' // je lui précise une icon dans la bar d'outil de l'admin wordpress
	]);

	
	
	/* Pour mention legale */


	register_post_type('textelegal'/* le nom de mon type de contenu */, [ // tableau avec mes options 
		'labels' => [ // ça sera le nom afficher dans mon menu word press avec la traduction
			'name' => __('textelegal'), // __() permet a wordpress que c'est contenu de traduction
			'singular_name' => __('textelegal')
		],
    	'public' => true, // c'est un post_type publique
		'has_archive' => false, // en cas de suppression on peut retrouver notre post disparu
  	    'rewrite' => ['slug' => 'textelegal'], // j'applique une réécriture d'url "textelegal" au lieu de "slug"
		'menu_icon' => 'dashicons-clipboard' // je lui précise une icon dans la bar d'outil de l'admin wordpress
	]);

}
add_action('init', 'create_post_type');


function bouton_hubbert($contenu,$adresse,$couleur) {

  echo  '<a class = "nav-link bouton-hubbert '.$couleur.'" href= $adresse >'.$contenu.'</a>';

}

function carroussel_couleur($type, $nbr){
    for($i=0; $i<$nbr;$i++){
        echo '<div class="'.$type.'"><p>'.$i.'</p></div>';
    }
}

function boutonpicto($type,$couleur,$shape){
    $nomimg="picto_".$type."_inact.png";
    $adresse=get_template_directory_uri().'/assets/img/'.$nomimg;
    echo '
    <button class="pictobouton '.$couleur.' '.$shape.' '.$type.'">
    <img class="pictobouton '.$type.'" src="'.$adresse.'">
    </button>';
}


function montheme_menu_class($classes) {
	$classes[] = 'nav-item';
	return $classes;
  }
  function montheme_menu_link_class($attrs) {
	$attrs['class'] = 'nav-link';
	return $attrs;
  }


    
        
    







  
  add_filter('nav_menu_css_class', 'montheme_menu_class');
  add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');