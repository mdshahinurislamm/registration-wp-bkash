<?php
//cat 1-----------------------------------
function custom_registration_form_shortcode() {
    ob_start();
    ?>
<form class="form-group" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">

    <input type="hidden" name="action" value="custom_registration">
    <?php wp_nonce_field('custom_registration', 'custom_registration_nonce'); ?>


    <input type="hidden" name="category" value="Category-1">

    <label>Name: ( নাম ) <span>*</span></label>
    <input type="text" name="name" required><br>


    <label>Phone: ( ফোন ) <span>*</span></label>
    <input type="text" name="phone" required><br>

    <label>District: ( জেলা ) <span>*</span></label>
    <input type="text" name="district" required><br>

    <label>Educational Institution: ( শিক্ষা প্রতিষ্ঠান )<span>*</span></label>
    <input type="text" name="institution" required><br>

    <label>Education Type: ( শিক্ষার ধরণ )</label>
    <select name="education_type" required>
        <option value="" disabled selected>শিক্ষার ধরণ</option>
        <option value="বাংলা মাধ্যম (বাংলা  ইংরেজি ভারসন)">বাংলা মাধ্যম (বাংলা ইংরেজি ভারসন)</option>
        <option value="ইংরেজি মাধ্যম (IGCSE & IB)">ইংরেজি মাধ্যম (IGCSE & IB)</option>
        <option value="মা্রাসা (আলিয় ও কওমি)">মাদরাসা (আলিয়া কওমি)</option>
    </select><br>

    <label>In January 2025, what class are you a student of? ২০২৫ সালের জানুয়ারি মাস তুমি কোন ক্লাসের
        স্টুডন্ট? From Fifth to Eighth Grade - Choose Your Class পঞ্চম থেকে অষ্টম শ্রেণীর শিক্ষার্থীরা তোমাদের ক্লাশ
        বেছে নাও<span>*</span></label>
    <select name="class">
        <option selected>তোমাদের ক্লাশ বেছে নাও</option>
        <option value="পঞ্চম শ্রেণী, Grade 5, PYP 5, তাইসির, সমমান">পঞ্চম শ্রেণী, Grade 5, PYP 5, তাইসির, সমমান</option>
        <option value="ষষ্ঠ শ্রেণী, Grade 6, MYP 1, মিজান, সমমান">ষষ্ঠ শ্রেণী, Grade 6, MYP 1, মিজান, সমমান</option>
        <option value="সপ্তম শ্রেণী, Grade 7, MYP 2, নাহবেমীর">সপ্তম শ্রেণী, Grade 7, MYP 2, নাহবেমীর</option>
        <option value="অষ্টম শ্রেণী, Grade 8, MYP 3, হেদায়েতুন্নাহু">অষ্টম শ্রেণী, Grade 8, MYP 3, হেদায়েতুন্নাহু
        </option>
        <option value="একটিও নয়, অন্যান্য">একটিও নয়, অন্যান্য</option>
    </select><br>

    <!-- <label>Extra:</label><br> -->
    <input type="hidden" name="extra[]" value="n/a">
    <!-- <label for="vehicle1"> I have a bike</label><br>
        <input type="checkbox" name="extra" value="test2">
        <label for="vehicle1"> I have a bike</label><br>
        <input type="checkbox" name="extra" value="test3">
        <label for="vehicle1"> I have a bike</label><br> -->

    <!-- <label>Amount:</label> -->
    <input type="hidden" name="amount" readonly value="300">
    <input type="hidden" name="trxID" readonly id="trxID">
    <!-- <label>Status:</label> -->
    <input type="hidden" name="status" readonly required id="status">

    <label>Email: <span>*</span></label>
    <input type="email" name="email" required><br>

    <label>Username: <span>*</span></label>
    <input type="text" name="username" required><br>

    <label>Password:<span>*</span></label>
    <input type="password" name="password" required><br>

    <?php //echo do_shortcode( '[payment_form]' );?>
    <p id='submit'><button type='submit'>Register</button></p>

</form>

<?php
    return ob_get_clean();
}

