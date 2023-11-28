<?php
class Elementor_Sliders extends \Elementor\Widget_Base {

	public function get_name() {
		return 'smo_sliders';
	}

	public function get_title() {
		return esc_html__( 'Smo Sliders', 'elementor-addon' );
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
	
		
		$this->end_controls_section();

		// Content Tab End


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( is_array($settings['list']) && !empty($settings['list']) ) {
		?>
		<div class="slider_three"> 
		<?php
			foreach (  $settings['list'] as $item ) {
			//var_dump($item['image']);
			?>
				<div class="slider_three_item">
					<div class="slider_three_inner">
						<img src="<?php echo  $item['list_image']['url']; ?>" alt="" />
						<h3><?php echo $item['list_title']; ?></h3>
					</div>
				</div>
				
			<?php
			}
		?>
		</div>
		<div class="custom-control center">
			<span class="prev prev1" style="">PREV</span>
			<span class="number number-change" style="">01</span>
			<span class="line line1"><span style="width: <?php echo (1/count($settings['list'])) * 100 ?>%"></span></span>
			<span class="number" style="">0<?php echo count($settings['list']); ?></span>
			<span class="next next1" style="">NEXT</span>
		</div>
		<?php
		}
	}
}