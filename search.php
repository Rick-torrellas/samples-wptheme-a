<?php get_header() ?>
<h3>search.php</h3>
<?php get_template_part('includes/section','sidebarBlog'); ?>
<h1>Search Results for: '<?php echo get_search_query();?>'</h1>
<?php get_template_part('includes/section-search','result'); ?>
<?php previous_posts_link(); ?>
<?php next_posts_link(); ?> 
<h3>/search.php</h3>
<?php get_footer() ?>