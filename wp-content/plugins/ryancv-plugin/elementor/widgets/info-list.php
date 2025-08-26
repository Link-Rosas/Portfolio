<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * RyanCV Info List Widget.
 *
 * @since 1.0
 */
class RyanCV_Info_List_Widget extends Widget_Base {

	public function get_name() {
		return 'ryancv-info-list';
	}

	public function get_title() {
		return esc_html__( 'Info List', 'ryancv-plugin' );
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
			'l_type', [
				'label'       => esc_html__( 'Layout Type', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'values',
				'options' => [
					'values'  => __( 'Style-1', 'ryancv-plugin' ),
					'icons'  => __( 'Style-2', 'ryancv-plugin' ),
				],
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
				'condition' => [
                    'l_type' => 'values'
                ],
			]
		);

		$this->add_control(
			'label_two', [
				'label'       => esc_html__( 'Label', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter label', 'ryancv-plugin' ),
				'default' => esc_html__( 'Enter label', 'ryancv-plugin' ),
				'condition' => [
                    'l_type' => 'icons'
                ],
			]
		);

		$this->add_control(
			'v_type', [
				'label'       => esc_html__( 'Value Type', 'ryancv-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'values',
				'options' => [
					'values'  => __( 'Value', 'ryancv-plugin' ),
					'icons'  => __( 'Icons', 'ryancv-plugin' ),
				],
				'condition' => [
					'l_type' => 'icons'
				],
			]
		);

		$this->add_control(
			'value_two', [
				'label'       => esc_html__( 'Value', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter value', 'ryancv-plugin' ),
				'default' => esc_html__( 'Enter value', 'ryancv-plugin' ),
				'condition' => [
					'l_type' => 'icons',
					'v_type' => 'values'
				],
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
				'condition' => [
					'l_type' => 'icons',
					'v_type' => 'values'
				],
			]
		);

		$repeater = new \Elementor\Repeater();

        if ( ! $fa_version ) {
            $repeater->add_control(
                'icon', [
                    'label'       => esc_html__( 'Icon', 'ryancv-plugin' ),
                    'type'        => Controls_Manager::ICON,
                ]
            );
        } else {
        	$repeater->add_control(
                'icon', [
                    'label'       => esc_html__( 'Icon', 'ryancv-plugin' ),
                    'type'        => Controls_Manager::ICONS,
                ]
            );
        }

		$repeater->add_control(
			'tooltip', [
				'label'       => esc_html__( 'Tooltip', 'ryancv-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'Enter tooltip', 'ryancv-plugin' ),
				'default' => esc_html__( 'Enter tooltip', 'ryancv-plugin' ),
			]
		);

		$this->add_control(
			'items_two',
			[
				'label' => esc_html__( 'Icons', 'ryancv-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ tooltip }}}',
                'condition' => [
                    'l_type' => 'icons',
					'v_type' => 'icons'
                ],
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
				'condition' => [
                    'l_type' => 'values'
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
			'items_label_color',
			[
				'label'     => esc_html__( 'Label Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .info-list ul li strong' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .info-list ul li strong' => 'color: {{VALUE}};',
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
					'{{WRAPPER}} .info-list ul li strong' => 'background: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .info-list ul li strong' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_label_typography',
				'label'     => esc_html__( 'Label Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .info-list ul li strong',
			]
		);

		$this->add_control(
			'items_value_color',
			[
				'label'     => esc_html__( 'Value Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .info-list ul li' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .info-list ul li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'items_value_typography',
				'label'     => esc_html__( 'Value Typography', 'ryancv-plugin' ),
				'selector' => '{{WRAPPER}} .info-list ul li',
			]
		);

		$this->add_control(
			'items_icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .service-items .service-item .icon svg' => 'fill: {{VALUE}};',
					'{{WRAPPER}} .service-items .service-item .icon' => 'color: {{VALUE}};',
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
					'.theme-style-dark {{WRAPPER}} .service-items .service-item .icon svg' => 'fill: {{VALUE}};',
					'.theme-style-dark {{WRAPPER}} .service-items .service-item .icon' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_icon_bg_color',
			[
				'label'     => esc_html__( 'Icon BG Color', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .service-items .service-item .icon' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'items_icon_bg_color_d',
			[
				'label'     => esc_html__( 'Icon BG Color (Dark)', 'ryancv-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'.theme-style-dark {{WRAPPER}} .service-items .service-item .icon' => 'background: {{VALUE}};',
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

		$this->add_inline_editing_attributes( 'label_two', 'basic' );
		$this->add_inline_editing_attributes( 'value_two', 'basic' );

		if ( function_exists( 'get_field' ) ) {
			$fa_version = get_field( 'fa_version', 'option' );
		} else {
			$fa_version = false;
		}

		?>

		<!-- content -->
		<?php if ( $settings['l_type'] == 'values' ) : ?>
		<div class="row">
			<?php
				$col_class = 'col col-d-12 col-t-12 col-m-12 col-list-2';

				if ( $settings['columns'] == 1 ) {
					$col_class = 'col col-d-12 col-t-12 col-m-12 col-list-1';
				}
			?>

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
		<?php endif; ?>

		<?php if ( $settings['l_type'] == 'icons' ) : ?>
        <div class="row row-list-2">
            <div class="col col-d-12 col-t-12 col-m-12 border-line-h">
                <div class="info-list">
                    <ul>
                        <li>
                            <?php if ( $settings['label_two'] ) : ?>
                            <strong>
                                <span <?php echo $this->get_render_attribute_string( 'label_two' ); ?>>
                                    <?php echo wp_kses_post( $settings['label_two'] ); ?>
                                </span>
                            </strong>
                            <?php endif; ?>
							<?php if ( $settings['link']['url'] ) : ?>
							<a <?php if ( $settings['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $settings['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $settings['link']['url'] ); ?>">
							<?php endif; ?>
								<?php if ( $settings['value_two'] ) : ?>
								<span <?php echo $this->get_render_attribute_string( 'value_two' ); ?>>
									<?php echo wp_kses_post( $settings['value_two'] ); ?>
								</span>
								<?php endif; ?>
							<?php if ( $settings['link']['url'] ) : ?>
							</a>
							<?php endif; ?>
                            <?php if ( $settings['items_two'] ) : ?>
                            <div class="service-items">
                                <?php foreach ( $settings['items_two'] as $index => $item ) : ?>
                                <div class="service-item">
                                    <?php if( $item['icon'] ) : ?>
                                    <div class="icon i-small">
                                        <?php if ( ! $fa_version ) : ?>
                                            <span class="<?php echo esc_attr( $item['icon'] ); ?>"></span>
                                        <?php else : ?>
                                            <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if( $item['tooltip'] ) : ?>
                                    <div class="toltip">
                                        <span><?php echo wp_kses_post( $item['tooltip'] ); ?></span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
		<?php endif; ?>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new RyanCV_Info_List_Widget() );
