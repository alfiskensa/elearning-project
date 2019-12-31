<?php

class mahasiswa extends CI_Controller{
  function __construct(){
			parent::__construct();
			$this->load->model('mhs_model', 'mhs');

	}

    public function mhs_list()
  	{
  		$list = $this->mhs->get_datatables();
  		$data = array();
  		$no = $_POST['start'];
  		foreach ($list as $person) {
  			$no++;
  			$row = array();
  			$row[] = $person->nim;
  			$row[] = $person->nama_mhs;
  			$row[] = $person->password;
        $row[] = $person->angkatan;

  			//add html for action
  			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->nim."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
  				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->nim."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

  			$data[] = $row;
  		}

  		$output = array(
  						"draw" => $_POST['draw'],
  						"recordsTotal" => $this->mhs->count_all(),
  						"recordsFiltered" => $this->mhs->count_filtered(),
  						"data" => $data,
  				);
  		//output to json format
  		echo json_encode($output);
  	}

  	public function mhs_edit($id)
  	{
  		$data = $this->mhs->get_by_id($id);
  		echo json_encode($data);
  	}

  	public function mhs_add()
  	{
  		$data = array(
  				'nim' => $this->input->post('nim'),
  				'nama_mhs' => $this->input->post('nama_mhs'),
  				'password' => $this->input->post('password'),
                'angkatan' => $this->input->post('angkatan')
  			);
  		$insert = $this->mhs->save($data);
  		echo json_encode(array("status" => TRUE));
  	}

  	public function mhs_update()
  	{
  		$data = array(
        'nim' => $this->input->post('nim'),
        'nama_mhs' => $this->input->post('nama_mhs'),
        'password' => $this->input->post('password'),
        'angkatan' => $this->input->post('angkatan')
  			);
  		$this->mhs->update(array('nim' => $this->input->post('nim')), $data);
  		echo json_encode(array("status" => TRUE));
  	}

  	public function mhs_delete($id)
  	{
  		$this->mhs->delete_by_id($id);
  		echo json_encode(array("status" => TRUE));
  	}
    }
