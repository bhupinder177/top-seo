<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Freelancer extends CI_Controller {

	function __construct() {

		parent::__construct();

		$this->load->model('common');


	}


	  public function index()
		{
			redirect('freelancer/dashboard');
		}

   public function dashboard()
	 {
		 if(!empty($this->session->userdata['clientloggedin']['id']))
		 {
		 $data['title'] ="Dashboard";
		 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
 		 if($user->parent != 0)
 		 {
 			$userid = $user->parent;
 		 }
 		 else
 		 {
 			$userid = $user->id;
 		 }
		 $data['users'] = $this->common->getSingleUser(array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		 $data['services'] = $this->common->count_all_results('user_services',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		 $data['testimonial'] = $this->common->count_all_results('user_testimonial',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		 $data['case'] = $this->common->count_all_results('user_case_studies',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		 $data['applied'] = $this->common->count_all_results('user_job_proposal',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		 $data['won'] = $this->common->count_all_results('user_jobcontract',array("freelancerId"=>$this->session->userdata['clientloggedin']['id']));
		 $data['review'] = $this->common->count_all_results('user_review',array("reviewTo"=>$this->session->userdata['clientloggedin']['id'],"reviewType"=>'total'));
		 $data['totalearning'] = $this->common->freelancerearning(array("freelancerId"=>$this->session->userdata['clientloggedin']['id']));
		 $data['industry'] = $this->common->count_all_results('user_industries',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		 $data['services'] = $this->common->count_all_results('user_services',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		 $data['request'] = $this->common->count_all_results('requests',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		 $data['notification'] = $this->common->getlimitnotification(array("notificationTo"=>$this->session->userdata['clientloggedin']['id']));
     $data['team2'] = $this->common->getCompanyTeam(array("us.parent"=>$this->session->userdata['clientloggedin']['id'],"us.is_active"=>1,"us.deleted"=>0));
     $data['keypeople'] = $this->common->getkeypeople($this->session->userdata['clientloggedin']['id']);
     $data['task'] = $this->common->getlimittask($this->session->userdata['clientloggedin']['id']);
		 $pids = array();
		 // if($Mproject)
		 // {
		 //   foreach($Mproject as $mp)
			//  {
			// 	 $pids[] = $mp->projectId;
			//  }
		 // }
     if($this->session->userdata['clientloggedin']['access'] == 2)
		 {
		 $Sproject = $this->common->get('project',array("userId"=>$userid));
	   }
		 else if($this->session->userdata['clientloggedin']['access'] == 6)
		 {
			 $Sproject = $this->common->get('project',array("projectManagerId"=>$this->session->userdata['clientloggedin']['id']));
		 }

		 $sid = array();
		 if(!empty($Sproject))
		 {
		   foreach($Sproject as $mp)
			 {
				 $sid[] = $mp->projectId;
			 }
		 }

		 if(!empty($pids))
		 {
		  $data['milestones'] = $this->common->AllprojectMilestones($pids);
	   }


		 if(!empty($sid))
		 {
		  $earningMonthly = $this->common->SalesProjectEarning($sid);
	   }

		 $earning = array();

    if(!empty($earningMonthly))
		{
			foreach($earningMonthly as $e)
			{
				$m = date("m",strtotime($e->date));
				$earning[$m]['y'] = 0;
		    if(!isset($earning[$m]))
		    {
			   $earning[$m]['label'] = date("M",strtotime($e->date));
			   $earning[$m]['y'] = $earning[$m]['y'] + $e->amount;
		    }
		    else
		    {
				 $earning[$m]['label'] = date("M",strtotime($e->date));
				 $earning[$m]['y'] = $earning[$m]['y'] + $e->amount;
		    }
			 }
	   }

     $salesprojectdate = array();
     $data['salesearning'] = $earning;
     $allproject = $this->common->SalesProjectCount(array("userId"=>$userid,"MONTH(date)"=>date("m"),"Year(date)"=>date("Y")));

		 if(!empty($allproject))
		 {
			 $i = 0;
			 foreach($allproject as $a)
			 {
					$salesprojectdate[$i]['x'] = $a->date;
					$salesprojectdate[$i]['y'] =  $a->count;
					$i++;
			 }
		 }

		 $data['salesprojectdatewise'] = $salesprojectdate;


		 $data['salesProject'] = $this->common->salesProject(array("userId"=>$userid));

     $data['totalprojects'] = $this->common->count_all_results('project',array("projectManagerId"=>$this->session->userdata['clientloggedin']['id']));
     $data['inProgressProject'] = $this->common->count_all_results('project',array("projectManagerId"=>$this->session->userdata['clientloggedin']['id'],'status'=>1));
     $data['holdProject'] = $this->common->count_all_results('project',array("projectManagerId"=>$this->session->userdata['clientloggedin']['id'],'status'=>2));
     $data['completedProject'] = $this->common->count_all_results('project',array("projectManagerId"=>$this->session->userdata['clientloggedin']['id'],'status'=>3));
     $data['totalearning'] = $this->common->SumProjectAmount(array("projectManagerId"=>$this->session->userdata['clientloggedin']['id'],'status'=>3));
     $data['pendingearning'] = $this->common->SumProjectAmount(array("projectManagerId"=>$this->session->userdata['clientloggedin']['id'],'status'=>1));

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

		 $data['employeeProject'] = $this->common->EmployeeProjectCount(array("userId"=>$this->session->userdata['clientloggedin']['id']));
		 $data['employeeProjectInProgress'] = $this->common->EmployeeProjectCount(array("a.userId"=>$this->session->userdata['clientloggedin']['id'],"t.status"=>1));
		 $data['employeeProjectPaused'] = $this->common->EmployeeProjectCount(array("a.userId"=>$this->session->userdata['clientloggedin']['id'],"t.status"=>2));
		 $data['employeeProjectcompleted'] = $this->common->EmployeeProjectCount(array("a.userId"=>$this->session->userdata['clientloggedin']['id'],"t.status"=>3));
		 $data['employeeTask'] = $this->common->EmployeeTask(array("a.userId"=>$this->session->userdata['clientloggedin']['id']));
		 // $employeetotal = $this->common->sum_task_time(array("projectId"=>$this->session->userdata['clientloggedin']['id'],'type'=>1));
		 //
		 // if($employeetotal->time != 0)
		 // {
			// 	$hours = floor($employeetotal->time / 60);
			// 	if($hours < 10)
			// 	{
			// 		$hours = '0'.$hours;
			// 	}
			// 	$minutes = ($employeetotal->time % 60);
			// 	if($minutes < 10)
			// 	{
			// 		$minutes = '0'.$minutes;
			// 	}
			// 	$d = $hours.':'.$minutes;
			// 	$empTotalHour = $d;
		 // }
		 // else
		 // {
			//  $empTotalHour = "00:00";
		 // }

		 $profileview = $this->common->profileviewcount(array("userId"=>$this->session->userdata['clientloggedin']['id']));
     if(!empty($profileview))
		 {
			 foreach($profileview as $k=>$r)
			 {
				 $profileview[$k]->label = date("d M", strtotime($r->label));
			 }
		 }

		 $data['profileview'] = $profileview;
		 // $data['employeeTotalHour'] = $empTotalHour;
		 $this->load->view('freelancer/header',$data);
		 $this->load->view('freelancer/dashboard');
		 $this->load->view('freelancer/footer');
	   }
		 else
		 {
		   redirect('login');
		 }
	 }

	 public function getdashboarddata()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d');

		 if(!empty($results->startdate))
		 {
       $startdate = date("Y-m-d",strtotime($results->startdate));
		 }
		 else
		 {
      $startdate = date('Y-m-d', strtotime('first day of this month'));
		 }
		 if(!empty($results->enddate))
		 {
			 $enddate = date("Y-m-d",strtotime($results->enddate));
		 }
		 else
		 {
			 $lastDateOfThisMonth = strtotime('last day of this month') ;
			 $lastDay = date('Y-m-d', $lastDateOfThisMonth);
			 $enddate = $lastDay;
		 }

     $expensegraph = array();
     $paidexpense = array();
     $unpaidexpense = array();
     $invoicegraph = array();
     $incomegraph = array();
     $pendingincome = array();
     $allincome = array();
		 $totalpl = 0;
		 $netsalary = 0;
		 $plgraph = array();
		 $data = array();
		 $datetime1 = date_create($startdate);
		 $datetime2 = date_create($enddate);
		 $interval = date_diff($datetime1, $datetime2);
		 $diff = $interval->format('%a');
		 $salary = $this->common->sum_salary(array("u.parent"=>$this->session->userdata['clientloggedin']['id']));
		 $employee = $this->common->getCompanyTeam(array("us.parent"=>$this->session->userdata['clientloggedin']['id']));
		 for($i=0; $i<=$diff; $i++)
		 {
			 $f = date('Y-m-d', strtotime($startdate. ' + '.$i.' days'));

      $res = $this->common->sum_expenseGraph(array("userId"=>$this->session->userdata['clientloggedin']['id'],"date"=>$f,"deleted"=>0));
      $paidexp= $this->common->sum_expenseGraph(array("userId"=>$this->session->userdata['clientloggedin']['id'],"status"=>1,"date"=>$f,"deleted"=>0));
      $unpaidexp= $this->common->sum_expenseGraph(array("userId"=>$this->session->userdata['clientloggedin']['id'],"status"=>2,"date"=>$f,"deleted"=>0));

			if(!empty($res->total))
			{
				$m = date("m",strtotime($res->date));

				if(!isset($expensegraph[$m]['label']))
				{
				$expensegraph[$m]['y']  = 0;
				$expensegraph[$m]['label']  ='Total '. date("M",strtotime($res->date));
				$expensegraph[$m]['y']  = $expensegraph[$m]['y'] + $res->total;
			  }
				else
				{
					$expensegraph[$m]['label']  = 'Total '. date("M",strtotime($res->date));
					$expensegraph[$m]['y'] =  $expensegraph[$m]['y'] + $res->total;
				}
			}

			if(!empty($paidexp->total))
			{
        if(!isset($paidexpense[$m]['label']))
				{
					$paidexpense[$m]['y']  = 0;
					$paidexpense[$m]['label']  = 'Paid '. date("M",strtotime($res->date));
					$paidexpense[$m]['y']  = $paidexpense[$m]['y'] + $paidexp->total;
				}
				else
				{
					$paidexpense[$m]['label']  = 'Paid  -' .date("M",strtotime($res->date));
 				  $paidexpense[$m]['y']  = $paidexpense[$m]['y'] + $paidexp->total;
				}
			}

			if(!empty($unpaidexp->total))
			{
				if(!isset($unpaidexpense[$m]['label']))
				{
					$unpaidexpense[$m]['y']  = 0;
					$unpaidexpense[$m]['label']  = 'Unpaid '. date("M",strtotime($res->date));
					$unpaidexpense[$m]['y']  = $unpaidexpense[$m]['y'] + $unpaidexp->total;
				}
				else
				{
					$unpaidexpense[$m]['label']  = 'Unpaid expense -' .date("M",strtotime($res->date));
					$unpaidexpense[$m]['y']  = $unpaidexpense[$m]['y'] + $unpaidexp->total;
				}
			}

			// invoice

			$res1 = $this->common->sum_invoice_amountGraph(array("userId"=>$this->session->userdata['clientloggedin']['id'],"date"=>$f));

			if(!empty($res1->total))
			{
				$m1 = date("m",strtotime($res1->date));

				if(!isset($invoicegraph[$m1]['label']))
				{
				$invoicegraph[$m1]['y']  = 0;
				$invoicegraph[$m1]['label']  = date("M",strtotime($res1->date));
				$invoicegraph[$m1]['y']  = $invoicegraph[$m1]['y'] + $res1->total;
				}
				else
				{
					$invoicegraph[$m1]['label']  = date("M",strtotime($res1->date));
					$invoicegraph[$m1]['y'] = $invoicegraph[$m1]['y'] + $res1->total;
				}
			}
			// invoice

			// income
			$res2 = $this->common->sum_income_paid_amountGraph(array("userId"=>$this->session->userdata['clientloggedin']['id'],"date"=>$f));
			$pendingin = $this->common->sum_pendingincome_paid_amountGraph(array("userId"=>$this->session->userdata['clientloggedin']['id'],"status"=>2,"date"=>$f));

			if(!empty($res2->total))
			{
				$m2 = date("m",strtotime($res2->date));

				if(!isset($incomegraph[$m2]['label']))
				{
				 $incomegraph[$m2]['y']  = 0;
				 $incomegraph[$m2]['label']  = 'Received '.date("M",strtotime($res2->date));
				 $incomegraph[$m2]['y']  = $incomegraph[$m2]['y'] + $res2->total;
				}
				else
				{
					$incomegraph[$m2]['label']  = 'Received '.date("M",strtotime($res2->date));
					$incomegraph[$m2]['y'] =  $incomegraph[$m2]['y'] + $res2->total;
				}
			}


			// pl
			 $netsalary1 = 0;
			$m4 = date("m",strtotime($f));
			foreach($employee as $k=>$emp)
					{
						$dsr = $this->common->countdsrHours(array("employeeId "=>$emp->u_id,'includeSalary'=>1,'approved'=>1,"date"=>$f));
						$msalary = $emp->perHour;
						$total = $dsr->total;
						$total = $total / 60;
					  $netsalary += $msalary * $total;
					  $netsalary1 += $msalary * $total;


					}
			if(!isset($plgraph[$m4]['label']))
			{
			$plgraph[$m4]['y']  = 0;
			$plgraph[$m4]['label']  = date("M",strtotime($f));
			$plgraph[$m4]['y']  += ($res2->total - ($res->total + $netsalary1));
			}
			else
			{
				$plgraph[$m4]['label']  = date("M",strtotime($f));
				$plgraph[$m4]['y'] +=  ($res2->total - ($res->total + $netsalary1));
			}



		}

		$totalexpense = $this->common->sum_expense11(array("userId"=>$this->session->userdata['clientloggedin']['id'],"deleted"=>0),$startdate,$enddate);
		$totalincome = $this->common->sum_income11(array("userId"=>$this->session->userdata['clientloggedin']['id']),$startdate,$enddate);
		$totalpl = ($totalincome->total - ($totalexpense->total + $netsalary));
		$expensegrap = array();
		$incomegrap = array();
		if(!empty($expensegraph))
		{
			foreach($expensegraph as $e)
			{
				$expensegrap[] = $e;
			}
		}

		if(!empty($paidexpense))
		{
			foreach($paidexpense as $p)
			{
				$expensegrap[] = $p;
			}
		}

		if(!empty($unpaidexpense))
		{
			foreach($unpaidexpense as $un)
			{
				$expensegrap[] = $un;
			}
		}

		if(!empty($allincome))
		{
			foreach($allincome as $a)
			{
				$incomegrap[] = $a;
			}
		}

		if(!empty($incomegraph))
		{
			foreach($incomegraph as $in)
			{
				$incomegrap[] = $in;
			}
		}



		if(!empty($pendingincome))
		{
			foreach($pendingincome as $pe)
			{
				$incomegrap[] = $pe;
			}
		}



     $data['totalpl'] = number_format($totalpl, 2);
     $data['plgraph'] = $plgraph;
		 $data['expense'] = $this->common->sum_expensedatewise(array("userId"=>$this->session->userdata['clientloggedin']['id'],"deleted"=>0),$startdate,$enddate);
		 $data['invoice'] = $this->common->sum_invoice_amountDatewise(array("userId"=>$this->session->userdata['clientloggedin']['id']),$startdate,$enddate);
		 $data['income'] = $this->common->sum_income_received_amountDatewise(array("userId"=>$this->session->userdata['clientloggedin']['id']),$startdate,$enddate);
     $data['startdate'] = date("d-m-Y",strtotime($startdate));
     $data['enddate'] = date("d-m-Y",strtotime($enddate));
		 $data['expensegraph'] = $expensegrap;
		 $data['invoicegraph'] = $invoicegraph;
		 $data['incomegraph'] = $incomegrap;
		 echo json_encode($data);
		 exit;
	 }


	public function search($count,$state,$city,$ind,$ser)
	{

		$data= array();
		$data['results']	=	$this->common->getbySerialize('user_top_rankings',$count,$state,$city,$ind,$ser);

		if($ind != 'industries')
		{
			$industry = $this->common->getrow('practice_areas',array("id"=>$ind));
			//print_r($industry);
			//die;
			$data['industry']  = $industry->name;
		}

		if($ser != 'service')
		{
			$service = $this->common->getrow('services',array("id"=>$ser));
			$data['service']   = $service->name;
		}

		if($count != 'country')
		{
			$data['country']  = $count;
		}

		$this->load->view('header');
		$this->load->view('new_search',$data);
		$this->load->view('footer');
	}

	public function user_profile($id)
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$data['title'] ="Profile";
    $this->checkAccess('profile');
		$data['profile'] = $this->common->getrow('user_meta',array("u_id"=>$id));
		$data['countries'] = $this->common->getTable('countries');
		$this->load->view('header');
		$this->load->view('user-profile',$data);
		$this->load->view('footer');
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
		$data['title'] ="Messages";
  //  $this->checkAccess('chat');
		$this->load->view('freelancer/header');
		$this->load->view('freelancer/chat');
		$this->load->view('freelancer/footer');
	  }
		else
		{
			redirect('login');
		}
	}

	public function getperson()
	{
		$person = array();
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		 if(!empty($userId))
		  {
		 $user = $this->common->getrow('user',array('id'=>$userId));
	    }

		 // if($user->access != '2')
		 // {

       $person = $this->common->chatPerson($userId);
		 // }
     // else
		 // {
			//  $company = $this->common->getrow('user_top_rated_emp',array("u_id"=>$user->id));
		 //
			//  $person = $this->common->chatPerson($company->companyId);
		 // }

			  $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			  $date =  $nowUtc->format('Y-m-d H:i:s');
         if(!empty($person))
			 {
				 foreach($person as $key=>$per)
			   {
            $milestone = $this->common->getrow('user_job_proposal',array("jobId"=>$per->jobOffer));
						if(!empty($milestone))
						{
						 $person[$key]->milestone =	1;
						}
						else
						{
						 $person[$key]->milestone = 0;
						}

		        $ctime = strtotime($date) - strtotime($per->ctimestamp);
						$ftime = strtotime($date) - strtotime($per->ftimestamp);
		         if($ctime > 20)
						 {
							 $person[$key]->conline ="0";
						 }
						 else
						 {
							 $person[$key]->conline ="1";
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

	public function getmessage($rid,$friendId,$userId,$lastmessageId = null)
	{

		if(!empty($userId))
		{

			if(empty($lastmessageId))
			{
				$message = $this->common->getmessage($userId,$rid,$friendId);
			}
			else
			{
				$message = $this->common->getmessageLatest($userId,$rid,$friendId,$lastmessageId);
			}
		}

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
			"friendId"=>$results->friendId,
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

	public function checkRquestStatus()
	{
		$uid = $_REQUEST['userId'];
		if(isset($this->session->userdata['clientloggedin']))
		{
			$id = $this->session->userdata['clientloggedin']['id'];
			$status = $this->common->getrow('user_friendcontact',array("friendUser"=>$id,"friendContact"=>$uid));
		}
		if($status)
		{
			$msg['message'] = "true";
			$msg['status'] =$status->friendStatus;
		}
		else
		{
			$msg['message'] = "false";
		}
		echo json_encode($msg);
	}


	public function attchmentUpload()
	{
		$data = $_REQUEST['file'];

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);

		$data1 = base64_decode($data);

		$f = finfo_open();

		$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);
		// print_r($mime_type);
		// die;

		if($mime_type =="image/png")
		{
			$image = uniqid().'joboffer.png';
			$image = file_put_contents('assets/jobattchment/'.$image,$data1);
		}
		else if($mime_type =="image/jpeg")
		{
			$image=uniqid().'joboffer.jpeg';
			$result=file_put_contents('assets/jobattchment/'.$image,$data1);
		}
		else if($mime_type =="application/pdf")
		{
			$image = uniqid().'joboffer.pdf';
			$result=file_put_contents('assets/jobattchment/'.$image,$data1);
		}
		else if($mime_type == "text/plain")
		{
			$image = uniqid().'joboffer.text';
			$result=file_put_contents('assets/jobattchment/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
			$image = uniqid().'joboffer.xlsx';
			$result=file_put_contents('assets/jobattchment/'.$image,$data1);
		}

		if($image)
		{
			$msg['message'] = "true";
			$msg['file'] = $image;
		}
		else
		{
			$msg['message'] = "false";
		}
		echo json_encode($msg);
	}


	public function job()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$data['title'] ="Job Offer Details";
    //$this->checkAccess('job');
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/job');
		$this->load->view('freelancer/footer');
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
		$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		if($user->parent == 0)
		{
			$userId = $this->session->userdata['clientloggedin']['id'];
		}
		else if($user->parent != 0)
		{
	 	 $userId = $user->parent;
		}
		if(!empty($page))
		{
			$data['pcount'] = $this->common->count_all_results('user_joboffer',array("offTo"=>$userId,"offStatus"=>'0'));
			$config["total_rows"] = $this->common->count_all_results('user_joboffer',array("offTo"=>$userId,"offStatus"=>'0'));
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
			$jobs = $this->common->getFreelancerJob(array("jb.offTo"=>$userId),$start,$config["per_page"]);
		}

		if($jobs)
		{
			foreach($jobs as $key=>$job)
			{
				 $mtotal = $this->common->SumMilestoneAmount(array("jobId"=>$job->jobId));
				 if($mtotal->total != 0)
				 {
				 $jobs[$key]->total = $mtotal->total;
			   }
				 else
				 {
					 $jobs[$key]->total = $job->jobBudget;
				 }
			}
		}


		if($jobs)
		{
			$data['message'] ="true";
			$data['result'] = $jobs;
			$data['start'] = $start + 1;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
	}

	public function jobdetail($id)
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$data['id'] = $id;
		$data['title'] ="Job details";
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/jobdetail');
		$this->load->view('freelancer/footer');
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

		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userId = $this->session->userdata['clientloggedin']['id'];
		 }
		 else if($user->parent != 0)
		{
		 $userId = $user->parent;
		 }
		// $id = 1;

		if(!empty($id))
		{
			$jobs = $this->common->getFreelancerJobDetail(array("jb.jobId"=>$id));


			if(!empty($jobs))
			{
				$m = $this->common->getproposalMilestone(array("p.jobId"=>$results->id,"p.u_id"=>$userId));
				if(!empty($m))
				{
				$jobs->milestone = unserialize($m->milestones);
				}
				else
				{
				 $jobs->milestone ='';
				}

				// $jobs->milestone = $this->common->get('todoList',array("jobId"=>$id,"milestone"=>1,"type"=>3));
        $t = 0;

				$c = $this->common->getrow('currency',array("id"=>$jobs->currencyId));
       	if(!empty($c))
				{
				 $jobs->currency = $c->code;
				 $jobs->currencysymbol = $c->symbol;
			  }

				// foreach($jobs->milestone as $key=>$m)
				// {
				// 	$jobs->milestone[$key]->task = $this->common->get('todoList',array("parent"=>$m->id,"jobId"=>$id,"milestone"=>0));
				// 	$t += $m->amount;
				// }
				if(!empty($t))
				{
					$jobs->total = $t;
         }
				 else
				 {
				  $jobs->total = $jobs->jobBudget;
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



	public function jobMesaage()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$offerId = $results->offerId;
		$userId = $results->user;
		$from = $results->from;
		$message = $results->message;
		$jobId = $results->jobId;
		$status = $results->status;
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$milestone = array();
		$check = $this->common->getrow('user_job',array("jobId"=>$jobId));


		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userId = $this->session->userdata['clientloggedin']['id'];
		 }
		 else if($user->parent != 0)
		{
		 $userId = $user->parent;
		 }

		if($check->jobClose == 0)
		{

		if($status == 1)
		{
      $result1 = $this->common->update(array('offId'=>$offerId),array('offStatus'=>$status),'user_joboffer');
      $job = $this->common->getrow('user_job',array("jobId"=>$results->jobId));
      $offer = $this->common->getrow('user_joboffer',array("offId"=>$offerId));

			$contract = array(
				"contractAmount"=>$offer->offAmount,
				"jobId"=>$jobId,
				"offerId"=>$offerId,
				"jobId"=>$jobId,
				"freelancerId"=>$userId,
				"clientId"=>$from,
				"contractDate"=>$date,
				"contractEndDate"=>$date,
				"contractStatus"=>1,
			);

			$cinsert = $this->common->insert('user_jobcontract',$contract);
			if($cinsert)
			{
				$proposal = $this->common->update(array("u_id"=>$userId,"jobId"=>$jobId),array("proposalStatus"=>2,"proposalReason"=>$message),'user_job_proposal');
			}


			if($result1)
			{
				$m = $this->common->getproposalMilestone(array("p.jobId"=>$results->jobId,"p.u_id"=>$userId));
				if(!empty($m))
				{
				$milestone = unserialize($m->milestones);
				}

				if(count($milestone) > 0 && !empty($milestone))
				{
					foreach($milestone as $key=>$m)
					{
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
							"contractId"=>$cinsert[1],
							"name"=>$m->title,
							"amount"=>$m->price,
							"status"=>2,
							"type"=>3,
							"milestone"=>1,
							"taskId"=>$taskId,
						);
						$milestone = $this->common->insert('todoList',$mdata);

						if(!empty($m->task))
						{
							foreach($m->task as $t)
							{
								$ids = $this->common->getone('todoList','id','desc');
								if(!empty($ids))
								{
								 $xx = $ids->id + 1;
								 $taskId1 = "TS000".$xx;
								 }
								 else
								 {
									$taskId1 = 'TS0001';
								 }
								$tdata =array(
									"parent"=>$milestone[1],
									"name"=>$t->task,
									"hours"=>$t->hours,
									"hourlyPrice"=>$t->hourlyPrice,
									"amount"=>$t->amount,
									"status"=>2,
									"type"=>3,
									"contractId"=>$cinsert[1],
									"taskId"=>$taskId1,
								);
								$task = $this->common->insert('todoList',$tdata);
							}
						}

					}
				}
				else
				{
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
						"contractId"=>$cinsert[1],
						"name"=>$job->jobTitle,
						"amount"=>$results->offertotal,
						"status"=>2,
						"type"=>3,
						"taskId"=>$taskId,
						"milestone"=>1,
					);
					$milestone = $this->common->insert('todoList',$mdata);
					if($milestone)
					{
						$ids = $this->common->getone('todoList','id','desc');
						if(!empty($ids))
						{
						 $xx = $ids->id + 1;
						 $taskId2 = "TS000".$xx;
						 }
						 else
						 {
							$taskId2 = 'TS0001';
						 }
						$tdata =array(
							"contractId"=>$cinsert[1],
							"name"=>$job->jobTitle,
							"amount"=>$results->offertotal,
							"status"=>2,
							"parent"=>$milestone[1],
							"type"=>3,
							"taskId"=>$taskId2,
						);

						$task =$this->common->insert('todoList',$tdata);

					}
				}
			}
			$amount = $this->common->SumMilestoneAmount(array("jobId"=>$jobId));
			$job = $this->common->getrow('user_job',array("jobId"=>$jobId));
      $total = $amount->total;

			if(empty($total))
			{
       $total = $job->jobBudget;
			}

			if($cinsert)
			{

				$a['notificationTo'] = $from;
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;
				$url = $this->session->userdata['clientloggedin']['url'];
				$aurl = $this->session->userdata['clientloggedin']['aurl'];
				$main = base_urL().'client-contract';
				$a['notificationFrom'] = $userId;
				$a['notificationStatus'] = 0;
				$a['notificationType'] = "contract";

				$a['notificationMessage'] = "You have a new notification of <b>contract</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				$a['notificationDate'] = $date;
				$this->notificationSave($a);
			}

			// $milestone = $this->common->get("user_offermilestone",array("jobId"=>$jobId));
			//
			// if(empty($milestone))
			// {
			//
			// 	$mdata =array(
			// 		"jobId"=>$jobId,
			// 		"milestoneTitle"=>$job->jobTitle,
			// 		"milestoneAmount"=>$job->jobBudget,
			// 		"milestoneStatus"=>1,
			// 	);
			// 	$this->common->insert('user_offermilestone',$mdata);
			// }

		}

		else if($status == '2')
		{
		$result1 = $this->common->update(array("offId"=>$offerId),array("offTo"=>'0'),'user_joboffer');
		$this->common->update(array("u_id"=>$userId,"jobId"=>$jobId),array("proposalStatus"=>3,"proposalReason"=>$message),'user_job_proposal');
    }

		// if($result1)
		// {
		//
		// 	$data = array(
		// 		"messageTo"=>$from,
		// 		"messageFrom"=>$userId,
		// 		"messageText"=>$message,
		// 		"messageDate"=>$date,
		// 		"messageStatus"=>0,
		// 	);
		// 	$result = $this->common->insert('user_message',$data);
		//
		// }

		if($result1)
		{
			$msg['message'] ='true';
		}
		else
		{
			$msg['message'] ='false';
		}
	}
	else
	{
   $msg['error'] ="true";
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

	//////////// contracts
	public function contract()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$data['title'] ="Job Contract Listing";
    //$this->checkAccess('contract');
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/contract');
		$this->load->view('freelancer/footer');
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

		$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		if($user->parent == 0)
		{
			$freelancerId = $this->session->userdata['clientloggedin']['id'];
		}
		else if($user->parent != 0)
		{
		 $freelancerId = $user->parent;
		}
		if(!empty($page))
		{
			if(!empty($freelancerId))
			{
				$data['pcount'] = $this->common->count_all_results('user_jobcontract',array("freelancerId"=>$freelancerId));
				$config["total_rows"] = $this->common->count_all_results('user_jobcontract',array("freelancerId"=>$freelancerId));
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
			if(!empty($freelancerId))
			{
       $jobs = $this->common->getFreelancerContract(array("jc.freelancerId"=>$freelancerId),$start,$config["per_page"]);
			}
		}

		// if(!empty($jobs))
		// {
		// 	foreach($jobs as $k=>$job)
		// 	{
		// 		$m = $this->common->getrow('user_offermilestone',array("jobId"=>$job->jobId,"milestoneStatus"=>1));
		// 		if(!empty($m))
		// 		{
		// 		 $jobs[$k]->milestone = $m->milestoneTitle;
		// 		 $jobs[$k]->milestoneAmount = $m->milestoneAmount;
		// 	  }
		// 		else
		// 		{
		// 			$jobs[$k]->milestone = "";
		// 			$jobs[$k]->milestoneAmount = "";
		//
		//
		// 		}
		// 	}
		// }

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
		$data['title'] ="Job";
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/contractdetail');
		$this->load->view('freelancer/footer');
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
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');
		if(!empty($results->id))
		{
			$id = $results->id;
		}

		if(!empty($id))
		{
			$jobs = $this->common->getContractDetail(array("jc.contractId"=>$id));

			if(!empty($jobs))
			{
				$jobs->milestone = $this->common->get('todoList',array("contractId"=>$id,"milestone"=>1));

				$c = $this->common->getrow('currency',array("id"=>$jobs->currencyId));

				if(!empty($c))
				{
				 $jobs->currencycode = $c->code;
				 $jobs->currencysymbol = $c->symbol;
			  }

				foreach($jobs->milestone as $key=>$m)
				{
					$tasks = $this->common->get('todoList',array("parent"=>$m->id,"contractId"=>$id));
					$payment = $this->common->getrow('contract_payment',array("contractId"=>$id,"milestoneId"=>$m->id));
					foreach($tasks as $k=>$t)
					{
						$log = $this->common->getOneRow('user_log',array("logReference"=>$t->taskId),'logId','desc');
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
	/////////////////contracts

	////	 notification
	public function notification()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
			//$this->checkAccess('notification');
		  $data['title'] ="Recent Notifications | Performance Notifications";
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

		  $this->load->view('freelancer/header',$data);
		  $this->load->view('freelancer/notification');
		  $this->load->view('freelancer/footer');
	  }
		else
		{
		  redirect('login');
		}
	}


	public function getNotification()
	{
		if(!empty($_POST['perpage']))
      {
        $perpage =$_POST['perpage'];
      }
      else
      {
        $perpage =10;
      }
      if(!empty($_POST['date']))
      {
       $_POST['date'] = date("Y-m-d", strtotime($_POST['date']));
      }

      $config = array();
			$data['pcount'] = $this->common->count_all_results('user_notification',array("notificationTo"=>$this->session->userdata['clientloggedin']['id'],"notificationStatus"=>0));
      $config["base_url"] = base_url() . 'freelancer/getnotification/';
			$config["total_rows"] = $this->common->count_all_results('user_notification',array("notificationTo"=>$this->session->userdata['clientloggedin']['id'],"notificationStatus"=>0));
      $config["per_page"] = $perpage;
      $config["uri_segment"] = 3;
      $this->pagination->initialize($config);
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      if( $page <= 0 )
      {
        $page = 1;
      }
      $start = ($page-1) * $config["per_page"];
      $data['start'] = $start;
			$data['result'] = $this->common->getNotification(array("notificationTo"=>$this->session->userdata['clientloggedin']['id'],"notificationStatus"=>0),$start,$config["per_page"]);
      $data["links"] = getPagination($config["per_page"],$config["total_rows"],$config["base_url"],$config["uri_segment"],1);
      $data['start'] = $start;
      if($data)
      {
        $output['success'] = "true";
        $output['result'] = $data;
      }
      echo json_encode($output);
      exit;
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
	/////// notification


	//////// chat filter
	public function chatpersonFilter()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$filter = $results->filter;
		$userId = $results->userId;

		if(isset($userId))
		{

			if($filter == 1)
			{

				$person = $this->common->chatPerson($userId);
			}
			else if($filter == 2)
			{
				$person = $this->common->chatActivePerson($userId,1);
			}
			else if($filter == 3)
			{
				$person = $this->common->chatActivePerson($userId,2);
			}
			else if($filter == 4)
			{
				$person = $this->common->followupPerson($userId);
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
	/////// chat filter



	public function getsession()
	{
		$data = array();
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
			$data['image'] = $name->logo;
			$data['type'] =$type;
		}
		echo json_encode($data);
	}

	public function profile()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$data['title'] ="Profile";
		$this->checkAccess('profile');
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/profile');
		$this->load->view('freelancer/footer');
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
		if(!empty($profile->year))
		{
			$profile->year = date("d-m-Y", strtotime($profile->year));
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

	public function getcountry()
	{
		$country = $this->common->getTable('countries');
		if($country)
		{
			$msg['message'] = "true";
			$msg['result'] = $country;
		}
		else
		{
			$msg['message'] = "false";
			$msg['result'] ='';
		}
		echo json_encode($msg);

	}

	public function logoupload()
	{
		$ctype ='';
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$data = $results->image;

		if(!empty($results->type))
		{
		$ctype   = $results->type;
   	}

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);

		$data1 = base64_decode($data);

		$f = finfo_open();

		$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);


		if($mime_type =="image/png")
		{
			echo $image = uniqid().'logo.png';
			$result = file_put_contents('assets/client_images/'.$image,$data1);

			// if($ctype == "company")
			// {
			// $this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),array("company_logo"=>$image),'user_meta');
		 // }
     }
		else if($mime_type =="image/jpeg")
		{
			echo $image=uniqid().'logo.jpeg';
			$result=file_put_contents('assets/client_images/'.$image,$data1);

		}
		else if($mime_type =="application/pdf")
		{
			echo $image = uniqid().'logo.pdf';
			$result=file_put_contents('assets/client_images/'.$image,$data1);



		}
		else if($mime_type == "text/plain")
		{
			echo $image = uniqid().'logo.text';
			$result=file_put_contents('assets/client_images/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
			echo	 $image = uniqid().'logo.xlsx';
			$result=file_put_contents('assets/client_images/'.$image,$data1);
		}
		exit;

	}

	public function companylogoupload()
	{
		$ctype ='';
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$data = $results->image;

		if(!empty($results->type))
		{
		$ctype   = $results->type;
		}

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);

		$data1 = base64_decode($data);

		$f = finfo_open();

		$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);


		if($mime_type =="image/png")
		{
			echo $image = uniqid().'logo.png';
			$result = file_put_contents('assets/client_images/'.$image,$data1);

		}
		else if($mime_type =="image/jpeg")
		{
			echo $image=uniqid().'logo.jpeg';
			$result=file_put_contents('assets/client_images/'.$image,$data1);

		}
		else if($mime_type =="application/pdf")
		{
			echo $image = uniqid().'logo.pdf';
			$result=file_put_contents('assets/client_images/'.$image,$data1);

    }
		else if($mime_type == "text/plain")
		{
			echo $image = uniqid().'logo.text';
			$result=file_put_contents('assets/client_images/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
			echo	 $image = uniqid().'logo.xlsx';
			$result=file_put_contents('assets/client_images/'.$image,$data1);
		}
		exit;

	}

	public function freelancerlogoupload()
	{
		$ctype ='';
		$data = $_POST['image'];
		$ctype   = $_POST['type'];

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);

		$data1 = base64_decode($data);

		$f = finfo_open();

		$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);


		if($mime_type =="image/png")
		{
			echo $image = uniqid().'logo.png';
			$result = file_put_contents('assets/client_images/'.$image,$data1);

			if($ctype == "company")
			{
			$this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),array("company_logo"=>$image),'user_meta');
		  }
			else if($ctype == "freelancer")
			{
				$this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),array("logo"=>$image),'user_meta');

			}


		}
		else if($mime_type =="image/jpeg")
		{
			echo $image=uniqid().'logo.jpeg';
			$result=file_put_contents('assets/client_images/'.$image,$data1);

			if($ctype == "company")
			{

			$this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),array("company_logo"=>$image),'user_meta');

			}
			else if($ctype == "freelancer")
			{
				$this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),array("logo"=>$image),'user_meta');

			}


		}

		else if($mime_type == "image/gif")
		{
			echo $image=uniqid().'logo.gif';
			$result=file_put_contents('assets/client_images/'.$image,$data1);

			if($ctype == "company")
			{

			$this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),array("company_logo"=>$image),'user_meta');
    	}
			else if($ctype == "freelancer")
			{
				$this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),array("logo"=>$image),'user_meta');

			}

		}

		else if($mime_type =="application/pdf")
		{
			echo $image = uniqid().'logo.pdf';
			$result=file_put_contents('assets/client_images/'.$image,$data1);



		}
		else if($mime_type == "text/plain")
		{
			echo $image = uniqid().'logo.text';
			$result=file_put_contents('assets/client_images/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
			echo	 $image = uniqid().'logo.xlsx';
			$result=file_put_contents('assets/client_images/'.$image,$data1);
		}
		exit;

	}

   public function profileupdate()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $bankdetail = array();

		 if(empty($results->logo))
		 {
			 unset($results->logo);
		 }
		 if(!empty($results->year))
		 {
			 $results->year = date("Y-m-d", strtotime($results->year));
		 }
		 if(empty($results->city))
		 {
			 $results->city = 48315;
		 }

		 $profile = $this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),$results,'user_meta');

		 $check = $this->common->getrow('user_paymentmethod',array("userId"=>$this->session->userdata['clientloggedin']['id']));


		 $bankdetail['userId'] = $this->session->userdata['clientloggedin']['id'];
		 $bankdetail['currencyId'] = $results->currencyId;

		 if(empty($check))
		 {
		 $res = $this->common->insert('user_paymentmethod',$bankdetail);
		 }

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


	public function getstate()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
    $id = $results->id;

			$success = $this->common->get("states",array("country_id"=>$id));

			if($success)
			{
				$result['message']='true';
				$result['result'] = $success;
			}
			else
			{
				$result['message']='false';
			}
			echo json_encode($result);

	}

	public function getcity()
	{

		$array = file_get_contents('php://input');
		$results =json_decode($array);
    $id = $results->id;

			$success = $this->common->get("cities",array("state_id"=>$id));

			if($success)
			{
				$result['msg']='true';
				$result['result'] = $success;
			}
			else {
				$result['msg']='false';
			}
			echo json_encode($result);

	}

	public function services()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$data['title'] ="Services";
		//$this->checkAccess('service');
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/services');
		$this->load->view('freelancer/footer');
	  }
		else
		{
		 redirect('login');
		}
	}

	public function getindustry()
	{
    $industry = $this->common->getTable('practice_areas');
		if($industry)
		{
			$msg['message'] ="true";
			$msg['result'] = $industry;
		}
		else
		{
			$msg['message'] ="false";
			$msg['result'] = '';
		}
		echo json_encode($msg);
	}

	public function getservice()
	{
		$service = $this->common->getTable('services');
		if($service)
		{
			$msg['message'] ="true";
			$msg['result'] = $service;
		}
		else
		{
			$msg['message'] ="false";
			$msg['result'] = '';
		}
		echo json_encode($msg);
	}

	public function userservices()
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
			$userid = $user->parent;
		}
		else
		{
			$userid = $user->id;
		}
		$service = $this->common->getuserServices($this->session->userdata['clientloggedin']['id']);
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

	public function userindustry()
	{
		$ind = $this->common->getuserIndustry($this->session->userdata['clientloggedin']['id']);
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

	public function saveService()
	{
		$array = file_get_contents('php://input');
	  $results =json_decode($array);
    $inds = $results->industry;
		$ser = $results->service;

		if(!empty($inds))
		{
			$this->db->where('u_id',$this->session->userdata['clientloggedin']['id']);
      $query = $this->db->delete('user_industries');
			 foreach($inds as $ind)
			 {
		    $industry = $this->common->insert('user_industries',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"industryId"=> $ind->id));
			 }
		}

		if(!empty($ser))
		{
			$this->db->where('u_id',$this->session->userdata['clientloggedin']['id']);
      $query = $this->db->delete('user_services');
			foreach($ser as $se)
			{
        $service = $this->common->insert('user_services',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"servicesId"=>$se->id));
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

	public function testimonial()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$data['title'] ="Testimonial";
		//$this->checkAccess('testimonial');
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/testimonial_view');
		$this->load->view('freelancer/footer');
	  }
		else
		{
		 redirect('login');
		}
	}

	public function testimonial_add()
	{
		if(!empty($this->session->userdata['clientloggedin']['id']))
		{
		$data['title'] ="Add testimonial";
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/testimonial_add');
		$this->load->view('freelancer/footer');
	  }
		else
		{
		 redirect('login');
		}
	}

	public function testimonial_logoupload()
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
			echo $image = uniqid().'logo.png';
			$image = file_put_contents('assets/testimonial_logo/'.$image,$data1);
		}
		else if($mime_type =="image/jpeg")
		{
			echo $image=uniqid().'logo.jpeg';
			$result=file_put_contents('assets/testimonial_logo/'.$image,$data1);
		}
		else if($mime_type =="application/pdf")
		{
			echo $image = uniqid().'logo.pdf';
			$result=file_put_contents('assets/testimonial_logo/'.$image,$data1);
		}
		else if($mime_type == "text/plain")
		{
			echo $image = uniqid().'logo.text';
			$result=file_put_contents('assets/testimonial_logo/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
			echo	 $image = uniqid().'logo.xlsx';
			$result=file_put_contents('assets/testimonial_logo/'.$image,$data1);
		}
		exit;

	}

	 public function testimonial_save()
	 {
		 $array = file_get_contents('php://input');
 		 $results =json_decode($array);

		 //$results->u_id = $this->session->userdata['clientloggedin']['id'];

		 $user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		 if($user->parent == 0)
		 {
			 $results->u_id = $this->session->userdata['clientloggedin']['id'];
		 }
		 else if($user->parent != 0)
		 {
		  $results->u_id = $user->parent;
			$results->employeeId = $this->session->userdata['clientloggedin']['id'];
		 }

		 $res = $this->common->insert('user_testimonial',$results);

		 if($res)
		 {
			 $msg['message'] = "true";
		 }
		 else
		 {
			 	 $msg['message'] = "false";
		 }
		 echo json_encode($msg);
	 }

	 public function gettestimonial()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;

		 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		 if(!empty($page))
		 {
			  if($user->parent == 0)
			  {
        $data['pcount'] = $this->common->count_all_results('user_testimonial',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"testimonialDeleted"=>0));
				$config["total_rows"] = $this->common->count_all_results('user_testimonial',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"testimonialDeleted"=>0));
			  }
				else if($user->parent != 0)
			  {
        $data['pcount'] = $this->common->count_all_results('user_testimonial',array("employeeId"=>$this->session->userdata['clientloggedin']['id'],"testimonialDeleted"=>0));
				$config["total_rows"] = $this->common->count_all_results('user_testimonial',array("employeeId"=>$this->session->userdata['clientloggedin']['id'],"testimonialDeleted"=>0));
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
			  $testimonial = $this->common->getallUserTestimonial(array("u_id"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
		    }
				else if($user->parent != 0)
				{
				 $testimonial = $this->common->getallUserTestimonial(array("employeeId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);

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

	 public function testimonial_delete()
	 {

		$array = file_get_contents('php://input');
		$results =json_decode($array);
    $query = $this->common->update(array('testimonialId'=>$results->id),array("testimonialDeleted"=>1),'user_testimonial');

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

	public function testimonial_update()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		if(empty($results->testimonialLogo))
		{
			unset($results->testimonialLogo);
		}

		$res = $this->common->update(array("testimonialId"=>$results->testimonialId),$results,'user_testimonial');
		if($res)
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




	 public function casestudy()
	 {
		 $data['title'] ="Case study";
		 //$this->checkAccess('casestudy');
     $this->load->view('freelancer/header',$data);
		 $this->load->view('freelancer/case_study_add');
		 $this->load->view('freelancer/footer');
	 }

	 public function casestudySave()
	 {
		 $array = file_get_contents('php://input');
 		 $results =json_decode($array);

		 $user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		 if($user->parent == 0)
		 {
			 $results->u_id = $this->session->userdata['clientloggedin']['id'];
		 }
     else if($user->parent != 0)
		 {
		  $results->u_id = $user->parent;
		  $results->employeeId = $this->session->userdata['clientloggedin']['id'];
		 }

 		 if($results)
 		 {
 		 $case = $this->common->insert('user_case_studies',$results);
 		 }

		 if($case)
 		 {
 			 $msg['message']= "true";
 		 }
 		 else
 		 {
 			 $msg['message']= "false";
 		 }

		 echo json_encode($msg);
		 exit;
	 }

	 public function getcasestudy()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;

		 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		 if(!empty($page))
		 {
			  if($user->parent == 0)
			  {
        $data['pcount'] = $this->common->count_all_results('user_case_studies',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
				$config["total_rows"] = $this->common->count_all_results('user_case_studies',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			  }
				else if($user->parent != 0)
			  {
        $data['pcount'] = $this->common->count_all_results('user_case_studies',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
				$config["total_rows"] = $this->common->count_all_results('user_case_studies',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
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
			  $case = $this->common->getcase_study(array("st.u_id"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
		   }
			 else
			 {
				$case = $this->common->getcase_study(array("st.employeeId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
			  }
		}

		if($case)
		{
			$data['message'] ="true";
			$data['result'] = $case;
			$data['start'] = $start + 1;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
	 }

	 public function case_study_delete()
	 {
		 $array = file_get_contents('php://input');
  	 $results =json_decode($array);


		 $query = $this->common->update(array('casestudyId'=>$results->id),array("deleted"=>1),'user_case_studies');

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

	 public function case_study_edit()
   {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		 $result = $this->common->getrow('user_case_studies',array("casestudyId"=>$results->id));
		 if($result)
		 {
			 $output['message'] ="true";
			 $output['result'] = $result;
		 }
		 else
		 {
		  $output['message'] ="false";
		 }
		 echo json_encode($output);
		 exit;

	 }
	 public function casestudy_update()
   {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);


		 $result = $this->common->update(array("casestudyId"=>$results->casestudyId),$results,'user_case_studies');
		 if($result)
		 {
			 $output['message'] ="true";
		 }
		 else
		 {
		  $output['message'] ="false";
		 }
		 echo json_encode($output);
		 exit;

	 }

	 public function casestudy_upload()
 	{
 		$array = file_get_contents('php://input');
 		$results =json_decode($array);

 		$data = $results->image;
 		$name = $results->name;


 		list($type, $data) = explode(';', $data);
 		list(, $data)      = explode(',', $data);

 		$data1 = base64_decode($data);
 		$f = finfo_open();
 		$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);
 		echo $image = $name;
 		$image = file_put_contents('assets/case_study/'.$image,$data1);
 		exit;

 	}


	  public function service_pricing()
	  {
			$data['title'] ="Service Pricing";
		  //$this->checkAccess('service_pricing');
      $this->load->view('freelancer/header',$data);
		  $this->load->view('freelancer/service_pricing');
		  $this->load->view('freelancer/footer');
    }

		public function service_pricingSave()
		{
			$array = file_get_contents('php://input');
  		 $results =json_decode($array);

			 $user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

			if($user->parent == 0)
			{
				$results->u_id = $this->session->userdata['clientloggedin']['id'];
			}

			else if($user->parent != 0)
			{
			 $results->u_id = $user->parent;
			 $results->employeeId = $this->session->userdata['clientloggedin']['id'];
			}

  		 if($results)
  		 {
  		 $case = $this->common->insert('service_pricing',$results);
  		 }

			 if($case)
  		 {
  			 $msg['message']= "true";
  		 }
  		 else
  		 {
  			 $msg['message']= "false";
  		 }
  		 echo json_encode($msg);
			 exit;
		}

		public function getservice_pricing()
 	  {
 		 $array = file_get_contents('php://input');
 		 $results =json_decode($array);
 		 $page = $results->page;

		 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		if(!empty($page))
		{
			 if($user->parent == 0)
			 {
				$data['pcount'] = $this->common->count_all_results('service_pricing',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			  $config["total_rows"] = $this->common->count_all_results('service_pricing',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			 }
			 else if($user->parent != 0)
			 {
				$data['pcount'] = $this->common->count_all_results('service_pricing',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
			 $config["total_rows"] = $this->common->count_all_results('service_pricing',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
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
 			  $pricing = $this->common->getservice_pricing(array("pr.u_id"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
		   }
			 else if($user->parent != 0)
			 {
				$pricing = $this->common->getservice_pricing(array("pr.employeeId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
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

	 public function service_pricing_delete()
	 {
		 $array = file_get_contents('php://input');
  	 $results =json_decode($array);
     $query = $this->common->update(array("pricingId"=>$results->id),array("deleted"=>1),'service_pricing');
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

	 public function service_pricing_edit()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		 $result = $this->common->getrow('service_pricing',array("pricingId"=>$results->id));
		 if($result)
		 {
		  $output['message'] = "true";
		  $output['result'] = $result;
		 }
		 else
		 {
			 $output['message'] = "true";
			 $output['result'] = '';
		 }
		 echo json_encode($output);
		 exit;
	 }

	 public function service_pricingUpdate()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		 $result = $this->common->update(array("pricingId"=>$results->pricingId),$results,'service_pricing');
		 if($result)
		 {
		  $output['message'] = "true";
		 }
		 else
		 {
			 $output['message'] = "true";
		 }
		 echo json_encode($output);
		 exit;
	 }

	 public function team()
	 {
		 $data['title'] ="Add and Manage your Employees' Information.";
		 //$this->checkAccess('team');
		 $this->load->view('freelancer/header',$data);
		 $this->load->view('freelancer/team');
		 $this->load->view('freelancer/footer');
	 }

	 public function teamSave()
	 {
		 $array = file_get_contents('php://input');
 		 $results =json_decode($array);
		 $results->joiningdate =  date("Y-m-d",strtotime($results->joiningdate));

		 if(isset($this->session->userdata['clientloggedin']))
		 {
			 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			 if($user->parent == 0)
			 {
				 $userId = $this->session->userdata['clientloggedin']['id'];
			 }
			 else if($user->parent != 0)
			 {
				 $userId = $user->parent;
			 }
		 }



		 $check_email=$this->common->checkexist('user',array('email' =>$results->email));
     $companyCode = $this->common->getrow('user_paymentmethod',array("userId"=>$userId));
		 if(!empty($companyCode) && $companyCode->companyCode != '')
		 {
		 if($check_email != 0)
		 {
			 $msg['success'] ='2';
			 $msg['message'] ='Email is Register Already';
			 echo json_encode($msg);
			 exit;
		 }
		 else
		 {

		  $length           = 8;
      $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $random           = '';
      for ($i = 0; $i < $length; $i++) {
        $random .= $characters[rand(0, $charactersLength - 1)];
      }
     $project = 0;
		 $skill['servicesId'] = $results->services;
		 $us['pass'] = md5($random);
		 $us['email']= $results->email;
		 $us['is_active'] = 1;
		 $us['access'] = $results->access;
		 $us['parent'] = $userId;
		 if(!empty($results->project))
		 {
			 $project = $results->project;
		 }
		 unset($results->services);
		 unset($results->project);
		 unset($results->access);
     unset($results->email);
		 unset($results->status);

		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d H:i:s');

		 $us['type'] = 3;
		 $us['membership'] = 0;
		 $us['uhash'] = strtotime($date) . rand(0,9999);
		 $us['date_created'] = $date;


		 $userinsert = $this->common->insert('user',$us);
     $skill['u_id'] = $userinsert[1];
		 $pro['reference'] = $project;
     $pro['type'] = 'project';
     if($userinsert)
		 {
			 $serviceinsert = $this->common->insert('user_services',$skill);
		 }

     if($userinsert)
		 {
			$detail['name'] = $results->name;
			$detail['pass'] = $random;
			$detail['email'] = $us['email'];

			 $countEmployee = $this->common->countTeamEmployeeCode(array("us.parent"=>$userId));
			 if($countEmployee != 0)
			 {
				 $employeeCode = $countEmployee + 1;
				 $employeeCode = $companyCode->companyCode.'-000'.$employeeCode;
			 }
			 else
			 {
			  $employeeCode = $companyCode->companyCode.'-0001';
			 }

			if($us['access'] != 3 )
			{
		   $message = $this->load->view('email/team_register',$detail,true);
		   $this->mailsend('Top-SEOs Account',$us['email'],$message);
		  }

			 $results->u_id  = $userinsert[1];
		   $pro['u_id'] = $userinsert[1];
			 $companyData = $this->common->getrow("user_meta",array("u_id"=>$this->session->userdata['clientloggedin']['id']));
       $results->date_created = $date;
			 $results->country = $companyData->country;
			 $results->employeeCode = $employeeCode;
			 unset($results->maxPrice);
		   $team = $this->common->insert('user_meta',$results);

				if($project != 0)
				{
					$access = $this->common->insert('user_access',$pro);
				}
		 }
    }

 		 if($team)
 		 {
			 $msg['success'] ='1';
			 $msg['message'] ='register Successfully';
 		 }
 		 else
 		 {
			 $msg['success'] ='0';
			 $msg['message'] ='user not register';
 		 }
	 }
	 else
	 {
		 $msg['success'] ='3';
		 $msg['message'] ='Please add company code';
	 }
 		 echo json_encode($msg);
		 exit;
	 }

	 public function getteam()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;
     $employee = '';
		 $skill = '';

		 if(isset($results->employeeName))
		 {
			 $employee = $results->employeeName;
		 }

		 if(isset($results->skill))
		 {
			 $skill = $results->skill;
		 }

		 if(isset($this->session->userdata['clientloggedin']))
 		{
 			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
 			if($user->parent == 0)
 			{
 				$userId = $this->session->userdata['clientloggedin']['id'];
 			}
 			else if($user->parent != 0)
 			{
 				$userId = $user->parent;
 			}
 		}

		if(!empty($page))
		{
			 $data['pcount'] = count($this->common->count_all_team('user',array("parent"=>$userId),$employee,$skill));
			 $config["total_rows"] = count($this->common->count_all_team('user',array("parent"=>$userId),$employee,$skill));
		 }

		$config = array();
		$config["per_page"] = $results->perpage;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$team = $this->common->getallteam(array("us.parent"=>$userId),$employee,$skill,$start,$config["per_page"]);
		}

		if($team)
		{
			$data['message'] ="true";
			$data['result'] = $team;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
	 }

	 public function team_imageupload()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		 $data = $results->image;


		 list($type, $data) = explode(';', $data);
		 list(, $data)      = explode(',', $data);

		 $data1 = base64_decode($data);

		 $f = finfo_open();

		 $mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);

		 // print_r($mime_type);
		// die;
		 if($mime_type =="image/png")
		 {
			 echo $image = uniqid().'team.png';
			 $image = file_put_contents('assets/client_images/'.$image,$data1);
		 }
		 else if($mime_type =="image/jpeg")
		 {
			 echo $image=uniqid().'team.jpeg';
			 $result=file_put_contents('assets/client_images/'.$image,$data1);
		 }
		 else if($mime_type =="application/pdf")
		 {
			 echo $image = uniqid().'team.pdf';
			 $result=file_put_contents('assets/client_images/'.$image,$data1);
		 }
		 else if($mime_type == "text/plain")
		 {
			 echo $image = uniqid().'team.text';
			 $result=file_put_contents('assets/client_images/'.$image,$data1);
		 }
		 else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		 {
			 echo	 $image = uniqid().'team.xlsx';
			 $result=file_put_contents('assets/client_images/'.$image,$data1);
		 }
		 exit;

	 }

	 public function team_delete()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$query = $this->common->update(array("id"=>$results->id),array("deleted"=>1,"is_active"=>0),'user');
		// $this->db->where('id',$results->id);
		// $query = $this->db->delete('user');
		//
		// if($query)
		// {
		// 	$this->db->where('u_id',$results->id);
		// 	$query1 = $this->db->delete('user_meta');
		// }

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

	public function teamStatus()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$status = $results->status;
		$userId = $results->id;


		if(isset($userId) && isset($status))
		{
			$update = $this->common->update(array('id'=>$userId),array("is_active"=>$status),'user');
		}

		if($update)
		{
			$user = $this->common->getSingleUser(array("us.id"=>$userId));
			$detail['name'] = $user->name;
			$detail['status'] = $status;
			$message = $this->load->view('email/team_activate',$detail,true);
			$this->mailsend('Top-SEOs Account',$user->email,$message);
		}

		if($update)
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


	public function password()
	{
		$data['title'] =" Basic Information";

		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/password');
		$this->load->view('freelancer/footer');
	}

	public function password_update()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$pass = md5($results->pass);
		$cpass = md5($results->currentpass);
    $check = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id'],"pass"=>$cpass));
		if(!empty($check))
		{
		$update = $this->common->update(array("id"=>$this->session->userdata['clientloggedin']['id']),array("pass"=>$pass),'user');

		if($update)
		{
      $msg['message']="true";
		}
		else
		{
		 $msg['message']="false";
		}
	 }
	 else
	 {
	  $msg['error'] ="true";
	 }
		echo json_encode($msg);
	}

	public function milestoneRequest()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$msg ='';
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

    if(!empty($results->milestoneId))
		{
		$milestonedata = $this->common->getrow('user_offermilestone',array("milestoneId"=>$results->milestoneId));
    $status = $this->common->update(array("milestoneId"=>$results->milestoneId),array("milestoneStatus"=>2),'user_offermilestone');
		$msg .= $milestonedata->milestoneTitle ." Request has been sent.";
		$msg .= "Amount : ".$milestonedata->milestoneAmount;

		$data = array(
			"messageFrom"=>$this->session->userdata['clientloggedin']['id'],
			"messageTo"=>$results->clientId,
			"messageText"=>$msg,
			"messageDate"=>$date,
			"messageStatus"=>0,
		);

		$msginsert = $this->common->insert('user_message',$data);

	   }

		 if($msginsert)
		 {
			 $data1 = array(
	 			"messageFrom"=>$this->session->userdata['clientloggedin']['id'],
	 			"messageTo"=>$results->clientId,
	 			"messageText"=>$results->message,
	 			"messageDate"=>$date,
	 			"messageStatus"=>0,
	 		);
	 		$message = $this->common->insert('user_message',$data1);

			$m = $milestonedata->milestoneTitle ." Request has been sent.";
			$Notificationdata = array(
				"notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
				"notificationTo" =>$results->clientId,
				"notificationMessage" => $m,
				"notificationDate" => $date,
				"notificationStatus" => 0,
				"notificationDeleted" =>0,
			);
			$notification = $this->common->insert('user_notification',$Notificationdata);
		 }

		 if($notification)
		 {
			 $log['logType'] = 'contract';
	 		 $log['logSubType'] ="milestone";
			 $log['logReference'] = $results->milestoneId;
	 		 $log['userId'] = $this->session->userdata['clientloggedin']['id'];
			 $log['logText'] = "<span>".$milestonedata->milestoneTitle."</span> milestone changed status to completed ";
	 		 $log['logDate'] = $date;
       $loginsert = $this->common->insert('user_log',$log);

		 }

		 if($message)
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

	public function review()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$t =0;
		$total   = $results->total * 10;
		$overall = $results->overall * 10;
		$to = $total + $overall;
		$t = $to / 2;
		// $t = $results->total * $results->overall;
		$currency = $this->common->Contractcurrency(array("contractId"=>$results->contractId));
    $budget = $this->common->getrow('user_jobcontract',array("contractId"=>$results->contractId));
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
			$userId = $this->session->userdata['clientloggedin']['id'];
		}
		else if($user->parent != 0)
		{
			$userId = $user->parent;
		}
		$insert=array(
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'overall','reviewOverall'=>$results->overall),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'communication','reviewOverall'=>$results->communication * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'skill','reviewOverall'=>$results->skill * 0.40),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'rehire','reviewOverall'=>$results->rehire * 0.40),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'quality','reviewOverall'=>$results->quality * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'deadline','reviewOverall'=>$results->deadline * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'cooperation','reviewOverall'=>$results->cooperation * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'cost','reviewOverall'=>$results->cost * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'availability','reviewOverall'=>$results->availability * 0.20),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'review','reviewOverall'=>$results->review),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'total','reviewOverall'=>$t),
		array('contractId'=>$results->contractId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userId,'reviewType'=>'star','reviewOverall'=>$results->total),
		);

		$review = $this->common->insert_batch('user_review',$insert);
		$contract = $this->common->update(array("contractId"=>$results->contractId),array("contractStatus"=>2,"contractEndDate"=>$date,"freelancerEnd"=>1),'user_jobcontract');

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
		 $this->common->insert('userEarning',array("contractId"=>$results->contractId,"userId"=>$results->clientId,"userEarningAmount"=>$usdAmount,"date"=>$date));
		 $this->common->insert('userEarning',array("contractId"=>$results->contractId,"userId"=>$userId,"userEarningAmount"=>$usdAmount,"date"=>$date));
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

	public function getfreelancerReview()
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
		 exit;
	}

	public function service_briefing()
  {
		$data['title'] ="Service briefing";
		//$this->checkAccess('service_briefing');
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/service_information');
		$this->load->view('freelancer/footer');
	}

	public function getservice_info()
	{
		$userId = '';
		if(isset($this->session->userdata['clientloggedin']))
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
				$userId = $this->session->userdata['clientloggedin']['id'];
			}
			else if($user->parent != 0)
			{
				$userId = $user->parent;
			}
		}
		$result = $this->common->getServicesinfo($userId);

		if($result)
		{
			$data['message'] = "true";
			$data['result'] = $result;
		}
		else
		{
			$data['message'] = "false";
			$data['result'] = '';
		}

		echo json_encode($data);
		exit;
	}

	public function service_infoSave()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$serinfo = $results->serinfo;

		if(isset($this->session->userdata['clientloggedin']))
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
				$userId = $this->session->userdata['clientloggedin']['id'];
			}
			else if($user->parent != 0)
			{
				$userId = $user->parent;
			}
		}

		 foreach($serinfo as $res)
		 {
			 if(isset($res->description))
			 {
			  $data = array(
				 "u_id"=>$userId,
				 "ser_brief"=>$res->description,
				 "serviceId"=>$res->sid,
			 );

			 if(!empty($res->did))
			   {
         $result = $this->common->update(array("id"=>$res->did),$data,'user_service_brief');
				 }
				 else
				 {
          $result = $this->common->insert('user_service_brief',$data);
				 }
			 }
		 }

				 if($result)
				 {
					 $msg['message'] = "true";
				 }
				 else
				 {
					 $msg['message'] = "true";
         }
				 echo json_encode($msg);
				 exit;
		 }

     public function request()
		 {
			 $data['title'] ="Request";
			 //$this->checkAccess('request');
			 $this->load->view('freelancer/header',$data);
			 $this->load->view('freelancer/request');
			 $this->load->view('freelancer/footer');
		 }

		 public function getrequest()
	 	 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $page = $results->page;
			 $user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

	 	 if($user->parent == 0)
	 	 {
	 		 $userId = $user->id;
	 	 }

	 	 else if($user->parent != 0)
	 	 {
	 		$userId = $user->parent;
	 	 }
       if(!empty($page))
			 {
				 $data['pcount'] = $this->common->count_all_results('requests',array("u_id"=>$userId,"status"=>0));
				 $config["total_rows"] = $this->common->count_all_results('requests',array("u_id"=>$userId,"status"=>0));
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
				$result = $this->common->getRequest("requests",array("u_id"=>$userId,"status"=>0),$start,$config["per_page"]);
			}

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

			if($result)
			{
				$data['message'] ="true";
				$data['result'] = $result;
				$data['start'] = $start ;
			}
			else
			{
				$data['message'] ="false";
				$data['result'] = '';
			}

			echo json_encode($data);
			exit;
	 	}

		public function checkAccess($type)
		{
			// if(isset($this->session->userdata['clientloggedin']['access']) != 1 && $type == "team_profile")
			// {
      //    return true;
			// }
			// else if(isset($this->session->userdata['clientloggedin']['access']) == 1 && $type == "profile")
			// {
      //    return true;
			// }
			// else
			// {
			// 	$url = 'dashboard/'.$this->session->userdata['clientloggedin']['url'].'/'.$this->session->userdata['clientloggedin']['aurl'];
      //   redirect($url);
			// }
		}



		public function getActiveContract()
		{

			if (isset($this->session->userdata['clientloggedin']['id']))
			{
				$jobs = $this->common->getfreelancerActiveContract(array("jc.freelancerId"=>$this->session->userdata['clientloggedin']['id']));

				if($jobs)
				{
					$msg['message'] ="true";
					$msg['result'] =$jobs;
				}
				else
				{
					$msg['message'] ="false";
					$msg['result'] ='';
				}
   	}

			echo json_encode($msg);
			exit;
		}

   public function team_profile()
	 {
		 $data['title'] ="Profile";
		 $this->checkAccess('team_profile');
	   $this->load->view('freelancer/header',$data);
		 $this->load->view('freelancer/team_profile');
		 $this->load->view('freelancer/footer');
	 }

   public function getuser_profile()
	 {
		 	if (isset($this->session->userdata['clientloggedin']['id']) )
			{
			 $profile = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			  if(!empty($profile->dateofbirth))
			  {
			  $profile->dateofbirth =  date("d-m-Y",strtotime($profile->dateofbirth));
		    }
				else
				{
					$profile->dateofbirth = '';
				}
				if(!empty($profile->marriageAnniversary))
			  {
			  $profile->marriageAnniversary =  date("d-m-Y",strtotime($profile->marriageAnniversary));
		    }
				else
				{
					$profile->marriageAnniversary = '';
				}
			 $profile->services = $this->common->getservices(array("us.u_id"=>$this->session->userdata['clientloggedin']['id']));
			 $profile->experience = $this->common->getByOrder('employee_experience',array("u_id"=>$this->session->userdata['clientloggedin']['id']),'experienceYearStart','desc');
			 $profile->activities = $this->common->get('employee_activities',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			}

			if($profile)
			{
			 $msg['message'] ="true";
			 $msg['result'] =$profile;
			}
			else
			{
				$msg['message'] ="false";
				$msg['profile'] ='';
			}
			 echo json_encode($msg);
			 exit;
	 }

	 public function serviceSearch()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
     $name = $results->name;

		  if(isset($name))
		  {
			  $result = $this->common->autocomplete('name',$name,'services');
		  }

			if($result)
			{
				$msg['message']="true";
				$msg['result'] = $result;
			}
			else
			{
				$msg['message']="false";
				$msg['result'] = '';
			}
			echo json_encode($msg);
			exit;
	 }

	 public function team_certificate()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$data = $results->image;
		$name = $results->name;


		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);

		$data1 = base64_decode($data);

		$f = finfo_open();

		$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);

		// print_r($mime_type);
	 // die;
		if($mime_type =="image/png")
		{
			echo $image = $name;
			$image = file_put_contents('assets/certificate/'.$image,$data1);
		}
		else if($mime_type =="image/jpeg")
		{
			echo $image= $name;
			$result=file_put_contents('assets/certificate/'.$image,$data1);
		}
		else if($mime_type =="application/pdf")
		{
			echo $image = $name;
			$result=file_put_contents('assets/certificate/'.$image,$data1);
		}
		else if($mime_type == "text/plain")
		{
			echo $image = $name;
			$result=file_put_contents('assets/team/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
			echo	 $image = $name;
			$result=file_put_contents('assets/certificate/'.$image,$data1);
		}
		exit;

	}

	public function teamProfileUpdate()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$services = $results->services;
		$experience = $results->experience;
		$activities = $results->activities;
		$results->dateofbirth =  date("Y-m-d",strtotime($results->dateofbirth));

		if($results->maritalStatus == 2)
		{
		$results->marriageAnniversary =  date("Y-m-d",strtotime($results->marriageAnniversary));
	  }

		if(empty($results->company_logo))
		{
			unset($results->company_logo);
		}

		if(empty($results->activity))
		{
      unset($results->activity);
		}

		unset($results->services);
		unset($results->experience);
		unset($results->activities);

    $profile = $this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),$results,'user_meta');
     if($profile)
		 {
			 $this->db->where('u_id',$this->session->userdata['clientloggedin']['id']);
       $query = $this->db->delete('user_services');

			  if(!empty($services))
				{
 			   foreach($services as $ser)
 			   {
					 if($ser->id == 0)
					 {
							$s['name'] = $ser->name;
							$s['date_created'] = $date;
							$s['status'] = 0;
							$serviceInsert = $this->common->insert('services',$s);
							if($serviceInsert)
							{
							$slog['logType'] = "suggestion";
							$slog['logSubType'] = "Service";
							$slog['userId'] = $this->session->userdata['clientloggedin']['id'];
							$slog['logReference'] = $serviceInsert[1];
							$slog['logDate'] = $date;
							$slog['logStatus'] = 0;
							$Sloginsert = $this->common->insert('user_log',$slog);
							$this->common->insert('user_services',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"servicesId"=>$serviceInsert[1]));
							}
					 }
					 else
					 {
						 $services = $this->common->insert('user_services',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"servicesId"=> $ser->id));

					 }
 			   }
		    }
			 $this->common->delete('employee_experience',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
			 $this->common->delete('employee_activities',array('u_id'=>$this->session->userdata['clientloggedin']['id']));

        if(!empty($experience))
				{
			    foreach($experience as $res)
			    {

             $ex['u_id'] = $this->session->userdata['clientloggedin']['id'];
						 $ex['experienceDesignation'] = $res->designation;
						 $ex['experienceMonthStart'] = $res->MonthStart;
						 $ex['experienceYearStart'] = $res->YearStart;
						 $ex['experienceMonthEnd'] = $res->MonthEnd;
						 $ex['experienceYearEnd'] = $res->YearEnd;
						 $ex['experienceDescription'] = $res->description;
						 $ex['experienceCompany'] = $res->company;
						 $ex['experienceCurrentlyWorking'] = $res->working;
              if($res->designation != '')
							{
						 $experienc = $this->common->insert('employee_experience',$ex);
					    }
			     }
		    }

				if(!empty($activities))
				{
					foreach($activities as $ac)
					{
					$a['u_id'] = $this->session->userdata['clientloggedin']['id'];
					$a['name'] = $ac->name;
					$a['upload'] = $ac->upload;
					$a['type'] = $ac->type;
					$activity = $this->common->insert('employee_activities',$a);
				  }
				}
		 }

		 if($profile)
		 {
			 $msg['message'] = 'true';
		 }
		 else
		 {
		   $msg['message'] ="false";
		 }
     echo json_encode($msg);
		 exit;
	}


	 public function portfolio()
	 {
		 $data['title'] ="Portfolio";
		 $this->load->view('freelancer/header',$data);
		 $this->load->view('freelancer/portfolio');
		 $this->load->view('freelancer/footer');
	 }

	 public function getportfolio()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;

		 $user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		 if(!empty($page))
		 {
			  if($user->parent == 0)
			  {
				$data['pcount'] = $this->common->count_all_results('user_portfolio',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
				$config["total_rows"] = $this->common->count_all_results('user_portfolio',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			  }
				else if($user->parent != 0)
			  {
				$data['pcount'] = $this->common->count_all_results('user_portfolio',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
				$config["total_rows"] = $this->common->count_all_results('user_portfolio',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
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
			 $result = $this->common->getbylimitStart("user_portfolio",array("u_id"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
		   }
			 else if($user->parent != 0)
			 {
				 $result = $this->common->getbylimitStart("user_portfolio",array("employeeId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
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


   public function portfolioImage()
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
 			echo $image = uniqid().'portfolio.png';
 			$image = file_put_contents('assets/portfolio/'.$image,$data1);
 		}
 		else if($mime_type =="image/jpeg")
 		{
 			echo $image=uniqid().'portfolio.jpeg';
 			$result=file_put_contents('assets/portfolio/'.$image,$data1);
 		}
 		else if($mime_type =="application/pdf")
 		{
 			echo $image = uniqid().'portfolio.pdf';
 			$result=file_put_contents('assets/portfolio/'.$image,$data1);
 		}
 		else if($mime_type == "text/plain")
 		{
 			echo $image = uniqid().'portfolio.text';
 			$result=file_put_contents('assets/portfolio/'.$image,$data1);
 		}
 		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
 		{
 			echo	 $image = uniqid().'portfolio.xlsx';
 			$result=file_put_contents('assets/portfolio/'.$image,$data1);
 		}
 		exit;
	 }

	 public function portfolioSave()
	 {
		 $array = file_get_contents('php://input');
 		 $results =json_decode($array);

		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
 		 $date =  $nowUtc->format('Y-m-d H:i:s');
		 $results->portfolioDate = $date;
		 $user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		 if($user->parent == 0)
		 {
			 $results->u_id = $this->session->userdata['clientloggedin']['id'];
		 }

		 else if($user->parent != 0)
		 {
		  $results->u_id = $user->parent;
			$results->employeeId = $this->session->userdata['clientloggedin']['id'];
		 }


 		 $services = $results->services;
		 unset($results->services);


     $portfolio = $this->common->insert("user_portfolio",$results);
      if($portfolio)
 		 {

 			  if(!empty($services))
 				{
  			   foreach($services as $ser)
  			   {
  		     $services = $this->common->insert('portfolio_services',array("portfolioId"=>$portfolio[1],"servicesId"=>$ser->id));
  			   }
 		   }

 		 }

 		 if($portfolio)
 		 {
 			 $msg['message'] = 'true';
 		 }
 		 else
 		 {
 		   $msg['message'] ="false";
 		 }
      echo json_encode($msg);
 		  exit;
	 }

	 public function portfolio_delete()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
    $query = $this->common->update(array("portfolioId"=>$results->id),array("portfolioDeleted"=>1),'user_portfolio');
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

	public function portfolio_edit()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->getrow('user_portfolio',array("portfolioId"=>$results->id));

		if($result)
		{
			$result->services = $this->common->getPortfolioServices(array("ps.portfolioId"=>$results->id));
		}

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

	public function portfolio_update()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$services = $results->services;
		$portfolioId = $results->portfolioId;
		if(empty($results->portfolioImage))
		{
			unset($results->portfolioImage);
		}
		unset($results->services);

	$portfolio = $this->common->update(array('portfolioId'=>$portfolioId),$results,'user_portfolio');
		 if($portfolio)
		{

			 if(!empty($services))
			 {
				 $this->db->where('portfolioId',$portfolioId);
		 		 $query = $this->db->delete('portfolio_services');

					foreach($services as $ser)
					{
					$services = $this->common->insert('portfolio_services',array("portfolioId"=>$portfolioId,"servicesId"=>$ser->id));
					}
			}

		}

		if($portfolio)
		{
			$msg['message'] = 'true';
		}
		else
		{
			$msg['message'] ="false";
		}
		 echo json_encode($msg);
		 exit;
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
		$t = "<span>".$title->taskTitle."</span> task status changed to completed";
	  }
		else
		{
		 $t = "<span>".$title->taskTitle."</span> task status changed to not completed";
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

	public function getContractlog($type,$job,$milestone = null,$task = null)
	{
		// $log = $this->common->projectMilestones($id);\
		$mids = array();
		$tids = array();
		$cids =array();
		$jobdetails = $this->common->jobMilestonesTasks($job,$milestone ? $milestone : null);


		foreach ($jobdetails as $key => $value)
		{
			if($type == 'contract')
			{
				if(!in_array($value->milestoneId,$mids))
				$mids[] = $value->milestoneId;
			}

			if(!in_array($value->taskId,$tids))
			$tids[] = $value->taskId;

			if(!in_array($value->contractId,$cids))
			$cids[] = $value->contractId;
		}

		if($type == 'contract')
		{
			$jobdetails1 = $this->common->contractlog('contract',$tids,$mids,$cids);
		}

		else if($type == 'milestone')
		{
			$jobdetails1 = $this->common->contractlog('milestone',$tids);

    }

		if(!empty($jobdetails1))
		{
		  foreach($jobdetails1 as $key=>$res)
		  {
			$jobdetails1[$key]->comment = $this->common->getcomment(array("log.logReference"=>$res->logId,"logSubType"=>'comment'));
			$user = $this->common->getrow('user_meta',array("u_Id"=>$res->userId));
			$jobdetails1[$key]->name = $user->name;
		  }
		}


		$msg['message'] = "true";
		$msg['result'] = $jobdetails1;
		echo json_encode($msg);
	  exit;
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



	 public function testimonial_edit()
	 {
		 $array = file_get_contents('php://input');
 		$results =json_decode($array);


 		$testimonial = $this->common->getrow('user_testimonial',array("testimonialId"=>$results->id));

 		if($testimonial)
 		{
 			$msg['message'] ="true";
			$msg['result'] = $testimonial;
 		}
 		else
 		{
 		 $msg['message'] ="false";
 		}
 		echo json_encode($msg);
	 }

	 public function account()
	 {
		 $data['title'] ="Account";
		 $this->load->view('freelancer/header',$data);
		 $this->load->view('freelancer/account');
		 $this->load->view('freelancer/footer');
	 }

	 public function getaccount()
	 {
		 if(isset($this->session->userdata['clientloggedin']['id']))
 		 {
      $account = $this->common->getrow('user_account',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
     }

		 if($account)
		 {
		 $msg['message'] ="true";
		 $msg['result'] = $account;
		 }
		 else
		 {
			$msg['message'] ="false";
		 }

		 echo json_encode($msg);
    }

		public function accountUpdate()
		{
			$array = file_get_contents('php://input');
		  $results =json_decode($array);
			$account = $this->common->getrow('user_account',array("u_id"=>$this->session->userdata['clientloggedin']['id']));

			if(!empty($account))
			{
			  $result = $this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),$results,'user_account');
			}
			else
			{
				$results->u_id = $this->session->userdata['clientloggedin']['id'];
				$result = $this->common->insert('user_account',$results);
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

		public function payment()
		{
			 $data['title'] ="Payment";
			 $data['payment'] = $this->common->getrow('user_account',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			 $this->load->view('freelancer/header',$data);
			 $this->load->view('freelancer/payment');
			 $this->load->view('freelancer/footer');
		}

		public function paypal()
		{
			$this->load->view('freelancer/paypal');
		}

		public function industrySearch()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$name = $results->name;

			 if(isset($name))
			 {
				 $result = $this->common->autocomplete('name',$name,'practice_areas');
			 }

			 if($result)
			 {
				 $msg['message']="true";
				 $msg['result'] = $result;
			 }
			 else
			 {
				 $msg['message']="false";
				 $msg['result'] = '';
			 }
			 echo json_encode($msg);
			 exit;
		}

		public function proposal()
		{
			$data['title'] ="Proposal";
			$this->load->view('freelancer/header',$data);
			$this->load->view('freelancer/proposal');
			$this->load->view('freelancer/footer');
		}

		public function getproposal()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;

			if(!empty($page))
			{
					$data['pcount'] = $this->common->count_all_results('user_job_proposal',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
					$config["total_rows"] = $this->common->count_all_results('user_job_proposal',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
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

					$proposal = $this->common->getFreelancerProposal(array("p.u_id"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);

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
		}

		public function getproposaldetail()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			 if(!empty($results->id))
			 {
				 $proposal = $this->common->getrow('user_job_proposal',array("proposalId"=>$results->id));

				 $m = $this->common->getrow('user_job_proposal_milestones',array("proposalId"=>$results->id));
				 $job = $this->common->getrow('user_job',array("jobId"=>$proposal->jobId));
				 $currency = $this->common->getrow('currency',array("id"=>$job->currencyId));
				 if(!empty($m))
				 {
				 $proposal->milestone = unserialize($m->milestones);
			   }
				 else
				 {
					 $proposal->milestone = '';
				 }
				 if($currency)
				 {
					 $proposal->code = $currency->code;
					 $proposal->symbol = $currency->symbol;
				 }

				 $proposal->jobTitle = $job->jobTitle;
			 }

			 if($proposal)
			 {
				 $msg['message'] ="true";
				 $msg['result'] =$proposal;
			 }
			 else
			 {
				 $msg['message'] ="false";
				 $msg['result'] ='';
			 }
			 echo json_encode($msg);
			 exit;
		}

		public function teamResend()
		{
			$array = file_get_contents('php://input');
  		$results =json_decode($array);

 		 $userdata = $this->common->getSingleUser(array("us.id"=>$results->id));

		   $length           = 8;
       $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
       $charactersLength = strlen($characters);
       $random           = '';
       for ($i = 0; $i < $length; $i++) {
         $random .= $characters[rand(0, $charactersLength - 1)];
       }


      if($random)
			{
				$update = $this->common->update(array("id"=>$results->id),array("pass"=>md5($random)),'user');
      }

		 if($update)
 		 {
 			$detail['name'] = $userdata->name;
 			$detail['pass'] = $random;
 			$detail['email'] = $userdata->email;

 			// if($us['access'] != 3 )
 			// {
 		   $message = $this->load->view('email/team_register',$detail,true);
 		   $this->mailsend('Top-SEOs Account',$userdata->email,$message);
 		  // }

 			 }

    	 if($update)
  		 {
 			 $msg['message'] ='true';
  		 }

			 else
  		 {
 			 $msg['message'] ='false';
  		 }

			 echo json_encode($msg);
 		   exit;
		}

		public function deleteService()
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
				$query =	$this->common->delete('user_industries',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"industryId"=>$industryId));

			}

			if(!empty($serviceId))
			{
			$query =	$this->common->delete('user_services',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"servicesId"=>$serviceId));

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

		public function messageToClient()
		{
			$array = file_get_contents('php://input');
			$results = json_decode($array);

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			if(!empty($results->jobId))
			{
				$check = $this->common->getrow('user_friendcontact',array('friendUser'=>$results->messageTo,'friendContact'=>$results->messageFrom,'jobId'=>$results->jobId));
			}

      if(empty($check))
			{
				$friendlistdata = array(
					"friendUser"=>$results->messageTo,
					"friendContact" =>$results->messageFrom,
					"friendStatus" =>0,
					"jobId" =>$results->jobId,
					"user_messageId" => 0,
				);

				$friendlist = $this->common->insert('user_friendcontact',$friendlistdata);
				$friendId = $friendlist[1];
			}

			else if(!empty($check))
			{
        $friendId = $check->friendId;
			}

        $data = array(
					"messageTo"=>$results->messageTo,
					"messageFrom"=>$results->messageFrom,
					"messageText"=>$results->message,
					"friendId"=>$friendId,
					"messageDate"=>$date,
					"messageStatus"=>0,
				);

    	 $success = $this->common->insert('user_message',$data);

				if($success)
				{
					$msg1['message'] = "true";
			  }
        else
			  {
				 $msg1['message'] = "false";
			  }
        echo json_encode($msg1);
			  exit;
      }

			public function jobMilestoneCreate()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				$date =  $nowUtc->format('Y-m-d H:i:s');
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

				$milestones = $results->milestones;
				unset($results->milestones);

				if($user->parent != 0)
				{
					$results->u_id = $user->parent;
				}
				else
				{
					$results->u_id = $this->session->userdata['clientloggedin']['id'];
				}

				$results->proposalStatus = 0;
				$results->proposalDate = $date;
				$results->proposalType = 1;
				$proposal = $this->common->insert('user_job_proposal',$results);

				if($proposal[0] == 1)
				{
					if(!empty($milestones[0]->title))
					{
					$this->common->insert('user_job_proposal_milestones',array("jobId"=>$results->jobId,"proposalId"=>$proposal[1],"milestones"=>serialize($milestones)));
					}
				}

				if($proposal)
				{
					$client = $this->common->getrow('user_joboffer',array("jobId"=>$results->jobId));
					$name = $this->common->getrow('user_meta',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
					$m = $name->name." Create milestone ";

					$Notificationdata = array(
						"notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
						"notificationTo" =>$client->offFrom,
						"notificationMessage" => $m,
						"notificationDate" => $date,
						"notificationStatus" => 0,
						"notificationDeleted" =>0,
					);

					$notification = $this->common->insert('user_notification',$Notificationdata);
				}
				// notification

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
					 redirect('freelancer/payment');
				 }
			}

		public function	authorize()
	  {
			$this->load->view('freelancer/authorize');
		}

		public function authorize_payment()
		{
			require_once(APPPATH . "third_party/authorize/config.php");


$type = "";
$message = "";
if (isset($_POST["pay_now"])) {

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
	 redirect('freelancer/payment',$message);
		}

		public function support_chat()
		{
			$this->load->view('freelancer/header');
			$this->load->view('freelancer/support');
			$this->load->view('freelancer/footer');
		}

		public function membership()
		{
			$data['select'] = $this->common->getrow('user_membership',array("userId"=>$this->session->userdata['clientloggedin']['id'],"membershipStatus"=>1));
			$data['packages'] = $this->common->getTable('packages');
			$this->load->view('freelancer/header');
			$this->load->view('freelancer/membership',$data);
			$this->load->view('freelancer/footer');
		}

		public function membership_payment($id,$packageId)
		{
			$data['userId'] = $id;
			$data['package'] = $this->common->getrow('packages',array("packageId"=>$packageId));
			$this->load->view('freelancer/membership_payment',$data);

		}

		public function upgrade_membership_payment($id,$packageId)
		{
			$data['userId'] = $id;
			$data['package'] = $this->common->getrow('packages',array("packageId"=>$packageId));
			$sub = $this->common->getOneRow('membership_payment',array("userId"=>$id),'id','desc');
			$res = $this->Paypal_Cancel_Subscription($sub->subscriptionId,'cancel');
      if($res['ACK'] == "success")
			{
			$this->load->view('freelancer/membership_payment',$data);
		  }
		}

		public function membership_update($id,$packageId)
		{
			$sub = $this->common->getOneRow('membership_payment',array("userId"=>$id),'id','desc');
			$res = $this->Paypal_Cancel_Subscription($sub->subscriptionId,'cancel');
			if($res['ACK'] == "success")
			{
     	 $lastpackage = $this->common->getRecentOne('user_membership',array("userId"=>$id),'membershipId','desc' );
			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			 $date =  $nowUtc->format('Y-m-d H:i:s');
			 if($lastpackage)
			 {
			  $up = $this->common->update(array("membershipId"=>$lastpackage->membershipId),array("membershipStatus"=>0),'user_membership');
			 }

       if($up)
			 {
				$m['userId'] = $id;
				$m['date'] = $date;
				$m['packageId'] = $packageId;
				$m['membershipStatus'] = 1;

				$mem = $this->common->insert('user_membership',$m);
			  }
				if($mem)
				{
					redirect('freelancer/membership');
				}
			}
		}


		public function requestServiceSave()
		{
			$Sloginsert ='';
			$inloginsert ='';
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			if(!empty($results->service))
			{
       $s['name'] = $results->service;
			 $s['date_created'] = $date;
			 $s['status'] = 0;

			 $serviceInsert = $this->common->insert('services',$s);
			 if($serviceInsert)
			 {
				 $slog['logType'] = "suggestion";
				 $slog['logSubType'] = "Service";
				 $slog['userId'] = $this->session->userdata['clientloggedin']['id'];
				 $slog['logReference'] = $serviceInsert[1];
				 $slog['logDate'] = $date;
				 $slog['logStatus'] = 0;

				 $Sloginsert = $this->common->insert('user_log',$slog);
			 }
     }

			if(!empty($results->industry))
			{
				$i['name'] = $results->industry;
 			  $i['date_created'] = $date;
 			  $i['status'] = 0;

 			 $industryInsert = $this->common->insert('practice_areas',$i);

			 if($industryInsert)
 			 {
 				 $inlog['logType'] = "suggestion";
 				 $inlog['logSubType'] = "Industry";
 				 $inlog['userId'] = $this->session->userdata['clientloggedin']['id'];
 				 $inlog['logReference'] = $industryInsert[1];
 				 $inlog['logDate'] = $date;
 				 $inlog['logStatus'] = 0;

 				 $inloginsert = $this->common->insert('user_log',$inlog);
			}

		}

		if($inloginsert || $Sloginsert)
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

	public function selectedplan()
	{
		$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		if($user->parent == 0)
		{
			$userId = $this->session->userdata['clientloggedin']['id'];
		}
		else if($user->parent != 0)
		{
		 $userId = $user->parent;
	 }
   $result = $this->common->getrow('user_custom_plan',array("userId"=>$userId));
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

	public function freelancerplan()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

	 $result = $this->common->getfreelancerPlan(array("m.userId"=>$results->u_id,"m.membershipStatus"=>1));
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

	public function getsuggestion()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		// $page = $results->page;
		$page =1;

		if(!empty($page))
		{
			$data['pcount'] = $this->common->count_all_results('user_log',array("logType"=>"suggestion","userId"=>$this->session->userdata['clientloggedin']['id']));
			$config["total_rows"] = $this->common->count_all_results('user_log',array("logType"=>"suggestion","userId"=>$this->session->userdata['clientloggedin']['id']));
		}

		$config = array();
		$config["per_page"] = 10;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		$result = $this->common->getsuggestion(array("logType"=>'suggestion',"userId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);


		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
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

	public function notification_status()
	{
		$result = $this->common->update(array("notificationId"=>$_POST['id']),array("notificationStatus"=>$_POST['status']),'user_notification');

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
  // function end

	public function employee()
	{
		$this->load->view('freelancer/header');
		$this->load->view('freelancer/employee');
		$this->load->view('freelancer/footer');
  }

	public function getemployee()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;

		$data['pcount'] = $this->common->count_all_results('company_employee',array("userId"=>$this->session->userdata['clientloggedin']['id']));
		$config["total_rows"] = $this->common->count_all_results('company_employee',array("userId"=>$this->session->userdata['clientloggedin']['id']));

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
	   $result = $this->common->getbylimitStart("company_employee",array("userId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
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

	public function employeeSave()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$results->userId = $this->session->userdata['clientloggedin']['id'];
		$skill = $results->skill;
		unset($results->skill);

		if(!empty($results))
		{
			$insert = $this->common->insert('company_employee',$results);
		}
		if(!empty($skill))
		{
			foreach($skill as $s)
			{
				$a['servicesId'] = $s->id;
				$a['CompanyemployeeId'] = $insert[1];
				$b = $this->common->insert('company_employee_skill',$a);
			}
		}

		if($insert)
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

	public function employee_delete()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	 $this->db->where('id',$results->id);
	 $query = $this->db->delete('company_employee');
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

 public function employee_Edit()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);

	 if(!empty($results))
	 {
		 $res = $this->common->getrow('company_employee',array("id"=>$results->id));
		 $res->skill = $this->common->getemployeeServices(array("CompanyemployeeId"=>$results->id));
	 }
	 if($res)
	 {
		 $msg['message'] ="true";
		 $msg['result'] =$res;
	 }
	 else
	 {
		 $msg['message'] ="false";
	  }
		echo json_encode($msg);
		exit;
 }

 public function employee_update()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);
   $skill = $results->skill;
	 unset($results->skill);
	 if(!empty($results))
	 {
		 $update = $this->common->update(array("id"=>$results->id),$results,'company_employee');
	 }
	 if(!empty($skill))
	 {
		 $this->db->where('CompanyemployeeId',$results->id);
		 $query = $this->db->delete('company_employee_skill');

		 foreach($skill as $s)
		 {
			 $a['servicesId'] = $s->id;
			 $a['CompanyemployeeId'] = $results->id;
			 $b = $this->common->insert('company_employee_skill',$a);
		 }
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

 public function expenseSearch()
 {
	 $array = file_get_contents('php://input');
	 $results =json_decode($array);
	 $name = $results->name;

		if(isset($name))
		{
			$result = $this->common->Expenseautocomplete('label',$name,'expense',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
		}

		if($result)
		{
			$msg['message']="true";
			$msg['result'] = $result;
		}
		else
		{
			$msg['message']="false";
			$msg['result'] = '';
		}
		echo json_encode($msg);
		exit;

 }

	public function work_scheduling()
	{
		$data['title'] ="Work Scheduling | Break Time | Resignation Details";
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/workschduling');
		$this->load->view('freelancer/footer');
	}

	public function breakSave()
	{
		$array = file_get_contents('php://input');
 	  $results =json_decode($array);

		$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

	 if($user->parent == 0)
	 {
		 $userId = $user->id;
		 $results->userId = $user->id;
	 }

	 else if($user->parent != 0)
	 {
		$userId = $user->parent;
		$results->userId = $user->parent;
	 }

     if($results->breaks)
		 {
			 $this->common->delete('break_time',array("userId"=>$userId));
			 foreach($results->breaks as $res)
			 {
				 $res->userId = $userId;
				 $u = $this->common->insert('break_time',$res);
			 }
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

	public function getBreak()
	{
		$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

	 if($user->parent == 0)
	 {
		 $userId = $user->id;
	 }

	 else if($user->parent != 0)
	 {
		$userId = $user->parent;
	 }

		$res = $this->common->get('break_time',array("userId"=>$userId));
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

	public function leaveSave()
	{
		$array = file_get_contents('php://input');
 	  $results =json_decode($array);

		$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

	 if($user->parent == 0)
	 {
		 $results->userId = $user->id;
	 }

	 else if($user->parent != 0)
	 {
		$results->userId = $user->parent;
	 }

		 $res = $this->common->getrow('leave_time',array("userId"=>$results->userId));
		 if(!empty($res))
		 {
		  $u = $this->common->update(array("userId"=>$results->userId),$results,'leave_time');
		 }
		 else
		 {
       $u = $this->common->insert('leave_time',$results);
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

	public function getleave()
	{
		$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

	 if($user->parent == 0)
	 {
		 $userId = $this->session->userdata['clientloggedin']['id'];
	 }

	 else if($user->parent != 0)
	 {
		$userId = $user->parent;
	 }

		$res = $this->common->getrow('leave_time',array("userId"=>$userId));
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



	public function workinghoursSave()
	{
		$array = file_get_contents('php://input');
 	  $results =json_decode($array);
		$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

	 if($user->parent == 0)
	 {
		 $results->userId = $this->session->userdata['clientloggedin']['id'];
	 }

	 else if($user->parent != 0)
	 {
		$results->userId = $user->parent;
	 }
		 $res = $this->common->getrow('workingHours',array("userId"=>$results->userId));
		 if(!empty($res))
		 {
		  $u = $this->common->update(array("userId"=>$results->userId),$results,'workingHours');
		 }
		 else
		 {
       $u = $this->common->insert('workingHours',$results);
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

	public function getworking()
	{
		$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

	  if($user->parent == 0)
		{
			$res = $this->common->getrow('workingHours',array("userId"=>$user->id));
		}
		else if($user->parent != 0)
		{
			$res = $this->common->getrow('workingHours',array("userId"=>$user->parent));
		}
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

	public function project()
	{
		$data['title'] ="Plan & Manage Projects Online";
    $this->load->view('freelancer/header',$data);
    $this->load->view('freelancer/project');
    $this->load->view('freelancer/footer');
	}

	public function project_add()
	{
		$data['title'] ="Create a New Project And Milestones | Create Tasks for Your Projects";
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/project_add');
		$this->load->view('freelancer/footer');
   }

	 public function projectSave()
	 {
		 $array = file_get_contents('php://input');
  	 $results =json_decode($array);

		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date = $nowUtc->format('Y-m-d');
		 $results->date  =  $date;

		 // $results->userId = $this->session->userdata['clientloggedin']['id'];
		 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		 if($user->parent != 0)
		 {
			 $userid = $user->parent;
		 }
		 else
		 {
			 $userid = $user->id;
		 }
		 $results->userId = $userid;
	   $milestone = $results->milestones;
		 $document = $results->document;
		 $results->fixedBudget = $results->budget;
		 unset($results->document);
		 unset($results->milestones);
		 $res = $this->common->insert('project',$results);
		 if($res)
		 {
			 if(!empty($milestone))
			 {
				 foreach($milestone as $m)
				 {
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
					 $mi['name'] = $m->title;
					 $mi['hours'] = $m->hours;
					 $mi['projectId'] = $res[1];
					 $mi['assignedBy'] = $results->projectManagerId;
					 $mi['type'] = 2;
					 $mi['status'] = 2;
					 $mi['taskId'] = $taskId;
					 $mi['milestone'] = 1;

					 $minsert =$this->common->insert('todoList',$mi);
					  if($minsert)
						{
							foreach($m->task as $t)
							{
								if(!empty($t->task))
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
								    $tdata['parent'] = $minsert[1];
								    $tdata['projectId'] = $res[1];
										$tdata['name'] = $t->task;
										$tdata['description'] = $t->description;
										$tdata['hours'] = $t->hours;
										$tdata['assignedBy'] = $results->projectManagerId;
										$tdata['type'] = 2;
										$tdata['status'] = 2;
										$tdata['taskId'] = $taskId1;
									$task = $this->common->insert('todoList',$tdata);
								}
							}
						}
				 }
			 }

			 if(!empty($document))
			 {
				 foreach($document as $doc)
				 {
					 $d['document'] = $doc;
					 $d['projectId'] = $res[1];
					 $task = $this->common->insert('project_document',$d);

				 }
			 }
		 }

		 if($res)
		 {
			 if($results->upfrontAmount != 0)
			 {
				 $firstmilestone = $this->common->getOneRow('todoList',array("projectId"=>$res[1],"milestone"=>1),'id','asc');
				 $this->common->insert('project_milestones_amount',array("projectId"=>$res[1],"projectMilestoneId"=>$firstmilestone->id,"amount"=>$results->upfrontAmount,"date"=>$date));
			 }
		 }

		 if($res)
		 {
			 $mEmail = $this->common->getSingleUser(array("us.id"=>$results->projectManagerId));
			 $sales = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));

			 $detail['projectname'] = $results->projectName;
			 $detail['name'] = $mEmail->name;
			 $detail['sales'] = $sales->name;
			 $message = $this->load->view('email/projectAssign',$detail,true);
			 $mail =	 $this->mailsend('[Top-SEOs] New project assigned',$mEmail->email,$message);
		 }

		 if($res)
		 {
			 $name = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			//  $m = $results->projectName .' Assigned '.$results->projectName .' to '. $name->name .' '. date("d M,Y");
      //   $Notificationdata = array(
			// 	"notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
			// 	"notificationTo" =>$results->projectManagerId,
			// 	"notificationMessage" => $m,
			// 	"notificationDate" => $nowUtc->format('Y-m-d'),
			// 	"notificationStatus" => 0,
			// 	"notificationDeleted" =>0,
			// );
			// $notification = $this->common->insert('user_notification',$Notificationdata);
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

	 public function getproject()
 	{
 		$array = file_get_contents('php://input');
 		$results =json_decode($array);
 		$page = $results->page;

		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
			$userid = $user->parent;
		}
		else
		{
			$userid = $user->id;
		}

		$data['pcount'] = $this->common->count_all_projects('project',array("userId"=>$userid),$results->client,$results->projecttitle);
		$config["total_rows"] = $this->common->count_all_projects('project',array("userId"=>$userid),$results->client,$results->projecttitle);
    $config = array();
 		$config["per_page"] = $results->perpage;
 		$this->pagination->initialize($config);

 		if( $page <= 0 )
 		{
 			$page = 1;
 		}

 		$start = ($page-1) * $config["per_page"];

 		if(!empty($page))
 		{
 	   $result = $this->common->getproject(array("userId"=>$userid),$results->client,$results->projecttitle,$start,$config["per_page"]);
 	  }

		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
				$amount = $this->common->sum_project_paid_amount(array("projectId"=>$res->projectId));
				$c = $this->common->getrow('currency',array("id"=>$res->currency));
				if(!empty($c))
				{
				$result[$key]->code = $c->code;
				$result[$key]->symbol = $c->symbol;
				}
				$result[$key]->paid = $amount->total;
			}
		}

 		if($result)
 		{
 			$data['message'] ="true";
 			$data['result'] = $result;
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

	public function project_delete()
	{
		$array = file_get_contents('php://input');
 	  $results =json_decode($array);
    $query = $this->common->update(array('projectId'=>$results->id),array("deleted"=>1),'project');
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

	public function project_detail($id)
	{
		$data['projectId'] = $id;
		$this->load->view('freelancer/header');
		$this->load->view('freelancer/project_detail',$data);
		$this->load->view('freelancer/footer');
	}



	public function project_assign()
	{
		$this->load->view('freelancer/header');
		$this->load->view('freelancer/project_assign');
		$this->load->view('freelancer/footer');
	}

	public function getproject_assign()
	{
		$array = file_get_contents('php://input');
 		$results =json_decode($array);
 		$page = $results->page;

 		$data['pcount'] = $this->common->count_all_results('project',array("projectManagerId"=>$this->session->userdata['clientloggedin']['id']));
 		$config["total_rows"] = $this->common->count_all_results('project',array("projectManagerId"=>$this->session->userdata['clientloggedin']['id']));

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
 	   $result = $this->common->getprojectM(array("projectManagerId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
 	  }

		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
				$amount = $this->common->sum_project_paid_amount(array("projectId"=>$res->projectId));
				$c = $this->common->getrow('currency',array("id"=>$res->currency));
				if(!empty($c))
				{
				$result[$key]->code = $c->code;
				$result[$key]->symbol = $c->symbol;
				}
				$result[$key]->paid = $amount->total;
		  }
	 }

 		if($result)
 		{
 			$data['message'] ="true";
 			$data['result'] = $result;
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

	public function getprojectmanager()
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
			$userid = $user->parent;
		}
		else
		{
			$userid = $user->id;
		}
		$result = $this->common->getprojectmanager(array("u.access"=>6,"u.parent"=>$userid));
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

	public function project_assign_detail($id)
	{
	  $data['projectId'] = $id;
	  $this->load->view('freelancer/header');
	  $this->load->view('freelancer/project_assign_detail',$data);
	  $this->load->view('freelancer/footer');
	}

	public function getproject_assign_detail()
	{
		$array = file_get_contents('php://input');
 		$results =json_decode($array);
		$d1 = "00:00";

		$res = $this->common->getrow('project',array("projectId"=>$results->id));
		$trackedtime = $this->common->sum_todotask_time(array("projectId"=>$results->id,"type"=>2));
		if(!empty($res))
		{
			$res->document = $this->common->get('project_document',array("projectId"=>$results->id));
		}

		if($trackedtime->time != 0)
		{
			 $hours1 = floor($trackedtime->time / 60);
			 if($hours1 < 10)
			 {
				 $hours1 = '0'.$hours1;
			 }
			 $minutes1 = ($trackedtime->time % 60);
			 if($minutes1 < 10)
			 {
				 $minutes1 = '0'.$minutes1;
			 }
			 $d1 = $hours1.':'.$minutes1;
			 $res->tracked = $d1;
		}
		else
		{
		  $res->tracked = $d1;
		}
		if(!empty($res))
		{
			$res->milestone = $this->common->get('todoList',array("projectId"=>$results->id,"parent"=>0));
			$c = $this->common->getrow('currency',array("id"=>$res->currency));
			if(!empty($c))
			{
			$res->code = $c->code;
			$res->symbol = $c->symbol;
		  }
        if($res->countrycode)
				{
			   $cc = explode(":",$res->countrycode);
			   $res->countrycode = $cc[1];
		    }
				else
				{
					 $res->countrycode = '';
        }
		 }

		if(!empty($res->milestone))
		{
			foreach($res->milestone as $key=>$m)
			{
				$res->milestone[$key]->task = $this->common->gettask(array("projectId"=>$results->id,"parent"=>$m->id));
			}
		}

		if(!empty($res->milestone))
		{
			foreach($res->milestone as $key=>$m)
			{
				foreach($m->task as $k=>$t)
				{
					if($t->startDate)
					{
					$res->milestone[$key]->task[$k]->startDate = date("d-m-Y",strtotime($t->startDate));
				  }
					if($t->dueDate)
					{
					$res->milestone[$key]->task[$k]->dueDate = date("d-m-Y",strtotime($t->dueDate));
				  }
					 // $user = $this->common->getassignproject(array("p.projectTaskId"=>$t->taskId));
					 $time = $this->common->sum_todotask_time(array("todoListId"=>$t->id));
					 if($time->time != 0)
					 {
					    $hours = floor($time->time / 60);
							if($hours < 10)
							{
								$hours = '0'.$hours;
							}
					    $minutes = ($time->time % 60);
							if($minutes < 10)
							{
								$minutes = '0'.$minutes;
							}
					    $d = $hours.':'.$minutes;
					    $res->milestone[$key]->task[$k]->time = $d;
					 }
					 else
					 {
					   $res->milestone[$key]->task[$k]->time = "00:00";
					 }
					 // if(!empty($user))
					 // {
           //  $res->milestone[$key]->task[$k]->assign = $user;
					 // }
					 // else
					 // {
						//  $res->milestone[$key]->task[$k]->assign = '';
					 // }
				}
			}
		}

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

	 public function SearchCompanyUser()
	 {
		 $array = file_get_contents('php://input');
  	 $results =json_decode($array);

		 if($this->session->userdata['clientloggedin']['id'])
		 {
			 $parent = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		 }
		 if($parent)
		 {
			 $result = $this->common->assignProjectUser($parent->parent,'m.name',$results->name);
		 }
     if($result)
		 {
			 $msg['message'] ="true";
			 $msg['result'] =$result;
		 }
		 else
		 {
			 $msg['message'] ="false";
		 }
		 echo json_encode($msg);
		 exit;
	 }

	 public function projectAssignToUser()
	 {
		 $array = file_get_contents('php://input');
  	 $results =json_decode($array);

		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d H:i:s');

		 if(!empty($results))
		 {
        foreach($results->project as $res)
			  {
					foreach($res->task as $t)
					{
						if(!empty($t->checked) && $t->checked == 1)
						{
							$already = $this->common->getrow('todoList',array("id"=>$t->id));

						  if($already->status != 5)
						 {
							if(!empty($t->assignedTo))
							{
							$p['assignedTo'] = $t->assignedTo;
							$p['date'] = $date;
						  }
							else
							{
							 $p['assignedTo'] = null;
							}
							$p['saved'] = $t->saved;
							 if(!empty($t->startDate))
							 {
								 $p['startDate'] = date("Y-m-d",strtotime($t->startDate));
							 }
							 else
							 {
							  $p['startDate'] = null;
							 }
							 if(!empty($t->dueDate))
							 {
                $p['dueDate'] = date("Y-m-d",strtotime($t->dueDate));
							 }
							 else
							 {
								 $p['dueDate'] = null;
							 }
							 $p['started'] = 0;
							 $p['ended'] = 0;
							 $p['date'] = $date;
							 $p['status'] = 2;
				      $updated = $this->common->update(array("id"=>$t->id),$p,'todoList');
						 if($updated)
		 				 {
		 					$msg['message'] ="true";
		 				 }
		 		    else
		 		    {
		 		     $msg['message'] ="false";
		 		    }
					 }
					 else
					 {
					  $msg['error'] ="true";
					 }
				   }
				  }
				 }
			  }

		 echo json_encode($msg);
		 exit;

	 }



	 public function project_status()
	 {
		 $array = file_get_contents('php://input');
  	 $results =json_decode($array);
		 if(!empty($results))
		 {
			 unset($results->userId);
			 $update = $this->common->update(array("projectId"=>$results->projectId),array("status"=>$results->status),'project');
		 }
		 if($update)
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

	 public function employee_project()
	{
		$this->load->view('freelancer/header');
		$this->load->view('freelancer/employee_project');
		$this->load->view('freelancer/footer');
	}

	 public function employee_project_task()
	{
		$data['title'] ="Work & Manage your Project And Their Respective Tasks";
		$this->load->view('freelancer/header',$data);
		$this->load->view('freelancer/project_task');
		$this->load->view('freelancer/footer');
	}

	public function getemployee_project()
	{
		$array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;

		 $data['pcount'] = $this->common->count_EmployeeProject(array("a.userId"=>$this->session->userdata['clientloggedin']['id']));
		 $config["total_rows"] = $this->common->count_EmployeeProject(array("a.userId"=>$this->session->userdata['clientloggedin']['id']));

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
			$result = $this->common->getEmployeeProject(array("a.userId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
		 }

		 if(!empty($result))
		 {
			 foreach($result as $key=>$res)
			 {
				 $result[$key]->task = $this->common->getEmployeeProjectTask(array("t.projectId"=>$res->projectId,"a.userId"=>$res->userId));
			 }
		 }

		 if(!empty($result))
		 {
			 foreach($result as $key=>$res)
			 {
				 foreach($res->task as $k=>$t)
				 {
					 $time = $this->common->sum_task_time(array("type"=>1,"taskId"=>$t->taskId));
					 if($time->time != 0)
			     {
			        $hours = floor($time->time / 60);
							if($hours < 10)
							{
								$hours = '0'.$hours;
							}
			        $minutes = ($time->time % 60);
							if($minutes < 10)
							{
								$minutes = '0'.$minutes;
							}
			        $d = $hours.':'.$minutes;
			        $result[$key]->task[$k]->time = $d;
			     }
			     else
			     {
						 $result[$key]->task[$k]->time = '00:00';
			     }
				 }
			 }
		 }


		 if($result)
		 {
			 $data['message'] ="true";
			 $data['result'] = $result;
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


	 public function employee_task()
	{
		$this->load->view('freelancer/header');
		$this->load->view('freelancer/employee_task');
		$this->load->view('freelancer/footer');
	}

	public function getemployee_task()
	{
		$array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;

		 $data['pcount'] = $this->common->count_all_results('project_task_assign',array("userId"=>$this->session->userdata['clientloggedin']['id']));
		 $config["total_rows"] = $this->common->count_all_results('project_task_assign',array("userId"=>$this->session->userdata['clientloggedin']['id']));

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
			$result = $this->common->getEmployeeTask(array("p.userId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
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

	 public function task_status()
	 {
		 $array = file_get_contents('php://input');
  	 $results =json_decode($array);

		 if(!empty($results))
		 {
			 $update = $this->common->update(array("id"=>$results->taskId),array("status"=>$results->status),'todoList');
		 }

		 if($update)
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

	 public function tasktimeStart()
 	{
 		$array = file_get_contents('php://input');
 		$results =json_decode($array);

 		 if(!empty($results))
 		 {
 			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
 			 $results->userId = $this->session->userdata['clientloggedin']['id'];

 			 $results->startTime = $nowUtc->format('H:i');
 			 $results->startDate = $nowUtc->format('Y-m-d H:i:s');
 			 $results->time = '';
 			 $results->stopDate = $nowUtc->format('Y-m-d H:i:s');

 			 $insert = $this->common->insert('project_task_billing',$results);
 			 }
 			 if($insert)
 			 {
 				$msg['message'] = "true";
 			 }
 			 else
 			 {
 				 $msg['message'] ="false";
 			 }
 			 echo json_encode($msg);
 			 exit;
 	}

	 public function tasktimeStop()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
     $differ = 0;

		  if(!empty($results))
			{
				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
        $lasttimer = $this->common->getOneRow('project_task_billing',array("userId"=>$this->session->userdata['clientloggedin']['id'],"type"=>$results->type,"taskId"=>$results->taskId),'id',"desc");

				$r['stopTime'] = $nowUtc->format('H:i');
				$r['stopDate'] = $nowUtc->format('Y-m-d H:i:s');

				$to_time = strtotime($nowUtc->format('H:i'));

				if($lasttimer)
				{
				$from_time = strtotime($lasttimer->startTime);
				$differ = round(abs($to_time - $from_time) / 60,2);
			  }


			 $r['time'] = $differ;

				$update = $this->common->update(array("id"=>$lasttimer->id),$r,'project_task_billing');
			}
		  if($update)
			{
					$last = $this->common->getrow('project_task_billing',array("id"=>$lasttimer->id));
					$user = $this->common->getrow('user',array("id"=>$last->userId));
					$task = $this->common->getrow('project_task',array("taskId"=>$last->taskId));
					$project = $this->common->getrow('project',array("projectId"=>$task->projectId));

						if($task->status == 1)
						{
							$status = 0;
						}
						else if($task->status == 2)
						{
							$status = 0;
						}
						else if($task->status == 3)
						{
							$status = 1;
						}

						$a['time'] = $last->time;
						$a['task'] = $project->projectName;
						$a['taskDetail'] = $task->task;
						$a['employeeId'] = $last->userId;
						$a['userId'] = $user->parent;
						$a['status'] = $status;
						$a['date'] = $nowUtc->format('Y-m-d H:i:s');
					$dsrinsert =	$this->common->insert('dsr',$a);
			}

			if($update)
			{
			 $msg['message'] = "true";
			}
			else
			{
				$msg['message'] ="false";
			}
			echo json_encode($msg);
			exit;
	 }


	 public function breaktimeStart()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

			if(!empty($results))
			{
				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				$results->userId = $this->session->userdata['clientloggedin']['id'];

				$results->startTime = $nowUtc->format('H:i');
				$results->startDate = $nowUtc->format('Y-m-d H:i:s');
				$results->time = '';
				$results->stopDate = $nowUtc->format('Y-m-d H:i:s');

				$insert = $this->common->insert('project_task_billing',$results);
				}
				if($insert)
				{
				 $msg['message'] = "true";
				}
				else
				{
					$msg['message'] ="false";
				}
				echo json_encode($msg);
				exit;
	 }



	 public function breaktimeStop()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		  if(!empty($results))
			{
				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
        $lasttimer = $this->common->getOneRow('project_task_billing',array("userId"=>$this->session->userdata['clientloggedin']['id'],"type"=>$results->type),'id',"desc");
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

				$r['stopTime'] = $nowUtc->format('H:i');
				$r['stopDate'] = $nowUtc->format('Y-m-d H:i:s');

				$to_time = strtotime($nowUtc->format('H:i'));
				$from_time = strtotime($lasttimer->startTime);
				$differ = round(abs($to_time - $from_time) / 60,2);
			  $r['time'] = $differ;

				$update = $this->common->update(array("id"=>$lasttimer->id),$r,'project_task_billing');



				 $a['time'] = $differ;
				 $a['task'] = $results->task;
				 $a['taskDetail'] = $results->task;
				 $a['employeeId'] = $user->id;
				 $a['userId'] = $user->parent;
				 $a['break'] = 1;
				 $a['status'] = 1;
				 $a['date'] = $nowUtc->format('Y-m-d H:i:s');
				 $dsrinsert =	$this->common->insert('dsr',$a);
			}
			if($update)
			{
			 $msg['message'] = "true";
			}
			else
			{
				$msg['message'] ="false";
			}
			echo json_encode($msg);
			exit;
	 }

	 public function allProjectAsigntoManager()
	 {
		 $result = $this->common->allProjectAsigntoManager(array("projectManagerId"=>$this->session->userdata['clientloggedin']['id']));

		 if($result)
		 {
			 $msg['message'] = "true";
			 $msg['result'] = $result;
		 }
		 else
		 {
			 $msg['message'] = "true";
			 $msg['result'] = '';
		 }
		 echo json_encode($msg);
		 exit;
		}

		public function getproject_milestone()
 	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

 		 $result = $this->common->get('project_milestones',array("projectId"=>$results->projectId));
		 if($result)
 		 {
 			 $msg['message'] = "true";
 			 $msg['result'] = $result;
 		 }
 		 else
 		 {
 			 $msg['message'] = "true";
 			 $msg['result'] = '';
 		 }
 		 echo json_encode($msg);
 		 exit;
 		}

		public function milestoneAmountupdate()
		{
			$array = file_get_contents('php://input');
 		  $results =json_decode($array);
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
      $results->date = $nowUtc->format('Y-m-d H:i:s');

			if(!empty($results))
			{
  		$result = $this->common->insert('project_milestones_amount',$results);
		  }
			if($result)
  		{
  			 $msg['message'] = "true";
  		 }
  		 else
  		 {
  			 $msg['message'] = "true";
  			}
  		 echo json_encode($msg);
  		 exit;
		}

		public function roi()
		{
			$this->load->view('freelancer/header');
			$this->load->view('freelancer/project_profit_loss');
			$this->load->view('freelancer/footer');
		}

		public function getroi()
		{
			$array = file_get_contents('php://input');
   		$results =json_decode($array);
   		$page = $results->page;
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent != 0)
			{
				$userid = $user->parent;
			}
			else
			{
				$userid = $user->id;
			}
   		$data['pcount'] = $this->common->count_all_results('project',array("userId"=>$userid));
   		$config["total_rows"] = $this->common->count_all_results('project',array("userId"=>$userid));

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
   	   $result = $this->common->getprojectM(array("userId"=>$userid),$start,$config["per_page"]);
   	  }

			if(!empty($result))
			{
				foreach($result as $key=>$res)
				{
					 $time = $this->common->sum_todotask_time(array("projectId"=>$res->projectId,"type"=>2));
					 if($time->time != 0)
					 {
						  $hours = floor($time->time / 60);
						  $minutes = ($time->time % 60);
						  $d = $hours.'.'.$minutes;
							$result[$key]->spenttime = $d;
					 }
					 else
					 {
	           $result[$key]->spenttime = 0;
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

		public function getroi_project()
		{
			$array = file_get_contents('php://input');
   		$results =json_decode($array);
   		$page = $results->page;
   		$data['pcount'] = count($this->common->getEmployeeTaskCount($results->projectId));
   		$config["total_rows"] = count($this->common->getEmployeeTaskCount($results->projectId));

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
   	   $result = $this->common->getEmployeeTask($results->projectId,$start,$config["per_page"]);
   	  }


			if(!empty($result))
					{
						foreach($result as $key=>$r)
						{
							if($r->time != 0)
							{
								 $hours = floor($r->time / 60);
								 $minutes = ($r->time % 60);
								 $d = $hours.'.'.$minutes;
								 $result[$key]->time = $d;
							}
							else
							{
								$result[$key]->time = 0;
							}
							if($r->time1 != 0)
							{
								 $hours = floor($r->time1 / 60);
								 $minutes = ($r->time % 60);
								 $d = $hours.'.'.$minutes;
								 $result[$key]->time1 = $d;
							}
							else
							{
								$result[$key]->time1 = 0;
							}
						}
					}

   		if($result)
   		{
   			$data['message'] ="true";
   			$data['result'] = $result;
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

		public function company_roi()
		{
			$data['title']="Calculate Return On Investment (ROI) for Your Business";
			$this->load->view('freelancer/header',$data);
			$this->load->view('freelancer/company_roi');
			$this->load->view('freelancer/footer');
		}

		public function getcompany_roi()
		{
			for ($j = 0; $j <= 11; $j++)
			{
       $months[$j]['month'] = date("M", strtotime( date( 'Y-m-01' )." -$j months"));
       $months[$j]['m'] = date("m", strtotime( date( 'Y-m-01' )." -$j months"));
       $months[$j]['y'] = date("Y", strtotime( date( 'Y-m-01' )." -$j months"));
      }


		   $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			 if($user->parent == 0)
			 {
			   $userid = $user->id;
			 }
			 else
			 {
			    $userid = $user->parent;
			 }
			$employee = $this->common->getCompanyTeam(array("us.parent"=>$userid));
		 // $result = $this->common->incomeMonthWise(array("userId"=>$userid));
		 $result = array();

			if(!empty($months))
			{
				$i = 0;
				foreach($months as $key=>$res)
				{
					$netsalary = 0;
					// $earning = $this->common->sum_project_paid_amount(array("MONTH(date)"=>$res->m,"Year(date)"=>$res->y));
					foreach($employee as $k=>$emp)
					{
						$dsr = $this->common->countdsrHours(array("employeeId "=>$emp->u_id,'includeSalary'=>1,'approved'=>1,"MONTH(date)"=>$res['m'],"Year(date)"=>$res['y']));
						$msalary = $emp->perHour;
						$total = $dsr->total;
						$total = $total / 60;
					  $netsalary += $msalary * $total;
						$result[$i]['total'] = $dsr->total;
					}
					$result[$i]['salary'] = number_format($netsalary, 2);
					$result[$i]['month'] = $res['month'];
					$result[$i]['y'] = $res['y'];
          $earning = $this->common->sum_income_paid_amount(array("userId"=>$this->session->userdata['clientloggedin']['id'],"MONTH(date)"=>$res['m'],"Year(date)"=>$res['y']));
					$expense = $this->common->sum_expense(array("MONTH(date)"=>$res['m'],"Year(date)"=>$res['y'],"userId"=>$this->session->userdata['clientloggedin']['id'],"deleted"=>0));
           if($earning->total != 0)
					 {
					 $result[$i]['earning'] = number_format($earning->total, 2);
				   }
					 else
					 {
						 $result[$key]['earning'] = 0;
					 }

					 if($expense->total != 0)
					 {
						 $result[$i]['expense'] = number_format($expense->total, 2);
					 }
					 else
					 {
						 $result[$i]['expense'] = 0;
					 }

          $i++;

				}
			}



			 if($result)
			 {
				 $msg['message'] ="true";
				 $msg['result'] =$result;
			 }
			 else
			 {
				 $msg['message'] ="false";

			 }
			 echo json_encode($msg);
			 exit;
		}

		public function employee_roi()
		{
			$this->load->view('freelancer/header');
 		  $this->load->view('freelancer/employee_roi');
 		  $this->load->view('freelancer/footer');
		}

		public function getemployee_roi()
		{
			 for ($i = 0; $i <= 3; $i++)
       {
         $res[]['date'] = date("Y-m-d", strtotime( date( 'Y-m-01' )." -$i months"));
       }

			 $employee = $this->common->getemployee(array("us.parent"=>$this->session->userdata['clientloggedin']['id']));
       // $res = $this->common->companyExpense(array("userId"=>$this->session->userdata['clientloggedin']['id']));

       if($res)
  	   {
         foreach($res as $k => $v)
  	     {
					 $res[$k]['employee'] = $employee;
					 $res[$k]['month'] = date("M", strtotime($v['date']));
					 $res[$k]['y'] = date("Y", strtotime($v['date']));
					 $res[$k]['m'] = date("m", strtotime($v['date']));
  		 	 }
  	   }

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

		public function getemployee_detail_roi()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);


 			$result = $this->common->getEmployeeTaskBymonth(array("t.assignedTo"=>$results->id,"MONTH(t.dueDate)"=>$results->m,"Year(t.dueDate)"=>$results->y,"t.milestone"=>0));
			$employeehourly = $this->common->getrow('user_meta',array("u_id"=>$results->id));


 		 if(!empty($result))
 		 {
 			 foreach($result as $key=>$res)
 			 {
				 $time = 0;
				 $result[$key]->employeeHourly = $employeehourly->perHour;

        if($res->type == 2)
				{
					$project = $this->common->getrow('project',array("projectid"=>$res->projectId));
					if(!empty($project))
					{
						$result[$key]->hourlyPrice = $project->hourlyPrice;
					}
				}
				 $time = $this->common->sum_todotask_time(array("todoListId"=>$res->id,"userId"=>$res->assignedTo,"taskId"=>$res->taskId));
 				 $d = '';
				 $a = 0;
 				if($time->time != 0)
 				{
 					 $hours = floor($time->time / 60);
 					 if($hours < 10)
 					 {
 						 $hours = '0'.$hours;
 					 }
 					 $minutes = ($time->time % 60);
 					 if($minutes < 10)
 					 {
 						 $minutes = '0'.$minutes;
 					 }
 					 $d = $hours.':'.$minutes;
					 $a = $time->time / 60;
 					 $result[$key]->time = $d;
 					 $result[$key]->htime = number_format($a, 2);
 				}
 				else
 				{
 					$result[$key]->time = "00:00";
					$result[$key]->htime = 0;
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
			 $msg['result'] = '';
		 }
     echo json_encode($msg);
		 exit;

		}

		public function employee_salary()
		{
			$data['title'] ="Employee Salary Calculator | Gross To Net Income Calculation";
			$this->load->view('freelancer/header',$data);
 		  $this->load->view('freelancer/employee_salary');
 		  $this->load->view('freelancer/footer');
		}

		public function getemployee_salary()
	  {
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			if(!empty($results->year))
			{
			  $date =$results->year.'-'.$results->month.'-'.date('d');
			}
			else
			{
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date = $nowUtc->format('Y-m-d');
		  }
       $month = date('m', strtotime($date));
       $year = date('Y', strtotime($date));
			$page = $results->page;
			$employee = '';
			$skill = '';
			if(!empty($results->employee))
			{
				$employee = $results->employee;
			}

			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
				$userid = $user->parent;
			}

		//	$data['pcount'] = count($this->common->count_all_salary_team('user',array("parent"=>$userid),$employee,$date));
			//$config["total_rows"] = count($this->common->count_all_salary_team('user',array("parent"=>$userid),$employee,$date));

			//$config = array();
			//$config["per_page"] = $results->perpage;
			//$this->pagination->initialize($config);

			// if( $page <= 0 )
			// {
			// 	$page = 1;
			// }

			// $start = ($page-1) * $config["per_page"];

			// if(!empty($page))
			// {
			 // $result = $this->common->getallsalaryteam(array("us.parent"=>$userid),$employee,$date,$start,$config["per_page"]);
			 $result = $this->common->getallsalaryteam(array("us.parent"=>$userid),$employee,$date);
			// }

			$timing = $this->common->getrow('workingHours',array("userId"=>$userid));


			if(!empty($result))
			{
				foreach($result as $key=>$res)
				{

					$billing = $this->common->billing(array("userId"=>$res->u_id,'type'=>1,"MONTH(startDate)"=>$month,"Year(startDate)"=>$year));
					$dsr = $this->common->countdsrHours(array("employeeId "=>$res->u_id,'includeSalary'=>1,'approved'=>1,"MONTH(date)"=>$month,"Year(date)"=>$year));
					$leave = $this->common->getCountemployeeleave(array('user_leave',"employeeId"=>$res->u_id,"l.status"=>1,"MONTH(date)"=>$month,"Year(date)"=>$year));
					$customSalary = $this->common->getrow('user_net_salary',array("userId"=>$res->u_id,"MONTH(date)"=>$month,"Year(date)"=>$year));
					$le = array();

					// $msalary = $res->perday / $timing->workingHour ;
					$msalary = $res->perHour;
					$total = $dsr->total;
          $total = $total / 60;
					// $mintsalary = round($mintsalary, 2);

					$netsalary = $msalary * $total;
					$result[$key]->total = $dsr->total;
					//$result[$key]->min = $mintsalary;
					$result[$key]->netsalary = round($netsalary, 2);
					$result[$key]->date = $date;
					if(!empty($customSalary))
					{
					$result[$key]->customSalary = $customSalary->netsalary;
				  }
					else
					{
						$result[$key]->customSalary = '';
					}

					if($res)
					 {
						foreach($leave as $k => $v)
						{
							if(!isset($le[$v->typename]))
							{
								$le[$v->typename]['leavecount'] = 0;
								if($v->totalleave == 0)
								{
							  $le[$v->typename]['leavecount'] += 1;
							  }
								else
								{
									$le[$v->typename]['leavecount'] += $v->totalleave;
								}
							}
							 else
							 {
								 if($v->totalleave == 0)
								 {
								 $le[$v->typename]['leavecount'] += 1;
								 }
								 else
								 {
									 $le[$v->typename]['leavecount'] += $v->totalleave;
								 }

               }
						 }
					}

					  $result[$key]->leave = $le;

					//  if(!empty($billing))
					//  {
					//  	foreach($billing as $k=>$b)
					//  	{
					// 		$billing[$k]->working = '';
					// 		if($b->total >= $timing->workingHour * 60 )
					// 		{
					//  		 $billing[$k]->working = "1";
					// 	  }
					// 		else if($b->total >= $timing->workingHour * 60 / 2)
					// 		{
					// 			$billing[$k]->working = "2";
					// 		}
					// 		else if($b->total >= $timing->workingHour * 60 / 4)
					// 		{
					// 			$billing[$k]->working = "3";
					// 		}
					// 		else if($b->total == 0)
					// 		{
					// 			$billing[$k]->working = "4";
					// 		}
					//
					// 		if($billing[$k]->working == 1)
					// 		{
					// 			$result[$key]->full = $result[$key]->full + 1;
					// 		}
					// 		else if($billing[$k]->working == 2)
					// 		{
					// 			$result[$key]->half = $result[$key]->half + 1;
					// 		}
					// 		else if($billing[$k]->working == 3)
					// 		{
					// 			$result[$key]->short = $result[$key]->short + 1;
					// 		}
          //   }
					// }
					 //$result[$key]->billing = $billing;
				}
				//
				// foreach($result as $k=>$r)
				// {
				// 	$result[$k]->netsalary = (($r->full * $r->perday) + ($r->half * ($r->perday / 2)) + ($r->short * ($r->perday / 4)));
				// }
			}

			if($result)
			{
			  $data['message'] = "true";
			  $data['result'] = $result;
			  $data['start'] = 1;
			}
			else
			{
				$data['message'] = "false";
				$data['result'] = '';
			}
			echo json_encode($data);
			exit;
    }

		public function employee_billing($id)
		{
			$billing = $this->common->billing(array("userId"=>$id,"MONTH(startDate)"=>date("m"),"Year(startDate)"=>date("Y")));
      $data['employee'] = $this->common->getrow('user_meta',array("u_id"=>$id));
      $b = array();
			if(!empty($billing))
			{
				$b = array();
				$i = 0;
				foreach($billing as $k=>$bi)
				{
					if(!empty($bi->total != 0))
					{
					$hours = floor($bi->total / 60);
	 	      $minutes = ($bi->total % 60);
	 			  $time = $hours.':'.$minutes;
				  }
					else {
						$time = '0';
					}

					$b[$k]['start'] = $bi->start;
					$b[$k]['end'] = $bi->start;
					$b[$k]['title'] = $time .' Hours';
					$b[$k]['url'] = '';
					$b[$k]['class'] = 'hours';
					$b[$k]['color'] = '#FF0000';
					$b[$k]['data']= [];

				}

			}
       //echo "<pre>";
			 // print_r($b);
			 //echo json_encode($b);
			// die;
			$data['billing'] = $b;


			$this->load->view('freelancer/header');
			$this->load->view('freelancer/employee_billing',$data);
			$this->load->view('freelancer/footer');
		}

		public function task_detail($id)
		{
			$this->TaskAccess($id);

			$data['taskId'] = $id;
			$result = $this->common->getrow('project_task',array("taskId"=>$id));
			$d['title'] =  $result->task." | ". $result->hours. " hrs | Task Details";
			$this->load->view('freelancer/header',$d);
			$this->load->view('freelancer/task_detail',$data);
			$this->load->view('freelancer/footer');
		}

		public function gettask_detail()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);


			if(!empty($results))
			{
				$res = $this->common->getrow('project_task',array("taskId"=>$results->taskId));
			}

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

		public function getprojectlog($id)
		{
       $logs = $this->common->get('user_log',array("logType"=>'project','logSubType'=>'task','logReference'=>$id));

			if(!empty($logs))
			{
			  foreach($logs as $key=>$res)
			  {
				$user = $this->common->getrow('user_meta',array("u_Id"=>$res->userId));
				$logs[$key]->name = $user->name;
				$logs[$key]->comment = $this->common->getcomment(array("log.logReference"=>$res->logId,"logSubType"=>'comment',"logType"=>'project'));

			  }
			}

      if($logs)
			{
			$msg['message'] = "true";
			$msg['result'] = $logs;
		  }
			else
			{
				$msg['message'] = "false";
				$msg['result'] = '';
			}
			echo json_encode($msg);
		  exit;
		}

		public function projectTaskcomment()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');
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

		public function TaskAccess($id)
		{
       $task = array();
			if(isset($this->session->userdata['clientloggedin']))
			{
				$access = $this->session->userdata['clientloggedin']['access'];
				$userId = $this->session->userdata['clientloggedin']['id'];
				if($access == 3)
				{
				$task = $this->common->getrow('project_task_assign',array("userId"=>$userId,"projectTaskId"=>$id));
			  }
				else if($access == 6 )
				{
          $task = $this->common->getprojecttask(array("t.taskId"=>$id,"p.projectManagerId"=>$userId));
				}
			}
			// echo "<pre>";
			// print_r($task);
			// die;

			if(empty($task))
			{
        redirect('freelancer/dashboard');
			}


		}

		public function project_documentupload()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$data = $results->image;
			$name = $results->name;


			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);

			$data1 = base64_decode($data);

			$f = finfo_open();

			$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);
      echo $image = $name;
		  $image = file_put_contents('assets/project_doc/'.$image,$data1);
			exit;

		}

		public function resignationTimeSave()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			 $user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

			if($user->parent == 0)
			{
				$results->userId = $this->session->userdata['clientloggedin']['id'];
			}

			else if($user->parent != 0)
			{
			 $results->userId = $user->parent;
			}

			 $res = $this->common->getrow('resignation_time',array("userId"=>$results->userId));
			 if(!empty($res))
			 {
				$u = $this->common->update(array("userId"=>$results->userId),$results,'resignation_time');
			 }
			 else
			 {
				 $u = $this->common->insert('resignation_time',$results);
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

		public function getresignationTime()
		{
			$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		 if($user->parent == 0)
		 {
			 $userId = $this->session->userdata['clientloggedin']['id'];
		 }

		 else if($user->parent != 0)
		 {
			$userId = $user->parent;
		 }

			$res = $this->common->getrow('resignation_time',array("userId"=>$userId));
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


		public function resignation()
		{
			$data['title'] = "Apply For Resignation | Resignation Application";
			$this->load->view('freelancer/header',$data);
			$this->load->view('freelancer/resignation');
			$this->load->view('freelancer/footer');
		}

		public function resignationSave()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			$user = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));

			$results->userId = $user->parent;
      $results->employeeId = $this->session->userdata['clientloggedin']['id'];
      $results->date = $date;
      // $results->leaveDate = $date;

			$u = $this->common->insert('resignation',$results);
			$hr = $this->common->getSingleUser(array("us.parent"=>$user->parent,"us.access"=>5));
      $admin = $this->common->getSingleUser(array("us.id"=>$user->parent));
		 	if($u)
			{
				$a['notificationTo'] = $hr->u_id;
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;
				$url = $this->session->userdata['clientloggedin']['url'];
				$aurl = $this->session->userdata['clientloggedin']['aurl'];
				$main = base_urL().'resignation-list/'.$url.'/'.$aurl;
				$a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
				$a['notificationStatus'] = 0;
				$a['notificationType'] = "resignation";
				$a['notificationMessage'] = "You have a new notification of <b>resignation</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				$a['notificationDate'] = $date;
				$this->notificationSave($a);
        // admin
				$a['notificationTo'] = $user->parent;
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;
				$url = $this->session->userdata['clientloggedin']['url'];
				$aurl = $this->session->userdata['clientloggedin']['aurl'];
				$main = base_urL().'resignation-list/'.$url.'/'.$aurl;
				$a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
				$a['notificationStatus'] = 0;
				$a['notificationType'] = "resignation";
				$a['notificationMessage'] = "You have a new notification of <b>resignation</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				$a['notificationDate'] = $date;
				$this->notificationSave($a);
				//admin
			}

			if(!empty($hr))
			{
				$detail['result'] = $results;
				$detail['name']  = $hr->name;
				$detail['from']  = $user->name;
				$message = $this->load->view('email/resignation',$detail,true);
				$mail =	 $this->mailsend('Employee resignation request',$hr->email,$message);
       }
			 if(!empty($admin))
			 {
				$detail1['result'] = $results;
 				$detail1['name']  = $admin->name;
 				$detail1['from']  = $user->name;
 				$message = $this->load->view('email/resignation',$detail1,true);
 				$mail =	 $this->mailsend('Employee resignation request',$admin->email,$message);
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

		public function getresignation()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;

			if(!empty($page))
			{
				 $data['pcount'] = $this->common->count_all_results('resignation',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
				 $config["total_rows"] = $this->common->count_all_results('resignation',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
			}

		  $config = array();
			$config["per_page"] = $results->perpage;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];

			if(!empty($page))
			{
				$result = $this->common->getbyLimitorderbyId('resignation',array("employeeId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
			}

		 if($result)
			{
				$data['message'] ="true";
				$data['result'] = $result;
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

		public function allresignation()
		{
			$data['title'] ="Employee Resignation List and Estimated Relieving Date Status";
			$this->load->view('freelancer/header',$data);
			$this->load->view('freelancer/allresignation');
			$this->load->view('freelancer/footer');
		}

		public function getallresignation()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
				$userid = $user->parent;
			}
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;

			if(!empty($page))
			{
				 $data['pcount'] = $this->common->count_all_results('resignation',array("userId"=>$userid));
				 $config["total_rows"] = $this->common->count_all_results('resignation',array("userId"=>$userid));
			}

     $config = array();
			$config["per_page"] = $results->perpage;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];
      $time = $this->common->getrow('resignation_time',array("userId"=>$userid));

			if(!empty($page))
			{
				$result = $this->common->getbyLimitorderbyId('resignation',array("userId"=>$userid),$start,$config["per_page"]);
			}

			if($result)
			{
			  foreach($result as $k=>$r)
				{
					$n = $this->common->getrow('user_meta',array("u_id"=>$r->employeeId));
					if(!empty($n))
					{
					$result[$k]->name = $n->name;
				  }
				}
			}

     if($result)
			{
				$data['message'] ="true";
				$data['result'] = $result;
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

		public function resignationStatus()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
      $lastday = '';
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d');
			$users = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($users->parent == 0)
			{
			 $userid = $users->id;
			}
			else
			{
				$userid = $users->parent;
			}
			$hr = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));
			// $hr = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
      $days = $this->common->getrow('resignation_time',array("userId"=>$userid));
			$userdetail = $this->common->getrow('user_meta',array("u_id"=>$results->userId));

			$lastday = date('Y-m-d', strtotime($date. ' + '.$days->days.' days'));

			 $d['status'] =    $results->status;

			 if($results->status == 1)
			 {
			 $d['leaveDate'] = $lastday;
		   }

			 $u = $this->common->update(array("id"=>$results->id),$d,'resignation');

			if($u)
			{
				 $a['notificationTo'] = $results->userId;
					$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
					$lastId = $lastrecord->notificationId;
					$lastId = $lastId + 1;
					$url = $this->session->userdata['clientloggedin']['url'];
					$aurl = $this->session->userdata['clientloggedin']['aurl'];
					$main = base_urL().'resignation/'.$url.'/'.$aurl;
					$a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
					$a['notificationStatus'] = 0;
					$a['notificationType'] = "resignation";
					$a['notificationMessage'] = "You have a new notification of <b>resignation</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
					$a['notificationDate'] = $date;
					$this->notificationSave($a);
			}

			if($u)
			{
				$a['notificationTo'] = $userid;
				 $lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				 $lastId = $lastrecord->notificationId;
				 $lastId = $lastId + 1;
				 $url = $this->session->userdata['clientloggedin']['url'];
				 $aurl = $this->session->userdata['clientloggedin']['aurl'];
				 $main = base_urL().'resignation-list/'.$url.'/'.$aurl;
				 $a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
				 $a['notificationStatus'] = 0;
				 $a['notificationType'] = "resignation";
				 $a['notificationMessage'] = "You have a new notification of <b>resignation</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				 $a['notificationDate'] = $date;
				 $this->notificationSave($a);
			}

			if($notification1)
			{
				$user = $this->common->getSingleUser(array("us.id"=>$results->userId));


				$detail['status'] = $results->status;
				$detail['name']  = $user->name;
				$detail['lastdate']  = $lastday;
				$detail['hr']  = $hr->name;

				$message = $this->load->view('email/resignationStatus',$detail,true);
				$mail =	 $this->mailsend('Resignation request Revert',$user->email,$message);
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

		public function employee_leave()
		{
			$data['title'] = "Apply For Leave";
			$this->load->view('freelancer/header',$data);
			$this->load->view('freelancer/employee_leave');
			$this->load->view('freelancer/footer');
		}

		public function employee_leave_save()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d');

			$results->date = date("Y-m-d", strtotime($results->date));
			$date3 = date("Y-m-d", strtotime($results->date));
			$results->date1 = date("Y-m-d", strtotime($results->date1));
			$leavetype =$this->common->getrow('leavetype',array("id"=>$results->type));

			$count = 0;
			$month = date('m', strtotime($results->date));
			$year = date('Y', strtotime($results->date));
			$day = date('d', strtotime($results->date));


      if($leavetype->reoccuringType == 1)
			{
			$count = $this->common->count_all_results_leave('user_leave',array("type"=>$results->type,"employeeId"=>$this->session->userdata['clientloggedin']['id'],"MONTH(date)"=>$month,"Year(date)"=>$year,"Day(date)"=>$day));
		  }
			else if($leavetype->reoccuringType == 2)
			{
			$count = $this->common->count_all_results_leave('user_leave',array("type"=>$results->type,"employeeId"=>$this->session->userdata['clientloggedin']['id'],"MONTH(date)"=>$month,"Year(date)"=>$year));
			}
			else if($leavetype->reoccuringType == 3)
			{
			$count = $this->common->count_all_results_leave('user_leave',array("type"=>$results->type,"employeeId"=>$this->session->userdata['clientloggedin']['id'],"Year(date)"=>$year));
			}
			else if($leavetype->reoccuringType == 4)
			{
			$count = $this->common->count_all_results_leave('user_leave',array("type"=>$results->type,"employeeId"=>$this->session->userdata['clientloggedin']['id']));
			}



			if($results->carryforwardtype == 1)
			{
			  $carry = $this->common->getrow('user_leaves_carry_forward',array("userId"=>$this->session->userdata['clientloggedin']['id']));
			  if($carry->leaves != 0)
			  {
				 $count = $count + $carry->leaves;
			  }
		  }




			$date1_ts = strtotime($results->date);
	    $date2_ts = strtotime($results->date1);
	    $diff = $date2_ts - $date1_ts;
	    $dateDiff = round($diff / 86400);
      $dateDiff = $dateDiff + 1;
			$check = $this->common->checkLeaveExist(array("employeeId"=>$this->session->userdata['clientloggedin']['id']),$results->date);

			if(!empty($check))
			{
				$msg['already'] = "true";
				 echo json_encode($msg);
				 exit;
			}
			else if($dateDiff == 1 && $leavetype->durationType == "Hour" && $leavetype->reoccuring > $count)
			{

			  $user = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));
        $results->userId = $user->parent;
			  $results->employeeId = $this->session->userdata['clientloggedin']['id'];
			  $type = $this->common->getrow('leavetype',array("id"=>$results->type));
        $u = $this->common->insert('user_leave',$results);
			  $hr = $this->common->getSingleUser(array("us.parent"=>$user->parent,"us.access"=>5));
			  $admin = $this->common->getSingleUser(array("us.id"=>$user->parent));


			if(!empty($hr))
			{
				$detail['result'] = $results;
				$detail['name']  = $hr->name;
				$detail['from']  = $user->name;
				$detail['type']  = $leavetype;
				$detail['date']  = $date;
				$message = $this->load->view('email/leave',$detail,true);
				$mail =	 $this->mailsend('leave',$hr->email,$message);
			 }

			 // if(!empty($admin))
			 // {
				// $detail['result'] = $results;
				// $detail['name']  = $admin->name;
				// $detail['from']  = $user->name;
				// $message = $this->load->view('email/leave',$detail,true);
				// $mail =	 $this->mailsend('leave',$admin->email,$message);
			 // }
			if($u)
			{
				$a['notificationTo'] = $hr->u_id;
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;
				$url = $this->session->userdata['clientloggedin']['url'];
				$aurl = $this->session->userdata['clientloggedin']['aurl'];
				$main = base_urL().'leave-list/'.$url.'/'.$aurl;
				$a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
				$a['notificationStatus'] = 0;
				$a['notificationType'] = "leave";
				$a['notificationMessage'] = "You have a new notification of <b>leave</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				$a['notificationDate'] = $date;
				$this->notificationSave($a);
				// director
				$a['notificationTo'] = $user->parent;
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;
				$url = $this->session->userdata['clientloggedin']['url'];
				$aurl = $this->session->userdata['clientloggedin']['aurl'];
				$main = base_urL().'leave-list/'.$url.'/'.$aurl;
				$a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
				$a['notificationStatus'] = 0;
				$a['notificationType'] = "leave";
				$a['notificationMessage'] = "You have a new notification of <b>leave</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				$a['notificationDate'] = $date;
				$this->notificationSave($a);
				// director
				 $msg['message'] ="true";
			}
			else
			{
				 $msg['message'] ="false";
			}

		  }

			else if($dateDiff <= $leavetype->duration && $leavetype->durationType == "Day" &&  $leavetype->reoccuring > $count )
			{
				$user = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));
				$results->userId = $user->parent;
			 $results->employeeId = $this->session->userdata['clientloggedin']['id'];
			 $type = $this->common->getrow('leavetype',array("id"=>$results->type));
				$u = $this->common->insert('user_leave',$results);
			 $hr = $this->common->getSingleUser(array("us.parent"=>$user->parent,"us.access"=>5));
			 $admin = $this->common->getSingleUser(array("us.id"=>$user->parent));
			   if($results->carryforwardtype == 1)
			   {
			    $carry = $this->common->getrow('user_leaves_carry_forward',array("userId"=>$this->session->userdata['clientloggedin']['id']));
					$l = $carry->leaves - 1;
					$this->common->update(array("userId"=>$this->session->userdata['clientloggedin']['id']),array("leaves"=>$l,"date"=>$date),'user_leaves_carry_forward');
		     }
			 if($u)
			 {
			// 	 $m = $user->name . $type->type ." Applied ". $date;
			//
			// 	$Notificationdata = array(
			// 	"notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
			// 	"notificationTo" =>$hr->id,
			// 	"notificationMessage" => $m,
			// 	"notificationDate" => $date,
			// 	"notificationStatus" => 0,
			// 	"notificationDeleted" =>0,
			// );
			// $notification = $this->common->insert('user_notification',$Notificationdata);
		 }

		 if(!empty($hr))
		 {
			 $detail['result'] = $results;
			 $detail['type']  = $leavetype;
			 $detail['name']  = $hr->name;
			 $detail['from']  = $user->name;
			 $detail['date']  = $date;
			 $message = $this->load->view('email/leave',$detail,true);
			 $mail =	 $this->mailsend('leave',$hr->email,$message);
			}

			// if(!empty($admin))
			// {
			//  $detail['result'] = $results;
			//  $detail['name']  = $admin->name;
			//  $detail['from']  = $user->name;
			//  $message = $this->load->view('email/leave',$detail,true);
			//  $mail =	 $this->mailsend('leave',$admin->email,$message);
			// }
		   if($u)
		   {
				 $a['notificationTo'] = $hr->u_id;
				 $lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				 $lastId = $lastrecord->notificationId;
				 $lastId = $lastId + 1;
				 $url = $this->session->userdata['clientloggedin']['url'];
				 $aurl = $this->session->userdata['clientloggedin']['aurl'];
				 $main = base_urL().'leave-list/'.$url.'/'.$aurl;
				 $a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
				 $a['notificationStatus'] = 0;
				 $a['notificationType'] = "leave";
				 $a['notificationMessage'] = "You have a new notification of <b>leave</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				 $a['notificationDate'] = $date;
				 $this->notificationSave($a);
				$msg['message'] ="true";
		    }
		   else
		   {
				$msg['message'] ="false";
		    }
			}
			else
			{
        $msg['notavailble'] ="true";
			}
			echo json_encode($msg);
			exit;
		}

		public function getemployee_leave()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;

			if(!empty($page))
			{
				 $data['pcount'] = $this->common->count_all_results('user_leave',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
				 $config["total_rows"] = $this->common->count_all_results('user_leave',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
			}

      $config = array();
			$config["per_page"] = $results->perpage;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];

			if(!empty($page))
			{
				$result = $this->common->getemployeeAllLeave(array("l.employeeId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
			}

			if(!empty($result))
			{
				foreach($result as $k=>$r)
				{
					$x = $this->common->getrow('leavetype',array("id"=>$r->type));
					$result[$k]->type = $x->type;
				}
			}


     if($result)
			{
				$data['message'] ="true";
				$data['result'] = $result;
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


		public function all_leave()
		{
			$data['title'] ="Approve OR Reject A Leave Request";
			$this->load->view('freelancer/header',$data);
			$this->load->view('freelancer/leaveList');
			$this->load->view('freelancer/footer');
		}

		public function getallemployeeleave()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
			  $userid = $user->parent;
			}

			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;
			$config = array();
			$date ='';
			if(!empty($results->date))
			{
			$date =  date("Y-m-d", strtotime($results->date));
		  }

			if(!empty($page))
			{
				 $data['pcount'] = $this->common->count_all_employeeleave('user_leave',array("userId"=>$userid),$date);
				 $config["total_rows"] = $this->common->count_all_employeeleave('user_leave',array("userId"=>$userid),$date);
			}

			$config["per_page"] = $results->perpage;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];

			if(!empty($page))
			{
				$result = $this->common->getallEmployeeLeave('user_leave',array("userId"=>$userid),$date,$start,$config["per_page"]);
			}

			if($result)
			{
			  foreach($result as $k=>$r)
				{
					$n = $this->common->getrow('user_meta',array("u_id"=>$r->employeeId));
					$x = $this->common->getrow('leavetype',array("id"=>$r->type));

					$result[$k]->name =$n->name;
					$result[$k]->image = $n->logo;
					if(!empty($x->type))
					{
					$result[$k]->type = $x->type;
				  }
					else
					{
					$result[$k]->type ='';
					}

				}
			}

     if($result)
			{
				$data['message'] ="true";
				$data['result'] = $result;
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

		public function leaveStatus()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
      $lastday = '';
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d');
			$user = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));
			$leave = $this->common->getrow('user_leave',array("id"=>$results->id));
      $type = $this->common->getrow('leavetype',array("id"=>$leave->type));

			 $d['status'] = $results->status;
			 $d['actionBy'] = $this->session->userdata['clientloggedin']['id'];
			 $d['reviewerId'] = $this->session->userdata['clientloggedin']['id'];

       $u = $this->common->update(array("id"=>$results->id),$d,'user_leave');

			if($u)
			{
				$a['notificationTo'] = $results->userId;
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;
				$url = $this->session->userdata['clientloggedin']['url'];
				$aurl = $this->session->userdata['clientloggedin']['aurl'];
				$main = base_urL().'employee-leave/'.$url.'/'.$aurl;
				$a['notificationFrom'] = $user->parent;
				$a['notificationStatus'] = 0;
				$a['notificationType'] = "leave";
				$a['notificationMessage'] = "You have a new notification of <b>leave</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				$a['notificationDate'] = $date;
				$this->notificationSave($a);
			}
			if($u)
			{
				$a['notificationTo'] = $user->parent;
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;
				$url = $this->session->userdata['clientloggedin']['url'];
				$aurl = $this->session->userdata['clientloggedin']['aurl'];
				$main = base_urL().'leave-list/'.$url.'/'.$aurl;
				$a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
				$a['notificationStatus'] = 0;
				$a['notificationType'] = "leave";
				$a['notificationMessage'] = "You have a new notification of <b>leave</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				$a['notificationDate'] = $date;
				$this->notificationSave($a);
			}

			if($u)
			{
				$user1 = $this->common->getSingleUser(array("us.id"=>$results->userId));
				$hr = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
        $res = $this->common->getrow('user_leave',array("id"=>$results->id));
				$detail['result'] = $res;
				$detail['name']  = $user1->name;
				$detail['hr']  = $hr->name;
				$message = $this->load->view('email/leaveStatus',$detail,true);
				$mail =	 $this->mailsend('leave Status',$user1->email,$message);
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

		public function leavecount()
		{
			$resignation = $this->common->get('resignation',array("status"=>1));
			if(!empty($resignation))
			{
				foreach($resignation as $k=>$r)
				{
					$count = $this->common->getleaveCount('user_leave',array("employeeId"=>$r->employeeId,'status'=>1),$r->date);
					if($count != 0)
					{
						$update = $this->common->update(array("employeeId"=>$r->employeeId),array("totalLeave"=>$count),'resignation');
					}
				}
			}

		}


		public function editleave()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

		  $result = $this->common->getrow('user_leave',array("id"=>$results->id));

			$result->date = date("d-m-Y", strtotime($result->date));
			$result->date1 = date("d-m-Y", strtotime($result->date1));


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

		public function updateleave()
		{
      $array = file_get_contents('php://input');
			$results =json_decode($array);
			$results->date = date("Y-m-d", strtotime($results->date));
			$results->date1 = date("Y-m-d", strtotime($results->date1));
			$res = $this->common->getrow('user_leave',array("id"=>$results->id));
			$leavetype =$this->common->getrow('leavetype',array("id"=>$results->type));
			$date1_ts = strtotime($results->date);
			$date2_ts = strtotime($results->date1);
			$diff = $date2_ts - $date1_ts;
			$dateDiff = round($diff / 86400);
			$dateDiff = $dateDiff + 1;
			$check = $this->common->checkLeaveExist1('user_leave',array("employeeId"=>$this->session->userdata['clientloggedin']['id']),$results->date,$results->id);

			if(!empty($check))
			{
				$msg['already'] = "true";
				 echo json_encode($msg);
				 exit;
			}
			else
			{
      if($res->status == 0)
			{
				if($dateDiff == 1 && $leavetype->durationType == "Hour")
				{
         $u = $this->common->update(array("id"=>$results->id),$results,'user_leave');
				 if($u)
	 			 {
	 				 $msg['message'] ="true";
	 			  }
			  }
				else if($dateDiff <= $leavetype->duration && $leavetype->durationType == "Day")
				{
					$u = $this->common->update(array("id"=>$results->id),$results,'user_leave');
					if($u)
					{
						 $msg['message'] ="true";
					}
				}
				else
				{
         $msg['notavailble'] ="true";
				}
		 }
	  }

			 echo json_encode($msg);
			 exit;

		}

		public function departments()
		{
			$data['title'] ="Adding Company Departments from General to Specific Role";
			$this->load->view('freelancer/header',$data);
			$this->load->view('freelancer/department');
			$this->load->view('freelancer/footer');
		}

		public function getdepartment()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;
			$config = array();
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent != 0)
			{
				$userid = $user->parent;
			}
			else
			{
				$userid = $user->id;
			}

			if(!empty($page))
			{
				 $data['pcount'] = $this->common->count_all_results('department',array("userId"=>$userid));
				 $config["total_rows"] = $this->common->count_all_results('department',array("userId"=>$userid));
			}

			$config["per_page"] = $results->perpage;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];

			if(!empty($page))
			{
				$result = $this->common->getbyLimitorderbyId('department',array("userId"=>$userid),$start,$config["per_page"]);
			}
			if(!empty($result))
			{
				foreach($result as $k=>$r)
				{
					$result[$k]->employee = $this->common->countdepartmentEmployee('department',array("u.parent"=>$userid,"m.department"=>$r->id));
				}
			}

     if($result)
			{
				$data['message'] ="true";
				$data['start'] = $start + 1;
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

		public function savedepartment()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d');
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent != 0)
			{
				$userid = $user->parent;
				$results->userId = $user->parent;
			}
			else
			{
				$userid = $user->id;
				$results->userId = $user->id;
 			}


      $check = $this->common->getrow('department',array("userId"=>$userid,'department'=>$results->department));
			if(!empty($check))
			{
				$msg['already'] = "true";
				echo json_encode($msg);
			}
			else
			{

			$u = $this->common->insert('department',$results);
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

		}


		public function editdepartment()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$result = $this->common->getrow('department',array("id"=>$results->id));
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

		public function updatedepartment()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$u = $this->common->update(array("id"=>$results->id),$results,'department');

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

		public function deletedepartment()
		{
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);

			 $this->db->where('id',$results->id);
			 $query = $this->db->delete('department');

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

		 public function alldepartment()
		 {
			 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			 if($user->parent != 0)
			 {
				 $userid = $user->parent;
			 }
			 else
			 {
				 $userid = $user->id;
			 }
			 $result = $this->common->get('department',array("userId"=>$userid));
			 if($result)
			 {
				 $output['message'] ="true";
				 $output['result'] =$result;
			 }
			 else
			 {
				 $output['message'] ="false";
			 }
			 echo json_encode($output);
			 exit;
		 }


		 public function leavetype()
 		{
			$data['title'] = "Different Types of Employee Leave";
 			$this->load->view('freelancer/header',$data);
 			$this->load->view('freelancer/leavetype');
 			$this->load->view('freelancer/footer');
 		}

 		public function getleavetype()
 		{
 			$array = file_get_contents('php://input');
 			$results =json_decode($array);
 			$page = $results->page;
 			$config = array();
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d');
 			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
				$userid = $user->parent;
			}

 			if(!empty($page))
 			{
 				 $data['pcount'] = $this->common->count_all_results('leavetype',array("userId"=>$userid,"carryforwardtype"=>0,"deleted"=>0));
 				 $config["total_rows"] = $this->common->count_all_results('leavetype',array("userId"=>$userid,"carryforwardtype"=>0,"deleted"=>0));
 			}

 			$config["per_page"] = $results->perpage;
 			$this->pagination->initialize($config);

 			if( $page <= 0 )
 			{
 				$page = 1;
 			}

 			$start = ($page-1) * $config["per_page"];

 			if(!empty($page))
 			{
 				$result = $this->common->getbyLimitorderbyId('leavetype',array("userId"=>$userid,"carryforwardtype"=>0,"deleted"=>0),$start,$config["per_page"]);
 			}

			if(!empty($result))
			{
				foreach($result as $key=>$res)
				{
					$rr = $this->common->checkLeaveExistIntype('user_leave',array("type"=>$res->id,"status"=>0),$date);

					if(!empty($rr))
					{
						$result[$key]->delete = 1;
					}
					else
					{
						$result[$key]->delete = 0;
					}
				}
			}


      if($result)
 			{
 				$data['message'] ="true";
 				$data['result'] = $result;
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

 		public function saveleavetype()
 		{
 			$array = file_get_contents('php://input');
 			$results =json_decode($array);

 			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
 			$date =  $nowUtc->format('Y-m-d');
 			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
			  $userid = $user->parent;
			}
       $check = $this->common->getrow('leavetype',array("userId"=>$userid,'type'=>$results->type));
 			if(!empty($check))
 			{
 				$msg['already'] = "true";
 				echo json_encode($msg);

 			}
 			else
 			{

 			$results->userId = $userid;

 			$u = $this->common->insert('leavetype',$results);
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

 		}


 		public function editleavetype()
 		{
 			$array = file_get_contents('php://input');
 			$results =json_decode($array);

 			$result = $this->common->getrow('leavetype',array("id"=>$results->id));
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

 		public function updateleavetype()
 		{
 			$array = file_get_contents('php://input');
 			$results =json_decode($array);

 			$u = $this->common->update(array("id"=>$results->id),$results,'leavetype');
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

 		public function deleteleavetype()
 		{
 			 $array = file_get_contents('php://input');
 			 $results =json_decode($array);

 			 // $this->db->where('id',$results->id);
 			 // $query = $this->db->delete('leavetype');
			 $query = $this->common->update(array("id"=>$results->id),array("deleted"=>1),'leavetype');

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

			public function allleavetype()
			{
				$results = array();
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent != 0)
				{
					$userid = $user->parent;
				}
				else
				{
					$userid = $user->id;
				}
				$result = $this->common->get('leavetype',array("userId"=>$userid,"deleted"=>0));

				if($result)
				{
				  $output['message'] ="true";
				  $output['result'] =$result;
				}
				else
				{
					$output['message'] ="false";
					$output['result'] = '';
				}
				echo json_encode($output);
				exit;
			}

			public function holiday()
			{
				$data['title'] ="Annual Vacations And Holiday Planning";
				$this->load->view('freelancer/header',$data);
				$this->load->view('freelancer/holiday');
				$this->load->view('freelancer/footer');
			}



			public function getholiday()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$page = $results->page;
				$config = array();

				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

				if($user->parent == 0)
				{
				 $userid = $user->id;
				}
				else
				{
				  $userid = $user->parent;
				}

				if(!empty($page))
				{
					 $data['pcount'] = $this->common->count_all_results('holiday',array("userId"=>$userid));
					 $config["total_rows"] = $this->common->count_all_results('holiday',array("userId"=>$userid));
				}

				$config["per_page"] = $results->perpage;
				$this->pagination->initialize($config);

				if( $page <= 0 )
				{
					$page = 1;
				}

				$start = ($page-1) * $config["per_page"];

				if(!empty($page))
				{
					$result = $this->common->getholidays('holiday',array("userId"=>$userid),$start,$config["per_page"]);
				}


				if($result)
				{
					$data['message'] ="true";
					$data['start'] = $start + 1;
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

			public function holidaySave()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);

				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

				if($user->parent == 0)
				{
				 $userid = $user->id;
				 $results->userId = $user->id;

				}
				else
				{
				  $userid = $user->parent;
					$results->userId = $user->parent;
				}

				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				$date =  $nowUtc->format('Y-m-d');

				$results->date = date("Y-m-d", strtotime($results->date));

				$check = $this->common->getrow('holiday',array("date"=>$results->date,'userId'=>$userid));
				if(!empty($check))
				{
					$msg['already'] = "true";
					echo json_encode($msg);

				}
				else
				{

				$u = $this->common->insert('holiday',$results);
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
			}

			public function deleteholiday()
			{
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);

				 $this->db->where('id',$results->id);
				 $query = $this->db->delete('holiday');

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

				public function editholiday()
		 		{
		 			$array = file_get_contents('php://input');
		 			$results =json_decode($array);

		 			$result = $this->common->getrow('holiday',array("id"=>$results->id));
					$result->date = date("d-m-Y", strtotime($result->date));

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

		 		public function updateholiday()
		 		{
		 			$array = file_get_contents('php://input');
		 			$results =json_decode($array);
					$results->date = date("Y-m-d", strtotime($results->date));

		 			$u = $this->common->update(array("id"=>$results->id),$results,'holiday');

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


				 public function expense()
				 {
					 $data['title'] ="Manage Business Expenses Anywhere in Real Time";
					 $this->load->view('freelancer/header',$data);
					 $this->load->view('freelancer/expense');
					 $this->load->view('freelancer/footer');
				 }

				  public function expenseSave()
					{
						$array = file_get_contents('php://input');
				 	  $results =json_decode($array);

						$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
						$results->date = date("Y-m-d", strtotime($results->date));
						if($user->parent != 0)
		 			 {
		 				 $userid = $user->parent;
		 			 }
		 			 else
		 			 {
		 				 $userid = $user->id;
		 			 }

						 $results->userId = $userid;
						 $check = $this->common->getrow('expense',array("expense"=>$results->expense,"amount"=>$results->amount,"date"=>$results->date));
						 if(!empty($check))
						 {
							 $msg['already'] = "true";
						 }
						 else
						 {
						 $res = $this->common->insert('expense',$results);
					   if($res)
					   {
						  $msg['message'] = "true";
					   }
					   else
					   {
						  $msg['message'] = "false";
					   }
					  }
						 echo json_encode($msg);
						 exit;
					}

					public function getCurrentMonthExpense()
					{
						$array = file_get_contents('php://input');
						$results =json_decode($array);
						$page = $results->page;
						$config = array();
						$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
						if($user->parent == 0)
						{
							$userId = $user->id;
						}
						else
						{
							$userId = $user->parent;
						}
						$result = array();
						$startdate ='';
				    $enddate ='';
				    $expense ='';
						if(!empty($results->startdate))
						{
						$startdate = date("Y-m-d", strtotime($results->startdate));
						}
						if(!empty($results->enddate))
						{
						$enddate = date("Y-m-d", strtotime($results->enddate));
						}
						if(!empty($results->expense))
						{
							$expense = $results->expense;
						}

						if(!empty($page))
						{
							 $data['pcount'] = $this->common->count_allexpense(array("userId"=>$userId),$startdate,$enddate,$expense);
							 $config["total_rows"] = $this->common->count_allexpense(array("userId"=>$userId),$startdate,$enddate,$expense);
						}

						$config["per_page"] = $results->perpage;
						$this->pagination->initialize($config);

						if( $page <= 0 )
						{
							$page = 1;
						}

						$start = ($page-1) * $config["per_page"];

						if(!empty($page))
						{
							$result = $this->common->allexpense(array("userId"=>$userId),$startdate,$enddate,$expense,$start,$config["per_page"]);
							$total = $this->common->sum_expense(array("userId"=>$userId,"deleted"=>0));
							$totalpaid = $this->common->sum_expense(array("userId"=>$userId,"status"=>1,"deleted"=>0));
							$totalunpaid = $this->common->sum_expense(array("userId"=>$userId,"status"=>2,"deleted"=>0));
						}

						if($result)
						{
							$data['message'] ="true";
							$data['start'] = $start + 1;
							$data['result'] = $result;
							$data['total'] = number_format($total->total,2);
							$data['totalpaid'] = number_format($totalpaid->total,2);
							$data['totalunpaid'] = number_format($totalunpaid->total,2);

						}
						else
						{
							$data['message'] ="false";
							$data['result'] = '';
						}

						echo json_encode($data);
						exit;

					}

					public function expenseUpdate()
					{
						$array = file_get_contents('php://input');
				 	  $results =json_decode($array);
						$results->date = date("Y-m-d", strtotime($results->date));
						unset($results->userId);
            $res = $this->common->update(array("id"=>$results->id),$results,'expense');

						 if($res)
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

					public function allExpense()
					{
						$array = file_get_contents('php://input');
						$results =json_decode($array);
						$page = $results->page;
						$config = array();
						$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
						if($user->parent == 0)
						{
							$userId = $user->id;
						}
						else
						{
							$userId = $user->parent;
						}
						$result = array();

						if(!empty($page))
						{
							 $data['pcount'] = $this->common->count_allexpense(array("userId"=>$userId));
							 $config["total_rows"] = $this->common->count_allexpense(array("userId"=>$userId));
						}

						$config["per_page"] = $results->perpage;
						$this->pagination->initialize($config);

						if( $page <= 0 )
						{
							$page = 1;
						}

						$start = ($page-1) * $config["per_page"];

						if(!empty($page))
						{
							$res = $this->common->allexpense(array("userId"=>$userId),$start,$config["per_page"]);
						}

						if($res)
						 {
              foreach($res as $k => $v)
						  {
								if(!isset($result[$v->monthnumber]))
								{
						 	   $result[$v->monthnumber]['month'] = $v->month;
						 	   $result[$v->monthnumber]['year'] = $v->year;
						 	   $result[$v->monthnumber]['expense'][] = $v;
						    }
								else
								{
									$result[$v->monthnumber]['month'] = $v->month;
									$result[$v->monthnumber]['year'] = $v->year;
									$result[$v->monthnumber]['expense'][] = $v;
								 }
						   }

							  foreach($result as $k=>$r)
							  {
								   $month = date('m',strtotime($r['month']));
								   $year = $r['year'];
									 $t = $this->common->expenseTotalWise(array("MONTH(date)"=>$month,"Year(date)"=>$year));
									 $result[$k]['total'] = $t->total;
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


					public function deleteExpense()
         {
					 $array = file_get_contents('php://input');
					 $results =json_decode($array);

         	 $query = $this->common->update(array("id"=>$results->id),array("deleted"=>1),'expense');
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


				 public function editexpense()
				 {
					 $array = file_get_contents('php://input');
					 $results =json_decode($array);

					 $result = $this->common->getrow('expense',array("id"=>$results->id));
					 $result->date = date("d-m-Y", strtotime($result->date));

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

				 public function todo()
				 {
					 $data['title'] ="Task Management";
					 $this->load->view('freelancer/header',$data);
					 $this->load->view('freelancer/todo');
					 $this->load->view('freelancer/footer');
				 }

			 public function gettodo()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);
				 $page = $results->page;
				 $status ='';
				 $priority ='';
				 $assign = '';
				 $timez = 0;
				 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				 $date =  $nowUtc->format('Y-m-d');
				 $nowtime = $nowUtc->format('Y-m-d H:i:s');
				 if(isset($results->status))
				 {
					 $status = $results->status;
				 }
				 if(isset($results->priority))
				 {
					 $priority = $results->priority;
				 }
				 if(isset($results->assign))
				 {
					 $assign = $results->assign;
				 }
				 $config = array();
				 $parent =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
 				if($parent->parent == 0)
 				{
 				 $parentId = $parent->id;
 				}
 				else
 				{
 					$parentId = $parent->parent;
 				}
 				$timezone = $this->common->getrow('user_paymentmethod',array("userId"=>$parentId));

 				if(!empty($timezone->zone))
 				{
 						$zone = explode(":",$timezone->zone);
 						$h = $zone[0].' Hours';
 						$m = $zone[1].' Minutes';
 						$timez = $h.' '.$m;
 				}

				 if(!empty($page))
				 {
						$data['pcount'] = $this->common->count_todo($this->session->userdata['clientloggedin']['id'],$status,$priority,$assign);
						$config["total_rows"] = $this->common->count_todo($this->session->userdata['clientloggedin']['id'],$status,$priority,$assign);
				 }

				 $config["per_page"] = $results->perpage;
				 $this->pagination->initialize($config);

				 if( $page <= 0 )
				 {
					 $page = 1;
				 }

				 $start = ($page-1) * $config["per_page"];

				 if(!empty($page))
				 {
					 $res = $this->common->gettodolist($this->session->userdata['clientloggedin']['id'],$status,$priority,$assign,$start,$config["per_page"]);
				 }

				 // if(!empty($res))
				 // {
					//  foreach($res as $key=>$r)
					//  {
					// 	 $time = $this->common->sum_todotask_time(array("todoListId"=>$r->id,"userId"=>$r->assignedTo));
					// 	 $atime = $this->common->sum_todotask_time(array("todoListId"=>$r->id));
		 			// 	if($time->time != 0)
		 			// 	{
		 			// 		 $hours = floor($time->time / 60);
		 			// 		 if($hours < 10)
		 			// 		 {
		 			// 			 $hours = '0'.$hours;
		 			// 		 }
		 			// 		 $minutes = ($time->time % 60);
		 			// 		 if($minutes < 10)
		 			// 		 {
		 			// 			 $minutes = '0'.$minutes;
		 			// 		 }
		 			// 		 $d = $hours.':'.$minutes;
		 			// 		 $res[$key]->time = $d;
		 			// 	}
		 			// 	else
		 			// 	{
		 			// 		$res[$key]->time = "00:00";
		 			// 	}
					// 	if($atime->time != 0)
					// 	{
					// 		 $hours1 = floor($atime->time / 60);
					// 		 if($hours1 < 10)
					// 		 {
					// 			 $hours1 = '0'.$hours1;
					// 		 }
					// 		 $minutes1 = ($atime->time % 60);
					// 		 if($minutes1 < 10)
					// 		 {
					// 			 $minutes1 = '0'.$minutes1;
					// 		 }
					// 		 $d1 = $hours1.':'.$minutes1;
					// 		 $res[$key]->totaltime = $d1;
					// 	}
					// 	else{
					// 		 $res[$key]->totaltime = "00:00";
					// 	}
				 //
					//  }
				 // }

				 if(!empty($res))
		 		{
		 			foreach($res as $key=>$r)
		 			{
		 				// echo $date."<br>";
		 				// echo $r->dueDate;
		 				// die;
		 				if($r->dueDate < $date)
		 				{
		 					$res[$key]->duetask = 1;
		 				}
		 				else
		 				{
		 					$res[$key]->duetask = 0;
		 				}
		 				$lasttimer = array();
		 				if($r->status == 5)
		 				{
		 				$lasttimer = $this->common->getOneRow('todoList_billing',array("userId"=>$r->assignedTo,"todoListId"=>$r->id,"taskId"=>$r->taskId,"todoListId"=>$r->id),'todolist_billingId',"desc");
		 			  }
		 				$time = $this->common->sum_todotask_time(array("todoListId"=>$r->id,"userId"=>$r->assignedTo,"taskId"=>$r->taskId));
		 				$atime = $this->common->sum_todotask_time(array("todoListId"=>$r->id));
		         $minutesRunning = 0;
		 				$d1 = '';
		 				$d = '';
		 				if(!empty($lasttimer))
		 				{

		 					$start_date = new DateTime($lasttimer->startTime);
		 					$since_start = $start_date->diff(new DateTime($nowtime));
		 					$minutesRunning = $since_start->days * 24 * 60;
		 					$minutesRunning += $since_start->h * 60;
		 					$minutesRunning += $since_start->i;
		 				}

		 				if($time->time != 0)
		 				{
		 					 $time->time = $minutesRunning + $time->time;
		 					 $hours = floor($time->time / 60);
		 					 if($hours < 10)
		 					 {
		 						 $hours = '0'.$hours;
		 					 }
		 					 $minutes = ($time->time % 60);
		 					 if($minutes < 10)
		 					 {
		 						 $minutes = '0'.$minutes;
		 					 }
		 					 $d = $hours.':'.$minutes;
		 					 $res[$key]->time = $d;
		 				}
		 				else if($time->time == 0 && $minutesRunning != 0)
		 				{

		 					$hours = floor($minutesRunning / 60);
		 					if($hours < 10)
		 					{
		 						$hours = '0'.$hours;
		 					}
		 					$minutes = ($minutesRunning % 60);
		 					if($minutes < 10)
		 					{
		 						$minutes = '0'.$minutes;
		 					}
		 					$d = $hours.':'.$minutes;
		 					$res[$key]->time = $d;
		 				}
		 				else
		 				{
		 					$res[$key]->time = "00:00";
		 				}

		 				if($atime->time != 0)
		 				{
		 					 $hours1 = floor($atime->time / 60);
		 					 if($hours1 < 10)
		 					 {
		 						 $hours1 = '0'.$hours1;
		 					 }
		 					 $minutes1 = ($atime->time % 60);
		 					 if($minutes1 < 10)
		 					 {
		 						 $minutes1 = '0'.$minutes1;
		 					 }
		 					 $d1 = $hours1.':'.$minutes1;
		 					 $res[$key]->totaltime = $d1;
		 				}
		 				else
		 				{
		 					$res[$key]->totaltime = "00:00";
		 				}

		 				if(!empty($r->date))
		 				{
		 				$start1 = strtotime($timez, strtotime($r->date));
		 				if($start1)
		 				  {
		 				   $res[$key]->date = date('Y-m-d H:i:s', $start1);
		 				  }
		 			  }
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

			 public function getdepartmentbyteam()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);
				 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
          if($user->parent == 0)
					{
						$userId = $user->id;
					}
					else
					{
						$userId = $user->parent;
					}

				 $result = $this->common->getteambydepartment(array("um.department"=>$results->id,"us.parent"=>$userId),$this->session->userdata['clientloggedin']['id']);

					if($result)
					{
						$output['message'] ="true";
						$output['result'] = $result;
					}
					else
					{
						$output['message'] ="false";
						$output['result'] = '';
					}
					echo json_encode($output);
					exit;

			 }

			 public function todosave()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);
				 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				 $date = $nowUtc->format('Y-m-d H:i:s');
         $results->assignedBy= $this->session->userdata['clientloggedin']['id'];
         $results->startDate = date("Y-m-d", strtotime($results->startDate));
         $results->dueDate = date("Y-m-d", strtotime($results->dueDate));
				 $results->date = $date;
				 $check = $this->common->getrow('todoList',array("name"=>$results->name,"assignedBy"=>$this->session->userdata['clientloggedin']['id']));
				 if(!empty($check))
				 {
           $msg['already'] ="true";
				 }
				 else
				 {
				  $ids = $this->common->getone('todoList','id','desc');
				 if(!empty($ids))
				 {
				 $xx = $ids->id + 1;
				 $results->taskId = "TS000".$xx;
			   }
				 else
				 {
					 $results->taskId = 'TS0001';
				 }
				 $results->type = 1;

				 $res = $this->common->insert('todoList',$results);
				 if($res)
				 {
					 $this->todoactivitySave(array("todoListId"=>$res[1],"userId"=>$results->assignedTo,"status"=>"Task Assigned","date"=>$date));
				 }

					if($res)
					{
						$msg['message'] = "true";
					}
					else
					{
						$msg['message'] = "false";
					}
				 }
					echo json_encode($msg);
					exit;
			 }

			 public function deletetodo()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);

				$check = $this->common->getrow('todoList',array("id"=>$results->id));

				if($check->started == 0)
				{
				 $query = $this->common->delete('todoList',array("id"=>$results->id));

				 if($query)
				 {
					 $msg['message'] = "true";
				 }
				  else
				 {
					 $msg['message'] = "false";
				  }
				}
				else
				{
					$msg['error'] = "true";
				}
					echo json_encode($msg);
					exit;
			 }

			 public function edittodo()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);
				 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				 $date =  $nowUtc->format('d-m-Y');

				 $result = $this->common->getrow('todoList',array("id"=>$results->id));
				 $result->startDate = date("d-m-Y", strtotime($result->startDate));
				 $result->dueDate = date("d-m-Y", strtotime($result->dueDate));
				 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
          if($user->parent == 0)
					{
						$userId = $user->id;
					}
					else
					{
						$userId = $user->parent;
					}

				 $team = $this->common->getteambydepartment(array("us.parent"=>$userId,"department"=>$result->dept),$this->session->userdata['clientloggedin']['id']);
        if($result->dept == '')
				{
					$result->dept = $team[0]->department;
				}
				 if($result->started == 0)
				 {
					 $data['message'] ="true";
					 $data['result'] = $result;
					 $data['team'] = $team;
					 $data['currentdate'] = $date;

				 }
				 else
				 {
					 $data['message'] ="false";
					 $data['result'] = '';
				 }

				 echo json_encode($data);
				 exit;
			 }

			 public function updatetodo()
			 {
				  $array = file_get_contents('php://input');
					$results =json_decode($array);
					$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
 				  $date = $nowUtc->format('Y-m-d H:i:s');
					$check = $this->common->getrow('todoList',array("id"=>$results->id));

					if(!empty($results->startDate))
					{
					$results->startDate = date("Y-m-d", strtotime($results->startDate));
				  }
					if(!empty($results->dueDate))
					{
					$results->dueDate = date("Y-m-d", strtotime($results->dueDate));
				  }
					$results->status = 2;
					$results->started = 0;
					$results->date = $date;
					$res = $this->common->update(array("id"=>$results->id),$results,'todoList');
					if($res)
					{
							 if($check->assignedTo != $results->assignedTo)
							 {
								  $this->todoactivitySave(array("todoListId"=>$results->id,"userId"=>$results->assignedTo,"status"=>"Task Reassigned","date"=>$date));
							 }
				 }
					 if($res)
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

			 public function changeemail()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);
				 $check = $this->common->getrow('user',array("email"=>$results->email));
				 if(!empty($check))
				 {
					 $output['success'] = '2';
					 echo json_encode($output);
					 exit;
				 }
				 else
				 {
					 $current1 = $this->common->count_all_results('user',array("email"=>$results->currentemail));

					 if($current1 == 1)
					 {
						 $updated = $this->common->update(array("email"=>$results->currentemail),array("email"=>$results->email),'user');
						 if($updated)
						 {
							 $output['success'] ="1";
						 }
						 else
						 {
							 $output['error'] ="true";
							}
					 }
					 else
					 {
					  $output['success'] = '0';
					 }
					 echo json_encode($output);
					 exit;
				 }
			 }

			 public function paymentmethodupdate()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);

				 $check = $this->common->getrow('user_paymentmethod',array("userId"=>$this->session->userdata['clientloggedin']['id']));
				 $companyCode = $this->common->getrow('user_paymentmethod',array("companyCode"=>$results->companyCode));
				 $results->userId = $this->session->userdata['clientloggedin']['id'];
				 if(!empty($companyCode))
				 {
					 $output['already'] ="true";
				 }
				 else
				 {
				  if(!empty($check))
				  {
				    $res= $this->common->update(array("userId"=>$this->session->userdata['clientloggedin']['id']),$results,'user_paymentmethod');
				  }
				  else
				  {
				   $res = $this->common->insert('user_paymentmethod',$results);
			    }
				 if($res)
				 {
					 $output['success'] ="true";
				 }
				 else
				 {
					 $output['success'] ="false";
				 }
			  }
         echo json_encode($output);
				 exit;
			 }

			 public function getpaymentmethod()
			 {
				 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
					if($user->parent == 0)
				 {
					 $userId = $user->id;
				 }
				 else
				 {
					 $userId = $user->parent;
				 }

				 $result = $this->common->getrow('user_paymentmethod',array("userId"=>$userId));
				 if($result)
				 {
					$output['success'] ="true";
					$output['result'] =$result;
				 }
				 else
				 {
					 $output['success'] ="false";
					 $output['result'] ='';
				 }
				 echo json_encode($output);
				 exit;
			 }



			public function getActiveClient()
			{
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
					$userId = $user->id;
				}
				else
				{
					$userId = $user->parent;
				}
				$sales = $this->common->get('user',array("parent"=>$userId,"access"=>2));
				if(!empty($sales))
				{
					foreach($sales as $s)
					{
					 $salesId[] = $s->id;
					}
				}

				$result = $this->common->getActiveClient(array("j.freelancerId"=>$userId));
				$results = $this->common->getActiveOwnProject($salesId);
				$res = array_merge($result,$results);
				if($res)
				{
					$output['success'] = "true";
					$output['result'] = $res;
				}
				else
				{
					$output['success'] = "false";
					$output['result'] = '';
				}
				echo json_encode($output);
				exit;
      }

			public function getclientcontract()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$result = $this->common->clientcontact(array("uc.freelancerId"=>$this->session->userdata['clientloggedin']['id'],"clientId"=>$results->id));
				if($result)
				{
					$output['success'] = "true";
					$output['result'] = $result;
				}
				else
				{
					$output['success'] = "false";
					$output['result'] = '';
				}
				echo json_encode($output);
				exit;
			}

			public function invoice_save()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$recurring = '';
				$duration = '';
				$duration = '';
				$every = '';
				$end = '';
				$endNever = '';
				$endAfter = '';
				$endAfterDuration = '';
				$showrecurring ='';
				$check = $this->common->getrow('invoice',array("reference"=>$results->reference,"invoiceNo"=>$results->invoiceNo));
				if(!empty($check))
				{
          $output['already'] ="true";
				}
				else
				{
				$task = $results->task;
				$recurring ='';
				$duration = '';
				unset($results->task);
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
					$userId = $user->id;
				}
				else
				{
					$userId = $user->parent;
				}
				if(!empty($results->showrecurring))
				{
					 $showrecurring = $results->showrecurring;
				}
					if(!empty($results->recurring))
					{
				    $recurring = $results->recurring;
			    }
					if(!empty($results->duration))
					{
				   $duration = $results->duration;
				  }
					if(!empty($results->every))
					{
				   $every = $results->every;
				 }
				 if(!empty($results->endNever))
				 {
				 $endNever = $results->endNever;
			   }
				 if(!empty($results->endAfter))
				 {
				 $endAfter = $results->endAfter;
			   }
				 if(!empty($results->endAfterDuration))
				 {
				 $endAfterDuration = $results->endAfterDuration;
			    }

				 if(!empty($results->end))
				 {
				  $end = $results->end;
			   }

				unset($results->showrecurring);
				unset($results->recurring);
				unset($results->duration);
				unset($results->every);
				unset($results->endNever);
				unset($results->endAfter);
				unset($results->endAfterDuration);
				unset($results->end);

				$results->userId = $userId;
				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				$date =  $nowUtc->format('Y-m-d');
				$results->date = $date;
        //$results->reference = 'Topseo'.strtotime($date).rand(0,2);
				$res = $this->common->insert('invoice',$results);
				if($res)
				{
					if(!empty($task))
					{
					  foreach($task as $t)
					  {
						 $t->invoiceId = $res[1];
					   $taskinsert = $this->common->insert('invoice_task',$t);
					   }
          }
				}
				if(!empty($showrecurring))
				{

					$a['invoiceId'] = $res[1];
					$a['recurringType'] = $recurring;
					$a['duration'] = $duration;
					$a['date'] = $date;
					$a['every'] = $every;
					$a['endNever'] = $endNever;
					$a['endAfter'] = $endAfter;
					$a['endAfterDuration'] = $endAfterDuration;
					$a['end'] = $end;
					$this->common->insert('invoice_recurring',$a);
				}

				if($taskinsert)
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

			public function project_edit($id)
			{
				$data['projectId'] = $id;
				$d['title'] ="Edit A Project Details | Project Editing";
				$this->load->view('freelancer/header.php',$d);
				$this->load->view('freelancer/project_edit.php',$data);
				$this->load->view('freelancer/footer.php');
			}

			public function projectmanger_project_edit($id)
			{
				$data['projectId'] = $id;
				$this->load->view('freelancer/header.php');
				$this->load->view('freelancer/projectmanager_project_edit.php',$data);
				$this->load->view('freelancer/footer.php');
			}

			public function getproject_edit()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$id = $results->projectId;

				$result = $this->common->getrow('project',array("projectId"=>$id));
				if($result)
				{
					$result->document = $this->common->get('project_document',array("projectId"=>$id));
					$result->milestone = $this->common->get('todoList',array("projectId"=>$id,"parent"=>0));
				}

				if(!empty($result->milestone))
				{
					foreach($result->milestone as $k=>$m)
					{
						$result->milestone[$k]->task = $this->common->get('todoList',array("parent"=>$m->id,"projectId"=>$m->projectId));
					}
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

			public function projectupdate()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				$date = $nowUtc->format('Y-m-d');
	 		 $milestone = $results->milestones;
	 		 $document = $results->document;
			 $results->fixedBudget = $results->budget;
	 		 unset($results->document);
	 		 unset($results->milestones);
			 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			 if($user->parent != 0)
			 {
				 $userid = $user->parent;
			 }
			 else
			 {
				 $userid = $user->id;
			 }
	 		 $res = $this->common->update(array("projectId"=>$results->projectId),$results,'project');
	 		 if($res)
	 		 {
	 			 if(!empty($milestone))
	 			 {
          $this->db->where('projectId',$results->projectId);
			    $query = $this->db->delete('todoList');

	 				 foreach($milestone as $m)
	 				 {
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
							 if(empty($m->taskId))
							 {
								 $m->taskId = $taskId;
							 }
	 					 $mi['name'] = $m->title;
	 					 $mi['hours'] = $m->hours;
	 					 $mi['projectId'] = $results->projectId;
	 					 $mi['taskId'] = $m->taskId;
	 					 $mi['type'] = 2;
	 					 $mi['assignedBy'] = $results->projectManagerId;
	 					 $mi['status'] = 2;
	 					 $mi['milestone'] = 1;

	 					 $minsert =$this->common->insert('todoList',$mi);
	 					  if($minsert)
	 						{

	 							foreach($m->task as $k=>$t)
	 							{
	 								if(!empty($t->task))
	 								{
										$ids = $this->common->getone('todoList','id','desc');

			 							if(!empty($ids))
			 							{
			 							 $xx = $ids->id + 1;
			 							 $taskId1 = "TS000".$xx;
			 							 }
			 							 else
			 							 {
			 								$taskId1 = 'TS0001';
			 							 }
			 							 if(empty($m->taskId))
			 							 {
			 								 $taskId = $taskId1;
			 							 }
	 								    $tdata['parent'] = $minsert[1];
	 								    $tdata['projectId'] = $results->projectId;
	 										$tdata['name'] = $t->task;
	 										$tdata['description'] = $t->description;
	 										$tdata['hours'] = $t->hours;
	 										$tdata['taskId'] = $taskId;
	 										$tdata['type'] = 2;
	 										$tdata['assignedBy'] = $results->projectManagerId;
	 										$tdata['status'] = 2;

	 									$task = $this->common->insert('todoList',$tdata);
	 								}
	 							}
	 						}
	 				 }
	 			 }

	 			 if(!empty($document))
	 			 {
					 $this->db->where('projectId',$results->projectId);
					 $query = $this->db->delete('project_document');
	 				 foreach($document as $doc)
	 				 {
	 					 $d['document'] = $doc;
	 					 $d['projectId'] = $results->projectId;
	 					 $dd = $this->common->insert('project_document',$d);
            }
	 			 }

				 if(!empty($results->upfrontAmount))
				 {

				 $this->common->delete('project_milestones_amount',array("projectId"=>$results->projectId));
		     $project = $this->common->getrow('project',array("projectId"=>$results->projectId));
		     $milestone = $this->common->getrow('todoList',array("projectId"=>$results->projectId,"milestone"=>1));

			   $res = $this->common->insert('project_milestones_amount',array("projectId"=>$results->projectId,"projectMilestoneId"=>$milestone->id,"amount"=>$results->upfrontAmount,"date"=>$date));
        

			 $in['userId'] = $userid;
       $in['client'] = $project->clientName;
       $in['project'] = $project->projectName;
       $in['currencyId'] = $project->currency;
       $in['amount'] = $project->hourlyPrice * $milestone->hours;
       $in['receivedAmount'] = $results->upfrontAmount;
       $in['employeeId'] = $this->session->userdata['clientloggedin']['id'];
       $in['status'] = 1;
       $in['received'] = 1;
       $in['projectId'] = $results->projectId;
       $in['projectMilestoneId'] = $milestone->id;
       $in['date'] = $date;
			   $check1 = $this->common->delete('income',array("projectId"=>$results->projectId));
			  $this->common->insert('income',$in);

			  }
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


			public function invoice()
			{
			 $data['title'] =" Create, Download and Send Invoices ";
			 $this->load->view('freelancer/header',$data);
			 $this->load->view('freelancer/freelancerinvoice');
			 $this->load->view('freelancer/footer');
			}

			public function getinvoice()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$page = $results->page;
				$startdate = '';
				$enddate = '';
				$name = '';
				$config = array();
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
 				if($user->parent == 0)
 				{
 					$userId = $user->id;
 				}
 				else
 				{
 					$userId = $user->parent;
 				}
				if(!empty($results->startdate))
				{
				$startdate = date("Y-m-d", strtotime($results->startdate));
				}
				if(!empty($results->enddate))
				{
				$enddate = date("Y-m-d", strtotime($results->enddate));
				}

				if(!empty($results->name))
				{
					$name = $results->name;
				}

				if(!empty($page))
				{
					 $data['pcount'] = $this->common->count_allinvoice(array("userId"=>$userId),$startdate,$enddate,$name);
					 $config["total_rows"] = $this->common->count_allinvoice(array("userId"=>$userId),$startdate,$enddate,$name);
				}

				$config["per_page"] = $results->perpage;
				$this->pagination->initialize($config);

				if( $page <= 0 )
				{
					$page = 1;
				}

				$start = ($page-1) * $config["per_page"];

				if(!empty($page))
				{
					$res = $this->common->getfreelancerinvoice(array("i.userId"=>$userId),$startdate,$enddate,$name,$start,$config["per_page"]);
					$total = $this->common->sum_invoice_amount1(array("userId"=>$userId),$startdate,$enddate,$name);

				}

			if($res)
				{
					$data['message'] ="true";
					$data['result'] = $res;
					$data['start'] = $start + 1;
					$data['total'] = $total->total;
				}
				else
				{
					$data['message'] ="false";
					$data['result'] = '';
				}
				echo json_encode($data);
				exit;
			}

			public function invoice_create()
			{
				$data['title'] =" Create an Invoice Instantly";
				$this->load->view('freelancer/header',$data);
				$this->load->view('freelancer/freelancerCreateInvoice');
				$this->load->view('freelancer/footer');
			}

			public function invoice_edit($id)
			{
				$a['title'] ="Edit Invoice";
				$data['invoiceId'] = $id;
				$this->load->view('freelancer/header',$a);
				$this->load->view('freelancer/freelancerEditInvoice',$data);
				$this->load->view('freelancer/footer');
			}

			public function geteditinvoice()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$id = $results->invoiceId;
				$result = $this->common->getrow('invoice',array("invoiceId"=>$id));
				if($result)
				{
					$recurring = $this->common->getrow('invoice_recurring',array("invoiceId"=>$id));
					$result->task = $this->common->get('invoice_task',array("invoiceId"=>$id));
					// $result->contract = $this->common->clientcontact(array("uc.freelancerId"=>$this->session->userdata['clientloggedin']['id'],"clientId"=>$result->recipient));
					$cu = $this->common->getrow('currency',array("id"=>$result->currencyId));
					$result->currency = $cu->code.' '.$cu->symbol;
					if($recurring)
					{
						$result->recurringType = $recurring->recurringType;
						$result->duration = $recurring->duration;
						$result->every = $recurring->every;
						$result->endNever = $recurring->endNever;
						$result->endAfter = $recurring->endAfter;
						$result->endAfterDuration = $recurring->endAfterDuration;
						$result->end = $recurring->end;
					}
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
			  $task = $results->task;
				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				$date =  $nowUtc->format('Y-m-d');
				$recurring = '';
			  $duration = '';
			  $duration = '';
			  $every = '';
			  $end = '';
			  $endNever = '';
			  $endAfter = '';
			  $endAfterDuration = '';
			  $showrecurring ='';
				if(!empty($results->showrecurring))
				{
					 $showrecurring = $results->showrecurring;
				}
					if(!empty($results->recurring))
					{
						$recurring = $results->recurring;
					}
					if(!empty($results->duration))
					{
					 $duration = $results->duration;
					}
					if(!empty($results->every))
					{
					 $every = $results->every;
				 }
				 if(!empty($results->endNever))
				 {
				 $endNever = $results->endNever;
				 }
				 if(!empty($results->endAfter))
				 {
				 $endAfter = $results->endAfter;
				 }
				 if(!empty($results->endAfterDuration))
				 {
				 $endAfterDuration = $results->endAfterDuration;
					}

				 if(!empty($results->end))
				 {
					$end = $results->end;
				 }

				 unset($results->showrecurring);
				 unset($results->recurring);
				 unset($results->duration);
				 unset($results->every);
				 unset($results->endNever);
				 unset($results->endAfter);
				 unset($results->endAfterDuration);
				 unset($results->end);


				unset($results->task);
			  $res = $this->common->update(array("invoiceId"=>$results->invoiceId),$results,'invoice');
			  if($res)
			  {
				  if(!empty($task))
				  {
          	$this->db->where('invoiceId',$results->invoiceId);
						$query = $this->db->delete('invoice_task');
								foreach($task as $t)
								{
									if(!empty($t->task))
									{
										$t->invoiceId = $results->invoiceId;
			 					   $taskinsert = $this->common->insert('invoice_task',$t);
									}
								}
							}
					 }

				$this->common->delete('invoice_recurring',array("invoiceId"=>$results->invoiceId));

				if(!empty($showrecurring))
				{
					$a['invoiceId'] = $results->invoiceId;
			    $a['recurringType'] = $recurring;
			    $a['duration'] = $duration;
			    $a['date'] = $date;
			    $a['every'] = $every;
			    $a['endNever'] = $endNever;
			    $a['endAfter'] = $endAfter;
			    $a['endAfterDuration'] = $endAfterDuration;
			    $a['end'] = $end;
			    $this->common->insert('invoice_recurring',$a);
				}

			 if($res)
			 {
				 $output['message'] ="true";
			 }
			 else
			 {
				 $output['message'] ="false";
			 }
			 echo json_encode($output);
			 exit;

			}

			public function unassigned_task()
			{
				$array = file_get_contents('php://input');
		 	  $results =json_decode($array);

				$this->db->where('projectTaskId',$results->taskId);
				$this->db->where('userId',$results->userId);
		 	  $query = $this->db->delete('project_task_assign');

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

			public function invoicedownload($id)
			{
			 $data['result'] = $this->common->getrow('invoice',array('invoiceId'=>$id));
			 $data['task'] = $this->common->get('invoice_task',array('invoiceId'=>$id));
			 $data['user'] = $this->common->getSingleUser(array('u_id'=>$data['result']->userId));
			 $data['client'] = $this->common->getrow('user_meta',array('u_id'=>$data['result']->recipient ));
       $data['payment'] = $this->common->getrow('user_paymentmethod',array("userId"=>$data['result']->userId));
			 $cu = $this->common->getrow('currency',array("id"=>$data['result']->currencyId));
        if(!empty($data['user']))
				{
					if($data['user']->countryCode)
					{
					 $cc = explode(":",$data['user']->countryCode);
					 $data['user']->countryCode = $cc[1];
					 }
				}

				if(!empty($data['result']))
				{
					if($data['result']->countryCode)
					{
					 $cc = explode(":",$data['result']->countryCode);
					 $data['result']->countryCode = $cc[1];
					 }
				}
				if($data['user']->company_logo)
		    {
		     $data['logo'] = $data['user']->company_logo;
	      }
		   else
		   {
			  $data['logo'] = '';
		    }
		    $data['address'] = $data['user']->address1;
			  $data['currency'] = $cu->code.' '.$cu->symbol;
			  $html = $this->load->view('email/freelancerinvoicePdf',$data,TRUE);

				$pdfFilePath = "invoice.pdf";
				$this->load->library('m_pdf');
				$this->m_pdf->pdf->WriteHTML($html);
				$this->m_pdf->pdf->Output($pdfFilePath, "I");
			}

			public function employeeDsr()
			{
				$data['title'] = "Employee Daily Status Report";
				$this->load->view('freelancer/header',$data);
				$this->load->view('freelancer/employee_dsr');
				$this->load->view('freelancer/footer');
			}

			public function getEmployeeDsr()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$d = '00:00';
				$result = array();

				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );

				if(!empty($results->startdate))
				{
					$startdate = date("Y-m-d", strtotime($results->startdate));
				}
				else
				{
					$startdate = $nowUtc->format('Y-m-d');
				}

				if(!empty($results->enddate))
				{
				 $enddate = 	date("Y-m-d", strtotime($results->enddate));
				}
				else
				{
          $enddate =  $nowUtc->format('Y-m-d');
				}


				$page = $results->page;
				$config = array();

				if(!empty($page))
				{
					 $data['pcount'] = count($this->common->countemployeeDsr(array("employeeId"=>$this->session->userdata['clientloggedin']['id']),$startdate,$enddate,$results->status));
					 $config["total_rows"] = count($this->common->countemployeeDsr(array("employeeId"=>$this->session->userdata['clientloggedin']['id']),$startdate,$enddate,$results->status));
				}

				$config["per_page"] = $results->perpage;
				$this->pagination->initialize($config);

				if( $page <= 0 )
				{
					$page = 1;
				}

				$start = ($page-1) * $config["per_page"];

				if(!empty($page))
				{
					$res = $this->common->getMydsr(array("employeeId"=>$this->session->userdata['clientloggedin']['id']),$startdate,$enddate,$results->status,$start,$config["per_page"]);
				}

				if(!empty($res))
				{
					foreach($res as $k=>$r)
					{
						if($r->time != 0)
						{
								 $hours = floor($r->time / 60);
								 if($hours < 10)
								 {
									 $hours = '0'.$hours;
								 }
								 $minutes = ($r->time % 60);
								 if($minutes < 10)
								 {
									 $minutes = '0'.$minutes;
								 }
								 $d = $hours.':'.$minutes;
						  if($d)
						  {
						   $res[$k]->time = $d;
						   }
						}
						if($r->adjustedTime != 0)
						{
							$hours1 = floor($r->adjustedTime / 60);
							if($hours1 < 10)
							{
								$hours1 = '0'.$hours1;
							}
							$minutes1 = ($r->adjustedTime % 60);
							if($minutes1 < 10)
							{
								$minutes1 = '0'.$minutes1;
							}
							$d1 = $hours1.':'.$minutes1;
					    if($d1)
					    {
						  $res[$k]->adjustedTime = $d1;
						  }
						}
					}
				}

				if(!empty($res))
				{
					foreach($res as $r)
					{
						 if(!isset($result[$r->date]))
								{
								 $total = $this->common->sum_dsr_time(array("employeeId"=>$r->employeeId,"date"=>$r->date));
								 $approvedtotal = $this->common->sum_dsr_time(array("employeeId"=>$r->employeeId,"date"=>$r->date,"approved"=>1));
								 $hours2 = floor($approvedtotal->adjusted / 60);
	 							if($hours2 < 10)
	 							{
	 								$hours2 = '0'.$hours2;
	 							}
	 							$minutes2 = ($approvedtotal->adjusted % 60);
	 							if($minutes2 < 10)
	 							{
	 								$minutes2 = '0'.$minutes2;
	 							}
								$hours3 = floor($total->time / 60);
							 if($hours3 < 10)
							 {
								 $hours3 = '0'.$hours3;
							 }
							 $minutes3 = ($total->time % 60);
							 if($minutes3 < 10)
							 {
								 $minutes3 = '0'.$minutes3;
							 }
	 							$adjustment = $hours2.':'.$minutes2;
	 							$totaltime = $hours3.':'.$minutes3;
						 	   $result[$r->date]['month'] = $r->month;
						 	   $result[$r->date]['date'] = $r->date;
						 	   $result[$r->date]['dsr'][] = $r;
						 	   $result[$r->date]['adjustedTime'] = $adjustment;
						 	   $result[$r->date]['totaltime'] = $totaltime;
								 $result[$r->date]['overallstatus'] = 0;

						    }
								else
								{
									$total = $this->common->sum_dsr_time(array("employeeId"=>$r->employeeId,"date"=>$r->date));
									$approvedtotal = $this->common->sum_dsr_time(array("employeeId"=>$r->employeeId,"date"=>$r->date,"approved"=>1));

 								 $hours2 = floor($approvedtotal->adjusted / 60);
 	 							if($hours2 < 10)
 	 							{
 	 								$hours2 = '0'.$hours2;
 	 							}
 	 							$minutes2 = ($approvedtotal->adjusted % 60);
 	 							if($minutes2 < 10)
 	 							{
 	 								$minutes2 = '0'.$minutes2;
 	 							}
 								$hours3 = floor($total->time / 60);
 							 if($hours3 < 10)
 							 {
 								 $hours3 = '0'.$hours3;
 							 }
 							 $minutes3 = ($total->time % 60);
 							 if($minutes3 < 10)
 							 {
 								 $minutes3 = '0'.$minutes3;
 							 }
 	 							 $adjustment = $hours2.':'.$minutes2;
 	 							 $totaltime = $hours3.':'.$minutes3;
									$result[$r->date]['month'] = $r->month;
									$result[$r->date]['date'] = $r->date;
									$result[$r->date]['dsr'][] = $r;
									$result[$r->date]['adjustedTime'] = $adjustment;
								  $result[$r->date]['totaltime'] = $totaltime;
								  $result[$r->date]['overallstatus'] = 0;

							}
					}
				}

				if(!empty($result))
				{
					foreach($result as $k=>$r)
					{
						 $pending = 0;
						 $approved = 0;
						 $rejected = 0;
						foreach($r['dsr'] as $d)
						{
							if($d->approved == 0)
							{
								$pending += 1;
							}
							else if($d->approved == 1)
							{
								$approved += 1;
							}
							else if($d->approved == 2)
							{
							 $rejected += 1;
							}
						}

						if($pending > 0)
						{
	           $result[$k]['overallstatus'] = 0;
						}
						else if($rejected > 0)
						{
							$result[$k]['overallstatus'] = 2;
						}
						else if($approved > 0)
						{
							$result[$k]['overallstatus'] = 1;
						}
					}
				}

			if($result)
				{
					$data['message'] ="true";
					$data['result'] = $result;
					$data['startdate'] = date("d-m-Y", strtotime($startdate));
					$data['enddate'] = date("d-m-Y", strtotime($enddate));
				}
				else
				{
					$data['message'] ="false";
					$data['result'] = '';
					$data['startdate'] = date("d-m-Y", strtotime($startdate));
					$data['enddate'] = date("d-m-Y", strtotime($enddate));
				}

				echo json_encode($data);
				exit;
			}

			public function dsrSave()
			{
				$array = file_get_contents('php://input');
  			$results =json_decode($array);
				$u ='';

  		  $date = date("Y-m-d", strtotime($results->date));
				if(!empty($results->dsr))
			  {
					foreach($results->dsr as $d)
					{


						if($d->already == 0)
						{

				     $user = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));
  			     $d->userId = $user->parent;
				     $d->date = $date;
  			     $d->employeeId = $this->session->userdata['clientloggedin']['id'];
				     $hours = 0;
	           $minutes = 0;
	           $a = explode(":",$d->time);
             $hours = $a[0] * 60;
	           $minutes = $a[1];
	           $d->time = $hours + $minutes;
	           $d->adjustedTime = $hours + $minutes;
						 unset($d->timeerror);
						 unset($d->already);
						 unset($d->unique);
						 unset($d->min);
						 unset($d->tmin);
						 unset($d->timemin);
						 unset($d->timemax);

						 $u = $this->common->insert('dsr',$d);
					 }
					 else
					 {
						 $d->date = $date;
						 if($d->approved == 2)
						{
						 $hours = 0;
						 $minutes = 0;
						 $a = explode(":",$d->time);
						 $hours = $a[0] * 60;
						 $minutes = $a[1];
						 $d->time = $hours + $minutes;
						 $d->adjustedTime = $hours + $minutes;
						 $d->approved = 0;
						 $d->approvedBy =Null;
					   }
						 else
						 {
							 unset($d->time);
						 }
						 unset($d->timeerror);
						 unset($d->already);
						 unset($d->unique);
						 unset($d->min);
						 unset($d->tmin);
						 unset($d->timemin);
						 unset($d->timemax);

						 $u = $this->common->update(array("dsrId"=>$d->dsrId),$d,'dsr');
					 }
			   }
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

			public function getOnedsr()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
        $result = $this->common->getrow('dsr',array("dsrId"=>$results->id));
				if(!empty($result))
				{
					$result->history = $this->common->get('dsr_history',array("dsrId"=>$results->id));
				}
				if($result->time != 0)
				{
				  $hours = floor($result->time / 60);
				  if($hours < 10)
				  {
				   $hours = '0'.$hours;
				  }
				  $minutes = ($result->time % 60);
				  if($minutes < 10)
				  {
				   $minutes = '0'.$minutes;
				  }
				  $d = $hours.':'.$minutes;

				 }
				 else
				 {
				  $d = "00:00";
				 }

				 if($result->type == 2)
				  {
				    $project = $this->common->getrow('project',array("projectId"=>$result->projectId));
						if(!empty($project))
						{
							$result->project = $project->projectName;
						}
			    }
					else if($result->type == 1)
				  {
				    $task = $this->common->getrow('todoList',array("id"=>$result->projectId));
						if(!empty($task))
						{
							$result->project = "General task";
						}
			    }
					else if($result->type == 3)
				  {
				    $contract = $this->common->getrow('user_jobcontract',array("contractId"=>$result->projectId));
				    $job = $this->common->getrow('user_job',array("jobId"=>$contract->jobId));
						if(!empty($job))
						{
							$result->project  = $job->jobTitle;
						}
			    }
					else if($result->type == 4)
					{
						$gig = $this->common->getrow('user_gig_buy',array("user_gig_buyId"=>$result->projectId));
						if(!empty($gig))
						{
							$result->project = $gig->title;
						}
					}
					else if($result->type == 5)
					{
						$result->project = "Additional task";
					}
					else if($result->type == 6)
					{
						$breaks = $this->common->getrow('break_time',array("id"=>$result->projectId));
           if($breaks)
					  {
						$result->project = $breaks->name;
					  }
					}
				 $result->time = $d;
				if($result)
				{
					$output['success'] ="true";
					$output['result'] =$result;
				}
				else
				{
				  $output['success'] ="false";
				  $output['result'] ='';
				}
				echo json_encode($output);
				exit;
			}

	public function todotaskStart()
	{
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date = $nowUtc->format('Y-m-d H:i:s');

		 if($results->status == 5)
		 {
       $task = $this->common->getrow('todoList',array("id"=>$results->id));
			 $res['startTime'] = $nowUtc->format('Y-m-d H:i:s');
			 $res['yesTime'] = $nowUtc->format('Y-m-d H:i:s');
			 $res['todoListId'] = $results->id;
			 $res['status'] = $results->status;
			 $res['taskId'] = $results->taskId;
			 $res['userId'] = $this->session->userdata['clientloggedin']['id'];
			 if($task->type == 1)
			 {
			  $res['projectId'] = $task->id;
		   }
			 else if($task->type == 2)
			 {
				 $res['projectId'] = $task->projectId;
			 }
			 else if($task->type == 3)
			 {
				 $res['projectId'] = $task->contractId;
			 }
			 else if($task->type == 4)
			 {
				 $res['projectId'] = $task->gigId;
			 }
			 $res['type'] = $task->type;
       $update = $this->common->update(array("id"=>$results->id),array("status"=>$results->status,"started"=>1,"completeDate"=>$date),'todoList');

			 if($update)
			 {
			 $insert = $this->common->insert('todoList_billing',$res);
		   }

			 if($insert)
			 {
				 if($task->ended == 0)
				 {
					 $s = "Task Started";
				 }
				 else
				 {
					 $s = "Task Resumed";
				 }
			  $this->todoactivitySave(array("todoListId"=>$results->id,"userId"=>$this->session->userdata['clientloggedin']['id'],"status"=>$s,"date"=>$date));
			 }

			 if($insert)
			 {
				$msg['message'] = "true";
			 }
			 else
			 {
				 $msg['message'] ="false";
			 }
			 echo json_encode($msg);
			 exit;
		 }
		 else if($results->status == 6 || $results->status == 2 || $results->status == 7)
		 {
			   $minutes = 0;
				 $lasttimer = $this->common->getOneRow('todoList_billing',array("userId"=>$this->session->userdata['clientloggedin']['id'],"todoListId"=>$results->id,"taskId"=>$results->taskId),'todolist_billingId',"desc");
				 if($lasttimer->endTime == '')
				 {
				  $r['endTime'] = $nowUtc->format('Y-m-d H:i:s');

					 $start_date = new DateTime($lasttimer->startTime);
					 $since_start = $start_date->diff(new DateTime($r['endTime']));
					 $minutes = $since_start->days * 24 * 60;
					 $minutes += $since_start->h * 60;
					 $minutes += $since_start->i;
				 }
				 if($lasttimer->endTime == '')
				 {
				 $r['time'] = $minutes;
			   }
				 $r['status'] = $results->status;

			  $updates = $this->common->update(array("id"=>$results->id),array("status"=>$results->status,"completeDate"=>$date,"ended"=>1),'todoList');

				if($updates)
				{
				 $update = $this->common->update(array("todolist_billingId"=>$lasttimer->todolist_billingId),$r,'todoList_billing');
			  }

			  if($update)
			  {
				 $last = $this->common->getrow('todoList_billing',array("todolist_billingId"=>$lasttimer->todolist_billingId,"userId"=>$this->session->userdata['clientloggedin']['id'],"taskId"=>$results->taskId));
				 $user = $this->common->getrow('user',array("id"=>$last->userId));
				 $todo = $this->common->getrow('todoList',array("id"=>$results->id));

					if($todo->status == 6)
					{
						$status = 1;
					}
					else
					{
						$status = 0;
					}

				if($todo->type == 1)
				{
					 $a['type'] = 1;
					 $a['projectId'] = $todo->id;
				}
				 else if($todo->type == 2)
				 {
					 $a['type'] = 2;
					 $a['projectId'] = $todo->projectId;
				 }
				 else if($todo->type == 3)
				 {
					 $a['type'] = 3;
					 $a['projectId'] = $todo->contractId;
				 }
				 else if($todo->type == 4)
				 {
					 $a['type'] = 4;
					 $a['projectId'] = $todo->gigId;
				 }
					 $a['task'] = $todo->name;
					 $a['taskDetail'] = $todo->description;
					 $a['todoId'] = $todo->id;
					 $a['taskId'] = $todo->taskId;
					 $a['employeeId'] = $last->userId;
					 $a['userId'] = $user->parent;
					 $a['status'] = $status;
					 $a['adjustedTime'] = $minutes;
					 $a['time'] = $minutes;
					 $a['adjustedTime'] = $minutes;
					 $a['date'] = $nowUtc->format('Y-m-d H:i:s');
					 $check = $this->common->getrow('dsr',array("todoId"=>$todo->id,"taskId"=>$todo->taskId,"date"=>$nowUtc->format('Y-m-d'),"employeeId"=>$last->userId));
          if(!empty($check))
				 {
					 $a['time'] = $check->time + $a['time'];
					 $a['adjustedTime'] = $a['time'];
					  if($minutes != 0)
					  {
				    $dsrinsert =	$this->common->update(array("dsrId"=>$check->dsrId),$a,'dsr');
				    }
						else
						{
							$dsrinsert =	$this->common->update(array("dsrId"=>$check->dsrId),array("status"=>1),'dsr');
						}
				  }
					else
					{
						if($minutes)
						{
						$dsrinsert =	$this->common->insert('dsr',$a);
						}
					}
			 }

			 if($update)
			 {
				 if($results->status == 7)
				 {
					 $activityStatus = "Task Paused";
				 }
				 else if($results->status == 6)
				 {
					 $activityStatus = "Task Completed";
				 }
				 $this->todoactivitySave(array("todoListId"=>$results->id,"userId"=>$this->session->userdata['clientloggedin']['id'],"status"=>$activityStatus,"date"=>$date,"timeSpent"=>$minutes));
			 }

			 if($update)
			 {
				$msg['message'] = "true";
			 }
			 else
			 {
				 $msg['message'] ="false";
			 }
			 echo json_encode($msg);
			 exit;
		 }
		 else if($results->status == 1 || $results->status == 4)
		 {
			 $update = $this->common->update(array("id"=>$results->id),array("status"=>$results->status,"completeDate"=>$date),'todoList');
			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			 $lasttimer = $this->common->getOneRow('todoList_billing',array("userId"=>$this->session->userdata['clientloggedin']['id'],"todoListId"=>$results->id,'time'=>NULL),'todolist_billingId',"desc");

			 if($lasttimer)
			 {
				 $r['endTime'] = $nowUtc->format('Y-m-d H:i:s');
				 $start_date = new DateTime($lasttimer->startTime);
				 $since_start = $start_date->diff(new DateTime($r['endTime']));
				 $minutes = $since_start->days * 24 * 60;
				 $minutes += $since_start->h * 60;
				 $minutes += $since_start->i;
				 $r['time'] = $minutes;
				 $r['status'] = $results->status;

			 }

			if($lasttimer)
			{
			 $update = $this->common->update(array("todolist_billingId"=>$lasttimer->todolist_billingId),$r,'todoList_billing');
			}

			if($update)
			{
				if($results->status == 4)
				{
					$activityStatus = "Task Requested to Postpond";
				}
				$this->todoactivitySave(array("todoListId"=>$results->id,"userId"=>$this->session->userdata['clientloggedin']['id'],"status"=>$activityStatus,"date"=>$date));
			}

			 if($update)
			 {
				$msg['message'] = "true";
			 }
			 else
			 {
				 $msg['message'] ="false";
			 }
			 echo json_encode($msg);
			 exit;
		 }

	}




		 public function manager_dsr()
		 {
			 $data['title'] ="Keep Your Project On Track With Status Reports";
			 $this->load->view('freelancer/header',$data);
			 $this->load->view('freelancer/manager_dsr');
			 $this->load->view('freelancer/footer');
		 }

		 public function getmanagerdsr()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $page = $results->page;
			 $config = array();
			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ));
			 $date = $nowUtc->format('Y-m-d');
			 $type = 0;

			 if($this->session->userdata['clientloggedin']['access'] == 5)
			 {
        $type = 0;
			 }
			 $d = "00:00";
			 $result = array();

        if(!empty($results->startdate))
				{
					$startdate = date("Y-m-d", strtotime($results->startdate));
				}
				else
				{
					$startdate = $nowUtc->format('Y-m-d');
				}
				if(!empty($results->userId))
				{
					$employeeId = $results->userId;
				}
				else
				{
				  $employeeId = '';
				}
				if(!empty($results->enddate))
				{
				 $enddate = 	date("Y-m-d", strtotime($results->enddate));
				}
				else
				{
          $enddate =  $nowUtc->format('Y-m-d');
				}
				$status = $results->status;

			 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

			 if($user->parent == 0)
			 {
			  $userid = $user->id;
			 }
			 else
			 {
			   $userid = $user->parent;
			 }

			 if(!empty($results->startdate))
				{
         $startdate = date("Y-m-d", strtotime($results->startdate));
			  }
				if(!empty($results->enddate))
				{
         $enddate = date("Y-m-d", strtotime($results->enddate));
			  }

			 if(!empty($page))
			 {
						$data['pcount'] = $this->common->count_manager_dsr(array("userId"=>$userid),$startdate,$enddate,$this->session->userdata['clientloggedin']['id'],$employeeId,$status);
						$config["total_rows"] = $this->common->count_manager_dsr(array("userId"=>$userid),$startdate,$enddate,$this->session->userdata['clientloggedin']['id'],$employeeId,$status);
			 }

			 $config["per_page"] = $results->perpage;
			 $this->pagination->initialize($config);

			 if( $page <= 0 )
			 {
				 $page = 1;
			 }

			 $start = ($page-1) * $config["per_page"];

			 if(!empty($page))
			 {
				 $res = $this->common->getmanagerdsr(array("userId"=>$userid),$startdate,$enddate,$this->session->userdata['clientloggedin']['id'],$employeeId,$status,$start,$config["per_page"]);
			 }


			 if(!empty($res))
			 {
				 foreach($res as $k=>$r)
				 {
					 $totaltime =  $this->common->sum_dsr_time(array("employeeId"=>$r->employeeId,"date"=>$r->date));
					 $res[$k]->totaltime = $totaltime->time;
					 $approved =  $this->common->count_all_results('dsr',array("employeeId"=>$r->employeeId,"date"=>$r->date,"approved"=>0));
					 $approved1 =  $this->common->count_all_results('dsr',array("employeeId"=>$r->employeeId,"date"=>$r->date,"approved"=>2));
					 $approved2 =  $this->common->count_all_results('dsr',array("employeeId"=>$r->employeeId,"date"=>$r->date,"approved"=>1));

					 if($approved > 0)
					 {
							$res[$k]->approved = 0;
					 }
					else if($approved1 > 0)
					 {
							$res[$k]->approved = 2;
					 }
					else if($approved2 > 0)
					 {
							$res[$k]->approved = 1;
					 }
					 if($totaltime)
					 {
						 $res[$k]->time = $totaltime->time;
						 $res[$k]->adjusted = $totaltime->adjusted;
					 }
					 if($r->time != 0)
					 {
						 $hours = floor($r->time / 60);
						 if($hours < 10)
						 {
							$hours = '0'.$hours;
						 }
						 $minutes = ($r->time % 60);
						 if($minutes < 10)
						 {
							$minutes = '0'.$minutes;
						 }
						 $d = $hours.':'.$minutes;
						 if($d)
						 {
						 $res[$k]->time = $d;
						 }
						}
						if($r->adjusted != 0)
						{
							$hours1 = floor($r->adjusted / 60);
							if($hours1 < 10)
							{
							 $hours1 = '0'.$hours1;
							}
							$minutes1 = ($r->adjusted % 60);
							if($minutes1 < 10)
							{
							 $minutes1 = '0'.$minutes1;
							}
							$d1 = $hours1.':'.$minutes1;
							if($d1)
							{
							$res[$k]->adjusted = $d1;
							}
						 }
				 }
			 }

			 if(!empty($res))
			 {
				 foreach($res as $r)
				 {
					 if(!isset($result[$r->date]))
							 {
								$result[$r->date]['date'] = $r->date;
								$result[$r->date]['dsr'][] = $r;
								$result[$r->date]['taskdetail'] ='';
								$result[$r->date]['overallStatus'] ='';
							 }
							 else
							 {
								 $result[$r->date]['date'] = $r->date;
								 $result[$r->date]['dsr'][] = $r;
								 $result[$r->date]['taskdetail'] = '';
								 $result[$r->date]['overallStatus'] = '';
							}
				 }
			 }

			 if(!empty($result))
			 {
				 foreach($result as $k=>$r)
				 {
					 $pending = 0;
					 $approved = 0;
					 $rejected = 0;

					 foreach($r['dsr'] as $d)
					 {
						if($d->approved == 1)
						 {
						  $approved += 1;
						 }
						 else if($d->approved == 2)
						 {
							 $rejected += 1;
						 }
						 else if($d->approved == 0)
						 {
							 $pending += 1;
						 }
					 }

					 if($pending > 0)
					 {
					 $result[$k]['overallStatus'] = 0;
				   }
					 else if($rejected  > 0)
					 {
					 $result[$k]['overallStatus'] = 2;
					 }
					 else if($approved > 0)
					 {
						$result[$k]['overallStatus'] = 1;
					 }
				 }
			 }

		 if($result)
			 {
				 $data['message'] ="true";
				 $data['result'] = $result;
				 $data['type'] = $type;
				 $data['startdate'] = date("d-m-Y", strtotime($startdate));
         $data['enddate'] = date("d-m-Y", strtotime($enddate));
			 }
			 else
			 {
				 $data['message'] ="false";
				 $data['result'] = '';
				 $data['type'] = $type;
				 $data['startdate'] = date("d-m-Y", strtotime($startdate));
         $data['enddate'] = date("d-m-Y", strtotime($enddate));
			 }

			 echo json_encode($data);
			 exit;
		 }

		 public function dsrApproved()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $results->approvedBy = $this->session->userdata['clientloggedin']['id'];
			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ));
			 $date = $nowUtc->format('Y-m-d h:i:s');
			  $res = $this->common->getrow('dsr',array("dsrId"=>$results->dsrId));
			  if($res->approved != 0)
			  {
				  $msg['error'] ="true";
				 if($res->approved == 1)
				 {
				  $msg['msg'] ="Timesheet Already Approved";
				  $msg['status'] = 1;
			   }
				 else if($res->approved == 2)
				 {
					 $msg['msg'] ="Timesheet Already Rejected";
					 $msg['status'] = 2;
				 }
			 }
			 else
			 {
       $update = $this->common->update(array("dsrId"=>$results->dsrId),array("approved"=>$results->approved,"approvedBy"=>$this->session->userdata['clientloggedin']['id']),'dsr');
			 $name = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
			 if($results->approved == 2)
			 {

					$message = "Rejected";

				 $this->common->insert('dsr_history',array("dsrId"=>$results->dsrId,"message"=>$message,"date"=>$date,"appovedBy"=>$this->session->userdata['clientloggedin']['id']));
			 }
   	      if($update)
			    {
					$msg['message'] ="true";
					$msg['name'] = $name->name;
			    }
			    else
			   {
					$msg['message'] ="false";
			    }
		     }
				echo json_encode($msg);
				exit;
		 }

		 public function dsrRemarks()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $res = $this->common->getrow('dsr',array("dsrId"=>$results->dsrId));
			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ));
			 $date = $nowUtc->format('Y-m-d h:i:s');
			 if($res->approved != 0)
			 {
				 $msg['error'] ="true";
				 if($res->approved == 1)
				 {
				 $msg['msg'] ="Timesheet Already Approved";
				 $msg['status'] = 1;
			   }
				 else if($res->approved == 2)
				 {
					 $msg['msg'] ="Timesheet Already Rejected";
					 $msg['status'] = 2;
				 }
			 }
			 else
			 {
        $update = $this->common->update(array("dsrId"=>$results->dsrId),array("approved"=>$results->approved,"approvedBy"=>$this->session->userdata['clientloggedin']['id']),'dsr');
				$user = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
				if($results->approved == 2)
				{

					 $message = "Rejected";

					$this->common->insert('dsr_history',array("dsrId"=>$results->dsrId,"remarks"=>$results->remarks,"message"=>$message,"date"=>$date,"appovedBy"=>$this->session->userdata['clientloggedin']['id']));
				}
   	    if($update)
			  {
					$msg['message'] ="true";
					$msg['name'] = $user->name;
			  }
			  else
			  {
					$msg['message'] ="false";
			  }
		   }
				echo json_encode($msg);
				exit;
		 }

		 public function getOneEmployeeDsr()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $result = $this->common->getrow('dsr',array("dsrId"=>$results->id,"date"=>$results->date));


			 if($result->time != 0)
			 {
				 $hours = floor($result->time / 60);
				 if($hours < 10)
				 {
					$hours = '0'.$hours;
				 }
				 $minutes = ($result->time % 60);
				 if($minutes < 10)
				 {
					$minutes = '0'.$minutes;
				 }
				 $d = $hours.':'.$minutes;

				}
				else
				{
					$time = $this->common->sum_todotask_time(array("todoListId"=>$result->todoId,"userId"=>$result->employeeId,"taskId"=>$result->taskId,"Date(startTime)"=>$result->date));
 				 if($time->time != 0)
 				 {
 						$hours = floor($time->time / 60);
 						if($hours < 10)
 						{
 							$hours = '0'.$hours;
 						}
 						$minutes = ($time->time % 60);
 						if($minutes < 10)
 						{
 							$minutes = '0'.$minutes;
 						}
 						$d = $hours.':'.$minutes;
				}
			}
			$result->time = $d;


			 if($result)
			 {
				 $output['success'] ="true";
				 $output['result'] =$result;
			 }
			 else
			 {
				 $output['success'] ="false";
				 $output['result'] ='';
			 }
			 echo json_encode($output);
			 exit;
		 }

		 public function deletedsr()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);

			$this->db->where('dsrId',$results->id);
			$query = $this->db->delete('dsr');

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

		 public function dsrUpdate()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $hours = 0;
			 $minutes = 0;
			 $a = explode(":",$results->time);
			 $hours = $a[0] * 60;
			 $minutes = $a[1];
			 $results->time = $hours + $minutes;

			 $u = $this->common->update(array("dsrId"=>$results->dsrId),$results,'dsr');

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

		 public function upgrade()
		 {
			 $this->load->view('freelancer/header');
			 $this->load->view('freelancer/upgrade');
			 $this->load->view('freelancer/footer');
		 }

		 public function upgradeFreelancer()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);

			 $update = $this->common->update(array("id"=>$results->userId),array("type"=>$results->type),'user');
			 if($update)
			 {
				 $output['message'] ="true";
			 }
			 else
			 {
				 $output['message'] ="false";
			 }
			 echo json_encode($output);
			 exit;
		 }

		 public function income()
		 {
			 $data['title'] ="Add Your Business Income Information";
			 $this->load->view('freelancer/header',$data);
			 $this->load->view('freelancer/income');
			 $this->load->view('freelancer/footer');
		 }

		 public function getallincome()
		 {
			  $array = file_get_contents('php://input');
				$results =json_decode($array);
				$page = $results->page;
				$config = array();
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
					$userId = $user->id;
				}
				else
				{
					$userId = $user->parent;
				}
				$result = array();

				if(!empty($page))
				{
					 $data['pcount'] = $this->common->count_allincome(array("userId"=>$userId));
					 $config["total_rows"] = $this->common->count_allincome(array("userId"=>$userId));
				}

				$config["per_page"] = $results->perpage;
				$this->pagination->initialize($config);

				if( $page <= 0 )
				{
					$page = 1;
				}

				$start = ($page-1) * $config["per_page"];

				if(!empty($page))
				{
					$res = $this->common->allincome(array("userId"=>$userId),$start,$config["per_page"]);
				}

				//if($res)
				//{
					//foreach($res as $k=>$r)
					//{
						// if($r->projectType == 1)
						// {
					//	 $c = $this->common->getrow('user_meta',array("u_id"=>$r->clientId));
						 // $p = $this->common->getrow('user_job',array("jobId"=>$r->projectId));
					//	 $res[$k]->client = $c->name;
						 // $res[$k]->project = $p->jobTitle;
					  // }
						// else
						// {
						// 	$c = $this->common->getrow('project',array("projectId"=>$r->clientId));
						// 	if(!empty($c))
						// 	{
						// 	$res[$k]->client = $c->clientName;
						// 	$res[$k]->project = $c->projectName;
						//   }
						// }
					//}
				//}

				if($res)
				 {
					foreach($res as $k => $v)
					{
						if(!isset($result[$v->monthnumber]))
						{
						 $result[$v->monthnumber]['month'] = $v->month;
						 $result[$v->monthnumber]['income'][] = $v;
						}
						else
						{
							$result[$v->monthnumber]['month'] = $v->month;
							$result[$v->monthnumber]['income'][] = $v;
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

		 public function getCurrentMonthIncome()
		 {
			  $array = file_get_contents('php://input');
				$results =json_decode($array);
				$page = $results->page;
				$config = array();
				$startdate ='';
				$enddate ='';
				$project = '';
				$client = '';
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
					$userId = $user->id;
				}
				else
				{
					$userId = $this->session->userdata['clientloggedin']['id'];

				}
				if(!empty($results->startdate))
				{
        $startdate = date("Y-m-d", strtotime($results->startdate));
			  }
				if(!empty($results->enddate))
				{
        $enddate = date("Y-m-d", strtotime($results->enddate));
			  }
				if(!empty($results->sclient))
				{
        $client = $results->sclient;
			  }

				if(!empty($results->sproject))
				{
        $project = $results->sproject;
			  }


				$result = array();

				if(!empty($page))
				{
					if($user->parent == 0)
					{
					 $data['pcount'] = $this->common->count_allincome(array("userId"=>$userId),$startdate,$enddate,$client,$project);
					 $config["total_rows"] = $this->common->count_allincome(array("userId"=>$userId),$startdate,$enddate,$client,$project);
				  }
					else
					{
					 $data['pcount'] = $this->common->count_allincome(array("employeeId"=>$userId),$startdate,$enddate,$client,$project);
				 	 $config["total_rows"] = $this->common->count_allincome(array("employeeId"=>$userId),$startdate,$enddate,$client,$project);
					}
				}

				$config["per_page"] = $results->perpage;
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
					$result = $this->common->allincome(array("userId"=>$userId),$startdate,$enddate,$client,$project,$start,$config["per_page"]);
					$total = $this->common->sum_income_paid_amount(array("userId"=>$userId));
					$received = $this->common->sum_income_received_amount(array("userId"=>$userId));
				  }
					else
					{
						$result = $this->common->allincome(array("employeeId"=>$userId),$startdate,$enddate,$client,$project,$start,$config["per_page"]);
						$total = $this->common->sum_income_paid_amount(array("employeeId"=>$userId));
						$received = $this->common->sum_income_received_amount(array("employeeId"=>$userId));
					}
				}

				if($result)
				{
					$data['message'] ="true";
					$data['result'] = $result;
					$data['start'] = $start + 1;
					$data['total'] = number_format($total->total,2); ;
					$data['received'] = number_format($received->total,2);
				}
				else
				{
					$data['message'] ="false";
					$data['result'] = '';
				}

				echo json_encode($data);
				exit;
		 }

		 public function incomeSave()
		 {
		   $array = file_get_contents('php://input');
		   $results =json_decode($array);

			 $results->date = date("Y-m-d", strtotime($results->date));

			 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			 if($user->parent == 0)
			 {
				 $userId = $user->id;
				 $results->userId = $userId;
			 }
			 else
			 {
				 $userId = $user->parent;
				 $results->userId = $userId;
				 $results->employeeId = $this->session->userdata['clientloggedin']['id'];
			 }

		    $res = $this->common->insert('income',$results);

		    if($res)
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

		 public function incomeUpdate()
		 {
		   $array = file_get_contents('php://input');
		   $results =json_decode($array);
       if(!empty($results->date))
			 {
			  $results->date = date("Y-m-d", strtotime($results->date));
			 }

		    $res = $this->common->update(array("incomeId"=>$results->incomeId),$results,'income');

		    if($res)
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

		 public function incomeStatusUpdate()
		 {
		   $array = file_get_contents('php://input');
		   $results =json_decode($array);
       if(!empty($results->date))
			 {
			  $results->date = date("Y-m-d", strtotime($results->date));
			 }
			 if($results->status == 2)
			 {
				 $results->receivedAmount = 0;
				 $results->deposited =0;
				 $results->received =0;
			 }

		    $res = $this->common->update(array("incomeId"=>$results->incomeId),$results,'income');

		    if($res)
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

		 public function deleteincome()
		 {
		  $array = file_get_contents('php://input');
		  $results =json_decode($array);
      $this->db->where('incomeId',$results->id);
		  $query = $this->db->delete('income');

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


		 public function editincome()
		 {
		  $array = file_get_contents('php://input');
		  $results =json_decode($array);

		  $result = $this->common->getrow('income',array("incomeId"=>$results->id));
		  $result->date = date("d-m-Y", strtotime($result->date));

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


		 public function getownerproject()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);

			 $result = $this->common->getActiveOwnProjectDetail(array("projectId"=>$results->projectId));
			 if($result)
			 {
				 $output['success'] = "true";
				 $output['result'] = $result;
			 }
			 else
			 {
				 $output['success'] = "false";
				 $output['result'] = "";
			 }
			 echo json_encode($output);
			 exit;

		 }

		 public function getmilestone()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);

			 if($results->type == 1)
			 {
			  $result = $this->common->get('todoList',array("contractId"=>$results->id,"milestone"=>1));
		   }
			 else if($results->type == 2)
			 {
			  $result = $this->common->get('todoList',array("projectId"=>$results->id,"milestone"=>1));
			 }
			 // else if($results->type == 3)
			 // {
			 //  $result = $this->common->get('todoList',array("gigId"=>$results->id,"milestone"=>0));
			 // }

			 if($result)
			 {
				 $output['success'] = "true";
				 $output['type'] = $results->type;
				 $output['result'] = $result;
			 }
			 else
			 {
				 $output['success'] = "false";
				 $output['result'] = "";
			 }
			 echo json_encode($output);
			 exit;

		 }

		 public function netsalarySave()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			 $date = $nowUtc->format('Y-m-d H:i:s');
			 if(empty($results->date))
			 {
       $results->date = $date;
		   }

			 $res = $this->common->getrow('user_net_salary',array("userId"=>$results->userId,"MONTH(date)"=>date("m")));
			 if(empty($res))
			 {
			   $result = $this->common->insert('user_net_salary',$results);
		   }
			 else
			 {
				 $result = $this->common->update(array("id"=>$res->id),$results,'user_net_salary');

			 }
			 if($result)
			 {
			  $output['success'] = "true";
			  $output['message'] = 'Net Salary Added Successfully';
			 }
			 else
			 {
			 $output['success'] = "false";
			 $output['message'] = "Net Salary Not Added";
			 }
			 echo json_encode($output);
			 exit;
		 }

		 public function jobopening()
		 {
       $data['title'] ="Create A New Job Opportunities For Your Business";
       $this->load->view('freelancer/header',$data);
       $this->load->view('freelancer/jobopening');
       $this->load->view('freelancer/footer');
		 }

		 public function getjobOpening()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $page = $results->page;
			 $config = array();

			 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			 if(!empty($page))
			 {
					$data['pcount'] = $this->common->count_all_results('vacancy',array("userId"=>$user->parent));
					$config["total_rows"] = $this->common->count_all_results('vacancy',array("userId"=>$user->parent));
			 }

			 $config["per_page"] = $results->perpage;
			 $this->pagination->initialize($config);

			 if( $page <= 0 )
			 {
				 $page = 1;
			 }

			 $start = ($page-1) * $config["per_page"];

			 if(!empty($page))
			 {
				 $res = $this->common->getjobOpening(array("userId"=>$user->parent),$start,$config["per_page"]);
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

		 public function openingSave()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);

			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			 $date =  $nowUtc->format('Y-m-d');
			 $user = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));
			 $results->userId = $user->parent;
			 $results->date = $date;

			 $u = $this->common->insert('vacancy',$results);

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

		 public function deleteOpening()
		 {
		  $array = file_get_contents('php://input');
		  $results =json_decode($array);
      $this->db->where('vacancyId',$results->id);
		  $query = $this->db->delete('vacancy');
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

		 public function editOpening()
		{
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		 $result = $this->common->getrow('vacancy',array("vacancyId"=>$results->id));

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

		public function openingUpdate()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
      $res = $this->common->update(array("vacancyId"=>$results->vacancyId),$results,'vacancy');

			 if($res)
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

		public function recruitment()
		{
      $data['title'] ="Add Candidate Details | Creating Candidate Records";
			$this->load->view('freelancer/header',$data);
			$this->load->view('freelancer/recruitment');
			$this->load->view('freelancer/footer');
		}

		public function getrecruitment()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;
			if(!empty($results->search))
			{
				$search = $results->search;
			}
			else
			{
				$search = '';
			}
			if($results->candidateStatus != '')
			{
				$status = $results->candidateStatus;
			}
			else
			{
				$status = '';
			}
			$config = array();

			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if(!empty($page))
			{
				if($search == '' && $status == '')
				 {
				 $data['pcount'] = $this->common->count_all_hr_candidate('candidate',array("userId"=>$user->parent,"type"=>1));
				 $config["total_rows"] = $this->common->count_all_hr_candidate('candidate',array("userId"=>$user->parent,"type"=>1));
			   }
				 else
				 {
					 $data['pcount'] = $this->common->count_candidate_like(array("userId"=>$user->parent,"type"=>1),$search,$status);
					 $config["total_rows"] = $this->common->count_candidate_like(array("userId"=>$user->parent,"type"=>1),$search,$status);
				 }
			}

			$config["per_page"] = $results->perpage;
			$this->pagination->initialize($config);

			if( $page <= 0 )
			{
				$page = 1;
			}

			$start = ($page-1) * $config["per_page"];

			if(!empty($page))
			{
				if($search == '' && $status == '')
				 {
				$res = $this->common->getrecruitment(array("userId"=>$user->parent,"type"=>1),$start,$config["per_page"]);
			   }
				 else
				 {
					 $res = $this->common->getrecruitmentLike(array("userId"=>$user->parent,"type"=>1),$search,$status,$start,$config["per_page"]);
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

		public function recruitmentSave()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			$results->userId = $user->parent;
			$results->candidateDateOfBirth = date("Y-m-d", strtotime($results->candidateDateOfBirth));

			$insert = $this->common->insert('candidate',$results);
			if($insert)
			{
				$output['message'] ="true";
      }
			else
			{
				$output['message'] ="false";
			}
			echo json_encode($output);
			exit;
		}

		public function deleteRecruitment()
		{
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $this->db->where('candidateId',$results->id);
		 $query = $this->db->delete('candidate');
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

		public function editRecruitment()
	 {
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->getrow('candidate',array("candidateId"=>$results->id));
		$c = $this->common->getrow('currency',array("id"=>$result->currencyId));
		if(!empty($c))
		{
		$result->code = $c->code;
		$result->symbol = $c->symbol;
		}
		if(!empty($result->candidateDateOfBirth))
		{
		$result->candidateDateOfBirth = date("d-m-Y", strtotime($result->candidateDateOfBirth));
	  }
		else
		{
			$result->candidateDateOfBirth = '';
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

	 public function recruitmentUpdate()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		 $results->userId = $user->parent;
		 $results->candidateDateOfBirth = date("Y-m-d", strtotime($results->candidateDateOfBirth));
		 if($results->candidateStatus == 1)
		 {
			 $results->type = 1;
		 }
		 else if($results->candidateStatus == 0)
		 {
			 $results->type = 1;
		 }

		 $insert = $this->common->update(array("candidateId"=>$results->candidateId),$results,'candidate');

		 if($results->candidateStatus == 1)
		 {
			 $check = $this->common->getrow('interview',array("candidateId"=>$results->candidateId));
			 $candidate = $this->common->getrow('candidate',array("candidateId"=>$results->candidateId));
			 if(empty($check))
	 		 {
	 			$this->common->insert('interview',array("userId"=>$candidate->userId,"candidateId"=>$results->candidateId,"vacancyId"=>$candidate->vacancyId,"interviewStatus"=>0));
	 		 }
		 }

		 if($insert)
		 {
			 $output['message'] ="true";
			}
		 else
		 {
			 $output['message'] ="false";
		 }
		 echo json_encode($output);
		 exit;
	 }

	 public function requritementCV()
	 {
	 		$array = file_get_contents('php://input');
	 		$results =json_decode($array);
	 		$data = $results->image;
			$name = $results->name;

	 		list($type, $data) = explode(';', $data);
	 		list(, $data)      = explode(',', $data);
      $data1 = base64_decode($data);
      $f = finfo_open();

	 		$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);

	 		// if($mime_type =="image/png")
	 		// {
	 			echo $image = $name;
	 			$result = file_put_contents('assets/candidateCv/'.$image,$data1);
				exit;

	 		// }
	 		// else if($mime_type =="image/jpeg")
	 		// {
			// 	echo $image = $name;
	 		// 	$result=file_put_contents('assets/candidateCv/'.$image,$data1);
			//
	 		// }
	 		// else if($mime_type =="application/pdf")
	 		// {
	 		// 	// echo $image = uniqid().'cv.pdf';
			// 	echo $image = $name;
	 		// 	$result=file_put_contents('assets/candidateCv/'.$image,$data1);
			//
	    //  }
	 		// else if($mime_type == "text/plain")
	 		// {
	 		// 	// echo $image = uniqid().'cv.text';
			// 	echo $image = $name;
	 		// 	$result=file_put_contents('assets/candidateCv/'.$image,$data1);
	 		// }
	 		// else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
	 		// {
	 		// 	// echo	 $image = uniqid().'cv.xlsx';
			// 	echo $image = $name;
	 		// 	$result=file_put_contents('assets/candidateCv/'.$image,$data1);
	 		// }
			// else if($mime_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
			// {
			// 	// echo	 $image = uniqid().'cv.docx';
			// 	echo $image = $name;
	 		// 	$result=file_put_contents('assets/candidateCv/'.$image,$data1);
			// }
	 }

	 public function getouterCandidate()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;
		 if(!empty($results->search))
		 {
			 $search = $results->search;
		 }
		 else
		 {
			 $search = '';
		 }
		 $config = array();

		 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		 if(!empty($page))
		 {
			 // if($search == '')
				// {
				$data['pcount'] = $this->common->count_all_hr_candidate('candidate',array("userId"=>$user->parent,"candidateStatus"=>2,"type"=>0));
				$config["total_rows"] = $this->common->count_all_hr_candidate('candidate',array("userId"=>$user->parent,"candidateStatus"=>2,"type"=>0));
				// }
				// else
				// {
				// 	$data['pcount'] = $this->common->count_candidate_like(array("userId"=>$user->parent,"candidateStatus"=>2),$search);
				// 	$config["total_rows"] = $this->common->count_candidate_like(array("userId"=>$user->parent,"candidateStatus"=>2),$search);
				// }
		 }

		 $config["per_page"] = $results->perpage;
		 $this->pagination->initialize($config);

		 if( $page <= 0 )
		 {
			 $page = 1;
		 }

		 $start = ($page-1) * $config["per_page"];

		 if(!empty($page))
		 {
			 // if($search == '')
				// {
			 $res = $this->common->getouterCandidate(array("userId"=>$user->parent,"candidateStatus"=>2,"type"=>0),$start,$config["per_page"]);
				// }
				// else
				// {
				// 	$res = $this->common->getrecruitmentLike(array("userId"=>$user->parent,"candidateStatus"=>2),$search,$start,$config["per_page"]);
				// }
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

	 public function interview()
	 {
		   $data['title'] = "Job Interview Scheduling System | Applicant Tracking System";
		   $this->load->view('freelancer/header',$data);
			 $this->load->view('freelancer/interview');
			 $this->load->view('freelancer/footer');

	 }

 	public function getinterview()
 	{
 		$array = file_get_contents('php://input');
 		$results =json_decode($array);
 		$page = $results->page;
		$position = '';
		$date = '';
		$status = '';
		if(!empty($results->position))
		{
			$position = $results->position;
		}
		if($results->status != '')
		{
			$status = $results->status;
		}
		if(!empty($results->date))
		{
			$date = date("Y-m-d", strtotime($results->date));
		}

 		$config = array();

 		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
		  $userid = $user->parent;
		}
 		if(!empty($page))
 		{
 			 $data['pcount'] = $this->common->count_interview(array("i.userId"=>$userid,"c.candidateStatus"=>1),$position,$status,$date);
 			 $config["total_rows"] = $this->common->count_interview(array("i.userId"=>$userid,"c.candidateStatus"=>1),$position,$status,$date);
 		}

 		$config["per_page"] = $results->perpage;
 		$this->pagination->initialize($config);

 		if( $page <= 0 )
 		{
 			$page = 1;
 		}

 		$start = ($page-1) * $config["per_page"];

 		if(!empty($page))
 		{
 			$res = $this->common->getinterview(array("i.userId"=>$userid,"c.candidateStatus"=>1),$position,$status,$date,$start,$config["per_page"]);
 		}

		if(!empty($res))
		{
			foreach($res as $k=>$r)
			{
				$res[$k]->interviewer = $this->common->getinterviwer(array("i.interviewId"=>$r->interviewId));
				if(!empty($r->joiningDate))
				{
				$res[$k]->joiningDate = date('d-m-Y',strtotime($r->joiningDate));
			  }
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

	public function allopening()
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
		  $userid = $user->parent;
		}
 		$result = $this->common->allopening('vacancy',array("userId"=>$userid,"vacancyStatus"=>1));
		if($result)
		{
			$data['message'] = "true";
			$data['result'] = $result;
		}
		else
		{
			$data['message'] = "false";
		}
		echo json_encode($data);
		die;
  }


		public function allcandidate()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
				$userid = $user->parent;
			}
      $a = array();
			$allinterview = $this->common->get('interview',array("userId"=>$userid));
			if(!empty($allinterview))
			{
				foreach($allinterview as $all)
				{
					$a[] = $all->candidateId;
				}
			}

	 		$result = $this->common->allcandidate($userid,$a);

			if($result)
			{
				$data['message'] = "true";
				$data['result'] = $result;
			}
			else
			{
				$data['message'] = "false";
			}
			echo json_encode($data);
			die;
	  }
		public function allcandidate1()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
				$userid = $user->parent;
			}


	 		$result = $this->common->get('candidate',array("userId"=>$userid));

			if($result)
			{
				$data['message'] = "true";
				$data['result'] = $result;
			}
			else
			{
				$data['message'] = "false";
			}
			echo json_encode($data);
			die;
	  }

		public function allteam()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
				$userid = $user->parent;
			}
			$result = $this->common->allteam(array("us.parent"=>$userid));
			if(!empty($result))
			{
				foreach($result as $key=>$r)
				{
					$result[$key]->joiningdate = date("d-m-Y", strtotime($r->joiningdate));
				}
			}

			if($result)
			{
				$data['message'] = "true";
				$data['result'] = $result;
			}
			else
			{
				$data['message'] = "false";
			}
			echo json_encode($data);
			Exit;
		}

		public function allteam1()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
				$userid = $user->parent;
			}
			$result = $this->common->allteam(array("us.parent"=>$userid));
			$res = $this->common->allteam(array("us.id"=>$userid));
			if(!empty($result))
			{
				foreach($result as $key=>$r)
				{
					$result[$key]->joiningdate = date("d-m-Y", strtotime($r->joiningdate));
				}
			}

			$result1 = array_merge($result,$res);


			if($result1)
			{
				$data['message'] = "true";
				$data['result'] = $result1;
			}
			else
			{
				$data['message'] = "false";
			}
			echo json_encode($data);
			Exit;
		}

		public function interviewSave()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d');

			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
			  $userid = $user->parent;
			}
			$results->userId = $userid;
			$interviewer = $results->interviewer;
			unset($results->interviewer);
			$results->interviewDate = date("Y-m-d", strtotime($results->interviewDate));
      $check = $this->common->getrow('interview',array("candidateId"=>$results->candidateId,"interviewDate"=>$results->interviewDate,"userId"=>$results->userId));
			if(!empty($check))
			{
        $output['already'] ="true";
			}
			else
			{
			$insert = $this->common->insert('interview',$results);
			if($insert)
			{
				foreach($interviewer as $i)
	 			{
					$in['userId'] = $i->userId;
					$in['interviewId'] = $insert[1];

					$this->common->insert('interview_interviewer',$in);

				$a['notificationTo'] = $i->userId;
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;
				$url = $this->session->userdata['clientloggedin']['url'];
				$aurl = $this->session->userdata['clientloggedin']['aurl'];
				$main = base_urL().'interviewfeedback/'.$url.'/'.$aurl;
				$a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
				$a['notificationStatus'] = 0;
				$a['notificationType'] = "interview";
				$a['notificationMessage'] = "You have a new notification of <b>interview</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				$a['notificationDate'] = $date;
				$this->notificationSave($a);

				}
			}
			if($insert)
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

		public function deleteinterview()
		{
			$array = file_get_contents('php://input');
 		 $results =json_decode($array);
 		 $this->db->where('interviewId',$results->id);
 		 $query = $this->db->delete('interview');
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

		public function editInterview()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$result = $this->common->getrow('interview',array("interviewId"=>$results->id));
			if(!empty($result->interviewDate) && $result->interviewDate != 0000-00-00)
			{
			$result->interviewDate = date("d-m-Y", strtotime($result->interviewDate));
		  }
			else
			{
			 $result->interviewDate ='';
			}
			$result->interviewer = $this->common->getinterviwer(array("i.interviewId"=>$results->id));
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

		 public function interviewUpdate()
		 {
			 $array = file_get_contents('php://input');
 			 $results =json_decode($array);
			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			 $date =  $nowUtc->format('Y-m-d H:i:s');
			 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
 			if($user->parent == 0)
 			{
 			 $userid = $user->id;
 			}
 			else
 			{
 			  $userid = $user->parent;
 			}

			 $interviewer = $results->interviewer;
		   unset($results->interviewer);
       $results->interviewDate = date("Y-m-d", strtotime($results->interviewDate));
       $update = $this->common->update(array("interviewId"=>$results->interviewId),$results,'interview');
			 if($update)
 			{
				if(!empty($interviewer))
				{
				$this->common->delete('interview_interviewer',array("interviewId"=>$results->interviewId));
 				 foreach($interviewer as $i)
 	 			 {
 					$in['userId'] = $i->userId;
 					$in['interviewId'] = $results->interviewId;
 					$in['feedBack'] = $i->feedBack;
 					$this->common->insert('interview_interviewer',$in);
 				 }
			  }

        if($results->interviewStatus == 5)
				{
					$candidate = $this->common->getrow('candidate',array("candidateId"=>$results->candidateId));
					$vaccany = $this->common->common->getrow('vacancy',array("vacancyId"=>$results->vacancyId));

					$m =$candidate->candidateName." hired as a ".$vaccany->vacancyPosition;
				  $Notificationdata = array(
					"notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
					"notificationTo" =>$userid,
					"notificationMessage" => $m,
					"notificationDate" => $date,
					"notificationStatus" => 0,
					"notificationDeleted" =>0,
				);
				$notification = $this->common->insert('user_notification',$Notificationdata);

		   if($results->mailSend == 0)
			 {
				$hr = $this->common->getSingleUser(array("us.parent"=>$userid,"us.access"=>5));
				$company = $this->common->getrow('user_meta',array("u_id"=>$userid));
				$vacancy = $this->common->getrow('vacancy',array("vacancyId"=>$results->vacancyId));
				$department = $this->common->getrow('department',array("id"=>$vacancy->departmentId));
	 			$detail['name']  = $candidate->candidateName;
	 			$detail['company']  = $company->c_name;
	 			$detail['hr']  = $hr->name;
				if(!empty($department))
				{
				$detail['department'] = $department->department;
			  }
				else
				{
					$detail['department'] = '';
				}
	 			$detail['vacancyPosition']  = $vacancy->vacancyPosition;
	 			$message = $this->load->view('email/hiredCandidate',$detail,true);
	 			$mail =	 $this->mailsend('Hired',$candidate->candidateEmail,$message);
				$this->common->update(array('interviewId'=>$results->interviewId),array("mailsend"=>1),'interview');
			}

					if(!empty($va))
				  {
						$check =  $this->common->getrow('vacancyStatus',array("vacancyId"=>$results->vacancyId,"interviewId"=>$results->interviewId));
					  if(empty($check))
						{
							$this->common->common->insert('vacancyStatus',array("interviewId"=>$results->interviewId,"vacancyId"=>$results->vacancyId));
							$positions = $va->vacancyNoOfOpening - 1;
							$this->common->update(array("vacancyId"=>$results->vacancyId),array("vacancyNoOfOpening"=>$positions),'vacancy');
						}
				  }
			  }
 			}

			 if($update)
 			 {
 				 $output['message'] ="true";
        }
 			 else
 			 {
 				 $output['message'] ="false";
 			 }
 			echo json_encode($output);
 			exit;
		 }

		 public function viewinterview()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $result = array();

			 $result = $this->common->getoneInterview(array("i.interviewId"=>$results->id));
			 if($result->interviewDate == "0000-00-00")
			 {
				 $result->interviewDate ='';
			 }

			 $result->interviewer = $this->common->getinterviwer(array("i.interviewId"=>$results->id));

			 if($result)
			 {
					$output['message'] ="true";
					$output['result'] =$result;
				}
				else
				{
					$output['message'] ="false";
					$output['result'] ="";
				}
			 echo json_encode($output);
			 exit;
		 }

		 public function interviewfeedback()
		 {
			 $data['title'] ="Give Interview Feedback About The Candidates";
			 $this->load->view('freelancer/header',$data);
			 $this->load->view('freelancer/interviewFeedback');
			 $this->load->view('freelancer/footer');
		 }

		 public function getinterviewfeedback()
		 {
			   $array = file_get_contents('php://input');
				 $results =json_decode($array);
				 $page = $results->page;
				 $config = array();

				 $data['pcount'] = $this->common->count_all_results('interview',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));
				 $config["total_rows"] = $this->common->count_all_results('interview',array("employeeId"=>$this->session->userdata['clientloggedin']['id']));


				 $config["per_page"] = 10;
				 $this->pagination->initialize($config);

				 if( $page <= 0 )
				 {
					 $page = 1;
				 }

				 $start = ($page-1) * $config["per_page"];

				 if(!empty($page))
				 {
					 $res = $this->common->getinterview(array("i.employeeId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
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

		 public function getemployee_previousMonthSalary()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $page = $results->page;

			 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			 if($user->parent == 0)
			 {
			  $userid = $user->id;
			 }
			 else
			 {
			   $userid = $user->parent;
			 }
       $result = $this->common->get('user',array("parent"=>$userid));
			 $ids = array();
			 $timing = $this->common->getrow('workingHours',array("userId"=>$userid));

			 if(!empty($result))
			 {
				 foreach($result as $key=>$res)
				 {
           $ids[] = $res->id;
				 }
			 }

			 $data['pcount'] = $this->common->countMonthdsrHours($ids);
			 $config["total_rows"] = $this->common->countMonthdsrHours($ids);

			 $config = array();
			 $config["per_page"] = 10;
			 $this->pagination->initialize($config);

			 if( $page <= 0 )
			 {
				 $page = 1;
			 }

			 $start = ($page-1) * $config["per_page"];
       $dsr = $this->common->AllMonthdsrHours($ids,$start,$config["per_page"]);
       if(!empty($dsr))
			 {
				 foreach($dsr as $key=>$d)
				 {
					  $leave = $this->common->getCountemployeeleave(array('user_leave',"employeeId"=>$d->u_id,"l.status"=>1,"MONTH(date)"=>$d->m,"Year(date)"=>$d->y));
					  $customSalary = $this->common->getrow('user_net_salary',array("userId"=>$d->u_id,"MONTH(date)"=>$d->m));
					  $le = array();

					  // $msalary = $d->perday / $timing->workingHour ;
					  // $msalary = $d->perHour;
					  $d->total = $d->total / 60;
						// $mintsalary = round($mintsalary, 2);

					 $netsalary = $d->perHour * $d->total;
					 // $netsalary = $mintsalary * $d->total;
					 $dsr[$key]->netsalary = round($netsalary, 2);
					 if(!empty($customSalary))
					 {
					 $dsr[$key]->customSalary = $customSalary->netsalary;
					 }
					 else
					 {
						 $dsr[$key]->customSalary = '';
					 }

					 if($res)
						{
						 foreach($leave as $k => $v)
						 {
							 if(!isset($le[$v->typename]))
							 {
								 $le[$v->typename]['leavecount'] = 0;
								 if($v->totalleave == 0)
								 {
								 $le[$v->typename]['leavecount'] += 1;
								 }
								 else
								 {
									 $le[$v->typename]['leavecount'] += $v->totalleave;
								 }
							 }
								else
								{
									if($v->totalleave == 0)
									{
									$le[$v->typename]['leavecount'] += 1;
									}
									else
									{
										$le[$v->typename]['leavecount'] += $v->totalleave;
									}

								 }
							}
					 }

						 $dsr[$key]->leave = $le;
					 }
	      }
        $results = array();
				if($dsr)
				{
					foreach($dsr as $k => $v)
					{
						if(!isset($results[$v->m]))
						{
						 $results[$v->m]['month'] = $v->month;
						 $results[$v->m]['year'] = $v->y;
						 $results[$v->m]['data'][] = $v;
						}
						else
						{
							$results[$v->m]['month'] = $v->month;
							$results[$v->m]['year'] = $v->y;
							$results[$v->m]['data'][] = $v;
						 }
					 }
				 }

       if($results)
			  {
				  $msg['message'] = "true";
				  $msg['result'] = $results;
			  }
			  else
			  {
				  $msg['message'] = "false";
				  $msg['result'] = '';
			 }
			  echo json_encode($msg);
			  exit;
			}

			public function expenseSearchDate()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$startdate ='';
				$enddate ='';
				if(!empty($results->startdate))
				{
        $startdate = date("Y-m-d", strtotime($results->startdate));
			  }
				if(!empty($results->enddate))
				{
        $enddate = date("Y-m-d", strtotime($results->enddate));
			  }
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent != 0)
				{
					$userid = $user->parent;
				}
				else
				{
					$userid = $user->id;
				}
				$result = $this->common->ExpenseSearch(array("userId"=>$userid),$startdate,$enddate,$results->expense);
				if($result)
				{
					$output['message'] ="true";
					$output['result'] = $result;
				}
				else
				{
          $output['message'] ="false";
					$output['result'] = '';
				}
				echo json_encode($output);
			}

			public function incomeSearchdate()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				if(!empty($results->startdate))
				{
        $startdate = date("Y-m-d", strtotime($results->startdate));
			  }
				else
				{
				 $startdate ='';
				}
				if(!empty($results->enddate))
				{
        $enddate = date("Y-m-d", strtotime($results->enddate));
			  }
				else
				{
				 $enddate ='';
				}
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent != 0)
				{
					$userid = $user->parent;
				}
				else
				{
					$userid = $user->id;
				}
				$res = $this->common->IncomeSearch(array("userId"=>$userid),$startdate,$enddate,$results->sclient,$results->sproject);

				// if($res)
				// {
				// 	foreach($res as $k=>$r)
				// 	{
				// 		if($r->projectType == 1)
				// 		{
				// 		 $c = $this->common->getrow('user_meta',array("u_id"=>$r->clientId));
				// 		 $p = $this->common->getrow('user_job',array("jobId"=>$r->projectId));
				// 		 $res[$k]->client = $c->name;
				// 		 $res[$k]->project = $p->jobTitle;
				// 		}
				// 		else
				// 		{
				// 			$c = $this->common->getrow('project',array("projectId"=>$r->clientId));
				// 			$res[$k]->client = $c->clientName;
				// 			$res[$k]->project = $c->projectName;
				// 		}
				// 	}
				// }

				if($res)
				{
					$output['message'] ="true";
					$output['result'] = $res;
				}
				else
				{
          $output['message'] ="false";
					$output['result'] = '';
				}
				echo json_encode($output);
			}

			public function invoiceSearchdate()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$startdate = date("Y-m-d", strtotime($results->startdate));
				$enddate = date("Y-m-d", strtotime($results->enddate));
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent != 0)
				{
					$userid = $user->parent;
				}
				else
				{
					$userid = $user->id;
				}
				$res = $this->common->InvoiceSearch(array("date >"=>$startdate,"date <"=>$enddate,"userId"=>$userid));
				if($res)
				{
					$output['message'] ="true";
					$output['result'] = $res;
				}
				else
				{
					$output['message'] ="false";
					$output['result'] = '';
				}
				echo json_encode($output);
			}


			public function getemployeeinterview()
		 	{
		 		$array = file_get_contents('php://input');
		 		$results =json_decode($array);
		 		$page = $results->page;
		 		$config = array();

		 		if(!empty($page))
		 		{
		 			 $data['pcount'] = $this->common->count_all_results('interview_interviewer',array("userId"=>$this->session->userdata['clientloggedin']['id']));
		 			 $config["total_rows"] = $this->common->count_all_results('interview_interviewer',array("userId"=>$this->session->userdata['clientloggedin']['id']));
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
		 			$res = $this->common->getemployeeinterview(array("int.userId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
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

			public function getemployeeinterviewfeedback()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);

        $result = $this->common->getrow('interview_interviewer',array("interviewId"=>$results->id,"userId"=>$this->session->userdata['clientloggedin']['id']));
				if($result)
				{
					$output['success'] ="true";
					$output['result'] = $result;
				}
				else
				{
					$output['success'] ="false";
					$output['result'] = '';
				}
				echo json_encode($output);
				exit;
			}

		 public function Updateemployeeinterviewfeedback()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $parent =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
	 		if($parent->parent == 0)
	 		{
	 		 $parentId = $parent->id;
	 		}
	 		else
	 		{
	 			$parentId = $parent->parent;
	 		}
			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			 $date =  $nowUtc->format('Y-m-d H:i:s');
			 $result = $this->common->update(array("interviewId"=>$results->interviewId,"userId"=>$this->session->userdata['clientloggedin']['id']),array("feedBack"=>$results->feedBack),'interview_interviewer');
			 if($result)
			 {
				  $hr = $this->common->getrow('user',array("parent"=>$parentId,"access"=>3));
				  $a['notificationTo'] = $hr->id;
	 				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
	 				$lastId = $lastrecord->notificationId;
	 				$lastId = $lastId + 1;
	 				$url = $this->session->userdata['clientloggedin']['url'];
	 				$aurl = $this->session->userdata['clientloggedin']['aurl'];
	 				$main = base_urL().'interview/'.$url.'/'.$aurl;
	 				$a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
	 				$a['notificationStatus'] = 0;
	 				$a['notificationType'] = "interview";
	 				$a['notificationMessage'] = "You have a new notification of <b>interview</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
	 				$a['notificationDate'] = $date;
				 	$this->notificationSave($a);
			 }

			 if($result)
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

			public function searchSalary()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
        $month = date("m", strtotime($results->startdate));
        $year = date("Y", strtotime($results->startdate));

				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
				 $userid = $user->id;
				}
				else
				{
				  $userid = $user->parent;
				}
				$result = $this->common->get('user',array("parent"=>$userid));
				$ids = array();
				$timing = $this->common->getrow('workingHours',array("userId"=>$userid));
         $ids = array();
				if(!empty($result))
				{
					foreach($result as $key=>$res)
					{
						$ids[] = $res->id;
					}
				}
     	  $dsr = $this->common->searchDsr($ids,array("MONTH(d.date)"=>$month,"Year(d.date)"=>$year));

				if(!empty($dsr))
				{
					foreach($dsr as $key=>$d)
					{
						 $leave = $this->common->getCountemployeeleave(array('user_leave',"employeeId"=>$d->u_id,"status"=>1,"MONTH(date)"=>$month,"Year(date)"=>$year));
						 $customSalary = $this->common->getrow('user_net_salary',array("userId"=>$d->u_id,"MONTH(date)"=>$month,"Year(date)"=>$year));
						 $le = array();

						 $msalary = $d->perday / $timing->workingHour ;
						 $mintsalary = $msalary / 60;

						$netsalary = $mintsalary * $d->total;
						$dsr[$key]->netsalary = round($netsalary, 2);
						if(!empty($customSalary))
						{
						$dsr[$key]->customSalary = $customSalary->netsalary;
						}
						else
						{
							$dsr[$key]->customSalary = '';
						}

						if($res)
						 {
							foreach($leave as $k => $v)
							{
								if(!isset($le[$v->typename]))
								{
									$le[$v->typename]['leavecount'] = 0;
									if($v->totalleave == 0)
									{
									$le[$v->typename]['leavecount'] += 1;
									}
									else
									{
										$le[$v->typename]['leavecount'] += $v->totalleave;
									}
								}
								 else
								 {
									 if($v->totalleave == 0)
									 {
									 $le[$v->typename]['leavecount'] += 1;
									 }
									 else
									 {
										 $le[$v->typename]['leavecount'] += $v->totalleave;
									 }

									}
							 }
						}

							$dsr[$key]->leave = $le;
						}
				 }

				if($dsr)
				 {
					 $msg['message'] = "true";
					 $msg['result'] = $dsr;
				 }
				 else
				 {
					 $msg['message'] = "false";
					 $msg['result'] = '';
				}
				 echo json_encode($msg);
				 exit;
			 }

			 public function attendance111()
			 {

				 $data['first'] = date("Y-m-d", strtotime("first day of this month"));
         $data['last'] = date("Y-m-d", strtotime("last day of this month"));
				 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

				 if($user->parent == 0)
				 {
				  $userid = $user->id;
				 }
				 else
				 {
				   $userid = $user->parent;
				 }

				 $data['result'] = $this->common->allteam(array("parent"=>$userid));
				 $holidays = $this->common->getallholidays(array("userId"=>$userid));
				 $workingHours = $this->common->getrow('workingHours',array("userId"=>$userid));
         $day = date("d", strtotime("first day of this month"));
				 $rr = array();
				 $hh = array();
				 $alldsr = array();
				 $le = array();
				 $totall = array();
				 $countl = 0;
				 $countleave = array();
				 $company = array();

				 $f = date("Y-m-d", strtotime("first day of this month"));
				 $l = date("Y-m-d", strtotime("last day of this month"));
				 for($f;$f <= $l;$f++)
				 {
						$company[$f]['total'] = 0;
				 }

				 if(!empty($data['result']))
				 {
					 foreach($data['result'] as $res)
					 {
						 $leaves = $this->common->getemployeeleave(array("l.employeeId"=>$res->u_id,"date >"=>$data['first'],"date1 <"=>$data['last'],"l.status"=>1));
						 $totalleaves = $this->common->getCountemployeeleave(array("l.employeeId"=>$res->u_id,"date >"=>$data['first'],"date1 <"=>$data['last'],"l.status"=>1));
             $dsr = $this->common->onedayDsrCount(array("d.employeeId"=>$res->u_id,"d.date >"=>$data['first'],"d.date <"=>$data['last']));



						 if($leaves)
						 {
							 foreach($leaves as $leave)
							 {
								 $start = $leave->date;
								 $end = $leave->date1;
								 for($start;$start <= $end;$start++)
								 {
									 $le[$res->u_id][$start]['leave'] = $leave->typename;

									 if(!isset($company[$start]['total']))
									 {
                    $company[$start]['total'] += 1;
								   }
									 else
									 {
										 $company[$start]['total'] += 1;
									 }
								 }
							 }
						 }



					if($totalleaves)
					{
						foreach($totalleaves as $k2 => $v1)
						{
							$totall[$res->u_id][$v1->typename]['leavecount'] = 0;

						}
              $countl = 0;
						foreach($totalleaves as $k => $v)
		        {
              if($v->duration == $workingHours->workingHour )
							{
								 $countl += $v->totalleave + 1;
							}
							else if($v->duration == $workingHours->workingHour / 2)
							{
								$countl +=  0.5;
							}
							else
							{
								$countl += 0.25;
							}
							$countleave[$res->u_id]['countleave'] = $countl;
		          if(!isset($le[$res->u_id][$v->typename]))
		          {
		           	$totall[$res->u_id][$v->typename]['leavecount'] += $v->totalleave + 1;
		          }
		          else
		          {
								$totall[$res->u_id][$v->typename]['leavecount'] += $v->totalleave + 1;
		           }
		         }
					}




         if(!empty($dsr))
				 {
						 foreach($dsr as $ds)
						 {
							 if(!empty($ds->total != 0))
		 					 {
		 					   $hours = floor($ds->total / 60);
		 	 	         $minutes = ($ds->total % 60);
		 	 			     $time = $hours.':'.$minutes;
		 				    }
		 					 else
							  {
		 						 $time = '0';
								 $countleave[$res->u_id]['countleave'] += 1;
		 					  }

								$alldsr[$res->u_id][$ds->date]['time'] = $time;
						   }
					   }
          }


			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$cur =  $nowUtc->format('Y-m-d');
			$f = date("Y-m-d", strtotime("first day of this month"));
			for($f;$f <= $cur;$f++)
			{
				$dayOfWeek = date("l", strtotime($f));
				if($dayOfWeek != "Sunday" && $dayOfWeek != "Saturday")
				{
	        foreach($data['result'] as $res)
	       {
					 if(empty($countleave[$res->u_id]['countleave']))
					 {
					 $countleave[$res->u_id]['countleave'] = 0;
				   }
			   $dsr = $this->common->onedayDsrCount(array("d.employeeId"=>$res->u_id,"d.date >"=>$f));

				  if(!empty($dsr))
				  {

				  }
					else
					{
            $countleave[$res->u_id]['countleave'] = $countleave[$res->u_id]['countleave'] + 1;
						$company[$f]['total'] += 1;
						$le[$res->u_id][$f]['leave'] = 'Leave';
					}
         }
			 }
			}

					 if(!empty($le))
					 {
					 $data['leaves'] = $le;
				   }

					 $data['countleave'] = $countleave;
					 $data['company'] = $company;
					 $data['totalemployee'] = count($data['result']);



					 if(!empty($alldsr))
           {
						 $data['dsr'] = $alldsr;
					 }

				 }

				 if(!empty($holidays))
				 {
           foreach($holidays as $r)
					 {
						 $rr[] = $r->date;
						 $hh[$r->date] = $r->title;
					 }
					 $data['holidaydate'] = $rr;
					 $data['holidays'] = $hh;
				 }
				 if($totall)
				 {
					 $data['totall'] = $totall;
				 }

				 $t['title'] = "Employee Attendance Tracker | Employee Attendance Record";

				 $this->load->view('freelancer/header',$t);
         $this->load->view('freelancer/attendance',$data);
         $this->load->view('freelancer/footer');
			 }

			 public function getzones()
			 {
				 $zones_array = array();
				 $timestamp = time();
				 $default_timezone = date_default_timezone_get();
				 foreach (timezone_identifiers_list() as $key => $zone)
				{
				 date_default_timezone_set($zone);
				 $zones_array[$key]['zone'] = $zone;
				 $zones_array[$key]['diff_from_GMT'] = date('P', $timestamp);
					}
					date_default_timezone_set($default_timezone);


				 if($zones_array)
				 {
					 $output['message'] ="true";
					 $output['result'] =$zones_array;
				 }
				 else
				 {
					 $output['message'] ="false";
				 }
				 echo json_encode($output);
				 exit;
			 }

			public function searchattendance($first,$last)
			{
        $data = array();
				$data['first'] = date("Y-m-d",strtotime($first));
				$data['last'] = date("Y-m-d",strtotime($last));

				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

				if($user->parent == 0)
				{
				 $userid = $user->id;
				}
				else
				{
				  $userid = $user->parent;
				}

				$data['result'] = $this->common->allteam(array("parent"=>$userid));
			  $holidays = $this->common->getallholidays(array("userId"=>$userid));
				$workingHours = $this->common->getrow('workingHours',array("userId"=>$userid));
				$day = date("d", strtotime("first day of this month"));
				$rr = array();
				$hh = array();
				$alldsr = array();
				$le = array();
				$totall = array();
				$countl = 0;
				$countleave = array();
				$company = array();

				$f = date("Y-m-d", strtotime("first day of this month"));
				$l = date("Y-m-d", strtotime("last day of this month"));
				for($f;$f <= $l;$f++)
				{
					 $company[$f]['total'] = 0;
				}

				if(!empty($data['result']))
				{
					foreach($data['result'] as $res)
					{

						$leaves = $this->common->getemployeeleave(array("l.employeeId"=>$res->u_id,"date >"=>$data['first'],"date1 <"=>$data['last'],"status"=>1));
						$totalleaves = $this->common->getCountemployeeleave(array("l.employeeId"=>$res->u_id,"date >"=>$data['first'],"date1 <"=>$data['last'],"status"=>1));
						$dsr = $this->common->onedayDsrCount(array("d.employeeId"=>$res->u_id,"d.date >"=>$data['first'],"d.date <"=>$data['last']));


						if($leaves)
						{
							foreach($leaves as $leave)
							{
								$start = $leave->date;
								$end = $leave->date1;
								for($start;$start <= $end;$start++)
								{
									$le[$res->u_id][$start]['leave'] = $leave->typename;

									if(!isset($company[$start]['total']))
									{
									 $company[$start]['total'] += 1;
									}
									else
									{
										$company[$start]['total'] += 1;
									}
								}
							}
						}



				 if($totalleaves)
				 {
					 foreach($totalleaves as $k2 => $v1)
					 {
						 $totall[$res->u_id][$v1->typename]['leavecount'] = 0;

					 }
						 $countl = 0;
					 foreach($totalleaves as $k => $v)
					 {

						 if($v->duration == $workingHours->workingHour )
						 {
								$countl += $v->totalleave + 1;
						 }
						 else if($v->duration == $workingHours->workingHour / 2)
						 {
							 $countl +=  0.5;
						 }
						 else
						 {
							 $countl += 0.25;
						 }


						 $countleave[$res->u_id]['countleave'] = $countl;


						 if(!isset($le[$res->u_id][$v->typename]))
						 {
							 $totall[$res->u_id][$v->typename]['leavecount'] += $v->totalleave + 1;
						 }
						 else
						 {
							 $totall[$res->u_id][$v->typename]['leavecount'] += $v->totalleave + 1;
							}
						}
				 }



				if(!empty($dsr))
				{
					 foreach($dsr as $ds)
					 {
							if(!empty($ds->total != 0))
							{
								$hours = floor($ds->total / 60);
								$minutes = ($ds->total % 60);
								$time = $hours.':'.$minutes;
							 }
							else
							 {
								$time = '0';
							 }

							 $alldsr[$res->u_id][$ds->date]['time'] = $time;
						}
					}
			 }

			 $f = date("Y-m-d", strtotime("first day of this month"));
			 $cur = date("Y-m-d", strtotime("last day of this month"));
 			for($f;$f <= $cur;$f++)
 			{
 				$dayOfWeek = date("l", strtotime($f));
 				if($dayOfWeek != "Sunday" && $dayOfWeek != "Saturday")
 				{
 	        foreach($data['result'] as $res)
 	       {
 					 if(empty($countleave[$res->u_id]['countleave']))
 					 {
 					 $countleave[$res->u_id]['countleave'] = 0;
 				   }
 			   $dsr = $this->common->onedayDsrCount(array("d.employeeId"=>$res->u_id,"d.date >"=>$f));

 				  if(!empty($dsr))
 				  {

 				  }
 					else
 					{
             $countleave[$res->u_id]['countleave'] = $countleave[$res->u_id]['countleave'] + 1;
 						$company[$f]['total'] += 1;
 						$le[$res->u_id][$f]['leave'] = 'Leave';
 					}
          }
 			 }
 			}

					if(!empty($le))
					{
					$data['leaves'] = $le;
					}

					$data['countleave'] = $countleave;
					$data['company'] = $company;
					$data['totalemployee'] = count($data['result']);



					if(!empty($alldsr))
					{
						$data['dsr'] = $alldsr;
					}

				}

				if(!empty($holidays))
				{
					foreach($holidays as $r)
					{
						$rr[] = $r->date;
						$hh[$r->date] = $r->title;
					}
					$data['holidaydate'] = $rr;
					$data['holidays'] = $hh;
				}
				if($totall)
				{
					$data['totall'] = $totall;
				}


				$t['title'] = "Employee Attendance Tracker | Employee Attendance Record";

				$this->load->view('freelancer/header',$t);
				$this->load->view('freelancer/attendance',$data);
				$this->load->view('freelancer/footer');
			}

			public function announcement()
			{
				$data['title'] ="Making an Announcement or For Team Announcement ";
				$this->load->view('freelancer/header',$data);
				$this->load->view('freelancer/announcement');
				$this->load->view('freelancer/footer');
			}


		  public function getannouncement()
		  {
			   $array = file_get_contents('php://input');
				 $results =json_decode($array);
				 $page = $results->page;
				 $config = array();
         $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				 if($user->parent == 0)
				 {
				  $userid = $user->id;
				 }
				 else
				 {
				   $userid = $user->parent;
				 }
				 $data['pcount'] = $this->common->count_all_results('announcement',array("userId"=>$userid));
				 $config["total_rows"] = $this->common->count_all_results('announcement',array("userId"=>$userid));


				 $config["per_page"] = $results->perpage;
				 $this->pagination->initialize($config);

				 if( $page <= 0 )
				 {
					 $page = 1;
				 }

				 $start = ($page-1) * $config["per_page"];

				 if(!empty($page))
				 {
					 $res = $this->common->getannouncement(array("userId"=>$userid),$start,$config["per_page"]);
				 }
				 if(!empty($res))
				 {
					 foreach($res as $k=>$r)
					 {
						 $res[$k]->users = $this->common->getannouncementUser(array("a.annId"=>$r->annId));
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


			public function deleteAnnouncement()
			{

			 $array = file_get_contents('php://input');
			 $results =json_decode($array);

			 $query = $this->common->delete('announcement',array("annId"=>$results->id));

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

 			public function announcementSave()
 			{
			 $array = file_get_contents('php://input');
 			 $results =json_decode($array);
			 $selectedEmployee = $results->selectedEmployee;
			 unset($results->selectedEmployee);
			 $parent = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			 if($parent->parent == 0)
			 {
			 $results->userId = $this->session->userdata['clientloggedin']['id'];
		   }
			 else if($parent->parent != 0)
			 {
				 $results->userId = $parent->parent;
			 }
			 $results->annDate = date("Y-m-d",strtotime($results->annDate));

 			 $result = $this->common->insert('announcement',$results);
			 if(!empty($selectedEmployee))
			 {

         foreach($selectedEmployee as $e)
				 {
					 $aa['annId'] = $result[1];
					 $aa['userId'] = $e->id;
					 $sendto = $this->common->insert('announcementSend',$aa);
				 }
			 }

 			 if($result)
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

 			public function editAnnouncement()
 			{
 			  $array = file_get_contents('php://input');
 			  $results =json_decode($array);
        $result = $this->common->getrow('announcement',array("annId"=>$results->id));
				 if(!empty($result))
				 {
		     $users = $this->common->announmentUser(array("a.annId"=>$result->annId));
			   }
				if(!empty($users))
				{
					$result->users = $users;
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
 				 exit;
 		   }

			 public function announcementUpdate()
			 {
				 $array = file_get_contents('php://input');
  			 $results =json_decode($array);
				 $selectedEmployee = $results->selectedEmployee;
				 unset($results->selectedEmployee);
 			   $results->annDate = date("Y-m-d",strtotime($results->annDate));
  			 $result = $this->common->update(array("annId"=>$results->annId),$results,'announcement');

				 $this->common->delete('announcementSend',array("annId"=>$results->annId));

				 if(!empty($selectedEmployee))
				 {


	         foreach($selectedEmployee as $e)
					 {
						 $aa['annId'] = $results->annId;
						 $aa['userId'] = $e->id;
						 $sendto = $this->common->insert('announcementSend',$aa);
					 }
				 }

  			 if($result)
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

			 public function EmployeeSearch()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);
		     $name = $results->name;
				 $parent = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				 if($parent->parent == 0)
				 {
					 $userid = $this->session->userdata['clientloggedin']['id'];
				 }
				 else if($parent->parent != 0)
				 {
				  $userid = $parent->parent;
				 }
				  if(isset($name))
				  {
					  $result = $this->common->employeeSearch('m.name',$name,array("u.parent"=>$userid));
				  }

					if($result)
					{
						$msg['message']="true";
						$msg['result'] = $result;
					}
					else
					{
						$msg['message']="false";
						$msg['result'] = '';
					}
					echo json_encode($msg);
					exit;
			 }

			 public function emp_announcement()
			 {
				 $user = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
				 $data['title'] ="Announcement for ".$user->name." | Employee Announcement";
				 $this->load->view('freelancer/header',$data);
				 $this->load->view('freelancer/emp_announcement');
				 $this->load->view('freelancer/footer');
			 }

			 public function getemp_announcement()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);
				 $page = $results->page;
				 $config = array();
				 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				 $date =  $nowUtc->format('Y-m-d H:i:s');
				 // ,"a.annDate<="=>$date
				 $data['pcount'] = count($this->common->count_user_announcment(array("s.userId"=>$this->session->userdata['clientloggedin']['id'])));
				 $config["total_rows"] = count($this->common->count_user_announcment(array("s.userId"=>$this->session->userdata['clientloggedin']['id'])));


				 $config["per_page"] = 10;
				 $this->pagination->initialize($config);

				 if( $page <= 0 )
				 {
					 $page = 1;
				 }

				 $start = ($page-1) * $config["per_page"];

				 if(!empty($page))
				 {
					 $res = $this->common->get_user_announcment(array("s.userId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
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

			 public function project_payment_detail($id)
			 {
				 $p = $this->common->getrow('project',array("projectId"=>$id));
				 $data['title'] = "Project -".$p->projectName."- Payment Details";
				 $d['projectId'] =$id;
				 $this->load->view('freelancer/header',$data);
				 $this->load->view('freelancer/project_payment_detail',$d);
				 $this->load->view('freelancer/footer');
			 }

			 public function getproject_payment_detail()
			 {
				 $array = file_get_contents('php://input');
 		 		 $results =json_decode($array);

 				$res = $this->common->getrow('project',array("projectId"=>$results->id));
				$totaltime = $this->common->sum_task_time(array("type"=>'2',"projectId"=>$results->id));

				if($totaltime->time != 0)
				{
					 $hours1 = floor($totaltime->time / 60);
					 if($hours1 < 10)
					 {
						 $hours1 = '0'.$hours1;
					 }
					 $minutes1 = ($totaltime->time % 60);
					 if($minutes1 < 10)
					 {
						 $minutes1 = '0'.$minutes1;
					 }
					 $d1 = $hours1.':'.$minutes1;
					 $res->totaltime = $d1;
				}
				else
				{
					$res->totaltime = "00:00";
				}

 				if(!empty($res))
 				{
 					$res->milestone = $this->common->get('todoList',array("projectId"=>$results->id,"milestone"=>1));
 					$c = $this->common->getrow('currency',array("id"=>$res->currency));
 					if(!empty($c))
 					{
 					$res->code = $c->code;
 					$res->symbol = $c->symbol;
 				  }
 		        if($res->countrycode)
 						{
 					   $cc = explode(":",$res->countrycode);
 					   $res->countrycode = $cc[1];
 				     }
 						 else
 						 {
 							 $res->countrycode = '';
 		         }
 				}

 				if(!empty($res->milestone))
 				{
 					foreach($res->milestone as $key=>$m)
 					{
 						$res->milestone[$key]->task = $this->common->get('todoList',array("projectId"=>$results->id,"parent"=>$m->id));
 						 $totala = $this->common->milestoneAmount(array("projectMilestoneId"=>$m->id,"projectId"=>$results->id));
             if(!empty($totala->total))
						 {
						 $res->milestone[$key]->received = $totala->total;
					   }
						 else
						 {
							 $res->milestone[$key]->received = 0;
						 }
 					}
 				}

 				if(!empty($res->milestone))
 				{
 					foreach($res->milestone as $key=>$m)
 					{
 						foreach($m->task as $k=>$t)
 						{
 							 $time = $this->common->sum_todotask_time(array("todoListId"=>$t->id));
 							 if($time->time != 0)
 							 {
 							    $hours = floor($time->time / 60);
 									if($hours < 10)
 									{
 										$hours = '0'.$hours;
 									}
 							    $minutes = ($time->time % 60);
 									if($minutes < 10)
 									{
 										$minutes = '0'.$minutes;
 									}
 							    $d = $hours.':'.$minutes;
 							    $res->milestone[$key]->task[$k]->time = $d;
 							 }
 							 else
 							 {
 							   $res->milestone[$key]->task[$k]->time = "00:00";
 							 }

 						}
 					}
 				}

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



			 public function getInvoicePrefix()
			 {
				 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				 if($user->parent == 0)
				 {
					 $userId = $this->session->userdata['clientloggedin']['id'];
				 }

				 else if($user->parent != 0)
				 {
				  $userId = $user->parent;
				 }
				 $result = $this->common->getrow('user_paymentmethod',array("userId"=>$userId));
				 if($result)
				 {
					 $output['success'] ="true";
					 $output['result'] =$result;
				 }
				 else
				 {
					 $output['success'] ="false";
					 $output['result'] ='';
				 }
				 echo json_encode($output);
				 exit;

			 }

			 public function todoAttachment()
			 {
				 $ctype ='';
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);
				 $data = $results->image;
				 $name = $results->name;
				 list($type, $data) = explode(';', $data);
				 list(, $data)      = explode(',', $data);

				 $data1 = base64_decode($data);

				 $f = finfo_open();

				 $mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);



					 echo $image = $name;
					 $result = file_put_contents('assets/todo/'.$image,$data1);
					//  }
				 // else if($mime_type =="image/jpeg")
				 // {
					//  echo $image=uniqid().'todo.jpeg';
					//  $result=file_put_contents('assets/todo/'.$image,$data1);
				 // }
				 // else if($mime_type =="application/pdf")
				 // {
					//  echo $image = uniqid().'todo.pdf';
					//  $result=file_put_contents('assets/todo/'.$image,$data1);
				 // }
				 // else if($mime_type == "text/plain")
				 // {
					//  echo $image = uniqid().'todo.text';
					//  $result=file_put_contents('assets/todo/'.$image,$data1);
				 // }
				 // else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
				 // {
					//  echo	 $image = uniqid().'todo.xlsx';
					//  $result=file_put_contents('assets/todo/'.$image,$data1);
				 // }
				 // else if($mime_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
				 // {
					//  echo	 $image = uniqid().'todo.docx';
					//  $result=file_put_contents('assets/todo/'.$image,$data1);
				 // }
				 exit;
			 }

			 public function taskAttachment()
			 {
				 $ctype ='';
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
					 echo $image = uniqid().'task.png';
					 $result = file_put_contents('assets/task/'.$image,$data1);
					 }
				 else if($mime_type =="image/jpeg")
				 {
					 echo $image=uniqid().'task.jpeg';
					 $result=file_put_contents('assets/task/'.$image,$data1);
				 }
				 else if($mime_type =="application/pdf")
				 {
					 echo $image = uniqid().'task.pdf';
					 $result=file_put_contents('assets/task/'.$image,$data1);
				 }
				 else if($mime_type == "text/plain")
				 {
					 echo $image = uniqid().'task.text';
					 $result=file_put_contents('assets/task/'.$image,$data1);
				 }
				 else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
				 {
					 echo	 $image = uniqid().'task.xlsx';
					 $result=file_put_contents('assets/task/'.$image,$data1);
				 }
				 exit;
			 }

			 public function performance()
			 {
				 $data['title'] ="Employee Performance Evaluation and 360° Feedback Review";
				 $this->load->view('freelancer/header',$data);
				 $this->load->view('freelancer/performance');
				 $this->load->view('freelancer/footer');
			 }

			 public function getperformance()
			 {
				 $array = file_get_contents('php://input');
				 $results =json_decode($array);
				 $page = $results->page;
				 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				 $date =  $nowUtc->format('Y-m-d');
				 $config = array();
				 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				 if($user->parent == 0)
				 {
				  $userid = $user->id;
				 }
				 else
				 {
				   $userid = $user->parent;
				 }
				 $data['pcount'] = $this->common->count_userperformance(array("u.parent"=>$userid),$results->employee);
				 $config["total_rows"] = $this->common->count_userperformance(array("u.parent"=>$userid),$results->employee);


				$config["per_page"] = $results->perpage;
				$this->pagination->initialize($config);

				if( $page <= 0 )
				{
					$page = 1;
				}

				$start = ($page-1) * $config["per_page"];

				if(!empty($page))
				{
					$res = $this->common->getUserPerformance(array("us.parent"=>$userid),$results->employee,$start,$config["per_page"]);
				}
				if(!empty($res))
		   {
			   foreach($res as $key=>$r)
			  {
					$tscore = 0;
					$performance = $this->common->getOneRow('performance',array("employeeId"=>$r->u_id),'perId','Desc');

					if(!empty($performance))
					{
					 $lastreviewer = $this->common->getrow('performance_reviewer',array("perId"=>$performance->perId,"status"=>0,"type"=>1));
				  }

					if(!empty($performance))
					{
					 $count = $this->common->PerformancereviewScoreCount(array("perId"=>$performance->perId,"type"=>1));
           if($count->score != 0)
					 {
						 $tscore = $count->score / $count->t;
						 $res[$key]->rating = number_format($tscore, 2);
					 }
					 $res[$key]->lastreviewdate = date('d-m-Y',strtotime($performance->date));
					 $res[$key]->perId = $performance->perId;
					}
					else
					{
            $res[$key]->lastreviewdate = '';
						$res[$key]->perId = '';
						$res[$key]->rating = '';
					}

					if(!empty($lastreviewer) && !empty($performance))
					{
						$res[$key]->status = 1;
					}
					else
					{
						$res[$key]->status = 0;
					}


					if(!empty($performance))
					{
							if($r->duration == 1)
							{
						   $reviewstart = date('Y-m-d',strtotime('+1 month',strtotime($performance->date)));
						  }
							else if($r->duration  == 2)
							{
								$reviewstart = date('Y-m-d',strtotime('+3 month',strtotime($performance->date)));
							}
							else if($r->duration == 3)
							{
								$reviewstart = date('Y-m-d',strtotime('+6 month',strtotime($performance->date)));
							}
							else if($r->duration == 4)
							{
								$reviewstart = date('Y-m-d',strtotime('+12 month',strtotime($performance->date)));
							}
					}
					else
					{
						 if($r->duration == 1)
						 {
						  $reviewstart = date('Y-m-d',strtotime('+1 month',strtotime($r->joiningdate)));
						 }
						 else if($r->duration  == 2)
						 {
							$reviewstart = date('Y-m-d',strtotime('+3 month',strtotime($r->joiningdate)));
						 }
						 else if($r->duration == 3)
						 {
							 $reviewstart = date('Y-m-d',strtotime('+6 month',strtotime($r->joiningdate)));
						 }
						  else if($r->duration == 4)
						  {
							$reviewstart = date('Y-m-d',strtotime('+12 month',strtotime($r->joiningdate)));
						  }
					}

        if(!empty($reviewstart))
				{
					$res[$key]->reviewstart = $reviewstart;
					if($reviewstart <= $date)
					{
            $res[$key]->performance = 1;
					}
					else
					{
						$res[$key]->performance = 0;
					}
				}
				else
				{
						$res[$key]->performance = 0;
				}

					if($res[$key]->duration == '')
					{
						$res[$key]->performance = 0;
					}
					else if($res[$key]->duration == 0)
					{
						$res[$key]->duration = '';
						$res[$key]->performance = 0;
					}
						if(!empty($reviewstart))
						{
						$res[$key]->reviewstart = $reviewstart;
					  }
						else
						{
						  $res[$key]->reviewstart = '';
						}
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

			public function addperformance($id)
			{
				$t['title'] = "Performance Evaluation Form | Employee Performance Review Form";
				$data['performanceUserId'] = $id;
				$this->load->view('freelancer/header',$t);
				$this->load->view('freelancer/addperformance',$data);
				$this->load->view('freelancer/footer');
			}

			public function performanceSave()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
        $date = date("Y-m-d",strtotime($results->date));
				$results->date =  $date;
				$results->perReviewPeriodStart =  date("Y-m-d",strtotime($results->perReviewPeriodStart));;
				$results->perReviewPeriodEnd =  date("Y-m-d",strtotime($results->perReviewPeriodEnd));;
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
				 $userid = $user->id;
				}
				else
				{
				  $userid = $user->parent;
				}
				$results->userId = $userid;
				$reviwers = $results->perReviewerId;
				$forms = $results->forms;
				$comment = $results->comment;
				$overall = $results->overallScore;
				unset($results->comment);
				unset($results->overallScore);
				unset($results->forms);
				unset($results->perReviewerId);
				$result = $this->common->insert('performance',$results);
				if($result)
				{
					$r = $this->common->insert('performance_reviewer',array("forms"=>serialize($forms),"review"=>$comment,"userId"=>$this->session->userdata['clientloggedin']['id'],"type"=>1,"status"=>1,"date"=>$date,"perId"=>$result[1],"overallScore"=>$overall));
				}
				if($result)
				{
					$this->common->insert('performance_reviewer',array("userId"=>$results->employeeId,"perId"=>$result[1],"type"=>0,"date"=>$date));
				}
        if($result)
				{
					if(!empty($reviwers))
					{
						foreach($reviwers as $re)
						{
							$inserted = $this->common->insert('performance_reviewer',array("perId"=>$result[1],"userId"=>$re->id,"type"=>1,"date"=>$date));
						}
					}
				}



				if($result)
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

			public function performanceDelete()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
        $delete = $this->common->delete('performance',array("perId"=>$results->id));
			  if($delete)
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

			// public function performanceEdit($id)
			// {
			// 	$data['performanceId'] = $id;
			// 	$result = $this->common->viewperformance(array("p.perId"=>$id));
			//
			// 	$title['title'] = $result->name .' | '. $result->reviwer .' | '. $result->perProject .' | '. $result->perJobTitle;
			// 	$this->load->view('freelancer/header',$title);
			// 	$this->load->view('freelancer/editperformance',$data);
			// 	$this->load->view('freelancer/footer');
			//
			// }


			// public function getperformanceEdit()
			// {
			// 	 $array = file_get_contents('php://input');
			// 	 $results =json_decode($array);
			// 	 $result = $this->common->getrow('performance',array("perId"=>$results->id));
			// 	 $reviwername = $this->common->getrow('user_meta',array("u_id"=>$result->perReviewerId));
			// 	 $result->reviewername = $reviwername->name;
      //    if(!empty($result->perPlanStart))
			// 	 {
			// 	  $result->perPlanStart  =  date("d-m-Y",strtotime($result->perPlanStart));
			// 	 }
			// 	 if(!empty($result->perPlanEnd))
			// 	 {
			// 	 $result->perPlanEnd =  date("d-m-Y",strtotime($result->perPlanEnd));
			//     }
			// 		if(!empty($result->perReviewPeriodStart))
			// 		{
			// 		$result->perReviewPeriodStart = date("d-m-Y",strtotime($result->perReviewPeriodStart));
			// 	  }
			// 		if(!empty($result->perReviewPeriodEnd))
			// 		{
			// 		$result->perReviewPeriodEnd = date("d-m-Y",strtotime($result->perReviewPeriodEnd));
			// 	  }
			// 		if(!empty($result->perreviewerSignatureDate))
 			// 	  {
			// 	  $result->perreviewerSignatureDate =  date("d-m-Y",strtotime($result->perreviewerSignatureDate));;
			//     }
			// 		$result->date =  date("d-m-Y",strtotime($result->date));;
			//
			//
			// 	 if($result)
			// 	 {
			// 		 $msg['success'] ="true";
			// 		 $msg['result'] =$result;
			// 	 }
			// 	 else
			// 	 {
			// 	  $msg['success'] ="false";
			// 	  $msg['result'] = '';
			// 	 }
			// 	 echo json_encode($msg);
			// 	 exit;
			// }



			public function performanceView()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$result = $this->common->viewperformance(array("p.perId"=>$results->id));
				if($result)
				{
					$msg['success'] ="true";
					$msg['result'] =$result;
				}
				else
				{
				 $msg['success'] ="false";
				 $msg['result'] = '';
				}
				echo json_encode($msg);
				exit;
			}

			public function employee_increment()
			{
				$title['title'] ="Salary Increments For Employees | Pay Increments";
				$this->load->view('freelancer/header',$title);
				$this->load->view('freelancer/employee_incrment');
				$this->load->view('freelancer/footer');
			}

			public function getemployeeincrment()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$page = $results->page;
				$config = array();
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
				 $userid = $user->id;
				}
				else
				{
				  $userid = $user->parent;
				}
				$data['pcount'] = $this->common->count_all_results('user_increment',array("userId"=>$userid));
				$config["total_rows"] = $this->common->count_all_results('user_increment',array("userId"=>$userid));
        $config["per_page"] = $results->perpage;
			  $this->pagination->initialize($config);
        if( $page <= 0 )
			  {
				  $page = 1;
			  }
        $start = ($page-1) * $config["per_page"];
			  if(!empty($page))
			  {
				  $res = $this->common->getemployeeincrment(array("userId"=>$userid),$start,$config["per_page"]);
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

			public function employeeIncrmentSave()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				$date =  $nowUtc->format('Y-m-d H:i:s');
				$results->date =  date("Y-m-d H:i:s",strtotime($results->date));
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
				 $userid = $user->id;
				 $results->userId = $user->id;
				}
				else
				{
				  $userid = $user->parent;
				  $results->userId = $user->parent;
				}
				$result = $this->common->insert('user_increment',$results);
				$workingHours = $this->common->getrow('workingHours',array("userId"=>$userid));

				if($result)
				{
					$salary = $results->increment + $results->currentSalary;
					$perday = $salary / $workingHours->workingDays;
					if($workingHours->workingHour)
					{
						$a = explode(":",$workingHours->workingHour);
						$hours = $a[0] * 60;
						$thours = $hours + $a[1];
						$workinghours = $thours /60;
					}
					$perHour = $perday / $workinghours;
				  $salaryUpdate = $this->common->update(array('u_id'=>$results->employeeId),array("salary"=>$salary,"perday"=>$perday,"perHour"=>$perHour),'user_meta');
				}
				if($salaryUpdate)
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

			public function deleteemployeeincrment()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
				 $userid = $user->id;
				 $results->userId = $user->id;
				}
				else
				{
				  $userid = $user->parent;
				  $results->userId = $user->parent;
				}

				$workingHours = $this->common->getrow('workingHours',array("userId"=>$userid));
				$salarydata = $this->common->getrow('user_increment',array("incrementId"=>$results->id));

				if($salarydata)
				{
					$salary = $salarydata->currentSalary;
					$perday = $salary / $workingHours->workingDays;
					if($workingHours->workingHour)
					{
						$a = explode(":",$workingHours->workingHour);
						$hours = $a[0] * 60;
						$thours = $hours + $a[1];
						$workinghours = $thours /60;
					}
					$perHour = $perday / $workinghours;
					$salaryUpdate = $this->common->update(array('u_id'=>$salarydata->employeeId),array("salary"=>$salary,"perday"=>$perday,"perHour"=>$perHour),'user_meta');
				}

				if($salaryUpdate)
				{
         $delete = $this->common->delete('user_increment',array("incrementId"=>$results->id));
			  }

			  if($delete)
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

			public function getOneEmployeeIncrement()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
        $result = $this->common->getOneEmployeeIncrement(array("incrementId"=>$results->id));
			  if($result)
				{
					$msg['success']="true";
					$msg['result']=$result;
				}
				else
				{
					$msg['success']="false";
					$msg['result']= '';
				}
				echo json_encode($msg);
				exit;
			}

			public function incrmentEdit()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
        $result = $this->common->getOneEmployeeIncrement(array("incrementId"=>$results->id));
				$result->date = date("d-m-Y",strtotime($result->date));
			  if($result)
				{
					$msg['success']="true";
					$msg['result']=$result;
				}
				else
				{
					$msg['success']="false";
					$msg['result']= '';
				}
				echo json_encode($msg);
				exit;
			}

			public function incrmentUpdate()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
				$date =  $nowUtc->format('Y-m-d H:i:s');
				$results->date =  date("Y-m-d",strtotime($results->date));
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
				 $userid = $user->id;
				}
				else
				{
					$userid = $user->parent;
				}

        $workingHours = $this->common->getrow('workingHours',array("userId"=>$userid));
				$result = $this->common->update(array("incrementId"=>$results->incrementId),$results,'user_increment');

				if($result)
				{
					$salary = $results->currentSalary + $results->increment;
					$perday = $salary / $workingHours->workingDays;
					if($workingHours->workingHour)
					{
						$a = explode(":",$workingHours->workingHour);
						$hours = $a[0] * 60;
						$thours = $hours + $a[1];
						$workinghours = $thours /60;
					}
					$perHour = $perday / $workinghours;
					$salaryUpdate = $this->common->update(array('u_id'=>$results->employeeId),array("salary"=>$salary,"perday"=>$perday,"perHour"=>$perHour),'user_meta');
				}

				if($salaryUpdate)
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

			public function dsrupload()
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
		 			echo $image = uniqid().'dsr.png';
		 			$result = file_put_contents('assets/dsr/'.$image,$data1);
		      }
		 		else if($mime_type =="image/jpeg")
		 		{
		 			echo $image=uniqid().'dsr.jpeg';
		 			$result=file_put_contents('assets/dsr/'.$image,$data1);

		 		}
		 		else if($mime_type =="application/pdf")
		 		{
		 			echo $image = uniqid().'dsr.pdf';
		 			$result=file_put_contents('assets/dsr/'.$image,$data1);
		 		}
		 		else if($mime_type == "text/plain")
		 		{
		 			echo $image = uniqid().'dsr.text';
		 			$result=file_put_contents('assets/dsr/'.$image,$data1);
		 		}
		 		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		 		{
		 			echo	 $image = uniqid().'dsr.xlsx';
		 			$result=file_put_contents('assets/dsr/'.$image,$data1);
		 		}
		 		exit;

		 	}

			public function lead ()
			{
				$data['title'] ="Meet Your Lead Generation Goals | Capture & Convert More Leads";
				$this->load->view('freelancer/header',$data);
				$this->load->view('freelancer/lead');
				$this->load->view('freelancer/footer');
			}

			public function getlead()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$page = $results->page;
				$config = array();

				if(!empty($results->date))
				{
				$date = date("Y-m-d", strtotime($results->date));
				}
				else
				{
				 $date ='';
				}

				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
				 $userid = $user->id;
				}
				else
				{
					$userid = $user->parent;
				}
				if($results->date != '' || $results->client != '' || $results->status != '')
				{
					$data['pcount'] = count($this->common->search_lead_count(array("l.userId"=>$userid,"l.status"=>0),$results->client,$results->status,$date));
					$config["total_rows"] = count($this->common->search_lead_count(array("l.userId"=>$userid,"l.status"=>0),$results->client,$results->status,$date));
				}
				else
				{
				$data['pcount'] = $this->common->count_all_results('lead',array("userId"=>$userid,"status"=>0));
				$config["total_rows"] = $this->common->count_all_results('lead',array("userId"=>$userid,"status"=>0));
			  }
        $config["per_page"] = $results->perpage;
			  $this->pagination->initialize($config);
        if( $page <= 0 )
			  {
				  $page = 1;
			  }
        $start = ($page-1) * $config["per_page"];

				if($results->date != '' || $results->client != '' || $results->status != '')
				{
				  $res = $this->common->search_lead(array("userId"=>$userid,"l.status"=>0),$results->client,$results->status,$date,$start,$config["per_page"]);
			  }
				else
				{
					$res = $this->common->getlead(array("userId"=>$userid,"status"=>0),$start,$config["per_page"]);

					if(!empty($res))
					{
						foreach($res as  $key=>$r)
						{
							$info = $this->common->getOneRow('lead_info',array("leadId"=>$r->leadId),'lead_infoId','desc');
							$skill = $this->common->get('lead_skill',array("leadId"=>$r->leadId));
							$sourace = $this->common->getrow('lead_source',array("lead_sourceId"=>$r->lead_sourceId));
							$res[$key]->skill = $skill;
							if($sourace)
							{
								$res[$key]->leadsource = $sourace->source;
							}
							else
							{
								$res[$key]->leadsource = '';
							}
							if(!empty($info))
							{
							  $res[$key]->date = $info->date;
							  $res[$key]->status = $info->status;
							}
							else
							{
							 $res[$key]->status = 0;
							}
						}
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

			public function deletelead()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
        $delete = $this->common->delete('lead',array("leadId"=>$results->id));
			  if($delete)
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

			public function addLead()
			{
				$data['title'] = "Create Lead Gen Forms To Grow Your Business";
				$this->load->view('freelancer/header',$data);
				$this->load->view('freelancer/lead_add');
				$this->load->view('freelancer/footer');
			}

			public function leadSave()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$results->date =  date("Y-m-d",strtotime($results->date));
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
				 $userid = $user->id;
				}
				else
				{
					$userid = $user->parent;
				}
				$results->userId = $userid;
				$skill = $results->skill;
				unset($results->skill);
				$info['currencyId'] = $results->currencyId;
				$info['status'] = $results->status;
				$info['date'] = $results->date;
				$info['budget'] = $results->budget;
				$info['remark'] = $results->remark;
				$info['employeeId'] = $results->empName;
				unset($results->currencyId);
				unset($results->empName);
				unset($results->status);
				unset($results->date);
				unset($results->budget);
				unset($results->remark);
				$result = $this->common->insert('lead',$results);
				if($result)
				{
					$info['leadId'] = $result[1];

					$leadinfo = $this->common->insert('lead_info',$info);
				}

				if($leadinfo)
				{
					foreach($skill as $sk)
					{
						$s['leadId'] = $result[1];
						$s['skill'] = $sk;
						$skillinsert = $this->common->insert('lead_skill',$s);
					}
				}

				if($result)
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

			public function leadupload()
			{
				$array = file_get_contents('php://input');
		 		$results =json_decode($array);
		 		$data = $results->image;
		 		$name = $results->name;

		 		list($type, $data) = explode(';', $data);
		 		list(, $data)      = explode(',', $data);

		 		$data1 = base64_decode($data);

		 		$f = finfo_open();

		 		$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);
		 		echo $image = $name;
		 		$result = file_put_contents('assets/lead/'.$image,$data1);
		 		exit;
			}

			public function geteditlead()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
        $result = $this->common->getrow('lead',array("leadId"=>$results->id));
        $result->skill = $this->common->get('lead_skill',array("leadId"=>$results->id));
				$result->info = $this->common->get('lead_info',array("leadId"=>$results->id));
				if(!empty($result->info))
				{
				  foreach($result->info as $key=>$in)
					{
						if(!empty($in->date))
						{
						$result->info[$key]->date = date("d-m-Y",strtotime($in->date));
					  }
						else
						{
						 $result->info[$key]->date = '';
						}
					}
				}
			  if($result)
				{
					$msg['message']="true";
					$msg['result']=$result;
				}
				else
				{
					$msg['message']="false";
				}
				echo json_encode($msg);
				exit;
			}

			public function editlead($leadId)
			{
				$lead = $this->common->getrow('lead',array("leadId"=>$leadId));
				$title['title'] = $lead->clientName .' - ' . $lead->jobTitle;
				$data['leadId'] = $leadId;
				$this->load->view('freelancer/header',$title);
				$this->load->view('freelancer/lead_edit',$data);
				$this->load->view('freelancer/footer');
			}

			public function leadUpdate()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$skill = $results->skill;
				unset($results->skill);
				$info = $results->info;
				unset($results->info);
				$result = $this->common->update(array("leadId"=>$results->leadId),$results,'lead');
				if($result)
				{
					if(!empty($info))
					{
					$this->common->delete('lead_info',array("leadId"=>$results->leadId));
					 foreach($info as $i)
					 {
						 unset($i->type);
					   $i->leadId = $results->leadId;
						 $i->date =  date("Y-m-d",strtotime($i->date));
             $leadinfo = $this->common->insert('lead_info',$i);
				    }
				  }
				}

				if($leadinfo)
				{
					$this->common->delete('lead_skill',array("leadId"=>$results->leadId));
					foreach($skill as $sk)
					{
						$s['leadId'] = $results->leadId;
						$s['skill'] = $sk;
						$skillinsert = $this->common->insert('lead_skill',$s);
					}
				}

				if($result)
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

			public function viewlead()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
        $result = $this->common->getrow('lead',array("leadId"=>$results->id));
				$result->info = $this->common->viewleadinfo(array("l.leadId"=>$results->id));
				if(!empty($result->countryCode))
				{
			   $cc = explode(":",$result->countryCode);
			   $result->countryCode = $cc[1];
		     }

			  if($result)
				{
					$msg['message']="true";
					$msg['result']=$result;
				}
				else
				{
					$msg['message']="false";
				}
				echo json_encode($msg);
				exit;
			}

			public function reviews()
			{
				$title['title'] ="Reviews";
				$this->load->view('freelancer/header',$title);
				$this->load->view('freelancer/reviews');
				$this->load->view('freelancer/footer');
			}

			public function getreviews()
			{
				$array = file_get_contents('php://input');
				$results =json_decode($array);
				$page = $results->page;
				$config = array();

				$data['pcount'] = $this->common->countreview(array("reviewTo"=>$this->session->userdata['clientloggedin']['id'],"reviewType"=>'review'));
				$config["total_rows"] = $this->common->countreview(array("reviewTo"=>$this->session->userdata['clientloggedin']['id'],"reviewType"=>'review'));
        $config["per_page"] = 10;
			  $this->pagination->initialize($config);
        if( $page <= 0 )
			  {
				  $page = 1;
			  }
        $start = ($page-1) * $config["per_page"];
			  if(!empty($page))
			  {
				  $res = $this->common->getreview(array("reviewTo"=>$this->session->userdata['clientloggedin']['id'],"reviewType"=>'review'),$start,$config["per_page"]);
			  }

				if(!empty($res))
				{
          foreach($res as $key=>$r)
					{
						if(!empty($r->contractId))
						{
						$review = $this->common->getrow('user_review',array("contractId"=>$r->contractId,"reviewType"=>'overall'));
						$contractdata = $this->common->contractre(array("c.contractId"=>$r->contractId));

             if(!empty($review))
						 {
						  $res[$key]->score = $review->reviewOverall / 2;
						 }
						 if(!empty($contractdata))
						 {
							 $res[$key]->budget = $contractdata->budget;
							 $res[$key]->name = $contractdata->name;
							 $res[$key]->title = $contractdata->jobTitle;
							 $res[$key]->service = $contractdata->service;
							 $res[$key]->start = $contractdata->contractDate;
							 $res[$key]->end = $contractdata->contractEndDate;
						 }

					  }
						else if($r->linkedInId)
						{
							$review = $this->common->getrow('user_review',array("linkedInId"=>$r->linkedInId,"reviewType"=>'overall'));
							$linkedln = $this->common->linkedIndata(array("linkedInId"=>$r->linkedInId));
              if(!empty($review))
							{
							$res[$key]->score = $review->reviewOverall / 2;
						  }
							if(!empty($linkedln))
							{
								$res[$key]->budget = $linkedln->budget;
								$res[$key]->name = $linkedln->name;
								$res[$key]->title = $linkedln->projectTitle;
								$res[$key]->service = $linkedln->service;
								$res[$key]->start = $linkedln->projectStartDate;
								$res[$key]->end = $linkedln->projectEndDate;
							}
						}
						else if($r->user_gig_buyId)
						{
							$gigdata = $this->common->getrow('user_gig_buy',array("user_gig_buyId"=>$r->user_gig_buyId));
							$budget = $this->common->getrow('todoList',array("user_gig_buyId"=>$r->user_gig_buyId,"milestone"=>1));
							$client = $this->common->getrow('user_meta',array("u_id"=>$gigdata->clientId));
							$service = $this->common->getrow('services',array("id"=>$gigdata->servicesId));
							$review1 = $this->common->getrow('user_review',array("user_gig_buyId"=>$r->user_gig_buyId,"reviewType"=>'overall'));

	             if(!empty($review1))
							 {
							  $res[$key]->score = $review1->reviewOverall / 2;
							 }
							$res[$key]->budget = $budget->amount;
							$res[$key]->name = $client->name;
							$res[$key]->title = $gigdata->title;
							$res[$key]->service = $service->name;
							$res[$key]->start = $gigdata->date;
							$res[$key]->end = $gigdata->endDate;
						}
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
					$data['userId'] = $this->session->userdata['clientloggedin']['id'];
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

			public function removedReviewCount()
			{
				$res = $this->common->count_all_results('user_review_remove',array("userId"=>$this->session->userdata['clientloggedin']['id']));
				$data['count'] = $res;
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
					$review = $this->common->getrow('user_review',array("contractId"=>$results->id,"reviewType"=>'overall'));
					// $r = $this->common->getreviewIn(array("contractId"=>$results->id));
					$contractdata = $this->common->contractdata(array("c.contractId"=>$results->id));
					// $r = $this->common->getrow('user_review',array("contractId"=>$results->id,"reviewType"=>'overall'));

					$res->score = $review->reviewOverall / 2;
					if(!empty($contractdata))
					{
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

				}
				else if($results->type == 2)
				{
					$res = $this->common->getrow('user_review',array("linkedinId"=>$results->id,"reviewType"=>'review'));
					$l = $this->common->linkedIndata(array("linkedInId"=>$results->id));
				  $review = $this->common->getrow('user_review',array("linkedInId"=>$results->id,"reviewTo"=>$this->session->userdata['clientloggedin']['id'],"reviewType"=>'overall'));
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
				else if($results->type == 3)
				{
					$res = $this->common->getrow('user_review',array("user_gig_buyId"=>$results->id,"reviewType"=>'review'));
					$gigdata = $this->common->gigdata(array("user_gig_buyId"=>$results->id));
					$budget = $this->common->getrow('todoList',array("user_gig_buyId"=>$results->id,"milestone"=>1));
					$review = $this->common->getrow('user_review',array("user_gig_buyId"=>$results->id,"reviewTo"=>$this->session->userdata['clientloggedin']['id'],"reviewType"=>'overall'));

           if(!empty($review))
					 {
						$res->score = $review->reviewOverall / 2;
					 }
						$res->budget = $budget->amount;
						$res->name = $gigdata->name;
						$res->title = $gigdata->title;
						$res->service = $gigdata->service;
						$res->start = $gigdata->date;
						$res->end = $gigdata->endDate;
						$res->email = $gigdata->email;
						$res->phone = $gigdata->phone;
						$res->skype = $gigdata->skype;
						$res->address = $gigdata->address;
						$res->city = $gigdata->city;
						$res->state = $gigdata->state;
						$res->country = $gigdata->country;
						$res->industry = $gigdata->industry;
						$res->code = $gigdata->code;
						$res->symbol = $gigdata->symbol;
						// $res->target = $l->targetLocation;
						// $res->projectSummary = $l->projectSummary;
						if(!empty($gigdata->website))
						{
						$res->website = $gigdata->website;
					  }
						// $res->reviewTitle = $l->reviewTitle;

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

			public function Paypal_Cancel_Subscription($profile_id,$action)
			{
					$api_request = 'USER=' . urlencode('vinod@1wayit.com')
					.  '&PWD=' . urlencode('Neeraj786Mala')
					.  '&SIGNATURE=' . urlencode( 'api_signature' )
					.  '&VERSION=76.0'
					.  '&METHOD=ManageRecurringPaymentsProfileStatus'
					.  '&PROFILEID=' . urlencode( $profile_id )
					.  '&ACTION=' . urlencode( $action )
					.  '&NOTE=' . urlencode( 'Profile cancelled at store' );

					$ch = curl_init();
					curl_setopt( $ch, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp' ); // For live transactions, change to 'https://api-3t.paypal.com/nvp'
					curl_setopt( $ch, CURLOPT_VERBOSE, 1 );
					curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
					curl_setopt( $ch, CURLOPT_POST, 1 );
					curl_setopt( $ch, CURLOPT_POSTFIELDS, $api_request );
					$response = curl_exec( $ch );

					if( ! $response )
					die( 'Calling PayPal to change_subscription_status failed: ' . curl_error( $ch ) . '(' . curl_errno( $ch ) . ')' );
					curl_close( $ch );
					parse_str( $response, $parsed_response );
					print_r($parsed_response);

					return $parsed_response;
			}

			public function paid_ranking()
			{
				$this->load->view('freelancer/header');
				$this->load->view('freelancer/paid_ranking');
				$this->load->view('freelancer/footer');
			}

			public function getpaidranking()
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

				if(!empty($res))
				{
				  foreach($res as $key=>$r)
					{
					  $buy = $this->common->getrow('user_buy_ranking',array("status"=>1,"userId"=>$this->session->userdata['clientloggedin']['id'],"rankingPriceId"=>$r->rankingPriceId));
						if(!empty($buy))
						{
						$res[$key]->buy = 1;
					  }
						else
						{
						$res[$key]->buy =0;
						}
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
			///dashdgsdds

			public function paidranking_payment($rankingPriceId)
			{
				$data['userId'] = $this->session->userdata['clientloggedin']['id'];
				$data['result'] = $this->common->getrow('ranking_price',array("rankingPriceId"=>$rankingPriceId));
				$this->load->view('freelancer/paidranking_payment',$data);
			}

     public function askquestion()
		 {
			 $t['title'] ="Ask A Question";
			 $this->load->view('freelancer/header',$t);
			 $this->load->view('freelancer/askquestion');
			 $this->load->view('freelancer/footer');
		 }

     public function getaskquestion()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $page = $results->page;
			 $config = array();

			 $data['pcount'] = $this->common->count_all_results('askQuestion',array("userId"=>$this->session->userdata['clientloggedin']['id']));
			 $config["total_rows"] = $this->common->count_all_results('askQuestion',array("userId"=>$this->session->userdata['clientloggedin']['id']));
			 $config["per_page"] = $results->perpage;
			 $this->pagination->initialize($config);
			 if( $page <= 0 )
			 {
				 $page = 1;
			 }
			 $start = ($page-1) * $config["per_page"];
			 if(!empty($page))
			 {
				 $res = $this->common->getaskQuestion(array("userId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
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

		 public function askquestionDelete()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $res = $this->common->delete('askQuestion',array("askQuestionId"=>$results->id));

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

		 public function askquestionEdit()
		 {
			 $timez = 0;
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $res = $this->common->getrow('askQuestion',array("askQuestionId"=>$results->id));
			//  $timezone = $this->common->getrow('user_paymentmethod',array("userId"=>$res->userId));
		 //  if(!empty($timezone->zone))
		 //  {
			// $zone = explode(":",$timezone->zone);
			// $h = $zone[0].' Hours';
			// $m = $zone[1].' Minutes';
			// $timez = $h.' '.$m;
		 // }


			 if($res)
			 {
				$data['message'] ="true";
				$data['result'] =$res;
			 }
			 else
			 {
				$data['message'] ="false";
				$data['result'] ='';
			 }
			echo json_encode($data);
			exit;
		 }


		 public function askquestionUpdate()
		 {
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			 $results->answerDate = $nowUtc->format('Y-m-d H:i:s');
			 $results->status = 1;
			 $res = $this->common->update(array("askQuestionId"=>$results->askQuestionId),$results,'askQuestion');

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

		 public function giglist()
		 {
			 $t['title'] = "Gig Listings | Gigs to Start and Grow Your Business";
			 $this->load->view('freelancer/header',$t);
			 $this->load->view('freelancer/giglist');
			 $this->load->view('freelancer/footer');
		 }

		 public function getgig()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$page = $results->page;
			$config = array();
			$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
 		 if($user->parent == 0)
 		 {
 			 $userId = $this->session->userdata['clientloggedin']['id'];
 		 }
 		 else if($user->parent != 0)
 		 {
 		  $userId = $user->parent;
 		 }

			$data['pcount'] = $this->common->count_all_results('user_gig',array("userId"=>$userId));
			$config["total_rows"] = $this->common->count_all_results('user_gig',array("userId"=>$userId));
			$config["per_page"] = $results->perpage;
			$this->pagination->initialize($config);
			if( $page <= 0 )
			{
				$page = 1;
			}
			$start = ($page-1) * $config["per_page"];
			if(!empty($page))
			{
				$res = $this->common->getgig(array("userId"=>$userId),$start,$config["per_page"]);
			}

			if(!empty($res))
			{
				foreach($res as $key=>$r)
				{
					$res[$key]->buy = $this->common->count_all_results('user_gig_buy',array("gigId"=>$r->gigId));
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

		public function gigDelete()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$check = $this->common->getrow('user_gig_buy',array("gigId"=>$results->id));
			if(!empty($check))
			{
				 $data['error'] ="true";
			}
			else
			{
			 // $res = $this->common->delete('user_gig',array("gigId"=>$results->id));
      $res = $this->common->update(array("gigId"=>$results->id),array("deleted"=>1),"user_gig");
			if($res)
		  {
			 $data['message'] ="true";
		  }
		  else
		  {
			 $data['message'] ="false";
		  }
	  }

		 echo json_encode($data);
		 exit;
		}

		public function gig_add()
		{
			$t['title'] ="Add New Gig Form | Create A New Gig";
			$this->load->view('freelancer/header',$t);
			$this->load->view('freelancer/gigadd');
			$this->load->view('freelancer/footer');
		}

		public function gigSave()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
				$userid = $user->parent;
			}

			$results->userId = $userid;
			$image = $results->image;
			$basic = $results->basic;
			$premium = $results->premium;
			$standard = $results->standard;
			$showbasic = $results->showbasic;
			$showstandard = $results->showstandard;
			$showpremium = $results->showpremium;
			$basicPrice = $results->basicPrice;
			$basicDuration = $results->basicDuration;
			$basicExplain = $results->basicExplain;
			$premiumPrice = $results->premiumPrice;
			$premiumDuration = $results->premiumDuration;
			$premiumExplain = $results->premiumExplain;
			$standardPrice = $results->standardPrice;
			$standardDuration = $results->standardDuration;
			$standardExplain = $results->standardExplain;
			unset($results->image);
			unset($results->basic);
			unset($results->premium);
			unset($results->standard);
			unset($results->showbasic);
			unset($results->showstandard);
			unset($results->showpremium);
			unset($results->basicPrice);
			unset($results->basicDuration);
			unset($results->basicExplain);
			unset($results->standardPrice);
			unset($results->standardDuration);
			unset($results->standardExplain);
			unset($results->premiumPrice);
			unset($results->premiumDuration);
			unset($results->premiumExplain);

			$res = $this->common->insert('user_gig',$results);
			if(!empty($image))
			{
				foreach($image as $m)
				{
					$this->common->insert('user_gig_images',array("gigId"=>$res[1],"image"=>$m));
				}
			}

			if($res)
			{
				// basic
				if($showbasic == 1)
				{

					$mdata =array(
					  "gigId"=>$res[1],
					  "name"=>"Basic",
					  "amount"=>$basicPrice,
					  "duration"=>$basicDuration,
					  "description"=>$basicExplain,
					  "milestone"=>1,
					  "plan"=>1,
					);
					$milestone = $this->common->insert('user_gig_plan',$mdata);

					if(!empty($basic))
					{
					  foreach($basic as $t)
					  {
					    $tdata =array(
					      "parent"=>$milestone[1],
					      "name"=>$t->task,
					      "amount"=>'',
					      "gigId"=>$res[1],
					    );
					    $task = $this->common->insert('user_gig_plan',$tdata);
					  }
					}
				 }
				 // basic
				// standard
				if($showstandard == 2)
				{

					$mdata =array(
					  "gigId"=>$res[1],
					  "name"=>"Standard",
					  "amount"=>$standardPrice,
					  "duration"=>$standardDuration,
						"description"=>$standardExplain,
					  "milestone"=>1,
					  "plan"=>2,
					);
					$milestone = $this->common->insert('user_gig_plan',$mdata);

					if(!empty($standard))
					{
					  foreach($standard as $s)
					  {

					    $tdata =array(
					      "parent"=>$milestone[1],
					      "name"=>$s->task,
					      "amount"=>'',
					      "gigId"=>$res[1],
					    );
					    $task = $this->common->insert('user_gig_plan',$tdata);
					  }
					}
				 }
				 // Standard

				// Premium
				if($showpremium == 3)
				{
					$mdata =array(
					  "gigId"=>$res[1],
					  "name"=>"Premium",
					  "amount"=>$premiumPrice,
					  "duration"=>$premiumDuration,
						"description"=>$premiumExplain,
					  "milestone"=>1,
					  "plan"=>3,
					);
					$milestone1 = $this->common->insert('user_gig_plan',$mdata);

					if(!empty($premium))
					{
					  foreach($premium as $p)
					  {
					    $tdata =array(
					      "parent"=>$milestone1[1],
					      "name"=>$p->task,
					      "duration"=>'',
					      "gigId"=>$res[1],
					    );
					    $task1 = $this->common->insert('user_gig_plan',$tdata);
					  }
					 }
				 }
				 // Premium
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
		// public function gigSave()
		// {
		// 	$array = file_get_contents('php://input');
		// 	$results =json_decode($array);
		// 	$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		// 	if($user->parent == 0)
		// 	{
		// 	 $userid = $user->id;
		// 	}
		// 	else
		// 	{
		// 		$userid = $user->parent;
		// 	}
		//
		// 	$results->userId = $userid;
		// 	$image = $results->image;
		// 	$basic = $results->basic;
		// 	$premium = $results->premium;
		// 	$standard = $results->standard;
		// 	$showbasic = $results->showbasic;
		// 	$showstandard = $results->showstandard;
		// 	$showpremium = $results->showpremium;
		// 	$basicPrice = $results->basicPrice;
		// 	$basicDuration = $results->basicDuration;
		// 	$basicExplain = $results->basicExplain;
		// 	$premiumPrice = $results->premiumPrice;
		// 	$premiumDuration = $results->premiumDuration;
		// 	$premiumExplain = $results->premiumExplain;
		// 	$standardPrice = $results->standardPrice;
		// 	$standardDuration = $results->standardDuration;
		// 	$standardExplain = $results->standardExplain;
		// 	unset($results->image);
		// 	unset($results->basic);
		// 	unset($results->premium);
		// 	unset($results->standard);
		// 	unset($results->showbasic);
		// 	unset($results->showstandard);
		// 	unset($results->showpremium);
		// 	unset($results->basicPrice);
		// 	unset($results->basicDuration);
		// 	unset($results->basicExplain);
		// 	unset($results->standardPrice);
		// 	unset($results->standardDuration);
		// 	unset($results->standardExplain);
		// 	unset($results->premiumPrice);
		// 	unset($results->premiumDuration);
		// 	unset($results->premiumExplain);
		//
		// 	$res = $this->common->insert('user_gig',$results);
		// 	if(!empty($image))
		// 	{
		// 		foreach($image as $m)
		// 		{
		// 			$this->common->insert('user_gig_images',array("gigId"=>$res[1],"image"=>$m));
		// 		}
		// 	}
		//
		// 	if($res)
		// 	{
		// 		// basic
		// 		if($showbasic == 1)
		// 		{
		//
		// 			$ids = $this->common->getone('todoList','id','desc');
		// 			if(!empty($ids))
		// 			{
		// 			 $xx = $ids->id + 1;
		// 			 $taskId = "TS000".$xx;
		// 			 }
		// 			 else
		// 			 {
		// 			  $taskId = 'TS0001';
		// 			 }
		// 			$mdata =array(
		// 			  "gigId"=>$res[1],
		// 			  "name"=>"Basic",
		// 			  "amount"=>$basicPrice,
		// 			  "hours"=>$basicDuration,
		// 			  "description"=>$basicExplain,
		// 			  "status"=>2,
		// 			  "type"=>4,
		// 			  "milestone"=>1,
		// 			  "taskId"=>$taskId,
		// 			  "plan"=>1,
		// 			);
		// 			$milestone = $this->common->insert('todoList',$mdata);
		//
		// 			if(!empty($basic))
		// 			{
		// 			  foreach($basic as $t)
		// 			  {
		// 			    $ids = $this->common->getone('todoList','id','desc');
		// 			    if(!empty($ids))
		// 			    {
		// 			     $xx = $ids->id + 1;
		// 			     $taskId1 = "TS000".$xx;
		// 			     }
		// 			     else
		// 			     {
		// 			      $taskId1 = 'TS0001';
		// 			     }
		// 			    $tdata =array(
		// 			      "parent"=>$milestone[1],
		// 			      "name"=>$t->task,
		// 			      "hours"=>'',
		// 			      "hourlyPrice"=>'',
		// 			      "amount"=>'',
		// 			      "status"=>2,
		// 			      "type"=>4,
		// 			      "gigId"=>$res[1],
		// 			      "taskId"=>$taskId1,
		// 			    );
		// 			    $task = $this->common->insert('todoList',$tdata);
		// 			  }
		// 			}
		// 		 }
		// 		 // basic
		// 		// standard
		// 		if($showstandard == 2)
		// 		{
		//
		// 			$ids = $this->common->getone('todoList','id','desc');
		// 			if(!empty($ids))
		// 			{
		// 			 $xx = $ids->id + 1;
		// 			 $taskId = "TS000".$xx;
		// 			 }
		// 			 else
		// 			 {
		// 			  $taskId = 'TS0001';
		// 			 }
		// 			$mdata =array(
		// 			  "gigId"=>$res[1],
		// 			  "name"=>"Standard",
		// 			  "amount"=>$standardPrice,
		// 			  "hours"=>$standardDuration,
		// 				"description"=>$standardExplain,
		// 			  "status"=>2,
		// 			  "type"=>4,
		// 			  "milestone"=>1,
		// 			  "taskId"=>$taskId,
		// 			  "plan"=>2,
		// 				"description"=>$standardExplain,
		// 			);
		// 			$milestone = $this->common->insert('todoList',$mdata);
		//
		// 			if(!empty($standard))
		// 			{
		// 			  foreach($standard as $s)
		// 			  {
		// 			    $ids = $this->common->getone('todoList','id','desc');
		// 			    if(!empty($ids))
		// 			    {
		// 			     $xx = $ids->id + 1;
		// 			     $taskId1 = "TS000".$xx;
		// 			     }
		// 			     else
		// 			     {
		// 			      $taskId1 = 'TS0001';
		// 			     }
		// 			    $tdata =array(
		// 			      "parent"=>$milestone[1],
		// 			      "name"=>$s->task,
		// 			      "hours"=>'',
		// 			      "hourlyPrice"=>'',
		// 			      "amount"=>'',
		// 			      "status"=>2,
		// 			      "type"=>4,
		// 			      "gigId"=>$res[1],
		// 			      "taskId"=>$taskId1,
		// 			    );
		// 			    $task = $this->common->insert('todoList',$tdata);
		// 			  }
		// 			}
		// 		 }
		// 		 // Standard
		//
		// 		// Premium
		// 		if($showpremium == 3)
		// 		{
		// 			$ids = $this->common->getone('todoList','id','desc');
		// 			if(!empty($ids))
		// 			{
		// 			 $xx = $ids->id + 1;
		// 			 $taskId = "TS000".$xx;
		// 			 }
		// 			 else
		// 			 {
		// 			  $taskId = 'TS0001';
		// 			 }
		// 			$mdata =array(
		// 			  "gigId"=>$res[1],
		// 			  "name"=>"Premium",
		// 			  "amount"=>$premiumPrice,
		// 			  "hours"=>$premiumDuration,
		// 				"description"=>$premiumExplain,
		// 			  "status"=>2,
		// 			  "type"=>4,
		// 			  "milestone"=>1,
		// 			  "taskId"=>$taskId,
		// 			  "plan"=>3,
		// 				"description"=>$premiumExplain,
		//
		// 			);
		// 			$milestone = $this->common->insert('todoList',$mdata);
		//
		// 			if(!empty($premium))
		// 			{
		// 			  foreach($premium as $p)
		// 			  {
		// 			    $ids = $this->common->getone('todoList','id','desc');
		// 			    if(!empty($ids))
		// 			    {
		// 			     $xx = $ids->id + 1;
		// 			     $taskId1 = "TS000".$xx;
		// 			     }
		// 			     else
		// 			     {
		// 			      $taskId1 = 'TS0001';
		// 			     }
		// 			    $tdata =array(
		// 			      "parent"=>$milestone[1],
		// 			      "name"=>$p->task,
		// 			      "hours"=>'',
		// 			      "hourlyPrice"=>'',
		// 			      "amount"=>'',
		// 			      "status"=>2,
		// 			      "type"=>4,
		// 			      "gigId"=>$res[1],
		// 			      "taskId"=>$taskId1,
		// 			    );
		// 			    $task = $this->common->insert('todoList',$tdata);
		// 			  }
		// 			}
		// 		 }
		// 		 // Premium
		//   }
		//
		//
		// 	if($res)
		//   {
		// 	 $data['message'] ="true";
		//   }
		//   else
		//   {
		// 	 $data['message'] ="false";
		//   }
		//   echo json_encode($data);
		//    exit;
		// }

		public function gig_edit($id)
		{
			$res = $this->common->getrow('user_gig',array("gigId"=>$id));
			$t['title']  ="Edit ".$res->title;
			$data['gigId'] = $id;
			$this->load->view('freelancer/header',$t);
			$this->load->view('freelancer/gigedit',$data);
			$this->load->view('freelancer/footer');
		}

		public function getgigedit()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$res = $this->common->getrow('user_gig',array("gigId"=>$results->gigId),$results);
			$res->images = $this->common->get('user_gig_images',array("gigId"=>$results->gigId));
			if($res)
			{
				$res->plan = $this->common->get('user_gig_plan',array("gigId"=>$results->gigId,"milestone"=>1));
				// $res->additionaltask = $this->common->get('user_gig_additional_task',array("gigId"=>$results->gigId));
			}

			if(!empty($res->plan))
			{
				foreach($res->plan as $key=>$p)
				{
				 $res->plan[$key]->task =$this->common->get('user_gig_plan',array("gigId"=>$results->gigId,"parent"=>$p->user_gig_planId));
				}
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

		public function gigUpdate()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
			 $userid = $user->id;
			}
			else
			{
				$userid = $user->parent;
			}

			$results->userId = $userid;
			$image = $results->image;
			$basic = $results->basic;
			$premium = $results->premium;
			$standard = $results->standard;
			$showbasic = $results->showbasic;
			$showstandard = $results->showstandard;
			$showpremium = $results->showpremium;
			$basicPrice = $results->basicPrice;
			$basicDuration = $results->basicDuration;
			$basicExplain = $results->basicExplain;
			$premiumPrice = $results->premiumPrice;
			$premiumDuration = $results->premiumDuration;
			$premiumExplain = $results->premiumExplain;
			$standardPrice = $results->standardPrice;
			$standardDuration = $results->standardDuration;
			$standardExplain = $results->standardExplain;
			unset($results->basic);
			unset($results->premium);
			unset($results->standard);
			unset($results->showbasic);
			unset($results->showstandard);
			unset($results->showpremium);
			unset($results->basicPrice);
			unset($results->basicDuration);
			unset($results->basicExplain);
			unset($results->standardPrice);
			unset($results->standardDuration);
			unset($results->standardExplain);
			unset($results->premiumPrice);
			unset($results->premiumDuration);
			unset($results->premiumExplain);

			$res = $this->common->update(array("gigId"=>$results->gigId),$results,'user_gig');
			if(!empty($image))
			{
				$this->common->delete('user_gig_images',array("gigId"=>$results->gigId));
				foreach($image as $m)
				{
					$this->common->insert('user_gig_images',array("gigId"=>$results->gigId,"image"=>$m));
				}
			}

			if($res)
			{
				$this->common->delete('user_gig_plan',array("gigId"=>$results->gigId));
				if($showbasic == 1)
				{
					$mdata =array(
					  "gigId"=>$results->gigId,
					  "name"=>"Basic",
					  "amount"=>$basicPrice,
					  "duration"=>$basicDuration,
					  "description"=>$basicExplain,
					  "milestone"=>1,
					  "plan"=>1,
					);
					$milestone = $this->common->insert('user_gig_plan',$mdata);

					if(!empty($basic))
					{
					  foreach($basic as $t)
					  {
					    $tdata =array(
					      "parent"=>$milestone[1],
					      "name"=>$t->task,
								"amount"=>'',
								"gigId"=>$results->gigId,
					    );
					    $task = $this->common->insert('user_gig_plan',$tdata);
					  }
					}
				 }
				 // basic
				// standard
				if($showstandard == 2)
				{

					$mdata =array(
					  "gigId"=>$results->gigId,
					  "name"=>"Standard",
					  "amount"=>$standardPrice,
					  "duration"=>$standardDuration,
						"description"=>$standardExplain,
					  "milestone"=>1,
					  "plan"=>2,
					);
					$milestone = $this->common->insert('user_gig_plan',$mdata);

					if(!empty($standard))
					{
					  foreach($standard as $s)
					  {
					    $tdata =array(
					      "parent"=>$milestone[1],
					      "name"=>$s->task,
					      "amount"=>'',
					      "gigId"=>$results->gigId,
					    );
					    $task = $this->common->insert('user_gig_plan',$tdata);
					  }
					}
				 }
				 // Standard

				// Premium
				if($showpremium == 3)
				{
					$mdata =array(
					  "gigId"=>$results->gigId,
					  "name"=>"Premium",
					  "amount"=>$premiumPrice,
					  "duration"=>$premiumDuration,
						"description"=>$premiumExplain,
					  "milestone"=>1,
					  "plan"=>3,
					);
					$milestone1 = $this->common->insert('user_gig_plan',$mdata);

					if(!empty($premium))
					{
					  foreach($premium as $p)
					  {
					    $tdata =array(
					      "parent"=>$milestone1[1],
					      "name"=>$p->task,
					      "gigId"=>$results->gigId,
					    );
					    $task = $this->common->insert('user_gig_plan',$tdata);
					  }
					}
				 }
				 // Premium
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

		public function gigview()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$res = $this->common->getgigView(array("gigId"=>$results->gigId));

			if($res)
			{
				$res->plan = $this->common->get('user_gig_plan',array("gigId"=>$results->gigId,"milestone"=>1));
				// $res->additionaltask = $this->common->get('user_gig_additional_task',array("gigId"=>$results->gigId));
			}

			if(!empty($res->plan))
			{
				foreach($res->plan as $key=>$p)
				{
				 $res->plan[$key]->task =$this->common->get('user_gig_plan',array("gigId"=>$results->gigId,"parent"=>$p->user_gig_planId));
				}
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

		public function gigImageUpload()
		{
			$ctype ='';
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
				echo $image = uniqid().'gig.png';
				$result = file_put_contents('assets/gig/'.$image,$data1);
				}
			else if($mime_type =="image/jpeg")
			{
				echo $image=uniqid().'gig.jpeg';
				$result=file_put_contents('assets/gig/'.$image,$data1);
			}
			else if($mime_type =="application/pdf")
			{
				echo $image = uniqid().'gig.pdf';
				$result=file_put_contents('assets/gig/'.$image,$data1);
			}
			else if($mime_type == "text/plain")
			{
				echo $image = uniqid().'gig.text';
				$result=file_put_contents('assets/gig/'.$image,$data1);
			}
			else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
			{
				echo	 $image = uniqid().'gig.xlsx';
				$result=file_put_contents('assets/gig/'.$image,$data1);
			}
			exit;
		}

		public function leadSource()
 	 {
 		 $t['title'] = "Lead Source";
 		 $this->load->view('freelancer/header',$t);
 		 $this->load->view('freelancer/leadsource');
 		 $this->load->view('freelancer/footer');
 	 }

 	 public function getleadSource()
 	{
 		$array = file_get_contents('php://input');
 		$results =json_decode($array);
 		$page = $results->page;
 		$config = array();

		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}

 		$data['pcount'] = $this->common->count_all_results('lead_source',array("userId"=>$userid));
 		$config["total_rows"] = $this->common->count_all_results('lead_source',array("userId"=>$userid));
 		$config["per_page"] = 10;
 		$this->pagination->initialize($config);
 		if( $page <= 0 )
 		{
 			$page = 1;
 		}
 		$start = ($page-1) * $config["per_page"];
 		if(!empty($page))
 		{
 			$res = $this->common->getleadsource(array("userId"=>$userid),$start,$config["per_page"]);
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

	public function getleadSourceDelete()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$res = $this->common->delete('lead_source',array("lead_sourceId"=>$results->id));

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

	public function leadSourceSave()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}

		$check = $this->common->getrow('lead_source',array("source"=>$results->source,"userId"=>$userid));

		if(!empty($check))
		{
     $data['already'] ="true";
		}
		else
		{

		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}
		$results->userId = $userid;
		$res = $this->common->insert('lead_source',$results);
    if($res)
	  {
		 $data['message'] ="true";
	  }
	  else
	  {
		 $data['message'] ="false";
	  }
  }

	 echo json_encode($data);
	 exit;
	}

	public function leadSourceEdit()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->getrow('lead_source',array("lead_sourceId"=>$results->id));
    if($result)
	  {
		 $data['message'] ="true";
		 $data['result'] =$result;
	  }
	  else
	  {
		 $data['message'] ="false";
	  }


	 echo json_encode($data);
	 exit;
	}

	public function leadSourceUpdate()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->update(array("lead_sourceId"=>$results->lead_sourceId),$results,'lead_source');
    if($result)
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

	public function getallleadsource()
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}
		$result = $this->common->get('lead_source',array("userId"=>$userid));

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

	public function buygig($id)
	{
		$data['gigId'] = $id;
		$this->load->view('freelancer/header');
		$this->load->view('freelancer/buygig',$data);
		$this->load->view('freelancer/footer');
	}

	public function getbuygig()
	{
		$array = file_get_contents('php://input');
 		$results =json_decode($array);
 		$page = $results->page;
 		$config = array();
 		$data['pcount'] = $this->common->count_all_results('user_gig_buy',array("userId"=>$this->session->userdata['clientloggedin']['id'],"gigId"=>$results->gigId));
 		$config["total_rows"] = $this->common->count_all_results('user_gig_buy',array("userId"=>$this->session->userdata['clientloggedin']['id'],"gigId"=>$results->gigId));
 		$config["per_page"] = 10;
 		$this->pagination->initialize($config);
 		if( $page <= 0 )
 		{
 			$page = 1;
 		}
 		$start = ($page-1) * $config["per_page"];
 		if(!empty($page))
 		{
 			$res = $this->common->getclientBuygig(array("b.gigId"=>$results->gigId,"t.milestone"=>1),$start,$config["per_page"]);
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

	public function buygigdetail($id)
	{
		$data['gigId'] = $id;
		$this->load->view('freelancer/header');
		$this->load->view('freelancer/buygigdetail',$data);
		$this->load->view('freelancer/footer');
	}

	public function getbuygigdetail()
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
				 		$result->milestone[$key]->paymentStatus = $payment->paymentStatus;
			 		}
		 		else
			 		{
			 			$result->milestone[$key]->receivedAmount = '';
			 			$result->milestone[$key]->paymentStatus = '';
			 		}
			}
		}

		// if($result->milestone)
		// {
		// 	foreach($result->milestone as $key=>$m)
		// 	{
		// 		foreach($m->task as $k=>$t)
		// 		{
		// 		  $status = $this->common->getrow('gigClientStatus',array("todoId"=>$t->id,"gigId"=>$result->gigId,"user_gig_buyId"=>$results->id));
		// 			if(!empty($status))
		// 			{
		// 			 $result->milestone[$key]->task[$k]->clientStatus = $status->clientStatus;
		// 			}
		// 			else
		// 			{
		// 				$result->milestone[$key]->task[$k]->clientStatus = '';
		// 			}
		// 		}
		// 	}
		// }


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

	public function getgiglog($id)
	{
		 $logs = $this->common->get('user_log',array("logType"=>'gig','logSubType'=>'contract','logReference'=>$id));

		if(!empty($logs))
		{
			foreach($logs as $key=>$res)
			{
			$user = $this->common->getrow('user_meta',array("u_Id"=>$res->userId));
			$logs[$key]->name = $user->name;
			$logs[$key]->comment = $this->common->getcomment(array("log.logReference"=>$res->logId,"logSubType"=>'comment',"logType"=>'gig'));

			}
		}

		if($logs)
		{
		$msg['message'] = "true";
		$msg['result'] = $logs;
		}
		else
		{
			$msg['message'] = "false";
			$msg['result'] = '';
		}
		echo json_encode($msg);
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

		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}

		$insert=array(
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'overall','reviewOverall'=>$results->overall),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'communication','reviewOverall'=>$results->communication * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'skill','reviewOverall'=>$results->skill * 0.40),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'rehire','reviewOverall'=>$results->rehire * 0.40),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'quality','reviewOverall'=>$results->quality * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'deadline','reviewOverall'=>$results->deadline * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'cooperation','reviewOverall'=>$results->cooperation * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'cost','reviewOverall'=>$results->cost * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'availability','reviewOverall'=>$results->availability * 0.20),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'review','reviewOverall'=>$results->review),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'total','reviewOverall'=>$t),
		array('user_gig_buyId'=>$results->user_gig_buyId, 'reviewTo'=>$results->clientId,'reviewFrom'=>$userid,'reviewType'=>'star','reviewOverall'=>$results->total)
		);

		$review = $this->common->insert_batch('user_review',$insert);
		$contract = $this->common->update(array("user_gig_buyId"=>$results->user_gig_buyId),array("status"=>2,"endDate"=>$date,"userEnd"=>1),'user_gig_buy');

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
		 $this->common->insert('userEarning',array("user_gig_buyId"=>$results->user_gig_buyId,"userId"=>$results->clientId,"userEarningAmount"=>$usdAmount,"date"=>$date));
		 $this->common->insert('userEarning',array("user_gig_buyId"=>$results->user_gig_buyId,"userId"=>$userid,"userEarningAmount"=>$usdAmount,"date"=>$date));
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

	public function getInterviewers()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$name = $results->name;
		if(!empty($results->date))
		{
      $date = date("Y-m-d",strtotime($results->date));
		}
		else
		{
		  $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
 		  $date =  $nowUtc->format('Y-m-d H:i:s');
		}
		if(!empty($results->time))
		{
    $time = $results->time;
		$array = explode(" ",$time);
		}
		else
		{
		 $time ='';
		}
		$parent = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($parent->parent == 0)
		{
			$userid = $this->session->userdata['clientloggedin']['id'];
		}
		else if($parent->parent != 0)
		{
		 $userid = $parent->parent;
		}
	  $users = $this->common->getinterviewersbyTime($date);
		$selected = array();
	  if(!empty($users))
		{
			foreach($users as $u)
			{
				$array1 = explode(" ",$u->time);
				$to_time = strtotime($array1[0]);
        $from_time = strtotime($array[0]);
        $differ = round(abs($to_time - $from_time) / 60,2);
				if($differ < 30)
				{
					$selected[] = $u->userId;
				}
			}
		}

		if(isset($name))
		{
			 $result = $this->common->getinterviewers('m.name',$name,array("u.parent"=>$userid),$selected);
		}

		 if($result)
		 {
			 $msg['message']="true";
			 $msg['result'] = $result;
		 }
		 else
		 {
			 $msg['message']="false";
			 $msg['result'] = '';
		 }
		 echo json_encode($msg);
		 exit;
	}

	public function resignationEdit()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->getrow('resignation',array("id"=>$results->id));
		$result->leaveDate = date("d-m-Y",strtotime($result->leaveDate));
		if($result)
		{
			$output['message'] = "true";
			$output['result'] = $result;
		}
		else
		{
			$output['message'] = "false";
			$output['result'] = '';
		}
		echo json_encode($output);
		exit;
	}

	public function resignationUpdate()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
    $results->leaveDate = date("Y-m-d",strtotime($results->leaveDate));
		$result = $this->common->update(array("id"=>$results->id),array("leaveDate"=>$results->leaveDate),'resignation');

		if($result)
		{
			$output['message'] = "true";
		}
		else
		{
			$output['message'] = "false";
		}
		echo json_encode($output);
		exit;
	}

	 public function getPerformanceSetting()
  {
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}
		$result = $this->common->allteam(array("us.parent"=>$userid));
		if(!empty($result))
		{
			foreach($result as $key=>$r)
			{
				$result[$key]->joiningdate = date("d-m-Y", strtotime($r->joiningdate));
				$duration = $this->common->getrow('performance_duration',array("userId"=>$r->u_id));
				if(!empty($duration))
				{
				  $result[$key]->duration = $duration->duration;
				}
				else
				{
					$result[$key]->duration = '';
				}
			}
		}

		if($result)
		{
			$data['message'] = "true";
			$data['result'] = $result;
		}
		else
		{
			$data['message'] = "false";
		}
		echo json_encode($data);
		die;
  }

	public function PerformanceSettingUpdate()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$check = $this->common->getrow('performance_duration',array("userId"=>$results->userId));
		if(!empty($check))
		{
		 $update = $this->common->update(array("userId"=>$results->userId),array("duration"=>$results->duration),'performance_duration');
		}
		else
		{
			$update = $this->common->insert('performance_duration',array("duration"=>$results->duration,"userId"=>$results->userId));
		}

		if($update)
		{
			$output['message'] ="true";
		}
		else
		{
			$output['message'] ="false";
		}
		echo json_encode($output);
		exit;
	}

	public function performanceUserdetail()
	{
			 $array = file_get_contents('php://input');
			 $results =json_decode($array);
			 $userId = $results->userId;
			 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	 		 $date =  $nowUtc->format('d-m-Y');
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
				$result->joiningdate = date("d-m-Y", strtotime($result->joiningdate));
				$result->date = $date;
				$performance = $this->common->getOneRow('performance',array("employeeId"=>$result->u_id),'perId','Desc');
				// $performance->reviewer = $this->common->get('performance_reviewer',array("perId"=>$performance->perId));
				$hrprofile = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));

				if(!empty($hrprofile))
				{
					$formdata = $this->common->getrow('performance_form',array("departmentId"=>$hrprofile->department));
				}

				if(!empty($formdata))
				{
					$result->primary = $this->common->get('performance_form_primary',array("performance_formId"=>$formdata->performance_formId));
			 		if($result->primary)
			 		{
			 		  foreach($result->primary as $k=>$p)
			 		  {
			 			 $result->primary[$k]->criteria = $this->common->get('performance_form_criteria',array("performance_form_primaryId"=>$p->performance_form_primaryId));
			 		  }
			 		}
				}
				if($performance)
				{
         $result->lastreviewdate = $performance->date;
				}
				else
				{
				 $result->lastreviewdate = '';
				}
			}
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

	public function resignationDownload($id)
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}
		$logo = $this->common->getrow('user_meta',array("u_id"=>$userid));

		$data['result'] = $this->common->getrow('resignation',array("id"=>$id));
		$data['user'] = $this->common->getrow('user_meta',array("u_id"=>$data['result']->employeeId));
		if($logo->company_logo)
		{
		$data['logo'] = $logo->company_logo;
	  }
		else
		{
			$data['logo'] = '';
		}
		$data['address'] = $logo->address1;
		$html = $this->load->view('email/resignationPdf',$data,TRUE);
		$pdfFilePath = $data['user']->name."_resignation.pdf";
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath, "I");
	}

	public function interviewStatus()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
	  if($user->parent == 0)
	  {
		 $userid = $user->id;
	  }
	  else
	  {
		 $userid = $user->parent;
	  }

		$result = $this->common->update(array("interviewId"=>$results->interviewId),array("interviewStatus"=>$results->interviewStatus),'interview');

		if($results->interviewStatus == 5)
		{
			$interview = $this->common->getrow('interview',array("interviewId"=>$results->interviewId));
			$candidate = $this->common->getrow('candidate',array("candidateId"=>$interview->candidateId));
			$vaccany = $this->common->common->getrow('vacancy',array("vacancyId"=>$interview->vacancyId));

			$m = $candidate->candidateName." hired as a ".$vaccany->vacancyPosition;

			$Notificationdata = array(
			"notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
			"notificationTo" =>$userid,
			"notificationMessage" => $m,
			"notificationDate" => $date,
			"notificationStatus" => 0,
			"notificationDeleted" =>0,
		);
		$notification = $this->common->insert('user_notification',$Notificationdata);
    if($interview->mailSend == 0)
		{
	      $hr = $this->common->getSingleUser(array("us.parent"=>$userid,"us.access"=>5));
				$company = $this->common->getrow('user_meta',array("u_id"=>$userid));
				$department = $this->common->getrow('department',array("id"=>$vaccany->departmentId));
				$detail['name']  = $candidate->candidateName;
				$detail['company']  = $company->c_name;
				$detail['hr']  = $hr->name;
				if(!empty($department))
				{
				$detail['department'] = $department->department;
				}
				else
				{
					$detail['department'] = '';
				}
				$detail['vacancyPosition']  = $vaccany->vacancyPosition;
				$message = $this->load->view('email/hiredCandidate',$detail,true);
				$mail =	 $this->mailsend('Hired',$candidate->candidateEmail,$message);
				$this->common->update(array('interviewId'=>$results->interviewId),array("mailsend"=>1),'interview');
			}

	  }
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

	public function assignLeave()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$update = $this->common->update(array("id"=>$results->id),array("reviewerId"=>$results->reviewerId),'user_leave');
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

	public function leave_approval()
	{
		$t['title'] ="Leave Approval Request";
		$this->load->view('freelancer/header',$t);
		$this->load->view('freelancer/leaveApprovalRequest');
		$this->load->view('freelancer/footer');
	}

	public function getleaveapproval()
	{


		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$config = array();

		if(!empty($page))
		{
			 $data['pcount'] = $this->common->count_all_results('user_leave',array("reviewerId"=>$this->session->userdata['clientloggedin']['id']));
			 $config["total_rows"] = $this->common->count_all_results('user_leave',array("reviewerId"=>$this->session->userdata['clientloggedin']['id']));
		}

		$config["per_page"] = $results->perpage;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$result = $this->common->getbyLimitorderbyId('user_leave',array("reviewerId"=>$this->session->userdata['clientloggedin']['id']),$start,$config["per_page"]);
		}

		if($result)
		{
			foreach($result as $k=>$r)
			{
				$n = $this->common->getrow('user_meta',array("u_id"=>$r->employeeId));
				$x = $this->common->getrow('leavetype',array("id"=>$r->type));

				$result[$k]->name =$n->name;
				$result[$k]->image = $n->logo;
				$result[$k]->type = $x->type;

			}
		}

	 if($result)
		{
			$data['message'] ="true";
			$data['result'] = $result;
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

	public function employeeleaveStatus()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$lastday = '';
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');
		$parent =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($parent->parent == 0)
		{
		 $parentId = $parent->id;
		}
		else
		{
			$parentId = $parent->parent;
		}
		$user = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));
		$hr = $this->common->getrow('user',array("parent"=>$parentId,"access"=>3));
		$leave = $this->common->getrow('user_leave',array("id"=>$results->id));
		$type = $this->common->getrow('leavetype',array("id"=>$leave->type));
		$leaveuser = $this->common->getSingleUser(array("us.id"=>$results->userId));

      if(!empty($results->reason))
			{
				$u = $this->common->update(array("id"=>$results->id),array("status"=>$results->status,"actionBy"=>$this->session->userdata['clientloggedin']['id'],"reviewerId"=>$this->session->userdata['clientloggedin']['id'],"reason"=>$results->reason),'user_leave');
			}
			else
			{
		   $u = $this->common->update(array("id"=>$results->id),array("actionBy"=>$this->session->userdata['clientloggedin']['id'],"status"=>$results->status),'user_leave');

		  }

		if($u)
		{
			$a['notificationTo'] = $results->userId;
			$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
			$lastId = $lastrecord->notificationId;
			$lastId = $lastId + 1;
			$url = $this->session->userdata['clientloggedin']['url'];
			$aurl = $this->session->userdata['clientloggedin']['aurl'];
			$main = base_urL().'employee-leave/'.$url.'/'.$aurl;
			$a['notificationFrom'] = $user->parent;
			$a['notificationStatus'] = 0;
			$a['notificationType'] = "leave";
			$a['notificationMessage'] = "You have a new notification of <b>leave</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
			$a['notificationDate'] = $date;
			$this->notificationSave($a);
		}

		if($u)
		{
			 $a['notificationTo'] = $hr->id;
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;
				$url = $this->session->userdata['clientloggedin']['url'];
				$aurl = $this->session->userdata['clientloggedin']['aurl'];
				$main = base_urL().'leave-list/'.$url.'/'.$aurl;
				$a['notificationFrom'] = $this->session->userdata['clientloggedin']['id'];
				$a['notificationStatus'] = 0;
				$a['notificationType'] = "leave";
				$a['notificationMessage'] = "You have a new notification of <b>leave</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				$a['notificationDate'] = $date;
				$this->notificationSave($a);
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

	public function taskactive()
	{
		  $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		  $date =  $nowUtc->format('Y-m-d');
     	$pending = $this->common->count_today_ActiveTask('todoList',array("assignedBy"=>$this->session->userdata['clientloggedin']['id'],"status"=>2),$date);
     	$active = $this->common->count_today_ActiveTask('todoList',array("assignedBy"=>$this->session->userdata['clientloggedin']['id'],"status"=>1),$date);

			$output['success'] = "true";
			$output['pending'] = $pending;
			$output['active'] = $active;
			echo json_encode($output);
			exit;
	}

	public function getrejectionreason()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$res = $this->common->getrow('user_leave',array("id"=>$results->id));
		if($res)
		{
			$msg['success'] ="true";
			$msg['result'] = $res;
		}
		else
		{
			$msg['success'] ="false";
		}
		echo json_encode($msg);
		exit;
	}

	public function getcurreenttodo()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$status ='';
		$priority ='';
		$assign ='';
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');
		$nowtime = $nowUtc->format('Y-m-d H:i:s');
		$timez = 0;
		if(isset($results->status))
		{
			$status = $results->status;
		}
		if(isset($results->priority))
		{
			$priority = $results->priority;
		}

		if(isset($results->assign))
		{
		 $assign = $results->assign;
		}
		$config = array();
		$parent =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($parent->parent == 0)
		{
		 $parentId = $parent->id;
		}
		else
		{
			$parentId = $parent->parent;
		}
		$timezone = $this->common->getrow('user_paymentmethod',array("userId"=>$parentId));

		if(!empty($timezone->zone))
		{
				$zone = explode(":",$timezone->zone);
				$h = $zone[0].' Hours';
				$m = $zone[1].' Minutes';
				$timez = $h.' '.$m;
		}

		if(!empty($page))
		{
			 $data['pcount'] = $this->common->count_currenttodo($this->session->userdata['clientloggedin']['id'],$date,$status,$priority,$assign);
			 $config["total_rows"] = $this->common->count_currenttodo($this->session->userdata['clientloggedin']['id'],$date,$status,$priority,$assign);
		}

		$config["per_page"] = $results->perpage;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$res = $this->common->getcurrenttodolist($this->session->userdata['clientloggedin']['id'],$date,$status,$priority,$assign,$start,$config["per_page"]);
      $data['duetask'] = $this->common->count_duetask($this->session->userdata['clientloggedin']['id'],$date);
		}


		if(!empty($res))
		{
			foreach($res as $key=>$r)
			{
				// echo $date."<br>";
				// echo $r->dueDate;
				// die;
				if($r->dueDate < $date)
				{
					$res[$key]->duetask = 1;
				}
				else
				{
					$res[$key]->duetask = 0;
				}
				$lasttimer = array();
				if($r->status == 5)
				{
				$lasttimer = $this->common->getOneRow('todoList_billing',array("userId"=>$r->assignedTo,"todoListId"=>$r->id,"taskId"=>$r->taskId,"todoListId"=>$r->id),'todolist_billingId',"desc");
			  }
				$time = $this->common->sum_todotask_time(array("todoListId"=>$r->id,"userId"=>$r->assignedTo,"taskId"=>$r->taskId));
				$atime = $this->common->sum_todotask_time(array("todoListId"=>$r->id));
        $minutesRunning = 0;
				$d1 = '';
				$d = '';
				if(!empty($lasttimer))
				{

					$start_date = new DateTime($lasttimer->startTime);
					$since_start = $start_date->diff(new DateTime($nowtime));
					$minutesRunning = $since_start->days * 24 * 60;
					$minutesRunning += $since_start->h * 60;
					$minutesRunning += $since_start->i;
				}

				if($time->time != 0)
				{
					 $time->time = $minutesRunning + $time->time;
					 $hours = floor($time->time / 60);
					 if($hours < 10)
					 {
						 $hours = '0'.$hours;
					 }
					 $minutes = ($time->time % 60);
					 if($minutes < 10)
					 {
						 $minutes = '0'.$minutes;
					 }
					 $d = $hours.':'.$minutes;
					 $res[$key]->time = $d;
				}
				else if($time->time == 0 && $minutesRunning != 0)
				{

					$hours = floor($minutesRunning / 60);
					if($hours < 10)
					{
						$hours = '0'.$hours;
					}
					$minutes = ($minutesRunning % 60);
					if($minutes < 10)
					{
						$minutes = '0'.$minutes;
					}
					$d = $hours.':'.$minutes;
					$res[$key]->time = $d;
				}
				else
				{
					$res[$key]->time = "00:00";
				}

				if($atime->time != 0)
				{
					 $hours1 = floor($atime->time / 60);
					 if($hours1 < 10)
					 {
						 $hours1 = '0'.$hours1;
					 }
					 $minutes1 = ($atime->time % 60);
					 if($minutes1 < 10)
					 {
						 $minutes1 = '0'.$minutes1;
					 }
					 $d1 = $hours1.':'.$minutes1;
					 $res[$key]->totaltime = $d1;
				}
				else
				{
					$res[$key]->totaltime = "00:00";
				}

				if(!empty($r->date))
				{
				$start1 = strtotime($timez, strtotime($r->date));
				if($start1)
				  {
				   $res[$key]->date = date('Y-m-d H:i:s', $start1);
				  }
			  }
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

	public function getoverduetodo()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$status ='';
		$priority ='';
		$assign ='';
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');
		$nowtime = $nowUtc->format('Y-m-d');
		$timez = 0;
		if(isset($results->status))
		{
			$status = $results->status;
		}
		if(isset($results->priority))
		{
			$priority = $results->priority;
		}

		if(isset($results->assign))
		{
		 $assign = $results->assign;
		}
		$config = array();
		$parent =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($parent->parent == 0)
		{
		 $parentId = $parent->id;
		}
		else
		{
			$parentId = $parent->parent;
		}
		$timezone = $this->common->getrow('user_paymentmethod',array("userId"=>$parentId));

		if(!empty($timezone->zone))
		{
				$zone = explode(":",$timezone->zone);
				$h = $zone[0].' Hours';
				$m = $zone[1].' Minutes';
				$timez = $h.' '.$m;
		}

		if(!empty($page))
		{
			 $data['pcount'] = $this->common->count_overduetodo($this->session->userdata['clientloggedin']['id'],$date,array("t.saved"=>0,"t.milestone"=>0));
			 $config["total_rows"] = $this->common->count_overduetodo($this->session->userdata['clientloggedin']['id'],$date,array("t.saved"=>0,"t.milestone"=>0));
		}

		$config["per_page"] = $results->perpage;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$res = $this->common->getoverduetodolist($this->session->userdata['clientloggedin']['id'],$date,array("t.saved"=>0,"t.milestone"=>0),$start,$config["per_page"]);
		}

		if(!empty($res))
		{
			foreach($res as $key=>$r)
			{

				if($r->dueDate < $date)
				{
					$res[$key]->duetask = 1;
				}
				else
				{
					$res[$key]->duetask = 0;
				}
				$lasttimer = array();
				if($r->status == 5)
				{
				$lasttimer = $this->common->getOneRow('todoList_billing',array("userId"=>$r->assignedTo,"todoListId"=>$r->id,"taskId"=>$r->taskId,"todoListId"=>$r->id),'todolist_billingId',"desc");
				}
				$time = $this->common->sum_todotask_time(array("todoListId"=>$r->id,"userId"=>$r->assignedTo,"taskId"=>$r->taskId));
				$atime = $this->common->sum_todotask_time(array("todoListId"=>$r->id));
				$minutesRunning = 0;
				$d1 = '';
				$d = '';
				if(!empty($lasttimer))
				{

					$start_date = new DateTime($lasttimer->startTime);
					$since_start = $start_date->diff(new DateTime($nowtime));
					$minutesRunning = $since_start->days * 24 * 60;
					$minutesRunning += $since_start->h * 60;
					$minutesRunning += $since_start->i;
				}

				if($time->time != 0)
				{
					 $time->time = $minutesRunning + $time->time;
					 $hours = floor($time->time / 60);
					 if($hours < 10)
					 {
						 $hours = '0'.$hours;
					 }
					 $minutes = ($time->time % 60);
					 if($minutes < 10)
					 {
						 $minutes = '0'.$minutes;
					 }
					 $d = $hours.':'.$minutes;
					 $res[$key]->time = $d;
				}
				else if($time->time == 0 && $minutesRunning != 0)
				{

					$hours = floor($minutesRunning / 60);
					if($hours < 10)
					{
						$hours = '0'.$hours;
					}
					$minutes = ($minutesRunning % 60);
					if($minutes < 10)
					{
						$minutes = '0'.$minutes;
					}
					$d = $hours.':'.$minutes;
					$res[$key]->time = $d;
				}
				else
				{
					$res[$key]->time = "00:00";
				}

				if($atime->time != 0)
				{
					 $hours1 = floor($atime->time / 60);
					 if($hours1 < 10)
					 {
						 $hours1 = '0'.$hours1;
					 }
					 $minutes1 = ($atime->time % 60);
					 if($minutes1 < 10)
					 {
						 $minutes1 = '0'.$minutes1;
					 }
					 $d1 = $hours1.':'.$minutes1;
					 $res[$key]->totaltime = $d1;
				}
				else
				{
					$res[$key]->totaltime = "00:00";
				}

				if(!empty($r->date))
				{
				$start1 = strtotime($timez, strtotime($r->date));
				if($start1)
					{
					 $res[$key]->date = date('Y-m-d H:i:s', $start1);
					}
				}
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

	public function resignationReason()
  {
      $array = file_get_contents('php://input');
			$results =json_decode($array);
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d');
			$users = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($users->parent == 0)
			{
			 $userid = $users->id;
			}
			else
			{
				$userid = $users->parent;
			}
			$hr = $this->common->getSingleUser(array("us.id"=>$this->session->userdata['clientloggedin']['id']));
			$userdetail = $this->common->getrow('user_meta',array("u_id"=>$results->userId));
       $d['status'] = $results->status;
       $d['reason'] = $results->reason;
			$u = $this->common->update(array("id"=>$results->id),$d,'resignation');
			if($u)
			{
			  if($results->status == 2)
				{
					$m ="Resignation rejected ";
        }
				else if($results->status == 3)
				{
					$m ="Resignation Cancelled";
				}

				$Notificationdata = array(
					"notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
					"notificationTo" =>$results->userId,
					"notificationMessage" => $m,
					"notificationDate" => $date,
					"notificationStatus" => 0,
					"notificationDeleted" =>0,
				);
				$notification = $this->common->insert('user_notification',$Notificationdata);
			}

			if($notification)
			{
				if($results->status == 1)
				{
				 $m1 = $userdetail->name. " Resignation accepted ";
				}
				else if($results->status == 2)
				{
					$m1 = $userdetail->name. " Resignation rejected ";
				}
				else if($results->status == 3)
				{
					$m1 = $userdetail->name. " Resignation rejected ";
				}

				$Notificationdata = array(
					"notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
					"notificationTo" =>$userid,
					"notificationMessage" => $m1,
					"notificationDate" => $date,
					"notificationStatus" => 0,
					"notificationDeleted" =>0,
				);
				$notification1 = $this->common->insert('user_notification',$Notificationdata);
			}


      if($notification1)
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

		public function performancesetting()
		{
			$this->load->view('freelancer/header');
			$this->load->view('freelancer/performance_setting');
			$this->load->view('freelancer/footer');
		}

		public function tasksetting()
		{
			$this->load->view('freelancer/header');
			$this->load->view('freelancer/task_setting');
			$this->load->view('freelancer/footer');
		}

		public function gettasksetting()
		{
			$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		 if($user->parent == 0)
		 {
			 $userId = $this->session->userdata['clientloggedin']['id'];
		 }

		 else if($user->parent != 0)
		 {
			$userId = $user->parent;
		 }
			$res = $this->common->getrow('task_setting',array("userId"=>$userId));
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

		public function tasksettingUpdate()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		 if($user->parent == 0)
		 {
			 $userId = $this->session->userdata['clientloggedin']['id'];
		 }
		 else if($user->parent != 0)
		 {
			$userId = $user->parent;
		 }
		 $results->userId = $userId;
		 $check = $this->common->getrow('task_setting',array("userId"=>$userId));
		 if(!empty($check))
		 {
		 $res = $this->common->update(array("userId"=>$userId),$results,'task_setting');
		 }
		 else
		 {
			 $res = $this->common->insert('task_setting',$results);
		 }
			if($res)
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

		public function taskcheck()
		{
			$minutespop = 0;
			$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		  if($user->parent == 0)
		  {
			  $userId = $this->session->userdata['clientloggedin']['id'];
		  }
		  else if($user->parent != 0)
		  {
			 $userId = $user->parent;
		  }

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
      $nowtime = $nowUtc->format('Y-m-d H:i:s');
		  $active = $this->common->getrow('todoList',array("assignedTo"=>$this->session->userdata['clientloggedin']['id'],"status"=>5));
		  if(!empty($active))
		  {
			  $tasksetting = $this->common->getrow('task_setting',array("userId"=>$userId));
				$tasktime = $this->common->getOneRow('todoList_billing',array("todoListId"=>$active->id),'todolist_billingId','Desc');
        if(!empty($tasksetting))
				{
				 $start = new DateTime($tasktime->yesTime);
				 $since_start = $start->diff(new DateTime($nowtime));
				 $minutes = $since_start->days * 24 * 60;
				 $minutes += $since_start->h * 60;
				 $minutes += $since_start->i;

        // if(!empty($tasksetting)
				// {

				if(!empty($tasktime->flashTime))
				{
				 $startpop = new DateTime($tasktime->flashTime);
				 $since_startpop = $startpop->diff(new DateTime($nowtime));
				 $minutespop = $since_startpop->days * 24 * 60;
				 $minutespop += $since_startpop->h * 60;
				 $minutespop += $since_startpop->i;
			  }
        if(!empty($tasksetting->taskInactivityStart) &&  $tasksetting->taskInactivityEnd )
				{
				$random =  rand($tasksetting->taskInactivityStart,$tasksetting->taskInactivityEnd);
			  }
				else
				{
				 $random = 10;
				}


				if($tasktime->popup == 0 && $minutes > $random)
				{
					$this->common->update(array("todoListId"=>$active->id),array("flashTime"=>$nowtime,"popup"=>1),'todoList_billing');

					$msg['success'] ="true";
					$msg['notification'] ="false";
				}
				else if($tasktime->popup == 1  && $minutespop < $tasksetting->taskQuestionTime)
				{

				   $msg['success'] ="true";
				   $msg['notification'] ="true";
				 }
				else if($tasktime->popup == 1 && $minutespop >= $tasksetting->taskQuestionTime)
				{
					 $msg['success'] ="false";
					 $msg['notification'] ="false";

				}
				else
				{
					$msg['error'] ="true";
				}
			}
				else
				{
					$msg['error'] ="true";

				}
		  }
			else
			{
			 $msg['error'] ="true";
			}
      echo json_encode($msg);
			exit;
		}

		public function taskcheckOld()
		{
			$minutespop = 0;
			$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
				$userId = $this->session->userdata['clientloggedin']['id'];
			}
			else if($user->parent != 0)
			{
			 $userId = $user->parent;
			}

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$nowtime = $nowUtc->format('Y-m-d H:i:s');
			$active = $this->common->getrow('todoList',array("assignedTo"=>$this->session->userdata['clientloggedin']['id'],"status"=>5));
			if(!empty($active))
			{
				$tasksetting = $this->common->getrow('task_setting',array("userId"=>$userId));
				$tasktime = $this->common->getOneRow('todoList_billing',array("todoListId"=>$active->id),'todolist_billingId','Desc');

				$start = new DateTime($tasktime->yesTime);
				$since_start = $start->diff(new DateTime($nowtime));
				$minutes = $since_start->days * 24 * 60;
				$minutes += $since_start->h * 60;
				$minutes += $since_start->i;



				if(!empty($tasktime->flashTime))
				{
				 $startpop = new DateTime($tasktime->flashTime);
				 $since_startpop = $startpop->diff(new DateTime($nowtime));
				 $minutespop = $since_startpop->days * 24 * 60;
				 $minutespop += $since_startpop->h * 60;
				 $minutespop += $since_startpop->i;
				}

				// echo $minutespop."<br>";
				// echo $tasksetting->taskQuestionTime;
				// die;

				$random =  rand($tasksetting->taskInactivityStart,$tasksetting->taskInactivityEnd);

// tasksetting->taskInactivityStart
				if($minutespop == 0 && $minutes < $random)
				{
					$this->common->update(array("todoListId"=>$active->id),array("flashTime"=>$nowtime),'todoList_billing');

					$msg['success'] ="true";
					$msg['notification'] ="true";
				}
				 else if($minutespop != 0  && $minutespop < $tasksetting->taskQuestionTime)
				 {
					echo "second";
					die;
					 $msg['success'] ="true";
					 $msg['notification'] ="true";
				 }
				else if($minutespop != 0 && $minutespop > $tasksetting->taskQuestionTime)
				{
					 $msg['success'] ="false";
					 $msg['notification'] ="false";
				}
				else
				{
					$msg['error'] ="true";
				}
			}
			else
			{
			 $msg['error'] ="true";
			}
			echo json_encode($msg);
			exit;
		}

		public function taskstopAutomatically()
		{
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$active = $this->common->getrow('todoList',array("assignedTo"=>$this->session->userdata['clientloggedin']['id'],"status"=>5));
			$user =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
				$userId = $this->session->userdata['clientloggedin']['id'];
			}
			else if($user->parent != 0)
			{
			 $userId = $user->parent;
			}
			$tasksetting = $this->common->getrow('task_setting',array("userId"=>$userId));
			if(!empty($active))
			{
			  $lasttimer = $this->common->getOneRow('todoList_billing',array("userId"=>$this->session->userdata['clientloggedin']['id'],"todoListId"=>$active->id),'todolist_billingId',"desc");

			  if($lasttimer)
			 {
				 if(!empty($tasksetting->taskAllowedGrace))
				 {
					 $grace = $tasksetting->taskAllowedGrace;
				 }
				 else
				 {
					 $grace = 0;
				 }
				$endTime = strtotime('+' .$grace. "minutes",strtotime($lasttimer->yesTime));
				$r['endTime'] = date('Y-m-d H:i:s', $endTime);
				$start_date = new DateTime($lasttimer->startTime);
				$since_start = $start_date->diff(new DateTime($r['endTime']));
				$minutes = $since_start->days * 24 * 60;
				$minutes += $since_start->h * 60;
				$minutes += $since_start->i;
			  $r['time'] = $minutes;
			  $r['popup'] = 0;
			  $r['status'] = 2;
		    $updates = $this->common->update(array("id"=>$active->id),array("status"=>7,"ended"=>1,"started"=>1),'todoList');
		    if($updates)
		    {
			  $update = $this->common->update(array("todolist_billingId"=>$lasttimer->todolist_billingId),$r,'todoList_billing');
		    }
			  if($update)
			  {
			    $last = $this->common->getrow('todoList_billing',array("todolist_billingId"=>$lasttimer->todolist_billingId,"userId"=>$this->session->userdata['clientloggedin']['id'],"taskId"=>$results->taskId));
				  $user = $this->common->getrow('user',array("id"=>$last->userId));
				  $todo = $this->common->getrow('todoList',array("id"=>$results->id));

				 if($todo->status == 1)
				 {
					 $status = 1;
				 }
				 else if($todo->status == 2)
				 {
					 $status = 0;
				 }
				 else
				 {
					 $status = 0;
				 }

			  if($todo->type == 1)
				{
					$a['task'] = 5;
				}
				else if($todo->type == 2)
				{
					$a['task'] = 9;
				}
				else if($todo->type == 3)
				{
					$a['task'] = 10;
				}
				else if($todo->type == 4)
				{
					$a['task'] = 11;
				}
					$a['taskDetail'] = $todo->name;
					$a['todoId'] = $todo->id;
					$a['taskId'] = $todo->taskId;
					$a['employeeId'] = $last->userId;
					$a['userId'] = $user->parent;
					$a['status'] = $status;
					$a['date'] = $nowUtc->format('Y-m-d H:i:s');
					$check = $this->common->getrow('dsr',array("todoId"=>$todo->id,"taskId"=>$todo->taskId,"date"=>$nowUtc->format('Y-m-d'),"employeeId"=>$last->userId));
				 if(empty($check))
				 {
					$dsrinsert =	$this->common->insert('dsr',$a);
				 }
			 }
			 if($update)
			 {
				 $msg['success'] ="true";
			 }
	   }
	  }
  }

	public function taskActivityUpdate()
	{
		$r = array();
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$active = $this->common->getrow('todoList',array("assignedTo"=>$this->session->userdata['clientloggedin']['id'],"status"=>5));
		if(!empty($active))
		{
			$lasttimer = $this->common->getOneRow('todoList_billing',array("userId"=>$this->session->userdata['clientloggedin']['id'],"todoListId"=>$active->id),'todolist_billingId',"desc");

		 if($lasttimer)
		 {
			$r['yesTime'] = $nowUtc->format('Y-m-d H:i:s');
			$r['popup'] = 0;
		 }


		 if(!empty($r))
		 {
			$result = $this->common->update(array("todoListId"=>$lasttimer->todoListId),$r,'todoList_billing');
		 }

		 if($result)
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
		  $output['message'] ="false";
		}

		 echo json_encode($output);
		 exit;

	}

	public function getresignationreason()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$res = $this->common->getrow('resignation',array("id"=>$results->id));
		if($res)
		{
			$msg['success'] ="true";
			$msg['result'] = $res;
		}
		else
		{
			$msg['success'] ="false";
		}
		echo json_encode($msg);
		exit;
	}

public function exportExpense($expense = null,$startdate = null,$enddate = null)
{
	$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	$date = $nowUtc->format('d-m-Y');

	if(!empty($startdate))
	{
	$startdate = date("Y-m-d", strtotime($startdate));
	$startdate1 = date("d_m_Y", strtotime($startdate));
  }
	else
	{
	 $startdate ='';
	}
	if(!empty($enddate))
	{
  $enddate = date("Y-m-d", strtotime($enddate));
  $enddate1 = date("d_m_Y", strtotime($enddate));
  }
	else
	{
	$enddate = '';
	}

  if(!empty($startdate) && !empty($enddate))
  {
		$fileName = 'expense-'.$startdate1.'-'.$enddate1.'.xlsx';
	 }
	else if($startdate == '' && $enddate == '')
	{
		$fileName = 'expense-'.$date.'.xlsx';
	}
  $this->load->library('excel');
	$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
	if($user->parent != 0)
	{
		$userid = $user->parent;
	}
	else
	{
		$userid = $user->id;
	}



	$results = $this->common->exportExpense(array("e.userId"=>$userid),$expense,$startdate,$enddate);

  $objPHPExcel = new PHPExcel();
  $objPHPExcel->setActiveSheetIndex(0);
	// set Header
	$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'S . No');
	$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Expense Name');
	$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Date');
	$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Paid By');
	$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Status');
	$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Currency');
	$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Amount');

		// set Row
		$rowCount = 2;
		$i = 1;
		if(!empty($results))
		{
		foreach ($results as $element)
		{
		$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
		$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->expense);
		$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, date("d-m-Y", strtotime($element->date)));
		if($element->paidBy == 1)
		{
		$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'Bank');
	  }
		else if($element->paidBy == 2)
		{
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'Cash');
		}
		else if($element->paidBy == 3)
		{
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'Paypal');
		}
		else if($element->paidBy == 4)
		{
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'Credit Card');
		}
		else if($element->paidBy == 5)
		{
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'Debit Card');
		}
		else
		{
				$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, '');
		}
		if($element->status == 1)
		{
		$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount,'Paid');
	  }
		else
		{
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount,'Unpaid');
		}
		$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->code.' '.$element->symbol);
		$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->amount);


		$rowCount++;
		$i++;

		}
	 }

		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$doc = $fileName;

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

		ob_end_clean();
		header('Content-type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="'.$doc.'"');


		$writer->save('php://output');
	}

	public function getallexpenseName()
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
			$userid = $user->parent;
		}
		else
		{
			$userid = $user->id;
		}

		$result = $this->common->getallexpenseName(array("userId"=>$userid));
		if($result)
		{
			$output['success'] ="true";
			$output['result'] = $result;
		}
		else
		{
			$output['success'] ="true";
			$output['result'] = '';
		}
		echo json_encode($output);
		exit;
	}

	public function getexpenseSuggestion()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
			$userid = $user->parent;
		}
		else
		{
			$userid = $user->id;
		}
		$result = $this->common->ExpenseSuggestion(array("userId"=>$userid),$results->expense);
		if($result)
		{
			$output['success'] ="true";
			$output['result'] = $result;
		}
		else
		{
			$output['success'] ="true";
			$output['result'] = '';
		}
		echo json_encode($output);
		exit;
	}

	public function incomeExport($client = null,$project = null,$startdate = null,$enddate =null)
	{
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date = $nowUtc->format('d-m-Y');
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		 if($user->parent == 0)
		{
			$userId = $user->id;
		}
		else
		{
			$userId = $user->parent;
		}
		$currency = $this->common->getuserlocalcurrency(array("userId"=>$userId));

		if(!empty($startdate))
		{
		$startdate = date("Y-m-d", strtotime($startdate));
		$startdate1 = date("d_m_Y", strtotime($startdate));
		}
		else
		{
		 $startdate ='';
		}
		if(!empty($enddate))
		{
		$enddate = date("Y-m-d", strtotime($enddate));
		$enddate1 = date("d_m_Y", strtotime($enddate));
		}
		else
		{
		$enddate = '';
		}

		if($startdate != ' ' && $enddate != ' ')
		{
			$fileName = 'income-'.$startdate1.'-'.$enddate1.'.xlsx';
		}
		else
		{
			$fileName = 'income-'.$date.'.xlsx';
		}
		$this->load->library('excel');


		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
			$userid = $user->parent;
		}
		else
		{
			$userid = $user->id;
		}

		if(!empty($client))
		{
		$client =	str_replace("-"," ",$client);
		}

		if(!empty($project))
		{
		$project =	str_replace("-"," ",$project);
		}


		$results = $this->common->exportIncome(array("userId"=>$userid),$client,$project,$startdate,$enddate);


		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0);
		// set Header
		$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'S . No');
		$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Client Name');
		$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Project');
		$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Currency');
		$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Amount');
		$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Received Amount('.$currency->code.' '.$currency->symbol.')');
		$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Status');
		$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Deposited');
		$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Received From');
		$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Date');

			// set Row
			$rowCount = 2;
			$i = 1;
			if(!empty($results))
			{
			foreach ($results as $element)
			{
			$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
			$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->client);
			$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->project);
			$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->code.' '.$element->symbol);
			$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->amount);
			$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->receivedAmount);

			if($element->status == 1)
			{
			$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 'Received');
			}
			else if($element->status == 2)
			{
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 'Pending');
			}

			if($element->deposited == 1)
			{
			$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount,'Bank');
			}
			else if($element->deposited == 2)
			{
				$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount,'Cash');
			}
			else if($element->deposited == 3)
			{
				$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount,'Other');
			}

			if($element->received == 1)
			{
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, 'Bank');
		  }
			else if($element->received == 2)
			{
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, 'Paypal');
			}
			else if($element->received == 3)
			{
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, 'Upwork');
			}
			else if($element->received == 4)
			{
			$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, 'Other');
			}
			$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, date("d-m-Y", strtotime($element->date)));


			$rowCount++;
			$i++;

			}
		 }

			$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$doc = $fileName;

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

			ob_end_clean();
			header('Content-type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="'.$doc.'"');
			$writer->save('php://output');
	}

	public function getincomeclientSuggestion()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
			$userid = $user->parent;
		}
		else
		{
			$userid = $user->id;
		}
		$result = $this->common->incomeclientSuggestion(array("userId"=>$userid));
		if($result)
		{
			$output['success'] ="true";
			$output['result'] = $result;
		}
		else
		{
			$output['success'] ="true";
			$output['result'] = '';
		}
		echo json_encode($output);
		exit;
	}

	public function getincomeproject()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
			$userid = $user->parent;
		}
		else
		{
			$userid = $user->id;
		}

    $result = $this->common->incomeprojectSuggestion(array("userId"=>$userid),$results->client);

		if($result)
		{
			$output['success'] ="true";
			$output['result'] = $result;
		}
		else
		{
			$output['success'] ="false";
			$output['result'] = '';
		}
		echo json_encode($output);
		exit;
	}

	public function getMonthExpense()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$config = array();
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
			$userId = $user->id;
		}
		else
		{
			$userId = $user->parent;
		}
		$result = array();
		$startdate ='';
		$enddate ='';
		$expense ='';
		if(!empty($results->startdate))
		{
		$startdate = date("Y-m-d", strtotime($results->startdate));
		}
		if(!empty($results->enddate))
		{
		$enddate = date("Y-m-d", strtotime($results->enddate));
		}
		if(!empty($results->expense))
		{
			$expense = $results->expense;
		}

		if(!empty($page))
		{
			 $data['pcount'] = $this->common->count_allexpense(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year),$startdate,$enddate,$expense);
			 $config["total_rows"] = $this->common->count_allexpense(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year),$startdate,$enddate,$expense);
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
			$result = $this->common->allexpense(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year),$startdate,$enddate,$expense,$start,$config["per_page"]);
			$paidtotal = $this->common->sum_expense(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year,"status"=>1,"deleted"=>0));
			$unpaidtotal = $this->common->sum_expense(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year,"status"=>2,"deleted"=>0));
			$total = $this->common->sum_expense(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year,"deleted"=>0));
		}
		if($result)
		{

			$data['message'] ="true";
			$data['result'] = $result;
			$data['month'] = date("F", mktime(0, 0, 0, $results->month, 10));
			$data['year'] = $results->year;
			$data['total'] = number_format($total->total,2);
			$data['paidtotal'] = number_format($paidtotal->total,2);
			$data['unpaidtotal'] = number_format($unpaidtotal->total,2);;

		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
			$data['month'] = date("F", mktime(0, 0, 0, $results->month, 10));
			$data['year'] = $results->year;
		}

		echo json_encode($data);
		exit;

	}

	public function getMonthIncome()
	{
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;
		 $config = array();
		 $startdate ='';
		 $enddate ='';
		 $project = '';
		 $client = '';
		 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		 if($user->parent == 0)
		 {
			 $userId = $user->id;
		 }
		 else
		 {
			 $userId = $user->parent;
		 }
		 if(!empty($results->startdate))
		 {
		 $startdate = date("Y-m-d", strtotime($results->startdate));
		 }
		 if(!empty($results->enddate))
		 {
		 $enddate = date("Y-m-d", strtotime($results->enddate));
		 }
		 if(!empty($results->sclient))
		 {
		 $client = $results->sclient;
		 }

		 if(!empty($results->sproject))
		 {
		 $project = $results->sproject;
		 }


		 $result = array();

		 if(!empty($page))
		 {
				$data['pcount'] = $this->common->count_allincome(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year),$startdate,$enddate,$client,$project);
				$config["total_rows"] = $this->common->count_allincome(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year),$startdate,$enddate,$client,$project);
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
			 $result = $this->common->allincome(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year),$startdate,$enddate,$client,$project,$start,$config["per_page"]);
			 $total = $this->common->sum_income_paid_amount(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year));
			 $totalreceived = $this->common->sum_income_received_amount(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year));
		 }

		 if($result)
		 {
			 $data['message'] ="true";
			 $data['result'] = $result;
			 $data['month'] = date("F", mktime(0, 0, 0, $results->month, 10));
 			 $data['year'] = $results->year;
 			 $data['total'] = number_format($total->total,2);
 			 $data['received'] = number_format($totalreceived->total,2);
		 }
		 else
		 {
			 $data['message'] ="false";
			 $data['result'] = '';
			 $data['month'] = date("F", mktime(0, 0, 0, $results->month, 10));
 			 $data['year'] = $results->year;
		 }

		 echo json_encode($data);
		 exit;
	}

	public function getincomeclientAutoSuggestion()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
			$userid = $user->parent;
		}
		else
		{
			$userid = $user->id;
		}
		$result = $this->common->incomeclientAutoSuggestion(array("userId"=>$userid),$results->client);
		if($result)
		{
			$output['success'] ="true";
			$output['result'] = $result;
		}
		else
		{
			$output['success'] ="true";
			$output['result'] = '';
		}
		echo json_encode($output);
		exit;
	}

	public function getincomeprojectAutoSuggestion()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
			$userid = $user->parent;
		}
		else
		{
			$userid = $user->id;
		}
		$result = $this->common->incomeprojectAutoSuggestion(array("userId"=>$userid),$results->project);
		if($result)
		{
			$output['success'] ="true";
			$output['result'] = $result;
		}
		else
		{
			$output['success'] ="true";
			$output['result'] = '';
		}
		echo json_encode($output);
		exit;
	}

	public function getuserlocalcurrency ()
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		 if($user->parent == 0)
		{
			$userId = $user->id;
		}
		else
		{
			$userId = $user->parent;
		}

		$result = $this->common->getuserlocalcurrency(array("userId"=>$userId));
		if($result)
		{
		 $output['success'] ="true";
		 $output['result'] =$result;
		}
		else
		{
			$output['success'] ="false";
			$output['result'] ='';
		}
		echo json_encode($output);
		exit;
	}

	public function getMonthInvoice()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$config = array();
		$startdate = '';
		$enddate = '';
		$name = '';
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
			$userId = $user->id;
		}
		else
		{
			$userId = $user->parent;
		}
		if(!empty($page))
		{
			 $data['pcount'] = $this->common->count_all_results('invoice',array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year));
			 $config["total_rows"] = $this->common->count_all_results('invoice',array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year));
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
			$res = $this->common->getfreelancerinvoice(array("i.userId"=>$userId,"MONTH(i.date)"=>$results->month,"Year(i.date)"=>$results->year),$startdate,$enddate,$name,$start,$config["per_page"]);
			$total = $this->common->sum_invoice_amount(array("userId"=>$userId,"MONTH(date)"=>$results->month,"Year(date)"=>$results->year));
		}

	if($res)
		{
			$data['message'] ="true";
			$data['result'] = $res;
			$data['month'] = date("F", mktime(0, 0, 0, $results->month, 10));
			$data['year'] = $results->year;
			$data['total'] = $total->total;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
			$data['month'] = date("F", mktime(0, 0, 0, $results->month, 10));
			$data['year'] = $results->year;
		}

		echo json_encode($data);
		exit;
	}

	public function getActiveInvoiceClient()
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
			$userId = $user->id;
		}
		else
		{
			$userId = $user->parent;
		}


		$result = $this->common->getActiveClient(array("j.freelancerId"=>$userId));
		if(!empty($result))
		{
			foreach($result as $k=>$r)
			{
				$result[$k]->projectType ="contract";
				$result[$k]->hourlyPrice ="";
			}
		}

		$results = $this->common->getActiveOwnProject(array("userId"=>$userId));
		// echo "<pre>";
		// print_r($results);
		// die;

		if(!empty($results))
		{
			foreach($results as $k=>$s)
			{
				$results[$k]->projectType ="own";
			}
		}

		$results1 = $this->common->getActiveInvoiceClient(array("userId"=>$userId));

		if(!empty($results1))
		{
			foreach($results1 as $k=>$s1)
			{
				$results1[$k]->projectType ="invoice";
				$results1[$k]->hourlyPrice ="";
			}
		}

		$results3 = $this->common->getActiveGigClient(array("b.userId"=>$userId));
		if(!empty($results3))
		{
			foreach($results3 as $k=>$r3)
			{
				$results3[$k]->projectType ="gig";
				$results3[$k]->hourlyPrice ="";
			}
		}

		$res = array_merge($result,$results,$results1,$results3);

		if($res)
		{
			$output['success'] = "true";
			$output['result'] = $res;
		}
		else
		{
			$output['success'] = "false";
			$output['result'] = '';
		}
		echo json_encode($output);
		exit;
	}


	public function getinvoiceSuggestionClient()
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
			$userId = $user->id;
		}
		else
		{
			$userId = $user->parent;
		}
		$res = $this->common->getinvoiceSuggestionClient(array("userId"=>$userId));
		if($res)
		{
			$output['success'] = "true";
			$output['result'] = $res;
		}
		else
		{
			$output['success'] = "false";
			$output['result'] = '';
		}
		echo json_encode($output);
		exit;
	}

	public function gettask()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		if($results->type == 1)
		{
		 $result = $this->common->get('todoList',array("parent"=>$results->id));
		}
		else if($results->type == 2)
		{
		 $result = $this->common->get('todoList',array("parent"=>$results->id));
		 if(!empty($result))
		 {
			 foreach($result as $key=>$r)
			 {
				 $project = $this->common->getrow('project',array("projectId"=>$r->projectId));
				 if($project)
				 {
					 $result[$key]->hourlyPrice = $project->hourlyPrice;
				 }
			 }
		 }
		}

		if($result)
		{
			$output['success'] = "true";
			$output['type'] = $results->type;
			$output['result'] = $result;
		}
		else
		{
			$output['success'] = "false";
			$output['result'] = "";
		}
		echo json_encode($output);
		exit;

	}

	public function sendinvoice()
	{
		include APPPATH . 'third_party/mpdf/mpdf.php';
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('d-m-Y');


		$data['result'] = $this->common->getrow('invoice',array('invoiceId'=>$results->invoiceId));
		$data['task'] = $this->common->get('invoice_task',array('invoiceId'=>$results->invoiceId));
		$data['user'] = $this->common->getSingleUser(array('u_id'=>$data['result']->userId));
		$data['client'] = $this->common->getrow('user_meta',array('u_id'=>$data['result']->recipient ));
		$data['payment'] = $this->common->getrow('user_paymentmethod',array("userId"=>$data['result']->userId));
		$cu = $this->common->getrow('currency',array("id"=>$data['result']->currencyId));
		if(!empty($data['user']))
		{
			if($data['user']->countryCode)
			{
			 $cc = explode(":",$data['user']->countryCode);
			 $data['user']->countryCode = $cc[1];
			 }
		}

		if(!empty($data['result']))
		{
			if($data['result']->countryCode)
			{
			 $cc = explode(":",$data['result']->countryCode);
			 $data['result']->countryCode = $cc[1];
			 }
		}

		$data['currency'] = $cu->code.' '.$cu->symbol;

		$html = $this->load->view('email/freelancerinvoicePdf',$data,TRUE);

		$mpdf = new mPDF('c', 'A4', '', '');
		$mpdf->SetProtection(array('print'));
		$mpdf->SetDisplayMode('fullpage');
		$mpdf->WriteHTML($html);
		 $pdfFilePath = "invoice".rand().".pdf";
		 $path='assets/invoice/'.$html;
		 $data1['name'] = $data['result']->name;
		 $data1['invoiceno'] = $data['result']->reference.$data['result']->invoiceNo;
		 $data1['payable'] = $data['result']->payable;
		 $data1['date'] = $date;
		 $data1['currency'] = $cu->code.' '.$cu->symbol;
		 $msg = $this->load->view('email/invoiceEmail',$data1,TRUE);
		 $attachment1 = base_url().'assets/invoice/'.$pdfFilePath;
		 $attachmentName = FCPATH.'assets/invoice/'.$pdfFilePath;
		 $mpdf->Output($attachmentName, 'F');
		 $sd = $this->sendEmail($data['result']->email,"invoice",$msg,$attachmentName);
		 if($sd)
		 {
       $output['message'] ="true";
		 }
		 else
		 {
			 $output['message'] ="false";
		 }
		 echo json_encode($output);
		 exit;
	}

	public function getlastinvoiceNo()
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
			$userId = $user->id;
		}
		else
		{
			$userId = $user->parent;
		}
		$res = $this->common->getOneRow('invoice',array("userId"=>$userId),'invoiceId','desc');
		$last = $this->common->getlastrecord('invoice','invoiceId','desc');

			if(!empty($last))
			{
			$aa = $last->invoiceId + 1;
		  }
			else
			{
			  $aa = 1;
			}

			$data['reference'] =$res->reference;
			$data['invoiceno'] = "000".$aa;

		echo json_encode($data);
		exit;
	}

	public function sendEmail($to,$sub,$msg,$attachment1) {

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
 $ci->email->attach($attachment1);
 if ($ci->email->send()) {
 $ci->email->clear(TRUE);
 return TRUE;
 } else {
 //echo $ci->email->print_debugger();
 return FALSE;
 }
}

public function invoiceReceivedPaymentChange()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);

	$update = $this->common->update(array("invoiceId"=>$results->invoiceId),array("paymentReceived"=>$results->paymentReceived,"status"=>1),'invoice');
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

public function invoicereceivedSave()
{
	$array = file_get_contents('php://input');
	$results =json_decode($array);
	$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	$date =  $nowUtc->format('Y-m-d');

	$update = $this->common->update(array("invoiceId"=>$results->invoiceId),array("receivedAmount"=>$results->receivedAmount),'invoice');
	if($update)
	{
		$invoice = $this->common->getrow('invoice',array("invoiceId"=>$results->invoiceId));
		$res = $this->common->getrow('income',array("invoiceId"=>$results->invoiceId));
		$a['invoiceId'] = $invoice->invoiceId;
		$a['client'] = $invoice->name;
		$a['currencyId'] = $invoice->currencyId;
		$a['amount'] = $invoice->payable;
		$a['receivedAmount'] = $invoice->receivedAmount;
		$a['status'] = 1;
		$a['received'] = $invoice->paymentReceived;
		$a['deposited'] = $invoice->paymentReceived;
		$a['date'] = $date;
		$a['userId'] = $invoice->userId;
		if(!empty($res))
		{
		 $saved = $this->common->update(array("incomeId"=>$res->incomeId),array("receivedAmount"=>$invoice->receivedAmount),'income');
	  }
		else
		{
		 $saved =	$this->common->insert('income',$a);
		}
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

 public function invoice_clone($id)
 {
	 $a['title'] ="Edit Invoice";
	 $data['invoiceId'] = $id;
	 $this->load->view('freelancer/header',$a);
	 $this->load->view('freelancer/freelancerCloneInvoice',$data);
	 $this->load->view('freelancer/footer');
 }

 public function getcarryforward()
 {
	 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
	 if($user->parent == 0)
	 {
		 $userId = $user->id;
	 }
	 else
	 {
		 $userId = $user->parent;
	 }

	 $res = $this->common->getrow('leavetype',array("userId"=>$userId,"carryforwardtype"=>1));
	  if(!empty($res->startDate))
	  {
	   $res->startDate = date("d-m-Y",strtotime($res->startDate));
    }
	 if($res)
	 {
    $output['message'] ="true";
		$output['result'] = $res;
	 }
	 else
	 {
		$output['message'] ="false";
	 }
	 echo json_encode($output);
	 exit;
 }

 public function updatecarryforward()
 {
	 $array = file_get_contents('php://input');
   $results =json_decode($array);
	 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	 $date =  $nowUtc->format('Y-m-d');
	 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
   if($user->parent == 0)
   {
    $userId = $this->session->userdata['clientloggedin']['id'];
    }
    else if($user->parent != 0)
   {
    $userId = $user->parent;
    }
	 $results->status = 1;
	 $startdate = $results->startDate;
	 $results->startDate = date("Y-m-d",strtotime($results->startDate));
	 $update = $this->common->update(array("id"=>$results->id),$results,'leavetype');
   if($update)
	 {
		 if($startdate <= $date)
		 {
       $team = $this->common->get('user',array("parent"=>$userId));
			 if(!empty($team))
			 {
				  foreach($team as $t)
					{
						$res = $this->common->getrow('user_leaves_carry_forward',array("userId"=>$t->id));
						if(!empty($res))
						{

						}
						else
						{
							$ca['userId'] = $t->id;
							$ca['leaves'] = 1;
							$ca['status'] = 1;
							$ca['date'] = $date;
						  $this->common->insert('user_leaves_carry_forward',$ca);
						}
					}
			 }
		 }
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

 public function carryforwardStatus()
 {
	 $array = file_get_contents('php://input');
   $results =json_decode($array);
	 $update = $this->common->update(array("id"=>$results->id),$results,'leavetype');
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

 public function getemployeeCarryforward()
 {
	 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
	 if($user->parent == 0)
	 {
	 	$userId = $user->id;
	 }
	 else
	 {
	 	$userId = $user->parent;
	 }

	 $res = $this->common->getrow('leavetype',array("userId"=>$userId,"status"=>1,"carryforwardtype"=>1));

	 if(!empty($res))
	 {
	  $res->startDate = date("d-m-Y",strtotime($res->startDate));
	  $r = $this->common->getrow('user_leave',array("userId"=>$this->session->userdata['clientloggedin']['id'],"type"=>$res->id));
		if(!empty($r))
	   {
	    $res->noofLeave = $r->leaves;
     }
   }
	 if($res)
	 {
	  $output['message'] ="true";
	  $output['result'] = $res;
	 }
	 else
	 {
	  $output['message'] ="false";
	 }
	 echo json_encode($output);
	 exit;
 }

 public function leave_cron ()
 {
	 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	 $date =  $nowUtc->format('Y-m-d');
	 $allcompany = $this->common->allCompanyLeaveType(array("u.parent"=>0,'c.status'=>1));
	 if(!empty($allcompany))
	 {
		 foreach($allcompany as $c)
		 {
		    $alluser = $this->common->get('user',array("parent"=>$c->id));
				if(!empty($alluser))
				{
					foreach($alluser as $u)
					{
					$enddate = date('Y-m-d',strtotime('+'.$c->carryUpto .'month',strtotime($c->startDate)));
          if($c->startDate <= $date && $enddate >= $date && $c->leavesCarryForward == 1)
					{
						$time = strtotime($c->startDate);
            $month =  date("m",$time);
            $day =  date("d",$time);

						if($month < date('m') && $day < date('d'))
						{
						  $check = $this->common->getrow('user_leaves_carry_forward',array("MONTH(date)"=>date('m'),"userId"=>$u->id));
              if(empty($check))
							{
                  $lastmonthdate = date('m',strtotime('-1 month',strtotime($date)));
									$leave = $this->common->getrow('user_leave',array("userId"=>$u->id,"MONTH(date)"=>$lastmonthdate));
									if(empty($leave))
									{
									  if(!empty($check))
									  {
										$l = $check->leaves + 1;

                    $this->common->update(array("userId"=>$u->id),array("leaves"=>$l),'user_leaves_carry_forward');
									  }
										else
										{

                      $aa['userId'] = $u->id;
                      $aa['status'] = 1;
                      $aa['leaves'] = 1;
                      $aa['date'] = $date;
											$this->common->insert('user_leaves_carry_forward',$aa);
										}
									}
							}
						}
					}
				 else if($c->startDate <= $date && $enddate >= $date && $c->leavesCarryForward == 0)
					{

						if($c->startDate == $date)
						{
							$leave = $this->common->getrow('user_leave',array("userId"=>$u->id,"MONTH(date)"=>$lastmonthdate));
							if(empty($leave))
							{
							$this->common->update(array("userId"=>$u->id),array("leaves"=>1),'user_leaves_carry_forward');
						  }
						}

					}
				}
					//close foreach
				}
		 }
	 }
 }



 public function CarryForwardupdateEffectiveDate()
 {
	 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	 $date =  $nowUtc->format('Y-m-d');
	 $allcompany = $this->common->allCompanyLeaveType(array("u.parent"=>0,'c.status'=>1));
	 if(!empty($allcompany))
	 {
		 foreach($allcompany as $c)
		  {
			$enddate = date('Y-m-d',strtotime('+'.$c->carryUpto .'month',strtotime($c->startDate)));
			  if($enddate == $date)
			  {
				 $newdate = date('Y-m-d',strtotime('+'.$c->carryUpto .'month',strtotime($c->startDate)));
				 $this->common->update(array("userId"=>$c->id,"leavesCarryForward"=>1),array("startDate"=>$newdate),'leavetype');
			  }
		   }
		 }

	 }

	 public function taskreceivedAmount()
	 {
		 $array = file_get_contents('php://input');
	   $results =json_decode($array);
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
     $date = $nowUtc->format('Y-m-d');

		 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
 		 if($user->parent == 0)
 		 {
 		 $userid = $user->id;
 		 }
 		 else
 		 {
 			$userid = $user->parent;
 		 }

		 $check = $this->common->getrow('project_milestones_amount',array("projectId"=>$results->projectId,"projectMilestoneId"=>$results->projectMilestoneId));
		 $project = $this->common->getrow('project',array("projectId"=>$results->projectId));
		 $milestone = $this->common->getrow('todoList',array("id"=>$results->projectMilestoneId));
		 if(!empty($check))
		 {
       $res = $this->common->update(array("projectId"=>$results->projectId,"projectMilestoneId"=>$results->projectMilestoneId),array("amount"=>$results->amount,"date"=>$date),"project_milestones_amount");
		 }
		 else
		 {
			 $res = $this->common->insert('project_milestones_amount',array("projectId"=>$results->projectId,"projectMilestoneId"=>$results->projectMilestoneId,"amount"=>$results->amount,"date"=>$date));
		 }

		 if($res)
		 {
       $in['userId'] = $userid;
       $in['client'] = $project->clientName;
       $in['project'] = $project->projectName;
       $in['currencyId'] = $project->currency;
       $in['amount'] = $project->hourlyPrice * $milestone->hours;
       $in['receivedAmount'] = $results->amount;
       $in['employeeId'] = $this->session->userdata['clientloggedin']['id'];
       $in['status'] = 1;
       $in['received'] = 1;
       $in['projectId'] = $results->projectId;
       $in['projectMilestoneId'] = $results->projectMilestoneId;
       $in['date'] = $date;
			 $check1 = $this->common->getrow('income',array("projectId"=>$results->projectId,"projectMilestoneId"=>$results->projectMilestoneId));
			 if(!empty($check1))
			 {
				 $this->common->update(array("projectId"=>$results->projectId,"projectMilestoneId"=>$results->projectMilestoneId),$in,'income');
			 }
			 else
			 {
			  $this->common->insert('income',$in);
			 }
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

	 public function saveSubtask()
	 {
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$ids = $results->parents;
			$addhours = $results->addhours;
			$projectId = $results->projectId;
			unset($results->parents);
			unset($results->projectId);
			unset($results->addhours);
       if(!empty($ids))
			 {
				 foreach($ids as $i)
				 {
					 $res = $this->common->getrow('todoList',array("id"=>$i));
					 $last = $this->common->getone('todoList','id','desc');
 				   if(!empty($last))
 				   {
 				    $xx = $last->id + 1;
 				    $results->taskId = "TS000".$xx;
 			     }
 				   else
 				   {
 					  $results->taskId = 'TS0001';
 				   }
					 $results->assignedBy = $res->assignedBy;
					 $results->parent = $i;
					 $results->projectId = $res->projectId;
			     $result = $this->common->insert('todoList',$results);
					 if($result)
					 {
						 $mhours = $res->hours + $results->hours;
						 $this->common->update(array("id"=>$i),array("hours"=>$mhours),'todoList');
					 }
			   }
		   }
			if($result)
			{
			 $p =	$this->common->getrow('project',array("projectId"=>$projectId));
			 $thours = $p->totalHour + $addhours;
			 $totalamount = $thours * $p->hourlyPrice;
			 $this->common->update(array("projectId"=>$projectId),array("totalHour"=>$thours,"budget"=>$totalamount),'project');
			}

			 if($result)
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

	 public function contract_assign()
	 {
		 if(!empty($this->session->userdata['clientloggedin']['id']))
		 {
		 $data['title'] ="Job Contract Listing";
		 $this->load->view('freelancer/header',$data);
		 $this->load->view('freelancer/contract_assign');
		 $this->load->view('freelancer/footer');
		 }
		 else
		 {
			redirect('login');
		 }
	 }

	 public function getassignContract()
	 {
		 $array = file_get_contents('php://input');
 		$results =json_decode($array);
 		$page = $results->page;

 		if(!empty($page))
 		{

 				$data['pcount'] = count($this->common->count_assignContract(array("assignedBy"=>$this->session->userdata['clientloggedin']['id'],"t.type"=>3)));
 				$config["total_rows"] = count($this->common->count_assignContract(array("assignedBy"=>$this->session->userdata['clientloggedin']['id'],"t.type"=>3)));
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
 			$jobs = $this->common->getassignContract(array("assignedBy"=>$this->session->userdata['clientloggedin']['id'],"t.type"=>3),$start,$config["per_page"]);

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

	 public function contract_assign_detail($id)
	 {
		 if(!empty($this->session->userdata['clientloggedin']['id']))
		 {
		 $data['title'] ="Job Contract Listing";
		 $p['assigncontractjobId'] = $id;
		 $this->load->view('freelancer/header',$data);
		 $this->load->view('freelancer/contract_assign_detail',$p);
		 $this->load->view('freelancer/footer');
		 }
		 else
		 {
			redirect('login');
		 }
	 }

	 public function getassignContractdetail()
	 {
		 $array = file_get_contents('php://input');
  		$results =json_decode($array);

 		$res = $this->common->getjobdetail(array("j.contractId"=>$results->jobId));
 		if(!empty($res))
 		{
 			$res->milestone = $this->common->get('todoList',array("contractId"=>$results->jobId,"milestone"=>1));
 			$c = $this->common->getrow('currency',array("id"=>$res->currencyId));
 			if(!empty($c))
 			{
 			$res->code = $c->code;
 			$res->symbol = $c->symbol;
 		  }
         if($res->countrycode)
 				{
 			   $cc = explode(":",$res->countrycode);
 			   $res->countrycode = $cc[1];
 		     }
 				 else
 				 {
 					 $res->countrycode = '';
          }
 		}

 		if(!empty($res->milestone))
 		{
 			foreach($res->milestone as $key=>$m)
 			{
 				$res->milestone[$key]->task = $this->common->get('todoList',array("contractId"=>$results->jobId,"parent"=>$m->id));
 			}
 		}

 		if(!empty($res->milestone))
 		{
 			foreach($res->milestone as $key=>$m)
 			{
 				foreach($m->task as $k=>$t)
 				{

 					if(!empty($t->startDate))
 					{
 					$res->milestone[$key]->task[$k]->startDate = date("d-m-Y",strtotime($t->startDate));
 				  }
 					if(!empty($t->dueDate))
 					{
 					$res->milestone[$key]->task[$k]->dueDate = date("d-m-Y",strtotime($t->dueDate));
 				  }
 					 $time = $this->common->sum_todotask_time(array("todoListId"=>$t->id));
 					 if($time->time != 0)
 					 {
 					    $hours = floor($time->time / 60);
 							if($hours < 10)
 							{
 								$hours = '0'.$hours;
 							}
 					    $minutes = ($time->time % 60);
 							if($minutes < 10)
 							{
 								$minutes = '0'.$minutes;
 							}
 					    $d = $hours.':'.$minutes;
 					    $res->milestone[$key]->task[$k]->time = $d;
 					 }
 					 else
 					 {
 					   $res->milestone[$key]->task[$k]->time = "00:00";
 					 }
 				}
 			}
 		}

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

	 public function incomereceivedSave()
 	{
 		$array = file_get_contents('php://input');
 		$results =json_decode($array);
 		$update = $this->common->update(array("incomeId"=>$results->incomeId),array("receivedAmount"=>$results->receivedAmount),'income');
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

	public function getonlyAllEmployee()
	{
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}
		$result = $this->common->getonlyEmployees(array("us.parent"=>$userid));
		if(!empty($result))
		{
			foreach($result as $key=>$r)
			{
				$result[$key]->joiningdate = date("d-m-Y", strtotime($r->joiningdate));
			}
		}

		if($result)
		{
			$data['message'] = "true";
			$data['result'] = $result;
		}
		else
		{
			$data['message'] = "false";
		}
		echo json_encode($data);
		die;
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

	public function updatemilestone()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$milestone = $results->milestone;
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		 if(count($milestone) > 0 && !empty($milestone))
		 {
			 $updatemilestone = $this->common->update(array("proposalId"=>$results->proposalId),array("milestones"=>serialize($milestone)),'user_job_proposal_milestones');
		 }

		$updated =	 $this->common->update(array("proposalId"=>$results->proposalId),array("newProposedOffer"=>$results->newProposedOffer),'user_job_proposal');


	 if($updated)
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

	public function getproposallog($id)
	{
		 $logs = $this->common->get('user_log',array("logType"=>'proposal','logSubType'=>'offer','logReference'=>$id));

		if(!empty($logs))
		{
			foreach($logs as $key=>$res)
			{
			$user = $this->common->getrow('user_meta',array("u_Id"=>$res->userId));
			$logs[$key]->name = $user->name;
			$logs[$key]->comment = $this->common->getcomment(array("log.logReference"=>$res->logId,"logSubType"=>'comment',"logType"=>'proposal'));
			}
		}

		if($logs)
		{
		$msg['message'] = "true";
		$msg['result'] = $logs;
		}
		else
		{
			$msg['message'] = "false";
			$msg['result'] = '';
		}
		echo json_encode($msg);
		exit;
	}

	public function Reassigntodosave()
	{
		$array = file_get_contents('php://input');
	  $results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$inserthistory ='';
		$results->date = $date;

		$res = $this->common->getrow('todoList',array("id"=>$results->id,"assignedTo"=>$results->assignedTo));
		$check = $this->common->getrow('todoList',array("id"=>$results->id));
		// if(!empty($res))
		// {
		// 	$output['error'] ="true";
		// 	$output['message'] ="Task Already Assigned";
		// }
		//  else if(empty($res))
		// {
			if($check->status != 5)
			{
			 if($check->assignedTo != $results->assignedTo)
			 {

			  $time = $this->common->sum_todotask_time(array("todoListId"=>$results->id,"userId"=>$check->assignedTo));

				$a['userId'] = $check->assignedTo;
				$a['time'] = $time->time;
				$a['todoId'] = $results->id;
				$a['startDate'] = $check->startDate;
				$a['dueDate'] = $check->dueDate;
				$a['completeDate'] = $check->completeDate;
				$a['taskId'] = $check->taskId;
				$a['status'] = $check->status;
				$a['name'] = $check->name;
				$a['description'] = $check->description;
				$a['date'] = $check->date;
				if($check->type == 1)
 			 {
 			  $a['projectId'] = $check->id;
 		   }
 			 else if($check->type == 2)
 			 {
 				 $a['projectId'] = $check->contractId;
 			 }
 			 else if($history->type == 3)
 			 {
 				 $a['projectId'] = $check->contractId;
 			 }
 			 else if($history->type == 4)
 			 {
 				 $a['projectId'] = $check->gigId;
 			 }
			 $a['type'] = $check->type;
				 if($time->time != 0)
				 {
				  $inserthistory = $this->common->insert('todoList_history',$a);
				 }

			if($inserthistory)
			{
			 $oldid = $this->common->getrow('todoList_history',array("todoId"=>$results->id));
       $count = $this->common->count_all_results('todoList_history',array("todoId"=>$results->id));
			 if($count > 10)
			 {
				 $count = '0'.$count;
			 }
			 $taskId = $oldid->taskId.'-'.$count;
			 $results->taskId = $taskId;
		  }
			$results->started = 0;
			$results->type = $check->type;
			$results->assignedBy = $check->assignedBy;
			$results->taskParent = $check->id;
			if(!empty($results->startDate))
			{
			$results->startDate = date("Y-m-d",strtotime($results->startDate));
			}
			if(!empty($results->dueDate))
			{
			$results->dueDate = date("Y-m-d",strtotime($results->dueDate));
			}
			unset($results->id);
			$previousStatus = $results->previousTaskStatus;
			unset($results->previousTaskStatus);
			$updated = $this->common->insert('todoList',$results);
			if($previousStatus == 2 )
			{
				$this->common->update(array("id"=>$check->id),array("status"=>6),'todoList');
			}

			if($updated)
			{
			$this->todoactivitySave(array("todoListId"=>$updated[1],"userId"=>$results->assignedTo,"status"=>"Task Assigned","date"=>$date));
		  }
		}
		else
		{
			unset($results->previousTaskStatus);
			unset($results->status);
			unset($results->started);
			if(!empty($results->startDate))
			{
			$results->startDate = date("Y-m-d",strtotime($results->startDate));
			}
			if(!empty($results->dueDate))
			{
			$results->dueDate = date("Y-m-d",strtotime($results->dueDate));
			}
		 $updated =	$this->common->update(array("id"=>$results->id),$results,'todoList');
		}

			 if($updated)
			 {
				 $output['success'] = "true";
				 $output['message'] = "Task Assigned Successfully";
			 }
		  }
			else if($check->status == 5)
			{
				$output['error'] ="true";
				$output['message'] ="Task already in Progress";
			}
		 // }
    echo json_encode($output);
		exit;
	}

	public function gettodohistory()
	{
		$timez = 0;
		$array = file_get_contents('php://input');
	  $results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$parent =$this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($parent->parent == 0)
		{
		 $parentId = $parent->id;
		}
		else
		{
			$parentId = $parent->parent;
		}
		$timezone = $this->common->getrow('user_paymentmethod',array("userId"=>$parentId));
		if(!empty($timezone->zone))
		{
				$zone = explode(":",$timezone->zone);
				$h = $zone[0].' Hours';
				$m = $zone[1].' Minutes';
				$timez = $h.' '.$m;
		}
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$nowtime = $nowUtc->format('Y-m-d H:i:s');
		$todo = $this->common->todo(array("t.id"=>$results->id));

		if(!empty($todo))
		{
			$to = $this->common->todo(array("t.taskParent"=>$todo[0]->id));
		}
		$result = array_merge($todo,$to);

		$totalminutesrunning = 0;
		$ids = array();


		if(!empty($result))
		{
			foreach($result as $key=>$r)
			{
				$ids[$key] = $r->taskId;
			 $time = $this->common->sum_todotask_time(array("todoListId"=>$results->id,"userId"=>$r->assignedTo,"taskId"=>$r->taskId));
			 $lastdsr = $this->common->getOneRow('dsr',array("todoId"=>$results->id,"employeeId"=>$r->assignedTo,"taskId"=>$r->taskId),'dsrId','Desc');

			 if($r->status == 5)
			 {
			 $lasttimer = $this->common->getOneRow('todoList_billing',array("todoListId"=>$r->id,"taskId"=>$r->taskId,"todoListId"=>$r->id),'todolist_billingId',"desc");
			 }
			 $minutesRunning = 0;
			 $totalminutesrunning = 0;

			 if(!empty($lasttimer))
			 {

				 $start_date = new DateTime($lasttimer->startTime);
				 $since_start = $start_date->diff(new DateTime($nowtime));
				 $minutesRunning = $since_start->days * 24 * 60;
				 $minutesRunning += $since_start->h * 60;
				 $minutesRunning += $since_start->i;
				 $totalminutesrunning += $minutesRunning;
			 }
			 if($time->time != 0)
			 {
				 $time->time = $minutesRunning + $time->time;
				 $hours = floor($time->time / 60);
				 if($hours < 10)
				 {
					 $hours = '0'.$hours;
				 }
				 $minutes = ($time->time % 60);
				 if($minutes < 10)
				 {
					 $minutes = '0'.$minutes;
				 }
				 $d = $hours.':'.$minutes;
				 $result[$key]->time = $d;
		    }
				else if($minutesRunning)
				{
					$hours = floor($minutesRunning / 60);
					if($hours < 10)
					{
						$hours = '0'.$hours;
					}
					$minutes = ($minutesRunning % 60);
					if($minutes < 10)
					{
						$minutes = '0'.$minutes;
					}
					$d = $hours.':'.$minutes;
					$result[$key]->time = $d;
				}
				else
				{
					$result[$key]->time = "00:00";
				}

				if(!empty($lastdsr))
				{
         $result[$key]->dsrId = $lastdsr->dsrId;
         $result[$key]->approved = $lastdsr->approved;
				}
				if(!empty($r->date))
        {
					if(!empty($timez))
					{
	        $start = strtotime($timez, strtotime($r->date));
				  }
					else
					{
					 $start = strtotime($r->date);
					}
	       if($start)
	       {
	        $result[$key]->date = date('Y-m-d H:i:s', $start);
	       }
	      }
	    }
	  }

		$atime = $this->common->sum_todotask_time(array("todoListId"=>$results->id));
		$totaltime = '00:00';

		if($atime->time != 0 || $totalminutesrunning != 0)
		{
			 $atime->time = $atime->time + $totalminutesrunning;
			 $hours1 = floor($atime->time / 60);
			 if($hours1 < 10)
			 {
				 $hours1 = '0'.$hours1;
			 }
			 $minutes1 = ($atime->time % 60);
			 if($minutes1 < 10)
			 {
				 $minutes1 = '0'.$minutes1;
			 }
			 $d1 = $hours1.':'.$minutes1;
			 $totaltime = $d1;
		}

	 array_multisort($ids, SORT_DESC, $result);

		if($result)
		{
			$output['success'] ="true";
			$output['result'] =$result;
			$output['totaltime'] = $totaltime;
			$output['totalruning'] = $totalminutesrunning;
		}
		else
		{
		 $output['success'] ="false";
		}
		echo json_encode($output);
		exit;
	}

	public function editReassigntodo()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('d-m-Y');

		$result = $this->common->getrow('todoList',array("id"=>$results->id));
		$result->startDate = date("d-m-Y", strtotime($result->startDate));
		$result->dueDate = date("d-m-Y", strtotime($result->dueDate));
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		 if($user->parent == 0)
		 {
			 $userId = $user->id;
		 }
		 else
		 {
			 $userId = $user->parent;
		 }

		 $team = $this->common->getteambydepartment(array("us.parent"=>$userId,"department"=>$result->dept),$this->session->userdata['clientloggedin']['id']);
		if($result->dept == '')
		{
			$result->dept = $team[0]->department;
		}
		if($result)
		{
			$data['message'] ="true";
			$data['result'] = $result;
			$data['team'] = $team;
			$data['currentdate'] = $date;
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
		exit;
	}

	public function gettodohistoryBilling()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$timez = '';

		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
		 $userid = $user->parent;
		}
		else
		{
		 $userid = $user->id;
		}

		$timezone = $this->common->getrow('user_paymentmethod',array("userId"=>$userid));

		if(!empty($timezone->zone))
		{
			$zone = explode(":",$timezone->zone);

			$h = $zone[0].' Hours';
			$m = $zone[1].' Minutes';
			$timez = $h.' '.$m;
		}

		$result = $this->common->get('todoList_activities',array("todoListId"=>$results->id));
		if(!empty($result))
		{
			foreach($result as $key=>$r)
			{
				if($r->date)
				{
				if(!empty($timez))
				{
				$start = strtotime($timez, strtotime($r->date));
			  }
				else
				{
					$start = strtotime($r->date);
				}
				$result[$key]->time = date('h:i:s', $start);
				$result[$key]->date = date("Y-m-d", $start);
			  }
        if($r->timeSpent != 0)
				{
				$hours1 = floor($r->timeSpent / 60);
				if($hours1 < 10)
				{
					$hours1 = '0'.$hours1;
				}
				$minutes1 = ($r->timeSpent % 60);
				if($minutes1 < 10)
				{
					$minutes1 = '0'.$minutes1;
				}
				$d1 = $hours1.':'.$minutes1;
				$result[$key]->timeSpent = $d1;
			  }
				else if($r->timeSpent != null)
				{
					$result[$key]->timeSpent = '00:00';
				}
				else if($r->timeSpent == null)
				{
					$result[$key]->timeSpent = '';
				}
			}
		}
		if($result)
		{
			$output['success'] ="true";
			$output['result'] =$result;
		}
		else
		{
		 $output['success'] ="false";
		 $output['result'] ='';
		}
		echo json_encode($output);
		exit;
	}


	public function getdsrhistoryBilling()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
		 $userid = $user->parent;
		}
		else
		{
		 $userid = $user->id;
		}

		$timezone = $this->common->getrow('user_paymentmethod',array("userId"=>$userid));
		if(!empty($timezone))
		{
			$zone = explode(":",$timezone->zone);

			$h = $zone[0].' Hours';
			$m = $zone[1].' Minutes';
			$timez = $h.' '.$m;
		}

		$result = $this->common->get('todoList_billing',array("userId"=>$results->userId,"Date(startTime)"=>$results->date,"todoListId"=>$results->todoListId,"taskId"=>$results->taskId));
		if(!empty($result))
		{
			foreach($result as $key=>$r)
			{
				if($r->startTime)
				{
				$result[$key]->date = $r->startTime;
				$start = strtotime($timez, strtotime($r->startTime));
				$result[$key]->startTime = date('h:i:s', $start);
			  }
				if($r->endTime)
				{
					$end = strtotime($timez, strtotime($r->endTime));
					$result[$key]->endTime  = date('h:i:s', $end);
				}

				if($r->time != 0)
 			 {
 				 $hours = floor($r->time / 60);
 				 if($hours < 10)
 				 {
 					 $hours = '0'.$hours;
 				 }
 				 $minutes = ($r->time % 60);
 				 if($minutes < 10)
 				 {
 					 $minutes = '0'.$minutes;
 				 }
 				 $d = $hours.':'.$minutes;
 				 $result[$key]->time = $d;
 		    }
 				else
 				{
          $result[$key]->time = "00:00";
 				}
			}
		}
		if($result)
		{
			$output['success'] ="true";
			$output['result'] =$result;
		}
		else
		{
		 $output['success'] ="false";
		 $output['result'] ='';
		}
		echo json_encode($output);
		exit;
	}

	public function gigassign()
	{
		$this->load->view('freelancer/header');
		$this->load->view('freelancer/gig_assign');
		$this->load->view('freelancer/footer');
	}

	public function getgigassign()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$config = array();

		$data['pcount'] = count($this->common->count_assign_gig(array("t.assignedBy"=>$this->session->userdata['clientloggedin']['id'],"t.milestone"=>0)));
		$config["total_rows"] = count($this->common->count_assign_gig(array("t.assignedBy"=>$this->session->userdata['clientloggedin']['id'],"t.milestone"=>0)));
		$config["per_page"] = $results->perpage;
		$this->pagination->initialize($config);
		if( $page <= 0 )
		{
			$page = 1;
		}
		$start = ($page-1) * $config["per_page"];
		if(!empty($page))
		{
			$result = $this->common->getassign_gig(array("t.assignedBy"=>$this->session->userdata['clientloggedin']['id'],"t.milestone"=>0),$start,$config["per_page"]);
		}

		if($result)
	 {
		 $data['message'] ="true";
		 $data['result'] = $result;
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

	public function gig_assign_detail($id)
	{
		$data['gigassignId'] = $id;
		$this->load->view('freelancer/header');
		$this->load->view('freelancer/gig_assign_detail',$data);
		$this->load->view('freelancer/footer');
	}

	public function getAllEmployeeDsr()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$d = '00:00';
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
		 $userid = $user->parent;
		}
		else
		{
		 $userid = $user->id;
		}

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$enddate =  $nowUtc->format('Y-m-d');
		if(!empty($results->startdate))
		{
			$startdate = date("Y-m-d", strtotime($results->startdate));
		}
		else
		{
			$startdate = date('Y-m-d',strtotime('-15 days',strtotime($enddate)));
		}
		if(!empty($results->enddate))
		{
		 $enddate = 	date("Y-m-d", strtotime($results->enddate));
		}


		$page = $results->page;
		$config = array();

		if(!empty($page))
		{
			 $data['pcount'] = count($this->common->countemployeeDsr(array("userId"=>$userid),$startdate,$enddate));
			 $config["total_rows"] = count($this->common->countemployeeDsr(array("userId"=>$userid),$startdate,$enddate));
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
			$res = $this->common->getMydsr(array("userId"=>$userid),$startdate,$enddate,$start,$config["per_page"]);
		}

		if(!empty($res))
		{
			foreach($res as $k=>$r)
			{
				if($r->time != 0)
				{
						 $hours = floor($r->time / 60);
						 if($hours < 10)
						 {
							 $hours = '0'.$hours;
						 }
						 $minutes = ($r->time % 60);
						 if($minutes < 10)
						 {
							 $minutes = '0'.$minutes;
						 }
						 $d = $hours.':'.$minutes;
					if($d)
					{
					 $res[$k]->time = $d;
					 }
				}
				else
				{
				$time = $this->common->sum_todotask_time(array("userId"=>$r->employeeId,"Date(startTime)"=>$r->date));
				if($time->time != 0)
				{
					 $hours = floor($time->time / 60);
					 if($hours < 10)
					 {
						 $hours = '0'.$hours;
					 }
					 $minutes = ($time->time % 60);
					 if($minutes < 10)
					 {
						 $minutes = '0'.$minutes;
					 }
					 $d = $hours.':'.$minutes;
				}
				if($d)
				{
				 $res[$k]->time = $d;
				 }
			}
		}
	}

	if($res)
		{
			$data['message'] ="true";
			$data['result'] = $res;
			$data['start'] = $start + 1;
			$data['startdate'] = date("d-m-Y", strtotime($startdate));
			$data['enddate'] = date("d-m-Y", strtotime($enddate));
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
		}

		echo json_encode($data);
		exit;
	}

	public function getdsrproject ()
	{
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent != 0)
		{
		 $userid = $user->parent;
		}
		else
		{
		 $userid = $user->id;
		}

		$break = $this->common->get('break_time',array("userId"=>$userid));
		$additional = [];
		$additional[0]['id'] = 0;
		$additional[0]['project'] = "Additional task";
		$additional[0]['type'] = 5;
		$additional[0]['includeSalary'] = 1;
		$additional[0]['taskId'] = '';

		if(!empty($break))
		{
			foreach($break as $k=>$b)
			{
				$break[$k]->type = 6;
				$break[$k]->project = $b->name;
			}
		}

		 $result = $this->common->getdsrproject(array("assignedTo"=>$this->session->userdata['clientloggedin']['id']),$date);

	   if(!empty($result))
		 {
			 foreach($result as $key=>$res)
			 {
				 $result[$key]->project = '';

				  if($res->type == 2)
				  {
				    $project = $this->common->getrow('project',array("projectId"=>$res->projectId));
						if(!empty($project))
						{

							$result[$key]->project = $project->projectName;
							$result[$key]->id = $project->projectId;
							$result[$key]->includeSalary = 1;
						}
			    }
					else if($res->type == 1)
				  {
				    $task = $this->common->getrow('todoList',array("id"=>$res->id));
						if(!empty($task))
						{

							$result[$key]->project = $task->taskId;
							$result[$key]->id = $task->id;
							$result[$key]->includeSalary = 1;
						}
			    }
					else if($res->type == 3)
				  {
				    $contract = $this->common->getrow('user_jobcontract',array("contractId"=>$res->contractId));
				    $job = $this->common->getrow('user_job',array("jobId"=>$contract->jobId));
						if(!empty($job))
						{
							$result[$key]->project  = $job->jobTitle;
							$result[$key]->id = $contract->contractId;
							$result[$key]->includeSalary = 1;
						}
			    }
					else if($res->type == 4)
					{
						$gig = $this->common->getrow('user_gig_buy',array("user_gig_buyId"=>$res->user_gig_buyId));
						if(!empty($gig))
						{
							$result[$key]->project = $gig->title;
							$result[$key]->id = $res->user_gig_buyId;
							$result[$key]->includeSalary = 1;
						}
					}
			 }
		 }
		 $res = array_unique($result, SORT_REGULAR);


		 $results = array_merge($res,$break,$additional);

		 if($results)
		 {
			 $output['success'] ="true";
			 $output['result'] =$results;
		 }
		 else
		 {
			 $output['success'] ="false";
			 $output['result'] = "";
		 }
		 echo json_encode($output);
		 exit;
	}




	public function getUserTodayDsr()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$todayleave = 0;
		if(!empty($results->dsrdate))
		{
			$date = date("Y-m-d", strtotime($results->dsrdate));
		}
		else
		{
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d');
		}
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		if($user->parent != 0)
		{
		 $parent = $user->parent;
		}
		else
		{
		 $parent = $user->id;
		}

		$d = '00:00';
		$workinghours = $this->common->getrow('workingHours',array("userId"=>$parent));
		$res = $this->common->get('dsr',array("employeeId"=>$this->session->userdata['clientloggedin']['id'],"date"=>$date));
		$leave = $this->common->checkLeaveExist(array("l.employeeId"=>$this->session->userdata['clientloggedin']['id'],"l.status"=>1),$date);

		if(!empty($workinghours))
		{
      $wh = explode(":",$workinghours->workingHour);
			$whou = $wh[0] * 60;
			$wmin = $whou + $wh[1];
			$whours = $wmin / 60;
			$whours1 = $whours / 2;
		}

		if(!empty($leave) && $leave->duration < $whours && $leave->durationType == "Hour" )
		{
			$todayleave = 0;
		}
		else if(!empty($leave))
		{
			$todayleave = 1;
		}


		if(!empty($res))
		{
			foreach($res as $k=>$r)
			{
				if($r->time != 0)
				{
					$hours = floor($r->time / 60);
				 if($hours < 10)
				 {
					 $hours = '0'.$hours;
				 }
				 $minutes = ($r->time % 60);
				 if($minutes < 10)
				 {
					 $minutes = '0'.$minutes;
				 }
				 $d = $hours.':'.$minutes;
		     if($d)
		     {
		     $res[$k]->time = $d;
		      }
				}
				else
				{
				$time = $this->common->sum_todotask_time(array("todoListId"=>$r->todoId,"userId"=>$r->employeeId,"taskId"=>$r->taskId,"Date(startTime)"=>$r->date));
				if($time->time != 0)
				{
					 $hours = floor($time->time / 60);
					 if($hours < 10)
					 {
						 $hours = '0'.$hours;
					 }
					 $minutes = ($time->time % 60);
					 if($minutes < 10)
					 {
						 $minutes = '0'.$minutes;
					 }
					 $d = $hours.':'.$minutes;
				}
				if($d)
				{
				 $res[$k]->time = $d;
				 }
			 }
			}
		}

	if($res)
		{
			$data['message'] ="true";
			$data['result'] = $res;
			$data['date'] = date("d-m-Y", strtotime($date));
			$data['leave'] = $todayleave;

		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
			$data['date'] = date("d-m-Y", strtotime($date));
			$data['leave'] = $todayleave;
		}

		echo json_encode($data);
		exit;
	}

	public function viewDsr()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		if(!empty($results->date))
		{
			$date = date("Y-m-d", strtotime($results->date));
		}

		$d = '00:00';
		$res = $this->common->get('dsr',array("employeeId"=>$results->id,"date"=>$date));

		if(!empty($res))
		{
			foreach($res as $k=>$r)
			{
				if($r->type == 2)
				{
					$project = $this->common->getrow('project',array("projectId"=>$r->projectId));
					if(!empty($project))
					{
						$res[$k]->project = $project->projectName;
					}
				}
				else if($r->type == 3)
				{
					$contract = $this->common->getrow('user_jobcontract',array("contractId"=>$r->projectId));
					$job = $this->common->getrow('user_jobcontract',array("jobId"=>$contract->jobId));
					if(!empty($job))
					{
						$res[$k]->project = $job->jobTitle;
					}
				}
				else if($r->type == 4)
				{
					$gig = $this->common->getrow('user_gig',array("gigId"=>$r->projectId));
					if(!empty($gig))
					{
						$res[$k]->project = $gig->title;
					}
				}
				else if($r->type == 1)
				{
					$t = $this->common->getrow('todoList',array("id"=>$r->projectId));
					if(!empty($t))
					{
						$res[$k]->project = $t->taskId;
					}
				}

				if($r->time != 0)
				{
					$hours = floor($r->time / 60);
				 if($hours < 10)
				 {
					 $hours = '0'.$hours;
				 }
				 $minutes = ($r->time % 60);
				 if($minutes < 10)
				 {
					 $minutes = '0'.$minutes;
				 }
				 $d = $hours.':'.$minutes;
		     if($d)
		     {
		     $res[$k]->time = $d;
		      }
				}
				else
				{
				$time = $this->common->sum_todotask_time(array("todoListId"=>$r->todoId,"userId"=>$r->employeeId,"taskId"=>$r->taskId,"Date(startTime)"=>$r->date));
				if($time->time != 0)
				{
					 $hours = floor($time->time / 60);
					 if($hours < 10)
					 {
						 $hours = '0'.$hours;
					 }
					 $minutes = ($time->time % 60);
					 if($minutes < 10)
					 {
						 $minutes = '0'.$minutes;
					 }
					 $d = $hours.':'.$minutes;
				}
				if($d)
				{
				 $res[$k]->time = $d;
				 }
			 }
			}
		}

	if($res)
		{
			$data['message'] ="true";
			$data['result'] = $res;
			$data['date'] = date("d-m-Y", strtotime($date));
		}
		else
		{
			$data['message'] ="false";
			$data['result'] = '';
			$data['date'] = date("d-m-Y", strtotime($date));
		}

		echo json_encode($data);
		exit;
	}

	public function attendance()
	{

		$this->load->view('freelancer/header');
		$this->load->view('freelancer/calendar');
		$this->load->view('freelancer/footer');
	}

	public function getattendancedata()
	{

		// $data['first'] = date("Y-m-d", strtotime("first day of this month"));
		// $data['last'] = date("Y-m-d", strtotime("last day of this month"));
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}

		$leave = array();
		$present = array();

		$i = 0;
		$total = $this->common->count_all_results('user',array("parent"=>$userid));

		$p = 0;
		$start = $_POST['start'];
    $end = $_POST['end'];
    $datetime1 = date_create($start);
    $datetime2 = date_create($end);
    $interval = date_diff($datetime1, $datetime2);
    $diff = $interval->format('%a');
    for($i=0; $i <= $diff; $i++)
		{
       $f = date('Y-m-d', strtotime($start. ' + '.$i.' days'));

			// if($f <= $date)
			//{
				$dayOfWeek = date("l", strtotime($f));
				if($dayOfWeek != "Sunday" && $dayOfWeek !="Saturday")
				{
			    $count = $this->common->countleave('user_leave',array("userId"=>$userid,"status"=>1),$f);
					$dsr = $this->common->getcountdsr('dsr',array("userId"=>$userid,"date"=>$f));
					 if($f <= $date)
					{
			   $present[$i]['title'] ="Total ".$total .', dsr filled by '.$dsr;
			   $present[$i]['start'] = $f;
			   }
        if($count)
			   {
				  $p = $total - $count;
				  $leave[$i]['title'] = 'On leave '.$count.',Pr emp '.$p .',dsr filled by '.$dsr;
				  $leave[$i]['start'] = $f;
			   }
			}
		// }

		}

		 $all = array_merge($present,$leave);

		$data1['result'] = $all;
		echo json_encode($data1);
		exit;
	}

	public function getOnedayAttendance()
	{

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));


		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}

		$leave = array();
		$present = array();

		$i = 0;
		$total = $this->common->count_all_results('user',array("parent"=>$userid));

		$p = 0;
		$start = $_POST['start'];


		$count = $this->common->countleave('user_leave',array("userId"=>$userid,"status"=>1),$start);
		$dsr = $this->common->getcountdsr('dsr',array("userId"=>$userid,"date"=>$start));

		$p = $total - $count;
		$result['success'] = "true";
		$result['total'] = $total;
		$result['present'] = $p;
		$result['leave'] = $count;
		$result['dsr'] = $dsr;
		$result['date'] = date('d-m-Y', strtotime($start));

		echo json_encode($result);
		exit;

	}

	public function getuserplan()
	{
		$result = $this->common->getrow('user_custom_plan',array("userId"=>$this->session->userdata['clientloggedin']['id']));
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

	public function gethrdashboarddata()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($user->parent == 0)
		{
		 $userid = $user->id;
		}
		else
		{
			$userid = $user->parent;
		}

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');

		if(!empty($results->startdate))
		{
			$startdate = date("Y-m-d",strtotime($results->startdate));
		}
		else
		{
		 $startdate = $date;
		}
		$employeegraph = array();
		$attendancegraph = array();

		$data['employee'] = $this->common->count_all_results('user',array("parent"=>$userid));
		$data['startdate'] = date("d-m-Y",strtotime($startdate));
		$data['leave'] = $this->common->countleave('user_leave',array("userId"=>$userid),$startdate);
		$data['interview'] = $this->common->count_all_results('interview',array("userId"=>$userid,"interviewDate"=>$startdate));
		$data['opening'] = $this->common->sum_opening(array("userId"=>$userid,"vacancyStatus"=>1));
		$data['dsr'] = $this->common->dsr_count(array("userId"=>$userid,"date"=>$startdate));
	  echo json_encode($data);
	  exit;
   }

	 public function membershipUpgradePayment()
	 {
		$_POST['userId'] =$this->session->userdata['clientloggedin']['id'];
 		$paymentId = $_POST['razorpay_payment_id'];
 		$amount = $_POST['totalAmount'];
 		unset($_POST['razorpay_payment_id']);
 		unset($_POST['totalAmount']);

 		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
 		$date =  $nowUtc->format('Y-m-d H:i:s');
		$planId = $this->common->getrow('user_custom_plan',array("userId"=>$this->session->userdata['clientloggedin']['id']));
		if(!empty($planId))
		{
			$_POST['totalamount'] = $planId->totalamount + $_POST['totalamount'];
			$updated = $this->common->update(array("userId"=>$this->session->userdata['clientloggedin']['id']),$_POST,'user_custom_plan');
			$user_custom_planId = $planId->user_custom_planId;
		}
		else
		{
			$updated = $this->common->insert('user_custom_plan',$_POST);
			$user_custom_planId = $updated[1];
		}

		if($updated)
		{
 		$paymentinserted = $this->common->insert('custom_plan_payment',array("razorpay_payment_id"=>$paymentId,"userId"=>$this->session->userdata['clientloggedin']['id'],"amount"=>$amount,"user_custom_planId"=>$user_custom_planId));
		}

 		if($paymentinserted)
 		{
 		$msg1['success'] ='true';
 		$msg1['message'] ='Payment Successfully';
 		}
 		else
 		{
 		$msg1['success'] ='false';
 		$msg1['message'] ='Payment is Not Paid';
 		}
 		echo json_encode($msg1);
 		exit;
	 }

	 public function getmanagerdashboarddata()
 	{
 		$array = file_get_contents('php://input');
 		$results =json_decode($array);
 		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
 		if($user->parent == 0)
 		{
 		 $userid = $user->id;
 		}
 		else
 		{
 			$userid = $user->parent;
 		}

 		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
 		$date =  $nowUtc->format('Y-m-d');

 		if(!empty($results->startdate))
 		{
 			$startdate = date("Y-m-d",strtotime($results->startdate));
 		}
 		else
 		{
 		 $startdate = $date;
 		}

 		$data['totaltaskbyme'] = $this->common->count_today_ActiveTask('todoList',array("assignedBy"=>$this->session->userdata['clientloggedin']['id']),$startdate);
 		$data['totaltasktome'] = $this->common->count_today_ActiveTask('todoList',array("assignedTo"=>$this->session->userdata['clientloggedin']['id']),$startdate);
 		$data['project'] = $this->common->count_all_results('project',array("projectManagerId"=>$userid),$startdate);
 		$data['leave'] = $this->common->countleave('user_leave',array("reviewerId"=>$userid),$startdate);
 		$data['dsr'] = $this->common->dsr_count(array("userId"=>$userid,"date"=>$startdate));
 		$data['team'] = $this->common->team_count(array("assignedBy"=>$this->session->userdata['clientloggedin']['id']),$startdate);
		$data['startdate'] = date("d-m-Y",strtotime($startdate));

 	  echo json_encode($data);
 	  exit;
    }

		public function getemployeedashboarddata()
		{
			$array = file_get_contents('php://input');
	 		$results =json_decode($array);
	 		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
	 		if($user->parent == 0)
	 		{
	 		 $userid = $user->id;
	 		}
	 		else
	 		{
	 			$userid = $user->parent;
	 		}

	 		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	 		$date =  $nowUtc->format('Y-m-d');

	 		if(!empty($results->startdate))
	 		{
	 			$startdate = date("Y-m-d",strtotime($results->startdate));
	 		}
	 		else
	 		{
	 		 $startdate = $date;
	 		}

	 		$data['totaltask'] = $this->common->count_today_ActiveTask('todoList',array("assignedTo"=>$this->session->userdata['clientloggedin']['id']),$startdate);
	 		$data['dsr'] = $this->common->dsr_count(array("employeeId"=>$this->session->userdata['clientloggedin']['id'],"date"=>$startdate));
	 		$ann = $this->common->count_all_results('announcement',array("userId"=>$userid,"annDate"=>$startdate,"annSendAll"=>1));
	 		$ann1 = $this->common->count_announcment_results('announcementSend',array("a.userId"=>$this->session->userdata['clientloggedin']['id'],"an.annDate"=>$startdate,"an.annSendAll"=>0));
			$data['announcement'] = $ann + $ann1;
			$data['startdate'] = date("d-m-Y",strtotime($startdate));

	 	  echo json_encode($data);
	 	  exit;
		}

		public function roi_detail($id)
		{
			$data['profitprojectId'] = $id;
			$this->load->view('freelancer/header');
			$this->load->view('freelancer/project_profit_loss_detail',$data);
			$this->load->view('freelancer/footer');
		}

		public function getgroupSuggestionPerson()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
				$userId = $user->id;
			}
			else
			{
				$userId = $user->parent;
			}
			$result = $this->common->getActiveClient(array("j.freelancerId"=>$userId));
			$result1 = $this->common->getGigClient(array("j.userId"=>$userId));
			$team = $this->common->getCompanyTeam(array("us.parent"=>$userId));
			$res = array_merge($result,$team,$result1);
			if($res)
			{
				$output['success'] = "true";
				$output['result'] = $res;
			}
			else
			{
				$output['success'] = "false";
				$output['result'] = '';
			}
			echo json_encode($output);
			exit;
		}

		public function convertlead()
		{
			$array = file_get_contents('php://input');
	 		$results =json_decode($array);
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date = $nowUtc->format('Y-m-d H:i:s');
			$query ='';

			$res = $this->common->getrow('requests',array("id"=>$results->id));
			$detail = unserialize($res->req_detail);
			if(!empty($detail->projectinfo))
			{
			  $query = $detail->projectinfo;
			}

      $source = $this->common->getrow('lead_source',array("userId"=>$res->u_id,"byDefault"=>1));
			$insert = $this->common->insert('lead',array("clientName"=>$detail->name,"phone"=>$detail->phone,"email"=>$detail->email,"website"=>$detail->website,"userId"=>$res->u_id,"lead_sourceId"=>$source->lead_sourceId,"jobDescription"=>$query));
			if($insert)
			{
				if(!empty($detail->serviceId))
				{
				  $ser = $this->common->getrow('services',array("id"=>$detail->serviceId));
				  $skill['skill'] = $ser->name;
				  $skill['leadId'] = $insert[1];
				  $info = $this->common->insert('lead_skill',$skill);
				}
			}

			if($insert)
			{
				$infodata['leadId'] = $insert[1];
				$infodata['employeeId'] = $this->session->userdata['clientloggedin']['id'];
				$infodata['status'] = 0;
				$infodata['date'] = $date;
				$infoinsert = $this->common->insert('lead_info',$infodata);
			}

			if($infoinsert)
			{
			$updated =	$this->common->update(array("id"=>$results->id),array("status"=>1),'requests');
			}
			if($updated)
			{
				$msg['success'] ="true";
			}
			else
			{
				$msg['success'] ="false";
			}
			echo json_encode($msg);
			exit;
		}

		public function getmembershipUsedData()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent == 0)
			{
				$userId = $user->id;
			}
			else
			{
				$userId = $user->parent;
			}
			$data['employee'] = $this->common->count_all_results('user',array("parent"=>$userId));
			$data['project'] = $this->common->count_all_results('project',array("userId"=>$userId));
			$data['expense'] = $this->common->count_all_results('expense',array("userId"=>$userId));
			$data['invoice'] = $this->common->count_all_results('invoice',array("userId"=>$userId));
			$data['package'] = $this->common->count_all_results('service_pricing',array("u_id"=>$userId));
			$data['casestudies'] = $this->common->count_all_results('user_case_studies',array("u_id"=>$userId));
			$data['testimonial'] = $this->common->count_all_results('user_testimonial',array("u_id"=>$userId));
			$data['portfolio'] = $this->common->count_all_results('user_portfolio',array("u_id"=>$userId));
			$data['services'] = $this->common->count_all_results('user_services',array("u_id"=>$userId));
			$data['industry'] = $this->common->count_all_results('user_industries',array("u_id"=>$userId));
			$data['gig'] = $this->common->count_all_results('user_gig',array("userId"=>$userId));
			echo json_encode($data);
			exit;
		}

		public function viewRequest()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$result = $this->common->getrow('requests',array("id"=>$results->id));
			$result->info = unserialize($result->req_detail);
			if(!empty($result->info->serviceId))
			{
			 $ser = $this->common->getrow('services',array("id"=>$result->info->serviceId));
			 if(!empty($ser))
			 {
				 $result->info->services = $ser->name;
			 }
			}
			 unset($result->req_detail);
			if($result)
			{
				$output['success'] ="true";
				$output['result'] = $result;
			}
			else
			{
			 $output['success'] ="false";
			 $output['result'] = '';
			}
			echo json_encode($output);
			exit;
		}

		public function getgigdetail()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$result = $this->common->getgigdetail(array("user_gig_buyId"=>$results->id));
			// $result->additional = $this->common->getbuyadditionalTask(array("b.user_gig_buyId"=>$results->id));

			$result->milestone = $this->common->get('todoList',array("gigId"=>$result->gigId,'milestone'=>1));
			if($result->milestone)
			{
				foreach($result->milestone as $key=>$m)
				{
					$result->milestone[$key]->task = $this->common->get('todoList',array("gigId"=>$result->gigId,"milestone"=>0,"parent"=>$m->id));
				}
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

		public function getGigAssignDetail()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$result = $this->common->getrow('user_gig_buy',array("user_gig_buyId"=>$results->id));
			// $result->additional = $this->common->getbuyadditionalTask(array("b.user_gig_buyId"=>$results->id));
      if(!empty($result))
			{
			$result->milestone = $this->common->getgigAssignedPlan(array("t.user_gig_buyId"=>$results->id,'p.milestone'=>1,"t.assignedBy"=>$this->session->userdata['clientloggedin']['id']));
		  }
			if(!empty($result->milestone))
			{
				foreach($result->milestone as $key=>$m)
				{
					$result->milestone[$key]->task = $this->common->get('todoList',array("user_gig_buyId"=>$results->id,"milestone"=>0,"parent"=>$m->id));
				}
			}

			if(!empty($result->milestone))
			{
				foreach($result->milestone as $key=>$m)
				{
					foreach($m->task as $k=>$t)
					{
						if(!empty($t->startDate))
						{
						$result->milestone[$key]->task[$k]->startDate = date("d-m-Y",strtotime($t->startDate));
					  }
						if(!empty($t->dueDate))
						{
						$result->milestone[$key]->task[$k]->dueDate = date("d-m-Y",strtotime($t->dueDate));
					  }
					}
				}
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

		public function team_add()
		{
			$this->load->view('freelancer/header');
			$this->load->view('freelancer/team_add');
			$this->load->view('freelancer/footer');
		}

		public function allleadteam()
		{
			$user = $this->common->allteam(array("us.id"=>$this->session->userdata['clientloggedin']['id']));
			if($user[0]->parent == 0)
			{
			 $userid = $user[0]->id;
			}
			else
			{
				$userid = $user[0]->parent;
			}
			$result = $this->common->allteam(array("us.parent"=>$userid));
			$result1 = array_merge($user,$result);

      if($result1)
			{
				$data['message'] = "true";
				$data['result'] = $result1;
			}
			else
			{
				$data['message'] = "false";
			}
			echo json_encode($data);
			exit;
		}

		public function askquestionsStatusUpdate()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$result = $this->common->update(array("askQuestionId"=>$results->askQuestionId),array("status"=>$results->status),'askQuestion');

			if($result)
			{
				$output['message'] ="true";
			}
			else
			{
				$output['message'] ="false";
			}
			echo json_encode($output);
			exit;
		}

		public function checkgigbuy()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$result = $this->common->getrow('user_gig_buy',array("gigId"=>$results->gigId));
			if($result)
			{
				$output['success'] ="true";
			}
			else
			{
				$output['message'] ="false";
			}
			echo json_encode($output);
			exit;
		}

		public function notificationSave($data)
		{
			$this->common->insert('user_notification',$data);
		}

		public function getcompanyinfo()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent != 0)
			{
				$userid = $user->parent;
			}
			else
			{
				$userid = $user->id;
			}
			$data['department'] = $this->common->get('department',array("userId"=>$userid));
			$data['working'] = $this->common->getrow('workingHours',array("userId"=>$userid));
      $data['services'] = $this->common->getuserServices($userid);
			echo json_encode($data);
			exit;
		}

		public function editteam()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$id = $results->id;
			$profile = $this->common->getrow('user_meta',array("u_id"=>$id));
			$access = $this->common->getrow('user',array("id"=>$id));
			if(!empty($access))
			{
				$profile->access = $access->access;
			}
			  if(!empty($profile->dateofbirth))
			  {
			  $profile->dateofbirth =  date("d-m-Y",strtotime($profile->dateofbirth));
		    }
				else
				{
					$profile->dateofbirth = '';
				}

			 if(!empty($profile->joiningdate))
			 {
			  $profile->joiningdate =  date("d-m-Y",strtotime($profile->joiningdate));
		   }

			 $profile->services = $this->common->getservices(array("us.u_id"=>$id));
			 $profile->experience = $this->common->get('employee_experience',array("u_id"=>$id));
			 $profile->activities = $this->common->get('employee_activities',array("u_id"=>$id));


			 if($profile)
			 {
				 $msg['message'] ="true";
				 $msg['result'] = $profile;
			 }
			 else
			 {
				 $msg['message'] ="false";
			 }
			 echo json_encode($msg);
		}

		public function updateTeam()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent != 0)
			{
			 $userId = $user->parent;
			}
			else
			{
			 $userId = $user->id;
			}

			$services = $results->services;
			$experience = $results->experience;
			$activities = $results->activities;
			$access = $results->access;

			$results->dateofbirth =  date("Y-m-d",strtotime($results->dateofbirth));
			if(!empty($results->joiningdate))
			{
			$results->joiningdate =  date("Y-m-d",strtotime($results->joiningdate));
		  }

			if($results->maritalStatus == 2)
			{
			$results->marriageAnniversary =  date("Y-m-d",strtotime($results->marriageAnniversary));
		  }

			if(empty($results->company_logo))
			{
				unset($results->company_logo);
			}

			if(empty($results->activity))
			{
	      unset($results->activity);
			}

			unset($results->services);
			unset($results->access);
			unset($results->experience);
			unset($results->activities);
			$companyCode = $this->common->getrow('user_paymentmethod',array("userId"=>$userId));
		 	if(!empty($companyCode) && $companyCode->companyCode != '')
		 	{
				$check = $this->common->getrow('user_meta',array("u_id"=>$results->u_id));
				if($check->employeeCode == '')
				{
					$countEmployee = $this->common->countTeamEmployeeCode(array("us.parent"=>$userId));
			   if($countEmployee != 0)
			   {
				  $employeeCode = $countEmployee + 1;
				  $employeeCode = $companyCode->companyCode.'-000'.$employeeCode;
			   }
			   else
			   {
			    $employeeCode = $companyCode->companyCode.'-0001';
			   }
				 $results->employeeCode = $employeeCode;
				}
	      $profile = $this->common->update(array("u_id"=>$results->u_id),$results,'user_meta');
	      $this->common->update(array("id"=>$results->u_id),array("access"=>$access),'user');
	      if($profile)
			  {
				 $this->db->where('u_id',$results->u_id);
	       $query = $this->db->delete('user_services');

				  if(!empty($services))
					{
	 			   foreach($services as $ser)
	 			   {
	 		     $services = $this->common->insert('user_services',array("u_id"=>$results->u_id,"servicesId"=> $ser->id));
	 			   }
			   }
				 $this->common->delete('employee_experience',array('u_id'=>$results->u_id));
				 $this->common->delete('employee_activities',array('u_id'=>$results->u_id));

	        if(!empty($experience))
					{
				    foreach($experience as $res)
				    {

	             $ex['u_id'] = $results->u_id;
							 $ex['experienceDesignation'] = $res->designation;
							 $ex['experienceMonthStart'] = $res->MonthStart;
							 $ex['experienceYearStart'] = $res->YearStart;
							 $ex['experienceMonthEnd'] = $res->MonthEnd;
							 $ex['experienceYearEnd'] = $res->YearEnd;
							 $ex['experienceDescription'] = $res->description;
							 $ex['experienceCompany'] = $res->company;
							 $ex['experienceCurrentlyWorking'] = $res->working;
	              if($res->designation != '')
								{
							 $experienc = $this->common->insert('employee_experience',$ex);
						    }
				     }
			    }

					if(!empty($activities))
					{
						foreach($activities as $ac)
						{
						$a['u_id'] = $results->u_id;
						$a['name'] = $ac->name;
						$a['upload'] = $ac->upload;
						$a['type'] = $ac->type;
						$activity = $this->common->insert('employee_activities',$a);
					  }
					}
			 }

			 if($profile)
			 {
				 $msg['message'] = "true";
			 }
			 else
			 {
			   $msg['message'] ="false";
			 }
		 }
		 else
		 {
		  $msg['error'] = "true";
		 }
	     echo json_encode($msg);
			 exit;
		}

		public function team_edit($id)
		{
			$data['teammemberId'] = $id;
      $this->load->view('freelancer/header');
      $this->load->view('freelancer/team_edit',$data);
      $this->load->view('freelancer/footer');
		}

		public function getgigproject()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$result = $this->common->getActivegigProject(array("clientId"=>$results->clientId,"t.milestone"=>1));
			if($result)
			{
				$output['success'] = "true";
				$output['result'] = $result;
			}
			else
			{
				$output['success'] = "false";
				$output['result'] = "";
			}
			echo json_encode($output);
			exit;

		}

		public function gettasktime()
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->parent != 0)
			{
			 $userid = $user->parent;
			}
			else
			{
			 $userid = $user->id;
			}
			$result = $this->common->getrow('task_setting',array("userId"=>$userid));
			if($result)
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

		public function dsrtaskdetail()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

		  $res = $this->common->getMydsrTaskDetail(array("employeeId"=>$results->employeeId),$results->date);


			if(!empty($res))
			{
				foreach($res as $key=>$r)
				{

					if($r->type == 2)
				  {
				    $project = $this->common->getrow('project',array("projectId"=>$r->projectId));
						if(!empty($project))
						{
							$res[$key]->project = $project->projectName;
						}
			    }
					else if($r->type == 1)
				  {
				    $task = $this->common->getrow('todoList',array("id"=>$r->projectId));
						if(!empty($task))
						{
							$res[$key]->project = "General task";
						}
			    }
					else if($r->type == 3)
				  {
				    $contract = $this->common->getrow('user_jobcontract',array("contractId"=>$r->projectId));
				    $job = $this->common->getrow('user_job',array("jobId"=>$contract->jobId));
						if(!empty($job))
						{
							$res[$key]->project  = $job->jobTitle;
						}
			    }
					else if($r->type == 4)
					{
						$gig = $this->common->getrow('user_gig_buy',array("user_gig_buyId"=>$r->projectId));
						if(!empty($gig))
						{
							$res[$key]->project = $gig->title;
						}
					}
					else if($r->type == 5)
					{
						$res[$key]->project = "Additional task";
					}
					else if($r->type == 6)
					{
						$breaks = $this->common->getrow('break_time',array("id"=>$r->projectId));
           if($breaks)
					  {
						$res[$key]->project = $breaks->name;
					  }
					}

					if($r->time != 0)
					{
							 $hours = floor($r->time / 60);
							 if($hours < 10)
							 {
								 $hours = '0'.$hours;
							 }
							 $minutes = ($r->time % 60);
							 if($minutes < 10)
							 {
								 $minutes = '0'.$minutes;
							 }
							 $d = $hours.':'.$minutes;
						if($d)
						{
						 $res[$key]->time = $d;
						 }
					}
					if($r->adjustedTime != 0)
					{
						$hours1 = floor($r->adjustedTime / 60);
						if($hours1 < 10)
						{
							$hours1 = '0'.$hours1;
						}
						$minutes1 = ($r->adjustedTime % 60);
						if($minutes1 < 10)
						{
							$minutes1 = '0'.$minutes1;
						}
						$d1 = $hours1.':'.$minutes1;
						if($d1)
						{
						$res[$key]->adjustedTime = $d1;
						}
						if($this->session->userdata['clientloggedin']['id'] == $r->employeeId)
						{
             $res[$key]->readonly = 1;
						}
						else
						{
							$res[$key]->readonly = 0;
						}

					}
				}
			}

		if($res)
		{
			$output['success'] ="true";
			$output['result'] = $res;
		}
		else
		{
		  $output['success'] ="false";
		  $output['result'] ="";
		}
		echo json_encode($output);
		exit;

   }

	 public function dsrTimeAdjustUpdate()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
     $adjustedTime = 0;
		 $hours = 0;
		 $minutes = 0;
		 $a = explode(":",$results->adjustedTime);
		 $hours = $a[0] * 60;
		 $minutes = $a[1];
		 $adjustedTime = $hours + $minutes;
		 $update = $this->common->update(array("dsrId"=>$results->dsrId),array("adjustedTime"=>$adjustedTime),'dsr');
		 if($update)
		 {
			 $totaltime =  $this->common->sum_dsr_time(array("employeeId"=>$results->userId,"date"=>$results->date));
        if($totaltime->adjusted != 0)
						{
							$hours1 = floor($totaltime->adjusted / 60);
							if($hours1 < 10)
							{
							 $hours1 = '0'.$hours1;
							}
							$minutes1 = ($totaltime->adjusted % 60);
							if($minutes1 < 10)
							{
							 $minutes1 = '0'.$minutes1;
							}
							$d1 = $hours1.':'.$minutes1;

						 }
		 }
		if($update)
		{
			$output['success'] = "true";
			$output['result'] = $d1;
		}
		else
		{
		 $output['success'] = "false";
		}
		echo json_encode($output);
		exit;
	 }

	 public function leadConvertToProject()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date = $nowUtc->format('Y-m-d H:i:s');

		 $res = $this->common->getrow('lead',array("leadId"=>$results->leadId));
		 $lead = $this->common->getOneRow('lead_info',array("leadId"=>$results->leadId),'lead_infoId','desc');
		 if($res)
		 {
			 $a['clientName'] = $res->clientName;
			 $a['email'] = $res->email;
			 $a['projectName'] = $res->jobTitle;
			 $a['phone'] = $res->phone;
			 $a['countrycode'] = $res->countryCode;
			 $a['countryclass'] = $res->countryClass;
			 $a['skype'] = $res->skype;
			 $a['lead_sourceId'] = $res->lead_sourceId;
			 $a['userId'] = $res->userId;
			 $a['currency'] = $lead->currencyId;
			 $a['budget'] = $lead->budget;
			 $a['date'] = $date;
			$inserted = $this->common->insert('project',$a);
			$this->common->update(array("leadId"=>$results->leadId),array("status"=>13),'lead_info');
		 }
		 if($inserted)
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



	 public function projectMilestoneSave()
	 {
		 $array = file_get_contents('php://input');
  	 $results =json_decode($array);

		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $results->date  =  $nowUtc->format('Y-m-d');
		 $user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		 if($user->parent != 0)
		 {
			 $userid = $user->parent;
		 }
		 else
		 {
			 $userid = $user->id;
		 }
		 $results->userId = $userid;
	   $milestone = $results->milestones;
		  if(!empty($milestone))
			{
				 foreach($milestone as $m)
				 {
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
						$addhours = $m->hours;
					 $mi['name'] = $m->title;
					 $mi['hours'] = $m->hours;
					 $mi['projectId'] = $results->projectId;
					 $mi['assignedBy'] = $this->session->userdata['clientloggedin']['id'];
					 $mi['type'] = 2;
					 $mi['status'] = 2;
					 $mi['taskId'] = $taskId;
					 $mi['milestone'] = 1;

					 $minsert =$this->common->insert('todoList',$mi);
					  if($minsert)
						{
							foreach($m->task as $t)
							{
								if(!empty($t->task))
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
								    $tdata['parent'] = $minsert[1];
								    $tdata['projectId'] = $results->projectId;
										$tdata['name'] = $t->task;
										$tdata['description'] = $t->description;
										$tdata['hours'] = $t->hours;
										$tdata['assignedBy'] = $this->session->userdata['clientloggedin']['id'];
										$tdata['type'] = 2;
										$tdata['status'] = 2;
										$tdata['taskId'] = $taskId1;
									$task = $this->common->insert('todoList',$tdata);
								}
							}
						}
				 }
			 }

			 if($task)
 			{
 			 $p =	$this->common->getrow('project',array("projectId"=>$results->projectId));
 			 $thours = $p->totalHour + $addhours;
 			 $totalamount = $thours * $p->hourlyPrice;
 			 $res = $this->common->update(array("projectId"=>$results->projectId),array("totalHour"=>$thours,"budget"=>$totalamount),'project');
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

	 public function manager_performance()
	 {
		 $this->load->view('freelancer/header');
		 $this->load->view('freelancer/manager_performance');
		 $this->load->view('freelancer/footer');
	 }

	 public function getManagerPerformance()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d');
		 $config = array();

		 $data['pcount'] = $this->common->count_all_results('performance_reviewer',array("userId"=>$this->session->userdata['clientloggedin']['id'],"type"=>1));
		 $config["total_rows"] = $this->common->count_all_results('performance_reviewer',array("userId"=>$this->session->userdata['clientloggedin']['id'],"type"=>1));


		$config["per_page"] = $results->perpage;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$res = $this->common->getmanagerPerformance(array("pr.userId"=>$this->session->userdata['clientloggedin']['id'],"pr.type"=>1),$start,$config["per_page"]);
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

	 public function performanceReviewer()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $name = $results->name;
		 $parent = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		 if($parent->parent == 0)
		 {
			 $parent = $this->session->userdata['clientloggedin']['id'];
		 }
		 else if($parent->parent != 0)
		 {
			$parent = $parent->parent;
		 }
			if(isset($name))
			{
				$result = $this->common->performanceReviewer('m.name',$name,$results->userId,array("u.parent"=>$parent));
			}

			if($result)
			{
				$msg['message']="true";
				$msg['result'] = $result;
			}
			else
			{
				$msg['message']="false";
				$msg['result'] = '';
			}
			echo json_encode($msg);
			exit;
	 }

	 public function performance_edit($id)
	 {
		 $data['performance_reviewerid'] = $id;
		 $this->load->view('freelancer/header');
		 $this->load->view('freelancer/manager_performance_edit',$data);
		 $this->load->view('freelancer/footer');
	 }

	 public function performanceEdit()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $parent = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($parent->parent == 0)
		{
			$parent = $this->session->userdata['clientloggedin']['id'];
		}
		else if($parent->parent != 0)
		{
		 $parent = $parent->parent;
		}

		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('d-m-Y');
	   $result = $this->common->getEditPerformance(array("pr.performance_reviewerid"=>$results->performance_reviewerid));

		 $performance = $this->common->lastReviewer(array("employeeId"=>$result->employeeId),$result->perId);

		 if($performance)
		 {
			$result->lastreviewdate = $performance->date;
		 }
		 else
		 {
			$result->lastreviewdate = '';
		 }

		if(!empty($result->forms))
		{
		 $result->forms = unserialize($result->forms);
	  }
		else
		{
			$result->primary = $this->common->get('performance_form_primary',array("performance_formId"=>$result->performance_formId));
 		  if($result->primary)
 		  {
 			 foreach($result->primary as $k=>$p)
 			 {
 			  $result->primary[$k]->criteria = $this->common->get('performance_form_criteria',array("performance_form_primaryId"=>$p->performance_form_primaryId));
 			  }
 		  }
		}

		 if(!empty($result))
		 {
			 $allreview = $this->common->performanceReview(array("perId"=>$result->perId));
		 }
		 if(!empty($result->joiningdate))
		 {
			$result->joiningdate = date("d-m-Y",strtotime($result->joiningdate));
		 }
		 if(!empty($result->perReviewPeriodStart))
		 {
			$result->perReviewPeriodStart = date("d-m-Y",strtotime($result->perReviewPeriodStart));
		 }
		 if(!empty($result->perReviewPeriodEnd))
		 {
			$result->perReviewPeriodEnd = date("d-m-Y",strtotime($result->perReviewPeriodEnd));
		 }
		 if(!empty($result->date))
		 {
			$result->date = date("d-m-Y",strtotime($result->date));
		 }

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

	 public function performanceUpdate()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d');
		 // $results->date = $date;
		 $forms = $results->form;
		 unset($results->form);
		 $results->forms = serialize($forms);
		 $results->status = 1;
		 $result = $this->common->update(array("performance_reviewerid"=>$results->performance_reviewerid),$results,'performance_reviewer');
		 if($result)
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

	 public function signatureUpload()
	 {
		 $data = $_REQUEST['file'];
 		list($type, $data) = explode(';', $data);
 		list(, $data)      = explode(',', $data);
 		$data1 = base64_decode($data);
 		$f = finfo_open();
 		$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);
 		if($mime_type =="image/png")
 		{
 		  $image = uniqid().'signature.png';
 			file_put_contents('assets/signature/'.$image,$data1);

 		}
		if($image)
		{
		$msg['success'] ="true";
		$msg['image'] = $image;
	  }
		else
		{
			$msg['success'] ="false";
		}
		echo json_encode($msg);
    exit;
	 }

	 public function myperformance()
	 {
		 $this->load->view('freelancer/header');
		 $this->load->view('freelancer/myperformance');
		 $this->load->view('freelancer/footer');
	 }

	 public function getmyPerformance()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d');
		 $config = array();

		 $data['pcount'] = $this->common->count_all_results('performance_reviewer',array("userId"=>$this->session->userdata['clientloggedin']['id'],"type"=>0));
		 $config["total_rows"] = $this->common->count_all_results('performance_reviewer',array("userId"=>$this->session->userdata['clientloggedin']['id'],"type"=>0));


		$config["per_page"] = $results->perpage;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$res = $this->common->MyPerformance(array("pr.userId"=>$this->session->userdata['clientloggedin']['id'],"pr.type"=>0),$start,$config["per_page"]);
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

	 public function myPerformanceAdd($id)
	 {
		 $data['myPerformanceId'] = $id;
		 $this->load->view('freelancer/header');
		 $this->load->view('freelancer/myPerformanceAdd',$data);
		 $this->load->view('freelancer/footer');
	 }

	 public function getmyperformanceEdit()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('d-m-Y');
	   $result = $this->common->getEditPerformance(array("pr.performance_reviewerid"=>$results->performance_reviewerid));

		 $performance = $this->common->lastReviewer(array("employeeId"=>$result->employeeId),$result->perId);
		 if(!empty($result->forms))
	 	{
	 	 $result->forms = unserialize($result->forms);
	 	}
	 	else
	 	{
	 		$result->primary = $this->common->get('performance_form_primary',array("performance_formId"=>$result->performance_formId));
	 		if($result->primary)
	 		{
	 		 foreach($result->primary as $k=>$p)
	 		 {
	 			$result->primary[$k]->criteria = $this->common->get('performance_form_criteria',array("performance_form_primaryId"=>$p->performance_form_primaryId));
	 			}
	 		}
	 	}

		 if($performance)
		 {
			$result->lastreviewdate = $performance->date;
		 }
		 else
		 {
			$result->lastreviewdate = '';
		 }
		 if(!empty($result->joiningdate))
		 {
			$result->joiningdate = date("d-m-Y",strtotime($result->joiningdate));
		 }
		 if(!empty($result->perReviewPeriodStart))
		 {
			$result->perReviewPeriodStart = date("d-m-Y",strtotime($result->perReviewPeriodStart));
		 }
		 if(!empty($result->perReviewPeriodEnd))
		 {
			$result->perReviewPeriodEnd = date("d-m-Y",strtotime($result->perReviewPeriodEnd));
		 }
		 if(!empty($result->date))
		 {
			$result->date = date("d-m-Y",strtotime($result->date));
		 }

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

	 public function performance_form()
	 {
		 $this->load->view('freelancer/header');
		 $this->load->view('freelancer/performance_form');
		 $this->load->view('freelancer/footer');
	 }

	 public function getPerformanceform()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $parent = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
		if($parent->parent == 0)
		{
			$parentId = $this->session->userdata['clientloggedin']['id'];
		}
		else if($parent->parent != 0)
		{
		 $parentId = $parent->parent;
		}
		 $page = $results->page;
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d');
		 $config = array();

		 $data['pcount'] = $this->common->count_all_results('performance_form',array("userId"=>$parentId));
		 $config["total_rows"] = $this->common->count_all_results('performance_form',array("userId"=>$parentId));
     $config["per_page"] = $results->perpage;
		 $this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$res = $this->common->performanceForm(array("p.userId"=>$parentId),$start,$config["per_page"]);
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

	 public function performanceformAdd()
	 {
		 $this->load->view('freelancer/header');
		 $this->load->view('freelancer/performance_form_add');
		 $this->load->view('freelancer/footer');
	 }

	 public function performance_formSave()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $parent = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
	   if($parent->parent == 0)
	   {
		 $userId = $this->session->userdata['clientloggedin']['id'];
	   }
	   else if($parent->parent != 0)
	  {
		 $userId = $parent->parent;
	  }
		 $form = $results->form;
		 unset($results->form);
		 $check = $this->common->getrow('performance_form',array("userId"=>$userId,"departmentId"=>$results->departmentId));
		 if(!empty($check))
		 {
			 $output['error'] = "true";
		 }
		 else
		 {
		 $res = $this->common->insert('performance_form',array("userId"=>$userId,"departmentId"=>$results->departmentId));
		 if($res)
		 {
			 if(!empty($form))
			 {
				 foreach($form as $f)
				 {
					 $hinsert = $this->common->insert('performance_form_primary',array("performance_formId"=>$res[1],"title"=>$f->title));
					 if($hinsert)
					 {
						 foreach($f->sub as $s)
						 {
							$subinsert = $this->common->insert('performance_form_criteria',array("performance_form_primaryId"=>$hinsert[1],"title"=>$s->title,"description"=>$s->description));
						 }
					 }
				 }
			 }
		 }

		 if($res)
		 {
			 $output['success'] ="true";
		 }
		 else
		 {
		   $output['success'] ="false";
		 }
	 }

		 echo json_encode($output);
		 exit;

	 }

	 public function performance_view($id)
	 {
		 $data['performanceId'] = $id;
		 $this->load->view('freelancer/header');
		 $this->load->view('freelancer/performance_view',$data);
		 $this->load->view('freelancer/footer');
	 }

	 public function getperformanceView()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $performance = $this->common->performanceView(array("perId"=>$results->perId));
		 $performance->date = date('d-m-Y',strtotime($performance->date));
		 $performance->joiningdate = date('d-m-Y',strtotime($performance->joiningdate));
		 $performance->perReviewPeriodStart = date('d-m-Y',strtotime($performance->perReviewPeriodStart));
		 $performance->perReviewPeriodEnd = date('d-m-Y',strtotime($performance->perReviewPeriodEnd));
		 $performance->reviewer = $this->common->performancer_reviwer_view(array("perId"=>$results->perId,"type"=>1));
	   if($performance)
		 {
			$data['success'] ="true";
			$data['result'] = $performance;
		 }
		 else
		 {
			$data['success'] ="false";
			$data['result'] = '';
		 }

		echo json_encode($data);
		exit;
	 }



   public function performancePdf($id)
	 {
		 $parent = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
	   if($parent->parent == 0)
	   {
		 $userId = $this->session->userdata['clientloggedin']['id'];
	   }
	   else if($parent->parent != 0)
	   {
		 $userId = $parent->parent;
	   }
     $userdetail = $this->common->getrow('user_meta',array("u_id"=>$userId));
		 $reviewer = $this->common->performancer_reviwer_viewOne(array("performance_reviewerid"=>$id));
		 $performance = $this->common->performanceView(array("perId"=>$reviewer->perId));
		 $performance->date = date('d-m-Y',strtotime($performance->date));
		 $performance->joiningdate = date('d-m-Y',strtotime($performance->joiningdate));
		 $performance->perReviewPeriodStart = date('d-m-Y',strtotime($performance->perReviewPeriodStart));
		 $performance->perReviewPeriodEnd = date('d-m-Y',strtotime($performance->perReviewPeriodEnd));
		 if(!empty($reviewer->forms))
		 {
			$reviewer->forms = unserialize($reviewer->forms);
		  }
			else
			{
			 $reviewer->forms ='';
			}
			$data['department'] = $this->common->getrow('department',array("id"=>$performance->departmentId));
			$data['reviewer'] = $reviewer;
			$data['performance'] = $performance;
      $data['logo'] = $userdetail->company_logo;
      $data['address'] = $userdetail->address1;
			$html = $this->load->view('email/performancePdf',$data,TRUE);

			$pdfFilePath = "performance.pdf";
			$this->load->library('m_pdf');
			$this->m_pdf->pdf->WriteHTML($html);
			$this->m_pdf->pdf->Output($pdfFilePath, "I");
	 }

	 public function account_setting()
	 {
		 $res = [];
		 $result = $this->common->get('income_access',array("userId"=>$this->session->userdata['clientloggedin']['id']));
		 if($result)
		 {
			 foreach($result as $r)
			 {
				 $res[] = $r->access;
			 }
		 }
		 $data['result'] = $res;
		 $this->load->view('freelancer/header');
		 $this->load->view('freelancer/account_setting',$data);
		 $this->load->view('freelancer/footer');
	 }

	 public function AccessUpdate()
   {
		 $access = $_POST['access'];
		 if(!empty($access))
		 {
			 $this->common->delete('income_access',array("userId"=>$this->session->userdata['clientloggedin']['id']));
			 foreach($access as $a)
			 {
				$inserted = $this->common->insert('income_access',array("userId"=>$this->session->userdata['clientloggedin']['id'],"access"=>$a));
			 }
		 }

		 if($inserted)
		 {
			 $output['success'] ="true";
			 $output['success_message'] ="Income Access Updated Successfully";
		 }
		 else
		 {
			 $output['formErrors'] ="true";
			 $output['error_message'] ="Income Access Not Updated";
		 }
		 echo json_encode($output);
		 exit;
	 }

	 public function projectSubTaskUpdate()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $oldhour = $results->oldhour;
		 unset($results->oldhour);
		 $project = $this->common->getrow('project',array("projectId"=>$results->projectId));
     $result = $this->common->update(array("id"=>$results->id),$results,'todoList');
		 $milestone = $this->common->getrow('todoList',array("id"=>$results->parent));
		 if($result)
		 {
			 $hours = $project->totalHour - $oldhour;
			 $thours = $hours + $results->hours;
			 $totalbudget = $thours * $project->hourlyPrice;
			 $this->common->update(array("projectId"=>$project->projectId),array("totalHour"=>$thours,"budget"=>$totalbudget),'project');
			 $milestone->hours = $milestone->hours - $oldhour;
			 $milestone->hours = $milestone->hours + $results->hours;
			 $this->common->update(array("id"=>$milestone->id),array("hours"=>$milestone->hours),'todoList');
		 }
		 if($result)
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

	 public function multipleTaskDelete()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $res = $this->common->deleteMultiple('todoList','id',$results->id);
		 if($res)
		 {
			 $milestone = $this->common->get('todoList',array("projectId"=>$results->projectId,"parent"=>0));
		 }

		 if(!empty($milestone))
		 {
			 foreach($milestone as $key=>$m)
			 {
				$milestone[$key]->task = $this->common->gettask(array("projectId"=>$results->projectId,"parent"=>$m->id));
			 }
		 }

		 if(!empty($milestone))
		 {
			 $allm = 0;
			 foreach($milestone as $m)
			 {
				 $mtotal = 0;
				 foreach($m->task as $t)
				 {
           $mtotal += $t->hours;
				 }
				 $allm += $mtotal;
				 $this->common->update(array("id"=>$m->id),array("hours"=>$mtotal),'todoList');
			 }
			 $p = $this->common->getrow('project',array("projectId"=>$results->projectId));
		 	 $totalbudget = $p->hourlyPrice * $allm;
			 $this->common->update(array("projectId"=>$results->projectId),array("totalHour"=>$allm,"budget"=>$totalbudget),'project');
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

	 public function saveJoiningDate()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $date =  date('Y-m-d',strtotime($results->date));
		 $update = $this->common->update(array("candidateId"=>$results->id),array("joiningDate"=>$date),'candidate');
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

	 public function projectclientupdate()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $document = $results->document;
		 unset($results->document);

		 $result = $this->common->update(array("projectId"=>$results->projectId),$results,'project');
		 if($result)
		 {
			 if(!empty($document))
	 			 {
					$query = $this->common->delete('project_document',array('projectId',$results->projectId));
	 				 foreach($document as $doc)
	 				 {
	 					 $d['document'] = $doc;
	 					 $d['projectId'] = $results->projectId;
	 					 $dd = $this->common->insert('project_document',$d);
            }
	 			 }
		 }
		 if($result)
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

	 public function expenseAttachment()
		{

			$ctype ='';
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$data = $results->image;
			$name = $results->name;
			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);

			$data1 = base64_decode($data);

			$f = finfo_open();
			$mime_type = finfo_buffer($f, $data1, FILEINFO_MIME_TYPE);
			echo $image = $name;
			$result = file_put_contents('assets/expenseupload/'.$image,$data1);
			exit;
		}

		public function milestoneDeleted()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$query = $this->common->delete('todoList',array("id"=>$results->id));
			if($query)
			{
				$this->common->delete('todoList',array("id"=>$results->id));
			}
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

		public function projectMilestoneUpdate()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date = $nowUtc->format('Y-m-d H:i:s');

			$res = $this->common->update(array("id"=>$results->id),$results,'todoList');

			 if($res)
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


		public function convertEmployee()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date = $nowUtc->format('Y-m-d H:i:s');

			if(isset($this->session->userdata['clientloggedin']))
			{
				$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
				if($user->parent == 0)
				{
					$userId = $this->session->userdata['clientloggedin']['id'];
				}
				else if($user->parent != 0)
				{
					$userId = $user->parent;
				}
			}

			$interview = $this->common->getrow('interview',array("interviewId"=>$results->interviewId));
      if(!empty($interview))
			{
			$userdetail = $this->common->getrow('candidate',array("candidateId"=>$interview->candidateId));



			$check_email=$this->common->checkexist('user',array('email' =>$userdetail->candidateEmail));

			if($check_email != 0)
			{
				$msg['success'] ='2';
				$msg['message'] ='Email is Register Already';
				echo json_encode($msg);
				exit;
			}
			else
			{

			 $length           = 8;
			 $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			 $charactersLength = strlen($characters);
			 $random           = '';
			 for ($i = 0; $i < $length; $i++) {
				 $random .= $characters[rand(0, $charactersLength - 1)];
			 }
			$project = 0;
			$us['email'] = $userdetail->candidateEmail;
			$us['pass'] = md5($random);
			$us['is_active'] = 1;
			$us['access'] = 3;
			$us['parent'] = $userId;



			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			$us['type'] = 3;
			$us['membership'] = 0;
			$us['uhash'] = strtotime($date) . rand(0,9999);
			$us['date_created'] = $date;
			$us['access'] = 3;


			$userinsert = $this->common->insert('user',$us);
			$skill['u_id'] = $userinsert[1];



			if($userinsert)
			{
			 $detail['name'] = $userdetail->candidateName;
			 $detail['pass'] = $random;
			 $detail['email'] = $userdetail->candidateEmail;

			 if($us['access'] != 3 )
			 {
				$message = $this->load->view('email/team_register',$detail,true);
				$this->mailsend('Top-SEOs Account',$us['email'],$message);
			 }

				$dd['u_id']  = $userinsert[1];
        $dd['name']  = $userdetail->candidateName;
				$companyData = $this->common->getrow("user_meta",array("u_id"=>$userId));
				$dd['date_created'] = $date;
				$dd['country'] = $companyData->country;
				$dd['joiningdate'] = $date;

				$team = $this->common->insert('user_meta',$dd);


			}
		}


			if($team)
			{
				$msg['success'] ='1';
				$msg['message'] ='register Successfully';
			}
			else
			{
				$msg['success'] ='0';
				$msg['message'] ='user not register';
			}
		}
			echo json_encode($msg);
			exit;
		}

		public function viewTask()
		{
			$array = file_get_contents('php://input');
			$results =json_decode($array);
      $task = $this->common->getrow('todoList',array("id"=>$results->id));
			if(!empty($task))
			{
				$dsr = $this->common->getrow('dsr',array("todoId"=>$task->id));
				if(!empty($dsr->id))
				{
					$remark = $this->common->getOneRow('dsr_history',array("dsrId"=>$dsr->dsrId),'dsr_historyId','desc');
					if($remark->message == "Rejected")
					{
					 $task->dsrremark = $remark->remarks;
				  }
				}
			}
			if(!empty($task->projectId))
			{
        $p = $this->common->getrow('project',array("projectId"=>$task->projectId));
				if(!empty($p))
				{
				$task->projectname = $p->projectName;
			   }
			}
			else if(!empty($task->contractId))
			{
				$p = $this->common->getrow('user_jobcontract',array("contractId"=>$task->contractId));
				$job = $this->common->getrow('user_job',array("contractId"=>$p->jobId));
				if(!empty($job))
				{
				$task->projectname = $job->jobTitle;
				 }
			}
			else if(!empty($task->user_gig_buyId))
			{
				$p = $this->common->getrow('user_gig_buy',array("user_gig_buyId"=>$task->user_gig_buyId));
				if(!empty($p))
				{
				$task->projectname = $p->title;
				 }
			}
			if($task)
			{
				$output['success'] = "true";
				$output['result'] = $task;
			}
			else
			{
				$output['success'] = "false";
				$output['result'] = '';
			}
			echo json_encode($output);
			exit;
		}

		public function getallemployee()
		{
			$parent = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
 	    if($parent->parent == 0)
 	    {
 		   $userId = $this->session->userdata['clientloggedin']['id'];
 	     }
 	     else if($parent->parent != 0)
 	     {
 		    $userId = $parent->parent;
 	     }

			$result = $this->common->getallEmployee(array("us.parent"=>$userId),$this->session->userdata['clientloggedin']['id']);
			if($result)
			{
				$output['success'] = "true";
				$output['result'] = $result;
			}
			else
			{
			  $output['success'] = "false";
				$output['result'] ='';
			}

			echo json_encode($output);
			exit;
		}


		public function todoactivitySave($array)
		{
			 $this->db->insert('todoList_activities',$array);
		}





}
