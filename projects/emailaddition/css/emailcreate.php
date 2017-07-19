<?php


session_start();
if(!isset($_SESSION['name'])) {
    header("location:index.html");
} 
$servername = "localhost";
$username = "mathruh5_sunilbv";
$password = "Healthheal@123";
$dbname = "mathruh5_hrpeople";



$email_domain =$_POST['field1'];
$email_user =$_POST['field2'];
$email_pass =$_POST['field3'];
$email_nameofemployee =$_POST['field4'];
$myArray = $_POST['field5'];
$mailing = array(); //required for adding mailing list

foreach($myArray as $key => $val)
{
$findme   = '@';
$pos = strpos($val, $findme);

$val[$pos]="_";

    $mailing[] = $val;
}

$status="Active";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="INSERT INTO `emailid`(`name`, `emailid`, `status`) VALUES ('$email_nameofemployee','$email_user','$status')";
if ($conn->query($sql) === TRUE) {
   //echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql1 = "SELECT Max(id) AS  id FROM emailid";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $e= $row["id"];
    }
} else {
    echo "0 results";
}




foreach($myArray as $key => $val)
{

$sql2 = "SELECT id FROM `mailing_lists` WHERE list='$val'";
$result = $conn->query($sql2);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $m= $row["id"];

$sql3="INSERT INTO `mapping`(`mid`, `eid`) VALUES ('$m','$e')";
if ($conn->query($sql3) === TRUE) {
   
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}


    }
} else {
    echo "0 results";
}




}

include("xmlapi.php");        //XMLAPI cpanel client class
$ip = "103.53.40.19";            // should be server IP address or 127.0.0.1 if local server
$account = "mathruh5";        // cpanel user account name
$passwd ="vZyO_0%#4!6A";          // cpanel user password
$port =2083;                  // cpanel secure authentication port unsecure port# 2082



$email_quota = 0;             // 0 is no quota, or set a number in mb

$xmlapi = new xmlapi($ip);
$xmlapi->set_port($port);     //set port number.
$xmlapi->password_auth($account, $passwd);
$xmlapi->set_debug(0);        //output to error file  set to 1 to see error_log.

$call = array(domain=>$email_domain, email=>$email_user, password=>$email_pass, quota=>$email_quota);

$xmlapi->api2_query($account, "Email", "addpop", $call );

$to = $email_user."@".$email_domain;
	$subject = "Welcome Message";
	$message = 'Dear '.$email_nameofemployee.", \n\nWelcome to the Health Heal.\nThis is your new email id for communication. \n\nWishing you Good Luck Ahead. \n\nTeam, \nHealth Heal ";
	

 
	$indivdual=mail($to, $subject, $message);



       $to = "hradmin@healthheal.in";
	$subject = "New Email Creation Reference";
	$message = "Dear HR,\n\nYour Request to the new email id for the employee ".$email_name." has been created.Below are the details:\nEmployee Name: ".$email_nameofemployee. "\nEmployee Email Id: ".$email_user."@".$email_domain."\nPassword: ".$email_pass."\n\n\nTeam,\nHealth Heal";
	

 
	$hr=mail($to, $subject, $message);

require_once('php_mailman.php');
$domain="healthheal.in";
$password="Welcome@123";

$eamiladress=$email_user."@".$email_domain;

foreach($mailing as $value)
{
$mailman = new php_mailman($domain, $password, $value);
$result=$mailman->subscribe($eamiladress);
}

echo "created and added to groups";

?>