<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Testimonials Three Widget.
 *
 * @since 1.0
 */
class RyanCV_Testimonials_Three_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-testimonials-3';
	}

	public function get_title() {
		return esc_html__( 'Testimonials Two', 'ryancv-plugin' );
	}

	public function get_icon() {
		return 'eicon-parallax';
	}

	public function get_categories() {
		return [ 'ryancv-category' ];
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_tab',
			[
				'label' => esc_html__( 'Content', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'text', [
				'label'       => esc_html__( 'Text', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter text', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Enter text', 'ryancv-plugin' ),
			]
		);

		$repeater->add_control(
			'name', [
				'label'       => esc_html__( 'Name', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter name', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Enter name', 'ryancv-plugin' ),
			]
		);

		$repeater->add_control(
			'role', [
				'label'       => esc_html__( 'Role', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter role', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Enter role', 'ryancv-plugin' ),
			]
		);

        $repeater->add_control(
			'stars',
			[
				'label'       => esc_html__( 'Stars', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => '5',
				'options' => [
                    '0'  => __( '0', 'ryancv-plugin' ),
					'1'  => __( '1', 'ryancv-plugin' ),
					'2' => __( '2', 'ryancv-plugin' ),
                    '3' => __( '3', 'ryancv-plugin' ),
                    '4' => __( '4', 'ryancv-plugin' ),
                    '5' => __( '5', 'ryancv-plugin' ),
				],
			]
		);

		$repeater->add_control(
			'image', [
				'label' => esc_html__( 'Image', 'ryancv-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Items', 'ryancv-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ name }}}',
			]
		);

        $this->add_control(
			'align',
			[
				'label'       => esc_html__( 'Alignment', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'center'  => __( 'Center', 'ryancv-plugin' ),
					'left' => __( 'Left', 'ryancv-plugin' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'settings_tab',
			[
				'label' => esc_html__( 'Settings', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'is_autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'ryancv-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'ryancv-plugin' ),
				'label_off' => esc_html__( 'No', 'ryancv-plugin' ),
				'return_value' => 1,
				'default' => 0,
			]
		);

		$this->add_control(
			'is_autoplaytime',
			[
				'label' => esc_html__( 'Autoplay Time', 'ryancv-plugin' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 50000,
				'step' => 100,
				'default' => 5000,
			]
		);

		$this->add_control(
			'is_dots',
			[
				'label' => esc_html__( 'Dots', 'ryancv-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'ryancv-plugin' ),
				'label_off' => esc_html__( 'No', 'ryancv-plugin' ),
				'return_value' => 1,
				'default' => 1,
			]
		);

		$this->add_control(
			'is_loop',
			[
				'label' => esc_html__( 'Loop', 'ryancv-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'ryancv-plugin' ),
				'label_off' => esc_html__( 'No', 'ryancv-plugin' ),
				'return_value' => 1,
				'default' => 0,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'items_styling',
			[
				'label'     => esc_html__( 'Items', 'ryancv-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'items_bg_color',
			[
				'label'     => esc_html__( 'BG Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .styled-gradient.styled-gradient-border .box-item' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_bg_color_d',
			[
				'label'     => esc_html__( 'BG Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .styled-gradient.styled-gradient-border .box-item' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_stars_color',
			[
				'label'     => esc_html__( 'Stars Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-testimonial-item .star-rating' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_stars_color_d',
			[
				'label'     => esc_html__( 'Stars Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-testimonial-item .star-rating' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-testimonial-item .text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_text_color_d',
			[
				'label'     => esc_html__( 'Text Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-testimonial-item .text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_text_typography',
				'label'     => esc_html__( 'Text Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-testimonial-item .text',
			]
		);

		$this->add_control(
			'items_name_color',
			[
				'label'     => esc_html__( 'Name Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-testimonial-item .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_name_color_d',
			[
				'label'     => esc_html__( 'Name Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-testimonial-item .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_name_typography',
				'label'     => esc_html__( 'Name Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-testimonial-item .name',
			]
		);

		$this->add_control(
			'items_role_color',
			[
				'label'     => esc_html__( 'Role Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-testimonial-item .company' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_role_color_d',
			[
				'label'     => esc_html__( 'Role Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-testimonial-item .company' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_role_typography',
				'label'     => esc_html__( 'Role Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-testimonial-item .company',
			]
		);

		$this->end_controls_section();
	}


	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

		<!-- Testimonials Two -->
		<?php if ( $settings['items'] ) : ?>
		<div class="ar-testimonial-carousel<?php if ( $settings['is_dots'] == 0 ) : ?> ar-hide-dots<?php endif; ?>">
			<div class="swiper-container" data-swiper-autoplay="<?php echo esc_attr( $settings['is_autoplay'] ); ?>" data-swiper-delay="<?php echo esc_attr( $settings['is_autoplaytime'] ); ?>" data-swiper-loop="<?php echo esc_attr( $settings['is_loop'] ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $settings['items'] as $index => $item ) :
					$item_text = $this->get_repeater_setting_key( 'text', 'items', $index );
					$this->add_inline_editing_attributes( $item_text, 'basic' );

					$item_name = $this->get_repeater_setting_key( 'name', 'items', $index );
					$this->add_inline_editing_attributes( $item_name, 'none' );

					$item_role = $this->get_repeater_setting_key( 'role', 'items', $index );
					$this->add_inline_editing_attributes( $item_role, 'none' );
					?>
					<div class="swiper-slide">
						<div class="styled-gradient styled-gradient-border">
							<div class="ar-testimonial-item box-item<?php if ( $settings['align'] == 'left' ) : ?> align-left<?php endif; ?>">
								<?php if ( $item['stars'] ) : ?>
								<div class="star-rating">
									<?php if ( $item['stars'] == '0' ) : ?><?php endif; ?>
									<?php if ( $item['stars'] == '1' ) : ?><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><?php endif; ?>
									<?php if ( $item['stars'] == '2' ) : ?><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><?php endif; ?>
									<?php if ( $item['stars'] == '3' ) : ?><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><?php endif; ?>
									<?php if ( $item['stars'] == '4' ) : ?><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><?php endif; ?>
									<?php if ( $item['stars'] == '5' ) : ?><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><?php endif; ?>
								</div>
								<?php endif; ?>
								<?php if ( $item['text'] ) : ?>
								<div class="text">
									<div <?php echo $this->get_render_attribute_string( $item_text ); ?>>
										<?php echo wp_kses_post( $item['text'] ); ?>
									</div>
								</div>
								<?php endif; ?>
								<div class="user">
									<?php if( $item['image']['id'] ) :
										$image = wp_get_attachment_image_url( $item['image']['id'], 'ryancv_92x92' );
									?>
									<div class="img">
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" />
									</div>
									<?php endif; ?>
									<div class="info">
										<?php if( $item['name'] ) : ?>
										<div class="name">
											<span <?php echo $this->get_render_attribute_string( $item_name ); ?>>
												<?php echo esc_html( $item['name'] ); ?>
											</span>
										</div>
										<?php endif; ?>
										<?php if( $item['role'] ) : ?>
										<div class="company">
											<span <?php echo $this->get_render_attribute_string( $item_role ); ?>>
												<?php echo esc_html( $item['role'] ); ?>
											</span>
										</div>
										<?php endif; ?>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
		<?php endif; ?>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_Testimonials_Three_Widget() );
