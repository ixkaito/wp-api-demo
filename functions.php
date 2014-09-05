<?php

function slug_get_json( $url ) {
	//GET the remote site
	$response = wp_remote_get( $url );

	//Check for error
	if ( is_wp_error( $response ) ) {
		return sprintf( 'The URL %1s could not be retrieved.', $url );
	}

	//get just the body
	$data = wp_remote_retrieve_body( $response );

	//return if not an error
	if ( ! is_wp_error( $data )  ) {

		//decode and return
		return json_decode( $data );

	}

}

function slug_api_posts_url_string( $post_types = 'post', $filters = false, $home_url = 'home_url', $base = '/wp-json/posts?' ) {
	if ( is_callable( $home_url ) ) {
		$url = call_user_func( $home_url );
		$url = $url . $base;
	} else {
		$url = $home_url . $base;
	}

	if ( is_string( $post_types ) ) {
		$post_types = array( $post_types );
	}
	foreach ( $post_types as $type ) {
		$url = add_query_arg( "type[]", $type, $url  );
	}

	if ( $filters ) {

		foreach( $filters as $filter => $value ) {
			$args[ "filter[{$filter}]" ] =  $value;
		}
		$url = add_query_arg( $args, $url );
	}

	return $url;
}
