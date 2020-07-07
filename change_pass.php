<?php
session_start();
$id=$_SESSION['id'];
$hash=$_SESSION['hash'];
$type=$_SESSION['type'];
$password=$_POST['fppasswd'];
$password=md5($password);
$id=$id-1071;
include "config.php";
$sql_verify="select * from forgot_password where id=$id and hash='$hash'";
$result=mysqli_query($con,$sql_verify);
if(!$result)
{
    echo -2;
    exit(0);
}
$num=mysqli_num_rows($result);
if($num == 0)
{
    echo -1;
    exit(1);
}
$result=mysqli_fetch_array($result);
$hash_db=$result['hash'];
if($hash_db!==$hash)
{
    echo -1;
    exit(2);
}
if($type=="Customer")
$sql="update Customers set password='$password' where id=$id";
else
$sql="update Service_Providers set password='$password' where id=$id";
$sql_del="delete from forgot_password where id=$id and type='$type'";
if(!mysqli_query($con,$sql))
{
    echo -2;
    exit(3);
}
if(!mysqli_query($con,$sql_del))
{
    echo -2;
    exit(4);
}
echo 1;
?>
