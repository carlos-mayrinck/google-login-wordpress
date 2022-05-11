<?php

// Composer autoload
require_once 'vendor/autoload.php';

// Dependencies
use Google\Client as GoogleClient;
use App\Session\User as UserSession;

// Verify required fields
if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])) {
  header("Location: ".get_home_url());
  exit;
}

// Cookie CSRF
$cookie = $_COOKIE['g_csrf_token'] ?? '';

// Verify if the value of the cookie is the same that the send by $_POST
if($cookie != $_POST['g_csrf_token']) {
  header('Location:'.get_home_url());
  exit;
}

$client_id = '527394500888-0eol729eof3c60ufr1oefe9h309d3j45.apps.googleusercontent.com';
$credential = $_POST['credential'];

$client = new GoogleClient(['client_id' => $client_id]);  // Specify the CLIENT_ID of the app that accesses the backend
$payload = $client->verifyIdToken($credential);
if (isset($payload['email'])) {

  UserSession::login($payload['name'], $payload['email']);
  header('Location: '.$_SESSION['current_page']);
  
  exit;
}

die('Problem API request');