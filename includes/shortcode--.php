<?php
//cat 1-----------------------------------
function custom_registration_form_shortcode() {
    ob_start();
    ?>
    <form class="form-group" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        
        <input type="hidden" name="action" value="custom_registration">
        <?php wp_nonce_field('custom_registration', 'custom_registration_nonce'); ?>
       	
      
        <input type="hidden" name="category" value="Category-1">        
 		
      <label>Name: ( না ) <span>*</span></label>
       		 <input  type="text" name="name" required><br>
		
      
        <label>Phone: ( ফোন ) <span>*</span></label>
        <input type="text" name="phone" required><br>

        <label>District: ( জেলা ) <span>*</span></label>
        <input type="text" name="district" required><br>

        <label>Educational Institution: ( শিকষা প্রষ্ঠান )<span>*</span></label>
        <input type="text" name="institution" required><br>

        <label>Education Type: ( শিক্ষার ধরণ  )</label>
        <select name="education_type" required>
            <option>wk¶vi aiY</option>
            <option value="বাংলা মাধ্যম (বাংলা  ইংরেজি ভারসন)">বাংলা মাধ্যম (বাংলা  ইংরেজি ভারসন)</option>
            <option value="ইংরেজি মাধ্যম (IGCSE & IB)">ইংরেজি মাধ্যম (IGCSE & IB)</option>
            <option value="মা্রাসা (আলিয় ও কওমি)">মাদরাসা (আলিয়া  কওমি)</option>
        </select><br>

        <label><span>*</span>In January 2025, what class are you a student of? ২০২৫ সালের জানুয়ারি মাস তুমি কোন ক্লাসের স্টুডন্ট? From Fifth to Eighth Grade - Choose Your Class প্চম থেকে অষটম শ্রেণীর িক্ষার্থীরা তোমাদের ক্লাশ বেছে নাও</label>
        <select name="class">
           <option selected>শিক্ষার্থরা তোমাদের ্লাশ বেছে নও</option>
            <option value="পঞ্চম শ্রেণী, Grade 5, PYP 5, াইসির, সমমা">পঞ্চম শ্রেী, Grade 5, PYP 5, তাইসির, সমমান</option>
            <option value="ষ্ঠ শ্রেণী, Grade 6, MYP 1, মিজান, সমমান">ষষ্ঠ ্রেণী, Grade 6, MYP 1, মিজান, সমমান</option>
            <option value="সপ্তম শ্েণী, Grade 7, MYP 2, নহবেমীর">সপ্ম শ্রেণী, Grade 7, MYP 2, নাহবেমী</option>
            <option value="অষ্টম শ্রেণী, Grade 8, MYP 3, হদায়েতুন্নহু">অষ্টম শ্রেণী, Grade 8, MYP 3, েদায়েতুন্াহু</option>
            <option value="একটি নয়, ন্যান্">একিও নয়, অন্যান্য</option>
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
        
        <?php echo do_shortcode( '[payment_form]' );?>       
        <p id='submit'></p>          
               
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

        <label>Educational Institution: ( শিক্া প্রতিষ্ঠন ) <span>*</span></label>
        <input type="text" name="institution" required><br>

        <label>Education Type: ( শক্ষর ধরণ )<span>*</span></label>
        <select name="education_type" required>
               <option >শি্ষার ধরণ</option>
            <option value="বাংলা মাধ্যম (বাংলা ও ইংরজি ভার্সন)">বাংলা মাধ্যম (বাংলা ও ইংরজি ভার্সন)</option>
            <option value="ইংরেজি মাধ্ম (IGCSE & IB)">ইংরেজি মাধ্যম (IGCSE & IB)</option>
            <option value="মাদ্রাসা (আলিয়া ও কওি)">মাদ্রাসা (আলিয়া ও কওম)</option>
        </select><br>

        <label>In January 2025, what class are you a student of? ২০২৫ সালে জানুয়ারি মসে তুমি কোন ্লাসের স্টডেন্ট? From 9th to 12th Grade - Choose Your Class পঞ্চম থেকে অষ্টম শ্রেণীর শিক্ষার্থীা তোমাদের কলাশ বেছে না <span>*</span></label>
        <select name="class">
            <option >শিক্ষা্থীরা তোমাদের ক্লাশ বেছে নাও</option>
            <option value="নবম শরেণী, Grade 9, MYP 4, কাফিয়া ও বেকায়া, সমমান">বম শ্রেণী, Grade 9, MYP 4, কাফিয় ও বেকায়া, সমান</option>
            <option value="দশম শ্েণী, Grade 10, MYP 5, াফিয়া ও বোয়া, সমমান">দশম শ্রেণী, Grade 10, MYP 5, কাফিয় ও বেকায়া, সমমান</option>
            <option value="এসএসসি পরিক্ষার্থ, O Level Candidate, কাফিয়া ও বেকায়া সমমান">এসসসি পরিক্ষার্থী, O Level Candidate, কাফিয়া ও বকায়া সমমান</option>
            <option value="একাদশ শ্রণী, Grade 11, DP 1, জাালাইন, সমমা">একাদশ শ্রেণী, Grade 11, DP 1, জাালাইন, সমমা</option>
            <option value="দ্বাদশ শ্েণী, Grade 12, DP 2, জালালাইন, সমমান">দ্বাদশ শরেণী, Grade 12, DP 2, ালালাইন, সমান</option>
            <option value="এইচএসস পরিক্ষার্ী, A Level Candidate, জাালাইন সমমা">এইচএসসি পরক্ষার্থী, A Level Candidate, জালালইন সমমান</option>
            <option value="এিও য়, অনযান্">একটি নয়, অনান্য</option> 
         
        </select><br>

        <label>
            জিরো লিম্পিয়াড আয়োজনে ফাতিহ আয়াতের সাথ নীচের কোন কোন কাজ তুমি রতে চাও? 
            Which of the following activities would you like to do with Faatiha Aayat in the Zero Olympiad? <span>*</span>
        </label><br>

        <div class="info_con">
             <div class="check_check"><input type="checkbox" name="extra[]" id="extra1" value="campus-ambassador"></div>
                 <p class= "p_text" >ক্যাম্পাস অ্যাম্বাসের হিসেবে রেিস্ট্রেশন ালেক্ট করা, াতিসংঘ থেক প্রদত্ত কো্সের উপর অনাইন ও অফলাইে পাঠচক্র পিচালনা করা ত্যাদি কাজ রতে চাই | বেস্ট ক্যাম্পা অ্যাম্বাসডরকে অ্যাওয়ার্ড প্রদান করা হবে |</p>
                 <p class= "p_b p_text">want to collect registrations, conduct online and offline study session of the course provided by the United Nations etc. | The best campus ambassador will be awarded</p>
           
        </div>

        <div class="info_con">
          <div class="check_check"> <input type="checkbox" id="extra2" name="extra[]" value="event-management"></div>
              <p class=" p_text">  ঢাকায় গ্র্যান্ড ফিনালে অনুষ্ঠানে ইেন্ট ম্যানজমেন্টের কাজ করতে চাই | বেস্ট ইভেন্ট ম্যানেজারক অ্যাওয়ার্ড প্রদান করা বে |</p>
              <p class= "p_b p_text">I want to work in event management at the grand finale in Dhaka | The best event manager will be awarded.</p>
        </div>

        <div class="info_con">
             <div class="check_check"> <input type="checkbox" id="extra3" name="extra[]" value="social-media"></div>
                 <p class=" p_text"> পেইজ, গ্ুপ, ইভেন্ট, চ্যানেল এর অ্যডমিন হিসেব সোশ্যাল মিিয়া ক্যাম্েইনের যাবতীয় কাজ করতে চই | বেস্ট সোশ্যাল মিডিয়া ক্যাম্পেইনরকে অ্যাওয়ার্ড প্রদান করা হবে |</p>
                 <p class= "p_b p_text"> I want to do all the work of social media campaigns as an admin of pages, groups, events, channels | The best social media campaigner will be awarded.</p>
        </div>

        <div class="info_con">
            <div class="check_check"><input type="checkbox" id="extra4" name="extra[]" value="competitor-only"></div>
                <p class=" p_text"> জিরো অলিম্পিয়াডে শুধুাত্র প্রতিোগী হিসেবে ংশ নিয়ে চাই, এরকম কোন কাজ করতে চাই না | </p>
                <p class= "p_b p_text"> I want only to participate in the Zero Olympiad as a competitor, I don't want to do any such work.</p>
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
        
        <?php echo do_shortcode( '[payment_form]' );?>       
        <p id='submit'></p>          
               
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

        <label>District: ( জল )<span>*</span></label>
        <input type="text" name="district" required><br>

        <label>Educational Institution: ( িক্ষা প্রতিষ্ঠান )<span>*</span></label>
        <input type="text" name="institution" required><br>

          <label>Education Type: ( শিক্ষর ধণ )<span>*</span></label>
        <select name="education_type" required>
               <option >শিক্ষার ধণ</option>
            <option value="বাংলা মা্যম (বাংলা ও ইংরেজি ভার্সন)">বাংলা মা্যম (বাংলা ও ইংরেজি ভার্সন)</option>
            <option value="ইংরেজি াধ্যম (IGCSE & IB)">ইংরেজি মাধ্ম (IGCSE & IB)</option>
            <option value="মাদ্রাসা (আলিয়া ও কওমি)">মাদ্রাসা (আলিয়া  কওমি)</option>
        </select><br>

        <p>In January 2025, what class are you a student of? ২০২৫ সালের জানুয়ার মাসে তুমি কোন ক্লাসের স্টুডেন্ট? <span>*</span></p>
          <p>Degree Pass, Bachelor's Honours, Postgraduate, Medical, Engineering, Marine, Marine Fisheries, Diploma, Qawmi & Alia Madrasa, Other Students - Choose Your Class </p>
          <p>ডিগ্রি পাস, স্নাতক ম্মান, স্নাকোত্তর, মেডক্যাল, ইঞ্জনিয়ারিং, মেিন, মেরিন ফিারিজ, ডিপ্লমা, কাওমি ও লিয়া মাদ্রাসা, অন্যান্য ছাত্রছাত্ররা বেছে নাও</p>
      
     
        <select name="class" required>
          <option >Choose Your Class </option>
            <option value="১ম বর্, াজিল, মেশকা">১ম বর্ষ, ফাজিল, মেকাত</option>
            <option value="২ বর্ষ, ফাি, মশকাত">য় বর্ষ, ফাজি, মেশকাত</option>
            <option value="ত র্, ফাজি, মোত">তয় বর্ষ, াজিল, মেশকা</option>
            <option value="৪র্থ বর্, জিল, েশকা">৪র্থ বর্ষ, ফাজল, মেশকাত</option>
            <option value="৫ম র্ষ, ইন্টণ, ফাজিল, মেশকাত">৫ম বর্ষ, ইন্টার্ণ, ফাজিল, মেশকাত</option>
            <option value="সনাতকোত্র, কমিল, দাওর">সনাতকোত্তর, ামিল, দাওরা</option> 
        </select><br>

        <label>
           জরো অলিম্পিয়াড আয়োজনে ফাতিহা আয়াতের সাথে নীচের কোন কোন কাজ তমি করতে চাও?  <span>*</span><br>
            Which of the following activities would you like to do with Faatiha Aayat in the Zero Olympiad?
        </label><br>

        <div class="info_con">
            <div class="check_check"> <input type="checkbox" name="extra[]" id="extra1" value="campus-ambassador" > </div>
           
                <p class=" p_text">্যাম্পাস অযাম্বাসেডর হিসেবে রেজি্ট্রেশন কােক্ট করা, জািসংঘ থেকে পরদত্ত কোর্ের উপর অনলান ও অফলাইনে াঠচক্র পরিালনা করা ইতযাদি কাজ করে চাই | বেস্ট ক্যাম্পাস অ্যাম্বাসেডকে অ্যাওয়ার্ড প্রদান করা হবে | </p>
                <p class= "p_b p_text"> Being a campus ambassador, I want to collect registrations, conduct online and offline study session of the course provided by the United Nations etc. | The best campus ambassador will be awarded</p>
          
        </div>

        <div class="info_con">
            <div class="check_check"><input type="checkbox" id="extra2" name="extra[]" value="event-management" > </div>
           
                <p class=" p_text">ঢাকায় গ্র্যান্ড ফিনাে অনুষ্ঠান ইভেন্ট ম্যনেজমেন্টের কাজ করতে চাই | বেস্ট ইভেনট ম্যানেজাকে অ্যাওয়ার্ড প্রদান করা হবে |</p>
                <p class= "p_b p_text">I want to work in event management at the grand finale in Dhaka | The best event manager will be awarded</p>
           
        </div >

        <div class="info_con">
            <div class="check_check"><input type="checkbox" id="extra3" name="extra[]" value="social-media" > </div>
            
                 <p class=" p_text">পেইজ, গ্ুপ, ইভেন্ট, চ্যানেল এর অ্যডমিন হিসেব সোশ্যাল মিিয়া ক্যাম্েইনের যাবতীয় কাজ করতে চই | বেস্ট সোশ্যাল মিডিয়া ক্যাম্পেইনরকে অ্যাওয়ার্ড প্রদান করা হবে |</p>
                <p class= "p_b p_text"> I want to do all the work of social media campaigns as an admin of pages, groups, events, channels | The best social media campaigner will be awarded</p>
            
        </div>

        <div class="info_con">
            <div class="check_check"><input type="checkbox" id="extra4" name="extra[]" value="competitor-only" > </div>
            
                 <p class=" p_text">িরো অলিম্পিয়াডে শুধুমা্র প্রতিযোী হিসেবে অং নিয়ে চাই, এরকম কোন কাজ কতে চাই না | </p>
                <p class= "p_b p_text">I want only to participate in the Zero Olympiad as a competitor, I don't want to do any such work.</p>
            
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
        
        <?php echo do_shortcode( '[payment_form]' );?>       
        <p id='submit'></p>          
               
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
