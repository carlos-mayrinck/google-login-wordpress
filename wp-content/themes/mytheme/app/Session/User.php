<?php

namespace App\Session;

class User {

  /**
   * Method responsable by starting the application's session
   * @return boolean
   */
  private static function init() {
    return session_status() !== PHP_SESSION_ACTIVE ? session_start() : true;
  }

  /**
   * Method responsable by defining the user's login session
   * @param string $name
   * @param string $email
   */
  public static function login($name, $email) {
    // Start the session
    self::init();

    // Defines the user's session
    $_SESSION['user'] = [
      "name" => $name,
      "email" => $email
    ];
  }

  /**
   * Method that verifies if the is logged in the application
   * @return boolean
   */
  public static function isUserLoggedIn() {
    // Start the session
    self::init();

    // Return false if the $_SESSION['user'] does not exist
    return isset($_SESSION['user']);
  }

  /**
   * Method that returns the user data stored on the session
   * @return array 
   */
  public static function getInfo() {
    // Start the session
    self::init();

    // return the session data or an empty array
    return $_SESSION['user'] ?? [];
  }

  /**
   * Method that Logs out the user
   */
  public static function logout() {
    // Start the session
    self::init();

    // Logs out the user
    unset($_SESSION['user']);
  }
}