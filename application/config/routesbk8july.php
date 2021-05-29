<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error';
$route['translate_uri_dashes'] = FALSE;




require_once( BASEPATH .'database/DB.php' );
$db =& DB();


 $db->select('country');
 $db->group_by('country');
 $query = $db->get('user_meta');
 $c = $query->result();
  $g =array();
  foreach($c as $i)
  {
    $g[] = $i->country;
  }

  $db->select('state');
  $db->group_by('state');
  $query = $db->get('user_meta');
  $st = $query->result();
   $s =array();
   foreach($st as $i)
   {
     $s[] = $i->state;
   }

 $countryIds = array_unique($g);
 $stateIds = array_unique($s);

 $db->select('id,name');
 $db->where_in('id',$countryIds);
 $query = $db->get('countries');
 $countrys = $query->result();

 $db->select('id,name');
 $db->where_in('id',$stateIds);
 $query = $db->get('states');
 $states = $query->result();

  // echo "<pre>";
  // print_r($states);
  // die;

 $db->select('pra.name as industry,pra.id as industryId,ser.name as service,ser.id as serviceId');
 $db->join('practice_areas as pra','link.industryId = pra.id');
 $db->join('services as ser','link.serviceId = ser.id');
 $db->where('pra.status',1);
 $query1 = $db->get('practice_service_link as link');
 $industry = $query1->result();


 //
 $db->select('ser.name as service,ser.id,h.url as link');
 $db->join('services as ser','us.servicesId = ser.id');
 $db->join('hire_ranking_content as h','h.servicesId = ser.id','left');
 $db->where('ser.status',1);
 $db->group_by('us.servicesId');
 $query3 = $db->get('user_services as us');
 $services = $query3->result();

 $db->select('b.title,b.blogId,b.url');
 $query8 = $db->get('blog as b');
 $db->where('status',1);
 $blogs = $query8->result();


// if(!empty($services))
// {
//    foreach($services as $key=>$service)
//    {
//       $db->select('h.url');
//       $db->where('servicesId',$service->id);
//       $query8 = $db->get('hire_ranking_content as h');
//       $url1 = $query8->row();
//       if(!empty($url1->url))
//       {
//        $services[$key]->link = $url1->url;
//       }
//
//    }
//
// }

foreach($states as $st)
{
foreach($countrys as $count)
{
  foreach($industry as $ind)
  {
    foreach($services as $ser)
    {
      $indu = str_replace(' ', '-',strtolower($ind->industry));
    //  $se = str_replace(' ', '-',strtolower($ind->service));

      $service = str_replace(' ', '-',strtolower($ser->service));
      $country = str_replace(' ', '-',strtolower($count->name));
      $state = str_replace(' ', '-',strtolower($st->name));



// $route['best-'.$indu.'-'.$service.'-companies-in-'.$row->city.'-'.$row->state.'-'.$row->country] = 'Home/search/'.$row->country.'/'.$row->state.'/'.$row->city.'/'.$ind->id.'/'.$ser->id;
// $route['best-'.$indu.'-'.$service.'-companies-in-'.$row->city.'-'.$row->country] = 'Home/search/'.$row->country.'/state/'.$row->city.'/'.$ind->id.'/'.$ser->id;
// $route['best-'.$indu.'-'.$service.'-companies-in-'.$row->country] = 'Home/search/'.$row->country.'/state/city/'.$ind->id.'/'.$ser->id;
// $route['best-'.$indu.'-'.$service.'-companies'] = 'Home/search/country/state/city/'.$ind->id.'/'.$ser->id;
// $route['best-'.$service.'-companies-in-'.$row->country] = 'Home/search/'.$row->country.'/state/city/industries/'.$ser->id;
if(!empty($ser->link))
{
  $custom_ser = str_replace(' ', '-',strtolower($ser->link));
  $route['hire/'.$custom_ser] = 'Home/searchfilter/'.$ser->id;
}
else
{
$route['hire/'.$service] = 'Home/searchfilter/'.$ser->id;
}

$route['best-'.$service.'-companies-in-'.$country] = 'Home/search/'.$ind->industryId.'/'.$ser->id.'/'.$count->id.'/state';
$route['best-'.$service.'-companies'] = 'Home/search/industry/'.$ser->id.'/country/state';
$route['best-'.$service.'-companies-in-'.$country] = 'Home/search/industry/'.$ser->id.'/'.$count->id.'/state';
$route['best-'.$indu.'-'.$service.'-companies'] = 'Home/search/'.$ind->industryId.'/'.$ser->id.'/country/state';
$route['best-'.$indu.'-'.$service.'-companies-in-'.$country] = 'Home/search/'.$ind->industryId.'/'.$ser->id.'/'.$count->id.'/state';
$route['best-'.$indu.'-companies'] = 'Home/search/'.$ind->industryId.'/service/country/state';
// state wise
$route[$country.'/best-'.$service.'-companies-in-'.$state] = 'Home/search/industry/'.$ser->id.'/'.$count->id.'/'.$st->id;
$route[$country.'/best-'.$indu.'-'.$service.'-companies-in-'.$state] = 'Home/search/'.$ind->industryId.'/'.$ser->id.'/'.$count->id.'/'.$st->id;

        }
      }
    }
 }
    // echo "<pre>";
    // print_r($route);
    // die;

