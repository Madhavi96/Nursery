<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<nav>
			<div class="main-wrapper">

				<ul>
					<li><a href="index.php"> Home </a></li>	
												
				</ul>

				
				<img src='head.JPG' width="500" height="100" />
				<div class="nav-login">

					<?php
						if(isset($_SESSION['u_uid'])){
							echo "<form action='includes/logout.inc.php' method='POST'>
							<button type='submit' name='submit'>Log out</button></form>";

						}else{
							echo "<form action='includes/login.inc.php' method='POST'>
								<input type='text' name='uid' placeholder='Username/E-mail'>
								<input type='password' name='pwd' placeholder='Password'>
								<button type='submit' name='submit'> Login </button>
								</form>
								";
						}
					?>

					

					
					
				</div>
				
			</div>

		</nav>
	</header>