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


 // $db->select('country');
 // $db->group_by('country');
 // $query = $db->get('user_meta');
 // $c = $query->result();
 //  $g =array();
 //  foreach($c as $i)
 //  {
 //    $g[] = $i->country;
 //  }
 //
 //  $db->select('state');
 //  $db->group_by('state');
 //  $query = $db->get('user_meta');
 //  $st = $query->result();
 //   $s =array();
 //   foreach($st as $i)
 //   {
 //     $s[] = $i->state;
 //   }
 //
 // $countryIds = array_unique($g);
 // $stateIds = array_unique($s);
 //
 // $db->select('id,name');
 // $db->where_in('id',$countryIds);
 // $query = $db->get('countries');
 // $countrys = $query->result();
 //
 // $db->select('id,name');
 // $db->where_in('id',$stateIds);
 // $query = $db->get('states');
 // $states = $query->result();


 // $db->select('pra.name as industry,pra.id as industryId,ser.name as service,ser.id as serviceId');
 // $db->join('practice_areas as pra','link.industryId = pra.id');
 // $db->join('services as ser','link.serviceId = ser.id');
 // $db->where('pra.status',1);
 // $query1 = $db->get('practice_service_link as link');
 // $industry = $query1->result();
 //
 // $db->select('ser.name as service,ser.id,h.url as link');
 // $db->join('services as ser','us.servicesId = ser.id');
 // $db->join('hire_ranking_content as h','h.servicesId = ser.id','left');
 // $db->where('ser.status',1);
 // $db->group_by('us.servicesId');
 // $query3 = $db->get('user_services as us');
 // $services = $query3->result();



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

// foreach($states as $st)
// {
// foreach($countrys as $count)
// {
//   foreach($industry as $ind)
//   {
//     foreach($services as $ser)
//     {
//       $indu = str_replace(' ', '-',strtolower($ind->industry));
//
//
//       $service = str_replace(' ', '-',strtolower($ser->service));
//       $country = str_replace(' ', '-',strtolower($count->name));
//       $state = str_replace(' ', '-',strtolower($st->name));
// if(!empty($ser->link))
// {
//   $custom_ser = str_replace(' ', '-',strtolower($ser->link));
//   $route['hire/'.$custom_ser] = 'Home/searchfilter/'.$ser->id;
// }
// else
// {
// $route['hire/'.$service] = 'Home/searchfilter/'.$ser->id;
// }
//
// $route['best-'.$service.'-companies-in-'.$country] = 'Home/search/'.$ind->industryId.'/'.$ser->id.'/'.$count->id.'/state';
// $route['best-'.$service.'-companies'] = 'Home/search/industry/'.$ser->id.'/country/state';
// $route['best-'.$service.'-companies-in-'.$country] = 'Home/search/industry/'.$ser->id.'/'.$count->id.'/state';
// $route['best-'.$indu.'-'.$service.'-companies'] = 'Home/search/'.$ind->industryId.'/'.$ser->id.'/country/state';
// $route['best-'.$indu.'-'.$service.'-companies-in-'.$country] = 'Home/search/'.$ind->industryId.'/'.$ser->id.'/'.$count->id.'/state';
// $route['best-'.$indu.'-companies'] = 'Home/search/'.$ind->industryId.'/service/country/state';
// state wise
// $route[$country.'/best-'.$service.'-companies-in-'.$state] = 'Home/search/industry/'.$ser->id.'/'.$count->id.'/'.$st->id;
// $route[$country.'/best-'.$indu.'-'.$service.'-companies-in-'.$state] = 'Home/search/'.$ind->industryId.'/'.$ser->id.'/'.$count->id.'/'.$st->id;
//
//         }
//       }
//     }
//  }



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

 $route['country=(:any)'] = "home/jobsearchcountry/$1";
 $route['getJobCountryWise'] = "home/getJobCountryWise";

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
$route['directconnect'] ="home/directconnect";
$route['best-(:any)'] = "home/search/$1";
$route['hire/(:any)'] = 'Home/searchfilter/$1';

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
$route['freelancer/leavecount'] ="freelancer/leavecount";
$route['freelancer/leave_cron'] ="freelancer/leave_cron";
$route['freelaner/CarryForwardupdateEffectiveDate'] ="freelancer/CarryForwardupdateEffectiveDate";
$route['servicesGigRanking'] = "home/servicesGigRanking";
$route['stopautomaticallytask'] = "home/stopautomaticallytask";
$route['dectiveUserCompleteResignation'] = "home/dectiveUserCompleteResignation";
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
$route['checkmail'] ="home/checkmail";
$route['plan/(:any)'] ="home/plan/$1";
$route['registerproceed'] ="home/registerProceed";
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
$route['userpreferredlocation'] = "home/userpreferredlocation";
$route['userpreferredState'] = "home/userpreferredState";

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
$route['find-gig'] = "home/find_gig";
$route['getgig'] = "home/getgig";

$route['getjobOpening'] = "home/getjobOpening";

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

$route['submit-post'] = "home/blog_add";
$route['blogSave'] = "home/blogSave";

$route['features'] = "home/features";
$route['feature/(:any)'] = "home/features_detail/$1";
$route['askquestionSave'] = "home/askquestionSave";
$route['getaskquestionlist']  = "home/getaskquestionlist";
$route['getusergiglist']  = "home/getusergiglist";
$route['gig/(:any)']  = "home/usergigdetail/$1";
$route['getusergigdetail'] = "home/getusergigdetail";
$route['buygig'] = "home/buygig";
$route['checkgigbuy'] = "home/checkgigbuy";

$route['paymentSuccess'] = "home/paymentSuccess";

$route['getgigServices'] = "home/getgigService";
$route['getgigIndustry'] = "home/getgigIndustry";
$route['getgigCountry'] = "home/getgigCountry";
$route['getgigDuration'] = "home/getgigDuration";

$route['job-vacancies/(:any)'] = "home/jobvacanciesDetail/$1";
$route['jobapply'] = "home/jobapply";
$route['careers'] = "home/careers";
$route['getcareers'] = "home/getcareers";
$route['getcareersCompany'] = "home/getcareersCompany";
$route['checkVacancyApplied'] = "home/checkVacancyApplied";
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
$route['client-profile/update'] ="client/client_profileUpdate";
$route['client-getprofile']  = "client/getprofile";

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
$route['client-jobClose'] = "client/jobClose";

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
$route['client-repostJob'] ="client/repostjob";
$route['client-milestone-payment/(:any)/(:any)'] ="client/milestone_payment/$1/$2";
$route['client-update-job'] = 'client/Updatejob';

$route['client-hire'] ="client/hireFreelancer";
$route['client-freelancer-contact'] ="client/freelancerContact";
$route['client-payment-delete'] ="client/Deletepayment";
$route['client-authorize'] = "client/authorize";
$route['client-authorize-payment'] ="client/authorize_payment";
$route['client-support-chat'] = "client/support";