$db->select('ser.name as service,ser.id');
$db->join('services as ser','j.value = ser.id');
$db->where('j.type','service');
$db->where('ser.status',1);
$db->group_by('j.value');
$query3 = $db->get('job_meta as j');
$ser = $query3->result();

 foreach($ser as $s)
 {
   $li = str_replace(' ', '-',strtolower($s->service));
   $route['search='.$li] = "home/jobSearch/".$s->id;
 }

// blog route
// if(!empty($blogs))
// {
//   foreach($blogs as $b)
//   {
//     if(isset($b->url))
//     {
//       $li = str_replace(' ', '-',strtolower($b->url.'-'.$b->blogId));
//     }
//     else
//     {
//       $li = str_replace(' ', '-',strtolower($b->url.'-'.$b->blogId));
//     }
//    $route[$li] = "home/blogDetail/".$b->blogId;
//   }
// }
 // blog route
// echo "<pre>";
// print_r($route);
// die;

/////////profile routes start
// $query = $db->select("um.name,um.u_id");
// $query = $db->from('user as us');
// $query = $db->join('user_meta as um','um.u_id = us.id');
// $query = $db->where('type','3');
// $query = $db->where('is_active ','1');
// $query = $db->get();
// $result = $query->result();
// foreach($result as $row)
// {
//   $name = str_replace(' ','-',strtolower($row->name.'-'.$row->u_id));
//   $route[$name] = 'home/freelancerProfile/'.$row->u_id;
// }
//
// $query = $db->select("um.c_name,um.u_id");
// $query = $db->from('user as us');
// $query = $db->join('user_meta as um','um.u_id = us.id');
// $query = $db->where('type','2');
// $query = $db->where('is_active ','1');
// $query = $db->get();
// $result2 = $query->result();
// foreach($result2 as $row)
// {
//   $name = str_replace(' ','-',strtolower($row->c_name.'-'.$row->u_id));
//   $route[$name] = 'home/freelancerProfile/'.$row->u_id;
// }



// $query1 = $db->select("um.name,um.c_name,um.u_id");
// $query1 = $db->from('user as us');
// $query1 = $db->join('user_meta as um','um.u_id = us.id');
// $query1 = $db->where('type','4');
// $query = $db->where('is_active ','1');
// $query1 = $db->get();
// $result1 = $query1->result();
// foreach($result1 as $row)
// {
// $client = str_replace(' ','-',strtolower($row->name.'-'.$row->u_id));
// $route[$client] = 'home/clientProfile/'.$row->u_id;
// }

// $query2 = $db->select("jobTitle,jobId");
// $query2 = $db->from('user_job');
// $query2 = $db->get();
// $result4 = $query2->result();
// foreach($result4 as $row)
// {
// $title = str_replace(' ','-',strtolower($row->jobTitle.'-'.$row->jobId));
// $route['job/'.$title] = 'home/singleJob/'.$row->jobId;
// }
   // echo "<pre>";
   // print_r($route);
   //  die;

$route['job/(:any)'] = 'home/singleJob/$1';
$route['profile/(:any)'] = 'home/freelancerProfile/$1';
$route['clientprofile/(:any)'] = 'home/clientProfile/$1';
$route['post/(:any)'] = "home/blogDetail/$1";

///////profile routes end

// cron jobs

