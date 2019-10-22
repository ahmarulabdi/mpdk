<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">
function validasi(form){
  if (form.username.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.password.value == ""){
    alert("Anda belum mengisikan Password.");
    form.password.focus();
    return (false);
  }
  return (true);
}
</script>

<link href="<?php echo base_url('style_login.css');?>" rel="stylesheet" type="text/css" />

<!-- ----------------------------------
    	:: Script untuk auto focus cursor ::
    	 ---------------------------------- -->
  	<script type="text/javascript">
		function setFocus()
			{
			document.getElementById("username").focus();
			}
	</script>
    
    <!-- ----------------------------------
    	:: End Script untuk auto focus cursor ::
    	 ---------------------------------- -->
</head>
<body onload="setFocus()">

<form id="form-login" name="login" method="post" action="<?php echo base_url('index.php/login/login_')?>" onSubmit="return validasi(this)">
  <table bgcolor='#000' width="10%" align='center' border="0" cellpadding="2">    
   	 <tr>
      <td colspan='3'><h1>ADMIN LOGIN</h1></td>
      </tr>
    <tr>
      <td>Username</td>
      <td>:</td>
      <td><input type="text" name="username" id="username" size="30" class="input-teks" placeholder="Username" autocomplete="off"  /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td>:</td>
      <td><input type="password" name="password" size="30" class="input-teks" placeholder="Password" autocomplete="off"/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td></td>
      <td><input type="submit" class="input-button" value="Log In" /> <input type="reset" class="input-button" value="Reset" /></td>
    </tr>
  </table>
  </form>
<div id="footer">
<font color='#666'>Copyright &copy; 
<?php 
	date_default_timezone_set('Asia/Jakarta');
	echo date('Y') ?>
</font>
</div>

</body>
</html>
