<?php
/**
 * Setup admin option to allow users to hide from member directory.
 */
function sbpp04_plugin_admin_settings() {

    add_settings_field(
        SBPP04_ADMIN_HIDE_DIRECTORY_KEY,
        __( 'Members Hide from Directory', SBPP04_PLUGIN_DOMAIN ),
        'sbpp04_hide_directory_settings',
        'buddypress',
        'bp_xprofile'
    );

    /* This is where you add your setting to BuddyPress ones */
    register_setting(
        'buddypress',
        'sbpp04-hide-directory',
        'sbpp04_hide_directory_validate'
    );

}

add_action( 'bp_register_admin_settings', 'sbpp04_plugin_admin_settings' );

/**
 * This is the display function for your field
 */
function sbpp04_hide_directory_settings() {
    $sbpp04_hide_directory = bp_get_option( SBPP04_ADMIN_HIDE_DIRECTORY_KEY );
    ?>
    <input id="<?php echo SBPP04_ADMIN_HIDE_DIRECTORY_KEY ?>" name="<?php echo SBPP04_ADMIN_HIDE_DIRECTORY_KEY ?>" type="checkbox" value="1" <?php checked( $sbpp04_hide_directory ); ?> />
    <label for="<?php echo SBPP04_ADMIN_HIDE_DIRECTORY_KEY ?>"><?php _e( 'Allow registered members to hide from the directory', 'simple-buddypress-profile-privacy' ); ?></label>
    <?php
}

/**
 * This is validation function for your field
 */
function sbpp04_hide_directory_validate( $option = 0 ) {
    return intval( $option );
}
