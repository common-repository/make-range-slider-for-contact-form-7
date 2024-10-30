<?php
 add_action( 'wpcf7_admin_init', 'rsfcf7_add_tag_generator_button', 55, 0 );
  
  function rsfcf7_add_tag_generator_button() {
      $tag_generator = WPCF7_TagGenerator::get_instance();
      $tag_generator->add( 'range_slider', __( 'range slider', 'range-slider-for-contact-form-7' ),
          'rsffcf7_tag_generator_button', array( 'nameless' => 1 ) );
  }
  
  function rsffcf7_tag_generator_button( $contact_form, $args = '' ) {
      $args = wp_parse_args( $args, array() );
  
      $description = __( "Generate a form-tag for a range-slider tag. For more details, see %s.", 'range-slider-for-contact-form-7' );
  
      $desc_link = wpcf7_link( __( 'https://contactform7.com/submit-button/', 'range-slider-for-contact-form-7' ), __( 'Submit button', 'range-slider-for-contact-form-7' ) );
  
      $type = 'range_slider';
  ?>
  <div class="control-box">
  <fieldset>
  <legend><?php echo sprintf( esc_html( $description ), $desc_link ); ?></legend>
  
  <table class="form-table">
  <tbody>
    <tr>
	<th scope="row"><?php echo esc_html( __( 'Field type', 'range-slider-for-contact-form-7' ) ); ?></th>
	<td>
		<fieldset>
		<legend class="screen-reader-text"><?php echo esc_html( __( 'Field type', 'range-slider-for-contact-form-7' ) ); ?></legend>
		<label><input type="checkbox" name="required" /> <?php echo esc_html( __( 'Required field', 'range-slider-for-contact-form-7' ) ); ?></label>
		</fieldset>
	</td>
	</tr>
      <tr>
        <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>"><?php echo esc_html( __( 'Name', 'range-slider-for-contact-form-7' ) ); ?></label>
        </th>
        <td>
          <input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" />
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id attribute', 'range-slider-for-contact-form-7' ) ); ?></label>
        </th>
        <td>
          <input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" />
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class attribute', 'range-slider-for-contact-form-7' ) ); ?></label></th>
        <td>
          <input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" />
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-rsfcf7_range_option' ); ?>"><?php echo esc_html( __( 'Slider Show', 'range-slider-for-contact-form-7' ) ); ?></label>
        </th>
        <td>
          <label>
            <input type="radio" name="rsfcf7_range_option" id="<?php echo esc_attr( $args['content'] . '-rsfcf7_range_option' );?>" value="rsfcf7_single_range" class="option" checked="checked"><?php echo esc_html( __( 'Single Slider', 'range-slider-for-contact-form-7' ) ); ?>
            <input type="radio" name="rsfcf7_range_option" id="<?php echo esc_attr( $args['content'] . '-rsfcf7_range_option' );?>" value="rsfcf7_double_range" class="option" disabled><?php echo esc_html( __( 'Double Slider', 'range-slider-for-contact-form-7' ) ); ?><br>
            <label class="rsfcf7_comman_link"><?php echo esc_html( __('This Option Available in ','range-slider-for-contact-form-7') );?><a href="https://www.topsmodule.com/product/range-slider-for-contact-form-7/" target="_blank"><?php echo esc_html( __('Pro Version','range-slider-for-contact-form-7') );?></a></label>
          </label>
        </td>
      </tr>
      <tr>
        <th scope="row"><?php echo esc_html( __( 'Range', 'range-slider-for-contact-form-7' ) ); ?></th>
          <td>
            <fieldset>
            <legend class="screen-reader-text"><?php echo esc_html( __( 'Range', 'range-slider-for-contact-form-7' ) ); ?></legend>
            <label>

            <?php echo esc_html( __( 'Min', 'range-slider-for-contact-form-7' ) ); ?>
            <input type="number" name="min" value="0" class="numeric option" />
            </label>
            &ndash;
            <label>
            <?php echo esc_html( __( 'Max', 'range-slider-for-contact-form-7' ) ); ?>
            <input type="number" name="max" value="100" class="numeric option" />
            </label>
            </fieldset>
          </td>
      </tr>
      <tr>
        <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-rsfcf7_set_default' ); ?>"><?php echo esc_html( __( 'Set Range', 'range-slider-for-contact-form-7' ) ); ?></label>
        </th>
        <td>
          <label>
            <input type="text" name="rsfcf7_set_default" value="20" id="<?php echo esc_attr( $args['content'] . '-rsfcf7_set_default' ); ?>" class="setdefaultval oneline option" />
          </label>
          <p class="description">
              <?php echo esc_html( __( 'For use double range slider set range with - sign. ', 'range-slider-for-contact-form-7' ) ); ?><br/><?php echo esc_html( __( '(e.g. 20-40)', 'range-slider-for-contact-form-7' ) ); ?>
          </p>
        </td>
      </tr>
    	<tr>
        <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-rsfcf7_tooltip_label' ); ?>"><?php echo esc_html( __( 'Tooltip', 'range-slider-for-contact-form-7' ) ); ?></label>
        </th>
        <td>
          <label>
            <input type="radio" name="rsfcf7_tooltip_label" id="<?php echo esc_attr( $args['content'] . '-rsfcf7_tooltip_label' );?>" value="true" class="option"><?php echo esc_html( __( 'Yes', 'range-slider-for-contact-form-7' ) ); ?>
            <input type="radio" name="rsfcf7_tooltip_label" id="<?php echo esc_attr( $args['content'] . '-rsfcf7_tooltip_label' );?>" value="false" class="option"  checked="checked"><?php echo esc_html( __( 'No', 'range-slider-for-contact-form-7' ) ); ?> 
          </label>
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-rsfcf7_step_value' ); ?>"><?php echo esc_html( __( 'Step', 'range-slider-for-contact-form-7' ) ); ?></label>
        </th>
        <td>
          <label>
            <input type="number" name="rsfcf7_step_value" value="5" id="<?php echo esc_attr( $args['content'] . '-rsfcf7_step_value' );?>" class="numeric option" disabled>
          </label>
          <label class="rsfcf7_comman_link"><?php echo esc_html( __('This Option Available in ','range-slider-for-contact-form-7') );?><a href="https://www.topsmodule.com/product/range-slider-for-contact-form-7/" target="_blank"><?php echo esc_html( __('Pro Version','range-slider-for-contact-form-7') );?></a></label>
        </td>
      </tr>
      <tr>
        <th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-rsfcf7_slider_label' ); ?>"><?php echo esc_html( __( 'Range Label', 'range-slider-for-contact-form-7' ) ); ?></label>
        </th>
        <td>
          <label>
            <input type="radio" name="rsfcf7_slider_label" id="<?php echo esc_attr( $args['content'] . '-rsfcf7_slider_label' );?>" value="true" class="option" checked="checked"><?php echo esc_html( __( 'Enable', 'range-slider-for-contact-form-7' ) ); ?>
            <input type="radio" name="rsfcf7_slider_label" id="<?php echo esc_attr( $args['content'] . '-rsfcf7_slider_label' );?>" value="false" class="option"><?php echo esc_html( __( 'Disable', 'range-slider-for-contact-form-7' ) ); ?> 
          </label>
        </td>
      </tr>
  </tbody>
  </table>
  </fieldset>
  </div>
  <div class="insert-box">
      <input type="text" name="<?php echo $type; ?>" class="tag code" readonly="readonly" onfocus="this.select()" />
      
      <div class="submitbox">
      <input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'range-slider-for-contact-form-7' ) ); ?>" />
      </div>
  </div>
  <?php
  }
?>