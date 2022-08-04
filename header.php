<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/assets/css/custom.min.css">
<?php astra_head_bottom(); ?>
<?php  
$terms = get_terms([
  'taxonomy' => 'category',
  'hide_empty' => false,
]);
if($terms) { ?>
<style type="text/css">
  <?php foreach($terms as $term) {
  $term_slug = $term->slug;
  $color = (get_field('term_color', $term)) ? get_field('term_color', $term) : '#64B7D1'; 
  ?>
  .uael-post__body .uael-post-wrapper.<?php echo $term_slug ?> .uael-post__terms-wrap span.uael-post__terms {
    background-color: <?php echo $color ?>!important;
  }
  <?php } ?>
</style>
<?php
}
?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content"
	role="link"
	title="<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div id="car-icon" class="animate__animated"></div>
<div id="car-lines-1"></div>
<div id="car-lines-2"><span></span></div>


<div
<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<?php
	astra_header_before();

	astra_header();

	astra_header_after();

	astra_content_before();
	?>
	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>
