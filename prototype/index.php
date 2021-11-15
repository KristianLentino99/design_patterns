<?php

use app\prototype\classes\Author;
use app\prototype\classes\Page;

require_once "../common/autoloader.php";
/**
 * The client code.
 */
function clientCode()
{
	$author = new Author("John Smith");
	$page = new Page("Tip of the day", "Keep calm and carry on.", $author);

	// ...

	$page->addComment("Nice tip, thanks!");

	// ...

	$draft = clone $page;
	//the author now belongs to two pages 
	echo "Dump of the clone. Note that the author is now referencing two objects.\n\n";
}

clientCode();
?>
