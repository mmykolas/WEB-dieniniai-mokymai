<section class="portfolio" id="portfolio">
    <div class="container">
        <div class="section-title">
            <h2><?php the_field('p_section_heading'); ?></h2>
        </div>
        <div class="images-container flex">
            <?php  
            $args = [
                'cat' => get_field('p_projects'),
                'posts_per_page' => get_field('p_limit')
            ];
            
            $posts = new WP_Query($args);
            //dump($posts);
            
            if($posts->have_posts()):
                while($posts->have_posts()):
                    $posts->the_post();
                    
                    ?>
                    <div class="img-small">
                        <img src="<?php the_post_thumbnail_url('img-s'); ?>" alt="">
                    </div>
                    <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>
<!--
            <div class="img-small"><img src="assets/images/img_small.jpg" alt="Project 1"></div>
            <div class="img-small"><img src="assets/images/img_small.jpg" alt="Project 2"></div>
            <div class="img-small"><img src="assets/images/img_small.jpg" alt="Project 3"></div>
            <div class="img-large"><img src="assets/images/img_large.jpg" alt="Project"></div>
            <div class="img-duoble">
                <div class="img-small"><img src="assets/images/img_small.jpg" alt="Project 4"></div>
                <div class="img-small"><img src="assets/images/img_small.jpg" alt="Project 5"></div>
            </div>
            <div class="img-small"><img src="assets/images/img_small.jpg" alt="Project 6"></div>
            <div class="img-small"><img src="assets/images/img_small.jpg" alt="Project 7"></div>
            <div class="img-small"><img src="assets/images/img_small.jpg" alt="Project 8"></div>
-->
        </div>
        <?php  
        $link = get_field('p_cta_button');
        //dump($link);
        if(!empty($link['target'])){
            $target = 'target="'.$link['target'].'"';
        }else{
            $target = '';
        }
        ?>
        <div class="btn-holder">
            <a href="<?php echo $link['url']; ?>" class="button" <?php echo $target; ?>><?php echo $link['title']; ?></a>
        </div>
    </div>  
</section>