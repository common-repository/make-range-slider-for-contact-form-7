<?php
add_action( 'wpcf7_init', 'rsfcf7_add_form_tag_button', 10, 0 );

function rsfcf7_add_form_tag_button() {
	wpcf7_add_form_tag(  array('range_slider','range_slider*'), 'rsfcf7_button_form_tag_handler',array(
        'name-attr' => true,
        ) );
    }
    
	function rsfcf7_button_form_tag_handler( $tag ) {
    if ( empty( $tag->name ) ) {
    	return '';
 	}

 	$validation_error = wpcf7_get_validation_error( $tag->name );

    $class = wpcf7_form_controls_class( $tag->type );
  
    $atts = array();

    $atts['name'] = $tag->name;
    $atts['class'] = $tag->get_class_option( $class );
    $atts['id'] = $tag->get_id_option();
    $atts['tabindex'] = $tag->get_option( 'tabindex', 'signed_int', true );
    $rsfcf7_min_range = $tag->get_option( 'min', 'signed_num', true );
    $rsfcf7_max_range = $tag->get_option( 'max', 'signed_num', true );
    $rsfcf7_set_default = $tag->get_option( 'rsfcf7_set_default', '', true );
    $rsfcf7_tooltip_label = $tag->get_option( 'rsfcf7_tooltip_label', '', true );
    $rsfcf7_slider_label = $tag->get_option( 'rsfcf7_slider_label', '', true );

    if($rsfcf7_min_range == '') {
        $rsfcf7_min_val = 0;
    }else {
        $rsfcf7_min_val = $rsfcf7_min_range;
    }

    if($rsfcf7_max_range == '') {
        $rsfcf7_max_val = 100;
    }else {
        $rsfcf7_max_val = $rsfcf7_max_range;
    }

    if($rsfcf7_set_default == '') {
        $rsfcf7_set_default_val = 20;
    }else {
        $rsfcf7_set_default_val = $rsfcf7_set_default;
    }

    $rsfcf7_slider_id = 'rsfcf7_' . $tag->name;

    $html = '' ;

    $html .= '<div class="rslider_container wpcf7-form-control-wrap" data-name="'.$tag->name.'">';
    $html .= '<div class="range_slider_class" id="'.$rsfcf7_slider_id.'" rsfcf7_min_range="'.$rsfcf7_min_val.'" rsfcf7_max_range="'.$rsfcf7_max_val.'" rsfcf7_set_default="'.$rsfcf7_set_default_val.'" rsfcf7_tooltip_label="'.$rsfcf7_tooltip_label.'" rsfcf7_slider_label="'.$rsfcf7_slider_label.'">';
    $html .= '<input type="hidden" class="custom_radio_class '.$tag->name.'" name="'.$tag->name.'"  value="">';
    $html .= '</div>';  
    $html .= '</div>';    
    $html .= '<span  class="wpcf7-form-control-wrap '.sanitize_html_class($tag->name).'">';  
    $html .= $validation_error;
    $html .= '</span>';  
    
    return $html;
}

add_filter( 'wpcf7_validate_range_slider' , 'rsfcf7p_range_slider_validation_filter' , 10, 2 );
add_filter( 'wpcf7_validate_range_slider*' , 'rsfcf7p_range_slider_validation_filter' , 10, 2 ); 
function rsfcf7p_range_slider_validation_filter( $result, $tag ) {
    $dscf7data_image = sanitize_text_field($_POST[$tag->name]);
    
    $value = isset( $_POST[$tag->name] )    ? sanitize_text_field(trim( strtr( (string) $dscf7data_image, "\n", " " ) )) : '';
    if ( 'range_slider' == $tag->basetype ) {
        if ( $tag->is_required() and '' === $value ) {
            $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
        }
    }
    return $result;
}