<?php
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	$path=str_replace('index.php','',$parse_uri[0]);
	require( $path . 'wp-load.php' );

	include('google-analytics-API.php');
	// Check if the accessToken is expired

	$settings=pods('site_settings');

	$ga = new GoogleAnalyticsAPI(); 
	$ga->auth->setClientId($settings->display('google_analytics_client_id')); // From the APIs console
	$ga->auth->setClientSecret($settings->display('google_analytics_client_secret')); // From the APIs console
	$ga->auth->setRedirectUri(get_template_directory_uri().'/inc/cron-ga-countries.php'); // Url to your app, must match one in the APIs console

	if ((time() - get_option('ga_token_created')) >= get_option('ga_token_expiry')) {
	    $auth = $ga->auth->refreshAccessToken(get_option('ga_refresh_token'));
	    // Get the accessToken as above and save it into the Database / Session
		$accessToken = $auth['access_token'];
	    $refreshToken = $auth['refresh_token'];
	    $tokenExpires = $auth['expires_in'];
	    $tokenCreated = time();

	    update_option('ga_access_token',$accessToken);
	    update_option('ga_refresh_token',$refreshToken);
	    update_option('ga_token_expiry',$tokenExpires);
	    update_option('ga_token_created',$tokenCreated);
	}

	$ga->setAccessToken(get_option('ga_access_token'));
	//$ga->setAccountId('ga:66457099');
	$ga->setAccountId($settings->display('google_analytics_account_id'));

	// Example2: Get visits by country
	$params = array(
	    'metrics' => 'ga:visits',
	    'dimensions' => 'ga:country',
	    'sort' => '-ga:visits',
	    'max-results' => 100,
	    'start-date' => '2016-01-01' //Overwrite this from the defaultQueryParams
	); 
	$visitsByCountry = $ga->query($params);
	//echo "<pre>".print_r($visitsByCountry,true)."</pre>";
	
	$ga_data=array();
	$ga_data['total']=$visitsByCountry['totalsForAllResults']['ga:visits'];
	foreach($visitsByCountry['rows'] as $country){
		$ga_data['stats'][]=array("country"=>$country[0],"visits"=>$country[1]);
	}

	echo "<pre>".print_r($ga_data,true)."</pre>";
	update_option('ga_country_visits',json_encode($ga_data));
?>