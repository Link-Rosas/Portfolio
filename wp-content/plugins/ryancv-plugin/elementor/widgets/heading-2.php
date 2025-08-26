<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Heading Two Widget.
 *
 * @since 1.0
 */
class RyanCV_Heading_Two_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-heading-two';
	}

	public function get_title() {
		return esc_html__( 'Heading Two', 'ryancv-plugin' );
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
		if ( function_exists( 'get_field' ) ) {
			$fa_version = get_field( 'fa_version', 'option' );
		} else {
			$fa_version = false;
		}

		$this->start_controls_section(
			'heading_tab',
			[
				'label' => esc_html__( 'Title', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		if ( ! $fa_version ) {
			$this->add_control(
				'icon', [
					'label'       => esc_html__( 'Icon', 'ryancv-plugin' ),
					'type'        => Controls_Manager::ICON,
				]
			);
		} else {
			$this->add_control(
				'icon', [
					'label'       => esc_html__( 'Icon', 'ryancv-plugin' ),
					'type'        => Controls_Manager::ICONS,
				]
			);
		}

		$this->add_control(
			'subtitle',
			[
				'label'       => esc_html__( 'Subtitle', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter Subtitle', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Enter Subtitle', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter title', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Enter title', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'       => esc_html__( 'Title Tag', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1'  => __( 'H1', 'ryancv-plugin' ),
					'h2' => __( 'H2', 'ryancv-plugin' ),
					'h3' => __( 'H3', 'ryancv-plugin' ),
					'h4' => __( 'H4', 'ryancv-plugin' ),
					'h5' => __( 'H5', 'ryancv-plugin' ),
					'h6' => __( 'H6', 'ryancv-plugin' ),
					'div' => __( 'DIV', 'ryancv-plugin' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_styling',
			[
				'label'     => esc_html__( 'Title', 'ryancv-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'items_border_color',
			[
				'label'     => esc_html__( 'BG Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-sub-title-icon' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_border_color_d',
			[
				'label'     => esc_html__( 'BG Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-sub-title-icon' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'     => esc_html__( 'Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-sub-title-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'subtitle_color_d',
			[
				'label'     => esc_html__( 'Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-sub-title-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'subtitle_i_color',
			[
				'label'     => esc_html__( 'Icon Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-sub-title-icon svg' => 'fill: {{VALUE}};',
					'{{WRAPPER}} .ar-sub-title-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'subtitle_i_color_d',
			[
				'label'     => esc_html__( 'Icon Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-sub-title-icon svg' => 'fill: {{VALUE}};',
					'.theme-style-dark {{WRAPPER}} .ar-sub-title-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .ar-sub-title-icon',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color_d',
			[
				'label'     => esc_html__( 'Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .ar-title',
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

		if ( function_exists( 'get_field' ) ) {
			$fa_version = get_field( 'fa_version', 'option' );
		} else {
			$fa_version = false;
		}

		?>

		<!-- Heading -->
		<div class="ar-sec-head">
			<?php if ( $settings['subtitle'] ) : ?>
			<!-- subtitle -->
			<div class="ar-sub-title-icon">
				<?php if ( ! $fa_version ) : ?>
				<span class="icon <?php echo esc_attr( $settings['icon'] ); ?>"></span>
				<?php else : ?>
				<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
				<?php endif; ?>
				<span <?php echo $this->get_render_attribute_string( 'subtitle' ); ?>><?php echo wp_kses_post( $settings['subtitle'] ); ?></span>
			</div>
			<?php endif; ?>
			<?php if ( $settings['title'] ) : ?>
			<!-- title -->
			<<?php echo esc_attr( $settings['title_tag'] ); ?> class="ar-title">
				<span <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo wp_kses_post( $settings['title'] ); ?></span>
			</<?php echo esc_attr( $settings['title_tag'] ); ?>>
			<?php endif; ?>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_Heading_Two_Widget() );
