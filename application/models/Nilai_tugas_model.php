<?php
class Nilai_tugas_model extends CI_Model{

  var $table = 'nilai';
	var $column_order = array('mahasiswa.nim','mahasiswa.nama_mhs','nilai.updated_at','nilai.file_tugas','nilai.nilai'); //set column field database for datatable orderable
	var $column_search = array('mahasiswa.nim','mahasiswa.nama_mhs','nilai.updated_at','nilai.file_tugas','nilai.nilai'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('nilai.updated_at' => 'desc'); // default order

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }


  private function _get_datatables_query($data)
	{

		$this->db->from($this->table);
    $this->db->join('mahasiswa', 'nilai.nim = mahasiswa.nim');
    $this->db->where($data);

		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($data)
	{
		$this->_get_datatables_query($data);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($data)
	{
		$this->_get_datatables_query($data);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
    $this->db->join('mahasiswa', 'nilai.nim = mahasiswa.nim');
    $this->db->join('tugas', 'nilai.id_tugas = tugas.id_tugas');
		$this->db->where('mahasiswa.nim',$id);
		$query = $this->db->get();

		return $query->row();
	}

  public function getTugasDosen($data)
  {
    $this->db->select('tugas.id_tugas, tugas.deadline, kelas.nama_kelas, matakuliah.nama_matkul, tugas.nama_tugas, dosen.nama_dosen')
              ->from('tugas')
              ->join('kelas', 'tugas.id_kelas = kelas.id_kelas')
              ->join('matakuliah', 'kelas.kd_matkul = matakuliah.kd_matkul')
              ->join('dosen', 'kelas.nidn = dosen.nidn')
              ->where($data);
    $q=$this->db->get();
    $data = $q->first_row();
    return $data;
  }
  
	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
    $this->db->where($where);
    $this->db->update($this->table, $data);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('nim', $id);
		$this->db->delete($this->table);
	}


}