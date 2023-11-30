<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


	public function setSession($session, $username)
	{
		$data = array(
			'SESSION' => $session 
		);

		$this->db->where('TAIKHOAN', $username);
		$this->db->update('taikhoan', $data);
		return $this->db->affected_rows();
	}

	public function getSession() 
	{
		$this->db->select('SESSION');
		$dl = $this->db->get('taikhoan');
		$dl = $dl->result_array();
		return $dl;

	}

	public function getNhacungcap()
	{
		// lấy tất cả dữ liệu của nhacungcap (Ngọc Tịnh)
	}

	public function getNguyenlieu()
	{
		// lấy tất cả dữ liệu của nguyenlieu 
	}

	public function insertNhacungcap($manhacungcap, $ten, $sdt, $diachi)
	{
		$data = array(
			'MANHACUNGCAP' => $manhacungcap, 
			'TEN' => $ten, 
			'SDT' => $sdt,
			'DIACHI' => $diachi
		);

		$this->db->insert('nhacungcap', $data);
		return $this->db->affected_rows();
	}

	public function insertNguyenlieumoi($manguyenlieu, $tennl)
	{
		for ($i=0; $i < count($manguyenlieu); $i++) { 
			if ($manguyenlieu[$i]) {
				$data = array(
					'MANGUYENLIEU' => $manguyenlieu[$i], 
					'TENNL' => $tennl[$i] 

				);
				$this->db->insert('nguyenlieu', $data);
			}

		}
		return $this->db->affected_rows();	
	}


	public function insertDondathang($madondh, $manhacungcap, $nguoilap)
	{
		$data = array(
			'MADONDH' => $madondh, 
			'MANHACUNGCAP' => $manhacungcap, 
			'NGUOILAP' => $nguoilap,
			'NGAYLAP' => date("d/m/Y h:i:sa")
		);

		$this->db->insert('dondh', $data);
		return $this->db->affected_rows();
	}


	public function insertCtdondathang($madondh, $manguyenlieu, $soluong, $donvi, $ghichu) 
	{
		for ($i=0; $i < count($manguyenlieu); $i++) { 
			$data = array(
				'MADONDATHANG' => $madondh, 
				'MANGUYENLIEU' => $manguyenlieu[$i], 
				'SOLUONG' => $soluong[$i], 
				'DONVI' => $donvi[$i], 
				'GHICHU' => $ghichu[$i] 
			);
			$this->db->insert('ctdondathang', $data);
		}

		return $this->db->affected_rows();
	}

	public function getDondathang()
	{
		// lay MADONDH, MANHACUNGCAP trong dondh (Ngọc Tịnh)
		

	}


	public function insertCtcungcap($mactcc, $mancc, $manl, $soluong, $dongia)
	{
		//  Thêm dữ liệu vào bảng ctcungcap (Ngọc Tịnh)
	}

	public function insertPhieunhap($mapn, $maddh, $manv)
	{
		// Thêm vào bảng phieunhap (Ngọc Tịnh)
	}

	public function insertCtphieunhap($manl, $mapn, $soluong, $donvi, $ghichu)
	{
		// Thêm vào bảng ctphieunhap (Ngọc Tịnh)
	}


	public function insertLoaitrasua($maloaitrasua, $tenloai, $mota, $gia, $hinhanh, $trangthai)
	{
		// Thêm vào bảng loaitrasua (Ngọc Chuẩn)
	}

	public function insertCtloaitrasua($maloai, $manguyenlieu, $lieuluong, $donvi, $ghichu)
	{
		// Thêm vào bảng ctloaitrasua(Ngọc Chuẩn)
	}

	public function getLoaitrasua()
	{
		$this->db->select('MALOAITRASUA, TENLOAI');
		$dl = $this->db->get('loaitrasua');

		return $dl->result_array();;



	}


	public function getKhachhang()
	{
		$this->db->select('*');
		$dl = $this->db->get('khachhang');

		return $dl->result_array();
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */