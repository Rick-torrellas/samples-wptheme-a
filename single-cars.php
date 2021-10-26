
<?php get_header() ?>
<h3>single-cars.php</h3>
<?php get_template_part('includes/section','thumbnailS'); ?>
<h1><?php the_title() ?></h1>
<?php get_template_part('includes/section','post-cars'); ?>
<?php get_template_part('includes/section','form-enquiry'); ?>
<?php wp_link_pages(); ?>
<?php get_template_part('includes/section','post-pagination'); ?>
<h3>/single-cars.php</h3>
<?php get_footer() ?>