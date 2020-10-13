<?php
require_once __DIR__ . '/../vendor/autoload.php';
$client = new Google_Client();
$redirect_uri = 'http://localhost/E-Commerce/home.php';
$client->setClientId("937632957539-rgj6ua135uhqo0lnuejibuted9ht71ta.apps.googleusercontent.com");
$client->setClientSecret("BYPDzvmvheSbiYsXX9XITUls");
$client->setRedirectUri($redirect_uri);
$client->addScope("profile");
$client->addScope("email");

if (isset($_GET["code"])) {
  //It will Attempt to exchange a code for an valid authentication token.
  $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

  //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
  if (!isset($token['error'])) {
    //Set the access token used for requests
    $client->setAccessToken($token['access_token']);

    //Store "access_token" value in $_SESSION variable for future use.
    $_SESSION['access_token'] = $token['access_token'];

    //Create Object of Google Service OAuth 2 class
    $service = new Google_Service_Oauth2($client);

    //Get user profile data from google
    $data = $service->userinfo->get();

    //Below you can find Get profile data and store into $_SESSION variable
    if (!empty($data['given_name'])) {
      $_SESSION['user_first_name'] = $data['given_name'];
    }

    if (!empty($data['family_name'])) {
      $_SESSION['user_last_name'] = $data['family_name'];
    }

    if (!empty($data['email'])) {
      $_SESSION['user_email_address'] = $data['email'];
    }

    if (!empty($data['gender'])) {
      $_SESSION['user_gender'] = $data['gender'];
    }

    if (!empty($data['picture'])) {
      $_SESSION['user_image'] = $data['picture'];
    }
  }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.


  
  // add "?logout" to the URL to remove a token from the session