$route['linkedapproved'] = "home/linkedapproved";
$route['ClientSuccessScore'] = "home/ClientSuccessScoreUpdate";
$route['freelancerSuccessScore'] = "home/FreelancerSuccessScoreUpdate";
$route['expiredoffer'] ="home/expired_joboffer";
$route['expiredjob'] ="home/expired_job";
$route['services_ranking'] ="home/servicesRanking";
$route['linkedinReviewRank'] = "home/linkedinReviewRank";
$route['blogmail'] = "home/blogmail";
$route['profileupdatemail'] ="home/profileupdatemail";
$route['verificationemail'] ="home/verificationemail";

// cron jobs

$route['getservices'] = "home/getAllService";
$route['getcountry'] = "home/getAllCountry";
$route['getindustry'] = "home/getAllIndustry";
$route['user-profile/(:any)'] = "home/user_profile/$1";
$route['request_form/(:any)'] = "home/request_form/$1";
$route['contact_form'] =  "home/contact_form";
$route['request/save'] =  "home/request_save";
$route['feedback/save'] = "home/feedback_save";

// Front End
$route['getfreelancer'] = "home/getfreelancer";
$route['register'] = "home/register";
$route['register/(:any)'] = "home/register/$1";
$route['register-user'] = "home/user_register";
$route['account/activate/(:any)'] = "home/account_activate/$1";
$route['activation/expired'] = "home/activation_expired";
$route['client/(:any)'] = "home/client/$1";
$route['login'] = "home/client";
$route['loginUser'] = "home/login";
$route['logout'] = "home/logout";
$route['joboffer'] = "home/joboffer";
$route['contact'] = "home/contact";
$route['getstate'] ="home/getstate";
$route['getcity'] ="home/getcity";
$route['imageUpload'] ="home/imageUpload";
$route['chatAttachment'] = "home/chatAttachment";
$route['gettype'] = "home/getUserType";
$route['requeststatus'] = "home/checkRquestStatus";
$route['forgot-password'] ="home/forgot_password";
$route['email-recovery'] ="home/email_recovery";
$route['new_password/(:any)'] = "home/new_password/$1";
$route['password_update'] = "home/password_update";
$route['forgotpassword/expired'] = "home/forgot_expired";
$route['clientjobs'] = "home/clientjobs";
$route['onlinesave'] = "home/onlinesave";
$route['getprofile'] ="home/getprofile";
$route['getlinkedinreview'] = "home/getAlllinkedin_review";

$route['clientHireRate'] ="home/ClientHireRate";

$route['getpricing'] ="home/getpricing";
$route['gettestimonial'] ="home/gettestimonial";
$route['getcasestudy'] = "home/getCaseStudy";
$route['getuserservice'] = "home/getuserservice";
$route['getuserIndustry'] ="home/getuserIndustry";
$route['getteam'] ="home/getteam";
$route['profile_listing'] = "home/profile_listing";
$route['requestquote'] = "home/request_save";
$route['getkeypeople'] ="home/getkeypeople";
$route['getcurrentjobs'] ="home/getcurrentjobs";
$route['getendedContract'] = "home/getendedContract";
$route['getTeamOne'] = "home/getTeamOne";
$route['getportfolio'] = "home/getportfolio";
$route['getoneportfolio'] = "home/getoneportfolio";
$route['getclient'] = "home/getclient";
$route['getjobsuccess'] ="home/getjobSuccess";
$route['paypal-redirect'] = "home/paypal_redirect";

$route['getclientfreelancer'] ="home/getclientfreelancer";
$route['getActiveProjects'] ="home/getActiveProjects";
$route['getclientscore'] = "home/getclientscore";
$route['clientcurrentjobs'] ="home/clientcurrentjobs";
$route['clientendedContract'] = "home/clientendedContract";
$route['clientspend'] = "home/clientspend";
$route['freelancerEarning'] = "home/freelancerEarning";
$route['getClientOpenJob'] = "home/getClientOpenJob";
//jobs route
$route['getjobdetail'] ="home/getjobdetail";
$route['proposalAttachment'] ="home/proposalAttachment";
$route['proposalSubmit'] ="home/proposalSubmit";
$route['proposalCheck'] = "home/proposalCheck";
$route['getprofileListingRankingContent'] = "home/getprofileListingRankingContent";
$route['getsearchFilterRankingContent'] = "home/getsearchFilterRankingContent";
$route['getlinkedServices'] ="home/getlinkedServices";
//find work
$route['find-work'] = "home/find_work";
$route['getfindWorks'] ="home/getfindWorks";
$route['getskillbyJobs'] = "home/getskillbyJobs";
$route['getRankingSingleProfile'] = "home/getRankingSingleProfile";
$route['company_review'] ="home/companyReview";

