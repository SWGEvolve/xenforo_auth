<?php

$un = $_POST["user_name"];
$pw = $_POST["user_password"];
//URL to Auth API
$service_url = 'URL/api/auth/';
$data_string = "login=".$un."&password=".$pw;
//Super user Api key and userid of super user
$headers = array(
    "XF-Api-Key: KEY",
	"XF-Api-User: 1",
	"content-type: application/x-www-form-urlencoded",
	"charset: utf-8");

$curl = curl_init();

curl_setopt_array($curl, array(
	CURLOPT_URL => $service_url,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $data_string,
	CURLOPT_HTTPHEADER => $headers));

$curl_response = curl_exec($curl);
curl_close($curl);

$result = json_decode($curl_response, true);

if (isset($result['success']) && $result['success'] == true)
{
	if ($result['user']['user_state'] == "valid")
	{
		$json = array ('status' => 'success');
    	echo json_encode($json);
	}
	else
	{
		$json = array('status' => 'failed', 'message' => 'Your account is either unverified or banned.');
    	echo json_encode($json);
	}	
}
else
{
	$json = array('status' => 'failed', 'message' => 'Your username or password was incorrect.');
    echo json_encode($json, JSON_UNESCAPED_SLASHES);
}

?>