<?php
session_start();
function search_json($id)
{
$ans=array();
$i=0;
$jsonString = file_get_contents('/var/www/html/dbs/cust_session.json');
if($jsonString=='')
{
    $ans=[];
    return $ans;
}
$data = json_decode($jsonString, true);
foreach ($data as $key => $entry) 
{
 if($id==$entry['saver_id'])
 {
     $ans[$i]=$entry;
     $i++;
 }
}
return $ans;
}
$email=$_POST['uname'];
$passwd=$_POST['psw'];
$remember=$_POST['remember'];
$passwd=md5($passwd);
$con=mysqli_connect('localhost','dilip','dilip','DBS_PROJECT');
$sql_verify="select * from Customers where email='$email' and password='$passwd'";
$result=mysqli_query($con,$sql_verify);
if(!$result)
{
    echo -2;
    exit(0);
}
$num=mysqli_num_rows($result);
if($num==0)
{
    echo 0;
    exit(1);
}
if($num>1)
{
    echo -1;
    exit(2);
}
if($num==1)
{
$result=mysqli_fetch_array($result);
$cust_id=$result['id'];
$ip=getHostByName(getHostName());
$_SESSION['my_details']=$result;
if(isset($_SESSION['username']))
{
    unset($_SESSION['username']);
}
if(isset($_SESSION['password']))
{
    unset($_SESSION['password']);
}
$_SESSION['username']=$email;
$_SESSION['password']=$passwd;
$ans=search_json($cust_id);
$i=0;
foreach ($ans as $key => $entry) 
{
    $entry['accept']=0;
$_SESSION['provider'.$i]=$entry;
$i++;
}
$_SESSION['count']=$i;
echo $_SESSION['count'];
$count=$_SESSION['count'];
if($remember==="on")
{
         if(isset($_COOKIE['remember_me']))
         {
             unset($_COOKIE['remember_me']);
         }
         if(isset($_COOKIE['my_id']))
         {
             unset($_COOKIE['my_id']);
         }
         if(isset($_COOKIE['type']))
         {
             unset($_COOKIE['type']);
         }
        setcookie("remember_me", md5('salt'.$email.$ip.'salt'), time() + (86400 * 30), "/",NULL);
        setcookie("my_id", $cust_id, time() + (86400 * 30), "/");
        setcookie("type", "Customer", time() + (86400 * 30), "/");
        if(isset($_COOKIE['remember_me']) && isset($_COOKIE['my_id']) && $_COOKIE['type'])
        {
         $hash=$_COOKIE["remember_me"];
         $sql_insert_cookie="update Customers set cookie_hash where $email='$email'";
         $result_hash=mysqli_query($con,$sql_insert_cookie);  
         if(!$result_hash)
         {
             echo -2;
             exit(3);
         }
      } 
        
  }
}

  echo 1;

?>
