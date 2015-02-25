<?php
//session_start();
?>
<html>
<title>Please Log In</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<body>
<form name="login" method="post" action="verify.php">
<table width="290" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr> 
      <td colspan="2"><div align="center"> Please log in</div> 
      </td>
    </tr>
    <tr> 
      <td width="99" bgcolor="#CCCCCC"> <div align="right">login</div></td>
      <td width="181" bgcolor="#CCCCCC"> <div align="left"> 
          <input name="username" type="text" id="username">
        </div></td>
    </tr>
    <tr> 
      <td bgcolor="#CCCCCC"> <div align="right">password</div></td>
      <td bgcolor="#CCCCCC"> <div align="left"> 
          <input name="password" type="password" id="password">
        </div></td>
    </tr>
    <tr> 
      <td colspan="2"><div align="center"> 
          <input type="submit" name="Submit" value="Submit">
        </div></td>
    </tr>

	<tr>
	<td colspan=2 align=center>
		<a href="../index.php">Back to Site!</a>
	</td>
	</tr>
  </table>
</form>
</body>
</html>