$route['client-invoice'] = "client/invoice";
$route['clientgetinvoice'] = "client/getinvoice";
$route['clientinvoicedownload/(:any)'] = "client/invoicedownload/$1";
// ////////////////////client routes End
$route['client-invoiceedit/(:any)'] ="client/invoice_edit/$1";
$route['client-geteditinvoice'] ="client/geteditinvoice";
$route['client-invoiceupdate'] ="client/invoiceupdate";

$route['client-expense'] ="client/expense";
$route['client-income'] ="client/income";

$route['client-gigStatusUpdate'] = "client/gigStatusUpdate";


// gigs
$route['client-gig'] ="client/gig";
$route['getclient-gig'] ="client/getgig";
$route['client-gigdetail/(:any)'] ="client/gigdetail/$1";
$route['getclient-gigdetail'] ="client/getgigdetail";
$route['client-gigreview'] = "client/gigreview";
$route['client-getgigreview'] = "client/getgigreview";
$route['client-jobdelete'] = "client/jobdelete";

$route['client-contractStatus'] ="client/contractStatus";
$route['client-contractpayment'] ="client/contractpayment";
$route['client-getgroupSuggestionPerson'] ="client/getgroupSuggestionPerson";
$route['client-gigpayment'] = "client/gigpayment";

$route['client-membership'] = "client/membership";
$route['client-getmembershipUsedData'] ="client/getmembershipUsedData";
/////////////////////freelancer
$route['dashboard/(:any)'] = "freelancer/dashboard";
$route['dashboard/(:any)/(:any)'] = "freelancer/dashboard";
$route['freelancer/getsession'] ="freelancer/getsession";
$route['jobs/(:any)'] = 'freelancer/job';
$route['jobs/(:any)/(:any)'] = 'freelancer/job';
$route['freelancer/job/(:any)'] = 'freelancer/jobdetail/$1';
$route['freelancer/getjobs'] ='freelancer/getjobs';
$route['freelancer/getjobdetail'] ='freelancer/getjobdetail';
$route['freelancer/jobStatus'] ='freelancer/jobStatus';
$route['freelancer/jobMessage'] ='freelancer/jobMesaage';
$route['freelancer/getcontract'] = 'freelancer/getcontract';

$route['contract/(:any)'] = "freelancer/contract";
$route['contract/(:any)/(:any)'] = "freelancer/contract";
$route['freelancer/contract-detail/(:any)'] = "freelancer/contractdetail/$1";
$route['freelancer/getcontractdetail'] = "freelancer/getcontractdetail";
$route['freelancer/taskRequest'] = "freelancer/taskRequest";
$route['freelancer/getlog/(:any)/(:any)'] = "freelancer/getContractlog/$1/$2";
$route['freelancer/getlog/(:any)/(:any)/(:any)'] = "freelancer/getContractlog/$1/$2/$3";
$route['freelancer/getlog/(:any)/(:any)/(:any)/(:any)'] = "freelancer/getContractlog/$1/$2/$3/$4";
$route['freelancer/logcomment'] = "freelancer/logcomment";
//chat
$route['chat/(:any)'] ="freelancer/chat";
$route['chat/(:any)/(:any)'] ="freelancer/chat";
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
$route['notification/(:any)'] = "freelancer/notification";
$route['notification/(:any)/(:any)'] = "freelancer/notification";
$route['freelancer/getnotification'] = "freelancer/getNotification";
$route['freelancer/getnotification/(:any)'] = "freelancer/getNotification/$1";
$route['freelancer/getOneNotification'] = "freelancer/getOneNotification";
$route['freelancer/notification/status'] = "freelancer/notification_status";

$route['services/(:any)'] = "freelancer/services";
$route['services/(:any)/(:any)'] = "freelancer/services";
$route['freelancer/servicesAdd'] ="freelancer/serviceAdd";
$route['freelancer/getservice'] ="freelancer/getservice";
$route['freelancer/getindustry'] ="freelancer/getindustry";
$route['freelancer/saveService'] = "freelancer/saveService";
$route['freelancer/userservices'] = "freelancer/userservices";
$route['freelancer/userindustry'] = "freelancer/userindustry";


$route['cprofile/(:any)'] = "freelancer/profile";
$route['freelancer/getprofile'] ="freelancer/getprofile";
$route['freelancer/profileupdate'] = "freelancer/profileupdate";
$route['freelancer/getcountry'] ="freelancer/getcountry";
$route['freelancer/logoupload'] ="freelancer/logoupload";
$route['freelancer/companylogoupload'] ="freelancer/companylogoupload";
$route['freelancer/logo'] ="freelancer/freelancerlogoupload";
$route['freelancer/getstate'] ="freelancer/getstate";
$route['freelancer/getcity'] ="freelancer/getcity";

///testimonial
$route['freelancer/testimonial/add'] = "freelancer/testimonial_add";
$route['freelancer/testimonial/save'] = "freelancer/testimonial_save";
$route['testimonial/(:any)'] = "freelancer/testimonial";
$route['testimonial/(:any)/(:any)'] = "freelancer/testimonial";
$route['freelancer/testimonial_logoupload'] ="freelancer/testimonial_logoupload";
$route['freelancer/testimonial_delete'] = "freelancer/testimonial_delete";
$route['freelancer/testimonial_edit'] ="freelancer/testimonial_edit";
$route['freelancer/testimonial_update'] ="freelancer/testimonial_update";
///case study
$route['casestudy/(:any)'] ="freelancer/casestudy";
$route['casestudy/(:any)/(:any)'] ="freelancer/casestudy";
$route['freelancer/casestudySave'] ="freelancer/casestudySave";
$route['freelancer/getcasestudy'] = "freelancer/getcasestudy";
$route['freelancer/casestudy_upload'] = "freelancer/casestudy_upload";
$route['freelancer/case_study_delete'] = "freelancer/case_study_delete";
$route['freelancer/case_study_edit'] = "freelancer/case_study_edit";
$route['freelancer/casestudy_update'] = "freelancer/casestudy_update";
///// case study
//pricing
$route['service_pricing/(:any)'] ="freelancer/service_pricing";
$route['service_pricing/(:any)/(:any)'] ="freelancer/service_pricing";
$route['freelancer/service_pricingSave'] ="freelancer/service_pricingSave";
$route['freelancer/getservice_pricing'] = "freelancer/getservice_pricing";
$route['freelancer/service_pricing_delete'] = "freelancer/service_pricing_delete";
$route['freelancer/service_pricing_edit'] = "freelancer/service_pricing_edit";
$route['freelancer/service_pricingUpdate'] = "freelancer/service_pricingUpdate";
//pricing

//team
//pricing
$route['team/(:any)'] ="freelancer/team";
$route['team/(:any)/(:any)'] ="freelancer/team";
$route['freelancer/teamSave'] ="freelancer/teamSave";
$route['freelancer/getteam'] = "freelancer/getteam";
$route['freelancer/team_delete'] = "freelancer/team_delete";
$route['freelancer/team_imageupload'] = "freelancer/team_imageupload";
$route['freelancer/teamStatus'] = "freelancer/teamStatus";
$route['freelancer/editteam'] = "freelancer/editteam";
$route['freelancer/updateteam'] = "freelancer/updateTeam";
$route['freelancer/getActiveContract'] = "freelancer/getActiveContract";