add_shortcode('cat_1_registration_form', 'custom_registration_form_shortcode');

//cat 2-----------------------------------
function custom_registration_form_shortcode2() {
    ob_start();
    ?>
<form class="form-group" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" id="myForm12">
    <input type="hidden" name="action" value="custom_registration">
    <?php wp_nonce_field('custom_registration', 'custom_registration_nonce'); ?>

    <input type="hidden" name="category" value="Category-2">

    <label>Name: ( নাম ) <span>*</span></label>
    <input type="text" name="name" required><br>

    <label>Phone: ( ফোন )<span>*</span></label>
    <input type="text" name="phone" required><br>

    <label>District: ( জেলা ) <span>*</span></label>
    <input type="text" name="district" required><br>

    <label>Educational Institution: ( শিক্ষা প্রতিষ্ঠান ) <span>*</span></label>
    <input type="text" name="institution" required><br>

    <label>Education Type: ( শিক্ষার ধরণ )</label>
    <select name="education_type" required>
        <option>শিক্ষার ধরণ</option>
        <option value="বাংলা মাধ্যম (বাংলা  ইংরেজি ভারসন)">বাংলা মাধ্যম (বাংলা ইংরেজি ভারসন)</option>
        <option value="ইংরেজি মাধ্যম (IGCSE & IB)">ইংরেজি মাধ্যম (IGCSE & IB)</option>
        <option value="মা্রাসা (আলিয় ও কওমি)">মাদরাসা (আলিয়া কওমি)</option>
    </select><br>

    <label>In January 2025, what class are you a student of? ২০২৫ সালের জানুয়ারি মাসে তুমি কোন ক্লাসের স্টুডেন্ট? From
        9th
        to 12th Grade - Choose Your Class পঞ্চম থেকে অষ্টম শ্রেণীর শিক্ষার্থীরা তোমাদের ক্লাশ বেছে নাও
        <span>*</span></label>
    <select name="class">
        <option>শিক্ষা্থীরা তোমাদের ক্লাশ বেছে নাও</option>
        <option value="নবম শ্রেণী, Grade 9, MYP 4, কাফিয়া ও বেকায়া, সমমান">নবম শ্রেণী, Grade 9, MYP 4, কাফিয়া ও
            বেকায়া, সমমান</option>
        <option value="দশম শ্রেণী, Grade 10, MYP 5, কাফিয়া ও বেকায়া, সমমান">দশম শ্রেণী, Grade 10, MYP 5, কাফিয়া ও
            বেকায়া, সমমান</option>
        <option value="এসএসসি পরিক্ষার্থী, O Level Candidate, কাফিয়া ও বেকায়া সমমান">এসএসসি পরিক্ষার্থী, O Level
            Candidate, কাফিয়া ও বেকায়া সমমান</option>
        <option value="একাদশ শ্রেণী, Grade 11, DP 1, জালালাইন, সমমান">একাদশ শ্রেণী, Grade 11, DP 1, জালালাইন, সমমান
        </option>
        <option value="দ্বাদশ শ্রেণী, Grade 12, DP 2, জালালাইন, সমমান">দ্বাদশ শ্রেণী, Grade 12, DP 2, জালালাইন, সমমান
        </option>
        <option value="এইচএসসি পরিক্ষার্থী, A Level Candidate, জালালাইন সমমান">এইচএসসি পরিক্ষার্থী, A Level Candidate,
            জালালাইন সমমান</option>
        <option value="একটি নয়, অনান্য">একটি নয়, অনান্য</option>

    </select><br>

    <label>
        জিরো অলিম্পিয়াড আয়োজনে ফাতিহা আয়াতের সাথে নীচের কোন কোন কাজ তুমি করতে চাও?
        Which of the following activities would you like to do with Faatiha Aayat in the Zero Olympiad? <span>*</span>
    </label><br>

    <div class="info_con">
        <div class="check_check"><input type="checkbox" name="extra[]" id="extra1" value="campus-ambassador"></div>
        <p class="p_text">ক্যাম্পাস অ্যাম্বাসেডর হিসেবে রেজিস্ট্রেশন কালেক্ট করা, জাতিসংঘ থেকে প্রদত্ত কোর্সের উপর
            অনলাইন ও অফলাইনে পাঠচক্র পরিচালনা করা ইত্যাদি কাজ করতে চাই | বেস্ট ক্যাম্পাস অ্যাম্বাসেডরকে অ্যাওয়ার্ড
            প্রদান করা হবে | </p>
        <p class="p_b p_text">Being a campus ambassador, I want to collect registrations, conduct online and offline
            study session of the course provided by the United Nations etc. | The best campus ambassador will be awarded
        </p>

    </div>

    <div class="info_con">
        <div class="check_check"> <input type="checkbox" id="extra2" name="extra[]" value="event-management"></div>
        <p class=" p_text"> ঢাকায় গ্র্যান্ড ফিনালে অনুষ্ঠানে ইভেন্ট ম্যানেজমেন্টের কাজ করতে চাই | বেস্ট ইভেন্ট
            ম্যানেজারকে অ্যাওয়ার্ড প্রদান করা হবে |</p>
        <p class="p_b p_text">I want to work in event management at the grand finale in Dhaka | The best event manager
            will be awarded.</p>
    </div>

    <div class="info_con">
        <div class="check_check"> <input type="checkbox" id="extra3" name="extra[]" value="social-media"></div>
        <p class=" p_text"> পেইজ, গ্রুপ, ইভেন্ট, চ্যানেল এর অ্যডমিন হিসেবে সোশ্যাল মিডিয়া ক্যাম্পেইনের যাবতীয় কাজ করতে
            চাই | বেস্ট সোশ্যাল মিডিয়া ক্যাম্পেইনারকে অ্যাওয়ার্ড প্রদান করা হবে |</p>
        <p class="p_b p_text"> I want to do all the work of social media campaigns as an admin of pages, groups, events,
            channels | The best social media campaigner will be awarded</p>
    </div>

    <div class="info_con">
        <div class="check_check"><input type="checkbox" id="extra4" name="extra[]" value="competitor-only"></div>
        <p class=" p_text"> জিরো অলিম্পিয়াডে শুধুমাত্র প্রতিযোগী হিসেবে অংশ নিয়ে চাই, এরকম কোন কাজ করতে চাই না | </p>
        <p class="p_b p_text"> I want only to participate in the Zero Olympiad as a competitor, I don't want to do any
            such work.</p>
    </div>

    <div id="errorMessage" style="color: red; display: none;">Please select at least one option.</div><br>

    <!-- <label>Amount:</label> -->
    <input type="hidden" name="amount" readonly value="300">
    <input type="hidden" name="trxID" readonly id="trxID">
    <!-- <label>Status:</label> -->
    <input type="hidden" name="status" readonly required id="status">

    <label>Email: <span>*</span></label>
    <input type="email" name="email" required><br>

    <label>Username: <span>*</span></label>
    <input type="text" name="username" required><br>

    <label>Password: <span>*</span></label>
    <input type="password" name="password" required><br>
    <p id='submit'><button type='submit'>Register</button></p>

</form>

<script>
document.getElementById('myForm12').addEventListener('submit', function(event) {
    // Get all checkboxes
    const checkboxes = document.querySelectorAll('input[name="extra[]"]');
    let isChecked = false;

    // Check if at least one checkbox is checked
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            isChecked = true;
        }
    });

    // If none are checked, prevent form submission and show an error
    if (!isChecked) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('errorMessage').style.display = 'block';
    } else {
        document.getElementById('errorMessage').style.display = 'none';
    }
});
</script>

