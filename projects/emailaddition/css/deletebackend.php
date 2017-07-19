<?php
session_start();
if(!isset($_SESSION['name'])) {
    header("location:index.html");
} 

$email=$_POST['email'];

$eamiladress=$email."@healthheal.in";

$servername = "localhost";
$username = "mathruh5_sunilbv";
$password = "Healthheal@123";
$dbname = "mathruh5_hrpeople";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$mailinglist=array();
$mailinglistnew=array();

$sql = "SELECT id FROM emailid WHERE emailid='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $e=$row["id"];
    }
} else {
    echo "0 results";
}




$sql1 = "SELECT mid FROM mapping WHERE eid=$e";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $mailinglist[]=$row["mid"];

    }
} else {
    echo "0 results";
}



foreach($mailinglist as $key => $val)
{

$sql3 = "SELECT list FROM mailing_lists WHERE id=$val"; 
    $result = $conn->query($sql3);

    if ($result->num_rows > 0) {
     // output data of each row
        while($row = $result->fetch_assoc()) {
        $mailinglistnew[]=$row["list"];
      }
    } 

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
<body>

<?php 
foreach($mailinglistnew as $groupp)
{
?>
<div class="container">
<div class="row">
<div class="col-sm-12" style=""> 

<div style="float:left;    margin-top: 12px;" > <p> <?php echo $groupp; ?> </div>
<div style="    float: right;
    margin-top: 10px;margin-right: 43px;">  <a href="unscribe.php?emailgroup=<?php echo $groupp; ?>&id=<?php echo $eamiladress;?> " target="_blank "> <button type="button"  class="btn btn-success" style="">Remove </button> </a></div>

<br>
</div>
</div>
</div>
<hr>
<?php
}
?>


</body>
</html>
