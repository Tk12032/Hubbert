<?php 

require_once '../../../wp-load.php';//rajoute l'environnement wordpress (sinon les fonctions wp ne fonctionne pas)

function create_mypost(){
		echo 'test';
	$title = $_POST["title"];
	$content = $_POST["content"];

	wp_insert_post(
		array('post_content' => $content,
		'post_title' => $title),
		true);

	die();
}
add_action('wp_ajax_create_post', 'create_mypost');

function filter(){
	
	if($_GET['outil']=='true'){
		$outil='outil';
	}else{$outil='';}
	if($_GET['service']=='true'){
		$service='service';
	}else{$service='';}
	$annoncefiltrées = new WP_Query([
		
		
		'post_type' => 'annonce', 
		'post_status' => 'publish', 
		'limit' => 10,
		'orderby' => 'date',
		'date' => true,
		'meta_query'    => array(
			'relation'      => 'AND',
			array(
				'key'       => 'prix',
				'value'     => $_GET['prixmax'],
				'type'      => 'NUMERIC',
				'compare'   => '<'
			),
			array(
					'key'       => 'type_dannonce',
					'value'     =>	array($outil, $service),
					'compare'   => 'IN'
			),
		),
	  ]); 

	if($annoncefiltrées->have_posts()){
		$i=0;
		$tableaureponse;
		while($annoncefiltrées->have_posts()){
			$annoncefiltrées->the_post();


			$image = get_field('image_dillustration');
			$a_id=$post->post_author;
			$auteur = get_the_author_meta( 'user_nicename', $a_id );
			if($auteur===''){
				$authorname = 'Anonyme';
				}
				else{
					$authorname = $auteur;
			}

			$tableaureponse[$i] = array(
				"type" => get_field('type_dannonce'),
				"urlimage" => $image['url'],
				"title" => get_the_title(),
				"content" => get_field('description'),
				"urlavatar" => get_avatar_url($auteur),
				"authorname" => $authorname,
				"prix" => get_field('prix'),
				"lienarticle" => get_the_permalink(),
			  );
			  $i++;
			}
			
			$json = json_encode($tableaureponse);

			echo $json;

	}
	else echo 'none';
	
	
	
	die();
}


add_action('wp_ajax_filter','filter');



do_action('wp_ajax_'.$_POST['action']);
do_action('wp_ajax_'.$_GET['action']);
?>