        <footer>
            <div class="container">
                <div class="footer-menu">
                  <ul class="flex">
                    <li>Menu</li>
                    <li>Contact</li>
                    <li>Newsletter</li>
                    <li>Follow Us</li>
                  </ul>
                </div>
                <div class="bottom-container flex">
                    <nav class="footer-nav">
                        <?php  
                        $args = [
                            'container' => false,
                            'theme_location' => 'footer-navigation'
                        ];

                        wp_nav_menu($args);
                        ?>
                    </nav>
                    <div class="footer-social">
                        <ul class="flex">
                            <?php  
                            if(have_rows('fs_footer_social_repeater')):
                                while(have_rows('fs_footer_social_repeater')):
                                    the_row();
                                    ?>
                                    <li>
                                        <a href="<?php the_sub_field('link'); ?>">
                                            <?php  
                                                //dump(get_sub_field('image'));
                                                $image = get_sub_field('image');
                                                echo '<img src="'.$image['sizes']['social-logo'].'" alt="'.get_sub_field('image')['alt'].'">';
                                            ?>
                                        </a>
                                    </li>
                                    <?php
                                endwhile;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" id="return-to-top"><i class="fas fa-angle-up"></i></a>
        
        <?php wp_footer(); ?>
    </body>
</html>