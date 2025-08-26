<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV About Me Widget.
 *
 * @since 1.0
 */
class RyanCV_About_Me_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-about-me';
	}

	public function get_title() {
		return esc_html__( 'About Me', 'ryancv-plugin' );
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
				'label' => esc_html__( 'Title', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'label', [
				'label'       => esc_html__( 'Label', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter label', 'ryancv-plugin' ),
				'default' => esc_html__( 'Enter label', 'ryancv-plugin' ),
			]
		);

		$repeater->add_control(
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

		$repeater->add_control(
			'link', [
				'label' => esc_html__( 'URL', 'ryancv-plugin' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'show_external' => true,
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Items', 'ryancv-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'columns_styling',
			[
				'label' => esc_html__( 'Columns', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'columns',
			[
				'label'       => esc_html__( 'Columns', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 2,
				'options' => [
					1 => 1,
					2 => 2,
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
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .content .title' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .content .title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .content .title',
			]
		);

		$this->add_control(
			'circle_color',
			[
				'label'     => esc_html__( 'Circle Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .content .title:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'circle_color_d',
			[
				'label'     => esc_html__( 'Circle Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .content .title:before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'description_styling',
			[
				'label'     => esc_html__( 'Description', 'ryancv-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .content.about .text-box' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'description_color_d',
			[
				'label'     => esc_html__( 'Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .content.about .text-box' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .content.about .text-box',
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
			'items_label_color',
			[
				'label'     => esc_html__( 'Label Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .content.about .info-list ul li strong' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .content.about .info-list ul li strong' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_label_bg',
			[
				'label'     => esc_html__( 'Label Background Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .content.about .info-list ul li strong' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_label_bg_d',
			[
				'label'     => esc_html__( 'Label Background Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .content.about .info-list ul li strong' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_label_typography',
				'label'     => esc_html__( 'Label Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .content.about .info-list ul li strong',
			]
		);

		$this->add_control(
			'items_value_color',
			[
				'label'     => esc_html__( 'Value Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .content.about .info-list' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .content.about .info-list' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_value_typography',
				'label'     => esc_html__( 'Value Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .content.about .info-list',
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
		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_inline_editing_attributes( 'description', 'basic' );

		?>

		<!-- About -->
		<div class="content about">

			<?php if ( $settings['title'] ) : ?>
			<!-- title -->
			<<?php echo esc_attr( $settings['title_tag'] ); ?> class="title">
				<span <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo wp_kses_post( $settings['title'] ); ?></span>
			</<?php echo esc_attr( $settings['title_tag'] ); ?>>
			<?php endif; ?>

			<!-- content -->
			<div class="row">
				<?php
					$col_class = 'col col-d-6 col-t-12 col-m-12';

					if ( $settings['columns'] == 1 ) {
						$col_class = 'col col-d-12 col-t-12 col-m-12';
					}
				?>

				<?php if ( $settings['description'] ) : ?>
				<div class="<?php echo esc_attr( $col_class );?> border-line-v">
					<div class="text-box">
						<div <?php echo $this->get_render_attribute_string( 'description' ); ?>><?php echo wp_kses_post( $settings['description'] ); ?></div>
					</div>
				</div>
				<?php endif; ?>

				<?php if ( $settings['items'] ) : ?>
				<div class="<?php echo esc_attr( $col_class );?> border-line-v">
					<div class="info-list">
						<ul>
							<?php foreach ( $settings['items'] as $index => $item ) :
						    $item_label = $this->get_repeater_setting_key( 'label', 'items', $index );
						    $this->add_inline_editing_attributes( $item_label, 'basic' );

						    $item_value = $this->get_repeater_setting_key( 'value', 'items', $index );
						    $this->add_inline_editing_attributes( $item_value, 'basic' );
						    ?>
							<li>
								<strong>
									<span <?php echo $this->get_render_attribute_string( $item_label ); ?>>
										<?php echo wp_kses_post( $item['label'] ); ?>
									</span>
								</strong>
								<?php if ( $item['link']['url'] ) : ?>
								<a <?php if ( $item['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $item['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $item['link']['url'] ); ?>">
								<?php endif; ?>
									<span <?php echo $this->get_render_attribute_string( $item_value ); ?>>
										<?php echo wp_kses_post( $item['value'] ); ?>
									</span>
								<?php if ( $item['link']['url'] ) : ?>
								</a>
								<?php endif; ?>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<?php endif; ?>

				<div class="clear"></div>
			</div>

		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_About_Me_Widget() );
