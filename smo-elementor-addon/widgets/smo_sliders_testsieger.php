<?php
class Elementor_Sliders_testsieger extends \Elementor\Widget_Base {

	public function get_name() {
		return 'smo_sliders_testsieger';
	}

	public function get_title() {
		return esc_html__( 'Smo Sliders Testsieger', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-featured-image';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'sliders' ];
	}
	protected function register_controls() {

		
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'smo' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Repeater List', 'smo' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_image',
						'label' => esc_html__( 'Choose Image', 'smo' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => '',
					],
					[
						'name' => 'list_title',
						'label' => esc_html__( 'Title', 'smo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'List Title' , 'smo' ),
						'label_block' => true,
					],
					[
						'name' => 'sub_title',
						'label' => esc_html__( 'Sub Title', 'smo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Sub Title' , 'smo' ),
						'label_block' => true,
					],
					[
						'name' => 'list_des',
						'label' => esc_html__( 'Des', 'smo' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'List Des' , 'smo' ),
						'label_block' => true,
					],

					[
						'name' => 'read_more',
						'label' => esc_html__( 'Read More', 'smo' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Read More' , 'smo' ),
						'label_block' => true,
					],

					[
						'name' => 'des_hover',
						'label' => esc_html__( 'Des Hover', 'smo' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'Des Hover' , 'smo' ),
						'label_block' => true,
					],
					
					
				],
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'smo' ),
						
					],
					[
						'list_title' => esc_html__( 'Title #2', 'smo' ),
						
					],
				],
				'title_field' => '{{{ list_title }}}',
				'des_field' => '{{{ list_des }}}',
				'sub_title' => '{{{ sub_title }}}',
				'des_hover' => '{{{ des_hover }}}',
				'read_more' => '{{{ read_more }}}',
			]
		);
	
		
		$this->end_controls_section();

		// Content Tab End


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( is_array($settings['list']) && !empty($settings['list']) ) {
		?>
		<div class="slider-two-testsieger"> 
		<?php
			foreach (  $settings['list'] as $item ) {
			//var_dump($item['image']);
			?>
				<div class="slider-item">
					<div class="slider-inner">
						<img src="<?php echo  $item['list_image']['url']; ?>" alt="" />
						<div class="slider_content">
							<p class="title"><?php echo $item['list_title']; ?></p>
							<p class="sub_title"><?php echo $item['sub_title'] ?></p>
							<p class="desc"><?php echo $item['list_des'] ?></p>
							<p class="read_more"><?php echo $item['read_more'] ?></p>
							<div class="wrap-content-hover">
								<p class="des_hover"><?php echo $item['des_hover'] ?></p>
							</div>
						</div>
					</div>
				</div>
				
			<?php
			}
		?>
		</div>
		<div class="custom-control center">
			<span class="prev prev4" style="">PREV</span>
			<span class="number number-change4" style="">01</span>
			<span class="line line4"><span style="width: <?php echo (1/count($settings['list'])) * 100 ?>%"></span></span>
			<span class="number" style="">0<?php echo count($settings['list']); ?></span>
			<span class="next next4" style="">NEXT</span>
		</div>
		<?php
		}
	}
}