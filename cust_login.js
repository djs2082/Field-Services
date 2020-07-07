function search_service(e)
{
var service=e.getAttribute('value');
$.ajax({
         url: "search_service.php", 
         type: "GET",
         data: 'service='+service, 
         datatype: "JSON",
         contentType:false,     
         cache: false,            
         processData:false, 
         async:true,                    
         success: function(data)  
        { 
             alert(data);
            if($.parseJSON(data).length==0)
            {
              document.getElementById('load').style.display="none";
              document.getElementById("body").classList.remove("blur");
                alert("no one is free now, try again later");
                return false;
            }
            else
            {
              send_notify(data);
            }
        }
      });
}


function send_notify(data)
  {
    alert(data);
    data=$.parseJSON(data);
    var ans='';
    for(i=0;i<data.length;i++)
    {
      var temp=data[i].distance.split(" ");
      if(temp[1]=='m')
      {
        temp[0]=temp[0]/1000;
      }
      if(temp[0]>2)
      {
       temp[0]=parseFloat(temp[0])-2;
      }
     var price=180+parseFloat(temp[0])*10;
     ans=ans+"<div class='msg_container msg_darker message'><div class='row'><div class='col-sm-4'><img src='images/avtar' alt='avtar'></div><div class='col-sm-4'> <p><b>Name:</b>"+data[i].first_name+" "+data[i].last_name+"</p> <div id=1"+i+" style='display:none'> <p><b>Email:</b>"+data[i].email+"</p><p><b>Mobile:</b>"+data[i].mobile+"</p></div><p><b>Distance:</b>"+data[i].distance+" </p> <p><b>Time:</b>"+data[i].time+"</p></div><div class='col-sm-4'> <b><p title='180+("+temp[0]+")*10'>Charges<p style='color:red'>"+price+"<i class='fa fa-rupee'></i></p></p></b> <button id="+i+" onclick='book(this)' class='button btn btn-success'>Book</button> </div> </div> </div>";
    
    }
    document.getElementById('row').innerHTML=ans;
    document.getElementById('load').style.display="none";
          document.getElementById("body").classList.remove("blur");
  }




  function send_confirmed(data)
  {
    data=$.parseJSON(data);
    var ans='';
      var distance=data.distance;
      var temp=distance.split(" ");
      if(temp[1]=='m')
      {
        temp[0]=temp[0]/1000;
      }
      if(temp[0]>2)
      {
       temp[0]=parseFloat(temp[0])-2;
      }
     var price=180+parseFloat(temp[0])*10;
     ans="<div class='msg_container msg_darker message'><div class='row'><div class='col-sm-4'><img src='images/avtar' alt='avtar'></div><div class='col-sm-4'> <p><b>Name:</b>"+data.first_name+" "+data.last_name+"</p> <div id=1"+0+" style='display:none'> <p><b>Email:</b>"+data.email+"</p><p><b>Mobile:</b>"+data.mobile+"</p></div><p><b>Distance:</b>"+data.distance+" </p> <p><b>Time:</b>"+data.time+"</p><p><b>status:</b><p style='color:red'>You will get service soon!!</p></p></div><div class='col-sm-4'> <b><p title='180+("+temp[0]+")*10'>Charges<p style='color:red'>"+price+"<i class='fa fa-rupee'></i></p></p></b> <button id="+0+" onclick='book(this)' class='button btn btn-danger' disabled>Confirmed</button> </div> </div> </div>";
     document.getElementById('row').innerHTML=ans;
  }


  function book(my_var)
  {

      id=my_var.id;
        $('#' + id).prop('disabled', true);
        $('#' + id).html('booked');
        $('#1' + id).css('display','block');
    
         $.ajax({
          
              url: "book.php", 
              type: "GET",
              datatype: "JSON",
              data: 'id='+id, 
             cache: false,            
             processData:false, 
             async:true,                    
             success: function(data)  
             {
             }
             });
            }
     
  
  


var check=function cpt(){ 
    $.ajax({
        url: "check.php", 
        datatype: "JSON",
        contentType:false,     
        cache: false,            
        processData:false, 
        async:true,                    
        success: function(data)  
        {
               if(data==-1)
               {
                 return false;
               }
               send_confirmed(data);
       
        }
        }); 
    } 
    function ckeck_accept(){ 
      $.ajax({
          url: "check.php", 
          datatype: "JSON",
          contentType:false,     
          cache: false,            
          processData:false, 
          async:true,                    
          success: function(data)  
          {
                 if(data==-1)
                 {
                   return false;
                 }
                 send_confirmed(data);
         
          }
          }); 
      } 
    ckeck_accept(); 
    setInterval(check,5000);