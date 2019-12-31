<?php
class Mhs_model extends CI_Model{

  var $table = 'mahasiswa';
	var $column_order = array('nim','nama_mhs','password','angkatan'); //set column field database for datatable orderable
	var $column_search = array('nim','nama_mhs','angkatan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('nim' => 'desc'); // default order

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  function cek_login($data)
	{
	   $this -> db -> select('nim, nama_mhs, password');
	   $this -> db -> from('mahasiswa');
	   $this -> db -> where('nim', $data['nim']);
	   $this -> db -> where('password', $data['password']);
	   $this -> db -> limit(1);

	   $query = $this -> db -> get();

	   if($query -> num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	}

  private function _get_datatables_query()
	{

		$this->db->from($this->table);

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

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
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
		$this->db->where('nim',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('nim', $id);
		$this->db->delete($this->table);
	}

  public function getMatkul()
  {
    $this->db->select('kd_matkul, nama_matkul');
    $this->db->from('matakuliah');
    $query = $this->db->get();
		return $query->result();
  }

  public function getDosen()
  {
    $this->db->select('nidn, nama_dosen');
    $this->db->from('dosen');
    $query = $this->db->get();
		return $query->result();
  }

  public function getMahasiswa()
  {
    $this->db->select('nim, nama_mhs');
    $this->db->from('mahasiswa');
    $query = $this->db->get();
		return $query->result();
  }

  public function getKelas($data)
  {
    $this->db->select('kelas.id_kelas, kelas.nama_kelas, matakuliah.nama_matkul, dosen.nama_dosen')
              ->from('kelas')
              ->join('matakuliah', 'kelas.kd_matkul = matakuliah.kd_matkul')
              ->join('dosen', 'kelas.nidn = dosen.nidn')
              ->where($data);
		$q=$this->db->get();
		$data=$q->first_row();
		return $data;
  }

  public function getKelasDosen($data)
  {
    $this->db->select('kelas.id_kelas, kelas.nama_kelas, matakuliah.nama_matkul')
              ->from('kelas')
              ->join('matakuliah', 'kelas.kd_matkul = matakuliah.kd_matkul')
              ->where($data);
		$q=$this->db->get();
    $data = $q->result();
		return $data;
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

  public function getTugas($data)
  {
    $this->db->from('nilai')
              ->join('tugas', 'nilai.id_tugas = tugas.id_tugas');
    $this->db->where('nilai.nim', $data);
    $query = $this->db->get();
		return $query->result();
  }

  public function getKelasMhs($data)
  {
    $this->db->select('kelas.id_kelas, kelas.nama_kelas, matakuliah.nama_matkul, dosen.nama_dosen')
              ->from('peserta_kelas')
              ->join('kelas', 'peserta_kelas.id_kelas = kelas.id_kelas')
              ->join('matakuliah', 'kelas.kd_matkul = matakuliah.kd_matkul')
              ->join('dosen', 'kelas.nidn = dosen.nidn')
              ->where($data);
		$q=$this->db->get();
    $data = $q->result();
		return $data;
  }
}
