<?php
class Detail_tugas_model extends CI_Model{

  var $table = 'tugas';
	var $column_order = array('nama_tugas','tanggal_release','deadline'); //set column field database for datatable orderable
	var $column_search = array('nama_tugas','tanggal_release','deadline'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_tugas' => 'desc'); // default order

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }


  private function _get_datatables_query($data)
	{

		$this->db->from($this->table);
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
		$this->db->where('id_tugas',$id);
		$query = $this->db->get();

		return $query->row();
	}

  public function cek_exist($data)
  {
    $this->db->from('nilai');
		$this->db->where($data);
		$query = $this->db->get();
    if($query -> num_rows() == 1)
    {
    return true;
    }
    else
    {
    return false;
    }
  }

	public function save($data)
	{
		$this->db->insert('nilai', $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update('nilai', $data, $where);
		return $this->db->affected_rows();
	}



}
