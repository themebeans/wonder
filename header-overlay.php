<?php
/**
 * The file for displaying the header overlay, which is called by header.php.
 *
 * @package WordPress
 * @subpackage Wonder
 * @author ThemeBeans
 */

?>
<div id="overlay" class="hide-for-small clearfix">

	<div class="overlay-container">

	    <div class="overlay-inner">

		<div class="row">

			<?php if ( is_active_sidebar( 'overlay_left' ) ) { ?>
				<div class="four columns">
					<?php dynamic_sidebar( 'overlay_left' ) ?>
	      		</div><!-- END .four columns -->
			<?php } ?>

			<?php if ( is_active_sidebar( 'overlay_middle' ) ) { ?>
				<div class="four columns">
					<?php dynamic_sidebar( 'overlay_middle' ) ?>
				</div><!-- END .four columns -->
			<?php } ?>

			<?php if ( is_active_sidebar( 'overlay_right' ) ) { ?>
				<div class="four columns">
					<?php dynamic_sidebar( 'overlay_right' ) ?>
				</div><!-- END .four columns -->
			<?php } ?>

		</div>

	    </div>

	</div>

	<div class="header-controls animated BeanBounceIn">
		<a href="#" class="trigger closed"></a>
	</div>

</div>
