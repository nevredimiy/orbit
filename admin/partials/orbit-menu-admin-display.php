<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://http://bit.ly/about-litvinov
 * @since      1.0.0
 *
 * @package    Orbit_Menu
 * @subpackage Orbit_Menu/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap orbit-options">

    <h1><?php _e( 'Plugin Options Page', 'orbit-menu' ) ?></h1>


	<form action="options.php" method="POST">
  

	<?php settings_fields( 'orbit_menu_general_group' ); ?>
	<?php do_settings_sections( 'orbit-menu-options' ); ?>
	<?php submit_button(); ?>


    </form>

</div>
