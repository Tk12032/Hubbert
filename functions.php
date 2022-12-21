<?php
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');
register_nav_menu('footer', 'navigation_footer');
register_nav_menu('navbar', 'header');
register_nav_menu('home', 'headerlogo');
register_nav_menu('servicarr', 'servicarrou');
register_nav_menu('outilcarr', 'outilcarrou');
register_nav_menu('conect', 'conect');

register_meta( 'post', 'block_name', array(
	'show_in_rest' => true,
	'single'       => true,
	'type'         => 'string',
  ) );
  

// Define the form options
$options = array(
    'id' => 'creaannonce',
    'post_id' => 'new_post',
    'field_groups' => array(30),
    'submit_value' => 'Submit Form',
    'updated_message' => 'Form updated!',
    'new_post' => array(
        'post_type' => 'post',
        'post_status' => 'pending',
    ),
);


	




function my_theme_setup() {
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'widgets' ) );
}
add_action( 'after_setup_theme', 'my_theme_setup' );

function wp_bootstrap_styles_scripts() {
    wp_enqueue_style('style',get_stylesheet_uri());
    wp_enqueue_style('boostrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-bundle',' https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js',false,'1.0.0', true);
    wp_enqueue_script('jquery');
	wp_enqueue_script('script', get_template_directory_uri().'/assets/js/script.js', ['jquery'], 1, true);
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
			'name' => __('profil'), // __() permet a wordpress que c'est contenu de traduction
			'singular_name' => __('profil')
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
	add_post_type_support( 'profil', 'comments' );

	
	
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


function carroussel_couleur($type, $nbr){

  $content = new WP_Query([ // je crée une variable $services
    'post_type' => $type, // la je précise quel post_type je veux (dans mon cas "services")
    'post_status' => 'publish', // la je précise que je veux des posts qui sont publié
    'limit' => $nbr, // dans mon cas je n'en ai besoin que de trois
    'orderby' => 'date', // je les trie par date 
    'date' => true // je récupéère ma date
  ]);

  if ($content->have_posts()){ // ici je vérifie que $services posède bien mes posts
	if($type==='profil'){
	echo '<div class="carrousel--wrapper">';
      while ($content->have_posts()){ // la je lance ma boucle sur mes posts contenu dans services
		$content->the_post(); // la récupère mon post
		if($type==='profil'){
			$image=get_field('photo_de_profil');
			$nom_prenom=get_the_title();
			echo '<div class="profil carrousel--item" style="padding: 0px 10px;"> ';
			echo '<div class="card profil ">
			<figure><img src="'.$image['url'].'" alt="'.$nom_prenom.'"></figure>
				<div class="card-body">
					<h5 class="card-title">'.$nom_prenom.'</h5>
					<p class="localite">'.get_field('localite').'</p>
					<a href="'.get_the_permalink().'" class="vert boutonplus">+</a>
				</div>
			</div>
			</div>
				';
		}
		
	}
}	else if($type==='outil'){
	echo '<div class="carousel--wrapper">';
      while ($content->have_posts()){ // la je lance ma boucle sur mes posts contenu dans services
		$content->the_post(); // la récupère mon post
	if($type==='outil'){
		$image=get_field('ImgAnnonces');
		$nom_prenom=get_the_title();
		echo '<div class="carousel--item" style="padding: 0px 10px;"> ';
		echo '<div class="card tool">
		<figure><img src="'.$image['url'].'" alt="'.the_title().'"></figure>
			<div class="card-body">
				<h5 class="card-title">'.$nom_prenom.'</h5>
				<p class="localite">'.get_field('prix').'</p>
				<a href="'.get_the_permalink().'" class="vert boutonplus">+</a>
			</div>
		</div>
		</div>
			';
		}

	}
}
echo '</div>';
	
}
else{
	echo '<h5>On a pas encore de question a vous répondre mais ça arrive !</h5>';
}
}       

//autoriser les comments
function get_profil_posts() {
    $profil_posts = get_posts( array(
        'post_type' => 'profil',
        'numberposts' => -1,
    ) );

    return $profil_posts;
};
$profil_posts = get_profil_posts();

foreach ( $profil_posts as $profil_post ) {
    wp_update_post( array(
        'ID'            => $profil_post->ID,
        'comment_status' => 'open',
    ) );
}



function boutonpicto($type,$couleur,$shape){
    $nomimg="picto_".$type."_inact.png";
    $adresse=get_template_directory_uri().'/assets/img/'.$nomimg;
    echo '
    <button class="pictobouton '.$couleur.' '.$shape.' '.$type.'" alt="'.$type.'">
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