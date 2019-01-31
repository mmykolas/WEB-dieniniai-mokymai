<section class="bottom-slider">
    <div class="owl-carousel owl-theme">
        <?php  
        if(have_rows('q_quote_repeater')):
            while(have_rows('q_quote_repeater')):
                the_row();
        ?>
        <div class="container flex">
            <div class="section-text">
                <h2><?php the_sub_field('heading'); ?></h2>
                <p>- <?php the_sub_field('author'); ?> -</p>
            </div>
        </div>
        <?php
            endwhile;
        endif;
        ?>
    </div>    
</section>