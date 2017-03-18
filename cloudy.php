<?php 
$skytext = $_POST['skytext'];
$email = $_POST['skyID'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en-US,en;q=0.8" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://developers.facebook.com/schema/">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Caption.iT - Cloudy Photo Frame Text Generator</title>

<meta property="og:title" content="Caption iT" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.caption.it/" />
 <link rel="canonical" href="http://www.caption.it" />
 <link rel="stylesheet" type="text/css" href="http://www.caption.it/static/stylesheet.css" />
 <script type="text/javascript" src="http://static.caption.it/XMLHttp.js"></script>
 <script type="text/javascript" src="http://static.caption.it/overlib/overlib.js"><!-- overLIB (c) Erik Bosrup --></script>
 <script>
	var ol_width=200;
	var ol_fgcolor='#fbf9bc';
	var ol_bgcolor='#ff9900';
	var ol_textcolor='#996600';
 </script>

</head>
<body>
<div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<div align="center">
<table class="big_table" width="700" height="381" border="1" align="center" cellpadding="0" cellspacing="0" bgcolor="#FEFDE1" bordercolor="#FF9900" id="tablecontent">
<tr>
  <td height="381">
<script type="text/javascript">
function setAlign(align) {
	document.getElementById('left').className ='thumbimg';
	document.getElementById('center').className ='thumbimg';
	document.getElementById('right').className ='thumbimg';
	document.getElementById(align).className ='thumbimghover';

}
function setImgAlign(align) {
	document.getElementById('northwest').className ='thumbimg';		document.getElementById('northeast').className ='thumbimg';		document.getElementById('center').className ='thumbimg';
		document.getElementById('southwest').className ='thumbimg';		document.getElementById('southeast').className ='thumbimg';	document.getElementById(align).className ='thumbimghover';

}
function changebgPic(bgpiccolor){
	document.bgpic.src = 'http://static.caption.it/bgpreview/cloudy-'+bgpiccolor+'.jpg';
}
function ExpandDisp(id) 
{ 
  var element = document.getElementById(id); 
  if (element.style.display == "none")
     element.style.display = "block"; 
  else if (element.style.display == "block") 
     element.style.display = "none"; 
  return false;
}
</script>
<div>


<h1 class="pageheader" align="center">Cloudy Photo Frame Text Generator</h1>
<table width="800" align="center"><tr>
<td class="captable" align="center">

<form enctype="multipart/form-data" name="captionit" id="captionit" action="http://www.caption.it/create/cloudy.php" method="post" onsubmit="SubmitTheForm()">
<img src="http://cap41.caption.it/16308/captionit6194333671B82.jpg" id="imgcaptionit" border="1" /><br /><br />
<div id="imgpreview" style="text-align:center;display: block;">
</div>

</div>
<div id="codepanel">

<!-- form starts here -->

	<div align="center">
            <br />
            <div style="margin-left: 15px">
              Custom Text&nbsp;
              <input class="captionbox" name="txt1" type="text" size="40" maxlength="83" value="<?php echo $skytext; ?>" />              &nbsp;

              <br />
              <table width="418" border="0" cellpadding="0" cellspacing="0" class="captable">
                <tr class="captable">
                  <td class="captable" width="150" valign="middle"><div align="left">
                   <input name="align" type="hidden" value="center"/>
                    <input name="api" id="api" type="hidden" value="" />
                  	
                       <input name="key" type="hidden" value="cee74b584ed38b5042395fd833b534da" />
		<input name="imgloc" type="hidden" value="http://cap41.caption.it/16308/captionit6194333671B82.jpg" />
                    <input name="facealbum" type="hidden" value="" />
                    
                  </div>
				</td>


                  <td width="125" valign="middle" class="captable">
<div align="center">
<img name="btnSubmit" style="cursor: pointer;" value="Caption Photo" type="image" src="http://static.caption.it/images/create.gif"  align="bottom" onclick="return SubmitTheForm();" />
</div></td>                </tr>
              </table>
			  <br />
            </div>
      </div>
</div>
</form>

<script language="JavaScript">
 document.captionit.submit();
// document.getElementById('btnSubmit').click();
</script>

</div>
</td>
<td class="captable"></td>
</tr>
</table>
<script type="text/javascript" language="JavaScript">
document.captionit.txt1.focus();
document.captionit.txt1.select();
function ValidateKeyStroke(Input)
     {
          var control="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789!?$&#-:'+<*.";
          var newInput="";
          for(i=0;i<Input.value.length;i++)
               {
                    chck=Input.value.charAt(i);
                    if(control.indexOf(chck,0)!=-1)
                         {
                              newInput+=chck;
                         }
               }
          Input.value = newInput;
     }
function sendGlitterfy() {
	window.open('http://www.glitterfy.com/captionit.php?capimg='+document.getElementById('imgcaptionit').src+'');
}
function sendOrkut() {
	window.open('http://www.caption.it/orkut.php?imgurl='+document.getElementById('imgcaptionit').src+'');
}
var submitted = false;
function SubmitTheForm() {
if(submitted == true) { return; }
//ValidateKeyStroke(document.captionit.txt1);
document.captionit.submit();
submitted = true;
}
</script>
</td>
  </tr>
</table>
</div>


<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-210389-9");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
