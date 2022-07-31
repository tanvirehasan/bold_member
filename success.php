<?php 

    include "config/conn.php";
    include "config/function.php";

    $val_id=urlencode($_POST['val_id']);
    $store_id=urlencode("bold001live");
    $store_passwd=urlencode("bold001live58259");
    $requested_url = ("https://securepay.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $requested_url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

    $result = curl_exec($handle);

    $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

    if($code == 200 && !( curl_errno($handle)))
    {
        # TO CONVERT AS OBJECT
        $result = json_decode($result);
        # TRANSACTION INFO
        $status = $result->status;
        $tran_date = $result->tran_date;
        $tran_id = $result->tran_id;
        $card_type = $result->card_type;
        $renewdate = date('Y-m-d',strtotime("$tran_date". "+1year"));

        UpdateData("invoice","payment_status='1', tran_id='$tran_id', card_type='$card_type', date_time='$tran_date', period_start_date='$tran_date', period_end_date='$renewdate' WHERE  invoice_no='$tran_id'");
        
        // SMS_API("$row->phone_number", "Contractions!Your Pyment Successfully Done. Thanks-BOLD");
        // email_send(
        //     'Congratulations!Your Pyment Successfully Done',
        //     "<span style='color:#239B56' >Pyment Success</span>",
        //     'Dear'.$row->name.', <br>Your Pyment Successfully Done. Thanks-BOLD',
        //     "$row->email"
        // ); 

    } else {
        echo "Failed to connect with SSLCOMMERZ";
    }









?>