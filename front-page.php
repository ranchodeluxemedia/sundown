<?php get_header(); ?>
			<div id="slider" class="inset-outline-invert">
					<div class="slider_widget inset-outline">
						<!-- <h3 class="widgettitle">Monday's Special</h3>
						<p class="special-description">Cowboy burger cooked to order, with cheddar cheese, house-made barbecue sauce, and fried jalepenos and oinions. <br> Served with your choice of side.</p>
						<hr>
						<p class="special-price"><a href="#menu" class="featured-link">See Our Menu</a></p> -->
					
					<?php
					$now = new DateTime();
					$today  = $now->format('N');
					$todayPretty = $now->format('l');
					$loop = new WP_Query( 
						array(
							'post_type'=>'specials',
							// 'posts_per_page' => 1,
							'meta_key' => 'specials_day_of_week',
							'meta_value' => $today,
						));
					?>

					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<?php $day_of_week = get_field_object('specials_day_of_week');
									$dow_value = $day_of_week['value'];
									$dow_label = $day_of_week['choices'][$dow_value]; ?>
						<h3 class="widgettitle"><?php echo $dow_label; ?>'s Special</h3>
						<p class="special-description"><?php the_title(); ?> <?php the_content(); ?></p>
						<p class="special-price"><?php the_field('specials_price') ?></p>

					<?php
						endwhile;
						wp_reset_postdata();
					?>
					</div>
			</div>
			<div id="content">

				<div id="about-section" class="inset-outline">
					<div class="about-info">
						<h3>Our Story</h3>
						<p>Located in the heart of downtown Ruston, Louisiana, Sundown Tavern has been a staple of the community for over 40 years. </p>
						<hr>
						<a href="/our-story" class="featured-link">Read Our Story</a>
					</div>
				</div>

				<div id="menu">
					<div class="menu-container">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/sandwich1-800px.jpg" alt="" class="menu-image">
						<div class="overlay">
							<span><a href="#">Lunch</a></span>
						</div>
					</div>
					<div class="menu-container">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/burger-800px.jpg" alt="" class="menu-image">
						<div class="overlay">
							<span><a href="#">Dinner</a></span>
						</div>
					</div>
					<div class="menu-container">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/grbeer-800px.jpg" alt="" class="menu-image">
						<div class="overlay">
							<span><a href="#">Taps</a></span>
						</div>
					</div>
					<div class="menu-container">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/well1-800.jpg" alt="" class="menu-image">
						<div class="overlay">
							<span><a href="#">Well</a></span>
						</div>
					</div>
				</div>

			</div>

<?php get_footer(); ?>