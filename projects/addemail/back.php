$email_domain =$_POST['field1'];
$email_user =$_POST['field2'];
$email_pass =$_POST['field3'];
$email_nameofemployee =$_POST['field4'];
$myArray = $_POST['field5'];

echo $email_domain;
echo $email_user;
echo $email_pass;
echo $email_nameofemployee;
$mailing = array(); //required for adding mailing list

foreach($myArray as $key => $val)
{
$findme   = '@';
$pos = strpos($val, $findme);

$val[$pos]="_";

    $mailing[] = $val;
}



include("xmlapi.php");        //XMLAPI cpanel client class
$ip = "103.53.40.19";            // should be server IP address or 127.0.0.1 if local server
$account = "mathruh5";        // cpanel user account name
$passwd ="vZyO_0%#4!6A";          // cpanel user password
=$port =2083;                  // cpanel secure authentication port unsecure port# 2082



$email_quota = 0;             // 0 is no quota, or set a number in mb

$xmlapi = new xmlapi($ip);
$xmlapi->set_port($port);     //set port number.
$xmlapi->password_auth($account, $passwd);
$xmlapi->set_debug(0);        //output to error file  set to 1 to see error_log.

$call = array(domain=>$email_domain, email=>$email_user, password=>$email_pass, quota=>$email_quota);

$xmlapi->api2_query($account, "Email", "addpop", $call );



       $to = $email_user."@".$email_domain;
	$subject = "Welcome Message";
	$message = 'Dear '.$email_name.", \n\nWelcome to the Health Heal.\nThis is your new email id for communication. \n\nWishing you Good Luck Ahead. \n\nTeam, \nHealth Heal ";
	

 
	$indivdual=mail($to, $subject, $message);



       $to = "hr@healthheal.in";
	$subject = "New Email Creation Reference";
	$message = "Dear HR,\n\nYour Request to the new email id for the employee ".$email_name." has been created.Below are the details:\nEmployee Name: ".$email_name. "\nEmployee Email Id: ".$email_user."@".$email_domain."\nPassword: ".$email_pass."\n\n\nTeam,\nHealth Heal";
	

 
	if(mail($to, $subject, $message))
{
echo "Created Successfully";
}
else
{
echo "something went wrong";
}