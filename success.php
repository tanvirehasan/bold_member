<?php 

    include "config/conn.php";
    include "config/function.php";

    $val_id=urlencode($_POST['val_id']);
    $store_id=urlencode("dotor6195444a778bb");
    $store_passwd=urlencode("dotor6195444a778bb@ssl");
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
        echo $tran_id = $result->tran_id;
        $card_type = $result->card_type;
        echo $renewdate = date('Y-m-d',strtotime("$tran_date". "+1year"));

        UpdateData("invoice","payment_status='1', tran_id='$tran_id', card_type='$card_type', date_time='$tran_date', period_start_date='$tran_date', period_end_date='$renewdate' WHERE  invoice_no='$tran_id'  ");

    } else {
        echo "Failed to connect with SSLCOMMERZ";
    }









?>