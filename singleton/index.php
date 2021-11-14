<?php


use app\singleton\classes\Config;
use app\singleton\classes\Logger;

require_once "../common/autoloader.php";

/**
 * The client code.
 */
Logger::log("Started!");

// Compare values of Logger singleton.
$l1 = Logger::getInstance();
$l2 = Logger::getInstance();
if ($l1 === $l2) {
	Logger::log("Logger has a single instance.");
} else {
	Logger::log("Loggers are different.");
}


// Check how Config singleton saves data...
$config1 = Config::getInstance();
$login = "test_login";
$password = "test_password";
$config1->setValue("login", $login);
$config1->setValue("password", $password);
// at this point config2 instance is the cached version of the config1
$config2 = Config::getInstance();
if ($login == $config2->getValue("login") &&
	$password == $config2->getValue("password")
) {
	Logger::log("Config singleton also works fine.");
}

Logger::log("Finished!");