<?php

$args = array(
	'filter[posts_per_page]' => 20,
	'filter[orderby]'        => 'title',
	'filter[order]'          => 'ASC'
);
$url  = add_query_arg( $args, 'http://localhost/wordpress1/wp-json/posts' );
$data = slug_get_json( $url );

foreach ($data as $key => $post) {
	echo $post->title . '<br />';
}
