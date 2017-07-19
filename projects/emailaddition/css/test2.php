<?php


include("cpaneluapi.class.php");
$capi = new cpanelAPI('mathruh5', 'vZyO_0%#4!6A', '103.53.40.19');

//$response = $capi->uapi->Email->add_list(array(
 //     'list'       => 'dummy',
 //       'password'   => 'Welcome@123',
  //      'domain'     => 'healthheal.in',
  //       )); 
//print_r($response);

$response = $capi->uapi->Email->list_pops(array(
      'regex'       => 'rohan@healthheal.in',
        
         )); 
print_r($response);

?>
