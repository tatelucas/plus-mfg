<?php
/*
 * Template Name: Content Builder
 * Description: A Page Template which uses the drag and drop builder to compose content
 *
 * @package WordPress
 * @subpackage Theme
 * @since 1.0
 */
?>
<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php get_header(); ?>

<?php if ( ! empty( $meta->splash->type ) ) : ?>

	<?php if ( 'show' === $meta->splash->type ) : ?>

		<?php get_template_part( 'splash' ); ?>

	<?php endif; ?>

<?php endif; ?>

<div id="<?php $content->slug(); ?>" class="content"><?php $content->builder(); ?></div>

<?php get_footer(); ?>