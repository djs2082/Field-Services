<?php
session_start();
include "config.php";
$ans=array();
if(isset($_COOKIE['remember_me']) && isset($_COOKIE['my_id']) && isset($_COOKIE['type']))
 {
 $id=$_COOKIE['my_id'];
 $hash=$_COOKIE['remember_me'];
 if($_COOKIE['type']=="Customer")
 {
     $sql="select * from Customer where id=$id and cookie_hash='$hash'";
     $ans[2]="Customer";
 }
 else
 {
    $sql="select * from Service_Providers where id=$id and cookie_hash='$hash'";
    $ans[2]="Service Provider";
}
 $result=mysqli_query($con,$sql);
 $num=mysqli_num_rows($result);
 if($num==1)
 {
  $result=mysqli_fetch_array($result);
  $_SESSION['username']=$result['email'];
  $_SESSION['password']=$result['password'];
  $ans[0]="true";
  $ans[1]=$result['email'];
}
 }
 else
 $ans[0]="false";
 echo json_encode($ans);
?>
