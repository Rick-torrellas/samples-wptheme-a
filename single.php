<?php get_header() ?>
<h3>single.php</h3>
<i>mi funcion es mostrar los post individuales</i>
<?php get_template_part('includes/section','thumbnailS'); ?>
<h1><?php the_title() ?></h1>
<?php get_template_part('includes/section','blogcontent'); ?>
<?php wp_link_pages(); ?>
<?php get_template_part('includes/section','post-pagination'); ?> 
<h3>/single.php</h3>
<?php get_footer() ?>