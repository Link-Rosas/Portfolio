<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Pricing Two Widget.
 *
 * @since 1.0
 */
class RyanCV_Pricing_Two_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-pricing-2';
	}

	public function get_title() {
		return esc_html__( 'Pricing Two', 'ryancv-plugin' );
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
			'items_tab',
			[
				'label' => esc_html__( 'Content', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'name', [
				'label'       => esc_html__( 'Title', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter title', 'ryancv-plugin' ),
				'default'	=> esc_html__( 'Enter title', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'price', [
				'label'       => esc_html__( 'Price', 'ryancv-plugin' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => 100,
				'default'	=> 100,
			]
		);

		$this->add_control(
			'button', [
				'label'       => esc_html__( 'Button (title)', 'ryancv-plugin' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button', 'ryancv-plugin' ),
				'default'	=> esc_html__( 'Button', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'link', [
				'label'       => esc_html__( 'Button (link)', 'ryancv-plugin' ),
				'type' => Controls_Manager::URL,
				'show_external' => true,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'list', [
				'label' => esc_html__( 'List', 'ryancv-plugin' ),
				'type' => Controls_Manager::WYSIWYG,
				'default'	=> esc_html__( 'Enter list', 'ryancv-plugin' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'items_styling',
			[
				'label'     => esc_html__( 'Content', 'ryancv-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'item_bg_color',
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
			'item_bg_color_d',
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
			'item_name_color',
			[
				'label'     => esc_html__( 'Title Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-pricing-item .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_name_color_d',
			[
				'label'     => esc_html__( 'Title Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-pricing-item .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'     => esc_html__( 'Title Typography', 'ryancv-plugin' ),
				'name'     => 'item_name_typography',
				'selector' => '{{WRAPPER}} .ar-pricing-item .name',
			]
		);

		$this->add_control(
			'item_name_bg_color',
			[
				'label'     => esc_html__( 'Title BG Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-pricing-item .name' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_name_bg_color_d',
			[
				'label'     => esc_html__( 'Title BG Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-pricing-item .name' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_price_color',
			[
				'label'     => esc_html__( 'Price Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-pricing-item .amount' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_price_color_d',
			[
				'label'     => esc_html__( 'Price Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-pricing-item .amount' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_price_typography',
				'label'     => esc_html__( 'Price Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-pricing-item .amount',
			]
		);

		$this->add_control(
			'item_btn_color_txt',
			[
				'label'     => esc_html__( 'Button Text Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-lnk, {{WRAPPER}} a.ar-lnk' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_btn_color_txt_h',
			[
				'label'     => esc_html__( 'Button Text Color (Hover)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-lnk:hover, {{WRAPPER}} a.ar-lnk:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_btn_color_txt_d',
			[
				'label'     => esc_html__( 'Button Text Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-lnk, .theme-style-dark {{WRAPPER}} a.ar-lnk' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_btn_color_txt_d_h',
			[
				'label'     => esc_html__( 'Button Text Color (Dark Hover)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-lnk:hover, .theme-style-dark {{WRAPPER}} a.ar-lnk:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_btn_typography',
				'label'     => esc_html__( 'Price Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-lnk, {{WRAPPER}} a.ar-lnk',
			]
		);

		$this->add_control(
			'item_btn_color',
			[
				'label'     => esc_html__( 'Button Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-lnk, {{WRAPPER}} a.ar-lnk, {{WRAPPER}} .ar-lnk:hover, {{WRAPPER}} a.ar-lnk:hover' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .ar-lnk:hover, {{WRAPPER}} a.ar-lnk:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_btn_color_d',
			[
				'label'     => esc_html__( 'Button Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-lnk, .theme-style-dark {{WRAPPER}} a.ar-lnk, .theme-style-dark {{WRAPPER}} .ar-lnk:hover, .theme-style-dark {{WRAPPER}} a.ar-lnk:hover' => 'border-color: {{VALUE}};',
					'.theme-style-dark {{WRAPPER}} .ar-lnk:hover, .theme-style-dark {{WRAPPER}} a.ar-lnk:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_list_color',
			[

				'label'     => esc_html__( 'List Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-pricing-item .feature-list, {{WRAPPER}} .ar-pricing-item .feature-list ul' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_list_color_d',
			[

				'label'     => esc_html__( 'List Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-pricing-item .feature-list, .theme-style-dark {{WRAPPER}} .ar-pricing-item .feature-list ul' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_list_typography',
				'label'     => esc_html__( 'List Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-pricing-item .feature-list, {{WRAPPER}} .ar-pricing-item .feature-list ul',
			]
		);

		$this->add_control(
			'item_list_dot_color',
			[

				'label'     => esc_html__( 'List Dot Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-pricing-item .feature-list ul li:before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_list_dot_color_d',
			[

				'label'     => esc_html__( 'List Dot Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-pricing-item .feature-list ul li:before' => 'color: {{VALUE}};',
				],
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

		$this->add_inline_editing_attributes( 'name', 'basic' );
        $this->add_inline_editing_attributes( 'price', 'basic' );
        $this->add_inline_editing_attributes( 'list', 'advanced' );
        $this->add_inline_editing_attributes( 'button', 'basic' );

		?>

		<!-- Price Tables -->
		<div class="styled-gradient styled-gradient-border">
			<div class="ar-pricing-item box-item align-left">
				<?php if ( $settings['name'] ) : ?>
				<div class="name">
					<span <?php echo $this->get_render_attribute_string( 'name' ); ?>>
						<?php echo esc_html( $settings['name'] ); ?>
					</span>
				</div>
				<?php endif; ?>
				<?php if ( $settings['price'] ) : ?>
				<div class="amount">
					<span <?php echo $this->get_render_attribute_string( 'price' ); ?>>
						<?php echo esc_html( $settings['price'] ); ?>
					</span>
				</div>
				<?php endif; ?>
				<?php if ( $settings['button'] ) : ?>
				<a class="ar-lnk custom-lnk"<?php if ( $settings['link'] ) : if ( $settings['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $settings['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $settings['link']['url'] ); ?>"<?php endif; ?>>
					<span class="text">
						<span <?php echo $this->get_render_attribute_string( 'button' ); ?>>
							<?php echo esc_html( $settings['button'] ); ?>
						</span>
					</span>
				</a>
				<?php endif; ?>
				<?php if ( $settings['list'] ) : ?>
				<div class="feature-list">
					<div <?php echo $this->get_render_attribute_string( 'list' ); ?>>
						<?php echo wp_kses_post( $settings['list'] ); ?>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_Pricing_Two_Widget() );
