<?php
session_start();
function get_distance($pin_src, $pin_dest)
{
    $url="https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$pin_src."&destinations=".$pin_dest."&key=AIzaSyByLOtugIvIS8EdBZ-3KmXNYeP2IUclTS4";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
    return array('distance' => $dist, 'time' => $time);
}

$ans=array();

$pincode=0;
$service=$_GET['service'];
$email=$_SESSION['username'];
include 'config.php';
$sql="select * from Customers where email='$email'";

$result=mysqli_query($con,$sql);
$result=mysqli_fetch_array($result);
$pincode=$result['pin_code'];
$city=$result['city'];
$state=$result['state'];

 $date = date('y/m/d'); 
 $weekday = date('N', strtotime($date));
 $sql="select * from Service_Providers where service='$service' and busy=0 and city='$city' and state='$state' and ($weekday between week_start and week_end) and (curtime() between start_time and end_time)";
 $result=mysqli_query($con,$sql);
 $num=mysqli_num_rows($result);
 for($i=0;$i<$num;$i++)
 {
    $arr=mysqli_fetch_array($result);
    $ans[$i]=$arr;
 }

for($i=0;$i<$num;$i++)
{
   $dist=get_distance($ans[$i][12],$pincode);
   $ans[$i]['distance']=$dist['distance'];
   $ans[$i]['time']=$dist['time'];
}

for($i=0;$i<$num;$i++)
{
    $temp1=explode(" ",$ans[$i]['distance']);
    if($temp1[1]=='m')
    {
        $temp1[0]=$temp1[0]/1000;
    }
    for($j=$i;$j<$num;$j++)
    {
        $temp2=explode(" ",$ans[$j]['distance']);
        if($temp2[1]=='m')
        {
            $temp2[0]=$temp2[0]/1000;
        }
        if((float)$temp1[0] > (float)$temp2[0])
        {
            $t=$ans[$i];
            $ans[$i]=$ans[$j];
            $ans[$j]=$t;
        }
    }
}


$j=1;
for($i=0;$i<$num;$i++)
{
   if(isset($_SESSION['provider'.$i]))
   {
       $arr=$_SESSION['provider'.$i];
       if (array_key_exists('accept', $arr))
      {
          if($arr['accept']==1)
          {
              $k=$num+$j;
              $_SESSION['provider'.$k]=$arr;
              $j++;
          }
      }
          
   }
   $_SESSION['provider'.$i]=$ans[$i];
}
$_SESSION['count']=$num+$j;


$ans=json_encode($ans);
echo $ans;

?>