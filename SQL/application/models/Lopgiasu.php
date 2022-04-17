<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lopgiasu extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getdatanguoidung()
	{
		$this->db->select('*');
		$dl = $this->db->get('lop_gia_su');
		$dl = $dl->result_array();
		return $dl ;
	}
	public function getdatadanhsachlop()
	{
		$this->db->select('*')->where('trang_thai', "còn trống");
		$dl = $this->db->get('lop_gia_su');
		$dl = $dl->result_array();
		return $dl ;
	}
	public function getdataquan()
	{ 
		$this->db->select('DISTINCT(quan_phuong)');
		$dl = $this->db->get('lop_gia_su');
		$dl = $dl->result_array();
		return $dl ;
	}
	public function getdatamonhoc()
	{
		$this->db->select('DISTINCT(bo_mon)');
		$dl = $this->db->get('lop_gia_su');
		$dl = $dl->result_array();
		return $dl ;
	}
	public function getdatalophoc()
	{
		$this->db->select('DISTINCT(trinh_do)');
		$dl = $this->db->get('lop_gia_su');
		$dl = $dl->result_array();
		return $dl ;
	}
	public function updatebyID($class_id,$bo_mon,$gioi_tinh_yeu_cau,$quan_phuong,$dia_chi,$luong,$thoi_gian_hoc,$yeu_cau,$trinh_do,$trang_thai)
	{
		$dl = array(
			'class_id'=> $class_id ,
			'bo_mon'=> $bo_mon ,
			'gioi_tinh_yeu_cau'=> $gioi_tinh_yeu_cau,
			'quan_phuong'=> $quan_phuong,
			'dia_chi'=> $dia_chi,
			'luong'=> $luong,
			'thoi_gian_hoc'=> $thoi_gian_hoc,
			'yeu_cau'=> $yeu_cau,
			'trinh_do'=> $trinh_do,
			'trang_thai'=> $trang_thai

		);
		$this->db->where('class_id', $class_id);
		$this->db->update('lop_gia_su', $dl);
		if($this->db->affected_rows()>0)
		{
			echo 'thanhcong';
		}
		else
		{
			echo 'thatbai';
		}
	}


}

/* End of file lopgiasu.php */
/* Location: ./application/models/lopgiasu.php */