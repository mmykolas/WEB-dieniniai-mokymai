<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    </head>

    <body>
        <header class="header">
            <nav role="navigation" class="navigation">
                <div id="menuToggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                    <?php  
                    $args = [
                        'menu_id' => 'menu',
                        'menu_class' => 'navul',
                        'container' => false,
                        'theme_location' => 'primary-navigation'
                    ];

                    wp_nav_menu($args);
                    ?>    
                </div>
            </nav>
            <div class="container flex">
                <a href="<?php home_url(); ?>" class="logo">
                    <?php  
                    if(get_field('logo', 'option')):
                        echo get_field('logo_text', 'option');
                    else:
                        //dump(get_field('logo_image', 'option'));
                        $image = get_field('logo_image', 'option');
                        echo '<img src="'.$image['sizes']['logo'].'" alt="'.get_bloginfo('name').'">';
                    endif;
                    ?>
                </a>
                <nav class="header-nav">
                <?php  
                $args = [
                    'menu_class' => 'flex',
                    'container' => false,
                    'theme_location' => 'primary-navigation'
                ];
                    
                wp_nav_menu($args);
                ?>    
                </nav>
            </div>
        </header>
        
        <section class="hero">
            <div class="container flex">
                <div class="hero-text">
				    <h1><?php the_field('hero_title'); ?></h1>
					<?php the_field('hero_content'); ?>
				</div>
				<div class="hero-arrow">
                    <a href="#about"><i class="far fa-arrow-alt-circle-down"></i></a>
				</div>
            </div>
        </section>