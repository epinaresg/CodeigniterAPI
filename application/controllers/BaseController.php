<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class BaseController extends RestController
{

	protected function getData() : array
	{
		$streamClean = $this->security->xss_clean($this->input->raw_input_stream);

		$decoded = json_decode($streamClean, true);
		if (!$decoded)
			return [];
			
		return $decoded;
	}

}
