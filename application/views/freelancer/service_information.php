<?php

include('sidebar.php');
?>
<div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
            <li class="active">Service Briefing</li>
        </ol>
    </section>
    <section class="content">
            <div ng-cloak ng-app="myApp16" ng-controller="myCtrt16">

                <div id="content">


                    <div class="p-3 bg-white">
                        <div class="services-area">
                            <form>
                                <div ng-if="serviceinfo.length != 0" class="form-group " ng-repeat="(key,x) in serviceinfo">
                                    <p class="mb-0"><b>{{ x.name }}</b></p>
                                    <textarea ng-cloak data-ck-editor ng-model="x.description" class="form-control rounded-0" name="desc{{ x.sid }}"> </textarea>
                                    <p ng-cloak ng-show="infoSubmit && x.description == ''" class="text-danger">Description is required.</p>
                                </div>
                                <div ng-cloak ng-if="serviceinfo.length == 0" class="alert alert-warning">No services has been added yet. Please add services to create brief information about your services.
                                    <a target="_blank" href="<?php echo base_url(); ?>services/<?php echo $this->session->userdata['clientloggedin']['url']; ?>">Add Services</a>
                                </div>
                                <div ng-if="serviceinfo.length != 0" class="form-group mb-0">
                                    <button ng-click="submitserviceInfo()" type="button" class="btn btn-primary rounded-0">Add Services Details</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



    </section>
</div>
