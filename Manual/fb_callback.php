<?php
 include __DIR__."/config.php";

 session_start();
$fb_app_id = FB_APP_ID;
$fb_redirect_url = FB_REDIRECT_URL;
$fb_app_secret = FB_APP_SECRET;

$code=$_GET['code'];
// $response=file_get_contents("https://graph.facebook.com/v7.0/oauth/access_token?client_id=${fb_app_id}&redirect_uri=${fb_redirect_url}&client_secret=${fb_app_secret}&code=${code}");
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://graph.facebook.com/v7.0/oauth/access_token?client_id=${fb_app_id}&redirect_uri=${fb_redirect_url}&client_secret=${fb_app_secret}&code=$code",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array("cache-control: no-cache"),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if($err)
{
    print_r($err); 
    exit;
}
else
{
    $response = json_decode($response);
    $token = $response->access_token;
    $_SESSION['token'] = $token;
    header('Location: ./user_page.php');
}

// print_r($response);