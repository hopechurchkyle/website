<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();

// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>

<div class="g-grid wpfc-events-view">
	<?php if ( tribe_get_cost() ) : ?><span
		class="wpfc-events-view-cost"><?php echo tribe_get_cost( null, true ); ?></span><?php endif; ?>

	<div class="g-block size-40 wpfc-events-block-image">
		<?php echo tribe_event_featured_image( null, 'medium' ) ?>
	</div>

	<div class="g-block size-60 wpfc-events-block-content">
		<div class="g-content">

			<!-- Event Title And Description -->
			<div class="wpfc-tribe-events-content">
				<!-- Event Title -->
				<?php do_action( 'tribe_events_before_the_event_title' ) ?>
				<h3 class="tribe-events-list-event-title">
					<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>"
					   title="<?php the_title_attribute() ?>" rel="bookmark">
						<?php the_title() ?>
					</a>
				</h3>
				<?php do_action( 'tribe_events_after_the_event_title' ) ?>

				<!-- Event Content -->
				<?php do_action( 'tribe_events_before_the_content' ) ?>
				<div class="tribe-events-list-event-description tribe-events-content">
					<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
				</div><!-- .tribe-events-list-event-description -->
				<?php do_action( 'tribe_events_after_the_content' ); ?>
			</div>

			<!-- Event Meta -->
			<?php do_action( 'tribe_events_before_the_meta' ) ?>

			<div class="wpfc-tribe-events-meta">
				<div class="wpfc-tribe-events-date"><span>Date:</span> <?php echo tribe_events_event_schedule_details() ?>
				</div>
				<div class="wpfc-tribe-events-details"><?php echo implode( ', ', $venue_details ); ?></div>
			</div>

			<?php do_action( 'tribe_events_after_the_meta' ) ?>

		</div>
	</div>

</div>