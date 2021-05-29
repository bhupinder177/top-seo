

<?php require('sidebar.php'); ?>
<!--main-container-part-->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url(); ?>freelancer/dashboard">
            <i class="fa fa-dashboard"></i> Home
            </a> >
         </li>
         <li class="active">Membership</li>
      </ol>
   </section>
   <section class="content portfolio-cont bg-white">
      <!-- get sidebar -->
      <div id="content">
         <!-- content -->
         <div ng-cloak class="box box-success" id="membershippage" ng-app="myApp20" ng-controller="myCtrt20">
            <div class="box-body">
               <div class="group-chat">
                  <div class="">
                     <!-- <ul class="nav nav-pills">
                        <li >
                           <a data-toggle="tab" class="active show" href="#membership">Custom plan</a>
                        </li>
                        <li >
                           <a data-toggle="tab" href="#preferred">Preferred Location</a>
                        </li>
                     </ul> -->
                     <div class="tab-content px-2">
                        <div id="membership" class="tab-pane fade in active show membership-table sc-tab">
                           <h3 class="p-2 text-center">Membership and Plans</h3>
                           <div class="row">
                              <div class="col-md-6">
                                 <h2>Your Package includes :</h2>


                                 <div class="form-group">
                                    <label><b>Expense : {{ expense - expenseused }}</b></label>
                                    <p>Upgrade at ${{ expenseprice }}.00 each</p>
                                    <input class="custom-range" data-type="3" onchange="angular.element(this).scope().changeex(this)" type="range" min="{{ expensemin }}" max="{{expensemax }}"  value="1">
                                 </div>
                                 <div class="form-group">
                                    <label><b>Invoice : {{ invoice - invoiceused }}</b></label>
                                    <p>Upgrade at ${{ invoiceprice }}.00 each</p>
                                    <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changeinv(this)" type="range" min="{{ invoicemin }}" max="{{invoicemax}}"  value="1">
                                 </div>

                                 <div class="form-group">
                                    <label><b>Job Post : {{ jobpost - jobpostused }}</b></label><br>
                                    <p>Upgrade at  ${{ jobpostprice }}.00 </p>
                                    <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changejobpost(this)" type="range" min="{{ jobpostmin }}" max="{{jobpostmax}}"  value="1">
                                 </div>




                                 <input type="hidden" class="selectedexpense" value="">
                                 <input type="hidden" class="selectedinvoice" value="">
                                 <input type="hidden" class="selectedjobpost" value="">
                                 <input type="hidden" class="selectedamount" value="">

                                 <input type="hidden" class="selecteduser" value="<?php echo $this->session->userdata['clientloggedin']['id']; ?>">
                              </div>
                              <div class="col-md-6">
                                 <div class="plancard-wrapper">
                                    <center><h2>Cart summary</h2></center>
                                    <table class="table table-hover">
                                       <thead>
                                          <tr>
                                             <th></th>
                                             <th class="space">Qty</th>
                                             <th class="price">Price Detail</th>

                                          </tr>
                                       </thead>
                                       <tbody>

                                          <tr class="btm">
                                             <td>Expense :</td>
                                             <td>{{ expensepaid }}</td>
                                             <td class="space"><b>${{ expensetotal }}.00</b></td>
                                          </tr>
                                          <tr>
                                             <td>Invoice :</td>
                                             <td>{{ invoicepaid }}</td>
                                             <td class="space"><b>${{ invoicetotal }}.00</b></td>
                                          </tr>
                                          <tr class="btm">
                                             <td class="pl">Job Post:</td>
                                             <td>{{ jobpostpaid }}</td>
                                             <td class="space"><b>${{ jobposttotal }}.00</b></td>
                                          </tr>

                                          <tr class="table-foot">
											  <td colspan="2" class="text-right"><b>Cart Total :</b> You Pay</td>
                                             <td class="space"><b>${{ totalamount }}.00</b></td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <div ng-if="totalamount != 0" class="form-group text-center mt-3">
                                       <input type="button" ng-click="confirm()" value="Upgrade" class="btn btn-success">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- membership-->

                     </div>
                     <!-- content tab -->
                     <!-- confirm -->
                     <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                 <h4 class="modal-title">Confirmation</h4>
                              </div>
                              <div ng-if="totalamount != 0" class="modal-body">
                                 <p>Well Done !!</p>
                                 <p>You are going to upgrade your Plan in just one click. Emphasize your business by upgrading your plan to get access to more features.</p>
                              </div>
                              <div class="modal-footer">
                                 <button type="button"  class="buy_now btn btn-success" id="confirm">Submit</button>
                                 <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- confirm -->
                     <!-- confirm -->
                     <div class="modal fade" id="planUpgraded" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                 <h4 class="modal-title">Confirmation</h4>
                              </div>
                              <div ng-if="totalamount != 0" class="modal-body">
                                 <p>There you go!!</p>
                                 <p>You upgraded your plan. You will get confirmation email soon. Your upgraded plan will be reflected in your Membership page.</p>
                              </div>
                              <div class="modal-footer">
                                 <button  type="button" class="btn btn-default" ng-click="click()">OK</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- confirm -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
