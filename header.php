<?php
 /* 
 * @package xample
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'sample-class' ); ?>>
<?php wp_body_open(); ?> 
    <header>
        <h3>header.php</h3>
        <?php
        wp_nav_menu(
            [
                'theme_location' => 'top-menu',
                'menu_class' => 'top-bar'
                ]
            );
            ?>
            <h3>/header.php</h3>
    </header>