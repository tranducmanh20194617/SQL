<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	//lấy dữ liệu lớp gia sư
	
	public function laydulieulopgiasu()
	{
		$this->load->model('lopgiasu');
		$dl = $this->lopgiasu->getdatanguoidung();
		$dl = json_encode($dl);
		echo $dl ;
    // lưu dữ liệu lớp gia sư
	}
	public function laydulieucontrong()
	{
		$this->load->model('lopgiasu');
		$dl = $this->lopgiasu->getdatadanhsachlop();
		$dl = json_encode($dl);
		echo $dl ;
    // lưu dữ liệu lớp gia sư
	}
	public function laydulieulopgiasuquan()
	{
		$this->load->model('lopgiasu');
		$dl = $this->lopgiasu->getdataquan();
		$dl = json_encode($dl);
		echo $dl ;
    // lưu dữ liệu lớp gia sư quận
	}
	public function laydulieulopgiasumonhoc()
	{
		$this->load->model('lopgiasu');
		$dl = $this->lopgiasu->getdatamonhoc();
		$dl = json_encode($dl);
		echo $dl ;
    // lưu dữ liệu lớp gia sư môn học
	}
	
	public function laydulieulopgiasulophoc()
	{
		$this->load->model('lopgiasu');
		$dl = $this->lopgiasu->getdatalophoc();
		$dl = json_encode($dl);
		echo $dl ;
    // lưu dữ liệu lớp gia sư lớp học
	}


	
	public function luudulieulopgiasu()
	{
		$class_id = $this->input->post('class_id');
		$bo_mon = $this->input->post('bo_mon');
		$gioi_tinh_yeu_cau = $this->input->post('gioi_tinh_yeu_cau');
		$quan_phuong = $this->input->post('quan_phuong');
		$dia_chi = $this->input->post('dia_chi');
		$luong = $this->input->post('luong');
		$thoi_gian_hoc = $this->input->post('thoi_gian_hoc');
		$trinh_do = $this->input->post('trinh_do');
		$trang_thai = $this->input->post('trang_thai');
		$yeu_cau = $this->input->post('yeu_cau');

		$this->load->model('Lopgiasu');
		echo $this->Lopgiasu->updatebyID($class_id,$bo_mon,$gioi_tinh_yeu_cau,$quan_phuong,$dia_chi,$luong,$thoi_gian_hoc,$yeu_cau,$trinh_do,$trang_thai);
	
	}

	public function laydulieu1lop()
	{
		
	}
}
