<?php

include('sidebar.php');

?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <h1><?php echo ucwords($employee->name); ?> Billing Status</h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Billing</li>
      </ol>
    </section>


<section class="content">
  <div class="container1">

    <div class="no-margin user-dashboard-container">
          <div id="content">
        <div class="container-fluid">
      <div class="content-box no-border-radius">
            <div class="row">
                  <div class="col-md-12">
                    <div class="box" >

             				 <div class="box-body">

                       <div class="event-calendar"></div>





         <!-- detail -->





                      </div>
                    </div>

                </div>
                </div>
              </div>
             </div>
           </div>

          </div>
          </div>
       </section>
      </div>
