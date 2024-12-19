<?php
session_start(); 
$strJsonFileContents = file_get_contents("config.json");
$array = json_decode($strJsonFileContents, true);
$paymentID = $_GET['paymentID'];
$url = curl_init($array["executeURL"]);

$post_token = array(
    'paymentID' => $paymentID
     );    
$posttoken = json_encode($post_token);

$header=array(
    'Content-Type:application/json',
    'Authorization:'.$array["token"],
    'X-APP-Key:'.$array["app_key"]              
);	    

curl_setopt($url, CURLOPT_HTTPHEADER, $header);
curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
curl_setopt($url, CURLOPT_POSTFIELDS, $posttoken);
curl_setopt($url, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($url, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
$resultdata = curl_exec($url);
curl_close($url);
$obj = json_decode($resultdata);

$_SESSION['executeData'] = $obj;
//var_dump($resultdata);

$callback = $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]";

header("Location: " .$callback.'/thank-you');
    
?>
