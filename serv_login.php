<?php
session_start();
if(!isset($_SESSION['username']) || (!isset($_SESSION['password'])))
{
  echo "this page is forbidden";
  exit(0);
}
include "config.php";
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$sql="select * from Service_Providers where email='$username' and password='$password'";
$result=mysqli_query($con,$sql);
if(!$result)
{
  echo "Database Error";
  exit(1);
}
$num=mysqli_num_rows($result);
if($num==0)
{
  echo "this page is forbidden";
  exit(2);
}
if($num>1)
{
echo "invalid entries in database ,please try again later..";
exit(3);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Your Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="serv_login.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="serv_login.css">
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Field services</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index2.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>



<div id="id01" class="modal">
  
  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Login</button>
   
    </div>

  
  </form>
</div>

<div class="jumbotron col-sm-3 col-md-6 col-lg-4">
  <div class="w3-content w3-section" id="images" >
  <img class="mySlides" src="images/laundary.jpg" style="width:100%">
  <img class="mySlides" src="images/electrician.jpg" style="width:100%;height=100%">
  <img class="mySlides" src="images/cleaner.jpg" style="width:100%">
  <img class="mySlides" src="images/groccery.jpg" style="width:100%">
  <img class="mySlides" src="images/plumber.jpg" style="width:100%">
</div>
<div class="w3-center">
  <div class="w3-section">
    <button class="w3-button w3-light-grey" onclick="plusDivs(-1)">❮ Prev</button>
    <button class="w3-button w3-light-grey" onclick="plusDivs(1)">Next ❯</button>
  </div>
<div id="btn">
  <button class="w3-button demo" onclick="currentDiv(1)">1</button> 
  <button class="w3-button demo" onclick="currentDiv(2)">2</button> 
  <button class="w3-button demo" onclick="currentDiv(3)">3</button> 
  <button class="w3-button demo" onclick="currentDiv(4)">4</button> 
  <button class="w3-button demo" onclick="currentDiv(5)">5</button> 
</div>
</div>
</div>

<div id="rq" class="col-sm-9 col-md-6 col-lg-8">
<?php
if(isset($_SESSION['count']))
    {
    for($i=0;$i<$_SESSION['count'];$i++)
    {
      $arr=$_SESSION['customer'.$i];
      $first_name=$arr['first_name'];
      $last_name=$arr['last_name'];
      $address=$arr['address'];
      $pin_code=$arr['pin_code'];
      $email=$arr['email'];
      $mobile=$arr['mobile'];
      $id=$arr['id'];
      $accept=$arr['accept'];
     
     if($accept==0)
     {
  echo "<div class='msg_container msg_darker message'><div class='row'> <div class='col-sm-4'><img src='images/avtar' alt='avtar'></div>  <div class='col-sm-4'> <p><b>Name:</b>$first_name $last_name</p> <div id=1$i ><p><b>Email:</b> $email</p>           <p><b>Mobile:</b>$mobile</p>          </div>          <p><b>Address:</b>$address</p>          <p><b>Pincode:</b>$pin_code</p> </div><div class='col-sm-4'> <button  id=$i onclick='re_confirm(this)' class='btn btn-danger'>Confirm</button> </div></div> </div>";
     }
     else
     {
      echo "<div class='msg_container msg_darker message'><div class='row'> <div class='col-sm-4'><img src='images/avtar' alt='avtar'></div>  <div class='col-sm-4'> <p><b>Name:</b>$first_name $last_name</p>      <div id=1$i >           <p><b>Email:</b>$email</p>           <p><b>Mobile:</b>$mobile</p>          </div>          <p><b>Address:</b>$address</p>          <p><b>Pincode:</b>$pin_code</p> </div><div class='col-sm-4'> <button  id=$i onclick='re_confirm(this)' class='btn btn-danger' disabled>Confirmed</button> </div></div> </div>"; 
     }
    }
  }
  else
  {
    echo "but whty";
  }
?>





</div>

<script>
function currentDiv(n) {
  showDivs(slideIndex = n);
}

var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
currentDiv(myIndex);
  setTimeout(carousel, 5000); // Change image every 2 seconds
}

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}
function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-red", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-red";
}
</script>











<footer class="container-fluid text-center">
</footer>

</body>
</html>

