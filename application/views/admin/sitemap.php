<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i>Home</a> ></li>
         <li class="active">Sitemap</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content">
      <div  class="box box-success p-3">
         <div class="box-header">
            <h4 class="box-titl">Sitemap</h4>
         </div>
         <div class="box-body">
            <form action="<?php echo base_url(); ?>admin/sitemap_upload" method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-8">
               <div class="form-group"> 
                  <input type="file" required name="xml" class="form-control" >
               </div>
               </div>
               <!-- <div class="form-group">
                  <label>Sitemap html</label>
                  <input type="file" name="html" class="col-md-6 form-control" >
                  </div> -->
                    <div class="col-md-4">
               <div class="form-group">
                  <input type="submit" value="submit" name="save" class="btn btn-success" >
               </div>
               </div>
               </div>
            </form>
            <!-- content-->
         </div>
      </div>
   </section>
</div>

