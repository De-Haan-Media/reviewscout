<?php /* Template Name: Page Contained */ ?>
<?php get_template_part( 'template-parts/header' ); ?>
<?php if ( !get_field( 'hide_breadcrumb' ) ){ the_breadcrumb(); }?>
<main>
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post();
                ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                <?php
                endwhile; 
            endif; 
            ?>
        </div>
    </div>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>