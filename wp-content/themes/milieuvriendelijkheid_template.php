<?php 
/*
* Template Name: Milieuvriendelijkheid Page
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
					<!-- 
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Over Galvano</a></li>
                        <li class="current_breadcrumb active" aria-current="page">Milieuvriendelijkheid</li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </section>
    <!--breadcrumb area-->
    
    <!--milieuvriendelijkheid content-->
    <section class="milieuvriendelijkheid_content">
        <div class="container">
            <div class="row">
                <div class="milieuvriendelijkheid_content_text">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
    <!--milieuvriendelijkheid content-->
    
    <!--bottom color section-->
    <section class="bottom_color"></section>
    <!--bottom color section-->
		
	<?php endwhile; ?>
<?php get_footer(); ?>