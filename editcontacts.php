<?php

$listtype = $_GET['t'];
$frompost = $_POST['frompost'];
if (!$listtype){
  $listtype = $_POST['t'];
}

// Get any posted data
if ($frompost == "true"){
  for ($x = 0; $x <= 100; $x++){
    $remove = $_POST['rm_'.$x];
    $number = $_POST['num_'.$x];
    if (($listtype == "sms") or ($listtype == "fax")){
      $cleannum = preg_replace('/[^0-9]/','',$number);
      if (strlen($cleannum) == 10){
        if (substr($cleannum,0, 1) != "1"){
          $cleannum = "1".$cleannum;
        }
      }
      $number = preg_replace('/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/', '$1($2) $3-$4', $cleannum);
    }
  
    $name = $_POST['name_'.$x];

    if ($number != ""){
      if ($remove != "true"){
        if (($listtype == "apn") or ($listtype == "gcm")){
          $smslist[] = "    <option value=\"$number\">$name - $number</option>\n";
        }
        if (($listtype == "sms") or ($listtype == "fax")){
          $smslist[] = "    <option value=\"$cleannum\">$number - $name</option>\n";
        }
      }
    }
  }

  $fh = fopen($listtype.'list.php',"w+");
    foreach ($smslist as $lineout){
      fwrite($fh, $lineout);
    }
  fclose($fh);
}

if (!$smslist){
  
  $smslist = file($listtype.'list.php');
}

?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title> </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="cache-control" content="no-cache" />
    <link rel="stylesheet" type="text/css" href="./style1.css" />
    <link href="../../style/favicon.ico" rel="icon" type="image/x-icon" />
    <link href="../../style/favicon.ico" rel="shortcut icon" />
    <script language="javascript">
         function Reload() {
            window.location.reload();
         }
         function Close() {
            opener.Reload();
            self.close();
         }
    </script>
</head>
<body>
<form name=f1 method=post action=#>
<table border=1 cellpadding=2>
<tr>
<th>DEL</th>
<th>Number</th>
<th>Name</th></tr>
<?php 
foreach ($smslist as $line_num => $smslist) {
$smslist = preg_replace('/(<option.*>)(.*)(<\/option>)/i', '$2', $smslist);

$listparts = split(" - ", $smslist);

// swap places
if (($listtype == "apn") or ($listtype == "gcm")){

echo "Swapping fields";
  $tmppart = $listparts[0];
  $listparts[0] = trim($listparts[1]);
  $listparts[1] = trim($tmppart);
}

echo "
 <tr>
   <td width=50>
     <center>
     <input type=\"checkbox\" name=\"rm_$line_num\" value=\"true\">
     </center>
   </td>
   <td width=200>
     <input type=\"textbox\" name=\"num_$line_num\" value=\"$listparts[0]\">
   </td>
   <td width=200>
     <input type=\"textbox\" name=\"name_$line_num\" value=\"$listparts[1]\">
   </td>
 </tr>
";
}

$line_num++;

echo "
 <tr>
   <td width=50>
     <center>
 [NEW] 
     </center>
   </td>
   <td width=200>
     <input type=\"textbox\" name=\"num_$line_num\" value=\"\">
   </td>
   <td width=200>
     <input type=\"textbox\" name=\"name_$line_num\" value=\"\">
   </td>
 </tr>
</table>
<input type=hidden name=frompost value=true>
<input type=hidden name=t value=sms>
<input type=submit name=submit value=sumbit>
</form>
";

?>
  <br>
  <input type=button name=close value="CLOSE THIS WINDOW" OnCLick="javascript:Close();">


