<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('common');


	}

	public function index()
	{
 	 if(isset($this->session->userdata['adminloggedin']))
	  {
			 if($this->session->userdata['adminloggedin']['role'] == 'admin')
			 {
				redirect('admin/dashboard');
			 }
		}
		 else
		 {

				 $this->load->view('admin/login');


		 }
	  }

	public function login()
	{
		$msg = array();
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$data = array(
			'uname' =>$results->email,
			'pass' => md5($results->password),
		);

		$result = $this->common->getrow('table_admin',$data);
		if ($result == TRUE)
		{
			$session_data = array(
				'id' => $result->id,
				'name' => $result->uname,
				'type' => $result->admin_type,
				'role' =>'admin'
			);
			$this->session->set_userdata('adminloggedin', $session_data);
      $msg['message']="1";
		}
		else
		{
			$msg['message'] = "2";
		}

		echo json_encode($msg);

		}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin');
	}

	public function dashboard()
	{
		$data['user'] = $this->common->count_all_table('user');
		$data['job'] = $this->common->count_all_table('user_job');
		$data['hired'] = $this->common->count_all_table('user_joboffer');
		$data['contact'] = $this->common->count_all_table('contact');
		$data['industry'] = $this->common->count_all_table('practice_areas');
		$data['services'] = $this->common->count_all_table('services');
		$data['suggestion'] = $this->common->count_all_results('user_log',array("logType"=>"suggestion"));
		$data['members'] = $this->common->getlatestmembers(8);
		$reviewlatest = $this->common->getlatestreview(array("reviewType"=>'review'));
		if($reviewlatest)
		{
			foreach($reviewlatest as $key=>$re)
			{
				if($re->contractId)
				{
				$star = $this->common->getrow('user_review',array("contractId"=>$re->contractId,"reviewType"=>"overall"));
				}
				else
				{
					$star = $this->common->getrow('user_review',array("linkedInId"=>$re->linkedInId,"reviewType"=>"overall"));

				}
				if($star->reviewOverall)
				{
				$reviewlatest[$key]->star = $star->reviewOverall / 2;
			  }
				else
				{
					$reviewlatest[$key]->star = '';
				}
			}
		}
		$data['reviewlatest'] = $reviewlatest;


		$this->load->view('admin/header');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer');
	}

	public function allfreelancer()
	{
    $this->load->view('admin/header');
		$this->load->view('admin/allfreelancer');
		$this->load->view('admin/footer');
	}

	public function getfreelancer()
	{
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;
		 $search = $results->searchtext;

		 $config = array();
		if(!empty($page))
		{
			if($search == '')
		  {
      $data['pcount'] = $this->common->count_freelancer();
			$config["total_rows"] = $this->common->count_freelancer();
		  }
			else
			{
				$data['pcount'] = $this->common->count_like('user_meta','name',$search);
				$config["total_rows"] = $this->common->count_like('user_meta','name',$search);
			}
		}

		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			if($search == '')
			{
			$freelancer = $this->common->getfreelancerUsers($start,$config["per_page"]);
		  }
			else
			{
				$freelancer = $this->common->getfreelancerUsersSearch('name',$search,$start,$config["per_page"]);
			}
		}


		if(!empty($freelancer))
		{
			foreach($freelancer as $key=>$f)
			{
				if($f->parent != 0)
				{
				  $p = $this->common->getrow('user_meta',array("u_id"=>$f->parent));
					if(!empty($p))
					{
						$freelancer[$key]->usertype = $p->c_name;
					}

				}
				else
				{
					if($f->type == 2)
					{
						$c = $this->common->getrow('user_meta',array("u_id"=>$f->u_id));
						 if(!empty($c))
						 {
						$freelancer[$key]->usertype = $c->c_name;
					   }
          }
					else if($f->type == 3)
					{
						$freelancer[$key]->usertype = "Freelancer";
					}
         }

			  }
		 }

		if($freelancer)
		{
			$data['message'] ="true";
			$data['result'] = $freelancer;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
		exit;
	}

	public function allclient()
	{

		$this->load->view('admin/header');
		$this->load->view('admin/allclient');
		$this->load->view('admin/footer');
	}

	public function getclient()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$search = $results->searchtext;
		$config = array();

		if(!empty($page))
		{
			if($search == '')
			{
      $data['pcount'] = $this->common->count_all_results('user',array("type"=>'4'));
			$config["total_rows"] = $this->common->count_all_results('user',array("type"=>'4'));
		  }
			else
			{
			 $data['pcount'] = $this->common->count_client('user',array("type"=>'4'),$search);
			 $config["total_rows"] = $this->common->count_client('user',array("type"=>'4'),$search);
			}
		}

		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			if($search == '')
			{
			$client = $this->common->getUsers(array("us.type"=>'4'),$start,$config["per_page"]);
		  }
			else
			{
				$client = $this->common->getUsersSearch(array("us.type"=>'4'),$search,$start,$config["per_page"]);
			}
		}

		if($client)
		{
			$data['message'] ="true";
			$data['result'] = $client;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
	}

	public function allUserStatus()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$status = $results->status;
		$userId = $results->userId;


		if(isset($userId) && isset($status))
		{
			$update = $this->common->update(array('id'=>$userId),array("is_active"=>$status),'user');

			 if($update)
			 {
				 $msg['message'] = "true";
			 }
		}
		else
		{
		$msg['message'] = "false";
		}
		echo json_encode($msg);
		exit;

	}

	public function clientjobs($id)
	{
    $data['jobclientId'] = $id;
		$this->load->view('admin/header');
		$this->load->view('admin/clientjobs',$data);
		$this->load->view('admin/footer');
	}

	public function getclientjob()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$userId = $results->userId;
		if(!empty($page))
		{

			$data['pcount'] = $this->common->count_all_results('user_joboffer',array("offFrom"=>$userId));
			$config["total_rows"] = $this->common->count_all_results('user_joboffer',array("offFrom"=>$userId));
		}

		$config = array();
		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
		$jobs = $this->common->getjobs(array("offFrom"=>$userId),$start,$config["per_page"]);
		}

		if(!empty($jobs))
		{
			foreach($jobs as $key=>$job)
			{
        $jobs[$key]->jobDescription = strip_tags($job->jobDescription);
			}
		}

		if($jobs)
		{
			$data['message'] ="true";
			$data['result'] = $jobs;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
	}

	public function userprofile()
	{
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $userId = $results->userId;

		 if(isset($userId))
		 {
			$result = $this->common->getSingleUser(array("us.id"=>$userId));
			if($result->countryCode)
			{
			$c = explode(":",$result->countryCode);
			$result->countryCode = $c[1];
		  }
			else
			{
			  $result->countryCode = '';
			}

			 if($result)
			 {
				 $msg['message'] = "true";
				 $msg['result'] = $result;
			 }
		}
		else
		{
		$msg['message'] = "false";
		$msg['result'] = '';
		}
		echo json_encode($msg);
		exit;
	}

	public function freelancerjobs($id)
	{
    $data['jobfreelancerId'] = $id;
		$this->load->view('admin/header');
		$this->load->view('admin/freelancerjobs',$data);
		$this->load->view('admin/footer');
	}

	public function getfreelancerjob()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$userId = $results->userId;

		if(!empty($page))
		{

			$data['pcount'] = $this->common->count_all_results('user_jobcontract',array("freelancerId"=>$userId));
			$config["total_rows"] = $this->common->count_all_results('user_jobcontract',array("freelancerId"=>$userId));
		}

		$config = array();
		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
		$jobs = $this->common->getfreelancerJobs(array("jc.freelancerId"=>$userId),$start,$config["per_page"]);
		}

		if($jobs)
		{
			$data['message'] ="true";
			$data['result'] = $jobs;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
	}

	public function industries()
	{
		$t['title'] ="List and Add New Industries";
		$this->load->view('admin/header',$t);
		$this->load->view('admin/allindustries');
		$this->load->view('admin/footer');
	}

	public function getindustry()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$search = $results->search;

		if(!empty($search))
		{
			$data['pcount'] = $this->common->count_like('practice_areas','name',$search);
			$config["total_rows"] = $this->common->count_like('practice_areas','name',$search);
		}
   else
		{
      $data['pcount'] = $this->common->count_all_table('practice_areas');
			$config["total_rows"] = $this->common->count_all_table('practice_areas');
		}

		$config = array();
		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($search))
		{
			$industry = $this->common->getbypaginationlike('practice_areas','name',$search,$start,$config["per_page"]);

		}
		else
		{
			$industry = $this->common->getbypagination('practice_areas',$start,$config["per_page"]);
		}

		if($industry)
		{
			$data['message'] ="true";
			$data['result'] = $industry;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
	}

	public function deleteindustries()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	 $this->db->where('id',$results->id);
	 $query = $this->db->delete('practice_areas');
	 if($query)
	 {
		 $this->db->where('industryId',$results->id);
		 $query1 = $this->db->delete('practice_service_link');
	 }

	 if($query1)
	 {
		 $msg['message'] = "true";
	 }
	 else
	 {
		 $msg['message'] = "false";
	 }
		 echo json_encode($msg);
		 exit;
 }

 public function saveindustry()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	 $check=$this->common->checkexist('practice_areas',array('name' =>$results->name));

	 if($check != 0)
	 {
		 $msg1['success'] ='2';
		 $msg1['message'] ='industry is Already register';
		 echo json_encode($msg1);
		 exit;
	 }
	 else
	 {
		 $st['name'] = $results->name;
		 $st['status'] = $results->status;
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d H:i:s');
		 $st['date_created'] = $date;
     $user = $this->common->insert('practice_areas',$st);

		 }

		 if ($user)
		 {
			 $msg1['success'] ='1';
			 $msg1['message'] ='industry Successfully insert';

		 }
		 else
		 {
			 $msg1['success'] ='0';
			 $msg1['message'] ='industry is not insert';

		 }

		 echo json_encode($msg1);
		 exit;

 }

///services

public function services()
{
	$t['title'] ="Add New Skills and Services";
	$this->load->view('admin/header',$t);
	$this->load->view('admin/allservices');
	$this->load->view('admin/footer');
}

public function getservices()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$page = $results->page;
  $search = $results->search;

	if(!empty($search))
	{
		$data['pcount'] = $this->common->count_like('services','name',$search);
		 $config["total_rows"] = $this->common->count_like('services','name',$search);
	}
	else
	{
		$data['pcount'] = $this->common->count_all_table('services');
		$config["total_rows"] = $this->common->count_all_table('services');
	}

	$config = array();
	$config["per_page"] = 10;
	$this->pagination->initialize($config);

	if( $page <= 0 )
	{
		$page = 1;
	}

	$start = ($page-1) * $config["per_page"];

	if(!empty($search))
	{
		$services = $this->common->getbypaginationlike('services','name',$search,$start,$config["per_page"]);
	}
	else
	{
		$services = $this->common->getbypagination('services',$start,$config["per_page"]);

	}

	if($services)
	{
		$data['message'] ="true";
		$data['result'] = $services;
	}
	else
	{
		$data['message'] ="false";
		$data['result'] = '';
	}

	echo json_encode($data);
	exit;
}

public function deleteservices()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $this->db->where('id',$results->id);
 $query = $this->db->delete('services');

 if($query)
 {
	 $msg['message'] = "true";
 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
}

public function saveservices()
{
  $array = file_get_contents('php://input');
  $results =json_decode($array);

	 $ser = $results->name;
	 // print_r($name);
	 // die;
	 // $ser = explode(",",$results->name);
	 foreach($ser as $s)
	 {
       $st['name'] = $s;
			 $st['status'] = $results->status;
	     $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	     $date =  $nowUtc->format('Y-m-d H:i:s');
	     $st['date_created'] = $date;
			 $check=$this->common->getrow('services',array('name' =>$s));

			 if(empty($check))
			 {
		     $user = $this->common->insert('services',$st);
			 }

		 }


	 if ($user)
	 {
		 $msg1['success'] ='1';
		 $msg1['message'] ='services Successfully insert';

	 }
	 else
	 {
		 $msg1['success'] ='0';
		 $msg1['message'] ='services is not insert';

	 }

	 echo json_encode($msg1);
	 exit;

}

