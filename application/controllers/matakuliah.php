<?php

class Matakuliah extends CI_Controller{
  function __construct(){
			parent::__construct();
			$this->load->model('matkul_model', 'matkul');

	}

    public function matkul_list()
  	{
  		$list = $this->matkul->get_datatables();
  		$data = array();
  		$no = $_POST['start'];
  		foreach ($list as $person) {
  			$no++;
  			$row = array();
  			$row[] = $person->kd_matkul;
  			$row[] = $person->nama_matkul;
  			$row[] = $person->sks;
        $row[] = $person->kategori;

  			//add html for action
  			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->kd_matkul."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
  				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->kd_matkul."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

  			$data[] = $row;
  		}

  		$output = array(
  						"draw" => $_POST['draw'],
  						"recordsTotal" => $this->matkul->count_all(),
  						"recordsFiltered" => $this->matkul->count_filtered(),
  						"data" => $data,
  				);
  		//output to json format
  		echo json_encode($output);
  	}

  	public function matkul_edit($id)
  	{
  		$data = $this->matkul->get_by_id($id);
  		echo json_encode($data);
  	}

  	public function matkul_add()
  	{
  		$data = array(
  				'kd_matkul' => $this->input->post('kd_matkul'),
  				'nama_matkul' => $this->input->post('nama_matkul'),
  				'sks' => $this->input->post('sks'),
  				'kategori' => $this->input->post('kategori'),
  			);
  		$insert = $this->matkul->save($data);
  		echo json_encode(array("status" => TRUE));
  	}

  	public function matkul_update()
  	{
  		$data = array(
  				'kd_matkul' => $this->input->post('kd_matkul'),
  				'nama_matkul' => $this->input->post('nama_matkul'),
  				'sks' => $this->input->post('sks'),
  				'kategori' => $this->input->post('kategori'),
  			);
  		$this->matkul->update(array('kd_matkul' => $this->input->post('kd_matkul')), $data);
  		echo json_encode(array("status" => TRUE));
  	}

  	public function matkul_delete($id)
  	{
  		$this->matkul->delete_by_id($id);
  		echo json_encode(array("status" => TRUE));
  	}
    }
