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


// MySQL INSERT statement
function InsertData($table_name, $cols, $values){
    global $conn;
    $query = "INSERT INTO $table_name ($cols) VALUES ($values)";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    return $result;
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

//Row Counts
function rowcount($TableName,$moresql){
	return SelectData($TableName, $moresql)->num_rows;
}

//catagory_name
function cat_name($cid,$data){
	$row = SelectData("membership_category", "where cat_id='$cid' ")->fetch_object();
	return $row->$data;
}





























//eamil
function email_send($subject, $title, $text, $receiver){
	  
$body ="<!DOCTYPE html>
<html lang='en' xmlns='http://www.w3.org/1999/xhtml' xmlns:o='urn:schemas-microsoft-com:office:office'>
<head>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width,initial-scale=1'>
	<meta name='x-apple-disable-message-reformatting'>
	<title>BOLD</title>
	<style>
		table, td, div, h1, p {font-family: Arial, sans-serif;}
	</style>
</head>
<body style='margin:0;padding:0;'>
	<table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;'>
		<tr>
			<td align='center' style='padding:0;'>
				<table role='presentation' style='width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;'>
					<tr>
						<td align='center' style='padding:40px 0 30px 0;background:#F2F2F2;'>
							<img src='https://bold.org.bd/wp-content/uploads/2019/07/blogo.png' alt='' width='300' style='height:auto;display:block;' />
						</td>
					</tr>
					<tr>
						<td style='padding:36px 30px 42px 30px;'>
							<table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
								<tr>
									<td style='padding:0 0 36px 0;color:#153643;'>
										<h1 style='font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;'>".$title."</h1>
										<p style='margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>".$text."</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td style='padding:30px;background:#1E8449;'>
							<table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;'>
								<tr>
									<td style='padding:0;width:50%;' align='left'>
										<p style='margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;'>
											&reg;©2020 (BOLD) Bangladesh Organization for Learning & Development ".date('Y')."<br/><a href='http://www.example.com' style='color:#ffffff;text-decoration:underline;'>Unsubscribe</a>
										</p>
									</td>
									<td style='padding:0;width:50%;' align='right'>
										<table role='presentation' style='border-collapse:collapse;border:0;border-spacing:0;'>
											<tr>
												<td style='padding:0 0 0 10px;width:38px;'>
													<a href='http://www.twitter.com/' style='color:#ffffff;'><img src='https://assets.codepen.io/210284/tw_1.png' alt='Twitter' width='38' style='height:auto;display:block;border:0;' /></a>
												</td>
												<td style='padding:0 0 0 10px;width:38px;'>
													<a href='http://www.facebook.com/' style='color:#ffffff;'><img src='https://assets.codepen.io/210284/fb_1.png' alt='Facebook' width='38' style='height:auto;display:block;border:0;' /></a>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>

";

$header = "From:tanvirhasanbcse@gmail.com";
$header .= "MIME-Version:1.0\r\n";
$header .= "Content-type:text/html; charset=ISO-8859-1\r\n";

if(mail($receiver, $subject, $body, $header)){
     "Email sent successfully to $receiver";
}else{
    "Sorry, failed while sending mail!";
}

return $body;

}

?>