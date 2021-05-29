<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// require 'vendor/autoload.php';

// use \Firebase\JWT\JWT;

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('common');
		$this->load->library('pagination');
	}

	public function index()
	{
		$s ='';
		$result =  $this->common->homepagefreelancer();

    $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$scored = array();
		$SuccessScored = array();


		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
				$time = strtotime($date) - strtotime($res->timeStamp);
				if($time > 20)
				{
					$result[$key]->online ="0";
					$scored[$key] = 0;
					$SuccessScored[$key] = $res->score;
				}
				else
				{
					$result[$key]->online ="1";
					$scored[$key] = 1;
					$SuccessScored[$key] = $res->score;
				}
			}
		}

		array_multisort($scored, SORT_DESC,$SuccessScored, SORT_DESC, $result);

		if(!empty($result))
		{
			$totalearning = 0;
			$t = 0;
			$score = 0;
			$jobs =0;
			$countreview =0;

			foreach($result as $key=>$res)
			{
				if($res->parent != 0)
				{
					$clogo = $this->common->getSingleUser(array("us.id"=>$res->parent));
					$result[$key]->company_logo = $clogo->company_logo;
					$result[$key]->score = $clogo->successScore;
					$result[$key]->rating = $clogo->rating;
					$result[$key]->company_link = $clogo->c_name;
				}

				$data1 = $this->common->getjobSuccess(array("jc.freelancerId"=>$res->u_id));
				$amount = $this->common->gettoprated(array("jc.freelancerId"=>$res->u_id));


				$countreview = $this->common->countReviewproject('user_review',array("reviewTo"=>$res->u_id));

				if(!empty($amount))
				{
					foreach($amount as $am)
					{
						$totalearning =+ $am->contractAmount;
					}
					if(!empty($data1->jobs))
					{
						$jobs = $data1->jobs;
					}

				}
				$result[$key]->reviewcount = $countreview;
				$result[$key]->jobcount = $jobs;
				$result[$key]->totalearning = $totalearning;
			}

      $data['result'] = $result;
   }

		$data['topindustry'] = $this->common->get('top_industry',array("status"=>1));
		$data['testimonial'] = $this->common->get('testimonial',array("status"=>1));
		$data['works'] = $this->common->get('works',array("status"=> 1));
		$data['blog'] = $this->common->getHomeblog(array("status"=> 1),'3');



		$this->load->view('front/header');
		$this->load->view('front/index',$data);
		$this->load->view('front/footer');
	}



	public function getAllService()
	{
		$allservices = $this->common->getTable('user_services');
		$s = array();
		if(!empty($allservices))
		{
			foreach($allservices as $ser)
			{
				$s[] =$ser->servicesId;
			}
		}

		$services = array_unique($s);
		if(!empty($services))
		{
			$ser = $this->common->getInServices1('services','id',$services);
		}

		if(!empty($ser))
		{
			foreach($ser as $key=>$se)
			{

				$link = $this->common->getrow('hire_ranking_content',array("servicesId"=>$se->id));
				if(!empty($link))
				{
					$ser[$key]->link = $link->url;
				}
				else
				{
					$ser[$key]->link = '';
				}
			}
		}

    // $ser1 = array_multisort($scored,SORT_ASC,$ser);
		 //print_r($ser1);

		if(!empty($ser))
		{
			$msg['message'] = "true";
			$msg['result'] = $ser;
		}

		else
		{
			$msg['message'] = "false";
		}

		echo json_encode($msg);

	}

	public function getAllCountry()
	{
		$allcountry = $this->common->getfreelancerCountry();
		$c = array();

		if(!empty($allcountry))
		{
			foreach($allcountry as $count)
			{
				$c[] =$count->country;
			}
		}

		$country = array_unique($c);

		if(!empty($country))
		{
			$countries = $this->common->getIn('countries','id',$country);
		}


		if(!empty($countries))
		{
			$msg['message'] = "true";
			$msg['result'] = $countries;
		}
		else
		{
			$msg['message'] = "false";
		}

		echo json_encode($msg);
	}

	public function getAllIndustry()
	{
		$allindustry = $this->common->getTable('user_industries');
		$i = array();
		if(!empty($allindustry))
		{
			foreach($allindustry as $ind)
			{
				$i[] =$ind->industryId;
			}
		}

		$industry = array_unique($i);
		if(!empty($industry))
		{
			$ind = $this->common->getIn('practice_areas','id',$industry);
		}


		if(!empty($ind))
		{
			$msg['message'] = "true";
			$msg['result'] = $ind;
		}
		else
		{
			$msg['message'] = "false";
		}

		echo json_encode($msg);

	}

	public function getstate()
	{
		if(isset($_REQUEST['id']))
		{
			$id=$_REQUEST['id'];

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
	}

	public function getcity()
	{
		if(isset($_REQUEST['id']))
		{
			$id=$_REQUEST['id'];

			$success = $this->common->get("cities",array("state_id"=>$id));

			if($success)
			{
				$result['message']='true';
				$result['result'] = $success;
			}
			else {
				$result['message']='false';
			}
			echo json_encode($result);
		}
	}


	public function url()
	{
		$this->db->select('ser.name as service,ser.id');
		$this->db->join('services as ser','j.value = ser.id');
		$this->db->where('j.type','service');
		$this->db->group_by('j.value');
		$query3 = $this->db->get('job_meta as j');
		$ser = $query3->result();

		$this->db->select('country');
	  $this->db->group_by('country');
	  $query = $this->db->get('user_meta');
	  $c = $query->result();
	   $g =array();
	   foreach($c as $i)
	   {
	     $g[] = $i->country;
	   }

		 $this->db->select('state');
	   $this->db->group_by('state');
	   $query = $this->db->get('user_meta');
	   $st = $query->result();
	    $s =array();
	    foreach($st as $i)
	    {
	      $s[] = $i->state;
	    }

	  $countryIds = array_unique($g);
	  $stateIds = array_unique($s);

	  $this->db->select('id,name');
	  $this->db->where_in('id',$countryIds);
	  $query = $this->db->get('countries');
	  $countrys = $query->result();

	  $this->db->select('id,name');
	  $this->db->where_in('id',$stateIds);
	  $query = $this->db->get('states');
	  $states = $query->result();

	   // echo "<pre>";
	   // print_r($states);
	   // die;

	  $this->db->select('pra.name as industry,pra.id as industryId,ser.name as service,ser.id as serviceId');
	  $this->db->join('practice_areas as pra','link.industryId = pra.id');
	  $this->db->join('services as ser','link.serviceId = ser.id');
	  $query1 = $this->db->get('practice_service_link as link');
	  $industry = $query1->result();



	  $this->db->select('ser.name as service,ser.id');
	  $this->db->join('services as ser','us.servicesId = ser.id');
	  $this->db->group_by('us.servicesId');
	  $query3 = $this->db->get('user_services as us');
	  $services = $query3->result();

	  $this->db->select('*');
	  $query8 = $this->db->get('blog');
	  $blogs = $query8->result();

		$query = $this->db->select("um.name,um.u_id");
		$query = $this->db->from('user as us');
		$query = $this->db->join('user_meta as um','um.u_id = us.id');
		$query = $this->db->where('type','3');
		$query = $this->db->get();
		$result = $query->result();


		$query = $this->db->select("um.c_name,um.u_id");
		$query = $this->db->from('user as us');
		$query = $this->db->join('user_meta as um','um.u_id = us.id');
		$query = $this->db->where('type','2');
		$query = $this->db->get();
		$result2 = $query->result();

		if(!empty($services))
		{
		   foreach($services as $key=>$service)
		   {
		     $this->db->select('*');
		     $query2 = $this->db->from('hire_ranking_content');
		     $this->db->where('servicesId',$service->id);
		     $query3 = $this->db->get();
		     $url1 = $query3->row();
		     if($url1)
		     {
		     $services[$key]->link = $url1->url;
		     }
		   }
		}




		$config = '<?php
		defined("BASEPATH") OR exit("No direct script access allowed");'."\n";

		$config .= '$route["default_controller"] ="home";'."\n";
		$config .= '$route["404_override"] ="home/error";'."\n";
		$config .= '$route["translate_uri_dashes"] =FALSE;'."\n";



		foreach($ser as $s)
		{
			$li = str_replace(' ', '-',strtolower($s->service));

			$config .= ' $route["search='.$li.'"]  = "Home/jobSearch/'.$s->id.'";'."\n";


		}

		// services route
		foreach($states as $st)
		{
		foreach($countrys as $count)
		{
		  foreach($industry as $ind)
		  {
		    foreach($services as $ser)
		    {
		      $indu = str_replace(' ', '-',strtolower($ind->industry));

		      $service = str_replace(' ', '-',strtolower($ser->service));
		      $country = str_replace(' ', '-',strtolower($count->name));
		      $state = str_replace(' ', '-',strtolower($st->name));

		if(!empty($ser->link))
		{
		  $custom_ser = str_replace(' ', '-',strtolower($ser->link));
		 $config .= '$route["hire/'.$custom_ser.'"] = "Home/searchfilter/'.$ser->id.'";'."\n";

		}
		else
		{
		$config .= '$route["hire/'.$service.'"] = "Home/searchfilter/'.$ser->id.'";'."\n";

		}

		$config .= '$route["best-'.$service.'-companies-in-'.$country.'"] = "Home/search/'.$ind->industryId.'/'.$ser->id.'/'.$count->id.'/state";'."\n";

		$config .= '$route["best-'.$service.'-companies"] = "Home/search/industry/'.$ser->id.'/country/state";'."\n";

		$config .= '$route["best-'.$service.'-companies-in-'.$country.'"] = "Home/search/industry/'.$ser->id.'/'.$count->id.'/state";'."\n";
		$config .= '$route["best-'.$indu.'-'.$service.'-companies"] = "Home/search/'.$ind->industryId.'/'.$ser->id.'/country/state";'."\n";
		$config .= '$route["best-'.$indu.'-'.$service.'-companies-in-'.$country.'"] = "Home/search/'.$ind->industryId.'/'.$ser->id.'/'.$count->id.'/state";'."\n";
		$config .= '$route["best-'.$indu.'-companies"] = "Home/search/'.$ind->industryId.'/service/country/state";'."\n";
		// state wise
		$config .= '$route["'.$country.'/best-'.$service.'-companies-in-'.$state.'"] = "Home/search/industry/'.$ser->id.'/'.$count->id.'/'.$st->id.'";'."\n";
		$config .= '$route["'.$country.'/best-'.$indu.'-'.$service.'-companies-in-'.$state.'"] = "Home/search/'.$ind->industryId.'/'.$ser->id.'/'.$count->id.'/'.$st->id.'";'."\n";

		        }
		      }
		    }
		 }
		// services route

		if(!empty($blogs))
		{
		  foreach($blogs as $b)
		  {
		    if(isset($b->url))
		    {
		      $li = str_replace(' ', '-',strtolower($b->url.'-'.$b->blogId));
		    }
		    else
		    {
		      $li = str_replace(' ', '-',strtolower($b->url.'-'.$b->blogId));
		    }
		   $config .= '$route["'.$li.'"] = "home/blogDetail/'.$b->blogId.'";'."\n";
		  }
		}

  if(!empty($result))
	{
		foreach($result as $row)
		{
		  $name = str_replace(' ','-',strtolower($row->name.'-'.$row->u_id));
		  $config .= '$route["'.$name.'"] = "home/freelancerProfile/'.$row->u_id.'";'."\n";
		}
	}

  if(!empty($result2))
	{
		foreach($result2 as $row)
		{
		  $name = str_replace(' ','-',strtolower($row->c_name.'-'.$row->u_id));
		  $config .= '$route["'.$name.'"] = "home/freelancerProfile/'.$row->u_id.'";'."\n";
		}
	}

		if(!empty($result1))
		{
		  foreach($result1 as $row)
		  {
		  $client = str_replace(' ','-',strtolower($row->c_name.'-'.$row->u_id));
		   $config .= '$route["'.$client.'"] = "home/clientProfile/'.$row->u_id.'";'."\n";
		   }
		}

 if(!empty($results4))
 {
		foreach($result4 as $row)
		{
		$title = str_replace(' ','-',strtolower($row->jobTitle.'-'.$row->jobId));
		$config .= '$route["job/'.$title.'"] = "home/singleJob/'.$row->jobId.'";'."\n";
		}
	}


			///////profile $routes end
			$config .= '$route["linkedapproved"] = "home/linkedapproved";'."\n";
			$config .= '$route["ClientSuccessScore"] = "home/ClientSuccessScoreUpdate";'."\n";
			$config .= '$route["freelancerSuccessScore"] = "home/FreelancerSuccessScoreUpdate";'."\n";
			$config .= '$route["expiredoffer"] ="home/expired_joboffer";'."\n";
			$config .= '$route["expiredjob"] ="home/expired_job";'."\n";
			$config .= '$route["getservices"] = "home/getAllService";'."\n";
			$config .= '$route["getcountry"] = "home/getAllCountry";'."\n";
			$config .= '$route["getindustry"] = "home/getAllIndustry";'."\n";
			$config .= '$route["user-profile/(:any)"] = "home/user_profile/$1";'."\n";
			$config .= '$route["request_form/(:any)"] = "home/request_form/$1";'."\n";
			$config .= '$route["contact_form"] =  "home/contact_form";'."\n";
			$config .= '$route["request/save"] =  "home/request_save";'."\n";
			$config .= '$route["feedback/save"] = "home/feedback_save";'."\n";

			// Front End
			$config .= '$route["getfreelancer"] = "home/getfreelancer";'."\n";
			$config .= '$route["register"] = "home/register";'."\n";
			$config .= '$route["register-user"] = "home/user_register";'."\n";
			$config .= '$route["account/activate/(:any)"] = "home/account_activate/$1";'."\n";
			$config .= '$route["activation/expired"] = "home/activation_expired";'."\n";
			$config .= '$route["client/(:any)"] = "home/client/$1";'."\n";
			$config .= '$route["login"] = "home/client";'."\n";
			$config .= '$route["loginUser"] = "home/login";'."\n";
			$config .= '$route["logout"] = "home/logout";'."\n";
			$config .= '$route["joboffer"] = "home/joboffer";'."\n";
			$config .= '$route["contact"] = "home/contact";'."\n";
			$config .= '$route["getstate"] ="home/getstate";'."\n";
			$config .= '$route["getcity"] ="home/getcity";'."\n";
			$config .= '$route["imageUpload"] ="home/imageUpload";'."\n";
			$config .= '$route["chatAttachment"] = "home/chatAttachment";'."\n";
			$config .= '$route["gettype"] = "home/getUserType";'."\n";
			$config .= '$route["requeststatus"] = "home/checkRquestStatus";'."\n";
			$config .= '$route["forgot-password"] ="home/forgot_password";'."\n";
			$config .= '$route["email-recovery"] ="home/email_recovery";'."\n";
			$config .= '$route["new_password/(:any)"] = "home/new_password/$1";'."\n";
			$config .= '$route["password_update"] = "home/password_update";'."\n";
			$config .= '$route["forgotpassword/expired"] = "home/forgot_expired";'."\n";
			$config .= '$route["clientjobs"] = "home/clientjobs";'."\n";
			$config .= '$route["onlinesave"] = "home/onlinesave";'."\n";
			$config .= '$route["getprofile"] ="home/getprofile";'."\n";
			$config .= '$route["getlinkedinreview"] = "home/getAlllinkedin_review";'."\n";

			$config .= '$route["clientHireRate"] ="home/ClientHireRate";'."\n";

			$config .= '$route["getpricing"] ="home/getpricing";'."\n";
			$config .= '$route["gettestimonial"] ="home/gettestimonial";'."\n";
			$config .= '$route["getcasestudy"] = "home/getCaseStudy";'."\n";
			$config .= '$route["getuserservice"] = "home/getuserservice";'."\n";
			$config .= '$route["getuserIndustry"] ="home/getuserIndustry";'."\n";
			$config .= '$route["getteam"] ="home/getteam";'."\n";
			$config .= '$route["profile_listing"] = "home/profile_listing";'."\n";
			$config .= '$route["requestquote"] = "home/request_save";'."\n";
			$config .= '$route["getkeypeople"] ="home/getkeypeople";'."\n";
			$config .= '$route["getcurrentjobs"] ="home/getcurrentjobs";'."\n";
			$config .= '$route["getendedContract"] = "home/getendedContract";'."\n";
			$config .= '$route["getTeamOne"] = "home/getTeamOne";'."\n";
			$config .= '$route["getportfolio"] = "home/getportfolio";'."\n";
			$config .= '$route["getoneportfolio"] = "home/getoneportfolio";'."\n";
			$config .= '$route["getclient"] = "home/getclient";'."\n";
			$config .= '$route["getjobsuccess"] ="home/getjobSuccess";'."\n";
			$config .= '$route["paypal-redirect"] = "home/paypal_redirect";'."\n";

			$config .= '$route["getclientfreelancer"] ="home/getclientfreelancer";'."\n";
			$config .= '$route["getActiveProjects"] ="home/getActiveProjects";'."\n";
			$config .= '$route["getclientscore"] = "home/getclientscore";'."\n";
			$config .= '$route["clientcurrentjobs"] ="home/clientcurrentjobs";'."\n";
			$config .= '$route["clientendedContract"] = "home/clientendedContract";'."\n";
			$config .= '$route["clientspend"] = "home/clientspend";'."\n";
			$config .= '$route["freelancerEarning"] = "home/freelancerEarning";'."\n";
			$config .= '$route["getClientOpenJob"] = "home/getClientOpenJob";'."\n";
			//jobs $route
			$config .= '$route["getjobdetail"] ="home/getjobdetail";'."\n";
			$config .= '$route["proposalAttachment"] ="home/proposalAttachment";'."\n";
			$config .= '$route["proposalSubmit"] ="home/proposalSubmit";'."\n";
			$config .= '$route["proposalCheck"] = "home/proposalCheck";'."\n";
			$config .= '$route["getprofileListingRankingContent"] = "home/getprofileListingRankingContent";'."\n";
			$config .= '$route["getsearchFilterRankingContent"] = "home/getsearchFilterRankingContent";'."\n";
			$config .= '$route["getlinkedServices"] ="home/getlinkedServices";'."\n";
			//find work
			$config .= '$route["find-work"] = "home/find_work";'."\n";
			$config .= '$route["getfindWorks"] ="home/getfindWorks";'."\n";
			$config .= '$route["getskillbyJobs"] = "home/getskillbyJobs";'."\n";
			$config .= '$route["services_ranking"] ="home/servicesRanking";'."\n";
			$config .= '$route["getRankingSingleProfile"] = "home/getRankingSingleProfile";'."\n";
			$config .= '$route["company_review"] ="home/companyReview";'."\n";

			$config .= '$route["getcurrency"] ="home/getcurrency";'."\n";
			$config .= '$route["blog"] ="home/blog";'."\n";
			$config .= '$route["blog/(:any)"] ="home/blog/$1";'."\n";
			$config .= '$route["questionType"] ="home/getquestionType";'."\n";
			$config .= '$route["question"] ="home/getquestion";'."\n";
			$config .= '$route["reviewquestion"] ="home/reviewquestion";'."\n";
			$config .= '$route["contact-us"] ="home/contactus";'."\n";
			$config .= '$route["contactsave"] ="home/contactsave";'."\n";

			$config .= '$route["membership"] ="home/membership";'."\n";
			$config .= '$route["supportemail"] ="home/supportemail";'."\n";

			$config .= '$route["conference"] = "home/conference";'."\n";
			$config .= '$route["conference/(:any)"] = "home/conference/$1";'."\n";
			$config .= '$route["conferencesave"] = "home/conferencesave";'."\n";
			$config .= '$route["conference/detail/(:any)"] = "home/conference_detail/$1";'."\n";

			$config .= '$route["blog-add"] = "home/blog_add";'."\n";
			$config .= '$route["blogSave"] = "home/blogSave";'."\n";

			// $config .= '$route["404"] = "home/error";'."\n";

			//////////////Client $route start
			$config .= '$route["client-dashboard"] = "client/dashboard";'."\n";
			$config .= '$route["client-chat"] ="client/chat";'."\n";
			$config .= '$route["client-getperson"] = "client/getperson";'."\n";
			$config .= '$route["client-getmessage/(:any)"] = "client/getmessage/$1";'."\n";
			$config .= '$route["client-getmessage/(:any)/(:any)"] = "client/getmessage/$1/$2";'."\n";
			$config .= '$route["client-getmessage/(:any)/(:any)/(:any)"] = "client/getmessage/$1/$2/$3";'."\n";
			$config .= '$route["client-getsession"] ="client/getsession";'."\n";
			$config .= '$route["client-request"] ="client/friendrequest";'."\n";
			$config .= '$route["client-messageSend"] ="client/messageSend";'."\n";
			$config .= '$route["client-messageUpdate"] = "client/messageUpdate";'."\n";
			$config .= '$route["client-messageDeleted"] ="client/messageDeleted";'."\n";


			$config .= '$route["client-profile"] ="client/client_profile";'."\n";
			$config .= '$route["client-profile/save"] ="client/client_profileSave";'."\n";
			$config .= '$route["client-profile/update/(:any)"] ="client/client_profileUpdate/$1";'."\n";

			$config .= '$route["client-job"] = "client/job_post";'."\n";
			$config .= '$route["client-job-detail/(:any)"] = "client/jobdetail/$1";'."\n";
			$config .= '$route["client-getjobdetail"] = "client/getjobdetail";'."\n";
			$config .= '$route["client-getjobs"] = "client/getjobs";'."\n";
			$config .= '$route["client-job/(:any)"] = "client/job_detail/$1";'."\n";
			$config .= '$route["client-create-job"] = "client/createjob";'."\n";
			$config .= '$route["client-job-proposal/(:any)"] ="client/jobproposal/$1";'."\n";
			$config .= '$route["client-getproposal"] ="client/getproposal";'."\n";
			$config .= '$route["client-proposal-detail/(:any)"] = "client/proposal_detail/$1";'."\n";
			$config .= '$route["client-getproposaldetail"] = "client/getproposaldetail";'."\n";


			$config .= '$route["client-contract"] = "client/contract";'."\n";
			$config .= '$route["client-getcontract"] = "client/getcontract";'."\n";
			$config .= '$route["client-contract/(:any)"] = "client/contractdetail/$1";'."\n";
			$config .= '$route["client-getcontractdetail"] = "client/getcontractdetail";'."\n";
			$config .= '$route["client-milestoneRequest"] = "client/milestoneRequest";'."\n";
			$config .= '$route["client-milestone-start"] ="client/milestoneStart";'."\n";
			$config .= '$route["client-comment-submit"] ="client/logcomment";'."\n";
			$config .= '$route["client-milestone-review"] ="client/milestone_review";'."\n";

			$config .= '$route["client-chatpersonFilter"] ="client/chatpersonFilter";'."\n";
			$config .= '$route["client-notification"] = "client/notification";'."\n";
			$config .= '$route["client-getnotification"] = "client/getNotification";'."\n";
			$config .= '$route["client-getOneNotification"] = "client/getOneNotification";'."\n";

			$config .= '$route["client-password"] = "client/password";'."\n";
			$config .= '$route["client-password_update"] ="client/password_update";'."\n";

			///review
			$config .= '$route["client-review"] ="client/client_review";'."\n";
			$config .= '$route["client-getreview"] = "client/getallreview";'."\n";
			$config .= '$route["client-getclientReview"] ="client/getclientReview";'."\n";
			//$config .= '$route["client-event"] = "client/event";'."\n";
			$config .= '$route["client-event/(:any)"] = "client/event/$1";'."\n";
			$config .= '$route["client-getuser"] = "client/getuser";'."\n";
			$config .= '$route["client-eventsave"] = "client/eventSave";'."\n";
			$config .= '$route["client-getevent"] ="client/getevent";'."\n";
			///review
			$config .= '$route["client-payment"] ="client/payment";'."\n";
			$config .= '$route["client-paypal"] ="client/paypal";'."\n";
			$config .= '$route["client-paypalipn"] ="client/paypalIpn";'."\n";
			$config .= '$route["client-test"] ="client/test";'."\n";
			$config .= '$route["client-create-milestone"] = "client/create_milestone";'."\n";

			$config .= '$route["client-getservices"] = "client/getservice";'."\n";
			$config .= '$route["client-EditJob"] ="client/editjob";'."\n";
			$config .= '$route["client-milestone-payment/(:any)/(:any)"] ="client/milestone_payment/$1/$2";'."\n";
			$config .= '$route["client-update-job"] = "client/Updatejob";'."\n";

			$config .= '$route["client-hire"] ="client/hireFreelancer";'."\n";
			$config .= '$route["client-freelancer-contact"] ="client/freelancerContact";'."\n";
			$config .= '$route["client-payment-delete"] ="client/Deletepayment";'."\n";
			$config .= '$route["client-authorize"] = "client/authorize";'."\n";
			$config .= '$route["client-authorize-payment"] ="client/authorize_payment";'."\n";
			$config .= '$route["client-support-chat"] = "client/support";'."\n";

			// ////////////////////client $routes End


			/////////////////////freelancer
			$config .= '$route["freelancer/dashboard"] = "freelancer/dashboard";'."\n";
			$config .= '$route["freelancer/getsession"] ="freelancer/getsession";'."\n";
			$config .= '$route["freelancer/job"] = "freelancer/job";'."\n";
			$config .= '$route["freelancer/job/(:any)"] = "freelancer/jobdetail/$1";'."\n";
			$config .= '$route["freelancer/getjobs"] ="freelancer/getjobs";'."\n";
			$config .= '$route["freelancer/getjobdetail"] ="freelancer/getjobdetail";'."\n";
			$config .= '$route["freelancer/jobStatus"] ="freelancer/jobStatus";'."\n";
			$config .= '$route["freelancer/jobMessage"] ="freelancer/jobMesaage";'."\n";
			$config .= '$route["freelancer/contract/(:any)"] = "freelancer/contractdetail/$1";'."\n";
			$config .= '$route["freelancer/getcontractdetail"] = "freelancer/getcontractdetail";'."\n";
			$config .= '$route["freelancer/taskRequest"] = "freelancer/taskRequest";'."\n";
			$config .= '$route["freelancer/getlog/(:any)/(:any)"] = "freelancer/getContractlog/$1/$2";'."\n";
			$config .= '$route["freelancer/getlog/(:any)/(:any)/(:any)"] = "freelancer/getContractlog/$1/$2/$3";'."\n";
			$config .= '$route["freelancer/getlog/(:any)/(:any)/(:any)/(:any)"] = "freelancer/getContractlog/$1/$2/$3/$4";'."\n";
			$config .= '$route["freelancer/logcomment"] = "freelancer/logcomment";'."\n";
			//chat
			$config .= '$route["freelancer/chat"] ="freelancer/chat";'."\n";
			$config .= '$route["freelancer/getperson"] = "freelancer/getperson";'."\n";
			$config .= '$route["freelancer/getmessage/(:any)/(:any)"] = "freelancer/getmessage/$1/$2";'."\n";
			$config .= '$route["freelancer/getmessage/(:any)/(:any)/(:any)"] = "freelancer/getmessage/$1/$2/$3";'."\n";
			$config .= '$route["freelancer/getmessage/(:any)/(:any)/(:any)/(:any)"] = "freelancer/getmessage/$1/$2/$3/$4";'."\n";
			$config .= '$route["freelancer/friendrequest"] ="freelancer/friendrequest";'."\n";
			$config .= '$route["freelancer/messageSend"] ="freelancer/messageSend";'."\n";
			$config .= '$route["freelancer/messageUpdate"] = "freelancer/messageUpdate";'."\n";
			$config .= '$route["freelancer/messageDeleted"] ="freelancer/messageDeleted";'."\n";
			$config .= '$route["freelancer/chatpersonFilter"] ="freelancer/chatpersonFilter";'."\n";
			/////////////////////freelancer

			///notification
			$config .= '$route["freelancer/notification"] = "freelancer/notification";'."\n";
			$config .= '$route["freelancer/getnotification"] = "freelancer/getNotification";'."\n";
			$config .= '$route["freelancer/getOneNotification"] = "freelancer/getOneNotification";'."\n";

			$config .= '$route["freelancer/services"] = "freelancer/services";'."\n";
			$config .= '$route["freelancer/servicesAdd"] ="freelancer/serviceAdd";'."\n";
			$config .= '$route["freelancer/getservice"] ="freelancer/getservice";'."\n";
			$config .= '$route["freelancer/getindustry"] ="freelancer/getindustry";'."\n";
			$config .= '$route["freelancer/saveService"] = "freelancer/saveService";'."\n";
			$config .= '$route["freelancer/userservices"] = "freelancer/userservices";'."\n";
			$config .= '$route["freelancer/userindustry"] = "freelancer/userindustry";'."\n";


			$config .= '$route["freelancer/profile"] = "freelancer/profile";'."\n";
			$config .= '$route["freelancer/getprofile"] ="freelancer/getprofile";'."\n";
			$config .= '$route["freelancer/profileupdate"] = "freelancer/profileupdate";'."\n";
			$config .= '$route["freelancer/getcountry"] ="freelancer/getcountry";'."\n";
			$config .= '$route["freelancer/logoupload"] ="freelancer/logoupload";'."\n";
			$config .= '$route["freelancer/logo"] ="freelancer/freelancerlogoupload";'."\n";
			$config .= '$route["freelancer/getstate"] ="freelancer/getstate";'."\n";
			$config .= '$route["freelancer/getcity"] ="freelancer/getcity";'."\n";

			///testimonial
			$config .= '$route["freelancer/testimonial/add"] = "freelancer/testimonial_add";'."\n";
			$config .= '$route["freelancer/testimonial/save"] = "freelancer/testimonial_save";'."\n";
			$config .= '$route["freelancer/testimonial"] = "freelancer/testimonial";'."\n";
			$config .= '$route["freelancer/testimonial_logoupload"] ="freelancer/testimonial_logoupload";'."\n";
			$config .= '$route["freelancer/testimonial_delete"] = "freelancer/testimonial_delete";'."\n";
			$config .= '$route["freelancer/testimonial_edit"] ="freelancer/testimonial_edit";'."\n";
			$config .= '$route["freelancer/testimonial_update"] ="freelancer/testimonial_update";'."\n";
			///case study
			$config .= '$route["freelancer/casestudy"] ="freelancer/casestudy";'."\n";
			$config .= '$route["freelancer/casestudySave"] ="freelancer/casestudySave";'."\n";
			$config .= '$route["freelancer/getcasestudy"] = "freelancer/getcasestudy";'."\n";
			$config .= '$route["freelancer/casestudy_upload"] = "freelancer/casestudy_upload";'."\n";
			$config .= '$route["freelancer/case_study_delete"] = "freelancer/case_study_delete";'."\n";
			///// case study
			//pricing
			$config .= '$route["freelancer/service_pricing"] ="freelancer/service_pricing";'."\n";
			$config .= '$route["freelancer/service_pricingSave"] ="freelancer/service_pricingSave";'."\n";
			$config .= '$route["freelancer/getservice_pricing"] = "freelancer/getservice_pricing";'."\n";
			$config .= '$route["freelancer/service_pricing_delete"] = "freelancer/service_pricing_delete";'."\n";
			//pricing

			//team
			//pricing
			$config .= '$route["freelancer/team"] ="freelancer/team";'."\n";
			$config .= '$route["freelancer/teamSave"] ="freelancer/teamSave";'."\n";
			$config .= '$route["freelancer/getteam"] = "freelancer/getteam";'."\n";
			$config .= '$route["freelancer/team_delete"] = "freelancer/team_delete";'."\n";
			$config .= '$route["freelancer/team_imageupload"] = "freelancer/team_imageupload";'."\n";
			$config .= '$route["freelancer/teamStatus"] = "freelancer/teamStatus";'."\n";
			$config .= '$route["freelancer/editteam"] = "freelancer/editteam";'."\n";
			$config .= '$route["freelancer/updateteam"] = "freelancer/updateTeam";'."\n";
			$config .= '$route["freelancer/getActiveContract"] = "freelancer/getActiveContract";'."\n";

			//password
			$config .= '$route["freelancer/password"] = "freelancer/password";'."\n";
			$config .= '$route["freelancer/password_update"] ="freelancer/password_update";'."\n";

			$config .= '$route["freelancer/milestoneRequest"] = "freelancer/milestoneRequest";'."\n";

			$config .= '$route["freelancer/review"] = "freelancer/review";'."\n";
			$config .= '$route["freelancer/getreview"] = "freelancer/getallreview";'."\n";
			$config .= '$route["freelancer/getfreelancerReview"] ="freelancer/getfreelancerReview";'."\n";
			//team

			// service brief
			$config .= '$route["freelancer/service_briefing"] ="freelancer/service_briefing";'."\n";
			$config .= '$route["freelancer/getservice_info"] = "freelancer/getservice_info";'."\n";
			$config .= '$route["freelancer/service_infoSave"] = "freelancer/service_infoSave";'."\n";
			///notification

			///offline request
			$config .= '$route["freelancer/request"] = "freelancer/request";'."\n";
			$config .= '$route["freelancer/getrequest"] = "freelancer/getrequest";'."\n";

			$config .= '$route["freelancer/team_profile"] ="freelancer/team_profile";'."\n";
			$config .= '$route["freelancer/getuserprofile"] ="freelancer/getuser_profile";'."\n";
			$config .= '$route["freelancer/team_certificate"] ="freelancer/team_certificate";'."\n";
			$config .= '$route["freelancer/teamProfileUpdate"] = "freelancer/teamProfileUpdate";'."\n";
			$config .= '$route["freelancer/teamResend"] = "freelancer/teamResend";'."\n";
			$config .= '$route["freelancer/serviceSearch"] ="freelancer/serviceSearch";'."\n";
			$config .= '$route["freelancer/industrySearch"] ="freelancer/industrySearch";'."\n";

			//portfolio
			$config .= '$route["freelancer/portfolio"] = "freelancer/portfolio";'."\n";
			$config .= '$route["freelancer/getportfolio"] = "freelancer/getportfolio";'."\n";
			$config .= '$route["freelancer/portfolioImage"] = "freelancer/portfolioImage";'."\n";
			$config .= '$route["freelancer/portfolioSave"] = "freelancer/portfolioSave";'."\n";
			$config .= '$route["freelancer/portfolioDelete"] ="freelancer/portfolio_delete";'."\n";
			$config .= '$route["freelancer/portfolioedit"] ="freelancer/portfolio_edit";'."\n";
			$config .= '$route["freelancer/portfolioupdate"] ="freelancer/portfolio_update";'."\n";

			$config .= '$route["freelancer/account"] = "freelancer/account";'."\n";
			$config .= '$route["freelancer/getaccount"] ="freelancer/getaccount";'."\n";
			$config .= '$route["freelancer/accountUpdate"] ="freelancer/accountUpdate";'."\n";

			$config .= '$route["freelancer/paypal"] ="freelancer/paypal";'."\n";

			$config .= '$route["freelancer/payment"] ="freelancer/payment";'."\n";
			$config .= '$route["freelancer/payment-delete"] ="freelancer/Deletepayment";'."\n";

			$config .= '$route["freelancer/proposal"] ="freelancer/proposal";'."\n";
			$config .= '$route["freelancer/getproposal"] ="freelancer/getproposal";'."\n";
			$config .= '$route["freelancer/getproposaldetail"] ="freelancer/getproposaldetail";'."\n";
			$config .= '$route["freelancer/authorize"] ="freelancer/authorize";'."\n";
			$config .= '$route["freelancer/authorize-payment"] ="freelancer/authorize_payment";'."\n";

			$config .= '$route["freelancer/support-chat"] = "freelancer/support_chat";'."\n";
			// admin $route

			$config .= '$route["admin"]  = "admin/index";'."\n";
			$config .= '$route["admin/login"]  = "admin/login";'."\n";
			$config .= '$route["admin/dashboard"]  = "admin/dashboard";'."\n";
			$config .= '$route["admin/freelancer"]  = "admin/allfreelancer";'."\n";
			$config .= '$route["admin/client"]  = "admin/allclient";'."\n";
			$config .= '$route["admin/getfreelancer"]  = "admin/getfreelancer";'."\n";
			$config .= '$route["admin/getclient"]  = "admin/getclient";'."\n";
			$config .= '$route["admin/userStatus"]  = "admin/allUserStatus";'."\n";
			$config .= '$route["admin/client/job/(:any)"]  = "admin/clientjobs/$1";'."\n";
			$config .= '$route["admin/getclientjob"]  = "admin/getclientjob";'."\n";
			$config .= '$route["admin/freelancer/job/(:any)"]  = "admin/freelancerjobs/$1";'."\n";
			$config .= '$route["admin/getfreelancerjob"]  = "admin/getfreelancerjob";'."\n";
			$config .= '$route["admin/userprofile"]  = "admin/userprofile";'."\n";

			$config .= '$route["admin/industries"]  = "admin/industries";'."\n";
			$config .= '$route["admin/getindustry"]  ="admin/getindustry";'."\n";
			$config .= '$route["admin/deleteindustry"]  ="admin/deleteindustries";'."\n";
			$config .= '$route["admin/saveindustry"]  ="admin/saveindustry";'."\n";

			$config .= '$route["admin/services"]  = "admin/services";'."\n";
			$config .= '$route["admin/getservices"]  ="admin/getservices";'."\n";
			$config .= '$route["admin/deleteservices"]  ="admin/deleteservices";'."\n";
			$config .= '$route["admin/saveservices"]  ="admin/saveservices";'."\n";
			$config .= '$route["admin/editservices"]  ="admin/editservices";'."\n";
			$config .= '$route["admin/updateservices"]  ="admin/updateservices";'."\n";

			$config .= '$route["admin/allindustries"]  = "admin/allindustries";'."\n";
			$config .= '$route["admin/allservices"]  = "admin/allservices";'."\n";
			$config .= '$route["admin/editindustry"]  = "admin/editindustry";'."\n";
			$config .= '$route["admin/savelinkedIndustry"]  ="admin/savelinkedIndustry";'."\n";

			$config .= '$route["admin/ranking-content"]  = "admin/ranking_content";'."\n";
			$config .= '$route["admin/ranking-content-add"] ="admin/ranking_content_add";'."\n";
			$config .= '$route["admin/getrankingContent"]  = "admin/getrankingContent";'."\n";
			$config .= '$route["admin/allcountry"]  = "admin/allcountry";'."\n";
			$config .= '$route["admin/rankingContentSave"]  ="admin/rankingContentSave";'."\n";
			$config .= '$route["admin/rankingContentdelete"]  ="admin/rankingContentdelete";'."\n";
			$config .= '$route["admin/EditRankingContent"]  = "admin/EditRankingContent";'."\n";
			$config .= '$route["admin/RankingContentUpdate"]  = "admin/RankingContentUpdate";'."\n";


			$config .= '$route["admin/hire-ranking-content"]  = "admin/Hire_ranking_content";'."\n";
			$config .= '$route["admin/getHireRankingContent"]  ="admin/getHireRankingContent";'."\n";
			$config .= '$route["admin/HireRankingContentSave"]  ="admin/HireRankingContentSave";'."\n";
			$config .= '$route["admin/deleteHireContent"]  ="admin/deleteHireContent";'."\n";
			$config .= '$route["admin/EditHireRankingContent"]  ="admin/EditHireRankingContent";'."\n";
			$config .= '$route["admin/HireRankingContentUpdate"]  = "admin/HireRankingContentUpdate";'."\n";

			$config .= '$route["admin/top-industry"]  = "admin/top_industry";'."\n";
			$config .= '$route["admin/getTopIndustry"]  ="admin/getTopIndustry";'."\n";
			$config .= '$route["admin/TopIndustrySave"]  ="admin/TopIndustrySave";'."\n";
			$config .= '$route["admin/deleteTopIndustry"]  ="admin/deleteTopindustry";'."\n";
			$config .= '$route["admin/EditTopIndustry"]  ="admin/EditTopIndustry";'."\n";
			$config .= '$route["admin/UpdateTopIndustry"]  = "admin/UpdateTopIndustry";'."\n";
			$config .= '$route["admin/topindustryImage"]  = "admin/topindustryImage";'."\n";

			$config .= '$route["admin/currency"]  = "admin/currency";'."\n";
			$config .= '$route["admin/getcurrency"]  ="admin/getcurrency";'."\n";
			$config .= '$route["admin/currencySave"]  ="admin/currencySave";'."\n";
			$config .= '$route["admin/currencydelete"]  ="admin/currencyDelete";'."\n";
			$config .= '$route["admin/currencyEdit"]  ="admin/currencyEdit";'."\n";
			$config .= '$route["admin/currencyUpdate"]  = "admin/currencyUpdate";'."\n";

			$config .= '$route["admin/blog"]  = "admin/blog";'."\n";
			$config .= '$route["admin/getblog"]  ="admin/getblog";'."\n";
			$config .= '$route["admin/blogSave"]  ="admin/blogSave";'."\n";
			$config .= '$route["admin/blogdelete"]  ="admin/blogDelete";'."\n";
			$config .= '$route["admin/blogEdit"]  ="admin/blogEdit";'."\n";
			$config .= '$route["admin/blogUpdate"]  = "admin/blogUpdate";'."\n";
			$config .= '$route["admin/blogImage"]  = "admin/blogImage";'."\n";
			$config .= '$route["admin/blogStatus"]  ="admin/blogStatus";'."\n";
			// category
			$config .= '$route["admin/category"]  = "admin/category";'."\n";
			$config .= '$route["admin/getcategory"]  ="admin/getcategory";'."\n";
			$config .= '$route["admin/blogcategory"]  ="admin/blogcategory";'."\n";
			$config .= '$route["admin/blogcategory"]  ="admin/categoryDelete";'."\n";
			$config .= '$route["admin/categoryEdit"]  ="admin/categoryEdit";'."\n";
			$config .= '$route["admin/categoryUpdate"]  = "admin/categoryUpdate";'."\n";
			$config .= '$route["admin/categoryImage"]  = "admin/categoryImage";'."\n";

			$config .= '$route["admin/allcategory"]  = "admin/allcategory";'."\n";
			//category

			// testmonial
			$config .= '$route["admin/testimonial"]  = "admin/testimonial";'."\n";
			$config .= '$route["admin/gettestimonial"]  ="admin/gettestimonial";'."\n";
			$config .= '$route["admin/testimonialSave"]  ="admin/testimonialSave";'."\n";
			$config .= '$route["admin/testimonialdelete"]  ="admin/testimonialDelete";'."\n";
			$config .= '$route["admin/testimonialEdit"]  ="admin/testimonialEdit";'."\n";
			$config .= '$route["admin/testimonialUpdate"]  = "admin/testimonialUpdate";'."\n";
			$config .= '$route["admin/testimonialImage"]  = "admin/testimonialImage";'."\n";

			//testimonial



			// How it works
			$config .= '$route["admin/how-it-works"]  = "admin/how_itworks";'."\n";
			$config .= '$route["admin/getworks"]  ="admin/getworks";'."\n";
			$config .= '$route["admin/worksSave"]  ="admin/worksSave";'."\n";
			$config .= '$route["admin/worksdelete"]  ="admin/worksDelete";'."\n";
			$config .= '$route["admin/worksEdit"]  ="admin/worksEdit";'."\n";
			$config .= '$route["admin/worksUpdate"]  = "admin/worksUpdate";'."\n";
			$config .= '$route["admin/worksImage"]  = "admin/worksImage";'."\n";

			//how it works

			// question type
			$config .= '$route["admin/questionType"]  = "admin/questionType";'."\n";
			$config .= '$route["admin/getquestionType"]  ="admin/getquestionType";'."\n";
			$config .= '$route["admin/questionTypeSave"]  ="admin/questionTypeSave";'."\n";
			$config .= '$route["admin/questionTypedelete"]  ="admin/questionTypeDelete";'."\n";
			$config .= '$route["admin/questionTypeEdit"]  ="admin/questionTypeEdit";'."\n";
			$config .= '$route["admin/questionTypeUpdate"]  = "admin/questionTypeUpdate";'."\n";
			// question type

			// question
			$config .= '$route["admin/allquestionType"]  ="admin/allquestionType";'."\n";
			$config .= '$route["admin/question"]  = "admin/question";'."\n";
			$config .= '$route["admin/getquestion"]  ="admin/getquestion";'."\n";
			$config .= '$route["admin/questionSave"]  ="admin/questionSave";'."\n";
			$config .= '$route["admin/questiondelete"]  ="admin/questionDelete";'."\n";
			$config .= '$route["admin/questionEdit"]  ="admin/questionEdit";'."\n";
			$config .= '$route["admin/questionUpdate"]  = "admin/questionUpdate";'."\n";
			// question

			$config .= '$route["admin/contact"]  ="admin/contact";'."\n";
			$config .= '$route["admin/getquestion"]  ="admin/getquestion";'."\n";
			$config .= '$route["admin/contactdelete"]  ="admin/contactDelete";'."\n";

			$config .= '$route["admin/portfolio/(:any)"]  = "admin/portfolio/$1";'."\n";
			$config .= '$route["admin/getportfolio"]  = "admin/getportfolio";'."\n";

			$config .= '$route["admin/freelancer-testimonial/(:any)"]  = "admin/freelancertestimonial/$1";'."\n";
			$config .= '$route["admin/getfreelancertestimonial"]  = "admin/getfreelancertestimonial";'."\n";

			$config .= '$route["admin/casestudy/(:any)"]  = "admin/casestudy/$1";'."\n";
			$config .= '$route["admin/getcasestudy"]  = "admin/getcasestudy";'."\n";

			$config .= '$route["admin/pricing/(:any)"]  = "admin/pricing/$1";'."\n";
			$config .= '$route["admin/getpricing"]  = "admin/getpricing";'."\n";

			$config .= '$route["admin/requestform/(:any)"]  = "admin/requestform/$1";'."\n";
			$config .= '$route["admin/getrequestform"]  = "admin/getrequestform";'."\n";

			// membership
			$config .= '$route["admin/package"]  = "admin/package";'."\n";
			$config .= '$route["admin/getpackage"]  ="admin/getpackage";'."\n";
			$config .= '$route["admin/packageSave"]  ="admin/packageSave";'."\n";
			$config .= '$route["admin/packagedelete"]  ="admin/packageDelete";'."\n";
			$config .= '$route["admin/packageEdit"]  ="admin/packageEdit";'."\n";
			$config .= '$route["admin/packageUpdate"]  = "admin/packageUpdate";'."\n";
			// membership
			//support
			$config .= '$route["admin/support"]  = "admin/support";'."\n";
			$config .= '$route["admin/supportchatperson"]  = "admin/getchatperson";'."\n";

			//conference

			$config .= '$route["admin/conference"] = "admin/conference";'."\n";
			$config .= '$route["admin/getconference"]  ="admin/getconference";'."\n";
			$config .= '$route["admin/conferenceStatus"]  ="admin/conferenceStatus";'."\n";
					// admin $route


					'?>';

			//	}
			//}
	//	}
		$config .= '?>';
		$myfile = file_put_contents('application/config/routes.php', $config.PHP_EOL);
	}


	public function search1($count,$state,$city,$ind,$ser)
	{
		// echo $count."<br>";
		// echo $ind."<br>";
		// echo $ser."<br>";
		// echo $city."<br>";
		// echo $state."<br>";
		// die;


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

		$this->load->view('front/header');
		$this->load->view('front/new_search',$data);
		$this->load->view('front/footer');
	}

	public function user_profile($id)
	{

		$data['profile'] = $this->common->getrow('user_meta',array("u_id"=>$id));
		$data['countries'] = $this->common->getTable('countries');
		$this->load->view('front/header');
		$this->load->view('front/user-profile',$data);
		$this->load->view('front/footer');

	}

	public function request_form($id)
	{
		$data['id'] = $id;
		$this->load->view('modals/request-forms',$data);
	}

	public function contact_form()
	{
		$this->load->view('modals/request-contact-form');
	}



	public function get_review_state()
	{
		if(isset($_REQUEST['id']))
		{
			$id=$_REQUEST['id'];

			$success = $this->common->get("states",array("country_id"=>$id));

			if($success)
			{
				$result['msg']= 'true';
				$result['result'] = $success;
			}
			else
			{
				$result['msg']='false';
			}
			echo json_encode($result);
		}
	}

	public function get_review_city()
	{
		if(isset($_REQUEST['id']))
		{
			$id=$_REQUEST['id'];

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
	}


	function getRealIpAddr(){

		$ipaddress = '';

		if (getenv('HTTP_CLIENT_IP'))

		$ipaddress = getenv('HTTP_CLIENT_IP');

		else if(getenv('HTTP_X_FORWARDED_FOR'))

		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');

		else if(getenv('HTTP_X_FORWARDED'))

		$ipaddress = getenv('HTTP_X_FORWARDED');

		else if(getenv('HTTP_FORWARDED_FOR'))

		$ipaddress = getenv('HTTP_FORWARDED_FOR');

		else if(getenv('HTTP_FORWARDED'))

		$ipaddress = getenv('HTTP_FORWARDED');

		else if(getenv('REMOTE_ADDR'))

		$ipaddress = getenv('REMOTE_ADDR');

		else

		$ipaddress = 'UNKNOWN';

		return $ipaddress;

	}

	public function linkedln()
	{
		if(isset($_REQUEST['oauth_provider'],$_REQUEST['userData']))
		{
			$oauth_provider = $_REQUEST['oauth_provider'];
			$userData = $_REQUEST['userData'];
			$user = json_decode($userData);
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			$input = array(
				'oauth_provider' => $oauth_provider,
				'oauth_uid' => $user->id,
				'first_name' => $user->firstName,
				'last_name' => $user->lastName,
				'email' => $user->emailAddress,
				'link' => urldecode($user->publicProfileUrl),
				'created' =>$date,
			);
			$social = $this->common->getrow('social_users',array("oauth_uid"=>$user->id));
			if(empty($social))
			{
				$success = $this->common->insert('social_users',$input);
				if($success[0] == 1)
				{
					$result['result'] = $success[1];
					$result['message'] = 'true';
				}
				else
				{
					$result['message'] = 'false';
				}
			}
			else {
				$result['result'] = $social->id;
				$result['message'] = 'true';
			}

			echo json_encode($result);
			exit;
		}

	}

	public function feedback_save()
	{
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$ip = $this->getRealIpAddr();
		$rev_id = $_POST['rev_id'];
		$u_id = $_POST['u_id'];
		unset($_POST['u_id']);
		unset($_POST['rev_id']);

		$ip = $this->getRealIpAddr();

		$feedback = $this->common->get('reviews',array("u_id"=>$u_id,"reviewer_id"=>$rev_id));
		if(empty($feedback))
		{
			$input = array(
				'u_id'	=>	$u_id,
				'reviewer_id' => $rev_id,
				'reviewer_ip' => $ip,
				'review_detail' => serialize($_POST),
				'date_created' => $date,
			);
			$result =	$this->common->insert('reviews',$input);
			if($result)
			{
				$this->session->set_flashdata('success_message', 'Feedback successfully Register.');
			}
		}
		else
		{
			$this->session->set_flashdata('failure_message', 'Feedback Already Added.');
		}
		redirect('user-profile/'.$u_id);
	}


	public function ip()
	{
		$ip = $this->getRealIpAddr();
		echo $ip;
	}

	public function getfreelancer()
	{
		$services = array();
		$industryId = '';
		$result = array();
		$results = array();
		$content = '';
		$country ='';
		$hourly ='';
		$sort ='';
		$service ='';
		$user = array();
		$array = file_get_contents('php://input');
		$results = json_decode($array);

		if(!empty($results->country))
		{
			$country = $results->country;
		}

		if(!empty($results->hourly))
		{
			$hourly = $results->hourly;
		}

		if(!empty($results->sort))
		{
			$sort = $results->sort;
		}

		if(!empty($results->service))
		{
			$service = $results->service;
		}



		if(!empty($service) && !empty($hourly) && !empty($country) && !empty($sort))
		{

			$result = $this->common->searchBySc($service,array('country'=>$country),$hourly,$sort);

		}
		else if(!empty($service) && empty($hourly) && !empty($country) && empty($sort))
		{

			$result = $this->common->searchBySc($service,array('country'=>$country),$hourly,$sort);

		}
		else if(!empty($service) && empty($hourly) && !empty($country) && !empty($sort))
		{

			$result = $this->common->searchBySc($service,array('country'=>$country),$hourly,$sort);

		}

		else if(empty($service) && !empty($hourly) && !empty($country) && !empty($sort) )
		{

			$result =  $this->common->searchHCSfreelancer($hourly,array("country"=>$country),$sort);

		}


		else	if(empty($service) && !empty($hourly) && !empty($country) && empty($sort))
		{

			$result =  $this->common->searchHCSfreelancer($hourly,array("country"=>$country),$sort);

		}

		else	if(empty($service) && empty($hourly) && !empty($country) && !empty($sort))
		{

			$result =  $this->common->searchHCSfreelancer($hourly,array("country"=>$country),$sort);

		}


		else if(empty($service) && empty($hourly) && !empty($country) && empty($sort))
		{

			$result =  $this->common->searchfreelancer(array("country"=>$country),$sort);

		}

		else if(!empty($service) && !empty($hourly) && !empty($country) && empty($sort))
		{
			$result = $this->common->searchBySc($service,array('country'=>$country),$hourly,$sort);

		}

		else if(!empty($service) && !empty($hourly) && empty($country) && !empty($sort))
		{

			$result = $this->common->searchByService($service,$hourly,$sort);

		}

		else if(!empty($service) && empty($hourly) && empty($country) && !empty($sort))
		{

			$result = $this->common->searchByService($service,$hourly,$sort);

		}

		else if(!empty($service) && !empty($hourly) && empty($country) && empty($sort))
		{

			$result = $this->common->searchByService($service,$hourly,$sort);

		}
		else if(empty($service) && !empty($hourly) && empty($country) && empty($sort))
		{

			$result = $this->common->getbyHourlyFreelancer($hourly,$sort);

		}
		else if(empty($service) && !empty($hourly) && empty($country) && !empty($sort))
		{

			$result = $this->common->getbyHourlyFreelancer($hourly,$sort);

		}

		else if(!empty($service) && !empty($hourly) && !empty($country) && !empty($sort))
		{
			$result = $this->common->searchBySc($service,array('country'=>$country),$hourly,$sort);

		}


		else if(empty($service) && empty($hourly) && empty($country) && !empty($sort))
		{

			$result =  $this->common->searchfreelancer(array("country"=>101),$sort);

		}

		else if(!empty($service) && empty($hourly) && empty($country) && !empty($sort))
		{

			$result = $this->common->searchByService($service,$hourly,$sort);
		}

		else if(!empty($service) && empty($hourly) && empty($country) && empty($sort))
		{

			$result = $this->common->searchByService($service,$hourly,$sort);

		}

		else
		{

			$result =  $this->common->searchfreelancer(array("country"=>101),$sort);

		}


		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
    $scored = array();
		$SuccessScored = array();


		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
				if($res->parent != 0)
				{
					$clogo = $this->common->getSingleUser(array("us.id"=>$res->parent));
					$result[$key]->company_logo = $clogo->company_logo;
					$result[$key]->score = $clogo->successScore;
					$result[$key]->rating = $clogo->rating;
					$result[$key]->company_link = $clogo->c_name;
				}
				$SuccessScored[$key] = $res->score;

				$time = strtotime($date) - strtotime($res->timeStamp);
				if($time > 20)
				{
					$result[$key]->online ="0";
					$scored[$key] = 1;
				}
				else
				{
					$result[$key]->online ="1";
					$scored[$key] = 1;
				}
			}
		}

		array_multisort($scored,SORT_DESC,$SuccessScored,SORT_DESC, $result);

		if(!empty($result))
		{
			$totalearning = 0;
			$t = 0;
			$score = 0;
			$jobs =0;
			$countreview =0;

			foreach($result as $key=>$res)
			{
				$total_rating = 0;
				$data = $this->common->getjobSuccess(array("jc.freelancerId"=>$res->u_id));
				$amount = $this->common->gettoprated(array("jc.freelancerId"=>$res->u_id));

				$rating = $this->common->countTotalReview(array("reviewTo"=>$res->u_id));
				$countreview = $this->common->countReviewproject('user_review',array("reviewTo"=>$res->u_id));

				// if(!empty($rating->total))
				// {
				// 	$result[$key]->rating = $rating->total / $countreview / 2;
				// }
				// else
				// {
				// 	$result[$key]->rating = 0;
				//
				// }

				if(!empty($amount))
				{
					foreach($amount as $am)
					{
						$totalearning =+ $am->contractAmount;
					}
				}

				if(!empty($data))
				{
					$t = $data->reviewOverall;
					$jobs = $data->jobs;
				}

				$result[$key]->jobcount = $jobs;
				$result[$key]->totalearning = $totalearning;
			}


		}

		if($result)
		{
			$data1['message'] = "true";
			$data1['result'] = $result;

		}

		else
		{
			$data1['message'] ="false";
			$data1['result'] ='';

		}

		echo json_encode($data1);
		exit;

	}

	public function getsearchFilterRankingContent()
	{
		$content = '';
		$country ='';
		$service ='';

		$array = file_get_contents('php://input');
		$results = json_decode($array);

		if(!empty($results->country))
		{
			$country = $results->country;
		}

		if(!empty($results->service))
		{
			$service = $results->service;
		}


		if(!empty($service))
		{
			$content = $this->common->getrankingContenthire($service,$country);
		}

		if($content)
		{
			$data['message'] = "true";
			$data['result'] = $content;

		}

		else
		{
			$data['message'] ="false";
			$data['result'] ='';
		}

		echo json_encode($data);
		exit;
	}

	public function client($url = null)
	{
		if(!isset($this->session->userdata['clientloggedin']['id']))
		{
		  $data = array();
      $data['title'] ="Login to Your Account - Top SEO Site";
      $data['description'] ="Login at Top SEOs, the leading freelancing website. Hire an expert freelancer in India and worldwide and grow your business.";
		  $data['url'] = $url;
		  $this->load->view('front/header',$data);
		  $this->load->view('front/login');
		  $this->load->view('front/footer');
		}
		else
		{
		   if($this->session->userdata['clientloggedin']['type'] == 2 || $this->session->userdata['clientloggedin']['type'] == 3)
			 {
				 redirect('freelancer/dashboard');
			 }
			 else
			 {
				 redirect('client-dashboard');

			 }
		}
	}

	public function login()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
			$data = array(
				'email' =>$results->email,
				'pass' => md5($results->password),
			);


			$result = $this->common->getrow('user',$data);

			if ($result == TRUE)
			{
         if ($result->is_active == '1' && $result->deleted == '0')
				 {
					// Add user data in session
					if($result->type == '4')
					{
						$session_data = array(
							'id' => $result->id,
							'email' => $result->email,
							'type' => $result->type,
							'access'=>$result->access,
							'role'=>'client'
						);
						$this->session->set_userdata('clientloggedin', $session_data);

						 $msg['success'] ="true";
						 $msg['message'] ="Login Successfully";
						 $msg['redirect'] = 'client-dashboard';
						 $msg['result'] = $result;

					}
					else if($result->type == '3' || $result->type == '2')
					{
						$user = $this->common->getrow('user',array("id"=>$result->id));
			  		if($user->parent != 0)
			  		{
			  			$userid = $user->parent;
			  		}
			  		else
			  		{
			  			$userid = $user->id;
			  		}
						 $name = $this->common->getrow('user_meta',array("u_id"=>$userid));
						 if(!empty($name->url))
						 {
							 $url = str_replace(' ','-',strtolower($name->url.'-'.$name->u_id));
						 }
						 else
						 {
							 $url = str_replace(' ','-',strtolower($name->c_name.'-'.$name->u_id));
						 }

							$access = '';
							if($result->access == 5)
							{
                $access = "hr";
							}
							else if($result->access == 6)
							{
								$access ="manager";
							}
							else if($result->access == 2)
							{
								$access ="sales-manager";
							}
							else if($result->access == 3)
							{
								$access ="emp";
							}
							else if($result->access == 7)
							{
								$access ="sales-emp";
							}

						 $session_data = array(
							'id' => $result->id,
							'email' => $result->email,
							'type' => $result->type,
							'access'=>$result->access,
							'parent'=>$result->parent,
							'url'=>$url,
							'aurl'=>$access,
							'role'=>'freelancer'
						);

						$this->session->set_userdata('clientloggedin', $session_data);

					 if($result->access == 1 )
					 {
						 // $msg['redirect'] ="find-work";
						 $msg['redirect'] ="dashboard/".$url;

					 }
					 else
					 {
						 $msg['redirect'] ="dashboard/".$url.'/'.$access;
					 }
						$msg['success'] ="true";
						$msg['message'] = "Login Successfully";
						$msg['result'] = $result;
						// redirect('find-work');
					}

				}
				else
				{
					$msg['error'] ="true";
					$msg['message'] ="Your account has been deactivated. Please contact admin to activate your account";
				}

			}
			else
			{
				$msg['error'] = "true";
				$msg['message'] = 'Invalid Email or Password.';
			}

      echo json_encode($msg);
			exit;
	}


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function freelancerProfile($id)
	{
		$a = explode("-",$id);
    $c = count($a);
    $id = $a[$c-1];
		$data['id'] = $id;
		$user =  $this->common->getprofile(array("us.id"=>$id));

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		if (isset($_SERVER['HTTP_CLIENT_IP']))
   {
	  $real_ip_adress = $_SERVER['HTTP_CLIENT_IP'];
   }
   if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
   {
	  $real_ip_adress = $_SERVER['HTTP_X_FORWARDED_FOR'];
   }
   else
   {
	  $real_ip_adress = $_SERVER['REMOTE_ADDR'];
    }
    $cip = $real_ip_adress;
    $iptolocation = 'http://api.hostip.info/country.php?ip=' . $cip;
    $creatorlocation = file_get_contents($iptolocation);

    $check = $this->common->getrow('profileview',array("ip"=>$cip,"userId"=>$id));
		// if(empty($check))
		// {
    $this->common->insert('profileview',array("userId"=>$id,"ip"=>$cip,"country"=>$creatorlocation,"date"=>$date));
	  // }

		if($user->type == 2)
		{
			if($user->seoTitle != '' && $user->seoTitle != '')
			{
				$data['title'] = $user->seoTitle;
				$data['description'] = $user->seoDescription;
			}
			else
			{
			$data['title'] =  $user->c_name." - ".$user->name ."- Get Complete Company Information at Top SEOS";
			$data['description'] = strip_tags(substr($user->about, 0, 200));
		  }
		}
		 else if ($user->type == 3)
		 {
			 if(isset($user->seoTitle) && isset($user->seoTitle))
 			{
 				$data['title'] = $user->seoTitle;
 				$data['description'] = $user->seoDescription;
 			}
			 else
			 {
		 	 $data['title'] =  $user->name."- Get Complete Company Information at Top SEOS";
			 $data['description'] = strip_tags(substr($user->about, 0, 200));
		   }
		 }

		$result = $this->common->getSingleUser(array("us.id"=>$id));

		if($result)
		{
			$result->services = $this->common->getServicesinfo($id);
			$result->industry = $this->common->getindustry(array("u_id"=>$id));
			$result->paidranking = $this->common->getUserPaidServices(array("b.userId"=>$id));

     if(!empty($result->services))
		 {
			 foreach($result->services as $key=>$service)
	     {
	       $url1 = $this->common->getrow('hire_ranking_content',array('servicesId'=>$service->sid));
	      if($url1)
	      {
	      $result->services[$key]->link = $url1->url;
	      }
				else
				{
					$result->services[$key]->link = '';
         }
			}
		}


			$payment = $this->common->getrow('user_account',array("u_id"=>$id));

			if(!empty($payment))
			{
				$result->payment = $payment->accountId;
			}
		}



		if(!empty($result))
		{
			$time = strtotime($date) - strtotime($result->timeStamp);
			if($time > 20)
			{
				$result->online ="0";
			}
			else
			{
				$result->online ="1";
			}
		}
		$replacements = array();



		$data['profile'] = $result;
		$data['questionType'] = $this->common->get('questiontype',array("status"=>1));
		$data['questionType'] = $this->common->get('question',array("status"=>1));
		$data['currency'] = $this->common->getrow('currency',array("id"=>$result->currencyId));

		$this->load->view('front/header',$data);
		$this->load->view('front/freelancer-profile');
		$this->load->view('front/footer');

	}

	public function getprofile()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->getSingleUser(array("us.id"=>$userId));


			if($results)
			{
				$payment = $this->common->getrow('user_account',array("u_id"=>$userId));

				if(!empty($payment))
				{
					$result->payment = $payment->accountId;
				}

			}

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			if(!empty($result))
			{
				$time = strtotime($date) - strtotime($result->timeStamp);
				if(!empty($result->countryCode))
				{
				$code =  explode(":",$result->countryCode);
				$result->countryCode = $code[1];
			  }
				if($time > 20)
				{
					$result->online ="0";
				}
				else
				{
					$result->online ="1";
				}

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

	public function checkRquestStatus()
	{
		$array = file_get_contents('php://input');
		$results = json_decode($array);

		$uid = $results->userId;
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

	public function joboffer()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$image ='';
		$milestone = $results->milestone;

		$skill = $results->skill;
		$industry = $results->industry;


		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		if(!empty($results->image))
		{
			$image = $results->image;
		}



		$data = array(
			"jobTitle"=>$results->jobtitle,
			"jobDescription"=>$results->description,
			"jobAttchment" =>$image,
			"industryId" =>'ss',
			"servicesId"=>$results->service,
			"jobRequiredFreelancer"=>$results->required,
			"jobStatus" => 0,
			"jobEstimateHours"=>$results->estimatehours,
			"jobEstimateHourlyPrice"=>$results->estimatehours,
			"jobBudget"=>$results->budget,
			"currencyId"=>$results->currencyId,
			"jobDate"=>$date,
			"jobStatus"=>0,
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
					$serid = $success[1];
				}
				else
				{
					$sdata =array(
						"jobId"=>$success[1],
						"value"=>$s->id,
						"type"=>"service",
					);
					$serid = $s->id;
				}

				$client_services = $this->common->getrow('user_services',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"servicesId"=>$serid));

				if(empty($client_services))
				{
					$this->common->insert('user_services',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"servicesId"=>$serid));
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
					$indId = $newindustry[1];
				}
				else
				{
					$sdata =array(
						"jobId"=>$success[1],
						"value"=>$i->id,
						"type"=>'industry',
					);
					$indId = $i->id;
				}

				$client_industry = $this->common->getrow('user_industries',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"industryId"=>$indId));

				if(empty($client_industry))
				{
					$this->common->insert('user_industries',array("u_id"=>$this->session->userdata['clientloggedin']['id'],"industryId"=>$indId));

				}
				$industryInsert = $this->common->insert('job_meta',$sdata);
			}
       // practice area linked
			foreach($industry as $i)
			{
				foreach($skill as $s)
				{
					if($i->id != 0)
					{
						if($s->id != 0)
						{
							$this->common->insert('practice_service_link',array("industryId"=>$i->id,"serviceId"=>$s->id));
						}
					}

				}
			}
			   // practice area linked
		}


		if($success[0] == 1)
		{
			$jobofferdata = array(
				"offTo"=>$results->offerto,
				"offFrom"=>$this->session->userdata['clientloggedin']['id'],
				"offDate"=>$date,
				"offStatus"=>0,
				"jobId"=>$success[1],
			);

			$joboffer = $this->common->insert('user_joboffer',$jobofferdata);

			if($joboffer)
			{

				$friendlistdata = array(
					"friendUser"=>$this->session->userdata['clientloggedin']['id'],
					"friendContact" =>$results->offerto,
					"jobId" =>$success[1],
					"jobOffer"=>$success[1],
					"friendStatus" =>0,
					"user_messageId" =>0,
				);

				$friendlist = $this->common->insert('user_friendcontact',$friendlistdata);
			}
		}

		if($friendlist)
		{
			$name = $this->common->getrow('user_meta',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
			$m ="you have received New job offer from ".$name->name;

			$Notificationdata = array(
				"notificationFrom"=>$this->session->userdata['clientloggedin']['id'],
				"notificationTo" =>$results->offerto,
				"notificationMessage" => $m,
				"notificationDate" => $date,
				"notificationStatus" => 0,
				"notificationDeleted" =>0,
			);

			$notification = $this->common->insert('user_notification',$Notificationdata);

		}

		if($notification)
		{

			$link = str_replace(' ','-',strtolower($results->jobtitle.'-'.$success[1]));
			$msgtext ='';

			$msgtext .="<table><tbody><tr><td style='width: 100%' colspan='1'><div class='story-attachment-generic-col-title'></div>";
			$msgtext .="<div>Job title : ".$results->jobtitle."</div></td></tr><tr>";

			$msgtext .="<tr><td  style='width: 100%' colspan='1'><div></div>";
			$msgtext .="<div>Amount : ".$results->budget."</div></td></tr><tr><td  style='width: 100%' colspan='1'>";
			$msgtext .="<div></div>";
			$msgtext .="</td></tr></tbody></table>";
			// $msgtext .="<div></div><div><a href='".base_url().'job/'.$link."'>View Detail</a></div>";

			$messageData = array(
				"messageFrom"=>$this->session->userdata['clientloggedin']['id'],
				"messageTo"=>$results->offerto,
				"messageText"=>$msgtext,
				"messageOffer"=>$success[1],
				"friendId"=>$friendlist[1],
				"messageDate"=>$date,
				"messageStatus"=>0,
			);
			$messageinsert = $this->common->insert('user_message',$messageData);
			//$request = $this->common->getrow('user_friendcontact',array("friendUser"=>$this->session->userdata['clientloggedin']['id'],"friendContact"=>$results->offerto));
		}

		$detail['title'] = $results->jobtitle;
		$detail['description'] = $results->description;
		$detail['amount'] = $results->budget;
		$detail['userdetail'] = $this->common->getuserdetail(array("us.id"=>$results->offerto));
		$detail['from'] = $this->common->getuserdetail(array("us.id"=>$this->session->userdata['clientloggedin']['id']));

		$message = $this->load->view('email/job',$detail,true);
		$this->mailsend('Top-SEOs Notification',$detail['userdetail']->email,$message);

		if($success[0] == 1)
		{
			$jobId =	$success[1];
			if(!empty($csv))
			{
				foreach($csv as $key=>$m)
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
							if(!empty($t->task))
							{
								$tdata =array(
									"milestoneId"=>$milestone[1],
									"taskTitle"=>$t->task,
									"taskHours"=>$t->hours,
									"taskHourlyPrice"=>$t->hourlyPrice,
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

			// csv milestone
			if(!empty($milestone[0]->title))
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
							if(!empty($t->task))
							{
								$tdata =array(
									"milestoneId"=>$milestone[1],
									"taskTitle"=>$t->task,
									"taskHours"=>$t->hours,
									"taskHourlyPrice"=>$t->hourlyPrice,
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
			//csv milestone
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





	public function contact()
	{
		$array = file_get_contents('php://input');
		$results = json_decode($array);

		if(!empty($results->jobId))
		{
			$check = $this->common->checkexist('user_friendcontact',array('friendUser'=>$this->session->userdata['clientloggedin']['id'],'friendContact'=>$results->userId,'jobId'=>$results->jobId));
		}
		else
		{
			$check = $this->common->checkexist('user_friendcontact',array('friendUser'=>$this->session->userdata['clientloggedin']['id'],'friendContact'=>$results->userId));
		}

		if($check != 0)
		{
			$msg1['success'] ='2';
			echo json_encode($msg1);
			exit;
		}
		else
		{
			$jobId = '';
			if(!empty($results->jobId))
			{
				$jobId = $results->jobId;
			}
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');
			if(isset($results->jobId))
			{
				$job = $this->common->getrow('user_job',array("jobId"=>$results->jobId));
				$jobmsg = array(
					"messageTo"=>$results->userId,
					"messageFrom"=>$this->session->userdata['clientloggedin']['id'],
					"messageText"=>$job->jobTitle,
					"messageDate"=>$date,
					"messageStatus"=>0,
				);
				$success = $this->common->insert('user_message',$jobmsg);
			}

			$friendlistdata = array(
				"friendUser"=>$this->session->userdata['clientloggedin']['id'],
				"friendContact" =>$results->userId,
				"friendStatus" =>0,
				"jobId" =>$jobId,
				"user_messageId" => 0,
			);

			$friendlist = $this->common->insert('user_friendcontact',$friendlistdata);

			$data = array(
				"messageTo"=>$results->userId,
				"messageFrom"=>$this->session->userdata['clientloggedin']['id'],
				"messageText"=>$results->msg,
				"friendId"=>$friendlist[1],
				"messageDate"=>$date,
				"messageStatus"=>0,
			);

			$detail['msg'] = $results->msg;
			$success = $this->common->insert('user_message',$data);

			if($success[0] == 1)
			{
				$messageId =	$success[1];


				$detail['userdetail'] = $this->common->getuserdetail(array("us.id"=>$results->userId));
				$detail['from'] = $this->common->getuserdetail(array("us.id"=>$this->session->userdata['clientloggedin']['id']));


				$msg = $this->load->view('email/contact',$detail,true);

				$this->mailsend('Top-SEOs Notification',$detail['userdetail']->email,$msg);
			}

			if($friendlist)
			{
				$name = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
				$m ="you have received New messaage from ".$name->name;
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
		}
		if($notification)
		{
			$msg1['success'] = "1";
		}

		else
		{
			$msg1['success'] = "0";
		}

		echo json_encode($msg1);
		exit;
	}


	public function imageUpload()
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
		if($mime_type =="image/png")
		{
			echo $image = $name;
			$image = file_put_contents('assets/jobAttachment/'.$image,$data1);
		}
		else if($mime_type =="image/jpeg")
		{
			echo $image= $name;
			$result=file_put_contents('assets/jobAttachment/'.$image,$data1);
		}
		else if($mime_type =="application/pdf")
		{
			echo $image = $name;
			$result=file_put_contents('assets/jobAttachment/'.$image,$data1);
		}
		else if($mime_type == "text/plain")
		{
			echo $image = $name;
			$result=file_put_contents('assets/jobAttachment/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
			echo	 $image = $name;
			$result=file_put_contents('assets/jobAttachment/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
		{
			echo	 $image = $name;
			$result=file_put_contents('assets/jobAttachment/'.$image,$data1);
		}
		exit;
	}


	public function chatAttachment()
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


		if($mime_type =="image/png")
		{
			echo $image = $name;
			$image = file_put_contents('assets/chatAttachment/'.$image,$data1);
		}
		else if($mime_type =="image/jpeg")
		{
			//echo $image=uniqid().'Attachment.jpeg';
			echo $image= $name;
			$result=file_put_contents('assets/chatAttachment/'.$image,$data1);
		}
		else if($mime_type =="application/pdf")
		{
			//echo $image = uniqid().'Attachment.pdf';
			echo $image = $name;
			$result=file_put_contents('assets/chatAttachment/'.$image,$data1);
		}
		else if($mime_type == "text/plain")
		{
			// echo $image = uniqid().'Attachment.text';
			echo $image = $name;
			$result=file_put_contents('assets/chatAttachment/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
			echo	 $image = $name;

			//echo	 $image = uniqid().'Attachment.xlsx';
			$result=file_put_contents('assets/chatAttachment/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.presentationml.presentation"){
			echo $image =  $name;
			//echo $image =  uniqid().'Attachment.ppt';
			$result=file_put_contents('assets/chatAttachment/'.$image,$data1);
		}
		else if($mime_type == "application/msword")
		{
			echo $image =  $name;
			$result=file_put_contents('assets/chatAttachment/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")
		{
			echo $image =  $name;
			$result=file_put_contents('assets/chatAttachment/'.$image,$data1);
		}
		exit;

	}

	public function getUserType()
	{
		$types = $this->common->getTable('user_type');

		if($types)
		{
			$msg['message'] = "true";
			$msg['result'] = $types;
		}
		else
		{
			$msg['message'] = "false";
			$msg['result'] = '';
		}

		echo json_encode($msg);
		exit;
	}

	public function register($id = null)
	{
		if(!isset($this->session->userdata['clientloggedin']['id']))
		{
		  $data['packageId'] = $id;
		  if(isset($id))
		  {
			  $pa = $this->common->getrow('packages',array("packageId"=>$id));
			  $data['title'] =  'Register'.$pa->packageName .' Plan at '.$pa->packagePrice.'| Paid Membership - Top SEOs';
 			  $data['description'] =  'UPgrade your Top-SEOs profile with our '.$pa->packageName .' Paid membership plan for Freelancers and Companies. Get the most out of the platform.';
		  }
	    else
	    {
		  $data['title'] =  "Create an Account - Top SEO Site";
		  $data['description'] =  "Top SEOs is leading online workplace, where businesses hire, manage and pay highly experienced and professional freelancers.";
	   }

		$this->load->view('front/header',$data);
		$this->load->view('front/register');
		$this->load->view('front/footer');
	 }
	 else
	 {
	    if($this->session->userdata['clientloggedin']['type'] == "2" || $this->session->userdata['clientloggedin']['type'] == "3")
	    {
	      redirect('freelancer/dashboard');
	    }
	    else
	    {
	      redirect('client-dashboard');

	    }
	 }
	}

	public function user_register()
	{
		$array = file_get_contents('php://input');
		$results = json_decode($array);

		$check_email=$this->common->checkexist('user',array('email' =>$results->email));

		if($check_email != 0)
		{
			$msg1['success'] ='2';
			$msg1['message'] ='Email is Register Already';
			echo json_encode($msg1);
			exit;
		}
		else
		{
			if(!empty($results->name))
			{
			 $st['name'] = $results->name;
			 $msg1['name'] = $results->name;
		  }
			if(!empty($results->c_name))
			{
			$st['c_name'] = $results->c_name;
			$msg1['c_name'] = $results->c_name;
		  }
			$st['url'] = $results->url;
			$us['pass'] = md5($results->password);
			$us['email']= $results->email;

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');
			$us['access'] = 1;
			$us['type'] = $results->type;
			$us['membership'] = 17;
			$us['uhash'] = strtotime($date) . rand(0,9999);
			$us['date_created'] = $date;
			$st['date_created'] = $date;

			$data =$this->common->insert('user',$us);

			if($data[0] == 1)
			{
				$st['u_id'] = $data[1];
				$user = $this->common->insert('user_meta',$st);

				$this->common->insert('admin_lead',array("userId"=>$data[1],"status"=>1,"date"=>$date));
				if($results->type == 2)
				{
					$this->common->insert('lead_source',array("userId"=>$data[1],"source"=>"Top SEOs","byDefault"=>1));
				}

				// $logdata=array(
				// 	'logType' =>'conversation',
				// 	'logSubType' =>'link',
				// 	'userId' =>$st['u_id'],
				// 	'logReference' =>'activate-account',
				// 	'logDate' =>$date,
				// 	'logStatus' =>'1'
				// );
				//
				// $log = $this->common->insert('user_log',$logdata);

				if($results->type == 2 || $results->type == 3  )
			  {
					 if(!empty($results->packageId))
					 {
					  $package = $this->common->getrow('packages',array("packageId"=>$results->packageId));
				   }
					else
					{
						$package = $this->common->getrow('packages',array("packagePrice"=>"FREE"));
					}
					$m['userId'] = $data[1];
					$m['date'] = $date;
					if(!empty($package))
					{
          $m['packageId'] = $package->packageId;
				  }
					$m['membershipStatus'] = 1;
          $mem = $this->common->insert('user_membership',$m);

					if($mem)
					{
						$ca['userId'] = $data[1];
						$ca['type'] = "Carry forward Leave";
						$ca['duration'] = 1;
						$ca['durationType'] = "Day";
						$ca['startDate'] = null;
						$ca['carryUpto'] = '';
						$ca['status'] = 0;
						$ca['reoccuring'] = 1;
						$ca['reoccuringType'] = 2;
						$ca['carryforwardtype'] = 1;
						$this->common->insert('leavetype',$ca);
					}
			}

			if($data)
			{
				$a['notificationTo'] = 0;
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;
				$furl = base_urL().'admin/freelancer';
				$curl = base_urL().'admin/client';
				$a['notificationFrom'] = $data[1];
				$a['notificationStatus'] = 0;
				if($results->type == 2)
				{
				$a['notificationType'] = "freelancer";
				$a['notificationMessage'] = "You have a new notification of <b>freelancer</b>, please <a class='clicknotification' data-id='$lastId' data-href='$furl'>click here</a> to know more.";
			  }
				else
				{
					$a['notificationType'] = "client";
					$a['notificationMessage'] = "You have a new notification of <b>client</b>, please <a class='clicknotification' data-id='$lastId' data-href='$curl'>click here</a> to know more.";
				}
				$a['notificationDate'] = $date;
				$this->notificationSave($a);
			}

				// if($log)
				// {
				// 	if(!empty($st['name']))
				// 	{
        //   $detail['name'] = $st['name'];
				//   }
				// 	else
				// 	{
				// 		$detail['name'] = $st['c_name'];
				// 	}
				//   $encryptemail=$this->encrypt->encode($results->email);
				//   $detail['link'] = base_url().'account/activate/'.$encryptemail;
				//   $msg = $this->load->view('email/register_verification',$detail,true);
        //   $this->mailsend('Top-Seo Email Verification',$results->email,$msg);
				// }
			}

			if ($user)
			{
				$msg1['success'] ='1';
				$msg1['message'] ='Register Successfully';
				$msg1['userId'] = $data[1];

				if(!empty($package) && $package->packagePrice != "FREE")
				{
				$msg1['packageId'] = $package->packageId;
			  }

			}
			else
			{
				$msg1['success'] ='0';
				$msg1['message'] ='user not register';

			}

			echo json_encode($msg1);
			exit;
		}
	}



	public function account_activate($email)
	{
		// $email= $this->encrypt->decode($email);
		 $email= base64_decode($email);
		$result= $this->common->getrow('user',array('email'=>$email));
		if($result)
		{
			$userid = $result->id;
			$log= $this->common->getRecentOne('user_log',array('userid'=>$userid,'logSubType'=>'link'),'userId','desc');
		}
		if($log->logStatus == 1)
		{

			$success = $this->common->update(array('email' =>$email),array('is_active'=>'1'),'user');
			if($success)
			{
				$log=$this->common->update(array('userId' =>$userid,'logSubType'=>'link'),array('logStatus'=>'0'),'user_log');
				$meta = $this->common->getrow('user_meta',array("u_id"=>$userid));
				$data['name'] = $meta->name;
				$message = $this->load->view('email/account_activated',$data,true);
				$this->mailsend("Top-SEOs Account Activated",$email,$message);
			}
			if($log)
			{
				$this->session->set_flashdata('success_message', 'Great!! Your account has been verified..');
			}
			else
			{
				$this->session->set_flashdata('success_message', 'Account is not Activate.');
			}
			redirect('login');
		}
		else
		{
			redirect('activation/expired');
		}

	}

	public function activation_expired()
	{
		$this->load->view('front/header');
		$this->load->view('front/link-expired');
		$this->load->view('front/footer');
	}

	public function forgot_password()
	{
		$data['title'] ="Get Password | Forget Pasword - Top SEOs";
		$data['description'] ="Are you looking to hire a freelancer or company for your business? We provide experienced freelancers to complete your projects.";
		$this->load->view('front/header',$data);
		$this->load->view('front/forgot-password');
		$this->load->view('front/footer');
	}

	public function email_recovery()
	{

		$array = file_get_contents('php://input');
		$results = json_decode($array);

		$check_email = $this->common->checkexist('user',array('email' =>$results->email));

		if($check_email == 1)
		{
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			// $email=$this->encrypt->encode($results->email);
			$email= base64_encode($results->email);
			//$email= $this->encode($results->email);
			// echo $email;
			// die;
			$userdata=$this->common->getrow('user',array("email"=>$results->email));
			if($userdata)
			{
				$logdata=array(
					'logType' =>'conversation',
					'logSubType' =>'link',
					'userId' =>$userdata->id,
					'logReference' =>'password',
					'logDate' =>$date,
					'logStatus' =>'1'
				);
				$log = $success = $this->common->insert('user_log',$logdata);
			}
			if($log)
			{
				$meta = $this->common->getrow('user_meta',array("u_id"=>$userdata->id));

				$data['name'] = $meta->name;
				$data['link'] = base_url().'new_password/'.$email;
				$message = $this->load->view('email/forgot',$data,true);
				$this->mailsend("Reset your password",$results->email,$message);

				if($meta)
				{
					$msg['message'] ="true";
				}
			}
		}
		else
		{
			$msg['message'] = "false";
		}
		echo json_encode($msg);
	}

	public function new_password($email)
	{
		// $data['email']= $this->encrypt->decode($email);
		$data['email']= base64_decode($email);

		$result= $this->common->getrow('user',array('email'=>$data['email']));
		if($result)
		{
			$userid = $result->id;
			$log= $this->common->getRecentOne('user_log',array('userId'=>$userid,'logSubType'=>'link'),'logId','desc');
		}
		if($log->logStatus == '1')
		{

			$this->load->view('front/header');
			$this->load->view('front/new-password',$data);
			$this->load->view('front/footer');
		}
		else
		{
			redirect('forgotpassword/expired');
		}
	}
	public function password_update()
	{
		$array = file_get_contents('php://input');
		$results = json_decode($array);

		$result= $this->common->getrow('user',array('email'=>$results->email));
		if($result)
		{
			$log=$this->common->update(array('userId' =>$result->id,'logSubType'=>'link'),array('logStatus'=>'0'),'user_log');
		}
		if($log)
		{
			$success=$this->common->update(array('email' =>$results->email),array('pass'=>md5($results->password)),'user');
		}
		if($success)
		{
			$msg['message'] = "true";
		}
		else
		{
			$msg['message'] ="false";
		}
		echo json_encode($msg);
	}

	public function forgot_expired()
	{
		$this->load->view('front/header');
		$this->load->view('front/forgot-expired');
		$this->load->view('front/footer');
	}

	public function clientjobs()
	{
		$msg = array();
		$jobs = array();
		if (isset($this->session->userdata['clientloggedin']))
		{
			$jobs = $this->common->getclientjobs(array("offFrom"=>$this->session->userdata['clientloggedin']['id'],"offStatus"=>0));
		}

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
			 // 'smtp_user' => 'nitindeveloper23@gmail.com',
			 // 'smtp_pass' => 'nitin@123',
			 'smtp_user' => 'topseos.companies@gmail.com',
	     'smtp_pass' => 'Onewayit@786',
			'mailtype' => "html",
			'wordwrap' => TRUE,
			'crlf' => '\r\n',
			'charset' => "utf-8"
		);
		$ci->email->initialize($ci->config_email);
		$ci->email->set_newline("\r\n");
		$ci->email->from('topseos.companies@gmail.com', 'TOP-SEOs');
    $ci->email->to($to);
		$ci->email->subject($sub);
		$ci->email->message($msg);

		if ($ci->email->send()) {
			$ci->email->clear(TRUE);
		   return TRUE;
			// echo "working";

		} else {
			//echo $ci->email->print_debugger();
		//	echo "No";
			 return FALSE;
		}
	}

	public function onlinesave()
	{
		$msg = array();
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		if(isset($this->session->userdata['clientloggedin']['id']))
		{
			$data = array(
				"u_id"=>$this->session->userdata['clientloggedin']['id'],
				"type"=>$this->session->userdata['clientloggedin']['type'],
				"timeStamp"=>$date,
			);


			$check = $this->common->getrow('user_onlinelog',array('u_id'=>$this->session->userdata['clientloggedin']['id']));
			if(empty($check))
			{
				$online = $this->common->insert('user_onlinelog',$data);
			}
			else
			{
				$online = $this->common->update(array("u_id"=>$this->session->userdata['clientloggedin']['id']),$data,'user_onlinelog');
			}
			if($online)
			{
				$msg['message'] ="true";
			}
			else
			{
				$msg['message'] ="false";
			}
		}


		echo json_encode($msg);
	}


	public function getpricing()
	{
		$msg = array();
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->getpricing(array("sp.u_id"=>$userId,"deleted"=>0));

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
		}

		echo json_encode($msg);
		exit;

	}

	public function gettestimonial()
	{

		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->get('user_testimonial',array("u_id"=>$userId,"testimonialDeleted"=>0));

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
		}

		echo json_encode($msg);
		exit;

	}

	public function getCaseStudy()
	{

		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->getCaseStudy(array("u_id"=>$userId,"deleted"=>0));

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
		}

		echo json_encode($msg);
		exit;

	}

	public function getuserservice()
	{

		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->getServicesinfo($userId);

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
		}

		echo json_encode($msg);
		exit;

	}

	public function getuserIndustry()
	{

		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->getindustry(array("u_id"=>$userId));

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
		}

		echo json_encode($msg);
		exit;

	}

	public function getteam()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->getCompanyTeam(array("us.parent"=>$userId,"us.is_active"=>1,"us.deleted"=>0));

			if(!empty($result))
			{
				$scored = array();
        $SuccessScored = array();
				foreach($result as $key=>$res)
				{
					$result[$key]->services = $this->common->getservices(array("us.u_id"=>$res->u_id));
					$result[$key]->about = strip_tags($res->about);
					$experience = $this->common->get('employee_experience',array("u_id"=>$res->u_id));
					$currency = $this->common->getrow('currency',array("id"=>$res->currencyId));
					if(!empty($currency))
					{
					$result[$key]->code =  $currency->code;
					$result[$key]->symbol =  $currency->symbol;
				  }

					$days = 0;
					if(!empty($experience))
					{
						foreach($experience as $ex)
						{
							$date1=date_create($ex->experienceYearStart."-".$ex->experienceMonthStart);

							if($ex->experienceCurrentlyWorking == 1)
							{
								$date2=date_create(date('Y')."-".date('M'));
							}
							else
							{
								$date2=date_create($ex->experienceYearEnd."-".$ex->experienceMonthEnd);
							}

							if($date1 && $date2)
							{
							$diff= date_diff($date1,$date2);
						  }

               if(!empty($diff))
							 {
							$days += $diff->format("%a");
						   }
						}
						$result[$key]->experience =  round($days/365);
					}
					$scored[$key] = $days;
					$SuccessScored[$key] = $res->department;
				}

				array_multisort($scored, SORT_DESC,$SuccessScored, SORT_DESC,$result);
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
		}
		else
		{
			$msg['message'] = "false";
			$msg['result'] = '';
		}

		echo json_encode($msg);
		exit;

	}

	public function getTeamOne()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		if(!empty($results->userId))
		{
		$userId = $results->userId;
	  }
		else
		{
			if(isset($this->session->userdata['clientloggedin']['id']))
			{
       $userId = $this->session->userdata['clientloggedin']['id'];
		  }
			else
			{
			  $userId='';
			}
		}

		if(isset($userId))
		{
			$result = $this->common->getSingleUser(array("um.u_id"=>$userId));
			//$result->experiencedetail = $this->common->get('employee_experience',array("u_id"=>$userId));

			if(!empty($result))
			{
				if(!empty($result->dateofbirth))
				{
        $result->dateofbirth = date("d-m-Y", strtotime($result->dateofbirth));
			  }
				else
				{
					$result->dateofbirth = '';
				}
				$result->services = $this->common->getservices(array("us.u_id"=>$result->u_id));
				$experience = $this->common->get('employee_experience',array("u_id"=>$result->u_id));
				$days = 0;
				$a = 0;
				foreach($experience as $key=>$ex)
				{
					$date1=date_create($ex->experienceYearStart."-".$ex->experienceMonthStart);
					if($ex->experienceCurrentlyWorking == 1)
					{
						$date2=date_create(date('Y')."-".date('M'));
					}
					else
					{
						$date2=date_create($ex->experienceYearEnd."-".$ex->experienceMonthEnd);
					}
					$diff=date_diff($date1,$date2);
					// $diff1 = abs(strtotime($date2) - strtotime($date1));

					$days += $diff->format("%a");
				  $a  += $diff->format("%a");
					$experience[$key]->experienceYear = $diff->y;
					$experience[$key]->experienceMonth = $diff->m;

				}
				$result->experience =  number_format($days/365, 1, '.', '');
				$result->experiencedetail = $experience;

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
		}

		echo json_encode($msg);
		exit;

	}

	public function getportfolio()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		$portfolio = $this->common->get('user_portfolio',array("u_id"=>$userId,"portfolioDeleted"=>0));

		if(!empty($portfolio))
		{
			foreach($portfolio as $key=>$port)
			{
				$portfolio[$key]->services = $this->common->getPortfolioServices(array("ps.portfolioId"=>$port->portfolioId));
			}
		}

		if($portfolio)
		{
			$msg['message'] ="true";
			$msg['result'] = $portfolio;
		}
		else
		{
			$msg['message'] ="false";
		}
		echo json_encode($msg);
	}

	public function getoneportfolio()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);


		$portfolio = $this->common->getrow('user_portfolio',array("portfolioId"=>$results->id));

		if(!empty($portfolio))
		{
			$portfolio->services = $this->common->getPortfolioServices(array("ps.portfolioId"=>$results->id));
		}

		if($portfolio)
		{
			$msg['message'] ="true";
			$msg['result'] = $portfolio;
		}
		else
		{
			$msg['message'] ="false";
		}
		echo json_encode($msg);
	}

	public function getkeypeople()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;
		if(isset($userId))
		{
			$result = $this->common->getkeypeople($userId);
		}

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
				$result[$key]->services = $this->common->getservices(array("us.u_id"=>$res->u_id));
				$result[$key]->about = strip_tags($res->about);
				$experience = $this->common->get('employee_experience',array("u_id"=>$res->u_id));
				$currency = $this->common->getrow('currency',array("id"=>$res->currencyId));
				if(!empty($currency))
				{
				$result[$key]->code =  $currency->code;
				$result[$key]->symbol =  $currency->symbol;
				}

				$days = 0;
				if(!empty($experience))
				{
					foreach($experience as $ex)
					{
						$date1=date_create($ex->experienceYearStart."-".$ex->experienceMonthStart);

						if($ex->experienceCurrentlyWorking == 1)
						{
							$date2=date_create(date('Y')."-".date('M'));
						}
						else
						{
							$date2=date_create($ex->experienceYearEnd."-".$ex->experienceMonthEnd);
						}

						if($date1 && $date2)
						{
						$diff= date_diff($date1,$date2);
						}

						 if(!empty($diff))
						 {
						$days += $diff->format("%a");
						 }
					}

					$result[$key]->experience =  round($days/365);
				}
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
			$msg['result'] ='';
		}
		echo json_encode($msg);
	}

	public function getclient()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->salesMajorClient(array("userId"=>$userId));
			$active = $this->common->salesActiveClient(array("userId"=>$userId,"status"=>1));
		}

		if($result)
		{
			$msg['message'] ="true";
			$msg['result'] =$result;
			$msg['active'] =$active;
		}
		else
		{
			$msg['message'] ="false";
			$msg['result'] ='';
		}
		echo json_encode($msg);
	}

	public function search($id)
	{
    $s = explode("-",$id);


		 if(count($s) == 7)
 		{
 			$industry = $this->common->getrow('practice_areas',array("name"=>str_replace('_',' ',strtolower($s[0]))));
 			$service = $this->common->getrow('services',array("name"=>str_replace('_',' ',strtolower($s[1]))));
 			$country = $this->common->getrow('countries',array("name"=>str_replace('_',' ',strtolower($s[6]))));
 			$state = $this->common->getrow('states',array("name"=>str_replace('_',' ',strtolower($s[5]))));
 			$city = $this->common->getrow('cities',array("name"=>str_replace('_',' ',strtolower($s[4])),"state_id"=>$state->id));


 			if(!empty($industry))
 			{
 			$data['industryId'] = $industry->id;
 			}
 			else
 			{
 				$data['industryId'] = "industry";
 			}

 			if(!empty($service))
 			{
 				$data['serviceId'] = $service->id;

 			}
 			else
 			{
 				$data['serviceId'] = "service";
 			}

 			if(!empty($country))
 			{
 				$data['countryId'] = $country->id;
 			}
 			else
 			{
 				$data['countryId'] = "country";
 			}

			if(!empty($state))
 			{
 				$data['stateId'] = $state->id;
 			}
 			else
 			{
 				$data['stateId'] = "state";
 			}

			if(!empty($city))
 			{
 				$data['cityId'] = $city->id;
 			}
 			else
 			{
 				$data['cityId'] = "city";
 			}

 			$data['state'] = $s[5];
 			$data['city'] = $s[4];

 		}

		else if(count($s) == 6)
		{
			if($s[2] == 'in' && $s[3] != '' && $s[4] != '' && $s[5] != '' )
			{
				$service = $this->common->getrow('services',array("name"=>str_replace('_',' ',strtolower($s[0]))));
				$country = $this->common->getrow('countries',array("name"=>str_replace('_',' ',strtolower($s[5]))));
				$state = $this->common->getrow('states',array("name"=>str_replace('_',' ',strtolower($s[4]))));
				$city = $this->common->getrow('cities',array("name"=>str_replace('_',' ',strtolower($s[3])),"state_id"=>$state->id));

			}
			else
			{
			$industry = $this->common->getrow('practice_areas',array("name"=>str_replace('_',' ',strtolower($s[0]))));
			$service = $this->common->getrow('services',array("name"=>str_replace('_',' ',strtolower($s[1]))));
			$country = $this->common->getrow('countries',array("name"=>str_replace('_',' ',strtolower($s[5]))));
			$state = $this->common->getrow('states',array("name"=>str_replace('_',' ',strtolower($s[4]))));
		  }

			if(!empty($industry))
			{
			$data['industryId'] = $industry->id;
			}
			else
			{
				$data['industryId'] = "industry";
			}

			if(!empty($service))
			{
				$data['serviceId'] = $service->id;
		  }
			else
			{
				$data['serviceId'] = "service";
			}

			if(!empty($country))
			{
				$data['countryId'] = $country->id;
			}
			else
			{
				$data['countryId'] = "country";
			}

			if(!empty($state))
			{
				$data['stateId'] = $state->id;
				$data['state'] = $s[4];

			}
			else
			{
				$data['stateId'] = "state";
				$data['state'] = '';

			}

			if(!empty($city))
 			{
 				$data['cityId'] = $city->id;
				$data['city'] = $s[3];
 			}
 			else
 			{
 				$data['cityId'] = "city";
				$data['city'] = '';
 			}



		}

	else if(count($s) == 5)
		{

			if($s[2] == 'in' && $s[3] != '' && $s[4] != '' )
			{
				$service = $this->common->getrow('services',array("name"=>str_replace('_',' ',strtolower($s[0]))));
				$country = $this->common->getrow('countries',array("name"=>str_replace('_',' ',strtolower($s[4]))));
				$state = $this->common->getrow('states',array("name"=>str_replace('_',' ',strtolower($s[3]))));
				$data['state'] = $s[3];

			}
			else
			{
				$industry = $this->common->getrow('practice_areas',array("name"=>str_replace('_',' ',strtolower($s[0]))));
				$service = $this->common->getrow('services',array("name"=>str_replace('_',' ',strtolower($s[1]))));
				$country = $this->common->getrow('countries',array("name"=>str_replace('_',' ',strtolower($s[4]))));
      }


			if(!empty($industry))
			{
      $data['industryId'] = $industry->id;
			}
			else
			{
				$data['industryId'] = "industry";
    	}
			if(!empty($service))
			{
				$data['serviceId'] = $service->id;

			}
			else
			{
				$data['serviceId'] = "service";
      }

			if(!empty($country))
			{
				$data['countryId'] = $country->id;
      }
			else
			{
				$data['countryId'] = "country";
      }
			if(!empty($state))
			{
				$data['stateId'] = $state->id;
			}
			else
			{
				$data['stateId'] = "state";
			}

			$data['cityId'] = "city";
			$data['city'] = "city";

		}
		else if(count($s) == 4)
		{
			$service = $this->common->getrow('services',array("name"=>str_replace('_',' ',strtolower($s[0]))));
			$country = $this->common->getrow('countries',array("name"=>str_replace('_',' ',strtolower($s[3]))));

		 $data['industryId'] = "industry";

			if(!empty($service))
			{
				$data['serviceId'] = $service->id;
      }
			else
			{
				$data['serviceId'] = "service";
			}

			if(!empty($country))
			{
				$data['countryId'] = $country->id;
			}
			else
			{
				$data['countryId'] = "country";
			}
			$data['state'] = "state";
			$data['stateId'] ='state';
			$data['cityId'] = "city";
			$data['city'] = "city";


		}
		else if(count($s) == 3)
		{

			$industry = $this->common->getrow('practice_areas',array("name"=>str_replace('_',' ',strtolower($s[0]))));
			$service = $this->common->getrow('services',array("name"=>str_replace('_',' ',strtolower($s[1]))));

			if(!empty($industry))
			{
			 $data['industryId'] = $industry->id;
			}
			else
			{
				$data['industryId'] = "industry";
			}

			if(!empty($service))
			{
				$data['serviceId'] = $service->id;
      }
			else
			{
				$data['serviceId'] = "service";
			}

		   $data['countryId'] = "country";
			 $data['state'] = "state";
			 $data['stateId'] ='state';
			 $data['cityId'] = "city";
			 $data['city'] = "city";


		}
		else if(count($s) == 2)
		{
			$service = $this->common->getrow('services',array("name"=>str_replace('_',' ',strtolower($s[0]))));

			if(!empty($service))
			{
				$data['serviceId'] = $service->id;
     	}
			else
			{
				$data['serviceId'] = "service";
			}

				$data['countryId'] = "country";
				$data['industryId'] = "industry";
				$data['state'] = "state";
				$data['stateId'] ='state';
				$data['cityId'] = "city";
				$data['city'] = "city";



		}


		// $data['serviceId'] = $ser;
		// $data['industryId'] = $ind;
		// $data['countryId'] = $count;
		 //$data['state'] = " ";
      // print_r($data);
		  // die;

		$data['content'] = $this->common->getrankingContent($data['serviceId'],$data['industryId'],$data['countryId'],$data['stateId'],$data['cityId']);
		$i = $this->common->getrow('practice_areas',array("id"=>$data['industryId']));
		$s = $this->common->getrow('services',array("id"=>$data['serviceId']));
		$c = $this->common->getrow("countries",array("id"=>$data['countryId']));
		$st = $this->common->getrow("states",array("id"=>$data['stateId']));
		$city = $this->common->getrow("cities",array("id"=>$data['cityId']));

    // echo "<pre>";
		//  print_r($data);
		//  die;


			if(!empty($c))
			{
				$data['country'] = $c->name;
				$data['countrys'] = str_replace(' ', '_',strtolower($c->name));
			}

			if(!empty($st))
			{
				$data['state'] = $st->name;
			}

			if(!empty($s))
			{
				$data['service'] = $s->name;
				$data['services'] = str_replace(' ', '_',strtolower($s->name));
			}

			if(!empty($i))
			{
		   $data['industry'] = $i->name;
			 $data['industrys'] = str_replace(' ', '_',strtolower($i->name));
		  }

		$result = $this->common->profileListingByService($data['serviceId'],$data['industryId'],$data['countryId'],$data['stateId'],$data['cityId']);

		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
				$score1 = 0;
				$result[$key]->services = $this->common->getservices(array("u_id"=>$res->u_id));
				$result[$key]->client = $this->common->getclient(array("uc.freelancerId"=>$res->u_id));
				$result[$key]->industry = $this->common->getindustry(array("u_id"=>$res->u_id));

				$review = $this->common->getoneReview(array("rank.servicesId"=>$data['serviceId'],"r.reviewType"=>'review','rank.userId'=>$res->u_id));
        $star = $this->common->getoneReview(array("rank.servicesId"=>$data['serviceId'],"r.reviewType"=>'overall','rank.userId'=>$res->u_id));
				if(empty($review) && empty($star) )
				{
					$review = $this->common->getoneReviewLinkedIn(array("rank.servicesId"=>$data['serviceId'],"r.reviewType"=>'review','rank.userId'=>$res->u_id));
					$star = $this->common->getoneReviewLinkedIn(array("rank.servicesId"=>$data['serviceId'],"r.reviewType"=>'overall','rank.userId'=>$res->u_id));
				}
				if(empty($review) && empty($star))
				{
					$review = $this->common->getoneReviewgig(array("rank.servicesId"=>$data['serviceId'],"r.reviewType"=>'review','rank.userId'=>$res->u_id));
					$star = $this->common->getoneReviewgig(array("rank.servicesId"=>$data['serviceId'],"r.reviewType"=>'overall','rank.userId'=>$res->u_id));
				}

        $score = $this->common->rankingScoreCount(array("userId"=>$res->u_id,"servicesId"=>$data['serviceId']));
				if(!empty($review))
				{
			 		$result[$key]->review = $review->reviewOverall;
			 		$result[$key]->star = $star->reviewOverall / 2;
			 	}

				if($score->score != 0)
		 	  {
			 	   $score1 = $score->score / $score->reviews;
					 $result[$key]->score = number_format($score1, 2);
			 	}
	 	    else
			 	{
			 	 $result[$key]->score = 0 ;
			 	}

			}
		}

		$scored = array();
		foreach ($result as $key => $row)
		{
			$scored[$key] = $row->score;
		}
		array_multisort($scored, SORT_DESC, $result);

        if(!empty($data['content']) && $data['content']->metaTitle != '' && $data['content']->metaDescription != '' )
				{
					if(count($result) > 0)
					{
					$t = str_replace('{count}',count($result),$data['content']->metaTitle);
					$d = str_replace('{count}',count($result),$data['content']->metaDescription);
				  }
					else
					{
						$t = str_replace('{count}','',$data['content']->metaTitle);
						$d = str_replace('{count}','',$data['content']->metaDescription);

					}
					$t = str_replace('{month}',date('M')."-".date('Y'),$t);
					$d = str_replace('{month}',date('M')."-".date('Y'),$d);

					$data['title'] = $t;
					$data['description'] = $d;
				}
			else
		  {

				if($data['serviceId'] != 'service' && $data['countryId'] == 'country' &&  $data['industryId'] == 'industry' && $data['stateId'] =='state' && $data['cityId'] =='city' )
				{
					if(count($result) > 0)
					{
						$data['title'] = count($result) ." Best ".$s->name." Companies ". date('M')."-".date('Y')." | ".$s->name." Services | TOP SEOS";
					}
					else
					{
						$data['title'] = " Best ".$s->name." Companies ". date('M')."-".date('Y')." | ".$s->name." Services | TOP SEOS";

          }
					$data['description'] = 'Find The Best '.$s->name .' Firms in '. date('M')."-".date('Y').'. Check Reviews / Rankings of leading '.$s->name .' agencies. Get Qualified Leads for your business.';


				}

				else if($data['serviceId'] != 'service' && $data['countryId'] != 'country' && $data['stateId'] == 'state' &&  $data['industryId'] == 'industry' && $data['cityId'] =='city' )
				{
					if(count($result) > 0)
					{
							$data['title'] = count($result) ." Best ".$s->name." Companies In ". $c->name .' '. date('M')."-".date('Y')." | ".$s->name." Services | TOP SEOS";
         	}
					else
					{
						$data['title'] = " Best ".$s->name." Companies In ". $c->name .' '. date('M')."-".date('Y')." | ".$s->name." Services | TOP SEOS";


					}
					$data['description'] = 'Find The Best '.$s->name .' Firms in '. $c->name .' '. date('M')."-".date('Y').'. Check Reviews / Rankings of leading '.$s->name .' agencies. Get Qualified Leads for your business.';

				}

				else if($data['serviceId'] != 'service' && $data['countryId'] != 'country' && $data['stateId'] != 'state' &&  $data['industryId'] == 'industry' && $data['cityId'] =='city' )
				{
          if(count($result) > 0)
					{
					$data['title'] =  count($result) ." Best ".$s->name." Companies In ".$st->name .', '. $c->name .' '. date('M')."-".date('Y')." | ".$s->name." Services";
					}
					else
					{
						$data['title'] = " Best ".$s->name." Companies In ".$st->name .', '. $c->name .' '. date('M')."-".date('Y')." | ".$s->name." Services | TOP SEOS";
					 }
					 $data['description'] = 'Find The Best '.$s->name .' Firms in '.$st->name .', '. $c->name .' '. date('M')."-".date('Y').'. Check Reviews / Rankings of leading '.$s->name .' agencies. Get Qualified Leads for your business.';

				}

				else if($data['industryId'] != 'industry' && $data['serviceId'] == 'services' && $data['countryId'] =='country' && $data['stateId'] == 'state' && $data['cityId'] =='city' )
				{
					if(count($result) > 0)
					{
							$data['title'] = count($result) ." Best ".$i->name." Companies In ". date('M')."-".date('Y')." | ".$i->name." Services | TOP SEOS";
           }
					 else
					 {
						 	$data['title'] = " Best ".$i->name." Companies In ". date('M')."-".date('Y')." | ".$i->name." Services | TOP SEOS";

					 }
					 $data['description'] = 'Find The Best '.$i->name .' Firms in '. date('M')."-".date('Y').'. Check Reviews / Rankings of leading '.$i->name .' agencies. Get Qualified Leads for your business.';

		    }

				else if($data['serviceId'] != 'service' && $data['industryId'] != 'industry' && $data['countryId'] =='country' && $data['stateId'] == 'state' && $data['cityId'] =='city')
				{
					if(count($result) > 0)
					{
							$data['title'] = count($result) ." Best ".$i->name.' ' .$s->name." Companies In ". date('M')."-".date('Y')." | ".$i->name.' ' .$s->name." Services | TOP SEOS";
           }
					else
					{
					   	$data['title'] = " Best ".$i->name.' ' .$s->name." Companies In ". date('M')."-".date('Y')." | ".$i->name.' ' .$s->name." Services | TOP SEOS";
				  }
					$data['description'] = 'Find The Best '.$i->name .' '.$s->name .' Firms in '. date('M')."-".date('Y').'. Check Reviews / Rankings of leading '.$i->name .' '.$s->name .' agencies. Get Qualified Leads for your business.';

				}

				else if($data['serviceId'] != 'service' && $data['industryId'] != 'industry' && $data['countryId'] !='country' && $data['stateId'] == 'state' && $data['cityId'] =='city')
				{
					if(count($result) > 0)
					{
							$data['title'] = count($result) ." Best ".$i->name.' ' .$s->name." Companies In ". $c->name .' '. date('M')."-".date('Y')." | ".$i->name.' ' .$s->name." Services | TOP SEOS";
					}
					else
					{
					  	$data['title'] = " Best ".$i->name.' ' .$s->name." Companies In ". $c->name .' '. date('M')."-".date('Y')." | ".$i->name.' ' .$s->name." Services | TOP SEOS";
				  }
					$data['description'] = 'Find The Best '.$i->name .' '.$s->name .' Firms in '. $c->name .' '. date('M')."-".date('Y').'. Check Reviews / Rankings of leading '.$i->name .' '.$s->name .' agencies. Get Qualified Leads for your business.';

				}
				else if($data['serviceId'] != 'service' && $data['industryId'] != 'industry' && $data['countryId'] !='country' && $data['stateId'] != 'state' &&  $data['cityId'] =='city')
				{

					if(count($result) > 0)
					{
							$data['title'] = count($result) ." Best ".$i->name.' ' .$s->name." Companies In ".$st->name .', '. $c->name .' '. date('M')."-".date('Y')." | ".$i->name.' ' .$s->name." Services | TOP SEOS";
          }
					else
					{
					   	$data['title'] = " Best ".$i->name.' ' .$s->name." Companies In ".$st->name .', '. $c->name .' '. date('M')."-".date('Y')." | ".$i->name.' ' .$s->name." Services | TOP SEOS";
				  }
					$data['description'] = 'Find The Best '.$i->name .' '.$s->name .' Firms in '.$st->name .', '. $c->name .' '. date('M')."-".date('Y').'. Check Reviews / Rankings of leading '.$i->name .' '.$s->name .' agencies. Get Qualified Leads for your business.';

				}

				else if($data['serviceId'] != 'service' && $data['industryId'] != 'industry' && $data['countryId'] !='country' && $data['stateId'] != 'state' && $data['cityId'] !='city')
				{

					if(count($result) > 0)
					{
					$data['title'] =  count($result) ." Best ".$i->name.' ' .$s->name." Companies In ".$city->name .', '.$st->name .', '. $c->name .' '. date('M')."-".date('Y')." | ".$s->name." Services";
					}
					else
					{
						$data['title'] = " Best ".$i->name.' ' .$s->name." Companies In ".$city->name .', '.$st->name .', '. $c->name .' '. date('M')."-".date('Y')." | ".$i->name.' ' .$s->name." Services | TOP SEOS";
					 }
					 $data['description'] = 'Find The Best '.$i->name .' '.$s->name .' Firms in '.$city->name .', '.$st->name .', '. $c->name .' '. date('M')."-".date('Y').'. Check Reviews / Rankings of leading '.$i->name .' '.$s->name .' agencies. Get Qualified Leads for your business.';

				}
				else if($data['serviceId'] != 'service' && $data['industryId'] == 'industry' && $data['countryId'] !='country' && $data['stateId'] != 'state' && $data['cityId'] !='city')
				{

					if(count($result) > 0)
					{
					$data['title'] =  count($result) ." Best ".$s->name." Companies In ".$city->name .', '.$st->name .', '. $c->name .' '. date('M')."-".date('Y')." | ".$s->name." Services";
					}
					else
					{
						$data['title'] = " Best ".$s->name." Companies In ".$city->name .', '.$st->name .', '. $c->name .' '. date('M')."-".date('Y')." | ".$s->name." Services | TOP SEOS";
					 }
					 $data['description'] = 'Find The Best '.$s->name .' Firms in '.$city->name .', '.$st->name .', '. $c->name .' '. date('M')."-".date('Y').'. Check Reviews / Rankings of leading '.$s->name .' agencies. Get Qualified Leads for your business.';

				}
			}

			if(!empty($data['content']->heading))
			{
				if(count($result) > 0)
				{
				$h = str_replace('{count}',count($result),$data['content']->heading);
				}
				else
				{
				$h = str_replace('{count}','',$data['content']->heading);
        }
				$h = str_replace('{month}',date('M')."-".date('Y'),$h);

				$data['content']->heading = $h;

			}
