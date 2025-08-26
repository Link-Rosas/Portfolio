<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Numbers Widget.
 *
 * @since 1.0
 */
class RyanCV_Numbers_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-numbers';
	}

	public function get_title() {
		return esc_html__( 'Numbers', 'ryancv-plugin' );
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
			'num',
			[
				'label'       => esc_html__( 'Number', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter Number', 'ryancv-plugin' ),
				'default'     => esc_html__( '50', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'       => esc_html__( 'Number Tag', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'h6',
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

		$this->add_control(
			'label',
			[
				'label'       => esc_html__( 'Label', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter description', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Enter description', 'ryancv-plugin' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'items_styling',
			[
				'label'     => esc_html__( 'Styling', 'ryancv-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'items_num_color',
			[
				'label'     => esc_html__( 'Number Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-stats .num' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_num_color_d',
			[
				'label'     => esc_html__( 'Number Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-stats .num' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_num_typography',
				'label'     => esc_html__( 'Number Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-stats .num',
			]
		);

		$this->add_control(
			'items_label_color',
			[
				'label'     => esc_html__( 'Label Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-stats p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_label_color_d',
			[
				'label'     => esc_html__( 'Label Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-stats p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_label_typography',
				'label'     => esc_html__( 'Label Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-stats p',
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
		$this->add_inline_editing_attributes( 'num', 'basic' );
		$this->add_inline_editing_attributes( 'label', 'basic' );

		?>

		<!-- Numbers -->
		<div class="ar-stats">
			<?php if ( $settings['num'] ) : ?>
			<<?php echo esc_attr( $settings['title_tag'] ); ?> class="num">
				<span <?php echo $this->get_render_attribute_string( 'num' ); ?>><?php echo wp_kses_post( $settings['num'] ); ?></span>
			</<?php echo esc_attr( $settings['title_tag'] ); ?>>
			<?php endif; ?>
			<?php if ( $settings['label'] ) : ?>
			<p>
				<span <?php echo $this->get_render_attribute_string( 'label' ); ?>><?php echo wp_kses_post( $settings['label'] ); ?></span>
			</p>
			<?php endif; ?>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_Numbers_Widget() );
