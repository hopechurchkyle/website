<?php
/**
 * @package   Gantry 5 Theme
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2015 RocketTheme, LLC
 * @license   GNU/GPLv2 and later
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') or die;

use Timber\Timber;

/*
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */

$gantry = Gantry\Framework\Gantry::instance();
$theme  = $gantry['theme'];

// We need to render contents of <head> before plugin content gets added.
$context              = Timber::get_context();
$context['page_head'] = $theme->render('partials/page_head.html.twig', $context);

$templates = ['archive.html.twig', 'index.html.twig'];

$context['title'] = __('Archive', 'wpfc-multiply');
if (is_tag()) {
    $context['title'] = single_tag_title('', false);
    $context['description'] = tag_description();
    array_unshift($templates, 'archive-' . get_query_var('tag') . '.html.twig');
} else if (is_category()) {
    $context['title'] = single_cat_title('', false);
    $context['description'] = category_description();
    array_unshift($templates, 'archive-' . get_query_var('cat') . '.html.twig');
} else if (is_post_type_archive()) {
    $context['title'] = post_type_archive_title('', false);
    array_unshift($templates, 'archive-' . get_post_type() . '.html.twig');

} else if ( is_tax( 'wpfc_sermon_series' ) ) {
	$context['title'] = single_cat_title( '', false );
	$context['description'] = category_description();
	$context['taxonomy']   = 'wpfc_sermon_series';
	array_unshift( $templates, 'archive-wpfc_sermon.html.twig' );
} else if ( is_tax( 'wpfc_sermon_topics' ) ) {
	$context['title'] = single_cat_title( '', false );
	$context['description'] = category_description();
	$context['taxonomy']   = 'wpfc_sermon_topics';
	array_unshift( $templates, 'archive-wpfc_sermon.html.twig' );
} else if ( is_tax( 'wpfc_bible_book' ) ) {
	$context['title'] = single_cat_title( '', false );
	$context['description'] = category_description();
	$context['taxonomy']   = 'wpfc_bible_book';
	array_unshift( $templates, 'archive-wpfc_sermon.html.twig' );
} else if ( is_tax( 'wpfc_service_type' ) ) {
	$context['title'] = single_cat_title( '', false );
	$context['description'] = category_description();
	$context['taxonomy']   = 'wpfc_service_type';
	array_unshift( $templates, 'archive-wpfc_sermon.html.twig' );
} else if ( is_tax( 'wpfc_preacher' ) ) {
	$context['title'] = single_cat_title( '', false );
	$context['description'] = category_description();
	$context['taxonomy']   = 'wpfc_preacher';
	array_unshift( $templates, 'archive-wpfc_sermon.html.twig' );
}

$context['posts'] = Timber::get_posts();

Timber::render($templates, $context);
