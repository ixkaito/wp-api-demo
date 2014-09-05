<?php

$filters = array(
	'posts_per_page' => 20,
	'orderby'        => 'modified_gmt',
	'offset'         => 10
);
$post_types = array(
	'post',
	'page'
);
$home_url = 'http://localhost/wordpress1';
$url      = slug_api_posts_url_string( $post_types, $filters, $home_url );

$data = slug_get_json( $url );

foreach ($data as $key => $post) {
	echo $post->title . '<br />';
}