//password
$route['basicinform/(:any)'] = "freelancer/password";
$route['basicinform/(:any)/(:any)'] = "freelancer/password";
$route['freelancer/password_update'] ="freelancer/password_update";

$route['freelancer/milestoneRequest'] = "freelancer/milestoneRequest";

$route['freelancer/review'] = "freelancer/review";
$route['freelancer/getreview'] = "freelancer/getallreview";
$route['freelancer/getfreelancerReview'] ="freelancer/getfreelancerReview";
//team

// service brief
$route['service_briefing/(:any)'] ="freelancer/service_briefing";
$route['service_briefing/(:any)/(:any)'] ="freelancer/service_briefing";
$route['freelancer/getservice_info'] = "freelancer/getservice_info";
$route['freelancer/service_infoSave'] = "freelancer/service_infoSave";
///notification

///offline request
$route['request/(:any)'] = "freelancer/request";
$route['request/(:any)/(:any)'] = "freelancer/request";
$route['freelancer/getrequest'] = "freelancer/getrequest";

$route['team_profile/(:any)/(:any)'] ="freelancer/team_profile";
$route['freelancer/getuserprofile'] ="freelancer/getuser_profile";
$route['freelancer/team_certificate'] ="freelancer/team_certificate";
$route['freelancer/teamProfileUpdate'] = "freelancer/teamProfileUpdate";
$route['freelancer/teamResend'] = "freelancer/teamResend";
$route['freelancer/serviceSearch'] ="freelancer/serviceSearch";
$route['freelancer/industrySearch'] ="freelancer/industrySearch";

//portfolio
$route['portfolio/(:any)'] = "freelancer/portfolio";
$route['portfolio/(:any)/(:any)'] = "freelancer/portfolio";
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

$route['proposal/(:any)'] ="freelancer/proposal";
$route['proposal/(:any)/(:any)'] ="freelancer/proposal";
$route['freelancer/getproposal'] ="freelancer/getproposal";
$route['freelancer/getproposaldetail'] ="freelancer/getproposaldetail";
$route['freelancer/authorize'] ="freelancer/authorize";
$route['freelancer/authorize-payment'] ="freelancer/authorize_payment";

$route['support-chat/(:any)'] = "freelancer/support_chat";
$route['support-chat/(:any)/(:any)'] = "freelancer/support_chat";

$route['membership/(:any)'] = "freelancer/membership";
$route['freelancer/membership-payment/(:any)/(:any)'] = "freelancer/membership_payment/$1/$2";
$route['freelancer/upgrade-membership-payment/(:any)/(:any)'] = "freelancer/upgrade_membership_payment/$1/$2";
$route['freelancer/membership-upgrade/(:any)/(:any)'] = "freelancer/membership_update/$1/$2";

$route['freelancer/requestServiceSave'] = "freelancer/requestServiceSave";

$route['freelancer/getsuggestion'] = "freelancer/getsuggestion";

$route['freelancer/employee'] = "freelancer/employee";
$route['freelancer/getemployee'] = "freelancer/getemployee";
$route['freelancer/employeeSave'] = "freelancer/employeeSave";
$route['freelancer/employeedelete'] = "freelancer/employee_delete";
$route['freelancer/employeeedit'] = "freelancer/employee_Edit";
$route['freelancer/updateEmployee'] = "freelancer/employee_update";

$route['expense/(:any)'] ="freelancer/expense";
$route['expense/(:any)/(:any)'] ="freelancer/expense";
$route['freelancer/expenseSave'] ="freelancer/expenseSave";
$route['freelancer/expenseUpdate'] ="freelancer/expenseUpdate";
$route['freelancer/getCurrentMonthExpense'] ="freelancer/getCurrentMonthExpense";
$route['freelancer/allExpense'] ="freelancer/allExpense";
$route['freelancer/deleteExpense'] ="freelancer/deleteExpense";
$route['freelancer/editexpense'] ="freelancer/editexpense";
$route['freelancer/expenseSearchDate'] ="freelancer/expenseSearchDate";
$route['freelancer/expenseAttachment'] ="freelancer/expenseAttachment";

$route['work-scheduling/(:any)'] ="freelancer/work_scheduling";
$route['work-scheduling/(:any)/(:any)'] ="freelancer/work_scheduling";
$route['freelancer/breakSave'] ="freelancer/breakSave";
$route['freelancer/getbreak'] ="freelancer/getbreak";
$route['freelancer/leaveSave'] ="freelancer/leaveSave";
$route['freelancer/getleave'] ="freelancer/getleave";
$route['freelancer/workinghoursSave'] ="freelancer/workinghoursSave";
$route['freelancer/getworking'] ="freelancer/getworking";

$route['freelancer/getprojectmanager'] = "freelancer/getprojectmanager";
$route['project/(:any)'] = "freelancer/project";
$route['project/(:any)/(:any)'] = "freelancer/project";
$route['freelancer/getproject'] = "freelancer/getproject";
$route['freelancer/project_add'] = "freelancer/project_add";
$route['freelancer/project_delete'] = "freelancer/project_delete";
$route['freelancer/projectSave'] = "freelancer/projectSave";
$route['freelancer/project/view/(:any)'] = "freelancer/project_detail/$1";
$route['freelancer/getprojectdetail'] = "freelancer/getproject_detail";
$route['freelancer/project_edit/(:any)'] = "freelancer/project_edit/$1";
$route['freelancer/project-edit/(:any)'] = "freelancer/projectmanger_project_edit/$1";
$route['freelancer/getproject_edit'] = "freelancer/getproject_edit";
$route['freelancer/projectupdate'] = "freelancer/projectupdate";
$route['freelaner/projectMilestoneSave'] = "freelaner/projectMilestoneSave";


$route['project-assign/(:any)/(:any)'] = "freelancer/project_assign";
$route['freelancer/getproject_assign'] = "freelancer/getproject_assign";
$route['freelancer/project_status'] = "freelancer/project_status";
$route['freelancer/task_status'] = "freelancer/task_status";

$route['freelancer/assign-project-detail/(:any)'] = "freelancer/project_assign_detail/$1";
$route['freelancer/getproject_assign_detail'] = "freelancer/getproject_assign_detail";

$route['freelancer/SearchCompanyUser'] = "freelancer/SearchCompanyUser";
$route['freelancer/projectAssignToUser'] = "freelancer/projectAssignToUser";


$route['freelancer/employee-project'] = "freelancer/employee_project";
$route['freelancer/getemployee_project'] = "freelancer/getemployee_project";

$route['my-projects/(:any)/(:any)'] = "freelancer/employee_project_task";
$route['freelancer/getemployee_project'] = "freelancer/getemployee_project";

$route['freelancer/my-projects/detail/(:any)'] = "freelancer/task_detail/$1";
$route['freelancer/gettask_detail'] = "freelancer/gettask_detail";

$route['freelancer/employee-task'] = "freelancer/employee_task";
$route['freelancer/getemployee_task'] = "freelancer/getemployee_task";

