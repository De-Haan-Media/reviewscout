<?php
/*
* Template Name: Markten Page
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
				<!--
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Markten</li>
                    </ol>
                </nav> -->
			</div>
		</div>
	</section>
	<!--breadcrumb area-->

	<!--blog overzicht-->
	<section class="markt_template">
		<div class="container">
			<div class="markt_template_text">
				<div class="row">
					<div class="col-md-12">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--blog overzicht-->
	<?php if (have_rows('markten_block')) : ?>
		<?php $j = 1;
		while (have_rows('markten_block')) : the_row(); ?>
			<!--blog_white-->
			<?php if ($j % 2 == 1) { ?>
				<section class="colorwhite">
					<span id="section<?php echo $j; ?>"></span>
					<div class="container">
						<div class="colorwhite_text pt-5 pb-5">
							<div class="row">
								<div class="col-md-6">
									<div class="colorwhite_img">
										<?php
										$image = get_sub_field('image');
										if (!empty($image)) : ?>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-6">
									<h3><?php the_sub_field('heading'); ?></h3>
									<em><?php the_sub_field('sub_heading'); ?></em>
									<?php the_sub_field('content'); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!--blog_white-->
			<?php } else { ?>
				<!--blog_colored-->
				<section class="colored">
					<span id="section<?php echo $j; ?>"></span>
					<div class="container">
						<div class="colored_text pt-5 pb-5">
							<div class="row">
								<div class="col-md-6">
									<div class="colored_img">
										<?php
										$image = get_sub_field('image');
										if (!empty($image)) : ?>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
										<?php endif; ?>
									</div>
								</div>
								<div class="col-md-6">
									<h3><?php the_sub_field('heading'); ?></h3>
									<em><?php the_sub_field('sub_heading'); ?></em>
									<?php the_sub_field('content'); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!--blog_colored-->
			<?php } ?>
		<?php $j++;
		endwhile; ?>
	<?php endif; ?>

	<?php if (have_rows('markten_contact')) : ?>
		<?php while (have_rows('markten_contact')) : the_row(); ?>

			<!--verzilveren_content_bottom-->
			<Section class="verzilveren_content_bottom mt-5 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="verzilveren_content_bottom_text">
								<h3><?php the_sub_field('heading'); ?></h3>
								<?php if (have_rows('button')) : ?>
									<div class="btn-group" role="group" aria-label="Basic example">
										<?php $b = 1;
										while (have_rows('button')) : the_row(); ?>
											<?php if ($b % 2 == 1) { ?>
												<?php
												$link = get_sub_field('link');
												if ($link) :
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<button onclick="window.location.href='<?php echo esc_url($link_url); ?>'" class="btn1 btn-secondary" type="submit"><?php echo esc_html($link_title); ?></button>
												<?php endif; ?>
											<?php } else { ?>
												<?php
												$link = get_sub_field('link');
												if ($link) :
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<button onclick="window.location.href='<?php echo esc_url($link_url); ?>'" class="btn btn-primary" type="submit"><?php echo esc_html($link_title); ?></button>
												<?php endif; ?>
											<?php } ?>
											<!-- <button class="" type="submit">Contact opnemen</button>
										<button class="btn btn-primary" type="submit">Offerte aanvragen</button> -->
										<?php $b++;
										endwhile; ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</Section>
			<!--verzilveren_content_bottom-->
		<?php endwhile; ?>
	<?php endif; ?>

	<!--bottom color section-->
	<section class="bottom_color"></section>
	<!--bottom color section-->

<?php endwhile; ?>
<?php get_footer(); ?>