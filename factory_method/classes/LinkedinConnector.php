<?php

namespace app\factory_method\classes;

class LinkedinConnector implements SocialNetworkConnector
{

	public function __construct(public string $login,public string $password)
	{

	}

	public function logIn(): void
	{
		echo "Send HTTP API request to log in user $this->login with " .
			"password $this->password\n <br/>";
	}

	public function logOut(): void
	{
		echo "Send HTTP API request to log out user $this->login\n <br/>";

	}

	public function createPost($content): bool
	{

		echo "Send HTTP API requests to create a post in Linkedin .\n <br/>";
		return true;
	}
}