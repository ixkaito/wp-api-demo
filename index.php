<?php

$url  = 'http://localhost/wordpress1/wp-json/posts/2069';
$data = slug_get_json( $url );

var_dump( $data );
