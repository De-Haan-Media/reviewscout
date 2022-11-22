<?php get_template_part( 'template-parts/header' ); ?>
<?php the_breadcrumb(); ?>
<main>
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <h1>Zoekresultaten voor <span class="keyword">&ldquo;<?php the_search_query(); ?>&rdquo;</span></h1>
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post();
                ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <br>
                </div>
                <?php
                endwhile; 
            endif; 
            ?>
        <?php wpbeginner_numeric_posts_nav(); ?>
        </div>
    </div>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>