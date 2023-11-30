<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$cookie = get_cookie("SESSIONID");

		if ($this->checkCookie($cookie)) {
			$this->load->view('index_view');		
		}

	}

	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$this->load->view('login_view');
		} else {
			$this->requestLogin();
		}


	}


	public function requestLogin()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

	

		$this->db->select('*');
		$this->db->where('TAIKHOAN', $username);
		$dl = $this->db->get('taikhoan')->result_array();

		if (empty($dl)) {
			$message["message"] = array('Sai thông tin đăng nhập');
			$this->load->view('success_view', $message);
			return;
		}

		// lấy mã nhân viên
		$this->db->select('MANV');
	 	$this->db->where('MATAIKHOAN', $dl[0]["MATAIKHOAN"]);
	 	$manv = $this->db->get('nhanvien')->result_array();

	 	// kiểm tra vai trò
	 	$this->db->select('*');
	 	$this->db->where('MANVQL', $manv[0]['MANV']);
	 	$isAdmin = $this->db->get('bophan')->result_array();


		

		$passwordDb = $dl[0]["MATKHAU"];

		if ($password == $passwordDb) {

			if ($dl[0]["TAIKHOAN"] == "root@gmail.com") {
				$role = "boss";
			} else if(!empty($isAdmin)) {
				$role = "admin"; 
			} else {
				$role = "nhanvien";
			}
				

			date_default_timezone_set("Asia/Ho_Chi_Minh");
			// ngay het han
			// echo "The time is " . date("d/m/Y h:i:sa", strtotime('+1 hours')); 

			$sessionId = md5($dl[0]["TAIKHOAN"].$dl[0]["MATKHAU"].date("d/m/Y h:i:sa", strtotime('+174 seconds')));

			$newData = array(
				'id' => $sessionId,
				'username' => $dl[0]['TAIKHOAN'], 
				'ipaddress' => $this->input->ip_address(), 
				'useragent' => $this->input->user_agent(), 
				'manv' => $manv[0]['MANV'],
				'role' => $role,
				'createdate' => date("d/m/Y h:i:sa"), 
				'expiredate' => date("d/m/Y h:i:sa", strtotime('+3000 seconds')), 
			);

			$newDatas = array();

			array_push($newDatas, $newData);

			$newDatasJson = json_encode($newDatas);
			
			
			$isSetSession = $this->admin_model->setSession($newDatasJson, $dl[0]["TAIKHOAN"] );

			if (!$isSetSession) {
				echo "khong co thay doi row";
				return;
			} else {
				$this->input->set_cookie('SESSIONID', $newData['id'], 3000);
			}
			

			// $this->session->set_userdata('level', $dl[0]["level"]);
		

			$message["message"] = array('Đăng nhập thành công');
			redirect(base_url() . 'admin','refresh');
			return;
		}

		$message["message"] = array('Sai thông tin đăng nhậpAA');
		$this->load->view('success_view', $message);
		return;
		
	}


	public function checkCookie($cookie)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");

		$dl = $this->admin_model->getSession();
		
		foreach ($dl as $key => $value) {
			$data = json_decode($value["SESSION"], true);
			if (is_array($data) || is_object($data)) {
				foreach ($data as $subData) {
					if ($cookie == $subData['id']) {
						// tim thay cookie
						if (date("d/m/Y h:i:sa") >= $subData["expiredate"]) {
							delete_cookie("SESSIONID");
							redirect(base_url() . 'admin/login','refresh');
							return false;
						} else {
							return array(
								'role' => $subData['role'], 
								'manv' => $subData['manv'] 

							);

						}
					} 

				}	
			}


		}

		delete_cookie("SESSIONID");
		redirect(base_url() . 'admin/login','refresh');
		return false;

		
	} 



	public function dondathang()
	{	

		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {

				$nhacungcap = $this->admin_model->getNhacungcap();
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				
				$data['mangdulieu'] = array(
					'nhacungcap' => $nhacungcap, 
					'nguyenlieu' => $nguyenlieu 
				);

				
				$this->load->view('dondathang_view', $data);
			}
		} else {  // post
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				$nhacungcapcu = $this->input->post('nhacungcapcu');
				$nhacungcapmoi = $this->input->post('nhacungcapmoi');
				$manhacungcapmoi = 'ncc' . uniqid();
				$sodienthoainhacungcap = $this->input->post('sodienthoainhacungcap');
				$nguyenlieucu = $this->input->post('nguyenlieucu');
				
				$nguyenlieumoi = $this->input->post('nguyenlieumoi');
				$soluong = $this->input->post('soluong');
				$diachinhacungcap = $this->input->post('diachinhacungcap');
				$note = $this->input->post('note');
				$donvi = $this->input->post('donvi');
				$madondh = 'ddh' . uniqid();

				
				function tachmanguyenlieucu($nguyenlieucu) {
					$arraymanlcu = array();
					foreach ($nguyenlieucu as $key ) {
						if ($key) {
							array_push($arraymanlcu, explode("_", $key)[1]);

						} else {
							array_push($arraymanlcu, "");							
						}
					}

					return $arraymanlcu;
				}

				function taomanguyenlieumoi($nguyenlieucu) {
					$arraymanlmoi = array();
					foreach ($nguyenlieucu as $key ) {
						if ($key) {
							array_push($arraymanlmoi, "");							

						} else {
							array_push($arraymanlmoi, "nl". uniqid());
						}
					}

					return $arraymanlmoi;
				}

				function remakeNguyenlieumoi($nguyenlieumoi, $nguyenlieucu) {
					$array = array();
					$dem = 0;
					foreach ($nguyenlieucu as $key ) {
						if ($key) {
							array_push($array, "");							

						} else {
							array_push($array, $nguyenlieumoi[$dem]);
							$dem++;
						}
					}

					return $array;
				}

			
				$manguyenlieucu = tachmanguyenlieucu($nguyenlieucu);
				$manguyenlieumoi = taomanguyenlieumoi($nguyenlieucu);
				$nguyenlieumoi = remakeNguyenlieumoi($nguyenlieumoi, $nguyenlieucu);

				$manguyenlieu = array();
				for ($i=0; $i < count($manguyenlieucu); $i++) { 
					if ($manguyenlieucu[$i]) {
						$manguyenlieu[$i] = $manguyenlieucu[$i];
					} else {
						$manguyenlieu[$i] = $manguyenlieumoi[$i];
					}
				}

				if ($nhacungcapcu) {
					$manhacungcapcu = explode("_", $nhacungcapcu)[1];
				}


				
				function taoDonDatHang($mancc, $thiss, $madondh, $manv) {
					if($thiss->admin_model->insertDondathang($madondh, $mancc, $manv)) {
						echo "lap don dh thanh cong";
					}
				}

				if ($nhacungcapmoi) {
					if ($this->admin_model->insertNhacungcap($manhacungcapmoi, $nhacungcapmoi, $sodienthoainhacungcap, $diachinhacungcap)) {

						echo "them thanh cong";
						// insert dondathang
						taoDonDatHang($manhacungcapmoi, $this, $madondh, $infoSession["manv"]);
					}

					
				} else {
					taoDonDatHang($manhacungcapcu, $this, $madondh, $infoSession["manv"]);
				}

				if (!empty($nguyenlieumoi)) {
					$isRowAffect = $this->admin_model->insertNguyenlieumoi($manguyenlieumoi, $nguyenlieumoi);

					if ($isRowAffect) {
						echo "them thanh cong";
					}


				} 

				// insert ctdondathang
				if ($this->admin_model->insertCtdondathang($madondh, $manguyenlieu, $soluong, $donvi, $note)) {
					echo "insert ct dondathang thanh cong";
				}

				// echo '<pre>';
				// echo var_dump($nguyenlieucu, $soluong);
				// echo '</pre>';
				// tách mã nhà cung cấp kiểm tra mảng nguyenlieu và solong

				

			}


		}
		
	}


	public function  donnhaphang()  /*Ngọc Tịnh*/
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {

				
				// gọi hàm getNhacungcap() trong model và lưu vào biến $nhacungcap
				// gọi hàm getNguyenlieu() trong model và lưu vào biến $nguyenlieu
				// gọi hàm getDondathang() trong model và lưu vào biến $dondathang
				/*
				$data['mangdulieu'] = array(
					'nhacungcap' => $???, 
					'nguyenlieu' => $???, 
					'dondathang' => json_encode($???)
				);
				*/

				// đưa dữ liệu lên view
				$this->load->view('donnhaphang_view');
				// lapphieunhap, ct phieunhap, ctcungcap

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				// lấy dữ liệu từ front end về xử lí 
				
				$nhacungcapcu = 
				$dondathang = 
				$nguyenlieucu = 
				$soluong = 
				$dongia = 
				$donvi = 
				$note = 
				$mactcungcap = 'ctcc' . uniqid();
				$maphieunhap = 'pn' . uniqid();
				$manv = $infoSession['manv']; 

				// Thêm dữ liệu vào ctcungcap sử dụng hàm insertCtcungcap($mactcungcap, $nhacungcapcu, $nguyenlieucu, $soluong, $dongia) 
				


				// Thêm dữ liệu vào phieunhap (Tham khảo)
				if ($this->admin_model->insertPhieunhap($maphieunhap, $dondathang, $manv)) {
					// Thêm vào ctphieunhap
					if ($this->admin_model->insertCtphieunhap($nguyenlieucu, $maphieunhap, $soluong, $donvi, $note)) {
						echo "tao phieu nhap, insert ct phieunhap thanh cong";
					}
				}
			}
		}
	}

	public function taotrasua()  /*Ngọc Chuẩn*/
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {

				// Gọi model lấy dữ liệu từ hàm getNguyenlieu() và lưu vào biến $nguyenlieu 
				
				/*		
					$data['mangdulieu'] = array(
						'nguyenlieu' => $???, 
					);

				*/

				// đưa dữ liệu lên view
				$this->load->view('taotrasua_view');
			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				// lấy dữ liệu từ front-end
				$tenloai = 
				$mota = 
				$gia = 
				$trangthai = 

				$nguyenlieucu = 
				$soluong = 
				$donvi = 
				$note = 
				$maloaitrasua = 'ts' . uniqid();


				$isUploaded = $this->uploadFile($_FILES);
				if ($isUploaded) {
					// gọi model với hàm insertLoaitrasua($maloaitrasua, $tenloai, $mota, $gia, $isUploaded, $trangthai)
					

					// nếu thêm loaitrasua thành công thì thêm tiếp ctloaitrasua


				} else {
					echo "ko upload ddc";
				}

				
			}
		}
	}



	public function laphoadon()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {

				$khachhang = $this->admin_model->getKhachhang();
				$loaitrasua = $this->admin_model->getLoaitrasua();
				$khachhang = $this->admin_model->getKhachhang();
				
				
				$data['mangdulieu'] = array(
					'loaitrasua' => json_encode($loaitrasua),
					'khachhang' => json_encode($khachhang)
				);


				$this->load->view('admin/taohoadon_view', $data);
				// // lapphieunhap, ct phieunhap, ctcungcap

			

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$tenloai = $this->input->post('tenloai');
				$mota = $this->input->post('mota');
				$gia = $this->input->post('gia');
				$trangthai = $this->input->post('trangthai');

				$nguyenlieucu = $this->input->post('nguyenlieucu');
				$soluong = $this->input->post('soluong');
				$donvi = $this->input->post('donvi');
				$note = $this->input->post('note');
				$maloaitrasua = 'ts' . uniqid();

				$isUploaded = $this->uploadFile($_FILES);
				if ($isUploaded) {
					if ($this->admin_model->insertLoaitrasua($maloaitrasua, $tenloai, $mota, $gia, $isUploaded, $trangthai)) {
						echo "Thêm trà sữa thành công";

						// Insert ctloaitrasua
						if ($this->admin_model->insertCtloaitrasua($maloaitrasua, $nguyenlieucu, $soluong, $donvi, $note)) {
							echo "thêm ct loaitrasua thanh cong";
						} else {
							echo "có lỗi xảy ra bảng ctloaitrasua";
						}
					} else {
						echo "loại này đã tồn tại";
					}


				} else {
					echo "ko upload ddc";
				}

				
			}
		}
	}


	public function uploadFile()
	{
		// upload image
		$target_dir = "FileUpload/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["avatar"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "Sorry, file already exists.";
		//   $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES["avatar"]["size"] > 5000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
		    echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}


		if ($uploadOk == 1) {
			$anhAvatar = base_url() . "FileUpload/" . $_FILES["avatar"]["name"];

			return $anhAvatar;
		} else {
			return false;
		}
		
	}




}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */