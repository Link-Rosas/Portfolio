<?php
/**
 * Skin
 */
if ( ! function_exists( 'ryancv_hexToRgb' ) ) {
  function ryancv_hexToRgb( $hex ) {
  	$hex = str_replace( '#', '', $hex );
  	$length = strlen( $hex );
  	$rgb['r'] = hexdec( $length == 6 ? substr( $hex, 0, 2 ) : ( $length == 3 ? str_repeat( substr( $hex, 0, 1), 2) : 0 ) );
  	$rgb['g'] = hexdec( $length == 6 ? substr( $hex, 2, 2 ) : ( $length == 3 ? str_repeat( substr( $hex, 1, 1), 2) : 0 ) );
  	$rgb['b'] = hexdec( $length == 6 ? substr( $hex, 4, 2 ) : ( $length == 3 ? str_repeat( substr( $hex, 2, 1), 2) : 0 ) );

  	return implode( ", ", $rgb );
  }
}

if ( ! function_exists( 'ryancv_skin' ) ) {

function ryancv_skin() {
	$theme_container_width = get_field( 'theme_container_width', 'options' );
	$theme_container_height = get_field( 'theme_container_height', 'options' );
	$theme_bg = get_field( 'theme_bg', 'options' );
	$theme_color = get_field( 'theme_color', 'options' );
	$theme_style = get_field( 'theme_style', 'options' );
	$theme_ui = get_field( 'theme_ui', 'options' );
	$theme_ui_dark = get_field( 'theme_ui_dark', 'options' );
	$theme_ui_light = get_field( 'theme_ui_light', 'options' );
	$heading_color = get_field( 'heading_color', 'options' );
	$heading_color_dark = get_field( 'heading_color_dark', 'options' );
	$profile_color = get_field( 'profile_color', 'options' );
	$profile_color_dark = get_field( 'profile_color_dark', 'options' );
	$profile_subtitle_color = get_field( 'profile_subtitle_color', 'options' );
	$profile_subtitle_color_dark = get_field( 'profile_subtitle_color_dark', 'options' );
	$social_color = get_field( 'social_color', 'options' );
	$social_color_dark = get_field( 'social_color_dark', 'options' );
	$profile_btn_color = get_field( 'profile_btn_color', 'options' );
	$profile_btn_bg_color = get_field( 'profile_btn_bg_color', 'options' );
	$heading_font = get_field( 'heading_font_family', 'options' );
	$heading_font_size = get_field( 'heading_font_size', 'options' );
	$heading_font_weight = get_field( 'heading_font_weight', 'options' );
	$heading_font_line = get_field( 'heading_font_line', 'options' );
	$heading_let_color = get_field( 'heading_let_color', 'options' );
	$heading_let_color_dark = get_field( 'heading_let_color_dark', 'options' );
	$text_color = get_field( 'text_color', 'options' );
	$text_color_dark = get_field( 'text_color_dark', 'options' );
	$text_font = get_field( 'text_font_family', 'options' );
	$text_font_size = get_field( 'text_font_size', 'options' );
	$text_font_weight = get_field( 'text_font_weight', 'options' );
	$text_font_line = get_field( 'text_font_line', 'options' );
	$title_font_size = get_field( 'title_font_size', 'options' );
	$title_font_weight = get_field( 'title_font_weight', 'options' );
	$title_font_transform = get_field( 'title_font_transform', 'options' );
	$title_font_letter = get_field( 'title_font_letter', 'options' );
	$subtitles_font_size = get_field( 'subtitles_font_size', 'options' );
	$subtitles_font_weight = get_field( 'subtitles_font_weight', 'options' );
	$subtitles_font_transform = get_field( 'subtitles_font_transform', 'options' );
	$subtitles_font_letter = get_field( 'subtitles_font_letter', 'options' );
	$profile_btn_font_size = get_field( 'profile_btn_font_size', 'options' );
	$profile_btn_font_weight = get_field( 'profile_btn_font_weight', 'options' );
	$profile_btn_font_transform = get_field( 'profile_btn_font_transform', 'options' );
	$profile_btn_font_letter = get_field( 'profile_btn_font_letter', 'options' );
	$social_size = get_field( 'social_size', 'options' );
	$menu_icon_size = get_field( 'menu_icon_size', 'options' );
	$profile_photo_size = get_field( 'vcard_photo_size', 'options' );
	$profile_photo_radius = get_field( 'vcard_photo_radius', 'options' );
	$footer_bgcolor = get_field( 'footer_bgcolor', 'options' );
	$footer_textcolor = get_field( 'footer_textcolor', 'options' );
	$titles_circles = get_field( 'titles_circles', 'options' );
	$preloader_bgcolor = get_field( 'preloader_bgcolor', 'options' );
	$preloader_bgcolor_d = get_field( 'preloader_bgcolor_d', 'options' );
?>

<style>

	<?php if ( $preloader_bgcolor ) : ?>
	/*
		Preloader Color
	*/
	.preloader {
		background: <?php echo esc_attr( $preloader_bgcolor ); ?>;
	}
	.preload-svg path {
		fill: <?php echo esc_attr( $preloader_bgcolor ); ?>;
	}
	<?php endif; ?>

	<?php if ( $preloader_bgcolor_d ) : ?>
	/*
		Preloader Color Dark
	*/
	.body-style-dark .preloader {
		background: <?php echo esc_attr( $preloader_bgcolor_d ); ?>;
	}
	.body-style-dark .preload-svg path {
		fill: <?php echo esc_attr( $preloader_bgcolor_d ); ?>;
	}
	<?php endif; ?>

	<?php if ( !empty( $theme_bg ) ) : ?>

	<?php if ( $theme_bg['type'] == 1 ) : ?>
	/*
		Background Color
	*/

	.background, body {
		background-color: <?php echo esc_attr( $theme_bg['color'] ); ?> !important;
	}
	.body-style-dark .background, body.body-style-dark {
		background-color: <?php echo esc_attr( $theme_bg['color_dark'] ); ?> !important;
	}
	<?php endif; ?>

	<?php if ( $theme_bg['type'] == 2 ) : ?>
	/*
		Background Gradient
	*/

	body {
		background-color: <?php echo esc_attr( $theme_bg['color1'] ); ?>!important;
	}
	.background.gradient {
		background: -webkit-linear-gradient(top left, <?php echo esc_attr( $theme_bg['color1'] ); ?> 0%, <?php echo esc_attr( $theme_bg['color2'] ); ?> 100%)!important;
		background: linear-gradient(to bottom right, <?php echo esc_attr( $theme_bg['color1'] ); ?> 0%, <?php echo esc_attr( $theme_bg['color2'] ); ?> 100%)!important;
	}
	body.body-style-dark {
		background-color: <?php echo esc_attr( $theme_bg['color1_d'] ); ?>!important;
	}
	.body-style-dark .background.gradient {
		background: -webkit-linear-gradient(top left, <?php echo esc_attr( $theme_bg['color1_d'] ); ?> 0%, <?php echo esc_attr( $theme_bg['color2_d'] ); ?> 100%)!important;
		background: linear-gradient(to bottom right, <?php echo esc_attr( $theme_bg['color1_d'] ); ?> 0%, <?php echo esc_attr( $theme_bg['color2_d'] ); ?> 100%)!important;
	}
	<?php endif; ?>

	<?php if ( $theme_bg['type'] == 3 ) : ?>
	/*
		Background Image
	*/
	.background {
		background-image: url(<?php echo esc_attr( $theme_bg['image'] ); ?>);
	}
	<?php endif; ?>
	
	<?php endif; ?>

	<?php if ( $theme_color ) : ?>
	/*
		Primary Color
	*/

	.preloader .spinner .double-bounce1,
	.preloader .spinner .double-bounce2,
	.lnk:hover .arrow:before,
	.button:hover .arrow:before,
	.lnk:hover .arrow:after,
	.button:hover .arrow:after,
	.resume-items .resume-item.active .date:before,
	.skills-list ul li .progress .percentage,
	.single-post-text ul > li:before,
	.comment-text ul > li:before,
	.content-sidebar .main-menu ul li.page_item_has_children.current_page_item > a:before,
	.content-sidebar .main-menu ul li.page_item_has_children.current_page_item > a:after,
	.content-sidebar .main-menu ul li.page_item_has_children:hover > a:before,
	.content-sidebar .main-menu ul li.page_item_has_children:hover > a:after,
	.content-sidebar .main-menu ul li.page_item_has_children.current_page_parent > a:before,
	.content-sidebar .main-menu ul li.page_item_has_children.current_page_parent > a:after,
	.content-sidebar .main-menu ul li.page_item_has_children.current_page_ancestor > a:before,
	.content-sidebar .main-menu ul li.page_item_has_children.current_page_ancestor > a:after,
	.content-sidebar .close:hover:before, .content-sidebar .close:hover:after,
	.header .menu-btn:hover span, .header .menu-btn:hover span:before,
	.header .menu-btn:hover span:after,
	.info-list ul li strong,
	.profile .main-menu ul li.page_item_has_children.current_page_item > a:before,
	.profile .main-menu ul li.page_item_has_children.current_page_item > a:after,
	.profile .main-menu ul li.page_item_has_children:hover > a:before,
	.profile .main-menu ul li.page_item_has_children:hover > a:after,
	.profile .main-menu ul li.page_item_has_children.current_page_parent > a:before,
	.profile .main-menu ul li.page_item_has_children.current_page_parent > a:after,
	.profile .main-menu ul li.page_item_has_children.current_page_ancestor > a:before,
	.profile .main-menu ul li.page_item_has_children.current_page_ancestor > a:after,
	.service-items .service-item .icon,
	.revs-carousel .owl-dot.active,
	.custom-content-reveal span.custom-content-close,
	.fc-calendar .fc-row > div.fc-today,
	.fc-calendar .fc-content:hover span.fc-date,
	.fc-calendar .fc-row > div.fc-today span.fc-date,
	.skills-list.dotted ul li .progress .percentage .da span,
	.preloader .spinner.default-circle:before,
	.preloader .spinner.default-circle:after,
	.preloader .spinner.clock:before,
	.preloader .spinner.box-rotation:after,
	.header .cart-btn .cart-icon .cart-count,
	.woocommerce span.onsale,
	.woocommerce #respond input#submit.alt,
	.woocommerce a.button.alt,
	.woocommerce button.button.alt,
	.woocommerce input.button.alt,
	.woocommerce #respond input#submit.alt:hover,
	.woocommerce a.button.alt:hover,
	.woocommerce button.button.alt:hover,
	.woocommerce input.button.alt:hover,
	.woocommerce ul.products li.product .button.add_to_cart_button.added,
	.popup-box .preloader .spinner.default-circle:before,
	.popup-box .preloader .spinner.default-circle:after,
	.popup-box .preloader-popup .spinner.default-circle:before,
	.popup-box .preloader-popup .spinner.default-circle:after,
	.single-post-text ul > li:before,
	.comment-text ul > li:before,
	.blog-content ul > li:before,
	.revs-carousel .swiper-pagination-bullet.swiper-pagination-bullet-active,
	.woocommerce #respond input#submit,
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button
	.woocommerce-mini-cart__buttons #respond input#submit,
	.woocommerce-mini-cart__buttons a.button,
	.woocommerce-mini-cart__buttons button.button,
	.woocommerce-mini-cart__buttons input.button,
	.woocommerce .woocommerce-ordering select,
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
	.woocommerce a.remove:hover,
	.solid-icons-style .service-items .service-item .icon,
	.solid-icons-style .pricing-items .pricing-item .icon,
	.solid-icons-style .fuct-items .fuct-item .icon,
	.solid-icons-style .resume-title .icon,
	.solid-icons-style .skill-title .icon,
	.card-started .profile .lnk.solid-style .ion,
	.header .top-menu.menu-minimal ul li a .name,
	.resume-items.line-timeline .resume-item.active:before,
	.theme-style-dark .resume-items.line-timeline .resume-item.active:before,
	.works.works-style-3 .box-item:hover .desc .category,
	.blog.blog-style-3 .box-item:hover .desc .date,
	.works.works-style-3 .filter-menu .f_btn.active,
	.blog.blog-style-3 .filter-menu .f_btn.active,
	.ar-h-title .bord,
	.ar-resume-carousel .swiper-pagination-bullet-active,
	.ar-testimonial-carousel .swiper-pagination-bullet-active,
	.ar-resume-item .date:before,
	.ar-pricing-item .name {
		background-color: <?php echo esc_attr( $theme_color ); ?>;
	}

	.lnk:hover,
	.button:hover,
	.lnk:hover .ion,
	.button:hover .ion,
	a,
	a:hover,
	input:focus,
	textarea:focus,
	.header .top-menu ul li:hover a,
	.header .top-menu ul li.active a,
	.header .top-menu ul li.current-menu-item a,
	.header .top-menu ul li:hover a .icon,
	.header .top-menu ul li.active a .icon,
	.header .top-menu ul li:hover a .link,
	.header .top-menu ul li.active a .link,
	.header .top-menu ul li.current-menu-item a .icon,
	.header .top-menu ul li.current-menu-item a .link,
	.header .profile .subtitle,
	.card-started .profile .subtitle,
	.card-started .profile .social a:hover .ion,
	.card-started .profile .social a:hover .fab,
	.card-started .profile .social a:hover .fas,
	.pricing-items .pricing-item .icon,
	.fuct-items .fuct-item .icon,
	.resume-title .icon,
	.skill-title .icon,
	.resume-items .resume-item.active .date,
	.content.works .filter-menu .f_btn.active,
	.box-item:hover .desc .name,
	.single-post-text p a,
	.comment-text p a,
	.post-text-bottom span.cat-links a,
	.post-text-bottom .tags-links a,
	.post-text-bottom .tags-links span,
	.page-numbers.current,
	.page-links a,
	.post-comments .post-comment .desc .name,
	.post-comments .post-comment .desc span.comment-reply a:hover,
	.content-sidebar .main-menu ul li.current_page_item > a,
	.content-sidebar .main-menu ul li:hover > a,
	.content-sidebar .main-menu ul li.current_page_parent > a,
	.content-sidebar .main-menu ul li.current_page_ancestor > a,
	.content-sidebar .widget ul li a:hover,
	.content-sidebar .tagcloud a,
	.card-started .profile .subtitle,
	.card-started .profile .typed-cursor,
	.content .title .first-word,
	.content .title::first-letter,
	.content .title .first-letter::first-letter,
	.content-sidebar h2.widget-title .first-word,
	.content-sidebar h2.widget-title::first-letter,
	.content-sidebar h2.widget-title .first-letter::first-letter,
	.box-item .date,
	.profile .main-menu ul li.current-menu-item a,
	.profile .main-menu ul li.current_page_item > a,
	.profile .main-menu ul li:hover > a,
	.profile .main-menu ul li.current_page_parent > a,
	.profile .main-menu ul li.current_page_ancestor > a,
	.custom-header nav span:before,
	.fc-calendar .fc-row > div.fc-content:hover:after,
	.skills-list.list ul li .name:before,
	.preloader .spinner.recursive-circle,
	.woocommerce nav.woocommerce-pagination ul li a:focus,
	.woocommerce nav.woocommerce-pagination ul li a:hover,
	.woocommerce nav.woocommerce-pagination ul li span.current,
	.woocommerce .star-rating,
	strong.woocommerce-review__author,
	.woocommerce-message::before,
	.single-post-text p a,
	.comment-text p a,
	.blog-content p a,
	.minimal-icons-style .service-items .service-item .icon,
	.minimal-icons-style .pricing-items .pricing-item .icon,
	.minimal-icons-style .fuct-items .fuct-item .icon,
	.minimal-icons-style .resume-title .icon,
	.minimal-icons-style .skill-title .icon,
	.border-icons-style .service-items .service-item .icon,
	.border-icons-style .pricing-items .pricing-item .icon,
	.border-icons-style .fuct-items .fuct-item .icon,
	.border-icons-style .resume-title .icon,
	.border-icons-style .skill-title .icon,
	.lnk:hover .ion,
	.button:hover .ion,
	.lnk:hover .fa,
	.button:hover .fa,
	.revs-two-item .star-rating i,
	.ar-words-wrapper .ar-word,
	.ar-resume-item .date,
	.ar-pricing-item .amount,
	.ar-pricing-item ul li:before,
	.ar-testimonial-item .star-rating,
	.ar-testimonial-item .name {
		color: <?php echo esc_attr( $theme_color ); ?>;
	}
	.pricing-items .pricing-item .icon svg,
	.fuct-items .fuct-item .icon svg,
	.resume-title .icon svg,
	.skill-title .icon svg,
	.minimal-icons-style .service-items .service-item .icon svg,
	.minimal-icons-style .pricing-items .pricing-item .icon svg,
	.minimal-icons-style .fuct-items .fuct-item .icon svg,
	.minimal-icons-style .resume-title .icon svg,
	.minimal-icons-style .skill-title .icon svg,
	.border-icons-style .service-items .service-item .icon svg,
	.border-icons-style .pricing-items .pricing-item .icon svg,
	.border-icons-style .fuct-items .fuct-item .icon svg,
	.border-icons-style .resume-title .icon svg,
	.border-icons-style .skill-title .icon svg,
	.ar-info-two .ar-icon svg {
		fill: <?php echo esc_attr( $theme_color ); ?>;
	}

	.content .title .first-word,
	.content .title::first-letter,
	.content .title .first-letter::first-letter,
	.content-sidebar h2.widget-title .first-word,
	.content-sidebar h2.widget-title::first-letter,
	.content-sidebar h2.widget-title .first-letter::first-letter,
	.content .post-comments .title_inner::first-letter, 
	.content .post-comments .title .first-letter::first-letter {
		color: <?php echo esc_attr( $theme_color ); ?>!important;
	}

	.theme-style-blured.theme-style-cyber .content .title::after, 
	.theme-style-blured.theme-style-cyber .border-line-v:before, 
	.theme-style-blured.theme-style-cyber .border-line-v:after, 
	.theme-style-blured.theme-style-cyber .border-line-h:after, 
	.theme-style-blured.theme-style-cyber .lnks:before {
		background: <?php echo esc_attr( $theme_color ); ?>!important;
	}

	.textured-icons-style .service-items .service-item .icon,
	.textured-icons-style .pricing-items .pricing-item .icon,
	.textured-icons-style .fuct-items .fuct-item .icon,
	.textured-icons-style .resume-title .icon,
	.textured-icons-style .skill-title .icon {
		color: <?php echo esc_attr( $theme_color ); ?>;
	}

	.textured-icons-style .service-items .service-item .icon svg,
	.textured-icons-style .pricing-items .pricing-item .icon svg,
	.textured-icons-style .fuct-items .fuct-item .icon svg,
	.textured-icons-style .resume-title .icon svg,
	.textured-icons-style .skill-title .icon svg {
		fill: <?php echo esc_attr( $theme_color ); ?>;
	}

	.card-started .profile .image:before,
	.content .title:before,
	.box-item .image .info:before,
	.content-sidebar h2.widget-title:before {
		background: -webkit-linear-gradient(-45deg, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.15) 0%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.01) 100%);
		background: linear-gradient(135deg, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.15) 0%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.01) 100%);
	}

	.card-started:after {
		background: -webkit-linear-gradient(-45deg, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.4) 0%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.01) 100%);
		background: linear-gradient(135deg, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.4) 0%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.01) 100%);
	}

	.box-item .image .info:before {
		background: -webkit-linear-gradient(-45deg, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.5) 0%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.01) 100%);
		background: linear-gradient(135deg, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.5) 0%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.01) 100%);
	}

	.card-started .profile .slide {
		background-color: rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.1);
	}

	.pricing-items .pricing-item .feature-list ul li strong {
		background: rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.15);
	}

	.cursor {
		background-color: rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.25);
	}
	.cursor.cursor-zoom {
		border-color: rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 1);
	}

	@media (min-width: 1120px) {
		.container.layout-futurism-style .header::before {
			border-color: <?php echo esc_attr( $theme_color ); ?>;
		}
	}

	input:focus,
	textarea:focus,
	.revs-carousel .owl-dots .owl-dot,
	.custom-header,
	.post-text-bottom .tags-links a,
	.post-text-bottom .tags-links span,
	.content-sidebar .tagcloud a,
	.resume-items .resume-item.active .date,
	.box-item .date,
	.content.skills .skills-list.circles .progress .bar,
	.content.skills .skills-list.circles .progress .fill,
	.preloader .spinner.clock,
	.preloader .spinner.box-rotation,
	.skills-list.circles .progress .bar, .skills-list.circles .progress.p51 .fill, .skills-list.circles .progress.p52 .fill, .skills-list.circles .progress.p53 .fill, .skills-list.circles .progress.p54 .fill, .skills-list.circles .progress.p55 .fill, .skills-list.circles .progress.p56 .fill, .skills-list.circles .progress.p57 .fill, .skills-list.circles .progress.p58 .fill, .skills-list.circles .progress.p59 .fill, .skills-list.circles .progress.p60 .fill, .skills-list.circles .progress.p61 .fill, .skills-list.circles .progress.p62 .fill, .skills-list.circles .progress.p63 .fill, .skills-list.circles .progress.p64 .fill, .skills-list.circles .progress.p65 .fill, .skills-list.circles .progress.p66 .fill, .skills-list.circles .progress.p67 .fill, .skills-list.circles .progress.p68 .fill, .skills-list.circles .progress.p69 .fill, .skills-list.circles .progress.p70 .fill, .skills-list.circles .progress.p71 .fill, .skills-list.circles .progress.p72 .fill, .skills-list.circles .progress.p73 .fill, .skills-list.circles .progress.p74 .fill, .skills-list.circles .progress.p75 .fill, .skills-list.circles .progress.p76 .fill, .skills-list.circles .progress.p77 .fill, .skills-list.circles .progress.p78 .fill, .skills-list.circles .progress.p79 .fill, .skills-list.circles .progress.p80 .fill, .skills-list.circles .progress.p81 .fill, .skills-list.circles .progress.p82 .fill, .skills-list.circles .progress.p83 .fill, .skills-list.circles .progress.p84 .fill, .skills-list.circles .progress.p85 .fill, .skills-list.circles .progress.p86 .fill, .skills-list.circles .progress.p87 .fill, .skills-list.circles .progress.p88 .fill, .skills-list.circles .progress.p89 .fill, .skills-list.circles .progress.p90 .fill, .skills-list.circles .progress.p91 .fill, .skills-list.circles .progress.p92 .fill, .skills-list.circles .progress.p93 .fill, .skills-list.circles .progress.p94 .fill, .skills-list.circles .progress.p95 .fill, .skills-list.circles .progress.p96 .fill, .skills-list.circles .progress.p97 .fill, .skills-list.circles .progress.p98 .fill, .skills-list.circles .progress.p99 .fill, .skills-list.circles .progress.p100 .fill, .revs-carousel .swiper-pagination-bullet,
	.border-icons-style .service-items .service-item .icon,
	.border-icons-style .pricing-items .pricing-item .icon,
	.border-icons-style .fuct-items .fuct-item .icon,
	.border-icons-style .resume-title .icon,
	.border-icons-style .skill-title .icon {
		border-color: <?php echo esc_attr( $theme_color ); ?>;
	}

	.preloader .spinner.recursive-circle,
	.preloader .spinner.recursive-circle:after {
		border-color: <?php echo esc_attr( $theme_color ); ?>;
		border-top-color: transparent;
	}

	blockquote {
		border-left-color: <?php echo esc_attr( $theme_color ); ?>;
	}

	.preloader .spinner.simple-circle {
		border-right-color: <?php echo esc_attr( $theme_color ); ?>;
	}

	.preloader .spinner.quantum-spinner,
	.preloader .spinner.quantum-spinner:before,
	.preloader .spinner.quantum-spinner:after {
		border-top-color: <?php echo esc_attr( $theme_color ); ?>;
	}

	.mode-switch-btn .mode-swich-label:hover svg path,
	.mode-switch-btn .tgl:checked+.mode-swich-label:hover svg path,
	.card-started .profile .social a:hover .ion path,
	.card-started .profile .social a:hover .fab path,
	.card-started .profile .social a:hover .fas path {
		fill: <?php echo esc_attr( $theme_color ); ?>;
	}

	.rprof-before path,
	.rprof-after path {
		fill: <?php echo esc_attr( $theme_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $profile_color ) : ?>
	/*
		Profile Color
	*/

	.card-started .profile .title {
		color: <?php echo esc_attr( $profile_color ); ?>;
	}
	<?php endif; ?>

	/*
		Profile Color Dark
	*/
	.body-style-dark .card-started .profile .title {
		color: rgba(255, 255, 255, 0.85);
	}
	<?php if ( $profile_color_dark ) : ?>
	.body-style-dark .card-started .profile .title {
		color: <?php echo esc_attr( $profile_color_dark ); ?>;
	}
	<?php endif; ?>

	<?php if ( $profile_subtitle_color ) : ?>
	/*
		Profile Subtitle Color
	*/

	.card-started .profile .subtitle, .card-started .profile .typed-cursor, .card-started .profile .subtitle p, .card-started .profile .typed-cursor p {
		color: <?php echo esc_attr( $profile_subtitle_color ); ?>;
	}
	<?php endif; ?>

	/*
		Profile Subtitle Color Dark
	*/
	.body-style-dark .card-started .profile .subtitle, 
	.body-style-dark .card-started .profile .typed-cursor, 
	.body-style-dark .card-started .profile .subtitle p, 
	.body-style-dark .card-started .profile .typed-cursor p {
		color: rgba(255, 255, 255, 0.85);
	}
	<?php if ( $profile_subtitle_color_dark ) : ?>
	.body-style-dark .card-started .profile .subtitle, 
	.body-style-dark .card-started .profile .typed-cursor, 
	.body-style-dark .card-started .profile .subtitle p, 
	.body-style-dark .card-started .profile .typed-cursor p {
		color: <?php echo esc_attr( $profile_subtitle_color_dark ); ?>;
	}
	<?php endif; ?>

	<?php if ( $social_color ) : ?>
	/*
		Social Color
	*/
	.card-started .profile .social a:not(:hover) .fab {
		color: <?php echo esc_attr( $social_color ); ?>;
	}
	.card-started .profile .social a:not(:hover) .fab svg path {
		fill: <?php echo esc_attr( $social_color ); ?>;
	}
	<?php endif; ?>

	/*
		Social Color Dark
	*/
	.body-style-dark .card-started .profile .social a:not(:hover) .fab {
		color: rgba(255, 255, 255, 0.85);
	}
	.body-style-dark .card-started .profile .social a:not(:hover) .fab svg path {
		fill: rgba(255, 255, 255, 0.85);
	}
	<?php if ( $social_color_dark ) : ?>
	.body-style-dark .card-started .profile .social a:not(:hover) .fab {
		color: <?php echo esc_attr( $social_color_dark ); ?>;
	}
	.body-style-dark .card-started .profile .social a:not(:hover) .fab svg path {
		fill: <?php echo esc_attr( $social_color_dark ); ?>;
	}
	<?php endif; ?>

	<?php if ( $profile_btn_color ) : ?>
	/*
		Buttons Color
	*/
	.layout-minimal-transparent-style .card-started .profile .lnks .lnk {
		color: <?php echo esc_attr( $profile_btn_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $profile_btn_bg_color ) : ?>
	/*
		Buttons BG Color
	*/
	.layout-minimal-transparent-style .card-started .profile .lnks .lnk {
		background: <?php echo esc_attr( $profile_btn_bg_color ); ?>;
		border-color: <?php echo esc_attr( $profile_btn_bg_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $heading_color ) : ?>
	/*
		Heading Color
	*/

	.content .title,
	.service-items .service-item .name,
	.ar-h-title,
	.ar-title {
		color: <?php echo esc_attr( $heading_color ); ?>;
	}
	<?php endif; ?>
	
	/*
		Heading Color Dark
	*/
	.body-style-dark .content .title,
	.body-style-dark .service-items .service-item .name,
	.body-style-dark .ar-h-title,
	.body-style-dark .ar-title {
		color: rgba(255, 255, 255, 0.85);
	}
	<?php if ( $heading_color_dark ) : ?>
	.body-style-dark .content .title,
	.body-style-dark .service-items .service-item .name,
	.body-style-dark .ar-h-title,
	.body-style-dark .ar-title {
		color: <?php echo esc_attr( $heading_color_dark ); ?>;
	}
	<?php endif; ?>

	<?php if ( $text_color ) : ?>
	/*
		Text Color
	*/

	body {
		color: <?php echo esc_attr( $text_color ); ?>;
	}
	<?php endif; ?>
	
	/*
		Text Color Dark
	*/
	body.body-style-dark {
		color: rgba(255, 255, 255, 0.55);
	}
	<?php if ( $text_color_dark ) : ?>
	body.body-style-dark {
		color: <?php echo esc_attr( $text_color_dark ); ?>;
	}
	<?php endif; ?>

	<?php if ( $heading_let_color ) : ?>
	/*
		Heading Color Letter
	*/

	.content .title .first-word,
	.content .title::first-letter,
	.content .title .first-letter::first-letter,
	.content-sidebar h2.widget-title .first-word,
	.content-sidebar h2.widget-title::first-letter,
	.content-sidebar h2.widget-title .first-letter::first-letter,
	.content .post-comments .title_inner::first-letter, 
	.content .post-comments .title .first-letter::first-letter {
		color: <?php echo esc_attr( $heading_let_color ); ?> !important;
	}
	<?php endif; ?>
	
	/*
		Heading Color Letter Dark
	*/
	body.body-style-dark .content .title .first-word,
	body.body-style-dark .content .title::first-letter,
	body.body-style-dark .content .title .first-letter::first-letter,
	body.body-style-dark .content-sidebar h2.widget-title .first-word,
	body.body-style-dark .content-sidebar h2.widget-title::first-letter,
	body.body-style-dark .content-sidebar h2.widget-title .first-letter::first-letter,
	body.body-style-dark .content .post-comments .title_inner::first-letter, 
	body.body-style-dark .content .post-comments .title .first-letter::first-letter {
		color: <?php echo esc_attr( $theme_color ); ?> !important;
	}
	<?php if ( $heading_let_color_dark ) : ?>
	body.body-style-dark .content .title .first-word,
	body.body-style-dark .content .title::first-letter,
	body.body-style-dark .content .title .first-letter::first-letter,
	body.body-style-dark .content-sidebar h2.widget-title .first-word,
	body.body-style-dark .content-sidebar h2.widget-title::first-letter,
	body.body-style-dark .content-sidebar h2.widget-title .first-letter::first-letter,
	body.body-style-dark .content .post-comments .title_inner::first-letter, 
	body.body-style-dark .content .post-comments .title .first-letter::first-letter {
		color: <?php echo esc_attr( $heading_let_color_dark ); ?> !important;
	}
	<?php endif; ?>

	<?php if ( is_array( $text_font ) ) : ?>
	/*
		Text Font Family
	*/

	body {
		font-family: '<?php echo esc_attr( $text_font['font_name'] ); ?>';
	}
	<?php endif; ?>

	<?php if ( $text_font_size ) : ?>
	/*
		Text Font Size
	*/

	p, .row .col, body, 
	.info-list ul li, 
	.skills-list ul li, 
	.service-items .service-item .name,
	.pricing-items .pricing-item .name,
	.revs-item .info .name,
	.revs-two-item .info .name,
	.fuct-items .fuct-item .name,
	.resume-items .resume-item .name,
	.box-item .desc .name {
		font-size: <?php echo esc_attr( $text_font_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $text_font_weight ) : ?>
	/*
		Text Font Weight
	*/

	p, .row .col, body, .info-list ul li, .skills-list ul li {
		font-weight: <?php echo esc_attr( $text_font_weight ); ?>;
	}
	<?php endif; ?>

	<?php if ( $text_font_line ) : ?>
	/*
		Text Font Line-Height
	*/

	p, .card-inner {
		line-height: <?php echo esc_attr( $text_font_line ); ?>;
	}
	<?php endif; ?>

	<?php if ( is_array( $heading_font ) ) : ?>
	/*
		Heading Font Family
	*/

	.content .title, h1, h2, h3, h4, h5, h6, .ar-h-title, .ar-title {
		font-family: '<?php echo esc_attr( $heading_font['font_name'] ); ?>';
	}
	<?php endif; ?>

	<?php if ( $heading_font_size ) : ?>
	/*
		Heading Font Size
	*/
	@media (min-width: 681px) {
		.content .title, .ar-title {
			font-size: <?php echo esc_attr( $heading_font_size ); ?>px;
		}
	}
	<?php endif; ?>

	<?php if ( $heading_font_weight ) : ?>
	/*
		Heading Font Weight
	*/

	.content .title,
	.service-items .service-item .name,
	.pricing-items .pricing-item .name,
	.revs-item .info .name,
	.resume-title .name, .skill-title .name,
	.resume-items .resume-item .name,
	.revs-two-item .info .name,
	.box-item .desc .name,
	.content.blog .box-item .desc .name,
	.woocommerce ul.products li.product .woocommerce-loop-category__title,
	.woocommerce ul.products li.product .woocommerce-loop-product__title,
	.woocommerce ul.products li.product h3,
	h1, h2, h3, h4, h5, h6, .ar-h-title, .ar-title {
		font-weight: <?php echo esc_attr( $heading_font_weight ); ?>;
	}
	<?php endif; ?>

	<?php if ( $heading_font_line ) : ?>
	/*
		Heading Font Line-Height
	*/

	.content .title,
	.resume-title .name,
	.skill-title .name,
	.content.blog .box-item .desc .name,
	.resume-items .resume-item .name,
	.box-item .desc .name,
	.service-items .service-item .name,
	.pricing-items .pricing-item .name,
	.fuct-items .fuct-item .name,
	.revs-item .info .name,
	.revs-two-item .info .name,
	.woocommerce ul.products li.product .woocommerce-loop-category__title,
	.woocommerce ul.products li.product .woocommerce-loop-product__title,
	.woocommerce ul.products li.product h3,
	h1, h2, h3, h4, h5, h6, .ar-h-title, .ar-title {
		line-height: <?php echo esc_attr( $heading_font_line ); ?>;
	}
	<?php endif; ?>

	<?php if ( $title_font_size ) : ?>
	/*
		Profile Title Font Size
	*/

	.card-started .profile .title {
		font-size: <?php echo esc_attr( $title_font_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $title_font_weight ) : ?>
	/*
		Profile Title Font Weight
	*/

	.card-started .profile .title {
		font-weight: <?php echo esc_attr( $title_font_weight ); ?>;
	}
	<?php endif; ?>

	<?php if ( $title_font_transform ) : ?>
	/*
		Profile Title Font Transform
	*/

	.card-started .profile .title {
		text-transform: <?php echo esc_attr( $title_font_transform ); ?>;
	}
	<?php endif; ?>

	<?php if ( $title_font_letter ) : ?>
	/*
		Profile Title Font Letter Spacing
	*/

	.card-started .profile .title {
		letter-spacing: <?php echo esc_attr( $title_font_letter ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $subtitles_font_size ) : ?>
	/*
		Subtitle Font Size
	*/

	.card-started .profile .subtitle,
	.card-started .profile .typed-cursor,
	.card-started .profile .subtitle p,
	.card-started .profile .typed-cursor p {
		font-size: <?php echo esc_attr( $subtitles_font_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $subtitles_font_weight ) : ?>
	/*
		Subtitle Font Weight
	*/

	.card-started .profile .subtitle,
	.card-started .profile .typed-cursor,
	.card-started .profile .subtitle p,
	.card-started .profile .typed-cursor p {
		font-weight: <?php echo esc_attr( $subtitles_font_weight ); ?>;
	}
	<?php endif; ?>

	<?php if ( $subtitles_font_transform ) : ?>
	/*
		Subtitle Font Transform
	*/

	.card-started .profile .subtitle,
	.card-started .profile .typed-cursor,
	.card-started .profile .subtitle p,
	.card-started .profile .typed-cursor p {
		text-transform: <?php echo esc_attr( $subtitles_font_transform ); ?>;
	}
	<?php endif; ?>

	<?php if ( $subtitles_font_letter ) : ?>
	/*
		Subtitle Font Letter Spacing
	*/

	.card-started .profile .subtitle,
	.card-started .profile .typed-cursor,
	.card-started .profile .subtitle p,
	.card-started .profile .typed-cursor p {
		letter-spacing: <?php echo esc_attr( $subtitles_font_letter ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $social_size ) : ?>
	/*
		Social Size
	*/

	.card-started .profile .social a .fab {
		font-size: <?php echo esc_attr( $social_size ); ?>px;
	}
	.card-started .profile .social a .fab svg {
		width: <?php echo esc_attr( $social_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $profile_btn_font_size ) : ?>
	/*
		Profile Buttons Font Size
	*/

	.card-started .profile .lnk {
		font-size: <?php echo esc_attr( $profile_btn_font_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $profile_btn_font_weight ) : ?>
	/*
		Profile Buttons Font Weight
	*/

	.card-started .profile .lnk {
		font-weight: <?php echo esc_attr( $profile_btn_font_weight ); ?>;
	}
	<?php endif; ?>

	<?php if ( $profile_btn_font_transform ) : ?>
	/*
		Profile Buttons Font Transform
	*/

	.card-started .profile .lnk {
		text-transform: <?php echo esc_attr( $profile_btn_font_transform ); ?>;
	}
	<?php endif; ?>

	<?php if ( $profile_btn_font_letter ) : ?>
	/*
		Profile Buttons Font Letter Spacing
	*/

	.card-started .profile .lnk {
		letter-spacing: <?php echo esc_attr( $profile_btn_font_letter ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $menu_icon_size ) : ?>
	/*
		Menu Icon Size
	*/

	.header .top-menu ul li a .icon {
		font-size: <?php echo esc_attr( $menu_icon_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $theme_style && $theme_color ) : ?>
	/*
		Classic Version Style
	*/

	.service-items .service-item .icon {
		background: -webkit-linear-gradient(-45deg, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.15) 0%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.01) 100%);
		background: linear-gradient(135deg, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.15) 0%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.01) 100%);
	}
	.service-items .service-item .icon {
		color: <?php echo esc_attr( $theme_color ); ?>;
	}
	.service-items .service-item .icon svg {
		fill: <?php echo esc_attr( $theme_color ); ?>;
	}
	<?php endif; ?>

	<?php if ( $theme_style && $theme_color ) : ?>
	/*
		Classic Version Style
	*/
	.card-started:after,
	.card-started .profile .image:before,
	.content .title:before,
	.box-item .image .info:before,
	.content-sidebar h2.widget-title:before {
		background: -webkit-linear-gradient(-45deg, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.4) 0%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.01) 100%);
		background: linear-gradient(135deg, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.4) 0%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_color ) ); ?>, 0.01) 100%);
	}
	<?php endif; ?>
	
	/*
		vCard Style
	*/
	<?php if ( $theme_ui_light ) : ?>
	body .header .menu-btn,
	body .card-started .profile,
	body .card-started .profile .slide:before,
	body .card-started .profile .slide:after,
	body .card-inner,
	body .card-inner:before,
	body .card-inner:after,
	body .skills-list.circles .progress:after,
	body .mfp-wrap.popup-box-inline,
	body .info-list ul li strong:after,
	body .content-sidebar,
	body .profile .main-menu-fixed:before,
	body .header .cart-btn,
	body .header .cart-btn .cart-widget,
	body .header .top-menu,
	body .header .mode-switch-btn,
	body .content-sidebar .close,
	body .custom-footer,
	body .menu-centered.header,
	body .layout-futurism-style .menu-centered.header:after,
	body .theme-style-blured .menu-centered.header:after {
		background: <?php echo esc_attr( $theme_ui_light ); ?>;
	}
	body .header .cart-btn .cart-widget:before {
		border-right-color: <?php echo esc_attr( $theme_ui_light ); ?>;
	}
	body .card-started .profile .image img {
		border-color: <?php echo esc_attr( $theme_ui_light ); ?>;
	}
	body .theme-style-blured .card-inner {
		background: -webkit-linear-gradient(top, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_light ) ); ?>, 0) 75%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_light ) ); ?>, 1) 100%) !important;
		background: linear-gradient(to bottom, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_light ) ); ?>, 0) 75%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_light ) ); ?>, 1) 100%) !important;
	}
	body.body-style-gradient .theme-style-blured .menu-centered.header:after {
		background: -webkit-linear-gradient(top, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_light ) ); ?>, 0.7) 75%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_light ) ); ?>, 1) 100%) !important;
		background: linear-gradient(to bottom, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_light ) ); ?>, 0.7) 75%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_light ) ); ?>, 1) 100%) !important;
	}
	body .textured-icons-style .service-items .service-item .icon,
	body .textured-icons-style .pricing-items .pricing-item .icon,
	body .textured-icons-style .fuct-items .fuct-item .icon,
	body .textured-icons-style .resume-title .icon,
	body .textured-icons-style .skill-title .icon {
		background-color: <?php echo esc_attr( $theme_ui_light ); ?> !important;
	}
	body .rprof-after path:nth-child(3) {
		fill: <?php echo esc_attr( $theme_ui_light ); ?>;
	}
	@media (max-width: 680px) {
		body .header {
			background-color: <?php echo esc_attr( $theme_ui_light ); ?>;
		}
	}
	@media (max-width: 680px) {
		body .header .top-menu ul.menu {
			background-color: <?php echo esc_attr( $theme_ui_light ); ?>;
		}
		body .theme-style-textured .header .top-menu ul.menu {
			background-color: transparent;
		}
	}
	<?php endif; ?>
	
	body.body-style-dark .header .menu-btn,
	body.body-style-dark .card-started .profile,
	body.body-style-dark .card-started .profile .slide:before,
	body.body-style-dark .card-started .profile .slide:after,
	body.body-style-dark .card-inner,
	body.body-style-dark .card-inner:before,
	body.body-style-dark .card-inner:after,
	body.body-style-dark .skills-list.circles .progress:after,
	body.body-style-dark .mfp-wrap.popup-box-inline,
	body.body-style-dark .info-list ul li strong:after,
	body.body-style-dark .content-sidebar,
	body.body-style-dark .profile .main-menu-fixed:before,
	body.body-style-dark .header .cart-btn,
	body.body-style-dark .header .cart-btn .cart-widget,
	body.body-style-dark .header .top-menu,
	body.body-style-dark .header .mode-switch-btn,
	body.body-style-dark .content-sidebar .close,
	body.body-style-dark .custom-footer,
	body.body-style-dark .menu-centered.header,
	body.body-style-dark .layout-futurism-style .menu-centered.header:after,
	body.body-style-dark .theme-style-blured .menu-centered.header:after {
		background: #31313a;
	}
	body.body-style-dark .header .cart-btn .cart-widget:before {
		border-right-color: #31313a;
	}
	body.body-style-dark .card-started .profile .image img {
		border-color: #31313a;
	}
	body.body-style-dark .theme-style-blured .card-inner {
		background: -webkit-linear-gradient(top, rgba(49,49,58,0) 75%, rgba(49,49,58,1) 100%) !important;
		background: linear-gradient(to bottom, rgba(49,49,58,0) 75%, rgba(49,49,58,1) 100%) !important;
	}
	body.body-style-dark.body-style-gradient .theme-style-blured .menu-centered.header:after {
		background: -webkit-linear-gradient(top, rgba(49,49,58,0.5) 75%, rgba(49,49,58,1) 100%) !important;
		background: linear-gradient(to bottom, rgba(49,49,58,0.5) 75%, rgba(49,49,58,1) 100%) !important;
	}
	body.body-style-dark .textured-icons-style .service-items .service-item .icon,
	body.body-style-dark .textured-icons-style .pricing-items .pricing-item .icon,
	body.body-style-dark .textured-icons-style .fuct-items .fuct-item .icon,
	body.body-style-dark .textured-icons-style .resume-title .icon,
	body.body-style-dark .textured-icons-style .skill-title .icon {
		background-color: #31313a !important;
	}
	body.body-style-dark .rprof-after path:nth-child(3) {
		fill: #31313a;
	}
	@media (max-width: 680px) {
		body.body-style-dark .header {
			background-color: #31313a;
		}
	}
	@media (max-width: 680px) {
		body.body-style-dark .header .top-menu ul.menu {
			background-color: #31313a;
		}
		body.body-style-dark .theme-style-textured .header .top-menu ul.menu {
			background-color: transparent;
		}
	}
	<?php if ( $theme_ui_dark ) : ?>
	body.body-style-dark .header .menu-btn,
	body.body-style-dark .card-started .profile,
	body.body-style-dark .card-started .profile .slide:before,
	body.body-style-dark .card-started .profile .slide:after,
	body.body-style-dark .card-inner,
	body.body-style-dark .card-inner:before,
	body.body-style-dark .card-inner:after,
	body.body-style-dark .skills-list.circles .progress:after,
	body.body-style-dark .mfp-wrap.popup-box-inline,
	body.body-style-dark .info-list ul li strong:after,
	body.body-style-dark .content-sidebar,
	body.body-style-dark .profile .main-menu-fixed:before,
	body.body-style-dark .header .cart-btn,
	body.body-style-dark .header .cart-btn .cart-widget,
	body.body-style-dark .header .top-menu,
	body.body-style-dark .header .mode-switch-btn,
	body.body-style-dark .content-sidebar .close,
	body.body-style-dark .custom-footer,
	body.body-style-dark .menu-centered.header,
	body.body-style-dark .layout-futurism-style .menu-centered.header:after,
	body.body-style-dark .theme-style-blured .menu-centered.header:after {
		background: <?php echo esc_attr( $theme_ui_dark ); ?>;
	}
	body.body-style-dark .header .cart-btn .cart-widget:before {
		border-right-color: <?php echo esc_attr( $theme_ui_dark ); ?>;
	}
	body.body-style-dark .card-started .profile .image img {
		border-color: <?php echo esc_attr( $theme_ui_dark ); ?>;
	}
	body.body-style-dark .theme-style-blured .card-inner {
		background: -webkit-linear-gradient(top, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_dark ) ); ?>, 0) 75%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_dark ) ); ?>, 1) 100%) !important;
		background: linear-gradient(to bottom, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_dark ) ); ?>, 0) 75%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_dark ) ); ?>, 1) 100%) !important;
	}
	body.body-style-dark.body-style-gradient .theme-style-blured .menu-centered.header:after {
		background: -webkit-linear-gradient(top, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_dark ) ); ?>, 0.5) 75%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_dark ) ); ?>, 1) 100%) !important;
		background: linear-gradient(to bottom, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_dark ) ); ?>, 0.5) 75%, rgba(<?php echo esc_attr( ryancv_hexToRgb( $theme_ui_dark ) ); ?>, 1) 100%) !important;
	}
	body.body-style-dark .textured-icons-style .service-items .service-item .icon,
	body.body-style-dark .textured-icons-style .pricing-items .pricing-item .icon,
	body.body-style-dark .textured-icons-style .fuct-items .fuct-item .icon,
	body.body-style-dark .textured-icons-style .resume-title .icon,
	body.body-style-dark .textured-icons-style .skill-title .icon {
		background-color: <?php echo esc_attr( $theme_ui_dark ); ?> !important;
	}
	body.body-style-dark .rprof-after path:nth-child(3) {
		fill: <?php echo esc_attr( $theme_ui_dark ); ?>;
	}
	@media (max-width: 680px) {
		body.body-style-dark .header {
			background-color: <?php echo esc_attr( $theme_ui_dark ); ?>;
		}
	}
	@media (max-width: 680px) {
		body.body-style-dark .header .top-menu ul.menu {
			background-color: <?php echo esc_attr( $theme_ui_dark ); ?>;
		}
		body.body-style-dark .theme-style-textured .header .top-menu ul.menu {
			background-color: transparent;
		}
	}
	<?php endif; ?>

	<?php if ( $profile_photo_size ) : ?>
	/*
		profile_photo_size
	*/

	.card-started .profile .image {
		width: <?php echo esc_attr( $profile_photo_size ); ?>px;
	}
	<?php endif; ?>

	<?php if ( $profile_photo_radius ) : ?>
	/*
		profile_photo_radius
	*/

	.card-started .profile .image img,
	.card-started .profile .image:before {
		-webkit-border-radius: <?php echo esc_attr( $profile_photo_radius ); ?>%;
		border-radius: <?php echo esc_attr( $profile_photo_radius ); ?>%;
	}
	<?php endif; ?>

	<?php if ( $footer_bgcolor ) : ?>
	/*
		footer bg color
	*/

	.custom-footer {
		background: <?php echo esc_attr( $footer_bgcolor ); ?>;
	}
	<?php endif; ?>

	<?php if ( $titles_circles ) : ?>
	/*
		hide circles titles
	*/

	.card-started .profile .image:before, 
	.content .title:before,
	.content-sidebar h2.widget-title:before {
		display: none;
	}
	<?php endif; ?>

	<?php if ( $theme_container_width ) : ?>
	/*
		Theme Container Width
	*/
	
	@media (min-width: 1120px) {
		.container,
		.container.layout-fully-style {
			max-width: <?php echo esc_attr( $theme_container_width ); ?>px;
		}
	}
	<?php endif; ?>

	<?php if ( $theme_container_height ) : ?>
	/*
		Theme Container Height
	*/
	
	@media (min-width: 1120px) {
		.container,
		.container.layout-fully-style {
			max-height: <?php echo esc_attr( $theme_container_height ); ?>px;
		}
	}
	<?php endif; ?>

</style>

<?php
}
}
add_action( 'wp_head', 'ryancv_skin' );
