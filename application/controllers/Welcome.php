<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this->load->model('mhs_model');
			$this->load->model('dosen_model', 'dosen');

	}

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
		$this->load->view('index');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function doLogin()
	{
		$nim = $this->input->post('nim');
		$password = $this->input->post('password');
		$data = array(
			'nim' => $nim,
			'password' => $password
			);
		$result = $this->mhs_model->cek_login($data);
		if($result){
			$sess_array = array();
			foreach($result as $row)
			 {
			   $sess_array = array(
				 'id' => $row->nim,
				 'nama' => $row->nama_mhs,
				 'role' => 'mahasiswa'
			   );
			   $this->session->set_userdata('logged_in', $sess_array);
				redirect('dashboard_mhs');
			 }
			 return TRUE;
			}else{
				echo "Nim dan password salah !";
			}
	}


	public function doLogindosen()
	{
		$nidn = $this->input->post('nidn');
		$password = $this->input->post('password');
		$data = array(
			'nidn' => $nidn,
			'password' => $password
			);
		$result = $this->dosen->cek_login($data);
		if($result){
			$sess_array = array();
			foreach($result as $row)
			 {
			   $sess_array = array(
				 'id' => $row->nidn,
				 'nama' => $row->nama_dosen,
				 'role' => $row->role
			   );
			   $this->session->set_userdata('logged_in', $sess_array);
				 if($sess_array['role'] == "admin"){
					 redirect('dashboard_admin');
				 }else{
					 redirect('dashboard_dosen');
				}
			 }
			 return TRUE;
			}else{
				echo "Nidn dan password salah !";
			}
	}

	public function dashboard_mhs()
	{
		$data['page'] = "mahasiswa/home_mhs";
		$this->load->view('dashboard',$data);
	}

	public function lihat_tugas()
	{
		$param=array('nim'=>$_GET['q']);
		$data['kelas'] = $this->mhs_model->getKelasMhs($param);
		$data['page'] = "mahasiswa/lihat_tugas";
		$this->load->view('dashboard', $data);
	}

	public function lihat_nilai()
	{
		$param=array('nim'=>$_GET['q']);
		$data['nim'] = $_GET['q'];
		$data['kelas'] = $this->mhs_model->getKelasMhs($param);
		$data['page'] = "mahasiswa/lihat_nilai";
		$this->load->view('dashboard', $data);
	}

	public function detail_nilai()
	{
		$id = $_GET['r'];
		$param=array('kelas.id_kelas'=>$_GET['q']);
		$data['kelas'] = $this->mhs_model->getTugasDosen($param);
		$data['tugas'] = $this->mhs_model->getTugas($id);
		$data['page'] = "mahasiswa/detail_nilai";
		$this->load->view('dashboard', $data);
	}

	public function detail_tugas()
	{
		$param=array('kelas.id_kelas'=>$_GET['q']);
		$data['tugas'] = $this->mhs_model->getTugasDosen($param);
		$data['page'] = "mahasiswa/detail_tugas";
		$data['q'] = $_GET['q'];
		$this->load->view('dashboard', $data);
	}

	public function dashboard_dosen()
	{
		$data['page'] = "dosen/home_dosen";
		$this->load->view('dashboard',$data);
	}

	public function kelola_nilai()
	{
		$param=array('nidn'=>$_GET['q']);
		$data['kelas'] = $this->mhs_model->getKelasDosen($param);
		$data['q'] = $_GET['q'];
		$data['page'] = "dosen/kelola_nilai";
		$this->load->view('dashboard',$data);
	}

	public function nilai_tugas()
	{
		$param=array('id_tugas'=>$_GET['q']);
		$data['tugas'] = $this->mhs_model->getTugasDosen($param);
		$data['q'] = $_GET['q'];
		$data['page'] = "dosen/nilai_tugas";
		$this->load->view('dashboard',$data);
	}


	public function kelola_tugas()
	{
		$param=array('nidn'=>$_GET['q']);
		$data['kelas'] = $this->mhs_model->getKelasDosen($param);
		$data['q'] = $_GET['q'];
		$data['page'] = "dosen/kelola_tugas";
		$this->load->view('dashboard',$data);
	}

	public function dashboard_admin()
	{
		$data['page'] = "admin/home_admin";
		$this->load->view('dashboard', $data);
	}

	public function kelola_dosen()
	{
		$data['page'] = "admin/kelola_dosen";
		$this->load->view('dashboard',$data);
	}

	public function kelola_mahasiswa()
	{
		$data['page'] = "admin/kelola_mahasiswa";
		$this->load->view('dashboard',$data);
	}

	public function kelola_kelas()
	{
		$data['page'] = "admin/kelola_kelas";
		$data['matkul'] = $this->mhs_model->getMatkul();
		$data['dosen'] = $this->mhs_model->getDosen();
		$this->load->view('dashboard',$data);
	}

	public function detail_kelas()
	{
		$param=array('id_kelas'=>$_GET['q']);
		$data['kelas'] = $this->mhs_model->getKelas($param);
		$data['mhs'] = $this->mhs_model->getMahasiswa();
		$data['q'] = $_GET['q'];
		$data['page'] = "admin/detail_kelas";
		$this->load->view('dashboard',$data);
	}

	public function kelola_matakuliah()
	{
		$data['page'] = "admin/kelola_matakuliah";
		$this->load->view('dashboard',$data);
	}

	public function logout()
	{
	   $this->session->unset_userdata('logged_in');
	   redirect('login', 'refresh');
	}


}
