<?php

class detail_tugas extends CI_Controller{
  function __construct(){
			parent::__construct();
			$this->load->model('detail_tugas_model', 'dt');

	}

    public function dt_list()
  	{
      $id=array('id_kelas'=>$_GET['q']);
      $list = $this->dt->get_datatables($id);
  		$data = array();
  		$no = $_POST['start'];
  		foreach ($list as $person) {
  			$no++;
  			$row = array();
  			$row[] = $person->nama_tugas;
  			$row[] = $person->tanggal_release;
        $row[] = $person->deadline;

  			//add html for action
  			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Lihat" onclick="lihat('."'".$person->id_tugas."'".')"><i class="glyphicon glyphicon-search"></i> Lihat</a>';
  			$data[] = $row;
  		}

  		$output = array(
  						"draw" => $_POST['draw'],
  						"recordsTotal" => $this->dt->count_all(),
  						"recordsFiltered" => $this->dt->count_filtered($id),
  						"data" => $data,
  				);
  		//output to json format
  		echo json_encode($output);
  	}

    public function dt_view($id)
  	{
  		$data = $this->dt->get_by_id($id);
  		echo json_encode($data);
  	}


  	public function dt_add()
  	{
      $kelas = $this->input->post('kelas');
      $tugas = $this->input->post('nam a_tugas');
      $dosen = $this->input->post('dosen');
      $matakuliah = $this->input->post('matkul');
      $dir = "./assets/uploads/$matakuliah/$dosen/$kelas/$tugas/";
      $data = array(
          'id_tugas'=> $this->input->post('tugas'),
  				'nim' => $this->input->post('nim'),
          'file_tugas' => preg_replace("/\s+/", "_", $_FILES['file_tugas']['name']),
          'updated_at'=> date("Y-m-d H:i:s"),
  			);
      $config =  array(
                      'upload_path'     => $dir,
                      'allowed_types'   => "gif|jpg|png|doc|docx|pdf|xls|xlsx|ppt|ppt|zip|rar",
                      'max_size'        => "2048000",  // Can be set to particular file size
                    );
    	$this->load->library('upload', $config);
      if(!is_dir($dir)) {
          mkdir($dir,0777, TRUE);
          $this->upload->do_upload('file_tugas');
      }else{
        $this->upload->do_upload('file_tugas');
      }
      $cek =  $this->dt->cek_exist(array(
          'id_tugas'=> $this->input->post('tugas'),
  				'nim' => $this->input->post('nim')));
      if(!$cek){
  		  $insert = $this->dt->save($data);
      }else{
        $insert = $this->dt->update(array('nim' => $this->input->post('nim'), 'id_tugas' => $this->input->post('tugas')), $data);
      }
  		echo json_encode(array("status" => TRUE));
  	}

  }
