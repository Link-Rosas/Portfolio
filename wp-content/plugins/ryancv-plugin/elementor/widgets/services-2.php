<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Services Two Widget.
 *
 * @since 1.0
 */

class RyanCV_Services_Two_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-services-two';
	}

	public function get_title() {
		return esc_html__( 'Services Two', 'ryancv-plugin' );
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

        $this->add_control(
			'image', [
				'label' => esc_html__( 'Icon', 'ryancv-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'subtitle', [
				'label'       => esc_html__( 'Subtitle', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter subtitle', 'ryancv-plugin' ),
				'default' => esc_html__( 'Enter subtitle', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'title', [
				'label'       => esc_html__( 'Title', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter title', 'ryancv-plugin' ),
				'default' => esc_html__( 'Enter title', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'description', [
				'label'       => esc_html__( 'Description', 'ryancv-plugin' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Enter description', 'ryancv-plugin' ),
				'default' => esc_html__( 'Enter description', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'btn', [
				'label'       => esc_html__( 'Button (Label)', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Read More', 'ryancv-plugin' ),
				'default' => esc_html__( 'Read More', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'URL Link', 'ryancv-plugin' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'show_external' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'items_styling',
			[
				'label' => esc_html__( 'Items', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
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
			'items_subtitle_color',
			[
				'label' => esc_html__( 'Subtitle Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ar-serv-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_subtitle_color_d',
			[
				'label' => esc_html__( 'Subtitle Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-serv-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'items_subtitle_typography',
				'label' => esc_html__( 'Subtitle Typography:', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-serv-subtitle',
			]
		);

		$this->add_control(
			'items_title_color',
			[
				'label' => esc_html__( 'Title Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ar-serv-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_title_color_d',
			[
				'label' => esc_html__( 'Title Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-serv-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'items_title_typography',
				'label' => esc_html__( 'Title Typography:', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-serv-title',
			]
		);

		$this->add_control(
			'items_text_color',
			[
				'label' => esc_html__( 'Text Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ar-serv-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_text_color_d',
			[
				'label' => esc_html__( 'Text Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-serv-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'items_text_typography',
				'label' => esc_html__( 'Text Typography:', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-serv-text',
			]
		);

		$this->add_control(
			'items_lnk_color',
			[
				'label' => esc_html__( 'Link Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ar-serv-lnk, .elementor {{WRAPPER}} .ar-serv-lnk' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_lnk_color_d',
			[
				'label' => esc_html__( 'Link Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-serv-lnk, .theme-style-dark .elementor {{WRAPPER}} .ar-serv-lnk' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'items_lnk_typography',
				'label' => esc_html__( 'Link Typography:', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-serv-lnk, .elementor {{WRAPPER}} .ar-serv-lnk',
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

		$this->add_inline_editing_attributes( 'subtitle', 'basic' );
		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_inline_editing_attributes( 'description', 'advanced' );
		$this->add_inline_editing_attributes( 'btn', 'basic' );

		?>

		<!-- services item -->
		<div class="styled-gradient styled-gradient-border">
			<div class="ar-service-item box-item align-left">
				<?php if ( $settings['subtitle'] || $settings['title'] || $settings['image'] ) : ?>
				<div class="ar-serv-top">
					<?php if( $settings['image']['id'] ) : $image = wp_get_attachment_image_url( $settings['image']['id'], 'ryancv_92x92' ); ?>
					<div class="ar-serv-icon">
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>" />
					</div>
					<?php endif; ?>
					<?php if ( $settings['subtitle'] || $settings['title'] ) : ?>
					<div class="ar-serv-head">
						<div class="ar-serv-subtitle">
							<span <?php echo $this->get_render_attribute_string( 'subtitle' ); ?>><?php echo wp_kses_post( $settings['subtitle'] ); ?></span>
						</div>
						<div class="ar-serv-title">
							<span <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo wp_kses_post( $settings['title'] ); ?></span>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<?php if ( $settings['description'] ) : ?>
				<div class="ar-serv-text">
					<?php echo wp_kses_post( $settings['description'] ); ?>
				</div>
				<?php endif; ?>
				<?php if ( $settings['btn'] || $settings['link']['url'] ) : ?>
				<a class="ar-serv-lnk custom-lnk"<?php if ( $settings['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $settings['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $settings['link']['url'] ); ?>">
					<span <?php echo $this->get_render_attribute_string( 'btn' ); ?>><?php echo wp_kses_post( $settings['btn'] ); ?></span>
				</a>
				<?php endif; ?>
			</div>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_Services_Two_Widget() );
