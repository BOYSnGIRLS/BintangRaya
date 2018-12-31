z<body>
<div id="main">
<div id="login">
<?php echo @$error; ?>
<h2>Change Password</h2>
<br>
<form method="post" action='change_pass'>
	<?php echo $this->session->userdata('username'); ?>
<label>Old Password :</label>
<input type="password" name="old_pass" id="password" placeholder="Old Pass"/><br /><br />
<label>New Password :</label>
<input type="password" name="new_pass" id="password2" placeholder="New Password"/><br/><br />
<label>Confirm Password :</label>
<input type="password" name="confirm_pass" id="password" placeholder="Confirm Password"/><br/><br />
<input type="submit" value="login" name="change_pass"/><br />
</form>
</div>
</div>
</body>