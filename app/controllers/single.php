<?php

namespace App;

use Sober\Controller\Controller;

class Single extends Controller
{
	public function header_image() {
		if(has_post_thumbnail()) {
			return wp_get_attachment_image_src(get_post_thumbnail_id(), 'large', false);
		}
	}
	public function visual_gallery() {
		global $post;
		$imageurls = [];
		$images = get_children( array(
			'post_parent' => $post->ID,
			'post_status' => 'inherit',
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'order' => 'ASC',
			'orderby' => 'menu_order ID' )
		);

		foreach( $images as $image ) {
			$imagedata = (object) array(
				'large' => wp_get_attachment_image_src( $image->ID, 'large' ),
				'thumbnail' => wp_get_attachment_image_src( $image->ID, 'thumbnail' ),
				'title' => $image->post_title,
				'legend' => $image->post_content 
				);
			array_push($imageurls, $imagedata);
		}
		return $imageurls;
	}
}

// add_filter('sage/template/single/data', function (array $data) {
//     $data['header_image'] = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', false);
//     return $data;
// });