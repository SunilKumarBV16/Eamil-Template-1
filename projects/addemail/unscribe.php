<?php
session_start();
if(!isset($_SESSION['name'])) {
    header("location:index.html");
}
$grups=array();

$emailgrp=$_GET['emailgroup'];

$emailid=$_GET['id'];
//echo $emailid;
$findme   = '@';
$pos = strpos($emailgrp, $findme);

$emailgrp[$pos]="_";
//echo $emailgrp;
$grups[]=$emailgrp;

require_once('php_mailman.php');
$domain="healthheal.in";
$password="Welcome@123";
$emailgrp=$emailgrp;
//$emailid="aaaaa@healthheal.in";

foreach($grups as $value)
{
$mailman = new php_mailman($domain, $password,$value);
$result=$mailman->unsubscribe($emailid);
echo $result;
}
?>