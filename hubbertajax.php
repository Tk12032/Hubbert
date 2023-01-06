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


	echo $title;
	echo $content;
	die();
}
add_action('wp_ajax_create_post', 'create_mypost');








do_action('wp_ajax_'.$_POST['action']);
?>