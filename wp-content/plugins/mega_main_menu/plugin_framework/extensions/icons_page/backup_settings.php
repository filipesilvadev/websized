<?php
/**
 * @package MegaMain
 * @subpackage MegaMain
 * @since mm 1.0
 */
	
	/* 
	 * Functions get array of the all setting from DB and create file to download.
	 */
	if ( isset( $_GET['mmpm_page'] ) && !empty( $_GET['mmpm_page'] ) ) {
		if ( $_GET['mmpm_page'] == 'backup_file' ) {
			// Urge file to download instead of opening in the browser window.
			header('Content-type: application/txt');
			header('Content-Disposition: attachment; filename="mega-main-menu-backup-' . date("Y-m-d-H-i") . '.txt"');
			global $mmpm_theme_options;
			$enc = json_encode( $mmpm_theme_options );
			echo $enc;
			die();
		}
	}

	/* 
	 * Functions restore backup data.
	 */
	function mmpm_options_backup() {
		if ( isset( $_FILES[ MMPM_OPTIONS_DB_NAME . '_backup' ] ) && $_FILES[ MMPM_OPTIONS_DB_NAME . '_backup' ]['error'] == 0 ) {
			$backup_file_content = mmpm_get_uri_content( $_FILES[ MMPM_OPTIONS_DB_NAME . '_backup' ]['tmp_name'] );
			if ( $backup_file_content !== false && ( $options_backup = json_decode( $backup_file_content, true ) ) ) {
				if ( isset( $options_backup['last_modified'] ) ) {
					$options_backup['last_modified'] = time() + 30;
					update_option( MMPM_OPTIONS_DB_NAME, $options_backup );
				}
			}
		}
	}
	add_action( 'updated_option', 'mmpm_options_backup', 20 );
?>