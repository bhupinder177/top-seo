<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this->load->model('common');


	}


  public function index()
	{
		redirect('client-dashboard');
	}

	public function dashboard()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$data['users'] = $this->common->getSingleUser(array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		$spend = $results = $this->common->SumEarning(array("userId"=>$this->session->userdata['clientloggedin']['id']));
		$data['jobpost'] = $this->common->count_all_results('user_joboffer',array("offFrom"=>$this->session->userdata['clientloggedin']['id']));
		$data['contract'] = $this->common->count_all_results('user_jobcontract',array("clientId"=>$this->session->userdata['clientloggedin']['id'],"contractStatus"=>1));
		$data['spend'] = $this->common->clientSpendAmount(array("clientId"=>$this->session->userdata['clientloggedin']['id']));
		$data['hired'] = $this->common->countHiredFreelancer('user_jobcontract',array("clientId"=>$this->session->userdata['clientloggedin']['id']));
		$data['review'] = $this->common->count_all_results('user_review',array("reviewTo"=>$this->session->userdata['clientloggedin']['id'],"reviewType"=>'total'));
		$data['notification'] = $this->common->getlimitnotification(array("notificationTo"=>$this->session->userdata['clientloggedin']['id']));
		$reviewlatest = $this->common->getlatestreview(array("reviewTo"=>$this->session->userdata['clientloggedin']['id'],"reviewType"=>'review'));
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
				$reviewlatest[$key]->star = $star->reviewOverall / 2;
			}
		}
		$data['reviewlatest'] = $reviewlatest;


		if($spend->total != '')
		{
		 $data['spend'] = round($spend->total);
		}
		else
		{
		 $data['spend'] = 0;
		}
    $t['title'] = "Client Dashboard";
		$this->load->view('client/header',$t);
		$this->load->view('client/dashboard',$data);
		$this->load->view('client/footer');
	  }
		else
		{
		 redirect('login');
		}
	}

	public function chat()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
			$t['title'] ="Real Time Chat | Group Chat | Team Chat";
		  $this->load->view('client/header',$t);
		  $this->load->view('client/chat');
		  $this->load->view('client/footer');
	  }
		else
		{
		 redirect('login');
		}

	}

	public function getperson()
	{
		$person = array();
		if(isset($this->session->userdata['clientloggedin']))
		{
			$id = $this->session->userdata['clientloggedin']['id'];
			$person = $this->common->chatPerson($id);
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');
			foreach($person as $key=>$per)
			{
       	$ctime = strtotime($date) - strtotime($per->ctimestamp);
				$ftime = strtotime($date) - strtotime($per->ftimestamp);
         if($ctime > 20)
				 {
					 $person[$key]->conline ="0";
				 }
				 else
				 {
					 $person[$key]->conline ="1";
					 // print_r($person[$key]->friendId);
					 // die;
				 }

				 if($ftime > 20)
				 {
					 $person[$key]->fonline ="0";
				 }
				 else
				 {
					 $person[$key]->fonline ="1";
				 }
			}
		}
		if($person)
		{
			$data['message'] = "true";
			$data['person'] = $person;
		}
		else
		{
			$data['message'] ="false";
			$data['person']='';
		}

		echo json_encode($data);
	}

	public function getmessage($rid,$friendId,$lastmessageId = null)
	{

		if(isset($this->session->userdata['clientloggedin']))
		{
			$id = $this->session->userdata['clientloggedin']['id'];
			if(empty($lastmessageId))
			{
				$message = $this->common->getmessage($id,$rid,$friendId);
			}
			else
			{
				$message = $this->common->getmessageLatest($id,$rid,$friendId,$lastmessageId);
			}
		}
		// echo "<pre>";
		// print_r($message);
		// die;
		if($message)
		{
			$data['message']="true";
			$data['results'] = $message;
		}
		else
		{
			$data['message']="true";
			$data['results'] = '';
		}
		echo json_encode($data);

	}

	public function getsession()
	{
		$data = array();
		$id = '';
		if(isset($this->session->userdata['clientloggedin']))
		{
			$id = $this->session->userdata['clientloggedin']['id'];
			$name = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			$type = $this->session->userdata['clientloggedin']['type'];

		}
		if($id)
		{
			$data['message'] = "true";
			$data['userid'] = $id;
			$data['name'] = $name->name;
			$data['image'] =$name->logo;
			$data['type'] = $type;
		}
		else
		{
		 $data['message'] = "false";
		}
		echo json_encode($data);
	}

	public function friendrequest()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$status = $results->friendStatus;
		$friendId = $results->friendId;

		$request = $this->common->update(array("friendId"=>$friendId),array("friendStatus"=>$status),'user_friendcontact');

		if($request)
		{
			$msg['message'] ="true";
			$msg['status'] = $status;
		}

		else
		{
			$msg['message'] ="false";
		}
		echo json_encode($msg);
	}

	public function messageSend()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		$data = array(
			"messageFrom"=>$results->messageFrom,
			"messageTo"=>$results->messageTo,
			"messageText"=>$results->messagetext,
			"messageAttachment"=>$results->messageAttachment,
			"messageDate"=>$date,
			"messageStatus"=>0,
			"friendId" => $results->friendId,
		);
		$insert = $this->common->insert('user_message',$data);

		if($insert[0] == 1)
		{
			$lastId =	$insert[1];
			$lastmessage = $this->common->getmessagerow(array('messageId'=>$lastId));

		}

		if($lastmessage)
		{
			$msg['message'] = "true";
			$msg['result'] = $lastmessage;
		}
		else
		{
			$msg['message'] = "false";
		}

		echo json_encode($msg);
	}

	public function messageUpdate()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);


		$data = array(
			"messageText"=>$results->messagetext,
			"messageEdited"=>'1',
		);

		$update = $this->common->update(array("messageId"=>$results->messageId),$data,'user_message');

		if($update)
		{
			$msg['message'] = "true";
		}
		else
		{
			$msg['message'] = "false";
		}

		echo json_encode($msg);
	}

	public function messageDeleted()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);


		$data = array(
			"messageDeleted"=>'1',
		);

		$update = $this->common->update(array("messageId"=>$results->messageId),$data,'user_message');

		if($update)
		{
			$msg['message'] = "true";
		}
		else
		{
			$msg['message'] = "false";
		}

		echo json_encode($msg);
	}





	public function client_profile()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$this->load->view('client/header');
		$this->load->view('client/profile');
		$this->load->view('client/footer');
	  }
		else
		{
			redirect('login');
		}
	}

	public function getprofile()
 {
	 $states ='';
	 $city = '';
	 $profile = $this->common->getprofile(array("us.id"=>$this->session->userdata['clientloggedin']['id']));
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

	public function client_profileUpdate()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		if(empty($results->logo))
		{
			unset($results->logo);
		}

		$profile = $this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),$results,'user_meta');

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

	public function client_profileSave()
	{
		$config['upload_path'] = 'assets/client_images';
		$config['file_name'] = $_FILES['image']['name'];
		$config['overwrite'] = TRUE;
		$config["allowed_types"] = 'jpg|jpeg|png|gif';
		$config["max_size"] = 10024;

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('image'))
		{
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
		}
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$_POST['logo'] = $file_name;
		$_POST['u_id'] = $this->session->userdata['clientloggedin']['id'];
		$_POST['date_created'] = $date;
		$_POST['date_updated'] = $date;
		unset($_POST['hd_image']);


		$success = $this->common->insert('user_meta',$_POST);

		if ($success)
		{
			$this->session->set_flashdata('success_message', 'Profile updated successfully.');
		}
		else
		{
			$this->session->set_flashdata('failure_message', 'Error occured.');
		}

		redirect('client-profile');
	}

	public function job_post()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		 $data['title'] = "Job Details And Proposal Listing";
		 $this->load->view('client/header',$data);
		 $this->load->view('client/job');
		 $this->load->view('client/footer');
	  }
		else
		{
			redirect('login');
		}
	}

	public function getjobs()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		if(!empty($page))
		{
			// $data['pcount'] = $this->common->count_all_results('user_joboffer',array("offFrom"=>$this->session->userdata['clientloggedin']['id']));
			// $config["total_rows"] = $this->common->count_all_results('user_joboffer',array("offFrom"=>$this->session->userdata['clientloggedin']['id']));
			$data['pcount'] = count($this->common->count_clientjobs(array("jb.offFrom"=>$this->session->userdata['clientloggedin']['id'])));
			$config["total_rows"] = count($this->common->count_clientjobs(array("jb.offFrom"=>$this->session->userdata['clientloggedin']['id'])));
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
			$jobs = $this->common->getjobs(array("offFrom"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
		}

		if(!empty($jobs))
		{
			foreach($jobs as $key=>$job)
			{

				  $jobs[$key]->proposal = $this->common->count_all_results('user_job_proposal',array("jobId"=>$job->jobId));
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
		exit;
	}



	public function jobdetail($id)
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
	  {
		 $data['jobId'] = $id;
		 $job = $this->common->getrow('user_job',array("jobId"=>$id));
		 $ser = $this->common->getrow('services',array("id"=>$job->servicesId));
		 $ind = $this->common->getjobIndustry(array("us.jobId"=>$id));
		 $t['title'] =  $ind[0]->industry." | ".$ser->name." | Job Detailing";

		 $this->load->view('client/header',$t);
		 $this->load->view('client/jobdetail',$data);
		 $this->load->view('client/footer');
	  }
		else
		{
			redirect('login');
		}
	}

	public function getjobdetail()
	{
		$id ='';
		$jobs ='';
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		if(!empty($results->id))
		{
			$id = $results->id;
		}
		// $id = 1;

		if(!empty($id))
		{
			$jobs = $this->common->getClientJobDetail(array("jb.jobId"=>$id));

			if(!empty($jobs))
			{
				$jobs->milestone = $this->common->get('user_offermilestone',array("jobId"=>$id));
        $jobs->skills = $this->common->getjobskill(array("us.jobId"=>$id));
				$jobs->industry = $this->common->getjobIndustry(array("us.jobId"=>$id));
				$c = $this->common->getrow('currency',array("id"=>$jobs->currencyId));
				$service = $this->common->getrow('services',array("id"=>$jobs->servicesId));


				if(!empty($c))
				{
				 $jobs->currencycode = $c->code;
				 $jobs->currencysymbol = $c->symbol;
			  }
				if(!empty($service))
				{
					$jobs->services = $service->name;
				}

				foreach($jobs->milestone as $key=>$m)
				{

					$jobs->milestone[$key]->task = $this->common->get('user_milestonetask',array("milestoneId"=>$m->milestoneId));

				}
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


	public function contract()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
			$t['title'] = "Contract Jobs | Active Jobs";
		$this->load->view('client/header',$t);
		$this->load->view('client/contract');
		$this->load->view('client/footer');
	  }
		else
		{
		  redirect('login');
		}
	}

	public function getcontract()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		if(!empty($page))
		{
			$data['pcount'] = $this->common->count_all_results('user_jobcontract',array("clientId"=>$this->session->userdata['clientloggedin']['id']));
			$config["total_rows"] = $this->common->count_all_results('user_jobcontract',array("clientId"=>$this->session->userdata['clientloggedin']['id']));
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
			$jobs = $this->common->getclientcontract(array("clientId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
		}

		if(!empty($jobs))
		{
			foreach($jobs as $k=>$job)
			{
				$m = $this->common->getrow('user_offermilestone',array("jobId"=>$job->jobId,"milestoneStatus"=>1));
				if(!empty($m))
				{
				 $jobs[$k]->milestone = $m->milestoneTitle;
				 $jobs[$k]->milestoneAmount = $m->milestoneAmount;
				}
				else
				{
					$jobs[$k]->milestone = "";
					$jobs[$k]->milestoneAmount = "";


				}
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

	public function contractdetail($id)
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$data['contract'] = $id;
		$this->load->view('client/header');
		$this->load->view('client/contractdetail',$data);
		$this->load->view('client/footer');
	  }
		else
		{
			redirect('login');
		}
	}

	public function getcontractdetail()
	{
		$id ='';
		$jobs ='';
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		if(!empty($results->id))
		{
			$id = $results->id;
		}

		if(!empty($id))
		{
			$jobs = $this->common->getContractDetail(array("jc.contractId"=>$id));


			if(!empty($jobs))
			{
				$jobs->milestone = $this->common->get('todoList',array("contractId"=>$id,"milestone"=>1,"type"=>3));

				$c = $this->common->getrow('currency',array("id"=>$jobs->currencyId));

				if(!empty($c))
				{
				 $jobs->code = $c->code;
				 $jobs->symbol = $c->symbol;
			  }

				foreach($jobs->milestone as $key=>$m)
				{
					$tasks = $this->common->get('todoList',array("parent"=>$m->id,"milestone"=>0,"type"=>3,"contractId"=>$id,));
          $payment = $this->common->getrow('contract_payment',array("contractId"=>$id,"milestoneId"=>$m->id));
					foreach($tasks as $k=>$t)
					{
          $log = $this->common->getOneRow('user_log',array("logReference"=>$t->contractId),'logId','desc');
						if(!empty($log))
						{
							$tasks[$k]->log = $log->logStatus;
						}
						else
						{
							$tasks[$k]->log = 0;
						}
					}
					$jobs->milestone[$key]->task = $tasks;
					if(!empty($payment))
					{
					$jobs->milestone[$key]->receivedAmount = $payment->receivedAmount;
					$jobs->milestone[$key]->paymentStatus = $payment->paymentStatus;
				  }
					else
					{
						$jobs->milestone[$key]->receivedAmount = '';
						$jobs->milestone[$key]->paymentStatus = '';
					}

				}

			}

		}

		if(!empty($jobs->contractEndDate))
		{
		  $jobs->reviewlastdate = date('Y-m-d', strtotime($jobs->contractEndDate. ' + 14 days'));
		  $jobs->todaydate = $date;
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



	public function chatpersonFilter()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$filter = $results->filter;

		if(isset($this->session->userdata['clientloggedin']))
		{
			$id = $this->session->userdata['clientloggedin']['id'];
			if($filter == 1)
			{

				$person = $this->common->chatPerson($id);
			}
			else if($filter == 2)
			{
				$person = $this->common->chatActivePerson($id,1);
			}
			else if($filter == 3)
			{
				$person = $this->common->chatActivePerson($id,2);
			}
			else if($filter == 4)
			{
				$person = $this->common->followupPerson($id);
			}
		}


		if($person)
		{
			$data['message'] = "true";
			$data['person'] = $person;
		}
		else
		{
			$data['message'] ="false";
			$data['person']='';
		}

		echo json_encode($data);

	}

	public function notification()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
			$data['pcount'] = $this->common->count_all_results('user_notification',array("notificationTo"=>$this->session->userdata['clientloggedin']['id'],"notificationStatus"=>0));
			$config = array();
			$config["base_url"] = base_url() . "notification/";
			$config["total_rows"] = $this->common->count_all_results('user_notification',array("notificationTo"=>$this->session->userdata['clientloggedin']['id'],"notificationStatus"=>0));
			$config["per_page"] = 10;
			$config["uri_segment"] = 2;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			if( $page <= 0 )
			 {
			 $page = 1;
			 }
			 $start = ($page-1) * $config["per_page"];
		  $data['notification'] = $this->common->getNotification(array("notificationTo"=>$this->session->userdata['clientloggedin']['id'],"notificationStatus"=>0),$start,$config["per_page"]);
		  $data["links"] = getPagination($config["per_page"],$config["total_rows"],$config["base_url"],$config["uri_segment"],1);

		$this->load->view('client/header');
		$this->load->view('client/notification',$data);
		$this->load->view('client/footer');
	  }
		else
		{
		 redirect('login');
		}
	}


	public function getNotification()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$lastId ='';
		if(!empty($results->lastid))
		{
			$lastId = $results->lastid;
		}

		if(!empty($page))
		{
			if(!empty($lastId))
			{
				$data['pcount'] = $this->common->count_LatestNotification('user_notification',array("notificationTo"=>$this->session->userdata['clientloggedin']['id']),$lastId);
				$config["total_rows"] = $this->common->count_LatestNotification('user_notification',array("notificationTo"=>$this->session->userdata['clientloggedin']['id']),$lastId);
			}
			else
			{
				$data['pcount'] = $this->common->count_all_results('user_notification',array("notificationTo"=>$this->session->userdata['clientloggedin']['id']));
				$config["total_rows"] = $this->common->count_all_results('user_notification',array("notificationTo"=>$this->session->userdata['clientloggedin']['id']));
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
			$notification = $this->common->getNotification(array("NotificationTo"=>$this->session->userdata['clientloggedin']['id']),$lastId,$start,$config["per_page"]);
		}

		if($notification)
		{
			$data['message'] ="true";
			$data['result'] = $notification;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
	}

	public function getOneNotification()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$id = $results->id;
		if($id)
		{
			$update = $this->common->update(array("NotificationId"=>$id),array("notificationStatus"=> 1),'user_notification');
			$notification = $this->common->getOneNotification(array("NotificationId"=>$id));
		}

		if($notification)
		{
			$data['message'] ="true";
			$data['result'] = $notification;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
	}

	public function password()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$this->load->view('client/header');
		$this->load->view('client/password');
		$this->load->view('client/footer');
	  }
		else
		{
		 redirect('login');
		}
	}

	public function password_update()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$pass = md5($results->pass);

		$update = $this->common->update(array("id"=>$this->session->userdata['clientloggedin']['id']),array("pass"=>$pass),'user');

		if($update)
		{
      $msg['message']="true";
		}
		else
		{
		 $msg['message']="false";
		}
		echo json_encode($msg);
	}

	public function mailsend($sub,$to,$msg)
	{
	 $ci = & get_instance();
	 $ci->email_var = array(
		 'site_title' => $ci->config->item('site_title'), 'site_url' => site_url()
	 );

	 $ci->config_email = Array (
		 'protocol' => "smtp",
		 'smtp_host' => "ssl://smtp.googlemail.com",
		 'smtp_port' => '465',
		 'smtp_user' => 'topseos.companies@gmail.com',
     'smtp_pass' => 'Onewayit@786',
		 'mailtype' => "html",
		 'wordwrap' => TRUE,
		 'crlf' => '\r\n',
		 'charset' => "utf-8"
	 );
	 $ci->email->initialize($ci->config_email);
	 $ci->email->set_newline("\r\n");
	 $ci->email->from('noreply@top-seo.com', 'TOP-SEOs');

	 $ci->email->to($to);
	 $ci->email->subject($sub);
	 $ci->email->message($msg);

	 if ($ci->email->send()) {
		 $ci->email->clear(TRUE);
		 return TRUE;
	 } else {
		 //echo $ci->email->print_debugger();
		 return FALSE;
	 }
 }

	public function milestoneRequest()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		$status = $this->common->update(array("milestoneId"=>$results->milestoneId),array("milestoneStatus"=>$results->status),'user_offermilestone');
    $milestonedata = $this->common->getrow('user_offermilestone',array("milestoneId"=>$results->milestoneId));

		$log['logType'] = 'contract';
		$log['logSubType'] ="milestone";
		$log['logReference'] = $results->milestoneId;
		$log['userId'] = $this->session->userdata['clientloggedin']['id'];
		if($results->status == 3)
		{
		$log['logText'] = "<span>".$milestonedata->milestoneTitle."</span> milestone status changed to completed";
	   }
		 else
		 {
			 $log['logText'] = "<span>".$milestonedata->milestoneTitle."</span> milestone status changed to not completed";
		 }
		$log['logDate'] = $date;
		$loginsert = $this->common->insert('user_log',$log);

    if($results->status == 3 )
		{
			$detail['milestone'] = $this->common->getrow('user_offermilestone',array("milestoneId"=>$results->milestoneId));
			$detail['user'] = $this->common->getuserdetail(array("u_id"=>$results->freelancerId));
			$message = $this->load->view('email/milestone_approved',$detail,true);
			$this->mailsend('Top-seo Notification',$detail['user']->email,$message);
		}

		if($status)
		{
			$success['message'] = "true";
 	  }
 	 else
 	 {
 		 $success['message'] = "false";
 	 }
	 echo json_encode($success);
	 exit;
	}

	public function milestoneStart()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		if(!empty($results->milestoneId))
		{
			$status = $this->common->update(array("milestoneId"=>$results->milestoneId),array("milestoneStatus"=>$results->status),'user_offermilestone');
			$milestonedata = $this->common->getrow('user_offermilestone',array("milestoneId"=>$results->milestoneId));

			$detail['milestone'] = $this->common->getrow('user_offermilestone',array("milestoneId"=>$results->milestoneId));
			$detail['user'] = $this->common->getuserdetail(array("u_id"=>$results->freelancerId));
			$detail['from'] = $this->common->getuserdetail(array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			$detail['msg'] = $results->message;
			$message = $this->load->view('email/milestone_start',$detail,true);
			$this->mailsend('Top-seo Notification',$detail['user']->email,$message);
		}

		if($status)
		{
			$data1 = array(
			 "messageFrom"=>$this->session->userdata['clientloggedin']['id'],
			 "messageTo"=>$results->freelancerId,
			 "messageText"=>$results->message,
			 "messageDate"=>$date,
			 "messageStatus"=>0,
		 );
		 $message = $this->common->insert('user_message',$data1);

		 $m = $milestonedata->milestoneTitle ."milestone start.";
		 $Notificationdata = array(
			 "notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
			 "notificationTo" =>$results->freelancerId,
			 "notificationMessage" => $m,
			 "notificationDate" => $date,
			 "notificationStatus" => 0,
			 "notificationDeleted" =>0,
		 );
		 $notification = $this->common->insert('user_notification',$Notificationdata);


		}

		if($notification)
		{
			$success['message']= "true";
		}
		else
		{
			$success['message']= "false";
		}

		echo json_encode($success);
		exit;
	}

	public function client_review()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');


		// $t =0;
	  // $t = $results->total * $results->overall;
		$t =0;
		$total   = $results->total * 10;
		$overall = $results->overall * 10;
		$to = $total + $overall;
		$t = $to / 2;
		$currency = $this->common->Contractcurrency(array("contractId"=>$results->contractId));
    $budget = $this->common->getrow('user_jobcontract',array("contractId"=>$results->contractId));

		$insert=array(
    array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'overall','reviewOverall'=>$results->overall),
    array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'communication','reviewOverall'=>$results->communication * 0.20),
    array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'skill','reviewOverall'=>$results->skill * 0.40),
    array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'rehire','reviewOverall'=>$results->rehire * 0.40),
    array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'quality','reviewOverall'=>$results->quality * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'deadline','reviewOverall'=>$results->deadline * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'cooperation','reviewOverall'=>$results->cooperation * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'cost','reviewOverall'=>$results->cost * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'availability','reviewOverall'=>$results->availability * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'review','reviewOverall'=>$results->review),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'total','reviewOverall'=>$t),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'star','reviewOverall'=>$results->total)
    );

		$review = $this->common->insert_batch('user_review',$insert);
		$contract = $this->common->update(array("contractId"=>$results->contractId),array("contractStatus"=>2,"contractEndDate"=>$date,"clientEnd"=>1),'user_jobcontract');

		if($contract)
		{
			if($currency->code != "USD")
			{
			 $req_url = 'http://api.currencylayer.com/live?access_key=031baf11c79af954ce1448577e48174a&format=1';
			 $response_json = file_get_contents($req_url);
			 $response = json_decode($response_json);
			 if($response->success == 1)
			 {
				 $c = "USD".$currency->code;
         $rates = $response->quotes->$c;
				 $amount = $budget->contractAmount;
				 $usdAmount = $amount / $rates;
			 }
		}
		 else
		 {
       $usdAmount = $budget->contractAmount;
		 }
		 $checkEarning = $this->common->getrow('userEarning',array("contractId"=>$results->contractId));
	 }
	 if(empty($checkEarning))
	 {
		 $this->common->insert('userEarning',array("contractId"=>$results->contractId,"userId"=>$results->freelancerId,"userEarningAmount"=>$usdAmount,"date"=>$date));
		 $this->common->insert('userEarning',array("contractId"=>$results->contractId,"userId"=>$this->session->userdata['clientloggedin']['id'],"userEarningAmount"=>$usdAmount,"date"=>$date));
	 }


		if($contract)
		{
			$success['message'] ="true";
		}
		else
		{
		  $success['message'] ="false";
		}
		echo json_encode($success);
		exit;
	}

	public function getallreview()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

	  $review =	$this->common->get('user_review',array("contractId" => $results->contractId));

		 if($review)
		 {
			 $success['message'] = "true";
			 $success['result'] = $review;
		 }
		 else
		 {
		   $success['message'] ="false";
		 }
		 echo json_encode($success);
	}

	public function getclientReview()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

	  $review =	$this->common->get('user_review',array("contractId" => $results->contractId,"reviewFrom"=>$this->session->userdata['clientloggedin']['id']));

		 if($review)
		 {
			 $success['message'] = "true";
			 $success['result'] = $review;
		 }
		 else
		 {
		   $success['message'] ="false";
		 }
		 echo json_encode($success);
	}

	public function event($id = null)
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		  $data = array();
      if(isset($id))
		  {
		   $data['attendeeId'] = $id;
	    }

		 $this->load->view('client/header');
		 $this->load->view('client/event',$data);
		 $this->load->view('client/footer');
	 }
	 else
	 {
		 redirect('login');
	 }
	}

	 public function getuser()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $userId = $results->userId;

		 if(isset($userId))
		 {
			$result = $this->common->getSingleUser(array("us.id"=>$userId));

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

	 public function eventSave()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		$date = date('Y-m-d',strtotime($results->date));

		  $eventData = array(
			 "eventTitle"=>$results->title,
			 "eventNote"=>$results->note,
			 "eventTime"=>$results->time,
			 "eventDate"=>$date,
			 "eventAddedBy"=>	$this->session->userdata['clientloggedin']['id'],
			);
		 $event = $this->common->insert('event',$eventData);
		 if($event[0]== 1)
		 {
			 $attdendee = $this->common->insert('event_attendee',array("u_id"=>$results->attendeeId,"eventId"=>$event[1]));
		 }
		 if($attdendee)
		 {
			 $success['message'] ="true";
		 }
		 else
		 {
		   $success['message'] ="false";
		 }
		 echo json_encode($success);
	 }


		public function getevent()
		{
			$array = file_get_contents('php://input');
 		  $results =json_decode($array);

			$event = $this->common->getevent(array("ev.eventAddedBy"=>$this->session->userdata['clientloggedin']['id']),array("u_id"=>$results->attendeeId));
			if($event)
			{
				$success['message'] = "true";
				$success['result'] = $event;
			}
			else
			{
			  $success['message'] ="false";
			}
			echo json_encode($success);
		}

		public function test()
		{
     $date = "2019-01-08T18:30:00.000Z";

     $date = strtotime($date);
     $date = strtotime("+1 day", $date);
     echo date('Y-m-d', $date);

		}

		public function taskRequest()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			$results->logType = 'contract';
			$results->logSubType ="task";
			$results->userId = $this->session->userdata['clientloggedin']['id'];
			$title = $this->common->getrow('user_milestonetask',array("taskId"=>$results->logReference));
			if($results->logStatus == 1)
			{
			$t = "<span>".$title->taskTitle. "</span>  task status changed to  completed";
		  }
			else
			{
			 $t = "<span>".$title->taskTitle. "</span>  task status changed to not completed";
			}
			$results->logText = $t;
			$results->logDate = $date;

			$log = $this->common->insert('user_log',$results);

			if($log)
			{
				$msg['message'] ="true";
			}
			else
			{
			 $msg['message'] ="false";
			}
			echo json_encode($msg);
		}


		public function logcomment()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d H:i:s');

		 $results->logType = 'contract';
		 $results->logSubType ="comment";
		 $results->userId = $this->session->userdata['clientloggedin']['id'];
		 $results->logDate = $date;

		 $log = $this->common->insert('user_log',$results);

		 if($log)
		 {
			 $msg['message'] ="true";
		 }
		 else
		 {
			$msg['message'] ="false";
		 }
		 echo json_encode($msg);
	 }

	 public function milestone_review()
 	 {
 		$array = file_get_contents('php://input');
 		$results =json_decode($array);
 		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
 		$date =  $nowUtc->format('Y-m-d H:i:s');


				$t =0;
			  $t = $results->total * $results->overall;

			$insert=array(
	    array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'overall','reviewOverall'=>$results->overall),
	    array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'communication','reviewOverall'=>$results->communication * 0.20),
	    array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'skill','reviewOverall'=>$results->skill * 0.40),
	    array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'rehire','reviewOverall'=>$results->rehire * 0.40),
	    array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'quality','reviewOverall'=>$results->quality * 0.20),
			array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'deadline','reviewOverall'=>$results->deadline * 0.20),
			array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'cooperation','reviewOverall'=>$results->cooperation * 0.20),
			array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'cost','reviewOverall'=>$results->cost * 0.20),
			array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'availability','reviewOverall'=>$results->availability * 0.20),
			array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'review','reviewOverall'=>$results->review),
			array('milestoneId'=>$results->milestoneId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'total','reviewOverall'=>$t)
	    );

 		$review = $this->common->insert_batch('user_review',$insert);
 		$contract = $this->common->update(array("milestoneId"=>$results->milestoneId),array("milestoneStatus"=>4),'user_offermilestone');
 		if($review)
 		{
 			$success['message'] ="true";
 		}
 		else
 		{
 		  $success['message'] ="false";
 		}
 		echo json_encode($success);
 		exit;
 	}

	public function createjob()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$milestone = $results->milestone;
		$skill = $results->skill;
		$industry = $results->industry;

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$expire = date('Y-m-d H:i:s',strtotime('+30 days',strtotime($date)));
		$data = array(
			"jobTitle"=>$results->jobtitle,
			"jobDescription"=>$results->description,
			"jobAttchment" =>$results->image,
			"industryId" =>'ss',
			"servicesId"=>$results->service,
			"jobRequiredFreelancer"=>$results->required,
			"jobEstimateHours"=>$results->hourlyPrice,
			"jobEstimateHourlyPrice"=>$results->estimatehours,
			"jobBudget"=>$results->budget,
			"currencyId"=>$results->currencyId,
			"jobType"=>$results->jobType,
			"jobStatus" => 0,
			"jobDate"=>$date,
			"jobStatus"=>0,
			"jobExpire"=>$expire,
		);
		$success = $this->common->insert('user_job',$data);

		 if(!empty($skill))
		 {
				foreach($skill as $s)
				{
					if($s->id == 0)
					{
						$newservice = $this->common->insert('services',array("name"=>$s->name,"date_created"=>$date));

						$sdata =array(
						"jobId"=>$success[1],
						"value"=>$newservice[1],
						"type"=>"service",
						);
					}
					else
					{
						$sdata =array(
						"jobId"=>$success[1],
						"value"=>$s->id,
						"type"=>"service",
						);
					}

				$skillInsert = $this->common->insert('job_meta',$sdata);
				}
		 }

		 if(!empty($industry))
		 {
			 foreach($industry as $i)
			 {
				 if($i->id == 0)
				 {
          $newindustry = $this->common->insert('practice_areas',array("name"=>$i->name,"date_created"=>$date));

					 $sdata =array(
					 "jobId"=>$success[1],
					 "value"=>$newindustry[1],
					 "type"=>'industry',
				    );
				 }
				 else
				 {
					 $sdata =array(
					 "jobId"=>$success[1],
					 "value"=>$i->id,
					 "type"=>'industry',
					 );
				 }

			 $industryInsert = $this->common->insert('job_meta',$sdata);
			 }
		 }

		if($success[0] == 1)
		{
			$jobofferdata = array(
				"offTo"=>0,
				"offFrom"=>$this->session->userdata['clientloggedin']['id'],
				"offDate"=>$date,
				"offStatus"=>0,
				"jobId"=>$success[1],
			);

			$joboffer = $this->common->insert('user_joboffer',$jobofferdata);

		}


		// if($success[0] == 1)
		// {
		// 	$jobId =	$success[1];
		// 	if(!empty($milestone) && count($milestone) > 0)
		// 	{
		// 		foreach($milestone as $key=>$m)
		// 		{
		// 			$mdata =array(
		// 				"jobId"=>$jobId,
		// 				"milestoneTitle"=>$m->title,
		// 				"milestoneAmount"=>$m->price,
		// 				"milestoneStatus"=>0
		// 			);
		// 			$milestone = $this->common->insert('user_offermilestone',$mdata);
		//
		// 			if(!empty($m->task))
		// 			{
		// 				foreach($m->task as $t)
		// 				{
		// 					$tdata =array(
		// 						"milestoneId"=>$milestone[1],
		// 						"taskTitle"=>$t->task,
		// 						"taskStatus"=>0,
		// 						"taskDate"=>$date,
		// 					);
		// 					$task = $this->common->insert('user_milestonetask',$tdata);
		// 				}
		// 			}
		// 		}
		// 	}
		// }
		if($success)
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

	public function create_milestone()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$milestone = $results->milestone;
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
    $milestoneTotal = 0;
    $contract = $this->common->getrow('user_jobcontract',array("contractId"=>$results->contractId));


			if(!empty($milestone))
			{
				foreach($milestone as $key=>$m)
				{
					$milestoneTotal += $m->price;
					$ids = $this->common->getone('todoList','id','desc');
					if(!empty($ids))
					{
					 $xx = $ids->id + 1;
					 $taskId = "TS000".$xx;
					 }
					 else
					 {
						$taskId = 'TS0001';
					 }

					$mdata =array(
						"contractId"=>$results->contractId,
						"name"=>$m->title,
						"amount"=>$m->price,
						"status"=>2,
						"milestone"=>1,
						"type"=>3,
						"taskId"=>$taskId,
					);
					$milestone = $this->common->insert('todoList',$mdata);

					if(!empty($m->task))
					{
						foreach($m->task as $t)
						{
							$ids1 = $this->common->getone('todoList','id','desc');
							if(!empty($ids1))
							{
							 $xx1 = $ids1->id + 1;
							 $taskId1 = "TS000".$xx1;
							 }
							 else
							 {
								$taskId1 = 'TS0001';
							 }
							$tdata =array(
								"parent"=>$milestone[1],
								"name"=>$t->task,
								"hours"=>$t->hours,
								"HourlyPrice"=>$t->hourlyPrice,
								"amount"=>$t->amount,
								"status"=>2,
								"contractId"=>$results->contractId,
								"type"=>3,
								"taskId"=>$taskId1,
							);
							$task = $this->common->insert('todoList',$tdata);
						}
					}
				}
			}

			if($milestone)
			{
				$total =   $contract->contractAmount + $milestoneTotal;

				$jobUpdate = $this->common->update(array('contractId'=>$results->contractId),array("contractAmount"=>$total),'user_jobcontract');
			}

		if($jobUpdate)
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

	public function getservice()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);
     $ids =array();
		$arr = $results->id;

		foreach($arr as $a)
		{
		  	$ids[] = $a->id;
		}

	 $res = $this->common->getInserviceIndustry($ids);

	 if($res)
	 {
		 $msg['message'] ="true";
		 $msg['result'] = $res;
	 }
	 else
	 {
		$msg['message'] ="false";
	 }
	 echo json_encode($msg);
 }

	public function payment()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		 $data['payment'] = $this->common->getrow('user_account',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		 $this->load->view('client/header');
		 $this->load->view('client/payment',$data);
		 $this->load->view('client/footer');
	  }
		else
		{
		  redirect('login');
		}
	}

	public function paypal()
	{
		$this->load->view('client/paypal');
	}

	public function paypalIpn()
	{
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		error_log(json_encode($_POST), 1, "gurbinder@1wayit.com");


		if($_POST['payment_status'] == 'Completed')
		{
			$data = explode(',',$_POST['custom']);
			//error_log(json_encode($data), 1, "nitindeveloper23@gmail.com");
		//	error_log($data[1].'test', 1, "gurbinder@1wayit.com");

			if($data[1] == "linktest")
			{
				$d['accountEmail'] = $_POST['payer_email'];
				$d['u_id'] = $data[0];
				$this->common->insert('user_account',$d);
			}
			else if($data[1] == "milestone")
			{
				$mil['payementFrom'] = $data[0];
				$mil['paymentTo'] = $data[2];
				$mil['paymentReferenceId'] =$data[3];
				$mil['paymentType'] = "milestone";
				$mil['paymentStatus'] = 1;
				$this->common->insert('user_payment',$mil);
				$this->common->update(array("milestoneId"=>$data[3]),'user_offermilestone',array("milestoneStatus"=>5));
			}
			else if($data[1] == "membership")
			{

				//error_log('1########'.$data[0], 1, "gurbinder@1wayit.com");
				$lastpackage = $this->common->getRecentOne('user_membership',array("userId"=>$data[0]),'membershipId','desc' );

				if($lastpackage)
				{
			  $up = $this->common->update(array("userId"=>$data[0]),array("membershipStatus"=>0),'user_membership');
			  }


				  $m['userId'] = $data[0];
				  $m['date'] = $date;
				  $m['packageId'] = $data[2];
				  $m['membershipStatus'] = 1;
				  $m['subscriptionId'] = $_POST['subscr_id'];
					//error_log($m, 1, "gurbinder@1wayit.com");

          $mem = $this->common->insert('user_membership',$m);
					//error_log(json_encode($m), 1, "gurbinder@1wayit.com");

					if($mem)
				 	{
						$s['packageId'] = $data[2];
						$s['status'] = $_POST['payment_status'];
						$s['payment'] = $_POST['payment_gross'];
						$s['userId'] = $data[0];
						$this->common->insert('membership_payment',$s);
						//error_log(json_encode($s), 1, "gurbinder@1wayit.com");
            $this->common->update(array("id"=>$data[0]),array("is_active"=>1),'user');
					 }

			}
			else if($data[1] == "paidranking")
			{
				$p['rankingPriceId'] = $data[2];
				$p['status'] = $_POST['payment_status'];
				$p['payment'] = $_POST['payment_gross'];
				$p['userId'] = $data[0];
				$p['date'] = $date;
				$res = $this->common->insert('ranking_price_payment',$p);

				if($res)
				{
					$paidranking = $this->common->getrow('ranking_price',array("rankingPriceId"=>$data[2]));

					$userrankingdata['rankingPriceId'] = $paidranking->rankingPriceId;
					$userrankingdata['userId'] = $data[0];
					$userrankingdata['status'] = 1;
					$userrankingdata['date'] = $date;
          $this->common->insert('user_buy_ranking',$userrankingdata);

				}
			}

		}


	  //error_log(json_encode($_POST),1, "nitindeveloper23@gmail.com");
	}

	public function milestone_payment($payerId,$milestoneId)
	{
		   $email = $this->common->getrow('user_account',array("u_id"=>$payerId));
			 $milestone = $this->common->getrow('user_offermilestone',array("milestoneId"=>$milestoneId));

		  $data['freelancer_email'] = $email->accountEmail;
			$data['freelancerId'] = $mil['paymentTo']  = $email->u_id;
			$data['milestoneId'] = $mil['paymentReferenceId'] = $milestone->milestoneId;
		  $data['amount'] =      $mil['paymentAmount']    = $milestone->milestoneAmount;
			$data['title'] = $milestone->milestoneTitle;
			$mil['paymentType'] ="milestone";

			$mil['paymentFrom'] = $this->session->userdata['clientloggedin']['id'];

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			$mil['paymentDate'] = $date;
			$mil['paymentStatus'] = 1;

			$this->common->insert('user_payment',$mil);
			$this->common->update(array("milestoneId"=>$milestone->milestoneId),array("milestoneStatus"=>5),'user_offermilestone');

			$this->load->view('client/milestone_payment',$data);
	}

	public function jobproposal($id)
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
			$job =$this->common->getrow('user_job',array("jobId"=>$id));
		$t['title'] = $job->jobTitle." Proposals";
		$data['proposaljobId'] = $id;
		$this->load->view('client/header',$t);
		$this->load->view('client/proposal',$data);
		$this->load->view('client/footer');
	 }
	 else
	 {
	   redirect('login');
	 }

	}

	public function getproposal()
	{

		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$jobId = $results->jobId;
		if(!empty($page))
		{

			$data['pcount'] = $this->common->count_all_results('user_job_proposal',array("jobId"=>$jobId));
			$config["total_rows"] = $this->common->count_all_results('user_job_proposal',array("jobId"=>$jobId));
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
			$proposal = $this->common->getproposal(array("jobId"=>$jobId),$start,$config["per_page"]);
		}

		if($proposal)
		{
			$data['message'] ="true";
			$data['result'] = $proposal;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
    exit;
	}

	public function editjob()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->getrow('user_job',array("jobId"=>$results->jobId));
		$result->skill = $this->common->getjobskill(array("us.jobid"=>$results->jobId));
    $result->industry = $this->common->getjobindustry(array("us.jobId"=>$results->jobId));
    $result->milestone = $this->common->get('user_offermilestone',array("jobId"=>$results->jobId));
		$check = $this->common->getrow('user_job_proposal',array("jobId"=>$results->jobId));
		if(!empty($check))
		{
     $msg['message'] ="false";
		}
		else
		{
		 if(!empty($result->milestone))
		 {
			 foreach($result->milestone as $key=>$res)
			 {
				 $result->milestone[$key]->task = $this->common->get('user_milestonetask',array("milestoneId"=>$res->milestoneId));
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
			 $msg['result'] ="";
		 }
	 }

			echo json_encode($msg);
			exit;
		}

		 public function Updatejob()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$milestone = $results->milestone;
			$skill = $results->skill;
			$industry = $results->industry;

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');
			$data = array(
				"jobTitle"=>$results->jobtitle,
				"jobDescription"=>$results->description,
				"jobBudget"=>$results->budget,
				"jobAttchment" =>$results->image,
				"industryId" =>'0',
				"servicesId"=>$results->service,
				"jobRequiredFreelancer"=>$results->required,
				"currencyId"=>$results->currencyId,
				"jobEstimateHours"=>$results->estimatehours,
				"jobEstimateHourlyPrice"=>$results->hourlyPrice,
				"jobType"=>$results->jobType,
			);
			$success = $this->common->update(array("jobId"=>$results->jobId),$data,'user_job');

			 if(!empty($skill))
			 {
				 $this->db->where(array("jobId"=>$results->jobId,"type"=>'service'));
				 //$this->db->where('type','service');
				 $query = $this->db->delete('job_meta');

				 if($query)
				 {
            foreach($skill as $s)
					 {
						if($s->id == 0)
						{
							$newservice = $this->common->insert('services',array("name"=>$s->name,"date_created"=>$date));

							$sdata =array(
							"jobId"=>$results->jobId,
							"value"=>$newservice[1],
							"type"=>"service",
							);
						}
						else
						{
							$sdata =array(
							"jobId"=>$results->jobId,
							"value"=>$s->id,
							"type"=>"service",
							);
						}

					$skillInsert = $this->common->insert('job_meta',$sdata);
					 }
				 }
			 }

			 if(!empty($industry))
			 {
				 $this->db->where('jobId',$results->jobId);
				 $this->db->where('type','industry');
				 $query1 = $this->db->delete('job_meta');

				if($query1)
			 {

				 foreach($industry as $i)
				 {
					 if($i->id == 0)
					 {
	          $newindustry = $this->common->insert('practice_areas',array("name"=>$i->name,"date_created"=>$date));

						 $sdata =array(
						 "jobId"=>$results->jobId,
						 "value"=>$newindustry[1],
						 "type"=>'industry',
					    );
					 }
					 else
					 {
						 $sdata =array(
						 "jobId"=>$results->jobId,
						 "value"=>$i->id,
						 "type"=>'industry',
						 );
					 }

				 $industryInsert = $this->common->insert('job_meta',$sdata);
				    }
			    }
			 }

		// 	if($success[0] == 1)
		// 	{
		// 		$jobofferdata = array(
		// 			"offTo"=>0,
		// 			"offFrom"=>$this->session->userdata['clientloggedin']['id'],
		// 			"offDate"=>$date,
		// 			"offStatus"=>0,
		// 			"jobId"=>$success[1],
		// 		);
    // $joboffer = $this->common->insert('user_joboffer',$jobofferdata);
    //  }


			if($success[0] == 1)
			{
				$jobId =	$results->jobId;


				if(!empty($milestone))
				{
					$this->db->where('jobId',$results->jobId);
					$query = $this->db->delete('user_offermilestone');

				if($query)
				{
					 foreach($milestone as $key=>$m)
					 {
						 $mdata =array(
							"jobId"=>$jobId,
							"milestoneTitle"=>$m->title,
							"milestoneAmount"=>$m->price,
							"milestoneStatus"=>0
						);
						$milestone = $this->common->insert('user_offermilestone',$mdata);

						if(!empty($m->task))
						{
							$this->db->where('milestoneId',$milestone[1]);
							$query = $this->db->delete('user_milestonetask');

							foreach($m->task as $t)
							{
								$tdata =array(
									"milestoneId"=>$milestone[1],
									"taskTitle"=>$t->task,
									"taskStatus"=>0,
									"taskDate"=>$date,
								);
								$task = $this->common->insert('user_milestonetask',$tdata);
							}
						}
					 }
				 }
				}
			}

			if($success)
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

		public function proposal_detail($id)
		{
			if(!empty($this->session->userdata['clientloggedin']['id']))
			{
			$data['proposalId'] = $id;
			$pro = $this->common->getrow('user_job_proposal',array("proposalId"=>$id));
			$job = $this->common->getrow('user_job',array("jobId"=>$pro->jobId));
			$t['title'] = $job->jobTitle." - Proposal Details";
			$this->load->view('client/header',$t);
			$this->load->view('client/proposal_detail',$data);
			$this->load->view('client/footer');
		  }
			else
			{
			 redirect('login');
			}
		}

		public function getproposaldetail()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$proposal = $this->common->getproposaldetail(array("p.proposalId"=>$results->id));
			$m = $this->common->getrow('user_job_proposal_milestones',array("proposalId"=>$results->id));
			if(!empty($m))
			{
			$proposal->milestone = unserialize($m->milestones);
		  }
			else
			{
			 $proposal->milestone ='';
			}

			if($proposal)
			{
				$msg['message']="true";
				$msg['result']=$proposal;
			}
			else
			{
				$msg['message']="true";
				$msg['result']= '';
			}
			echo json_encode($msg);
			exit;
		}

		 public function hireFreelancer()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);

			 $milestone = $results->milestone;
       $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	 		 $date =  $nowUtc->format('Y-m-d H:i:s');
			 $offcheck = $this->common->getrow('user_joboffer',array("jobId"=>$results->jobId,"offTo"=>$results->freelancerId));
			 if(!empty($offcheck))
			 {
			 		$msg['already'] ="true";
			 }
			 else
			 {
			  $proposal = $this->common->update(array("proposalId"=>$results->proposalId),array("proposalStatus"=>1),'user_job_proposal');

			 $check = $this->common->getOneRow('user_joboffer',array("jobId"=>$results->jobId),'offId','desc');
			 if($check->offTo == 0)
			 {
			 $joboffer = $this->common->update(array("jobId"=>$results->jobId),array("offTo"=>$results->freelancerId,"offDate"=>$date,"offAmount"=>$results->offertotal),'user_joboffer');
		   }
			else
			{
				$joboffer = $this->common->insert('user_joboffer',array("jobId"=>$results->jobId,"offTo"=>$results->freelancerId,"offDate"=>$date,"offFrom"=>$check->offFrom,"offAmount"=>$results->offertotal),'user_joboffer');
			}

      $job = $this->common->getrow('user_job',array("jobId"=>$results->jobId));

	 			if($job)
	 			{
					$user = $this->common->getrow('user_meta',array("u_id"=>$results->freelancerId));

					$a['notificationTo'] = $results->freelancerId;
					$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
					$lastId = $lastrecord->notificationId;
					$lastId = $lastId + 1;
					if(!empty($user->url))
 				  {
 					 $url = str_replace(' ','-',strtolower($user->url.'-'.$user->u_id));
 				  }
 				  else
 				  {
 					  $url = str_replace(' ','-',strtolower($user->c_name.'-'.$user->u_id));
 				  }

					$main = base_urL().'jobs/'.$url;
					$a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
					$a['notificationStatus'] = 0;
					$a['notificationType'] = "jobs";
					$a['notificationMessage'] = "You have a new notification of <b>job</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
					$a['notificationDate'] = $date;
					$this->notificationSave($a);

	 			}
     if($job)
		 {
	 		$detail['title'] = $job->jobTitle;
	 		$detail['description'] = $job->jobDescription;
	 		$detail['amount'] = $results->offertotal;
	 		$detail['userdetail'] = $this->common->getuserdetail(array("us.id"=>$results->freelancerId));
	 		$detail['from'] = $this->common->getuserdetail(array("us.id"=>$this->session->userdata['clientloggedin']['id']));

	 		$message = $this->load->view('email/job',$detail,true);
	 		$this->mailsend('Top-seo Notification',$detail['userdetail']->email,$message);
		 }

	 		if($job)
	 		{
	 			$jobId =	$results->jobId;

	 			if(count($milestone) > 0 && !empty($milestone))
	 			{
	 				$updatemilestone = $this->common->update(array("proposalId"=>$results->proposalId),array("milestones"=>serialize($milestone)),'user_job_proposal_milestones');
	 			}

	 		}

	 		if($joboffer)
	 		{
	 			$msg['message'] ="true";
	 		}

	 		else
	 		{
	 			$msg['message'] ="false";
	 		}
		 }
	 		echo json_encode($msg);
	 		exit;
		 }

		 public function freelancerContact()
		 {
			 $array = file_get_contents('php://input');
			 $results = json_decode($array);

			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			 $date =  $nowUtc->format('Y-m-d H:i:s');
       $check = $this->common->getrow('user_friendcontact',array("jobId"=>$results->jobId));

				if(!empty($check))
				{
          $msg1['message'] = 2;
					echo json_encode($msg1);
					exit;
				}
				else
				{

				 $friendlistdata = array(
					 "friendUser"=>$this->session->userdata['clientloggedin']['id'],
					 "friendContact" =>$results->freelancerId,
					 "friendStatus" =>0,
					 "jobId" =>$results->jobId,
					 "user_messageId" => 0,
				 );

				 $friendlist = $this->common->insert('user_friendcontact',$friendlistdata);

			  if($friendlist)
			  {
				    $data = array(
							 "messageTo"=>$results->freelancerId,
							 "messageFrom"=>$this->session->userdata['clientloggedin']['id'],
							 "messageText"=>$results->message,
							 "friendId"=>$friendlist[1],
							 "messageDate"=>$date,
							 "messageStatus"=>0,
						 );

				 $detail['msg'] = $results->message;
				 $success = $this->common->insert('user_message',$data);
			 }

				 if($success[0] == 1)
				 {
					 $messageId =	$success[1];

           $detail['userdetail'] = $this->common->getuserdetail(array("us.id"=>$results->freelancerId));
					 $detail['from'] = $this->common->getuserdetail(array("us.id"=>$this->session->userdata['clientloggedin']['id']));


					 $msg = $this->load->view('email/contact',$detail,true);

					 $this->mailsend('Top-seo Notification',$detail['userdetail']->email,$msg);
				 }

				 if($friendlist)
				 {
					 $name = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
					 $m ="you have received New messaage from ".$name->name;
					 $Notificationdata = array(
						 "notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
						 "notificationTo" =>$results->freelancerId,
						 "notificationMessage" => $m,
						 "notificationDate" => $date,
						 "notificationStatus" => 0,
						 "notificationDeleted" =>0,
					 );
					 $notification = $this->common->insert('user_notification',$Notificationdata);
				 }
			 }

			 if($notification)
			 {
				 $msg1['message'] = 1;
			 }

			 else
			 {
				  $msg1['message'] = 0;
			  }

			 echo json_encode($msg1);
			 exit;

			 }

			 public function activeMilestone()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);

				 $Allmilestone = $this->common->getrow('user_job_proposal_milestones',array("proposalId"=>$results->proposalId));
				 $milestone = unserialize($Allmilestone->milestones);
				 $proposal = $this->common->getrow('user_job_proposal',array("proposalId"=>$results->proposalId));

				 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			   $date =  $nowUtc->format('Y-m-d H:i:s');

			 $pUpdate = $this->common->update(array("proposalId"=>$results->proposalId),array("proposalStatus"=>1),'user_job_proposal');

        if($pUpdate)
				 {
					 $name = $this->common->getrow('user_meta',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
					 $m = $name->name." Active milestone ";

					 $Notificationdata = array(
						 "notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
						 "notificationTo" =>$proposal->u_id,
						 "notificationMessage" => $m,
						 "notificationDate" => $date,
						 "notificationStatus" => 0,
						 "notificationDeleted" =>0,
					 );

					 $notification = $this->common->insert('user_notification',$Notificationdata);

				 }

       if($notification)
			 {
				 $jobId =	$results->jobId;

				 if(count($milestone) > 0 && !empty($milestone))
				 {
					 foreach($milestone as $key=>$m)
					 {
						 $mdata =array(
							 "jobId"=>$jobId,
							 "milestoneTitle"=>$m->title,
							 "milestoneAmount"=>$m->price,
							 "milestoneStatus"=>0
						 );
						 $milestone = $this->common->insert('user_offermilestone',$mdata);

						 if(!empty($m->task))
						 {
							 foreach($m->task as $t)
							 {
								 $tdata =array(
									 "milestoneId"=>$milestone[1],
									 "taskTitle"=>$t->task,
									 "taskPrice"=>$t->amount,
									 "taskStatus"=>0,
									 "taskDate"=>$date,
								 );
								 $task = $this->common->insert('user_milestonetask',$tdata);
							 }
						 }

					 }
				 }

					 }

			 if($notification)
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

			 public function Deletepayment()
			 {
			  $this->db->where('u_id',$this->session->userdata['clientloggedin']['id']);
			  $query = $this->db->delete('user_account');
         if($query)
			    {
					  redirect('client-payment');
			    }
			 }

			 public function authorize()
			 {
				 $this->load->view('client/authorize');
			 }

			 public function authorize_payment()
			 {
				 require_once(APPPATH . "third_party/authorize/config.php");

         $type = "";
         $message = "";
         if (isset($_POST["pay_now"]))
				 {
           require_once 'AuthorizeNetPayment.php';
          $authorizeNetPayment = new AuthorizeNetPayment();

        $response = $authorizeNetPayment->chargeCreditCard($_POST);

        if ($response != null)
         {
        $tresponse = $response->getTransactionResponse();

        if (($tresponse != null) && ($tresponse->getResponseCode()=="1"))
        {
            $authCode = $tresponse->getAuthCode();
            $paymentResponse = $tresponse->getMessages()[0]->getDescription();
            $reponseType = "success";
            $data['message'] = "This transaction has been approved. <br/> Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() .  " <br/>Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
        }
        else
        {
            $authCode = "";
            $paymentResponse = $tresponse->getErrors()[0]->getErrorText();
            $reponseType = "error";
            $message = "Charge Credit Card ERROR :  Invalid response\n";
        }

        $transactionId = $tresponse->getTransId();
        $responseCode = $tresponse->getResponseCode();
        $paymentStatus = $authorizeNetPayment->responseText[$tresponse->getResponseCode()];
        require_once "DBController.php";
        $dbController = new DBController();

        $param_type = 'sssdss';
        $param_value_array = array(
            $transactionId,
            $authCode,
            $responseCode,
            $_POST["amount"],
            $paymentStatus,
            $paymentResponse
        );
        /*print "<PRE>";
        print_r($param_value_array);
        exit; */
				if($paymentStatus == "Approved")
				{

					 $u = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));

				$r =	$this->common->insert('user_account',array("u_id"=>$u->u_id,"accountEmail"=>$u->email));

				}
        $query = "INSERT INTO tbl_authorizenet_payment (transaction_id, auth_code, response_code, amount, payment_status, payment_response) values (?, ?, ?, ?, ?, ?)";
        $id = $dbController->insert($query, $param_type, $param_value_array);

				if($parm_value_array[4] == "Approved")
				{

					 $u = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));

					 $this->common->insert('user_account',array("u_id"=>$u->u_id,"accountEmail"=>$u->email));
				}
    }
    else
    {
        $reponseType = "error";
        $data['message'] = "Charge Credit Card Null response returned";
    }
}
      redirect('client-payment',$message);
			 }



