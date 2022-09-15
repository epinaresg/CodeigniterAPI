<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH.'controllers/BaseController.php');

class UserActivities extends BaseController
{
	
	public function conversations_get() : void
	{	

	    	try {
			$this->load->library('services/UserService', null, 'UserService');
			$this->load->library('services/UserActivityService', null, 'UserActivityService');
			$this->load->library('resources/UserActivityConverstationsResource', null, 'UserActivityConverstationsResource');
			
			$data = $this->getData();

			if (!isset($data['uid']) || !$this->UserService->byId($data['uid']))
				$this->response([
					'message' => 'El usuario ingresado no existe.'
				], 400);

			$conversations =$this->UserActivityService->getAllByUserId($data['uid']);
			
			$this->response($this->UserActivityConverstationsResource->getFormatResponse($conversations), 200);

		} catch (\Exception $e) {

			$message = $e->getMessage();
			$statusCode = $e->getCode();

			$this->response([
				'message' => $message
			], $statusCode !== 400 ? 500 : $statusCode);

		}

    	}

}
