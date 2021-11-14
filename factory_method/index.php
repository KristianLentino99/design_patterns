<?php

use app\factory_method\classes\FacebookPoster;
use app\factory_method\classes\LinkedinConnector;
use app\factory_method\classes\LinkedinPoster;
use app\factory_method\classes\SocialNetworkPoster;

require_once "../common/autoloader.php";



/**
 * The client code can work with any subclass of SocialNetworkPoster since it
 * doesn't depend on concrete classes.
 */
function clientCode(SocialNetworkPoster $creator)
{
	// ...
	$creator->post("Hello world!");
	// ...
}

/**
 * During the initialization phase, the app can decide which social network it
 * wants to work with, create an object of the proper subclass, and pass it to
 * the client code.
 */
echo "Testing ConcreteCreator1:\n <br/>";
clientCode(new FacebookPoster("john_smith", "******"));
echo "<br/>";
echo "<br/>";

echo "<hr/>";

echo "Testing ConcreteCreator2:\n <br/>";
clientCode(new LinkedinPoster("john_smith", "******"));
echo "<br/>";
echo "<br/>";

