<?php

namespace app\factory_method\classes;

class FacebookPoster extends SocialNetworkPoster
{

	public function __construct(public string $login,public string $password)
	{

	}
	function getSocialNetwork(): SocialNetworkConnector
	{
		return new FacebookConnector($this->login,$this->password);
	}
}