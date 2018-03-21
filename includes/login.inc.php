<?php
session_start();



if(isset($_POST['submit'])){

	include 'dbh.inc.php';
	$found=false;
	$uid= mysqli_escape_string($conn , $_POST['uid']);
	$pwd= mysqli_escape_string($conn , $_POST['pwd']);
	if(empty($uid) || empty($pwd)){
		header("Location: ../index.php?login=empty"); 
		$found=false;           
		exit();
	}else{
		$sql="SELECT * FROM childinfo WHERE user_uid = '$uid' OR user_email='$uid' ";
		$result=mysqli_query($conn , $sql );
		$resultCheck= mysqli_num_rows($result);
		if($resultCheck <1){
			$sql="SELECT * FROM teacherinfo WHERE user_uid = '$uid' OR user_email='$uid' ";
			$result=mysqli_query($conn , $sql );
			$resultCheck= mysqli_num_rows($result);
			if($resultCheck <1){
				$sql="SELECT * FROM financedinfo WHERE user_uid = '$uid' OR user_email='$uid' ";
				$result=mysqli_query($conn , $sql );
				$resultCheck= mysqli_num_rows($result);
				if($resultCheck <1){
					$sql="SELECT * FROM healthdinfo WHERE user_uid = '$uid' OR user_email='$uid' ";
					$result=mysqli_query($conn , $sql );
					$resultCheck= mysqli_num_rows($result);
					if($resultCheck <1){
						header("Location: ../index.php?login=uidmismatch");
						exit();
					}else{
						$found=true;
						$person=4;
					}

				}else{
					$found = true;
					$person=3;
				}

			}else{
				$found = true;
				$person=2;
			}
		}else{
			$found = true;
			$person=1;
		}
		if($found==true){
			$found=false;
			if($row = mysqli_fetch_assoc($result)){
				/*$hashedPwdCheck = password_verify($pwd , $row['user_pwd']);    */
				if($pwd != $row['user_pwd']){
					header("Location: ../index.php?login=pwdmismatch");
					exit();	
				}elseif ($pwd==$row['user_pwd']) {
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_address'] = $row['user_address'];
					$_SESSION['u_dob'] = $row['user_dob'];
					$_SESSION['u_tp'] = $row['user_tp'];
					$_SESSION['u_uid'] = $row['user_uid'];
					$_SESSION['u_pwd'] = $row['user_pwd'];
					
					if($person==1){
						header("Location: ../childstuff.php?login=childstuff");
						exit();	
					}elseif ($person==2) {
						header("Location: ../teacherstuff.php?login=teacherstuff");
						exit();
					}elseif ($person==3) {
						header("Location: ../financedstuff.php?login=financedstuff");
						exit();
					}elseif ($person==4) {
						header("Location: ../healthdstuff.php?login=healthdstuff");
						exit();
					}

					
				}
				
			}
		}else{
			header("Location: ../index.php?login=uidmismatch");
			exit();

		}
	}
}else{
	header("Location: ../index.php");
	exit();
}



?>