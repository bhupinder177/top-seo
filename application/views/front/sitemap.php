
<?php header('Content-type: text/xml'); ?>
<?= '<?xml version="1.0" encoding="UTF-8" ?>' ?>
<?php
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
$countryIds = array_unique($g);

$db->select('id,name');
$db->where_in('id',$countryIds);
$query = $db->get('countries');
$countrys = $query->result();

$db->select('pra.name as industry,pra.id as industryId,ser.name as service,ser.id as serviceId');
$db->join('practice_areas as pra','link.industryId = pra.id');
$db->join('services as ser','link.serviceId = ser.id');
$query1 = $db->get('practice_service_link as link');
$industry = $query1->result();



$db->select('ser.name as service,ser.id');
$db->join('services as ser','us.servicesId = ser.id');
$db->group_by('us.servicesId');
$query3 = $db->get('user_services as us');
$services = $query3->result();

if(!empty($services))
{
  foreach($services as $key=>$service)
  {
    $db->select('*');
    $query2 = $db->from('hire_ranking_content');
    $db->where('servicesId',$service->id);
    $query3 = $db->get();
    $url1 = $query3->row();
    if($url1)
    {
    $services[$key]->link = $url1->url;
    }
  }
}


?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url();?></loc>
        <priority>1.0</priority>
    </url>
    <url>
  <loc>https://www.top-seos.com/</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>1.00</priority>
</url>
<url>
  <loc>https://www.top-seos.com/login</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.top-seos.com/register</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.top-seos.com/promoting-webs-97</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.top-seos.com/client/home</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.top-seos.com/anaseo-services-135</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.top-seos.com/hire/local-seo-experts</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.top-seos.com/hire/search-engine-optimization</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.top-seos.com/term-condition</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.top-seos.com/privacy-policy</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.top-seos.com/legal-disclosure</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.80</priority>
</url>
<url>
  <loc>https://www.top-seos.com/forgot-password</loc>
  <lastmod>2019-04-22T06:10:03+00:00</lastmod>
  <priority>0.64</priority>
</url>



    <?php
    foreach($countrys as $count)
    {
     foreach($industry as $ind)
     {
       foreach($services as $ser)
       {
         $indu = str_replace(' ', '-',strtolower($ind->industry));
         $se = str_replace(' ', '-',strtolower($ind->service));

         $service = str_replace(' ', '-',strtolower($ser->service));
         $country = str_replace(' ', '-',strtolower($count->name));

    if(!empty($ser->link))
    {
     $custom_ser = str_replace(' ', '-',strtolower($ser->link));
     ?>
     <!-- <url>
         <loc><?php //echo base_url().'hire/'.$custom_ser; ?></loc>
         <priority>0.80</priority>
     </url> -->
  <?php
        }
    else
    {

    ?>
    <!-- <url>
        <loc><?php //echo base_url().'hire/'.$service; ?></loc>
        <priority>0.80</priority>
    </url> -->
  <?php
       }
     ?>
    <url>
        <loc><?php echo base_url().'best-'.$service.'-'.$se.'-companies-in-'.$country; ?></loc>
        <priority>0.80</priority>
    </url>

    <url>
        <loc><?php echo base_url().'best-'.$service.'-companies-in-'.$country; ?></loc>
        <priority>0.80</priority>
    </url>

    <url>
        <loc><?php echo base_url().'best-'.$service.'-companies-in-'.$country; ?></loc>
        <priority>0.80</priority>
    </url>


        <url>
            <loc><?php echo base_url().'best-'.$indu.'-'.$se.'-companies' ?></loc>
            <priority>0.80</priority>
        </url>

            <url>
                <loc><?php echo base_url().'best-'.$indu.'-companies'; ?></loc>
                <priority>0.80</priority>
            </url>





    <?php

       }
     }

    }

    $db->select('ser.name as service,ser.id');
    $db->join('services as ser','j.value = ser.id');
    $db->where('j.type','service');
    $db->group_by('j.value');
    $query3 = $db->get('job_meta as j');
    $ser = $query3->result();

     foreach($ser as $s)
     {
       $li = str_replace(' ', '-',strtolower($s->service));
       $route['search='.$li] = "home/jobSearch/".$s->id;
     }

      // echo "<pre>";
      //  print_r($route);
      //   die;


    /////////profile routes start
    $query = $db->select("um.name,um.u_id");
    $query = $db->from('user as us');
    $query = $db->join('user_meta as um','um.u_id = us.id');
    $query = $db->where('type','3');
    $query = $db->get();
    $result = $query->result();
    foreach($result as $row){
      $name = str_replace(' ','-',strtolower($row->name.'-'.$row->u_id));
      $route[$name] = 'home/freelancerProfile/'.$row->u_id;
      ?>
                  <url>
                      <loc><?php echo base_url().$name; ?></loc>
                      <priority>0.80</priority>
                  </url>
<?php
    }

    $query = $db->select("um.c_name,um.u_id");
    $query = $db->from('user as us');
    $query = $db->join('user_meta as um','um.u_id = us.id');
    $query = $db->where('type','2');
    $query = $db->get();
    $result = $query->result();
    foreach($result as $row){
      $name = str_replace(' ','-',strtolower($row->c_name.'-'.$row->u_id));
    ?>
      <url>
          <loc><?php echo base_url().$name; ?></loc>
          <priority>0.80</priority>
      </url>
  <?php  }



    $query1 = $db->select("um.name,um.u_id");
    $query1 = $db->from('user as us');
    $query1 = $db->join('user_meta as um','um.u_id = us.id');
    $query1 = $db->where('type','4');
    $query1 = $db->get();
    $result1 = $query1->result();
    foreach($result1 as $row){
    $client = str_replace(' ','-',strtolower($row->name.'-'.$row->u_id));
    $route[$client] = 'home/clientProfile/'.$row->u_id;
  ?>  <url>
        <loc><?php echo base_url().$client; ?></loc>
        <priority>0.80</priority>
    </url>
    <?php
   }

    $query2 = $db->select("jobTitle,jobId");
    $query2 = $db->from('user_job');
    $query2 = $db->get();
    $result2 = $query2->result();
    foreach($result2 as $row){
    $title = str_replace(' ','-',strtolower($row->jobTitle.'-'.$row->jobId));
    // $route['job/'.$title] = 'home/singleJob/'.$row->jobId;
    ?>
    <url>
        <loc><?php echo base_url().'job'.$title; ?></loc>
        <priority>0.80</priority>
    </url>
  <?php  }


?>
</urlset>