$route['getcurrency'] ="home/getcurrency";
$route['blog'] ="home/blog";
$route['blog/(:any)'] ="home/blog/$1";
$route['questionType'] ="home/getquestionType";
$route['question'] ="home/getquestion";
$route['reviewquestion'] ="home/reviewquestion";
$route['contact-us'] ="home/contactus";
$route['contactsave'] ="home/contactsave";

$route['membership'] ="home/membership";
$route['supportemail'] ="home/supportemail";

$route['conference'] = "home/conference";
$route['conference/(:any)'] = "home/conference/$1";
$route['conferencesave'] = "home/conferencesave";
$route['conference/detail/(:any)'] = "home/conference_detail/$1";

$route['blog-add'] = "home/blog_add";
$route['blogSave'] = "home/blogSave";

// $route['404'] = "home/error";

//////////////Client route start
$route['client-dashboard'] = "client/dashboard";
$route['client-chat'] ="client/chat";
$route['client-getperson'] = "client/getperson";
$route['client-getmessage/(:any)'] = "client/getmessage/$1";
$route['client-getmessage/(:any)/(:any)'] = "client/getmessage/$1/$2";
$route['client-getmessage/(:any)/(:any)/(:any)'] = "client/getmessage/$1/$2/$3";
$route['client-getsession'] ="client/getsession";
$route['client-request'] ="client/friendrequest";
$route['client-messageSend'] ="client/messageSend";
$route['client-messageUpdate'] = "client/messageUpdate";
$route['client-messageDeleted'] ="client/messageDeleted";


$route['client-profile'] ="client/client_profile";
$route['client-profile/save'] ="client/client_profileSave";
$route['client-profile/update/(:any)'] ="client/client_profileUpdate/$1";

$route['client-job'] = "client/job_post";
$route['client-job-detail/(:any)'] = "client/jobdetail/$1";
$route['client-getjobdetail'] = "client/getjobdetail";
$route['client-getjobs'] = "client/getjobs";
$route['client-job/(:any)'] = "client/job_detail/$1";
$route['client-create-job'] = 'client/createjob';
$route['client-job-proposal/(:any)'] ="client/jobproposal/$1";
$route['client-getproposal'] ="client/getproposal";
$route['client-proposal-detail/(:any)'] = "client/proposal_detail/$1";
$route['client-getproposaldetail'] = "client/getproposaldetail";


$route['client-contract'] = "client/contract";
$route['client-getcontract'] = "client/getcontract";
$route['client-contract/(:any)'] = "client/contractdetail/$1";
$route['client-getcontractdetail'] = "client/getcontractdetail";
$route['client-milestoneRequest'] = "client/milestoneRequest";
$route['client-milestone-start'] ="client/milestoneStart";
$route['client-comment-submit'] ="client/logcomment";
$route['client-milestone-review'] ="client/milestone_review";

$route['client-chatpersonFilter'] ="client/chatpersonFilter";
$route['client-notification'] = "client/notification";
$route['client-getnotification'] = "client/getNotification";
$route['client-getOneNotification'] = "client/getOneNotification";

$route['client-password'] = "client/password";
$route['client-password_update'] ="client/password_update";

///review
$route['client-review'] ="client/client_review";
$route['client-getreview'] = "client/getallreview";
$route['client-getclientReview'] ="client/getclientReview";
//$route['client-event'] = "client/event";
$route['client-event/(:any)'] = "client/event/$1";
$route['client-getuser'] = "client/getuser";
$route['client-eventsave'] = "client/eventSave";
$route['client-getevent'] ="client/getevent";
///review
$route['client-payment'] ="client/payment";
$route['client-paypal'] ="client/paypal";
$route['client-paypalipn'] ="client/paypalIpn";
$route['client-test'] ="client/test";
$route['client-create-milestone'] = "client/create_milestone";

$route['client-getservices'] = "client/getservice";
$route['client-EditJob'] ="client/editjob";
$route['client-milestone-payment/(:any)/(:any)'] ="client/milestone_payment/$1/$2";
$route['client-update-job'] = 'client/Updatejob';

$route['client-hire'] ="client/hireFreelancer";
$route['client-freelancer-contact'] ="client/freelancerContact";
$route['client-payment-delete'] ="client/Deletepayment";
$route['client-authorize'] = "client/authorize";
$route['client-authorize-payment'] ="client/authorize_payment";
$route['client-support-chat'] = "client/support";

// ////////////////////client routes End


