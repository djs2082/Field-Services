var modal1 = document.getElementById('id01');
var modal2 = document.getElementById('id02');
var modal3 = document.getElementById('id03');
var modal4 = document.getElementById('id05');

window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
    if (event.target == modal3) {
        modal3.style.display = "none";
    }
    if (event.target == modal4) {
        modal4.style.display = "none";
    }
}

function change_cities()
      {
        var state=document.getElementById('state').value;
         $.ajax({
            
               url: "get_cities.php", 
               type: "GET",
               datatype: "JSON",
               data: "state="+state, 
               contentType:false,     
               cache: false,            
               processData:false, 
               async:true,                    
               success: function(data)  
               {
                 var i=0;
                 var ans='';
                data=$.parseJSON(data);
                for(i=0;i<data.length;i++)
               {
                       ans=ans+"<option>"+data[i]+"</option>";
               }
               document.getElementById('city').innerHTML=ans;
               }
               });
          
         }



function change()
{
  document.getElementById('id03').style.display='block';
  document.getElementById('id01').style.display='none';
}



$(document).ready(function () {
  $("#login_cust").on('submit',(function(e)
   {
    e.preventDefault();
     $('#loading').html("Loading....");
        $.ajax({
            url: "verify_cust.php",
            type: "POST",         
            data: new FormData(this), 
            contentType:false,     
            cache: false,            
            processData:false, 
            async:true,                    
            success: function(data)  
            {
              if(data==-2)
              {
                document.getElementById('cust_lg_error').style.color="red";
                $('#cust_lg_error').html('Database Error, Please Try Again Later..').css('font-size', '20px');
                return false;
              }
             else if(data==-1)
              {
                document.getElementById('cust_lg_error').style.color="red";
                $('#cust_lg_error').html('Invalid Entries in Database, please contact Administrator...').css('font-size', '20px');
                return false;
              }
              else if(data==0)
              {
                document.getElementById('cust_lg_error').style.color="red";
                $('#cust_lg_error').html('Invalid Username or Password..').css('font-size', '20px');
                return false;
              }
             else
              {
                
                document.getElementById('cust_lg_error').style.color="green";
                $('#cust_lg_error').html('successfully login, redirecting please wait..').css('font-size', '20px');
                window.location.href='cust_login.php';
                
              }
            
            }
            });
      }));
    });

 $(document).ready(function () {
  $("#login_sp").on('submit',(function(e)
   {
    e.preventDefault();
     $('#loading').html("Loading....");
        $.ajax({
            url: "verify_serv.php",
            type: "POST",         
            data: new FormData(this), 
            contentType:false,     
            cache: false,            
            processData:false, 
            async:true,                    
            success: function(data)  
            {
              if(data==-2)
              {
                document.getElementById('s_login_error').style.color="red";
                $('#s_login_error').html('Database Error, Please Try Again Later..').css('font-size', '20px');
                return false;
              }
             else if(data==-1)
              {
                document.getElementById('s_login_error').style.color="red";
                $('#s_login_error').html('Invalid Entries in Database, please contact Administrator...').css('font-size', '20px');
                return false;
              }
              else if(data==0)
              {
                document.getElementById('s_login_error').style.color="red";
                $('#s_login_error').html('Invalid Username or Password..').css('font-size', '20px');
                return false;
              }
             else if(data==1)
              {
                document.getElementById('s_login_error').style.color="green";
                $('#s_login_error').html('successfully login, redirecting please wait..').css('font-size', '20px');
                window.location.href='serv_login.php';
              }
              else
              {
                document.getElementById('s_login_error').style.color="red"; 
                $('#s_login_error').html('currentyl unable to handle request, please try again later..').css('font-size', '20px');
           
              }
            }
            });
      }));
    });

