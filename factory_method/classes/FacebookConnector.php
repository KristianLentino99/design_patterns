<?php

namespace app\factory_method\classes;

class FacebookConnector implements SocialNetworkConnector
{
	private $login, $password;

	public function __construct(string $login, string $password)
	{
		$this->login = $login;
		$this->password = $password;
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
		echo "Send HTTP API requests to create a post in Facebook timeline.\n <br/>";

		return true;
	}
}