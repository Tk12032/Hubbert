<?php 
/* Template Name: PageMention */
get_header(); ?>

<?php $post_id =40; $queried_post = get_post($post_id); $content = $queried_post->post_content; ?>

<?php echo $content; ?>

<?php $post_id =49; $queried_post = get_post($post_id); $content = $queried_post->post_content; $content = preg_replace("/<img[^>]+\>/i", "test lol", $content); ?>


<?php get_footer(); ?>