$(document).ready(function () {
  $("#sign_up").on('submit',(function(e)
   {
    var email=document.getElementById('email').value;
     if(email.search('@')==-1)
     {
       $("#em_warn").html("Email is invalid...")
       return false;
     }
     
    if($('#sppasswd').val().length < 8)
    {
      $('#loadingsp').html('Password lenght should be atleast 8').css('color','red');
      return false;
    }
  
  if ($('#sppasswd').val() != $('#resppasswd').val()) {
    
    $('#loadingsp').html('both password do not match').css('color', 'red');
    return false;
  } 
    e.preventDefault();
     $('#loadingsp').html("Loading....");
        $.ajax({
            url: "sign_up.php",
            type: "POST",         
            data: new FormData(this), 
            contentType:false,     
            cache: false,            
            processData:false, 
            async:true,                    
            success: function(data)  
            {
              if(data==-2)
              {
                document.getElementById('loadingsp').style.color="red";
                $('#loadingsp').html('Database Error, Please Try Again Later..').css('font-size', '20px');
                return false;
              }
             else if(data==-1)
              {
                document.getElementById('loadingsp').style.color="red";
                $('#loadingsp').html('Given Email Id Already Registered..').css('font-size', '20px');
                return false;
              }
              else if(data==0)
              {
                document.getElementById('loadingsp').style.color="red";
                $('#loadingsp').html('Given Mobile Number is Already Registered..').css('font-size', '20px');
                return false;
              }
             else if(data==1)
              {
                document.getElementById('loadingsp').style.color="green";
                $('#loadingsp').html('successfully signed up, verify your Email by Clicking on confirmation link send to you on mail..').css('font-size', '20px');
                setTimeout(function(){ $('#id02').css('display','none');}, 3000);
              }
              else
              {
                console.log(data);
                document.getElementById('loadingsp').style.color="red"; 
                $('#loadingsp').html('currentyl unable to handle request, please try again later..').css('font-size', '20px');
           
              }
              
             
             
            }
            });
      }));
    });

$(document).ready(function () {
  $(".login").on('click',(function(e)
   {
    e.preventDefault();
        $.ajax({
            url: "cook.php", 
            contentType:false,     
            cache: false,            
            processData:false, 
            async:true,                    
            success: function(data)  
            {
              
              data=$.parseJSON(data);
              if (data[0] == "true") 
              {
                if(confirm("Do yo wish to continue as "+data[1]))
                {
                  if(data[2]=='Customer')
                window.location.href = "cust_login.php";
                else
                window.location.href = "serv_login.php";
                }
              }
              else
              {
                document.getElementById('id01').style.display='block'
              }
              
            }
            });
      }));
    });

$(document).ready(function () {
  $("#forg_pass").on('submit',(function(e)
   {
    
    e.preventDefault();
        $.ajax({
            url: "forg_pass.php", 
            type: "POST",
            datatype: "JSON",
            data: new FormData(this), 
            contentType:false,     
            cache: false,            
            processData:false, 
            async:true,                    
            success: function(data)  
            {
             
              data=$.parseJSON(data);
              if(data[0]==-2)
              {
                document.getElementById('fp_msg').style.color="red";
                $('#fp_msg').html('Database Error, Please Try Again Later..').css('font-size', '20px');
                return false;
              }
             else if(data[0]==-1)
              {
                document.getElementById('fp_msg').style.color="red";
                $('#fp_msg').html('Given Email Id Already Registered..').css('font-size', '20px');
                return false;
              }
              
             else if(data[0]==1)
              {
                document.getElementById('fp_msg').style.color="green";
                $('#fp_msg').html('please click on the URL send to you on mail..').css('font-size', '20px');
                setTimeout(function(){ $('#fp_msg').html(data[1]);}, 1000);
              }
              else
              {
                document.getElementById('fp_msg').style.color="red"; 
                $('#fp_msg').html('currentyl unable to handle request, please try again later..').css('font-size', '20px');
           
              }
              
            }
            });
      }));
    });

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

function display_options()
{
  var type=document.getElementById('type').value;
  if(type==='Customer')
  {
    var cl=document.getElementById('question').classList;
    cl.replace(cl[1],"fa-user");
    document.getElementById("service_type").style.display="none";
    document.getElementById("free_time").style.display="none"; 
  }
  else
  {
    var cl=document.getElementById('question').classList;
    cl.replace(cl[1],"fa-suitcase");
    document.getElementById("service_type").style.display="block";
    document.getElementById("free_time").style.display="block"; 
  }
}
function change_service()
{
  var type=document.getElementById('service').value;
  if(type=="Electrician")
  {
    var cl=document.getElementById('question').classList;
    cl.replace(cl[1],"fa-flash");
  }
  if(type=="Plumber")
  {
    var cl=document.getElementById('question').classList;
    cl.replace(cl[1],"fa-wrench");
  }
  if(type=="Laundary Service")
  {
    var cl=document.getElementById('question').classList;
    cl.replace(cl[1],"fa-bitbucket-square");
  }
  if(type=="cleaner")
  {
    var cl=document.getElementById('question').classList;
    cl.replace(cl[1],"fa-bathtub");
  }
  if(type=="groccery")
  {
    var cl=document.getElementById('question').classList;
    cl.replace(cl[1],"fa-shopping-basket");
  }  
}
