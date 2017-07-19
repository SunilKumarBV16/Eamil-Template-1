<?php



session_start();
if(!isset($_SESSION['name'])) {
    header("location:index.html");
} 






$emailid=$_POST['field1'];

$eamiladress=$emailid."@healthheal.in";


$servername = "localhost";
$username = "mathruh5_sunilbv";
$password = "Healthheal@123";
$dbname = "mathruh5_hrpeople";
$mailinglist = array();
$mailinglistnew=array();
$mailinglistaltered=array();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT id FROM emailid WHERE emailid='$emailid'";
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


foreach($mailinglistnew as $key => $val)
{

$findme   = '@';
$pos = strpos($val, $findme);

$val[$pos]="_";

    $mailinglistaltered[]=$val;
}
foreach($mailinglistaltered as $val)
{
echo $val;
}








?>