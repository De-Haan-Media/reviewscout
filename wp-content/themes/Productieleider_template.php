<?php 
/*
* Template Name: Productieleider Page
*/
get_header(); 
?>

<!-- mailto ui script -->
<script src="https://cdn.jsdelivr.net/npm/mailtoui@1.0.3/dist/mailtoui-min.js"
data-options='
<?php if (isset ($_GET['lang'])) {
    if ($_GET['lang'] == 'en') { ?>                       
    { 
        "title": "Compose new email",
        "buttonIcon1": "/wp-content/themes/galvano/assets/images/Outlook.com_icon.svg",
        "buttonText1" : "Outlook in Browser",
        "buttonIcon2" : "/wp-content/themes/galvano/assets/images/Gmail_icon.svg",
        "buttonText2" : "Gmail in Browser",
        "buttonText4" : "Default email app",
        "buttonTextCopy" : "Copy",
        "buttonTextCopyAction" : "Copied!"
    }
<?php } else if ($_GET['lang'] == 'de') { ?>
    { 
        "title": "Neue E-Mail verfassen",
        "buttonIcon1": "/wp-content/themes/galvano/assets/images/Outlook.com_icon.svg",
        "buttonText1" : "Outlook im Browser",
        "buttonIcon2" : "/wp-content/themes/galvano/assets/images/Gmail_icon.svg",
        "buttonText2" : "Gmail im Browser",
        "buttonText4" : "Standard-E-Mail-App",
        "buttonTextCopy" : "Kopieren",
        "buttonTextCopyAction" : "Kopiert!"
    }
<?php }
} else { ?>
    { 
        "title": "Stel nieuwe e-mail op",
        "buttonIcon1": "/wp-content/themes/galvano/assets/images/Outlook.com_icon.svg",
        "buttonText1" : "Outlook in de browser",
        "buttonIcon2" : "/wp-content/themes/galvano/assets/images/Gmail_icon.svg",
        "buttonText2" : "Gmail in de browser",
        "buttonText4" : "Standaard e-mail app",
        "buttonTextCopy" : "Kopiëren",
        "buttonTextCopyAction" : "Gekopiëerd!"
    }
<?php } ?>
'></script>

<script>
    jQuery(document).ready( function () {
        mailtouiApp.run()
    });   
</script>

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
                        <li class="current_breadcrumb"><a href="#">Werken bij</a></li>
                        <li class="current_breadcrumb active" aria-current="page">Productieleider (fulltime)</li>
                    </ol>
                </nav>
				-->
            </div>
        </div>
    </section>
    <!--breadcrumb area-->
    
    
    
    <!--vacature content-->
    <section class="vacature_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="vacature_content_text">
                    <?php the_content(); ?>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!--vacature content-->
    
    <?php if( have_rows('productieleider_offer') ): ?>
	
    <!--vacature middle content-->
    <section class="vacature_middle_content">
        <div class="container">
		<?php while( have_rows('productieleider_offer') ): the_row(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="vacature_middle_content_text">
                    <h3><?php the_sub_field('heading'); ?></h3>
                    <?php the_sub_field('content'); ?>
                    </div>
                </div>
            </div>
			<?php endwhile; ?>
        </div>
    </section>
    <!--vacature middle content-->
	<?php endif; ?>    
    
    
    <?php if( have_rows('productieleider_interested') ): ?>
     <!--vacature_content_bottom-->
    <Section class="vacature_content_bottom">
        <div class="container">
		<?php while( have_rows('productieleider_interested') ): the_row(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="vacature_content_bottom_text">
                        <h2><?php the_sub_field('heading'); ?></h2>
                        
                        <?php the_sub_field('content'); ?>
                        
                          
						
						<?php if( have_rows('button') ): ?>
								<div class="btn-group" role="group" aria-label="Basic example">
									<?php $b=1; while( have_rows('button') ): the_row(); ?>
									<?php if($b%2==1) { ?>
										<?php 
											$link = get_sub_field('link');
											if( $link ): 
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
											<button onclick="window.location.href='<?php echo esc_url( $link_url ); ?>'" class="btn1 btn-secondary" type="submit"><?php echo esc_html( $link_title ); ?></button>
										<?php endif; ?>
									<?php } else { ?>
										<?php 
											$link = get_sub_field('link');
											if( $link ): 
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
										?>
                                            <button class="btn btn-primary" type="submit">
                                                <a class="mailtoui" href="<?php echo esc_url( $link_url ); ?>"> 
                                                    <?php echo esc_html( $link_title ); ?>
                                                </a>
                                            </button>
										<?php endif; ?>
									<?php } ?>
										<!-- <button class="" type="submit">Contact opnemen</button>
										<button class="btn btn-primary" type="submit">Offerte aanvragen</button> -->
									 <?php $b++; endwhile; ?>
								</div>
							<?php endif; ?> 
							
							
                    </div>
                </div>
            </div>
			<?php endwhile; ?>
        </div>
    </Section>
     <!--vacature_content_bottom-->
	 <?php endif; ?> 
    
    
    
    
    
    
    
    
    
    
    <!--bottom color section-->
    <section class="bottom_color"></section>
    <!--bottom color section-->
	
<?php endwhile; ?>
<?php get_footer(); ?>