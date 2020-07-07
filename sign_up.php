<?php
include "config.php";
$type=$_POST['type'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$pin_code=$_POST['pincode'];
$password=$_POST['sppasswd'];
$state=$_POST['state'];
$city=$_POST['city'];
$password=md5($password);
if(trim($type)=="Service Provider")
{
    $service=$_POST['service'];
    $week_start=$_POST['week_start'];
    $week_end=$_POST['week_end'];
    $start_time=$_POST['start_time'];
    $start_time=date("H:i", strtotime("$start_time AM"));
    $end_time=$_POST['end_time'];
    $end_time=date("H:i", strtotime("$end_time PM"));
    $sql_email_check="select * from Service_Providers where email='$email'";
   
    $sql_mobile_check="select * from Service_Providers where mobile='$mobile'";
    $sql_insert="insert into Service_Providers(service,week_start,week_end,start_time,end_time,first_name,last_name,email,mobile,gender,address,pin_code,password,state,city) values('$service',$week_start,$week_end,'$start_time','$end_time','$first_name','$last_name','$email','$mobile','$gender','$address','$pin_code','$password','$state','$city')";
}
else
{
    $sql_email_check="select * from Customers where email='$email'";
    $sql_mobile_check="select * from Customers where mobile='$mobile'";
    $sql_insert="insert into Customers(first_name,last_name,email,mobile,gender,address,pin_code,password,state,city) values('$first_name','$last_name','$email','$mobile','$gender','$address','$pin_code','$password','$state','$city')";
}
// echo $sql_insert;
$result_email=mysqli_query($con,$sql_email_check);
$result_mobile=mysqli_query($con,$sql_mobile_check);
if(!$result_email || !$result_mobile)
{
    echo -2;
    exit(0);
}
$num_email=mysqli_num_rows($result_email);
if($num_email>0)
{
    echo -1;
    exit(1);
}
$num_mobile=mysqli_num_rows($result_mobile);
if($num_mobile>0)
{
    echo 0;
    exit(2);
}
$result=mysqli_query($con,$sql_insert);
if(!$result)
{
    echo -2;
    exit(0);
}
else
{
echo 1;
}
?>