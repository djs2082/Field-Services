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
$sql="select * from Customers where email='$username' and password='$password'";
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
<html lang="en">
<head>
  <title>Your Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="cust_login.js"></script>
  <style>
  .navbar {
      margin-bottom: 0;
      border-radius: 0;
          }
  .pointer {cursor: pointer;}

  footer {
      background-color: #f2f2f2;
      padding: 25px;
         }

  .msg_container 
  {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
  }

  .msg_darker 
  {
  border-color: #ccc;
  background-color: #ddd;
  }

.message
 {
    border-bottom: solid 1px #ccc;
    padding: 30px;
    direction: ltr; 
 }



 /* loader */


 .blur   {
    filter: blur(5px);
    -webkit-filter: blur(5px);
    -moz-filter: blur(5px);
    -o-filter: blur(5px);
    -ms-filter: blur(5px);
}
 @media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0;
  }
    .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}
.modal2 {
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
.modal2-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 20%; /* Could be more or less, depending on screen size */
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
 /* loader */

</style>
</head>
<body>

<div id="load" class="modal2">
  
  <div class="modal2-content animate" > 
<div class="loader" align="center" id="loader" style="display:block;margin:0 auto;"></div>
  </div>
</div>
<div id='body'>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="cust_login2.php">Home</a></li>
        <li><a href="#">About</a></li>
        
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron">
  <div class="container text-center">
   <a value='plumber' onclick="search_service(this)" class="pointer" title="plumber services"><img src="images/plumber.png" hspace="8" vspace="5"/></a>
    <a value='laundary' onclick="search_service(this)" class="pointer" title="laundary services"><img src="images/laundary.png" hspace="8" vspace="5"/></a>
    <a value='electrician' onclick="search_service(this)" class="pointer" title="electrician services"><img src="images/electrician.png" hspace="8" vspace="5"/></a>
    <a value='groccery' onclick="search_service(this)" class="pointer" title="groccery services"><img src="images/groccery.png" hspace="8" vspace="5"/></a>
    <a value='cleaner' onclick="search_service(this)" class="pointer" title="cleaner services"><img src="images/cleaner.png" hspace="8" vspace="5"/></a>
    
  </div>
</div>




<div class="container-fluid bg-3 text-center">    
  <h3>Your Services Served</h3><br>
  <div class="row" id="row">
    
    <?php 
    if(isset($_SESSION['count']))
    {
    
    for($i=0;$i<$_SESSION['count'];$i++)
    {
      $arr=$_SESSION['provider'.$i];
      $first_name=$arr['first_name'];
      $last_name=$arr['last_name'];
      $distance=$arr['distance'];
      $time=$arr['time'];
      $email=$arr['email'];
      $phone=$arr['mobile'];
      $id=$arr['id'];
      $busy=$arr['busy'];
      $accept=0;
      if (array_key_exists('accept', $arr))
      {
      $accept=$arr['accept'];
      }
      $temp=explode(" ",$distance);
      if($temp[1]=='m')
      {
        $temp[0]=$temp[0]/1000;
      }
       if($temp[0]>2)
       {
        $temp[0]=(float)$temp[0]-2;
       }
     $price=180+(float)$temp[0]*10;
      if($accept==1)
      {
        echo "<div class='msg_container msg_darker message'>
        <div class='row'>
        <div class='col-sm-4'><img src='images/avtar' alt='avtar'></div>
        <div class='col-sm-4'> <p><b>Name:</b>$first_name $last_name</p> 
        
        <div id=1$i style='display:block'>
         <p><b>Email:</b>$email</p>
         <p><b>Mobile:</b>$phone</p>
        </div>
        <p><b>Distance:</b>$distance </p> 
        <p><b>Time:</b>$time</p>
        </div>
        <div class='col-sm-4'> 
        <b><p title='180+($temp[0])*10'>Charges<p style='color:red'>$price<i class='fa fa-rupee'></i></p></p></b>
        <button id=$i  onclick='book(this)' class='button btn btn-danger' disabled>Confirmed</button>
        </div>
        </div>
        </div>";
        break;
      }
     
     if($busy==0)
     {
       echo "<div class='msg_container msg_darker message'>
     <div class='row'>
     <div class='col-sm-4'><img src='images/avtar' alt='avtar'></div>
     <div class='col-sm-4'> <p><b>Name:</b>$first_name $last_name</p> 
     
     <div id=1$i style='display:none'>
      <p><b>Email:</b>$email</p>
      <p><b>Mobile:</b>$phone</p>
     </div>
     <p><b>Distance:</b>$distance </p> 
     <p><b>Time:</b>$time</p>
     </div>
     <div class='col-sm-4'> 
     <b><p title='180+($temp[0])*10'>Charges<p style='color:red'>$price<i class='fa fa-rupee'></i></p></p></b>
     <button id=$i  onclick='book(this)' class='button btn btn-success'>Book</button>
     </div>
     </div>
     </div>";
     }
     else
     {
      echo "<div class='msg_container msg_darker message'>
     <div class='row'>
     <div class='col-sm-4'><img src='images/avtar' alt='avtar'></div>
     <div class='col-sm-4'> <p><b>Name:</b>$first_name $last_name</p> 
     
     <div id=1$i style='display:block'>
      <p><b>Email:</b>$email</p>
      <p><b>Mobile:</b>$phone</p>
     </div>
     <p><b>Distance:</b>$distance </p> 
     <p><b>Time:</b>$time</p>
     </div>
     <div class='col-sm-4'> 
     <b><p title='180+($temp[0])*10'>Charges<p style='color:red'>$price<i class='fa fa-rupee'></i></p></p></b>
     <button id=$i onclick='book(this)' class='button btn btn-success' disabled>Booked</button>
     </div>
     </div>
     </div>"; 
     }
    }
  }
    ?>
   
  </div>
</div><br>
<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <p>nearly 1500 plumbers registered</p>
      <img src="images/plumber.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>nearly 9000 electrician registered</p>
      <img src="images/electrician.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>nearly 1200 laundaries registered</p>
      <img src="images/laundary.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>nearly 700 grocceries registered</p>
      <img src="images/groccery.jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
</div><br><br>
<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
</div>
</body>
</html>
