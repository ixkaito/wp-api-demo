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
