<?php

require_once WPCF7_PLUGIN_DIR . '/includes/functions.php';
require_once WPCF7_PLUGIN_DIR . '/includes/l10n.php';
require_once WPCF7_PLUGIN_DIR . '/includes/formatting.php';
require_once WPCF7_PLUGIN_DIR . '/includes/pipe.php';
require_once WPCF7_PLUGIN_DIR . '/includes/shortcodes.php';
require_once WPCF7_PLUGIN_DIR . '/includes/capabilities.php';
require_once WPCF7_PLUGIN_DIR . '/includes/contact-form-template.php';
require_once WPCF7_PLUGIN_DIR . '/includes/contact-form.php';
require_once WPCF7_PLUGIN_DIR . '/includes/mail.php';
require_once WPCF7_PLUGIN_DIR . '/includes/submission.php';
require_once WPCF7_PLUGIN_DIR . '/includes/upgrade.php';
require_once WPCF7_PLUGIN_DIR . '/includes/integration.php';

if ( is_admin() ) {
	require_once WPCF7_PLUGIN_DIR . '/admin/admin.php';
} else {
	require_once WPCF7_PLUGIN_DIR . '/includes/controller.php';
}

class WPCF7 {

	public static function load_modules() {
		self::load_module( 'acceptance' );
		self::load_module( 'akismet' );
		self::load_module( 'checkbox' );
		self::load_module( 'count' );
		self::load_module( 'date' );
		self::load_module( 'file' );
		self::load_module( 'flamingo' );
		self::load_module( 'listo' );
		self::load_module( 'number' );
		self::load_module( 'quiz' );
		self::load_module( 'really-simple-captcha' );
		self::load_module( 'recaptcha' );
		self::load_module( 'response' );
		self::load_module( 'select' );
		self::load_module( 'submit' );
		self::load_module( 'text' );
		self::load_module( 'textarea' );
	}

	protected static function load_module( $mod ) {
		$dir = WPCF7_PLUGIN_MODULES_DIR;

		if ( empty( $dir ) || ! is_dir( $dir ) ) {
			return false;
		}

		$file = path_join( $dir, $mod . '.php' );

		if ( file_exists( $file ) ) {
			include_once $file;
		}
	}

	public static function get_option( $name, $default = false ) {
		$option = get_option( 'wpcf7' );

		if ( false === $option ) {
			return $default;
		}

		if ( isset( $option[$name] ) ) {
			return $option[$name];
		} else {
			return $default;
		}
	}

	public static function update_option( $name, $value ) {
		$option = get_option( 'wpcf7' );
		$option = ( false === $option ) ? array() : (array) $option;
		$option = array_merge( $option, array( $name => $value ) );
		update_option( 'wpcf7', $option );
	}
}

add_action( 'plugins_loaded', 'wpcf7' );

function wpcf7() {
	wpcf7_load_textdomain();
	WPCF7::load_modules();

	/* Shortcodes */
	add_shortcode( 'contact-form-7', 'wpcf7_contact_form_tag_func' );
	add_shortcode( 'contact-form', 'wpcf7_contact_form_tag_func' );
}

add_action( 'init', 'wpcf7_init' );

function wpcf7_init() {
	wpcf7_get_request_uri();
	wpcf7_register_post_types();

	do_action( 'wpcf7_init' );
}

add_action( 'admin_init', 'wpcf7_upgrade' );

function wpcf7_upgrade() {
	$old_ver = WPCF7::get_option( 'version', '0' );
	$new_ver = WPCF7_VERSION;

	if ( $old_ver == $new_ver ) {
		return;
	}

	do_action( 'wpcf7_upgrade', $new_ver, $old_ver );

	WPCF7::update_option( 'version', $new_ver );
}

/* Install and default settings */

add_action( 'activate_' . WPCF7_PLUGIN_BASENAME, 'wpcf7_install' );

function wpcf7_install() {
	if ( $opt = get_option( 'wpcf7' ) )
		return;

	wpcf7_load_textdomain();
	wpcf7_register_post_types();
	wpcf7_upgrade();

	if ( get_posts( array( 'post_type' => 'wpcf7_contact_form' ) ) )
		return;

	$contact_form = WPCF7_ContactForm::get_template( array(
		'title' => sprintf( __( 'Contact form %d', 'contact-form-7' ), 1 ) ) );

	$contact_form->save();
}