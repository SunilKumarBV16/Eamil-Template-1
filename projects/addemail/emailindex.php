<?php

session_start();
if(!isset($_SESSION['name'])) {
    header("location:index.html");
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Email</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
body {
    
background: cadetblue;
    
}
</style>
<script>
$(document).ready(function(){
 
var i = 0;

       $("#emailcreation").click(function(){
                var Domain = $('#domain').val();
		var Username = $('#email').val();
                var Password = $('#pwd').val();
                var Name = $('#nameofemployee').val();
var arr = [];
       $('.ads_Checkbox:checked').each(function () {
           arr[i++] = $(this).val();
       });
       
 console.log(arr);



$.ajax({
      url: 'emailcreate.php',
        type: 'POST',
       data: { field1:Domain, field2 :Username, field3 :Password, field4 :Name, field5 :arr} ,

        success: function(result) {
            //console.log(result);
			//alert(result);
			alert("successfully created and added to the groups");
                        location.reload();

			
		}
    });	
});

});
</script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-sm-12">
<form action="emaildelete1.php" method="POST">
  <div style="margin-left: -67px;
    margin-top: 23px;">
  <!-- Trigger the modal with a button -->
  <button type="submit" class="btn btn-info btn-lg" >Remove Email Id</button>
</div>
  
</form>


</div>
</div>
<div class="row">
<div class="col-sm-12">
<a href="destory.php"><button type="submit"  class="btn btn-success" style="border:0px;float: right;    margin-top:-36px;">Logout </button></a>

</div>
</div>

<div>
<div class="container" style="margin-top:-7px;">
<div class="row" style="margin-left:20%;">
<div class="col-sm-12" style="margin-bottom: 29px;
    margin-top: 47px;
    width: 574px;
    height: auto;
    background: #fafafa;
    color: green;
    padding-bottom: 14px;">
  <h2 style="text-align:center;">Add Email Account</h2>

     


<div class="form-group">
      <label>Name of the Employee:</label>
      <input type="text" class="form-control" id="nameofemployee" placeholder="new employee name">
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input type="text" class="form-control" style="width:95%;" id="email" placeholder="eg:sunil.v" name="email">
<div style="    float: right;border-radius: 13%;
    height: 35px;
    width: 7%;
    background: darkgrey;
    margin-top: -35px;"> <p style="text-align: -webkit-center;
    margin-top: 6px;
    font-size: 16px;"> @</p></div>
    </div>
  
  <select class="form-control" id="domain">
    <option value="healthheal.in">Health Heal</option>
    <option value="mathrutvam.in">Mathrutvam</option>
    
  </select>
    <div class="form-group" style="margin-top:15px;">
      <label>Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">

    </div>

     <div class="form-group" id="checkedd">
      <label>Mailing List</label>
<br>
<?php


include("xmlapi.php");        //XMLAPI cpanel client class
$ip = "103.53.40.19";            // should be server IP address or 127.0.0.1 if local server
$account = "mathruh5";        // cpanel user account name
$passwd ="vZyO_0%#4!6A";          // cpanel user password
$port =2083;                  // cpanel secure authentication port unsecure port# 2082

$email_domain="healthheal.in";

$email_quota = 0;             // 0 is no quota, or set a number in mb

$xmlapi = new xmlapi($ip);
$xmlapi->set_port($port);     //set port number.
$xmlapi->password_auth($account, $passwd);
$xmlapi->set_debug(0);        //output to error file  set to 1 to see error_log.

$call = array(domain=>$email_domain);

$result=$xmlapi->api2_query($account, "Email", "listlists", $call );

 
$count1=$result->count();
$count=$count1-7;
for($i=0;$i<=$count;$i++)
{

?>


      <label style="color:#3385ff;"><input type="checkbox"  class="ads_Checkbox" value="<?php echo (string)  $result->data[$i]->list;?>">&nbsp;&nbsp;<?php echo (string)  $result->data[$i]->list;?></label>
      
      
<?php echo "<br>";
}


 ?>
      
</div>
<div id="checkeddd"></div>

    
    <button type="submit" id="emailcreation" class="btn btn-success" style="border:0px;">Create </button>
  
</div>   
</div>
</div>

</body>
</html>
