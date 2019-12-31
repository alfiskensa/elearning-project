<?php

class dosen extends CI_Controller{
  function __construct(){
			parent::__construct();
			$this->load->model('dosen_model', 'dosen');

	}

    public function dosen_list()
  	{
  		$list = $this->dosen->get_datatables();
  		$data = array();
  		$no = $_POST['start'];
  		foreach ($list as $person) {
  			$no++;
  			$row = array();
  			$row[] = $person->nidn;
  			$row[] = $person->nama_dosen;
  			$row[] = $person->password;
  			$row[] = $person->role;

  			//add html for action
  			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->nidn."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
  				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->nidn."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

  			$data[] = $row;
  		}

  		$output = array(
  						"draw" => $_POST['draw'],
  						"recordsTotal" => $this->dosen->count_all(),
  						"recordsFiltered" => $this->dosen->count_filtered(),
  						"data" => $data,
  				);
  		//output to json format
  		echo json_encode($output);
  	}

  	public function dosen_edit($id)
  	{
  		$data = $this->dosen->get_by_id($id);
  		echo json_encode($data);
  	}

  	public function dosen_add()
  	{
  		$data = array(
  				'nidn' => $this->input->post('nidn'),
  				'nama_dosen' => $this->input->post('nama_dosen'),
  				'password' => $this->input->post('password'),
  				'role' => $this->input->post('role')
  			);
  		$insert = $this->dosen->save($data);
  		echo json_encode(array("status" => TRUE));
  	}

  	public function dosen_update()
  	{
  		$data = array(
        'nidn' => $this->input->post('nidn'),
        'nama_dosen' => $this->input->post('nama_dosen'),
        'password' => $this->input->post('password'),
        'role' => $this->input->post('role')
  			);
  		$this->dosen->update(array('nidn' => $this->input->post('nidn')), $data);
  		echo json_encode(array("status" => TRUE));
  	}

  	public function dosen_delete($id)
  	{
  		$this->dosen->delete_by_id($id);
  		echo json_encode(array("status" => TRUE));
  	}
    }
