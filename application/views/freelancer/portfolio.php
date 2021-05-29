    <!--main-container-part-->
<?php require('sidebar.php'); ?>
    <div id="wrapper" class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
                <li class="active">Portfolios</li>
            </ol>
        </section>
        <section class="content port-folio bg-white">
            <div id="content">
                <div ng-cloak class="content-box box box-success" id="salesportfolio" ng-app="myApp19" ng-controller="myCtrt19">
                    <div class="portfolio text-right with-border p-2">
                        <a   class="btn btn-success" data-toggle="modal" ng-click="portfolioopn()"> Add New </a>
                        <!-- Modal -->
                        <div class="modal fade" id="portfolio" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Add Portfolio</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="d-block text-left">Title <span class="red-text">*</span></label>
                                            <input placeholder="Please enter title" type="text" id="title" ng-model="title" name="title" class="form-control">
                                            <p ng-show="submitport && title == ''" class="text-left text-danger">Title is required.</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="d-block text-left">Website url <span class="red-text">*</span></label>
                                            <input placeholder="Please enter website url" onkeyup="angular.element(this).scope().websitecheck(this)" type="text" id="website" ng-model="website" name="title" class="form-control">
                                            <p ng-show="submitport && website == ''" class="text-left text-danger">Website is required.</p>
                                            <p ng-show="website != '' && websiteerror" class="text-left text-danger">Please enter valid website.</p>

                                        </div>
                                        <div class="form-group">
                                            <label class="d-block text-left">Description <span class="red-text">*</span></label>
                                            <textarea placeholder="Please enter description" type="text" id="description" ng-model="description" name="description" class="form-control ckeditor"></textarea>
                                            <p ng-show="submitport && description == ''" class="text-left text-danger">Description is required.</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="d-block text-left">Image <span class="red-text">*</span></label>
                                            <input ng-model="image" accept="image/*" onchange="angular.element(this).scope().uploadImage(this)" type="file" class="form-control image">
                                            <p ng-show="submitport && !imageerror && image == ''" class="text-left text-danger">Image is required.</p>
                                            <p ng-show="imageerror" class="text-left text-danger">Invalid Image format.</p>
                                        </div>
                                        <div class="form-group">
                                            <label class="d-block text-left">Skills <span class="red-text">*</span></label>
                                            <input placeholder="Search and select skills" id="skills" onkeyup="angular.element(this).scope().skills(this)" type="text" id="portfolioskill" class="form-control pskills">
                                            <p ng-show="submitport && services == ''" class="text-left text-danger">Skills is required.</p>
                                            <ul ng-if="refservices.length != 0" class="text-left" id="chosenresults11" >
                                                <li class="text-left" ng-repeat="(key,x) in refservices" ng-click="addservices(x.name,x.id)" value="{{ x.id }}">{{ x.name }}</li>
                                            </ul>
                                            <ul ng-if="refservices.length == 0 && norecord" class="text-left"  >
                                                <li class="text-left"  >No record found</li>
                                            </ul>
                                        </div>
                                        <div ng-if="services.length != 0" class="text-left" id="tags"><a ng-repeat="(key,x) in services"> {{ x.name }}<span hand ng-click="deleteservice(key)" > &times; </span></a></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" ng-click="portfolioSave()" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="rankingTable" class="table">
                            <thead>
                                <tr>
                                    <th>S. No.</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Website</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-if="portfolio.length != 0" ng-repeat="(key,x) in portfolio" ng-init="portfolio = key">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ x.portfolioTitle }}</td>
                                    <td><img src="<?php echo base_url(); ?>assets/portfolio/{{ x.portfolioImage }}" class="img-fluid" style="max-width: 100px;"></td>
                                    <td>{{ x.portfolioWebsite }}</td>
                                    <td ng-bind-html="x.portfolioDescription|trustAsHtml">{{ x.portfolioDescription }}</td>
                                    <td>
                                        <div class="dropdown ac-cstm text-right">
                                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                            </a>
                                            <div class="dropdown-menu fadeIn">
                                                <a ng-if="x.portfolioDeleted == 0" class="dropdown-item" title="Edit Portfolio" ng-click="editPortfolio(x.portfolioId)"><i class="fa fa-edit"></i> Edit</a>
                                                <a ng-if="x.portfolioDeleted == 0" class="dropdown-item" title="Delete Portfolio" ng-click="delete_confirm(key,x.portfolioId)"><i class="fa fa-trash"></i>Delete</a>
                                                <a ng-if="x.portfolioDeleted == 1" class="dropdown-item" title="Deleted Portfolio" ><i class="fa fa-trash"></i>Deleted</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr ng-if="portfolio.length == 0">
                                    <td colspan="6">No Record Found.</td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="pagination"></div>
                    </div>
                    <!-- delete confirm modal -->
                    <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Delete</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this ?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" ng-click="delete_portfolio(key,id)" class="btn btn-danger" id="confirm">Delete</button>

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- delete confirm modal -->
                    <!-- edit portfolio -->
                    <!-- Modal -->
                    <div class="modal fade" id="editportfolio" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Portfolio</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title<span class="red-text">*</span></label>
                                                <input type="text" id="title" ng-model="title" name="title" class="form-control">
                                                <p ng-show="submitport && title == ''" class="text-danger">Title is required.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Website url<span class="red-text">*</span></label>
                                                <input type="text" id="website1" onkeyup="angular.element(this).scope().websitecheck(this)" ng-model="website" name="title" class="form-control">
                                                <p ng-show="submitport && website == ''" class="text-danger">Website is required.</p>
                                                <p ng-show="website != '' && websiteerror" class="text-left text-danger">Please enter valid website.</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Description<span class="red-text">*</span></label>
                                        <textarea type="text" id="descriptionedit" ng-model="description" name="descriptionedit" class="form-control ckeditor">{{ editportfolio.portfolioDescription }}</textarea>
                                        <p ng-show="submitport && description == ''" class="text-danger">Description is required.</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Image<span class="red-text">*</span></label>
                                        <input accept="image/*" ng-model="image" onchange="angular.element(this).scope().uploadImage(this)" type="file" class="form-control">
                                        <!-- <p ng-show="submitport && image == ''" class="text-danger">image is required.</p> -->
                                        <img ng-if="image" src="<?php echo base_url(); ?>assets/portfolio/{{ image  }}" height="100" width="100">
                                        <p ng-show="imageerror" class="text-left text-danger">Invalid Image format.</p>

                                    </div>
                                    <div class="form-group">
                                        <label>Skills <span class="red-text">*</span></label>
                                        <input id="portfolioskill" placeholder="Search and select skills" onkeyup="angular.element(this).scope().skills(this)"  type="text" class="form-control pskills">
                                        <p ng-show="submitport && services == ''" class="text-danger">Skills is required.</p>
                                        <ul ng-if="refservices.length != 0" class="text-left" id="chosenresults11" >
                                            <li class="text-left" ng-repeat="(key,x) in refservices" ng-click="addservices(x.name,x.id)" value="{{ x.id }}">{{ x.name }}</li>
                                        </ul>
                                        <ul ng-if="refservices.length == 0 && norecord" class="text-left"  >
                                            <li class="text-left"  >No record found</li>
                                        </ul>
                                    </div>
                                    <div ng-if="services.length != 0" id="tags"><a ng-repeat="(key,x) in services"> {{ x.name }}<span hand ng-click="deleteservice(key)" > &times; </span></a></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" ng-click="portfolioUpdate()" class="btn btn-success">Update</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- edit portfolio -->
                    <!-- content-->

                    <!-- package upgrade modal -->
                    <div class="modal fade" id="packageUpgrade" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                       <div class="modal-dialog">
                          <div class="modal-content">
                             <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Package </h4>
                             </div>
                             <div class="modal-body">

                                <p>Sorry!! you seems to be out of your current package limit, please upgrade your package at <a ng-click="clickUpgrade()"  class="btn btn-success" id="confirm">Membership</a>  page.  </p>
                             </div>
                             <div class="modal-footer">

                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                             </div>
                          </div>
                       </div>
                    </div>
                    <!-- package upgrade modal -->
                </div>
            </div>
        </section>
    </div>
