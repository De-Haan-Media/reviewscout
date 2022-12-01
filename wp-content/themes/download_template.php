<?php 
/*
* Template Name: Download Page
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
                        <li class="breadcrumb-item"><a href="#">Kennis & Inspiratie</a></li>
                        <li class="current_breadcrumb active" aria-current="page">Downloads</li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </section>
    <!--breadcrumb area-->
    
    <!--downloads content-->
    <section class="download_content">
        <div class="container">
            <div class="col-md-12">
                <div class="download_content_text">
                    <h1 class="pb-0"><?php the_title(); ?></h1>
                    
                </div>
            </div>
        </div>
    <!--downloads content-->

    <?php if( have_rows('download_category') ): 
        $download_categories = get_field('download_category');
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-3">
                       <div class="accordion md-accordion" style="max-width: 720px;margin: 0 auto;">
                            <?php 
                                foreach( $download_categories as $download_category ): 
                                $category_title = $download_category['titel'];
                                $category_items = $download_category['items'];
                            ?>
                                <?php if($category_items) : ?>
                                    <div class="download-category">
                                        <h2 class="pb-1 download-category__title">
                                            <?= $category_title; ?>
                                        </h2>
                                        <div class="download-group">
                                            <?php foreach( $category_items as  $category_item ): ?>
                                                <div class="card">
                                                <!-- Card header -->
                                                    <div class="card-header">
                                                        <a class="collapsed" data-toggle="collapse" target="_blank" download href="<?= $category_item['link']; ?>">
                                                            <h3>
                                                                <a target="_blank" download href="<?= $category_item['link']; ?>">
                                                                    <i class="fa fa-file-<?= $category_item['icon']; ?>-o mr-1"></i>
                                                                    <span><?= $category_item['title']; ?></span>
                                                                    <i class="fa fa-download rotate-icon"></i>
                                                                </a>
                                                            </h3>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                       </div>
                    </div>
                </div>
            </div>
        </div>
	<?php endif; ?>    
    </section>
    
    <!--bottom color section-->
    <section class="bottom_color"></section>
    <!--bottom color section-->
	
<?php endwhile; ?>
<?php get_footer(); ?>