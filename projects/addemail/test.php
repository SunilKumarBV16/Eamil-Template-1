<?php

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

$email_domain="healthheal.in";
$email_user="sunil.v";
$email_pass="healthheal@123";
//$call = array(domain=>$email_domain, email=>$email_user, password=>$email_pass, quota=>$email_quota);



$call = array(regex=>$email_user);
//$result=$xmlapi->api2_query($account, "Email", "addpop", $call ); 


$result=$xmlapi->api2_query($account, "Email", "listpops", $call );
print_r($result);


?>