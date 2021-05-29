
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>tbs-pocket-knife</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta name="author" content="TheBlacksheep">
<meta name="generator" content="editor">
<meta name="copyright" content="Copyright (c) by theblacksheep">
<meta http-equiv="content-language" content="de,en">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="20 days">
<link rel=stylesheet type="text/css" href="/styles.css">
<link rel=stylesheet type="text/css" href="/forum/forumcss.css">
<script type="text/javascript">
  function LoginClick() {
      document.form_login.action="login.php";
      document.form_login.submit();
</script>
</head>
<body class="usual">
<form name="formular" action="/download/scripts/tbs_pocket_knife.php" method="post">
 <div class="bkgnd_metall" style="padding:1mm;margin-bottom:5mm;width:100%;">
  <h1>tbs-pocket-knive</h1>
  <table cellspacing="0" class="home_module">
   <tr>
     <td style="border-right-width:1px;border-right-style:solid;border-color:#404040;" class="home_maincontent"><textarea name="input" rows="15" cols="45" style="width:100%;margin:0mm;padding:1mm;" class="memo_1"></textarea></td>
     <td rowspan=2>
     <input type=radio name="mission" value="asc2bin" />ascii 2 binary<br />
     <input type=radio name="mission" value="asc2hex" />ascii 2 hex<br />
     <input type=radio name="mission" value="bin2asc" />binary 2 ascii<br />
     <input type=radio name="mission" value="bin2hex" />binary 2 hex<br />
     <input type=radio name="mission" value="hex2asc" />hex 2 ascii<br />
     <input type=radio name="mission" value="hex2bin" />hex 2 binary<br />
     <input type=radio name="mission" value="strrev" />string backwards<br /><br />
     <input type=radio name="mission" value="caesar_shift_bf" />caesar shift bruteforce<br />
     <input type=radio name="mission" value="md5" />md5<br />
     <input type=radio name="mission" value="crypt" />crypt<br />
     <input type=radio name="mission" value="base64enc" />base64 encode<br />
     <input type=radio name="mission" value="base64dec" />base64 decode<br />
     <input type=radio name="mission" value="urlenc" />urlencode<br />
     <input type=radio name="mission" value="urldec" />urldecode<br />
     <input type=radio name="mission" value="serialize" />serialize<br />
     <input type=radio name="mission" value="unserialize" />unserialize<br />
     <input type=radio name="mission" value="stripslashes" />stripslashes<br />
     <input type=radio name="mission" value="addslashes" />addslashes<br />
     <input type="text" size="5" name="textarea1" value="Rows 1. Textarea" class="edit_1" style="width:3cm;" /><br />
     <input type="text" size="5" name="textarea2" value="Rows 2. Textarea" class="edit_1" style="width:3cm;" /><br /><br />
     <div class="button1_up" onClick="javascript:document.formular.submit()" onMouseover="this.className='button1_hover';" onMouseout="this.className='button1_up';" style="width:100px;">whatever</div>

     </td>
   </tr>
   <tr>
     <td style="border-right-width:1px;border-right-style:solid;border-color:#404040;" class="home_maincontent"><textarea name="output" rows="15" cols="45" style="width:100%;margin:0mm;padding:1mm;" class="memo_1"></textarea></td>
   </tr>
  </table>
 </div>
</form>
</body>
</html>
