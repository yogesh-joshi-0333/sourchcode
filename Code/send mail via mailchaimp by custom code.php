function test_mail()
{
	$email = $_POST['emails'];
	$id = 'fsdgfdsgsdg';
	$api = 'dsbfjdsd654fhsdfhdslkfdgfhjsg';
	$data_center = substr($api_key,strpos($api_key,'-')+1);	
	$url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $id .'/user';
	
	$json = json_encode(['email_address' => $email,'status'=> 'user', //pass 'subscribed' or 'pending']);
	
	try {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api);
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		$result = curl_exec($ch);
		$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
	
		if (200 == $status_code) {
			
			$message = 'Thank you';
		}
		else if (400 == $status_code) 
		{
			$message = 'User Exists';
		}
	} 
	catch(Exception $e) 
	{
		$message = $e->getMessage();
	}
		$a=wp_send_json_success($message);
}
