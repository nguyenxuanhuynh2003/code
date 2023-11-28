<?php
class Elementor_Sliders_Background extends \Elementor\Widget_Base {

	public function get_name() {
		return 'smo_sliders_background';
	}

	public function get_title() {
		return esc_html__( 'Smo Sliders Background', 'elementor-addon' );
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
						'name' => 'list_description',
						'label' => esc_html__( 'Description', 'smo' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'List Description' , 'smo' ),
						'label_block' => false,
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
			]
		);
	
		$this->add_control(
			'height',
			[
				'label' => __( 'Height', 'smo' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '565',
			]
		);
		$this->end_controls_section();

		// Content Tab End


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( is_array($settings['list']) && !empty($settings['list']) ) {
		?>
		<div class="slider_background"> 
		<?php
			foreach (  $settings['list'] as $item ) {
			//var_dump($item['image']);
			?>
				<div class="slider_background_item" style="background-image: url(<?php echo  $item['list_image']['url']; ?>)">
					<div class="slider_background_inner" style="height: <?php echo $settings['height']; ?>px">
						<h3><?php echo $item['list_title']; ?></h3>
						<?php
							if($item['list_description']){
						?>
						<div><?php echo $item['list_description']; ?></div>
						<?php
						}
						?>
					</div>
				</div>
				
			<?php
			}
		?>
		</div>
		<div class="custom-control bottom center">
			<span class="prev prev2" style="">PREV</span>
			<span class="number number-change2" style="">01</span>
			<span class="line line2"><span style="width: <?php echo (1/count($settings['list'])) * 100 ?>%"></span></span>
			<span class="number" style="">0<?php echo count($settings['list']); ?></span>
			<span class="next next2" style="">NEXT</span>
		</div>
		<?php
		}
	}
}