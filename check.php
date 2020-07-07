<?php
session_start();
include "config.php";
$arr=$_SESSION['my_details'];
$id=$arr['id'];
$sql="select * from services_requested where accept=1 and rid=$id";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
$ans=mysqli_fetch_array($result);
$sid=$ans['sid'];
if($num!=0)
{
    $count=$_SESSION['count'];
    for($i=0;$i<$count;$i++)
    {
        $arr=$_SESSION['provider'.$i];
        if($arr['id']!=$sid)
        {
        unset($_SESSION['provider'.$i]);
        }
        else
        {
            $arr['accept']=1;
            unset($_SESSION['provider'.$i]);
            $_SESSION['provider0']=$arr;
            $_SESSION['count']=1;
            break;
          
        }
    }
    echo json_encode($arr);
    exit(0);
}
echo -1;
?>