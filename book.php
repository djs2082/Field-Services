<?php
session_start();
include "config.php";
$id=$_GET['id'];
$arr=array();
$md=$_SESSION['my_details'];
$arr=$_SESSION['provider'.$id];
$arr['busy']=1;
$rid=$md['id'];
$rpid=$md['pin_code'];
$sid=$arr['id'];
$spid=$arr['pin_code'];
$sql="insert into services_requested(rid,sid,rpid,spid) values($rid,$sid,'$rpid','$spid')";
mysqli_query($con,$sql);
$_SESSION['provider'.$id]=$arr;
echo $sql;
?>
