<!DOCTYPE html>
<html lang="en">
<head>
  <title>Your Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="index.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="index.css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <style>
 .center {
  margin: auto;
  width: 50%;
  /* border: 3px solid green; */
  padding: 10px;
}

  </style>
  <script>

    function check()
    {
      
      var pass=document.getElementById('sppasswd').value;
      var rppass=document.getElementById('resppasswd').value;
  
      if(pass.length<8)
      {
        document.getElementById('sp_pas_len').innerHTML="*password length shoulde be 8 or greater";
      }
      else
      {
        document.getElementById('sp_pas_len').innerHTML="";
      }
      if(pass===rppass)
      {
        document.getElementById('loadingsp').style.color="green";
        document.getElementById('loadingsp').innerHTML="Matching";
      }
      else
      {
        
        document.getElementById('loadingsp').style.color="red";
        document.getElementById('loadingsp').innerHTML="Not Matching";
      
      }
    }
    </script>
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
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

<div class="dropdown">
  <li> <a style="width:286px" onclick="myFunction()" class="glyphicon glyphicon-log-in dropbtn">login</a></li>
  <div id="myDropdown" class="dropdown-content">
  <button class="loging_buttons login" id="login_btn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"></a>Custormer Login</button>
<button class="loging_buttons login" id="login_btn" onclick="document.getElementById('id05').style.display='block'" style="width:auto;"></a>Service Login</button>
<button class="loging_buttons" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Sign UP</button>
  </div>
</div>
     </ul>
    </div>
  </div>
</nav>

<div id="id01" class="modal">
  <form id="login_cust" class="modal-content animate" action="#" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <div><p><i class="fa fa-user avtar fa-5x"></i></p></div>
    </div>
<div class="container">
      <label for="uname"><b>Email</b></label>
      <input id="uname" type="text" placeholder="Enter Email" name="uname" required>
     <label for="psw"><b>Password</b></label>
      <input id="passwd" type="password" placeholder="Enter Password" name="psw" required>
        <p id="loading"></p>
        <p id="msg"></p>
      <button type="submit">Login</button>
      <label>
        <input name="remember" type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
    <b><p id="cust_lg_error"></p></b>
<div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#" onclick=change()>password?</a></span>
    </div>
  </form>
</div>


<div id="id02" class="modal">
  <form id="sign_up" class="modal-content animate" method="post" action="/action_page.php">
    <div class="container">
    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <p style="text-align:center;font-size:60"><i id="question" class="fa fa-user avtar"></i></p>
      
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="type"><b>Enter Type:</b></label>
      <select onchange="display_options()" id="type" type="text" placeholder="Enter Type" name="type" required>
      <option>Customer</option>
      <option >Service Provider</option>
      </select>
      <div  id="service_type" style="display:none">
      <label for="service"><b>Enter the Service You Provide</b></label>
      <select  onchange="change_service()" id="service" type="text" placeholder="Enter Type of Service" name="service" required>
      <option>Electrician</option>
      <option>Plumber</option>
      <option>Laundary Service</option>
      <option>cleaner</option>
      <option>groccery</option>
      </select><p><i id="serv" class="fa dj"></i></p>
    </div>
    <div id="free_time" style="display:none">
    <label for="free_time"><b>Enter Your Free Time of Week</b><br>
    <select name="week_start" for="week_start">
    <option value=0>Monday</option>
    <option value=1>Tuesday</option>
    <option value=2>Wednesday</option>
    <option value=3>Thursday</option>
    <option value=4>Friday</option>
    <option value=5>Saturday</option>
    <option value=6>Sunday</option>
    </select> To <select name="week_end" for="week_end"><option value=6>Sunday</option>
    <option value=5>Saturday</option>
    <option value=4>Friday</option>
    <option value=3>Thursday</option>
    <option value=2>Wednesday</option>
    <option value=1>Tuesday</option>
    <option value=0>Monday</option>
    </select> Select Free time   <input  name="start_time" value="09:00" type="time"/>To<input name="end_time" value="06:00" type="time"/>
     </div>
     <label for="first_name"><b>Name</b></label>
      <input  id="first_name" type="text" placeholder="Enter First Name" name="first_name" required>
      <label for="last_name"><b>Name</b></label>
      <input  id="last_name" type="text" placeholder="Enter Last Name" name="last_name" required>
      <label for="email"><b>Email</b></label>
      <input id="email" type="email" placeholder="Enter Email" name="email" required><p style="color:red" id='em_warn'></p><br>
      <label for="mobile"><b>Mobile</b></label>
      <input autocomplete="off" maxlength="10" id="name" type="tel" pattern="[0-9]{10}" placeholder="Enter Mobile" name="mobile" required>

      
      

      
  
      <label for="gender"><b>Gender</b></label>
      <select id="gender" type="text" placeholder="Enter Gender" name="gender" required>
      <option>Male</option>
      <option>Female</option>
      </select>
      <label for="state"><b>Select State:</b></label>
      <select  onchange="change_cities()" id="state" type="text"  name="state">
      <option>Maharashtra</option>
      <option>Tripura</option>
