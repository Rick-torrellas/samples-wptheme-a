<?php get_header() ?>
<h3>category-sample.php category-$slug.php</h3>
<i>mi funcion es mostrar una categoria en espesifico, usando el nombre de la categoria (slug) como identificador.</i>
<h1><?php echo single_cat_title(); ?></h1>
<?php get_template_part('includes/section','archive'); ?>
<?php previous_posts_link(); ?>
<?php next_posts_link(); ?>
<?php get_footer() ?>