public function editservices()
{
	$array = file_get_contents('php://input');
  $results =json_decode($array);

   if(!empty($results->id))
	 {
     $result = $this->common->getrow('services',array("id"=>$results->id));
   }

  if($result)
  {
 	 $msg['message'] = "true";
	 $msg['result'] = $result;
  }
  else
  {
 	 $msg['message'] = "false";
  }
 	 echo json_encode($msg);

}

public function updateservices()
{
	$array = file_get_contents('php://input');
  $results =json_decode($array);

 $update = $this->common->update(array('id'=>$results->id),array("name"=>$results->name,"status"=>$results->status),'services');

  $log = $this->common->getrow('user_log',array("logReference"=>$results->id,"logSubType"=>'service'));

   if(!empty($log))
   {
   $logupdate = $this->common->update(array('logReference'=>$results->id,"logSubType"=>'service'),array("logStatus"=>$results->status),'user_log');
   }

  	if($update)
		{
		$msg['message'] ="true";
		}
		else
		{
		$msg['message'] ="false";
		}
		echo json_encode($msg);
		exit;

		}

 public function allindustries()
 {

	$result = $this->common->getTable('practice_areas');

	 if($result)
	 {
		$msg['message'] ='true';
		$msg['result'] = $result;
	 }
	 else
	 {
	  $msg['message'] ="false";
		$msg['result'] ='';
	 }
	 echo json_encode($msg);

 }

 public function allservices()
 {

 $result = $this->common->get('services',array("status"=>1));

	if($result)
	{
	 $msg['message'] ='true';
	 $msg['result'] = $result;
	}
	else
	{
	 $msg['message'] ="false";
	 $msg['result'] ='';
	}
	echo json_encode($msg);

 }

 public function getlinkedservice()
 {
	 $array = file_get_contents('php://input');
		$results =json_decode($array);
     if($results->id)
		 {
	    $result = $this->common->getserviceIndustry(array("li.industryId"=>$results->id));
			$services = $this->common->linkedIndustryServices($results->id);
	   }
	 	if($result || $services)
	 	{
	 	 $msg['message'] ='true';
	 	 $msg['result'] = $result;
		 $msg['services'] =$services;
	 	}
	 	else
	 	{
	 	 $msg['message'] ="false";
	 	 $msg['result'] = array();
	 	}
	 	echo json_encode($msg);

 }

 public function editindustry()
 {
	 $array = file_get_contents('php://input');
		$results =json_decode($array);
     if($results->id)
		 {
	     $result = $this->common->getrow('practice_areas',array("id"=>$results->id));
	   }
	 	if($result)
	 	{
	 	 $msg['message'] ='true';
	 	 $msg['result'] = $result;
	 	}
	 	else
	 	{
	 	 $msg['message'] ="false";
	 	 $msg['result'] = array();
	 	}
	 	echo json_encode($msg);

 }

 public function savelinkedIndustry()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);
	 $industryId = $results->industryId;
    $ser = $results->services;
	 $this->db->where('industryId',$industryId);
	 $query = $this->db->delete('practice_service_link');

	 if(!empty($results->services))
	 {
		 foreach($ser as $s)
		 {
			 $st['serviceId'] = $s->id;
			 $st['industryId'] = $industryId;

			 $result = $this->common->insert('practice_service_link',$st);
		 }
	 }

	 if($result)
	 {
		 $msg['message'] ="true";

	 }
	 else
	 {
		 $msg['message'] ="false";
	 }

	 echo json_encode($msg);
 }

 public function updateIndustry()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);


	 if(!empty($results->id && $results->name))
	 {
			 $result = $this->common->update(array("id"=>$results->id),array("name"=>$results->name,"status"=>$results->status),'practice_areas');
		}

		$log = $this->common->getrow('user_log',array("logReference"=>$results->id,"logSubType"=>'industry'));

	   if(!empty($log))
	   {
	   $logupdate = $this->common->update(array("logReference"=>$results->id,"logSubType"=>'industry'),array("logStatus"=>$results->status),'user_log');
	   }

	 if($result)
	 {
		 $msg['message'] ="true";
	 }
	 else
	 {
		 $msg['message'] ="false";
	 }
	 echo json_encode($msg);
	 exit;
 }

 public function ranking_content()
 {
	 $this->load->view('admin/header');
	 $this->load->view('admin/ranking_contentListing');
	 $this->load->view('admin/footer');

 }

 public function ranking_content_add()
 {
	 $this->load->view('admin/header');
	 $this->load->view('admin/ranking_content');
	 $this->load->view('admin/footer');

 }

	public function allcountry()
	{
		$result = $this->common->getTable('countries');
		if($result)
		{
			$msg['message'] ="true";
			$msg['result'] = $result;
		}
		else
		{
      $msg['message'] ="false";
		}
		echo json_encode($msg);
		exit;
	}

	public function rankingContentSave()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->insert('ranking_content',$results);
		if($result)
		{
			$msg['message'] ="true";
		}
		else
		{
		  $msg['message'] ="false";
		}
		echo json_encode($msg);
		exit;
	}

	public function Hire_ranking_content()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/hire_ranking_content');
		$this->load->view('admin/footer');

	}

	public function getHireRankingContent()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		if(!empty($page))
		{

			$data['pcount'] = $this->common->count_all_table('hire_ranking_content');
			$config["total_rows"] = $this->common->count_all_table('hire_ranking_content');
		}

		$config = array();
		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$content = $this->common->getHireContent($start,$config["per_page"]);
		}

		if($content)
		{
			$data['message'] ="true";
			$data['result'] = $content;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
		exit;
	}

	public function HireRankingContentSave()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$service = $this->common->getrow('hire_ranking_content',array("servicesId"=>$results->servicesId));
		if(!empty($service))
		{
			$msg['message'] ="2";
		}
     else
		{
			$res = $this->common->insert('hire_ranking_content',$results);

			if($res)
			{
				$msg['message']="1";
			}
			else{
				$msg['message'] ="0";
			}
		}

	  echo json_encode($msg);
		exit;
	}

	public function deleteHireContent()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	 $this->db->where('id',$results->id);
	 $query = $this->db->delete('hire_ranking_content');

	 if($query)
	 {
		 $msg['message'] = "true";
	 }
	 else
	 {
		 $msg['message'] = "false";
	 }
		 echo json_encode($msg);
 }

 public function EditHireRankingContent()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	 $res = $this->common->getrow('hire_ranking_content',array("id"=>$results->id));

	 if($res)
	 {
		 $msg['message'] = "true";
		 $msg['result'] = $res;

	 }
	 else
	 {
		 $msg['message'] = "false";
	 }
		 echo json_encode($msg);
		 exit;
 }

 public function HireRankingContentUpdate()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	$res = $this->common->update(array("id"=>$results->id),$results,'hire_ranking_content');

	if($res)
	{
	 $msg['message'] ="true";
	}
	else
	{
		$msg['message'] ="false";
	}
	echo json_encode($msg);
	exit;
 }

 public function getrankingContent()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);
	 $page = $results->page;

	 if(!empty($page))
	 {

		 $data['pcount'] = $this->common->count_all_table('ranking_content');
		 $config["total_rows"] = $this->common->count_all_table('ranking_content');
	 }

	 $config = array();
	 $config["per_page"] = 10;
	 $this->pagination->initialize($config);

	 if( $page <= 0 )
	 {
		 $page = 1;
	 }

	 $start = ($page-1) * $config["per_page"];

	 if(!empty($page))
	 {
		 $content = $this->common->getbypagination('ranking_content',$start,$config["per_page"]);
	 }

	 foreach($content as $key=>$co)
	 {
		   if(!empty($co->servicesId))
		   {
			  $ser = $this->common->getrow('services',array("id"=>$co->servicesId));
				$content[$key]->service = $ser->name;
		   }

			 if(!empty($co->industryId))
			 {
				 $ind = $this->common->getrow('practice_areas',array("id"=>$co->industryId));
				 $content[$key]->industry = $ind->name;
			 }

			 if(!empty($co->countryId))
			 {
			   $co = $this->common->getrow('countries',array("id"=>$co->countryId));
				 $content[$key]->country = $co->name;
			 }

			 if(!empty($co->stateId))
			 {
			   $st = $this->common->getrow('states',array("id"=>$co->stateId));
				 $content[$key]->state = $st->name;
			 }
			 else{
				 $content[$key]->state ='';
			 }

			 if(!empty($co->cityId))
			 {
			   $ci = $this->common->getrow('cities',array("id"=>$co->cityId));
				 $content[$key]->city = $ci->name;
			 }
			 else
			 {
				 $content[$key]->city ='';

			 }

	 }

	 if($content)
	 {
		 $data['message'] ="true";
		 $data['result'] = $content;
	 }
	 else
	 {
		 $data['message'] ="false";
		 $data['result'] = '';
	 }

	 echo json_encode($data);
	 exit;
 }

 public function rankingContentdelete()
 {
	 $array = file_get_contents('php://input');
	$results =json_decode($array);

	$this->db->where('id',$results->id);
	$query = $this->db->delete('ranking_content');

	if($query)
	{
		$msg['message'] = "true";
	}
	else
	{
		$msg['message'] = "false";
	}
		echo json_encode($msg);
		exit;
 }

 public function EditRankingContent()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);
	 $state = array();
	 $city = array();

	 $res = $this->common->getrow('ranking_content',array("id"=>$results->id));
	 $state = $this->common->get('states',array("id"=>$res->stateId));
	 $city = $this->common->get('cities',array("id"=>$res->cityId));

	 if($res)
	 {
		 $msg['message'] = "true";
		 $msg['result'] = $res;
		 $msg['state'] = $state;
		 $msg['city'] = $city;

	 }
	 else
	 {
		 $msg['message'] = "false";
	 }
		 echo json_encode($msg);
		 exit;
 }

 public function RankingContentUpdate()
 {
	$array = file_get_contents('php://input');
	$results =json_decode($array);

 $res = $this->common->update(array("id"=>$results->id),$results,'ranking_content');

 if($res)
 {
	$msg['message'] ="true";
 }
 else
 {
	 $msg['message'] ="false";
 }
 echo json_encode($msg);
 exit;
 }



 // =========top industry section

 public function top_industry()
 {
	 $this->load->view('admin/header');
	 $this->load->view('admin/top_industry');
	 $this->load->view('admin/footer');
}

 public function getTopIndustry()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$page = $results->page;
	if(!empty($page))
	{
    $data['pcount'] = $this->common->count_all_table('top_industry');
		$config["total_rows"] = $this->common->count_all_table('top_industry');
	}

	$config = array();
	$config["per_page"] = 10;
	$this->pagination->initialize($config);

	if( $page <= 0 )
	{
		$page = 1;
	}

	$start = ($page-1) * $config["per_page"];

	if(!empty($page))
	{
		$industry = $this->common->getbypagination('top_industry',$start,$config["per_page"]);
	}

	if($industry)
	{
		$data['message'] ="true";
		$data['result'] = $industry;
	}
	else
	{
		$data['message'] ="false";
		$data['result'] = '';
	}

	echo json_encode($data);
	exit;
}

public function TopIndustrySave()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);

		$res = $this->common->insert('top_industry',$results);

		if($res)
		{
			$msg['message']="1";
		}
		else{
			$msg['message'] ="0";
		}


	echo json_encode($msg);
	exit;
}

public function deleteTopIndustry()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $this->db->where('id',$results->id);
 $query = $this->db->delete('top_industry');

 if($query)
 {
	 $msg['message'] = "true";
 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
}

public function EditTopIndustry()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $res = $this->common->getrow('top_industry',array("id"=>$results->id));

 if($res)
 {
	 $msg['message'] = "true";
	 $msg['result'] = $res;

 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
	 exit;
}

public function UpdateTopIndustry()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);
 if(empty($results->icon))
 {
	 unset($results->icon);
 }

 if(empty($results->image))
 {
	 unset($results->image);
 }
