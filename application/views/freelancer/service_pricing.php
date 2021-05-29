<?php require('sidebar.php'); ?>

<!--main-container-part-->
<div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
            <li class="active">Packages</li>
        </ol>
    </section>
    <section class="content">
        <div class="service-pric">
                <div ng-cloak ng-app="myApp13" ng-controller="myCtrt13">
                    <div class="bg-white">
                        <div class="table-responsive">
                            <table id="pricingTable" class="table">
                                <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Service</th>
                                        <th>Price</th>
                                        <th class="key-point">Key Points</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-if="pricings.length != 0" ng-repeat="(key,x) in pricings" ng-init="pricings = key">
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ x.service }}</td>
                                        <td>{{ x.code }} {{ x.symbol }} {{ x.pricingPrice }}</td>
                                        <td class="lh-1 smal_list_scroll"><span class="small" ng-bind-html="x.pricingKeyPoint|trustAsHtml"> </span></td>
                                        <td class="project-action">
                                            <div class="dropdown ac-cstm text-right">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                   <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                </a>
                                <div class="dropdown-menu fadeIn">

                                    <a ng-if="x.deleted == 0" class="dropdown-item" ng-click="edit(x.pricingId)" ><i class="fa fa-edit"></i> Edit</a>
                                    <a ng-if="x.deleted == 0" class="dropdown-item" ng-click="delete_confirm(key,x.pricingId)"><i class="fa fa-trash"></i>Delete</a>
                                    <a ng-if="x.deleted == 1" class="dropdown-item" ><i class="fa fa-trash"></i>Deleted</a>
                              </div>
                             </div>
                                            </td>
                                        <!-- <td> -->
                                            <!-- <button ng-click="edit(x.pricingId)" class="btn btn-link p-0 pointer btn-sm delme"><i class="fa fa-edit"></i></i></button>
                                            <button ng-click="delete_confirm(key,x.pricingId)" class="btn btn-link p-0 pointer btn-sm delme"><i class="fa fa-trash"></i></button> -->
                                        <!-- </td> -->
                                    </tr>
                                    <tr ng-if="pricings.length == 0">
                                        <td colspan="5">No record found</td>
                                    </tr>
                                    <tr ng-if="pricing.length == 0" class="table-danger" colspan="5">
                                        <p ng-if="pricing.length == 0">Sorry, no pricings has been added yet.</p>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- addd -->
                    <div ng-if="type == 1" class="bg-white mt-4 p-3">
                        <div class="content-header serv-price">
                            <h4>Add Service Pricing</h4>
                        </div>
                        <form class="row" method="post">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="service" class="mb-0">Choose Service <span class="red-text">*</span></label>
                                <select ng-model="ser" name="service" class="custom-select w-100 rounded-0 form-control" id="service">
                                    <option value="">Select Service</option>
                                    <option ng-repeat="(key,x) in services" ng-init="services = key" value="{{ x.id }}">{{ x.name }} </option>
                                </select>
                                <p ng-show="submitpricing && ser == ''" class="text-danger">Service is required.</p>
                            </div>
                            </div>

                            <div class="col-md-3">
                              <label for="price" class="mb-0">Currency <span class="red-text">*</span></label>

                                  <select name="curr_code" ng-model="currencyId" id="currencyId" class="form-control">
                                      <option value="">Select Currency</option>
                                      <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency" value="{{ x.id }}">{{ x.code }} {{ x.symbol }}</option>
                                  </select>
                               <p ng-show="submitpricing && currencyId == ''" class="text-danger">Please select currency.</p>

                            </div>
                            <div class="col-md-3">
                              <label for="price" class="mb-0">Price <span class="red-text">*</span></label>
                              <input placeholder="Please enter price"  type="text" ng-model="price" ng-value="price" name="price" class="numberonly form-control rounded-0 packageprice" id="price">
                              <p ng-show="submitpricing && price == ''" class="text-danger">Price is required.</p>
                            </div>


                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="key_pts" class="mb-0">Key Points <span class="red-text">*</span></label>
                                <textarea ng-cloak data-ck-editor ng-model="key" ng-value="key" class="form-control key" placeholder="Please key point"  name="key" id="key"></textarea>
                                <p ng-show="submitpricing && key == ''" class="text-danger">key points is required.</p>
                            </div>
                            <button ng-click="savepricing()" type="button" class="btn btn-primary rounded-0 pointer">Add Pricing</button>
                            </div>
                        </form>
                    </div>
                    <!-- addd -->

                    <!-- Edit -->
                    <div ng-if="type == 2" class="bg-white mt-4 p-3">
                        <div class="content-header serv-price">
                            <h4>Edit Service Pricing</h4>
                        </div>
                        <form class="row" method="post">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="service" class="mb-0">Choose Service <span class="red-text">*</span></label>
                                <select ng-model="ser1" name="service" class="custom-select w-100 rounded-0 form-control" id="service1">
                                    <option value="">Select Service</option>
                                    <option ng-repeat="(key,x) in services" ng-init="services = key" value="{{ x.id }}">{{ x.name }} </option>
                                </select>
                                <p ng-show="submitpricing && ser1 == ''" class="text-danger">Service is required.</p>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="price" class="mb-0">Price <span class="red-text">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-addon p-0 rounded-0 currencyselectpackage">
                                        <div class="input-group-text">
                                            <select ng-model="currencyId1" name="curr_code" id="currencyId1" class="form-control">
                                                <option value="">Select Currency</option>
                                                <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency" value="{{ x.id }}">{{ x.code }} {{ x.symbol }}</option>
                                            </select>
                                            <p ng-show="submitpricing && currencyId1 == ''" class="text-danger">Please select currency.</p>
                                        </div>
                                    </div>
                         <!-- numbers-only="numbers-only" -->
                                    <input ng-model="price1" ng-value="price1" placeholder="Please enter price"  type="text" name="price" class="numberonly form-control rounded-0 packageprice" id="price5">

                                </div>
                                <p ng-show="submitpricing && price1 == ''" class="text-danger">Price is required.</p>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="key_pts" class="mb-0">Key Points <span class="red-text">*</span></label>
                                <textarea ng-cloak data-ck-editor ng-model="key1" ng-value="key1" class="form-control key1" placeholder="Please key point"  name="key1" id="key1"></textarea>
                                <p ng-show="submitpricing && key1 == ''" class="text-danger">key points is required.</p>
                            </div>
                            <button ng-click="update()" type="button" class="btn btn-primary rounded-0 pointer">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- Edit -->

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
                                  <button type="button" ng-click="delete_pricing(dkey,did)" class="btn btn-danger" id="confirm">Delete</button>

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- delete confirm modal -->
                </div>
            </div>
    </section>
</div>
