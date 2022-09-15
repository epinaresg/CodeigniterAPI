<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH.'libraries/resources/ResourceArray.php');

class UserActivityConverstationsResource implements ResourceArray
{
	
	public function getFormatResponse(array $data) : array
	{

		$payload = [];

		foreach ($data as $d) {
			$payload[] = [
				"id"          => $d->id,
                        "messageFrom" => $d->message_from,
                        "value"       => $d->message_text,
                        "timestamp"   => intval($d->timestamp),
			];
		}
		
		return [
			'code' => 200,
			'payload' => $payload,
		];
	}

}