$res = $this->common->update(array("id"=>$results->id),$results,'top_industry');

if($res)
{
 $msg['message'] ="true";
}
else
{
	$msg['message'] ="false";
}
echo json_encode($msg);
exit;
}

// upload top industry images
public function topindustryImage()
{
	$array = file_get_contents('php://input');
 $results =json_decode($array);
 $data = $results->image;

 list($type, $data) = explode(';', $data);
 list(, $data)      = explode(',', $data);

 $data1 = base64_decode($data);

 $f = finfo_open();

 $mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);


 if($mime_type =="image/png")
 {
	 echo $image = uniqid().'image.png';
	 $image = file_put_contents('assets/top_industry/'.$image,$data1);
 }
 else if($mime_type =="image/jpeg")
 {
	 echo $image=uniqid().'image.jpeg';
	 $result=file_put_contents('assets/top_industry/'.$image,$data1);
 }
 else if($mime_type =="application/pdf")
 {
	 echo $image = uniqid().'image.pdf';
	 $result=file_put_contents('assets/top_industry/'.$image,$data1);
 }
 exit;
}

/////////// currency


 public function currency()
 {
	 $this->load->view('admin/header');
	 $this->load->view('admin/currency');
	 $this->load->view('admin/footer');
}

 public function getcurrency()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$page = $results->page;
	if(!empty($page))
	{
    $data['pcount'] = $this->common->count_all_table('currency');
		$config["total_rows"] = $this->common->count_all_table('currency');
	}

	$config = array();
	$config["per_page"] = 10;
	$this->pagination->initialize($config);

	if( $page <= 0 )
	{
		$page = 1;
	}

	$start = ($page-1) * $config["per_page"];

	if(!empty($page))
	{
		$currency = $this->common->getcurrency('currency',$start,$config["per_page"]);
	}

	if($currency)
	{
		$data['message'] ="true";
		$data['result'] = $currency;
	}
	else
	{
		$data['message'] ="false";
		$data['result'] = '';
	}

	echo json_encode($data);
	exit;
}

public function currencySave()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);

		$res = $this->common->insert('currency',$results);

		if($res)
		{
			$msg['message']="1";
		}
		else{
			$msg['message'] ="0";
		}


	echo json_encode($msg);
	exit;
}

public function currencyDelete()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);
$query = $this->common->delete('currency',array("id"=>$results->id));

 if($query)
 {
	 $msg['message'] = "true";
 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
}

public function currencyEdit()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $res = $this->common->getrow('currency',array("currencyId"=>$results->id));

 if($res)
 {
	 $msg['message'] = "true";
	 $msg['result'] = $res;

 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
	 exit;
}

public function currencyUpdate()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

$res = $this->common->update(array("currencyId"=>$results->currencyId),$results,'currency');

if($res)
{
 $msg['message'] ="true";
}
else
{
	$msg['message'] ="false";
}
echo json_encode($msg);
exit;
}


///////////////// currency


////////////////blog

 public function blog()
 {
	 $this->load->view('admin/header');
	 $this->load->view('admin/allblog');
	 $this->load->view('admin/footer');
}

 public function getblog()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$page = $results->page;
	if(!empty($page))
	{
    $data['pcount'] = $this->common->count_all_table('blog');
		$config["total_rows"] = $this->common->count_all_table('blog');
	}

	$config = array();
	$config["per_page"] = 10;
	$this->pagination->initialize($config);

	if( $page <= 0 )
	{
		$page = 1;
	}

	$start = ($page-1) * $config["per_page"];

	if(!empty($page))
	{
		$blog = $this->common->getadminblog('blog',$start,$config["per_page"]);
	}

	if(!empty($blog))
	{
		foreach($blog as $key=>$b)
		{
			$cat = $this->common->getrow('category',array("categoryId"=>$b->categoryId));
			$blog[$key]->category = $cat->category;
		}
	}

	if($blog)
	{
		$data['message'] ="true";
		$data['result'] = $blog;
	}
	else
	{
		$data['message'] ="false";
		$data['result'] = '';
	}

	echo json_encode($data);
	exit;
}

public function blogSave()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	$date =  $nowUtc->format('Y-m-d H:i:s');
	$results->date = $date;
	$tags = $results->tags;
  unset($results->tags);
	$res = $this->common->insert('blog',$results);

		if($tags)
		{
			foreach($tags as $t)
			{
					$st['tag'] = $t;
					$st['blogId'] = $res[1];

				$this->common->insert('blog_tags',$st);
			}
		}

		if($res)
		{
			$msg['message']="true";
		}
		else
		{
			$msg['message'] ="false";
		}
    echo json_encode($msg);
	  exit;
 }

public function blogDelete()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $this->db->where('blogId',$results->id);
 $query = $this->db->delete('blog');

 if($query)
 {
	 $msg['message'] = "true";
 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
}

public function blogEdit()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $res = $this->common->getrow('blog',array("blogId"=>$results->id));
 $res->tags = $this->common->get('blog_tags',array("blogId"=>$results->id));

 if($res)
 {
	 $msg['message'] = "true";
	 $msg['result'] = $res;

 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
	 exit;
}

public function blogUpdate()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 if(empty($results->image))
 {
	 unset($results->image);
 }
 $tags = $results->tags;
 unset($results->tags);


$res = $this->common->update(array("blogId"=>$results->blogId),$results,'blog');
if(!empty($tags))
{
	$this->db->where('blogId',$results->blogId);
  $query = $this->db->delete('blog_tags');

	foreach($tags as $key=>$t)
	{
			$st['tag'] = $tags[$key];
			$st['blogId'] = $results->blogId;

		$this->common->insert('blog_tags',$st);
	}
}


if($res)
{
 $msg['message'] ="true";
}
else
{
	$msg['message'] ="false";
}
echo json_encode($msg);
exit;
}

public function blogStatus()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	$res = $this->common->update(array("blogId"=>$results->id),array("status"=>$results->status),'blog');
	if($res)
	{
	$msg['message'] ="true";
	}
	else
	{
	$msg['message'] ="false";
	}
	echo json_encode($msg);
	exit;

}

public function blogImage()
{
	$array = file_get_contents('php://input');
 $results =json_decode($array);
 $data = $results->image;

 list($type, $data) = explode(';', $data);
 list(, $data)      = explode(',', $data);

 $data1 = base64_decode($data);

 $f = finfo_open();

 $mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);


 if($mime_type =="image/png")
 {
	 echo $image = uniqid().'image.png';
	 $image = file_put_contents('assets/blog/'.$image,$data1);
 }
 else if($mime_type =="image/jpeg")
 {
	 echo $image=uniqid().'image.jpeg';
	 $result=file_put_contents('assets/blog/'.$image,$data1);
 }
 else if($mime_type =="application/pdf")
 {
	 echo $image = uniqid().'image.pdf';
	 $result=file_put_contents('assets/blog/'.$image,$data1);
 }
 exit;
}

///////////////blog

  // categories

	public function category()
	{
	 $this->load->view('admin/header');
	 $this->load->view('admin/category');
	 $this->load->view('admin/footer');
 }

	public function getcategory()
 {
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$page = $results->page;
	if(!empty($page))
	{
		 $data['pcount'] = $this->common->count_all_table('category');
		$config["total_rows"] = $this->common->count_all_table('category');
	}

	$config = array();
	$config["per_page"] = 10;
	$this->pagination->initialize($config);

	if( $page <= 0 )
	{
		$page = 1;
	}

	$start = ($page-1) * $config["per_page"];

	if(!empty($page))
	{
		$category = $this->common->getbypagination('category',$start,$config["per_page"]);
	}



	if($category)
	{
		$data['message'] ="true";
		$data['result'] = $category;
	}
	else
	{
		$data['message'] ="false";
		$data['result'] = '';
	}

	echo json_encode($data);
	exit;
 }

 public function categorySave()
 {
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	 $check = $this->common->getrow('category',array("category"=>$results->category));
    if(!empty($check))
		{
			$msg['message'] ="2";
		}
		else
		{
			$res = $this->common->insert('category',$results);

		if($res)
		{
			$msg['message']="1";
		}
		else{
			$msg['message'] ="0";
		}
   }

	echo json_encode($msg);
	exit;
 }

 public function categoryDelete()
 {
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	$this->db->where('categoryId',$results->id);
	$query = $this->db->delete('category');

	if($query)
	{
	 $msg['message'] = "true";
	}
	else
	{
	 $msg['message'] = "false";
	}
	 echo json_encode($msg);
 }

 public function categoryEdit()
 {
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	$res = $this->common->getrow('category',array("categoryId"=>$results->id));

	if($res)
	{
	 $msg['message'] = "true";
	 $msg['result'] = $res;

	}
	else
	{
	 $msg['message'] = "false";
	}
	 echo json_encode($msg);
	 exit;
 }

 public function categoryUpdate()
 {
	$array = file_get_contents('php://input');
	$results =json_decode($array);

 $res = $this->common->update(array("categoryId"=>$results->categoryId),$results,'category');

 if($res)
 {
	$msg['message'] ="true";
 }
 else
 {
	$msg['message'] ="false";
 }
 echo json_encode($msg);
 exit;
 }

  public function allcategory()
	{
		$category = $this->common->getTable('category');
		if($category)
		{
		 $msg['message'] ="true";
		 $msg['result'] =$category;
		}
		else
		{
			$msg['message'] ="true";
			$msg['result'] =$category;
		}
		echo json_encode($msg);
		exit;
	}
// categoires


////////////////testimonial

 public function testimonial()
 {
	 $this->load->view('admin/header');
	 $this->load->view('admin/alltestimonial');
	 $this->load->view('admin/footer');
}

 public function gettestimonial()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$page = $results->page;
	if(!empty($page))
	{
    $data['pcount'] = $this->common->count_all_table('testimonial');
		$config["total_rows"] = $this->common->count_all_table('testimonial');
	}

	$config = array();
	$config["per_page"] = 10;
	$this->pagination->initialize($config);

	if( $page <= 0 )
	{
		$page = 1;
	}

	$start = ($page-1) * $config["per_page"];

	if(!empty($page))
	{
		$testimonial = $this->common->getbypagination('testimonial',$start,$config["per_page"]);
	}


	if($testimonial)
	{
		$data['message'] ="true";
		$data['result'] = $testimonial;
	}
	else
	{
		$data['message'] ="false";
		$data['result'] = '';
	}

	echo json_encode($data);
	exit;
}

public function testimonialSave()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);


		$res = $this->common->insert('testimonial',$results);

		if($res)
		{
			$msg['message']="true";
		}
		else
		{
			$msg['message'] ="false";
		}
    echo json_encode($msg);
	  exit;
 }

public function testimonialDelete()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $this->db->where('testimonialId',$results->id);
 $query = $this->db->delete('testimonial');

 if($query)
 {
	 $msg['message'] = "true";
 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
}

public function testimonialEdit()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $res = $this->common->getrow('testimonial',array("testimonialId"=>$results->id));


 if($res)
 {
	 $msg['message'] = "true";
	 $msg['result'] = $res;

 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
	 exit;
}

public function testimonialUpdate()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 if(empty($results->image))
 {
	 unset($results->image);
 }


$res = $this->common->update(array("testimonialId"=>$results->testimonialId),$results,'testimonial');


if($res)
{
 $msg['message'] ="true";
}
else
{
	$msg['message'] ="false";
}
echo json_encode($msg);
exit;
}

public function testimonialImage()
{
	$array = file_get_contents('php://input');
 $results =json_decode($array);
 $data = $results->image;

 list($type, $data) = explode(';', $data);
 list(, $data)      = explode(',', $data);

 $data1 = base64_decode($data);

 $f = finfo_open();

 $mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);


 if($mime_type =="image/png")
 {
	 echo $image = uniqid().'image.png';
	 $image = file_put_contents('assets/testimonial/'.$image,$data1);
 }
 else if($mime_type =="image/jpeg")
 {
	 echo $image=uniqid().'image.jpeg';
	 $result=file_put_contents('assets/testimonial/'.$image,$data1);
 }
 else if($mime_type =="application/pdf")
 {
	 echo $image = uniqid().'image.pdf';
	 $result=file_put_contents('assets/testimonial/'.$image,$data1);
 }
 exit;
}

