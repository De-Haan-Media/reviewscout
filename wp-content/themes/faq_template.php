<?php 
/*
* Template Name: FAQ Page
*/
get_header(); 
?>
<?php while ( have_posts() ) : the_post();

// Build up the json snippet
$faq_snippet = '';

// Loop all questions and answers and build the json snippet
if( have_rows('faq_tab') ){
    while( have_rows('faq_tab') ){
        the_row();
        $question = wp_strip_all_tags( get_sub_field('heading') );
        $answer = wp_strip_all_tags( get_sub_field('content') );
        $faq_snippet .= '{"@type":"Question","name":"'. $question .'","acceptedAnswer":{"@type":"Answer","text":"'. $answer .'"}},';
    }
	// Remove the last comma
	$faq_snippet = rtrim( $faq_snippet, ','); ?>
	<script type="application/ld+json">{"@context":"https://schema.org","@type":"FAQPage","mainEntity":[<?php echo $faq_snippet; ?>]}</script>
<?php } ?>

    
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
                        <li class="breadcrumb-item"><a href="#">Kennis & Inspiratie</a></li>
                        <li class="current_breadcrumb active" aria-current="page">FAQ</li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </section>
    <!--breadcrumb area-->

    <section class="faq_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
    
    <!--faq section-->
	<?php if( have_rows('faq_tab') ): ?>
	
    <section class="faq_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="faq_accordian">
                       <div class="accordion md-accordion" id="accordionEx1" role="tablist" aria-multiselectable="true">
							<?php $f=1; while( have_rows('faq_tab') ): the_row(); ?>
                           <!-- Accordion card -->
                           <div class="card">

                               <!-- Card header -->
                               <div class="card-header" role="tab" id="headingTwo<?php echo $f; ?>">
                                   <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx1" href="#collapseTwo<?php echo $f; ?>" aria-expanded="false" aria-controls="collapseTwo1">
                                       <h3>
                                           <?php the_sub_field('heading'); ?> <i class="fa fa-angle-down rotate-icon"></i>
                                       </h3>
                                   </a>
                               </div>

                               <!-- Card body -->
                               <div id="collapseTwo<?php echo $f; ?>" class="collapse" role="tabpanel" aria-labelledby="headingTwo<?php echo $f; ?>" data-parent="#accordionEx1">
                                   <div class="card-body">
                                       <?php the_sub_field('content'); ?>
                                   </div>
                               </div>

                           </div>
                           <!-- Accordion card -->
						   <?php $f++; endwhile; ?>

                           

                       </div>
                    </div>
                    
                    
                    
                    
                    
 <!--Accordion wrapper-->

<!-- Accordion wrapper -->
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </section>
	<?php endif; ?>    
    <!--faq section-->
    
    <!--bottom color section-->
    <section class="bottom_color"></section>
    <!--bottom color section-->
    
<?php endwhile; ?>
<?php get_footer(); ?>