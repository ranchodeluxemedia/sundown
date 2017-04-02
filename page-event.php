<?php
/*
 Template Name: Event Page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">
						<header class="event-page-header inset-outline-invert">
							<h2>Upcoming Events</h2>
						</header>
				<div id="inner-content" class="wrap row cf">

						<main id="main" class="col-md-12 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
							<table class="event-table">
								<thead>
								    <tr>
								      <th scope="col"></th>
								      <th scope="col"></th>
								      <!-- <th scope="col"></th> -->
								    </tr>
								  </thead>
								<tbody>
							<?php 
								$time = current_time('timestamp' );
								$args = array(
									'post_type' => 'event',
									'post_status' => 'publish',
									'orderby' => 'meta_value',
									'meta_key' => 'event_date',
									'meta_value' => $time,
									'meta_compare' => '>=',
									'order' => 'ASC',
									'posts_per_page' => 10,
								);

								$query  = new WP_Query( $args );
								if ( $query->have_posts() ) :
								while ( $query->have_posts() ) : $query->the_post();
							?>
									<tr>
										<td><div class="event-thumb"><?php the_post_thumbnail('bones-event-thumb'); ?></div></td>
										<?php $date = new DateTime(get_field('event_date')); ?>
										<td><span class="h3"><?php echo $date->format('d F') . " - " . get_the_title(); ?></span><br>
											<span class="event-excerpt"><?php the_excerpt(); ?></span>
										</td>
										<!-- <td><a href="<?php //the_permalink(); ?>">View Event</a></td>   -->
									</tr>
							<?php
										wp_reset_postdata();
										endwhile;
										endif; // end Loop ?>

								</tbody>
							</table>
						</main>

				</div>

			</div>


<?php get_footer(); ?>
