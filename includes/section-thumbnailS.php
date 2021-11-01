<?php if (has_post_thumbnail()):?>
    <a href="<?php the_post_thumbnail_url('blog-small');?>">
    <img src="<?php the_post_thumbnail_url('blog-small');?>" alt="thumbnail" width="300">
    </a>
<?php endif; ?>