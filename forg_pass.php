<?php
$email=$_POST['email'];
$type=$_POST['type'];
$ans=array();
include "config.php";
if($type=="Customer")
{
$sql_id="select * from Customers where email='$email'";
}
else
{
$sql_id="select * from Customers where email='$email'";

}
$result_id=mysqli_query($con,$sql_id);
if(!$result_id)
{
    $ans[0]=-20;
    echo json_encode($ans);
    exit(0);
}
$num=mysqli_num_rows($result_id);
if($num==0)
{
  $ans[0]=0;
  echo json_encode($ans);
  exit(1);
}
$result=mysqli_fetch_array($result_id);
$id=$result['id'];
$email=$result['email'];
$password=$result['password'];
$hash=md5("salt".$id.$email.$password."salt");
$sql_del="delete from forgot_password where id=$id and type='$type'";
if(!mysqli_query($con,$sql_del))
{
$ans[0]=-2;
echo json_encode($ans);
exit(2);
}
$sql="insert into forgot_password values($id,'$hash','$type')";
$result=mysqli_query($con,$sql);
if(!$result)
{
    $ans[0]=-21;
    echo json_encode($ans);
    exit(2);
}
$id=$id+1071;
$msg="localhost/dbs_project/recover_pass.php?id=$id&hash=$hash&type=$type";
$ans[0]=1;
$ans[1]=$msg;
echo json_encode($ans);
?>