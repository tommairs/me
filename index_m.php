<?php 
date_default_timezone_set("UTC"); 

$srcfile='./data/relay.txt';
$smtpfile = file_get_contents($srcfile, NULL, NULL, 0, 14096);

$srcfile='./data/relay_sms.txt';
$smppfile = file_get_contents($srcfile, NULL, NULL, 0, 14096);

// Header
echo '
<html>
<head>
	<meta charset="utf-8" />
	<meta name="robots" content="noarchive" />
	<title>Message Systems</title>
	<link type="text/css" rel="stylesheet" href="https://support.messagesystems.com/css/styles.css" />
	<link rel="shortcut icon" href="https://support.messagesystems.com/favicon.ico" />
	<link rel="search" href="https://support.messagesystems.com/docs/opensearch.xml" type="application/opensearchdescription+xml" title="." />
	<script type="text/javascript" src="https://support.messagesystems.com/js/jquery.js"></script>
	<script type="text/javascript" src="https://support.messagesystems.com/js/global.js"></script>
  <script type="text/javascript" src="https://support.messagesystems.com/js/product_list.js"></script>


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

<div id="container-1">
	<div class="inner">
		<div id="top-login-info">
		</div>

		<a href="https://support.messagesystems.com/start.php">
			<img src="https://support.messagesystems.com/images/ms-white205.png" class="ms-logo" alt="Message Systems" /></a>

	</div><!--.inner-->
</div><!--#container-1-->

<p>
<center>
<table>
<tr valign=top><td vertical-align=top>
  <table>
    <tr><td vertical-align=top>
     &nbsp; 
    </td></td>
  </table>
</td><td vertical-align=top>

<!-- Inner table 1 -->
<table border=1>
  <tr>
    <td vertical-align=top>
      <strong>Momentum Multi-Channel Demo</strong>
    </td>
  </tr>
';


// email form
echo '
  <tr>
    <td>
<b><img src="./email.jpg"  width=50 height=26><font color=green>EMAIL:</font></b> <br>
  <form name=f1 method=post action=post_m.php>
<input type=hidden name=msgtype value=email>
     To Email Name: <input type=textbox name=to_name size=50 value="Tom Mairs"> <br /> 
     To Email Address: <input type=textbox name=email size=50i value="mike.hillyer@messagesystems.com"> <br /> 
     From Email Name: <input type=textbox name=from_name size=50 value="Momentum Demo System"> <br /> 
     From Email Address: <input type=textbox name=from_email size=50 value="demo@trymsys.net"> <br /> 
     Subject: <input type=textbox name=subject size=80 value="This is a test from the Momentum demo system"> <br /> 
     Place email message here: <br />
       <textarea rows=10 cols=90 name=e1>Place your message here.</textarea> <br />
     <input type=submit name=submit> <br />
  </form>
<!--
  <input type=button value="Edit contact list" onclick="javascript:window.open(\'editcontacts.php?t=email\',\'_blank\',\'scrollbars=1,width=950,height=700\');">
-->

<!--
  <input type=button value="Launch complex tool" onclick="javascript:window.open(\'complextool.php?t=email\',\'_blank\',\'scrollbars=1,width=950,height=700\');">
-->

    </td>
  </tr>
';

// SMS form
echo '
  <tr>
    <td>
<b><img src="./sms.jpg"  width=50 height=50><font color=green>SMS:</font></b> 
  <form name=f2 method=post action=post_m.php>
<input type=hidden name=msgtype value=sms>
       <textarea rows=5 cols=50 name=s1></textarea>  <br />
     SMS number: 
<!-- <input type=textbox name=sms> -->

<select name=sms>
';
include('smslist.php');
echo '
<!--
  <option value="12062250488">+1(206)225-0488 - Tom Mairs</option>
  <option value="14432711934">+1(443)271-1934 - Scott Habicht</option>
  <option value="14156724162">+1(415)672-4162 - Irina Doliov</option>
-->
</select>

    <br /> <input type=submit name=submit> <br />
  </form>
  <input type=button value="Edit contact list" onclick="javascript:window.open(\'editcontacts.php?t=sms\',\'_blank\',\'scrollbars=1,width=950,height=700\');">
    </td>
  </tr>
';

// APN Push Form
echo '
  <tr>
    <td>
<b><img src="./apn.jpg" width=50 height=50><font color=green>Apple PUSH:</font></b> 
  <form name=f3 method=post action=post_m.php>
<input type=hidden name=msgtype value=push>
     To Device_ID: 
<!-- <input type=textbox name=deviceid size=100> -->

<select name=deviceid>
';
include('apnlist.php');
echo '
<!--
  <option value="38e88050d6beb47cb0ead70ebd433faefd78a86cd5508fdf3de7229f6c5af17b">
       Tom Mairs - 38e88050d6beb47cb0ead70ebd433faefd78a86cd5508fdf3de7229f6c5af17b
  </option>  
  <option value="188f13ca4893098f27b077f1d3093e27930c740cb1962f5b6dcff379ecb40efd">
       Irina Doliov - 188f13ca4893098f27b077f1d3093e27930c740cb1962f5b6dcff379ecb40efd