///////////////Testimonial


// how it works
public function how_itworks()
{
	$this->load->view('admin/header');
	$this->load->view('admin/howitworks');
	$this->load->view('admin/footer');
}

public function getworks()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);
 $page = $results->page;
 if(!empty($page))
 {
	 $data['pcount'] = $this->common->count_all_table('works');
	 $config["total_rows"] = $this->common->count_all_table('works');
 }

 $config = array();
 $config["per_page"] = 10;
 $this->pagination->initialize($config);

 if( $page <= 0 )
 {
	 $page = 1;
 }

 $start = ($page-1) * $config["per_page"];

 if(!empty($page))
 {
	 $works = $this->common->getbypagination('works',$start,$config["per_page"]);
 }


 if($works)
 {
	 $data['message'] ="true";
	 $data['result'] = $works;
 }
 else
 {
	 $data['message'] ="false";
	 $data['result'] = '';
 }

 echo json_encode($data);
 exit;
}

public function worksSave()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);


	 $res = $this->common->insert('works',$results);

	 if($res)
	 {
		 $msg['message']="true";
	 }
	 else
	 {
		 $msg['message'] ="false";
	 }
	 echo json_encode($msg);
	 exit;
}

public function worksDelete()
{
$array = file_get_contents('php://input');
$results =json_decode($array);

$this->db->where('id',$results->id);
$query = $this->db->delete('works');

if($query)
{
	$msg['message'] = "true";
}
else
{
	$msg['message'] = "false";
}
	echo json_encode($msg);
}

public function worksEdit()
{
$array = file_get_contents('php://input');
$results =json_decode($array);

$res = $this->common->getrow('works',array("id"=>$results->id));

if($res)
{
	$msg['message'] = "true";
	$msg['result'] = $res;
}
else
{
	$msg['message'] = "false";
}
	echo json_encode($msg);
	exit;
}

public function worksUpdate()
{
$array = file_get_contents('php://input');
$results =json_decode($array);

if(empty($results->image))
{
	unset($results->image);
}


$res = $this->common->update(array("id"=>$results->id),$results,'works');


if($res)
{
$msg['message'] ="true";
}
else
{
 $msg['message'] ="false";
}
echo json_encode($msg);
exit;
}

public function worksImage()
{
 $array = file_get_contents('php://input');
$results =json_decode($array);
$data = $results->image;

list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);

$data1 = base64_decode($data);

$f = finfo_open();

$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);


if($mime_type =="image/png")
{
	echo $image = uniqid().'image.png';
	$image = file_put_contents('assets/howitworks/'.$image,$data1);
}
else if($mime_type =="image/jpeg")
{
	echo $image=uniqid().'image.jpeg';
	$result=file_put_contents('assets/howitworks/'.$image,$data1);
}
else if($mime_type =="application/pdf")
{
	echo $image = uniqid().'image.pdf';
	$result=file_put_contents('assets/howitworks/'.$image,$data1);
}
exit;
}

// how it works

// questionType

public function questionType()
{
	$this->load->view('admin/header');
	$this->load->view('admin/questionType');
	$this->load->view('admin/footer');
}

public function getquestionType()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);
 $page = $results->page;
 if(!empty($page))
 {
	 $data['pcount'] = $this->common->count_all_table('questiontype');
	 $config["total_rows"] = $this->common->count_all_table('questiontype');
 }

 $config = array();
 $config["per_page"] = 10;
 $this->pagination->initialize($config);

 if( $page <= 0 )
 {
	 $page = 1;
 }

 $start = ($page-1) * $config["per_page"];

 if(!empty($page))
 {
	 $questionType = $this->common->getbypagination('questiontype',$start,$config["per_page"]);
 }


 if($questionType)
 {
	 $data['message'] ="true";
	 $data['result'] = $questionType;
 }
 else
 {
	 $data['message'] ="false";
	 $data['result'] = '';
 }

 echo json_encode($data);
 exit;
}

public function questionTypeSave()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	 $check = $this->common->getrow('questiontype',array("name"=>$results->name));
		if(!empty($check))
		{
			$msg['message'] ="2";
		}
		else
		{
			$res = $this->common->insert('questiontype',$results);

		if($res)
		{
			$msg['message']="1";
		}
		else{
			$msg['message'] ="0";
		}
	 }

	echo json_encode($msg);
	exit;
}

public function questionTypeDelete()
{
$array = file_get_contents('php://input');
$results =json_decode($array);

$this->db->where('id',$results->id);
$query = $this->db->delete('questiontype');

if($query)
{
	$msg['message'] = "true";
}
else
{
	$msg['message'] = "false";
}
	echo json_encode($msg);
}

public function questionTypeEdit()
{
$array = file_get_contents('php://input');
$results =json_decode($array);

$res = $this->common->getrow('questiontype',array("id"=>$results->id));

if($res)
{
	$msg['message'] = "true";
	$msg['result'] = $res;
}
else
{
	$msg['message'] = "false";
}
	echo json_encode($msg);
	exit;
}

public function questionTypeUpdate()
{
$array = file_get_contents('php://input');
$results =json_decode($array);

$res = $this->common->update(array("id"=>$results->id),$results,'questiontype');


if($res)
{
$msg['message'] ="true";
}
else
{
 $msg['message'] ="false";
}
echo json_encode($msg);
exit;
}
// questionType

// question

public function question()
{
	$this->load->view('admin/header');
	$this->load->view('admin/question');
	$this->load->view('admin/footer');
}

public function getquestion()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);
 $page = $results->page;
 if(!empty($page))
 {
	 $data['pcount'] = $this->common->count_all_table('question');
	 $config["total_rows"] = $this->common->count_all_table('question');
 }

 $config = array();
 $config["per_page"] = 10;
 $this->pagination->initialize($config);

 if( $page <= 0 )
 {
	 $page = 1;
 }

 $start = ($page-1) * $config["per_page"];

 if(!empty($page))
 {
	 $question = $this->common->getquestion($start,$config["per_page"]);
 }


 if($question)
 {
	 $data['message'] ="true";
	 $data['result'] = $question;
 }
 else
 {
	 $data['message'] ="false";
	 $data['result'] = '';
 }

 echo json_encode($data);
 exit;
}

public function questionSave()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	$res = $this->common->insert('question',$results);

	if($res)
	{
			$msg['message']="1";
	}
	else
	{
			$msg['message'] ="0";
	}
	echo json_encode($msg);
	exit;
}

public function questionDelete()
{
$array = file_get_contents('php://input');
$results =json_decode($array);

$this->db->where('id',$results->id);
$query = $this->db->delete('question');

if($query)
{
	$msg['message'] = "true";
}
else
{
	$msg['message'] = "false";
}
	echo json_encode($msg);
}

public function questionEdit()
{
$array = file_get_contents('php://input');
$results =json_decode($array);

$res = $this->common->getrow('question',array("id"=>$results->id));

if($res)
{
	$msg['message'] = "true";
	$msg['result'] = $res;
}
else
{
	$msg['message'] = "false";
}
	echo json_encode($msg);
	exit;
}

public function questionUpdate()
{
$array = file_get_contents('php://input');
$results =json_decode($array);

$res = $this->common->update(array("id"=>$results->id),$results,'question');
 if($res)
 {
  $msg['message'] ="true";
 }
 else
 {
  $msg['message'] ="false";
 }
 echo json_encode($msg);
  exit;
 }

 public function allquestionType()
 {
	 $res = $this->common->get('questiontype',array("status"=> 1));
	 if($res)
	 {
		 $msg['message'] ="true";
		 $msg['result'] = $res;
	 }
	 else
	 {
		 $msg['message'] ="false";
		 $msg['result'] = "";
	 }
	 echo json_encode($msg);
	 exit;
 }
// question

// contact
public function contact()
{
	$this->load->view('admin/header');
	$this->load->view('admin/allcontact');
	$this->load->view('admin/footer');
}

public function getcontact()
{
 $array = file_get_contents('php://input');
 $results =json_decode($array);
 $page = $results->page;
 if(!empty($page))
 {
	 $data['pcount'] = $this->common->count_all_table('contact');
	 $config["total_rows"] = $this->common->count_all_table('contact');
 }

 $config = array();
 $config["per_page"] = 10;
 $this->pagination->initialize($config);

 if( $page <= 0 )
 {
	 $page = 1;
 }

 $start = ($page-1) * $config["per_page"];

 if(!empty($page))
 {
	 $question = $this->common->getbypagination('contact',$start,$config["per_page"]);
 }


 if($question)
 {
	 $data['message'] ="true";
	 $data['result'] = $question;
 }
 else
 {
	 $data['message'] ="false";
	 $data['result'] = '';
 }

 echo json_encode($data);
 exit;
}


public function contactDelete()
{
$array = file_get_contents('php://input');
$results =json_decode($array);

$this->db->where('id',$results->id);
$query = $this->db->delete('contact');

if($query)
{
	$msg['message'] = "true";
}
else
{
	$msg['message'] = "false";
}
	echo json_encode($msg);
}
//contact

///portfolio
public function portfolio($id)
{
	$data['freelancerId'] = $id;
	$this->load->view('admin/header');
	$this->load->view('admin/portfolio',$data);
	$this->load->view('admin/footer');
}

public function getportfolio()
{
	$array = file_get_contents('php://input');
  $results =json_decode($array);
  $page = $results->page;

  $user =$this->common->getrow('user',array("id"=>$results->id));


  if(!empty($page))
  {
 		if($user->parent == 0)
 		{
 		$data['pcount'] = $this->common->count_all_results('user_portfolio',array("u_id"=>$results->id));
 		$config["total_rows"] = $this->common->count_all_results('user_portfolio',array("u_id"=>$results->id));
 		}
 		else if($user->parent != 0)
 		{
 		$data['pcount'] = $this->common->count_all_results('user_portfolio',array("employeeId"=>$results->id));
 		$config["total_rows"] = $this->common->count_all_results('user_portfolio',array("employeeId"=>$results->id));
 		}
  }

  $config = array();
  $config["per_page"] = 10;
  $this->pagination->initialize($config);

  if( $page <= 0 )
  {
 	 $page = 1;
  }

  $start = ($page-1) * $config["per_page"];

  if(!empty($page))
  {
 	 if($user->parent == 0)
 	 {
 	 $result = $this->common->getbylimitStart("user_portfolio",array("u_id"=>$results->id),$start,$config["per_page"]);
 	 }
 	 else if($user->parent != 0)
 	 {
 		 $result = $this->common->getbylimitStart("user_portfolio",array("employeeId"=>$results->id),$start,$config["per_page"]);
 	 }
 }

  if($result)
  {
 	 $data['message'] ="true";
 	 $data['result'] = $result;
  }
  else
  {
 	 $data['message'] ="false";
 	 $data['result'] = '';
  }

  echo json_encode($data);
  exit;
}

///portfolio

// testimonial
 public function freelancertestimonial($id)
 {
	$data['freelancerId'] = $id;
 	$this->load->view('admin/header');
 	$this->load->view('admin/testimonial',$data);
 	$this->load->view('admin/footer');
 }

 public function getfreelancertestimonial()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);
	 $page = $results->page;

	 $user = $this->common->getrow('user',array("id"=>$results->id));

	 if(!empty($page))
	 {
			if($user->parent == 0)
			{
			$data['pcount'] = $this->common->count_all_results('user_testimonial',array("u_id"=>$results->id));
			$config["total_rows"] = $this->common->count_all_results('user_testimonial',array("u_id"=>$results->id));
			}
			else if($user->parent != 0)
			{
			$data['pcount'] = $this->common->count_all_results('user_testimonial',array("employeeId"=>$results->id));
			$config["total_rows"] = $this->common->count_all_results('user_testimonial',array("employeeId"=>$results->id));
			}

	 }

	 $config = array();
	 $config["per_page"] = 10;
	 $this->pagination->initialize($config);

	 if( $page <= 0 )
	 {
		 $page = 1;
	 }

	 $start = ($page-1) * $config["per_page"];

	 if(!empty($page))
	 {
			if($user->parent == 0)
			{
			$testimonial = $this->common->getbylimitStart("user_testimonial",array("u_id"=>$results->id),$start,$config["per_page"]);
			}
			else if($user->parent != 0)
			{
			 $testimonial = $this->common->getbylimitStart("user_testimonial",array("employeeId"=>$results->id),$start,$config["per_page"]);

			}
	 }

	 if($testimonial)
	 {
		 $data['message'] ="true";
		 $data['result'] = $testimonial;
	 }
	 else
	 {
		 $data['message'] ="false";
		 $data['result'] = '';
	 }

	 echo json_encode($data);
 }
