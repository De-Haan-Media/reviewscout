<?php 
/*
* Template Name: Over Galvano Page
*/
get_header(); 
?>
 <?php while ( have_posts() ) : the_post(); ?>   
    <!--top color section-->
    <section class="top_color"></section>
    <!--top color section-->
    
    <!--breadcrumb area-->
    <section class="breadcrumb pt-2">
        <div class="container">
            <div class="row">
                <?php
					if ( function_exists('yoast_breadcrumb') ) {
					  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
					?>
					<!-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Over Galvano</li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </section>
    <!--breadcrumb area-->
    
    <!--overgalvano-->
    <section class="overgalvano">
        <div class="container">
            <div class="overgalvano_text">
                <div class="row">
                    <div class="col-md-12">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--overgalvano-->
    
    <!--bottom color section-->
    <section class="bottom_color"></section>
    <!--bottom color section-->
    <?php endwhile; ?>
    <?php get_footer(); ?>