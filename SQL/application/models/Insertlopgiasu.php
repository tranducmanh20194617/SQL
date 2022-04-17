<?php
class Insertlopgiasu extends CI_Model
{
	/*Insert*/
	function saverecords($bo_mon, $gioi_tinh_yeu_cau, $quan_phuong, $dia_chi, $luong, $thoi_gian_hoc, $yeu_cau, $trinh_do, $id_admin)
	{
		$data = array(
			
			'bo_mon'=>$bo_mon,
			'gioi_tinh_yeu_cau'=>$gioi_tinh_yeu_cau,
			'quan_phuong'=>$quan_phuong,
			'dia_chi'=>$dia_chi,
			'luong'=>$luong,
			'thoi_gian_hoc'=>$thoi_gian_hoc,
			'yeu_cau'=>$yeu_cau,
			'trinh_do'=> $trinh_do,
			'id_admin' => $id_admin
		);
		$this->db->insert('lop_gia_su', $data);
	}

}

/* End of file Insert_lopgiasu.php */
/* Location: ./application/models/Insert_lopgiasu.php */