// testimonial

// case study
public function casestudy($id)
{
	$data['freelancerId'] = $id;
  $this->load->view('admin/header');
  $this->load->view('admin/casestudy',$data);
  $this->load->view('admin/footer');
}

public function getcasestudy()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$page = $results->page;

	$user = $this->common->getrow('user',array("id"=>$results->id));

	if(!empty($page))
	{
		 if($user->parent == 0)
		 {
		 $data['pcount'] = $this->common->count_all_results('user_case_studies',array("u_id"=>$results->id));
		 $config["total_rows"] = $this->common->count_all_results('user_case_studies',array("u_id"=>$results->id));
		 }
		 else if($user->parent != 0)
		 {
		 $data['pcount'] = $this->common->count_all_results('user_case_studies',array("employeeId"=>$results->id));
		 $config["total_rows"] = $this->common->count_all_results('user_case_studies',array("employeeId"=>$results->id));
		 }

	}

 $config = array();
 $config["per_page"] = 10;
 $this->pagination->initialize($config);

 if( $page <= 0 )
 {
	 $page = 1;
 }

 $start = ($page-1) * $config["per_page"];

 if(!empty($page))
 {
	 if($user->parent == 0)
		{
		 $case = $this->common->getcase_study(array("st.u_id"=>$results->id),$start,$config["per_page"]);
		}
		else
		{
		 $case = $this->common->getcase_study(array("st.employeeId"=>$results->id),$start,$config["per_page"]);
		 }
 }

 if($case)
 {
	 $data['message'] ="true";
	 $data['result'] = $case;
 }
 else
 {
	 $data['message'] ="false";
	 $data['result'] = '';
 }

 echo json_encode($data);
}

// case study

//pricing
  public function pricing($id)
	{
		$data['freelancerId'] = $id;
    $this->load->view('admin/header');
    $this->load->view('admin/pricing',$data);
    $this->load->view('admin/footer');
	}

	public function getpricing()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;

		$user = $this->common->getrow('user',array("id"=>$results->id));

	 if(!empty($page))
	 {
			if($user->parent == 0)
			{
			 $data['pcount'] = $this->common->count_all_results('service_pricing',array("u_id"=>$results->id));
			 $config["total_rows"] = $this->common->count_all_results('service_pricing',array("u_id"=>$results->id));
			}
			else if($user->parent != 0)
			{
			 $data['pcount'] = $this->common->count_all_results('service_pricing',array("employeeId"=>$results->id));
			$config["total_rows"] = $this->common->count_all_results('service_pricing',array("employeeId"=>$results->id));
			}

		}

	 $config = array();
	 $config["per_page"] = 10;
	 $this->pagination->initialize($config);

	 if( $page <= 0 )
	 {
		 $page = 1;
	 }

	 $start = ($page-1) * $config["per_page"];

	 if(!empty($page))
	 {
			if($user->parent == 0)
			{
			 $pricing = $this->common->getservice_pricing(array("pr.u_id"=>$results->id),$start,$config["per_page"]);
			}
			else if($user->parent != 0)
			{
			 $pricing = $this->common->getservice_pricing(array("pr.employeeId"=>$results->id),$start,$config["per_page"]);
			}
	 }

	 if($pricing)
	 {
		 $data['message'] ="true";
		 $data['result'] = $pricing;
	 }
	 else
	 {
		 $data['message'] ="false";
		 $data['result'] = '';
	 }

	 echo json_encode($data);
	}
//pricing

// request form
 public function requestform($id)
 {
	 $data['freelancerId'] = $id;
	 $this->load->view('admin/header');
	 $this->load->view('admin/requestform',$data);
	 $this->load->view('admin/footer');
 }

 public function getrequestform()
 {
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;

		if(!empty($page))
		{
			 $data['pcount'] = $this->common->count_all_results('requests',array("u_id"=>$results->id));
			 $config["total_rows"] = $this->common->count_all_results('requests',array("u_id"=>$results->id));
		}

		$config = array();
		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$result = $this->common->getbylimitStart("requests",array("u_id"=>$results->id),$start,$config["per_page"]);
		}
   if(!empty($result))
	 {
				foreach($result as $key=>$res)
				{
					$result[$key]->req_detail = unserialize($res->req_detail);
					if(!empty($result[$key]->req_detail->serviceId))
					{
						$ser = $this->common->getrow('services',array("id"=>$result[$key]->req_detail->serviceId));
						 if(!empty($ser))
						 {
						$result[$key]->req_detail->service = $ser->name;
						 }
					}
				}
		 }

		if($result)
		{
			$data['message'] ="true";
			$data['result'] = $result;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
		exit;

 }
