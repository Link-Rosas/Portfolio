<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ryancv
 */

?>

<?php
	$info = get_field( 'info' );
	$type = get_field( 'portfolio_type' );
	$btn_url = get_field( 'button_url' );

	/*get tags*/
	$term_list = get_the_terms($post->ID, 'portfolio_tags');
?>

<!-- title -->
<h1 class="title">
	<?php the_title(); ?>
</h1>

<!-- content -->
<div class="row border-line-v">
	<div class="col col-m-12 col-t-12 col-d-12">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( $info ) : ?>
			<div class="info-list">
				<ul>
					<?php foreach ( $info as $item ) { ?>
					<li><strong><?php echo esc_html( $item['label'] ); ?><?php echo esc_html__( ':', 'ryancv' ); ?></strong> <?php echo esc_html( $item['value'] ); ?></li>
					<?php } ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php if ( $btn_url ) : ?>
				<a href="<?php echo esc_url( $btn_url ); ?>" class="lnk">
					<span class="text"><?php echo esc_html__( 'See Demo', 'ryancv' ); ?></span>
					<span class="arrow"></span>
				</a>
			<?php endif; ?>

			<div class="post-box single-post-text">
				<!-- blog content -->
				<div class="blog-content">
					<?php 
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ryancv' ),
							'after'  => '</div>',
						) );
					?>
				</div>

				<div class="post-text-bottom">
					<?php if ( $term_list ) : ?>
					<div class="tags-links">
						<?php echo esc_html__( 'Tags:', 'ryancv' ); ?>
						<?php foreach ( $term_list as $tags ) : ?>
							<a href="<?php echo get_term_link( $tags->term_id ); ?>" rel="tag"><?php echo esc_html( $tags->name ); ?></a>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
					<?php ryancv_entry_footer(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
