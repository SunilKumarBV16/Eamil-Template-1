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
<script>
$(document).ready(function(){

       $("#remove").click(function(){

            var Email = $('#email').val();
          $('#result').load('deletebackend.php',{email: $('#email').val()});



       });


});
</script>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12" style="background:#e9ebee;">
<div style="width:40%;    margin-left: 23%;
    margin-top: 15px;
    margin-bottom: 21px;">
 <div class="form-group">
      <label>Email:</label>
      <input type="text" class="form-control" style="width:95%;" id="email" placeholder="eg:sunil.v" name="email">
<div style="float: right;border-radius: 13%;
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

<button type="button"  class="btn btn-success" style="margin-top: -32px;
    float: right;
    border: 0px;
    margin-right: -39%;" id="remove">Remove </button>
</div>
</div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-sm-12">
<div id="result"> </div>
</div>
</div>
</div>

</div>
</body>
</html>
