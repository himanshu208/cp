<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends MY_Controller 
{
	/*--------------------------------------------------------------*/
	public function index()
	{
		$this->load->view('public/alfa/error_404_view');
	}
	/*--------------------------------------------------------------*/
} // Class End