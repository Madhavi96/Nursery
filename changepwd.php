<?php

	include_once('header.php');
	
?>
<div class="main-container">
	<div class="form-head">Change Your Password</div>
	<form class="myform" action='includes/pwdchange.inc.php' method="POST">
		<input type="text" name="uid" placeholder="Username/E-mail">
		<input type="password" name="currentpwd" placeholder="Current password">
		<input type="password" name="newpwd" placeholder="New password">
		<input type="password" name="confirmpwd" placeholder="Confirm the new password">	
		<button type="submit" name="submit" >Change password</button>

	</form>
	</div>