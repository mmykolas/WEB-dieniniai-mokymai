<section class="contact" id="contact">
    <div class="section-title">
        <h2><?php the_field('c_title'); ?></h2>
    </div>
    <div class="container flex">
        <div class="form">
            <div>
                <?php echo do_shortcode(get_field('c_contact_form_shortcode')); ?>
            </div>
        </div>
        <div class="social">
            <div class="section-text">
                <h3><?php the_field('c_title_location'); ?></h3>
                <p><?php the_field('c_location'); ?></p>
            </div>
            <div class="social-icons">
                <h3><?php the_field('c_social_title'); ?></h3>
                <ul>
                    <?php  
                    if(have_rows('c_social_content_repeater')):
                        while(have_rows('c_social_content_repeater')):
                            the_row();
                            ?>
                            <li>
                                <a href="#">
                                    <?php  
                                        //dump(get_sub_field('image'));
                                        $image = get_sub_field('image');
                                        echo '<img src="'.$image['sizes']['social-logo'].'" alt="'.get_bloginfo('name').'">';
                                    ?>
                                <?php the_sub_field('social_name'); ?></a>
                            </li>
                            <?php
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</section>