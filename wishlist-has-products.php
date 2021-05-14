<?php

namespace Jet_Engine_CVC;

class Wishlist_Has_Products extends \Jet_Engine\Modules\Dynamic_Visibility\Conditions\Base {

	/**
	 * Returns condition ID
	 *
	 * @return string
	 */
	public function get_id() {
		return 'jet-ecvc-wishlist-has-products';
	}

	/**
	 * Returns condition name
	 *
	 * @return string
	 */
	public function get_name() {
		return __( 'Wishlist has Products', 'jet-engine' );
	}

	/**
	 * Returns group for current operator
	 *
	 * @return [type] [description]
	 */
	public function get_group() {
		return 'posts';
	}

	/**
	 * Check condition by passed arguments
	 *
	 * @param array $args
	 *
	 * @return bool
	 */
	public function check( $args = array() ) {

		$type                 = ! empty( $args['type'] ) ? $args['type'] : 'show';
		$products_in_wishlist = [];

		if ( function_exists( 'jet_cw' ) ) {
			$products_in_wishlist = jet_cw()->wishlist_data->get_wish_list();
		}

		if ( 'hide' === $type ) {
			return empty( $products_in_wishlist );
		} else {
			return ! empty( $products_in_wishlist );
		}

	}

	/**
	 * Check if is condition available for meta fields control
	 *
	 * @return boolean
	 */
	public function is_for_fields() {
		return false;
	}

	/**
	 * Check if is condition available for meta value control
	 *
	 * @return boolean
	 */
	public function need_value_detect() {
		return false;
	}

}
