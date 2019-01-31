<section class="work">
    <div class="container flex">
        <div class="section-text">
            <h2><?php the_field('w_work_title'); ?></h2>
            <?php the_field('w_work_description'); ?>
            <div class="btn-holder">
                <?php  
                $link = get_field('w_cta_button');
                //dump($link);
                
                if(!empty($link['target'])){
                    $target = 'target="'.$link['target'].'"';
                }else{
                    $target = '';
                }
                ?>
                <a href="<?php echo $link['url']; ?>" class="button" <?php echo $target; ?>><?php echo $link['title']; ?></a>
            </div>
        </div>
        <div class="section-list">
            <div class="company1">
                <?php  
                if(have_rows('w_experience_repeater')):
                    while(have_rows('w_experience_repeater')):
                        the_row();
                ?>
                <div class="company flex">
                    <div class="company-logo">
                    <?php 

                    $image = get_sub_field('image');

                    if( !empty($image) ): ?>

                        <img src="<?php echo $image['sizes']['company-logo']; ?>" alt="<?php echo $image['alt']; ?>" />

                    <?php endif; ?>
                    </div>
                    <div class="experience">
                        <h2><?php the_sub_field('workplace'); ?></h2>
                        <h3><?php the_sub_field('position'); ?></h3>
                        <p><?php the_sub_field('period'); ?></p>
                    </div>
                </div>
                <?php
                endwhile;
            endif;
            ?>
            </div>
            <div class="company2">
                <?php  
                if(have_rows('w_experience_repeater2')):
                    while(have_rows('w_experience_repeater2')):
                        the_row();
                ?>
                <div class="company flex">
                    <div class="company-logo">
                    <?php 

                    $image = get_sub_field('image');

                    if( !empty($image) ): ?>

                        <img src="<?php echo $image['sizes']['company-logo']; ?>" alt="<?php echo $image['alt']; ?>" />

                    <?php endif; ?>
                    </div>
                    <div class="experience">
                        <h2><?php the_sub_field('workplace'); ?></h2>
                        <h3><?php the_sub_field('position'); ?></h3>
                        <p><?php the_sub_field('period'); ?></p>
                    </div>
                </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>