// jjj
		$data['result'] = $result;

		$this->load->view('front/header',$data);
		$this->load->view('front/profile_listing');
		$this->load->view('front/footer');
	}


	public function profile_listing()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$serviceId = $results->serviceId;
		$industryId = $results->industryId;
		$countryId = $results->countryId;

		$result = $this->common->profileListingByService($serviceId,$industryId,$countryId);

		foreach($result as $key=>$res)
		{
			$result[$key]->services = $this->common->getservices(array("u_id"=>$res->u_id));
			$result[$key]->industry = $this->common->getindustry(array("u_id"=>$res->u_id));
			$result[$key]->client = $this->common->getclient(array("uc.freelancerId"=>$res->u_id));

			$tscore = $this->common->getServiceScore(array("userId"=>$res->u_id),$serviceId,$industryId,$countryId);

			if($tscore->count != 0)
			{
				$result[$key]->score = $tscore->total / $tscore->count;
			}
			else
			{
				$result[$key]->score = 0;
			}
		}

		$s = array();
		foreach ($result as $key => $row)
		{
			$s[$key] = $row->score;
		}
		array_multisort($s, SORT_DESC, $result);

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
	}



	public function request_save()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		$id = $results->u_id;
		$type = $results->type;

		unset($results->type);
		unset($results->u_id);

		$detail['userdetail'] = $this->common->getprofile(array("u_id"=>$id));
		$detail['data'] = $results;
		if($type == "quote")
		{
			$detail['service'] = $this->common->getrow('services',array("id"=>$results->serviceId));
			$message = $this->load->view('email/requestquote',$detail,true);

			$this->mailsend('Top-SEOs Notification',$detail['userdetail']->email,$message);
		}
		else if($type == "call")
		{
			$detail['service'] = $this->common->getrow('services',array("id"=>$results->serviceId));
			$message = $this->load->view('email/requestcall',$detail,true);
			$this->mailsend('Top-SEOs Notification',$detail['userdetail']->email,$message);
		}
		else if($type == "visit")
		{

			$message = $this->load->view('email/schedulevisit',$detail,true);
			$this->mailsend('Top-SEOs Notification',$detail['userdetail']->email,$message);
		}

		$data = array(
			'u_id'	=>$id,
			'req_type' =>$type,
			'req_detail' => serialize($results),
			'date_created' =>$date,
		);

		$insert = $this->common->insert("requests",$data);

		if($insert)
		{
			$result['message'] = 'true';
		}
		else
		{
			$result['message'] = 'false';
		}
		echo json_encode($result);
	}

	public function getcurrentjobs()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;
		$page = $results->page;


		if(!empty($userId))
		{

			$data['pcount'] = $this->common->count_all_results('user_jobcontract',array("freelancerId"=>$userId,"contractStatus"=>'1'));
			$config["total_rows"] = $this->common->count_all_results('user_jobcontract',array("freelancerId"=>$userId,"contractStatus"=>'1'));

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

			$jobs = $this->common->getCurrentjobs(array("jc.freelancerId"=>$userId),$start,$config["per_page"],array("contractStatus"=>1));

		}
		// echo "<pre>";
		// print_r($jobs);
		// die;
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



	public function getendedContract()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;
		$page = $results->page;


		if(!empty($page))
		{

			$data['pcount'] = $this->common->count_all_results('user_jobcontract',array("freelancerId"=>$userId,"contractStatus"=>'2'));
			$config["total_rows"] = $this->common->count_all_results('user_jobcontract',array("freelancerId"=>$userId,"contractStatus"=>'2'));

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
			if(!empty($userId))
			{
				$jobs = $this->common->getCurrentjobs(array("jc.freelancerId"=>$userId,"contractStatus"=>'2'),$start,$config["per_page"]);
			}
		}

    if(!empty($jobs))
		{
		foreach($jobs as $key=>$j)
		{
			$feeds =	$this->common->getrow('user_review',array("contractId"=>$j->contractId,"reviewTo"=>$userId,"reviewType"=>"star"));
			$review =	$this->common->getrow('user_review',array("contractId"=>$j->contractId,"reviewTo"=>$userId,"reviewType"=>"review"));
			$jobs[$key]->rating ='';
			$jobs[$key]->feedback ='';
			if(!empty($feeds))
			{
				$jobs[$key]->rating = $feeds->reviewOverall;
			}
      if(!empty($review))
			{
			$jobs[$key]->feedback = $review->reviewOverall;
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
		exit;
	}

	public function searchfilter($ser)
	{

		$service = $this->common->getrow('services',array("name"=>str_replace('-',' ',strtolower($ser))));
		if(!empty($service))
		{
      $serviceId = $service->id;
	  }
		else
		{
			$service = $this->common->getrow('hire_ranking_content',array("url"=>str_replace('-',' ',strtolower($ser))));
			$serviceId = $service->servicesId;
		}

		$hourly = '';
		$sort = '';
		$data['serviceId'] = $serviceId;
		$service = $this->common->getrow('services',array("id"=>$serviceId));
		$contentdata = $this->common->getrow('hire_ranking_content',array("servicesId"=>$serviceId));
		if(!empty($contentdata))
		{
			$data['title'] = $contentdata->metaTitle;
			$data['description'] = $contentdata->metaDescription;
			$data['content'] = $contentdata->description;
		}
		else
		{
			$data['title'] = "Hire ".$service->name." freelancer ";
			$data['description'] = "Hire ".$service->name." freelancer ";
			$data['content'] = '';
		}

		$result = $this->common->searchByService($serviceId,$hourly,$sort);
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		if(!empty($result))
		{
			$totalearning = 0;
			$t = 0;
			$score = 0;
			$jobs =0;
			$countreview =0;

			foreach($result as $key=>$res)
			{
				if($res->parent != 0)
				{
					$clogo = $this->common->getSingleUser(array("us.id"=>$res->parent));
					$result[$key]->company_logo = $clogo->company_logo;
					$result[$key]->score = $clogo->successScore;
					$result[$key]->rating = $clogo->rating;
					$result[$key]->company_link = $clogo->c_name;
				}

				$time = strtotime($date) - strtotime($res->timeStamp);
				if($time > 20)
				{
					$result[$key]->online ="0";
				}
				else
				{
					$result[$key]->online ="1";
				}

				$total_rating = 0;
				$data1 = $this->common->getjobSuccess(array("jc.freelancerId"=>$res->u_id));
				$amount = $this->common->gettoprated(array("jc.freelancerId"=>$res->u_id));

				$rating = $this->common->countTotalReview(array("reviewTo"=>$res->u_id));
				$countreview = $this->common->countReviewproject('user_review',array("reviewTo"=>$res->u_id));

				if(!empty($amount))
				{
					foreach($amount as $am)
					{
						$totalearning =+ $am->contractAmount;
					}
				}

				if(!empty($data1->jobs))
				{
					$jobs = $data1->jobs;
				}

				if(!empty($data->reviewOverall))
				{
					$t = $data->reviewOverall;
				}

				$result[$key]->jobcount = $jobs;
				$result[$key]->totalearning = $totalearning;
			}
		}

		$data['result'] = $result;

		$this->load->view('front/header',$data);
		$this->load->view('front/search_filter');
		$this->load->view('front/footer');

	}


	public function getjobSuccess()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		$totalearning = 0;
		$t = 0;
		$score = 0;
		$jobs =0;

		$data = $this->common->getjobSuccess(array("jc.freelancerId"=>$userId));
		$amount = $this->common->gettoprated(array("jc.freelancerId"=>$userId));
		$score = $this->common->getrow('user',array('id'=>$userId));


		if(!empty($amount))
		{
			foreach($amount as $am)
			{
				$totalearning =+ $am->contractAmount;
			}
		}

		if(!empty($data))
		{
			$jobs = $data[0]->jobs;
		}

		$msg['score'] = $score->successScore;
		$msg['jobcount'] = $jobs;
		$msg['totalearning'] = $totalearning;


		if(!empty($score->successScore))
		{
			$msg1['message'] = "true";
			$msg1['result'] = $msg;
		}
		else
		{
			$msg1['message'] = "false";
		}

		echo json_encode($msg1);
		exit;
	}


	public function clientProfile($id)
	{
		$a = explode("-",$id);
		$c = count($a);
		$id = $a[$c-1];
		$data['clientId'] = $id;
		$this->load->view('front/header');
		$this->load->view('front/client-profile',$data);
		$this->load->view('front/footer');

	}

	public function getClientprofile()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->getSingleUser(array("us.id"=>$userId));

			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			if(!empty($result))
			{
				$time = strtotime($date) - strtotime($result->timeStamp);
				if($time > 20)
				{
					$result->online ="0";
				}
				else
				{
					$result->online ="1";
				}

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

	public function getclientfreelancer()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->getfreelancer(array("uc.clientId"=>$userId));
		}

		if($result)
		{
			$msg['message'] ="true";
			$msg['result'] =$result;
		}
		else
		{
			$msg['message'] ="false";
			$msg['result'] ='';
		}
		echo json_encode($msg);
	}

	public function getActiveProjects()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		if(isset($userId))
		{
			$result = $this->common->get('user_jobcontract',array("clientId"=>$userId));
		}

		if($result)
		{
			$msg['message'] ="true";
			$msg['result'] =$result;
		}
		else
		{
			$msg['message'] ="false";
			$msg['result'] ='';
		}
		echo json_encode($msg);
	}

	public function getclientscore()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->getrow('user',array("id"=>$results->userId));


		$msg['score'] = $result->successScore;
		$msg['jobcount'] = $result->jobs;
		$msg['totalearning'] = $result->earning;


		if($msg)
		{
			$msg1['message'] = "true";
			$msg1['result'] = $msg;
		}
		else
		{
			$msg1['message'] = "false";
		}

		echo json_encode($msg1);
		exit;
	}

	public function clientcurrentjobs()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;
		$page = $results->page;


		if(!empty($page))
		{

			$data['pcount'] = $this->common->count_all_results('user_jobcontract',array("clientId"=>$userId,"contractStatus"=>'1'));
			$config["total_rows"] = $this->common->count_all_results('user_jobcontract',array("clientId"=>$userId,"contractStatus"=>'1'));

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

			$jobs = $this->common->getCurrentjobs(array("jc.clientId"=>$userId),$start,$config["per_page"],array("contractStatus"=>1));

		}
		// echo "<pre>";
		// print_r($jobs);
		// die;
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




	public function clientendedContract()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;
		$page = $results->page;


		if(!empty($userId))
		{

			$data['pcount'] = $this->common->count_all_results('user_jobcontract',array("clientId"=>$userId,"contractStatus"=>'2'));
			$config["total_rows"] = $this->common->count_all_results('user_jobcontract',array("clientId"=>$userId,"contractStatus"=>'2'));

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
			if(!empty($userId))
			{
				$jobs = $this->common->getCurrentjobs(array("jc.clientId"=>$userId,"contractStatus"=>'2'),$start,$config["per_page"]);
			}
		}

   if(!empty($jobs))
	 {
		foreach($jobs as $key=>$j)
		{
			$feeds =	$this->common->getrow('user_review',array("contractId"=>$j->contractId,"reviewType"=>"review","reviewTo"=>$userId));
			$totalrating =	$this->common->getrow('user_review',array("contractId"=>$j->contractId,"reviewType"=>"star","reviewTo"=>$userId));

			   if(!empty($feed))
				 {
					 $jobs[$key]->feedback = $feed->reviewOverall;
				 }
				 else
				 {
					 $jobs[$key]->feedback = '';
				 }
				 if(!empty($totalrating))
				 {
						$jobs[$key]->rating = $totalrating->reviewOverall;
				 }
				 else
				 {
					 $jobs[$key]->rating = 0;
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


	public function clientspend()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;
		$total = 0;
		if($userId)
		{
			$results = $this->common->get('user_jobcontract',array("clientId"=>$userId,'contractStatus'=> 2));

			foreach($results as $res)
			{
				$total += $res->contractAmount;
			}
		}

		if($results)
		{
			$msg['message'] = "true";
			$msg['result'] = $total;
		}
		else
		{
			$msg['message'] = "true";
			$msg['result'] = $results;
		}

		echo json_encode($msg);
		exit;

	}

	public function freelancerEarning()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;
		$total = 0;
		$localcurrency ='';
		if($userId)
		{
			// $results = $this->common->SumEarning(array("userId"=>$userId));
			$results = $this->common->sum_income_paid_amount(array("userId"=>$userId));
			$currency = $this->common->getuserlocalcurrency(array("userId"=>$userId));
			$total = $results->total;
			if(!empty($currency))
			{
			$localcurrency = $currency->code.' '.$currency->symbol;
		  }
		}


		if($total)
		{
			$msg['message'] = "true";
			$msg['result'] = round($total);
			$msg['localcurrency'] = $localcurrency;
		}
		else
		{
			$msg['message'] = "false";
			$msg['result'] = '';
		}

		echo json_encode($msg);
		exit;

	}

	public function paypal_redirect()
	{
		if(isset($this->session->userdata['clientloggedin']['type']))
		{
			if($this->session->userdata['clientloggedin']['type'] == '2' || $this->session->userdata['clientloggedin']['type'] == '3' )
			{
				redirect('freelancer/membership');
			}
			else if($this->session->userdata['clientloggedin']['type'] == '4')
			{
				redirect('client-payment');
			}
     }
		else
		{
			redirect('login');
		}
	}

	public function singleJob($id)
	{
		$a = explode("-",$id);
		$c = count($a);
		$id = $a[$c-1];
		$data1['jobId'] = $id;


		$result = $this->common->getrow('user_job',array("jobId"=>$id));
		$result->skill = $this->common->getjobskill(array("us.jobid"=>$id));
		$result->proposal = $this->common->count_all_results('user_job_proposal',array("jobId"=>$id));
		$currency = $this->common->getrow('currency',array("id"=>$result->currencyId));


		$t['title'] = $result->jobTitle;
		$t['description'] = strip_tags(substr($result->jobTitle, 0, 100));


		if(!empty($currency))
		{
		$result->currencycode = $currency->code;
		$result->currencysymbol = $currency->symbol;
	  }

		$client = $this->common->getjobpostClient(array("jobId"=>$id));
		$c = $this->common->getrow('countries',array("id"=>$client->country));
		$result->hirefreelancer =  $this->common->count_all_results('user_jobcontract',array("jobId"=>$id));
		if(!empty($c))
		{
			$client->country = $c->name;
		}
		$total = 0;

		if($client->u_id)
		{
			$spend = $results = $this->common->SumEarning(array("userId"=>$client->u_id));
			if($spend->total != '')
			{
				$client->spend = round($spend->total);
			}
			else
			{
				$client->spend = 0;
			}
		}

		$total = 0;
		$data = $this->common->getclientjobSuccess(array("jc.clientId"=>$client->u_id));


		if(!empty($data->reviewOverall))
		{

			$total = $data->reviewOverall;
			$client->review = $total / $data->jobs;

		}

		$client->project = $this->common->count_all_results('user_jobcontract',array("clientId"=>$client->u_id));
		$payment = $this->common->getrow('user_account',array("u_id"=>$client->u_id));
		if(!empty($payment))
		{
			$client->payment = 1;
		}
		else
		{
			$client->payment = 0;
		}

		$data1['result'] = $result;
		$data1['client'] = $client;


		$this->load->view('front/header',$t);
		$this->load->view('front/jobdetail',$data1);
		$this->load->view('front/footer');
	}

	public function getjobdetail()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		$result = $this->common->getrow('user_job',array("jobId"=>$results->jobId));
		$result->skill = $this->common->getjobskill(array("us.jobid"=>$results->jobId));
		$result->proposal = $this->common->count_all_results('user_job_proposal',array("jobId"=>$results->jobId));
		$currency = $this->common->getrow('currency',array("id"=>$result->currencyId));

		if(!empty($currency))
		{
		$result->currencycode = $currency->code;
		$result->currencysymbol = $currency->symbol;
	  }

		if($result->jobExpire < $date )
		{
			$result->expired = 1;
		}
		else
		{
			$result->expired = 0;

		}

		$client = $this->common->getjobpostClient(array("jobId"=>$results->jobId));
		$c = $this->common->getrow('countries',array("id"=>$client->country));
		$result->hirefreelancer =  $this->common->count_all_results('user_jobcontract',array("jobId"=>$result->jobId));
		if(!empty($c))
		{
			$client->country = $c->name;
		}
		$total = 0;

		if($client->u_id)
		{
			$spend = $this->common->clientSpendAmount(array("clientId"=>$client->u_id,'contractStatus'=> 2));

			if($spend->total != '')
			{
				$client->spend = $spend->total;
			}
			else
			{
				$client->spend = 0;
			}

		}

		$t = 0;
		$data = $this->common->getclientjobSuccess(array("jc.clientId"=>$client->u_id));


		if(!empty($data->reviewOverall))
		{

			$t = $data->reviewOverall;
			$client->review = $t / $data->jobs;
			$client->review = round($client->review , 2);

		}



		$client->project = $this->common->count_all_results('user_jobcontract',array("clientId"=>$client->u_id));
		$payment = $this->common->getrow('user_account',array("u_id"=>$client->u_id));
		if(!empty($payment))
		{
			$client->payment = 1;
		}
		else
		{
			$client->payment = 0;
		}

		if($result)
		{
			$msg['message'] ="true";
			$msg['result'] = $result;
			$msg['client'] = $client;
		}
		else
		{
			$msg['message'] ="false";
			$msg['result'] ="";
		}

		echo json_encode($msg);
		exit;
	}

	public function proposalAttachment()
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


		if($mime_type =="image/png")
		{
			echo $image = $name;
			$image = file_put_contents('assets/proposal/'.$image,$data1);
		}
		else if($mime_type =="image/jpeg")
		{
			echo $image= $name;
			$result=file_put_contents('assets/proposal/'.$image,$data1);
		}
		else if($mime_type =="application/pdf")
		{
			echo $image = $name;
			$result=file_put_contents('assets/proposal/'.$image,$data1);
		}
		else if($mime_type == "text/plain")
		{
			echo $image = $name;
			$result=file_put_contents('assets/proposal/'.$image,$data1);
		}
		else if($mime_type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
		{
			echo	 $image = $name;
			$result=file_put_contents('assets/proposal/'.$image,$data1);
		}
		exit;

	}

	public function proposalSubmit()
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
		$results->proposalDate = $date ;
		$proposal = $this->common->insert('user_job_proposal',$results);

		if($proposal[0] == 1)
		{
			if(!empty($milestones[0]->title))
			{
				$this->common->insert('user_job_proposal_milestones',array("jobId"=>$results->jobId,"proposalId"=>$proposal[1],"milestones"=>serialize($milestones)));
			}
		}

		if($proposal[0] == 1)
		{
			$job = $this->common->getrow('user_job',array("jobId"=>$results->jobId));
			$offer = $this->common->getrow('user_joboffer',array("jobId"=>$results->jobId));
			$usermeta = $this->common->getSingleUser(array("us.id"=>$results->u_id));
			if($usermeta->type == 2)
			{
				$m = $usermeta->c_name." applied for ".$job->jobTitle;
			}
			else if($usermeta->type == 3)
			{
				$m = $usermeta->name." applied for ".$job->jobTitle;
			}

			$a['notificationTo'] = $offer->offFrom;
      $lastrecord = $this->common->getone('user_notification','notificationId','Desc');
      $lastId = $lastrecord->notificationId;
      $lastId = $lastId + 1;
      $main = base_urL().'client-job-proposal/'.$results->jobId;
      $a['notificationFrom'] = $results->u_id;
      $a['notificationStatus'] = 0;
      $a['notificationType'] = "proposal";
      $a['notificationMessage'] = "You have a new notification of <b>leave</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
      $a['notificationDate'] = $date;
      $this->notificationSave($a);
		}

		if($proposal)
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

	public function proposalCheck()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

		if($user)
		{
			if($user->parent != 0)
			{
				$userId = $user->parent;
			}
			else
			{
				$userId = $this->session->userdata['clientloggedin']['id'];
			}
		}

		$proposal = $this->common->count_all_results('user_job_proposal',array("u_id"=>$userId,"jobId"=>$results->jobId));

		if($proposal)
		{
			$msg['message'] ="true";
			$msg['result'] = $proposal;
		}
		else
		{
			$msg['message'] ="false";
			$msg['result']="";
		}
		echo json_encode($msg);
		exit;
	}


		public function getClientOpenJob()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$userId = $results->userId;

		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');
		if(!empty($userId))
		{
			$jobs = $this->common->getClientOpenedJobs(array("offFrom"=>$userId,"offTo"=>0),$date);
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

	public function find_work()
	{
		if(isset($this->session->userdata['clientloggedin']['id']))
		{
			$user = $this->common->getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));
			if($user->access == 3 || $user->access == 4)
			{
				redirect('/');
			}
		}
		$data['title'] = "Freelancer Jobs | Freelance Work | Freelance Projects";
		$data['description'] = "Find Freelance Jobs & Freelance Work Projects. 1000's of Freelance jobs. Top SEOs is here to help you have a better job search experience. Earn money and work with high quality customers.";
		$this->load->view('front/header',$data);
		$this->load->view('front/find_work');
		$this->load->view('front/footer');

	}

	public function getfindWorks()
	{

		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$page = $results->page;


		if(!empty($page))
		{
			$data['pcount'] = $this->common->count_all_results('user_joboffer',array("offTo"=>0));
			$config["total_rows"] = $this->common->count_all_results('user_joboffer',array("offTo"=>0));
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
			$jobs = $this->common->getfindworksJobs($start,$config["per_page"]);
			// $jobs = $this->common->getfindworksJobs(array("offTo"=>0),$start,$config["per_page"]);
		}

		if(!empty($jobs))
		{
			foreach($jobs as $key=>$job)
			{
				$c = $this->common->getrow('currency',array("id"=>$job->currencyId));

				if(!empty($c))
				{
					$jobs[$key]->currencycode = $c->code;
					$jobs[$key]->currencysymbol = $c->symbol;
				}

				$jobs[$key]->skill = $this->common->getjobskill(array("us.jobId"=>$job->jobId));
				$jobs[$key]->proposal = $this->common->count_all_results('user_job_proposal',array("jobId"=>$job->jobId));
				$pa = $this->common->getrow('user_account',array("u_id"=>$job->u_id));
				if(!empty($pa))
				{
					$jobs[$key]->payment = 1;
				}
				else
				{
					$jobs[$key]->payment = 0;
				}

				$spend = $this->common->clientSpendAmount(array("clientId"=>$job->u_id,'contractStatus'=> 2));

				if($spend->total != '')
				{
					$jobs[$key]->spend = $spend->total;
				}
				else
				{
					$jobs[$key]->spend = 0;
				}
				$clientreview = $this->common->getrow('user',array("id"=>$job->u_id));
				$jobs[$key]->review = $clientreview->rating;
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

	public function FreelancerSuccessScoreUpdate()
	{
		$result =  $this->common->getOnlyFreelancer();
  	if(!empty($result))
		{
			$totalearning = 0;
			$t1 = 0;
			$score = 0;
			$jobs =0;
			$countreview =0;
			$total_rating = 0;
			$rate = 0;


			foreach($result as $key=>$res)
			{
				 $gigscore = 0;
				 $gigcount = 0;
				 $contactscore = 0;
				 $contactcount = 0;
				 $linkedlnscore = 0;
				 $linkedlncount = 0;
				 //

				$data1 = $this->common->getjobSuccess(array("re.reviewTo"=>$res->id,"jc.freelancerId"=>$res->id));
				$data2 =  $this->common->getlinkedreviewSuccess(array("re.reviewTo"=>$res->id));
				$data3 =  $this->common->getgigSuccess(array("re.reviewTo"=>$res->id,"b.userId"=>$res->id));
				$amount = $this->common->gettoprated(array("jc.freelancerId"=>$res->id));
				$rating = $this->common->countTotalReview(array("reviewTo"=>$res->id));
				$countreview = $this->common->countReviewproject1(array("reviewTo"=>$res->id));
        $result[$key]->gig = $data3;
        $result[$key]->contract = $data1;
				if(!empty($data3))
				{
					foreach($data3 as $d3)
					{
						$gigscore += $d3->reviewOverall;
						$gigcount = $d3->jobs;
					}
				}



				if(!empty($data2))
				{
					foreach($data2 as $d2)
					{
						$linkedlnscore += $d2->reviewOverall;
						$linkedlncount = $d2->jobs;
					}
				}

				if(!empty($data1))
				{
					foreach($data1 as $d1)
					{
						$contactscore += $d1->reviewOverall;
						$contactcount += $d1->jobs;
					}
				}

				if(!empty($rating->total) && $countreview != 0)
				{
					$rate = $rating->total / $countreview / 2;
				}
				else
				{
				 	$rate = 0;
				}

				// if(!empty($amount))
				// {
				// 	foreach($amount as $am)
				// 	{
				// 		$totalearning =+ $am->contractAmount;
				// 	}
				// }
				// else
				// {
				// 	$totalearning = 0;
				// }


					$totalscore = $gigscore + $contactscore + $linkedlnscore ;
					$totalreviews = $contactcount + $linkedlncount + $gigcount;
					$result[$key]->totalscore = $totalscore;
					$result[$key]->contactscore = $contactscore;
					$result[$key]->totalreviews = $totalreviews;
					$result[$key]->countco = $contactcount;

					if($totalscore != 0 && $totalreviews != 0)
					{
					$score = $totalscore / $totalreviews;
				  }
					else
					{
					 $score = 0;
					}

					$jobs = $contactcount + $gigcount;


				$success = $this->common->update(array("id"=>$res->id),array("successScore"=>$score,"rating"=>$rate,"jobs"=>$jobs,"earning"=>$totalearning),'user');
			}
		}




		 if($success)
	   {
		 	echo "done";
		 }
	}
	// public function FreelancerSuccessScoreUpdate()
	// {
	// 	$result =  $this->common->getOnlyFreelancer();
  // 	if(!empty($result))
	// 	{
	// 		$totalearning = 0;
	// 		$t1 = 0;
	// 		$score = 0;
	// 		$jobs =0;
	// 		$countreview =0;
	// 		$total_rating = 0;
	// 		$rate = 0;
	//
	//
	// 		foreach($result as $key=>$res)
	// 		{
	// 			 $gigscore = 0;
	// 			 $gigcount = 0;
	// 			 $contactscore = 0;
	// 			 $contactcount = 0;
	// 			 $linkedlnscore = 0;
	// 			 $linkedlncount = 0;
	//
	// 			$data1 = $this->common->getjobSuccess(array("jc.freelancerId"=>$res->id));
	// 			$data2 =  $this->common->getlinkedreviewSuccess(array("re.reviewTo"=>$res->id));
	// 			$data3 =  $this->common->getgigSuccess(array("re.reviewTo"=>$res->id));
	// 			$amount = $this->common->gettoprated(array("jc.freelancerId"=>$res->id));
	// 			$rating = $this->common->countTotalReview(array("reviewTo"=>$res->id));
	// 			$countreview = $this->common->countReviewproject1(array("reviewTo"=>$res->id));
	//
	// 			if(!empty($data3))
	// 			{
	// 				foreach($data3 as $d3)
	// 				{
	// 					$gigscore += $data3->reviewOverall;
	// 					$gigcount = $data3->jobs;
	// 				}
	// 			}
	// 			if(!empty($data2))
	// 			{
	// 				foreach($data2 as $d2)
	// 				{
	// 					$linkedlnscore += $d2->reviewOverall;
	// 					$linkedlncount = $d2->jobs;
	// 				}
	// 			}
	//
	// 			if(!empty($data1))
	// 			{
	// 				foreach($data1 as $d1)
	// 				{
	// 					$contactscore += $d1->reviewOverall;
	// 					$contactcount = $d1->jobs;
	// 				}
	// 			}
	//
	// 			if(!empty($rating->total) && $countreview != 0)
	// 			{
	// 				$rate = $rating->total / $countreview / 2;
	// 			}
	// 			else
	// 			{
	// 			 	$rate = 0;
	// 			}
	//
	// 			if(!empty($amount))
	// 			{
	// 				foreach($amount as $am)
	// 				{
	// 					$totalearning =+ $am->contractAmount;
	// 				}
	// 			}
	// 			else
	// 			{
	// 				$totalearning = 0;
	// 			}
	//
	// 			if(!empty($data1) && empty($data2) && empty($data3))
	// 			{
	// 				$score = $data1->reviewOverall  / $data1->jobs ;
	// 				$jobs = $data1->jobs;
	// 			}
	// 			else if(!empty($data1) && !empty($data2) && !empty($data3))
	// 			{
	// 				$score = $data1->reviewOverall + $data2->reviewOverall + $data3->reviewOverall / $data1->jobs + $data2->jobs + $data3->jobs  ;
	// 				$jobs = $data1->jobs + $data2->jobs + $data3->jobs;
	// 			}
	// 			else if(empty($data1) && !empty($data2) && !empty($data3))
	// 			{
	// 				$score =  $data2->reviewOverall + $data2->reviewOverall / $data2->jobs + $data3->jobs;
	// 				$jobs =  $data2->jobs + $data3->jobs;
	// 			}
	// 			else if(!empty($data1) && empty($data2) && !empty($data3))
	// 			{
	// 				$score = $data1->reviewOverall  + $data3->reviewOverall / $data1->jobs +  $data3->jobs;
	// 				$jobs = $data1->jobs + $data2->jobs + $data3->jobs;
	// 			}
	// 			else if(empty($data1) && !empty($data2) && empty($data3))
	// 			{
	// 				$score = $data2->reviewOverall  / $data2->jobs ;
	// 				$jobs = $data2->jobs ;
	// 			}
	// 			else if(empty($data1) && empty($data2) && !empty($data3))
	// 			{
	// 				$score = $data3->reviewOverall  / $data3->jobs ;
	// 				$jobs = $data3->jobs ;
	// 			}
	// 			else
	// 			{
	// 				$score = 0;
	// 				$jobs = 0;
	// 			}
	// 			$result[$key]->score = $score;
	// 			$result[$key]->jobs = $jobs;
	// 			//$success = $this->common->update(array("id"=>$res->id),array("successScore"=>$score,"rating"=>$rate,"jobs"=>$jobs,"earning"=>$totalearning),'user');
	// 		}
	// 	}
  //   echo "<pre>";
	// 	print_r($result);
	// 	die;
	//
	// 	//
	// 	// if($success)
	// 	// {
	// 	// 	echo "done";
	// 	// }
	// }

	public function ClientSuccessScoreUpdate()
	{
		$totalearning = 0;
		$t = 0;
		$score = 0;
		$jobs =0;
		$rate = 0;

		$clients = $this->common->getOnlyClient();

		foreach($clients as $client)
		{

			$amount = $this->common->gettoprated(array("jc.clientId"=>$client->id));
			$data = $this->common->getclientjobSuccess(array("jc.clientId"=>$client->id));
			$rating = $this->common->countTotalReview(array("reviewTo"=>$client->id));
			$countreview = $this->common->countReviewproject('user_review',array("reviewTo"=>$client->id));



			if(!empty($rating->total) && $countreview != 0)
			{
				$rate = $rating->total / $countreview / 2;
			}
			else
			{
				$rate = 0;
			}

			if(!empty($amount))
			{
				foreach($amount as $am)
				{
					$totalearning =+ $am->contractAmount;
				}
			}
			else
			{
				$totalearning = 0;
			}

			if(!empty($data->jobs))
			{
				$t = $data->reviewOverall;
				$score = $t / $data->jobs;
				$jobs = $data->jobs;
			}
			else
			{
				$score = 0;
				$jobs = 0;
			}
			$success = $this->common->update(array("id"=>$client->id),array("successScore"=>$score,"rating"=>$rate,"jobs"=>$jobs,"earning"=>$totalearning),'user');
		}

		if($success)
		{
			echo "done";
		}

	}



	public function jobSearch($id)
	{
		$data['servicesId'] = $id;
		$s = $this->common->getrow('services',array("id"=>$id));
		$data['title'] = $s->name." Jobs | Freelance Jobs | ".$s->name." Work";
		$data['description'] = "Are you looking for a ".$s->name." job ? Top SEOs is here to help you find your next job. Search ".$s->name." jobs now.";
		$this->load->view('front/header',$data);
		$this->load->view('front/search_job');
		$this->load->view('front/footer');
	}

	public function getskillbyJobs()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$page = $results->page;


		if(!empty($page))
		{

			$data['pcount'] = $this->common->count_all_results('job_meta',array("value"=>$results->id));
			$config["total_rows"] = $this->common->count_all_results('job_meta',array("value"=>$results->id));

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
			$jobs = $this->common->getJobsByskill(array("jm.value"=>$results->id,"jm.type"=>'service'),$start,$config["per_page"]);
		}


		if(!empty($jobs))
		{
			foreach($jobs as $key=>$job)
			{
				$jobs[$key]->skill = $this->common->getjobskill(array("us.jobId"=>$job->jobId));
				$jobs[$key]->proposal = $this->common->count_all_results('user_job_proposal',array("jobId"=>$job->jobId));
				$pa = $this->common->getrow('user_account',array("u_id"=>$job->u_id));
				$spend = $this->common->clientSpendAmount(array("clientId"=>$job->u_id,'contractStatus'=> 2));
				if($spend->total != '')
				{
					$jobs[$key]->spend = $spend->total;
				}
				else
				{
					$jobs[$key]->spend = 0;
				}

				if(!empty($pa))
				{
					$jobs[$key]->payment = 1;
				}
				else
				{
					$jobs[$key]->payment = 0;
				}

				$clientreview = $this->common->getrow('user',array("id"=>$job->u_id));
				$jobs[$key]->review = $clientreview->rating;

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



	public function companyReview()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);


		if(!empty($results))
		{
			$inserted = $this->common->insert('linked_review',array("data"=>serialize($results)));
    }

		if($inserted[0] == 1)
		{
			$id = urlencode(base64_encode(json_encode(array('userid' => $results->reviewTo, 'insertedId'  =>$inserted[1] ))));
			$msg['message'] = "true";
			$msg['result'] = $id;
		}
		else
		{
			$msg['message'] = "false";
			$msg['result'] = '';
		}
		echo json_encode($msg);
		exit;
	}



	public function linkedapproved()
	{
		//echo "dads";
		if((isset($_REQUEST['code'])) && (isset($_REQUEST['state'])))
		{
			$state = json_decode(base64_decode(urldecode($_REQUEST['state'])));

			if(!empty($state))
			{
				$reviewd = $this->common->getrow('linked_review',array("id"=>$state->insertedId));

				$review = unserialize($reviewd->data);
			}
			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			if(!empty($review))
			{
				$startdate = date("Y-m-d",strtotime($review->startdate));
				$enddate = date("Y-m-d",strtotime($review->enddate));;
				$data = array(
					"fullname"=>$review->fullname,
					"email"=>$review->email,
					"phone"=>$review->phone,
					"email"=>$review->email,
					"skype"=>$review->skype,
					"website"=>$review->website,
					"companyName"=>$review->company,
					"country"=>$review->country,
					"state"=>$review->state,
					"city"=>$review->city,
					"companyAddress"=>$review->companyaddress,
					"projectTitle"=>$review->projecttitle,
					"projectAmount"=>$review->projectamount,
					"currencyId"=>$review->currency,
					"projectStartDate"=>$startdate,
					"projectEndDate"=>$enddate,
					"projectSummary"=>$review->projectsummary,
					"industryId"=>$review->industry,
					"servicesId"=>$review->service,
					"targetLocation"=>$review->targetlocation,
					"targetLocationState"=>$review->targetlocationState,
					"targetLocationCity"=>$review->targetlocationCity,
					"reviewTitle"=>$review->reviewtitle,
					"date"=>$date,
				);

				$user = $this->common->insert('linkedIn_user',$data);
        if($user[0] == 1)
				{
					foreach($review->question as $type)
					{
						foreach($type->question as $q)
						{
							if(!empty($q->answer))
							{
								$qu = array(
									"linkedInId"=>$user[1],
									"questionId"=>$q->id,
									"answer"=>$q->answer,
								);
								$this->common->insert('linkedIn_user_answer',$qu);
							}
						}
					}
				}

				if($user[0] == 1)
				{
					$t =0;
					$t = $review->total * $review->overall;

					$insert=array(
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'overall','reviewOverall'=>$review->overall),
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'communication','reviewOverall'=>$review->communication * 0.20),
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'skill','reviewOverall'=>$review->skill * 0.40),
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'rehire','reviewOverall'=>$review->rehire * 0.40),
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'quality','reviewOverall'=>$review->quality * 0.20),
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'deadline','reviewOverall'=>$review->deadline * 0.20),
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'cooperation','reviewOverall'=>$review->cooperation * 0.20),
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'cost','reviewOverall'=>$review->cost * 0.20),
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'availability','reviewOverall'=>$review->availability * 0.20),
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'review','reviewOverall'=>$review->feedbacksummary),
						array('linkedInId'=>$user[1],'reviewTo'=>$state->userid,'reviewFrom'=>0,'reviewType'=>'total','reviewOverall'=>$t)
					);

					$reviewlinkedin = $this->common->insert_batch('user_review',$insert);

					$username = $this->common->getSingleUser(array("us.id"=>$state->userid));
					$name = str_replace(' ','-',strtolower($username->name.'-'.$username->u_id));
					$cname = str_replace(' ','-',strtolower($username->c_name.'-'.$username->u_id));

					$type = $this->common->getrow('user',array("id"=>$state->userid));

					if($reviewlinkedin)
					{
						if($type->type == "2")
						{
							redirect('profile/'.$cname);
						}
						else if($type->type == "3")
						{
							redirect('profile/'.$name);
						}
					}
				}
			}

		}
		else
		{
			redirect('/');
		}
	}


	public function getAlllinkedin_review()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;

		if(!empty($page))
		{
			 $data['pcount'] = $this->common->count_linkedreview(array("r.reviewTo"=>$results->userId));
			 $config["total_rows"] = $this->common->count_linkedreview(array("r.reviewTo"=>$results->userId));
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
			$result = $this->common->getlinkedinreview(array("r.reviewTo"=>$results->userId));
		}


		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
				$ser = $this->common->getrow('services',array("id"=>$res->servicesId));
				$co = $this->common->getrow('countries',array("id"=>$res->country));
				$result[$key]->service = $ser->name;
				$result[$key]->country = $co->name;
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


	public function servicesRanking()
	{
		$success = '';
		$result = $this->common->RankingServices();


		if(!empty($result))
		{
			foreach($result as $key=>$res)
			{
				$r = $this->common->getrow('user_review',array("contractId"=>$res->contractId,"reviewType"=>"total","reviewTo"=>$res->freelancerId));
 			 if(!empty($r))
 			 {
 				 $result[$key]->reviewOverall = $r->reviewOverall;
 			 }
				$result[$key]->industry = $this->common->get('job_meta',array("jobId"=>$res->jobId,"type"=>"industry"));
			}
		}
		// echo "<pre>";
		// print_r($result);
		// die;
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		if(!empty($result))
		{
			foreach($result as $res1)
			{
				foreach($res1->industry as $in)
				{
					$get = $this->common->getrow('user_service_ranking',array("jobId"=>$res1->jobId,"servicesId"=>$res1->servicesId,"userId"=>$res1->freelancerId,"industryId"=>$in->value,"countryId"=>$res1->location));
					if(empty($get))
					{
						$success = $this->common->insert('user_service_ranking',array("jobId"=>$res1->jobId,"servicesId"=>$res1->servicesId,"userId"=>$res1->freelancerId,"industryId"=>$in->value,"date"=>$date,"countryId"=>$res1->location,"score"=>$res1->reviewOverall,"clientCountryId"=>$res1->clocation,"contractId"=>$res1->contractId));
					}
				}

			}
		}

		if($success)
		{
			echo "done";
		}
		else
		{
			echo "already";
		}
 }


 public function servicesGigRanking()
 {
	 $success = '';
	 $result = $this->common->RankingGigServices();

	 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	 $date =  $nowUtc->format('Y-m-d H:i:s');

	 if(!empty($result))
	 {
		 foreach($result as $k=>$res)
		 {
			 $r = $this->common->getrow('user_review',array("user_gig_buyId"=>$res->user_gig_buyId,"reviewType"=>"total","reviewTo"=>$res->freelancerId));
			 if(!empty($r))
			 {
				 $result[$k]->reviewOverall = $r->reviewOverall;
			 }

				 $get = $this->common->getrow('user_service_ranking',array("gigId"=>$res->gigId,"user_gig_buyId"=>$res->user_gig_buyId,"servicesId"=>$res->servicesId,"userId"=>$res->freelancerId,"industryId"=>$res->industryId,"countryId"=>$res->location));
				 if(empty($get))
				 {
					 $success = $this->common->insert('user_service_ranking',array("gigId"=>$res->gigId,"user_gig_buyId"=>$res->user_gig_buyId,"servicesId"=>$res->servicesId,"userId"=>$res->freelancerId,"industryId"=>$res->industryId,"date"=>$date,"countryId"=>$res->location,"score"=>$res->reviewOverall,"clientCountryId"=>$res->clocation));
				 }
		 }
	 }

	 if($success)
	 {
		 echo "done";
	 }
	 else
	 {
		 echo "already";
	 }
}

 public function linkedinreviewRanking()
 {
	 $success = '';
	 $result = $this->common->linkedinReviewRanking();

	 if(!empty($result))
	 {
		 foreach($result as $key=>$res)
		 {
			 $result[$key]->industry = $this->common->get('job_meta',array("jobId"=>$res->jobId,"type"=>"industry"));
		 }
	 }

	 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	 $date =  $nowUtc->format('Y-m-d H:i:s');

	 if(!empty($result))
	 {
		 foreach($result as $res1)
		 {
			 foreach($res1->industry as $in)
			 {
				 $get = $this->common->getrow('user_service_ranking',array("jobId"=>$res1->jobId,"servicesId"=>$res1->servicesId,"userId"=>$res1->freelancerId,"industryId"=>$in->value,"countryId"=>$res1->location));
				 if(empty($get))
				 {
					 $success = $this->common->insert('user_service_ranking',array("jobId"=>$res1->jobId,"servicesId"=>$res1->servicesId,"userId"=>$res1->freelancerId,"industryId"=>$in->value,"date"=>$date,"countryId"=>$res1->location,"score"=>$res1->reviewOverall,"clientCountryId"=>$res1->clocation,"contractId"=>$res1->contractId));
				 }
			 }

		 }
	 }

	 if($success)
	 {
		 echo "done";
	 }
	 else
	 {
		 echo "already";
	 }
 }

	public function getRankingSingleProfile()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->getSingleUser(array("us.id"=>$results->userId));
		if(!empty($result->countryCode))
		{
			$a = explode(":",$result->countryCode);
			$result->countryCode = $a[1];
		}

		if(!empty($result))
		{
			$result->services = $this->common->getservices(array("u_id"=>$result->u_id));
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

	public function clientHireRate()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$hiredRate = 0;
		$totaljobs = $this->common->count_all_results('user_joboffer',array("offFrom"=>$results->userId));
		$hiredjobs = $this->common->count_all_results('user_jobcontract',array("clientId"=>$results->userId));
		if($totaljobs != 0 && $hiredjobs != 0 )
		{
			$hiredRate = $hiredjobs / $totaljobs * 100;
		}
		if($hiredRate)
		{
			$msg['message'] ="true";
			$msg['result'] = $hiredRate;
		}
		else
		{
			$msg['message'] ="false";
			$msg['result'] = '';
		}

		echo json_encode($msg);
		exit;
	}


	// pages start

	public function term_condition()
	{
		$data['title'] ="Term condition";
		$this->load->view('front/header',$data);
		$this->load->view('front/term_condition');
		$this->load->view('front/footer');
	}

	public function privacy_policy()
	{
		$data['title'] ="Privacy policy";
		$this->load->view('front/header',$data);
		$this->load->view('front/privacy_policy');
		$this->load->view('front/footer');
	}

	public function legal_disclosure()
	{
		$data['title'] ="Legal disclosure";
		$this->load->view('front/header',$data);
		$this->load->view('front/legal_disclosure');
		$this->load->view('front/footer');
	}

	public function sitemap()
	{
		header("Content-Type: text/xml;charset=iso-8859-1");
		$this->load->view("front/sitemap");
	}

	public function getcurrency()
	{
		$currency = $this->common->getTable('currency');
		if($currency)
		{
			$msg['result'] = $currency;
			$msg['message'] ="true";
		}
		else
		{
			$msg['result'] ="";
			$msg['message'] ="false";
		}
		echo json_encode($msg);
		exit;
	}

	public function getlinkedServices()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$res = $this->common->getserviceIndustry(array("industryId"=>$results->industryId));

		if($res)
		{
			$msg['message'] ="true";
			$msg['result'] = $res;
		}
		else
		{
			$msg['message'] ="false";
			$msg['result'] ='';
		}
		echo json_encode($msg);
		exit;
	}
	// pages End

	public function expired_joboffer()
	{
		$success ='';
		$alljobs = $this->common->get('user_joboffer',array("offStatus"=>0));
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');
		$date2 = date_create($date);
		if(!empty($alljobs))
		{
			foreach($alljobs as $job)
			{
				$newDate = date("Y-m-d",strtotime($job->offDate));
				$date1 = date_create($newDate);
				$diff= date_diff($date1,$date2);
				 if($diff->days > 7)
				 {
					 $freelancer = $this->common->getSingleUser(array("us.id"=>$job->offTo));
					 $jobtitle = $this->common->getrow('user_job',array("jobId"=>$job->jobId));
					 $data['name'] = $freelancer->name;
					 $data['jobtitle'] = $jobtitle->jobTitle;
					 $message = $this->load->view('email/joboffer_expired',$data,true);
					$res = $this->mailsend('Top-SEOs Job Offer Expired',$freelancer->email,$message);
            if($res)
					  {
					   $success = $this->common->update(array('jobId'=>$job->jobId),array('offTo'=>0),'user_joboffer');
				    }
				  }
			  }
		 }

		if($success)
		{
			echo "done";
		}
		else
		{
			echo "not";
		}
	}


	public function expired_job()
	{
    $success ='';
		$alljobs = $this->common->get('user_joboffer',array("offTo"=>0,'offStatus'=>0));
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d');
		$date2 = date_create($date);

		if(!empty($alljobs))
		{
			foreach($alljobs as $job)
			{

				$newDate = date("Y-m-d",strtotime($job->offDate));
				$date1 = date_create($newDate);
				$diff= date_diff($date1,$date2);
				// print_r($diff);
				// echo "<br>";
				 if($diff->days > 30)
				 {
					 $client = $this->common->getSingleUser(array("us.id"=>$job->offFrom));
					 $jobtitle = $this->common->getrow('user_job',array("jobId"=>$job->jobId));
					 $data['name'] = $client->name;
					 $data['jobtitle'] = $jobtitle->jobTitle;
					 $message = $this->load->view('email/job_expired',$data,true);
					 $res = $this->mailsend('Top-SEOs Job Expired',$client->email,$message);
            if($res)
					  {
					   $success = $this->common->update(array('jobId'=>$job->jobId),array('offStatus'=>6),'user_joboffer');
						 $success1 = $this->common->update(array('jobId'=>$job->jobId),array('jobStatus'=>6),'user_job');
				    }
				  }
			  }
		 }

		if($success)
		{
			echo "done";
		}
		else
		{
			echo "not";
		}
	}

	public function blog()
	{
		  $data['pcount'] = $this->common->count_all_results('blog',array("status"=>'1'));
			$config = array();
			$config["base_url"] = base_url() . "blog/";
			$config["total_rows"] = $this->common->count_all_results('blog',array("status"=>'1'));
			$config["per_page"] = 10;
			$config["uri_segment"] = 2;
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			if( $page <= 0 )
			 {
			 $page = 1;
			 }
			 $start = ($page-1) * $config["per_page"];

		$blogs = $this->common->getblog(array('status'=>'1'),$start,$config["per_page"]);
		$data["links"] = getPagination($config["per_page"],$config["total_rows"],$config["base_url"],$config["uri_segment"],1);

		 if(!empty($blogs))
		 {
			 foreach($blogs as $key=>$b)
			 {
				  $tags = $this->common->get('blog_tags',array("blogId"=>$b->blogId));
					if(!empty($tags))
					{
					$blogs[$key]->tags = $tags;
				  }
        }
		 }

			$data['blogs']= $blogs;
		  $data['title'] ="Digital Marketing | SEO | PPC | Web Development | Design Blogs - Top SEOs";
		  $data['description'] ="We are a leading platform for freelance, providing highly professional freelancers for your business. Use our blog to read about the latest technology update.";
			$this->load->view('front/header',$data);
			$this->load->view('front/blog');
			$this->load->view('front/footer');
	}


	 public function blogDetail($id)
	 {
		 $a = explode("-",$id);
		 $c = count($a);
		 $id = $a[$c-1];
		 $data['blog'] = $this->common->getrow('blog',array("blogId"=>$id));
		 $data['category'] = $this->common->getrow('category',array("categoryId"=>$data['blog']->categoryId));
		 $data['tags'] = $this->common->get('blog_tags',array("blogId"=>$data['blog']->blogId));
		 $data['title'] = $data['blog']->title;
		 $data['description'] = strip_tags(substr($data['blog']->description, 0, 100));

		 $this->load->view('front/header',$data);
		 $this->load->view('front/blogDetail');
		 $this->load->view('front/footer');
	 }

	 public function getquestionType ()
	 {
		 $res = $this->common->get('questiontype',array("status"=>1));
		  if($res)
			{
				$msg['message'] ="true";
				$msg['result'] =$res;
			}
			else
			{
				$msg['message'] ="false";
				$msg['result'] =" ";
			}
			echo json_encode($msg);
			exit;
	 }

	 public function getquestion()
	 {
		 $type = $this->common->get('questiontype',array("status"=>1));

			if(!empty($type))
			{
		     foreach($type as $key=>$t)
		     {
			    $type[$key]->question = $this->common->get('question',array("questionTypeId"=>$t->id,"status"=>1));
					 if($key == 0 || $key == 1)
					  {
					   $type[$key]->required = 1;
						 $type[$key]->filled = 0;
				    }
						else if($key == 2 || $key == 3)
						{
							$type[$key]->required = 2;
							$type[$key]->filled = 0;
						}
				 }
       }

		   if($type)
		  {
			 $msg['message'] ="true";
			 $msg['result'] =$type;
		  }
			else
			{
				$msg['message'] ="false";
				$msg['result'] ="";
			}
			echo json_encode($msg);
			exit;
	 }

	 public function reviewquestion()
	 {
		 $array = file_get_contents('php://input');
 		$results =json_decode($array);

		 $type = $this->common->get('questiontype',array("status"=>1));

		 if(!empty($type))
		 {
				foreach($type as $key=>$t)
				{
				 $type[$key]->question = $this->common->getreviewquestion(array("q.questionTypeId"=>$t->id),array("a.linkedInId"=>$results->linkedInId));

				}
			}

 		if($type)
 		{
 			$msg['message'] ="true";
 			$msg['result'] = $type;
 		}
 		else
 		{
 			$msg['message'] ="false";
 			$msg['result'] ='';
 		}
 		echo json_encode($msg);
 		exit;

	 }


	 public function membership()
	 {
		   $data['title'] = " Membership Plans and Pricing | Paid Registration - Top SEOs";
		   $data['description'] = "UPgrade your Top-SEOs profile with our special membership plans for Freelancers and Companies. Get the most out of the platform.";
		   $data['packages'] = $this->common->getTable('packages');
       $data['content'] = $this->common->getoneOnly('package_content');
			 $this->load->view('front/header',$data);
			 $this->load->view('front/membership');
			 $this->load->view('front/footer');
	 }

	 public function contactus()
	 {
		 $data['title'] =  "Contact Us | Help and Support | Top SEOs";
		 $data['description'] =  "Get answers to your questions or if you want to get in touch with our team. We are online 24/7. Chat with Us.";
		 $this->load->view('front/header',$data);
		 $this->load->view('front/contact-us');
		 $this->load->view('front/footer');
	 }

	 public function contactsave()
	 {
		 $array = file_get_contents('php://input');
 		 $results =json_decode($array);

		if(!empty($results))
		{
 		  $res = $this->common->insert('contact',$results);
		}
		if($res)
		{
			$data['result'] = $results;
			$message = $this->load->view('email/directconnectlead',$data,true);
			$mail = $this->mailsend('lead','wwkaa0yeci@members.directconnect.com',$message);
		}

 		if($mail)
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


	 public function supportemail()
	 {
		 $detail['user'] = $_POST;

		 $message = $this->load->view('email/support',$detail,true);
		 $res = $this->mailsend('Top-SEOs Support chat user','seomafia786@gmail.com',$message);
      if($res)
			{
				$msg['success'] = "Email send successfully";
			}
			echo json_encode($msg);
			exit;
	 }

	 public function conference()
	 {
		 $data['pcount'] = $this->common->count_all_results('conference',array("status"=>'1'));
     $data['title'] = "Submit and Manage Conferences – Top SEOs";
		 $data['description'] = "Submit & find your events and conferences based on Internet Marketing, Development and many more at Top-SEOs.com. Promote your Events and Conferences on Top-SEOs.";
 		 $config = array();
 			$config["base_url"] = base_url() . "conference/";
 			$config["total_rows"] = $this->common->count_all_results('conference',array("status"=>'1'));
 			$config["per_page"] = 10;
 			$config["uri_segment"] = 2;
 			$this->pagination->initialize($config);
 			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
 			if( $page <= 0 )
 			 {
 			 $page = 1;
 			 }
 			 $start = ($page-1) * $config["per_page"];

 		$data['conferences'] = $this->common->getfrontconference('conference',array('status'=>'1'),$start,$config["per_page"]);
 		$data["links"] = getPagination($config["per_page"],$config["total_rows"],$config["base_url"],$config["uri_segment"],1);

		 $this->load->view('front/header',$data);
		 $this->load->view('front/conference');
		 $this->load->view('front/footer');
	 }

	 public function conferencesave()
	 {
		 $array = file_get_contents('php://input');
 		 $results =json_decode($array);

		 $s = strtotime($results->startDate);
	   $results->startDate = date('Y-m-d', $s);

		 $d = strtotime($results->endDate);
	   $results->endDate = date('Y-m-d', $d);

		 if(!empty($results))
		 {
 		   $res = $this->common->insert('conference',$results);
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

	 public function conference_detail($id)
	 {
		 $data['result'] = $this->common->getrow('conference',array("id"=>$id));

		 $data['title'] = $data['result']->title.', '.$data['result']->location .'| Event Calender '.date('Y');
		 $data['description'] =  substr($data['result']->about, 0, 200);
		 $this->load->view('front/header',$data);
		 $this->load->view('front/conferenceDetail',$data);
		 $this->load->view('front/footer');
	 }

	 public function blog_add()
	 {
		 if(!$this->session->userdata['clientloggedin']['id'])
		 {
       redirect('blog');
		 }
		 else
		 {
			$data['title'] = 'Submit Your Articles / Blog | Fresh and Unique Content - Top SEOs';
      $data['description'] = 'Top SEOs, allow you to submit your unique and fresh content free, So you gain more traffic and build some good backlinks to your website';
		 $this->load->view('front/header',$data);
		 $this->load->view('front/blog_add');
		 $this->load->view('front/footer');
	   }
	 }

	 public function blogSave()
	 {
	 	$array = file_get_contents('php://input');
	 	$results =json_decode($array);
		$user = $this->common->getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
		$results->author = $user->name;
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


	 public function error()
	 {
		 $this->load->view('front/header');
		 $this->load->view('front/error');
		 $this->load->view('front/footer');
	 }

	 public function linkedinReviewRank()
	 {
		 $success = '';
		 $result = $this->common->linkedinReviewRanking();

		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d H:i:s');

		 if(!empty($result))
		 {
			 foreach($result as $res1)
			 {
					 $get = $this->common->getrow('user_service_ranking',array("servicesId"=>$res1->servicesId,"userId"=>$res1->freelancerId,"industryId"=>$res1->industryId,"countryId"=>$res1->location));
					 if(empty($get))
					 {
						 $success = $this->common->insert('user_service_ranking',array("linkedInId"=>$res1->linkedInId,"servicesId"=>$res1->servicesId,"userId"=>$res1->freelancerId,"industryId"=>$res1->industryId,"date"=>$date,"countryId"=>$res1->location,"score"=>$res1->reviewOverall,"clientCountryId"=>$res1->clocation));
					 }
         }
		 }

		 if($success)
		 {
			 echo "done";
		 }
		 else
		 {
			 echo "already";
		 }
	 }

	 public function blogmail()
	 {
		 $blog = $this->common->getrow('blog',array("sendmail"=>'0'));

		 if(!empty($blog))
		 {
		 $cate = $this->common->getrow('category',array("categoryId"=>$blog->categoryId));
	   }

		 $users = $this->common->getAllUser();
	   if(!empty($blog))
		 {
     if(!empty($users))
		 {
			 foreach($users as $u)
			 {
				 $detail['name'] =  $u->name;
				 $detail['category'] = $cate->category;
				 $detail['blog'] = $blog;
				 if(isset($blog->url))
				 {
				 $detail['link'] = base_url().'post/'.str_replace(' ', '-',strtolower($blog->url.'-'.$blog->blogId));
			   }
				 else
				 {
				$detail['link'] = base_url().'post/'.str_replace(' ', '-',strtolower($blog->title.'-'.$blog->blogId));

				 }

				 $message = $this->load->view('email/blogpost',$detail,true);
			  $mail =	 $this->mailsend($blog->title,$u->email,$message);

			 }
			 if($mail)
			 {
				 $this->common->update(array('blogId' =>$blog->blogId),array('sendmail' =>1),'blog');
			 }
		 }
	 }

	 }

	 public function profileupdatemail()
	 {
		  $users = $this->common->getAllUser();

     if(!empty($users))
	  {
			foreach($users as $u)
			{
				 if($u->desig == '' || $u->website == '' || $u->address1 == ''  || $u->maxPrice == '' )
				 {
				   $detail['name'] = $u->name;
				   $detail['type'] = $u->type;
           $message = $this->load->view('email/profileupdate',$detail,true);
				   $mail =	 $this->mailsend('Hi '.ucwords($u->name).', Pls Complete Your Profile',$u->email,$message);
				  }
			  }
		  }
	  }

		public function verificationemail()
		{
			$users = $this->common->getunverifiedUser();


      if(!empty($users))
			{
				foreach($users as $u)
				{
			    $detail['name'] = $u->name;
			    // $encryptemail=$this->encrypt->encode($u->email);
			    $encryptemail= base64_encode($u->email);
			    $detail['link'] = base_url().'account/activate/'.$encryptemail;
			    $msg = $this->load->view('email/verification',$detail,true);
			    $this->mailsend('Reminder: Hi '.ucwords($u->name).' Your Account Is Not Yet Activated',$u->email,$msg);
			}
		}
	}

   public function features()
	 {
		 $data['result'] = $this->common->get('featured',array("status"=>1));
    $a['title'] = "Feature Listings | Top SEOs Feature Details";
    $a['description'] = "Learn about the many features of Top SEOs. It contains like Project Management, Task Management, Chat & Hiring, HR Management and Reviews & Ranking Features etc..";
		 $this->load->view('front/header',$a);
		 $this->load->view('front/features',$data);
		 $this->load->view('front/footer');
	 }


	 public function features_detail($id)
	 {
		 $a = explode("-",$id);
		 $c = count($a);
		 $id = $a[$c-1];

		 $data['result'] = $this->common->getrow('featured',array("id"=>$id));
		 $t['title'] = $data['result']->metaTitle;
		 $t['description'] = substr($data['result']->description, 0, 270);
		 $this->load->view('front/header',$t);
		 $this->load->view('front/features_detail',$data);
		 $this->load->view('front/footer');
	 }


	 public function jobsearchcountry($id)
	 {
		 $a = str_replace("-"," ",$id);
		 $data['country'] = $a;
		 $data['title'] = " Jobs in ".$a." | Available jobs near ".$a;
		 $data['description'] = "Get the right job in ".$a." with company ratings & salaries. Search ".$a. " jobs & find great employment opportunities today. Get hired!";
		 $this->load->view('front/header',$data);
		 $this->load->view('front/search_job_country');
		 $this->load->view('front/footer');

	 }

	 public function getJobCountryWise()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		 $page = $results->page;
		 $countryId = $this->common->getrow('countries',array("name"=>$results->country));

		 if(!empty($page))
		 {

			 $data['pcount'] = $this->common->count_jobcountryWise(array("m.country"=>$countryId->id,"o.offTo"=>0));
			 $config["total_rows"] = $this->common->count_jobcountryWise(array("m.country"=>$countryId->id,"o.offTo"=>0));

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
			 $jobs = $this->common->getJobsByCountry(array("us.country"=>$countryId->id,'jo.offTo'=>0),$start,$config["per_page"]);
		 }


		 if(!empty($jobs))
		 {
			 foreach($jobs as $key=>$job)
			 {
				 $jobs[$key]->skill = $this->common->getjobskill(array("us.jobId"=>$job->jobId));
				 $jobs[$key]->proposal = $this->common->count_all_results('user_job_proposal',array("jobId"=>$job->jobId));
				 $pa = $this->common->getrow('user_account',array("u_id"=>$job->u_id));
				 $spend = $this->common->clientSpendAmount(array("clientId"=>$job->u_id,'contractStatus'=> 2));
				 if($spend->total != '')
				 {
					 $jobs[$key]->spend = $spend->total;
				 }
				 else
				 {
					 $jobs[$key]->spend = 0;
				 }

				 if(!empty($pa))
				 {
					 $jobs[$key]->payment = 1;
				 }
				 else
				 {
					 $jobs[$key]->payment = 0;
				 }

				 $clientreview = $this->common->getrow('user',array("id"=>$job->u_id));
				 $jobs[$key]->review = $clientreview->rating;

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

	 public function userpreferredlocation()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

		 $res = $this->common->userpreferredlocation(array("b.userId"=>$results->userId,"b.status"=>1));
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

	 public function userpreferredState()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $res = $this->common->userpreferredState(array("p.rankingPriceId"=>$results->rankingPriceId));
		 $city = $this->common->userpreferredCity(array("p.rankingPriceId"=>$results->rankingPriceId));
		 if($res)
		 {
			 $output['success'] = "true";
			 $output['state'] = $res;
			 $output['city'] = $city;
		 }
		 else
		 {
			 $output['success'] = "false";
			 $output['result'] = '';
		 }
		 echo json_encode($output);
		 exit;
	 }

	 public function askquestionSave()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $results->questionSubmittedDate = $nowUtc->format('Y-m-d H:i:s');

		 $result = $this->common->insert('askQuestion',$results);
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

	 public function getaskquestionlist()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;
		 $config = array();
		//  $timezone = $this->common->getrow('user_paymentmethod',array("userId"=>$results->userId));
		//  if(!empty($timezone))
		//  {
		// 	$zone = explode(":",$timezone->zone);
		// 	$h = $zone[0].' Hours';
		// 	$m = $zone[1].' Minutes';
		// 	$timez = $h.' '.$m;
		// }

		 $data['pcount'] = $this->common->count_all_results('askQuestion',array("userId"=>$results->userId,"status"=>1));
		 $config["total_rows"] = $this->common->count_all_results('askQuestion',array("userId"=>$results->userId,"status"=>1));
		 $config["per_page"] = 10;
		 $this->pagination->initialize($config);
		 if( $page <= 0 )
		 {
			 $page = 1;
		 }
		 $start = ($page-1) * $config["per_page"];
		 if(!empty($page))
		 {
			 $res = $this->common->getaskQuestion(array("userId"=>$results->userId,"status"=>1),$start,$config["per_page"]);
		 }
		 // if(!empty($res))
		 // {
			//  foreach($res as $key=>$r)
			//  {
			// 	 $start = strtotime($timez, strtotime($r->questionSubmittedDate));
			// 	 $res[$key]->questionSubmittedDate = date('Y-m-d H:i:s', $start);
			// 	 if(!empty($r->answerDate))
			// 	 {
			// 	 $s = strtotime($timez, strtotime($r->answerDate));
			// 	 $res[$key]->answerDate = date('Y-m-d H:i:s', $s);
			//    }
			//  }
		 // }

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

	 public function getusergiglist()
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

		 if(!empty($res))
		{
			foreach($res as $k=>$r)
			{
				$img = $this->common->getrow('user_gig_images',array("gigId"=>$r->gigId));
				$res[$k]->image = $img->image;
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

	 public function usergigdetail($id)
	 {
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
     $date =  $nowUtc->format('Y-m-d');
		 $a = explode("-",$id);
		 $c = count($a);
		 $id = $a[$c-1];
		 $data['gigId'] = $id;
		 $result =  $this->common->getgigView(array("gigId"=>$id));
     $images = $this->common->get('user_gig_images',array("gigId"=>$id));
		 if($result)
		 {
			$result->plan = $this->common->get('user_gig_plan',array("gigId"=>$id,"milestone"=>1));
		 }

		if(!empty($result->plan))
		{
			foreach($result->plan as $key=>$p)
			{
			 $result->plan[$key]->task =$this->common->get('user_gig_plan',array("gigId"=>$id,"parent"=>$p->user_gig_planId));
			}
		}

		$data['result'] = $result;
		$data['images'] = $images;
		$data['user'] = $this->common->getSingleUser(array("u_id"=>$result->userId));
	  $data['gigcount'] = $this->common->count_all_results('user_gig',array("userId"=>$data['result']->userId));
		$totalearning = 0;
		$earning = $results = $this->common->SumEarning(array("userId"=>$data['result']->userId));
    if($earning->total != '')
		{
		$totalearning = round($earning->total);
	  }
		else
		{
			$totalearning = 0;
		}
		$data['totalearning'] = $totalearning;
		$review = array();
    $buyIds = array();
		$buygig = $this->common->get('user_gig_buy',array("gigId"=>$id,"status"=>2));
		if(!empty($buygig))
		{
			foreach($buygig as $b)
			{
				$reviewlastdate = date('Y-m-d', strtotime($b->endDate. ' + 14 days'));
				if($b->clientEnd == 1 && $b->userEnd == 1)
				{
				$buyIds[] = $b->user_gig_buyId;
			  }
				else if($b->clientEnd == 1 && !$b->userEnd && $reviewlastdate < $date)
				{
					$buyIds[] = $b->user_gig_buyId;
				}
			}
		}

		if(!empty($buyIds))
		{
		$review = $this->common->getFrontreviews('user_review',array("reviewTo"=>$data['result']->userId,"reviewType"=>'review'),$buyIds);
	  }

		if(!empty($review))
		{
		  foreach($review as $key=>$r)
		  {
		    $reviews = $this->common->getrow('user_review',array("user_gig_buyId"=>$r->user_gig_buyId,"reviewTo"=>$r->reviewTo,"reviewType"=>'star'));
		    $client = $this->common->getrow('user_meta',array("u_id"=>$r->reviewFrom));
		    $review[$key]->score = $reviews->reviewOverall / 2;
		    $review[$key]->name = $client->name;
		    }
		}

    $data['review'] = $review;
    $t['title'] = $data['result']->title;
		$t['description'] = strip_tags(substr($data['result']->description, 0, 100));

		$this->load->view('front/header',$t);
		$this->load->view('front/gigdetail',$data);
		$this->load->view('front/footer');
	 }


	 public function getusergigdetail()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $result =  $this->common->getgigView(array("gigId"=>$results->gigId));
     if($result)
		 {
			 $plan = $this->common->get('user_gig_plan',array("gigId"=>$results->gigId,"milestone"=>1));
		 }

		if(!empty($plan))
		{
			foreach($plan as $key=>$p)
			{
			 $plan[$key]->task =$this->common->get('user_gig_plan',array("gigId"=>$results->gigId,"parent"=>$p->user_gig_planId));
			}
		}

		if($result)
		{
			$data['message'] = 'true';
			$data['plan'] = $plan;
			$data['result'] = $result;
		}
		else
		{
			$data['message'] ="false";
		}

		echo json_encode($data);
		exit;

	 }

	 public function buygig()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		 $date =  $nowUtc->format('Y-m-d H:i:s');
		 $results->date = $date;
		 $plan = $results->plan;
		 unset($results->plan);
		 $results->status = 1;
		 $results->clientId = $this->session->userdata['clientloggedin']['id'];
		 $gig = $this->common->getrow('user_gig',array("gigId"=>$results->gigId));
     $results->title = $gig->title;
     $results->description = $gig->description;
     $results->servicesId = $gig->servicesId;
     $results->industryId = $gig->industryId;
     $results->currencyId = $gig->currencyId;
		 if(!empty($results))
		 {
			 $insert = $this->common->insert('user_gig_buy',$results);
		 }
		 if($insert)
		 {
			 if(!empty($plan))
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
				 "user_gig_buyId"=>$insert[1],
				 "name"=>$plan->name,
				 "amount"=>$plan->amount,
				 "hours"=>$plan->duration,
				 "description"=>$plan->description,
				 "milestone"=>1,
				 "type"=>4,
				 "plan"=>$plan->plan,
				 "taskId"=>$taskId,
			 );
			 $milestone = $this->common->insert('todoList',$mdata);

			 if(!empty($plan->task))
			 {
				 foreach($plan->task as $t)
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
						 "name"=>$t->name,
						 "amount"=>'',
						 "status"=>2,
						 "type"=>4,
						 "taskId"=>$taskId1,
						 "user_gig_buyId"=>$insert[1],
					 );
					 $task = $this->common->insert('todoList',$tdata);
				 }
			  }
		  }
		 }
		 if($insert)
		 {
			 $a['notificationTo'] = $this->session->userdata['clientloggedin']['id'];
				$lastrecord = $this->common->getone('user_notification','notificationId','Desc');
				$lastId = $lastrecord->notificationId;
				$lastId = $lastId + 1;

				$main = base_urL().'freelancer/buygig/'.$results->gigId;
				$a['notificationFrom'] = $results->userId;
				$a['notificationStatus'] = 0;
				$a['notificationType'] = "gig";
				$a['notificationMessage'] = "You have a new notification of <b>gig</b>, please <a class='clicknotification' data-id='$lastId' data-href='$main'>click here</a> to know more.";
				$a['notificationDate'] = $date;
				$this->notificationSave($a);
		 }

		 if($insert)
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

	 public function checkgigbuy()
	 {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);

     if($this->session->userdata['clientloggedin']['type'] == 4)
		 {
		   $result = $this->common->getrow('user_gig_buy',array("gigId"=>$results->gigId,"clientId"=>$this->session->userdata['clientloggedin']['id'],"status"=>1));
	   }

		 if($result)
		 {
			$data['message'] ="true";
			$data['result'] = $result;
		 }
		 else
		 {
			$data['message'] ="false";
		 }
		 echo json_encode($data);
		 exit;
	 }

	 public function find_gig()
	 {
		 $title['title'] ="Find Gig Jobs | Paid Gigs | Small Gigs | Part Time Jobs ";
		 $title['description'] ="Find a local gig where you can use your skills in a short-term, small or odd job. Top-SEOs.com has listings for gig Jobs.";
		 $this->load->view('front/header',$title);
		 $this->load->view('front/gig');
		 $this->load->view('front/footer');
	 }

	 public function getgig()
   {
		 $array = file_get_contents('php://input');
		 $results =json_decode($array);
		 $page = $results->page;
		 $services = '';
		 $industry = '';
		 $country = '';
		 $duration = '';
		 if($results->services)
		 {
		 $services = $results->services;
	   }
		 if($results->industry)
		 {
		 $industry = $results->industry;
	   }
		 if($results->country)
		 {
		 $country = $results->country;
	   }
		 if($results->duration)
		 {
		 $duration = $results->duration;
	   }
		 $config = array();

		 $data['pcount'] = $this->common->count_findgig($services,$industry,$country,$duration);
		 $config["total_rows"] = $this->common->count_findgig($services,$industry,$country,$duration);
		 $config["per_page"] = 9;
		 $this->pagination->initialize($config);
		 if( $page <= 0 )
		 {
		 	$page = 1;
		 }
		 $start = ($page-1) * $config["per_page"];

		 if(!empty($page))
		 {
		 	$res = $this->common->getfindgig($services,$industry,$country,$duration,$start,$config["per_page"]);
		 }
		 if(!empty($res))
		 {
			 foreach($res as $k=>$r)
			 {
				 $img = $this->common->getrow('user_gig_images',array("gigId"=>$r->gigId));
				 $res[$k]->image = $img->image;
			 }
		 }

		 if($res)
		 {
		  $data['message'] ="true";
		  $data['result'] = $res;
		 }
		 else
		 {
		  $data['message'] ="false";
		  $data['result'] = '';
		 }

		 echo json_encode($data);
		 exit;
	 }

	 public function plan ($id)
	 {
		 $data['userId'] = $id;
		 $this->load->view('front/header');
		 $this->load->view('front/plan',$data);
		 $this->load->view('front/footer');
	 }

	 public function registerProceed()
	 {
			$array = file_get_contents('php://input');
			$results = json_decode($array);
			$results->userId = $results->userId;

			$result = $this->common->getrow('user',array('id'=>$results->userId));
			$resultm = $this->common->getrow('user_meta',array('u_id'=>$results->userId));


			$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
			$date =  $nowUtc->format('Y-m-d H:i:s');

			$logdata=array(
			'logType' =>'conversation',
			'logSubType' =>'link',
			'userId' =>$results->userId,
			'logReference' =>'activate-account',
			'logDate' =>$date,
			'logStatus' =>'1'
			);

			$log = $this->common->insert('user_log',$logdata);
			if($log)
			{
				$this->common->insert('user_custom_plan',$results);
			}
			if($log)
			{
			$this->common->update(array("userId"=>$results->userId),array("status"=>0),'admin_lead');
			if(!empty($resultm->name))
			{
			$detail['name'] = $resultm->name;
			}
			else
			{
			$detail['name'] = $resultm->c_name;
			}
			// $encryptemail=$this->encrypt->encode($result->email);
			$encryptemail=base64_encode($result->email);
			$detail['link'] = base_url().'account/activate/'.$encryptemail;
			$msg = $this->load->view('email/register_verification',$detail,true);
			$this->mailsend('Top-SEOs Email Verification',$result->email,$msg);
			}

			if ($log)
			{
			$msg1['success'] ='true';
			$msg1['message'] ='Register Successfully';
			}
			else
			{
			$msg1['success'] ='false';
			$msg1['message'] ='user not register';
			}
			echo json_encode($msg1);
			exit;
	}

	public function paymentSuccess()
	{
		$_POST['userId'] = $_POST['userId'];
		$paymentId = $_POST['razorpay_payment_id'];
		$amount = $_POST['totalAmount'];
		unset($_POST['razorpay_payment_id']);
		unset($_POST['totalAmount']);

		$result = $this->common->getrow('user',array('id'=>$_POST['userId']));
		$resultm = $this->common->getrow('user_meta',array('u_id'=>$_POST['userId']));


		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
		$date =  $nowUtc->format('Y-m-d H:i:s');

		$logdata=array(
		'logType' =>'conversation',
		'logSubType' =>'link',
		'userId' =>$_POST['userId'],
		'logReference' =>'activate-account',
		'logDate' =>$date,
		'logStatus' =>'0'
		);

		$log = $this->common->insert('user_log',$logdata);
		if($log)
		{
			$this->common->update(array("id"=>$_POST['userId']),array("is_active"=>1),'user');
			$planId = $this->common->insert('user_custom_plan',$_POST);
			$this->common->insert('custom_plan_payment',array("razorpay_payment_id"=>$paymentId,"userId"=>$_POST['userId'],"amount"=>$amount,"user_custom_planId"=>$planId[1]));
		}

		if($log)
		{
		$this->common->update(array("userId"=>$_POST['userId']),array("status"=>0),'admin_lead');
		if(!empty($resultm->name))
		{
		$detail['name'] = $resultm->name;
		}
		else
		{
		$detail['name'] = $resultm->c_name;
		}
		// $encryptemail=$this->encrypt->encode($result->email);
		// $detail['link'] = base_url().'account/activate/'.$encryptemail;
		// $msg = $this->load->view('email/register_verification',$detail,true);
		// $this->mailsend('Top-Seo Email Verification',$result->email,$msg);
		}

		if ($log)
		{
		$msg1['success'] ='true';
		$msg1['message'] ='Register Successfully';
		}
		else
		{
		$msg1['success'] ='false';
		$msg1['message'] ='user not register';
		}
		echo json_encode($msg1);
		exit;
	}

	public function checkmail()
	{
		$array = file_get_contents('php://input');
		$results = json_decode($array);

		$result = $this->common->getrow('user',array("email"=>$results->email));
		if($result)
		{
			$output['success'] = "false";
		}
		else
		{
		 $output['success'] = "true";
		}
		echo json_encode($output);
		exit;
	}

	public function entry()
	{
		$users = $this->common->getTable('user');
		$p = $this->common->getrow('custom_plan',array("customPackageId"=>1));

		if(!empty($users))
		{
			foreach($users as $u)
			{
			$rrrr =	$this->common->insert('user_custom_plan',array("userId"=>$u->id,"employee"=>$p->employeeMin,"project"=>$p->projectMin,"expense"=>$p->expenseMin,"invoice"=>$p->invoiceMin,"package"=>$p->packageMin,"portfolio"=>$p->portfolioMin,"testimonial"=>$p->testimonialMin,"casestudies"=>$p->casestudiesMin,"services"=>$p->servicesMin,"industry"=>$p->industryMin,"totalamount"=>0));
			}
		}
		if($rrrr)
		{
			echo "Done";
		}
		// $a = array("userId"=>$users[0]->id,"employee"=>$p->employeeMin,"project"=>$p->projectMin,"expense"=>$p->expenseMin,"invoice"=>$p->invoiceMin,"package"=>$p->packageMin,"portfolio"=>$p->portfolioMin,"testimonial"=>$p->testimonialMin,"casestudies"=>$p->casestudiesMin,"services"=>$p->servicesMin,"industry"=>$p->industryMin,"totalamount"=>0);
		//
		// $rrrr =	$this->common->insert('user_custom_plan',$a);

	}

	public function getgigService()
	{
		$allservices = $this->common->getTable('user_gig');
		$s = array();
		if(!empty($allservices))
		{
			foreach($allservices as $ser)
			{
				$s[] =$ser->servicesId;
			}
		}

		$services = array_unique($s);
		if(!empty($services))
		{
			$ser = $this->common->getInServices1('services','id',$services);
		}

		if(!empty($ser))
		{
			$msg['message'] = "true";
			$msg['result'] = $ser;
		}
		else
		{
			$msg['message'] = "false";
		}

		echo json_encode($msg);
	}

	public function getgigIndustry()
	{
		$allservices = $this->common->getTable('user_gig');
		$s = array();
		if(!empty($allservices))
		{
			foreach($allservices as $ser)
			{
				$s[] =$ser->industryId;
			}
		}

		$services = array_unique($s);
		if(!empty($services))
		{
			$ser = $this->common->getInServices1('practice_areas','id',$services);
		}

		if(!empty($ser))
		{
			$msg['message'] = "true";
			$msg['result'] = $ser;
		}
		else
		{
			$msg['message'] = "false";
		}

		echo json_encode($msg);
	}

	public function getgigCountry()
	{
		$allcountry = $this->common->getgigCountry();
		$c = array();

		if(!empty($allcountry))
		{
			foreach($allcountry as $count)
			{
				$c[] =$count->country;
			}
		}

		$country = array_unique($c);

		if(!empty($country))
		{
			$countries = $this->common->getIn('countries','id',$country);
		}

		if(!empty($countries))
		{
			$msg['message'] = "true";
			$msg['result'] = $countries;
		}
		else
		{
			$msg['message'] = "false";
		}

		echo json_encode($msg);
	}

	public function getgigDuration()
	{
		$duration = $this->common->getgigDuration();
		if($duration)
		{
			$msg['message'] = "true";
			$msg['result'] = $duration;
		}
		else
		{
			$msg['message'] = "false";
		}

		echo json_encode($msg);
	}

	public function notificationSave($data)
	{
		$this->common->insert('user_notification',$data);
	}

	public function getjobOpening()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$config = array();
		if(!empty($page))
		{
			 $data['pcount'] = $this->common->count_all_results('vacancy',array("userId"=>$results->userId,"vacancyStatus"=>1));
			 $config["total_rows"] = $this->common->count_all_results('vacancy',array("userId"=>$results->userId,"vacancyStatus"=>1));
		}

		$config["per_page"] = 8;
		$this->pagination->initialize($config);

		if( $page <= 0 )
		{
			$page = 1;
		}

		$start = ($page-1) * $config["per_page"];

		if(!empty($page))
		{
			$res = $this->common->getjobOpening(array("userId"=>$results->userId,"vacancyStatus"=>1),$start,$config["per_page"]);
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

	public function careers()
	{
		$title['title'] ="Job Vacancies | Search For Jobs | Online Job Search";
		$title['description'] ="Your next job or career is on Top-SEOs.com - A Leading career site with the latest jobs from Top Employers. Let's get to work! Build A Better Career with us.";
		$this->load->view('front/header',$title);
		$this->load->view('front/carerrs');
		$this->load->view('front/footer');
	}

	public function getcareers()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$page = $results->page;
		$config = array();
		$data['pcount'] = $this->common->count_careers($results->position,$results->skill,$results->experience,$results->vacancies,$results->location,$results->company,$results->industry);
		$config["total_rows"] = $this->common->count_careers($results->position,$results->skill,$results->experience,$results->vacancies,$results->location,$results->company,$results->industry);
		$config["per_page"] = 12;
		$this->pagination->initialize($config);
		if( $page <= 0 )
		{
		 $page = 1;
		}
		$start = ($page-1) * $config["per_page"];
		if(!empty($page))
		{
		 $res = $this->common->getcareers($results->position,$results->skill,$results->experience,$results->vacancies,$results->location,$results->company,$results->industry,$start,$config["per_page"]);
		}
		if($res)
		{
		 $data['message'] ="true";
		 $data['result'] = $res;
		}
		else
		{
		 $data['message'] ="false";
		 $data['result'] = '';
		}
		echo json_encode($data);
		exit;
	}


	public function jobvacanciesDetail($id)
	{
		 $a = explode("-",$id);
		 $c = count($a);
		 $id = $a[$c-1];
		 $data['result'] = $this->common->getrow('vacancy',array("vacancyId"=>$id));
		 if(!empty($data['result']))
		 {
		 $currency = $this->common->getuserlocalcurrency(array("userId"=>$data['result']->userId));
		 $data['company'] = $this->common->getrow('user_meta',array("u_id"=>$data['result']->userId));
	   }
     if(!empty($currency) && $currency->id)
		 {
		 $data['result']->currency = $currency->id;
	   }
		 if(!empty($data['result']))
		 {
		 $title['title'] = $data['result']->vacancyPosition. " , ". $data['result']->vacancyNoOfOpening . " Job Vacancies in ".$data['result']->vacancyLocation;
		 $title['description'] = $data['company']->c_name.", looking for ".$data['result']->vacancyPosition." in ".$data['result']->vacancyLocation." having " .$data['result']->vacancySkill. " with " .$data['result']->vacancyExperience. "years experience.";
	   }
		 else
		 {
		  $title['title'] = '';
		  $title['description'] = '';
		 }
		 $this->load->view('front/header',$title);
		 $this->load->view('front/jobvacanciesDetail',$data);
		 $this->load->view('front/footer');
	}

	public function jobapply()
	{
		$array = file_get_contents('php://input');
		$results =json_decode($array);
		$checkvacancy = $this->common->getrow('vacancy',array("vacancyId"=>$results->vacancyId));
    if(!empty($checkvacancy))
		{
			$check_email = $this->common->getrow('candidate',array("vacancyId"=>$results->vacancyId,"candidateEmail"=>$results->candidateEmail));
		 if(!empty($check_email))
	   {
			 $output['message'] = "already";
		 }
		 else
		 {
		 $results->candidateDateOfBirth = date("Y-m-d", strtotime($results->candidateDateOfBirth));
		 $insert = $this->common->insert('candidate',$results);

		  if($insert)
	    {
			$hr = $this->common->getSingleUser(array("us.parent"=>$results->userId,"us.access"=>5));
			$company = $this->common->getrow('user_meta',array("u_id"=>$results->userId));
			$vacancy = $this->common->getrow('vacancy',array("vacancyId"=>$results->vacancyId));
 			$detail['name']  = $results->candidateName;
 			$detail['company']  = $company->c_name;
 			$detail['hr']  = $hr->name;
 			$detail['vacancyPosition']  = $vacancy->vacancyPosition;
 			$message = $this->load->view('email/CandidatejobvacancyApply',$detail,true);
 			$mail =	 $this->mailsend('Vacancy Applied',$results->candidateEmail,$message);
		}
		if($insert)
		{
			$hr = $this->common->getSingleUser(array("us.parent"=>$results->userId,"us.access"=>5));

			$vacancy = $this->common->getrow('vacancy',array("vacancyId"=>$results->vacancyId));
 			$detail1['name']  = $hr->name;
 			$detail1['vacancyPosition']  = $vacancy->vacancyPosition;
 			$detail1['result']  = $results;
 			$message = $this->load->view('email/hrjobapplied',$detail1,true);
 			$mail =	 $this->mailsend('Vacancy Applied',$hr->email,$message);
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
	 }
	 else
	 {
	   $output['message'] = "expired";
	 }
		echo json_encode($output);
		exit;

	}

	public function getcareersCompany()
	{
		$res = $this->common->getCareersCompany();
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

	public function stopautomaticallytask()
	{
		$nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
	  $date = $nowUtc->format('Y-m-d H:i:s');

		 $alltask =  $this->common->get('todoList',array("status"=>5));
		 if(!empty($alltask))
		 {
			 foreach($alltask as $t)
			 {
				 $res = $this->common->getrow('user_onlinelog',array("u_id"=>$t->assignedTo));
				 $time = strtotime($date) - strtotime($res->timeStamp);

				 if($time > 60)
				 {
					 $minutes = 0;
					 $lasttimer = $this->common->getOneRow('todoList_billing',array("userId"=>$t->assignedTo,"todoListId"=>$t->id,"taskId"=>$t->taskId),'todolist_billingId',"desc");
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
					 $r['status'] = 7;

				  $updates = $this->common->update(array("id"=>$t->id),array("status"=>7,"completeDate"=>$date,"ended"=>1),'todoList');

					if($updates)
					{
					 $update = $this->common->update(array("todolist_billingId"=>$lasttimer->todolist_billingId),$r,'todoList_billing');
				  }

				 }

			 }
		 }
	}

	public function checkVacancyApplied()
  {
		$array = file_get_contents('php://input');
		$results =json_decode($array);

		$result = $this->common->getrow('candidate',array("userId"=>$results->userId,"vacancyId"=>$results->vacancyId));
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

	public function currencyExchange()
	{
			$req_url = 'https://v6.exchangerate-api.com/v6/a464df4452b28fb1f7983d37/latest/USD';
			$response_json = file_get_contents($req_url);
			if(false !== $response_json) {
			try {
			    $response = json_decode($response_json);
			    if('success' === $response->result)
					{
						echo "<pre>";
     			  print_r($response);
			    }

			   }
			catch(Exception $e)
			 {

				}
			}
	}

	public function api()
	{
			$req_url = 'http://api.currencylayer.com/live?access_key=031baf11c79af954ce1448577e48174a&format=1';
			$response_json = file_get_contents($req_url);
			if(false !== $response_json) {
			try {
			    $response = json_decode($response_json);

						echo "<pre>";
     			  print_r($response);


			   }
			catch(Exception $e)
			 {

				}
			}
	}

	 // public function decode($id)
	 // {
		//  $key = 'Test123456678';
	 //
		// return $decoded = JWT::decode($jwt, base64_decode(strtr($key, '-_', '+/')), ['HS256']);
	 // }

	 // public function encode($token_payload)
	 // {
		//  // require 'vendor/autoload.php';
	 //
		//  // use \Firebase\JWT\JWT;
		//  // This is your client secret
		//  $key = 'Test123456678';
		//  // This is your id token
		// return $jwt = JWT::encode($token_payload, base64_decode(strtr($key, '-_', '+/')), 'HS256');
	 //
	 // }


	 public function dectiveUserCompleteResignation()
   {
		 $nowUtc = new DateTime( 'now',  new DateTimeZone( 'UTC' ) );
 	   $date = $nowUtc->format('Y-m-d');

      $resignation = $this->common->get('resignation',array("status"=>1,"cron"=>0));

			if(!empty($resignation))
			{
				foreach($resignation as $r)
				{
					if($r->leaveDate < $date)
					{
            $this->common->update(array("id"=>$r->employeeId),array("is_active"=>0),'user');
						$this->common->update(array("id"=>$r->id),array("cron"=>1),'resignation');

					}
				}
			}
   }







}
