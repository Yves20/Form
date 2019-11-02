<?php
  include("../connection.php");
  //checking email
  if (!empty($_POST["Email"])) {
  	$result = mysqli_query($link,"SELECT count(*) FROM person WHERE Email='".$_POST['Email']."' ");
  	$row = mysqli_fetch_row($result);
  	$email_count = $row[0];
    
  	if ($email_count >0) {
  		echo "<span style='color:tomato;font-family:time new roman;font-size:18px'>This Email Already Exist!! try another one.</span>";
  	}else{
      echo "<span style='color:green;font-family:time new roman;font-size:18px;'>This Email is Available.</span>";
    }
    
  }
  //end of checking email


?>