<?php

	/* Init shortcodes */
	add_action( 'init', 'stm_shortcode_buttons' );
	function stm_shortcode_buttons() {
		add_filter( "mce_external_plugins", "stm_add_buttons" );
		add_filter( 'mce_buttons_2', 'stm_register_buttons' );
	}
	function stm_add_buttons( $plugin_array ) {
		$plugin_array['stm'] = get_stylesheet_directory_uri() . '/inc/tinymce/shortcodes.js?' . time();
		return $plugin_array;
	}
	function stm_register_buttons( $buttons ) {
		array_push( $buttons,  'shortcodes' ); 
		return $buttons;
	}


	/* Progress bars */
	function shortcode_progress( $atts, $content ){

		$content = str_replace('<br />', '', $content);
		if(!empty($atts['embedded']))
			$return = '<div class="skills embedded">';
		else
			$return = '<div class="skills">';
			$return .= do_shortcode( $content);
			$return .= '</div>';

		return $return;
	}

	function shortcode_progress_bar($attrs){


		$return = '<div class="skill_bar" data-percentage="'.$attrs['percentage'].'">' .
			'<div class="skill_title"><span class="highlight">'.$attrs['title'].'</span> '.$attrs['percentage'].'%</div><div class="skill_percentage" style="width: '.$attrs['percentage'].'%;"></div></div>';

		return $return;
	}
	add_shortcode( 'progress', 'shortcode_progress' );
	add_shortcode( 'bar', 'shortcode_progress_bar' );



	function shortcode_accordion($attrs, $content){

		$content = str_replace('<br />', '', $content);
		$return = '<div class="accordion">';
		$return .= do_shortcode($content);
		$return .= '</div>';

		return $return;

	}

	function shortcode_accordion_toggle($attrs, $content){

		//return '<textarea>'.$content.'</textarea>';

		if($attrs['open'] == 'yes') {
			$style = 'style="display: block;"';
			$class = 'active';
		}
		else 	{
			$style = 'style="display: none;"';
			$class = '';
		}

		$return = '<div class="accordion_title highlight '.$class.'">'.$attrs['title'].'</div>
					<div class="accordion_content" '.$style.'>'.$content.'</div>';

		return $return;
	}
	add_shortcode( 'accordion', 'shortcode_accordion' );
	add_shortcode( 'toggles', 'shortcode_accordion' );
	add_shortcode( 'toggle', 'shortcode_accordion_toggle' );


	add_shortcode( 'tabs', 'shortcode_tabs' );
	add_shortcode( 'tab', 'shortcode_tab' );

	function shortcode_tabs($attrs, $content){

		$content = str_replace('<br />', '', $content);
		$return = '<div class="tabs">';
		$return .= do_shortcode($content);
		$return .= '</div>';

		return $return;
	}
	function shortcode_tab($attrs, $content){

		if($attrs['open'] == 'yes') $class = 'active';
		else 	$class = '';

		$icon = empty($attrs['icon']) ? '' : " fa fa-{$attrs['icon']} fa-lg fa-fw ";

		$return = '<div class="tab_title '.$class.'"><a href="#"><i class="highlight '.$icon.'"></i> '.$attrs['title'].'</a></div>
		<div class="tab_content '.$class.'"><p>'.$content.'</p></div>';

		return $return;
		$return = '<div class="accordion_title highlight active">'.$attrs['title'].'</div>
					<div class="accordion_content" '.$style.'>'.$content.'</div>';

	}

