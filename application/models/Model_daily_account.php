<?php 

class Model_daily_account extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	/* get the brand data */
	public function getData(){
		$sql = "SELECT * FROM daily_account";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getByName($userId = null){
		if($userId){
			$sql = "SELECT * FROM daily_account WHERE staff_name = ?";	
			$query = $this->db->query($sql, array($userId));
			return $query;
		}
	}
	public function getById($userId = null){
		if($userId){
			$sql = "SELECT * FROM daily_account WHERE user_id = ?";	
			$query = $this->db->query($sql, array($userId));
			return $query->row_array();
		}
	}
	public function getByDept($dept = null){
		if($dept){
			$sql = "SELECT * FROM daily_account WHERE locate(?,department)";
			$query = $this->db->query($sql, array($dept));
			return $query->result_array();
		}
	}
	public function getByDate($date = null){
		if($date){
			$sql = "SELECT * FROM daily_account WHERE locate(?,date_tag)";	
			$query = $this->db->query($sql, array($date));
			return $query->result_array();
		}
	}
	public function getByDateAndId($id,$date){
		if($date and $id){
			$query=$this->db->where_in('user_id', $id)->get_where('daily_account',array('date_tag'=>$date));
			#$sql = "SELECT * FROM (select * from daily_account where user_id in ?) as t WHERE locate(?,date_tag)";	
			#$query = $this->db->query($sql, array($id,$date));
			return $query->row_array();
		}
	}
	public function getByDateAndIdset($id,$date){
		if($date and $id){
			$query=$this->db->where_in('user_id', $id)->get_where('daily_account',array('date_tag'=>$date));
			#$sql = "SELECT * FROM (select * from daily_account where user_id in ?) as t WHERE locate(?,date_tag)";	
			#$query = $this->db->query($sql, array($id,$date));
			return $query->result_array();
		}
	}
	public function getByDateAndDept($dept,$date){
		if($date and $dept){	
			$sql = "SELECT * FROM (select * from daily_account where locate(?,department)) as t WHERE locate(?,date_tag)";	
			$query = $this->db->query($sql, array($dept,$date));
			return $query->result_array();
		}
	}
	public function exportData($id = null){
		$sql = "SELECT * FROM daily_account";
		return $this->db->query($sql);
	}
	public function exportmydeptData($dept=null){
		if($dept){
			$sql = "SELECT * FROM daily_account WHERE locate(?,department)";
			$query = $this->db->query($sql, array($dept));
			return $query;
		}

	}
	public function create($data){
		if($data){
			$insert = $this->db->insert('daily_account', $data);
			return ($insert == true) ? true : false;
		}
	}
	public function createbatch($data){
		if($data){
			$insert = $this->db->insert_batch('daily_account', $data);
			return ($insert == true) ? true : false;
		}
	}
	public function deleteAll(){
		$sql='delete from daily_account';
		$delete = $this->db->query($sql);
		return ($delete == true) ? true : false;
	}
	public function getDatetag(){
		$sql='select distinct date_tag from daily_account order by date_tag';
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function deleteByDate($date){
		$sql='delete from daily_account where locate(?,date_tag)';
		$delete = $this->db->query($sql,array($date));
		return ($delete == true) ? true : false;
	}
	public function countAvg($date_set,$user_id){
		#$query=$this->db->where('user_id',$user_id)->where_in('date_tag', $date_set)->select_avg('total')->from('daily_account')->get();
		$query=$this->db->select_avg('total')->where('user_id',$user_id)->where_in('date_tag', $date_set)->get('daily_account');
		return $query->row_array();
	}
	public function countSum($date_set,$user_id){
		#$query=$this->db->where('user_id',$user_id)->where_in('date_tag', $date_set)->select_avg('total')->from('daily_account')->get();
		$query=$this->db->select_sum('total')->where('user_id',$user_id)->where_in('date_tag', $date_set)->get('daily_account');
		return $query->row_array();
	}
	public function getDeptByDate($date_set){
		$query=$this->db->from('daily_account')->where_in('date_tag', $date_set)->get();
		return $query->result_array();
	}
}