-->
  </option>
</select>

<br />     Push Title: <input type=textbox name=pushtitle size=30> 
     Badge Count: <input type=textbox name=badgecount size=5 value=0><br />
     Place push message here: <br />
       <textarea rows=10 cols=90 name=p1></textarea> <br />
     <input type=submit name=submit> <br />
  </form>
  <input type=button value="Edit contact list" onclick="javascript:window.open(\'editcontacts.php?t=apn\',\'_blank\',\'scrollbars=1,width=950,height=700\');">
    </td>
  </tr>
';

// GCM Push Form
echo '
  <tr>
    <td>
<b><img src="./gcm.jpg"  width=50 height=35><font color=green>Android PUSH:</font></b>
  <form name=f3 method=post action=post_m.php>
<input type=hidden name=msgtype value=push>
     To Device_ID:
<!-- <input type=textbox name=deviceid size=100> -->

<select name=deviceid>
';
include('gcmlist.php');
echo '
<!--
  <option value="38e88050d6beb47cb0ead70ebd433faefd78a86cd5508fdf3de7229f6c5af17b">
       Tom Mairs - 38e88050d6beb47cb0ead70ebd433faefd78a86cd5508fdf3de7229f6c5af17b
  </option>
  <option value="188f13ca4893098f27b077f1d3093e27930c740cb1962f5b6dcff379ecb40efd">
       Irina Doliov - 188f13ca4893098f27b077f1d3093e27930c740cb1962f5b6dcff379ecb40efd
-->
  </option>
</select>

<br />     Push Title: <input type=textbox name=pushtitle size=30>
     Badge Count: <input type=textbox name=badgecount size=5> <br />
     Place push message here: <br />
       <textarea rows=10 cols=90 name=p1></textarea> <br />
     <input type=submit name=submit> <br />
  </form>
  <input type=button value="Edit contact list" onclick="javascript:window.open(\'editcontacts.php?t=gcm\',\'_blank\',\'scrollbars=1,width=950,height=700\');">
    </td>
  </tr>
';


// Fax Form
echo '
  <tr>
    <td>
<b><img src="./fax.jpg"  width=50 height=50><font color=green>Fax:</font></b>  
  <form name=f4 method=post action=post_m.php>
<input type=hidden name=msgtype value=fax>
     To Name: <input type=textbox name=to_name size=50> <br />
     To Fax Number:  
<!--
<input type=textbox name=faxnum size=50> <br />
-->
<!-- <input type=textbox name=fax> -->

  <select name=faxnum>
';
include('faxlist.php');
echo '
  </select>
  <br>
     From Name: <input type=textbox name=from_name size=50> <br />
     Subject: <input type=textbox name=subject size=80> <br />
     Place fax message here: <br />
       <textarea rows=10 cols=90 name=faxmessage></textarea> <br />
     <input type=submit name=submit> <br />
  </form>
  <input type=button value="Edit contact list" onclick="javascript:window.open(\'editcontacts.php?t=fax\',\'_blank\',\'scrollbars=1,width=950,height=700\');">
    </td>
  </tr>
';

/*    Hiding the skywriting and pigeons

// OTHERS Form
echo '
  <tr>
    <td>
<b><img src="./pigeon.jpg"  width=50 height=35><font color=green>Carrier Pigeon:</font></b>  
  <form name=f5 method=post action=post_m.php>
<input type=hidden name=msgtype value=pigeon>
     Pigeon_ID: <input type=textbox name=pigeonid size=30> <br />
     Place pigeon message here: <br />
       <textarea rows=10 cols=90 name=pigeontext></textarea> <br />
     <input type=submit name=submit> <br />
  </form>
    </td>
  </tr>
';


// OTHERS Form
echo '
  <tr>
    <td>
<b><img src="./skywriting.jpg"  width=50 height=35><font color=green>SkyWriting:</font></b>
  <form name=f5 method=post action=cloudy.php target=_blank>
<input type=hidden name=msgtype value=skywriting>
     Target Email Address: <input type=textbox name=skyID size=30> <br />
     Place skywriting message here: <br />
       <textarea rows=10 cols=90 name=skytext></textarea> <br />
     <input type=submit name=submit> <br />
  </form>
    </td>
  </tr>
';

*/


echo '
</table>
</td>
<td>

<!-- Inner table 2 -->
<table border=1>
<tr><td vertical-align=top>
<!-- inbound email feed goes here -->
Inbound Email Feed:<br>
<font size=2 face=verdana>
<textarea cols=60 rows=20 maxlength=2048 readonly>
';

//include ('smtpin.txt');
echo $smtpfile;


echo '
</textarea>
</font>
</td></tr>
<tr><td>
<!-- inbound SMS feed goes here -->
Inbound SMS Feed:<br>
<font size=2 face=verdana>
<textarea cols=60 rows=10>
';

//include ('smppin.txt');
echo $smppfile;


echo '

</textarea>
</font>
</td></tr>

</table>
</td>
</tr>

</table>

</center>
</p>
</body>
</html>';

?>
