<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH.'libraries/resources/Resource.php');

class AuthLoginResource implements Resource
{
	
	public function getFormatResponse(object $data) : array
	{
		return [
			//'id' => $data->id,
			'first_name' => $data->first_name,
			'last_name' => $data->last_name,
			'email' => $data->email
		];
	}

}
