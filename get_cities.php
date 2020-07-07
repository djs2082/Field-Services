<?php
$state=$_GET['state'];
$file_name="data.json";
$ans=false;
$jsonString = file_get_contents('/var/www/html/dbs_project/'.$file_name);
$data = json_decode($jsonString, true);
foreach ($data as $key => $entry) 
{
    $arr=$data[$key];
    $ans=array();
    if($key==$state)
    {
    $ans=$arr;
    break;
    }
}
echo json_encode($ans);
?>