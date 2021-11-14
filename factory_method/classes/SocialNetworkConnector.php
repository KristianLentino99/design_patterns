<?php

namespace app\factory_method\classes;

interface SocialNetworkConnector
{
	public function logIn():void;
	public function logOut():void;
	public function createPost($content):bool;
}