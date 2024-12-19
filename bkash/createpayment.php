<?php
session_start();
?>
<script src="https://faatihaaayat.com/wp-content/plugins/bkash-registration/js/jquery-1.8.3.min.js?ver=1.0.0"></script>
<script id = "myScript" src="https://scripts.pay.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout.js"></script>
<!-- <script type="text/javascript">    
    var accessToken='';
    $(document).ready(function(){
        $.ajax({
            url: "token.php",
            type: 'POST',
            contentType: 'application/json',
            success: function (data) {
                console.log('got data from token  ..');
				console.log(JSON.stringify(data));
				
                accessToken=JSON.stringify(data);
            },
			error: function(){
				console.log('error');    
                wondows.reload();                    
            }
        });        
    });	
	// function callReconfigure(val){
    //     bKash.reconfigure(val);
    // }
</script> -->
<?php
// token.php or wherever you're fetching the token
$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";
// Use cURL to fetch the token
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $actual_link."/wp-content/plugins/bkash-registration/bkash/token.php"); // URL to the token.php script
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
]);
$response = curl_exec($ch);
if ($response === false) {
    die('Error fetching token: ' . curl_error($ch));
}
curl_close($ch);
// Store the token
$accessToken = $data['accessToken'] ?? null;
if ($accessToken) {
    echo "Access Token: " . htmlspecialchars($accessToken);
} else {
    echo "Failed to fetch access token.";
}
//create paymen-----------------------------------------------
$strJsonFileContents = file_get_contents("config.json");
$array = json_decode($strJsonFileContents, true);
$amount = '3';
$invoice = 'inv_'.rand(); // must be unique
$intent = "sale"; 
$callback = $actual_link;

$createpaybody=array('amount'=>$amount, 'currency'=>'BDT', 'merchantInvoiceNumber'=>$invoice,'intent'=>$intent, "mode"=> "0011", "payerReference"=> "1", "callbackURL"=> $callback.'/wp-content/plugins/bkash-registration/bkash/executepayment.php');   
    
    $url = curl_init($array["createURL"]);

    $createpaybodyx = json_encode($createpaybody);

    $header=array(
        'Content-Type:application/json',
        'Accept: application/json',
        'Authorization:'.$array["token"],
        'X-APP-Key:'.$array["app_key"]
    );

    curl_setopt($url,CURLOPT_HTTPHEADER, $header);
	curl_setopt($url,CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($url,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($url,CURLOPT_POSTFIELDS, $createpaybodyx);
    curl_setopt($url,CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
    //curl_setopt($url, CURLOPT_PROXY, $proxy);
    
    $resultdata = curl_exec($url);
    curl_close($url);
    echo $resultdata;
    $obj = json_decode($resultdata);
   // var_dump($obj);
    header("Location: " . $obj->{'bkashURL'});

?>
