
<?php
    include "conn.php";

    function newPayment($paymentStatus){
        global $connection;
  
    $phoneNumber = $_POST['phoneNumber'];
    $amountPaid = $_POST['amountPaid'];

    // $sqlQuery = "INSERT INTO `payments`(`phoneNumber`, `amount`) VALUES('$phoneNumber', '$amount')";
    $sqlQuery="INSERT INTO `payments`( `phoneNumber`, `amountPaid`, `paymentStatus`, `apiResponseMessage`) VALUES ('$phoneNumber','$amountPaid','$paymentStatus', '$apiResponseMessage')";
   
    if(mysqli_query($connection, $sqlQuery)){
        echo "Successfully Registered";
    }else{
        echo mysqli_error($connection);
    }
    mysqli_close($connection);
}


function transactions(){
    global $connection;
$sqlQuery="select * from payments";
$runQuery=mysqli_query($connection, $sqlQuery);
if(mysqli_num_rows($runQuery) > 0){
    
    while($row=mysqli_fetch_assoc($runQuery)){
        $phoneNumber=$row['phoneNumber'];
        $amountPaid=$row['amountPaid'];
        $transactionId=$row['transactionId'];
        echo "
        <tr>
      <th scope='row'>$transactionId</th>
      <td>$phoneNumber</td>
      <td>$amountPaid</td>
      
        </tr>
        ";
    }
}else{
    echo "You Have no data";
}
}

function processPayment(){
    //User amount and phone number.
	include "credentials.php";
	$phoneNumber=$_POST['phoneNumber'];
	$amountPaid=$_POST['amountPaid'];
	$desc="lacag bixin tijaabo ah";
	$requestId=(rand(100000,999999));
	$ref=(rand(100000,999999));
	$invoiceId=(rand(100000,999999));
	$timestamp=date("Y-m-d H:i:s");

	$data=
	array

	(
		'schemaVersion' => '1.1',
		'requestId' => $requestId,
		'timestamp' => $timestamp,
		'channelName' => 'WEB',
		'serviceName' => 'API_PURCHASE',
		'serviceParams' => array
			(
				'merchantUid' => $merchantUid,
				'apiUserId' => $apiUserId,
				'apiKey' => $apiKey,
				'paymentMethod' => 'MWALLET_ACCOUNT',
				'payerInfo' => array
					(
						'accountNo' => $phoneNumber,
					),
				'transactionInfo' => array
					(
						'referenceId' => $ref,
						'invoiceId' => $invoiceId,
						'amount' => $amountPaid,
						'currency' => 'USD',
						'description' => $desc,
					)

			)
    );  
    //curl starts here.
    //curl changes the PHP data to the JSON DATA
	$post_data=json_encode($data,JSON_UNESCAPED_SLASHES);

	$url="https://api.waafipay.net/asm";
	$ch=curl_init($url);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$excuteCurl=curl_exec($ch);
	//print_r($excuteCurl);

	$returnData=json_decode($excuteCurl, true);
	$responseCode=$returnData['responseCode'];
	$apiResponseMessage=$returnData['responseMsg'];

	if ($responseCode==2001) {
		
		$paymentStatus="successfull";
		newPayment($paymentStatus,$apiResponseMessage);

	}else{

		$paymentStatus="Failed";
		newPayment($paymentStatus,$apiResponseMessage);
	}

     
}