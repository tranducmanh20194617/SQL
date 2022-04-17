<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Svxemcaclopgiasu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('chosvxemdanhsachlop');
	}
	
}

/* End of file svxemcaclopgiasu.php */
/* Location: ./application/controllers/svxemcaclopgiasu.php */