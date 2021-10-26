<?php get_header() ?>
<h3>page.php</h3>
<i>mi funcion es mostrar las paginas individuales</i><br>
<?php get_template_part('includes/section','sidebarPage'); ?>
<?php get_template_part('includes/section','thumbnailS'); ?>
<h1><?php the_title() ?></h1>
    <?php get_template_part('includes/section','content'); ?>
<h3>/page.php</h3>
<?php get_footer() ?>