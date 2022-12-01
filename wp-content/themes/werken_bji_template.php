<?php
/*
* Template Name: Werken bij Page
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
                        <li class="breadcrumb-item"><a href="#">Over Galvano</a></li>
                        <li class="current_breadcrumb active" aria-current="page">Werken bij</li>
                    </ol>
                </nav> -->
			</div>
		</div>
	</section>
	<!--breadcrumb area-->

	<!--blog overzicht-->
	<section class="werken_bij">
		<div class="container">
			<div class="werken_bij_text">
				<div class="row">
					<div class="col-md-12">
						<?php the_content(); ?>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!--blog overzicht-->

	<?php if (have_rows('werken_bij_content')) : ?>
		<?php $t = 1;
		while (have_rows('werken_bij_content')) : the_row(); ?>
			<?php if ($t % 2 == 1) { ?>
				<!--blog_colored-->
				<section class="colored">
					<div class="container">
						<div class="colored_text pt-5 pb-5">
							<div class="row">
								<div class="col-md-7">
									<h3><?php the_sub_field('heading'); ?></h3>
									<?php the_sub_field('content'); ?>
									<?php
									$link = get_sub_field('link');
									if ($link) :
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<button onclick="window.location.href='<?php echo esc_url($link_url); ?>'" class="btn btn-primary" type="submit"><?php echo esc_html($link_title); ?></button>
									<?php endif; ?>
								</div>
								<?php
								$image = get_sub_field('image');
								if (!empty($image)) : ?>
									<div class="col-md-5">
										<div class="colored_img">
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</section>
				<!--blog_colored-->
			<?php } else { ?>

				<!--blog_white-->
				<section class="colorwhite">
					<div class="container">
						<div class="colorwhite_text pt-5 pb-5">
							<div class="row">
								<div class="col-md-7">
									<h3><?php the_sub_field('heading'); ?></h3>
									<?php the_sub_field('content'); ?>
									<?php
									$link = get_sub_field('link');
									if ($link) :
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<button onclick="window.location.href='<?php echo esc_url($link_url); ?>'" class="btn btn-primary" type="submit"><?php echo esc_html($link_title); ?></button>
									<?php endif; ?>
								</div>
								<?php
								$image = get_sub_field('image');
								if (!empty($image)) : ?>
									<div class="col-md-5">
										<div class="colorwhite_img">
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</section>
				<!--blog_white-->
			<?php } ?>
		<?php $t++;
		endwhile; ?>
	<?php endif; ?>

	<!--bottom color section-->
	<section class="bottom_color"></section>
	<!--bottom color section-->
<?php endwhile; ?>
<?php get_footer(); ?>