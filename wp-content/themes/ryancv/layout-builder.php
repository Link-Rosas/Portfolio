<?php
	if ( ! post_password_required() ) {
		$post_id = get_query_var('post_id');
		
		if ( get_field( 'layout', $post_id ) ) :
			while ( has_sub_field( 'layout', $post_id ) ) :
				if ( get_row_layout() == "about_me" ) :
					get_template_part( 'modules/about-me' );
				endif;
				if ( get_row_layout() == "blog" ) :
					get_template_part( 'modules/blog' );
				endif;
				if ( get_row_layout() == "history" ) :
					get_template_part( 'modules/history' );
				endif;
				if ( get_row_layout() == "skills" ) :
					get_template_part( 'modules/skills' );
				endif;	
				if ( get_row_layout() == "services" ) :
					get_template_part( 'modules/services' );
				endif;
				if ( get_row_layout() == "facts" ) :
					get_template_part( 'modules/facts' );
				endif;
				if ( get_row_layout() == "pricing" ) :
					get_template_part( 'modules/pricing' );
				endif;
				if ( get_row_layout() == "clients" ) :
					get_template_part( 'modules/clients' );
				endif;
				if ( get_row_layout() == "testimonials" ) :
					get_template_part( 'modules/testimonials' );
				endif;
				if ( get_row_layout() == "portfolio" ) :
					get_template_part( 'modules/portfolio' );
				endif;
				if ( get_row_layout() == "products" ) :
					get_template_part( 'modules/products' );
				endif;
				if ( get_row_layout() == "contact" ) :
					get_template_part( 'modules/contact' );
				endif;
				if ( get_row_layout() == "contact-form" ) :
					get_template_part( 'modules/contact-form' );
				endif;
				if ( get_row_layout() == "text" ) :
					get_template_part( 'modules/text' );
				endif;
				if ( get_row_layout() == "quote" ) :
					get_template_part( 'modules/quote' );
				endif;
			endwhile;
		endif;

	} else {

		echo get_the_password_form();
		
	}
?>