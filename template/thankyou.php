<?php
/**
 * Template Name: Thank you Template
 * Description: A custom page template added by the plugin.
 */
get_header();
if (!defined('ABSPATH')) {
    require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php'); // Adjust the path if necessary
}

?>
<div class="custom-template-content">
<?php

$transactionStatus =  $_SESSION['executeData']->{"transactionStatus"} ?? '';

update_user_meta($_SESSION['user_id'], 'allinfo', $_SESSION['executeData']);  
update_user_meta($_SESSION['user_id'], 'status', $transactionStatus);   
update_user_meta($_SESSION['user_id'], 'trxID', $_SESSION['executeData']->{"trxID"} ?? ''); 

$to = $_SESSION['user_email']; // Recipient's email
$subject = 'Registration Successful';

$image_url = plugin_dir_url(__FILE__) . '../images/signature.jpg'; // Adjust the path to your image
$child = plugin_dir_url(__FILE__) . '../images/CHILd.png'; // Adjust the path to your image


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
if($transactionStatus == 'Completed'){
    wp_mail($to, $subject, $message, $headers);
	
    the_content() ?? "Thank you! We appreciate your support and look forward to serving you. If you have any questions, please dont hesitate to contact us!";    
    echo "<p>Payment Status: ".$transactionStatus."</p>";
}else{	
	
	global $wpdb;
	$user_id = $_SESSION['user_id']; // Get user ID from session or other source
	if ($user_id) {
		// Delete user meta
		$wpdb->query("DELETE FROM $wpdb->prefix . 'usermeta' WHERE user_id = $user_id");
		// Delete user's posts (optional)
		$wpdb->query("DELETE FROM $wpdb->posts WHERE post_author = $user_id");
		// Delete the user from wp_users table
		$wpdb->query("DELETE FROM $wpdb->users WHERE ID = $user_id");
		//echo "User with ID $user_id has been deleted along with their posts and meta.";
	} 
	
    echo "<p>Payment Status: ".$transactionStatus." Incomplete</p>";
}


$_SESSION['user_email'] = '';
$_SESSION['user_id'] = '';
$_SESSION['executeData'] = '';

?>
</div>
<?php get_footer(); ?>
