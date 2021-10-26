<h3>section-content.php</h3>
<?php if (have_posts()): while(have_posts()): the_post(); ?>

<?php the_content() ?>

<?php endwhile; else: endif;?>
<h3>/section-content.php</h3>