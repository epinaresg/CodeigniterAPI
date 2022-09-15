<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH.'controllers/BaseController.php');

class User extends BaseController
{
	
    public function create_post() : void
    {	

		try {

			$this->load->library('requests/UserCreateRequest', null, 'UserCreateRequest');
			$this->load->library('resources/UserCreateResource', null, 'UserCreateResource');
			$this->load->library('services/UserService', null, 'UserService');
			

			$data = $this->getData();

			if (empty($data) || !$this->UserCreateRequest->validate($data))
				$this->response([
					'message' => 'Los datos ingresados no son correctos',
					'errors' => $this->UserCreateRequest->getErrors(),
				], 422);

			$user = $this->UserService->create($data);
			if (!$user)
				throw new Exception("No se pudo completar la operación.", 400);

			$this->response($this->UserCreateResource->getFormatResponse($user), 200);

		} catch (\Exception $e) {

			$message = $e->getMessage();
			$statusCode = $e->getCode();

			$this->response([
				'message' => $message
			], $statusCode !== 400 ? 500 : $statusCode);

		}

    }

	
	
}
