<?php

namespace app\factory_method\classes;

abstract class SocialNetworkPoster
{
	abstract function getSocialNetwork(): SocialNetworkConnector;

	public function post($content): bool
	{
		$social = $this->getSocialNetwork();

		$social->logIn();
		$social->createPost($content);
		$social->logOut();

		return true;
	}
}