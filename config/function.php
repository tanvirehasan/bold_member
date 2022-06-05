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


//SELECT
function SelectData($TableName, $moresql){
	global $conn;
	$sql = "SELECT * FROM $TableName $moresql";
	$select = mysqli_query($conn, $sql);
	return $select;
}
//update data
function UpdateData($table_name, $more){
	global $conn;
	$sql = "UPDATE {$table_name} SET {$more} ";
	$update = mysqli_query($conn,$sql);
	return $update;
}



//Image UPload with compress
function compressImage($source, $destination, $quality) { 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    imagejpeg($image, $destination, $quality);    
    return $destination; 
} 













?>