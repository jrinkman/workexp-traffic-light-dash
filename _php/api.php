<?php
	function api_call($endpoint){
		//Initialize the cURL handle
		$curl_handle=curl_init();

		//Set the request headers
		curl_setopt($curl_handle, CURLOPT_URL, $endpoint);
		curl_setopt($curl_handle, CURLOPT_HTTPHEADER, Array('Authorization: Bearer bc7285c55f83815975d7182d2103f815a7f9c347ce8c692e2bd92882d5877f7d'));
		curl_setopt($curl_handle, CURLOPT_USERAGENT, 'SafetyCulture API Client');
		curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER,1);
		
		//Execute the cURL request
		$query = curl_exec($curl_handle);
		curl_close($curl_handle);

		//Return the decoded query
		return json_decode($query);
	}

	function api_audit(){
		
	}
?>