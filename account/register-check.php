<?php 
  include(ROOT_PATH.'/config/dbconnection.php');
  if (isset($_POST['surel_check'])) {
  	$surel = $_POST['surel'];
  	$sql = "SELECT * FROM anggota WHERE surel='$surel'";
  	$results = mysqli_query($con, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
  	exit();
  }
  if (isset($_POST['simpan'])) {
    //$username = $_POST['username'];
  	$email = $_POST['surel'];
  	//$password = $_POST['password'];
  	$sql = "SELECT * FROM users WHERE surel='$surel'";
  	$results = mysqli_query($con, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "exists";	
  	  exit();
  	}else{
      include("register-engine.php");
      /*$query = "INSERT INTO users (username, email, password) 
  	       	VALUES ('$username', '$email', '".md5($password)."')";
        $results = mysqli_query($db, $query);
        */
  	  echo 'Saved!';
  	  exit();
  	}
  }

?>