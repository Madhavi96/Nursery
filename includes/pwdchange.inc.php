<?php
session_start();

if(isset($_POST['submit'])) {
	include 'dbh.inc.php';
	
	$uid= mysqli_escape_string($conn , $_POST['uid']);
	$currentpwd= mysqli_escape_string($conn , $_POST['currentpwd']);
	$newpwd= mysqli_escape_string($conn , $_POST['newpwd']);
	$confirmpwd= mysqli_escape_string($conn , $_POST['confirmpwd']);

	if(empty($uid) || empty($currentpwd)||empty($newpwd)||empty($confirmpwd)){
		header("Location: ../changepwd.php?login=empty"); 		     
		exit();
	}else{
		$sql="SELECT * FROM childinfo WHERE user_uid = '$uid' OR user_email='$uid' ";
		$result=mysqli_query($conn , $sql );
		$resultCheck= mysqli_num_rows($result);
		if($resultCheck <1){
			header("Location: ../changepwd.php?login=uidmismatch");
			exit();	

		}else{
			if($row = mysqli_fetch_assoc($result)){
				if($currentpwd != $row['user_pwd']){
					header("Location: ../changepwd.php?login=pwdmismatch");
					exit();	
				}else{
					if($newpwd != $confirmpwd) {
						header("Location: ../changepwd.php?login=confirmationinvalid");
						exit();
					}else{
						/* update pwd */

						if () {
							# code...
						}


						
						$sql = "UPDATE childinfo SET user_pwd='$newpwd' WHERE user_uid='$uid' ";
			           
			            $retval = mysqli_query( $conn , $sql );
			            
			            if($retval ) {		            		
				              	
								
							
			            }
			            
					}
				}
			}
		
		}
	}
}
	

?>