// request form

 // review
 public function review($id)
 {
	 $data['freelancerId'] = $id;
	 $this->load->view('admin/header');
	 $this->load->view('admin/review',$data);
	 $this->load->view('admin/footer');
 }

 public function getreview()
 {
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;

		if(!empty($page))
		{
			 $data['pcount'] = $this->common->count_linkedreview(array("r.reviewTo"=>$results->id));
			 $config["total_rows"] = $this->common->count_linkedreview(array("r.reviewTo"=>$results->id));
		}

		$config = array();
		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$result = $this->common->getlinkedinreview(array("r.reviewTo"=>$results->id));
		}

		if(!empty($result))
 	 {
 		 foreach($result as $key=>$res)
 		 {
 			 $ser = $this->common->getrow('services',array("id"=>$res->servicesId));
 			 $co = $this->common->getrow('countries',array("id"=>$res->country));
 			 $currency = $this->common->getrow('currency',array("id"=>$res->currencyId));
 			 $result[$key]->service = $ser->name;
 			 $result[$key]->country = $co->name;
			 if(!empty($currency))
			 {
 			 $result[$key]->code = $currency->code;
 			 $result[$key]->symbol = $currency->symbol;
		   }
 			 $feeds =	$this->common->get('user_review',array("linkedInId"=>$res->linkedInId));
 			 $result[$key]->rating ='';
 			 if(!empty($feeds))
 			 {
 				 $rating =0;
 				 foreach($feeds as $feed)
 				 {
 					 if($feed->reviewType == "review")
 					 {
 						 $result[$key]->feedback = $feed->reviewOverall;
 					 }
 					 if($feed->reviewType != "review" and $feed->reviewType != "overall" and $feed->reviewType != "total")
 					 {
 						 $rating += $feed->reviewOverall;
 						 $result[$key]->rating = $rating / 2;
 					 }
 				 }
 			 }
 		 }
 	 }

		if($result)
		{
			$data['message'] ="true";
			$data['result'] = $result;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
		exit;

 }

 public function viewReview()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	 if($results->type == 1)
	 {
		 $res = $this->common->getrow('user_review',array("contractId"=>$results->id,"reviewType"=>'review'));
		 $c = $this->common->contractdata(array("contractId"=>$r->contractId));
		 $review = $this->common->getrow('user_review',array("contractId"=>$results->id,"reviewType"=>'overall'));
		 $r = $this->common->getreviewIn(array("contractId"=>$results->id));
		 $res->allrating = $r;

		 $res->score = $review->reviewOverall / 2;
		 $res->budget = $contractdata->budget;
		 $res->name = $contractdata->name;
		 $res->title = $contractdata->jobTitle;
		 $res->service = $contractdata->service;
		 $res->start = $contractdata->contractDate;
		 $res->end = $contractdata->contractEndDate;
		 $res->email = $contractdata->email;
		 $res->phone = $contractdata->phone;
		 $res->skype = $contractdata->skype;
		 $res->address = $contractdata->address;
		 $res->city = $contractdata->city;
		 $res->state = $contractdata->state;
		 $res->country = $contractdata->country;
		 $res->industry = $contractdata->industry;
		 $res->code = $contractdata->code;
		 $res->symbol = $contractdata->symbol;

	 }
	 else if($results->type == 2)
	 {
		 $res = $this->common->getrow('user_review',array("linkedinId"=>$results->id,"reviewType"=>'review'));
		 $l = $this->common->linkedIndata(array("linkedInId"=>$results->id));
		 $review = $this->common->getrow('user_review',array("linkedInId"=>$results->id,"reviewType"=>'overall'));
		 $r = $this->common->getreviewIn(array("linkedInId"=>$results->id));
      $res->allrating = $r;
		 if(!empty($l))
		 {
			 $res->score = $review->reviewOverall / 2;
			 $res->budget = $l->budget;
			 $res->name = $l->name;
			 $res->title = $l->projectTitle;
			 $res->service = $l->service;
			 $res->start = $l->projectStartDate;
			 $res->end = $l->projectEndDate;
			 $res->email = $l->email;
			 $res->phone = $l->phone;
			 $res->skype = $l->skype;
			 $res->address = $l->address;
			 $res->city = $l->city;
			 $res->state = $l->state;
			 $res->country = $l->country;
			 $res->industry = $l->industry;
			 $res->code = $l->code;
			 $res->symbol = $l->symbol;
			 $res->target = $l->targetLocation;
			 $res->projectSummary = $l->projectSummary;
			 $res->website = $l->website;
			 $res->reviewTitle = $l->reviewTitle;

			}
	 }

	 if($res)
	{
		$data1['message'] ="true";
		$data1['result'] = $res;
	}
	else
	{
		$data1['message'] ="false";
		$data1['result'] ='';
	}
	echo json_encode($data1);
	exit;
 }

 // membership


 ////////////////blog

 public function package()
 {
	 $this->load->view('admin/header');
	 $this->load->view('admin/allpackage');
	 $this->load->view('admin/footer');
 }

 public function getpackage()
 {
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$page = $results->page;
	if(!empty($page))
	{
		$data['pcount'] = $this->common->count_all_table('packages');
		$config["total_rows"] = $this->common->count_all_table('packages');
	}

	$config = array();
	$config["per_page"] = 10;
	$this->pagination->initialize($config);

	if( $page <= 0 )
	{
		$page = 1;
	}

	$start = ($page-1) * $config["per_page"];

	if(!empty($page))
	{
		$package = $this->common->getbypagination('packages',$start,$config["per_page"]);
	}

	if(!empty($package))
	{
		foreach($package as $key=>$p)
		{
			$package[$key]->count = $this->common->count_all_results('user_membership',array("packageId"=>$p->packageId,"membershipStatus"=>1));
		}
	}



	if($package)
	{
		$data['message'] ="true";
		$data['result'] = $package;
	}
	else
	{
		$data['message'] ="false";
		$data['result'] = '';
	}

	echo json_encode($data);
	exit;
 }

 public function packageAdd()
 {
	 $this->load->view('admin/header');
	 $this->load->view('admin/Addpackage');
	 $this->load->view('admin/footer');
 }

 public function packageSave()
 {
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	$res = $this->common->insert('packages',$results);

		if($res)
		{
			$msg['message']="true";
		}
		else
		{
			$msg['message'] ="false";
		}
		echo json_encode($msg);
		exit;
 }

 public function packageEdit($id)
 {
	 $data['packageId'] = $id;
	$this->load->view('admin/header');
	$this->load->view('admin/Editpackage',$data);
	$this->load->view('admin/footer');
 }

 public function packageDelete()
 {
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $this->db->where('packageId',$results->id);
 $query = $this->db->delete('packages');

 if($query)
 {
	 $msg['message'] = "true";
 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
 }

 public function getpackageEdit()
 {
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $res = $this->common->getrow('packages',array("packageId"=>$results->id));

 if($res)
 {
	 $msg['message'] = "true";
	 $msg['result'] = $res;
 }
 else
 {
	 $msg['message'] = "false";
 }
	 echo json_encode($msg);
	 exit;
 }

 public function packageUpdate()
 {
 $array = file_get_contents('php://input');
 $results =json_decode($array);

 $res = $this->common->update(array("packageId"=>$results->packageId),$results,'packages');
 if($res)
 {
 $msg['message'] ="true";
 }
 else
 {
	$msg['message'] ="false";
 }
 echo json_encode($msg);
 exit;
 }
 //membership

  //support chat
  public function support()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/support');
		$this->load->view('admin/footer');
	}

	public function getchatperson()
  {
 	 $array = file_get_contents('php://input');
 	 $results =json_decode($array);
 	 $page = $results->page;

	 if(!empty($page))
 	 {
 		$data['pcount'] = $this->common->count_all_results('user',array("is_active"=>1));
 		$config["total_rows"] = $this->common->count_all_results('user',array("is_active"=>1));
 	 }

 	$config = array();
 	$config["per_page"] = 10;
 	$this->pagination->initialize($config);

 	if( $page <= 0 )
 	{
 		$page = 1;
 	}

 	$start = ($page-1) * $config["per_page"];

 	if(!empty($page))
 	{
 		$user = $this->common->getUsers(array("is_active"=>1),$start,$config["per_page"]);
 	}
	if(!empty($user))
	{
		foreach($user as $k=>$u)
		{
			if($u->parent != 0)
			{
			$company = $this->common->getrow('user_meta',array("u_id"=>$u->parent));
			$user[$k]->companyname = $company->c_name;
		  }
		}
	}

  if($user)
 	{
 		$data['message'] ="true";
 		$data['result'] = $user;
 	}
 	else
 	{
 		$data['message'] ="false";
 		$data['result'] = '';
 	}

 	echo json_encode($data);
 	exit;
  }
 //support chat

 ///conference
 public function conference()
 {
	 $this->load->view('admin/header');
	 $this->load->view('admin/conference');
	 $this->load->view('admin/footer');
 }

 public function getconference()
 {
	$array = file_get_contents('php://input');
 	$results =json_decode($array);
 	$page = $results->page;
 	if(!empty($page))
 	{
 		$data['pcount'] = $this->common->count_all_table('conference');
 		$config["total_rows"] = $this->common->count_all_table('conference');
 	}

 	$config = array();
 	$config["per_page"] = 10;
 	$this->pagination->initialize($config);

 	if( $page <= 0 )
 	{
 		$page = 1;
 	}

 	$start = ($page-1) * $config["per_page"];

 	if(!empty($page))
 	{
 		$conference = $this->common->getconference('conference',$start,$config["per_page"]);
 	}

	if(!empty($conference))
	{
	  foreach($conference as $key=>$c)
	  {
     $conference[$key]->about = strip_tags($c->about);
	  }
	}



 	if($conference)
 	{
 		$data['message'] ="true";
 		$data['result'] = $conference;
 	}
 	else
 	{
 		$data['message'] ="false";
 		$data['result'] = '';
 	}

 	echo json_encode($data);
 	exit;
 }

 public function conferenceStatus()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	 $res = $this->common->update(array("id"=>$results->id),$results,'conference');
	 if($res)
	 {
	 $msg['message'] ="true";
	 }
	 else
	 {
	 $msg['message'] ="false";
	 }
	 echo json_encode($msg);
	 exit;
  }

	public function getoneconference()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$res = $this->common->getrow('conference',array("id"=>$results->id));
		if($res)
		{
		$msg['message'] ="true";
		$msg['result'] = $res;
		}
		else
		{
		$msg['message'] ="false";
		$msg['result'] = '';
		}
		echo json_encode($msg);
		exit;
	 }

	 public function conferenceDelete()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $this->db->where('id',$results->id);
	 	 $query = $this->db->delete('conference');
		 if($query)
		 {
		 $msg['message'] ="true";
		 }
		 else
		 {
		 $msg['message'] ="false";
		 }
		 echo json_encode($msg);
		 exit;
	  }

	// user testimonial
	public function usertestimonial()
	{
    $this->load->view('admin/header');
    $this->load->view('admin/usertestimonial');
    $this->load->view('admin/footer');
	}

	public function getusertestimonial()
	{
		$array = file_get_contents('php://input');
	 	$results =json_decode($array);
	 	$page = $results->page;

	 	if(!empty($page))
	 	{
	 		$data['pcount'] = $this->common->count_usertestimonial();
	 		$config["total_rows"] = $this->common->count_usertestimonial();
	 	}

	 	$config = array();
	 	$config["per_page"] = 10;
	 	$this->pagination->initialize($config);

	 	if( $page <= 0 )
	 	{
	 		$page = 1;
	 	}

	 	$start = ($page-1) * $config["per_page"];

		$result = $this->common->getusertestimonial($start,$config["per_page"]);

		if(!empty($result))
		{
		  foreach($result as $key=>$res)
			{
				$result[$key]->tcount = $this->common->count_all_results('user_testimonial',array("u_id"=>$res->u_id));
			}
		}

 	   if($result)
 	   {
 	    $msg['message'] ="true";
	    $msg['result'] = $result;
 	   }
 	   else
 	   {
 	    $msg['message'] ="false";
	    $msg['result'] ='';
 	    }

 	    echo json_encode($msg);
 	    exit;
		}
		// user testimonial

		// user portfolio
		public function userportfolio()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/userportfolio');
			$this->load->view('admin/footer');
		}

		public function getuserportfolio()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;

			if(!empty($page))
			{
				$data['pcount'] = $this->common->count_userportfolio();
				$config["total_rows"] = $this->common->count_userportfolio();
			}

			$config = array();
			$config["per_page"] = 10;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];

			$result = $this->common->getuserportfolio($start,$config["per_page"]);

			if(!empty($result))
			{
				foreach($result as $key=>$res)
				{
					$result[$key]->tcount = $this->common->count_all_results('user_portfolio',array("u_id"=>$res->u_id));
				}
			}

			 if($result)
			 {
				$msg['message'] ="true";
				$msg['result'] = $result;
			 }
			 else
			 {
				$msg['message'] ="false";
				$msg['result'] ='';
				}

				echo json_encode($msg);
				exit;
			}
		// user portfolio

		// case study
		public function usercasestudy()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/usercasestudy');
			$this->load->view('admin/footer');
		}

		public function getusercasestudy()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;

			if(!empty($page))
			{
				$data['pcount'] = $this->common->count_userportfolio();
				$config["total_rows"] = $this->common->count_userportfolio();
			}

			$config = array();
			$config["per_page"] = 10;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];

			$result = $this->common->getuserportfolio($start,$config["per_page"]);

			if(!empty($result))
			{
				foreach($result as $key=>$res)
				{
					$result[$key]->tcount = $this->common->count_all_results('user_case_studies',array("u_id"=>$res->u_id));
				}
			}

			 if($result)
			 {
				$msg['message'] ="true";
				$msg['result'] = $result;
			 }
			 else
			 {
				$msg['message'] ="false";
				$msg['result'] ='';
				}

				echo json_encode($msg);
				exit;
			}
		// case study

		// user pricing
		public function userpricing()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/userpricing');
			$this->load->view('admin/footer');
		}

		public function getuserpricing()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;

			if(!empty($page))
			{
				$data['pcount'] = $this->common->count_userpricing();
				$config["total_rows"] = $this->common->count_userpricing();
			}

			$config = array();
			$config["per_page"] = 10;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];

			$result = $this->common->getuserpricing($start,$config["per_page"]);


			if(!empty($result))
			{
				foreach($result as $key=>$res)
				{
					$result[$key]->tcount = $this->common->count_all_results('service_pricing',array("u_id"=>$res->u_id));
				}
			}

			 if($result)
			 {
				$msg['message'] ="true";
				$msg['result'] = $result;
			 }
			 else
			 {
				$msg['message'] ="false";
				$msg['result'] ='';
				}

				echo json_encode($msg);
				exit;
			}
		//user pricing

		// user request form
		public function userrequestform()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/userrequestform');
			$this->load->view('admin/footer');
		}

		public function getuserrequestform()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;

			if(!empty($page))
			{
				$data['pcount'] = $this->common->count_userrequestform();
				$config["total_rows"] = $this->common->count_userrequestform();
			}

			$config = array();
			$config["per_page"] = 10;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];

			$result = $this->common->getuserrequest($start,$config["per_page"]);


			if(!empty($result))
			{
				foreach($result as $key=>$res)
				{
					$result[$key]->tcount = $this->common->count_all_results('requests',array("u_id"=>$res->u_id));
				}
			}

			 if($result)
			 {
				$msg['message'] ="true";
				$msg['result'] = $result;
			 }
			 else
			 {
				$msg['message'] ="false";
				$msg['result'] ='';
				}

				echo json_encode($msg);
				exit;
			}

		// user request form

		//suggestion
		public function suggestion()
		{
			$t['title'] ="List of Suggestions For Industries and Services";
			$this->load->view('admin/header',$t);
			$this->load->view('admin/suggestion');
			$this->load->view('admin/footer');
		}

		public function getsuggestion()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			// $page = $results->page;
			$page =1;

			if(!empty($page))
			{
				$data['pcount'] = $this->common->count_all_results('user_log',array("logType"=>"suggestion"));
				$config["total_rows"] = $this->common->count_all_results('user_log',array("logType"=>"suggestion"));
			}

			$config = array();
			$config["per_page"] = 10;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];

			$result = $this->common->getsuggestion(array("logType"=>'suggestion'),$start,$config["per_page"]);


			if(!empty($result))
			{
				foreach($result as $key=>$res)
				{
					if($res->userId != "")
					{
						$u = $this->common->getrow('user_meta',array("u_Id"=>$res->userId));
	          $result[$key]->username = $u->name;
					}

					if($res->logSubType == "Industry")
					{
					$i = $this->common->getrow('practice_areas',array("id"=>$res->logReference));
					   if(!empty($i))
					   {
             $result[$key]->name = $i->name;
				     }
					 }
					else if($res->logSubType == "Service")
					{
						$s = $this->common->getrow('services',array("id"=>$res->logReference));
						 if(!empty($s))
						 {
              $result[$key]->name = $s->name;
					   }
					 }
				}
			}

			 if($result)
			 {
				$msg['message'] ="true";
				$msg['result'] = $result;
			 }
			 else
			 {
				$msg['message'] ="false";
				$msg['result'] ='';
				}

				echo json_encode($msg);
				exit;
		}

		public function suggestionstatus()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			if($results->ref && $results->logId)
			{
				$up = $this->common->update(array("logReference"=>$results->ref,"logId"=>$results->logId),array("logStatus"=>$results->status),'user_log');
			}

			if($up)
			{
				if($results->type == "service")
				{
				$s = $this->common->update(array("id"=>$results->ref),array("status"=>$results->status),'services');
			  }
				else if($results->type == "industry")
				{
					$s = $this->common->update(array("id"=>$results->ref),array("status"=>$results->status),'practice_areas');
         }
			}

			if($s)
			{
				$msg['message'] = "true";
			}
			else
			{
				$msg['message'] = "false";
			}
			echo json_encode($msg);
			exit;
		}

		public function deletesuggestion()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$this->db->where('logId',$results->logId);
		  $query = $this->db->delete('user_log');

		  if($query)
		  {
		 	 $msg['message'] = "true";
		  }
		  else
		  {
		 	 $msg['message'] = "false";
		  }
		 	 echo json_encode($msg);
			 exit;
		}
		//suggestion

		public function support_external()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/supportexternal');
			$this->load->view('admin/footer');
		}

		public function allemail()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/allemail');
			$this->load->view('admin/footer');
		}

		public function getemail()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;

			$data['pcount'] = $this->common->count_all_table('email');
			$config["total_rows"] = $this->common->count_all_table('email');

			$config = array();
			$config["per_page"] = 10;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];


	    $emails = $this->common->getbypagination('email',$start,$config["per_page"]);


			if($emails)
			{
				$data['message'] ="true";
				$data['result'] = $emails;
			}
			else
			{
				$data['message'] ="false";
				$data['result'] = '';
			}

			echo json_encode($data);
		}

		public function saveemail()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			 $st['email'] = trim($results->email,'');
			$check=$this->common->checkexist('email',$st);

			if($check != 0)
			{
				$msg1['success'] ='2';
				$msg1['message'] ='Email is Already register';
				echo json_encode($msg1);
				exit;
			}
			else
			{
			  $insert = $this->common->insert('email',$st);
       }

				if ($insert)
				{
					$msg1['success'] ='1';
					$msg1['message'] ='Email Successfully insert';
        }
				else
				{
					$msg1['success'] ='0';
					$msg1['message'] ='Email is not insert';

				}

				echo json_encode($msg1);
				exit;

		}

		public function editemail()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$result = $this->common->getrow('email',array("id"=>$results->id));

			if($result)
			{
			 $msg['message'] = "true";
			 $msg['result'] = $result;
			}
			else
			{
			 $msg['message'] = "false";
			 $msg['result'] = '';

			}
			 echo json_encode($msg);
			 exit;
		}

		public function deleteEmail()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$this->db->where('id',$results->id);
		  $query = $this->db->delete('email');

		  if($query)
		  {
		 	 $msg['message'] = "true";
		  }
		  else
		  {
		 	 $msg['message'] = "false";
		  }
		 	 echo json_encode($msg);
			 exit;
		}

		public function emailUpdate()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
      $st['email'] = trim($results->email,'');

			$updated = $this->common->update(array("id"=>$results->id),$st,'email');
      if ($updated)
			{
					$msg1['message'] ='true';
      }
			else
			{
					$msg1['success'] ='false';
			}
    	echo json_encode($msg1);
		  exit;
		}



