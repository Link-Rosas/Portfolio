<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ryancv
 */

?>

<?php

$blog_cols = get_field( 'blog_cols', 'option' );
$blog_categories = get_field( 'blog_categories', 'option' );
$blog_excerpt = get_field( 'blog_excerpt', 'option' );
$blog_excerpt_full = get_field( 'blog_excerpt_full', 'option' );
$blog_cols_class = 'col-d-6 col-t-6 col-m-12';
if ( $blog_cols ) {
	$blog_cols_class = 'col-d-12 col-t-12 col-m-12';
}

$current_categories = get_the_terms( get_the_ID(), 'category' );
$category = '';
$category_slug = '';
if ( $current_categories && ! is_wp_error( $current_categories ) ) {
	$arr_keys = array_keys( $current_categories );
	$last_key = end( $arr_keys );
	foreach ( $current_categories as $key => $value ) {
		if ( $key == $last_key ) {
			$category .= $value->name . ' ';
		} else {
			$category .= $value->name . ', ';
		}
		$category_slug .= 'bf-' . $value->slug . ' ';
	}
}

?>

<!-- blog item -->
<div class="col <?php echo esc_attr( $blog_cols_class ); ?> grid-item <?php echo esc_attr( $category_slug ); ?>">
	<div class="box-item">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="image">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php ryancv_post_thumbnail(); ?></a>
			</div>
			<div class="desc">
				<?php if ( 'post' === get_post_type() ) : ?>
					<a href="<?php echo esc_url( get_permalink() ); ?>">
						<span class="date">
							<?php echo esc_html( get_the_date() ); ?>
						</span>
					</a>
				<?php endif; ?>

				<a href="<?php echo esc_url( get_permalink() ); ?>" class="name"><?php the_title(); ?></a>

				<?php if( $blog_categories ) : ?>
				<div class="category">
					<?php
					$categories_list = get_the_category();
					if ( $categories_list ) {
						foreach ( $categories_list as $category ) {
							echo '<span class="category-name">' . esc_html( $category->cat_name ) . '</span>';
						}
					}
					?>
				</div>
				<?php endif; ?>

				<?php if ( ! $blog_excerpt ) : ?>
				<div class="text<?php if ( $blog_excerpt_full ) : ?> text-full-content<?php endif; ?>">
					<?php 
						if ( $blog_excerpt_full ) { 
							the_content();
						} else {
							the_excerpt();
						}
					?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