$route['freelancer/tasktimeStart'] ="freelancer/tasktimeStart";
$route['freelancer/tasktimeStop'] ="freelancer/tasktimeStop";

$route['freelancer/breaktimeStart'] ="freelancer/breaktimeStart";
$route['freelancer/breaktimeStop'] ="freelancer/breaktimeStop";
$route['freelancer/allProjectAsigntoManager'] ="freelancer/allProjectAsigntoManager";
$route['freelancer/getproject_milestone'] ="freelancer/getproject_milestone";
$route['freelancer/milestoneAmountupdate'] ="freelancer/milestoneAmountupdate";

$route['roi/(:any)'] ="freelancer/roi";
$route['freelancer/getroi'] ="freelancer/getroi";
$route['freelancer/getroi_project'] ="freelancer/getroi_project";

$route['company-roi/(:any)'] ="freelancer/company_roi";
$route['freelancer/getcompany-roi'] ="freelancer/getcompany_roi";

$route['employee-roi/(:any)'] ="freelancer/employee_roi";
$route['freelancer/getemployee-roi'] ="freelancer/getemployee_roi";
$route['freelancer/getemployee-detail-roi'] ="freelancer/getemployee_detail_roi";

$route['employee-salary/(:any)'] ="freelancer/employee_salary";
$route['employee-salary/(:any)/(:any)'] ="freelancer/employee_salary";
$route['freelancer/getemployee-salary'] ="freelancer/getemployee_salary";
$route['freelancer/employee-billing/(:any)'] ="freelancer/employee_billing/$1";
$route['freelancer/getemployee-salary-monthwise'] ="freelancer/getemployee_previousMonthSalary";


$route['freelancer/getprojectlog/(:any)'] ="freelancer/getprojectlog/$1";
$route['freelancer/projectTaskcomment'] ="freelancer/projectTaskcomment";
$route['freelancer/project_documentupload'] = "freelancer/project_documentupload";
$route['freelancer/resignationTimeSave'] = "freelancer/resignationTimeSave";
$route['freelancer/getresignationTime'] = "freelancer/getresignationTime";

$route['resignation/(:any)/(:any)'] = "freelancer/resignation";
$route['freelancer/resignationSave'] = "freelancer/resignationSave";
$route['freelancer/getresignation'] = "freelancer/getresignation";

$route['resignation-list/(:any)'] = "freelancer/allresignation";
$route['resignation-list/(:any)/(:any)'] = "freelancer/allresignation";
$route['freelancer/getallresignation'] = "freelancer/getallresignation";
$route['freelancer/resignationStatus'] = "freelancer/resignationStatus";
$route['freelancer/resignationEdit'] = "freelancer/resignationEdit";
$route['freelancer/resignationUpdate'] = "freelancer/resignationUpdate";


$route['employee-leave/(:any)/(:any)'] = "freelancer/employee_leave";
$route['freelancer/employee-leave-save'] = "freelancer/employee_leave_save";
$route['freelancer/getemployee_leave'] = "freelancer/getemployee_leave";

$route['leave-list/(:any)'] = "freelancer/all_leave";
$route['leave-list/(:any)/(:any)'] = "freelancer/all_leave";
$route['freelancer/getallemployeeleave'] = "freelancer/getallemployeeleave";
$route['freelancer/leaveStatus'] = "freelancer/leaveStatus";
$route['freelancer/editleave'] = "freelancer/editleave";
$route['freelancer/updateleave'] = "freelancer/updateleave";

$route['departments/(:any)'] = "freelancer/departments";
$route['departments/(:any)/(:any)'] = "freelancer/departments";

$route['freelancer/getdepartment'] = "freelancer/getdepartment";
$route['freelancer/savedepartment'] = "freelancer/savedepartment";
$route['freelancer/editdepartment'] = "freelancer/editdepartment";
$route['freelancer/updatedepartment'] = "freelancer/updatedepartment";
$route['freelancer/deletedepartment'] = "freelancer/deletedepartment";
$route['freelancer/alldepartment'] = "freelancer/alldepartment";

$route['leavetype/(:any)'] = "freelancer/leavetype";
$route['leavetype/(:any)/(:any)'] = "freelancer/leavetype";
$route['freelancer/getleavetype'] = "freelancer/getleavetype";
$route['freelancer/saveleavetype'] = "freelancer/saveleavetype";
$route['freelancer/editleavetype'] = "freelancer/editleavetype";
$route['freelancer/updateleavetype'] = "freelancer/updateleavetype";
$route['freelancer/deleteleavetype'] = "freelancer/deleteleavetype";
$route['freelancer/allleavetype'] = "freelancer/allleavetype";

$route['holiday/(:any)'] = "freelancer/holiday";
$route['holiday/(:any)/(:any)'] = "freelancer/holiday";
$route['freelancer/getholiday'] = "freelancer/getholiday";
$route['freelancer/holidaySave'] ="freelancer/holidaySave";
$route['freelancer/deleteholiday'] ="freelancer/deleteholiday";
$route['freelancer/editholiday'] = "freelancer/editholiday";
$route['freelancer/updateholiday'] = "freelancer/updateholiday";

$route['task/(:any)'] = "freelancer/todo";
$route['task/(:any)/(:any)'] = "freelancer/todo";
$route['freelancer/gettodo'] = "freelancer/gettodo";
$route['freelancer/getdepartmentbyteam'] = "freelancer/getdepartmentbyteam";
$route['freelancer/todosave'] = "freelancer/todosave";
$route['freelancer/deletetodo'] = "freelancer/deletetodo";
$route['freelancer/edittodo'] = "freelancer/edittodo";
$route['freelancer/updatetodo'] = "freelancer/updatetodo";
$route['freelancer/changeemail'] = "freelancer/changeemail";
$route['freelancer/paymentmethodupdate'] = "freelancer/paymentmethodupdate";
$route['freelancer/getpaymentmethod'] = "freelancer/getpaymentmethod";
// invoice
$route['invoice/(:any)'] = "freelancer/invoice";
$route['invoice/(:any)/(:any)'] = "freelancer/invoice";
$route['freelancer/getinvoice'] = "freelancer/getinvoice";
$route['freelancer/getActiveClient'] = "freelancer/getActiveClient";
$route['freelancer/getclientcontract'] = "freelancer/getclientcontract";
$route['freelancer/invoicesave']     = "freelancer/invoice_save";
$route['freelancer/invoice/create']     = "freelancer/invoice_create";
$route['freelancer/invoice/edit/(:any)']     = "freelancer/invoice_edit/$1";
$route['freelancer/geteditinvoice']     = "freelancer/geteditinvoice";
$route['freelancer/invoiceupdate']     = "freelancer/invoiceupdate";
$route['freelancer/unassigned_task'] = "freelancer/unassigned_task";
$route['freelancerinvoicedownload/(:any)'] = "freelancer/invoicedownload/$1";
$route['freelancer/invoiceSearchdate'] ="freelancer/invoiceSearchdate";

