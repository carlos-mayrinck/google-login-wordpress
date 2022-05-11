<?php
// AUTOLOAD DAS CLASSES
require "vendor/autoload.php";
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

use App\Session\User as UserSession;
$isUserLoggedIn = UserSession::isUserLoggedIn();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/dist/css/'. $args['pageStyle']; ?>">

</head>
<body <?php body_class(); ?>>
  <header class="header-container">
    <div class="content-container">
      <a href="<?php echo get_home_url(); ?>">
        <img src="<?php echo get_template_directory_uri() . "/assets/dist/img/logo.svg"; ?>" alt="Logo">
      </a>
      
      <?php
      $isUserLoggedIn ?
      get_template_part('components/logout', 'button') :
      get_template_part('components/login', 'button') ;
      ?>
    </div>
  </header>