<?php include("connection.php");?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Validation</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style1.css" rel="stylesheet">
  <script src="https://code.jquery/jquery-3.1.0.min.js"> </script>-->
	<script type="text/javascript" src="js/voting.js"></script>
    <style type="text/css">
    #form1{
      background-color:  #FFF;
      border-radius: 15px;
      color: #FFF;
      padding-top: 100px;
      left: 50%;
      position: absolute;
      transform: translate(-50%,-50%);
      box-sizing: border-box;
      
    }
  </style>
 
</head>
<body style="background-color:lightgrey;">
  <div class="col-md-12">
    <div class="row">
      <div class="container">
        <div class="col-md-6 col-md-offset-3">
          <div class="modal-body">
            <form id="" action="records/adduser.php" method="post" class="well">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Names" name="FirstName" required="" onkeypress="return(event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && eve.charCode <123)">
              </div> 
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" placeholder="Last Name" name="LastName" required="" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
              </div> 

              <div class="form-group">
                 <label>Date of Birth</label>
                 <input type="date" class="form-control" placeholder="DOB" name="DOB" required="">
              </div>

              <div class="form-group">
                 <label>Phone</label>
                 <input type="number" class="form-control" placeholder="PhoneNumber" name="Phone" required="" onkeypress='return isNumberKey(event)'>
              </div>

              <div class="form-group">
                 <label>Email</label>
                 <input type="Email" class="form-control" placeholder="Email" name="Email" required="" id="Email" onBlur="checkemailAvailability();" data-id="defaultRegisterFormEmail" >
              </div>
              <span id="email-availability-status"></span>
              <div class="form-group">
                <label>User Name</label>
                <input type="text" class="form-control" placeholder="Username" name="UserName" id="UserName"  required="" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)">
              </div> 
              <div class="form-group">
                 <label>Password</label>
                 <input type="password" class="form-control" placeholder="Password" name="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"  aria-describedby="defaultRegisterFormPasswordHelpBlock" id="psw" autocomplete="off" required="" onkeyup='check();' required="">
                 <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    At least 6 characters and 1 digit
                 </small>
              </div>
              <div class="form-group form-input">
                <input type="password" class="form-control" name="confirmpassword" id="confirmPwd" placeholder="Confirm Password" onkeyup='check();' autocomplete="off" required="">
              </div>
              <span id="message"></span>
             
                                 
              <div class="modal-footer">               
                <button type="submit" name="adduser" class="btn btn-success"> <span class="glyphicon "></span>Register</button>
              </div>
            </form>                 
          </div>
        </div>
      </div>
    </div>
  </div>





   
     
    <!-- Bootstrap core JavaScript
    ================================================== --> 
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"> </script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!--========== validate input field to accept numbers only=====----->
      <script>
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
      </script>
    <!-- =============================================================--->

     <!-- ====================checking if email Already exist===========-->
      <script>
        function checkemailAvailability() {
          $("#loaderIcon").show();
          jQuery.ajax({
          url: "checking/availabilityEmail.php",
          data:'Email='+$("#Email").val(),
          type: "POST",
          success:function(data){
          $("#email-availability-status").fadeIn().html(data);
          setTimeout(function(){
            $("#email-availability-status").fadeOut("slow");
          }, 3000);
          // $("#loaderIcon").hide();
          },
          error:function (){}
          });
          }
      </script>
    <!--===============================================================-->

    <!-- =====================password strength========================-->
      <script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
          document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
          document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
          // Validate lowercase letters
          var lowerCaseLetters = /[a-z]/g;
          if(myInput.value.match(lowerCaseLetters)) { 
            letter.classList.remove("invalid");
            letter.classList.add("valid");
          } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }

        // Validate capital letters
        var upperCaseLetters = /[A-Z]/g;
        if(myInput.value.match(upperCaseLetters)) { 
          capital.classList.remove("invalid");
          capital.classList.add("valid");
        } else {
          capital.classList.remove("valid");
          capital.classList.add("invalid");
        }

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) { 
          number.classList.remove("invalid");
          number.classList.add("valid");
        } else {
          number.classList.remove("valid");
          number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 6) {
          length.classList.remove("invalid");
          length.classList.add("valid");
        } else {
          length.classList.remove("valid");
          length.classList.add("invalid");
        }
      }
      </script>
    <!--===============================================================-->

    <!-- ===================jquery check confirm password=====================-->
     <script>
       $('#psw, #confirmPwd').on('keyup', function(){
        if ($('#psw').val()== $('#confirmPwd').val()) {
          $('#message').html('Matching').css('color', green);
        }else
        $('#message').html('Not matching').css('color', red);
       });
     </script>
    <!--======================================================================-->
    

 </body>
</html>