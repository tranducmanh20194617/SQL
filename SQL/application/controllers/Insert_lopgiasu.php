<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insert_lopgiasu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	

	$this->load->database();
	
	/*load Model*/
	$this->load->model('Insertlopgiasu');
	}
        /*Insert*/
	public function savedata()
	{
		/*load registration view form*/
		$this->load->view('insertlopgiasu');
	
		/*Check submit button */
		if($this->input->post('dangky'))
		{

		$bo_mon = $this->input->post('bo_mon');
		$gioi_tinh_yeu_cau = $this->input->post('gioi_tinh_yeu_cau');
		$quan_phuong = $this->input->post('quan_phuong');
		$dia_chi = $this->input->post('dia_chi');
		$luong = $this->input->post('luong');
		$thoi_gian_hoc = $this->input->post('thoi_gian_hoc');
		$yeu_cau = $this->input->post('yeu_cau');
		$trinh_do = $this->input->post('trinh_do');
		$id_admin = $this->input->post('id_admin');
		// $yeu_cau = $this->input->post('yeu_cau');
		$this->Insertlopgiasu->saverecords($bo_mon , $gioi_tinh_yeu_cau , $quan_phuong , $dia_chi , $luong , $thoi_gian_hoc , $yeu_cau , $trinh_do , $id_admin);
        echo "<script>alert('Thêm lớp thành công!');</script>";
		
		}
	}

}

/* End of file Insert_lopgiasu.php */
/* Location: ./application/controllers/Insert_lopgiasu.php */