var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$(document).ready(function ()
 {
    $("#get_cust").on('click',(function(e)
    {
     e.preventDefault();
         $.ajax({
          
             url: "get_cust.php", 
             contentType:false,     
             cache: false,            
             processData:false, 
             async:true,                    
             success: function(data)  
            {
               document.getElementById("rq").innerHTML=data;
             }
             });
       }));
     });



function dj(){ 
      $.ajax({
          url: "get_cust.php", 
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
                  send_notify(data);
         
          }
          }); 
      }  
   
      function send_notify(data)
      {
        data=$.parseJSON(data);
        var ans='';
        for(i=0;i<data.length;i++)
        {
          if(data[i].accept==1)
          {
            
          ans=ans+"<div class='msg_container msg_darker message'><div class='row'> <div class='col-sm-4'><img src='images/avtar' alt='avtar'></div>  <div class='col-sm-4'> <p><b>Name:</b>"+data[i].first_name+" "+data[i].last_name+"</p>      <div id=1"+i+"style='display:block'>           <p><b>Email:</b>"+data[i].email+"</p>           <p><b>Mobile:</b>"+data[i].mobile+"</p>          </div>          <p><b>Address:</b>"+data[i].address+"</p>          <p><b>Pincode:</b>"+data[i].pin_code+"</p> </div><div class='col-sm-4'> <button  id="+i+" onclick='re_confirm(this)' class='btn btn-danger' disabled>Confirmed</button> </div></div> </div>";
          }
          else
          {
            ans=ans+"<div class='msg_container msg_darker message'><div class='row'> <div class='col-sm-4'><img src='images/avtar' alt='avtar'></div>  <div class='col-sm-4'> <p><b>Name:</b>"+data[i].first_name+" "+data[i].last_name+"</p>      <div id=1"+i+"style='display:block'>           <p><b>Email:</b>"+data[i].email+"</p>           <p><b>Mobile:</b>"+data[i].mobile+"</p>          </div>          <p><b>Address:</b>"+data[i].address+"</p>          <p><b>Pincode:</b>"+data[i].pin_code+"</p> </div><div class='col-sm-4'> <button  id="+i+" onclick='re_confirm(this)' class='btn btn-success'>Confirm</button> </div></div> </div>";

          }
        }
        document.getElementById('rq').innerHTML=ans;
      }




     
        function re_confirm(my_var)
        {
          id=my_var.id;
          var ob=document.getElementById(id);
          ob.innerHTML="confirmed";
          ob.disabled=true;
             $.ajax({
              
                  url: "confirm.php", 
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
       
              dj();

              setTimeout(function() {
                location.reload();
              }, 10000);