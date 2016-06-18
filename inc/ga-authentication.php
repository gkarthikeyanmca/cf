<?php
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	$path=str_replace('index.php','',$parse_uri[0]);
	require( $path . 'wp-load.php' );

	include('google-analytics-API.php');

	$ga = new GoogleAnalyticsAPI(); 
	$ga->auth->setClientId('245491229709-ja5mhbks0i3lbv41aof7577srgtdskue.apps.googleusercontent.com'); // From the APIs console
	$ga->auth->setClientSecret('yaYOzUf-trwJKq5sAv6K6n3K'); // From the APIs console
	$ga->auth->setRedirectUri('http://codefalooda.com/test-page/'); // Url to your app, must match one in the APIs console
	if(!isset($_GET['code'])){
		// Get the Auth-Url
		$url = $ga->auth->buildAuthUrl();
		?>
		<script>location.href='<?php echo $url; ?>';</script>
		<?php
	}

	else if(isset($_GET['code'])){
		$code = $_GET['code'];
		$auth = $ga->auth->getAccessToken($code);

		// Try to get the AccessToken
		if ($auth['http_code'] == 200) {
		    $accessToken = $auth['access_token'];
		    $refreshToken = $auth['refresh_token'];
		    $tokenExpires = $auth['expires_in'];
		    $tokenCreated = time();

		    update_option('ga_access_token',$accessToken);
		    update_option('ga_refresh_token',$refreshToken);
		    update_option('ga_token_expiry',$tokenExpires);
		    update_option('ga_token_created',$tokenCreated);
		} else {
		    echo "There is an error please try again later.";
		}
	}
?>