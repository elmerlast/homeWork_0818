
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>會員系統-首頁</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<table width="300" border="7" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
  <tr>
    <td align="center" bgcolor="#CCCCCC"><font color="#FFFFFF">會員系統 - 首頁</font></td>
  </tr>
  <tr>
  <?php if($data->sUserName == "Guest"):?> 
    <td align="center" valign="baseline"><a href="login">登入</a> 
  <?php else: ?>
    <td align="center" valign="baseline"><a href="status">登出</a> 
  <?php endif; ?>    

    | <a href="secret">會員專區</a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#CCCCCC">&nbsp;歡迎！ <?=$data->sUserName ?></td>
  </tr>
</table>
</form>

</body>
</html>