<!DOCTYPE HTML>
<html>
<head>
<title>Sistem Informasi Manajemen Keungan Berkah Sistem</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/structure.css">
</head>

<body>
<center>
<form class="box login" action="<?php echo base_url();?>login/cek_login" method="post">
	<fieldset class="boxBody">

	  <input type="text" tabindex="1" placeholder="Username" name="username" required>
	  <input type="password" tabindex="2" placeholder="Password" name="password" required>
	</fieldset>
	<footer>
		<span style="color:red;"><?php echo $this->session->flashdata('confirm');?></span>
	  <input type="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
</form>
</center>
<footer id="main">

</footer>
</body>
</html>
