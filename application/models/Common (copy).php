<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common extends CI_Model {

    public function __construct()
   {
        parent::__construct();
    }

    public function getbySerialize($table,$count,$state,$city,$ind,$ser)
    {
      $this->db->select('*');
      $this->db->from($table);
      if($ser != 'service')
      {
      $this->db->where('rankings REGEXP', '.*"serId";s:[0-9]+:"'.$ser.'".*');
      }
      if($ind != 'industries')
      {
      $this->db->where('rankings REGEXP', '.*"parea";s:[0-9]+:"'.$ind.'".*');
      }
    if($count != 'country')
     {
       $this->db->where('rankings REGEXP', '.*"country";s:[0-9]+:"'.$count.'".*');
     }

    if($state != 'state' )
    {
      $this->db->where('rankings REGEXP', '.*"state";s:[0-9]+:"'.$state.'".*');
    }

    if($city != 'city')
    {
     $this->db->where('rankings REGEXP', '.*"city";s:[0-9]+:"'.$city.'".*');
    }
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }


    public function homepagefreelancer()
    {
        $this->db->select("c.code,c.symbol,user_meta.u_id,user.type,user.successScore as score,user.rating,user_meta.name,user.parent,user_meta.logo,user_meta.company_logo,user_meta.c_name,user_meta.maxPrice,
      (select name from services where id = us.servicesId ) as service,
      (select timeStamp from user_onlinelog where u_id = us.u_id ) as timeStamp,
      (select name from countries where id = user_meta.country ) as country,
      (select sortname from countries where id = user_meta.country ) as scountry,
      ");
      $this->db->from('user');
      $this->db->join('user_meta','user_meta.u_id = user.id ','left');
      $this->db->join('user_services as us','user_meta.u_id = us.u_id');
      $this->db->join('currency as c','c.id = user_meta.currencyId','left');
      $this->db->where_in("user.type",[2,3]);
      $this->db->where_in("user.access",[1,2]);
      $this->db->where("user.is_active",1);
      $this->db->group_by('us.u_Id');
      $this->db->order_by('successScore','desc');
      $this->db->limit('12');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function searchfreelancer($whr,$sort)
    {

      $this->db->select("c.code,c.symbol,c.code,c.symbol,user_meta.u_id,user.type,user.successScore as score,user.rating,user_meta.name,user.parent,user_meta.logo,user_meta.company_logo,user_meta.c_name,user_meta.maxPrice,
      (select name from services where id = us.servicesId ) as service,
      (select timeStamp from user_onlinelog where u_id = us.u_id ) as timeStamp,
      (select name from countries where id = user_meta.country ) as country,
      (select sortname from countries where id = user_meta.country ) as scountry,
      ");
      $this->db->from('user');
      $this->db->join('user_meta','user_meta.u_id = user.id ','left');
      $this->db->join('user_services as us','user_meta.u_id = us.u_id');
      $this->db->join('currency as c','c.id = user_meta.currencyId','left');
      $this->db->where($whr);
      $this->db->where_in("user.type",[2,3]);
      $this->db->where_in("user.access",[1,2]);
      $this->db->where("user.is_active",1);
      $this->db->group_by('us.u_Id');

      if($sort == '')
      {
      $this->db->order_by('successScore','desc');
      }

      if($sort == 1)
      {
      $this->db->order_by('maxPrice','asc');
      $this->db->order_by('successScore','desc');

      }

      else if($sort == 2)
      {
      $this->db->order_by('maxPrice','desc');
      $this->db->order_by('successScore','desc');
      }

      $this->db->limit('12');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getbyHourlyFreelancer($hourly,$sort)
    {
      $this->db->select("c.code,c.symbol,user_meta.u_id,user.type,user.successScore as score,user.rating,user_meta.name,user.parent,user_meta.logo,user_meta.company_logo,user_meta.c_name,user_meta.maxPrice,
      (select name from services where id = us.servicesId ) as service,
      (select timeStamp from user_onlinelog where u_id = us.u_id ) as timeStamp,
      (select name from countries where id = user_meta.country ) as country,
      (select sortname from countries where id = user_meta.country ) as scountry");
      $this->db->from('user');
      $this->db->join('user_meta','user_meta.u_id = user.id ','inner');
      $this->db->join('user_services as us','user_meta.u_id = us.u_id');
      $this->db->join('currency as c','c.id = user_meta.currencyId','left');
      $this->db->where_in("user.type",[2,3]);
      $this->db->where_in("user.access",[1,2]);
      $this->db->where("user.is_active",1);

       if($hourly == '1')
      {
      $this->db->where('maxPrice <=','10');
      }

      else  if($hourly == '2')
      {
       $this->db->where( 'maxPrice >', '10');
      $this->db->where('maxPrice <=', '30');
      }
      else  if($hourly == '3')
      {
       $this->db->where( 'maxPrice >', '30');
      }

      if($sort == '')
      {
        $this->db->order_by('successScore','desc');
      }

      if($sort == '1')
      {
      $this->db->order_by('maxPrice','asc');
      $this->db->order_by('successScore','desc');

      }

      else if($sort == '2')
      {
      $this->db->order_by('maxPrice','desc');
      $this->db->order_by('successScore','desc');

      }

      $this->db->group_by('us.u_Id');
      $this->db->limit('12');
      $result = $this->db->get();
      $result = $result->result();
      return $result;

    }

    public function searchHCSfreelancer($hourly,$whr,$sort)
    {
      $this->db->select("c.code,c.symbol,user_meta.u_id,user_meta.name,user.type,user.successScore as score,user.rating,user.parent,user_meta.logo,user_meta.company_logo,user_meta.c_name,user_meta.maxPrice,
      (select name from services where id = us.servicesId ) as service,
      (select timeStamp from user_onlinelog where u_id = us.u_id ) as timeStamp,
      (select name from countries where id = user_meta.country ) as country,
      (select sortname from countries where id = user_meta.country ) as scountry");
      $this->db->from('user');
      $this->db->join('user_meta','user_meta.u_id = user.id ','inner');
      $this->db->join('user_services as us','user_meta.u_id = us.u_id');
      $this->db->join('currency as c','c.id = user_meta.currencyId','left');
      $this->db->where($whr);

      if($hourly == '1')
      {
      $this->db->where('maxPrice <=','10');
      }

      else  if($hourly == '2')
      {
       $this->db->where( 'maxPrice >', '10');
      $this->db->where('maxPrice <=', '30');
      }
      else  if($hourly == '3')
      {
       $this->db->where( 'maxPrice >', '30');
      }
      $this->db->where_in("user.type",[2,3]);
      $this->db->where_in("user.access",[1,2]);
      $this->db->where("user.is_active",1);
      $this->db->group_by('us.u_Id');

      if($sort == '')
      {
        $this->db->order_by('successScore','desc');
      }

       if($sort == '1')
       {
       $this->db->order_by('maxPrice','asc');
       $this->db->order_by('successScore','desc');
       }

       else if($sort == '2')
       {
       $this->db->order_by('maxPrice','desc');
       $this->db->order_by('successScore','desc');
       }

       $this->db->limit('12');
       $result = $this->db->get();
       $result = $result->result();
       return $result;

    }



    public function searchByService($service,$hourly,$sort)
    {
      $this->db->select("c.code,c.symbol,user_meta.u_id,user.type,user.successScore as score,user.rating,user_meta.name,user.parent,user_meta.logo,user_meta.company_logo,user_meta.c_name,user_meta.maxPrice,
      (select name from services where id = us.servicesId ) as service,
      (select timeStamp from user_onlinelog where u_id = us.u_id ) as timeStamp,
      (select name from countries where id = user_meta.country ) as country,
      (select sortname from countries where id = user_meta.country ) as scountry");
      $this->db->from('user');
      $this->db->join('user_meta','user_meta.u_id = user.id ','inner');
      $this->db->join('user_services as us','user_meta.u_id = us.u_id');
      $this->db->join('currency as c','c.id = user_meta.currencyId','left');

      if($hourly == '1')
      {
      $this->db->where('maxPrice <=','10');
      }

      else  if($hourly == '2')
      {
       $this->db->where( 'maxPrice >', '10');
       $this->db->where('maxPrice <=', '30');
      }
      else  if($hourly == '3')
      {
       $this->db->where( 'maxPrice >', '30');
      }

      $this->db->where('us.servicesId',$service);
      $this->db->where_in("user.type",[2,3]);
      $this->db->where_in("user.access",[1,2]);
      $this->db->where("user.is_active",1);
      $this->db->group_by('us.u_Id');

       if($sort == '')
       {
         $this->db->order_by('successScore','desc');
       }

       if($sort == '1')
       {
       $this->db->order_by('maxPrice','asc');
       $this->db->order_by('successScore','desc');

       }
       else if($sort == '2')
       {
       $this->db->order_by('maxPrice','desc');
       $this->db->order_by('successScore','desc');

       }
      $this->db->limit('12');
      $result = $this->db->get();
      $result = $result->result();

      return $result;

    }



    public function searchBySc($service,$whr,$hourly,$sort)
    {
      $this->db->select("c.code,c.symbol,user_meta.u_id,user.type,user.successScore as score,user.rating,user.parent,user_meta.name,user_meta.logo,user_meta.company_logo,user_meta.c_name,user_meta.maxPrice,
      (select name from services where id = us.servicesId ) as service,
      (select timeStamp from user_onlinelog where u_id = us.u_id ) as timeStamp,
      (select name from countries where id = user_meta.country ) as country,
      (select sortname from countries where id = user_meta.country ) as scountry");
      $this->db->from('user');
      $this->db->join('user_meta','user_meta.u_id = user.id ','inner');
      $this->db->join('user_services as us','user_meta.u_id = us.u_id');
      $this->db->join('currency as c','c.id = user_meta.currencyId','left');

      if($hourly == '1')
      {
      $this->db->where('maxPrice <=','10');
      }

      else  if($hourly == '2')
      {
      $this->db->where( 'maxPrice >', '10');
      $this->db->where('maxPrice <=', '30');
      }
      else  if($hourly == '3')
      {
       $this->db->where( 'maxPrice >', '30');
      }
      $this->db->where($whr);
      $this->db->where('us.servicesId',$service);

      $this->db->where('us.servicesId',$service);
      $this->db->where_in("user.access",[1,2]);
      $this->db->where_in("user.type",[2,3]);
      $this->db->where("user.is_active",1);
      $this->db->group_by('us.u_Id');

       if($sort == '')
       {
         $this->db->order_by('successScore','desc');
       }

       if($sort == '1')
       {
       $this->db->order_by('maxPrice','asc');
       $this->db->order_by('successScore','desc');
       }
       else if($sort == '2')
       {
       $this->db->order_by('maxPrice','desc');
       $this->db->order_by('successScore','desc');

       }
      $this->db->limit('12');
      $result = $this->db->get();
      $result = $result->result();
      return $result;

    }


    public function getcase_study($whr,$start,$perPage)
    {
      $this->db->select('st.*,ind.name as industry,ser.name as service');
      $this->db->from('user_case_studies as st');
      $this->db->join('practice_areas as ind','st.industryId = ind.id');
      $this->db->join('services as ser','st.serviceId = ser.id');
      $this->db->where($whr);
      $this->db->limit($perPage,$start);
      $this->db->order_by('casestudyId','desc');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
   }

  public function getclient($whr)
  {
    $this->db->select('um.name,um.u_id,um.c_name');
    $this->db->from('user_jobcontract as uc');
    $this->db->join('user_meta as um','uc.clientId = um.u_id');
    $this->db->where($whr);
    $this->db->group_by('uc.clientId');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

 public function getfreelancer($whr)
 {
   $this->db->select('um.name,um.u_id,um.c_name,u.type');
   $this->db->from('user_jobcontract as uc');
   $this->db->join('user_meta as um','uc.freelancerId = um.u_id');
   $this->db->join('user as u','u.id = um.u_id');
   $this->db->where($whr);
   $this->db->group_by('uc.freelancerId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
}

  public function getCaseStudy($whr)
  {
    $this->db->select('st.*,ind.name as industry,ser.name as service');
    $this->db->from('user_case_studies as st');
    $this->db->join('practice_areas as ind','st.industryId = ind.id');
    $this->db->join('services as ser','st.serviceId = ser.id');
    $this->db->where($whr);
    $this->db->order_by('casestudyId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
 }

  public function getteam($whr,$start,$perPage)
  {
    $this->db->select('us.id as u_id,us.email,us.deleted,us.is_active,us.access,um.name,um.desig,um.address1,um.rep_ph_num as phone,um.maxPrice,um.logo,c.code,c.symbol');
    $this->db->from('user as us');
    $this->db->join('user_meta as um','um.u_id = us.id');
    $this->db->join('currency as c','c.id = um.currencyId','left');
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $this->db->order_by('us.id','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getservice_pricing($whr,$start,$perPage)
  {
    $this->db->select('pr.*,ser.name as service,c.*');
    $this->db->from('service_pricing as pr');
    $this->db->join('services as ser','pr.serviceId = ser.id');
    $this->db->join('currency as c','c.id = pr.currencyId');
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $this->db->order_by('pricingId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getTeamRow($whr)
  {
    $this->db->select('u_ser.servicesId,us.email,us.access,us.is_active,um.*');
    $this->db->from('user as us');
    $this->db->join('user_meta as um','um.u_id = us.id');
    $this->db->join('user_services as u_ser','u_ser.u_id = us.id');
  //  $this->db->join('services as s','s.id = u_ser.servicesId');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function getservices($whr)
  {
    $this->db->select('ser.name as service,ser.id');
    $this->db->from('user_services as us');
    $this->db->join('services as ser','us.servicesId = ser.id');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getjobskill($whr)
  {
    $this->db->select('ser.name as service,ser.id');
    $this->db->from('job_meta as us');
    $this->db->join('services as ser','us.value = ser.id');
    $this->db->where($whr);
    $this->db->where('type','service');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }



  public function getjobindustry($whr)
  {
    $this->db->select('ser.name as industry,ser.id');
    $this->db->from('job_meta as us');
    $this->db->join('practice_areas as ser','us.value = ser.id');
    $this->db->where($whr);
    $this->db->where('type','industry');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getjobpostClient($whr)
  {
    $this->db->select('um.*');
    $this->db->from('user_joboffer as off');
    $this->db->join('user_meta as um','um.u_id = off.offFrom');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }


  public function getPortfolioServices($whr)
  {
    $this->db->select('ser.name as service,ser.id');
    $this->db->from('portfolio_services as ps');
    $this->db->join('services as ser','ps.servicesId = ser.id');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }



  public function getindustry($whr)
  {
    $this->db->select('pr.name as industry,pr.id');
    $this->db->from('user_industries as ui');
    $this->db->join('practice_areas as pr','ui.industryId  = pr.id');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }


  public function getclientjobs($whr)
  {
    $this->db->select('jb.*,jo.*');
    $this->db->from('user_joboffer as jb');
    $this->db->join('user_job as jo', 'jo.jobId = jb.jobId');
    $this->db->where($whr);
    $this->db->order_by('offId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

    public function getjobs($whr,$start,$perPage)
    {
      $this->db->select("jb.*,jo.*,(select name from user_meta where u_id = jb.offTo ) as name,c.code,c.symbol");
      $this->db->from('user_joboffer as jb');
      //$this->db->join('user_meta as um', 'um.u_id = jb.offTo');
      $this->db->join('user_job as jo', 'jo.jobId = jb.jobId');
      $this->db->join('currency as c', 'c.id = jo.currencyId');
      $this->db->where($whr);
      $this->db->limit($perPage,$start);
      $this->db->order_by('offId','desc');
      $this->db->group_by('jb.jobId');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function profileListingByService($service,$industry,$country,$state,$city)
    {
      $this->db->select("u.id,u.email,u.type,um.*,c.code,c.symbol,(select timeStamp from user_onlinelog where u_id = us.u_id ) as timeStamp,
      (select name from countries where id = um.country ) as country,
      (select name from states where id = um.state ) as state,
      (select name from cities where id = um.city ) as city,
      (select sum(score) from user_service_ranking where servicesId = $service AND userid = us.u_id ) as score
      ");
      $this->db->from('user_meta as um');
      $this->db->join('user_services as us','um.u_id = us.u_id');
      $this->db->join('currency as c','c.id = um.currencyId','left');
      if($industry != 'industry')
      {
      $this->db->join('user_industries as ind','um.u_id = ind.u_id');
      }
      if($country != 'country')
      {
      $this->db->where('um.country',$country);
      }
      if($state != 'state')
      {
      $this->db->where('um.state',$state);
      }
      if($city != 'city')
      {
      $this->db->where('um.city',$city);
      }
      $this->db->join('user as u','u.id = um.u_id');
      // $this->db->where("um.u_id in (SELECT id FROM user where type = 3 or type = 2   )");
      // $this->db->where("um.u_id in (SELECT id FROM user where access = 1 and is_active = 1   )");
      $this->db->where('us.servicesId',$service);
      $this->db->where('u.type',2);
      if($industry != 'industry')
      {
      $this->db->where('ind.industryId',$industry);
      }
      $this->db->group_by('um.u_Id');
      $this->db->order_by('score','desc');
      $this->db->limit('10');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getrankingContent($service,$industry,$country,$state,$city)
    {
      $this->db->select("*");
      $this->db->from('ranking_content as c');

      if($industry != 'industry')
      {
      $this->db->where('industryId',$industry);
      }
      else{
        $this->db->where('industryId','0');

      }
      //
      if($country != 'country')
      {
      $this->db->where('countryId',$country);
      }
      else
      {
        $this->db->where('countryId','0');
      }
      if($state != 'state')
      {
      $this->db->where('stateId',$state);
      }
      else
      {
        $this->db->where('stateId','0');
      }
      if($city != 'city')
      {
      $this->db->where('cityId',$city);
      }
      else
      {
        $this->db->where('cityId','0');
      }

     if($service != 'service')
     {
      $this->db->where('servicesId',$service);
     }
     else
     {
       $this->db->where('servicesId','0');
      }
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getrankingContenthire($service,$country)
    {
      $this->db->select("*");
      $this->db->from('ranking_content as c');

     if(!empty($country))
      {
      $this->db->where('countryId',$country);
      }

      $this->db->where('servicesId',$service);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getClientOpenJobs($whr)
    {
      $this->db->select("j.*,c.code,c.symbol");
      $this->db->from('user_joboffer as jo');
      $this->db->join('user_job as j','j.jobId = jo.jobId');
      $this->db->join('currency as c','c.id = j.currencyId');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getClientOpenedJobs($whr,$date)
    {
      $this->db->select("j.*,c.code,c.symbol");
      $this->db->from('user_joboffer as jo');
      $this->db->join('user_job as j','j.jobId = jo.jobId');
      $this->db->join('currency as c','c.id = j.currencyId');
      $this->db->where($whr);
      $this->db->where('j.jobExpire >=',$date);
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getfreelancerJobs($whr,$start,$perPage)
    {
      $this->db->select('jc.*,um.name,um.u_id,jo.*');
      $this->db->from('user_jobcontract as jc');
      $this->db->join('user_meta as um', 'um.u_id = jc.clientId');
      $this->db->join('user_job as jo', 'jo.jobId = jc.jobId');
      $this->db->where($whr);
      $this->db->limit($perPage,$start);
      $this->db->order_by('contractId','desc');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getfindworksJobs($start,$perPage)
    {
      $this->db->select('j.*,c.name as country,us.u_id');
      $this->db->from('user_joboffer as jo');
      $this->db->join('user_job as j', 'j.jobId = jo.jobId');
      $this->db->join('user_meta as us','us.u_id = jo.offFrom');
      $this->db->join('countries as c','c.id = us.country','left');
      // $this->db->where($whr);
      $this->db->limit($perPage,$start);
      $this->db->order_by('jobId','desc');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getJobsByskill($whr,$start,$perPage)
    {
      $this->db->select('j.*,c.name as country,us.u_id');
      $this->db->from('user_joboffer as jo');
      $this->db->join('user_job as j', 'j.jobId = jo.jobId');
      $this->db->join('user_meta as us','us.u_id = jo.offFrom');
      $this->db->join('countries as c','c.id = us.country');
      $this->db->join('job_meta as jm','jm.jobId = j.jobId');
      $this->db->where($whr);
      $this->db->limit($perPage,$start);
      $this->db->order_by('jobId','desc');
      $this->db->group_by('j.jobId');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }


     public function getUsers($whr,$start,$perPage)
     {
      $this->db->select("us.email,us.type,us.parent,us.is_active,us.date_created,um.*,l.status as lstatus,c.totalamount");
      $this->db->from('user as us');
      $this->db->join('user_meta as um','um.u_id = us.id');
      $this->db->join('admin_lead as l','l.userId = us.id','left');
      $this->db->join('user_custom_plan as c','c.userId = us.id','left');
      $this->db->where($whr);
      $this->db->limit($perPage,$start);
      $this->db->order_by('us.id','desc');
       // echo $this->db->last_query(); die;
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getCompanyAllUsers($whr,$start,$perPage)
    {
     $this->db->select("us.email,us.type,us.parent,us.is_active,um.u_id,um.name,um.salary,um.perday,um.perHour");
     $this->db->from('user as us');
     $this->db->join('user_meta as um','um.u_id = us.id');
     $this->db->where($whr);
     $this->db->limit($perPage,$start);
     $this->db->order_by('us.id','desc');
      // echo $this->db->last_query(); die;
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }



    public function getfreelancerUsers($start,$perPage)
    {
     $this->db->select("us.email,us.type,us.parent,us.is_active,um.name,um.c_name,um.u_id,us.date_created,l.status as lstatus,c.totalamount");
     $this->db->from('user as us');
     $this->db->join('user_meta as um','um.u_id = us.id');
     $this->db->join('admin_lead as l','l.userId = us.id','left');
     $this->db->join('user_custom_plan as c','c.userId = us.id','left');
     $this->db->where_in("type",[2,3]);
     $this->db->limit($perPage,$start);
     $this->db->order_by('us.id','desc');
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function getfreelancerUsersSearch($field,$keyword,$start,$perPage)
   {
    $this->db->select("us.email,us.type,us.parent,us.is_active,um.name,um.c_name,um.u_id,us.date_created,l.status as lstatus,c.totalamount");
    $this->db->from('user as us');
    $this->db->join('user_meta as um','um.u_id = us.id');
    $this->db->join('admin_lead as l','l.userId = us.id');
    $this->db->join('user_custom_plan as c','c.userId = us.id','left');
    $this->db->like($field,$keyword,'both');
    $this->db->where_in("type",[2,3]);
    $this->db->limit($perPage,$start);
    $this->db->order_by('us.id','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getUsersSearch($whr,$keyword,$start,$perPage)
  {
   $this->db->select("us.email,us.type,us.parent,us.is_active,us.date_created,um.name,l.status as lstatus,c.totalamount");
   $this->db->from('user as us');
   $this->db->join('user_meta as um','um.u_id = us.id');
   $this->db->join('admin_lead as l','l.userId = us.id','left');
   $this->db->join('user_custom_plan as c','c.userId = us.id','left');
   $this->db->like('um.name',$keyword,'both');
   $this->db->where($whr);
   $this->db->limit($perPage,$start);
   $this->db->order_by('us.id','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

    public function getSingleUser($whr)
    {
      $this->db->select("us.email,us.successScore,us.parent,us.rating,us.is_active,us.type,us.date_created,um.*,(select name from countries  where id = um.country ) as country,(select name from states  where id = um.state ) as state,(select name from cities  where id = um.city ) as city,(select timeStamp from user_onlinelog where u_id = um.u_id ) as timeStamp");
      $this->db->from('user as us');
      $this->db->join('user_meta as um','um.u_id = us.id','left');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getprofile($whr)
    {
      $this->db->select("us.email,us.is_active,us.date_created,us.type,um.*");
      $this->db->from('user as us');
      $this->db->join('user_meta as um','um.u_id = us.id');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getuserServices($id)
    {
      $this->db->select('se.id,se.name');
      $this->db->from('services as se');
      $this->db->where("id in (SELECT servicesId  FROM user_services where u_id = $id )");
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getServicesinfo($id)
    {
      $this->db->select("se.id as sid,se.name,(select ser_brief from user_service_brief where serviceId = se.id and u_id = $id ) as description,(select id from user_service_brief where serviceId = se.id and u_id = $id ) as did ");
      $this->db->from('services as se');
      $this->db->where("id in (SELECT servicesId  FROM user_services where u_id = $id )");
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getuserIndustry($id)
    {
      $this->db->select('ind.id,ind.name');
      $this->db->from('practice_areas as ind');
      $this->db->where("id in (SELECT industryId  FROM user_industries where u_id = $id )");
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getclientcontract($whr,$start,$perPage)
    {
      $this->db->select('jb.*,jc.*,um.name as freelancername,um.logo as logo,um.company_logo,u.type,c.code,c.symbol');
       $this->db->from('user_jobcontract as jc');
       $this->db->join('user_job as jb','jc.jobId = jb.jobId');
       $this->db->join('user_meta as um','um.u_id = jc.freelancerId');
       $this->db->join('user as u','u.id = jc.freelancerId');
       $this->db->join('currency as c','c.id = jb.currencyId');
       $this->db->where($whr);
       $this->db->limit($perPage,$start);
       $this->db->order_by('jc.contractId','desc');
       $result = $this->db->get();
       $result = $result->result();
       return $result;
    }



    public function getOneNotification($whr)
    {
      $this->db->select('um.name,um.u_id,un.*');
      $this->db->from('user_notification as un');
      $this->db->join('user_meta as um', 'um.u_id = un.notificationFrom');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getFreelancerContract($whr,$start,$perPage)
    {
     $this->db->select('jb.*,jo.*,jc.*,u.name as clientname,u.logo as clogo,c.code,c.symbol');
      $this->db->from('user_job as jb');
      $this->db->join('user_joboffer as jo','jo.jobId = jb.jobId');
      $this->db->join('user_jobcontract as jc','jc.jobId = jb.jobId');
      $this->db->join('user_meta as u','u.u_id = jc.clientId');
      $this->db->join('currency as c','c.id = jb.currencyId');
      $this->db->where($whr);
      $this->db->limit($perPage,$start);
      $this->db->group_by('jc.jobId');
      $this->db->order_by('jc.contractId','desc');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getCurrentjobs($whr,$start,$perPage)
    {
     $this->db->select('jb.*,jo.*,jc.*,c.code,c.symbol');
      $this->db->from('user_job as jb');
      $this->db->join('user_joboffer as jo','jo.jobId = jb.jobId');
      $this->db->join('user_jobcontract as jc','jc.jobId = jb.jobId');
      $this->db->join('currency as c','c.id = jb.currencyId');
      $this->db->where($whr);
      $this->db->limit($perPage,$start);

      $result = $this->db->get();

      $result = $result->result();
      return $result;
    }

    public function getFreelancerJob($whr,$start,$perPage)
    {
      $this->db->select('jb.*,jo.*,c.symbol,c.code,(select proposalBid from user_job_proposal where jobId = jb.jobId and  u_id = jb.offTo ) as proposalBid');
      $this->db->from('user_joboffer as jb');
      $this->db->join('user_job as jo', 'jo.jobId = jb.jobId');
      $this->db->join('currency as c', 'c.id = jo.currencyId');
      $this->db->where($whr);
      $this->db->where('jb.offStatus','0');
      $this->db->limit($perPage,$start);
      $this->db->order_by('offId','desc');
      $result = $this->db->get();

      $result = $result->result();
      return $result;
    }

    public function getfreelancerActiveContract($whr)
    {
     $this->db->select('jb.*,jo.*,jc.*');
      $this->db->from('user_job as jb');
      $this->db->join('user_joboffer as jo','jo.jobId = jb.jobId');
      $this->db->join('user_jobcontract as jc','jc.jobId = jb.jobId');
      $this->db->where($whr);

      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getFreelancerJobDetail($whr)
    {
      $this->db->select('jb.*,jo.*,(select proposalBid from user_job_proposal where jobId = jb.jobId and  u_id = jo.offTo ) as proposalBid,(select proposalId from user_job_proposal where jobId = jb.jobId and  u_id = jo.offTo ) as proposalId,(select newProposedOffer from user_job_proposal where jobId = jb.jobId and  u_id = jo.offTo ) as newProposedOffer');
      $this->db->from('user_job as jb');
      $this->db->join('user_joboffer as jo','jo.jobId = jb.jobId');
      $this->db->where($whr);
      $this->db->where('offStatus',0);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getClientJobDetail($whr)
    {
      $this->db->select('jb.*,jo.*');
      $this->db->from('user_job as jb');
      $this->db->join('user_joboffer as jo','jo.jobId = jb.jobId');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }



    public function getevent($whr,$attendeeId)
    {
      $this->db->select('ev.*,ed.*');
      $this->db->from('event as ev');
      $this->db->join('event_attendee as ed','ed.eventId = ev.eventId');
      $this->db->where($whr);
      $this->db->where($attendeeId);
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getpricing($whr)
    {
      $this->db->select('sp.*,se.name,c.code,c.symbol');
      $this->db->from('service_pricing as sp');
      $this->db->join('services as se','sp.serviceId = se.id');
      $this->db->join('currency as c','c.id = sp.currencyId ');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getContractDetail($whr)
    {
      $this->db->select('jb.*,jc.*');
      $this->db->from('user_jobcontract as jc');
      $this->db->join('user_job as jb','jc.jobId = jb.jobId');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

   public function job_detail($whr)
    {
      $this->db->select('jb.*,um.name,um.u_id');
      $this->db->from('user_joboffer as jb');
      $this->db->join('user_meta as um', 'um.u_id = jb.offTo');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }



    public function chatPerson($id)
    {
      $this->db->select("cf.*,um.name as fname ,um.logo  as flogo,um.u_id  as fid,on.timeStamp as ftimestamp,um2.name as cname ,um2.logo  as clogo,um2.u_id  as cid,on2.timeStamp as ctimestamp,cf.friendStatus as status,(select jobTitle from user_job where jobId = cf.jobId ) as jobtitle,(select jobId from user_jobcontract where jobId = cf.jobId and  clientId = cf.friendUser and freelancerId = cf.friendContact ) as contractId");
      $this->db->from('user_friendcontact as cf');
      $this->db->join('user_meta as um','cf.friendContact = um.u_id');
      $this->db->join('user_meta as um2','cf.friendUser = um2.u_id');
      $this->db->join('user_onlinelog as on','cf.friendContact = on.u_id');
      $this->db->join('user_onlinelog as on2','cf.friendUser = on2.u_id');
      $this->db->where('cf.friendUser',$id)
      ->or_group_start()
      ->where('cf.friendContact',$id)
      ->group_end();
      $result = $this->db->get();
      // echo $this->db->last_query();
      // die;
      $result = $result->result();
      return $result;
    }

    public function chatActivePerson($id,$st)
    {

      $this->db->select("cf.*,um.name as fname ,um.logo  as flogo,um.u_id  as fid,um2.name as cname ,um2.logo  as clogo,um2.u_id  as cid");
      $this->db->from('user_jobcontract as cf');
      $this->db->join('user_meta as um','cf.clientId = um.u_id');
      $this->db->join('user_meta as um2','cf.freelancerId = um2.u_id');
      $this->db->where('contractStatus',$st);
      $this->db->where('cf.clientId',$id)
      ->or_group_start()
      ->where('cf.freelancerId',$id)
      ->group_end();

      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    // public function followupPerson($id)
    // {
    // $this->db->select("fc.*,um.name as fname ,um.logo  as flogo,um.u_id  as fid,um2.name as cname ,um2.logo  as clogo,um2.u_id  as cid");
    // $this->db->from('user_friendcontact as fc');
    // $this->db->join('user_meta as um','fc.friendContact = um.u_id');
    // $this->db->join('user_meta as um2','fc.friendUser = um2.u_id');
    // $this->db->where_not_in('fc.friendUser', 'fc.friendContact'  ('select clientId,freelancerId from user_jobcontract' ) and (fc.friendUser = $id || fc.friendContac = $id);
    // $result = $this->db->get();
    // $result = $result->result();
    // return $result;
    // }

     public function followupPerson($id)
     {
     $query = $this->db->query("select uf.*,um.name as fname ,um.logo  as flogo,um.u_id  as fid ,um2.name as cname ,um2.logo  as clogo,um2.u_id  as cid  from user_friendcontact as uf join user_meta as um on um.u_id = uf.friendContact join user_meta as um2 on um2.u_id = uf.friendUser where (friendUser, friendContact) not in (select clientId, freelancerId from user_jobcontract ) and (friendUser = $id or friendContact = $id)");
     $result = $query->result();
     return $result;
     }

    public function getmessage($id,$rid,$friendId)
    {

      $result = $this->db->select('um.messageId as id,um.messageOffer as offer,um.messageEdited as edited,um.messageDeleted as deleted,um.messageAttachment as attachment,um.messageTo as receiverId,um.messageFrom as senderId,um.messageText as message,um.messageDate as date,(select name from user_meta where u_id = um.messageFrom ) as senderName,(select logo from user_meta where u_id = um.messageFrom ) as senderlogo ,(select name from user_meta where u_id = um.messageTo ) as recevierName,(select logo from user_meta where u_id = um.messageTo ) as recevierlogo')->from('user_message as um')
        ->group_start()
        ->where('messageTo',$id)
        ->where('messageFrom',$rid)
        ->or_group_start()
        ->where('messageTo',$rid)
        ->where('messageFrom',$id)
        ->group_end()
        ->group_end()
        ->where('friendId',$friendId)
        ->get();
      $result = $result->result();
      return $result;

    }

    public function getmessageLatest($id,$rid,$friendId,$lastmessageId)
    {

      $result = $this->db->select('um.messageId as id,um.messageOffer as offer,um.messageAttachment as attachment,
      um.messageEdited as edited,um.messageDeleted as deleted,um.messageTo as receiverId,um.messageFrom as senderId,
      um.messageText as message,um.messageDate as date ,(select name from user_meta where u_id = um.messageFrom ) as senderName ,
      (select logo from user_meta where u_id = um.messageFrom ) as senderlogo,
      (select name from user_meta where u_id = um.messageTo ) as recevierName,
      (select logo from user_meta where u_id = um.messageTo ) as recevierlogo ')->from('user_message as um')
        ->group_start()
        ->where('messageTo',$id)
        ->where('messageFrom',$rid)
        ->or_group_start()
        ->where('messageTo',$rid)
        ->where('messageFrom',$id)
        ->group_end()
        ->group_end()
        ->where('messageId > ',$lastmessageId)
        ->where('friendId',$friendId)
        ->get();
      //  echo $this->db->last_query(); die;
      $result = $result->result();
      return $result;

    }

    public function getmessagerow($whr)
  	{
  		$this->db->select('um.messageId as id,um.messageOffer as offer,um.messageAttachment as attachment,
      um.messageEdited as edited,um.messageDeleted as deleted,um.messageTo as receiverId,
      um.messageFrom as senderId,um.messageText as message,um.messageDate as date ,
      (select name from user_meta where u_id = um.messageFrom ) as senderName ,
      (select logo from user_meta where u_id = um.messageFrom ) as senderlogo,
      (select name from user_meta where u_id = um.messageTo ) as recevierName,
      (select logo from user_meta where u_id = um.messageTo ) as recevierlogo, ');
      $this->db->from('user_message as um');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
  	}



    public function getfreelancerCountry()
    {
      $this->db->select('*');
      $this->db->from('user_meta');
      $this->db->where("u_id in (SELECT id FROM user where type = 3 or type = 2  )");
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getuserdetail($whr)
    {
      $this->db->select('us.*,um.*');
      $this->db->from('user as us');
      $this->db->join('user_meta as um', 'um.u_id = us.id');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getkeypeople($id)
    {
      $this->db->select('us.id,us.email,us.type,us.access,um.*,(select timeStamp from user_onlinelog where u_id = us.id ) as timeStamp');
      $this->db->from('user_meta as um');
      $this->db->join('user as us', 'um.u_id = us.id');
      // $this->db->join('user_services as se', 'se.u_id = us.id','left');
      // (select name from services where id = se.servicesId ) as service
      $this->db->where('us.parent',$id);
      $this->db->where('us.access',2);
      $this->db->where('us.is_active',1);
      $this->db->where('us.deleted',0);
       // $this->db->group_by('se.u_id');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getbySortFreelancer($table,$sort)
    {
      $this->db->select('*');
      $this->db->from($table);
      if($sort == '1')
      {
      $price = "10";
      $this->db->where('pricing  REGEXP', '.*"max";s:[0-9]+:"'.$price.'".*');
      }
      if($sort == '2')
      {
      $price = "5";
      $this->db->where('pricing  REGEXP', '.*"max";s:[0-9]+:"'.$price.'".*');
      }
    if($sort == '3')
     {
      $price = "15";
      $this->db->where('pricing  REGEXP', '.*"max";s:[0-9]+:"'.$price.'".*');
     }

      $this->db->limit('4');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getIn($tbl,$field,$ids)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->where_in($field,$ids);
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }



    public function getRecentOne($tbl,$whr,$field,$sort)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->where($whr);
      $this->db->limit(1);
      $this->db->order_by($field,$sort);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getByOrder($tbl,$whr,$field,$sort)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->where($whr);
      $this->db->order_by($field,$sort);
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function getOneRow($tbl,$whr,$field,$sort)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->where($whr);
      $this->db->limit(1);
      $this->db->order_by($field,$sort);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getone($tbl,$field,$sort)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->limit(1);
      $this->db->order_by($field,$sort);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }

    public function getoneOnly($tbl)
    {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->limit(1);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }


    public function getTopfreelancer()
    {
      $query = $this->db->query("select u_id, count(rankings) as count from user_top_rankings group by u_id Order by count(rankings) desc limit 18");
      $result = $query->result();
      return $result;
    }



    public function goodDateTime($date)
    {
      $a = date_format(date_create($date),"Y/m/d H:i:s");
      return $a;
    }

    public function goodDate($date)
    {
      $date = str_replace('/', '-', $date);
      $newDate = date("Y/m/d", strtotime($date));
      return $newDate;
    }

     public function getorder($userid)
     {
       $this->db->select('*');
       $this->db->from('chdmart_order');
       $this->db->where_in('orderId',"SELECT orderId FROM chdmart_orderitem where storeuserId='$userid'", FALSE);
       $result = $this->db->get();
       $result = $result->result();
        // $result = $this->db->last_query();
       return $result;
     }

    public function goodDateCondition($date)
    {
      $new = ($date != '' ? $this->common->goodDate($date) : '');
      return $new;
    }

    public function goodDateTimeCondition($date)
    {
      $new = ($date != '' ? $this->common->goodDateTime($date) : '');
      return $new;
    }

  	public function update($where,$data,$table)
  	{
  		$this->db->where($where);
  		$this->db->update($table,$data);

  		$db_error = $this->db->error();
  		if ($db_error['code'] == 0)
  			$output = array (1);
  		else
  			$output = array (0);
  			return $output;
  	}

    public  function autocomplete($field,$keyword,$tbl)
     {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where('status',1);
        $this->db->like($field,$keyword,'both');
        $query = $this->db->get();
        return $query->result();
   }



    public function linkedIndustryServices($id)
    {
      $this->db->select('se.name,se.id');
      $this->db->from('services as se');
      $this->db->where_not_in('id',"(select serviceId from practice_service_link where industryId = $id  ) ",false);
      $query = $this->db->get();
      return $query->result();
    }



    public function delete($table,$where)
  	{
  		$this->db->where($where);
  		$this->db->delete($table);
  		$db_error = $this->db->error();
  		if ($db_error['code'] == 0)
  			return '1';
  		else
  			return '0';
  	}

    public function deleteMultiple($table,$where,$values)
    {
      $this->db->where_in($where, $values);
      $this->db->where('started',0);
      $this->db->delete($table);
      $db_error = $this->db->error();
  		if ($db_error['code'] == 0)
  			return '1';
  		else
  			return '0';
    }

  	public function insert($table,$data)
  	{
  		$this->db->insert($table,$data);
  		$insert_id = $this->db->insert_id();
  		if( $insert_id != 0)
  			$output = array (1,$insert_id);
  		else
  			$output = array (0);
  		return $output;
  	}

  	public function insert_batch($table,$data)
  	{
  		$this->db->insert_batch($table,$data);
  		$insert_id = $this->db->insert_id();
  		if( $insert_id != 0)
  			$output = array (1,$insert_id);
  		else
  			$output = array (0);
  		return $output;
  	}

  	public function checkexist($table,$where)
  	{
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $output = $this->db->get();
        $output = $output->num_rows();
		    return $output;
  	}

  public function getbylimit($tbl,$whr,$limit)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->limit($limit);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getbylimitStart($tbl,$whr,$start,$perPage)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }




  public function getblog($whr,$start,$perPage)
  {
    $this->db->select('b.*,c.*');
    $this->db->from('blog as b');
    $this->db->join('category as c','c.categoryId = b.categoryId');
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $this->db->order_by('blogId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

public function getbypagination($tbl,$start,$perPage)
{
  $this->db->select('*');
  $this->db->from($tbl);
  // $this->db->where($whr);
  $this->db->limit($perPage,$start);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getbypaginationlike($tbl,$field,$keyword,$start,$perPage)
{
  $this->db->select('*');
  $this->db->from($tbl);
  $this->db->like($field,$keyword,'both');
  $this->db->limit($perPage,$start);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getadminblog($tbl,$start,$perPage)
{
  $this->db->select('*');
  $this->db->from($tbl);
  // $this->db->where($whr);
  $this->db->limit($perPage,$start);
  $this->db->order_by('blogId', "desc");
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getquestion($start,$perPage)
{
  $this->db->select('q.*,t.name');
  $this->db->from('question as q');
  $this->db->join('questiontype as t','t.id = q.questionTypeId');
  $this->db->limit($perPage,$start);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}


public function getserviceIndustry($whr)
{
  $this->db->select('se.id,se.name as name');
  $this->db->from('practice_service_link as li');
  $this->db->join('services as se' ,'se.id = li.serviceId');
  $this->db->where($whr);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getInserviceIndustry($whr)
{
  $this->db->select('se.id,se.name as name');
  $this->db->from('practice_service_link as li');
  $this->db->join('services as se' ,'se.id = li.serviceId');
  $this->db->where_in('industryId',$whr);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

    public function getTableFields($value ='')
    {
      $fields = $this->db->list_fields($value);
      return $fields;
    }

  public function get($tbl,$whr)
	{
		$this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}

	public function getjobSuccess($whr)
	{
		$this->db->select("re.reviewOverall,(SELECT COUNT(contractId) FROM user_jobcontract WHERE freelancerId = re.reviewTo and contractStatus = 2  ) as jobs");
    $this->db->from('user_jobcontract as jc');
    $this->db->join('user_review as re','re.contractId = jc.contractId');
    $this->db->where($whr);
    $this->db->where('jc.contractStatus','2');
    $this->db->where('re.reviewType','total');
    $this->db->where('contractEndDate >= DATE_SUB(now(), INTERVAL 12 MONTH)');
    $this->db->group_by('re.contractId');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}

  public function getgigSuccess($whr)
	{
		$this->db->select("re.reviewOverall,(SELECT COUNT(user_gig_buyId) FROM user_gig_buy WHERE userId = re.reviewTo and status = 2  ) as jobs");
    $this->db->from('user_gig_buy as b');
    $this->db->join('user_review as re','re.user_gig_buyId = b.user_gig_buyId');
    $this->db->where($whr);
    $this->db->where('b.status','2');
    $this->db->where('re.reviewType','total');
    $this->db->where('endDate >= DATE_SUB(now(), INTERVAL 12 MONTH)');
    $this->db->group_by('re.reviewId');
    $result = $this->db->get();

    $result = $result->result();
    return $result;
	}

  public function gettoprated($whr)
	{
		$this->db->select('jc.contractAmount');
    $this->db->from('user_jobcontract as jc');
    $this->db->where($whr);
    $this->db->where('jc.contractStatus','2');
    $this->db->where('contractEndDate >= DATE_SUB(now(), INTERVAL 12 MONTH)');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}

  public function getclientjobSuccess($whr)
	{
    // sum(re.reviewOverall)
		$this->db->select("sum(re.reviewOverall) as reviewOverall,(SELECT COUNT(reviewOverall) FROM user_review WHERE reviewTo = re.reviewTo and reviewType = 'total'  ) as jobs");
    $this->db->from('user_jobcontract as jc');
    $this->db->join('user_review as re','re.reviewTo = jc.clientId');
    $this->db->where($whr);
    $this->db->where('jc.contractStatus','2');
    $this->db->where('re.reviewType','total');
    $this->db->where('contractEndDate >= DATE_SUB(now(), INTERVAL 12 MONTH)');
    $this->db->group_by('re.reviewId');
    $result = $this->db->get();
    $result = $result->row();
    return $result;
	}

  public function getlike($tbl,$whr)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->like($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function get_groupby($tbl,$whr,$group_by)
	{
		$this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->group_by($group_by);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}


  public function getSorted($tbl,$whr,$field,$sort)
	{
		$this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->order_by($field, $sort);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}




  public function getRecent($tbl,$whr,$id,$howmany)
  {
    $this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $this->db->order_by($id, "desc");
    $this->db->limit($howmany);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }




	public function getrow($tbl,$whr)
	{
		$this->db->select('*');
    $this->db->from($tbl);
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
	}



  public function count_all_results($tbl,$whr)
  {
    $this->db->where($whr);
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;

  }

  public function count_all_hr_candidate($tbl,$whr)
  {

    $this->db->where($whr);
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;
  }



  public function count_all_employeeleave($tbl,$whr,$date)
  {
    $this->db->where($whr);
    if($date != '')
    {
      $this->db->where('date',$date);
    }

    if($date != '')
    {
     $this->db->group_start();
     $this->db->or_where('date1',$date);
     $this->db->group_end();
    }

    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function count_like($tbl,$field,$keyword)
  {
    $this->db->like($field,$keyword,'both');
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function countHiredFreelancer($tbl,$whr)
  {
    $this->db->where($whr);
    $this->db->from($tbl);
    $this->db->group_by('freelancerId');
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function count_freelancer()
  {
    $this->db->where_in("type",[2,3]);
    $this->db->from('user');
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function count_all_table($tbl)
  {
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function count_LatestNotification($tbl,$whr,$lastId)
  {
    $this->db->where($whr);
    $this->db->where('notificationId > ',$lastId);
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function getTable($tbl)
	{
		$this->db->select('*');
    $this->db->from($tbl);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}

  public function getFields($tbl,$whr,$fields)
	{
		$this->db->select(implode(',',$fields));
    $this->db->from($tbl);
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}



public function milestoneTasks($id)
{
  $this->db->select('*');
  $this->db->from('user_milestonetask');
  $this->db->where('milestoneId', $id);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function jobMilestonesTasks($id,$milestone = null)
{
  $this->db->select('*');
  $this->db->from('user_jobcontract as con');
  $this->db->join('user_offermilestone as mile','mile.jobId = con.jobId','left');
  $this->db->join('user_milestonetask as task','task.milestoneId = mile.milestoneId','left');
  $this->db->where('con.jobId', $id);
  if($milestone)
  $this->db->where('mile.milestoneId', $milestone);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function contractlog($type,$tids,$mids = null,$cids = null)
{
  $this->db->select('*');
  $this->db->from('user_log as log');

  $this->db->group_start();
  $this->db->where('logSubType','task');
  $this->db->where_in('logReference',$tids);
  $this->db->group_end();


  if($type == 'contract')
  {
    if($mids)
    {
      $this->db->or_group_start();
      $this->db->where('logSubType','milestone');
      $this->db->where_in('logReference',$mids);
      $this->db->group_end();
      // $this->db->group_end();
    }
    if($cids)
    {
      $this->db->or_group_start();
      $this->db->where('logSubType','contract');
      $this->db->where_in('logReference',$cids);
      $this->db->group_end();
    }
  }


  $result = $this->db->get();
  $result = $result->result();
  // echo "<pre>";
  // print_r($result);
  // echo $this->db->last_query();
  // die;
  return $result;
}

public function getcomment($whr)
{
  $this->db->select('um.name,log.*');
  $this->db->from('user_log as log');
  $this->db->join('user_meta as um','um.u_id = log.userId');
  $this->db->where($whr);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function contractreview($whr)
{
  $this->db->select('*');
  $this->db->from('user_jobcontract as jb');
  $this->db->join('user_review as rv','jb.contractId = rv.contractId');
  $this->db->join('user_offermilestone as m','m.jobId = jb.jobId');
  $this->db->where($whr);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getproposal($whr,$start,$perPage)
{
  $this->db->select("p.*,um.u_id,um.name,um.logo,um.company_logo,u.type");
  $this->db->from('user_job_proposal as p');
  $this->db->join('user_meta as um', 'um.u_id = p.u_id');
  $this->db->join('user as u', 'u.id = p.u_id');
  $this->db->where($whr);
  $this->db->limit($perPage,$start);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function countReviewproject($tbl,$whr)
{
   $this->db->where($whr);
   $this->db->where('milestoneId IS NULL', null, false);
   $this->db->where('linkedInId IS NULL', null, false);
   $this->db->from($tbl);
   $this->db->group_by('contractId');
   $count = $this->db->count_all_results();
   return  $count;
}

public function countReviewproject1($whr)
{
   $this->db->where($whr);
   $this->db->where('reviewType','total');
   $this->db->from('user_review');
   $count = $this->db->count_all_results();
   return  $count;
}

public function countTotalReview($whr)
{
  $this->db->select('SUM(reviewOverall) as total');
  $this->db->from('user_review');
  $this->db->where($whr);
  $this->db->where_not_in('reviewType','overall');
  $this->db->where_not_in('reviewType','review');
  $this->db->where_not_in('reviewType','total');
  $result = $this->db->get();
  $result = $result->row();
  return $result;
}

public function getOnlyFreelancer()
{

  $this->db->select('user.id,user.email,user.type');
  $this->db->from('user');
  $this->db->where_not_in('type',4);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getFreelancerProposal($whr,$start,$perPage)
{
  $this->db->select('p.*,j.*,um.name,um.logo,u.type,um.company_logo,c.code,c.symbol');
  $this->db->from('user_job_proposal as p');
  $this->db->join('user_job as j', 'p.jobId = j.jobId');
  $this->db->join('user_meta as um', 'um.u_id = p.u_id');
  $this->db->join('user as u', 'u.id = um.u_id');
  $this->db->join('currency as c', 'c.id = j.currencyId','left');
  $this->db->where($whr);
  $this->db->limit($perPage,$start);
  $this->db->order_by('proposalId','desc');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getHireContent($start,$perPage)
{
  $this->db->select('h.*,s.name as service');
  $this->db->from('hire_ranking_content as h');
  $this->db->join('services as s','s.id = h.servicesId');
  $this->db->limit($perPage,$start);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getOnlyClient()
{

  $this->db->select('*');
  $this->db->from('user');
  $this->db->where('type',4);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getproposaldetail($whr)
{
  $this->db->select('p.*,c.code,c.symbol,user.name,user.c_name,user.u_id,user.company_logo,user.logo,u.type,u.parent,u.successScore');
  $this->db->from('user_job_proposal as p');
  $this->db->join('user_meta as user','user.u_id = p.u_id');
  $this->db->join('user as u','u.id = user.u_id');
  $this->db->join('user_job as j','j.jobId = p.jobId');
  $this->db->join('currency as c','c.id = j.currencyId');
  $this->db->where($whr);
  $result = $this->db->get();
  $result = $result->row();
  return $result;
}

public function SumMilestoneAmount($whr)
{
  $this->db->select('SUM(milestoneAmount) as total');
  $this->db->from('user_offermilestone');
  $this->db->where($whr);
  $result = $this->db->get();
  $result = $result->row();
  return $result;
}

public function getCompanyTeam($whr)
{
  $this->db->select('us.id as u_id,us.email,us.is_active,us.access,um.name,um.desig,um.address1,um.rep_ph_num as phone,um.maxPrice,um.logo,um.about,um.currencyId,um.perHour');
  $this->db->from('user as us');
  $this->db->join('user_meta as um','um.u_id = us.id');
  $this->db->where($whr);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function RankingServices1($whr)
{
  $this->db->select('r.reviewId,jc.contractId,jc.freelancerId,jc.clientId,j.servicesId,r.reviewTo,r.reviewType');
  $this->db->from('user_jobcontract as jc');
  $this->db->join('user_job as j','jc.jobId = j.jobId');
  $this->db->join('user_review as r', 'r.reviewTo = jc.freelancerId');
  //$this->db->where('r.contractId','jc.contractId');
  $this->db->where('jc.contractStatus',2);
  $this->db->where($whr);
  //$this->db->where('jc.contractEndDate >= DATE_SUB(now(), INTERVAL 12 MONTHS)');
  $this->db->where('r.reviewType','total');
  $this->db->where('r.milestoneId IS NULL', null, false);
  $this->db->where('r.linkedInId IS NULL', null, false);
  $this->db->group_by('r.reviewId');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getlinkedinreview($whr)
{
  $this->db->select('l.*,c.code,c.symbol');
  $this->db->from('user_review as r');
  $this->db->join('linkedIn_user as l','l.linkedInId = r.linkedInId');
  $this->db->join('currency as c','c.id = l.currencyId');
  $this->db->where($whr);
  $this->db->group_by('l.linkedInId');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}


 public function RankingServices()
 {
   $this->db->select('r.reviewId,u.id as freelancerId,u.type,jc.jobId,r.contractId,r.reviewFrom as clientId,j.servicesId,r.reviewOverall,r.reviewType,
   (select country from user_meta where u_id = u.id ) as location,(select country from user_meta where u_id = r.reviewFrom ) as clocation');
   $this->db->from('user as u');
   $this->db->join('user_jobcontract as jc','jc.freelancerId = u.id');
   $this->db->join('user_job as j','jc.jobId = j.jobId');
   $this->db->join('user_review as r', 'r.contractId = jc.contractId');
   //$this->db->where('r.contractId','jc.contractId');
   $this->db->where('jc.contractStatus',2);
   $this->db->where('jc.contractEndDate >= DATE_SUB(now(), INTERVAL 12 MONTH)');
   $this->db->where('r.reviewType','total');
   $this->db->where('r.milestoneId IS NULL', null, false);
   $this->db->where('r.linkedInId IS NULL', null, false);
   $this->db->group_by('jc.contractId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }


 public function linkedinReviewRanking()
 {
   $this->db->select('r.reviewId,r.reviewTo as freelancerId,r.linkedInId,l.servicesId,l.industryId,l.country as clocation,r.reviewOverall,r.reviewType,(select country from user_meta where u_id = r.reviewTo ) as location,');
   $this->db->from('user_review as r', 'r.reviewTo = r.id');
   $this->db->join('linkedIn_user as l', 'l.linkedInId  = r.linkedInId');
   $this->db->where('r.reviewType','total');
   $this->db->where('r.milestoneId IS NULL', null, false);
   $this->db->where('r.contractId IS NULL', null, false);
   $this->db->group_by('r.linkedInId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getServiceScore($whr,$service,$industry,$country)
 {
   $this->db->select('SUM(score) as total,count(id) as count');
   $this->db->from('user_service_ranking');
   $this->db->where($whr);

    if($service != 'service')
    {
     $this->db->where('servicesId',$service);
    }

    if($industry != 'industry')
    {
     $this->db->where('industryId',$industry);
    }

    if($country != 'country')
    {
     $this->db->where('countryId',$country);
    }

   $result = $this->db->get();

   $result = $result->row();
   return $result;
 }

 // public function getRankingSingleProfile()
 // {
 //   $this->db->select("u.id,u.email,u.type,um.*,(select timeStamp from user_onlinelog where u_id = us.u_id ) as timeStamp");
 //   $this->db->from('user_meta as um');
 //   $this->db->join('user as u','u.id = um.u_id');
 //   $result = $this->db->get();
 //   $result = $result->row();
 //   return $result;
 // }

 public function clientSpendAmount($whr)
 {
   $this->db->select('SUM(contractAmount) as total');
   $this->db->from('user_jobcontract');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function getoneReview($whr)
 {
   $this->db->select('r.*');
   $this->db->from('user_service_ranking as rank');
   $this->db->join('user_review as r','r.contractId = rank.contractId');
   $this->db->where($whr);
   $this->db->limit(1);
   $this->db->order_by('rank.id','desc');
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function getoneReviewLinkedIn($whr)
 {
   $this->db->select('r.*');
   $this->db->from('user_service_ranking as rank');
   $this->db->join('user_review as r','r.linkedInId = rank.linkedInId');
   $this->db->where($whr);
   $this->db->limit(1);
   $this->db->order_by('rank.id','desc');
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function getoneReviewgig($whr)
 {
   $this->db->select('r.*');
   $this->db->from('user_service_ranking as rank');
   $this->db->join('user_review as r','r.user_gig_buyId = rank.user_gig_buyId');
   $this->db->where($whr);
   $this->db->limit(1);
   $this->db->order_by('rank.id','desc');
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function getreviewquestion($whr,$w)
 {
   $this->db->select('a.*,q.question');
   $this->db->from('linkedIn_user_answer as a');
   $this->db->join('question as q','q.id = a.questionId');
   $this->db->where($whr);
   $this->db->where($w);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getHomeblog($whr,$limit)
 {
   $this->db->select('b.*,c.*');
   $this->db->from('blog as b');
   $this->db->join('category as c','c.categoryId = b.categoryId');
   $this->db->where($whr);
   $this->db->limit($limit);
   $this->db->order_by('blogId','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_linkedreview($whr)
 {
   $this->db->from('user_review as r');
   $this->db->join('linkedIn_user as l','l.linkedInId = r.linkedInId');
   $this->db->where($whr);
   $this->db->where('r.reviewType','overall');
  // $this->db->group_by('l.linkedInId');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function getlinkedinreviewpaginate($whr,$start,$perPage)
 {
   $this->db->select('l.*');
   $this->db->from('user_review as r');
   $this->db->join('linkedIn_user as l','l.linkedInId = r.linkedInId');
   $this->db->where($whr);
   $this->db->group_by('l.linkedInId');
   $this->db->limit($perPage,$start);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function userrank()
 {
  $query = $this->db->query("SELECT userId,sum(score) as score, (SELECT COUNT(*)+1 FROM user_service_ranking WHERE score>x.score) AS rank FROM  `user_service_ranking` x WHERE x.userId = 121 and servicesId = 54");
  $result = $query->row();
  return $result;
//   SELECT id, userId,sum(score) as score, FIND_IN_SET( score, (
// SELECT GROUP_CONCAT( score
// ORDER BY score DESC )
// FROM user_service_ranking )
// ) AS rank
// FROM user_service_ranking where userId = 122 and servicesId = 54
 }

 public function getconference($tbl,$start,$perPage)
 {
   $this->db->select('*');
   $this->db->from($tbl);
   $this->db->limit($perPage,$start);
   $this->db->order_by('id','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getfrontconference($tbl,$whr,$start,$perPage)
 {
   $this->db->select('*');
   $this->db->from($tbl);
   $this->db->where($whr);
   $this->db->limit($perPage,$start);
   $this->db->order_by('id','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getusertestimonial($start,$perPage)
 {
   $this->db->select('um.name,um.u_id,u.type,um.c_name');
   $this->db->from('user_testimonial as ut');
   $this->db->join('user_meta as um','ut.u_id = um.u_id');
   $this->db->join('user as u','u.id = um.u_id');
   $this->db->limit($perPage,$start);
   $this->db->group_by('ut.u_id');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_usertestimonial()
 {
   $this->db->select('um.name,um.u_id');
   $this->db->from('user_testimonial as ut');
   $this->db->join('user_meta as um','ut.u_id = um.u_id');
   $this->db->group_by('ut.u_id');
   $count = $this->db->count_all_results();
   return  $count;
 }

 // portfolio

 public function getuserportfolio($start,$perPage)
 {
   $this->db->select('um.name,um.u_id,u.type,um.c_name');
   $this->db->from('user_portfolio as ut');
   $this->db->join('user_meta as um','ut.u_id = um.u_id');
   $this->db->join('user as u','u.id = um.u_id');
   $this->db->limit($perPage,$start);
   $this->db->group_by('ut.u_id');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_userportfolio()
 {
   $this->db->select('um.name,um.u_id');
   $this->db->from('user_portfolio as ut');
   $this->db->join('user_meta as um','ut.u_id = um.u_id');
   $this->db->group_by('ut.u_id');
   $count = $this->db->count_all_results();
   return  $count;
 }
 ///portfolio

 // case study
 public function getusercasestudy($start,$perPage)
 {
   $this->db->select('um.name,um.u_id,u.type,um.c_name');
   $this->db->from('user_case_studies as ut');
   $this->db->join('user_meta as um','ut.u_id = um.u_id');
   $this->db->join('user as u','u.id = um.u_id');
   $this->db->limit($perPage,$start);
   $this->db->group_by('ut.u_id');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_usercasestudy()
 {
   $this->db->select('um.name,um.u_id');
   $this->db->from('user_case_studies as ut');
   $this->db->join('user_meta as um','ut.u_id = um.u_id');
   $this->db->group_by('ut.u_id');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function getfreelancerPlan($whr)
 {
   $this->db->select('*');
   $this->db->from('user_membership as m');
   $this->db->join('packages as p','m.packageId = p.packageId');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }
 // case study

 //user pricing
 public function getuserpricing($start,$perPage)
 {
   $this->db->select('um.name,um.u_id,u.type,um.c_name');
   $this->db->from('service_pricing as ut');
   $this->db->join('user_meta as um','ut.u_id = um.u_id');
   $this->db->join('user as u','u.id = um.u_id');
   $this->db->limit($perPage,$start);
   $this->db->group_by('ut.u_id');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_userpricing()
 {
   $this->db->select('um.name,um.u_id');
   $this->db->from('service_pricing as ut');
   $this->db->join('user_meta as um','ut.u_id = um.u_id');
   $this->db->group_by('ut.u_id');
   $count = $this->db->count_all_results();
   return  $count;
 }

 //user pricing

  // user request form
  public function getuserrequest($start,$perPage)
  {
    $this->db->select('um.name,um.u_id,u.type,um.c_name');
    $this->db->from('requests as ut');
    $this->db->join('user_meta as um','ut.u_id = um.u_id');
    $this->db->join('user as u','u.id = um.u_id');
    $this->db->limit($perPage,$start);
    $this->db->group_by('ut.u_id');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function count_userrequestform()
  {
    $this->db->select('um.name,um.u_id');
    $this->db->from('requests as ut');
    $this->db->join('user_meta as um','ut.u_id = um.u_id');
    $this->db->group_by('ut.u_id');
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function getsuggestion($whr,$start,$perPage)
  {
    $this->db->select('*');
    $this->db->from('user_log as l');
    $this->db->limit($perPage,$start);
    $this->db->where($whr);
    $this->db->order_by('logId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getlinkedreviewSuccess($whr)
	{
		$this->db->select("re.reviewOverall,COUNT(l.linkedInId) as jobs");
    $this->db->from('user_review as re');
    $this->db->join('linkedIn_user as l','re.linkedInId = l.linkedInId');
    $this->db->where($whr);
    $this->db->where('re.reviewType','total');
    $this->db->where('l.date >= DATE_SUB(now(), INTERVAL 12 MONTH)');
    $this->db->group_by('re.reviewId');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}

  public function rankingScoreCount($whr)
  {
    $this->db->select('SUM(r.score) as score ,COUNT(r.id) as reviews');
    $this->db->from('user_service_ranking as r');
    $this->db->where($whr);
    $result = $this->db->get();

    $result = $result->row();
    return $result;
  }

  public function getAllUser()
	{
		$this->db->select("u.*,m.*");
    $this->db->from('user as u');
    $this->db->join('user_meta as m','m.u_id = u.id');
    // $this->db->where('is_active',1);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
	}

  public function getunverifiedUser()
  {
    $this->db->select("us.email,m.name,us.id");
    $this->db->from('user_log as u');
    $this->db->join('user_meta as m','m.u_id = u.userId');
    $this->db->join('user as us','us.id = u.userId');
    $this->db->where('u.logStatus',1);
    $this->db->where('u.logType','conversation');
    $this->db->where('u.logSubType','link');
    $this->db->where('us.is_active',0);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }


  public function getuserreview($start,$perPage)
  {
    $this->db->select('um.name,um.u_id,u.type,um.c_name');
    $this->db->from('user_review as r');
    $this->db->join('user_meta as um','r.reviewTo = um.u_id');
    $this->db->join('user as u','u.id = um.u_id');
    $this->db->limit($perPage,$start);
    $this->db->group_by('r.reviewTo');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function count_userreview()
  {
    $this->db->select('um.name,um.u_id');
    $this->db->from('user_review as r');
    $this->db->join('user_meta as um','r.reviewTo = um.u_id');
    $this->db->group_by('r.reviewTo');
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function getemployeeServices($whr)
  {
    $this->db->select('ser.name as service,ser.id');
    $this->db->from('company_employee_skill as s');
    $this->db->join('services as ser','s.servicesId = ser.id');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public  function Expenseautocomplete($field,$keyword,$tbl,$whr)
   {
      $this->db->select('*');
      $this->db->from($tbl);
      $this->db->where($whr);
      $this->db->like($field,$keyword,'both');
      $query = $this->db->get();
      return $query->result();
 }

 public function getCurrentMonthExpense($whr)
 {
    $this->db->select("e.*,c.code,c.symbol");
    $this->db->from('expense as e');
    $this->db->join('currency as c','c.id = e.currencyId');
    $this->db->where($whr);
    $this->db->or_where('recurring',1);
    $this->db->order_by('id','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
 }



 public function getprojectmanager($whr)
 {
   $this->db->select('m.u_id,m.name');
   $this->db->from('user as u');
   $this->db->join('user_meta as m','m.u_id = u.id');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public  function assignProjectUser($id,$field,$keyword)
  {
     $this->db->select('u.id,m.name');
     $this->db->from('user as u');
     $this->db->join('user_meta as m','u.id = m.u_id');
     $this->db->where('u.parent',$id);
     $this->db->where('u.access','3');
     $this->db->like($field,$keyword,'both');
     $query = $this->db->get();
     return $query->result();
 }

 public function getassignproject($whr)
  {
     $this->db->select('m.u_id as id,m.name');
     $this->db->from('project_task_assign as p');
     $this->db->join('user_meta as m','p.userId = m.u_id');
     $this->db->where($whr);
     $query = $this->db->get();
     return $query->result();
  }


  public function count_EmployeeProject($whr)
  {
    $this->db->from('project_task_assign as a');
    $this->db->join('project_task as t','t.taskId = a.projectTaskId');
    //$this->db->join('project as p','t.projectId = p.projectId');
    $this->db->where($whr);
    $this->db->group_by('t.projectId');
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function getEmployeeProject($whr,$start,$perPage)
  {
    $this->db->select('p.*,a.userId,COUNT(t.taskId) as ctask,sum(t.hours) as thours');
    $this->db->from('project_task_assign as a');
    $this->db->join('project_task as t','t.taskId = a.projectTaskId');
    $this->db->join('project as p','t.projectId = p.projectId');
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $this->db->group_by('t.projectId');
    $this->db->order_by('p.projectId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getEmployeeProjectTask($whr)
  {
    $this->db->select('t.*');
    $this->db->from('project_task as t');
    $this->db->join('project_task_assign as a','a.projectTaskId = t.taskId','inner');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }



  public function getEmployeeTask($projectId,$start,$perPage)
  {
    $this->db->select("p.hourlyPrice,t.name as task,t.hours,m.name as empname,um.name as empname1,h.name as task1,h.time as time1,t1.hours as hours1,(SELECT SUM(task1.time)  from todoList_billing as task1  where task1.projectId = $projectId && task1.userId = m.u_id && task1.taskId = t.taskId) as time");
    $this->db->from('project as p');
    $this->db->join('todoList as t','t.projectId = p.projectId');
    $this->db->join('todoList_history as h','h.projectId = h.projectId','left');
    $this->db->join('user_meta as m','m.u_id = t.assignedTo');
    $this->db->join('user_meta as um','um.u_id = h.userId','left');
    $this->db->join('todoList as t1','t1.id = h.todoId','left');
    $this->db->where('p.projectId',$projectId);
    $this->db->or_where('h.type','2');
    $this->db->limit($perPage,$start);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }
  // public function getEmployeeTask($projectId,$start,$perPage)
  // {
  //   $this->db->select("m.u_id,m.name,m.maxPrice,(SELECT SUM(task1.time)  from todoList_billing as task1  where task1.projectId = $projectId && task1.userId = m.u_id) as time,(SELECT p.projectName  from project as p  where p.projectId = $projectId) as projectName,(SELECT sum(hours)  from todoList as p  where p.projectId = $projectId && p.assignedTo = m.u_id) as totalHour,(SELECT p.hourlyPrice  from project as p  where p.projectId = $projectId) as hourlyPrice");
  //   $this->db->from('user_meta as m');
  //   $this->db->where('u_id IN (SELECT task.assignedTo from todoList as task  where task.projectId = '.$projectId.' and task.type = 2)', NULL, FALSE);
  //   $this->db->or_where('u_id IN (SELECT h.userId from todoList_history as h  where h.projectId = '.$projectId.' and h.type = 2)', NULL, FALSE);
  //   $this->db->limit($perPage,$start);
  //   $result = $this->db->get();
  //   $result = $result->result();
  //   return $result;
  // }

  public function getEmployeeTaskCount($projectId)
  {
    $this->db->select("*");
    $this->db->from('project as p');
    $this->db->join('todoList as t','t.projectId = p.projectId');
    $this->db->join('todoList_history as h','h.projectId = h.projectId','left');
    $this->db->join('user_meta as m','m.u_id = t.assignedTo');
    $this->db->join('user_meta as um','um.u_id = h.userId','left');
    $this->db->join('todoList as t1','t1.id = h.todoId','left');
    $this->db->where('p.projectId',$projectId);
    $this->db->or_where('h.type','2');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getproject($whr,$client,$projecttitle,$start,$perPage)
  {
    $this->db->select('p.*,u.name as assignto');
    $this->db->from('project as p');
    $this->db->join('user_meta as u','u.u_id = p.projectManagerId','left');
    $this->db->where($whr);
    if($client != '')
    {
    $this->db->like('p.clientName',$client,'both');
    }
    if($projecttitle != '')
    {
    $this->db->like('p.projectName',$projecttitle,'both');
    }
    $this->db->limit($perPage,$start);
    $this->db->order_by('projectId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getprojectM($whr,$start,$perPage)
  {
    $this->db->select('p.*,u.name as assignto');
    $this->db->from('project as p');
    $this->db->join('user_meta as u','u.u_id = p.projectManagerId','left');
    $this->db->where($whr);
    
    $this->db->limit($perPage,$start);
    $this->db->order_by('projectId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }


  public function count_all_projects($tbl,$whr,$client,$projecttitle)
  {
    if($client != '')
    {
    $this->db->like('clientName',$client,'both');
    }
    if($projecttitle != '')
    {
    $this->db->like('projectName',$projecttitle,'both');
    }
    $this->db->where($whr);
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;

  }

  public function allProjectAsigntoManager($whr)
  {
    $this->db->select('p.projectId,p.projectName');
    $this->db->from('project as p');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function sum_task_time($whr)
  {
    $this->db->select('SUM(time) as time');
    $this->db->from('todoList_billing');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function sum_project_paid_amount($whr)
  {
    $this->db->select('SUM(amount) as total');
    $this->db->from('project_milestones_amount');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function sum_income_paid_amount($whr)
  {
    $this->db->select('SUM(receivedAmount) as total');
    $this->db->from('income');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function sum_income_received_amount($whr)
  {
    $this->db->select('SUM(receivedAmount) as total');
    $this->db->from('income');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function getprojectByMonth($whr)
  {
    $this->db->select('YEAR(date) AS y,date, MONTH(date) AS m,MONTHNAME(date) as month,SUM(budget) as budget');
    $this->db->from('project');
    $this->db->group_by('y , m');
    $this->db->order_by('m', 'DESC');
    $this->db->where('date >= DATE_SUB(now(), INTERVAL 12 MONTH)');
    $this->db->where($whr);
    // $this->db->limit('12 ');
    $result = $this->db->get();
    // echo $this->db->last_query();
    // die;
    $result=$result->result();
    return $result;
  }

  public function sum_expense($whr)
  {
    $this->db->select('SUM(amount) as total');
    $this->db->from('expense');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function sum_salary($whr)
  {
    $this->db->select('SUM(salary) as total');
    $this->db->from('user as u');
    $this->db->join('user_meta as m','m.u_id = u.id');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function companyExpense($whr)
  {
    $this->db->select('YEAR(date) AS y,date, MONTH(date) AS m,MONTHNAME(date) as month,SUM(amount) as total');
    $this->db->from('expense');
    $this->db->group_by('y , m');
    //$this->db->order_by('m', 'DESC');
    $this->db->where($whr);
    $this->db->limit('12 ');
    $this->db->order_by('date', 'DESC');
    $result = $this->db->get();
    $result=$result->result();
    return $result;
  }

  public function getemployee($whr)
  {
   $this->db->select("um.name,us.id,um.salary,um.perHour");
   $this->db->from('user as us');
   $this->db->join('user_meta as um','um.u_id = us.id');
   $this->db->where($whr);
   $this->db->order_by('us.id','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getEmployeeProjectBymonth($whr)
 {
   $this->db->select("p.*,a.userId,COUNT(t.taskId) as ctask,sum(t.hours) as thours,(select maxPrice  from user_meta where u_id =a.userId) as employeeHourly");
   $this->db->from('project_task_assign as a');
   $this->db->join('project_task as t','t.taskId = a.projectTaskId');
   $this->db->join('project as p','t.projectId = p.projectId');
   $this->db->where($whr);
   $this->db->group_by('t.projectId');
   $this->db->order_by('p.projectId','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function billing($whr)
 {
   $this->db->select('YEAR(startDate) AS y,startDate AS start,stopDate AS end,MONTH(startDate) AS m,MONTHNAME(startDate) as month,DAY(startDate) AS d,SUM(time) as total');
   $this->db->from('project_task_billing');
   $this->db->group_by('d');
   $this->db->order_by('d', 'Asc');
   $this->db->where($whr);
   $result = $this->db->get();
   $result=$result->result();
   return $result;
 }

 public function getprojecttask($whr)
 {
   $this->db->select('t.*');
   $this->db->from('project_task as t');
   $this->db->join('project as p','p.projectId = t.projectId');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }



 public function getbyLimitorderbyId($tbl,$whr,$start,$perPage)
 {
   $this->db->select('*');
   $this->db->from($tbl);
   $this->db->where($whr);
   $this->db->limit($perPage,$start);
   $this->db->order_by('id','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getallEmployeeLeave($tbl,$whr,$date,$start,$perPage)
 {
   $this->db->select('*');
   $this->db->from($tbl);
   $this->db->where($whr);
   if($date != '')
   {
   $this->db->where('date',$date);
   }
   if($date != '')
   {
    $this->db->group_start();
    $this->db->or_where('date1',$date);
    $this->db->group_end();
   }

   $this->db->limit($perPage,$start);
   $this->db->order_by('id','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getleaveCount($tbl,$whr,$date)
 {
   $this->db->from($tbl);
   $this->db->where($whr);
   $this->db->where('date >',$date);
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function count_freelancer_company()
 {
       $this->db->where_in("type",[2,3]);
     $this->db->from('user');
     $count = $this->db->count_all_results();
     return  $count;

 }

 public function freelancerearning($whr)
 {
   $this->db->select('SUM(contractAmount) as total');
   $this->db->from('user_jobcontract');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function getlimitnotification($whr)
 {
   $this->db->select('n.*,u.name,u.logo');
   $this->db->from('user_notification as n');
   $this->db->join('user_meta as u','u.u_id =n.notificationFrom');
   $this->db->where($whr);
   $this->db->order_by('n.notificationId','DESC');
   $this->db->limit('3');
   $result = $this->db->get();
   $result=$result->result();
   return $result;
 }

 public function getlatestreview($whr)
 {
   $this->db->select('r.reviewId,r.contractId,r.linkedInId,r.reviewOverall,u.name,u.logo');
   $this->db->from('user_review as r');
   $this->db->join('user_meta as u','u.u_id = r.reviewFrom','left');
   $this->db->where($whr);
   $this->db->order_by('r.reviewId','DESC');
   $this->db->limit('4');
   $result = $this->db->get();
   $result=$result->result();
   return $result;
 }

 public function getlatestmembers($howmany)
 {
   $this->db->select('um.name,um.logo');
   $this->db->from('user_meta as um');
   $this->db->join('user as u','um.u_id = u.id');
   $this->db->where('u.is_active','1');
   $this->db->order_by('u.id',"desc");
   $this->db->limit($howmany);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_jobcountryWise($whr)
 {
   $this->db->from('user_job as j');
   $this->db->join('user_joboffer as o','o.jobId = j.jobId');
   $this->db->join('user_meta as m','m.u_id = o.offFrom');
   $this->db->where($whr);
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function getJobsByCountry($whr,$start,$perPage)
 {
   $this->db->select('j.*,c.name as country,us.u_id');
   $this->db->from('user_job as j');
   $this->db->join('user_joboffer as jo', 'j.jobId = jo.jobId');
   $this->db->join('user_meta as us','us.u_id = jo.offFrom');
   $this->db->join('countries as c','c.id = us.country');
   $this->db->join('job_meta as jm','jm.jobId = j.jobId');
   $this->db->where($whr);
   $this->db->limit($perPage,$start);
   $this->db->order_by('jobId','desc');
   $this->db->group_by('j.jobId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }


 public function countdepartmentEmployee($tbl,$whr)
 {
   $this->db->where($whr);
   $this->db->from('user as u');
   $this->db->join('user_meta as m','u.id = m.u_id');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function getholidays($tbl,$whr,$start,$perPage)
 {
   $this->db->select('*');
   $this->db->from($tbl);
   $this->db->where($whr);
   $this->db->limit($perPage,$start);
   $this->db->order_by('date','asc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }



 public function count_todo($id,$status,$priority,$assign)
 {
   $this->db->from('todoList as t');
   $this->db->join('user_meta as a','t.assignedTo = a.u_id');
   $this->db->join('user_meta as b','t.assignedBy = b.u_id');
   if($status != '')
   {
   $this->db->where('t.status',$status);
   }
   if($priority != '')
   {
   $this->db->where('t.priority',$priority);
   }
   $this->db->group_start();
   if($assign == 2 || $assign == '')
   {
   $this->db->where('t.assignedBy',$id);
   }
   if($assign == 1 || $assign == '')
   {
   $this->db->or_where('t.assignedTo ',$id);
   }
   $this->db->where('t.milestone',0);
   $this->db->where('t.saved',0);
   $this->db->group_end();
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function gettodolist($id,$status,$priority,$assign,$start,$perPage)
 {
   $this->db->select('t.*,a.name as assignedto,b.name as assignedby,d.department');
   $this->db->from('todoList as t');
   $this->db->join('user_meta as a','t.assignedTo = a.u_id');
   $this->db->join('user_meta as b','t.assignedBy = b.u_id');
   $this->db->join('department as d','t.dept = d.id','left');
   if($status != '')
   {
   $this->db->where('t.status',$status);
   }
   if($priority != '')
   {
   $this->db->where('t.priority',$priority);
   }
   $this->db->group_start();
   if($assign == 2 || $assign == '')
   {
   $this->db->where('t.assignedBy',$id);
   }
   if($assign == 1 || $assign == '')
   {
   $this->db->or_where('t.assignedTo ',$id);
   }
   $this->db->where('t.milestone',0);
   $this->db->where('t.saved',0);
   $this->db->group_end();
   $this->db->limit($perPage,$start);
   $this->db->order_by('startDate','desc');
   $result = $this->db->get();
   // echo $this->db->last_query();
   // die;
   $result = $result->result();
   return $result;
 }

 public function getteambydepartment($whr,$id)
 {
   $this->db->select("us.id,um.name,um.department");
   $this->db->from('user as us');
   $this->db->join('user_meta as um','um.u_id = us.id');
   $this->db->where($whr);
   $this->db->where_not_in('us.id',$id);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }



 public function getActiveClient($whr)
 {
   $this->db->select('um.name,um.u_id,u.email,um.address1 as address,um.rep_ph_num as phone,jo.jobTitle as projectName,um.countryClass,um.countryCode');
   $this->db->from('user_jobcontract as j');
   $this->db->join('user_meta as um','um.u_id = j.clientId');
   $this->db->join('user as u','u.id = j.clientId');
   $this->db->join('user_job as jo','jo.jobId = j.jobId');
   $this->db->where($whr);
   $this->db->group_by('j.clientId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function clientcontact($whr)
 {
   $this->db->select('uc.contractId,j.jobTitle,j.jobId,j.jobEstimateHours,j.jobEstimateHourlyPrice,j.jobBudget');
   $this->db->from('user_jobcontract as uc');
   $this->db->join('user_job as j','j.jobId = uc.jobId');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }





 public function getmanagerdsr($whr,$startdate,$enddate,$id,$start,$perPage)
 {
   $this->db->select("d.date,d.employeeId,d.dsrId,d.approved,u.name");
   $this->db->from('dsr as d');
   $this->db->join('user_meta as u','u.u_id = d.employeeId');
   $this->db->where($whr);
   $this->db->where_not_in('employeeId',$id);
   $this->db->where("d.date >=",$startdate);
   $this->db->where("d.date <=",$enddate);
   $this->db->group_by(array("d.employeeId", "d.date"));
   $this->db->limit($perPage,$start);
   $this->db->order_by('date','desc');
   $result = $this->db->get();
   $result = $result->result();

   return $result;
 }

 public function count_manager_dsr($whr,$startdate,$enddate,$id)
 {
   $this->db->from('dsr as d');
   $this->db->where($whr);
   $this->db->where_not_in('employeeId',$id);
   if(!empty($startdate))
   {
     $this->db->where("date >=",$startdate);
   }
   if(!empty($enddate))
   {
     $this->db->where("date <=",$enddate);
   }
   $this->db->group_by(array("d.employeeId", "d.date"));
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function getMydsr($whr,$startdate,$enddate,$start,$perPage)
 {
   $this->db->select('d.*,u.name,a.name as approvedby,d.date,MONTHNAME(d.date) as month,MONTH(d.date) as monthnumber,YEAR(d.date) AS year');
   $this->db->from('dsr as d');
   $this->db->join('user_meta as u','u.u_id = d.employeeId');
   $this->db->join('user_meta as a','a.u_id = d.approvedBy','left');
   $this->db->where($whr);
   $this->db->where("d.date >=",$startdate);
   $this->db->where("d.date <=",$enddate);
   $this->db->limit($perPage,$start);
   $this->db->order_by('date','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }


 public function Countgetmanagerdsr($whr)
 {
   $this->db->from('dsr as d');
   $this->db->where($whr);
   $count = $this->db->count_all_results();
   return  $count;
 }

 // public function count_manager_dsr($whr,$startdate,$enddate)
 // {
 //   $this->db->from('dsr as d');
 //   $this->db->where($whr);
 //   if(!empty($startdate))
 //   {
 //     $this->db->where("date >=",$startdate);
 //   }
 //   if(!empty($enddate))
 //   {
 //     $this->db->where("date <=",$enddate);
 //   }
 //   $count = $this->db->count_all_results();
 //   return  $count;
 // }

 public function count_client($tbl,$whr,$keyword)
 {
   $this->db->like('name',$keyword,'both');
   $this->db->where($whr);
   $this->db->from('user as u');
   $this->db->join('user_meta as m','m.u_id = u.id');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function getemployeeleave($whr)
 {
   $this->db->select('l.*,t.type as typename,Date(l.date) as date,Date(l.date1) as date1,DATEDIFF(l.date1,l.date) as totalleave');
   $this->db->from('user_leave as l');
   $this->db->join('leavetype as t','t.id = l.type');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }


 public function getActiveOwnProject($whr)
 {
   $this->db->select('p.clientName as name,p.hourlyPrice,p.email,p.phone,p.projectName,p.projectId as u_id,projectId,p.countryClass,p.countryCode');
   $this->db->from('project as p');
   $this->db->where($whr);
   $this->db->group_by('p.clientName');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }




 public function getCurrentMonthIncome($whr)
 {
    $this->db->select("i.incomeId,i.project,i.amount,i.date,i.status,i.client,i.receivedAmount,c.code,c.symbol");
    $this->db->from('income as i');
    $this->db->join('currency as c','c.id = i.currencyId');
    $this->db->where($whr);
    $this->db->order_by('i.incomeId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
 }




 public function getActiveOwnProjectDetail($whr)
 {
   $this->db->select('p.clientName as name,p.hourlyPrice,p.email,p.phone,p.projectName,projectId');
   $this->db->from('project as p');
   $this->db->where($whr);
   $this->db->group_by('p.clientName');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }


  public function getCountemployeeleave($whr)
  {
    $this->db->select('l.*,t.type as typename,Date(l.date) as date,Date(l.date1) as date1,DATEDIFF(l.date1,l.date) as totalleave,t.duration');
    $this->db->from('user_leave as l');
    $this->db->join('leavetype as t','t.id = l.type');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function countdsrHours($whr)
  {

    $this->db->select('sum(adjustedTime) as total');
    $this->db->from('dsr');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function getjobOpening($whr,$start,$perPage)
  {
    $this->db->select('v.*,u.c_name,u.company_logo');
    $this->db->from('vacancy as v');
    $this->db->join('user_meta as u','v.userId = u.u_id');
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $this->db->order_by('vacancyId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getrecruitment($whr,$start,$perPage)
  {
    $this->db->select('c.*,cu.code,cu.symbol');
    $this->db->from('candidate as c');
    $this->db->join('currency as cu','cu.id = c.currencyId');
    $this->db->where($whr);
    $this->db->where('type',1);
    $this->db->limit($perPage,$start);
    $this->db->order_by('candidateId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getouterCandidate($whr,$start,$perPage)
  {
    $this->db->select('c.*,cu.code,cu.symbol');
    $this->db->from('candidate as c');
    $this->db->join('currency as cu','cu.id = c.currencyId');
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $this->db->order_by('candidateId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getinterview($whr,$position,$status,$date,$start,$perPage)
  {
    $this->db->select('i.*,c.candidateName,c.joiningDate,v.vacancyPosition');
    $this->db->from('interview as i');
    $this->db->join('candidate as c','c.candidateId = i.candidateId');
    $this->db->join('vacancy as v','v.vacancyId = i.vacancyId','left');
    // $this->db->join('user_meta as u','u.u_id = i.employeeId');
    $this->db->where($whr);
    if($position != '')
    {
    $this->db->where('i.vacancyId',$position);
    }
    if($status != '')
    {
     $this->db->where('i.interviewStatus',$status);
    }
    if($date != '')
    {
    $this->db->where('i.interviewDate',$date);
    }
    $this->db->limit($perPage,$start);
    $this->db->order_by('interviewId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function allteam($whr)
  {
    $this->db->select('us.id as u_id,us.id,us.email,um.name,um.joiningdate,um.salary,us.parent');
    $this->db->from('user as us');
    $this->db->join('user_meta as um','um.u_id = us.id');
    $this->db->where($whr);
    $this->db->where('is_active',1);
    $this->db->order_by('um.name','asc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getoneInterview($whr)
  {
    $this->db->select('i.*,c.candidateName,c.joiningDate,v.vacancyPosition');
    $this->db->from('interview as i');
    $this->db->join('candidate as c','c.candidateId = i.candidateId','left');
    $this->db->join('vacancy as v','v.vacancyId = i.vacancyId','left');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }


    public function expenseTotalWise($whr)
    {
      $this->db->select('SUM(amount) as total');
      $this->db->from('expense');
      $this->db->where($whr);
      $result = $this->db->get();
      $result = $result->row();
      return $result;
    }


    public function AllMonthdsrHours($whr,$start,$perPage)
    {

      $this->db->select('YEAR(d.date) AS y,date AS start,MONTH(d.date) AS m,MONTHNAME(d.date) as month,sum(d.time) as total,d.dsrId,m.name,m.u_id,m.perday,m.salary');
      $this->db->from('dsr as d');
      $this->db->join('user_meta as m','d.employeeId = m.u_id');
      $this->db->where('MONTH(date) !=',date("m"));
      $this->db->where('date >= DATE_SUB(now(), INTERVAL 12 MONTH)');
      $this->db->where('approved','1');
      $this->db->where('includeSalary','1');
      $this->db->where_in("d.employeeId",$whr);
      $this->db->limit($perPage,$start);
      $this->db->group_by('employeeId');
      $this->db->group_by('MONTH(date)');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }

    public function countMonthdsrHours($whr)
    {

      $this->db->from('dsr as d');
      $this->db->where('MONTH(date) !=',date("m"));
      $this->db->where('date >= DATE_SUB(now(), INTERVAL 12 MONTH)');
      $this->db->where('approved','1');
      $this->db->where_in("d.employeeId",$whr);
      $this->db->group_by('employeeId');
      $this->db->group_by('MONTH(date)');
      $count = $this->db->count_all_results();
      return  $count;
    }



    public function InvoiceSearch($whr)
    {
      $this->db->select('i.*,um.name,c.code,c.symbol');
      $this->db->from('invoice as i');
      $this->db->join('user_meta as um','um.u_id = i.recipient','left');
      $this->db->join('currency as c','c.id = i.currencyId','left');
      $this->db->where($whr);
      $this->db->order_by('invoiceId','desc');
      $result = $this->db->get();
      $result = $result->result();
      return $result;
    }


        public function searchDsr($whr,$whr1)
        {

          $this->db->select('YEAR(d.date) AS y,date AS start,MONTH(d.date) AS m,MONTHNAME(d.date) as month,sum(d.time) as total,d.dsrId,m.name,m.u_id,m.perday,m.salary');
          $this->db->from('dsr as d');
          $this->db->join('user_meta as m','d.employeeId = m.u_id');
          $this->db->where('approved','1');
          $this->db->where_in("d.employeeId",$whr);
          $this->db->where($whr1);
          $this->db->group_by('employeeId');
          $this->db->group_by('MONTH(date)');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }



        public function getrecruitmentLike($whr,$keyword,$status,$start,$perPage)
        {
          $this->db->select('c.*,cu.code,cu.symbol');
          $this->db->from('candidate as c');
          $this->db->join('currency as cu','cu.id = c.currencyId');
          if($keyword != '')
          {
          $this->db->like('c.candidateName',$keyword,'both');
          }
          if($status != '')
          {
          $this->db->where('c.candidateStatus',$status);
          }
          $this->db->where($whr);
          $this->db->limit($perPage,$start);
          $this->db->order_by('candidateId','desc');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function count_candidate_like($whr,$keyword,$status)
        {
        if($keyword != '')
        {
        $this->db->like('candidateName',$keyword,'both');
        }
        if($status != '')
        {
        $this->db->where('candidateStatus',$status);
        }
        $this->db->where($whr);
        $this->db->from('candidate');
        $count = $this->db->count_all_results();
        return  $count;
        }

        public function onedayDsrCount($whr)
        {
          $this->db->select('sum(d.time) as total,Date(d.date) as date');
          $this->db->from('dsr as d');
          $this->db->where('approved','1');
          $this->db->where($whr);
          $this->db->group_by('employeeId');
          $this->db->group_by('date');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function getannouncement($whr,$start,$perPage)
        {
          $this->db->select('*');
          $this->db->from('announcement');
          $this->db->where($whr);
          $this->db->limit($perPage,$start);
          $this->db->order_by('annId','desc');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function employeeSearch($field,$keyword,$whr)
         {
            $this->db->select('m.u_id as id,m.name');
            $this->db->from('user as u');
            $this->db->join('user_meta as m','m.u_id = u.id');
            $this->db->where($whr);
            $this->db->like($field,$keyword,'both');
            $this->db->group_by('m.u_id');
            $query = $this->db->get();
            return $query->result();
       }

       public function announmentUser($whr)
       {
         $this->db->select('m.u_id as id,m.name');
         $this->db->from('announcementSend as a');
         $this->db->join('user_meta as m','m.u_id = a.userId');
         $this->db->where($whr);
         $this->db->group_by('m.u_id');
         $query = $this->db->get();
         return $query->result();
       }

       public function count_user_announcment($whr)
       {
         $this->db->from('announcement as a');
         $this->db->join('announcementSend as s','s.annId = a.annId','left');
         $this->db->where($whr);
         $this->db->or_where('a.annSendAll',1);
         $this->db->group_by('a.annId');
         $query = $this->db->get();
         return $query->result();

       }

       public function get_user_announcment($whr)
       {
         $this->db->select('a.*,s.userId');
         $this->db->from('announcement as a');
         $this->db->join('announcementSend as s','s.annId = a.annId','left');
         $this->db->where($whr);
         $this->db->or_where('a.annSendAll',1);
         $this->db->group_by('a.annId');
         $this->db->order_by('a.annId','Desc');
         $query = $this->db->get();

         return $query->result();
       }

       public function milestoneAmount($whr)
       {
         $this->db->select('sum(amount) as total');
         $this->db->from('project_milestones_amount');
         $this->db->where($whr);
         $result = $this->db->get();
         $result = $result->row();
         return $result;
       }

       public function getannouncementUser($whr)
       {
         $this->db->select('u.name,u.u_id');
         $this->db->from('announcementSend as a');
         $this->db->join('user_meta as u','a.userId = u.u_id');
         $this->db->where($whr);
         $result = $this->db->get();
         $result = $result->result();
         return $result;
       }



       public function searchProjectManagerDsr($whr,$startdate,$enddate,$start,$perPage)
       {
         $this->db->select('d.*,u.name');
         $this->db->from('dsr as d');
         $this->db->join('user_meta as u','u.u_id = d.employeeId');
         $this->db->where($whr);
         if(!empty($startdate))
         {
           $this->db->where("date >=",$startdate);
         }
         if(!empty($enddate))
         {
           $this->db->where("date <=",$enddate);
         }
         $this->db->limit($perPage,$start);
         $result = $this->db->get();
         $result = $result->result();
         return $result;
       }

       public function countperformance($whr,$emp,$reviewer)
       {
         $this->db->from('performance as p');
         $this->db->join('user_meta as u','u.u_id = p.employeeId');
         $this->db->join('user_meta as r','r.u_id = p.perReviewerId ');
         $this->db->where($whr);
         if($emp != '')
         {
         $this->db->like('u.name',$emp,'both');
         }
         if($reviewer != '')
         {
         $this->db->like('r.name',$reviewer,'both');
         }
         $count = $this->db->count_all_results();
         return  $count;
       }

       public function getperformance($whr,$emp,$reviewer,$start,$perPage)
       {
         $this->db->select('p.*,u.name,r.name as reviwer,p.perReviewerId');
         $this->db->from('performance as p');
         $this->db->join('user_meta as u','u.u_id = p.employeeId');
         $this->db->join('user_meta as r','r.u_id = p.perReviewerId ');
         $this->db->where($whr);
         if($emp != '')
         {
         $this->db->like('u.name',$emp,'both');
         }
         if($reviewer != '')
         {
         $this->db->like('r.name',$reviewer,'both');
         }

         $this->db->limit($perPage,$start);
         $this->db->order_by('perId','desc');
         $result = $this->db->get();
         $result = $result->result();
         return $result;
       }

       public function getallholidays($whr)
       {
         $this->db->select('h.userId,h.title,h.type,Date(h.date) as date');
         $this->db->from('holiday as h');
         $this->db->where($whr);
         $this->db->order_by('date','asc');
         $result = $this->db->get();
         $result = $result->result();
         return $result;
       }

       public function getlimittask($id)
       {
         $this->db->select('t.*,a.name as assignedto,b.name as assignedby,d.department');
         $this->db->from('todoList as t');
         $this->db->join('user_meta as a','t.assignedTo = a.u_id');
         $this->db->join('user_meta as b','t.assignedBy = b.u_id');
         $this->db->join('department as d','t.dept = d.id');
         $this->db->where('t.assignedBy',$id);
         $this->db->where('t.status !=',3);
         $this->db->or_where('t.assignedTo ',$id);
         $this->db->limit('6');
         $this->db->order_by('id','desc');
         $result = $this->db->get();
         $result = $result->result();
         return $result;
       }

       public function getemployeeincrment($whr,$start,$perPage)
       {
         $this->db->select('i.*,u.name,u.joiningdate');
         $this->db->from('user_increment as i');
         $this->db->join('user_meta as u','u.u_id = i.employeeId');
         $this->db->where($whr);
         $this->db->limit($perPage,$start);
         $this->db->order_by('incrementId','desc');
         $result = $this->db->get();
         $result = $result->result();
         return $result;
       }

        public function getOneEmployeeIncrement($whr)
       {
         $this->db->select('i.*,u.name,u.joiningdate,u.salary');
         $this->db->from('user_increment as i');
         $this->db->join('user_meta as u','u.u_id = i.employeeId');
         $this->db->where($whr);
         $result = $this->db->get();
         $result = $result->row();
         return $result;
       }

       public function SumProjectAmount($whr)
       {
         $this->db->select('SUM(budget) as total');
         $this->db->from('project');
         $this->db->where($whr);
         $result = $this->db->get();
         $result = $result->row();
         return $result;
       }

       public function AllprojectMilestones($ids)
       {
         $this->db->select('*,(select Sum(amount) from project_milestones_amount where projectMilestoneId = pm.projectMilestoneId ) as receivedAmount');
         $this->db->from('project_milestones as pm');
         $this->db->where_in("pm.projectId",$ids);
         $result = $this->db->get();
         $result = $result->result();
         return $result;
       }


        public function SalesProject($where)
        {
          $this->db->select('*,(select Sum(amount) from project_milestones_amount where projectId = p.projectId ) as receivedAmount');
          $this->db->from('project as p');
          $this->db->where($where);
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function SalesProjectEarning($ids)
        {
          $this->db->select('*');
          $this->db->from('project_milestones_amount as p');
          $this->db->where_in('projectId',$ids);
          $this->db->where('date >= DATE_SUB(now(), INTERVAL 12 MONTH)');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function SalesProjectCount($ids)
        {
          $this->db->select(' COUNT(*) as count, p.projectId,p.date');
          $this->db->from('project as p');
          $this->db->where($ids);
          $this->db->group_by('date');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function EmployeeProjectCount($whr)
        {
          $this->db->from('project_task_assign as a');
          $this->db->join('project_task as t','t.taskId = a.projectTaskId');
          $this->db->group_by('t.projectId');
          $this->db->where($whr);
          $count = $this->db->count_all_results();
          return  $count;
        }

        public function EmployeeTask($whr)
        {
          $this->db->select('t.*');
          $this->db->from('project_task_assign as a');
          $this->db->join('project_task as t','t.taskId = a.projectTaskId');
          $this->db->where($whr);
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function count_interview($whr,$position,$status,$date)
        {
            $this->db->from('interview as i');
            $this->db->join('candidate as c','c.candidateId = i.candidateId');
            $this->db->join('vacancy as v','v.vacancyId = i.vacancyId','left');
            // $this->db->join('user_meta as u','u.u_id = i.employeeId');
            $this->db->where($whr);
            if($position != '')
            {
            $this->db->where('i.vacancyId',$position);
            }
            if($status != '')
            {
            $this->db->where('i.interviewStatus',$status);
            }
            if($date != '')
            {
            $this->db->where('i.interviewDate',$date);
            }
           $count = $this->db->count_all_results();
           return  $count;
        }

        public function viewperformance($whr)
        {
          $this->db->select('p.*,u.name,r.name as reviwer,p.perReviewerId');
          $this->db->from('performance as p');
          $this->db->join('user_meta as u','u.u_id = p.employeeId');
          $this->db->join('user_meta as r','r.u_id = p.perReviewerId ');
          $this->db->where($whr);
          $result = $this->db->get();
          $result = $result->row();
          return $result;
        }

        public function getlead($whr,$start,$perPage)
        {
          $this->db->select('*');
          $this->db->from('lead');
          $this->db->where($whr);
          $this->db->limit($perPage,$start);
          $this->db->order_by('leadId','desc');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function viewleadinfo($whr)
        {
          $this->db->select('l.*,u.name,c.code,c.symbol');
          $this->db->from('lead_info as l');
          $this->db->join('user_meta as u','u.u_id = l.employeeId');
          $this->db->join('currency as c','c.id = l.currencyId ');
          $this->db->where($whr);
          $this->db->order_by('date','desc');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }


        public function getreview($whr,$start,$perPage)
        {
          $this->db->select('r.reviewOverall as feedback,r.contractId,r.linkedInId,r.user_gig_buyId');
          $this->db->from('user_review as r');
          $this->db->where($whr);
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function countreview($whr)
        {
          $this->db->from('user_review as r');
          $this->db->join('user_meta as u','u.u_id = r.reviewFrom');
          $this->db->where($whr);
          $count = $this->db->count_all_results();
          return  $count;
        }

        public function linkedIndata($whr)
        {
          $this->db->select('l.reviewTitle,l.website,l.projectSummary,cu.code,cu.symbol,p.name as industry,l.targetLocation,co.name as country,st.name as state,ci.name as city,l.companyAddress as address,l.email,l.skype,l.phone,l.projectTitle,l.fullName as name,s.name as service,reviewTitle,l.projectStartDate,l.projectEndDate,l.projectAmount as budget');
          $this->db->from('linkedIn_user as l');
          $this->db->join('services as s','s.id = l.servicesId');
          $this->db->join('practice_areas as p','p.id = l.industryId','left');
          $this->db->join('countries as co','co.id = l.country');
          $this->db->join('states as st','st.id = l.state');
          $this->db->join('cities as ci','ci.id = l.city');
          $this->db->join('currency as cu','cu.id = l.currencyId','left');
          $this->db->where($whr);
          $result = $this->db->get();
          $result = $result->row();
          return $result;
        }

        public function contractdata($whr)
        {
          $this->db->select('cu.code,cu.symbol,p.name as industry,co.name as country,st.name as state,ci.name as city,us.email,u.rep_ph_num as phone,u.address1 as address,u.skype,c.contractAmount as budget,j.jobTitle,s.name as service,u.name,contractDate,contractEndDate');
          $this->db->from('user_jobcontract as c');
          $this->db->join('user_job as j','c.jobId = j.jobId');
          $this->db->join('user_joboffer as o','o.jobId = j.jobId');
          $this->db->join('services as s','s.id = j.servicesId','left');
          $this->db->join('user_meta as u','u.u_id = o.offFrom','left');
          $this->db->join('user as us','u.id = o.offFrom','left');
          $this->db->join('countries as co','co.id = u.country','left');
          $this->db->join('states as st','st.id = u.state','left');
          $this->db->join('cities as ci','ci.id = u.city','left');
          $this->db->join('practice_areas as p','p.id = j.industryId','left');
          $this->db->join('currency as cu','cu.id = j.currencyId','left');
          $this->db->where($whr);
          $result = $this->db->get();
          $result = $result->row();
          return $result;
        }

        public function getreviewIn($whr)
        {
          $this->db->select('r.reviewOverall as rating,r.reviewType');
          $this->db->from('user_review as r');
          $this->db->where($whr);
          $this->db->where_in('reviewType',['availability','cost','cooperation','deadline','quality','rehire','skill','communication']);
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function profileviewcount($whr)
        {
          $this->db->select('count(p.profileviewId) as y,Date(p.date) as label');
          $this->db->from('profileview as p');
          $this->db->where($whr);
          $this->db->where('date >  DATE_SUB(NOW(), INTERVAL 1 WEEK)');
          $this->db->group_by('Date(p.date)');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function getprofileView($start,$perPage)
        {
          $this->db->select('m.u_id as userId,u.type,m.name,m.c_name,(select count(pv.profileviewId) from profileview as pv where pv.userId = u.id and pv.date >  DATE_SUB(NOW(), INTERVAL 1 WEEK) ) as count');
          $this->db->from('profileview as v');
          $this->db->join('user as u','v.userId = u.id');
          $this->db->join('user_meta as m','m.u_id = v.userId');
          $this->db->where('v.date >  DATE_SUB(NOW(), INTERVAL 1 WEEK)');
          $this->db->group_by('v.userId');
          $this->db->limit($perPage,$start);
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        // public function countProfileView()
        // {
        //   $this->db->select('m.u_id as userId,u.type,m.name,m.c_name,(select count(pv.profileviewId) from profileview as pv where pv.userId = u.id and pv.date >  DATE_SUB(NOW(), INTERVAL 1 WEEK) ) as count');
        //   $this->db->from('profileview as v');
        //   $this->db->join('user as u','v.userId = u.id');
        //   $this->db->join('user_meta as m','m.u_id = v.userId');
        //   $this->db->where('v.date >  DATE_SUB(NOW(), INTERVAL 1 WEEK)');
        //   $this->db->group_by('v.userId');
        //   $this->db->limit($perPage,$start);
        //   $result = $this->db->get();
        //   $result = $result->result();
        //   return $result;
        // }

      public function count_ProfileView()
      {
        $this->db->select('m.u_id as userId,u.type,m.name,m.c_name,(select count(pv.profileviewId) from profileview as pv where pv.userId = u.id and pv.date >  DATE_SUB(NOW(), INTERVAL 1 WEEK) ) as count');
        $this->db->from('profileview as v');
        $this->db->join('user as u','v.userId = u.id');
        $this->db->join('user_meta as m','m.u_id = v.userId');
        $this->db->where('v.date >  DATE_SUB(NOW(), INTERVAL 1 WEEK)');
        $this->db->group_by('v.userId');
        $count = $this->db->count_all_results();
        return  $count;
      }

      public function searchProfileView($search,$start,$perPage)
      {
        $this->db->select('m.u_id as userId,u.type,m.name,m.c_name,(select count(pv.profileviewId) from profileview as pv where pv.userId = u.id and pv.date >  DATE_SUB(NOW(), INTERVAL 1 WEEK) ) as count');
        $this->db->from('profileview as v');
        $this->db->join('user as u','v.userId = u.id');
        $this->db->join('user_meta as m','m.u_id = v.userId');
        $this->db->where('v.date >  DATE_SUB(NOW(), INTERVAL 1 WEEK)');
        $this->db->like('m.name',$search,'both');
        $this->db->or_like('m.c_name',$search,'both');
        $this->db->group_by('v.userId');
        $this->db->limit($perPage,$start);
        $result = $this->db->get();
        $result = $result->result();
        return $result;
      }

      public function search_count_ProfileView($search)
      {
        $this->db->select('m.u_id as userId,u.type,m.name,m.c_name,(select count(pv.profileviewId) from profileview as pv where pv.userId = u.id and pv.date >  DATE_SUB(NOW(), INTERVAL 1 WEEK) ) as count');
        $this->db->from('profileview as v');
        $this->db->join('user as u','v.userId = u.id');
        $this->db->join('user_meta as m','m.u_id = v.userId');
        $this->db->where('v.date >  DATE_SUB(NOW(), INTERVAL 1 WEEK)');
        $this->db->like('m.name',$search,'both');
        $this->db->or_like('m.c_name',$search,'both');
        $this->db->group_by('v.userId');
        $count = $this->db->count_all_results();
        return  $count;
      }

      public function getrankingPrice($start,$perPage)
      {
        $this->db->select('p.*,c.name as country,s.name as state,ci.name as city');
        $this->db->from('ranking_price as p');
        $this->db->join('countries as c','c.id = p.countryId','left');
        $this->db->join('states as s','s.id = p.stateId','left');
        $this->db->join('cities as ci','ci.id = p.cityId','left');
        $this->db->limit($perPage,$start);
        $this->db->order_by('rankingPriceId','desc');
        $result = $this->db->get();
        $result = $result->result();
        return $result;

      }

      public function search_count_rankingprice($search)
      {
        $this->db->select('p.*,c.name as country,s.name as state,ci.name as city');
        $this->db->from('ranking_price as p');
        $this->db->join('countries as c','c.id = p.countryId','left');
        $this->db->join('states as s','s.id = p.stateId','left');
        $this->db->join('cities as ci','ci.id = p.cityId','left');
        $this->db->like('c.name',$search,'both');
        $this->db->or_like('s.name',$search,'both');
        $this->db->or_like('ci.name',$search,'both');
        $this->db->order_by('rankingPriceId','desc');
        $count = $this->db->count_all_results();
        return  $count;
      }

      public function searchrankingPrice($search,$start,$perPage)
      {
        $this->db->select('p.*,c.name as country,s.name as state,ci.name as city');
        $this->db->from('ranking_price as p');
        $this->db->join('countries as c','c.id = p.countryId','left');
        $this->db->join('states as s','s.id = p.stateId','left');
        $this->db->join('cities as ci','ci.id = p.cityId','left');
        $this->db->like('c.name',$search,'both');
        $this->db->or_like('s.name',$search,'both');
        $this->db->or_like('ci.name',$search,'both');
        $this->db->limit($perPage,$start);
        $this->db->order_by('rankingPriceId','desc');
        $result = $this->db->get();
        $result = $result->result();
        return $result;

      }

      public function userpreferredlocation($whr)
      {
        $this->db->select('c.name as country,c.id,p.stateId,p.cityId,p.rankingPriceId');
        $this->db->from('user_buy_ranking as b');
        $this->db->join('ranking_price as p','b.rankingPriceId = p.rankingPriceId');
        $this->db->join('countries as c','c.id = p.countryId');
        $this->db->where($whr);
        $result = $this->db->get();
        $result = $result->result();
        return $result;

      }

      public function userpreferredState($whr)
      {
        $this->db->select('s.name as state,s.id');
        $this->db->from('ranking_price as p');
        $this->db->join('states as s','s.id = p.stateId');
        $this->db->where($whr);
        $result = $this->db->get();
        $result = $result->row();
        return $result;

      }

      public function userpreferredCity($whr)
      {
        $this->db->select('ci.name as city,ci.id');
        $this->db->from('ranking_price as p');
        $this->db->join('cities as ci','ci.id = p.cityId');
        $this->db->where($whr);
        $result = $this->db->get();
        $result = $result->row();
        return $result;
      }


      public function getUserPaidServices($whr)
      {
        $this->db->select('p.*,c.name as country,s.name as state,ci.name as city');
        $this->db->from('user_buy_ranking as b');
        $this->db->join('ranking_price as p','b.rankingPriceId = p.rankingPriceId');
        $this->db->join('countries as c','c.id = p.countryId');
        $this->db->join('states as s','s.id = p.stateId','left');
        $this->db->join('cities as ci','ci.id = p.cityId','left');
        $this->db->where($whr);
        $result = $this->db->get();
        $result = $result->result();
        return $result;

      }

      public function getaskQuestion($whr,$start,$perPage)
      {
        $this->db->select('*');
        $this->db->from('askQuestion');
        $this->db->where($whr);
        $this->db->limit($perPage,$start);
        $this->db->order_by('askQuestionId','Desc');
        $result = $this->db->get();
        $result = $result->result();
        return $result;
      }

      public function getadminaskQuestion($start,$perPage)
      {
        $this->db->select('u.name as freelancer,u.c_name,a.*');
        $this->db->from('askQuestion as a');
        $this->db->join('user_meta as u','u.u_id = a.userId');
        $this->db->limit($perPage,$start);
        $this->db->order_by('askQuestionId','Desc');
        $result = $this->db->get();
        $result = $result->result();
        return $result;
      }

      public function getgig($whr,$start,$perPage)
      {
        $this->db->select('g.*,s.name as services,p.name as industry');
        $this->db->from('user_gig as g');
        $this->db->join('services  as s','s.id = g.servicesId');
        $this->db->join('practice_areas  as p','p.id = g.industryId');
        $this->db->where($whr);
        $this->db->limit($perPage,$start);
        $this->db->order_by('gigId','Desc');
        $result = $this->db->get();
        $result = $result->result();
        return $result;
      }




      public function getuseraskquestion($start,$perPage)
      {
        $this->db->select('um.name,um.u_id,u.type,um.c_name');
        $this->db->from('askQuestion as a');
        $this->db->join('user_meta as um','a.userId = um.u_id');
        $this->db->join('user as u','u.id = um.u_id');
        $this->db->limit($perPage,$start);
        $this->db->group_by('a.userId');
        $result = $this->db->get();
        $result = $result->result();
        return $result;
      }

      public function count_useraskQuestion()
      {
        $this->db->select('um.name,um.u_id');
        $this->db->from('askQuestion as a');
        $this->db->join('user_meta as um','a.userId = um.u_id');
        $this->db->group_by('a.userId');
        $count = $this->db->count_all_results();
        return  $count;
      }

      public function getgigView($whr)
      {
        $this->db->select('g.*,s.name as services,p.name as industry,c.code,c.symbol');
        $this->db->from('user_gig as g');
        $this->db->join('services  as s','s.id = g.servicesId');
        $this->db->join('practice_areas  as p','p.id = g.industryId');
        $this->db->join('currency  as c','c.id = g.currencyId','left');
        $this->db->where($whr);
        $result = $this->db->get();
        $result = $result->row();
        return $result;
      }


        public function getusergig($start,$perPage)
        {
          $this->db->select('um.name,um.u_id,u.type,um.c_name');
          $this->db->from('user_gig as a');
          $this->db->join('user_meta as um','a.userId = um.u_id');
          $this->db->join('user as u','u.id = um.u_id');
          $this->db->limit($perPage,$start);
          $this->db->group_by('a.userId');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function count_usergig()
        {
          $this->db->select('um.name,um.u_id');
          $this->db->from('user_gig as a');
          $this->db->join('user_meta as um','a.userId = um.u_id');
          $this->db->group_by('a.userId');
          $count = $this->db->count_all_results();
          return  $count;
        }

        public function getleadsource($whr,$start,$perPage)
        {
          $this->db->select('*');
          $this->db->from('lead_source');
          $this->db->where($whr);
          $this->db->limit($perPage,$start);
          $this->db->order_by('lead_sourceId','Desc');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function search_lead_count($whr,$client,$status,$date)
        {
          $this->db->select("l.*,i.date,i.status");
          $this->db->from('lead as l');
          $this->db->join('lead_info as i','i.leadId = l.leadId');
          $this->db->where($whr);
          if($client != '')
          {
            $this->db->like('l.clientName',$client,'both');
          }
          if($status != '')
          {
          $this->db->where('i.status',$status);
          }
          if($date != '')
          {
          $this->db->where('i.date',$date);
          }
          $this->db->group_by('i.leadId');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }




        public function search_lead($whr,$client,$status,$date,$start,$perPage)
        {
          $this->db->select("l.*,i.date,i.status");
          $this->db->from('lead as l');
          $this->db->join('lead_info as i','i.leadId = l.leadId');
          $this->db->where($whr);
          if($client != '')
          {
            $this->db->like('l.clientName',$client,'both');
          }
          if($status != '')
          {
          $this->db->where('i.status',$status);
          }
          if($date != '')
          {
          $this->db->where('i.date',$date);
          }
          $this->db->limit($perPage,$start);
          $this->db->group_by('i.leadId');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function getclientBuygig($whr,$start,$perPage)
        {
          $this->db->select("b.title,t.*,t.amount as planamount,c.code,c.symbol,client.name as client,f.c_name as company,b.*,b.date as purcashed");
          $this->db->from('user_gig_buy as b');
          $this->db->join('todoList as t','t.user_gig_buyId = b.user_gig_buyId');
          $this->db->join('currency as c','c.id = b.currencyId');
          $this->db->join('user_meta as client','client.u_id = b.clientId');
          $this->db->join('user_meta as f','f.u_id = b.userId');
          $this->db->where($whr);
          $this->db->limit($perPage,$start);
          $this->db->order_by('b.user_gig_buyId','desc');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function getgigdetail($whr)
        {
          $this->db->select("b.*,c.code,c.symbol,client.name as client,f.c_name as company,b.title,b.description");
          $this->db->from('user_gig_buy as b');
          $this->db->join('currency as c','c.id = b.currencyId');
          $this->db->join('user_meta as client','client.u_id = b.clientId');
          $this->db->join('user_meta as f','f.u_id = b.userId');
          $this->db->where($whr);
          $result = $this->db->get();

          $result = $result->row();
          return $result;
        }

        public function getbuyadditionalTask($whr)
        {
          $this->db->select("a.*");
          $this->db->from('user_gig_buy_additional as b');
          $this->db->join('user_gig_additional_task as a','a.user_gig_taskId = b.user_gig_taskId');
          $this->db->where($whr);
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function getinterviwer($whr)
        {
          $this->db->select("u.u_id,u.name,i.feedBack");
          $this->db->from('interview_interviewer as i');
          $this->db->join('user_meta as u','u.u_id = i.userId');
          $this->db->where($whr);
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function getemployeeinterview($whr,$start,$perPage)
        {
          $this->db->select('i.*,c.candidateName,c.candidateCv,v.vacancyPosition,int.feedBack as interviewerFeedback');
          $this->db->from('interview as i');
          $this->db->join('candidate as c','c.candidateId = i.candidateId');
          $this->db->join('vacancy as v','v.vacancyId = i.vacancyId');
          $this->db->join('interview_interviewer as int','int.interviewId = i.interviewId');
          $this->db->where($whr);
          $this->db->limit($perPage,$start);
          $this->db->order_by('interviewId','desc');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function getinterviewers($field,$keyword,$whr,$selected)
         {
            $this->db->select('m.u_id as id,m.name');
            $this->db->from('user as u');
            $this->db->join('user_meta as m','m.u_id = u.id');
            $this->db->where($whr);
            if(!empty($selected))
            {
            $this->db->where_not_in('m.u_id',$selected);
            }
            $this->db->like($field,$keyword,'both');
            $this->db->group_by('m.u_id');
            $query = $this->db->get();
            return $query->result();
       }

       public function getinterviewersbyTime($date)
        {
           $this->db->select('i.interviewTime as time,in.userId');
           $this->db->from('interview as i');
           $this->db->join('interview_interviewer as in','in.interviewId = i.interviewId');
           $this->db->where('i.interviewDate',$date);
           $query = $this->db->get();
           return $query->result();
      }

      public function allopening($tbl,$whr)
      {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where($whr);
        $this->db->where('vacancyNoOfOpening !=',0);
        $result = $this->db->get();
        $result = $result->result();
        return $result;
      }

      public function getbypaginationWhere($tbl,$whr,$start,$perPage)
      {
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where($whr);
        $this->db->limit($perPage,$start);
        $result = $this->db->get();
        $result = $result->result();
        return $result;
      }

      public function allteamPagination($whr,$start,$perPage)
      {
        $this->db->select('us.id as u_id,us.email,um.name,um.joiningdate,um.salary');
        $this->db->from('user as us');
        $this->db->join('user_meta as um','um.u_id = us.id');
        $this->db->where($whr);
        $this->db->limit($perPage,$start);
        $result = $this->db->get();
        $result = $result->result();
        return $result;
      }


        public function allcandidate($userId,$a)
      	{

      		$this->db->select('*');
          $this->db->from('candidate');
          $this->db->where('userId',$userId);
          $this->db->where('candidateStatus','1');
          if(!empty($a))
          {
          $this->db->where_not_in('candidateId',$a);
          }
          $result = $this->db->get();
          $result = $result->result();
          return $result;
      	}

        public function count_today_ActiveTask($tbl,$whr,$date)
        {
          $this->db->where($whr);
          $this->db->where('startDate <=',$date);
          $this->db->where('dueDate >=',$date);
          $this->db->from($tbl);
          $count = $this->db->count_all_results();
          return  $count;
        }

        public function checkLeaveExist($whr,$date)
        {
          $this->db->select('l.*,t.type as typename,t.duration,t.durationType');
          $this->db->from('user_leave as l');
          $this->db->join('leavetype as t','t.id = l.type');
          $this->db->where($whr);
          $this->db->where('l.date <=',$date);
          $this->db->where('l.date1 >=',$date);
          $result = $this->db->get();
          $result = $result->row();
          return $result;
          // $this->db->select('*');
          // $this->db->from($tbl);
          // $this->db->where($whr);
          // $this->db->where('date <=',$date);
          // $this->db->where('date1 >=',$date);
          // $result = $this->db->get();
          // $result = $result->row();
          // return $result;
        }

        public function checkLeaveExist1($tbl,$whr,$date,$id)
        {
          $this->db->select('*');
          $this->db->from($tbl);
          $this->db->where($whr);
          $this->db->where('date <=',$date);
          $this->db->where('date1 >=',$date);
          $this->db->where_not_in('id',$id);
          $result = $this->db->get();
          $result = $result->row();
          return $result;
        }

        public function count_currenttodo($id,$date,$status,$priority,$assign)
       {
         $this->db->from('todoList as t');
         $this->db->join('user_meta as a','t.assignedTo = a.u_id');
         $this->db->join('user_meta as b','t.assignedBy = b.u_id');
         $this->db->join('department as d','t.dept = d.id','left');
         $this->db->group_start();
         $this->db->where('t.saved',0);
         $this->db->where('t.milestone',0);
         $this->db->where('t.status!=', 6);
         $this->db->where_not_in('t.status', 6);
         if($assign == 1)
         {
         $this->db->where('t.assignedTo ',$id);
         }
         if($assign == 2)
         {
         $this->db->where('t.assignedBy',$id);
         }
         $this->db->where('t.startDate <=',$date);
         $this->db->where('t.dueDate >=',$date);
         if($status != '')
         {
         $this->db->where('t.status',$status);
         }
         if($priority != '')
         {
         $this->db->where('t.priority',$priority);
         }
         if($assign == '')
         {
         $this->db->or_group_start();
         $this->db->where('t.assignedBy',$id);
         $this->db->or_where('t.assignedTo ',$id);
         $this->db->group_end();
         }
         $this->db->group_end();
         // $this->db->group_start();



         $count = $this->db->count_all_results();
         return  $count;
       }

        public function count_overduetodo($id,$date,$whr)
       {
         $this->db->from('todoList as t');
         $this->db->join('user_meta as a','t.assignedTo = a.u_id');
         $this->db->join('user_meta as b','t.assignedBy = b.u_id');
         $this->db->join('department as d','t.dept = d.id','left');
         $this->db->group_start();
         $this->db->where($whr);
         $this->db->where('t.dueDate <',$date);
         $this->db->where_not_in('t.status', 6);
         $this->db->group_start();
         $this->db->where('t.assignedBy',$id);
         $this->db->or_where('t.assignedTo ',$id);
         $this->db->group_end();
         $this->db->group_end();
         $count = $this->db->count_all_results();
         return  $count;
       }

       public function getcurrenttodolist($id,$date,$status,$priority,$assign,$start,$perPage)
       {
         $this->db->select('t.*,a.name as assignedto,b.name as assignedby,d.department');
         $this->db->from('todoList as t');
         $this->db->join('user_meta as a','t.assignedTo = a.u_id');
         $this->db->join('user_meta as b','t.assignedBy = b.u_id');
         $this->db->join('department as d','t.dept = d.id','left');
         $this->db->group_start();
         $this->db->where('t.startDate <=',$date);
         $this->db->where('t.dueDate >=',$date);
         $this->db->where('t.saved',0);
         $this->db->where('t.milestone',0);
         $this->db->where_not_in('t.status',6);
         if($assign == 1)
         {
         $this->db->where('t.assignedTo ',$id);
         }
         if($assign == 2)
         {
         $this->db->where('t.assignedBy',$id);
         }
         if($status != '')
         {
         $this->db->where('t.status',$status);
         }
         if($priority != '')
         {
         $this->db->where('t.priority',$priority);
         }
         if($assign == '')
         {
         $this->db->or_group_start();
         $this->db->where('t.assignedBy',$id);
         $this->db->or_where('t.assignedTo ',$id);
         $this->db->group_end();
         }
         $this->db->group_end();
         $this->db->limit($perPage,$start);
         $this->db->order_by('id','desc');
         $result = $this->db->get();
         $result = $result->result();
         return $result;
       }

       public function getoverduetodolist($id,$date,$whr,$start,$perPage)
       {
         $this->db->select('t.*,a.name as assignedto,b.name as assignedby,d.department');
         $this->db->from('todoList as t');
         $this->db->join('user_meta as a','t.assignedTo = a.u_id');
         $this->db->join('user_meta as b','t.assignedBy = b.u_id');
         $this->db->join('department as d','t.dept = d.id','left');
         $this->db->group_start();
         $this->db->where($whr);
         $this->db->where('t.dueDate <',$date);
         $this->db->where_not_in('t.status', 6);
         $this->db->group_start();
         $this->db->where('t.assignedBy',$id);
         $this->db->or_where('t.assignedTo ',$id);
         $this->db->group_end();
         $this->db->group_end();
         $this->db->limit($perPage,$start);
         $this->db->order_by('id','desc');
         $result = $this->db->get();
         $result = $result->result();
         return $result;
       }


        public function sum_todotask_time($whr)
        {
          $this->db->select('SUM(time) as time');
          $this->db->from('todoList_billing');
          $this->db->where($whr);
          $result = $this->db->get();
          $result = $result->row();
          return $result;
        }

        public function exportExpense($whr,$expense,$startdate,$enddate)
        {
           $this->db->select("e.*,c.code,c.symbol");
           $this->db->from('expense as e');
           $this->db->join('currency as c','c.id = e.currencyId');
           $this->db->where($whr);
           if($expense != 'expense')
           {
             $this->db->like('e.expense',$expense,'both');
           }
           if(!empty($startdate))
           {
             $this->db->where("date >=",$startdate);
           }
           if(!empty($enddate))
           {
             $this->db->where("date <=",$enddate);
           }
           $this->db->order_by('id','desc');
           $result = $this->db->get();
           $result = $result->result();
           return $result;
        }

        public function getallexpenseName($whr)
        {
          $this->db->select("e.expense,e.id");
          $this->db->from('expense as e');
          $this->db->where($whr);
          $this->db->group_by('e.expense');
          $this->db->order_by('e.expense','asc');
          $result = $this->db->get();
          $result = $result->result();
          return $result;
        }

        public function ExpenseSuggestion($whr,$expense)
        {
           $this->db->select("e.expense");
           $this->db->from('expense as e');
           $this->db->where($whr);
           $this->db->like('e.expense',$expense,'both');
           $this->db->group_by('e.expense');
           $result = $this->db->get();
           $result = $result->result();
           return $result;
        }

        public function exportIncome($whr,$client,$project,$startdate,$enddate)
        {
           $this->db->select("i.incomeId,i.receivedAmount,i.project,i.amount,i.date,i.client,i.status,i.deposited,i.received,c.code,c.symbol");
           $this->db->from('income as i');
           $this->db->join('currency as c','c.id = i.currencyId');
           $this->db->where($whr);
           if($client != 'client')
           {
            $this->db->like('client',$client,'both');
           }
           if($project != 'project')
           {
           $this->db->like('project',$project,'both');
           }
           if(!empty($startdate))
           {
             $this->db->where("date >=",$startdate);
           }
           if(!empty($enddate))
           {
             $this->db->where("date <=",$enddate);
           }

           $this->db->order_by('incomeId','desc');
           $result = $this->db->get();

           $result = $result->result();
           return $result;
        }

        public function ExpenseSearch($whr,$startdate,$enddate,$expense)
        {
           $this->db->select("e.*,c.code,c.symbol");
           $this->db->from('expense as e');
           $this->db->join('currency as c','c.id = e.currencyId');
           $this->db->where($whr);
           if(!empty($expense))
           {
             $this->db->like('e.expense',$expense,'both');
           }

           if($startdate != '' && $enddate != '')
           {
           $this->db->where("date >=",$startdate);
           $this->db->where("date <=",$enddate);
           }
           $result = $this->db->get();
           $result = $result->result();
           return $result;
        }

        public function IncomeSearch($whr,$date,$end,$client,$project)
        {
          $this->db->select("i.incomeId,i.project,i.amount,i.date,i.client,i.status,c.code,c.symbol, MONTHNAME(i.date) as month, MONTH(i.date) as monthnumber");
          $this->db->from('income as i');
          $this->db->join('currency as c','c.id = i.currencyId');
          $this->db->where($whr);
          if($client != '')
          {
            $this->db->like('client',$client,'both');
          }
          if($project != '')
          {
          $this->db->like('project',$project,'both');
          }
          if($date != '')
          {
          $this->db->where('date >=',$date);
          }
          if($end != '')
          {
          $this->db->where('date <=',$end);
          }
          $this->db->order_by('date','desc');
          $result = $this->db->get();
          // echo $this->db->last_query();
          // die;
          $result = $result->result();
          return $result;
        }

  public function count_allincome($whr,$date,$end,$client,$project)
  {
    if($client != '')
    {
      $this->db->where('client',$client,'both');
    }
    if($project != '')
    {
    $this->db->where('project',$project,'both');
    }
    if($date != '')
    {
    $this->db->where('date >=',$date);
    }
    if($end != '')
    {
    $this->db->where('date <=',$end);
    }
   $this->db->where($whr);
   $this->db->from('income');
   $count = $this->db->count_all_results();
   return  $count;
 }


public function allincome($whr,$date,$end,$client,$project,$start,$perPage)
 {
    $this->db->select("i.incomeId,i.receivedAmount,i.project,i.amount,i.date,i.client,i.status,c.code,c.symbol,u.name");
    $this->db->from('income as i');
    $this->db->join('currency as c','c.id = i.currencyId');
    $this->db->join('user_meta as u','u.u_id = i.employeeId','left');
    $this->db->where($whr);
    if($client != '')
    {
      $this->db->where('client',$client,'both');
    }
    if($project != '')
    {
    $this->db->where('project',$project,'both');
    }
    if($date != '')
    {
    $this->db->where('date >=',$date);
    }
    if($end != '')
    {
    $this->db->where('date <=',$end);
    }
    $this->db->limit($perPage,$start);
    $this->db->order_by('incomeId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
 }

 public function count_allexpense($whr,$startdate,$enddate,$expense)
 {
   if(!empty($expense))
   {
     $this->db->where('expense',$expense);
   }
   if($startdate != '' && $enddate != '')
   {
   $this->db->where("date >=",$startdate);
   $this->db->where("date <=",$enddate);
   }
   $this->db->where($whr);
   $this->db->from('expense');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function allExpense($whr,$startdate,$enddate,$expense,$start,$perPage)
 {
    $this->db->select("e.*,c.code,c.symbol");
    $this->db->from('expense as e');
    $this->db->join('currency as c','c.id = e.currencyId');
    $this->db->where($whr);
    if(!empty($expense))
    {
      $this->db->where('e.expense',$expense);
      // $this->db->like('e.expense',$expense,'both');
    }

    if($startdate != '' && $enddate != '')
    {
    $this->db->where("date >=",$startdate);
    $this->db->where("date <=",$enddate);
    }
    $this->db->limit($perPage,$start);
    $this->db->order_by('id','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
 }

 public function incomeclientSuggestion($whr)
 {
    $this->db->select("i.client");
    $this->db->from('income as i');
    $this->db->where($whr);
    $this->db->group_by('i.client');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
 }

 public function incomeprojectSuggestion($whr,$client)
 {
   $this->db->select("i.project");
   $this->db->from('income as i');
   if($client != '')
   {
   $this->db->like('client',$client,'both');
   }
   $this->db->where($whr);
   $this->db->group_by('i.project');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function incomeclientAutoSuggestion($whr,$client)
 {
    $this->db->select("i.client");
    $this->db->from('income as i');
    $this->db->like('client',$client,'both');
    $this->db->where($whr);
    $this->db->group_by('i.client');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
 }

 public function incomeprojectAutoSuggestion($whr,$project)
 {
   $this->db->select("i.project");
   $this->db->from('income as i');
   $this->db->like('project',$project,'both');
   $this->db->where($whr);
   $this->db->group_by('i.project');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getuserlocalcurrency($whr)
 {
    $this->db->select('c.id,c.code,c.symbol');
    $this->db->from('user_paymentmethod as u');
    $this->db->join('currency as c','u.currencyId = c.id');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
 }



 public function sum_invoice_amount1($whr,$startdate,$enddate,$name)
 {
   $this->db->select('SUM(receivedAmount) as total');
   $this->db->from('invoice');
   $this->db->where($whr);
   if($startdate != '' && $enddate != '')
   {
   $this->db->where("date >=",$startdate);
   $this->db->where("date <=",$enddate);
   }
   if(!empty($name))
   {
     $this->db->like('name',$name,'both');
   }
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function count_allinvoice($whr,$startdate,$enddate,$name)
 {

   if($startdate != '' && $enddate != '')
   {
   $this->db->where("date >=",$startdate);
   $this->db->where("date <=",$enddate);
   }
   if(!empty($name))
   {
     $this->db->like('name',$name,'both');
   }
   $this->db->where($whr);
   $this->db->from('invoice');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function getfreelancerinvoice($whr,$startdate,$enddate,$name,$start,$perPage)
 {
   $this->db->select('i.*,um.name as rname,c.code,c.symbol');
   $this->db->from('invoice as i');
   $this->db->join('user_meta as um','um.u_id = i.recipient','left');
   $this->db->join('currency as c','c.id = i.currencyId','left');
   $this->db->where($whr);
   if(!empty($name))
   {
     $this->db->like('i.name',$name,'both');
   }
   if($startdate != '' && $enddate != '')
   {
   $this->db->where("i.date >=",$startdate);
   $this->db->where("i.date <=",$enddate);
   }
   $this->db->limit($perPage,$start);
   $this->db->order_by('invoiceId','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getActiveInvoiceClient($whr)
 {
   $this->db->select('name,invoiceId,email,address,phone,currencyId,countryClass,countryCode');
   $this->db->from('invoice as i');
   $this->db->where($whr);
   $this->db->where('recipient',0);
   $this->db->group_by('i.name');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getinvoiceSuggestionClient($whr)
 {
   $this->db->select('name,invoiceId');
   $this->db->from('invoice');
   $this->db->where($whr);
   $this->db->group_by('name');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getlastrecord($tbl,$field,$sort)
 {
   $this->db->select('*');
   $this->db->from($tbl);
   $this->db->limit(1);
   $this->db->order_by($field,$sort);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function getclientinvoice($whr,$start,$perPage)
 {
   $this->db->select('i.*,um.name,c.code,c.symbol');
   $this->db->from('invoice as i');
   $this->db->join('user_meta as um','um.u_id = i.userId');
   $this->db->join('currency as c','c.id = i.currencyId','left');
   $this->db->where($whr);
   $this->db->limit($perPage,$start);
   $this->db->order_by('invoiceId','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function allCompanyLeaveType($whr)
 {
   $this->db->select('u.id,c.startDate,c.carryUpto,c.leavesCarryForward');
   $this->db->from('user as u');
   $this->db->join('leavetype as c','c.userId = u.id');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function gettask($where)
 {
   $this->db->select('t.*,a.name as assign,t.assignedTo');
   $this->db->from('todoList as t');
   $this->db->join('user_meta as a','t.assignedTo = a.u_id','left');
   $this->db->where($where);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function countalltask($id)
 {
   $this->db->where('t.assignedBy',$id);
   $this->db->where('t.milestone',0);
   $this->db->or_where('t.assignedTo ',$id);
   $this->db->from('todoList as t');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function countCurrentTask($id,$date)
 {

   $this->db->where('t.startDate <=',$date);
   $this->db->where('t.dueDate >=',$date);
   $this->db->where('t.assignedBy',$id);
   $this->db->where('t.milestone',0);
   $this->db->or_where('t.assignedTo',$id);
   $this->db->from('todoList as t');
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function getassignContract($whr,$start,$perPage)
 {
   $this->db->select('j.*,u.name,jc.contractAmount,jc.contractId,c.code,c.symbol');
   $this->db->from('todoList as t');
   $this->db->join('user_jobcontract as jc','jc.contractId = t.contractId');
   $this->db->join('user_job as j','j.jobId = jc.jobId');
   $this->db->join('user_meta as u','u.u_id = jc.clientId');
   $this->db->join('currency as c','c.id = j.currencyId');
   $this->db->where($whr);
   $this->db->group_by('t.contractId');
   $this->db->limit($perPage,$start);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_assignContract($whr)
 {
   $this->db->select('j.*');
   $this->db->from('todoList as t');
   $this->db->join('user_jobcontract as jc','jc.contractId = t.contractId');
   $this->db->join('user_job as j','j.jobId = jc.jobId');
   $this->db->where($whr);
   $this->db->group_by('t.contractId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getjobdetail($whr)
 {
   $this->db->select('jc.*,u.name,us.email,u.skype,u.rep_ph_num as phone,u.countrycode,j.contractAmount');
   $this->db->from('user_jobcontract as j');
   // $this->db->join('user_joboffer as of','of.jobId = j.jobId');
   $this->db->join('user_job as jc','jc.jobId = j.jobId');
   $this->db->join('user_meta as u','u.u_id = j.clientId');
   $this->db->join('user as us','us.id = j.clientId');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function getproposalMilestone($whr)
 {
   $this->db->select('m.milestones');
   $this->db->from('user_job_proposal as p');
   $this->db->join('user_job_proposal_milestones as m','m.proposalId = p.proposalId');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function getonlyEmployees($whr)
 {
   $this->db->select('us.id as u_id,us.email,um.name,um.joiningdate,um.salary');
   $this->db->from('user as us');
   $this->db->join('user_meta as um','um.u_id = us.id');
   $this->db->where($whr);
   $this->db->where('us.is_active',1);
   $this->db->where_not_in('access',6);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function gettodohistory($whr)
 {
   $this->db->select('t.*,h.date,h.completeDate,h.name,h.status,h.taskId,h.userId as assignedTo,h.startDate,h.dueDate,(select name from user_meta where u_id = h.userId ) as assignedto,(select name from user_meta where u_id = t.assignedBy ) as assignedby');
   $this->db->from('todoList as t');
   $this->db->join('todoList_history as h','h.todoId = t.id');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function todo($whr)
 {
   $this->db->select('t.*,a.name as assignedto,b.name as assignedby');
   $this->db->from('todoList as t');
   $this->db->join('user_meta as a','t.assignedTo = a.u_id');
   $this->db->join('user_meta as b','t.assignedBy = b.u_id');
   $this->db->where($whr);
   $this->db->order_by('id','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_clientjobs($whr)
 {
   $this->db->from('user_joboffer as jb');
   $this->db->join('user_job as jo', 'jo.jobId = jb.jobId');
   $this->db->where($whr);
   $this->db->group_by('jb.jobId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function count_duetask($id,$date)
 {
   $this->db->from('todoList as t');
   $this->db->where('t.dueDate <',$date);
   $this->db->where('t.status !=',6);
   $this->db->group_start();
   $this->db->where('t.assignedBy',$id);
   $this->db->where('t.milestone',0);
   $this->db->where('t.saved ',0);
   $this->db->or_where('t.assignedTo ',$id);
   $this->db->group_end();
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function count_assign_gig($whr)
 {
   $this->db->select('*');
   $this->db->from('todoList as t');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getassign_gig($whr,$start,$perPage)
 {
   $this->db->select('b.*,t.*');
   $this->db->from('todoList as t');
   $this->db->join('user_gig_buy as b', 'b.user_gig_buyId = t.user_gig_buyId');
   $this->db->where($whr);
   $this->db->limit($perPage,$start);
   $this->db->order_by('t.id','desc');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function countemployeeDsr($whr,$startdate,$enddate)
 {
   $this->db->from('dsr as d');
   $this->db->where($whr);
   $this->db->where("date >=",$startdate);
   $this->db->where("date <=",$enddate);
   // $this->db->group_by('d.taskId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getdsr($whr,$start,$perPage)
 {
   $this->db->select('d.*,u.name');
   $this->db->from('dsr as d');
   $this->db->join('user_meta as u','u.u_id = d.employeeId');
   $this->db->where($whr);
   $this->db->limit($perPage,$start);
   $this->db->order_by('dsrId','desc');
   $this->db->group_by('date');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 // public function getMydsr($whr,$startdate,$enddate,$start,$perPage)
 // {
 //   $this->db->select('d.*,u.name,a.name as approvedby,d.date,MONTHNAME(d.date) as month,MONTH(d.date) as monthnumber,YEAR(d.date) AS year');
 //   $this->db->from('dsr as d');
 //   $this->db->join('user_meta as u','u.u_id = d.employeeId');
 //   $this->db->join('user_meta as a','a.u_id = d.approvedBy','left');
 //   $this->db->where($whr);
 //   $this->db->where("d.date >=",$startdate);
 //   $this->db->where("d.date <=",$enddate);
 //   $this->db->limit($perPage,$start);
 //   $this->db->order_by('dsrId','date');
 //   // $this->db->group_by('date');
 //   // $this->db->group_by('d.projectId','d.type');
 //   $result = $this->db->get();
 //   $result = $result->result();
 //   return $result;
 // }


 public function getdsrproject($whr,$date)
 {
   // GROUP_CONCAT(projectId) as projectId,GROUP_CONCAT(contractId) as contractId,GROUP_CONCAT(gigId) as gigId
   $this->db->select('t.id,t.type,t.projectId,t.contractId,t.user_gig_buyId');
   $this->db->from('todoList as t');
   $this->db->where($whr);
   $this->db->where('milestone',0);
   $this->db->where('t.startDate <=',$date);
   $this->db->where('t.dueDate >=',$date);
   $this->db->order_by('id','desc');
   // $this->db->group_by('contractId');
   // $this->db->group_by('projectId');
   // $this->db->group_by('gigId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function countleave($tbl,$whr,$date)
 {
   $this->db->where($whr);
   $this->db->where('date <=',$date);
   $this->db->where('date1 >=',$date);
   $this->db->from($tbl);
   $count = $this->db->count_all_results();
   return  $count;
 }

 public function sum_expensedatewise($whr,$startdate,$enddate)
 {
   $this->db->select('SUM(amount) as total');
   $this->db->from('expense');
   $this->db->where($whr);
   $this->db->where("date >=",$startdate);
   $this->db->where("date <=",$enddate);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 // public function sum_invoice_amountDatewise($whr,$startdate,$enddate)
 // {
 //   $this->db->select('SUM(receivedAmount) as total');
 //   $this->db->from('invoice');
 //   $this->db->where($whr);
 //   $this->db->where("date >=",$startdate);
 //   $this->db->where("date <=",$enddate);
 //   $result = $this->db->get();
 //
 //   $result = $result->row();
 //   return $result;
 // }

 public function sum_income_received_amountDatewise($whr,$startdate,$enddate)
 {
   $this->db->select('SUM(receivedAmount) as total');
   $this->db->from('income');
   $this->db->where($whr);
   $this->db->where("date >=",$startdate);
   $this->db->where("date <=",$enddate);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function sum_expenseGraph($whr)
 {
   $this->db->select('SUM(amount) as total,date');
   $this->db->from('expense');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function sum_invoice_amountGraph($whr)
 {
   $this->db->select('SUM(receivedAmount) as total,date');
   $this->db->from('invoice');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function sum_income_paid_amountGraph($whr)
 {
   $this->db->select('SUM(receivedAmount) as total,SUM(amount) as amount,date');
   $this->db->from('income');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function sum_pendingincome_paid_amountGraph($whr)
 {
   $this->db->select('SUM(amount) as total,date');
   $this->db->from('income');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function sum_invoice_amountDatewise($whr,$startdate,$enddate)
 {
   $this->db->select('SUM(receivedAmount) as total');
   $this->db->from('invoice');
   $this->db->where($whr);
   $this->db->where("date >=",$startdate);
   $this->db->where("date <=",$enddate);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }



 public function sum_invoice_amount($whr)
 {
   $this->db->select('SUM(receivedAmount) as total');
   $this->db->from('invoice');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }



 public function sum_opening($whr)
 {
   $this->db->select('SUM(vacancyNoOfOpening) as total');
   $this->db->from('vacancy');
   $this->db->where($whr);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

 public function dsr_count($whr)
 {
   $this->db->from('dsr');
   $this->db->where($whr);
   $this->db->group_by('employeeId');
   $count = $this->db->count_all_results();
   return  $count;
 }

public function team_count($whr,$date)
{
  $this->db->where($whr);
  $this->db->where('startDate <=',$date);
  $this->db->where('dueDate >=',$date);
  $this->db->group_by('assignedTo');
  $this->db->from('todoList');
  $count = $this->db->count_all_results();
  return  $count;
}

public function count_announcment_results($tbl,$whr)
{
  $this->db->from('announcementSend as a');
  $this->db->join('announcement as an','an.annId = a.annId');
  $this->db->where($whr);
  $count = $this->db->count_all_results();
  return  $count;
}

public function project_task_time($whr)
{
  $this->db->select('SUM(time) as time');
  $this->db->from('todoList as t');
  $this->db->join('todoList_billing as b','b.taskId = b.taskId');
  $this->db->where($whr);
  $result = $this->db->get();
  $result = $result->row();
  return $result;
}

public function getprojectDatewise($whr,$startdate,$enddate)
{
  $this->db->select('p.projectId,p.hourlyPrice,p.totalHour,p.date,MONTH(p.date) as month');
  $this->db->from('project as p');
  $this->db->where($whr);
  $this->db->where('date >=',$startdate);
  $this->db->or_where('date >=',$enddate);
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getgigAssignedPlan($whr)
{
  $this->db->select('p.*');
  $this->db->from('todoList as t');
  $this->db->join('todoList as p',"t.parent = p.id");
  $this->db->where($whr);
  $this->db->group_by('id');
  $result = $this->db->get();
  $result = $result->result();
  return $result;

}

public function getRequest($tbl,$whr,$start,$perPage)
{
  $this->db->select('*');
  $this->db->from($tbl);
  $this->db->where($whr);
  $this->db->limit($perPage,$start);
  $this->db->order_by('id','desc');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getNotification($whr,$start,$perPage)
{
  $this->db->select('um.name,um.u_id,un.*');
  $this->db->from('user_notification as un');
  $this->db->join('user_meta as um', 'um.u_id = un.notificationFrom');
  $this->db->where($whr);
  $this->db->limit($perPage,$start);
  $this->db->order_by('notificationId','desc');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getInServices1($tbl,$field,$ids)
{
  $this->db->select('*');
  $this->db->from($tbl);
  $this->db->where_in($field,$ids);
  $this->db->order_by('name','asc');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getcurrency($tbl,$start,$perPage)
{
  $this->db->select('*');
  $this->db->from($tbl);
  $this->db->limit($perPage,$start);
  $this->db->order_by('id','desc');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getgigCountry()
{
  $this->db->select('m.country');
  $this->db->from('user_gig as g');
  $this->db->join('user_meta as m','m.u_id = g.userId ');
  $this->db->group_by('m.u_id');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getgigDuration()
{
  $this->db->select('duration');
  $this->db->from('user_gig_plan');
  $this->db->where('milestone',1);
  $this->db->group_by('duration');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function count_findgig($ser,$ind,$cou,$duration)
{
  $this->db->from('user_gig');
  if($cou != '')
  {
  $this->db->join('user_meta  as m','m.u_id = g.userId');
  $this->db->where('m.country',$country);
  }
  if($ser != '')
  {
  $this->db->where('servicesId',$ser);
  }
  if($ind != '')
  {
  $this->db->where('industryId',$ind);
  }
  if($duration != '')
  {
    $this->db->where_in('gigId',"SELECT gigId FROM user_gig_plan where duration='$duration' && milestone ='1' ", FALSE);
  }
  $count = $this->db->count_all_results();
  return  $count;
}

public function getfindgig($ser,$ind,$country,$duration,$start,$perPage)
{
  $this->db->select('g.*,s.name as services,p.name as industry');
  $this->db->from('user_gig as g');
  $this->db->join('services  as s','s.id = g.servicesId');
  $this->db->join('practice_areas  as p','p.id = g.industryId');
  // if($duration != '')
  // {
  //   $this->db->join('todoList  as t','m.gigId = g.gigId');
  // }
  $this->db->where('g.deleted','0');
  if($country != '')
  {
  $this->db->join('user_meta  as m','m.u_id = g.userId');
  $this->db->where('m.country',$country);
  }
  if($ser != '')
  {
  $this->db->where('servicesId',$ser);
  }
  if($ind != '')
  {
  $this->db->where('industryId',$ind);
  }
  if($duration != '')
  {
    $this->db->where_in('g.gigId',"SELECT gigId FROM user_gig_plan where duration='$duration' &&  milestone ='1' ", FALSE);
  }
  $this->db->limit($perPage,$start);
  $this->db->order_by('gigId','Desc');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}

public function getGigClient($whr)
{
  $this->db->select('um.name,um.u_id,u.email');
  $this->db->from('user_gig_buy as j');
  $this->db->join('user_meta as um','um.u_id = j.clientId');
  $this->db->join('user as u','u.id = j.clientId');
  $this->db->where($whr);
  $this->db->group_by('j.clientId');
  $result = $this->db->get();
  $result = $result->result();
  return $result;
}


 public function getActiveFreelancer($whr)
 {
   $this->db->select('um.c_name as name,um.u_id');
   $this->db->from('user_jobcontract as j');
   $this->db->join('user_meta as um','um.u_id = j.freelancerId');
   $this->db->where($whr);
   $this->db->group_by('j.freelancerId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getGigFreelancer($whr)
 {
   $this->db->select('um.c_name as name,um.u_id');
   $this->db->from('user_gig_buy as j');
   $this->db->join('user_meta as um','um.u_id = j.userId');
   $this->db->where($whr);
   $this->db->group_by('j.userId');
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }

 public function getUserIn($field,$ids)
 {
   $this->db->select('u_id,c_name as name');
   $this->db->from('user_meta');
   $this->db->where_in($field,$ids);
   $result = $this->db->get();
   $result = $result->result();
   return $result;
 }


   public function count_all_results_leave($tbl,$whr)
   {
     $this->db->where($whr);
     $this->db->where_not_in('status',2);
     $this->db->from($tbl);
     $count = $this->db->count_all_results();
     return  $count;
   }

   public function sum_expense11($whr,$startdate,$enddate)
   {
     $this->db->select('SUM(amount) as total');
     $this->db->from('expense');
     $this->db->where($whr);
     if(!empty($startdate))
     {
       $this->db->where("date >=",$startdate);
     }
     if(!empty($enddate))
     {
       $this->db->where("date <=",$enddate);
     }
     $result = $this->db->get();
     $result = $result->row();
     return $result;
   }

   public function sum_income11($whr,$startdate,$endate)
   {
     $this->db->select('SUM(receivedAmount) as total,SUM(amount) as amount,date');
     $this->db->from('income');
     $this->db->where($whr);
     if(!empty($startdate))
     {
       $this->db->where("date >=",$startdate);
     }
     if(!empty($enddate))
     {
       $this->db->where("date <=",$enddate);
     }
     $result = $this->db->get();
     $result = $result->row();
     return $result;
   }

   public function getActiveGigClient($whr)
   {
     $this->db->select('m.name,m.u_id,u.email,m.address1 as address,m.rep_ph_num as phone,m.currencyId,m.countryClass,m.countryCode');
     $this->db->from('user_gig_buy as b');
     $this->db->join('user_meta as m','m.u_id = b.clientId');
     $this->db->join('user as u','u.id = b.clientId');
     $this->db->where($whr);
     $this->db->group_by('b.clientId');
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function getActivegigProject($whr)
   {
     $this->db->select('b.title,b.user_gig_buyId as gigId,t.name,t.amount,t.hours,t.hourlyPrice');
     $this->db->from('user_gig_buy as b');
     $this->db->join('todoList as t','t.user_gig_buyId = b.user_gig_buyId');
     $this->db->where($whr);
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function getOneservices($whr)
   {
     $this->db->select('ser.name as service,ser.id');
     $this->db->from('user_services as us');
     $this->db->join('services as ser','us.servicesId = ser.id');
     $this->db->where($whr);
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function sum_dsr_time($whr)
   {
     $this->db->select('SUM(time) as time,SUM(adjustedTime) as adjusted');
     $this->db->from('dsr');
     $this->db->where($whr);
     $result = $this->db->get();
     $result = $result->row();
     return $result;
   }

   public function getMydsrTaskDetail($whr,$startdate)
   {
     $this->db->select('d.*,u.name,a.name as approvedby,d.date');
     $this->db->from('dsr as d');
     $this->db->join('user_meta as u','u.u_id = d.employeeId');
     $this->db->join('user_meta as a','a.u_id = d.approvedBy','left');
     $this->db->where($whr);
     $this->db->where("d.date",$startdate);
     $this->db->order_by('dsrId','date');
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function getemployeeAllLeave($whr,$start,$perPage)
   {
     $this->db->select('l.*,m.name as actiontaken');
     $this->db->from('user_leave as l');
     $this->db->join('user_meta as m','m.u_id = l.actionBy','left');
     $this->db->where($whr);
     $this->db->limit($perPage,$start);
     $this->db->order_by('l.id','desc');
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function getallUserTestimonial($whr,$start,$perPage)
   {
     $this->db->select('*');
     $this->db->from('user_testimonial');
     $this->db->where($whr);
     $this->db->order_by('testimonialId','desc');
     $this->db->limit($perPage,$start);
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function getFrontreviews($tbl,$whr,$ids)
   {
     $this->db->select('*');
     $this->db->from($tbl);
     $this->db->where($whr);
     $this->db->where_in('user_gig_buyId',$ids);
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function incomeMonthWise($whr)
   {
     $this->db->select('YEAR(i.date) AS y,date AS start,MONTH(i.date) AS m,MONTHNAME(i.date) as month,sum(i.receivedAmount) as total');
     $this->db->from('income as i');
     $this->db->where('date >= DATE_SUB(now(), INTERVAL 12 MONTH)');
     $this->db->where($whr);
     // $this->db->limit($perPage,$start);
     $this->db->group_by('MONTH(date)');
     $this->db->order_by('MONTH(date)','desc');
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function RankingGigServices()
   {
     $this->db->select('r.reviewId,u.id as freelancerId,u.type,b.gigId,b.user_gig_buyId,r.reviewFrom as clientId,g.servicesId,g.industryId,r.reviewType,
     (select country from user_meta where u_id = u.id ) as location,(select country from user_meta where u_id = r.reviewFrom ) as clocation');
     $this->db->from('user as u');
     $this->db->join('user_gig_buy as b','b.userId = u.id');
     $this->db->join('user_gig as g','g.gigId = b.gigId');
     $this->db->join('user_review as r', 'r.user_gig_buyId = b.user_gig_buyId');
     //$this->db->where('r.contractId','jc.contractId');
     $this->db->where('b.status',2);
     $this->db->where('b.endDate >= DATE_SUB(now(), INTERVAL 12 MONTH)');
     $this->db->where('r.reviewType','total');
     $this->db->where('r.milestoneId IS NULL', null, false);
     $this->db->where('r.linkedInId IS NULL', null, false);
     $this->db->group_by('b.user_gig_buyId');
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function getUserPerformance($whr,$search,$start,$perPage)
   {
     $this->db->select('us.id as u_id,us.email,um.name,um.joiningdate,um.salary,p.duration');
     $this->db->from('user as us');
     $this->db->join('user_meta as um','um.u_id = us.id');
     $this->db->join('performance_duration as p','um.u_id = p.userId','left');
     $this->db->where($whr);
     if($search != '')
     {
     $this->db->like('um.name',$search,'both');
     }
     $this->db->limit($perPage,$start);
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function count_userperformance($whr,$search)
   {
     if($search != '')
     {
     $this->db->like('um.name',$search,'both');
     }
     $this->db->where($whr);
     $this->db->from('user as u');
     $this->db->join('user_meta as um','u.id = um.u_id');
     $count = $this->db->count_all_results();
     return  $count;
   }

   public function getmanagerPerformance($whr,$start,$perPage)
   {
     $this->db->select('p.*,um.name,pr.performance_reviewerid');
     $this->db->from('performance_reviewer as pr');
     $this->db->join('performance as p','pr.perId = p.perId');
     $this->db->join('user_meta as um','um.u_id = p.employeeId');
     $this->db->where($whr);
     $this->db->limit($perPage,$start);
     $this->db->order_by('performance_reviewerid','desc');
     $result = $this->db->get();
     $result = $result->result();
     return $result;
   }

   public function performanceReviewer($field,$keyword,$id,$whr)
    {
       $this->db->select('m.u_id as id,m.name');
       $this->db->from('user as u');
       $this->db->join('user_meta as m','m.u_id = u.id');
       $this->db->where($whr);
       $this->db->where_not_in('u.id',$id);
       $this->db->like($field,$keyword,'both');
       $this->db->group_by('m.u_id');
       $query = $this->db->get();
       return $query->result();
  }

  public function getEditPerformance($whr)
  {
    $this->db->select('p.*,u.name,u.joiningdate,pr.*,f.performance_formId');
    $this->db->from('performance_reviewer as pr');
    $this->db->join('performance as p','pr.perId = p.perId');
    $this->db->join('user_meta as u','u.u_id = p.employeeId');
    $this->db->join('performance_form as f','f.departmentId = p.departmentId','left');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function performanceReview($whr)
  {
    $this->db->select('pr.performance_reviewerid,u.name,pr.review,pr.userId');
    $this->db->from('performance_reviewer as pr');
    $this->db->join('user_meta as u','u.u_id = pr.userId');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function lastReviewer($whr,$id)
  {
    $this->db->select('*');
    $this->db->from('performance');
    $this->db->where($whr);
    $this->db->where_not_in('perId',$id);
    $this->db->order_by('perId','desc');
    $query = $this->db->get();
    return $query->result();
  }

  public function MyPerformance($whr,$start,$perPage)
  {
    $this->db->select('p.*,um.name,pr.performance_reviewerid');
    $this->db->from('performance_reviewer as pr');
    $this->db->join('performance as p','p.perId = pr.perId');
    $this->db->join('user_meta as um','um.u_id = p.employeeId');
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $this->db->order_by('perId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function performanceForm($whr,$start,$perPage)
  {
    $this->db->select('p.*,d.department');
    $this->db->from('performance_form as p');
    $this->db->join('department as d','d.id = p.departmentId');
    $this->db->where($whr);
    $this->db->limit($perPage,$start);
    $this->db->order_by('performance_formId','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function performanceView($whr)
  {
    $this->db->select('p.*,um.name,um.joiningdate');
    $this->db->from('performance as p');
    $this->db->join('user_meta as um','um.u_id = p.employeeId');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function performancer_reviwer_view($whr)
  {
    $this->db->select('p.*,um.name');
    $this->db->from('performance_reviewer as p');
    $this->db->join('user_meta as um','um.u_id = p.userId');
    $this->db->where($whr);
    $this->db->order_by('p.performance_reviewerid','asc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function performancer_reviwer_viewOne($whr)
  {
    $this->db->select('p.*,um.name');
    $this->db->from('performance_reviewer as p');
    $this->db->join('user_meta as um','um.u_id = p.userId');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function PerformancereviewScoreCount($whr)
  {
    $this->db->select('SUM(overallScore) as score,count(perId) as t');
    $this->db->from('performance_reviewer');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function getEmployeeTaskBymonth($whr)
  {
    $this->db->select("t.name,t.taskId,t.id,t.type,t.hours,t.assignedTo,t.amount,t.projectId,t.contractId,t.plan,t.user_gig_buyId,t.hourlyPrice");
    $this->db->from('todoList as t');
    // $this->db->join('project_task as t','t.taskId = a.projectTaskId');
    // $this->db->join('project as p','t.projectId = p.projectId');
    $this->db->where($whr);
    $this->db->order_by('t.id','desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function contractre($whr)
  {
    $this->db->select('c.contractAmount as budget,j.jobTitle,u.name,s.name as service,contractDate,contractEndDate');
    $this->db->from('user_jobcontract as c');
    $this->db->join('user_job as j','c.jobId = j.jobId');
    $this->db->join('user_meta as u','u.u_id = c.clientId');
    $this->db->join('services as s','s.id = j.servicesId');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function gigdata($whr)
  {
    $this->db->select('cu.code,cu.symbol,p.name as industry,co.name as country,st.name as state,ci.name as city,us.email,u.rep_ph_num as phone,u.address1 as address,u.skype,c.title,s.name as service,u.name,c.date,c.endDate');
    $this->db->from('user_gig_buy as c');
    $this->db->join('services as s','s.id = c.servicesId','left');
    $this->db->join('user_meta as u','u.u_id = c.clientId','left');
    $this->db->join('user as us','u.id = c.clientId','left');
    $this->db->join('countries as co','co.id = u.country','left');
    $this->db->join('states as st','st.id = u.state','left');
    $this->db->join('cities as ci','ci.id = u.city','left');
    $this->db->join('practice_areas as p','p.id = c.industryId','left');
    $this->db->join('currency as cu','cu.id = c.currencyId','left');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function buygigcurrency($whr)
  {
    $this->db->select('cu.code,cu.symbol');
    $this->db->from('user_gig_buy as c');
    $this->db->join('currency as cu','cu.id = c.currencyId','left');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function SumEarning($whr)
  {
    $this->db->select('SUM(userEarningAmount) as total');
    $this->db->from('userEarning');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function Contractcurrency($whr)
  {
    $this->db->select('cu.code,cu.symbol');
    $this->db->from('user_jobcontract as c');
    $this->db->join('user_job as j','j.jobId = c.jobId');
    $this->db->join('currency as cu','cu.id = j.currencyId');
    $this->db->where($whr);
    $result = $this->db->get();
    $result = $result->row();
    return $result;
  }

  public function count_careers($position,$skill,$experience,$vacancies,$location,$company,$industry)
  {
    if($position != '')
    {
    $this->db->like('vacancyPosition',$position,'both');
    }
    if($company != '')
    {
    $this->db->where('userId',$company,'both');
    }
    if($skill != '')
    {
    $this->db->like('vacancySkill',$skill,'both');
    }
    if($industry != '')
    {
    $this->db->like('vacancyIndustry',$industry,'both');
    }
    if($experience != '')
    {
      if($experience == 1)
      {
      $this->db->where('vacancyExperience <=',0);
      $this->db->where('vacancyExperienceMax >=',1);
      }
      else if($experience == 2)
      {
      $this->db->where('vacancyExperience <=',1);
      $this->db->where('vacancyExperienceMax >=',1);
      }
      else if($experience == 3)
      {
        $this->db->where('vacancyExperience <=',2);
        $this->db->where('vacancyExperienceMax >=',2);
      }
      else if($experience == 4)
      {
        $this->db->where('vacancyExperience <=',3);
        $this->db->where('vacancyExperienceMax >=',3);
      }
      else if($experience == 5)
      {
        $this->db->where('vacancyExperience <=',4);
        $this->db->where('vacancyExperienceMax >=',4);
      }
      else if($experience == 6)
      {
        $this->db->where('vacancyExperience <=',5);
        $this->db->where('vacancyExperienceMax >=',5);
      }
      else if($experience == 7)
      {
        $this->db->where('vacancyExperience <=',6);
        $this->db->where('vacancyExperienceMax >=',6);
      }
      else if($experience == 8)
      {
        $this->db->where('vacancyExperience <=',7);
        $this->db->where('vacancyExperienceMax >=',7);
      }
      else if($experience == 9)
      {
        $this->db->where('vacancyExperience <=',8);
        $this->db->where('vacancyExperienceMax >=',8);
      }
      else if($experience == 10)
      {
        $this->db->where('vacancyExperience <=',9);
        $this->db->where('vacancyExperienceMax >=',9);
      }
      else if($experience == 11)
      {
        $this->db->where('vacancyExperience <=',10);
        $this->db->where('vacancyExperienceMax >=',10);
      }
    }
    if($vacancies != '')
    {
    $this->db->like('vacancyNoOfOpening',$vacancies,'both');
    }
    if($location != '')
    {
    $this->db->like('vacancyLocation',$location,'both');
    }
    $this->db->where('vacancyNoOfOpening !=',0);
    $this->db->where('vacancyStatus',1);
    $this->db->from('vacancy');
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function getcareers($position,$skill,$experience,$vacancies,$location,$company,$industry,$start,$perPage)
  {

    $this->db->select('v.*,u.c_name,u.company_logo');
    $this->db->from('vacancy as v');
    $this->db->join('user_meta as u','v.userId = u.u_id');
    $this->db->where('vacancyNoOfOpening !=',0);
    $this->db->where('vacancyStatus',1);
    if($position != '')
    {
    $this->db->like('vacancyPosition',$position,'both');
    }
    if($company != '')
    {
    $this->db->where('userId',$company,'both');
    }
    if($skill != '')
    {
    $this->db->like('vacancySkill',$skill,'both');
    }
    if($industry != '')
    {
    $this->db->like('vacancyIndustry',$industry,'both');
    }
    if($experience != '')
    {
      if($experience == 1)
      {
      $this->db->where('vacancyExperience <=',0);
      $this->db->where('vacancyExperienceMax >=',1);
      }
      else if($experience == 2)
      {
      $this->db->where('vacancyExperience <=',1);
      $this->db->where('vacancyExperienceMax >=',1);
      }
      else if($experience == 3)
      {
        $this->db->where('vacancyExperience <=',2);
        $this->db->where('vacancyExperienceMax >=',2);
      }
      else if($experience == 4)
      {
        $this->db->where('vacancyExperience <=',3);
        $this->db->where('vacancyExperienceMax >=',3);
      }
      else if($experience == 5)
      {
        $this->db->where('vacancyExperience <=',4);
        $this->db->where('vacancyExperienceMax >=',4);
      }
      else if($experience == 6)
      {
        $this->db->where('vacancyExperience <=',5);
        $this->db->where('vacancyExperienceMax >=',5);
      }
      else if($experience == 7)
      {
        $this->db->where('vacancyExperience <=',6);
        $this->db->where('vacancyExperienceMax >=',6);
      }
      else if($experience == 8)
      {
        $this->db->where('vacancyExperience <=',7);
        $this->db->where('vacancyExperienceMax >=',7);
      }
      else if($experience == 9)
      {
        $this->db->where('vacancyExperience <=',8);
        $this->db->where('vacancyExperienceMax >=',8);
      }
      else if($experience == 10)
      {
        $this->db->where('vacancyExperience <=',9);
        $this->db->where('vacancyExperienceMax >=',9);
      }
      else if($experience == 11)
      {
        $this->db->where('vacancyExperience <=',10);
        $this->db->where('vacancyExperienceMax >=',10);
      }
    }
    if($vacancies != '')
    {
    $this->db->like('vacancyNoOfOpening',$vacancies,'both');
    }
    if($location != '')
    {
    $this->db->like('vacancyLocation',$location,'both');
    }
    $this->db->limit($perPage,$start);
    $this->db->order_by('vacancyId','Desc');
    $result = $this->db->get();

    $result = $result->result();
    return $result;
  }

  public function getCareersCompany()
  {

    $this->db->select('u.c_name,u.u_id');
    $this->db->from('vacancy as v');
    $this->db->join('user_meta as u','v.userId = u.u_id');
    $this->db->where('vacancyNoOfOpening !=',0);
    $this->db->where('vacancyStatus',1);
    $this->db->group_by('v.userId');
    $this->db->order_by('vacancyId','Desc');
    $result = $this->db->get();
    $result = $result->result();
    return $result;
  }

  public function getcountdsr($tbl,$whr)
  {
    $this->db->group_by('employeeId');
    $this->db->where($whr);
    $this->db->from($tbl);
    $count = $this->db->count_all_results();
    return  $count;
  }

  public function checkLeaveExistIntype($tbl,$whr,$date)
  {
   $this->db->select('*');
   $this->db->from($tbl);
   $this->db->where($whr);
   $this->db->where("date >=",$date);
   $result = $this->db->get();
   $result = $result->row();
   return $result;
 }

























}
?>
