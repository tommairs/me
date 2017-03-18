<?php 
date_default_timezone_set("UTC"); 
$authkey = "<redacted>";
$host = "<redacted>";

$mid = $_POST['mid'];

echo '<br />Checking delivery status...<br />';

$now1 = time() - 3600;
//$five = time() + 600;
$five = $now1 + 7200;
$then = date('Y-m-d\TH:s', $now1);
$later = date('Y-m-d\TH:s', $five); 

   $postdata = array("from" => $then,"to" => $later,"events" => "delivery,bounce,delay,policy_rejection","transmission_ids" => "$mid");
   $url = "https://$host/api/v1/message-events";
   $url .= "?". http_build_query($postdata);

echo $url;
echo "<br>";

//curl_reset($ch);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/x-www-form-urlencoded",
  "Authorization: $authkey"
));

$response = curl_exec($ch);
curl_close($ch);

//var_dump($response);

$resp_0 = json_decode($response,true);

echo "<pre>";
print_r($resp_0);
echo "</pre><br>";

$msg_type = $resp_0['results'][0]['type'];

echo "Type: " . $msg_type . "<br>";

if ($msg_type == "delivery"){
  echo "Message succesfuly delivered <br />";
  echo "Click <a href='index.php'>HERE</a> to start over.";
}
else {
  if ($domain != "us.sms.int"){
    echo "Message delivery failed.  Try SMS instead.<br />";
  }
  else{
      echo "SMS delivery failed.  Out of options :( <br />";
      exit(0);
  }
}

echo "<br />";

?>

