<?php
class Elementor_Sliders_News extends \Elementor\Widget_Base {

	public function get_name() {
		return 'smo_sliders_news';
	}

	public function get_title() {
		return esc_html__( 'Smo Sliders News', 'elementor-addon' );
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
						'name' => 'date',
						'label' => esc_html__( 'Date', 'smo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Date' , 'smo' ),
						'label_block' => true,
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
						'name' => 'list_description',
						'label' => esc_html__( 'Description', 'smo' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => esc_html__( 'List Description' , 'smo' ),
						'label_block' => true,
					],
					[
						'name' => 'text_hover',
						'label' => esc_html__( 'More', 'smo' ),
						'type' => \Elementor\Controls_Manager::TEXTAREA,
						'default' => esc_html__( 'Text Hover' , 'smo' ),
						'label_block' => true,
					],
					[
						'name' => 'text_url',
						'label' => esc_html__( 'Title Url', 'smo' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'default' => esc_html__( 'Text Url' , 'smo' ),
						'label_block' => true,
					],
					[
						'name' => 'website_link',
						'label' => esc_html__( 'Link', 'smo' ),
						'type' => \Elementor\Controls_Manager::URL,
						'options' => [ 'url', 'is_external', 'nofollow' ],
						'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
						],
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
		<div class="slider_news"> 
		<?php
			foreach (  $settings['list'] as $item ) {
			//var_dump($item['image']);
			?>
				<div class="slider_news_item">
					<div class="slider_news_inner">
						<img src="<?php echo $item['list_image']['url'] ?>">
						<div class="content_slider_news">
							<div class="box_slider_news">
								<p class="date_news"><?php echo $item['date'] ?></p>
								<h3 class="title_news"><?php echo $item['list_title'] ?></h3>
								<p class="sub_title_news"><?php echo $item['sub_title'] ?></p>
								<div class="wrap_des_news">
									<p><?php echo $item['list_description'] ?></p>
									<?php if($item['text_hover']){ ?>
									<div class="block_des">
										<div  style="display: flex; align-items: center;">
											<p style="margin-right: 20px; margin-bottom: 0;"><strong>Mehr erfahren</strong></p>
											<svg xmlns="http://www.w3.org/2000/svg" width="6.815" height="12.145" viewBox="0 0 6.815 12.145">
											  <g id="arrow-down-s-line" transform="translate(0 12.145) rotate(-90)">
											    <path id="Path_624" data-name="Path 624" d="M6.072,5.33,11.4,0l.743.743L6.072,6.815,0,.743.644,0Z" transform="translate(0 0)"/>
											  </g>
											</svg>

										</div>
										<p class="des_hover"><?php echo $item['text_hover'] ?></p>
									</div>
									<?php } ?>
								</div>
							</div>
							<?php
								if ( ! empty( $item['website_link']['url'] ) ) {
								$this->add_link_attributes( 'website_link', $item['website_link'] );
								}
							?>
							<?php if($item['text_url']){ ?>
							<div class="btn_detail">
								<a <?php echo $this->get_render_attribute_string( 'website_link' ); ?>><?php echo $item['text_url'] ?>
								<svg xmlns="http://www.w3.org/2000/svg" width="9.322" height="15.255" viewBox="0 0 9.322 15.255">
									  <path id="Path_866" data-name="Path 866" d="M14.154,13.264,8.222,7.332,9.917,5.637l7.627,7.627L9.917,20.891,8.222,19.2Z" transform="translate(-8.222 -5.637)" fill="#fff"/>
									</svg>
								</a>
							</div>
							<?php } ?>
							
						</div>
					</div>
				</div>
				
			<?php
			}
		?>
		</div>
		<div class="custom-control center bg_black_slider">
			<span class="prev prev5" style="">PREV</span>
			<span class="number number-change5" style="">01</span>
			<span class="line line5"><span style="width: <?php echo (1/count($settings['list'])) * 100 ?>%"></span></span>
			<span class="number" style="">0<?php echo count($settings['list']); ?></span>
			<span class="next next5" style="">NEXT</span>
		</div>
		<?php
		}
	}
}