<?php

namespace App;

use Sober\Controller\Controller;

class SingleEdiciones extends Controller
{
	public function contenidos_edicion() {
		global $post;
		$args = array(
			'post_type' => 'any',
			'numberposts' => -1,
		);
		$args['meta_query'] = array(
			array(
				'key' => '_aau_edicion',
				'value' => $post->ID
			));
		$contenidos = get_posts($args);

		$items = [];

		if($contenidos) {
			foreach($contenidos as $contenido) {
				$item = (object) array(
					'title' => $contenido->post_title,
					'image' => get_the_post_thumbnail_url( $contenido->ID, 'medium' ),
					'link'  => get_permalink( $contenido->ID ),
					'type'	=> get_post_type_name( $contenido->ID ),
					'width' => ''
				);
				array_push($items, $item);
			}
		}

		return $items;
	}
}
