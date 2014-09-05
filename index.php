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
$url      = slug_api_posts_url_string( $post_types, $filters );
$data     = slug_get_json( $url );

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>WP API Demo</title>
</head>
<body>

<?php if ( is_array( $data ) && count( $data ) > 0 ) : ?>
	<?php foreach ( $data as $key => $post ) : ?>
		<article id="post-<?php echo esc_attr( $post->ID ); ?>">
			<header>
				<h1><?php echo esc_html( $post->title ); ?></h1>
			</header>
			<div class="entry-content">
				<?php echo wpautop( $post->content ); ?>
			</div>
		</article>
	<?php endforeach; ?>
<?php endif; ?>

</body>
</html>