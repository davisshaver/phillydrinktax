<?php
$context = Timber::get_context();

if ( is_home() ) {
	$template = 'index.twig';
}
Timber::render( array( $template ), $context, 0, TimberLoader::CACHE_NONE );
?>