/////////////////////freelancer
$route['freelancer/dashboard'] = "freelancer/dashboard";
$route['freelancer/getsession'] ="freelancer/getsession";
$route['freelancer/job'] = 'freelancer/job';
$route['freelancer/job/(:any)'] = 'freelancer/jobdetail/$1';
$route['freelancer/getjobs'] ='freelancer/getjobs';
$route['freelancer/getjobdetail'] ='freelancer/getjobdetail';
$route['freelancer/jobStatus'] ='freelancer/jobStatus';
$route['freelancer/jobMessage'] ='freelancer/jobMesaage';
$route['freelancer/contract/(:any)'] = "freelancer/contractdetail/$1";
$route['freelancer/getcontractdetail'] = "freelancer/getcontractdetail";
$route['freelancer/taskRequest'] = "freelancer/taskRequest";
$route['freelancer/getlog/(:any)/(:any)'] = "freelancer/getContractlog/$1/$2";
$route['freelancer/getlog/(:any)/(:any)/(:any)'] = "freelancer/getContractlog/$1/$2/$3";
$route['freelancer/getlog/(:any)/(:any)/(:any)/(:any)'] = "freelancer/getContractlog/$1/$2/$3/$4";
$route['freelancer/logcomment'] = "freelancer/logcomment";
//chat
$route['freelancer/chat'] ="freelancer/chat";
$route['freelancer/getperson'] = "freelancer/getperson";
$route['freelancer/getmessage/(:any)/(:any)'] = "freelancer/getmessage/$1/$2";
$route['freelancer/getmessage/(:any)/(:any)/(:any)'] = "freelancer/getmessage/$1/$2/$3";
$route['freelancer/getmessage/(:any)/(:any)/(:any)/(:any)'] = "freelancer/getmessage/$1/$2/$3/$4";
$route['freelancer/friendrequest'] ="freelancer/friendrequest";
$route['freelancer/messageSend'] ="freelancer/messageSend";
$route['freelancer/messageUpdate'] = "freelancer/messageUpdate";
$route['freelancer/messageDeleted'] ="freelancer/messageDeleted";
$route['freelancer/chatpersonFilter'] ="freelancer/chatpersonFilter";
/////////////////////freelancer

///notification
$route['freelancer/notification'] = "freelancer/notification";
$route['freelancer/getnotification'] = "freelancer/getNotification";
$route['freelancer/getOneNotification'] = "freelancer/getOneNotification";
$route['freelancer/notification/status'] = "freelancer/notification_status";

$route['freelancer/services'] = "freelancer/services";
$route['freelancer/servicesAdd'] ="freelancer/serviceAdd";
$route['freelancer/getservice'] ="freelancer/getservice";
$route['freelancer/getindustry'] ="freelancer/getindustry";
$route['freelancer/saveService'] = "freelancer/saveService";
$route['freelancer/userservices'] = "freelancer/userservices";
$route['freelancer/userindustry'] = "freelancer/userindustry";


$route['freelancer/profile'] = "freelancer/profile";
$route['freelancer/getprofile'] ="freelancer/getprofile";
$route['freelancer/profileupdate'] = "freelancer/profileupdate";
$route['freelancer/getcountry'] ="freelancer/getcountry";
$route['freelancer/logoupload'] ="freelancer/logoupload";
$route['freelancer/logo'] ="freelancer/freelancerlogoupload";
$route['freelancer/getstate'] ="freelancer/getstate";
$route['freelancer/getcity'] ="freelancer/getcity";

///testimonial
$route['freelancer/testimonial/add'] = "freelancer/testimonial_add";
$route['freelancer/testimonial/save'] = "freelancer/testimonial_save";
$route['freelancer/testimonial'] = "freelancer/testimonial";
$route['freelancer/testimonial_logoupload'] ="freelancer/testimonial_logoupload";
$route['freelancer/testimonial_delete'] = "freelancer/testimonial_delete";
$route['freelancer/testimonial_edit'] ="freelancer/testimonial_edit";
$route['freelancer/testimonial_update'] ="freelancer/testimonial_update";
///case study
$route['freelancer/casestudy'] ="freelancer/casestudy";
$route['freelancer/casestudySave'] ="freelancer/casestudySave";
$route['freelancer/getcasestudy'] = "freelancer/getcasestudy";
$route['freelancer/casestudy_upload'] = "freelancer/casestudy_upload";
$route['freelancer/case_study_delete'] = "freelancer/case_study_delete";
///// case study
//pricing
$route['freelancer/service_pricing'] ="freelancer/service_pricing";
$route['freelancer/service_pricingSave'] ="freelancer/service_pricingSave";
$route['freelancer/getservice_pricing'] = "freelancer/getservice_pricing";
$route['freelancer/service_pricing_delete'] = "freelancer/service_pricing_delete";
//pricing

