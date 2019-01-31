<section class="about" id="about">
    <div class="owl-carousel owl-theme">
        <?php  
        if(have_rows('hs_services_repeater')):
            while(have_rows('hs_services_repeater')):
                the_row();

                // kad pasiekti repeater viduje esanti lauka naudosime
                // get_sub_field('lauko_pavadinimas'); - grazzina reiksme
                // the_sub_field('lauko_pavadinimas'); - spausdina reiksme
                ?>
                <div class="container flex">
                    <div class="section-pic">
                        <?php  
                            //dump(get_sub_field('image'));
                            $image = get_sub_field('image');
                            echo '<img src="'.$image['sizes']['medium'].'" alt="'.get_bloginfo('name').'">';
                        
                        ?>
                    </div>
                    <div class="section-text">
                        <h2><?php the_sub_field('heading'); ?></h2>
                        <h3><?php the_sub_field('description'); ?></h3>
                    </div>
                </div>
                <?php
            endwhile;
        endif;
        ?>
    </div>    
</section>