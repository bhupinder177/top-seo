<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138956267-1"></script>

  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138956267-1');
</script>
<!-- google -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PZ272NR');</script>
<!-- End Google Tag Manager -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

<link href="<?php echo base_url(); ?>assets/front/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.css">



<link href="<?php echo base_url(); ?>assets/front/css/custom-style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/front/css/custom-style-responsive.css" rel="stylesheet" type="text/css" />
<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet"> -->
<link href="<?php echo base_url(); ?>assets/front/css/flag-icon.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/front/css/simplePagination.css">
<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/datepicker/datepicker.css"> -->
<link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet">

<!-- countrycode -->
<?php
 if($this->uri->segment(1) == "contact-us" || $this->uri->segment(1) == "profile" )
 {
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/prism.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/demo.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/intlTelInput.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dashboard/countrycode/css/isValidNumber.css">
<?php } ?>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">


<!-- countrycode -->



<title><?php if(isset($title)){ echo $title; } else { echo "Top SEO Companies | Local SEO Services | Freelance Marketplace"; } ?></title>
<meta name="description" content="<?php if(isset($description)){ echo $description; } else { echo "Chat & Hire with SEO Experts for your projects on Top SEOs. Post and Manage Your Jobs. Get Competitive Prices From Local SEO Professionals For Free. Get Started Now."; } ?>" />
</head>

<body>
  <div class="preloader" style="display: none;">
    <img src="<?php echo base_url(); ?>assets/images/preloader.gif">
  </div>
  <header>
    <input type="hidden" class="base_url" value="<?php echo base_url(); ?>">
    <div class="container-fluid">
    <nav class="navbar ">
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/front/images/top-seo.png" alt="top-seo" /></a>
    </div>
    <div class="collapse navbar-collapse login-register" id="myNavbar">
      <ul class="nav navbar-nav navbar-right ">

        <li><a class="<?php if($this->uri->segment(1) == ''){ echo "register"; }  ?>" href="<?php echo base_url(); ?>">Home</a></li>
        <li><a class="<?php if($this->uri->segment(1) == "features"){ echo "register"; }  ?>" href="<?php echo base_url(); ?>features">Features</a></li>

         <!-- <li><a   href="membership">Pricing</a></li> -->
       <li><a class="<?php if($this->uri->segment(1) == "find-work"){ echo "register"; }  ?>" href="<?php echo base_url(); ?>find-work">Find Work</a></li>
       <li><a class="<?php if($this->uri->segment(1) == "find-gig"){ echo "register"; }  ?>" href="<?php echo base_url(); ?>find-gig">Find Gigs</a></li>
       <li class="blogmenu"><a class="<?php if($this->uri->segment(1) == "blog"){ echo "register"; }  ?>" href="<?php echo base_url(); ?>blog">Blog</a>
       <ul class="submenu">
         <?php
          if (isset($this->session->userdata['clientloggedin']))
          {
           ?>
        <li><a class="<?php if($this->uri->segment(2) == "blog-add"){ echo "register"; }  ?>" href="<?php echo base_url(); ?>submit-post">Submit Post</a></li>
        <?php
            }
          ?>

       </ul>
       </li>
             <li><a class="<?php if($this->uri->segment(1) == "carrers"){ echo "register"; }  ?>" href="<?php echo base_url(); ?>careers">Careers</a></li>
             <li><a class="<?php if($this->uri->segment(1) == "conference"){ echo "register"; }  ?>" href="<?php echo base_url(); ?>conference">Conference</a></li>




      <li><a class="<?php if($this->uri->segment(1) == "contact-us"){ echo "register"; }  ?>" href="<?php echo base_url(); ?>contact-us">Contact us</a></li>
              <?php
              if (!isset($this->session->userdata['clientloggedin']))
              {
                ?>
                <!-- <li><a  class="<?php if($this->uri->segment(1) == "register"){ echo "register"; }  ?>" href="<?php echo base_url(); ?>register">Register</a></li> -->
                <li><a class="<?php if($this->uri->segment(1) == "login"){ echo "register"; }  ?>" href="<?php echo base_url(); ?>login">Login/Register</a></li>
              <?php }
              else {
                $user = getrow('user_meta',array("u_id"=>$this->session->userdata['clientloggedin']['id']));
                if(!empty($user))
                {
                  if($this->session->userdata['clientloggedin']['type'] == 4)
                  {
                    ?>
                    <li class="active"><a href="<?php echo base_url(); ?>client-profile"><?php echo ucwords($user->name); ?></a></li>
                  <?php }
                  else if($this->session->userdata['clientloggedin']['type'] == 2 && $this->session->userdata['clientloggedin']['access'] == 1 )
                  {
                    ?>
                    <li class="active"><a href="<?php echo base_url(); ?>cprofile/<?php echo $this->session->userdata['clientloggedin']['url']; ?>"><?php echo ucwords($user->name); ?></a></li>
                    <?php $Useraccess = getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

                  }
                  else if($this->session->userdata['clientloggedin']['type'] == 3 && $this->session->userdata['clientloggedin']['access'] != 1 )
                  {
                    ?>
                    <li class="active"><a href="<?php echo base_url(); ?>team_profile/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><?php echo ucwords($user->name); ?></a></li>
                    <?php $Useraccess = getrow('user',array("id"=>$this->session->userdata['clientloggedin']['id']));

                  }
                }
                ?>
                <li class="active"><a href="<?php echo base_url(); ?>logout">Logout</a></li>
              <?php } ?>

      </ul>

</div>


</nav>
          </div>

</header>
