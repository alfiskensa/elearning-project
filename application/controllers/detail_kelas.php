<?php

class Detail_kelas extends CI_Controller{
  function __construct(){
			parent::__construct();
			$this->load->model('detail_kelas_model', 'dk');

	}

    public function dk_list()
  	{
      $id=array('id_kelas'=>$_GET['q']);
      $list = $this->dk->get_datatables($id);
  		$data = array();
  		$no = $_POST['start'];
  		foreach ($list as $person) {
  			$no++;
  			$row = array();
  			$row[] = $person->nim;
  			$row[] = $person->nama_mhs;
        $row[] = $person->angkatan;

  			//add html for action
  			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->nim."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

  			$data[] = $row;
  		}

  		$output = array(
  						"draw" => $_POST['draw'],
  						"recordsTotal" => $this->dk->count_all(),
  						"recordsFiltered" => $this->dk->count_filtered($id),
  						"data" => $data,
  				);
  		//output to json format
  		echo json_encode($output);
  	}


  	public function dk_add()
  	{
  		$data = array(
          'id_kelas'=> $this->input->post('kelas'),
  				'nim' => $this->input->post('mhs'),
  			);
  		$insert = $this->dk->save($data);
  		echo json_encode(array("status" => TRUE));
  	}


  	public function dk_delete($id)
  	{
  		$this->dk->delete_by_id($id);
  		echo json_encode(array("status" => TRUE));
  	}
    }
