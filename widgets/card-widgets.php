<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Essential Elementor Card Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class essential_elementor_card_Widget extends \Elementor\Widget_Base {

/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'card';
	}

    /**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Essential Card', 'essential-elementor-widget' );
	}

    	/**
	 * Get widget icon.
	 *
	 * Retrieve widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}
    /**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

    /**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic' ];
	}

    /**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'essential_card', 'faltu', 'practics' ];
	}



    /**
	 * Register Essential widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'All the content goes here', 'essential-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'card_title',
			[
				'label' => esc_html__( 'My Name', 'essential-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => esc_html__( 'Enter your title', 'elementor-oembed-widget' ),
			]
		);
		$this->add_control(
			'card_description',
			[
				'label' => esc_html__( 'Description', 'essential-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'input_type' => 'text',
				'placeholder' => esc_html__( 'Enter your card description', 'elementor-oembed-widget' ),
			]
		);
		$this->add_control(
			'card_url',
			[
				'label' => esc_html__( 'Profile Url', 'essential-elementor-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => esc_html__( 'https://your-link.com', 'elementor-oembed-widget' ),
			]
		);
		$this->add_control(
			'card_empty',
			[
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label' => esc_html__( 'Card Empty' ),
			]
		);

		$this->end_controls_section();

		/******************
		Style Section 
		**************/
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'essential-elementor-widgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//*Controls for title*/
		$this->add_control(
			'title_option',
			[
				'label' => esc_html__( 'Title Option', 'essential-elementor-widgets ' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'selectors' => 'before',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'essential-elementor-widgets ' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				"name" => "title_typography",
				"selector"	=> "{{WRAPPER}} h3",
			]
			);
		
			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'text_shadow',
					'selector' => '{{WRAPPER}} h3',
				]
			);
		$this->add_control(
			'description_option',
			[
				'label' => esc_html__( 'Description Option', 'essential-elementor-widgets ' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'selectors' => 'before',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Color', 'essential-elementor-widgets ' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f00',
				'selectors' => [
					'{{WRAPPER}} .card_description' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				"name" => "description_typography",
				"selector"	=> "{{WRAPPER}} .card_description",
			]
			);
		
			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'text_shadow',
					'selector' => '{{WRAPPER}} .card_description',
				]
			);
		

		$this->end_controls_section();


	}
    /**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$card_title = $settings ["card_title"];
		$card_description = $settings ["card_description"];
		$card_url = $settings ["card_url"];
		$card_empty = $settings ["card_empty"];

		?>
		<!--Rendering output-->
		<div class="card">
		<h3 class="card_title"><?php echo $card_title; ?> </h3>
		<p class="card_description"><?php echo $card_description; ?> </p>
		<p class="card_empty"><?php echo $card_empty; ?> </p>
		<a class="card_url"><?php echo $card_url; ?> </a>
		</div>
		<?php
	}

    
}