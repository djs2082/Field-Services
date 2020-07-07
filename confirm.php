<?php
session_start();
$con=mysqli_connect('localhost','dilip','dilip','DBS_PROJECT');
$id=$_GET['id'];
$arr=array();
$md=$_SESSION['my_details'];
$arr=$_SESSION['customer'.$id];
$arr['accept']=1;
$rid=$arr['id'];
$sid=$md['id'];
$sql="update services_requested set accept=1 where rid=$rid and sid=$sid";
mysqli_query($con,$sql);
$_SESSION['customer'.$id]=$arr;
echo $sql;
?>