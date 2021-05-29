  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(); ?>assets/dashboard/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li <?php if($this->uri->segment(2)=="dashboard"){echo 'class="active"';}?> ><a href="<?php echo base_url(); ?>admin/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a> </li>


       <li <?php if($this->uri->segment(2)=="freelancer"){echo 'class="active"';}?>><a href="<?php echo base_url(); ?>admin/freelancer"><i class="fa fa-user" aria-hidden="true"></i> <span>Freelancer</span></a> </li>

      <li <?php if($this->uri->segment(2)=="client"){echo 'class="active"';}?>><a href="<?php echo base_url(); ?>admin/client"><i class="fa fa-user" aria-hidden="true"></i> <span>Client</span></a> </li>
    	<li class="treeview <?php if($this->uri->segment(2)=="usertestimonial" || $this->uri->segment(2)=="userportfolio" || $this->uri->segment(2)=="usercasestudy" || $this->uri->segment(2)=="userpricing" || $this->uri->segment(2)=="userrequestform" || $this->uri->segment(2)=="userreview"){echo 'active';}?>"> <a href="#"><i class="fa fa-newspaper-o"></i> <span>User Details</span><span class="caret"></span></a>
    	 <ul class="treeview-menu">
    		 <li><a href="<?php echo base_url(); ?>admin/usertestimonial"><i class="fa fa-newspaper-o"></i> <span>Testimonial</span></a> </li>
    		 <li><a href="<?php echo base_url(); ?>admin/userportfolio"><i class="fa fa-newspaper-o"></i> <span>Portfolio</span></a> </li>
    		 <li><a href="<?php echo base_url(); ?>admin/usercasestudy"><i class="fa fa-newspaper-o"></i> <span>Case Study</span></a> </li>
    		 <li><a href="<?php echo base_url(); ?>admin/userpricing"><i class="fa fa-newspaper-o"></i> <span>Pricing</span></a> </li>
    		 <li><a href="<?php echo base_url(); ?>admin/userrequestform"><i class="fa fa-newspaper-o"></i> <span>Request</span></a> </li>
    		 <li><a href="<?php echo base_url(); ?>admin/userreview"><i class="fa fa-newspaper-o"></i> <span>Review</span></a> </li>
    	 </ul>
    	</li>
    	<li <?php if($this->uri->segment(2)=="package"){echo 'class="active"';}?>><a href="<?php echo base_url(); ?>admin/package"><i class="fa fa-newspaper-o"></i> <span>Membership</span></a> </li>

    		<li class="treeview <?php if($this->uri->segment(2) == "industries" || $this->uri->segment(2)=="services" || $this->uri->segment(2)=="suggestion"){ echo "active"; } ?> "> <a href="#"><i class="fa fa-newspaper-o"></i> <span>Indus & Skills</span><span class="caret"></span></a>
    	   <ul class="treeview-menu">
    			 <li class="<?php if($this->uri->segment(2) == "industries"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/industries"><i class="fa fa-newspaper-o"></i> <span>Industries</span></a> </li>
     		 	<li class="<?php if($this->uri->segment(2) == "services"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/services"><i class="fa fa-newspaper-o"></i> <span>Services</span></a> </li>
    			<li class="<?php if($this->uri->segment(2) == "suggestion"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/suggestion"><i class="fa fa-newspaper-o"></i> <span>Suggestion</span></a> </li>

    	   </ul>
    	  </li>
    		<li class="treeview <?php if($this->uri->segment(2) == "ranking-content" || $this->uri->segment(2)=="hire-ranking-content"){ echo "active"; } ?>"> <a href="#"><i class="fa fa-newspaper-o"></i> <span>Content</span><span class="caret"></span></a>
    		 <ul class="treeview-menu">

    			 <li class="<?php if($this->uri->segment(2) == "ranking-content"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/ranking-content"><i class="fa fa-newspaper-o"></i> <span>Ranking Content</span></a> </li>
     		 	<li class="<?php if($this->uri->segment(2) == "hire-ranking-content"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/hire-ranking-content"><i class="fa fa-newspaper-o"></i> <span>Hire Ranking Content</span></a> </li>
    		 </ul>
    		</li>





    	<li class="treeview <?php if($this->uri->segment(2) == "top-industry" || $this->uri->segment(2)=="how-it-works" || $this->uri->segment(2)=="testimonial"){ echo "active"; } ?>"> <a href="#"><i class="fa fa-newspaper-o"></i> <span>Home</span><span class="caret"></span></a>
       <ul class="treeview-menu">
    		 <li class="<?php if($this->uri->segment(2) == "top-industry" ){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/top-industry"><i class="fa fa-newspaper-o"></i> <span>Top industry</span></a> </li>

    	 	<li class="<?php if($this->uri->segment(2) == "how-it-works" ){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/how-it-works"><i class="fa fa-newspaper-o"></i> <span>How it works</span></a> </li>
    	 	<li class="<?php if($this->uri->segment(2) == "testimonial" ){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/testimonial"><i class="fa fa-newspaper-o"></i> <span>Testimonial</span></a> </li>

       </ul>
      </li>
    	<li class="treeview <?php if($this->uri->segment(2) == "category" || $this->uri->segment(2) == "blog" ){ echo "active"; } ?>"> <a href="#"><i class="fa fa-newspaper-o"></i><span>Blog</span><span class="caret"></span></a>
       <ul class="treeview-menu">
    		 <li class="<?php if($this->uri->segment(2) == "category"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/category"><i class="fa fa-newspaper-o"></i> <span>Category</span></a> </li>
     	 	<li class="<?php if($this->uri->segment(2) == "blog"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/blog"><i class="fa fa-newspaper-o"></i> <span>Blog Post</span></a> </li>
       </ul>
      </li>
    	<li class="<?php if($this->uri->segment(2) == "conference"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/conference"><i class="fa fa-newspaper-o"></i> <span>Conference</span></a> </li>

    	<li class="treeview <?php if($this->uri->segment(2) == "questionType" || $this->uri->segment(2) == "question"){ echo "active"; } ?>"> <a href="#"><i class="fa fa-newspaper-o"></i></i> <span>Review FAQ</span><span class="caret"></span></a>
       <ul class="treeview-menu">
    		 <li class="<?php if($this->uri->segment(2) == "questionType"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/questionType"><i class="fa fa-newspaper-o"></i> <span>Question Type</span></a> </li>
     	 <li class="<?php if($this->uri->segment(2) == "question"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/question"><i class="fa fa-newspaper-o"></i> <span>Question</span></a> </li>
       </ul>
      </li>
    	<li class="<?php if($this->uri->segment(2) == "currency" ){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/currency"><i class="fa fa-newspaper-o"></i> <span>Currency</span></a> </li>
    	<li class="treeview <?php if($this->uri->segment(2) == "support" || $this->uri->segment(2) == "support-external"){ echo "active"; } ?>"> <a href="#"><i class="fa fa-newspaper-o"></i></i> <span>Support</span><span class="caret"></span></a>
    	 <ul class="treeview-menu">
    		<li class="<?php if($this->uri->segment(2) == "support"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/support"><i class="fa fa-newspaper-o"></i> <span>Internal</span></a> </li>
    		<li class="<?php if($this->uri->segment(2) == "support-external"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/support-external"><i class="fa fa-newspaper-o"></i> <span>External</span></a> </li>
    	 </ul>
    	</li>

    	<li class="<?php if($this->uri->segment(2) == "contact"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/contact"><i class="fa fa-newspaper-o"></i> <span>Contact</span></a> </li>
    	<li class="<?php if($this->uri->segment(2) == "email"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/email"><i class="fa fa-envelope-square"></i><span>Email</span></a> </li>
      <li class="<?php if($this->uri->segment(2) == "featured"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/featured"><i class="fa fa-newspaper-o"></i> <span>Features</span></a> </li>
      <li class="<?php if($this->uri->segment(2) == "sitemap"){ echo "active"; } ?>"><a href="<?php echo base_url(); ?>admin/sitemap"><i class="fa fa-newspaper-o"></i> <span>Sitemap</span></a> </li>

    	<li class=""><a href="<?php echo base_url(); ?>admin/logout"><i class="fa fa-sign-out"></i> <span>Log Out</span></a> </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
