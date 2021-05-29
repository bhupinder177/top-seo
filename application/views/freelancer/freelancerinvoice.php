<?php include('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
      <li class="active">Invoice</li>
    </ol>
  </section>
  <section class="content portfolio-cont invoice">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak ng-app="myApp46" ng-controller="myCtrt46">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="bg-white rounded c-pass-sec">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-md-12 col-lg-8">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <select ng-model="sclient" type="text" class="form-control" >
                                <option  value="">Select Client</option>
                                <option ng-repeat="(key,x2) in suggestionClient" value="{{ x2.name }}">{{ x2.name }}</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input readonly ng-model="startdate" type="text" class="form-control invoicestartdate" placeholder="Start Date">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <input readonly ng-model="enddate" type="text" class="form-control invoiceenddate" placeholder="End Date">
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group sea-cstm">
                              <input ng-click="searchdate()" type="button" value="Search" class="btn btn-info">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12 col-lg-4">
                      </div>
                      <div class="col-md-1">
                        <div class="form-group">
                          <select ng-model="perpage" convert-to-number onchange="angular.element(this).scope().changePerPage(this)" class="form-control">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                        </div>
                      </div>

                      <!-- advanced search -->
                      <div  class="col-md-2">
                        <div class="form-group sea-cstm">
                          <a class="advancesearch"  ng-click="clickadvanceSearch()"   >Advance Search</a>
                        </div>
                      </div>
                      <div ng-if="advanceSearchshow == 1" class="col-md-2">
                        <select onchange="angular.element(this).scope().changeyear(this)" ng-model="year" type="text" class="year form-control" >
                          <option value="">Select Year</option>
                          <option ng-repeat="(key,x) in years" value="{{ x }}">{{ x }}</option>
                        </select>
                      </div>
                      <div ng-if="advanceSearchshow == 1 && showmonthselect == 1" class="col-md-2">
                        <select ng-if="currentyear == year" ng-model="month" type="text" class="month form-control" >
                          <option value="">Select Month</option>
                          <option ng-repeat="(key,x) in monthNames" ng-if="currentyear == year && key + 1 <= currentmonth"  value="{{ key + 1 }}">{{ x }}</option>
                        </select>
                        <select ng-if="currentyear != year" ng-model="month" type="text" class="month form-control" >
                          <option value="">Select Month</option>
                          <option ng-repeat="(key,x) in monthNames"   value="{{ key + 1 }}">{{ x }}</option>
                        </select>
                      </div>
                      <div ng-if="advanceSearchshow == 1" class="col-md-2">
                        <div class="form-group sea-cstm">
                          <input  ng-click="getMonthinvoice()" type="button" value="Search" class="btn btn-success w-100" >
                        </div>
                      </div>
                      <!-- advanced search -->

                      <div class="col-md-3">
                        <a ng-click="addinvoice()" class="btn btn-success pull-right">Create An Invoice</a>
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div ng-if="show == 0" class="table-responsive">
                      <table  class="table">
                        <thead>
                          <tr>
                            <th style="min-width:100px;">Date</th>
                            <th>invoice#</th>
                            <th>Recipient</th>
                            <th>Status</th>
                            <th>Payment Mode</th>
                            <th>Received Amount<br><span ng-if="getuserlocalcurrency.code">({{ getuserlocalcurrency.code }} {{ getuserlocalcurrency.symbol  }})</span></th>

                            <!--                                                    <th>Download</th>-->
                            <th style="min-width: 90px;">Amount</th>
                            <th style="min-width: 90px;">Payable Amount</th>
                            <th class="text-right">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-if="show == 0" ng-if="allinvoice.length != 0" ng-repeat="(key,x) in allinvoice">
                            <td>{{ x.date | date  }}</td>
                            <td>{{ x.reference }}{{ x.invoiceNo }}</td>
                            <td>
                              <span ng-if="x.rname">{{ x.rname }}</span>
                              <span ng-if="!x.rname">{{ x.name }}</span>
                            </td>


                            <td>
                              <span class="btn" style="background: #3a3adf;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x.status == 1">Paid</span>
                              <span class="btn bg-yellow" ng-if="x.status == 0">Pending</span>
                              <span class="btn" style="background: #ff0000;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x.status == 2">Rejected</span>
                            </td>
                            <td>
                              <select onchange="angular.element(this).scope().changereceived(this)" ng-model="x.paymentReceived" name="paymentmode">
                                <option value="">Select Payment Mode</option>
                                <option data-id="{{ x.invoiceId }}" value="1">Bank</option>
                                <option data-id="{{ x.invoiceId }}" value="2">Cash</option>
                                <option data-id="{{ x.invoiceId }}" value="3">Paypal</option>
                              </select>
                              <!-- <span ng-if="x.paymentReceived ==1">Bank</span>
                              <span ng-if="x.paymentReceived ==2">Cash</span>
                              <span ng-if="x.paymentReceived ==3">Paypal</span> -->
                            </td>
                            <td><input ng-disabled="x.disabled" ng-keyup="receivedkeyup($event.target.value,x.invoiceId)" ng-value="x.receivedAmount" ng-model="x.receivedAmount" type="text" class="form-control" ></td>
                            <!--                                                    <td><a target="_blank" href="<?php echo base_url(); ?>freelancerinvoicedownload/{{ x.invoiceId }}">Download(pdf)</a></td>-->
                            <td>{{ x.code }} {{ x.symbol }} {{ x.amount | number }}</td>
                            <td>{{ x.code }} {{ x.symbol }} {{ x.payable | number }}</td>
                            <!--
                            <td>
                            <span title="Edit invoice"><a href="<?php echo base_url(); ?>freelancer/invoice/edit/{{ x.invoiceId }}" class="btn btn-sm"><i class="fa fa-edit"></i></a></span>
                          </td>
                        -->
                        <td>
                          <div class="dropdown ac-cstm text-right">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                              <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                            </a>
                            <div class="dropdown-menu fadeIn">
                              <a class="dropdown-item" title="Clone invoice" href="<?php echo base_url(); ?>freelancer/invoice/clone/{{ x.invoiceId }}"   ><i class="fa fa-clone" aria-hidden="true"></i>Clone</a>
                              <a class="dropdown-item" title="Edit invoice" href="<?php echo base_url(); ?>freelancer/invoice/edit/{{ x.invoiceId }}"   ng-click="edittodo(x.id)"><i class="fa fa-edit"></i> Edit</a>
                              <a target="_blank" class="dropdown-item"  href="<?php echo base_url(); ?>freelancerinvoicedownload/{{ x.invoiceId }}"><i class="fa fa-download" aria-hidden="true"></i>Download(pdf)</a>
                              <a target="_blank" class="dropdown-item" ng-click="sendmail(x.invoiceId)" ><i class="fa fa-envelope" aria-hidden="true"></i>Send Email</a>
                            </div>
                          </div>
                        </td>
                      </tr>

                      <!-- search -->

                      <!-- search -->
                      <tr ng-if="allinvoice.length == 0 && show == 0">
                        <td colspan="6" class="text-center">No Record Found.</td>
                      </tr>
                    </tbody>
                  </table>
                  <div ng-if="alltotalamount  > 0">
                    <h4 ng-if="alltotalamount > 0"  class="p-3 text-right w-100">Total Received Amount: {{ getuserlocalcurrency.code }} {{ getuserlocalcurrency.symbol  }} {{ alltotalamount | number }}.00  </h4>
                  </div>
                </div>
                <div ng-if="show == 0" id="pagination"></div>


                <!-- month wise -->
                <div ng-if="moonthwiseshow == 1" >

                  <div ng-cloak class="box-body action-cstm bg-white mt-3">
                    <h4>{{ monthNameshow }}, {{ yearNameshow }}</h4>
                    <div class="table-responsive">
                      <table ng-if="currentEx.length != 0 "  id="rankingTable" class="table">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>invoice#</th>
                            <th>Recipient</th>
                            <th>Status</th>
                            <th>Payment Mode</th>
                            <th>Received Amount<br><span ng-if="getuserlocalcurrency.code">({{ getuserlocalcurrency.code }} {{ getuserlocalcurrency.symbol  }})</span></th>
                            <th>Amount</th>
                            <th>Payable Amount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-if="monthEx.length != 0 " ng-repeat="(key,x2) in monthEx" >
                            <td>{{ x2.date | date  }}</td>
                            <td>{{ x2.reference }}{{ x2.invoiceNo }}</td>
                            <td>{{ x2.name }}</td>
                            <td>
                              <span class="btn" style="background: #3a3adf;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 1">Paid</span>
                              <span class="btn bg-yellow" ng-if="x2.status == 0">Pending</span>
                              <span class="btn" style="background: #ff0000;color:#fff;padding: 5px; border-radius: 4px;" ng-if="x2.status == 2">Rejected</span>
                            </td>
                            <td>
                              <select onchange="angular.element(this).scope().changereceived(this)" ng-model="x2.paymentReceived" name="paymentmode">
                                <option value="">Select Payment Mode</option>
                                <option data-id="{{ x2.invoiceId }}" value="1">Bank</option>
                                <option data-id="{{ x2.invoiceId }}" value="2">Cash</option>
                                <option data-id="{{ x2.invoiceId }}" value="3">Paypal</option>
                              </select>
                            </td>


                            <td><input ng-disabled="x2.disabled" ng-keyup="receivedkeyup($event.target.value,x2.invoiceId)" ng-value="x2.receivedAmount" ng-model="x2.receivedAmount" type="text" class="form-control" ></td>

                            <td>{{ x2.code }} {{ x2.symbol }} {{ x2.amount | number }}</td>
                            <td>{{ x2.code }} {{ x2.symbol }} {{ x2.payable | number }}</td>
                            <td>
                              <div class="dropdown ac-cstm text-right">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                  <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                                </a>
                                <div class="dropdown-menu fadeIn">
                                  <a class="dropdown-item" title="Clone invoice" href="<?php echo base_url(); ?>freelancer/invoice/clone/{{ x2.invoiceId }}"   ><i class="fa fa-clone" aria-hidden="true"></i>Clone</a>
                                  <a class="dropdown-item" title="Edit invoice" href="<?php echo base_url(); ?>freelancer/invoice/edit/{{ x2.invoiceId }}"   ng-click="edittodo(x2.id)"><i class="fa fa-edit"></i> Edit</a>
                                  <a target="_blank" class="dropdown-item"  href="<?php echo base_url(); ?>freelancerinvoicedownload/{{ x2.invoiceId }}"><i class="fa fa-download" aria-hidden="true"></i>Download(pdf)</a>
                                  <a target="_blank" class="dropdown-item" ng-click="sendmail(x2.invoiceId)" ><i class="fa fa-envelope" aria-hidden="true"></i>Send Email</a>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <tr ng-if="monthEx.length == 0"><td>No Record Found</td></tr>
                        </tbody>

                      </table>
                      <div ng-if="monthtotal > 0">
                        <h4 ng-if="monthtotal > 0"  class="p-3 text-right w-100">Total Received Amount:   {{ getuserlocalcurrency.code }} {{ getuserlocalcurrency.symbol  }} {{ monthtotal | number }}.00  </h4>
                      </div>
                    </div>
                    <div  id="apagination"></div>
                  </div>
                </div>
                <!-- month wise -->



                <!-- delete confirm modal -->
                <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Delete</h4>
                      </div>
                      <div class="modal-body">
                        <p>Are you sure you want to delete this record ?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>

                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- delete confirm modal -->

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
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

</section>
</div>
