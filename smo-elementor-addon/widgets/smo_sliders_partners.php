<?php
class Elementor_Sliders_Partners extends \Elementor\Widget_Base {

	public function get_name() {
		return 'smo_sliders_partners';
	}

	public function get_title() {
		return esc_html__( 'Smo Sliders Partners', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-featured-image';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'sliders','partners' ];
	}
	protected function register_controls() {

		
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'smo' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		/*
		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'List Partners', 'smo' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'list_image',
						'label' => esc_html__( 'Partner Image', 'smo' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => '',
					]
				],
				'default' => [
					
				],
				
			]
		);
		*/
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'List Partners', 'smo' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'show_label' => true,
				'default' => [],
			]
		);
			
		$this->end_controls_section();

		// Content Tab End


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( is_array($settings['gallery']) && !empty($settings['gallery']) ) {
		?>
		<div class="slider_partners">
			<div class="slider_partners_cols"> 
			<?php
				$i = 0;
				$count = count($settings['gallery']);
				$col = count($settings['gallery']) / 3;
				foreach (  $settings['gallery'] as $item ) {
				$i++;
				?>
					<div class="partners_item">
						<img src="<?php echo $item['url']; ?>" alt="" />
					</div>
					
				<?php
				if($i % 3 == 0 && $i != $count){
					echo '</div><div class="slider_partners_cols"> ';
				}
				}
			?>
			</div>
		</div>
		<div class="custom-control custom-control-partner center">
			<span class="prev prev_partner" style="">PREV</span>
			<span class="number number-change-partner" style="">01</span>
			<span class="line line_partner"><span style="width: <?php echo (1/$col) * 100 ?>%"></span></span>
			<span class="number" style="">0<?php echo $col; ?></span>
			<span class="next next_partner" style="">NEXT</span>
		</div>
		<?php
		}
	}
}