//team
//pricing
$route['freelancer/team'] ="freelancer/team";
$route['freelancer/teamSave'] ="freelancer/teamSave";
$route['freelancer/getteam'] = "freelancer/getteam";
$route['freelancer/team_delete'] = "freelancer/team_delete";
$route['freelancer/team_imageupload'] = "freelancer/team_imageupload";
$route['freelancer/teamStatus'] = "freelancer/teamStatus";
$route['freelancer/editteam'] = "freelancer/editteam";
$route['freelancer/updateteam'] = "freelancer/updateTeam";
$route['freelancer/getActiveContract'] = "freelancer/getActiveContract";

//password
$route['freelancer/password'] = "freelancer/password";
$route['freelancer/password_update'] ="freelancer/password_update";

$route['freelancer/milestoneRequest'] = "freelancer/milestoneRequest";

$route['freelancer/review'] = "freelancer/review";
$route['freelancer/getreview'] = "freelancer/getallreview";
$route['freelancer/getfreelancerReview'] ="freelancer/getfreelancerReview";
//team

// service brief
$route['freelancer/service_briefing'] ="freelancer/service_briefing";
$route['freelancer/getservice_info'] = "freelancer/getservice_info";
$route['freelancer/service_infoSave'] = "freelancer/service_infoSave";
///notification

///offline request
$route['freelancer/request'] = "freelancer/request";
$route['freelancer/getrequest'] = "freelancer/getrequest";

$route['freelancer/team_profile'] ="freelancer/team_profile";
$route['freelancer/getuserprofile'] ="freelancer/getuser_profile";
$route['freelancer/team_certificate'] ="freelancer/team_certificate";
$route['freelancer/teamProfileUpdate'] = "freelancer/teamProfileUpdate";
$route['freelancer/teamResend'] = "freelancer/teamResend";
$route['freelancer/serviceSearch'] ="freelancer/serviceSearch";
$route['freelancer/industrySearch'] ="freelancer/industrySearch";

//portfolio
$route['freelancer/portfolio'] = "freelancer/portfolio";
$route['freelancer/getportfolio'] = "freelancer/getportfolio";
$route['freelancer/portfolioImage'] = "freelancer/portfolioImage";
$route['freelancer/portfolioSave'] = "freelancer/portfolioSave";
$route['freelancer/portfolioDelete'] ="freelancer/portfolio_delete";
$route['freelancer/portfolioedit'] ="freelancer/portfolio_edit";
$route['freelancer/portfolioupdate'] ="freelancer/portfolio_update";

$route['freelancer/account'] = "freelancer/account";
$route['freelancer/getaccount'] ="freelancer/getaccount";
$route['freelancer/accountUpdate'] ="freelancer/accountUpdate";

$route['freelancer/paypal'] ="freelancer/paypal";

$route['freelancer/payment'] ="freelancer/payment";
$route['freelancer/payment-delete'] ="freelancer/Deletepayment";

$route['freelancer/proposal'] ="freelancer/proposal";
$route['freelancer/getproposal'] ="freelancer/getproposal";
$route['freelancer/getproposaldetail'] ="freelancer/getproposaldetail";
$route['freelancer/authorize'] ="freelancer/authorize";
$route['freelancer/authorize-payment'] ="freelancer/authorize_payment";

$route['freelancer/support-chat'] = "freelancer/support_chat";

$route['freelancer/membership'] = "freelancer/membership";
$route['freelancer/membership-payment/(:any)/(:any)'] = "freelancer/membership_payment/$1/$2";

$route['freelancer/requestServiceSave'] = "freelancer/requestServiceSave";

$route['freelancer/getsuggestion'] = "freelancer/getsuggestion";

// $db->select('*');
// $query2 = $db->get('user_job');
// $jobs = $query2->result();
//  foreach($jobs as $job)
//  {
//    $name = str_replace(' ','-',strtolower($job->jobTitle.'-'.$job->jobId));
//    $route[$name] = 'home/jobdetail/'.$job->jobId;
//
//  }
 // echo "<pre>";
 // print_r($route);
 // die;



