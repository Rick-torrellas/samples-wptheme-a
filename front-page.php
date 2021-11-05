<?php get_header( ) ?>
<h3>front-page.php</h3>
<p><?php echo xample_test();?></p>
<h1><?php the_title(); ?></h1>
<i>mi funcion es ser la pagina principal, la primera que se muestra.</i><br>
<?php get_template_part('includes/section-search','form'); ?>
<?php get_template_part('includes/section','content'); ?>
<h3>/front-page.php</h3>
<?php get_footer() ?>