$route['employee-dsr/(:any)/(:any)'] = "freelancer/employeeDsr";
$route['freelancer/getemployeedsr'] = "freelancer/getemployeeDsr";
$route['freelancer/deletedsr'] = "freelancer/deletedsr";
$route['freelancer/dsrSave'] = "freelancer/dsrSave";
$route['freelancer/dsrUpdate'] = "freelancer/dsrUpdate";
$route['freelancer/getOnedsr'] = "freelancer/getOnedsr";
$route['freelancer/todotaskStop'] = "freelancer/todotaskStop";

$route['manager-dsr/(:any)'] = "freelancer/manager_dsr";
$route['manager-dsr/(:any)/(:any)'] = "freelancer/manager_dsr";
$route['freelancer/getmanagerdsr'] = "freelancer/getmanagerdsr";
$route['freelancer/dsrApproved'] = "freelancer/dsrApproved";
$route['freelancer/dsrRemarks'] = "freelancer/dsrRemarks";
$route['freelancer/getOneEmployeeDsr'] = "freelancer/getOneEmployeeDsr";
$route['freelancer/upgrade'] = "freelancer/upgrade";
$route['freelancer/upgradeFreelancer'] = "freelancer/upgradeFreelancer";

$route['income/(:any)'] ="freelancer/income";
$route['income/(:any)/(:any)'] ="freelancer/income";
$route['freelancer/getCurrentMonthIncome'] ="freelancer/getCurrentMonthIncome";
$route['freelancer/getallincome'] ="freelancer/getallincome";
$route['freelancer/deleteincome'] ="freelancer/deleteincome";
$route['freelancer/incomeSave'] ="freelancer/incomeSave";
$route['freelancer/incomeUpdate'] ="freelancer/incomeUpdate";
$route['freelancer/incomeStatusUpdate'] ="freelancer/incomeStatusUpdate";
$route['freelancer/incomeSearchdate'] ="freelancer/incomeSearchdate";

$route['freelancer/getownerproject'] = "freelancer/getownerproject";
$route['freelancer/getmilestone'] = "freelancer/getmilestone";
$route['freelancer/gettask'] = "freelancer/gettask";

$route['freelancer/netsalarySave'] ="freelancer/netsalarySave";
// jobopening
$route['job-opening/(:any)/(:any)'] ="freelancer/jobopening";
$route['freelancer/getjobOpening'] ="freelancer/getjobopening";
$route['freelancer/openingSave'] ="freelancer/openingSave";
$route['freelancer/deleteOpening'] ="freelancer/deleteOpening";
$route['freelancer/editOpening'] ="freelancer/editOpening";
$route['freelancer/openingUpdate'] ="freelancer/openingUpdate";
//jobopening

// jobopening
$route['recruitment/(:any)/(:any)'] ="freelancer/recruitment";
$route['freelancer/getrecruitment'] ="freelancer/getrecruitment";
$route['freelancer/recruitmentSave'] ="freelancer/recruitmentSave";
$route['freelancer/deleteRecruitment'] ="freelancer/deleteRecruitment";
$route['freelancer/editRecruitment'] ="freelancer/editRecruitment";
$route['freelancer/recruitmentUpdate'] ="freelancer/recruitmentUpdate";
$route['freelancer/requritementCV'] ="freelancer/requritementCV";
$route['freelancer/getouterCandidate'] ="freelancer/getouterCandidate";
//jobopening

// interview
$route['interview/(:any)'] ="freelancer/interview";
$route['interview/(:any)/(:any)'] ="freelancer/interview";
$route['freelancer/getinterview'] ="freelancer/getinterview";
$route['freelancer/interviewSave'] ="freelancer/interviewSave";
$route['freelancer/deleteinterview'] ="freelancer/deleteinterview";
$route['freelancer/editInterview'] ="freelancer/editInterview";
$route['freelancer/getinterviewfeedback'] = "freelancer/getinterviewfeedback";
$route['freelancer/interviewUpdate'] ="freelancer/interviewUpdate";
$route['freelancer/viewinterview'] ="freelancer/viewinterview";
$route['freelancer/allopening'] ="freelancer/allopening";
$route['freelancer/allcandidate'] ="freelancer/allcandidate";
$route['freelancer/allcandidate1'] ="freelancer/allcandidate1";
$route['freelancer/allteam'] ="freelancer/allteam";
$route['freelancer/allteam1'] ="freelancer/allteam1";
$route['freelancer/getonlyAllEmployee'] ="freelancer/getonlyAllEmployee";
$route['interviewfeedback/(:any)/(:any)'] ="freelancer/interviewfeedback";
$route['freelancer/getemployeeinterviewfeedback'] ="freelancer/getemployeeinterviewfeedback";
$route['freelancer/Updateemployeeinterviewfeedback'] ="freelancer/Updateemployeeinterviewfeedback";
$route['freelancer/getemployeeinterview'] ="freelancer/getemployeeinterview";
$route['freelancer/getInterviewers'] ="freelancer/getInterviewers";
$route['freelancer/searchSalary'] ="freelancer/searchSalary";

//
$route['attendance/(:any)'] ="freelancer/attendance";
$route['attendance/(:any)/(:any)'] ="freelancer/attendance";
$route['freelancer/getattendancedata'] ="freelancer/getattendancedata";
$route['freelancer/getOnedayAttendance'] ="freelancer/getOnedayAttendance";
// $route['attendance/(:any)/(:any)'] ="freelancer/attendance";
$route['freelancer/searchattendance/(:any)/(:any)'] ="freelancer/searchattendance/$1/$2";
$route['freelancer/getzones'] ="freelancer/getzones";
// interview
// announcement
$route['announcement/(:any)'] ="freelancer/announcement";
$route['announcement/(:any)/(:any)'] ="freelancer/announcement";
$route['freelancer/getannouncement'] ="freelancer/getannouncement";
$route['freelancer/announcementSave'] ="freelancer/announcementSave";
$route['freelancer/deleteAnnouncement'] ="freelancer/deleteAnnouncement";
$route['freelancer/editAnnouncement'] ="freelancer/editAnnouncement";
$route['freelancer/announcementUpdate'] ="freelancer/announcementUpdate";

$route['emp-announcement/(:any)/(:any)'] ="freelancer/emp_announcement";
$route['freelancer/getemp-announcement'] ="freelancer/getemp_announcement";

$route['freelancer/EmployeeSearch'] ="freelancer/EmployeeSearch";
$route['freelancer/project-payment-detail/(:any)'] ="freelancer/project_payment_detail/$1";
$route['freelancer/getproject-payment-detail'] ="freelancer/getproject_payment_detail";
$route['freelancer/getInvoicePrefix'] ="freelancer/getInvoicePrefix";

$route['freelancer/todoAttachment'] ="freelancer/todoAttachment";
$route['freelancer/taskAttachment'] ="freelancer/taskAttachment";

