<?php

$json = wp_remote_get( 'http://localhost/wordpress1/wp-json/posts/2069');
$data = wp_remote_retrieve_body( $json );

echo $data;
