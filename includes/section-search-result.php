<?php if (have_posts()): while(have_posts()): the_post(); ?>
<h3>section-search-result.php</h3>
<?php get_template_part('includes/section','thumbnailS'); ?>
<h3><?php the_title(); ?></h3>
<?php the_excerpt(); ?>
<a href="<?php the_permalink(); ?>">Read more</a><br>
<?php endwhile; else: ?> 
    <p>The are no results for: '<?php echo get_search_query();?>'</p>
    <?php endif;?>
<h3>/section-search-result.php</h3>