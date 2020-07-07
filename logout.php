<?php
session_start();
function write_json($ans)
{
$jsonString = file_get_contents("/var/www/html/dbs/cust_session.json");
$tempArray = json_decode($jsonString,true);
$tempArray[]=$ans;
$jsonString = json_encode($tempArray,true);
file_put_contents("/var/www/html/dbs/cust_session.json", $jsonString);
}
$ans=array();
$count=$_SESSION['count'];
$md=$_SESSION['my_details'];
$id=$md['id'];
$jsonString = file_get_contents("/var/www/html/dbs/cust_session.json");
$tempArray=[];
$jsonString = json_encode($tempArray,true);
file_put_contents("/var/www/html/dbs/cust_session.json", $jsonString);
for($i=0;$i<$count;$i++)
{
$arr=$_SESSION['provider'.$i];
$arr['saver_id']=$id;
write_json($arr);
}
session_destroy();
header("Location:index.php");
?>