<?php if (have_posts()): while(have_posts()): the_post(); ?>
<?php
$nombre = get_the_author_meta('first_name');
$apellido = get_the_author_meta('last_name');
$tags = get_the_tags();
$categories = get_the_category();
$id = $post->ID;
?>
<h3>section-blogcontent.php</h3>
<p>Creado: <?php echo get_the_date('d/m/Y h:i:s') ?></p>
<?php the_content() ?>
<ul>
    <?php if (get_post_meta($id,'Name',true)): ?>
    <li><?php echo get_post_meta($id,'Name',true)?></li>
    <?php endif; ?>
    <?php if (get_post_meta($id,'Color')): ?>
    <li><?php echo get_post_meta($id,'Color',true)?></li>
    <?php endif; ?>
</ul>
<p><?php echo 'Author: ' . $nombre . ' ' . $apellido;?></p>
// TODO: Mostrar los custom taxonomie
<?php if (has_tag()): ?>
    <span>Tags: </span>
    <?php foreach($tags as $tag):?>
        <a href="<?php echo get_tag_link($tag->term_id);?>">
        <?php echo $tag->name; ?>
    </a>
    <?php  endforeach; endif; ?>
    <br>
    <?php if (has_category()): ?>
    <span>Categories: </span>
    <?php foreach($categories as $cat):?>
        <a href="<?php echo get_category_link($cat->term_id);?>">
        <?php echo $cat->name; ?>
    </a>
    <?php  endforeach; endif; ?>
    <br>
    <?php comments_template() ?>
<?php endwhile; else: endif;?>
<h3>/section-blogcontent.php</h3>