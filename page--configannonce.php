<?php 
/* Template Name: PageConfigA */
get_header(); ?>
<div class="container">
<?php 
$form = wpcf7_contact_form(219);
echo $form->form;
?>
<?php echo do_shortcode('[frontend_admin field=639708ee1294c edit=false]'); ?>
</div>




<?php get_footer(); ?>
