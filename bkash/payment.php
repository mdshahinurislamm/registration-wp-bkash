<?php
session_start(); 
function payment_form_shortcode() {
    ob_start();   
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Merchant</title>
    <meta name="viewport" content="width=device-width" ,="" initial-scale="1.0/">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrom=1">
	<!-- <script src="http://localhost/wpnew/wp-content/plugins/bkash-registration/js/jquery-1.8.3.min.js?ver=1.0.0"></script> -->
    <script id = "myScript" src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>
    <!-- <script id = "myScript" src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"></script> -->
    <style>
        .pamentmessage{
            background-color: #198754; color: #ffffff; padding: 5px;  text-align: center;
        }
        .pamentmessageError{
            background-color: red; color: #ffffff; padding: 5px;  text-align: center;
        }
    </style>
</head>

<body>

<br><p id="paymentMessage"></p>
<!-- <p id="bKash_button">Pay With bKash</p> -->
<p id="bKash_button" style="
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    color: #ffffff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);"
    onmouseover="this.style.backgroundColor='#0056b3'; this.style.boxShadow='0px 6px 8px rgba(0, 0, 0, 0.2)'; this.style.transform='translateY(-2px)';"
    onmouseout="this.style.backgroundColor='#007bff'; this.style.boxShadow='0px 4px 6px rgba(0, 0, 0, 0.1)'; this.style.transform='translateY(0)';"
    onmousedown="this.style.backgroundColor='#003f7f'; this.style.boxShadow='0px 2px 4px rgba(0, 0, 0, 0.1)'; this.style.transform='translateY(1px)';"
    onmouseup="this.style.backgroundColor='#0056b3'; this.style.boxShadow='0px 6px 8px rgba(0, 0, 0, 0.2)'; this.style.transform='translateY(-2px)';">
    Pay With bKash
</p>


<script type="text/javascript">
    window.onload = function(){ 
        if(localStorage.getItem('paymentStatus') == 'Completed'){
            document.getElementById("bKash_button").style.display = "none";
            document.getElementById("status").value = localStorage.getItem('paymentStatus');
            document.getElementById("trxID").value = localStorage.getItem('paymentTrxID');
            document.getElementById("submit").innerHTML = "<button type='submit'>Register</button>"
            document.getElementById("paymentMessage").innerHTML = localStorage.getItem('paymentMessage');
        }
    } 
    var accessToken='';
    $(document).ready(function(){
        $.ajax({
            url: "<?php echo plugin_dir_url(__FILE__); ?>/token.php",
            type: 'POST',
            contentType: 'application/json',
            success: function (data) {
                console.log('got data from token  ..');
				console.log(JSON.stringify(data));
				
                accessToken=JSON.stringify(data);
            },
			error: function(){
				console.log('error');                        
            }
        });

        var paymentConfig={
            createCheckoutURL: "<?php echo plugin_dir_url(__FILE__); ?>/createpayment.php",
            executeCheckoutURL: "<?php echo plugin_dir_url(__FILE__); ?>/executepayment.php",
        };

		
        var paymentRequest;
        paymentRequest = { amount:'300',intent:'sale' , currency:'BDT', merchantInvoiceNumber:'123456'};
		console.log(JSON.stringify(paymentRequest));

        bKash.init({
            paymentMode: 'checkout',
            paymentRequest: paymentRequest,
            createRequest: function(request){
                console.log('=> createRequest (request) :: ');
                console.log(request);
                
                $.ajax({
                    url: paymentConfig.createCheckoutURL+"?amount="+paymentRequest.amount,
                    type:'GET',
                    contentType: 'application/json',
                    success: function(data) {
                        console.log('got data from create  ..');
                        console.log('data ::=>');
                        console.log(JSON.stringify(data));
                        
                        var obj = JSON.parse(data);
                        
                        if(data && obj.paymentID != null){
                            paymentID = obj.paymentID;
                            bKash.create().onSuccess(obj);
                        }
                        else {
							console.log('error');
                            bKash.create().onError();
                            localStorage.setItem('paymentMessage', "<p class='pamentmessageError'>Your payment has been Failed. Please try again. Code: "+obj.message+"</p>"); 
                            document.getElementById("paymentMessage").innerHTML = localStorage.getItem('paymentMessage');   
                        }
                    },
                    error: function(){
						console.log('error');
                        bKash.create().onError();
                        localStorage.setItem('paymentMessage', "<p class='pamentmessageError'>Your payment has been Failed. Please try again</p>"); 
                        document.getElementById("paymentMessage").innerHTML = localStorage.getItem('paymentMessage');   
                    }
                });
            },
            
            executeRequestOnAuthorization: function(){
                console.log('=> executeRequestOnAuthorization');
                $.ajax({
                    url: paymentConfig.executeCheckoutURL+"?paymentID="+paymentID,
                    type: 'GET',
                    contentType:'application/json',
                    success: function(data){
                        console.log('got data from execute  ..');
                        console.log('data ::=>');
                        console.log(JSON.stringify(data));
                        
                        data = JSON.parse(data);
                        if(data && data.paymentID != null){
                            //alert('[SUCCESS] data : ' + JSON.stringify(data));
                            //window.location.href = "success.html";   

                            console.log(data.transactionStatus);
                            
                            document.getElementById("status").value = data.transactionStatus;                            
                            localStorage.setItem('paymentStatus', data.transactionStatus); 

                            document.getElementById("trxID").value = data.trxID;
                            localStorage.setItem('paymentTrxID', data.trxID);                             
                            
                            if(data.transactionStatus === "Completed"){                                
                                document.getElementById("bKashFrameWrapper").style.display = "none";
                                document.getElementById("bKash_button").style.display = "none";                                
                                document.getElementById("submit").innerHTML = "<button type='submit'>Register</button>";

                                localStorage.setItem('paymentMessage', "<p class='pamentmessage'>Your payment has been successfully processed. TrxID: "+data.trxID+"</p>"); 
                                document.getElementById("paymentMessage").innerHTML = localStorage.getItem('paymentMessage');

                            }                           
                            
                            // bKash.execute().close();
                            
                        }
                        else {
                            bKash.execute().onError();   
                            localStorage.setItem('paymentMessage', "<p class='pamentmessageError'>Your payment has been Failed. Please try again</p>"); 
                            document.getElementById("paymentMessage").innerHTML = localStorage.getItem('paymentMessage');                         
                        }
                    },
                    error: function(){
                        bKash.execute().onError();
                        document.getElementById("status").value = "Faild";
                        localStorage.setItem('paymentMessage', "<p class='pamentmessageError'>Your payment has been Failed. Please try again</p>"); 
                        document.getElementById("paymentMessage").innerHTML = localStorage.getItem('paymentMessage');     
                    }
                });
            }
        });
        
		console.log("Right after init ");  
        
    });
	
	function callReconfigure(val){
        bKash.reconfigure(val);
    }

    function clickPayButton(){
        $("#bKash_button").trigger('click');
    }


</script>
    
</body>
</html>

<?php
return ob_get_clean();
}
add_shortcode('payment_form', 'payment_form_shortcode');