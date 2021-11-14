<?php

namespace app\factory_method\classes;

use JetBrains\PhpStorm\Pure;

class LinkedinPoster extends SocialNetworkPoster
{

	public function __construct(public string $login,public string $password)
	{

	}
	#[Pure]
	function getSocialNetwork(): SocialNetworkConnector
	{
		return new LinkedinConnector($this->login,$this->password);
	}
}