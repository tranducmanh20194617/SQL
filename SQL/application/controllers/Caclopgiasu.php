<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caclopgiasu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('dulieulopgiasu');
	}

}

/* End of file Caclopgiasu.php */
/* Location: ./application/controllers/Caclopgiasu.php */