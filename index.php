<?php

$json = wp_remote_get( 'http://localhost/wordpress1/wp-json/posts/2069');

var_dump( $json );
