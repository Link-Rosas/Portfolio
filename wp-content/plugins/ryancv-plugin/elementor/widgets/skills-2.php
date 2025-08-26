<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Skills Two Widget.
 *
 * @since 1.0
 */

class RyanCV_Skills_Two_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-skills-two';
	}

	public function get_title() {
		return esc_html__( 'Skills Two', 'ryancv-plugin' );
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
			'label', [
				'label'       => esc_html__( 'Label', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter label', 'ryancv-plugin' ),
				'default' => esc_html__( 'Enter label', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'progress', [
				'label'       => esc_html__( 'Progress (in %)', 'ryancv-plugin' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 99,
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'URL', 'ryancv-plugin' ),
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
			'items_label_color',
			[
				'label' => esc_html__( 'Label Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ar-skill-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_label_color_d',
			[
				'label' => esc_html__( 'Label Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-skill-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'items_label_typography',
				'label' => esc_html__( 'Label Typography:', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-skill-label',
			]
		);

		$this->add_control(
			'items_pline_color',
			[
				'label' => esc_html__( 'Progress Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ar-skill-progress' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_pline_color_d',
			[
				'label' => esc_html__( 'Progress Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-skill-progress' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_pline2_color',
			[
				'label' => esc_html__( 'Progress Active Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ar-skill-progress .progres' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_pline2_color_d',
			[
				'label' => esc_html__( 'Progress Active Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-skill-progress .progres' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_value_color',
			[
				'label' => esc_html__( 'Value Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ar-skill-value' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_value_color_d',
			[
				'label' => esc_html__( 'Value Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-skill-value' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'items_value_typography',
				'label' => esc_html__( 'Value Typography:', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-skill-value',
			]
		);

		$this->add_control(
			'items_value_b_color',
			[
				'label' => esc_html__( 'Value Border Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .ar-skill-value' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_value_b_color_d',
			[
				'label' => esc_html__( 'Value Border Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-skill-value' => 'border-color: {{VALUE}};',
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

		$this->add_inline_editing_attributes( 'label', 'basic' );

		?>

		<!-- skill item -->
		<div class="styled-gradient styled-gradient-border">
			<div class="ar-skill-item box-item align-left">
				<?php if ( $settings['link']['url'] ) : ?><a <?php if ( $settings['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $settings['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $settings['link']['url'] ); ?>"><?php endif; ?>
				<?php if ( $settings['label'] || $settings['image'] ) : ?>
				<div class="ar-skill-top">
					<?php if( $settings['image']['id'] ) : $image = wp_get_attachment_image_url( $settings['image']['id'], 'ryancv_92x92' ); ?>
					<div class="ar-skill-img">
						<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['label'] ); ?>" />
					</div>
					<?php endif; ?>
					<?php if ( $settings['label'] ) : ?>
					<div class="ar-skill-label">
						<span <?php echo $this->get_render_attribute_string( 'label' ); ?>><?php echo wp_kses_post( $settings['label'] ); ?></span>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				<div class="ar-skill-progress">
					<span class="progres"<?php if ( $settings['progress'] ) : ?> style="width: <?php echo esc_attr( $settings['progress'] ); ?>%;"<?php endif; ?>></span>
				</div>
				<?php if ( $settings['progress'] ) : ?><span class="ar-skill-value"><?php echo esc_attr( $settings['progress'] ); ?>%</span><?php endif; ?>
				<?php if ( $settings['link']['url'] ) : ?></a><?php endif; ?>
			</div>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_Skills_Two_Widget() );
