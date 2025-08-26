<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Resume Two Widget.
 *
 * @since 1.0
 */
class RyanCV_Resume_Two_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-resume-two';
	}

	public function get_title() {
		return esc_html__( 'Resume Two', 'ryancv-plugin' );
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
			'date', [
				'label'       => esc_html__( 'Date', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter date', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Enter date', 'ryancv-plugin' ),
			]
		);

		$repeater->add_control(
			'name', [
				'label'       => esc_html__( 'Name', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter name', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Enter name', 'ryancv-plugin' ),
			]
		);

		$repeater->add_control(
			'role', [
				'label'       => esc_html__( 'Role', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter role', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Enter role', 'ryancv-plugin' ),
			]
		);

        $repeater->add_control(
			'text', [
				'label'       => esc_html__( 'Text', 'ryancv-plugin' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Enter text', 'ryancv-plugin' ),
				'default'     => esc_html__( 'Enter text', 'ryancv-plugin' ),
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

		$this->add_control(
			'is_count',
			[
				'label'       => esc_html__( 'Slides per view', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1'  => __( '1', 'ryancv-plugin' ),
					'2' => __( '2', 'ryancv-plugin' ),
				],
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
			'items_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-resume-item .text' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .ar-resume-item .text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_text_typography',
				'label'     => esc_html__( 'Text Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-resume-item .text',
			]
		);

		$this->add_control(
			'items_date_color',
			[
				'label'     => esc_html__( 'Date Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-resume-item .date' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_date_color_d',
			[
				'label'     => esc_html__( 'Date Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .ar-resume-item .date' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_date_typography',
				'label'     => esc_html__( 'Date Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-resume-item .date',
			]
		);

		$this->add_control(
			'items_name_color',
			[
				'label'     => esc_html__( 'Name Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-resume-item .name' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .ar-resume-item .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_name_typography',
				'label'     => esc_html__( 'Name Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-resume-item .name',
			]
		);

		$this->add_control(
			'items_role_color',
			[
				'label'     => esc_html__( 'Role Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .ar-resume-item .company' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .ar-resume-item .company' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_role_typography',
				'label'     => esc_html__( 'Role Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .ar-resume-item .company',
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

		<!-- Resume Two -->
        <?php if ( $settings['items'] ) : ?>
		<div class="ar-resume-carousel<?php if ( $settings['is_dots'] == 0 ) : ?> ar-hide-dots<?php endif; ?>">
			<div class="swiper-container" data-swiper-autoplay="<?php echo esc_attr( $settings['is_autoplay'] ); ?>" data-swiper-delay="<?php echo esc_attr( $settings['is_autoplaytime'] ); ?>" data-swiper-loop="<?php echo esc_attr( $settings['is_loop'] ); ?>" data-swiper-count="<?php echo esc_attr( $settings['is_count'] ); ?>">
				<div class="swiper-wrapper">
					<?php foreach ( $settings['items'] as $index => $item ) :
					$item_date = $this->get_repeater_setting_key( 'date', 'items', $index );
					$this->add_inline_editing_attributes( $item_date, 'none' );

					$item_name = $this->get_repeater_setting_key( 'name', 'items', $index );
					$this->add_inline_editing_attributes( $item_name, 'none' );

					$item_role = $this->get_repeater_setting_key( 'role', 'items', $index );
					$this->add_inline_editing_attributes( $item_role, 'none' );

					$item_text = $this->get_repeater_setting_key( 'text', 'items', $index );
					$this->add_inline_editing_attributes( $item_text, 'basic' );

					?>
					<div class="swiper-slide">
						<div class="ar-resume-item<?php if ( $settings['align'] == 'left' ) : ?> align-left<?php endif; ?>">
							<?php if( $item['date'] ) : ?>
							<div class="date">
								<span <?php echo $this->get_render_attribute_string( $item_date ); ?>>
									<?php echo wp_kses_post( $item['date'] ); ?>
								</span>
							</div>
							<?php endif; ?>
							<?php if( $item['name'] ) : ?>
							<div class="name">
								<span <?php echo $this->get_render_attribute_string( $item_name ); ?>>
									<?php echo wp_kses_post( $item['name'] ); ?>
								</span>
							</div>
							<?php endif; ?>
							<?php if( $item['role'] ) : ?>
							<div class="company">
								<span <?php echo $this->get_render_attribute_string( $item_role ); ?>>
									<?php echo wp_kses_post( $item['role'] ); ?>
								</span>
							</div>
							<?php endif; ?>
							<?php if ( $item['text'] ) : ?>
							<div class="text">
								<div <?php echo $this->get_render_attribute_string( $item_text ); ?>>
									<?php echo wp_kses_post( $item['text'] ); ?>
								</div>
							</div>
							<?php endif; ?>
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

Plugin::instance()->widgets_manager->register( new RyanCV_Resume_Two_Widget() );
