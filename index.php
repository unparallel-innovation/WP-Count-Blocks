<?php
/**
 * Plugin Name:       WP Dynamic Blocks
 * Description:       Display content in Wordpress with dynamic blocks
 * Version:           1.0.0
 * Author:            UNPARALLEL Innovation, Lda
 * Author URI:        https://www.unparallel.pt
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 */

add_filter( 'block_categories_all' , function( $categories ) {

    // Adding a new category.
	$categories[] = array(
		'slug'  => 'dynamic-blocks',
		'title' => 'Dynamic Blocks'
	);

	return $categories;
} );

require_once  __DIR__ . '/iotcat-statistic-card.php';
