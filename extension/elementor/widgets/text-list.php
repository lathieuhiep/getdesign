<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class getdesign_widget_text_list extends Widget_Base {

	public function get_categories() {
		return array( 'getdesign_widgets' );
	}

	public function get_name() {
		return 'getdesign-text-list';
	}

	public function get_title() {
		return esc_html__( 'Text List', 'getdesign' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_heading',
			[
				'label' => esc_html__( 'Heading', 'getdesign' ),
			]
		);

		$this->add_control(
			'icon',
			[
				'label'     =>  esc_html__( 'Icon', 'getdesign' ),
				'type'      => Controls_Manager::ICONS,
				'default'   =>  [
					'value'     =>  'fas fa-exclamation',
					'library'   =>  'solid',
				],
			]
		);

		$this->add_control(
			'heading',
			[
				'label'         =>  esc_html__( 'Heading', 'getdesign' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  esc_html__( 'Những vấn đề bạn đang gặp phải ?', 'getdesign' ),
				'label_block'   =>  true
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_text_list',
			[
				'label' => esc_html__( 'Text List', 'getdesign' ),
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'list_icon',
			[
				'label'     =>  esc_html__( 'Icon', 'getdesign' ),
				'type'      =>  Controls_Manager::ICONS,
				'default'   =>  [
					'value'     =>  'far fa-square',
					'library'   =>  'solid',
				],
			]
		);

		$repeater->add_control(
			'list_text', [
				'label'         =>  esc_html__( 'Text', 'getdesign' ),
				'type'          =>  Controls_Manager::TEXT,
				'default'       =>  esc_html__( 'List Item' , 'getdesign' ),
				'label_block'   =>  true,
			]
		);

		$this->add_control(
			'list',
			[
				'label'     =>  '',
				'type'      =>  Controls_Manager::REPEATER,
				'fields'    =>  $repeater->get_controls(),
				'default'   =>  [
					[
						'list_text' =>  esc_html__( 'List Item #1', 'getdesign' ),
					],
					[
						'list_text' =>  esc_html__( 'List Item #2', 'getdesign' ),
					],
					[
						'list_text' =>  esc_html__( 'List Item #3', 'getdesign' ),
					],
				],
				'title_field' => '{{{ list_text }}}',
			]
		);

		$this->end_controls_section();

		/* Style Heading */
		$this->start_controls_section(
			'style_heading',
			[
				'label' =>  esc_html__( 'Heading', 'getdesign' ),
				'tab'   =>  Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label'     =>  esc_html__( 'Color', 'getdesign' ),
				'type'      =>  Controls_Manager::COLOR,
				'selectors' =>  [
					'{{WRAPPER}} .element-text-list .heading .text-heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'header_typography',
				'selector' => '{{WRAPPER}} .element-text-list .heading .text-heading',
			]
		);

		$this->end_controls_section();

		/* Style List text */
		$this->start_controls_section(
			'style_text_list',
			[
				'label' =>  esc_html__( 'Text List', 'getdesign' ),
				'tab'   =>  Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'text_list_options',
			[
				'label'     =>  esc_html__( 'Text', 'getdesign' ),
				'type'      =>  Controls_Manager::HEADING,
				'separator' =>  'before',
			]
		);

		$this->add_control(
			'text_list_color',
			[
				'label'     =>  esc_html__( 'Color', 'getdesign' ),
				'type'      =>  Controls_Manager::COLOR,
				'selectors' =>  [
					'{{WRAPPER}} .element-text-list ul li span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_list_typography',
				'selector' => '{{WRAPPER}} .element-text-list ul li span',
			]
		);

		$this->add_control(
			'icon_list_options',
			[
				'label'     =>  esc_html__( 'Icon', 'getdesign' ),
				'type'      =>  Controls_Manager::HEADING,
				'separator' =>  'before',
			]
		);

		$this->add_control(
			'icon_list_color',
			[
				'label'     =>  esc_html__( 'Color', 'getdesign' ),
				'type'      =>  Controls_Manager::COLOR,
				'selectors' =>  [
					'{{WRAPPER}} .element-text-list ul li i' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings   =   $this->get_settings_for_display();
		$list       =   $settings['list'];

	?>

		<div class="element-text-list">
            <div class="heading d-flex align-items-center">
                <?php Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>

                <h3 class="text-heading">
		            <?php echo esc_html( $settings['heading'] ); ?>
                </h3>
            </div>


			<?php if ( !empty( $list ) ): ?>

				<ul class="text-list">
					<?php foreach ( $list as $item ): ?>

					<li class="item-list">
						<?php Icons_Manager::render_icon( $item['list_icon'], [ 'aria-hidden' => 'true' ] ); ?>

                        <span>
                            <?php echo esc_html( $item['list_text'] ); ?>
                        </span>
					</li>

					<?php endforeach; ?>
				</ul>

			<?php endif; ?>
		</div>

	<?php

	}

}

Plugin::instance()->widgets_manager->register_widget_type( new getdesign_widget_text_list );