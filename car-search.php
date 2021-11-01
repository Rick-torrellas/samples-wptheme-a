<?php

/*
Template Name: Car Search
*/

$brands = get_terms(
        [
            'taxonomy' => 'brands',
            'hide_empty' => false 
        ]
        );
$link = home_url($post->post_name);
$is_search = count( $_GET );
$get_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$get_brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$get_price_above = isset($_GET['price_above']) ? $_GET['price_above'] : '';
$get_price_below = isset($_GET['price_below']) ? $_GET['price_below'] : '';
if ($is_search) {
    $query = xample_search_query();
}
?> 
<?php get_header() ?>
<h3>car-search.php</h3>
<div>
    <form action="<?php echo $link; ?>">
    <div>
    <label>Type a keyword</label>
    <input 
    type="text" 
    name="keyword" 
    placeholder="Type a keyword"
    value="<?php echo isset($get_keyword) ? $get_keyword : '';?>"
    >
    </div>
    <div>
        <label for="">Choose a brand</label>
        <select name="brand" id="">
            <option  value="">Choose a brand</option>
            <?php foreach($brands as $brand):?>
                <?php if(isset($get_brand) && ($get_brand == $brand->slug) ): ?>
                selected
            <?php endif;?> 
                <option value="<?php echo $brand->slug; ?>"><?php echo $brand->name; ?></option>
            <?php endforeach; ?>
        </select>
        <label>From price</label>

<select name="price_above" class="form-control">

    <?php for($i=0; $i < 210000; $i+=10000):?>    

        <option 
        
        <?php if(  isset($get_price_above) && ( $get_price_above == $i)  ):?>
            selected
        <?php endif;?>
        
        
        value="<?php echo $i;?>">
            <?php echo '$' . number_format($i) ;?>
        </option>

    <?php endfor;?>

</select>
<label>To Price</label>

<select name="price_below" class="form-control">

    <?php for($i=0; $i < 210000; $i+=10000):?>    

        <option 
        
        <?php if(  isset($_GET['price_below']) && ( $_GET['price_below'] == $i)  ):?>
            
            selected

        <?php elseif( $i == 200000):?>

            selected

        <?php endif;?>
        
        
        value="<?php echo $i;?>">
            <?php echo '$' . number_format($i) ;?>
        </option>

    <?php endfor;?>

</select>
    </div>
    <div><button type="submit">Search</button></div>
    <a href="<?php echo $link;?>">Reset search</a>
    </form>
</div>

<h3>/car-search.php</h3>
    <?php if($is_search):?>
    <?php if($query->have_posts()) : ?>

        <?php while($query->have_posts()) : $query->the_post(); ?>
        
        <h2>Result:</h2>
        <h1><?php the_title() ?></h1>
        <?php get_template_part('includes/section','thumbnailS'); ?>
        <?php endwhile; ?>
        <div class="pagination">
                    <?php 
                        echo paginate_links( array(
                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'total'        => $query->max_num_pages,
                            'current'      => max( 1, get_query_var( 'paged' ) ),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Prev', 'text-domain' ) ),
                            'next_text'    => sprintf( '%1$s <i></i>', __( 'Next', 'text-domain' ) ),
                            'add_args'     => false,
                            'add_fragment' => '',
                        ) );
                    ?>
                </div>
        <?php wp_reset_postdata(); ?>
        <?php else:?>

        <p>No hay resultados</p>    

        <?php endif; ?>
        <?php endif; ?>

<?php get_footer() ?>