<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Skills Widget.
 *
 * @since 1.0
 */

class RyanCV_Skills_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-skills';
	}

	public function get_title() {
		return esc_html__( 'Skills', 'ryancv-plugin' );
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

		if ( ! $fa_version ) {
			$this->add_control(
				'title_icon',
				[
					'label'       => esc_html__( 'Title Icon', 'ryancv-plugin' ),
					'type'        => Controls_Manager::ICON,
				]
			);
		} else {
			$this->add_control(
				'title_icon',
				[
					'label'       => esc_html__( 'Title Icon', 'ryancv-plugin' ),
					'type'        => Controls_Manager::ICONS,
				]
			);
		}

		$this->end_controls_section();

		$this->start_controls_section(
			'content_tab',
			[
				'label' => esc_html__( 'Content', 'ryancv-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'type',
			[
				'label'       => esc_html__( 'Skills Type', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'percent',
				'options' => [
					'percent'  => __( 'Percent', 'ryancv-plugin' ),
					'dotted' => __( 'Dotted', 'ryancv-plugin' ),
					'circles' => __( 'Circles', 'ryancv-plugin' ),
					'list' => __( 'Knowledges', 'ryancv-plugin' ),
				],
			]
		);

		$this->add_control(
			'style_ui',
			[
				'label'       => esc_html__( 'Style UI', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'  => __( 'Default', 'ryancv-plugin' ),
					'gradient' => __( 'Gradient', 'ryancv-plugin' ),
				],
				'condition' => [
					'type' => ['percent', 'dotted', 'circles']
				]
			]
		);

		$this->add_control(
			'style_skin',
			[
				'label'       => esc_html__( 'Style Skin', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1'  => __( 'Style-1', 'ryancv-plugin' ),
					'style-2' => __( 'Style-2', 'ryancv-plugin' ),
				],
				'condition' => [
					'type' => ['percent', 'dotted']
				]
			]
		);

		$this->add_control(
			'circles_count',
			[
				'label'       => esc_html__( 'Column', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'2'  => __( '2', 'ryancv-plugin' ),
					'3' => __( '3', 'ryancv-plugin' ),
					'4' => __( '4', 'ryancv-plugin' ),
				],
				'condition' => [
					'type' => 'circles'
				]
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
			'progress', [
				'label'       => esc_html__( 'Progress (in %)', 'ryancv-plugin' ),
				'type'        => Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 99,
			]
		);

		$repeater->add_control(
			'image', [
				'label' => esc_html__( 'Image', 'ryancv-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
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
					'{{WRAPPER}} .skill-title .name' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .skill-title .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .skill-title .name',
			]
		);

		$this->add_control(
			'title_icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .skill-title .icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .skill-title .icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_icon_color_d',
			[
				'label'     => esc_html__( 'Icon Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .skill-title .icon' => 'color: {{VALUE}};',
					'.theme-style-dark {{WRAPPER}} .skill-title .icon svg' => 'fill: {{VALUE}};',
				],
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
				'label'     => esc_html__( 'BG Color - Gradient UI', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .styled-gradient .skills-list.circles ul li, {{WRAPPER}} .styled-gradient .skills-list.percent ul li .progress-img, {{WRAPPER}} .styled-gradient .skills-list.dotted ul li .progress-img' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_bg_color_d',
			[
				'label'     => esc_html__( 'BG Color - Gradient UI (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .styled-gradient .skills-list.circles ul li, .theme-style-dark {{WRAPPER}} .styled-gradient .skills-list.percent ul li .progress-img, .theme-style-dark {{WRAPPER}} .styled-gradient .skills-list.dotted ul li .progress-img' => 'background: {{VALUE}};',
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
					'{{WRAPPER}} .skills-list ul li .name' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .skills-list ul li .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'items_label_typography',
				'label' => esc_html__( 'Label Typography:', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .skills-list ul li .name',
			]
		);

		$this->add_control(
			'items_pline_color',
			[
				'label' => esc_html__( 'Progress-Line Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .skills-list ul li .progress' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_pline_color_d',
			[
				'label' => esc_html__( 'Progress-Line Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .skills-list ul li .progress' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_pline2_color',
			[
				'label' => esc_html__( 'Progress-Line Active Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .skills-list ul li .progress .percentage' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_pline2_color_d',
			[
				'label' => esc_html__( 'Progress-Line Active Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .skills-list ul li .progress .percentage' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_dg_color',
			[
				'label' => esc_html__( 'Progress-Dotted Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .skills-list.dotted ul li .progress .dg span' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_dg_color_d',
			[
				'label' => esc_html__( 'Progress-Dotted Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .skills-list.dotted ul li .progress .dg span' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_da_color',
			[
				'label' => esc_html__( 'Progress-Dotted Active Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .skills-list.dotted ul li .progress .da span' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_da_color_d',
			[
				'label' => esc_html__( 'Progress-Dotted Active Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .skills-list.dotted ul li .progress .da span' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_circle_bg_color',
			[
				'label' => esc_html__( 'Circle BG Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .skills-list.circles .progress:after' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_circle_bg_color_d',
			[
				'label' => esc_html__( 'Circle BG Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .skills-list.circles .progress:after' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_circle_color',
			[
				'label' => esc_html__( 'Progress-Circle Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .skills-list.circles .progress' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_circle_color_d',
			[
				'label' => esc_html__( 'Progress-Circle Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .skills-list.circles .progress' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_circle2_color',
			[
				'label' => esc_html__( 'Progress-Circle Active Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .skills-list.circles .progress .bar, {{WRAPPER}} .skills-list.circles .progress .fill' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_circle2_color_d',
			[
				'label' => esc_html__( 'Progress-Circle Active Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .skills-list.circles .progress .bar, .theme-style-dark {{WRAPPER}} .skills-list.circles .progress .fill' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_list_icon_color',
			[
				'label' => esc_html__( 'List Icon Color', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .skills-list.list ul li .name:before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_list_icon_color_d',
			[
				'label' => esc_html__( 'List Icon Color (Dark)', 'ryancv-plugin' ),
				'type' => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .skills-list.list ul li .name:before' => 'color: {{VALUE}};',
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

		$this->add_inline_editing_attributes( 'title', 'basic' );

		if ( function_exists( 'get_field' ) ) {
			$fa_version = get_field( 'fa_version', 'option' );
		} else {
			$fa_version = false;
		}

		?>

		<!-- skill item -->
		<div class="skills-item<?php if ( $settings['style_ui'] == 'gradient' ) : ?> styled-gradient<?php endif; ?><?php if ( $settings['style_skin'] == 'style-2' ) : ?> skills-style-2<?php endif; ?>">
			<div class="skills-list <?php if ( $settings['type'] ) : echo esc_attr( $settings['type'] ); endif; ?><?php if ( $settings['circles_count'] == '3' ) : ?> count-three<?php endif; ?><?php if ( $settings['circles_count'] == '4' ) : ?> count-four<?php endif; ?>">
				<?php if ( $settings['title'] ) : ?>
				<div class="skill-title border-line-h">
					<?php if( $settings['title_icon'] ) : ?>
					<div class="icon">
						<?php if ( ! $fa_version ) : ?>
						<i class="<?php echo esc_attr( $settings['title_icon'] ); ?>"></i>
						<?php else : ?>
						<?php \Elementor\Icons_Manager::render_icon( $settings['title_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php endif; ?>
					</div>
					<?php endif; ?>
					<div class="name">
						<span <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo wp_kses_post( $settings['title'] ); ?></span>
					</div>
				</div>
				<?php endif; ?>

				<?php if ( $settings['items'] ) : ?>
				<ul>
					<?php foreach ( $settings['items'] as $index => $item ) :
						$item_label = $this->get_repeater_setting_key( 'label', 'items', $index );
						$this->add_inline_editing_attributes( $item_label, 'basic' );
					?>
					<li class="border-line-h<?php if ( !empty($item['image']['url']) ) : ?> skills-list-img<?php endif; ?>">
						<?php if ( $item['link']['url'] ) : ?><a <?php if ( $item['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $item['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $item['link']['url'] ); ?>"><?php endif; ?>
						<?php if ( $settings['type'] == 'percent' || $settings['type'] == 'dotted' ) : ?>
						<?php if ( !empty($item['image']['url']) ) : ?><span class="progress-img" style="background-image: url(<?php echo esc_url( $item['image']['url'] ); ?>);"></span><?php endif; ?>
						<?php endif; ?>
						<?php if ( $item['label'] ) : ?>
						<div class="name">
							<span <?php echo $this->get_render_attribute_string( $item_label ); ?>>
								<?php echo wp_kses_post( $item['label'] ); ?>
							</span>
						</div>
						<?php endif; ?>
						<div class="progress <?php if ( $settings['type'] == 'circles' ) : ?>p<?php echo esc_attr( $item['progress'] ); ?><?php endif; ?>">
							<div class="percentage"<?php if ( $item['progress'] ) : ?> style="width:<?php echo esc_attr( $item['progress'] ); ?>%;"<?php endif; ?>></div>
							<?php if ( $settings['type'] == 'circles' ) : ?>
							<span <?php if ( !empty($item['image']['url']) ) : ?>class="progress-img" style="background-image: url(<?php echo esc_url( $item['image']['url'] ); ?>);"<?php endif; ?>><?php echo esc_attr( $item['progress'] ); ?>%</span>
							<?php endif; ?>
							<?php if ( $settings['style_skin'] == 'style-2' && ( $settings['type'] == 'percent' || $settings['type'] == 'dotted' ) ) : ?>
							<span class="progress-value"><?php echo esc_attr( $item['progress'] ); ?>%</span>
							<?php endif; ?>
						</div>
						<?php if ( $item['link']['url'] ) : ?></a><?php endif; ?>
					</li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_Skills_Widget() );
