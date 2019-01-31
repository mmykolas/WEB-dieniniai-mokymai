<?php

/* Template Name: Homepage */

get_header();

?>

<!-- Start Point -->

<?php 

get_template_part('partials/services');
get_template_part('partials/portfolio');
get_template_part('partials/skills');
get_template_part('partials/work');
get_template_part('partials/quotations');
get_template_part('partials/contacts');
get_template_part('partials/map');

?>

<?php get_footer(); ?>