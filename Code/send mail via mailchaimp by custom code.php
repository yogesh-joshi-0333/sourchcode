function form_mailke()
{
	$email = $_POST['emails'];
	$list_id = 'b2bd952c27';
	$api_key = 'c03addccd39e2a0ad5d5572917bef6b9-us17';
	$data_center = substr($api_key,strpos($api_key,'-')+1);	
	$url = 'https://'. $data_center .'.api.mailchimp.com/3.0/lists/'. $list_id .'/members';
	
	$json = json_encode([
		'email_address' => $email,
		'status'        => 'subscribed', //pass 'subscribed' or 'pending'
	]);
	
	try {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $api_key);
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
			
			$myrows = 'Thank you for subscribing!';
		}
		else if (400 == $status_code) 
		{
			$myrows = 'Member Exists';
		}
	} catch(Exception $e) {
		$myrows = $e->getMessage();
		
	}
		$a=wp_send_json_success($myrows);
}