// admin routes
$route['admin'] = "admin/index";
$route['admin/login'] = "admin/login";
$route['admin/dashboard'] = "admin/dashboard";
$route['admin/freelancer'] = "admin/allfreelancer";
$route['admin/client'] = "admin/allclient";
$route['admin/getfreelancer'] = "admin/getfreelancer";
$route['admin/getclient'] = "admin/getclient";
$route['admin/userStatus'] = "admin/allUserStatus";
$route['admin/client/job/(:any)'] = "admin/clientjobs/$1";
$route['admin/getclientjob'] = "admin/getclientjob";
$route['admin/freelancer/job/(:any)'] = "admin/freelancerjobs/$1";
$route['admin/getfreelancerjob'] = "admin/getfreelancerjob";
$route['admin/userprofile'] = "admin/userprofile";

$route['admin/industries'] = "admin/industries";
$route['admin/getindustry'] ="admin/getindustry";
$route['admin/deleteindustry'] ="admin/deleteindustries";
$route['admin/saveindustry'] ="admin/saveindustry";

$route['admin/services'] = "admin/services";
$route['admin/getservices'] ="admin/getservices";
$route['admin/deleteservices'] ="admin/deleteservices";
$route['admin/saveservices'] ="admin/saveservices";
$route['admin/editservices'] ="admin/editservices";
$route['admin/updateservices'] ="admin/updateservices";

$route['admin/allindustries'] = "admin/allindustries";
$route['admin/allservices'] = "admin/allservices";
$route['admin/editindustry'] = "admin/editindustry";
$route['admin/savelinkedIndustry'] ="admin/savelinkedIndustry";

$route['admin/ranking-content'] = "admin/ranking_content";
$route['admin/ranking-content-add']="admin/ranking_content_add";
$route['admin/getrankingContent'] = "admin/getrankingContent";
$route['admin/allcountry'] = "admin/allcountry";
$route['admin/rankingContentSave'] ="admin/rankingContentSave";
$route['admin/rankingContentdelete'] ="admin/rankingContentdelete";
$route['admin/EditRankingContent'] = "admin/EditRankingContent";
$route['admin/RankingContentUpdate'] = "admin/RankingContentUpdate";


$route['admin/hire-ranking-content'] = "admin/Hire_ranking_content";
$route['admin/getHireRankingContent'] ="admin/getHireRankingContent";
$route['admin/HireRankingContentSave'] ="admin/HireRankingContentSave";
$route['admin/deleteHireContent'] ="admin/deleteHireContent";
$route['admin/EditHireRankingContent'] ="admin/EditHireRankingContent";
$route['admin/HireRankingContentUpdate'] = "admin/HireRankingContentUpdate";

$route['admin/top-industry'] = "admin/top_industry";
$route['admin/getTopIndustry'] ="admin/getTopIndustry";
$route['admin/TopIndustrySave'] ="admin/TopIndustrySave";
$route['admin/deleteTopIndustry'] ="admin/deleteTopindustry";
$route['admin/EditTopIndustry'] ="admin/EditTopIndustry";
$route['admin/UpdateTopIndustry'] = "admin/UpdateTopIndustry";
$route['admin/topindustryImage'] = "admin/topindustryImage";

$route['admin/currency'] = "admin/currency";
$route['admin/getcurrency'] ="admin/getcurrency";
$route['admin/currencySave'] ="admin/currencySave";
$route['admin/currencydelete'] ="admin/currencyDelete";
$route['admin/currencyEdit'] ="admin/currencyEdit";
$route['admin/currencyUpdate'] = "admin/currencyUpdate";

$route['admin/blog'] = "admin/blog";
$route['admin/getblog'] ="admin/getblog";
$route['admin/blogSave'] ="admin/blogSave";
$route['admin/blogdelete'] ="admin/blogDelete";
$route['admin/blogEdit'] ="admin/blogEdit";
$route['admin/blogUpdate'] = "admin/blogUpdate";
$route['admin/blogImage'] = "admin/blogImage";
$route['admin/blogStatus'] ="admin/blogStatus";
// category
$route['admin/category'] = "admin/category";
$route['admin/getcategory'] ="admin/getcategory";
$route['admin/blogcategory'] ="admin/blogcategory";
$route['admin/blogcategory'] ="admin/categoryDelete";
$route['admin/categoryEdit'] ="admin/categoryEdit";
$route['admin/categoryUpdate'] = "admin/categoryUpdate";
$route['admin/categoryImage'] = "admin/categoryImage";

