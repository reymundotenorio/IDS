<?php 
/**
 * Template Name: Contact Template
 */

get_header(); ?>

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class() ?>>

			<header class="entry-header <?php if (has_post_thumbnail()) echo "has-post-thumb"; ?>">
				<h1 class="entry-title"><?php the_title() ?></h1>
				<?php if (has_post_thumbnail()): ?>
				<figure class="post-thumb" style="background-image: url('<?php echo knacc_get_thumbnail_image_url(get_the_ID()); ?>')"></figure>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content-->
			
			<div class="contact-content">
				<?php 
					if (get_field('display_contact_form') == true && get_field('display_contact_details') == true):
						$contact_form_col_class = 'col-md-7';
						$contact_details_col_class = 'col-md-5';
					elseif (get_field('display_contact_form') == true && get_field('display_contact_details') == false):
						$contact_form_col_class = 'col-md-12';
						$contact_details_col_class = 'hidden';
					elseif (get_field('display_contact_form') == false && get_field('display_contact_details') == true):
						$contact_form_col_class = 'hidden';
						$contact_details_col_class = 'col-md-12';
					else:
						$contact_form_col_class = 'col-md-7';
						$contact_details_col_class = 'col-md-5';
					endif;
				?>
				<div class="clearfix">
					<div class="contact-form <?php echo $contact_form_col_class; ?>">
						<?php echo the_field('contact_form') ?>
					</div>
					<div class="contact-details <?php echo $contact_details_col_class; ?>">
						<ul class="contact-list">
							<?php if (get_field('phone')) 			echo '<li class="phone">' . get_field('phone') . '</li>'; ?>
							<?php if (get_field('mobile')) 			echo '<li class="mobile">' . get_field('mobile') . '</li>'; ?>
							<?php if (get_field('email')) 			echo '<li class="email"><a href="mailto:' . get_field('email') . '">' . get_field('email') . '</a></li>'; ?>
							<?php if (get_field('address_line_1') || get_field('address_line_2') || get_field('town_city') || get_field('zip_postcode') || get_field('country')): ?>
							<li class="address">
								<ul>
									<?php if (get_field('address_line_1')) 	echo '<li class="address-1">' . get_field('address_line_1') . '</li>'; ?>
									<?php if (get_field('address_line_2')) 	echo '<li class="address-2">' . get_field('address_line_2') . '</li>'; ?>
									<?php if (get_field('town_city')) 		echo '<li class="town-city">' . get_field('town_city') . '</li>'; ?>
									<?php if (get_field('state_county')) 	echo '<li class="state-county">' . get_field('state_county') . '</li>'; ?>
									<?php if (get_field('zip_postcode')) 	echo '<li class="zip-postcode">' . get_field('zip_postcode') . '</li>'; ?>
									<?php if (get_field('country')) 		echo '<li class="country">' . get_field('country') . '</li>'; ?>
								</ul>
							</li>
						<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
    		
        </article><!-- #post-<?php the_ID(); ?>-->

		<?php endwhile; endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>