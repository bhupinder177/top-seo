

<?php require('sidebar.php'); ?>
<!--main-container-part-->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li>
            <a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>">
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
         <div ng-cloak class="box box-success" id="membershippage" ng-app="myApp69" ng-controller="myCtrt69">
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
                           <h3 class="p-4 text-center">Membership and Plans</h3>
                           <div class="row">
                              <div class="col-md-6">
                                 <h2>Your Package includes :</h2>
                                 <div class="form-group">
                                    <label><b>Employee : {{ employee - employeeused }}</b></label>
                                    <p>Upgrade at ${{ employeeprice }}.00 each</p>
                                    <input class="custom-range" data-type="1" onchange="angular.element(this).scope().changeemp(this)" type="range" min="{{ employeemin }}" max="{{ employeemax}}"  value="1">
                                 </div>
                                 <div class="form-group">
                                    <label><b>Project : {{ project - projectused }}</b></label>
                                    <p>Upgrade  at ${{ projectprice }}.00 each</p>
                                    <input class="custom-range" data-type="2" onchange="angular.element(this).scope().changepro(this)" type="range" min="{{ projectmin }}" max="{{ projectmax }}"  value="1">
                                 </div>
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
                                    <label><b>Package : {{ package - packageused }}</b></label><br>
                                    <p>Upgrade at  ${{ packageprice }}.00 each </p>
                                    <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changepac(this)" type="range" min="{{ packagemin }}" max="{{packagemax}}"  value="1">
                                 </div>
                                 <div class="form-group">
                                    <label><b>Case Studies : {{ casestudies - casestudiesused }}</b></label><br>
                                    <p>Upgrade at ${{ casestudiesprice }}.00 each </p>
                                    <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changecasestud(this)" type="range" min="{{ casestudiesmin }}" max="{{casestudiesmax}}"  value="1">
                                 </div>
                                 <div class="form-group">
                                    <label><b>Testimonial : {{ testimonial - testimonialused }}</b></label><br>
                                    <p>Upgrade at  ${{ testimonialprice }}.00 </p>
                                    <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changetestimonial(this)" type="range" min="{{ testimonialmin }}" max="{{testimonialmax}}"  value="1">
                                 </div>
                                 <div class="form-group">
                                    <label><b>Portfolio : {{ portfolio - portfolioused }}</b></label><br>
                                    <p>Upgrade at ${{ portfolioprice }}.00 </p>
                                    <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changeportfolio(this)" type="range" min="{{ portfoliomin }}" max="{{portfoliomax}}"  value="1">
                                 </div>
                                 <div class="form-group">
                                    <label><b>Services : {{ services - servicesused }}</b></label><br>
                                    <p>Upgrade at ${{ servicesprice }}.00 </p>
                                    <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changeservices(this)" type="range" min="{{ servicesmin }}" max="{{servicesmax}}"  value="1">
                                 </div>
                                 <div class="form-group">
                                    <label><b>Industries : {{ industry - industryused }}</b></label><br>
                                    <p>Upgrade at ${{ industryprice }}.00 </p>
                                    <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changeindustry(this)" type="range" min="{{ industrymin }}" max="{{industrymax}}"  value="1">
                                 </div>
                                 <div class="form-group">
                                    <label><b>Gigs : {{ gig - gigused }}</b></label><br>
                                    <p>Upgrade at ${{ gigprice }}.00 </p>
                                    <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changegig(this)" type="range" min="{{ gigmin }}" max="{{ gigmax}}"  value="1">
                                 </div>

                                 <input type="hidden" class="selectedemployee" value="">
                                 <input type="hidden" class="selectedproject" value="">
                                 <input type="hidden" class="selectedexpense" value="">
                                 <input type="hidden" class="selectedinvoice" value="">
                                 <input type="hidden" class="selectedamount" value="">
                                 <input type="hidden" class="selectedportfolio" value="">
                                 <input type="hidden" class="selectedpackage" value="">
                                 <input type="hidden" class="selectedtestimonial" value="">
                                 <input type="hidden" class="selectedcasestudies" value="">
                                 <input type="hidden" class="selectedservices" value="">
                                 <input type="hidden" class="selectedindustry" value="">
                                 <input type="hidden" class="selectedgig" value="">
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
                                             <td>Employee :</td>
                                             <td>{{ employeepaid }}</td>
                                             <td class="space"><b>${{ employeetotal }}.00</b></td>
                                          </tr>
                                          <tr class="btm">
                                             <td>Project :</td>
                                             <td>{{ projectpaid }}</td>
                                             <td class="space"><b>${{ projecttotal }}.00 </b></td>
                                          </tr>
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
                                             <td class="pl">Package :</td>
                                             <td>{{ packagepaid }}</td>
                                             <td class="space"><b>${{ packagetotal }}.00</b></td>
                                          </tr>
                                          <tr class="btm">
                                             <td class="pl">Portfolio :</td>
                                             <td>{{ portfoliopaid }}</td>
                                             <td class="space"><b>${{ portfoliototal }}.00</b></td>
                                          </tr>
                                          <tr class="btm">
                                             <td class="pl">Testimonial :</td>
                                             <td>{{ testimonialpaid }}</td>
                                             <td class="space"><b>${{ testimonialtotal }}.00</b></td>
                                          </tr>
                                          <tr class="btm">
                                             <td class="pl">Case studies :</td>
                                             <td>{{ casestudiespaid }}</td>
                                             <td class="space"><b>${{ casestudiestotal }}.00</b></td>
                                          </tr>
                                          <tr class="btm">
                                             <td class="pl">Services:</td>
                                             <td>{{ servicespaid }}</td>
                                             <td class="space"><b>${{ servicestotal }}.00</b></td>
                                          </tr>
                                          <tr class="btm">
                                             <td class="pl">Industries :</td>
                                             <td>{{ industrypaid }}</td>
                                             <td class="space"><b>${{ industrytotal }}.00</b></td>
                                          </tr>
                                          <tr class="btm">
                                             <td class="pl">Gigs :</td>
                                             <td>{{ gigpaid }}</td>
                                             <td class="space"><b>${{ gigtotal }}.00</b></td>
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
                        <!-- preferred location -->
                        <div id="preferred" class="tab-pane fade in preferred-location">
                           <div class="row">
                              <div class="col-md-2">
                                 <div class="form-group">
                                    <select ng-model="perpage | number" onchange="angular.element(this).scope().changePerPage(this)"   class="form-control">
                                       <option value="20">20</option>
                                       <option value="40">40</option>
                                       <option value="60">60</option>
                                       <option value="80">80</option>
                                       <option value="100">100</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <input type="text" id="searchtext" ng-model="searchtext" ng-value="searchtext" ng-keyup="search()" placeholder="Seach" class="form-control">
                                 </div>
                              </div>
                           </div>
                           <div class="table-responsive">
                              <table id="rankingTable" class="table">
                                 <thead>
                                    <tr>
                                       <th>S.NO</th>
                                       <th class="">Country</th>
                                       <th class="">State</th>
                                       <th class="">City</th>
                                       <th class="">Price</th>
                                       <th class="text-center">Buy</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr ng-if="alldata.length != 0" ng-repeat="(key,x) in alldata">
                                       <td>{{ start + key }} </td>
                                       <td class="">
                                          <span ng-if="x.country">{{ x.country }}</span>
                                          <span ng-if="!x.country">All</span>
                                       </td>
                                       <td class="">{{ x.state }}</td>
                                       <td class="">{{ x.city }}</td>
                                       <td class="">$ {{ x.price }}</td>
                                       <td>
                                          <div class="text-center">
                                             <a ng-if="x.buy == 0" title="pay" href="<?php echo base_url(); ?>freelancer/paidranking_payment/{{ x.rankingPriceId }}"  class="btn bg-blue mr-2" ><i class="fa fa-paypal"></i>
                                             <a ng-if="x.buy == 1" title="Selected"   class="btn bg-blue mr-2" ><i class="fa fa-check" aria-hidden="true"></i></a>
                                             </a>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr ng-if="alldata.length == 0">
                                       <td colspan="3" class="text-center">No Record Found.</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="pagination"></div>
                        </div>
                        <!-- preferred location -->
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
