<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Info List Two Widget.
 *
 * @since 1.0
 */
class RyanCV_Info_List_Two_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-info-list-two';
	}

	public function get_title() {
		return esc_html__( 'Info List Two', 'ryancv-plugin' );
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
			'content_tab',
			[
				'label' => esc_html__( 'Content', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
			'value', [
				'label'       => esc_html__( 'Value', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter value', 'ryancv-plugin' ),
				'default' => esc_html__( 'Enter value', 'ryancv-plugin' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'items_styling',
			[
				'label'     => esc_html__( 'Styling', 'ryancv-plugin' ),
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
			'items_icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-info-two .ar-icon svg' => 'fill: {{VALUE}};',
					'{{WRAPPER}} .ar-info-two .ar-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_icon_color_d',
			[
				'label'     => esc_html__( 'Icon Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-info-two .ar-icon svg' => 'fill: {{VALUE}};',
					'.theme-style-dark {{WRAPPER}} .ar-info-two .ar-icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_label_color',
			[
				'label'     => esc_html__( 'Label Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-info-two .ar-label' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .ar-info-two .ar-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_label_typography',
				'label'     => esc_html__( 'Label Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-info-two .ar-label',
			]
		);

		$this->add_control(
			'items_value_color',
			[
				'label'     => esc_html__( 'Value Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-info-two .ar-value' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_value_color_d',
			[
				'label'     => esc_html__( 'Value Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-info-two .ar-value' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_value_typography',
				'label'     => esc_html__( 'Value Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-info-two .ar-value',
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
		$this->add_inline_editing_attributes( 'value', 'basic' );

		if ( function_exists( 'get_field' ) ) {
			$fa_version = get_field( 'fa_version', 'option' );
		} else {
			$fa_version = false;
		}

		?>

		<!-- Info List -->
		<div class="styled-gradient styled-gradient-border">
			<div class="ar-info-two box-item align-left">
				<div class="ar-icon">
					<?php if( $settings['icon'] ) : ?>
					<?php if ( ! $fa_version ) : ?>
						<span class="<?php echo esc_attr( $settings['icon'] ); ?>"></span>
					<?php else : ?>
						<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
					<?php endif; ?>
					<?php endif; ?>
					<?php if ( $settings['label'] ) : ?>
					<div class="ar-label">
						<span <?php echo $this->get_render_attribute_string( 'label' ); ?>>
							<?php echo wp_kses_post( $settings['label'] ); ?>
						</span>
					</div>
					<?php endif; ?>
				</div>
				<?php if ( $settings['value'] ) : ?>
				<div class="ar-value">
					<?php if ( $settings['link']['url'] ) : ?>
					<a <?php if ( $settings['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $settings['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $settings['link']['url'] ); ?>">
					<?php endif; ?>
					<span <?php echo $this->get_render_attribute_string( 'value' ); ?>>
						<?php echo wp_kses_post( $settings['value'] ); ?>
					</span>
					<?php if ( $settings['link']['url'] ) : ?>
					</a>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_Info_List_Two_Widget() );
