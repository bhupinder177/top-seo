<div id="sidebar">
    <ul>

     <li class="<?php if($this->uri->segment(2) == "dashboard"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>admin/dashboard">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/dashboard.png" class="img-fluid"> Dashboard</a>
     </li>
     <li class="<?php if($this->uri->segment(2) == "freelancer"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>admin/freelancer">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid">Freelancer</a>
     </li>

     <li class="<?php if($this->uri->segment(2) == "client"){ echo "active"; }  ?>">
         <a href="<?php echo base_url(); ?>admin/client">
             <img src="<?php echo base_url(); ?>assets/dashboard/images/emp.png" class="img-fluid">Client</a>
     </li>
      <!-- user detail -->
     <li class="nav-item submenu">
           <a class="nav-link" href="#sub-menu1" data-toggle="collapse" data-target="#sub-menu1">
               <img src="<?php echo base_url(); ?>assets/dashboard/images/Dsr.png" class="img-fluid">User details<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
           <ul class="list-unstyled flex-column <?php if($this->uri->segment(2) == "usertestimonial" || $this->uri->segment(2) == "userportfolio" || $this->uri->segment(2) == "usercasestudy" || $this->uri->segment(2) == "userpricing" || $this->uri->segment(2) == "userrequestform" || $this->uri->segment(2) == "userreview" || $this->uri->segment(2) == "profileview" || $this->uri->segment(2) == "askquestion" || $this->uri->segment(2) == "usergig" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu1" aria-expanded="false">

               <li class="nav-item <?php if($this->uri->segment(2) == "usertestimonial"){ echo "active"; }  ?> ">
                   <a  class="nav-link" href="<?php echo base_url(); ?>admin/usertestimonial">
                       <img src="<?php echo base_url(); ?>assets/dashboard/images/testi.png" class="img-fluid">Testimonial</a>
               </li>
               <li class="nav-item <?php if($this->uri->segment(2) == "userportfolio"){ echo "active"; }  ?> ">
                   <a  class="nav-link" href="<?php echo base_url(); ?>admin/userportfolio">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/profile-s.png" class="img-fluid">Portfolio</a>
               </li>
               <li class="nav-item <?php if($this->uri->segment(2) == "usercasestudy"){ echo "active"; }  ?> ">
                   <a  class="nav-link" href="<?php echo base_url(); ?>admin/usercasestudy">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/case-s.png" class="img-fluid">Case Study</a>
               </li>
               <li class="nav-item <?php if($this->uri->segment(2) == "userpricing"){ echo "active"; }  ?> ">
                   <a  class="nav-link" href="<?php echo base_url(); ?>admin/userpricing">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/salary-icon.png" class="img-fluid">Pricing</a>
               </li>
               <li class="nav-item <?php if($this->uri->segment(2) == "userrequestform"){ echo "active"; }  ?> ">
                   <a  class="nav-link" href="<?php echo base_url(); ?>admin/userrequestform">
                        <img src="<?php echo base_url(); ?>assets/dashboard/images/interview.png" class="img-fluid">Request</a>
               </li>
               <li class="nav-item <?php if($this->uri->segment(2) == "userreview"){ echo "active"; }  ?> ">
                   <a  class="nav-link" href="<?php echo base_url(); ?>admin/userreview">
                       <img src="<?php echo base_url(); ?>assets/dashboard/images/proposal.png" class="img-fluid">Review</a>
               </li>
               <li class="nav-item <?php if($this->uri->segment(2) == "profileview"){ echo "active"; }  ?> ">
                   <a  class="nav-link" href="<?php echo base_url(); ?>admin/profileview">
                       <img src="<?php echo base_url(); ?>assets/dashboard/images/proposal.png" class="img-fluid">Profile view</a>
               </li>
               <li class="nav-item <?php if($this->uri->segment(2) == "askquestion"){ echo "active"; }  ?> ">
                   <a  class="nav-link" href="<?php echo base_url(); ?>admin/askquestion">
                       <img src="<?php echo base_url(); ?>assets/dashboard/images/proposal.png" class="img-fluid">Ask Question</a>
               </li>
               <li class="nav-item <?php if($this->uri->segment(2) == "usergig"){ echo "active"; }  ?> ">
                   <a  class="nav-link" href="<?php echo base_url(); ?>admin/usergig">
                       <img src="<?php echo base_url(); ?>assets/dashboard/images/proposal.png" class="img-fluid">Gig</a>
               </li>

               </ul>
       </li>
       <!-- user detail -->

           <!-- packages -->
           <li class="nav-item submenu">
                 <a class="nav-link" href="#sub-menu2" data-toggle="collapse" data-target="#sub-menu2">
                     <img src="<?php echo base_url(); ?>assets/dashboard/images/service-br.png" class="img-fluid">Membership<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                 <ul class="list-unstyled flex-column <?php if($this->uri->segment(2) == "package" || $this->uri->segment(2) == "custom-package" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu2" aria-expanded="false">

                     <li class="nav-item <?php if($this->uri->segment(2) == "package"){ echo "active"; }  ?>">
                         <a  class="nav-link" href="<?php echo base_url(); ?>admin/package">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Membership</a>
                     </li>
                     <li class="nav-item <?php if($this->uri->segment(2) == "custom-package"){ echo "active"; }  ?>">
                         <a  class="nav-link" href="<?php echo base_url(); ?>admin/custom-package">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Custom package</a>
                     </li>
                </ul>
             </li>
           <!-- packages -->


        <!-- ind -->
       <li class="nav-item submenu">
             <a class="nav-link" href="#sub-menu2" data-toggle="collapse" data-target="#sub-menu2111">
                 <img src="<?php echo base_url(); ?>assets/dashboard/images/service-br.png" class="img-fluid">Indus & Skills<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
             <ul class="list-unstyled flex-column <?php if($this->uri->segment(2) == "industries" || $this->uri->segment(2) == "services" || $this->uri->segment(2) == "suggestion" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu2111" aria-expanded="false">

                 <li class="nav-item <?php if($this->uri->segment(2) == "industries"){ echo "active"; }  ?>">
                     <a  class="nav-link" href="<?php echo base_url(); ?>admin/industries">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Industries</a>
                 </li>
                 <li class="nav-item <?php if($this->uri->segment(2) == "services"){ echo "active"; }  ?> ">
                     <a  class="nav-link" href="<?php echo base_url(); ?>admin/services">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/add-service.png" class="img-fluid">Services</a>
                 </li>
                 <li class="nav-item <?php if($this->uri->segment(2) == "suggestion"){ echo "active"; }  ?> ">
                     <a  class="nav-link" href="<?php echo base_url(); ?>admin/suggestion">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/interview.png" class="img-fluid">Suggestion</a>
                 </li>

                 </ul>
         </li>
         <!-- inds -->

         <!-- content -->
         <li class="nav-item submenu">
               <a class="nav-link" href="#sub-menu3" data-toggle="collapse" data-target="#sub-menu3">
                   <img src="<?php echo base_url(); ?>assets/dashboard/images/contract.png" class="img-fluid">Content<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
               <ul class="list-unstyled flex-column <?php if($this->uri->segment(2) == "ranking-content" || $this->uri->segment(2) == "hire-ranking-content" ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu3" aria-expanded="false">

                   <li class="nav-item <?php if($this->uri->segment(2) == "ranking-content"){ echo "active"; }  ?> ">
                       <a  class="nav-link" href="<?php echo base_url(); ?>admin/ranking-content">
                            <img src="<?php echo base_url(); ?>assets/dashboard/images/compa-roi.png" class="img-fluid">Ranking Content</a>
                   </li>
                   <li class="nav-item <?php if($this->uri->segment(2) == "hire-ranking-content"){ echo "active"; }  ?> ">
                       <a  class="nav-link" href="<?php echo base_url(); ?>admin/hire-ranking-content">
                            <img src="<?php echo base_url(); ?>assets/dashboard/images/job-ofer.png" class="img-fluid">Hire Ranking Content</a>
                   </li>

                   </ul>
           </li>
         <!-- content -->

            <!-- How it work -->
            <li class="nav-item submenu">
                  <a class="nav-link" href="#sub-menu4" data-toggle="collapse" data-target="#sub-menu4">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Home<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                  <ul class="list-unstyled flex-column <?php if($this->uri->segment(2) == "top-industry" || $this->uri->segment(2) == "how-it-works" || $this->uri->segment(2) == "testimonial"  ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu4" aria-expanded="false">

                      <li class="nav-item <?php if($this->uri->segment(2) == "top-industry"){ echo "active"; }  ?> ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>admin/top-industry">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/setting-icon.png" class="img-fluid">Top industry</a>
                      </li>
                      <li class="nav-item <?php if($this->uri->segment(2) == "how-it-works"){ echo "active"; }  ?> ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>admin/how-it-works">
                               <img src="<?php echo base_url(); ?>assets/dashboard/images/service-br.png" class="img-fluid">How it works</a>
                      </li>
                      <li class="nav-item <?php if($this->uri->segment(2) == "testimonial"){ echo "active"; }  ?> ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>admin/testimonial">
                             <img src="<?php echo base_url(); ?>assets/dashboard/images/testi.png" class="img-fluid">Testimonial</a>
                      </li>
                      </ul>
              </li>
            <!-- How it work -->

            <!-- Blog -->
            <li class="nav-item submenu">
                  <a class="nav-link" href="#sub-menu5" data-toggle="collapse" data-target="#sub-menu5">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Blog<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                  <ul class="list-unstyled flex-column <?php if($this->uri->segment(2) == "category" || $this->uri->segment(2) == "blog"  ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu5" aria-expanded="false">

                      <li class="nav-item <?php if($this->uri->segment(2) == "category"){ echo "active"; }  ?> ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>admin/category">
                               <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Category</a>
                      </li>
                      <li class="nav-item <?php if($this->uri->segment(2) == "blog"){ echo "active"; }  ?> ">
                          <a  class="nav-link" href="<?php echo base_url(); ?>admin/blog">
                               <img src="<?php echo base_url(); ?>assets/dashboard/images/performance.png" class="img-fluid">Blog Post</a>
                      </li>

                      </ul>
              </li>
            <!-- Blog -->

                    <li class="<?php if($this->uri->segment(2) == "conference"){ echo "active"; }  ?>">
                       <a href="<?php echo base_url(); ?>admin/conference">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/interview.png" class="img-fluid">Conference</a>
                    </li>

                    <!-- review -->
                    <li class="nav-item submenu">
                          <a class="nav-link" href="#sub-menu6" data-toggle="collapse" data-target="#sub-menu6">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/candidate.png" class="img-fluid">Review FAQ<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                          <ul class="list-unstyled flex-column <?php if($this->uri->segment(2) == "questionType" || $this->uri->segment(2) == "question"  ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu6" aria-expanded="false">

                              <li class="nav-item <?php if($this->uri->segment(2) == "questionType"){ echo "active"; }  ?> ">
                                  <a  class="nav-link" href="<?php echo base_url(); ?>admin/questionType">
                                     <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Question Type</a>
                              </li>
                              <li class="nav-item <?php if($this->uri->segment(2) == "question"){ echo "active"; }  ?> ">
                                  <a  class="nav-link" href="<?php echo base_url(); ?>admin/question">
                                       <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Question</a>
                              </li>

                              </ul>
                      </li>
                    <!-- review -->

                    <li class="<?php if($this->uri->segment(2) == "currency"){ echo "active"; }  ?>">
                       <a href="<?php echo base_url(); ?>admin/currency">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/salary-icon.png" class="img-fluid">Currency</a>
                    </li>

                    <!-- Chat -->
                    <li class="nav-item submenu">
                          <a class="nav-link" href="#sub-menu7" data-toggle="collapse" data-target="#sub-menu7">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/chat-support.png" class="img-fluid">Support<i class="fa fa-angle-down pull-right" aria-hidden="true"></i></a>
                          <ul class="list-unstyled flex-column <?php if($this->uri->segment(2) == "support" || $this->uri->segment(2) == "support-external"  ){ ?>collapse show <?php } else{ ?>collapse<?php } ?>" id="sub-menu7" aria-expanded="false">

                              <li class="nav-item <?php if($this->uri->segment(2) == "support"){ echo "active"; }  ?> ">
                                  <a  class="nav-link" href="<?php echo base_url(); ?>admin/support">
                                       <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">Internal</a>
                              </li>
                              <li class="nav-item <?php if($this->uri->segment(2) == "support-external"){ echo "active"; }  ?> ">
                                  <a  class="nav-link" href="<?php echo base_url(); ?>admin/support-external">
                                       <img src="<?php echo base_url(); ?>assets/dashboard/images/chat.png" class="img-fluid">External</a>
                              </li>
                              </ul>
                      </li>
                    <!-- Chat -->


                    <li class="<?php if($this->uri->segment(2) == "contact"){ echo "active"; }  ?>">
                       <a href="<?php echo base_url(); ?>admin/contract">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/interview.png" class="img-fluid">Contact</a>
                    </li>


                    <li class="<?php if($this->uri->segment(2) == "email"){ echo "active"; }  ?>">
                       <a href="<?php echo base_url(); ?>admin/email">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/add-service.png" class="img-fluid">Email</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == "featured"){ echo "active"; }  ?>">
                       <a href="<?php echo base_url(); ?>admin/featured">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/job-ofer.png" class="img-fluid">Featured</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == "sitemap"){ echo "active"; }  ?>">
                       <a href="<?php echo base_url(); ?>admin/sitemap">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/my_dsr.png" class="img-fluid">Sitemap</a>
                    </li>
                    <li class="<?php if($this->uri->segment(2) == "ranking-price"){ echo "active"; }  ?>">
                       <a href="<?php echo base_url(); ?>admin/ranking-price">
                          <img src="<?php echo base_url(); ?>assets/dashboard/images/my_dsr.png" class="img-fluid">Ranking Price</a>
                    </li>

            <!-- logout -->
            <li class="">
              <a href="<?php echo base_url(); ?>admin/logout">
                <img src="<?php echo base_url(); ?>assets/dashboard/images/log-out.png" class="img-fluid">Logout</a>
            </li>
            <!-- logout -->

  <!-- ****************company and freelancer menu********************************** -->


    </ul>
</div>
