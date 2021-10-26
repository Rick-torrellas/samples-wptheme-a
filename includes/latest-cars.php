<?php

$args = [

    'post_type' => 'cars'
];
$query = new WP_Query($args);
?>

<?php if( $query->have_posts() ):?>
    <?php while( $query->have_posts() )  : $query->the_post();?>
    <div class="card mb-3">

    <a href="<?php the_post_thumbnail_url();?>">
    <img src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>">
    </a>

    <h3><?php the_title();?></h3>
    <?php endwhile;?>


<?php endif;?>