// user review

public function userreview()
{
	$this->load->view('admin/header');
	$this->load->view('admin/userreview');
	$this->load->view('admin/footer');
}

public function getuserreview()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$page = $results->page;

	if(!empty($page))
	{
		$data['pcount'] = $this->common->count_userreview();
		$config["total_rows"] = $this->common->count_userreview();
	}

	$config = array();
	$config["per_page"] = 10;
	$this->pagination->initialize($config);

	if( $page <= 0 )
	{
		$page = 1;
	}

	$start = ($page-1) * $config["per_page"];

	$result = $this->common->getuserreview($start,$config["per_page"]);


	if(!empty($result))
	{
		foreach($result as $key=>$res)
		{
			$result[$key]->tcount = $this->common->count_all_results('user_review',array("reviewTo"=>$res->u_id,"reviewType"=>"overall"));
		}
	}

	 if($result)
	 {
		$msg['message'] ="true";
		$msg['result'] = $result;
	 }
	 else
	 {
		$msg['message'] ="false";
		$msg['result'] ='';
		}

		echo json_encode($msg);
		exit;
	}

	public function sitemap()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/sitemap');
		$this->load->view('admin/footer');
	}

	public function sitemap_upload()
	{
		       $name=$_FILES['xml']['name'];
					 $tmp_name=$_FILES['xml']['tmp_name'];
					 $error=$_FILES['xml']['error'];
					 $file_ext = pathinfo($name, PATHINFO_EXTENSION);

		 if($_FILES["xml"]["name"])
		 {
			$aa = move_uploaded_file($tmp_name,$name);
		 }
		 if($aa)
		 {
			 redirect('admin/sitemap');

		 }


	}

