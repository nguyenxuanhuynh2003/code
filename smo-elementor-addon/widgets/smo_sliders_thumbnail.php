<?php
class Elementor_Sliders_Thumbnail extends \Elementor\Widget_Base {

	public function get_name() {
		return 'smo_sliders_thumbnail';
	}

	public function get_title() {
		return esc_html__( 'Smo Sliders Thumbnail', 'elementor-addon' );
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
		<div class="slider_container_thumbnail"> 
			<div class="slider_big_container"> 
				<div class="slider_big"> 
				<?php
					foreach (  $settings['list'] as $item ) {
					//var_dump($item['image']);
					?>
						<div class="slider_big_item">
							<div class="slider_big_item_flex">
								<div class="slider_big_item_img" style="background-image: url(<?php echo  $item['list_image']['url']; ?>)">
								</div>
								<div class="slider_big_item_content">
									<h3><?php echo $item['list_title']; ?></h3>
									<?php
										if($item['list_description']){
									?>
									<p><?php echo $item['list_description']; ?></p>
									<?php
									}
									?>
								</div>
							</div>
						</div>
						
					<?php
					}
				?>
				</div>
				<div class="custom-control bottom3 center">
					<span class="prev prev3" style="">PREV</span>
					<span class="number number-change3" style="">01</span>
					<span class="line line3"><span style="width: <?php echo (1/count($settings['list'])) * 100 ?>%"></span></span>
					<span class="number" style="">0<?php echo count($settings['list']); ?></span>
					<span class="next next3" style="">NEXT</span>
				</div>
			</div>
			<div class="slider_small"> 
			<?php
				foreach (  $settings['list'] as $item ) {
				//var_dump($item['image']);
				?>
					<div class="slider_small_item">
						<div class="slider_small_item_img" style="background-image: url(<?php echo  $item['list_image']['url']; ?>)">
						</div>
					</div>
					
				<?php
				}
			?>
			</div>
		</div>
		
		<?php
		}
	}
}