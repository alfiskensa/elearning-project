<?php

class kelas extends CI_Controller{
  function __construct(){
			parent::__construct();
			$this->load->model('kelas_model', 'kelas');

	}

    public function kelas_list()
  	{
  		$list = $this->kelas->get_datatables();
  		$data = array();
  		$no = $_POST['start'];
  		foreach ($list as $person) {
  			$no++;
  			$row = array();
  			$row[] = $person->nama_kelas;
  			$row[] = $person->nama_matkul;
  			$row[] = $person->nama_dosen;

  			//add html for action
  			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id_kelas."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
  				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id_kelas."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
            <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Peserta Kelas" onclick="peserta_kelas('."'".$person->id_kelas."'".')" ><i class="glyphicon glyphicon-search"></i> Peserta Kelas</a>';

  			$data[] = $row;
  		}

  		$output = array(
  						"draw" => $_POST['draw'],
  						"recordsTotal" => $this->kelas->count_all(),
  						"recordsFiltered" => $this->kelas->count_filtered(),
  						"data" => $data,
  				);
  		//output to json format
  		echo json_encode($output);
  	}

  	public function kelas_edit($id)
  	{
  		$data = $this->kelas->get_by_id($id);
  		echo json_encode($data);
  	}

  	public function kelas_add()
  	{
  		$data = array(
  				'nama_kelas' => $this->input->post('nama_kelas'),
  				'kd_matkul' => $this->input->post('matkul'),
  				'nidn' => $this->input->post('dosen'),
  			);
  		$insert = $this->kelas->save($data);
  		echo json_encode(array("status" => TRUE));
  	}

  	public function kelas_update()
  	{
  		$data = array(
        'nama_kelas' => $this->input->post('nama_kelas'),
        'kd_matkul' => $this->input->post('matkul'),
        'nidn' => $this->input->post('dosen'),
  			);
  		$this->kelas->update(array('id_kelas' => $this->input->post('id_kelas')), $data);
  		echo json_encode(array("status" => TRUE));
  	}

  	public function kelas_delete($id)
  	{
  		$this->kelas->delete_by_id($id);
  		echo json_encode(array("status" => TRUE));
  	}
    }
