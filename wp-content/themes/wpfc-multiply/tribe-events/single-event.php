<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

$gantry = Gantry\Framework\Gantry::instance();
$events_featured_image_enabled = $gantry['config']->get('content.event.featured-image.enabled');

?>

<div class="wpfc-single-tribe-events">

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<div class="g-grid">

		<div class="g-block size-70 wpfc-tribe-event-main">
			<div class="g-content">
				<?php if ($events_featured_image_enabled) : ?>
				    <?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
				<?php endif; ?>
				<?php the_title( '<h2 class="tribe-events-single-event-title">', '</h2>' ); ?>

				<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
				<div class="wpfc-tribe-event-content"><?php the_content(); ?></div>
				<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

				<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>

				<!-- Event footer -->
				<div id="tribe-events-footer">
					<!-- Navigation -->
					<h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
					<ul class="tribe-events-sub-nav">
						<li class="tribe-events-nav-previous"><?php tribe_the_prev_event_link( '<span>&laquo;</span> %title%' ) ?></li>
						<li class="tribe-events-nav-next"><?php tribe_the_next_event_link( '%title% <span>&raquo;</span>' ) ?></li>
					</ul>
					<!-- .tribe-events-sub-nav -->
				</div>
				<!-- #tribe-events-footer -->

			</div>
		</div>

		<div class="g-block size-30 wpfc-tribe-event-sidebar">
			<div class="g-content">
				<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>

				<?php tribe_get_template_part( 'modules/meta/details' ); ?>
				<?php tribe_get_template_part( 'modules/meta/organizer' ); ?>
				<?php tribe_get_template_part( 'modules/meta/venue' ); ?>
				<?php tribe_get_template_part( 'modules/meta/map' ); ?>

				<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			</div>
		</div>

	</div>

</div>