<?php
defined('BASEPATH') or exit('No direct script access allowed');


class HashLibrary 
{

	
	public function hashPassword(string $password) : string
	{
		return password_hash($password, PASSWORD_DEFAULT);
	}

	public function checkHashPassword(string $password, string $hashedPassword) : bool 
	{
		return password_verify($password, $hashedPassword);
	}

}