<option>Lakshadweep (UT)</option>
<option>Daman and Diu (UT)</option>
<option>Mizoram</option>
<option>Kerala</option>
<option>Jammu and Kashmir</option>
<option>West Bengal</option>
<option>Haryana</option>
<option>Bihar</option>
<option>Karnataka</option>
<option>Nagaland</option>
<option>Assam</option>
<option>Rajasthan</option>
<option>Punjab</option>
<option>Himachal Pradesh</option>
<option>Delhi (NCT)</option>
<option>Goa</option>
<option>Sikkim</option>
<option>Meghalaya</option>
<option>Telangana</option>
<option>Jharkhand</option>
<option>Manipur</option>
<option>Andhra Pradesh</option>
<option>Gujarat</option>
<option>Dadra and Nagar Haveli (UT)</option>
<option>Madhya Pradesh</option>
<option>Tamil Nadu</option>
<option>Odisha</option>
<option>Puducherry (UT)</option>
<option>Chandigarh (UT)</option>
<option>Uttarakhand</option>
<option>Uttar Pradesh</option>
<option>Arunachal Pradesh</option>
<option>Andaman and Nicobar Island (UT)</option>
<option>Chhattisgarh</option>
      </select>

      <select  id="city" type="text"  name="city">
      <option>Nanded</option>
      <option>Akola</option>
<option>Amravati</option>
<option>Aurangabad</option>
<option>Beed</option>
<option>Bhandara</option>
<option>Buldhana</option>
<option>Chandrapur</option>
<option>Dhule</option>
<option>Gadchiroli</option>
<option>Gondia</option>
<option>Hingoli</option>
<option>Jalgaon</option>
<option>Jalna</option>
<option>Kolhapur</option>
<option>Latur</option>
<option>Mumbai City</option>
<option>Mumbai Suburban</option>
<option>Nagpur</option>
<option>Nandurbar</option>
<option>Nashik</option>
<option>Osmanabad</option>
<option>Palghar</option>
<option>Parbhani</option>
<option>Pune</option>
<option>Raigad</option>
<option>Ratnagiri</option>
<option>Sangli</option>
<option>Satara</option>
<option>Sindhudurg</option>
<option>Solapur</option>
<option>Thane</option>
<option>Wardha</option>
<option>Washim</option>
<option>Yavatmal</option>
      </select>

<label for="address"><b>Enter Address:</b></label>
<input id="address" type="text" placeholder="Enter Address" name="address" required>
  
<label for="pincode"><b>Enter Pin Code:</b></label>
<input id="address" type="tel" maxlength="6" pattern="[0-9]{6}" placeholder="Enter Pincode" name="pincode" required>


      <label for="psw"><b>Password</b></label>
      <input id="sppasswd" type="password" placeholder="Enter Password" name="sppasswd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

      <label  for="psw-repeat"><b>Repeat Password</b></label>
      <input oninput="check()" id="resppasswd" type="password" placeholder="Repeat Password" name="resppasswd" required>
      <b><p style="color:red" id="sp_pas_len"></p> </b>
     <b> <p id="loadingsp"></p></b>
      

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
</div>


<div id="id05" class="modal">
  <form id="login_sp" class="modal-content animate" action="#" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
      <div><p><i class="fa fa-wrench avtar fa-5x"></i></p></div>
    </div>
<div class="container">
      <label for="uname"><b>Email</b></label>
      <input id="uname" type="text" placeholder="Enter Email" name="uname" required>
     <label for="psw"><b>Password</b></label>
      <input id="passwd" type="password" placeholder="Enter Password" name="psw" required>
        <p id="loading"></p>
        <p id="msg"></p>
      <button type="submit">Login</button>
      <label>
        <input name="remember" type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
    <b><p id="s_login_error"></p></b>
<div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#" onclick=change()>password?</a></span>
    </div>
  </form>
</div>



<div id="id03" class="modal">
  <form id="forg_pass" class="modal-content" method="post" action="/action_page.php">
    <div class="container">
    <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <h1>Forgot Password:</h1>
      <hr>
      <label for="email"><b>Email</b></label>
      <input id="fp_email" type="text" placeholder="Enter Email" name="email" required>
      <label for="type"><b>Select Type</b></label>
      <select id="fp_type" type="text" name="type"><option>Customer</option><option>Service Provider</option></select>
       <p id="fp_msg"></p>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" class="signupbtn">Send Link</button>
      </div>
    </div>
  </form>
</div>


<div sytle="width:60%" class="container">
  <div  id="myCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3" ></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <div class="carousel-inner center"  style="width:80%">
      <div class="item active">
        <img class="center" src="images/plumber.jpg" alt="Los Angeles" style="width:60%;">
      </div>

      <div class="item">
        <img class="center" src="images/electrician.jpg" alt="Chicago" style="width:60%;">
      </div>
    
      <div class="item">
        <img class="center" src="images/groccery.jpg" alt="New york" style="width:60%;">
      </div>
      <div class="item">
        <img class="center" src="images/cleaner.jpg" alt="Los Angeles" style="width:60%;">
      </div>
      <div class="item">
        <img class="center" src="images/laundary.jpg" alt="Los Angeles" style="width:60%;">
      </div>


    </div>

    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div>
<hr style="width:90%" class="center">
 This is the project of Field services developed by Dilip Joshi,Aniket Mathpati and Bhushand Nawle under the Guidence of sneha Mam in DBMS Subject at Sggs during theri First Sem of Third Year.
 This is the portal to provide the people with home based services like plumber,laundary,cleaner,electrician services to people effeciently and cheaply.
 one of the main goal include the matching the customers with their proper service providers so that it will be beneficial for both customers and service provider. 
<hr>
</div>

<div style="width:90%" class="row center">
  <div class="column">
    <div class="card">
      <p><i class="fa fa-laptop"></i></p>
      <h3>10+</h3>
      <p>Developers Team</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <p><i class="fa fa-check"></i></p>
      <h3>55+</h3>
      <p>Projects</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <p><i class="fa fa-smile-o"></i></p>
      <h3>1000+</h3>
      <p>Happy Clients</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <p><i class="fa fa-suitcase"></i></p>
      <h3>400+</h3>
      <p>Service Providers</p>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
    
  <p>Footer Text</p>
</footer>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
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
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>
</body>
</html>