public function support()
{
	if(!empty($this->session->userdata['clientloggedin']['id']))
	{
	$t['title'] = "Support Chat | Real Time Chat";
	$this->load->view('client/header',$t);
	$this->load->view('client/support');
	$this->load->view('client/footer');
  }
	else
	{
	  redirect('login');
	}
}

public function invoice()
{
	if(!empty($this->session->userdata['clientloggedin']['id']))
	{
   $data['title'] ="Invoice";
   $this->load->view('client/header',$data);
   $this->load->view('client/clientinvoice');
   $this->load->view('client/footer');
  }
	else
	{
	  redirect('login');
	}
}

public function getinvoice()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$page = $results->page;
	$config = array();

	if(!empty($page))
	{
		 $data['pcount'] = $this->common->count_all_results('invoice',array("recipient"=>$this->session->userdata['clientloggedin']['id']));
		 $config["total_rows"] = $this->common->count_all_results('invoice',array("recipient"=>$this->session->userdata['clientloggedin']['id']));
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
		$res = $this->common->getclientinvoice(array("i.recipient"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
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

public function invoicedownload($id)
{
	if(!empty($this->session->userdata['clientloggedin']['id']))
	{
    $data['results'] = $this->common->getrow('invoice',array('invoiceId'=>$id));
    $data['task'] = $this->common->get('invoice_task',array('invoiceId'=>$id));
	  $html = $this->load->view('email/clientinvoicePdf',$data,TRUE);
	  $pdfFilePath = "invoice.pdf";
	  $this->load->library('m_pdf');
	  $this->m_pdf->pdf->WriteHTML($html);
	  $this->m_pdf->pdf->Output($pdfFilePath, "I");
	}
	else
	{
	  redirect('login');
	}
}

 public function invoice_edit($id)
 {
	 $data['invoiceId'] = $id;
   $this->load->view('client/header');
   $this->load->view('client/client_invoice_edit',$data);
   $this->load->view('client/footer');
 }

 public function geteditinvoice()
 {
 	 $array = file_get_contents('php://input');
 	 $results =json_decode($array);
 	 $id = $results->invoiceId;
 	 $result = $this->common->getrow('invoice',array("invoiceId"=>$id));
 	 if($result)
 	 {
 		 $result->task = $this->common->get('invoice_task',array("invoiceId"=>$id));
		 $freelancer = $this->common->getrow('user_meta',array("u_id"=>$result->userId));
		 $result->freelancer = $freelancer->name;
 		 $result->contract = $this->common->clientcontact(array("uc.freelancerId"=>$this->session->userdata['clientloggedin']['id'],"clientId"=>$result->recipient));
 		 $cu = $this->common->getrow('currency',array("id"=>$result->currencyId));
 		 $result->currency = $cu->code.' '.$cu->symbol;
 	 }
  if($result)
 	 {
 		$output['message'] ="true";
 		$output['result'] = $result;
 	 }
 	 else
 	 {
 		$output['message'] ="true";
 		$output['result'] = "";
 	 }
 	 echo json_encode($output);
 	 exit;
  }

	public function invoiceupdate()
	{
		$array = file_get_contents('php://input');
  	$results =json_decode($array);
    $result = $this->common->update(array("invoiceId"=>$results->invoiceId),array("status"=>$results->status),'invoice');

   if($result)
   {
  		$output['message'] ="true";
   }
   else
   {
  		$output['message'] ="true";
  	}
  	 echo json_encode($output);
  	 exit;
	}

	public function gig()
	{
	  $this->load->view('client/header');
	  $this->load->view('client/gig');
	  $this->load->view('client/footer');
	}

	public function getgig()
	{
		$array = file_get_contents('php://input');
 		$results =json_decode($array);
 		$page = $results->page;
 		$config = array();
 		$data['pcount'] = $this->common->count_all_results('user_gig_buy',array("clientId"=>$this->session->userdata['clientloggedin']['id']));
 		$config["total_rows"] = $this->common->count_all_results('user_gig_buy',array("clientId"=>$this->session->userdata['clientloggedin']['id']));
 		$config["per_page"] = 10;
 		$this->pagination->initialize($config);
 		if( $page <= 0 )
 		{
 			$page = 1;
 		}
 		$start = ($page-1) * $config["per_page"];
 		if(!empty($page))
 		{
 			$res = $this->common->getclientBuygig(array("b.clientId"=>$this->session->userdata['clientloggedin']['id'],"t.milestone"=>1),$start,$config["per_page"]);
 		}
		if(!empty($res))
		{
			foreach($res as $key=>$r)
			{
        $res[$key]->description = strip_tags($r->description);
			}
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

	public function gigdetail($id)
	{
		$data['gigId'] = $id;
		$this->load->view('client/header');
		$this->load->view('client/gigdetail',$data);
		$this->load->view('client/footer');
	}

	public function getgigdetail()
	{
		$array = file_get_contents('php://input');
  	$results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');

		$result = $this->common->getgigdetail(array("user_gig_buyId"=>$results->id));
		$result->milestone = $this->common->get('todoList',array("user_gig_buyId"=>$results->id,'milestone'=>1));
		if($result->milestone)
		{
			foreach($result->milestone as $key=>$m)
			{
				$result->milestone[$key]->task = $this->common->get('todoList',array("user_gig_buyId"=>$results->id,"milestone"=>0,"parent"=>$m->id));
				$payment = $this->common->getrow('gig_payment',array("user_gig_buyId"=>$results->id,"planId"=>$m->id));
				if(!empty($payment))
				 {
				 		$result->milestone[$key]->receivedAmount = $payment->receivedAmount;
			 		}
		 		else
			 		{
			 			$result->milestone[$key]->receivedAmount = '';
			 		}
			}
		}

		if(!empty($result->endDate))
		{
		  $result->reviewlastdate = date('Y-m-d', strtotime($result->endDate. ' + 14 days'));
		  $result->todaydate = $date;
		}

		if($result)
		{
			$output['message'] ="true";
			$output['result'] =$result;
		}
		else
		{
			$output['message'] ="false";
			$output['result'] ='';
		}
		echo json_encode($output);
		exit;

	}

	public function gigreview()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		// $t =0;
		// $t = $results->total * $results->overall;
		$t = 0;
		$total   = $results->total * 10;
		$overall = $results->overall * 10;
		$to = $total + $overall;
		$t = $to / 2;

		$currency = $this->common->buygigcurrency(array("user_gig_buyId"=>$results->user_gig_buyId));
		$budget = $this->common->getrow('todoList',array("user_gig_buyId"=>$results->user_gig_buyId,"milestone"=>1));


		$insert=array(
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'overall','reviewOverall'=>$results->overall),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'communication','reviewOverall'=>$results->communication * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'skill','reviewOverall'=>$results->skill * 0.40),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'rehire','reviewOverall'=>$results->rehire * 0.40),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'quality','reviewOverall'=>$results->quality * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'deadline','reviewOverall'=>$results->deadline * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'cooperation','reviewOverall'=>$results->cooperation * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'cost','reviewOverall'=>$results->cost * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'availability','reviewOverall'=>$results->availability * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'review','reviewOverall'=>$results->review),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'total','reviewOverall'=>$t),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->freelancerId,'reviewFrom'=>$this->session->userdata['clientloggedin']['id'],'reviewType'=>'star','reviewOverall'=>$results->total)
		);

		$review = $this->common->insert_batch('user_review',$insert);
		$contract = $this->common->update(array('user_gig_buyId'=>$results->user_gig_buyId,"clientId"=>$this->session->userdata['clientloggedin']['id']),array("status"=>2,"endDate"=>$date,"clientEnd"=>1),'user_gig_buy');

		if($contract)
		{
			if($currency->code != "USD")
			{
			 $req_url = 'http://api.currencylayer.com/live?access_key=031baf11c79af954ce1448577e48174a&format=1';
			 $response_json = file_get_contents($req_url);
			 $response = json_decode($response_json);
			 if($response->success == 1)
			 {
				 $c = "USD".$currency->code;
         $rates = $response->quotes->$c;
				 $amount = $budget->amount;
				 $usdAmount = $amount / $rates;
			 }
		}
		 else
		 {
       $usdAmount = $budget->amount;
		 }
		 $checkEarning = $this->common->getrow('userEarning',array("user_gig_buyId"=>$results->user_gig_buyId));
	 }
	 if(empty($checkEarning))
	 {
		 $this->common->insert('userEarning',array("user_gig_buyId"=>$results->user_gig_buyId,"userId"=>$results->freelancerId,"userEarningAmount"=>$usdAmount,"date"=>$date));
		 $this->common->insert('userEarning',array("user_gig_buyId"=>$results->user_gig_buyId,"userId"=>$this->session->userdata['clientloggedin']['id'],"userEarningAmount"=>$usdAmount,"date"=>$date));
	 }

		if($review)
		{
			$success['message'] ="true";
		}
		else
		{
		  $success['message'] ="false";
		}
		echo json_encode($success);
		exit;
	}

	public function getgigreview()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

	  $review =	$this->common->get('user_review',array("user_gig_buyId"=>$results->user_gig_buyId,"reviewFrom"=>$this->session->userdata['clientloggedin']['id']));

		 if($review)
		 {
			 $success['message'] = "true";
			 $success['result'] = $review;
		 }
		 else
		 {
		   $success['message'] ="false";
		 }
		 echo json_encode($success);
	}

	public function expense()
	{
		$data['title'] ="Manage Business Expenses Anywhere in Real Time";
	  $this->load->view('client/header',$data);
	  $this->load->view('client/expense');
	  $this->load->view('client/footer');
	}

	public function income()
	{
		$data['title'] ="Add Your Business Income Information";
		$this->load->view('client/header',$data);
		$this->load->view('client/income');
		$this->load->view('client/footer');
	}

	public function jobdelete()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$check = $this->common->getrow('user_job_proposal',array("jobId"=>$results->jobId));
		if(!empty($check))
		{
     $output['error'] ="true";
		}
		else
		{
		$deletejobs = $this->common->delete('user_job',array("jobId"=>$results->jobId));
		if($deletejobs)
		{
			$deleteoff = $this->common->delete('user_joboffer',array("jobId"=>$results->jobId));
		}

		if($deleteoff)
		{
		 $output['message'] ="true";
		}
		else
		{
			$output['message'] ="false";
		}
	 }
		echo json_encode($output);
		exit;
	}

	public function contractStatus()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$result = $this->common->update(array("id"=>$results->id),array("clientStatus"=>$results->clientStatus),'todoList');

		if($result)
		{
			$data['message'] = "true";
		}
		else
		{
			$data['message'] = "false";
		}
		echo json_encode($data);
		die;
	}

	public function contractpayment()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	 $results->date = $nowUtc->format('Y-m-d H:i:s');
	 if(empty($results->paymentStatus))
	 {
		unset($results->paymentStatus);
	 }

	 if(empty($results->receivedAmount))
	 {
	   unset($results->receivedAmount);
	 }

	 $check = $this->common->getrow('contract_payment',array("contractId"=>$results->contractId,"milestoneId"=>$results->milestoneId));
	 if(!empty($check))
	 {
		 $res = $this->common->update(array("contractId"=>$results->contractId,"milestoneId"=>$results->milestoneId),$results,"contract_payment");
	 }
	 else
	 {
		 $res = $this->common->insert('contract_payment',$results);
	 }
	 if($res)
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

 public function gigStatusUpdate()
 {
	 $array = file_get_contents('php://input');
	 $results = json_decode($array);
   $result = $this->common->update(array("user_gig_buyId"=>$results->user_gig_buyId,"id"=>$results->todoId),array("clientStatus"=>$results->clientStatus),'todoList');
	 if($result)
	 {
		 $output['success'] = "true";
	 }
	 else
	 {
		$output['success'] = "false";
	 }
	 echo json_encode($output);
	 exit;
 }

 public  function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}

 public function getgroupSuggestionPerson()
 {
	 $result = $this->common->getActiveFreelancer(array("j.clientId"=>$this->session->userdata['clientloggedin']['id']));
	 $result1 = $this->common->getGigFreelancer(array("j.clientId"=>$this->session->userdata['clientloggedin']['id']));
	 $res = array_merge($result,$result1);
	 $res1 = array();
	 if(!empty($res))
	 {
		 foreach ($res as $value)
	   {
      $ids[] = $value->u_id;
     }
	 }
	 $res1 = array_unique($ids);
	 $res2 = $this->common->getUserIn('u_id',$ids);
	 if($res2)
	 {
		 $output['success'] = "true";
		 $output['result'] = $res2;
	 }
	 else
	 {
		 $output['success'] = "false";
		 $output['result'] = '';
	 }
	 echo json_encode($output);
	 exit;
 }

 public function notificationSave($data)
 {
	 $this->common->insert('user_notification',$data);
 }

 public function gigpayment()
 {
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	$results->date = $nowUtc->format('Y-m-d H:i:s');
	if(empty($results->paymentStatus))
	{
	 unset($results->paymentStatus);
	}

	if(empty($results->receivedAmount))
	{
		unset($results->receivedAmount);
	}

	$check = $this->common->getrow('gig_payment',array("user_gig_buyId"=>$results->user_gig_buyId,"planId"=>$results->planId));
	if(!empty($check))
	{
		$res = $this->common->update(array("user_gig_buyId"=>$results->user_gig_buyId,"planId"=>$results->planId),$results,"gig_payment");
	}
	else
	{
		$res = $this->common->insert('gig_payment',$results);
	}
	if($res)
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

 public function membership()
 {
	 $this->load->view('client/header');
	 $this->load->view('client/membership');
	 $this->load->view('client/footer');
 }

 public function getmembershipUsedData()
	{
		$data['expense'] = $this->common->count_all_results('expense',array("userId"=>$this->session->userdata['clientloggedin']['id']));
		$data['invoice'] = $this->common->count_all_results('invoice',array("userId"=>$this->session->userdata['clientloggedin']['id']));
		$data['jobpost'] = $this->common->count_all_results('user_joboffer',array("offFrom"=>$this->session->userdata['clientloggedin']['id']));
		echo json_encode($data);
		exit;
	}

	public function jobClose()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
    $check = $this->common->getrow('user_joboffer',array("jobId"=>$results->jobId));
		if($check->offStatus == 0)
		{
		 $res = $this->common->update(array("jobId"=>$results->jobId),array("jobClose"=>1),'user_job');
     if($res)
		 {
		  $joboffer = $this->common->update(array("jobId"=>$results->jobId),array("offStatus"=>3),'user_joboffer');
		 }
		 if($joboffer)
		 {
		  $output['message'] ="true";
		 }
		 else
		 {
			 $output['message'] ="false";
		 }
	 }
	 else
	 {
    $output['error'] = "true";
	 }

		echo json_encode($output);
		exit;
	}

	public function repostjob()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->getrow('user_job',array("jobId"=>$results->jobId));
		$result->skill = $this->common->getjobskill(array("us.jobid"=>$results->jobId));
    $result->industry = $this->common->getjobindustry(array("us.jobId"=>$results->jobId));
    $result->milestone = $this->common->get('user_offermilestone',array("jobId"=>$results->jobId));

		 if(!empty($result->milestone))
		 {
			 foreach($result->milestone as $key=>$res)
			 {
				 $result->milestone[$key]->task = $this->common->get('user_milestonetask',array("milestoneId"=>$res->milestoneId));
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
			 $msg['result'] ="";
		 }


			echo json_encode($msg);
			exit;
		}


}
