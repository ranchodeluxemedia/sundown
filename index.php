<?php 
/**
 *
 * Template Name: Front Page
 *
 */

get_header(); ?>

			<div id="content">

			<header class="events-page-header inset-outline-invert">
				
			</header>

				<div id="inner-content" class="wrap row cf">

						<main id="main" class="col-md-12 main cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

							<?php // get posts
										$today = date("Ymd");
										$posts = get_posts(array(
											'posts_per_page' => -1,
											'meta_key'	 => 'event_date',
											'orderby' => 'meta_value_num',
											'order' => 'ASC',
											'meta_query' => array(
												'key' => 'event_date',
												'compare' => '>=',
												'value' => $today,
											)
										));

									if ( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>

							<div class="row">
								<div class="event-wrapper">
									<?php $date = new DateTime(get_field('event_date'));
												date_default_timezone_set("America/Chicago");
												$day = $date->format('d');
												$full_date = $date->format('D n/j');
												$norm_date = $date->format('m/d/Y');
												$print_date = $date->format('l, F jS, Y');
												$month = $date->format('F');
												$time = $date->format('h:iA'); ?>
									<div class="event-content">
										<span class="event-date"><?php echo $norm_date; //the_field('event_date'); ?></span>
										<span class="event-title"><?php the_title(); ?></span>
										<span class="event-cover"><?php //the_field('event_cover'); ?><a href="<?php the_permalink(); ?>">More Info</a></span>
									</div>
								</div>
							</div>

							<?php endforeach; ?>
					
							<?php endif; ?>


						</main>

				</div>

			</div>


<?php get_footer(); ?>
