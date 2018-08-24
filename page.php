<?php get_header(); ?>
<?php $options = get_option('rh_settings'); ?>

			<div id="content">

				<div id="inner-content" class="cf">

						<div id="main" class="cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<?php // HERO AREA ?>
								<?php if( has_post_thumbnail() ) : ?>
								<div class="featured-image">
									<?php the_post_thumbnail('full'); ?>
									<?php
									if( get_field('hero_text') ) {
										echo '<div class="page-title">';
										the_field('hero_text');
										echo '</div>';
									} else {
										echo '<div class="page-title">
												<h1 itemprop="headline">'.get_the_title().'</h1>
											</div>';
									}
									?>
									<div class="detail-bottom"></div>
								</div>
								<?php endif; ?>
								
								
								<?php // MAIN CONTENT ?>
								<?php if( get_the_content() ) : ?>
									<section class="entry-content wrap cf" itemprop="articleBody">
										<?php the_content(); ?>
									</section>
								<?php endif; ?>
								
								
								<?php // LOCATIONS ?>
								<?php if( is_page('about-us') ) : ?>
									<section class="locations">
										<img src="<?php echo get_template_directory_uri(); ?>/library/images/world-map.png" alt="World Map">
										<?php if( have_rows('locations') ) : while( have_rows('locations') ): the_row(); ?>
											<div class="pin<?php echo ' ' . str_replace('&', '', str_replace(' ', '-', strtolower( get_sub_field('country') ))); ?>">
												<img src="<?php echo get_template_directory_uri(); ?>/library/images/icon-pin.png" alt="<?php echo get_sub_field('country'); ?>">
												
												<div class="description cf">
													<h3><?php echo get_sub_field('country'); ?></h3>
													<?php echo the_sub_field('copy'); ?>
												</div>
											</div>
										<?php endwhile; endif; ?>
									</section>
								<?php endif; ?>
								
								
								<?php // ROLLOVERS ?>
								<?php if( have_rows('rollover_link') ): ?>
									<section class="flex rollover-wrapper cf">
									<?php while( have_rows('rollover_link') ): the_row(); ?>
										
										<div class="flex-panel rollover"
											 <?php if( get_sub_field('image') ) { echo ' style="background-image: url('.get_sub_field('image').');"'; } ?>>
											<h4><?php echo get_sub_field('title'); ?></h4>
											
											<div class="rollover-content">
												<?php if( get_sub_field('link') ) : ?>
													<a href="<?php echo get_sub_field('link'); ?>" class="btn primary-btn">More</a>
												<?php endif; ?>
												<?php if( get_sub_field('copy') ) : ?>
													<p><?php echo get_sub_field('copy'); ?></p>
												<?php endif; ?>
											</div>
										</div>
										
									<?php endwhile; ?>
									</section>
								<?php endif; ?>
								
								
								<?php // COLUMNS CONTENT ?>
								<?php if( have_rows('rows') ): ?>
									<?php while( have_rows('rows') ): the_row(); ?>
										
										<?php
										$layout = get_sub_field('layout');
										$sliderObject = get_sub_field('slider');
										$addClasses = array();
										$bgColour = '';
										if( get_sub_field('stylise_columns') ) {
											array_push($addClasses, "stylise");
										}
										if( get_sub_field('bg_colour') ) {
											array_push($addClasses, "bg-colour");
											$bgColour = ' style="background: '.get_sub_field('bg_colour').';"';
										}
								
										if( $layout === 'hide' ) {
											echo '<section class="row cf" style="display: none;">';
											echo '<div class="max-width cf">';
										} else if( $layout === 'wrap' ) {
											echo '<section class="row cf '.implode(" ", $addClasses).'"'.$bgColour.'>';
											echo '<div class="max-width cf wrap entry-content">';
										} else if( $layout === 'full' ) {
											echo '<section class="row full cf '.implode(" ", $addClasses).'"'.$bgColour.'>';
											echo '<div class="cf">';
										} else {
											echo '<section class="row cf '.implode(" ", $addClasses).'"'.$bgColour.'>';
											echo '<div class="max-width cf">';
										}
										?>
											
										<?php if( get_sub_field('title') ) : ?>
											<h2 class="row-title"><?php echo get_sub_field('title'); ?></h2>
										<?php endif; ?>

										<?php if( get_sub_field('column_size') === '1col' ) : ?>

											<div class="col-12"><?php the_sub_field('col1'); ?></div>

										<?php elseif( get_sub_field('column_size') === '2col' ) : ?>

											<div class="cf col-6">
												<?php the_sub_field('col2_a'); ?>
											</div>

											<div class="cf col-6">
												<?php the_sub_field('col2_b'); ?>
											</div>

										<?php elseif( get_sub_field('column_size') === '3col' ) : ?>

											<div class="col-4">
												<?php the_sub_field('col3_a'); ?>
											</div>

											<div class="col-4">
												<?php the_sub_field('col3_b'); ?>
											</div>

											<div class="col-4">
												<?php the_sub_field('col3_c'); ?>
											</div>

										<?php elseif( get_sub_field('column_size') === '4col' ) : ?>

											<div class="col-3">
												<?php the_sub_field('col4_a'); ?>
											</div>

											<div class="col-3">
												<?php the_sub_field('col4_b'); ?>
											</div>

											<div class="col-3">
												<?php the_sub_field('col4_c'); ?>
											</div>

											<div class="col-3">
												<?php the_sub_field('col4_d'); ?>
											</div>

										<?php endif; ?>
											
										<?php if( !$sliderObject ) { echo '</div>'; } ?>
										</section>
								
									<?php endwhile; ?>
								<?php endif; ?>
							
							
								<?php // IMAGE LINKS ?>
								<?php if( have_rows('image_links') ): ?>
								<section class="row image-links cf">
									<div class="max-width flex cf">
									<?php while( have_rows('image_links') ): the_row(); ?>
										<div class="col-4">
											<div class="main-image">
												<img src="<?php the_sub_field('main_image'); ?>" alt="<?php the_sub_field('title'); ?>">
												
												<div class="img-overlay">
													<img src="<?php the_sub_field('secondary_image'); ?>" alt="<?php the_sub_field('title'); ?>">
												</div>
											</div>
											
											<h3>
												<?php
												if( get_sub_field('link') ) {
													echo '<a href="'.get_sub_field('link').'" target="_blank">'.get_sub_field('title').'</a>';
												} else {
													echo get_sub_field('title');
												}
												?>
											</h3>
										</div>
									<?php endwhile; ?>
									</div>
								</section>
								<?php endif; ?>
							
								
								<?php // BLOG HIGHLIGHTS (IF HOME PAGE) ?>
								<?php if ( is_front_page() && ($options['case_studies_switch']) ) : ?>
									<?php query_posts( array(
										'posts_per_page' => 4
									) ); ?>
								
									<?php if ( have_posts() ) : ?>
										<section class="row blog-highlights cf">
											<div class="narrow-para">
												<h3>Our Latest News</h3>
												<?php while ( have_posts() ) : the_post(); ?>
													<div class="post-item cf">
														<?php echo '<p class="date">'.get_the_date().'</p>'; ?>
														
														<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-title">
															<?php the_title(); ?>
														</a>
													</div>
												<?php endwhile; ?>
												
												<p><a href="#"><strong>View more</strong></a></p>
											</div>
										</section>
									<?php endif; ?>
									<?php wp_reset_query(); ?>
								<?php endif; ?>
								
								
								<?php // PRE-FOOTER ?>
								<?php if( !empty(get_field('pre_footer')) ) : ?>
									<section class="pre-footer row cf">
										<div class="max-width cf wrap">
											<?php if( !empty(get_field('pre_footer_media')) ) : ?>
												<div class="col-6"><?php the_field('pre_footer_media') ?></div>
												<div class="col-6"><?php the_field('pre_footer') ?></div>
											<?php else : ?>
												<div class="col-12"><?php the_field('pre_footer') ?></div>
											<?php endif; ?>
										</div>
										
										<?php 
											if( get_field('arrow_graphic') === 'arrow1' ) {
												echo '<div class="arrow arrow1">' . file_get_contents(get_template_directory_uri() . '/library/images/svg/arrow-outline-01.svg') . '</div>';
											} elseif( get_field('arrow_graphic') === 'arrow2' ) {
												echo '<div class="arrow arrow2">' . file_get_contents(get_template_directory_uri() . '/library/images/svg/arrow-outline-02.svg') . '</div>';
											} elseif( get_field('arrow_graphic') === 'arrow3' ) {
												echo '<div class="arrow arrow3">' . file_get_contents(get_template_directory_uri() . '/library/images/svg/arrow-outline-03.svg') . '</div>';
											}
										?>
									</section>
								<?php endif; ?>

							</article>

							<?php endwhile; endif; ?>

						</div>

				</div>

			</div>

<?php get_footer(); ?>
