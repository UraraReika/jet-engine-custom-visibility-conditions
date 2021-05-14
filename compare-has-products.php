<?php

namespace Jet_Engine_CVC;

class Compare_Has_Products extends \Jet_Engine\Modules\Dynamic_Visibility\Conditions\Base {

	/**
	 * Returns condition ID
	 *
	 * @return string
	 */
	public function get_id() {
		return 'jet-ecvc-compare-has-products';
	}

	/**
	 * Returns condition name
	 *
	 * @return string
	 */
	public function get_name() {
		return __( 'Compare has Products', 'jet-engine' );
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

		$type                = ! empty( $args['type'] ) ? $args['type'] : 'show';
		$products_in_compare = [];

		if ( function_exists( 'jet_cw' ) ) {
			$products_in_compare = jet_cw()->compare_data->get_compare_list();
		}

		if ( 'hide' === $type ) {
			return empty( $products_in_compare );
		} else {
			return ! empty( $products_in_compare );
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
