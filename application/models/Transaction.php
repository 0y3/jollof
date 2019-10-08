<?PHP
class Transaction extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function queryParameters($params=array())
	{
		// filter by merchant_id
		if(isset($params['merchantid']) && isset($params['merchantid']))
			$this->db->where(array('purchases.merchantid'=>$params['merchantid']));
		
		// filter by pharmacy id
		if(isset($params['pharmacyid']) && isset($params['pharmacyid']))
			$this->db->where(array('merchants.pharmacyid'=>$params['pharmacyid']));
		
		// filter by merchant name
		if(isset($params['merchantname']) && isset($params['merchantname']))
			$this->db->like(array('merchants.merchantname'=>$params['merchantname']));
		
		// filter by customer id
		if(isset($params['customerid']) && isset($params['customerid']))
			$this->db->where(array('purchases.orangecardid'=>$params['customerid']));
		
		// filter by customer code
		if(isset($params['customercode']) && isset($params['customercode']))
			$this->db->where(array('customers.customercode'=>$params['customercode']));
		
		// filter by product
		if(isset($params['productid']) && isset($params['productid']))
			$this->db->like(array('purchases.productid'=>$params['productid']));
		
		// filter by productname
		if(isset($params['productname']) && isset($params['productname']))
			$this->db->like(array('products.productname'=>$params['productname']));
		
		// filter by transaction amount
		if(isset($params['amountpaid']) && isset($params['amountpaid']))
			$this->db->where(array('purchases.amountpaid'=>$params['amountpaid']));
		
		// filter by card id
		if(isset($params['orangecardid']) && isset($params['orangecardid']))
			$this->db->where(array('purchases.orangecardid'=>$params['orangecardid']));
		
		// filter by payment type
		if(isset($params['paymenttype']) && isset($params['paymenttype']))
			$this->db->where(array('purchases.paymenttype'=>$params['paymenttype']));
		
		// filter by created date
		if(isset($params['createdat']) && isset($params['createdat']))
		{
			$t_date = explode("-", $params['createdat']);
			$startdate = date("Y-m-d", strtotime($t_date[0]));
			$enddate = date("Y-m-d", strtotime($t_date[1]));
			$this->db->where(array('purchases.createdat >='=>$startdate, 'purchases.createdat <='=>$enddate.' 23:59:59' ));
		}
		
		// filter by created date
		if(isset($params['updatedat']) && isset($params['updatedat']))
		{
			$t_date = explode("-", $params['updatedat']);
			$startdate = date("Y-m-d", strtotime($t_date[0]));
			$enddate = date("Y-m-d", strtotime($t_date[1]));
			$this->db->where(array('purchases.updatedat >='=>$startdate, 'purchases.updatedat <='=>$enddate.' 23:59:59' ));
		}
		
		// filter based on payment type 1=cash/money 2=points
		if(isset($params['paymenttype']) && isset($params['paymenttype']))
			$this->db->like(array('purchases.paymenttype'=>$params['paymenttype']));
	}
	
	function getAll($param=array(), $limit_start)
	{
		$this->db->select('purchases.*, merchants.merchantname, products.productname, customers.customercode');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id', "left");
		$this->db->join('products', 'purchases.productid = products.id', "left");
		$this->db->join('customers', 'purchases.customerid = customers.id', "left");
		
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
		
		$this->db->order_by('purchases.createdat', "desc");
		$this->db->limit(25, $limit_start);
		
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	// Get count of all merchants
	function getAllCount($param=array())
	{
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		
		// Process any filter options if any
		$this->queryParameters($param);
		
		$this->db->where(array('purchases.deletedat'=>null));
	
		$total = $this->db->count_all_results();
		return $total;
	}
	
	// Get recent purchases
	function getRecent($param=array())
	{
		$this->db->select('purchases.*, merchants.merchantname, products.productname, customers.customercode');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		$this->db->join('products', 'purchases.productid = products.id');
		$this->db->join('customers', 'purchases.customerid = customers.id');
	
		// Process any filter options if any
		$this->queryParameters($param);
	
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
	
		$this->db->order_by('purchases.createdat', "desc");
		$this->db->limit(5);
	
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	// Get the overall count of drug purchases
	function getOverallTotalPurchases($param=array())
	{
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
	
		$total = $this->db->count_all_results();
		return $total;
	}
	
	// Get total purchases that have been paid for with reward points
	function getTotalFree($param=array())
	{
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		
		$this->db->where(array('purchases.paymenttype'=>2));
		
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
	
		$total = $this->db->count_all_results();
		return $total;
	}
	
	// Get total purchases that have been paid for with discounts
	function getTotalDiscounted($param=array())
	{
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		
		$this->db->where(array('purchases.paymenttype'=>3));
		
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
		
		$total = $this->db->count_all_results();
		return $total;
	}
	
	// Get the total count of drugs not purchased for free
	public function getTotalPurchasesPaid($param=array())
	{
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
	
		$this->db->where(array('purchases.paymenttype'=>1));
	
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
	
		$total = $this->db->count_all_results();
		return $total;
	}
	
	// Get total purchases Grouped by merchant
	public function getSaleCountByMerchants($param=array(), $start_from=0)
	{
		$this->db->select('merchants.id, COUNT(purchases.id) as total_value, merchants.merchantname');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
		
		$this->db->group_by(array("purchases.merchantid"));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	// Get total purchases Grouped by merchant showing top sales
	public function getSaleCountByMerchantsTop($param=array(), $start_from=0)
	{
		$this->db->select('merchants.id, COUNT(purchases.id) as total_value, merchants.merchantname');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
		
		$this->db->group_by(array("purchases.merchantid"));
		$this->db->order_by("total_value", "desc");
		$this->db->limit(20,$start_from);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	// Get total purchases Grouped by merchant showing top sales
	public function getTop5Merchants($param=array())
	{
		$this->db->select('merchants.id, COUNT(purchases.id) as total_value, merchants.merchantname, merchants.pharmacyid');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
	
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
	
		$this->db->group_by(array("purchases.merchantid"));
		$this->db->order_by("total_value", "desc");
		$this->db->limit(5);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	public function getSaleCountByProduct($param=array())
	{
		$this->db->select('COUNT(purchases.id) as total_value, merchants.merchantname, products.productname, merchants.pharmacyid');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		$this->db->join('products', 'purchases.productid = products.id');
	
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
	
		$this->db->group_by(array("purchases.productid"));
		$this->db->order_by("total_value", "desc");
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	// Get total purchases Grouped by customer showing top sales
	public function getTop5Customers($param=array())
	{
		$this->db->select('customers.id, COUNT(purchases.id) as total_value, customers.customercode, customers.orangecardid');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		$this->db->join('customers', 'purchases.customerid = customers.id');
	
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
	
		$this->db->group_by(array("purchases.customerid"));
		$this->db->order_by("total_value", "desc");
		$this->db->limit(5);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	function transactionTrend($param=array())
	{
		$this->db->select('COUNT(purchases.id) AS total_vat, DATE(purchases.createdat) as transactiondate');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		$this->db->group_by('DATE(purchases.createdat)');
		
		if(!isset($param['createdat']))
			$this->db->where("purchases.createdat > DATE_SUB(NOW(), INTERVAL 14 DAY)");
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
		
		// Process any filter options if any
		$this->queryParameters($param);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function transactionTrendRewards($param=array())
	{
		$this->db->select('COUNT(purchases.id) AS total_vat, DATE(purchases.createdat) as transactiondate');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		$this->db->group_by('DATE(purchases.createdat)');
		
		if(!isset($param['createdat']))
			$this->db->where("purchases.createdat > DATE_SUB(NOW(), INTERVAL 30 DAY)");
		
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
		
		$this->db->where(array('paymenttype'=>2));
		$query = $this->db->get();
		return $query->result_array();
	}
	
	function transactionTrendDiscounted($param=array())
	{
		$this->db->select('COUNT(purchases.id) AS total_vat, DATE(purchases.createdat) as transactiondate');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		$this->db->group_by('DATE(purchases.createdat)');
		
		if(!isset($param['createdat']))
			$this->db->where("purchases.createdat > DATE_SUB(NOW(), INTERVAL 30 DAY)");
			
			// Process any filter options if any
			$this->queryParameters($param);
			
			// Clause to only fetch data with deletedat field set to null
			$this->db->where(array('purchases.deletedat'=>null));
			
			$this->db->where(array('paymenttype'=>3));
			$query = $this->db->get();
			return $query->result_array();
	}
	
	public function getSaleCountByCustomers($param=array())
	{
		$this->db->select('purchases.customerid');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		$this->db->join('products', 'purchases.productid = products.id');
	
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
	
		$this->db->group_by(array("purchases.orangecardid"));
		
		$total = $this->db->count_all_results();
		return $total;
	}
	
	public function getMerchantPurchasesCount($param=array())
	{
		$this->db->select('purchases.merchantid');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id');
		$this->db->join('products', 'purchases.productid = products.id');
	
		// Process any filter options if any
		$this->queryParameters($param);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null));
		
		$this->db->group_by(array("purchases.merchantid"));
		
		$total = $this->db->count_all_results();
		return $total;
	}
	
	function getAllByCard($cardbarcode, $merchantid, $limit_start=0, $limit=50, $createdat=NULL, $updatedat=NULL)
	{
		$this->db->select('purchases.*, merchants.merchantname, products.productname, customers.customercode, purchases.orangecardid, orangecards.cardbarcode');
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id', "left");
		$this->db->join('products', 'purchases.productid = products.id', "left");
		$this->db->join('customers', 'purchases.customerid = customers.id', "left");
		$this->db->join('orangecards', 'purchases.orangecardid = orangecards.id', "left");
	
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
	
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array('purchases.deletedat'=>null, 'orangecards.cardbarcode'=>$cardbarcode, 'purchases.merchantid'=>$merchantid));
		
		$this->db->order_by('purchases.createdat', "desc");
		
		$this->db->limit($limit, $limit_start);
	
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	// Get count of all merchants
	function getAllByCardCount($cardbarcode, $merchantid, $createdat=NULL, $updatedat=NULL)
	{
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id', "left");
		$this->db->join('products', 'purchases.productid = products.id', "left");
		$this->db->join('customers', 'purchases.customerid = customers.id', "left");
		$this->db->join('orangecards', 'purchases.orangecardid = orangecards.id', "left");
	
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
		
		$this->db->where(array('purchases.deletedat'=>null, 'orangecards.cardbarcode'=>$cardbarcode, 'purchases.merchantid'=>$merchantid));
	
		$total = $this->db->count_all_results();
		return $total;
	}
	
	
	function getPurchasesByPharmacy($param=array())
	{
		$this->db->select("COUNT(purchases.id) AS totalpurchases, pharmacies.pharmacyname");
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id', "left");
		$this->db->join('pharmacies', 'merchants.pharmacyid = pharmacies.id', "left");
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Get only deleted at of null
		$this->db->where(array('purchases.deletedat'=>null));
		$this->db->group_by(array("merchants.pharmacyid"));
	
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	function getPurchasesByPharmacyCount($param=array())
	{
		$this->db->select("COUNT(purchases.id) AS totalpurchases, pharmacies.pharmacyname");
		$this->db->from('purchases');
		$this->db->join('merchants', 'purchases.merchantid = merchants.id', "left");
		$this->db->join('pharmacies', 'merchants.pharmacyid = pharmacies.id', "left");
		
		// Process any filter options if any
		$this->queryParameters($param);
		// Get only deleted at of null
		$this->db->where(array('purchases.deletedat'=>null));
		$this->db->group_by(array("merchants.pharmacyid"));
		
		$total = $this->db->count_all_results();
		return $total;
	}
	
	// Get table data by specified field
	function getByField($fieldname, $fieldvalue, $tablename, $fieldlist=null, $createdat=null, $updatedat=null, $limit=NULL, $recordcount=50, 
			$cardbarcode, $customercode, $orderbyfield=null, $d_order='asc')
	{
		$this->db->select('purchases.*, products.productname, customers.customercode, cardbarcode, ');
		$this->db->from("purchases");
		$this->db->join('merchants', 'purchases.merchantid = merchants.id', "left");
		$this->db->join('products', 'purchases.productid = products.id', "left");
		$this->db->join('customers', 'purchases.customerid = customers.id', "left");
		$this->db->join('orangecards', 'purchases.orangecardid = orangecards.id', "left");
		
		$this->db->where($fieldname, $fieldvalue);
	
		if($updatedat != NULL && trim($updatedat) != '')
		{
			$updatedat = date("Y-m-d H:i:s", strtotime($updatedat));
			$this->db->where(array("$tablename.updatedat >" => $updatedat));
		}
	
		if($createdat != NULL && trim($createdat) != '')
		{
			$t_date = explode("-", $createdat);
			$startdate = date("Y-m-d", strtotime($t_date[0]));
			$enddate = date("Y-m-d", strtotime($t_date[1]));
			$this->db->where(array("DATE($tablename.createdat) >="=>$startdate, "DATE($tablename.createdat) <="=>$enddate));
		}
		
		if($customercode != NULL && trim($customercode) != '')
		{
			$this->db->where(array("customers.customercode" => $customercode));
		}
		
		if($cardbarcode != NULL && trim($cardbarcode) != '')
		{
			$this->db->where(array("orangecards.cardbarcode" => $cardbarcode));
		}
	
		// If limit is specified
		if($limit != NULL && trim($limit) != '')
			$this->db->limit($recordcount, $limit);
	
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array("$tablename.deletedat"=>null));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	function getByFieldCount($fieldname, $fieldvalue, $tablename, $fieldlist=null, $createdat=null, $updatedat=null, $limit=NULL, $recordcount=50,
			$cardbarcode, $customercode, $orderbyfield=null, $d_order='asc')
	{
		$this->db->select('purchases.*, products.productname, customers.customercode, cardbarcode, ');
		$this->db->from("purchases");
		$this->db->join('merchants', 'purchases.merchantid = merchants.id', "left");
		$this->db->join('products', 'purchases.productid = products.id', "left");
		$this->db->join('customers', 'purchases.customerid = customers.id', "left");
		$this->db->join('orangecards', 'purchases.orangecardid = orangecards.id', "left");
	
		$this->db->where($fieldname, $fieldvalue);
	
		if($updatedat != NULL && trim($updatedat) != '')
		{
			$updatedat = date("Y-m-d H:i:s", strtotime($updatedat));
			$this->db->where(array("$tablename.updatedat >" => $updatedat));
		}
	
		if($createdat != NULL && trim($createdat) != '')
		{
			/*$createdat = date("Y-m-d H:i:s", strtotime($createdat));
			$this->db->where(array("$tablename.createdat >" => $createdat));*/
			
			$t_date = explode("-", $createdat);
			$startdate = date("Y-m-d", strtotime($t_date[0]));
			$enddate = date("Y-m-d", strtotime($t_date[1]));
			$this->db->where(array("DATE($tablename.createdat) >="=>$startdate, "DATE($tablename.createdat) <="=>$enddate));
		}
	
		if($customercode != NULL && trim($customercode) != '')
		{
			$this->db->where(array("customers.customercode" => $customercode));
		}
	
		if($cardbarcode != NULL && trim($cardbarcode) != '')
		{
			$this->db->where(array("orangecards.cardbarcode" => $cardbarcode));
		}
	
		// If limit is specified
		if($limit != NULL && trim($limit) != '')
			$this->db->limit($recordcount, $limit);
	
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array("$tablename.deletedat"=>null));
		
		$total = $this->db->count_all_results();
		return $total;
	}
	
	function queryPurchases($param=array(), $limit=NULL, $recordcount=50)
	{
		$this->db->select('purchases.*, products.productname, customers.customercode, cardbarcode, ');
		$this->db->from("purchases");
		$this->db->join('merchants', 'purchases.merchantid = merchants.id', "left");
		$this->db->join('products', 'purchases.productid = products.id', "left");
		$this->db->join('customers', 'purchases.customerid = customers.id', "left");
		$this->db->join('orangecards', 'purchases.orangecardid = orangecards.id', "left");
		
		// Process any filter options if any
		$this->queryParameters($param);
		
		// If limit is specified
		if($limit != NULL && trim($limit) != '')
			$this->db->limit($recordcount, $limit);
		
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array("purchases.deletedat"=>null));
		$query = $this->db->get();
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return false;
	}
	
	function queryPurchasesCount($param=array())
	{
		$this->db->select('purchases.*, products.productname, customers.customercode, cardbarcode, ');
		$this->db->from("purchases");
		$this->db->join('merchants', 'purchases.merchantid = merchants.id', "left");
		$this->db->join('products', 'purchases.productid = products.id', "left");
		$this->db->join('customers', 'purchases.customerid = customers.id', "left");
		$this->db->join('orangecards', 'purchases.orangecardid = orangecards.id', "left");
	
		// Process any filter options if any
		$this->queryParameters($param);
	
		// Clause to only fetch data with deletedat field set to null
		$this->db->where(array("purchases.deletedat"=>null));
		
		$total = $this->db->count_all_results();
		return $total;
	}
}

