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
add_theme_support( 'widgets' );

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
    //wp_enqueue_style('style',get_stylesheet_uri());
    wp_enqueue_style('boostrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css');
    //wp_enqueue_script('bootstrap-bundle',' https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js',false,'1.0.0', true);
    wp_enqueue_script('jquery');
	wp_enqueue_script('hubcarrou', get_template_directory_uri().'/assets/js/script.js', ['jquery'], 1, true);
	wp_enqueue_script('hubfiltre', get_template_directory_uri().'/assets/js/hubbertfiltre.js', ['jquery'], 1, true);
	wp_enqueue_script('hubajax', get_template_directory_uri().'/assets/js/hubbert-ajax.js', ['jquery'], 1, true);


}    
add_action('wp_enqueue_scripts','wp_bootstrap_styles_scripts');



function create_post_type() {	 // function dans la quel j'ajouterais tous mes type de contenu
    
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

    register_post_type('annonce'/* le nom de mon type de contenu */, [ // tableau avec mes options 
		'labels' => [ // ça sera le nom afficher dans mon menu word press avec la traduction
			'name' => __('annonce'), // __() permet a wordpress que c'est contenu de traduction
			'singular_name' => __('annonce')
		],
		'public' => true, // c'est un post_type publique
		'has_archive' => false, // en cas de suppression on peut retrouver notre post disparu
  	'rewrite' => ['slug' => 'annonce'], // j'applique une réécriture d'url "services" au lieu de "slug"
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
add_post_type_support( 'annonce', array(
    'author', 'excerpt',
) );

function carroussel_couleur($type, $nbr){

  $content = new WP_Query([ // je crée une variable $services
    'post_type' => $type, // la je précise quel post_type je veux (dans mon cas "services")
    'post_status' => 'publish', // la je précise que je veux des posts qui sont publié
    'limit' => $nbr, // dans mon cas je n'en ai besoin que de trois
    'orderby' => 'date', // je les trie par date 
    'date' => true // je récupéère ma date
  ]);

  if ($content->have_posts()){ // ici je vérifie que $services posède bien mes posts
	echo '<div class="carrousel--wrapper">';
      while ($content->have_posts()){ // la je lance ma boucle sur mes posts contenu dans services
		$content->the_post(); // la récupère mon post
			$image=get_field('image_dillustration');
			$title=get_the_title();
			echo '<div class="'.$type.' carrousel--item"> ';
			echo '<div class="card '.$type.' ">
			<figure><img src="'.$image['url'].'" alt="'.$title.'"></figure>
				<div class="cardbody">
					<h5 class="card-title">'.$title.'</h5>
					<a href="'.get_the_permalink().'" class="vert boutonplus">+</a>
				</div>
			</div>
			</div>
			
				';		
	}
}
	
else{
	echo '<h5>On a pas encore de question a vous répondre mais ça arrive !</h5>';
}
echo '</div>';
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
    <button class="pictobouton '.$couleur.' '.$shape.' '.$type.'" >
    <img class="pictobouton '.$type.'" alt="'.$type.'" src="'.$adresse.'">
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


        
 /* 
function create_post() {
	
	$title = $_POST['title'];
	$content = $_POST['content'];
  
	$new_post = array(
	  'post_title' => $title,
	  'post_content' => $content,
	  'post_status' => 'publish',
	  'post_author' => 1,
	  'post_type' => 'post'
	);
	wp_insert_post($new_post);
  
	wp_die();
  }
  add_action('wp_ajax_create_post', 'create_post');
   */





  
  add_filter('nav_menu_css_class', 'montheme_menu_class');
  add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');