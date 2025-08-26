<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Hero Widget.
 *
 * @since 1.0
 */
class RyanCV_Hero_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-hero';
	}

	public function get_title() {
		return esc_html__( 'Hero', 'ryancv-plugin' );
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
			'heading_tab',
			[
				'label' => esc_html__( 'Titles', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => esc_html__( 'Subtitle', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter Subtitle', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Subtitle', 'ryancv-plugin' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'label', [
				'label'       => esc_html__( 'Label', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter label', 'ryancv-plugin' ),
				'default' => esc_html__( 'Enter label', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Subtitles', 'ryancv-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ label }}}',
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
				'default'     => esc_html__( 'Title', 'ryancv-plugin' ),
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
			'content_tab',
			[
				'label' => esc_html__( 'Content', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'ryancv-plugin' ),
				'type'        => Controls_Manager::WYSIWYG,
				'dynamic' => [
					'active' => true,
				],
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
			'items_subtitle_color',
			[
				'label'     => esc_html__( 'Subtitle Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-h-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_subtitle_color_d',
			[
				'label'     => esc_html__( 'Subtitle Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-h-subtitle' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_subtitle_typography',
				'label'     => esc_html__( 'Subtitle Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-h-subtitle',
			]
		);

		$this->add_control(
			'items_typed_color',
			[
				'label'     => esc_html__( 'Subtitles Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-words-wrapper .ar-word' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_typed_color_d',
			[
				'label'     => esc_html__( 'Subtitles Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-words-wrapper .ar-word' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_typed_typography',
				'label'     => esc_html__( 'Subtitles Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-words-wrapper .ar-word',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-h-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_color_d',
			[
				'label'     => esc_html__( 'Title Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-h-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'     => esc_html__( 'Title Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-h-title',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Description Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'description_color_d',
			[
				'label'     => esc_html__( 'Description Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'label'     => esc_html__( 'Description Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-text',
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
		$this->add_inline_editing_attributes( 'description', 'basic' );

		?>

		<!-- Hero -->
		<div class="ar-hero">
			<?php if ( $settings['subtitle'] || $settings['items'] ) : ?>
			<div class="ar-h-subtitle">
				<?php if ( $settings['subtitle'] ) : ?>
				<span class="ar-headline"><?php echo esc_html( $settings['subtitle'] ); ?></span>
				<?php endif; ?>
				<?php if ( $settings['items'] ) : ?>
				<span class="ar-headline ar-words-wrapper">
					<?php foreach ( $settings['items'] as $index => $item ) : ?>
					<span class="ar-word is-hidden"><?php echo esc_html( $item['label'] ); ?></span>
					<?php endforeach; ?>
				</span>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<?php if ( $settings['title'] ) : ?>
			<<?php echo esc_attr( $settings['title_tag'] ); ?> class="ar-h-title">
				<span <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo wp_kses_post( $settings['title'] ); ?></span>
			</<?php echo esc_attr( $settings['title_tag'] ); ?>>
			<?php endif; ?>
			<?php if ( $settings['description'] ) : ?>
			<div class="ar-text">
				<div <?php echo $this->get_render_attribute_string( 'description' ); ?>><?php echo wp_kses_post( $settings['description'] ); ?></div>
			</div>
			<?php endif; ?>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_Hero_Widget() );
