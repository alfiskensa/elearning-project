<?php

class Tugas extends CI_Controller{
  function __construct(){
			parent::__construct();
			$this->load->model('tugas_model', 'tugas');

	}

    public function tugas_list()
  	{
      $id=array('nidn'=>$_GET['q']);
      $page = $_GET['r'];
      $list = $this->tugas->get_datatables($id);
  		$data = array();
  		$no = $_POST['start'];
  		foreach ($list as $person) {
  			$no++;
  			$row = array();
  			$row[] = $person->nama_tugas;
  			$row[] = $person->nama_kelas;
  			$row[] = $person->nama_matkul;
  			$row[] = $person->tanggal_release;
        if($page == "tugas"){
  			//add html for action
  			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id_tugas."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
  				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id_tugas."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
        }else{
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="lihat_tugas('."'".$person->id_tugas."'".')"><i class="glyphicon glyphicon-search"></i> Lihat Tugas</a>';
        }
  			$data[] = $row;
  		}

  		$output = array(
  						"draw" => $_POST['draw'],
  						"recordsTotal" => $this->tugas->count_all(),
  						"recordsFiltered" => $this->tugas->count_filtered($id),
  						"data" => $data,
  				);
  		//output to json format
  		echo json_encode($output);
  	}

  	public function tugas_edit($id)
  	{
  		$data = $this->tugas->get_by_id($id);
  		echo json_encode($data);
  	}

  	public function tugas_add()
  	{
  		$data = array(
          'id_kelas' => $this->input->post('kelas'),
  				'nama_tugas' => $this->input->post('nama_tugas'),
  				'deskripsi' => $this->input->post('deskripsi'),
  				'tanggal_release' => $this->input->post('tanggal_release'),
  				'deadline' => $this->input->post('deadline'),
  			);
  		$insert = $this->tugas->save($data);
  		echo json_encode(array("status" => TRUE));
  	}

  	public function tugas_update()
  	{
  		$data = array(
        'id_kelas' => $this->input->post('kelas'),
        'nama_tugas' => $this->input->post('nama_tugas'),
        'deskripsi' => $this->input->post('deskripsi'),
        'tanggal_release' => $this->input->post('tanggal_release'),
        'deadline' => $this->input->post('deadline'),
  			);
  		$this->tugas->update(array('id_tugas' => $this->input->post('id_tugas')), $data);
  		echo json_encode(array("status" => TRUE));
  	}

  	public function tugas_delete($id)
  	{
  		$this->tugas->delete_by_id($id);
  		echo json_encode(array("status" => TRUE));
  	}
    }
