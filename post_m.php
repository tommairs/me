<?php 
date_default_timezone_set("UTC"); 
$authkey = "<redacted>";
$host = "<redacted>";

$message_e = $_POST['e1'];
$message_s = $_POST['s1'];
$message_p = $_POST['p1'];
$sms = $_POST['sms'];
$email = $_POST['email'];
$deviceid = $_POST['deviceid'];
$to_name = $_POST['to_name'];
$subject = $_POST['subject'];
$from_name = $_POST['from_name'];
$from_email = $_POST['from_email'];
$type = $_POST['msgtype'];
$pushtitle = $_POST['pushtitle'];
$badgecount = $_POST['badgecount'];
$faxnum = $_POST['faxnum'];
$faxmessage = $_POST['faxmessage'];


  // Continue assuming all vars are valid
  // no error checking in this version.

  $message_html = $message_e;
  preg_replace("/[\n]/","<br>",$message_html);
  $message_html = "<html><body><p><font face=verdana size=2>". $message_html ."</font></p></body></html>";

if ($type == "sms"){
  $message_e = $message_s;
  $message_html = "This will be ignored";
  $email = $sms."@us.sms.int";
  $subject = "This will be ignored"; 
  $to_name = "sms recipient";
}

if ($type == "fax"){
  $message_e = $faxmessage;
  $message_html = "This will be ignored";
  $email = $faxnum."@myfax.com";
//  $subject = "This will be ignored";
}


  $rcpt_list = "
    {
      \"address\": {\"email\": \"$email\",\"name\": \"$to_name\"},
      \"tags\": [],\"metadata\": {},\"substitution_data\": {}
    }";


$json = "{
  \"options\": {
    \"open_tracking\": true,\"click_tracking\": true
  },
  \"campaign_id\": \"omnichannel demo\",
  \"return_path\": \"solution-consulting@demo-t.sparkpostelite.com\",
  \"metadata\": {\"binding\":\"outbound\"},\"substitution_data\": {},
  \"recipients\": [".$rcpt_list."],
  \"content\": {
    \"from\": {\"name\": \"Sparkpost Demo System\",\"email\": \"sedemo@demo-t.sparkpostelite.com\"},
    \"subject\": \"$subject\",
    \"reply_to\": \"$from <$from_email>\",
    \"text\": \"$message_e\",
    \"html\": \"$message_html\"
  }
}";

if ($type == "push"){

$json = "{
  \"options\": {
    \"open_tracking\": false,\"click_tracking\": false
  },
  \"campaign_id\": \"omnichannel demo\",
  \"return_path\": \"solution-consulting@demo-t.sparkpostelite.com\",
  \"metadata\": {\"binding\":\"outbound\"},\"substitution_data\": {},

  \"recipients\": [{
		\"multichannel_addresses\": [{
			\"channel\": \"apns\",
			\"token\": \"".$deviceid."\",
			\"app_id\": \"apnpushprod.demo.elite\"
		}]
	}],
    \"content\": {
        \"push\": {
            \"apns\": {
                \"aps\": {
                    \"alert\": {
                    	\"title\":\"".$pushtitle."\",
                    	\"body\":\"".$message_p."\"
                    },
                    \"badge\": ".$badgecount.",
                    \"content-available\":1
                }
            }
        }
    }
}
";

}
echo "<PRE>";
print_r($json);
echo "</PRE>";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://$host/api/v1/transmissions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: $authkey"
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);


$r1 = json_decode($response,true);
$rejected = $r1[results][total_rejected_recipients];
$accepted = $r1[results][total_accepted_recipients];
$mid = $r1['results']['id'];

if($rejected > 0) {
    echo 'Message could not be sent.';
    exit(0);
}

echo '<br />Checking delivery status...<br />';

// launch checking page

echo "<br />";

echo '
  <form id=f1 name=f1 method=post action=check_m.php>
     <input type=hidden name=to_name value="'.$to_name.'"> <br />
     <input type=hidden name=email value='.$email.'> <br />
     <input type=hidden name=from_name value="'.$from_name.'"> <br />
     <input type=hidden name=from_email value='.$from_email.'> <br />
     <input type=hidden name=subject value="'.$subject.'"> <br />
     <input type=hidden name=e1 value="'.$message_e.'"> <br />
     <input type=hidden name=s1 value="'.$message_s.'"> <br />
     <input type=hidden name=sms value='.$sms.'> <br />
     <input type=hidden name=mid value='.$mid.'> <br />
     <input type=submit name=submit value="Click to continue"> <br />
  </form>
';


?>

