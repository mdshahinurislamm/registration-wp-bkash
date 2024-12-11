<?php
/*
Plugin Name: Custom Registration By AAMRA Infotainment LTD.
Description: A custom registration plugin with email notification By AAMRA Infotainment LTD.
Version: 1.0
Author: Md. Shahinur Islam
*/

defined('ABSPATH') || exit;

// Include shortcode functionality
require_once plugin_dir_path(__FILE__) . 'includes/shortcode.php';
require_once plugin_dir_path(__FILE__) . 'bkash/payment.php';

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

    // var_dump(implode(',', $extra));
    // exit;
    $to = $email; // Recipient's email
    $subject = 'Registration Successful';

    $image_url = plugin_dir_url(__FILE__) . 'images/signature.jpg'; // Adjust the path to your image
    $child = plugin_dir_url(__FILE__) . 'images/CHILd.png'; // Adjust the path to your image


    // Your HTML template
    $message = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
        }
        .email-container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #0073e6;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            line-height: 1.6;
        }
        .email-body h2 {
            color: #0073e6;
            margin-top: 0;
        }
        .email-body p {
            margin: 10px 0;
        }
        .email-body ul {
            padding-left: 20px;
        }
        .email-body ul li {
            margin-bottom: 5px;
        }
        .email-footer {
            background-color: #f7f7f7;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #999;
        }
        .social-links a {
            text-decoration: none;
            color: #0073e6;
            margin: 0 5px;
        }
        .social-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <h1>Zero Olympiad Registration</h1>
        </div>

        <!-- Body -->
        <div class="email-body">
            <h2>Dear Candidate,</h2>
            <p>আসসালামু আলাইকুম,</p>
            <p>জিরো অলিম্পিয়াডে রেজিস্ট্রেশন করার জন্য তোমাকে ধন্যবাদ।</p>

            <h3>জাতিসংঘের কোর্স</h3>
            <p>Zero Olympiad এ রেজিস্ট্রেশন করায় তুমি পাচ্ছ United Nations Institute for Training and Research (UNITAR) এবং UN Climate Change Learning Partnership (UNCC ELearn) থেকে জাতিসংঘ স্বীকৃত পাঁচটি কোর্স করার সুযোগ।</p>
            <ul>
                <li><a href="https://unccelearn.org/course/view.php?id=142&page=overview">Gender Equality and Human Rights in Climate Action and Renewable Energy</a></li>
                <li><a href="https://event.unitar.org/full-catalog/net-zero-101-what-why-and-how">Net Zero 101: What, Why and How</a></li>
                <li><a href="https://unccelearn.org/course/view.php?id=170&page=overview">Introduction to Sustainable Development in Practice</a></li>
                <li><a href="https://unccelearn.org/course/view.php?id=174&page=overview">A Participant Guide of the UN Climate Change Process</a></li>
            </ul>
            <p>
                কোর্সের লিংকে ক্লিক করে এই কোর্সগুলো অনলাইনে বিনামুল্যে নিজের সুবিধামত সময়ে করা যাবে। কোর্স সম্পন্ন করার সাথে সাথে জাতিসংঘের এই প্রতিষ্ঠান থেকেই সার্টীফিকেট প্রদান করা হবে। আরএই কোর্স থেকেই Zero Olympiad এর ১ম রাউন্ডের ২০টি MCQ প্রশ্ন থাকবে। পরবর্তী জীবনে বায়োডাটা/সিভি/রিজিউম/প্রোফাইল/পোর্টফলিওতে এই কোর্স সম্পন্ন করার তথ্য উল্লেখ করলে প্রাপ্ত সার্টিফিকেট প্রেজেন্ট করলে নিঃসন্দেহে তা তোমাকে অন্যদের থেকে এগিয়ে রাখবে। 
            </p>
            <p>
            <a href="https://www.linkedin.com/in/faatihaaayat/details/education/1635530014059/single-media-viewer/?profileId=ACoAADgVvEkBEW6lg7lO2ylt3Rpojq3UYZ7sb-Q">ফাতিহা আয়াত ২০২৩ সালে এই কোর্স করেছিল</a> যা তাকে জাতিসংঘে বিভিন্ন বিষয়ে বক্তব্য রাখার সুযোগ পেতে দারুণ সাহায্য করে।
            </p>

            <h3>প্রথম রাউন্ডের MCQ পরীক্ষা</h3>
            <p>
                পরীক্ষা অনুষ্ঠিত হবে ১০ জানুয়ারী। ২০টি প্রশ্ন থাকবে। প্রতি প্রশ্নে ৫ মার্ক হিসেবে মোট ১০০ মার্কের পরীক্ষা। ভুল উত্তরের জন্য কোন নম্বর কাটা যাবে না।
            </p>
             
            <p>
                আমাদের ওয়েবসাইট ও সোশ্যাল মিডিয়ায় পরীক্ষায় অংশগ্রহণের লিংক দেয়া থাকবে / এই লিংকে ক্লিক করে ১০ জানুয়ারি সারাদিনের যেকোন সময় পরীক্ষা দাও। 
            </p>
            <p>
                সর্বোচ্চ নম্বর প্রাপ্তির ভিত্তিতে দ্বিতীয় রাউন্ডে উত্তীর্ণদের ইমেইল করে সেই রাউন্ডের নিয়ম কানুন জানানো হবে। যারা উত্তীর্ণ হবে না, তাদেরকে ইমেইল করে পাঠানো হবে Zero Olympiad এর প্রথম রাউন্ডে অংশগ্রহণের সার্টিফিকেট। আর জাতিসংঘের কোর্স গুলোতে অংশ গ্রহণের সার্টিফিকেটতো সেই কোর্স শেষ করার পরপরই জাতিসংঘ থেকেই পেয়ে যাবে।    
            </p><br>

            <p>Assalamu Alaikum,</p>
            <p>Thank you for registering for the Zero Olympiad.</p>

            <h3>UN Courses</h3>
            <p>Registering for the Zero Olympiad gives you access to five UN-accredited courses from the United Nations Institute for Training and Research (UNITAR) and the UN Climate Change Learning Partnership (UNCC ELearn).</p>
            <ul>
                <li><a href="https://unccelearn.org/course/view.php?id=142&page=overview">Gender Equality and Human Rights in Climate Action and Renewable Energy</a></li>
                <li><a href="https://event.unitar.org/full-catalog/net-zero-101-what-why-and-how">Net Zero 101: What, Why and How</a></li>
                <li><a href="https://unccelearn.org/course/view.php?id=170&page=overview">Introduction to Sustainable Development in Practice</a></li>
                <li><a href="https://unccelearn.org/course/view.php?id=174&page=overview">A Participant Guide of the UN Climate Change Process</a></li>
            </ul>
            <p>
                These courses can be taken online for free at your own convenience by clicking on the course link. A certificate will be issued by the UN organization upon completion of the course. This course will contain 20 MCQ questions from the first round of the Zero Olympiad. In your professional life, mentioning the information of completing this course in your BioData/CV/Resume/Profile/Portfolio and presenting the certificate obtained will undoubtedly move you ahead of others.
            </p>
            <p>
            <a href="https://www.linkedin.com/in/faatihaaayat/details/education/1635530014059/single-media-viewer/?profileId=ACoAADgVvEkBEW6lg7lO2ylt3Rpojq3UYZ7sb-Q">Faatiha Aayat did this course in 2023,</a> which helped her a lot in getting the opportunity to speak at the United Nations on various topics.
            </p>

            <h3>First Round MCQ Exam</h3>
            <p>
                The exam will be held on Friday 10 January, 2025. There will be 20 questions. Each question carries 5 marks, making the exam 100 marks in total. No marks will be deducted for wrong answers.
            </p>
             
            <p>
                The link to participate in the exam will be provided on our website and social media / Click on this link and take the exam anytime during the day on January 10.
            </p>
            <p>
                Based on the highest marks, those who qualify for the second round will be informed by email about the rules and regulations of that round. Those who do not pass will be sent an email with a certificate of participation in the first round of Zero Olympiad. And the certificate of participation in the United Nations courses will be received from the United Nations immediately after completing the course.
            </p>

            <p>Thanking you,</p>
            <p>
                <img src="'.$image_url.'" alt="signature" style="width: 150px; height: auto;"><br>
                <strong>Faatiha Aayat</strong><br>
                Founder of <br>
                <img src="'.$child.'" alt="logo" style="width: 150px; height: auto;"><br>
                13 Years-Old UN, Harvard & TEDx Speaker<br>
                Child Rights Activist & Climate Campaigner<br>
                Winner of President’s Award For Outstanding Academic Excellence <br>
                Champion in NYC Urban Debate League 2022<br>
                Carbon Footprint 👣🌎: 10.4 Tonnes Annually<br>
            </p>

            <h3>Social Media</h3>
            <p class="social-links">
                <a href="https://fb.com/FaatihaAayatOfficial">https://fb.com/FaatihaAayatOfficial</a><br>
                <a href="https://fb.com/zeroolympiad">https://fb.com/zeroolympiad</a><br>
                <a href="https://fb.com/FaatihaAayatGlobal">https://fb.com/FaatihaAayatGlobal</a><br>
                <a href="https://fb.com/groups/Zeroolympiad">https://fb.com/groups/Zeroolympiad</a><br>
                <a href="https://fb.com/groups/Faatiha.Aayat">https://fb.com/groups/Faatiha.Aayat</a><br>
            </p>

            <h3>Website</h3>
            <p class="social-links">
                <a href="http://zeroolympiad.com">http://zeroolympiad.com</a><br>
                <a href="https://faatihaaayat.com/zeroolympiad">https://faatihaaayat.com/zeroolympiad</a>
            </p>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            &copy; 2024 Zero Olympiad. All rights reserved.
        </div>
    </div>
</body>
</html>
';

    // Set headers for HTML email
    $headers = [
        'Content-Type: text/html; charset=UTF-8',
    ];

    // Send the email
    wp_mail($to, $subject, $message, $headers);

    // Redirect to a thank-you page

    wp_redirect(home_url('/thank-you/'));
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