$route['performance/(:any)'] ="freelancer/performance";
$route['performance/(:any)/(:any)'] ="freelancer/performance";
$route['freelancer/performance-add/(:any)'] ="freelancer/addperformance/$1";
$route['freelancer/getperformance'] ="freelancer/getperformance";
$route['freelancer/performanceSave'] ="freelancer/performanceSave";
$route['freelancer/performanceDelete'] ="freelancer/performanceDelete";
// $route['freelancer/performance-edit/(:any)'] ="freelancer/performanceEdit/$1";
$route['freelancer/getperformanceEdit'] ="freelancer/getperformanceEdit";
$route['freelancer/performanceUpdate'] ="freelancer/performanceUpdate";
$route['freelancer/performanceView'] ="freelancer/performanceView";
$route['freelancer/performanceUserdetail'] ="freelancer/performanceUserdetail";
$route['freelancer/performanceUpdate'] = "freelancer/performanceUpdate";

$route['manager-performance/(:any)/(:any)'] ="freelancer/manager_performance";
$route['freelancer/getManagerPerformance'] ="freelancer/getManagerPerformance";
$route['freelancer/performanceReviewer'] = "freelancer/performanceReviewer";
$route['freelancer/edit-performance/(:any)'] ="freelancer/performance_edit/$1";
$route['freelancer/performanceEdit'] ="freelancer/performanceEdit";
$route['my-performance/(:any)/(:any)'] = "freelancer/myperformance/$1/$2";
$route['freelancer/getmyPerformance'] = "freelancer/getmyPerformance";
$route['my-performance-add/(:any)'] = "freelancer/myPerformanceAdd/$1";
$route['freelancer/getmyperformanceEdit'] = "freelancer/getmyperformanceEdit";
$route['performance-form/(:any)/(:any)'] = "freelancer/performance_form";
$route['freelancer/getPerformanceform'] = "freelancer/getPerformanceform";
$route['performance-form-add/(:any)/(:any)'] = "freelancer/performanceformAdd";
$route['freelancer/performance_formSave'] = "freelancer/performance_formSave";
$route['freelancer/performance-view/(:any)'] = "freelancer/performance_view/$1";
$route['freelancer/performancePdf/(:any)'] = "freelancer/performancePdf/$1";
//announcement

// Incrment
$route['employee-increment/(:any)'] = "freelancer/employee_increment";
$route['employee-increment/(:any)/(:any)'] = "freelancer/employee_increment";
$route['freelancer/getemployeeincrment'] = "freelancer/getemployeeincrment";
$route['freelancer/employeeIncrmentSave'] = "freelancer/employeeIncrmentSave";
$route['freelancer/getOneEmployeeIncrement'] = "freelancer/getOneEmployeeIncrement";
$route['freelancer/incrmentEdit'] = "freelancer/incrmentEdit";
$route['freelancer/incrmentUpdate'] = "freelancer/incrmentUpdate";

$route['freelancer/dsr_documentupload'] = "freelancer/dsrupload";
$route['lead/(:any)'] = "freelancer/lead";
$route['lead/(:any)/(:any)'] = "freelancer/lead";
$route['freelancer/getlead'] = "freelancer/getlead";
$route['freelancer/deletelead'] = "freelancer/deletelead";
$route['freelancer/add-lead'] = "freelancer/addLead";
$route['freelancer/leadSave'] = "freelancer/leadSave";
$route['freelancer/lead_documentupload'] = "freelancer/leadupload";
$route['freelancer/geteditlead'] = "freelancer/geteditlead";
$route['freelancer/lead-edit/(:any)'] = "freelancer/editlead/$1";
$route['freelancer/leadUpdate'] = "freelancer/leadUpdate";
$route['freelancer/viewlead'] = "freelancer/viewlead";

$route['reviews/(:any)'] = "freelancer/reviews";
$route['freelancer/getreviews'] = "freelancer/getreviews";
$route['freelancer/removeReview'] = "freelancer/removeReview";
$route['freelancer/removedReviewCount'] = "freelancer/removedReviewCount";
$route['freelancer/viewReview'] = "freelancer/viewReview";
$route['freelancer/Paypal-Cancel-Subscription'] = "freelancer/Paypal_Cancel_Subscription";

$route['freelancer/paid-ranking'] = "freelancer/paid_ranking";
$route['freelancer/getpaidranking'] = "freelancer/getpaidranking";
$route['freelancer/paidranking_payment/(:any)'] = "freelancer/paidranking_payment/$1";
// askquestion
$route['askquestion/(:any)'] = "freelancer/askquestion";
$route['freelancer/getaskquestion'] = "freelancer/getaskquestion";
$route['freelancer/askquestionDelete'] = "freelancer/askquestionDelete";
$route['freelancer/askquestionEdit'] = "freelancer/askquestionEdit";
$route['freelancer/askquestionUpdate'] = "freelancer/askquestionUpdate";
//ask question

// gig
$route['giglist/(:any)'] = "freelancer/giglist";
$route['giglist/(:any)/(:any)'] = "freelancer/giglist";
$route['freelancer/getgig'] = "freelancer/getgig";
$route['freelancer/gigDelete'] = "freelancer/gigDelete";
$route['freelancer/gig-add'] = "freelancer/gig_add";
$route['freelancer/gigSave'] = "freelancer/gigSave";
$route['freelancer/gigSave'] = "freelancer/gigSave";
$route['freelancer/gig-edit/(:any)'] = "freelancer/gig_edit/$1";
$route['freelancer/getgigedit'] = "freelancer/getgigedit";
$route['freelancer/gigUpdate'] = "freelancer/gigUpdate";
$route['freelancer/gigview'] = "freelancer/gigview";
$route['freelancer/gigImageUpload'] = "freelancer/gigImageUpload";
// gig

// lead source
$route['lead-source/(:any)'] = "freelancer/leadSource";
$route['lead-source/(:any)/(:any)'] = "freelancer/leadSource";
$route['freelancer/getlead-source'] = "freelancer/getleadSource";
$route['freelancer/getlead-sourcedelete'] = "freelancer/getleadSourceDelete";
$route['freelancer/leadSourceSave'] = "freelancer/leadSourceSave";
$route['freelancer/leadSourceEdit'] = "freelancer/leadSourceEdit";
$route['freelancer/leadSourceUpdate'] = "freelancer/leadSourceUpdate";
$route['freelancer/getallleadsource'] = "freelancer/getallleadsource";

// gig
$route['freelancer/buygig/(:any)'] = "freelancer/buygig/$1";
$route['freelancer/getbuygig'] = "freelancer/getbuygig";
$route['freelancer/buygigdetail/(:any)'] = "freelancer/buygigdetail/$1";
$route['freelancer/getbuygigdetail'] = "freelancer/getbuygigdetail";
$route['freelancer/getgiglog/(:any)'] ="freelancer/getgiglog/$1";

$route['freelancer/gigreview'] = "freelancer/gigreview";
$route['freelancer/getgigreview'] = "freelancer/getgigreview";

$route['freelancer/getPerformanceSetting'] = "freelancer/getPerformanceSetting";
$route['freelancer/PerformanceSettingUpdate'] = "freelancer/PerformanceSettingUpdate";

