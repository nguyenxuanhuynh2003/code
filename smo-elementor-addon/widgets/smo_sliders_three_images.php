<?php
class Elementor_Sliders_Images extends \Elementor\Widget_Base {

	public function get_name() {
		return 'smo_sliders_images';
	}

	public function get_title() {
		return esc_html__( 'Smo Sliders Images', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-featured-image';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'sliders image' ];
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
				],
				'default' => [],
				//'title_field' => '{{{ list_title }}}',
			]
		);
	
		
		$this->end_controls_section();

		// Content Tab End


	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( is_array($settings['list']) && !empty($settings['list']) ) {
		?>
		<div class="slider_three_images"> 
		<?php
			foreach (  $settings['list'] as $item ) {
			?>
				<div class="slider_three_item_image">
					<div class="slider_three_inner_image">
						<img src="<?php echo  $item['list_image']['url']; ?>" alt="" />
					</div>
				</div>
				
			<?php
			}
		?>
		</div>
		<?php
		}
	}
}