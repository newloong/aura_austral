<?php

namespace App;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
	public function home_items() {
		$items = [];
		$frontpage_items = get_menus('homepage');
		//$post = get_post(20);

		foreach($frontpage_items as $key=>$item) {
			$postitem = get_post($item->object_id);

			$width = 'col-6';
			switch($key) {
				case(0):
					$width = 'col-md-12';
				break;
				default:
					$width = 'col-md-6';
				break;
			}

			$thisitem = (object) array(
				'title' => $item->title,
				'image' => get_the_post_thumbnail_url( $item->object_id, 'large' ),
				'image_homeitem' => get_the_post_thumbnail_url( $item->object_id, 'homeitem' ),
				'link'  => get_permalink( $item->object_id ),
				'excerpt' => get_the_excerpt( $item->object_id ),
				'type'	=> get_post_type_name( $item->object_id ),
				'width' => $width,
				'author'=> get_the_author_meta( 'display_name',  $postitem->post_author),
				'key'	=> 'homeitem-' . $key
			);
			array_push($items, $thisitem);
		}
		return $items;
	}
}
