<?php
/*
* Template Name: Verzilveren Page
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
				<!--<nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Behandelingen</a></li>
                        <li class="current_breadcrumb active" aria-current="page">Verzilveren</li>
                    </ol>
                </nav> -->
			</div>
		</div>
	</section>
	<!--breadcrumb area-->

	<!--verzilveren_content-->
	<section class="verzilveren_content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="verzilveren_content_inner mb-5">
						<?php the_content(); ?>
						<?php if (have_rows('verzilveren_table')) : ?>
							<?php while (have_rows('verzilveren_table')) : the_row(); ?>
								<table class="table table-striped mb-5">
									<thead>
										<?php if (have_rows('heading')) : ?>
											<tr class="table_color">
												<?php while (have_rows('heading')) : the_row(); ?>
													<td><?php the_sub_field('text'); ?></td>
												<?php endwhile; ?>
											</tr>
										<?php endif; ?>

										<?php if (have_rows('sub_heading')) : ?>
											<tr>
												<?php while (have_rows('sub_heading')) : the_row(); ?>
													<th><?php the_sub_field('text'); ?></th>
												<?php endwhile; ?>
											</tr>
										<?php endif; ?>
									</thead>
									<?php if (have_rows('content')) : ?>
										<tbody>
											<?php while (have_rows('content')) : the_row(); ?>
												<tr>
													<?php while (have_rows('blog')) : the_row(); ?>
														<td><?php the_sub_field('text'); ?></td>
													<?php endwhile; ?>
												</tr>
											<?php endwhile; ?>
										</tbody>
									<?php endif; ?>
								</table>
							<?php endwhile; ?>
						<?php endif; ?>

						<?php the_field('verzilveren_content'); ?>

						<?php if (have_rows('verzilveren_sub_table')) : ?>
							<?php while (have_rows('verzilveren_sub_table')) : the_row(); ?>
								<table class="table table-borderless">
									<thead>
										<?php if (have_rows('heading')) : ?>
											<tr>
												<?php while (have_rows('heading')) : the_row(); ?>
													<th class="p-1"><?php the_sub_field('text'); ?></th>
												<?php endwhile; ?>
											</tr>
										<?php endif; ?>
									</thead>

									<?php if (have_rows('blog')) : ?>
										<tbody>
											<?php while (have_rows('blog')) : the_row(); ?>
												<tr>
													<?php while (have_rows('content')) : the_row(); ?>
														<td class="p-1"><?php the_sub_field('text'); ?></td>
													<?php endwhile; ?>
												</tr>
											<?php endwhile; ?>
										</tbody>
									<?php endif; ?>
								</table>
							<?php endwhile; ?>
						<?php endif; ?>

						<?php the_field('verzilveren_sub_content'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--verzilveren_content-->

	<?php if (have_rows('verzilveren_cashing')) : ?>
		<!--verzilveren_content_middle-->
		<section class="verzilveren_content_middle mb-5">
			<div class="container">
				<?php while (have_rows('verzilveren_cashing')) : the_row(); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="verzilveren_content_middle_text">
								<div class="row">
									<div class="col-md-5">
										<?php
										$image = get_sub_field('image');
										if (!empty($image)) : ?>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />
										<?php endif; ?>
									</div>

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
											<a class="text-danger" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</section>
		<!--verzilveren_content_middle-->
	<?php endif; ?>

	<!--verzilveren_content_bottom-->
	<?php if (have_rows('verzilveren_contact')) : ?>
		<Section class="verzilveren_content_bottom">
			<div class="container">
				<?php while (have_rows('verzilveren_contact')) : the_row(); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="verzilveren_content_bottom_text">
								<h2><?php the_sub_field('heading'); ?></h2>



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
				<?php endwhile; ?>
			</div>
		</Section>
		<!--verzilveren_content_bottom-->
	<?php endif; ?>

	<!--bottom color section-->
	<section class="bottom_color"></section>
	<!--bottom color section-->

<?php endwhile; ?>
<?php get_footer(); ?>