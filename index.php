<?php
/**
 * Plugin Name:       WP Count Blocks
 * Description:       Display content in Wordpress with count blocks
 * Version:           1.0.0
 * Author:            UNPARALLEL Innovation, Lda
 * Author URI:        https://www.unparallel.pt
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 */

add_filter( 'block_categories_all' , function( $categories ) {

    // Adding a new category.
	$categories[] = array(
		'slug'  => 'count-blocks',
		'title' => 'Count Blocks'
	);

	return $categories;
} );

require_once  __DIR__ . '/iotcat-statistic-card.php';