$route['admin/allcategory'] = "admin/allcategory";
//category

// testmonial
$route['admin/testimonial'] = "admin/testimonial";
$route['admin/gettestimonial'] ="admin/gettestimonial";
$route['admin/testimonialSave'] ="admin/testimonialSave";
$route['admin/testimonialdelete'] ="admin/testimonialDelete";
$route['admin/testimonialEdit'] ="admin/testimonialEdit";
$route['admin/testimonialUpdate'] = "admin/testimonialUpdate";
$route['admin/testimonialImage'] = "admin/testimonialImage";

//testimonial



// How it works
$route['admin/how-it-works'] = "admin/how_itworks";
$route['admin/getworks'] ="admin/getworks";
$route['admin/worksSave'] ="admin/worksSave";
$route['admin/worksdelete'] ="admin/worksDelete";
$route['admin/worksEdit'] ="admin/worksEdit";
$route['admin/worksUpdate'] = "admin/worksUpdate";
$route['admin/worksImage'] = "admin/worksImage";

//how it works

// question type
$route['admin/questionType'] = "admin/questionType";
$route['admin/getquestionType'] ="admin/getquestionType";
$route['admin/questionTypeSave'] ="admin/questionTypeSave";
$route['admin/questionTypedelete'] ="admin/questionTypeDelete";
$route['admin/questionTypeEdit'] ="admin/questionTypeEdit";
$route['admin/questionTypeUpdate'] = "admin/questionTypeUpdate";
// question type

// question
$route['admin/allquestionType'] ="admin/allquestionType";
$route['admin/question'] = "admin/question";
$route['admin/getquestion'] ="admin/getquestion";
$route['admin/questionSave'] ="admin/questionSave";
$route['admin/questiondelete'] ="admin/questionDelete";
$route['admin/questionEdit'] ="admin/questionEdit";
$route['admin/questionUpdate'] = "admin/questionUpdate";
// question

$route['admin/contact'] ="admin/contact";
$route['admin/getquestion'] ="admin/getquestion";
$route['admin/contactdelete'] ="admin/contactDelete";

$route['admin/portfolio/(:any)'] = "admin/portfolio/$1";
$route['admin/getportfolio'] = "admin/getportfolio";

$route['admin/freelancer-testimonial/(:any)'] = "admin/freelancertestimonial/$1";
$route['admin/getfreelancertestimonial'] = "admin/getfreelancertestimonial";

$route['admin/casestudy/(:any)'] = "admin/casestudy/$1";
$route['admin/getcasestudy'] = "admin/getcasestudy";

$route['admin/pricing/(:any)'] = "admin/pricing/$1";
$route['admin/getpricing'] = "admin/getpricing";

$route['admin/requestform/(:any)'] = "admin/requestform/$1";
$route['admin/getrequestform'] = "admin/getrequestform";

// membership
$route['admin/package'] = "admin/package";
$route['admin/getpackage'] ="admin/getpackage";
$route['admin/packageSave'] ="admin/packageSave";
$route['admin/packagedelete'] ="admin/packageDelete";
$route['admin/packageEdit'] ="admin/packageEdit";
$route['admin/packageUpdate'] = "admin/packageUpdate";
// membership
//support
$route['admin/support'] = "admin/support";
$route['admin/supportchatperson'] = "admin/getchatperson";
$route['admin/support-external'] = "admin/support_external";


//conference

$route['admin/conference'] = "admin/conference";
$route['admin/getconference'] ="admin/getconference";
$route['admin/conferenceStatus'] ="admin/conferenceStatus";
$route['admin/usertestimonial'] = "admin/usertestimonial";
$route['admin/getusertestimonial'] = "admin/getusertestimonial";

$route['admin/userportfolio'] = "admin/userportfolio";
$route['admin/getuserportfolio'] = "admin/getuserportfolio";

$route['admin/usercasestudy'] = "admin/usercasestudy";
$route['admin/getusercasestudy'] = "admin/getusercasestudy";

$route['admin/getoneconference'] ="admin/getoneconference";

$route['admin/suggestion'] = "admin/suggestion";
$route['admin/getsuggestion'] ="admin/getsuggestion";
$route['admin/suggestionStatus'] ="admin/suggestionstatus";
$route['admin/deletesuggestion'] ="admin/deletesuggestion";

$route['admin/email'] = "admin/allemail";
$route['admin/getemail'] = "admin/getemail";

$route['test-(:any)'] = 'home/test/$1';
