<?php
/**
 * Widget Name: Bean Newsletter
 */

// Register widget.
add_action(
	'widgets_init', function() {
		return register_widget( 'Bean_Newsletter_Widget' );
	}
);

class Bean_Newsletter_Widget extends WP_Widget {

	// Constructor
	function __construct() {
		parent::__construct(
			'bean_newsletter', // Base ID
			__( 'Newsletter', 'wonder' ), // Name
			array( 'description' => __( 'Display a newsletter subscribe field.', 'wonder' ) ) // Args
		);
	}



	/*
	===================================================================*/
	/*
	  DISPLAY WIDGET
	/*===================================================================*/
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		// WIDGET VARIABLES
		$placeholder   = $instance['placeholder'];
		$subscribecode = $instance['subscribecode'];
		$desc          = $instance['desc'];

		// BEFORE WIDGET
		echo $before_widget;

		?>

		<?php
		if ( $title ) {
			echo $before_title . $title . $after_title;}
?>

			<?php
			if ( $desc != '' ) :
?>
<p><?php echo $desc; ?></p><?php endif; ?>

			<form action="<?php echo $subscribecode; ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">

				<input type="email" name="EMAIL" class="email-newsletter" id="mce-EMAIL" value="<?php echo $placeholder; ?>" required="" onfocus="this.value='';" onblur="if(this.value=='')this.value='<?php echo $placeholder; ?>';">

				<input type="submit" value="<?php esc_html_e( 'Subscribe', 'wonder' ); ?>" class="button">

			</form><!-- END .form -->

		<?php

		// AFTER WIDGET
		echo $after_widget;
	}




	/*
	===================================================================*/
	/*
	  UPDATE WIDGET
	/*===================================================================*/
	function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		// STRIP TAGS TO REMOVE HTML - IMPORTANT FOR TEXT IMPUTS
		$instance['title']         = strip_tags( $new_instance['title'] );
		$instance['subscribecode'] = stripslashes( $new_instance['subscribecode'] );
		$instance['placeholder']   = stripslashes( $new_instance['placeholder'] );
		$instance['desc']          = stripslashes( $new_instance['desc'] );

		return $instance;
	}




	/*
	===================================================================*/
	/*
	  WIDGET SETTINGS (FRONT END PANEL)
	/*===================================================================*/
	function form( $instance ) {

		// WIDGET DEFAULTS
		$defaults = array(
			'title'         => 'Newsletter Widget',
			'placeholder'   => 'Enter your email address...',
			'subscribecode' => '',
			'desc'          => 'This is a nice and simple  email newsletter widget. Yuppers.',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title / Intro:', 'wonder' ); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>


		<p style="margin-top: -8px;">
		<textarea class="widefat" rows="5" cols="15" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo $instance['desc']; ?></textarea>
		</p>


		<p>
		<label for="<?php echo $this->get_field_id( 'placeholder' ); ?>"><?php esc_html_e( 'Placeholder Text:', 'wonder' ); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'placeholder' ); ?>" name="<?php echo $this->get_field_name( 'placeholder' ); ?>" value="<?php echo $instance['placeholder']; ?>" />
		</p>


		<p>
		<label for="<?php echo $this->get_field_id( 'subscribecode' ); ?>"><?php esc_html_e( 'Subscribe Code:', 'wonder' ); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'subscribecode' ); ?>" name="<?php echo $this->get_field_name( 'subscribecode' ); ?>" value="<?php echo $instance['subscribecode']; ?>" />
		</p>

	<?php
	} // END FORM

} // END CLASS
?>