<?php
    return ob_get_clean();
}

add_shortcode('cat_2_registration_form', 'custom_registration_form_shortcode2');

//cat 3-----------------------------------
function custom_registration_form_shortcode3() {
    ob_start();
    ?>
<form class="form-group" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" id="myForm12">
    <input type="hidden" name="action" value="custom_registration">
    <?php wp_nonce_field('custom_registration', 'custom_registration_nonce'); ?>

    <input type="hidden" name="category" value="Category-3">

    <label>Name: ( নাম ) <span>*</span></label>
    <input type="text" name="name" required><br>

    <label>Phone: ( ফোন )<span>*</span></label>
    <input type="text" name="phone" required><br>

    <label>District: ( জেলা )<span>*</span></label>
    <input type="text" name="district" required><br>

    <label>Educational Institution: ( শিক্ষা প্রতিষ্ঠান )<span>*</span></label>
    <input type="text" name="institution" required><br>

    <label>Education Type: ( শিক্ষার ধরণ )</label>
    <select name="education_type" required>
        <option>শিক্ষার ধরণ</option>
        <option value="বাংলা মাধ্যম (বাংলা  ইংরেজি ভারসন)">বাংলা মাধ্যম (বাংলা ইংরেজি ভারসন)</option>
        <option value="ইংরেজি মাধ্যম (IGCSE & IB)">ইংরেজি মাধ্যম (IGCSE & IB)</option>
        <option value="মা্রাসা (আলিয় ও কওমি)">মাদরাসা (আলিয়া কওমি)</option>
    </select><br>

    <p>In January 2025, what class are you a student of? ২০২৫ সালের জানুয়ারি মাসে তুমি
        কোন ক্লাসের
        স্টুডেন্ট? <span style="color: red;">*</span></p>
    <p style="margin: 0;">ডিগ্রি পাস, স্নাতক সম্মান, স্নাতকোত্তর, মেডিক্যাল, ইঞ্জিনিয়ারিং, মেরিন, মেরিন ফিশারিজ,
        ডিপ্লোমা, কাওমি ও আলিয়া
        মাদ্রাসা, অন্যান্য ছাত্রছাত্রীরা বেছে নাও</p>
    <p style="margin: 0;">Degree Pass, Bachelor's Honours, Postgraduate, Medical, Engineering, Marine, Marine Fisheries,
        Diploma, Qawmi &
        Alia Madrasa, Other Students</p>

    <select name="class" required>
        <option>Choose Your Class </option>
        <option value="১ম বর্ষ, ফাজিল, মেশকাত">১ম বর্ষ, ফাজিল, মেশকাত</option>
        <option value="২য় বর্ষ, ফাজিল, মেশকাত">২য় বর্ষ, ফাজিল, মেশকাত</option>
        <option value="তয় বর্ষ, ফাজিল, মেশকাত">তয় বর্ষ, ফাজিল, মেশকাত</option>
        <option value="৪র্থ বর্ষ, ফাজল, মেশকাত">৪র্থ বর্ষ, ফাজল, মেশকাত</option>
        <option value="৫ম বর্ষ, ইন্টার্ণ, ফাজিল, মেশকাত">৫ম বর্ষ, ইন্টার্ণ, ফাজিল, মেশকাত</option>
        <option value="স্নাতকোত্তর, কামিল, দাওরা">স্নাতকোত্তর, কামিল, দাওরা</option>
    </select><br>

    <label>
        জিরো অলিম্পিয়াড আয়োজনে ফাতিহা আয়াতের সাথে নীচের কোন কোন কাজ তুমি করতে চাও? <span>*</span><br>
        Which of the following activities would you like to do with Faatiha Aayat in the Zero Olympiad?
    </label><br>

    <div class="info_con">
        <div class="check_check"> <input type="checkbox" name="extra[]" id="extra1" value="campus-ambassador"> </div>

        <p class=" p_text">ক্যাম্পাস অ্যাম্বাসেডর হিসেবে রেজিস্ট্রেশন কালেক্ট করা, জাতিসংঘ থেকে প্রদত্ত কোর্সের উপর
            অনলাইন ও অফলাইনে পাঠচক্র পরিচালনা করা ইত্যাদি কাজ করতে চাই | বেস্ট ক্যাম্পাস অ্যাম্বাসেডরকে অ্যাওয়ার্ড
            প্রদান করা হবে |
        </p>
        <p class="p_b p_text"> Being a campus ambassador, I want to collect registrations, conduct online and offline
            study session of the course provided by the United Nations etc. | The best campus ambassador will be awarded
        </p>

    </div>

    <div class="info_con">
        <div class="check_check"><input type="checkbox" id="extra2" name="extra[]" value="event-management"> </div>

        <p class=" p_text">ঢাকায় গ্র্যান্ড ফিনালে অনুষ্ঠানে ইভেন্ট ম্যানেজমেন্টের কাজ করতে চাই | বেস্ট ইভেন্ট
            ম্যানেজারকে অ্যাওয়ার্ড প্রদান করা হবে |</p>
        <p class="p_b p_text">I want to work in event management at the grand finale in Dhaka | The best event manager
            will be awarded</p>

    </div>

    <div class="info_con">
        <div class="check_check"><input type="checkbox" id="extra3" name="extra[]" value="social-media"> </div>

        <p class=" p_text">পেইজ, গ্রুপ, ইভেন্ট, চ্যানেল এর অ্যডমিন হিসেবে সোশ্যাল মিডিয়া ক্যাম্পেইনের যাবতীয় কাজ করতে
            চাই | বেস্ট সোশ্যাল মিডিয়া ক্যাম্পেইনারকে অ্যাওয়ার্ড প্রদান করা হবে | </p>
        <p class="p_b p_text"> I want to do all the work of social media campaigns as an admin of pages, groups, events,
            channels | The best social media campaigner will be awarded</p>

    </div>

    <div class="info_con">
        <div class="check_check"><input type="checkbox" id="extra4" name="extra[]" value="competitor-only"> </div>

        <p class=" p_text">জিরো অলিম্পিয়াডে শুধুমাত্র প্রতিযোগী হিসেবে অংশ নিয়ে চাই, এরকম কোন কাজ করতে চাই না | </p>
        <p class="p_b p_text">I want only to participate in the Zero Olympiad as a competitor, I don't want to do any
            such work.</p>

    </div>
    <div id="errorMessage" style="color: red; display: none;">Please select at least one option.</div><br>

    <!-- <label>Amount:</label> -->
    <input type="hidden" name="amount" readonly value="300">
    <input type="hidden" name="trxID" readonly id="trxID">
    <!-- <label>Status:</label> -->
    <input type="hidden" name="status" readonly required id="status">

    <label>Email:<span>*</span></label>
    <input type="email" name="email" required><br>

    <label>Username:<span>*</span></label>
    <input type="text" name="username" required><br>

    <label>Password:<span>*</span></label>
    <input type="password" name="password" required><br>

    <p id='submit'><button type='submit'>Register</button></p>

</form>

<script>
document.getElementById('myForm12').addEventListener('submit', function(event) {
    // Get all checkboxes
    const checkboxes = document.querySelectorAll('input[name="extra[]"]');
    let isChecked = false;

    // Check if at least one checkbox is checked
    checkboxes.forEach(function(checkbox) {
        if (checkbox.checked) {
            isChecked = true;
        }
    });

    // If none are checked, prevent form submission and show an error
    if (!isChecked) {
        event.preventDefault(); // Prevent form submission
        document.getElementById('errorMessage').style.display = 'block';
    } else {
        document.getElementById('errorMessage').style.display = 'none';
    }
});
</script>
<?php
    return ob_get_clean();
}
add_shortcode('cat_3_registration_form', 'custom_registration_form_shortcode3');