// user review


	 public function getpackageContent()
	 {
		 $res = $this->common->getoneOnly('package_content');
		 if($res)
		 {
			 $msg['message'] = "true";
			 $msg['result'] = $res;
		 }
		 else
		 {
			 $msg['message'] = "false";
			 $msg['result'] = '';
		 }
		 echo json_encode($msg);
		 exit;
	 }


	 public function packageContentUpdate()
	 {
	 	$array = file_get_contents('php://input');
	 	$results =json_decode($array);
		$res = $this->common->getoneOnly('package_content');
		 if($res)
		 {
		  $u = $this->common->update(array("id"=>$res->id),array("content"=>$results->content),'package_content');
		 }
		 else
		 {
		  $u = $this->common->insert('package_content',array("content"=>$results->content))	;
		 }

		 if($u)
		 {
		  $msg['message'] ="true";
		 }
		 else
		 {
			 $msg['message'] ="false";
		 }
		 echo json_encode($msg);
		 exit;
	}


	////////////////featured

	public function featured()
	{
	  $this->load->view('admin/header');
	  $this->load->view('admin/allfeatured');
	  $this->load->view('admin/footer');
	}

	public function getfeatured()
	{
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);
	 $page = $results->page;
	 if(!empty($page))
	 {
	   $data['pcount'] = $this->common->count_all_table('featured');
	   $config["total_rows"] = $this->common->count_all_table('featured');
	 }

	 $config = array();
	 $config["per_page"] = 10;
	 $this->pagination->initialize($config);

	 if( $page <= 0 )
	 {
	   $page = 1;
	 }

	 $start = ($page-1) * $config["per_page"];

	 if(!empty($page))
	 {
	   $featured = $this->common->getbypagination('featured',$start,$config["per_page"]);
	 }



	 if($featured)
	 {
	   $data['message'] ="true";
	   $data['result'] = $featured;
	 }
	 else
	 {
	   $data['message'] ="false";
	   $data['result'] = '';
	 }

	 echo json_encode($data);
	 exit;
	}

	public function featuredSave()
	{
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);
	 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	 $date =  $nowUtc->format('Y-m-d H:i:s');


	 $res = $this->common->insert('featured',$results);


	   if($res)
	   {
	     $msg['message']="true";
	   }
	   else
	   {
	     $msg['message'] ="false";
	   }
	   echo json_encode($msg);
	   exit;
	}

	public function featuredDelete()
	{
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	$this->db->where('id',$results->id);
	$query = $this->db->delete('featured');

	if($query)
	{
	  $msg['message'] = "true";
	}
	else
	{
	  $msg['message'] = "false";
	}
	  echo json_encode($msg);
	}

	public function featuredEdit()
	{
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	$res = $this->common->getrow('featured',array("id"=>$results->id));
	if($res)
	{
	  $msg['message'] = "true";
	  $msg['result'] = $res;

	}
	else
	{
	  $msg['message'] = "false";
	}
	  echo json_encode($msg);
	  exit;
	}

	public function featuredUpdate()
	{
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	if(empty($results->image))
	{
	  unset($results->image);
	}

  $res = $this->common->update(array("id"=>$results->id),$results,'featured');

 if($res)
	{
	$msg['message'] ="true";
	}
	else
	{
	 $msg['message'] ="false";
	}
	echo json_encode($msg);
	exit;
	}

	public function featuredStatus()
	{
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	 $res = $this->common->update(array("id"=>$results->id),array("status"=>$results->status),'featured');
	 if($res)
	 {
	 $msg['message'] ="true";
	 }
	 else
	 {
	 $msg['message'] ="false";
	 }
	 echo json_encode($msg);
	 exit;

	}

	public function featuredImage()
	{
	 $array = file_get_contents('php://input');
	$results =json_decode($array);
	$data = $results->image;

	list($type, $data) = explode(';', $data);
	list(, $data)      = explode(',', $data);

	$data1 = base64_decode($data);

	$f = finfo_open();

	$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);


	if($mime_type =="image/png")
	{
	  echo $image = uniqid().'image.png';
	  $image = file_put_contents('assets/featured/'.$image,$data1);
	}
	else if($mime_type =="image/jpeg")
	{
	  echo $image=uniqid().'image.jpeg';
	  $result=file_put_contents('assets/featured/'.$image,$data1);
	}
	else if($mime_type =="application/pdf")
	{
	  echo $image = uniqid().'image.pdf';
	  $result=file_put_contents('assets/featured/'.$image,$data1);
	}
	exit;
	}

	///////////////featured

	public function freelanceredit($id)
	{
     $data['freelancerId']  = $id;
		 $this->load->view('admin/header');
		 $this->load->view('admin/editfreelancer',$data);
		 $this->load->view('admin/footer');
	}

	public function getfreelancerprofile()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$states ='';
		$city = '';
		$profile = $this->common->getprofile(array("us.id"=>$results->freelancerId));
		if($profile->country)
		{
      $states = $this->common->get('states',array('country_id'=>$profile->country));
			$city = $this->common->get('cities',array('state_id'=>$profile->state));
		}
		if($profile)
		{
			$msg['message'] = "true";
			$msg['result'] = $profile;
			$msg['states'] = $states;
			$msg['city'] = $city;
		}
		else
		{
		  $msg['message'] = "false";
			$msg['result'] ='';
		}
		echo json_encode($msg);
	}

	public function freelancerprofileupdate()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		if(empty($results->logo))
		{
			unset($results->logo);
		}

		$profile = $this->common->update(array("u_id"=>$results->u_id),$results,'user_meta');

		if($profile)
		{
			$msg['message'] ="true";
		}
		else
		{
			$msg['message'] ="false";
		}
		 echo json_encode($msg);
	}

	public function freelancerServices($id)
	{
		$data['freelancerId']  = $id;
		$this->load->view('admin/header');
		$this->load->view('admin/services',$data);
		$this->load->view('admin/footer');
	}

	public function getfreelancerIndustry()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$ind = $this->common->getuserIndustry($results->freelancerId);
		if($ind)
		{
			$msg['message'] = "true";
			$msg['industry'] = $ind;
		}
		else
		{
			$msg['message'] = "false";
			$msg['industry'] = "";
		}
		echo json_encode($msg);
	}

	public function getfreelancerservices()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$service = $this->common->getuserServices($results->freelancerId);
		if($service)
		{
			$msg['message'] = "true";
			$msg['service'] = $service;
		}
		else
		{
			$msg['message'] = "false";
			$msg['service'] = "";
		}
		echo json_encode($msg);

	}

	public function freelancersaveService()
	{
		$array = file_get_contents('php://input');
	  $results =json_decode($array);
    $inds = $results->industry;
		$ser = $results->service;

		if(!empty($inds))
		{
			$this->db->where('u_id',$results->freelancerId);
      $query = $this->db->delete('user_industries');
			 foreach($inds as $ind)
			 {
		    $industry = $this->common->insert('user_industries',array("u_id"=>$results->freelancerId,"industryId"=> $ind->id));
			 }
		}

		if(!empty($ser))
		{
			$this->db->where('u_id',$results->freelancerId);
      $query = $this->db->delete('user_services');
			foreach($ser as $se)
			{
        $service = $this->common->insert('user_services',array("u_id"=>$results->freelancerId,"servicesId"=>$se->id));
			}

		}

		if($service)
		{
			$msg['message']="true";
			$msg['service'] =$ser;
			$msg['industry'] =$inds;
    }
		else
		{
			$msg['message']="false";
			$msg['service'] ='';
			$msg['industry'] ='';
		}
		echo json_encode($msg);
	}

	public function freelancerselectedplan()
	{
		$array = file_get_contents('php://input');
	  $results =json_decode($array);
	 $result = $this->common->getfreelancerPlan(array("m.userId"=>$results->freelancerId,"m.membershipStatus"=>1));
	 if($result)
	 {
		 $msg['message'] = "true";
		 $msg['result'] = $result;
	 }
	 else
	 {
		 $msg['message'] = "false";
		 $msg['result'] = '';
	 }
	 echo json_encode($msg);
	 exit;
	}

	public function freelancerserviceDelete()
	{
		$industryId = '';
		$serviceId ='';

		$array = file_get_contents('php://input');
		$results =json_decode($array);

		if(!empty($results->industryId))
		{
		$industryId = $results->industryId;
		}

		if(!empty($results->serviceId))
		{
		$serviceId = $results->serviceId;
		}

		if(!empty($industryId))
		{
			$this->db->where('u_id',$results->freelancerId);
			$this->db->where('industryId',$industryId);
			$query = $this->db->delete('user_industries');
		}

		if(!empty($serviceId))
		{
			$this->db->where('u_id',$results->freelancerId);
			$this->db->where('servicesId',$serviceId);
			$query = $this->db->delete('user_services');
		}


	 if($query)
		{
			$msg['message']="true";
		}
		else
		{
			$msg['message']="false";
		}
		echo json_encode($msg);
		exit;
	}

	public function deleteuser()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		if(!empty($results))
		{
			$this->db->where('id',$results->userId);
			$query = $this->db->delete('user');
		}
	 if($query)
	 {
			$this->db->where('u_id',$results->userId);
			$query1 = $this->db->delete('user_meta');
		}

   if($query1)
		{
			$msg['message']="true";
		}
		else
		{
			$msg['message']="false";
		}
		echo json_encode($msg);
		exit;
	}

	public function removeReview()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		if($results->type == 1)
		{
			$res = $this->common->get('user_review',array("contractId"=>$results->id));
		}
		else if($results->type == 2)
		{
			$res = $this->common->get('user_review',array("linkedinId"=>$results->id));
		}

		if(!empty($res))
		{
			$data['userId'] = $res[0]->reviewTo;
			$data['data'] = serialize($res);
			$inserted = $this->common->insert('user_review_remove',$data);
		}

		if($inserted)
		{
			if($results->type == 1)
			{
			$deleted = $this->common->delete('user_review',array("contractId"=>$results->id));
			}
			else if($results->type == 2)
			{
				$deleted = $this->common->delete('user_review',array("linkedinId"=>$results->id));
			}
		}

		if($deleted)
	 {
		 $data1['message'] ="true";
	 }
	 else
	 {
		 $data1['message'] ="false";
	 }

	 echo json_encode($data1);
	 exit;
	}

	public function profileview()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/profileview');
		$this->load->view('admin/footer');
	}

	public function getprofileview()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$config = array();
    if($results->search != '')
		{
		$data['pcount'] = $this->common->search_count_ProfileView($results->search);
		$config["total_rows"] = $this->common->search_count_ProfileView($results->search);
	  }
		else
		{
			$data['pcount'] = $this->common->count_ProfileView();
			$config["total_rows"] = $this->common->count_ProfileView();
		}
		$config["per_page"] = $results->perpage;
		$this->pagination->initialize($config);
		if( $page <= 0 )
		{
			$page = 1;
		}
		$start = ($page-1) * $config["per_page"];
		if($results->search !='')
		{
			$res = $this->common->searchprofileView($results->search,$start,$config["per_page"]);
		}
		else
		{
		 $res = $this->common->getprofileView($start,$config["per_page"]);
		}
		if($res)
	  {
		 $data['message'] ="true";
		 $data['result'] = $res;
		 $data['start'] = $start + 1;
	  }
	 else
	 {
		 $data['message'] ="false";
		 $data['result'] = '';
	 }

	 echo json_encode($data);
	 exit;
	}

	public function profileviewdetail($id)
	{
		$result = $this->common->profileviewcount(array("userId"=>$id));
		if(!empty($result))
		{
			foreach($result as $k=>$r)
			{
				$result[$k]->label = date("d M", strtotime($r->label));
			}
		}
		$data['user'] = $this->common->getrow('user',array("id"=>$id));
		$data['userdetail'] = $this->common->getrow('user_meta',array("u_id"=>$id));
		$data['profileview'] = $result;

		$this->load->view('admin/header');
		$this->load->view('admin/profileviewdetail',$data);
		$this->load->view('admin/footer');
	}

	public function rankingPrice()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/rankingPrice');
		$this->load->view('admin/footer');
	}

	public function getrankingPrice()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$config = array();

		if($results->search !='')
		{
		$data['pcount'] = $this->common->search_count_rankingprice($results->search);
		$config["total_rows"] = $this->common->search_count_rankingprice($results->search);
	  }
		else
		{
			$data['pcount'] = $this->common->count_all_table('ranking_price');
			$config["total_rows"] = $this->common->count_all_table('ranking_price');
		}
		$config["per_page"] = $results->perpage;
		$this->pagination->initialize($config);
		if( $page <= 0 )
		{
			$page = 1;
		}
		$start = ($page-1) * $config["per_page"];
		if($results->search !='')
		{
			$res = $this->common->searchrankingPrice($results->search,$start,$config["per_page"]);
		}
		else
		{
			$res = $this->common->getrankingPrice($start,$config["per_page"]);
		}
		if($res)
	  {
		 $data['message'] ="true";
		 $data['result'] = $res;
		 $data['start'] = $start + 1;
	  }
	 else
	 {
		 $data['message'] ="false";
		 $data['result'] = '';
	 }

	 echo json_encode($data);
	 exit;
	}


	public function rankingPriceSave()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		if(!empty($results))
		{
			$res = $this->common->insert('ranking_price',$results);
		}

		if($res)
		{
		 $data['message'] ="true";
		}
	 else
	 {
		 $data['message'] ="false";
	 }

	 echo json_encode($data);
	 exit;
	}

	public function Deleterankingprice()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		if(!empty($results))
		{
			$res = $this->common->delete('ranking_price',array("rankingPriceId"=>$results->id));
		}

		if($res)
		{
		 $data['message'] ="true";
		}
	 else
	 {
		 $data['message'] ="false";
	 }

	 echo json_encode($data);
	 exit;
	}

	public function edit_ranking_price()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$state = [];
		$city = [];

		if(!empty($results))
		{
			$res = $this->common->getrow('ranking_price',array("rankingPriceId"=>$results->id));
			if(!empty($res->stateId))
			{
			$state = $this->common->get('states',array("id"=>$res->stateId));
		  }
			if($res->cityId)
			{
			$city = $this->common->getrow('cities',array("id"=>$res->cityId));
		  }
		}

		if($res)
		{
		 $data['message'] ="true";
		 $data['result'] = $res;
		 $data['state'] = $state;
		 $data['city'] = $city;
		}
	 else
	 {
		 $data['message'] ="false";
		 $data['result'] ="";
	 }

	 echo json_encode($data);
	 exit;
	}

	public function update_ranking_price()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		if(!empty($results))
		{
			$res = $this->common->update(array("rankingPriceId"=>$results->rankingPriceId),$results,'ranking_price');
		}

		if($res)
		{
		 $data['message'] ="true";
		}
	 else
	 {
		 $data['message'] ="false";
	 }

	 echo json_encode($data);
	 exit;
	}

	public function askquestionlist($id)
	{
		$data['askuserId'] = $id;
		$this->load->view('admin/header');
		$this->load->view('admin/askquestion',$data);
		$this->load->view('admin/footer');
	}

	public function getaskquestionlist()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$config = array();

		$data['pcount'] = $this->common->count_all_results('askQuestion',array("userId"=>$results->userId));
 	  $config["total_rows"] = $this->common->count_all_results('askQuestion',array("userId"=>$results->userId));
		$config["per_page"] = 10;
		$this->pagination->initialize($config);
		if( $page <= 0 )
		{
			$page = 1;
		}
		$start = ($page-1) * $config["per_page"];
		if(!empty($page))
		{
			$res = $this->common->getaskQuestion(array("userId"=>$results->userId),$start,$config["per_page"]);
		}
		if($res)
	 {
		 $data['message'] ="true";
		 $data['result'] = $res;
		 $data['start'] = $start + 1;
	 }
	 else
	 {
		 $data['message'] ="false";
		 $data['result'] = '';
	 }

	 echo json_encode($data);
	 exit;
	}

	public function askquestion()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/askquestionUser');
		$this->load->view('admin/footer');
	}

  public function getaskquestion()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;

		if(!empty($page))
		{
			$data['pcount'] = $this->common->count_useraskQuestion();
			$config["total_rows"] = $this->common->count_useraskQuestion();
		}

		$config = array();
		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		$result = $this->common->getuseraskquestion($start,$config["per_page"]);

		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
				$result[$key]->tcount = $this->common->count_all_results('askQuestion',array("userId"=>$res->u_id));
			}
		}

		 if($result)
		 {
			$msg['message'] ="true";
			$msg['result'] = $result;
		 }
		 else
		 {
			$msg['message'] ="false";
			$msg['result'] ='';
			}

			echo json_encode($msg);
			exit;
	}

	// gig
	public function usergig()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/gigUser');
		$this->load->view('admin/footer');
	}

	public function getusergig()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;

		if(!empty($page))
		{
			$data['pcount'] = $this->common->count_usergig();
			$config["total_rows"] = $this->common->count_usergig();
		}

		$config = array();
		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		$result = $this->common->getusergig($start,$config["per_page"]);

		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
				$result[$key]->tcount = $this->common->count_all_results('user_gig',array("userId"=>$res->u_id));
			}
		}

		 if($result)
		 {
			$msg['message'] ="true";
			$msg['result'] = $result;
		 }
		 else
		 {
			$msg['message'] ="false";
			$msg['result'] ='';
			}

			echo json_encode($msg);
			exit;
	}

	public function gig($id)
	{
		$data['gigId'] = $id;
		$this->load->view('admin/header');
		$this->load->view('admin/giglist',$data);
		$this->load->view('admin/footer');
	}

	public function getgig()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$config = array();

		$data['pcount'] = $this->common->count_all_results('user_gig',array("userId"=>$results->userId));
		$config["total_rows"] = $this->common->count_all_results('user_gig',array("userId"=>$results->userId));
		$config["per_page"] = 10;
		$this->pagination->initialize($config);
		if( $page <= 0 )
		{
			$page = 1;
		}
		$start = ($page-1) * $config["per_page"];
		if(!empty($page))
		{
			$res = $this->common->getgig(array("userId"=>$results->userId),$start,$config["per_page"]);
		}
		if($res)
	 {
		 $data['message'] ="true";
		 $data['result'] = $res;
		 $data['start'] = $start + 1;
	 }
	 else
	 {
		 $data['message'] ="false";
		 $data['result'] = '';
	 }

	 echo json_encode($data);
	 exit;
	}

	public function gigview()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$res = $this->common->getgigView(array("gigId"=>$results->gigId));
		if($res)
		{
			$res->basic = $this->common->get('user_gig_plan',array("gigId"=>$results->gigId,"plan"=>1));
			$res->standard = $this->common->get('user_gig_plan',array("gigId"=>$results->gigId,"plan"=>2));
			$res->premium = $this->common->get('user_gig_plan',array("gigId"=>$results->gigId,"plan"=>3));
			$res->task = $this->common->get('user_gig_task',array("gigId"=>$results->gigId));
		}

		if($res)
		{
		 $data['message'] ="true";
		 $data['result'] =$res;
		}
		else
		{
		 $data['message'] ="false";
		}
		echo json_encode($data);
		 exit;
	}
	// gig

	// custom package
	  public function customPackage()
		{
			$this->load->view('admin/header');
			$this->load->view('admin/customPackage');
			$this->load->view('admin/footer');
		}

		public function getcompanyPackage()
		{
			$res = $this->common->getrow('custom_plan',array("type"=>1));
			if($res)
			{
				$output['success'] ="true";
				$output['result'] =$res;
			}
			else
			{
				$output['success'] ="false";
				$output['result'] ='';
			}
			echo json_encode($output);
			exit;
		}
		public function getclientPackage()
		{
			$res = $this->common->getrow('custom_plan',array("type"=>2));
			if($res)
			{
				$output['success'] ="true";
				$output['result'] =$res;
			}
			else
			{
				$output['success'] ="false";
				$output['result'] ='';
			}
			echo json_encode($output);
			exit;
		}

		public function customPackageUpdate()
		{
			$array = file_get_contents('php://input');
		  $results =json_decode($array);

			$res = $this->common->getrow('custom_plan',array("type"=>$results->type));
			if(!empty($res))
			{
				$update = $this->common->update(array("customPackageId"=>$res->customPackageId),$results,'custom_plan');

			}
			else
			{
        $update = $this->common->insert('custom_plan',$results);
			}
			if($update)
			{
				$output['success'] ="true";
			}
			else
			{
				$output['success'] ="false";
		  }
			echo json_encode($output);
			exit;
		}
	// custom package











}
