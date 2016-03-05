<?php

add_action( 'show_user_profile', 'jeg_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'jeg_show_extra_profile_fields' );

function jeg_show_extra_profile_fields( $user ) { ?>
    <h3>Jkreativ SEO Authorship</h3>
    <table class="form-table">
        <tr>
            <th><label for="Google Plus">Google Plus URL</label></th>
            <td>
                <input type="text" name="googleplus" id="googleplus" value="<?php echo esc_attr( get_the_author_meta( 'googleplus', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Google Plus url, ex : https://plus.google.com/117222701933938829686</span>
            </td>
        </tr>
    </table>
<?php }



add_action( 'personal_options_update', 'jeg_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'jeg_save_extra_profile_fields' );

function jeg_save_extra_profile_fields( $user_id ) {
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    update_user_meta( $user_id, 'googleplus', $_POST['googleplus'] );
}


add_action('wp_head', 'jeg_google_authorship');

function jeg_google_authorship() {
    global $post;
    if($post !== null) {
        if($post->post_type === 'portfolio' || $post->post_type === 'page' || $post->post_type === 'post') {
            $googleplusurl = get_the_author_meta( 'googleplus', $post->post_author );
            if($googleplusurl) {
                echo "\n<link rel=\"author\" href=\"" . $googleplusurl . "\" />\n";
            }
        }
    }
}