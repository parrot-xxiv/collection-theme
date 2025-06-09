<?php
/*
Template Name: Dark Theme Supported
*/

?>
<!doctype html>
<html <?php language_attributes(); ?> data-theme="light">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>

</head>

<body <?php body_class('min-h-screen'); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'collection-theme'); ?></a>
        <main id="primary" class="site-main">
            <?php the_content(); ?>
        </main>
    </div> <!-- #page -->
    <?php wp_footer(); ?>

</body>

</html>