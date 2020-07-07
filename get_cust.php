<?php
session_start();
$md=$_SESSION['my_details'];
$id=$md['id'];
$con=mysqli_connect('localhost','dilip','dilip','DBS_PROJECT');
$sql="select * from services_requested where sid=$id";
// echo $sql;
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
$ans=array();
if($_SESSION['count']==$num)
{
    echo -1;
    exit(0);
}
$_SESSION['count']=$num;
// echo $num;
for($i=0;$i<$num;$i++)
{
    $arr=mysqli_fetch_array($result);
    $temp=$arr['rid'];
    $accept=$arr['accept'];
  
    // echo $temp_id;
    $sql2="select * from Customers where id=$temp";
    // echo $sql2;
    $result2=mysqli_query($con,$sql2);
    
    $arr=mysqli_fetch_array($result2);
    $arr['accept']=$accept;
    $ans[$i]=$arr;
    $_SESSION['customer'.$i]=$arr;
}
echo json_encode($ans);
?>