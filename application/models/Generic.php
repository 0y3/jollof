<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Generic extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	function add($data, $tablename)
	{
		$status = $this->db->insert($tablename, $data);
		return $this->db->insert_id();
	}
        
	function addbatch($data, $tablename)
	{
		// Perform the actual insertion
		$status = $this->db->insert_batch($tablename, $data);
	}
	
	function edit($data, $id, $tablename)
	{
		$this->db->where(array('id'=>$id));
		$status = $this->db->update($tablename, $data);
		return $status;
	}

	function editall($data, $tablename)
	{
		$status = $this->db->update($tablename, $data);
		return $status;
	}
	
	function editByConditions($data, $condition_array, $tablename)
	{
		$this->db->where($condition_array);
		$status = $this->db->update($tablename, $data);
		return $status;
	}
	
	// Get all data from a table
	function getAll($tablename, $limit=NULL, $fieldlist=null, $createdat=null, $updatedat=null, $orderbyfield=null, $d_order='asc')
	{
		if($fieldlist == null)
			$this->db->select('*');
		else 
			$this->db->select($fieldlist);
		
		$this->db->from($tablename);
		
		// If limit is specified
		if($limit != NULL)
			$this->db->limit(50, $limit);
		
		if($updatedat != NULL && $updatedat != '')
		{
			$updatedat = date("Y-m-d H:i:s", strtotime($updatedat));
			$this->db->where(array("$tablename.updatedat >" => $updatedat));
		}
		
		if($createdat != NULL && $createdat != '')
		{
			$createdat = date("Y-m-d H:i:s", strtotime($createdat));
			$this->db->where(array("$tablename.createdat >" => $createdat));
		}
		
		if($orderbyfield != NULL && $orderbyfield != '')
		{
			$this->db->order_by("$tablename.$orderbyfield", $d_order);
		}
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('isdeleted'=>0));
		// Query result
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	// Get count of all records in a table
	function getCount($tablename)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('deletedat'=>null));
		$total = $this->db->count_all_results();
		return $total;
	}
	
	function getAllCount($tablename)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('deletedat'=>null));
		$total = $this->db->count_all_results();
		return $total;
	}

	// Get data from specified table by id column
	function getByID($id, $tablename, $fieldlist=null)
	{
		if($fieldlist == null)
			$this->db->select('*');
		else 
			$this->db->select($fieldlist);
		$this->db->from($tablename);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('deletedat'=>null));
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->row_array();
		else
			return false;
	}
	
	// Get table data by specified field
	function getByField($fieldname, $fieldvalue, $tablename, $fieldlist=null, $createdat=null, $updatedat=null, $limit=NULL, $recordcount=50, $orderbyfield=null, $d_order='asc')
	{
		if($fieldlist == null)
			$this->db->select('*');
		else 
			$this->db->select($fieldlist);
		$this->db->from($tablename);
		$this->db->where($fieldname, $fieldvalue);
		
		if($updatedat != NULL && trim($updatedat) != '')
		{
			$updatedat = date("Y-m-d H:i:s", strtotime($updatedat));
			$this->db->where(array("$tablename.updatedat >" => $updatedat));
		}
		
		if($createdat != NULL && trim($createdat) != '')
		{
			$createdat = date("Y-m-d H:i:s", strtotime($createdat));
			$this->db->where(array("$tablename.createdat >" => $createdat));
		}
		
		// If limit is specified
		if($limit != NULL && trim($limit) != '')
			$this->db->limit($recordcount, $limit);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('isdeleted'=>0));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	function getByFieldCount($fieldname, $fieldvalue, $tablename, $fieldlist=null, $createdat=null, $updatedat=null, $limit=NULL, $recordcount=50, $orderbyfield=null, $d_order='asc')
	{
		if($fieldlist == null)
			$this->db->select('*');
		else
			$this->db->select($fieldlist);
		$this->db->from($tablename);
		$this->db->where($fieldname, $fieldvalue);
	
		if($updatedat != NULL && trim($updatedat) != '')
		{
			$updatedat = date("Y-m-d H:i:s", strtotime($updatedat));
			$this->db->where(array("$tablename.updatedat >" => $updatedat));
		}
	
		if($createdat != NULL && trim($createdat) != '')
		{
			$createdat = date("Y-m-d H:i:s", strtotime($createdat));
			$this->db->where(array("$tablename.createdat >" => $createdat));
		}
	
		// If limit is specified
		if($limit != NULL && trim($limit) != '')
			$this->db->limit($recordcount, $limit);
	
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('deletedat'=>null));
		
		$total = $this->db->count_all_results();
		return $total;
	}
	
	function getByFieldSingle($fieldname, $fieldvalue, $tablename, $fieldlist=null)
	{
		if($fieldlist == null)
			$this->db->select('*');
		else
			$this->db->select($fieldlist);
		$this->db->from($tablename);
		$this->db->where($fieldname, $fieldvalue);
	
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('isdeleted'=>0));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->row_array();
		else
			return false;
	}
	
	// Get count of all records in a table
	function getCountByField($fieldname, $fieldvalue, $tablename)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($fieldname, $fieldvalue);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('isdeleted'=>0));
		$total = $this->db->count_all_results();
		return $total;
	}

	function getCountByCondition($condition_array, $tablename)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($condition_array);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('isdeleted'=>0));
		$total = $this->db->count_all_results();
		return $total;
	}
	
	// Delete specified table record by id
	function delete($id, $tablename,$real=null)
	{
		$this->db->where(array('id'=>$id));
		if($real==1)
		{
			$status = $this->db->delete($tablename);
		}
		else
		{
        	$status = $this->db->update($tablename, array('deletedat'=>date("Y-m-d H:i:s"),'isdeleted'=> 1));
        }
		return $status;
	}

	function deleteByCondition($condition_array, $tablename,$real=null)
	{
		$this->db->where($condition_array);
        if($real==1)
		{
			$status = $this->db->delete($tablename);
		}
		else
		{
        	$status = $this->db->update($tablename, array('deletedat'=>date("Y-m-d H:i:s"),'isdeleted'=> 1));
        }
		return $status;
	}
	
	// Function to find duplicated data
	function findDuplicate($condition_array, $tablename)
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($condition_array);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('deletedat'=>null));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->row_array();
		else
			return false;
	}
	
	function findByCondition($condition_array, $tablename, $orderbyfield=null, $d_order='asc')
	{
		$this->db->select('*');
		$this->db->from($tablename);
		$this->db->where($condition_array);
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('isdeleted'=>0));
		
		if($orderbyfield != NULL && $orderbyfield != '')
			$this->db->order_by("$tablename.$orderbyfield", $d_order);
		
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}

	//function to get single field with multipole conditions
	function getByConditionFieldSingle($condition_array, $tablename, $fieldlist=null)
	{
		if($fieldlist == null)
			$this->db->select('*');
		else
			$this->db->select($fieldlist);
		$this->db->from($tablename);
		$this->db->where($condition_array);
	
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('isdeleted'=>0));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->row_array();
		else
			return false;
	}
        
    public function getrowid($data,$tablename) 
    {        
        $_id = $this->db->get_where( $tablename , $data)->row_array(); 
        if($_id == TRUE) { return $_id['id']; }
        else {return FALSE; }
    }
}
