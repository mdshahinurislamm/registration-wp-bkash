<?php
/**
 * Template Name: Thank you Template
 * Description: A custom page template added by the plugin.
 */
get_header();
?>

<div class="custom-template-content">
    <p><?php
    the_content() ?? 'Thank you! Your payment has been successfully processed. We appreciate your support and look forward to serving you. If you have any questions, please don\'t hesitate to contact us!'
    ?></p> 
</div>

<script type="text/javascript">    
    // localStorage.removeItem('paymentStatus');
    // localStorage.removeItem('paymentTrxID');
    // localStorage.removeItem('paymentMessage'); 
</script>

<?php get_footer(); ?>
