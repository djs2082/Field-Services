<?php
session_start();
$id=$_GET['id'];
$hash=$_GET['hash'];
$type=$_GET['type'];
$id=$id-1071;
include "cofig.php";
$sql="select hash from forgot_password where id=$id and type='$type'";
$result=mysqli_query($con,$sql);
if(!$result)
{
  echo "Database Error,Try again Later..";
  exit(0);
}
$num=mysqli_num_rows($result);
if($num==0)
{
    echo "this page is forbidden0";
    exit(1);

}
else
{
    $result=mysqli_fetch_array($result);
    if($hash!==$result['hash'])
    {
    echo "this page is forbidden1";
    exit(2);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
    }
}

$_SESSION['id']=$id+1071;
$_SESSION['hash']=$hash;
$_SESSION['type']=$type;
?>

<!DOCTYPE html>
<html>
<head>
<script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">


<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password],select,option {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<form id="rec_pass" action="#" class="model-content animate" style="border:1px solid #ccc">
  <div class="container">
    <h1>Change Password</h1>

    <hr>



    <label for="psw"><b>Password</b></label>
    <input id="fppasswd" type="password" placeholder="Enter Password" name="fppasswd" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input id="refppasswd" type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
<p id="loadingfp"></p>

    <div class="clearfix">
      <button type="submit" class="width:100%" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
<script>
$('#fppasswd, #refppasswd').on('keyup', function () {
  if ($('#fppasswd').val() == $('#refppasswd').val()) {
    $('#loadingfp').html('Matching').css('color', 'green');
  } else 
    $('#loadingfp').html('Not Matching').css('color', 'red');
});
</script>
<script>


$(document).ready(function () {
  $("#rec_pass").on('submit',(function(e)
   {
    if ($('#fppasswd').val() != $('#refppasswd').val())
    {
        alert("both passwords do not match");
        return false;
    }
    e.preventDefault();
        $.ajax({
            url: "change_pass.php", 
            type: "POST",
            data: new FormData(this), 
            contentType:false,     
            cache: false,            
            processData:false, 
            async:true,                    
            success: function(data)  
            {
              if (data == -2) 
              {
                $('#loadingfp').html("Database Error..").css('color','red');
              }
              else if(data == -1)
              {
                $('#loadingfp').html("unable to process,please try again..").css('color','red');
                return false;
              }
              else if(data==1)
              {
                $('#loadingfp').html("password changed successfully...").css('color','green');
                window.location.href = "home.php";

              }
              else
              { 
                $('#loadingfp').html("unexpected error please try again later...").css('color','red');
                 return false;
              }
              
            }
            });
      }));
    });
</script>
</body>
</html>
