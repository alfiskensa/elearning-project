<?php

class Nilai_tugas extends CI_Controller{
  function __construct(){
			parent::__construct();
			$this->load->model('nilai_tugas_model', 'nt');

	}

    public function nt_list()
  	{
      $id=array('id_tugas'=>$_GET['q']);
      $list = $this->nt->get_datatables($id);
  		$data = array();
  		$no = $_POST['start'];
  		foreach ($list as $person) {
  			$no++;
  			$row = array();
  			$row[] = $person->nim;
  			$row[] = $person->nama_mhs;
        $row[] = $person->file_tugas;
        $row[] = $person->nilai;
        $row[] = $person->updated_at;

  			//add html for action
  			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->nim."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';

  			$data[] = $row;
  		}

  		$output = array(
  						"draw" => $_POST['draw'],
  						"recordsTotal" => $this->nt->count_all(),
  						"recordsFiltered" => $this->nt->count_filtered($id),
  						"data" => $data,
  				);
  		//output to json format
  		echo json_encode($output);
  	}

    function download_tugas()
    {
        $id=array('id_tugas'=>$_GET['q']);
        $tugas = $this->nt->getTugasDosen($id);
        $kelas = $tugas->nama_kelas;
        $tugas = $tugas->nama_tugas;
        $dosen = $tugas->nama_dosen;
        $matakuliah = $tugas->nama_matkul;
        $this->load->library('zip');

        $path = FCPATH.'/assets/uploads/'.$matakuliah.'/'.$dosen.'/'.$kelas.'/'.$tugas.'/';

        $this->zip->read_dir($path,FALSE);

        // Download the file to your desktop. Name it "my_backup.zip"
        $this->zip->download('my_backup.zip');
    }

    public function nt_edit($id)
    {
      $data = $this->nt->get_by_id($id);
      echo json_encode($data);
    }

  	public function nt_update()
  	{
  		$data = array(
          'nilai'=> $this->input->post('nilai'),
  			);
      $this->nt->update(array('id_tugas' => $this->input->post('id_tugas'), 'nim' => $this->input->post('nim') ), $data);
  		echo json_encode(array("status" => TRUE));
  	}

}