$route['freelancer/resignationDownload/(:any)'] = "freelancer/resignationDownload/$1";
$route['freelancer/interviewStatus'] ="freelancer/interviewStatus";
$route['freelancer/assignLeave'] = "freelancer/assignLeave";
$route['leave-approval/(:any)/(:any)'] = "freelancer/leave_approval";
$route['freelancer/getleaveapproval'] = "freelancer/getleaveapproval";
$route['freelancer/employeeleaveStatus'] = "freelancer/employeeleaveStatus";
$route['freelancer/taskactive'] ="freelancer/taskactive";
$route['freelancer/getrejectionreason'] ="freelancer/getrejectionreason";
$route['freelancer/getcurreenttodo'] = "freelancer/getcurreenttodo";
$route['freelancer/resignationReason'] = "freelancer/resignationReason";
$route['performance-setting/(:any/(:any))'] = 'freelancer/performancesetting';
$route['task-setting/(:any)/(:any)'] = 'freelancer/tasksetting';
$route['task-setting/(:any)'] = 'freelancer/tasksetting';
$route['freelancer/gettasksetting'] = 'freelancer/gettasksetting';
$route['freelancer/tasksettingUpdate'] = 'freelancer/tasksettingUpdate';
$route['freelancer/taskcheck'] = 'freelancer/taskcheck';
$route['account-setting/(:any)'] = 'freelancer/account_setting';
$route['freelancer/AccessUpdate'] = 'freelancer/AccessUpdate';

$route['freelancer/taskstopAutomatically'] = 'freelancer/taskstopAutomatically';
$route['freelancer/taskActivityUpdate'] = 'freelancer/taskActivityUpdate';
$route['freelancer/getresignationreason'] = 'freelancer/getresignationreason';

$route['freelancer/exportExpense'] = 'freelancer/exportExpense';
$route['freelancer/exportExpense/(:any)'] = 'freelancer/exportExpense/$1';
$route['freelancer/exportExpense/(:any)/(:any)/(:any)'] = 'freelancer/exportExpense/$1/$2/$3';
$route['freelancer/getallexpenseName'] = 'freelancer/getallexpenseName';
$route['freelancer/getexpenseSuggestion'] = "freelancer/getexpenseSuggestion";

$route['freelancer/incomeExport'] = 'freelancer/incomeExport';
$route['freelancer/incomeExport/(:any)'] = 'freelancer/incomeExport/$1';
$route['freelancer/incomeExport/(:any)/(:any)'] = 'freelancer/incomeExport/$1/$2';
$route['freelancer/incomeExport/(:any)/(:any)/(:any)/(:any)'] = 'freelancer/incomeExport/$1/$2/$3/$4';
$route['freelancer/getincomeclientSuggestion'] = 'freelancer/getincomeclientSuggestion';
$route['freelancer/getincomeproject'] = 'freelancer/getincomeproject';
$route['freelancer/getMonthExpense'] = 'freelancer/getMonthExpense';
$route['freelancer/getMonthIncome'] = 'freelancer/getMonthIncome';
$route['freelancer/getincomeclientAutoSuggestion'] = 'freelancer/getincomeclientAutoSuggestion';
$route['freelancer/getincomeprojectAutoSuggestion'] = 'freelancer/getincomeprojectAutoSuggestion';
$route['freelancer/getuserlocalcurrency'] = 'freelancer/getuserlocalcurrency';
$route['freelancer/getMonthInvoice'] = 'freelancer/getMonthInvoice';
$route['freelancer/getActiveInvoiceClient'] ="freelancer/getActiveInvoiceClient";
$route['freelancer/getinvoiceSuggestionClient'] ="freelancer/getinvoiceSuggestionClient";
$route['freelancer/sendinvoice'] = "freelancer/sendinvoice";
$route['freelancer/getlastinvoiceNo'] = "freelancer/getlastinvoiceNo";
$route['freelancer/invoiceReceivedPaymentChange'] = "freelancer/invoiceReceivedPaymentChange";
$route['freelancer/invoicereceivedSave'] = "freelancer/invoicereceivedSave";
$route['freelancer/invoice/clone/(:any)'] ="freelancer/invoice_clone/$1";
$route['freelancer/getcarryforward'] ="freelancer/getcarryforward";
$route['freelancer/updatecarryforward'] ="freelancer/updatecarryforward";
$route['freelancer/getemployeeCarryforward'] ="freelancer/getemployeeCarryforward";
$route['freelancer/carryforwardStatus'] ="freelancer/carryforwardStatus";
$route['freelancer/taskreceivedAmount'] ="freelancer/taskreceivedAmount";
$route['freelancer/saveSubtask'] ="freelancer/saveSubtask";

$route['contract-assign/(:any)/(:any)'] ="freelancer/contract_assign";
$route['freelancer/assign-contract-detail/(:any)'] ="freelancer/contract_assign_detail/$1";
$route['freelancer/getassignContractdetail'] ="freelancer/getassignContractdetail";

$route['freelancer/incomereceivedSave'] ="freelancer/incomereceivedSave";
$route['freelaner/contractStatus'] ="freelancer/contractStatus";
$route['freelancer/updatemilestone'] = "freelancer/updatemilestone";
$route['freelancer/getproposallog/(:any)'] ="freelancer/getproposallog/$1";

$route['freelancer/Reassigntodosave'] ="freelancer/Reassigntodosave";
$route['freelancer/gettodohistory'] ="freelancer/gettodohistory";
$route['freelancer/gettodohistoryBilling'] ="freelancer/gettodohistoryBilling";
$route['freelancer/editReassigntodo'] ="freelancer/editReassigntodo";
$route['freelancer/todotaskStart'] ="freelancer/todotaskStart";

$route['freelancer/getdsrhistoryBilling'] = "freelancer/getdsrhistoryBilling";
$route['gig-assign/(:any)/(:any)'] = "freelancer/gigassign";
$route['freelancer/getgigassign'] = "freelancer/getgigassign";
$route['freelancer/gig-assign-detail/(:any)'] = "freelancer/gig_assign_detail/$1";

$route['freelancer/getAllEmployeeDsr'] ="freelancer/getAllEmployeeDsr";
$route['freelancer/getdsrproject'] ="freelancer/getdsrproject";
$route['freelancer/getUserTodayDsr'] ="freelancer/getUserTodayDsr";

$route['freelancer/viewdsr'] ="freelancer/viewDsr";

$route['freelancer/getdashboarddata'] ="freelancer/getdashboarddata";
$route['freelancer/gethrdashboarddata'] ="freelancer/gethrdashboarddata";
$route['freelancer/getmanagerdashboarddata'] ="freelancer/getmanagerdashboarddata";
$route['freelancer/getemployeedashboarddata'] ="freelancer/getemployeedashboarddata";
$route['freelancer/getuserplan'] ="freelancer/getuserplan";
$route['freelancer/membershipUpgradePayment'] = "freelancer/membershipUpgradePayment";

// roi
$route['roi-detail/(:any)/(:any)'] = "freelancer/roi_detail/$1";

$route['freelancer/getgroupSuggestionPerson'] = "freelancer/getgroupSuggestionPerson";
$route['freelaner/convertlead'] ="freelaner/convertlead";
// roi
$route['freelancer/getmembershipUsedData'] ="freelancer/getmembershipUsedData";
// gig

