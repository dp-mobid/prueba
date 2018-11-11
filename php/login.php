<?php
$username = $_POST["usuario"];
$password = $_POST["contrasenia"];
$response = array();
//error_log("username: $username password: $password") ;
if(!$username==null && !$password==null){
	$data = ["username"=>$username,"password"=>$password];
	//error_log($data);

	$url = "http://localhost:8080/te10go/auth";
	$ch = curl_init( $url );
	# Setup request to send json via POST.
	$payload = json_encode( $data );
	//error_log("json: $payload");
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json;charset=UTF-8'));
	# Return response instead of printing.
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	# Send request.
	$result = curl_exec($ch);
	curl_close($ch);
	# Print response.
	//error_log("resultado: $result");
	if(!$result==null){
		$json = json_decode($result);
		if($json->token!=null){
			$response["token"]=$json->token;
			$response["result"]=1;
			session_start();
			$_SESSION['usuario'] = $username;	
		}else{
			$response["result"]=0;
		}
	}else{
		$response["result"]=0;
	}
}else{
	$response["result"]=0;
}

header('Content-Type: application/json');
echo json_encode($response);
?>