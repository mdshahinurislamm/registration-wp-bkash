<?php
/*
Plugin Name: Custom Registration By AAMRA Infotainment LTD.
Description: A custom registration plugin with email notification By AAMRA Infotainment LTD.
Version: 1.0
Author: Md. Shahinur Islam
*/
defined('ABSPATH') || exit;
session_start();

// Include shortcode functionality
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';
// require_once plugin_dir_path(__FILE__) . 'bkash/token.php';

add_action('wp_enqueue_scripts', 'custom_registration_front_styles');
function custom_registration_front_styles($hook) {       
    wp_enqueue_script(
		'custom-registration',
		plugin_dir_url( __FILE__ ) . 'js/jquery-1.8.3.min.js',
		array('jquery'),
		'1.0.0',
		false
	);    
    wp_enqueue_style(
        'custom-registration-style-css',
        plugin_dir_url( __FILE__ ) . 'js/style.css',
        array(),
        '1.0.0',
        'all'
    );  
}
add_action('admin_enqueue_scripts', 'custom_registration_admin_styles');
function custom_registration_admin_styles($hook) {     
    if ($hook == 'toplevel_page_registered-users') {
        wp_enqueue_script(
            'custom-registration-dataTables',
            plugin_dir_url( __FILE__ ) . 'js/dataTables.min.js',
            array('jquery'),
            '1.0.0',
            false
        );  

        wp_enqueue_style(
            'custom-registration-dataTables-css',
            plugin_dir_url( __FILE__ ) . 'js/dataTables.min.css',
            array(),
            '1.0.0',
            'all'
        );  
        
    }  
}

// Hook to handle form submission
add_action('admin_post_nopriv_custom_registration', 'handle_custom_registration');
add_action('admin_post_custom_registration', 'handle_custom_registration');

function handle_custom_registration() {
    if (!isset($_POST['custom_registration_nonce']) || !wp_verify_nonce($_POST['custom_registration_nonce'], 'custom_registration')) {
        wp_die('Security check failed!');
    }    

    // Collect and sanitize input
    $category = sanitize_text_field($_POST['category']);
    $trxID = sanitize_text_field($_POST['trxID']);
    $email = sanitize_email($_POST['email']);
    $name = sanitize_text_field($_POST['name']);
    $phone = sanitize_text_field($_POST['phone']);
    $district = sanitize_text_field($_POST['district']);
    $institution = sanitize_text_field($_POST['institution']);
    $education_type = sanitize_text_field($_POST['education_type']);
    $class = sanitize_text_field($_POST['class']);
    //$extra = sanitize_text_field($_POST['extra']);
    $extra = isset($_POST['extra']) ? array_map('sanitize_text_field', $_POST['extra']) : [];
    $amount = sanitize_text_field($_POST['amount']);
    $status = sanitize_text_field($_POST['status']);
    $username = sanitize_user($_POST['username']);
    $password = $_POST['password'];

    // Create the user
    $user_id = wp_create_user($username, $password, $email);

    if (is_wp_error($user_id)) {
        wp_die($user_id->get_error_message());
    }

    $amount = '300';
    $status = 'Pending';

    // Update user meta
    update_user_meta($user_id, 'category', $category);
    update_user_meta($user_id, 'trxID', $trxID);
    update_user_meta($user_id, 'name', $name);
    update_user_meta($user_id, 'phone', $phone);
    update_user_meta($user_id, 'district', $district);
    update_user_meta($user_id, 'institution', $institution);
    update_user_meta($user_id, 'education_type', $education_type);
    update_user_meta($user_id, 'class', $class);
    update_user_meta($user_id, 'extra', implode(',', $extra));
    update_user_meta($user_id, 'amount', $amount);
    update_user_meta($user_id, 'status', $status);    

    $_SESSION['user_email'] = $email;    
    $_SESSION['user_id'] = $user_id;    
    // Redirect to a thank-you page
    wp_redirect(home_url('wp-content/plugins/bkash-registration/bkash/createpayment.php'));
    exit;
}

// Add custom admin menu for viewing user data
add_action('admin_menu', 'custom_registration_admin_menu');

function custom_registration_admin_menu() {
    add_menu_page(
        'Registered Users',        // Page title
        'Registered Users',        // Menu title
        'manage_options',          // Capability
        'registered-users',        // Menu slug
        'custom_registration_admin_page', // Callback function
        'dashicons-admin-users',   // Icon
        20                         // Position
    );
}
function custom_registration_admin_page() {
    // Fetch all users
    $users = get_users();

    echo '<div class="wrap">';
    echo '<h1>Registered Users</h1>';
    echo '<table class="wp-list-table widefat fixed striped" id="example" class="display" style="width:100%">';
    echo '<thead>
            <tr>
                <th>Category</th>
                <th>Email</th>
                <th>Name</th>
                <th>Phone</th>
                <th>District</th>
                <th>Institution</th>
                <th>Education Type</th>
                <th>Class</th>
                <th>Extra</th>
                <th>Amount</th>
                <th>TrxID</th>
                <th>Status</th>
                <th>Username</th>
            </tr>
          </thead>';
    echo '<tbody>';

    foreach ($users as $user) {
        // Retrieve user meta
        $category = get_user_meta($user->ID, 'category', true);
        $name = get_user_meta($user->ID, 'name', true);
        $phone = get_user_meta($user->ID, 'phone', true);
        $district = get_user_meta($user->ID, 'district', true);
        $institution = get_user_meta($user->ID, 'institution', true);
        $education_type = get_user_meta($user->ID, 'education_type', true);
        $class = get_user_meta($user->ID, 'class', true);
        $extra = get_user_meta($user->ID, 'extra', true);
        $amount = get_user_meta($user->ID, 'amount', true);
        $trxID = get_user_meta($user->ID, 'trxID', true);
        $status = get_user_meta($user->ID, 'status', true);

        echo '<tr>';
        echo '<td>' . esc_html($category) . '</td>';
        echo '<td>' . esc_html($user->user_email) . '</td>';
        echo '<td>' . esc_html($name) . '</td>';
        echo '<td>' . esc_html($phone) . '</td>';
        echo '<td>' . esc_html($district) . '</td>';
        echo '<td>' . esc_html($institution) . '</td>';
        echo '<td>' . esc_html($education_type) . '</td>';
        echo '<td>' . esc_html($class) . '</td>';
        echo '<td>' . esc_html($extra) . '</td>';
        echo '<td>' . esc_html($amount) . '</td>';
        echo '<td>' . esc_html($trxID) . '</td>';
        echo '<td>' . esc_html($status) . '</td>';
        echo '<td>' . esc_html($user->user_login) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    ?>
     <script>
        jQuery(document).ready(function() {
            jQuery('#example').DataTable(); // Initialize DataTable
        });
    </script>
    <?php
}



// loading template-----------------------------------------
add_filter('theme_page_templates', 'ctp_register_custom_template');
add_filter('template_include', 'ctp_load_custom_template');

// Register the custom template
function ctp_register_custom_template($templates) {    
    $templates['thankyou.php'] = 'Thank You Template';
    return $templates;
}

// Load the custom template
function ctp_load_custom_template($template) {
    if (is_page() && get_page_template_slug() === 'thankyou.php') {
        $plugin_template = plugin_dir_path(__FILE__) . 'template/thankyou.php';
        if (file_exists($plugin_template)) {
            return $plugin_template;
        }
    }
    return $template;
}
