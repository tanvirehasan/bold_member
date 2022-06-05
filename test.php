<?php 

// OTP System
function SMS_API($number, $messages){
  $number =$number; 
	$messages = $messages;	
	$url = 'https://sms.tense.com.bd/api-sendsms?user=nasiruddin&password=01309138472&campaign=BOLD&number='.$number.'&text='.rawurldecode($messages);
	$gateway = preg_replace("/ /", "%20", $url);
	$result = file_get_contents($gateway);
	$decode = json_decode($result, true);
	return $decode;
}




  

?>