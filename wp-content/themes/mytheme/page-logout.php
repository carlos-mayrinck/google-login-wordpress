<?php

// Composer autoload
require_once 'vendor/autoload.php';

// Dependencies
use App\Session\User as UserSession;

// Logs out user
UserSession::logout();
header("Location: ".$_SESSION['current_page']);
exit;
?>