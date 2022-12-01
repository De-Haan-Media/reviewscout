<?php

/**
 * Template Name: Markten Sub Page
 */

get_header();
?>
<?php while (have_posts()) : the_post(); ?>
	<!--top color section-->
	<section class="top_color"></section>
	<!--top color section-->

	<!--breadcrumb area-->
	<section class="breadcrumb pt-2">
		<div class="container">
			<div class="row">
				<?php
				if (function_exists('yoast_breadcrumb')) {
					yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
				}
				?>
				<!-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Kennis & Inspiratie</a></li>
                        <li class="current_breadcrumb active" aria-current="page"><a href="#">Nieuws</a></li>
                        <li class="current_breadcrumb active" aria-current="page">Alternatief voor dikke zinklaag</li>
                    </ol>
                </nav>
				-->
			</div>
		</div>
	</section>
	<!--breadcrumb area-->

	<!--blog inner-->
	<section class="blog_inner">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="blog_inner_content">
						<?php the_content(); ?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<!--blog inner-->
	<?php
	$image = get_field('blog_post_image');
	if (!empty($image)) : ?>
		<!--blog_inner_middle-->
		<section class="blog_inner_middle">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="blog_inner_middle_img">
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--blog_inner_middle-->
	<?php endif; ?>

	<?php if (have_rows('blog_post_content')) : ?>
		<?php while (have_rows('blog_post_content')) : the_row(); ?>
			<!--blog_inner_bottom-->
			<section class="blog_inner_bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="blog_inner_bottom_text">
								<h3> <?php the_sub_field('heading'); ?></h3>
								<?php the_sub_field('content'); ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--blog_inner_bottom-->
		<?php endwhile; ?>
	<?php endif; ?>

	<!--bottom color section-->
	<section class="bottom_color"></section>
	<!--bottom color section-->



<?php endwhile; ?>

<?php
get_footer();
