<?php get_header() ?>
<h3>archive.php</h3>
<i>mi funcion es mostrar todas las categorias y tags.</i><br>
<?php get_template_part('includes/section','sidebarBlog'); ?>
<h1><?php echo single_cat_title(); ?></h1>
<?php get_template_part('includes/section','archive'); ?>
<?php previous_posts_link(); ?>
<?php next_posts_link(); ?>
<h3>/archive.php</h3>
<?php get_footer() ?>