$route['freelancer/viewRequest'] = "freelancer/viewRequest";
$route['freelaner/getGigAssignDetail'] = "freelaner/getGigAssignDetail";
$route['team-add/(:any)'] = "freelancer/team_add";
$route['freelancer/allleadteam'] ="freelancer/allleadteam";

$route['freelancer/askquestionsStatusUpdate'] = "freelancer/askquestionsStatusUpdate";
$route['freelaner/checkgigbuy'] = "freelaner/checkgigbuy";
$route['freelancer/getcompanyinfo'] = "freelancer/getcompanyinfo";

$route['team-edit/(:any)/(:any)'] ="freelancer/team_edit/$1";
$route['freelancer/getgigproject'] = "freelancer/getgigproject";
$route['freelancer/gettasktime'] = "freelancer/gettasktime";
$route['freelancer/dsrtaskdetail'] = "freelancer/dsrtaskdetail";
$route['freelancer/dsrTimeAdjustUpdate'] = "freelancer/dsrTimeAdjustUpdate";
$route['freelancer/leadConvertToProject'] = "freelancer/leadConvertToProject";
$route['freelancer/getattendanceDetail'] = "freelancer/getattendanceDetail";

$route['freelaner/signatureUpload'] = "freelancer/signatureUpload";

$route['freelancer/projectSubTaskUpdate'] = "freelancer/projectSubTaskUpdate";
$route['freelaner/multipleTaskDelete'] = "freelancer/multipleTaskDelete";
$route['freelancer/getoverduetodo'] = "freelancer/getoverduetodo";

$route['freelancer/saveJoiningDate'] = "freelancer/saveJoiningDate";

$route['freelancer/projectclientupdate'] = "freelancer/projectclientupdate";
$route['freelancer/milestoneDeleted'] = "freelancer/milestoneDeleted";
$route['freelancer/projectMilestoneUpdate'] = "freelancer/projectMilestoneUpdate";
$route['freelancer/convertEmployee'] = "freelancer/convertEmployee";
$route['freelancer/viewTask'] = "freelancer/viewTask";
$route['freelancer/getallemployee'] = "freelancer/getallemployee";
// lead source

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
$route['admin/logout'] = "admin/logout";
$route['admin/dashboard'] = "admin/dashboard";
$route['admin/freelancer'] = "admin/allfreelancer";
$route['admin/client'] = "admin/allclient";
$route['admin/deleteuser'] ="admin/deleteuser";
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
$route['admin/package-add'] = "admin/packageAdd";
$route['admin/package-edit/(:any)'] = "admin/packageEdit/$1";
$route['admin/getpackage'] ="admin/getpackage";
$route['admin/packageSave'] ="admin/packageSave";
$route['admin/packagedelete'] ="admin/packageDelete";
$route['admin/getpackageEdit'] ="admin/getpackageEdit";
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
$route['admin/conferenceDelete'] ="admin/conferenceDelete";

$route['admin/usertestimonial'] = "admin/usertestimonial";
$route['admin/getusertestimonial'] = "admin/getusertestimonial";

$route['admin/userportfolio'] = "admin/userportfolio";
$route['admin/getuserportfolio'] = "admin/getuserportfolio";

$route['admin/usercasestudy'] = "admin/usercasestudy";
$route['admin/getusercasestudy'] = "admin/getusercasestudy";

$route['admin/userreview'] = "admin/userreview";
$route['admin/getuserreview'] = "admin/getuserreview";

$route['admin/getoneconference'] ="admin/getoneconference";

$route['admin/suggestion'] = "admin/suggestion";
$route['admin/getsuggestion'] ="admin/getsuggestion";
$route['admin/suggestionStatus'] ="admin/suggestionstatus";
$route['admin/deletesuggestion'] ="admin/deletesuggestion";

$route['admin/email'] = "admin/allemail";
$route['admin/getemail'] = "admin/getemail";
$route['admin/deleteEmail'] = "admin/deleteEmail";
$route['admin/editemail'] = "admin/editemail";
$route['admin/emailUpdate'] = "admin/emailUpdate";

$route['admin/sitemap'] = "admin/sitemap";
$route['admin/sitemap_upload'] = "admin/sitemap_upload";

$route['admin/getpackageContent'] = "admin/getpackageContent";
$route['admin/packageContentUpdate'] = "admin/packageContentUpdate";

// featured
$route['admin/featured'] = "admin/featured";
$route['admin/getfeatured'] ="admin/getfeatured";
$route['admin/blogfeatured'] ="admin/featuredSave";
$route['admin/featureddelete'] ="admin/featuredDelete";
$route['admin/featuredEdit'] ="admin/featuredEdit";
$route['admin/featuredUpdate'] = "admin/featuredUpdate";
$route['admin/featuredImage'] = "admin/featuredImage";
$route['admin/freelanceredit/(:any)'] = "admin/freelanceredit/$1";
$route['admin/getfreelancerprofile'] = "admin/getfreelancerprofile";
$route['admin/freelancerprofileupdate'] = "admin/freelancerprofileupdate";
$route['admin/freelancerServices/(:any)'] = "admin/freelancerServices/$1";
$route['admin/getfreelancerIndustry'] = "admin/getfreelancerIndustry";
$route['admin/getservicesfreelancer'] = "admin/getfreelancerservices";
$route['admin/freelancerselectedplan'] = "admin/freelancerselectedplan";
$route['admin/freelancersaveService'] = "admin/freelancersaveService";
$route['admin/freelancerserviceDelete'] = "admin/freelancerserviceDelete";
$route['admin/removeReview'] = "admin/removeReview";
$route['admin/viewReview'] = "admin/viewReview";

$route['admin/profileview'] = "admin/profileview";
$route['admin/profileviewdetail/(:any)'] = "admin/profileviewdetail/$1";
$route['admin/ranking-price'] = "admin/rankingPrice";
$route['admin/getrankingPrice'] = "admin/getrankingPrice";
$route['admin/rankingPriceSave'] = "admin/rankingPriceSave";
$route['admin/delete-ranking-price'] = "admin/Deleterankingprice";
$route['admin/edit-ranking-price'] = "admin/edit_ranking_price";
$route['admin/update-ranking-price'] = "admin/update_ranking_price";
// featured

$route['admin/askquestion'] = "admin/askquestion";
$route['admin/getaskquestion'] = "admin/getaskquestion";
$route['admin/askquestionlist/(:any)'] = "admin/askquestionlist/$1";
$route['admin/getaskquestionlist'] = "admin/getaskquestionlist";

$route['admin/usergig'] = "admin/usergig";
$route['admin/getusergig'] = "admin/getusergig";
$route['admin/gig'] = "admin/gig";
$route['admin/getgig'] = "admin/getgig";
$route['admin/gigview'] = "admin/gigview";

$route['admin/custom-package'] ="admin/customPackage";
$route['admin/getcustom-package'] ="admin/getcustomPackage";
$route['admin/customPackageUpdate'] ="admin/customPackageUpdate";
$route['admin/getclientcustom-package'] = "admin/getclientPackage";
$route['admin/getcompanycustom-package'] = "admin/getcompanyPackage";
