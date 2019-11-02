<?php
include'../connection.php';
if(isset($_POST['adduser'])){
  $em = $_POST['Email'];
    $query = "SELECT Email FROM person WHERE Email='$em' ";
    $run =mysqli_query($link,$query)or die("Error: " . mysqli_error($link));
    if (mysqli_num_rows($run)>0) {
        echo '<p style="font-size:20px;color:red">
            <script>
              alert("Sorry!! The Email You have Entered is alredy taken, Please Try Another One");
            </script>
          </p>
          ';
      header("refresh:0.1, url=../formValidation.php");
    }else{
      $sql = "INSERT INTO person(FirstName,LastName,DOB,Phone,Email,UserName,Password,RegDate) VALUES('".$_POST["FirstName"]."','".$_POST["LastName"]."','".$_POST["DOB"]."','".$_POST["Phone"]."','".$_POST["Email"]."','".$_POST['UserName']."', '".md5($_POST["Password"])."',NOW())";
      if($link->query($sql) === TRUE){
        echo '<script>alert("Staff Added Successfully")</script>';
        header("Refresh: 0.1; url=../formValidation.php");
      	//header('Location:../manager.php');
      }else{
      	echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $link->error."');</script>";
      }
    }
  
  $link->close();

  }
?>

 