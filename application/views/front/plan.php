

<div class="how-it-work-sec">
   <div class="container">
      <!-- <h1 class="text-center">How it Works</h1> -->
      <!-- <div class="work-circle"> -->
      <div ng-cloak class="forms" ng-app="myApp18" ng-controller="myCtrt18">
         <!--  Form -->
         <div class="login-sec">
            <div class="form-grid">
               <h2 class="clearfix lh-1">
                  <center><span class="float-sm-left">Build up your Package</span></center>
               </h2>
               <div class="row">
               <div class="col-md-6" id="clientlogin">
                  <div ng-if="type == 2" class="form-group">
                     <label><b>Employees : {{ employee }}</b></label><br>
                     <p>{{ employeemin }} are free and rest at ${{ employeeprice }}</p>
                     <input class="custom-range" data-type="1" onchange="angular.element(this).scope().changeemp(this)" type="range" min="{{ employeemin }}" max="{{ employeemax}}"  value="1">
                  </div>
                  <div ng-if="type == 2" class="form-group">
                     <label><b>Projects : {{ project }}</b></label><br>
                     <p>{{ projectmin }} are free and rest at ${{ projectprice }}</p>
                     <input class="custom-range" data-type="2" onchange="angular.element(this).scope().changepro(this)" type="range" min="{{ projectmin }}" max="{{ projectmax }}"  value="1">
                  </div>
                  <div  class="form-group">
                     <label><b>Expenses : {{ expense }}</b></label><br>
                     <p>{{ expensemin }} are free and rest at ${{ expenseprice }}</p>
                     <input class="custom-range" data-type="3" onchange="angular.element(this).scope().changeex(this)" type="range" min="{{ expensemin }}" max="{{expensemax }}"  value="1">
                  </div>
                  <div  class="form-group">
                     <label><b>Invoices : {{ invoice }}</b></label><br>
                     <p>{{ invoicemin }} are free and rest at ${{ invoiceprice }} </p>
                     <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changeinv(this)" type="range" min="{{ invoicemin }}" max="{{invoicemax}}"  value="1">
                  </div>
                  <div ng-if="type == 2" class="form-group">
                     <label><b>Packages : {{ package }}</b></label><br>
                     <p>{{ packagemin }} are free and rest at ${{ packageprice }} </p>
                     <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changepac(this)" type="range" min="{{ packagemin }}" max="{{packagemax}}"  value="1">
                  </div>
                  <div ng-if="type == 2" class="form-group">
                     <label><b>Case Studies : {{ casestudies }}</b></label><br>
                     <p>{{ casestudiesmin }} are free and rest at ${{ casestudiesprice }} </p>
                     <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changecasestud(this)" type="range" min="{{ casestudiesmin }}" max="{{casestudiesmax}}"  value="1">
                  </div>
                  <div ng-if="type == 2" class="form-group">
                     <label><b>Testimonials : {{ testimonial }}</b></label><br>
                     <p>{{ testimonialmin }} are free and rest at ${{ testimonialprice }} </p>
                     <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changetestimonial(this)" type="range" min="{{ testimonialmin }}" max="{{testimonialmax}}"  value="1">
                  </div>
                  <div ng-if="type == 2" class="form-group">
                     <label><b>Portfolios : {{ portfolio }}</b></label><br>
                     <p>{{ portfoliomin }} are free and rest at ${{ portfolioprice }} </p>
                     <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changeportfolio(this)" type="range" min="{{ portfoliomin }}" max="{{portfoliomax}}"  value="1">
                  </div>
                  <div ng-if="type == 2" class="form-group">
                     <label><b>Services : {{ services }}</b></label><br>
                     <p>{{ servicesmin }} are free and rest at ${{ servicesprice }} </p>
                     <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changeservices(this)" type="range" min="{{ servicesmin }}" max="{{servicesmax}}"  value="1">
                  </div>
                  <div ng-if="type == 2" class="form-group">
                     <label><b>Industries : {{ industry }}</b></label><br>
                     <p>{{ industrymin }} are free and rest at ${{ industryprice }} </p>
                     <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changeindustry(this)" type="range" min="{{ industrymin }}" max="{{industrymax}}"  value="1">
                  </div>
                  <div ng-if="type == 2" class="form-group">
                     <label><b>Gigs : {{ gig }}</b></label><br>
                     <p>{{ gigmin }} are free and rest at ${{ gigprice }} </p>
                     <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changegig(this)" type="range" min="{{ gigmin }}" max="{{ gigmax }}"  value="1">
                  </div>
                  <div ng-if="type == 4" class="form-group">
                     <label><b>Job Post : {{ jobpost }}</b></label><br>
                     <p>{{ jobpostmin }} are free and rest at ${{ jobpostprice }} </p>
                     <input class="custom-range" data-type="4" onchange="angular.element(this).scope().changejobpost(this)" type="range" min="{{ jobpostmin }}" max="{{ jobpostmax }}"  value="1">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="text-right">

                     <div class="plancard-wrapper pull-right cstm-plancard">
                        <h4>Cart summary</h4>

                           <table class="table">
                              <tr>
                                 <th>Plan Items</th>
                                 <th class="space">Qty</th>
                                 <th class="price">Price Details </th>
                                 <th class="price">You Save </th>
                              </tr>
                              <tr ng-if="type == 2" class="btm">
                                 <td class="pl">Employees :</td>
                                 <td>{{ employee }}</td>
                                 <td class="space"><b>${{ employeetotal }}.00</b></td>
                                   <td><span>${{ employeemin * employeeprice }}.00</span></td>
                              </tr>
                              <tr ng-if="type == 2" class="btm">
                                 <td class="pl">Projects :</td>
                                 <td>{{ project }}</td>
                                 <td class="space"><b>${{ projecttotal }}.00</b></td>
                                 <td><span> ${{ projectmin * projectprice }}.00</span></td>
                              </tr>
                              <tr class="btm">
                                 <td class="pl">Expenses :</td>
                                 <td>{{ expense }}</td>
                                 <td class="space"><b>${{ expensetotal }}.00</b></td>
                                  <td><span> ${{ expensemin * expenseprice }}.00</span></td>
                              </tr>
                              <tr class="btm">
                                 <td class="pl">Invoices :</td>
                                 <td>{{ invoice }}</td>
                                 <td class="space"><b>${{ invoicetotal }}.00</b></td>
                                    <td> <span> ${{ invoicemin * invoiceprice }}.00</span></td>
                              </tr>
                              <tr ng-if="type == 2" class="btm">
                                 <td class="pl">Packages :</td>
                                 <td>{{ package }}</td>
                                 <td class="space"><b>${{ packagetotal }}.00</b></td>
                                 <td><span> ${{ packagemin * packageprice }}.00</span></td>
                              </tr>
                              <tr ng-if="type == 2" class="btm">
                                 <td class="pl">Case studies :</td>
                                 <td>{{ casestudies }}</td>
                                 <td class="space"><b>${{ casestudiestotal }}.00</b></td>
                                    <td> <span> ${{ casestudiesmin * casestudiesprice }}.00</span></td>
                              </tr>
                              <tr ng-if="type == 2" class="btm">
                                 <td class="pl">Testimonials :</td>
                                 <td>{{ testimonial }}</td>
                                 <td class="space"><b>${{ testimonialtotal }}.00</b></td>
                                    <td> <span> ${{ testimonialmin * testimonialprice }}.00</span></td>
                              </tr>
                              <tr ng-if="type == 2" class="btm">
                                 <td class="pl">Portfolios :</td>
                                 <td>{{ portfolio }}</td>
                                 <td class="space"><b>${{ portfoliototal }}.00</b></td>
                                     <td><span> ${{ portfoliomin * portfolioprice }}.00</span></td>
                              </tr>


                              <tr ng-if="type == 2" class="btm">
                                 <td class="pl">Services :</td>
                                 <td>{{ services }}</td>
                                 <td class="space"><b>${{ servicestotal }}.00</b></td>
                                     <td><span> ${{ servicesmin * servicesprice }}.00</span></td>
                              </tr>
                              <tr ng-if="type == 2" class="btm">
                                 <td class="pl">Industries :</td>
                                 <td>{{ industry }}</td>
                                 <td class="space"><b>${{ industrytotal }}.00</b></td>
                                    <td> <span> ${{ industrymin * industryprice }}.00</span></td>
                              </tr>
                              <tr ng-if="type == 2" class="btm">
                                 <td class="pl">Gigs :</td>
                                 <td>{{ gig }}</td>
                                 <td class="space"><b>${{ gigtotal }}.00</b></td>
                                    <td> <span> ${{ gigmin * gigprice }}.00</span></td>
                              </tr>
                              <tr ng-if="type == 4" class="btm">
                                 <td class="pl">Job Post :</td>
                                 <td>{{ jobpost }}</td>
                                 <td class="space"><b>${{ jobposttotal }}.00</b></td>
                                    <td> <span>${{ jobpostmin * jobpostprice }}.00</span></td>
                              </tr>
                              <tr class="foot-tr">
                                 <td style="text-align:right"><b>Cart Total :</b></td>
                                 <td style="text-align:right;">You Pay </td>
                                 <td class="space invoece"><b>${{ total }}.00</b>  </td>
                                    <td> <span> ${{ employeemin * employeeprice +  projectmin * projectprice + expensemin * expenseprice + invoicemin * invoiceprice + packagemin * packageprice + testimonialmin * testimonialprice + portfoliomin * portfolioprice + servicesmin * servicesprice + industrymin * industryprice + gigmin * gigprice + jobpostmin * jobpostprice  }}.00</span></td>
                              </tr>
                           </table>

                     </div>
                     <!--dfkhdfdfkljljslfjfjk....-->
                     <input type="hidden" class="selectedemployee" value="">
                     <input type="hidden" class="selectedproject" value="">
                     <input type="hidden" class="selectedexpense" value="">
                     <input type="hidden" class="selectedinvoice" value="">
                     <input type="hidden" class="selectedportfolio" value="">
                     <input type="hidden" class="selectedpackage" value="">
                     <input type="hidden" class="selectedtestimonial" value="">
                     <input type="hidden" class="selectedcasestudies" value="">
                     <input type="hidden" class="selectedservices" value="">
                     <input type="hidden" class="selectedindustry" value="">
                     <input type="hidden" class="selectedgig" value="">
                     <input type="hidden" class="selectedjobpost" value="">
                     <input type="hidden" class="selectedamount" value="">
                     <input type="hidden" class="selecteduser" value="<?php if(!empty($userId)){ echo $userId; } ?>">
                  </div>
                   <div class="form-group">
                  <button type="button" ng-click="confirm()" name="login" value="true" class="Proceed_btn mt-4 btn btn-theme mw-100 btn-block pointer rounded-0 btn-success">Proceed</button>
                  </div>
               </div>
             </div>
            </div>
         </div>
         <!-- confirm -->
         <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     <h4 class="modal-title">Confirmation</h4>
                  </div>
                  <div ng-if="total == 0" class="modal-body">
                     <p>It seems you are opting basic free plan . It's not bad to give a push to your business  by this. You can customize your plan anytime by navigating to your membership page once you get access to your company account.</p>
                     <p class="clr">Just check your email after submitting the request</p>
                     <p class="clr">Good luck!!</p>
                  </div>
                  <div ng-if="total != 0" class="modal-body">
                     <p class="done-plan cnt">Well Done !!</p>
                     <p class="done-plan">It will be exciting to use our application with the custom plan you have selected. Please proceed further to emphasize  your company business</p>
                     <div class="form-group">
                        <center>
                           <button type="button"  class="buy_now btn btn-success" id="confirm">Submit</button>
                           <button  type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </center>
                     </div>
                     <p class="on-sub">On submitting you will navigate to payment page. At any point of time if you change your mind for payment, still your company will be registered with us for Basic free plan and you will receive an email to access that. Membership can be customized right away from the portal at Membership Page.</p>
                     <p><b><span>If you want to register your company with Basic Free Plan then click below</span></b></p>
                     <div class="text-left">
                        <button type="button" ng-click="freeplanclick()" class="btn btn-success" id="confirm">Change to Basic Plan</button>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button ng-if="total == 0" type="button" ng-click="freeplanclick()" class="btn btn-success" id="confirm">Submit</button>
                     <button ng-if="total == 0" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
               </div>
            </div>
         </div>
         <!-- confirm -->
      </div>
      <!-- Form -->
   </div>
   <!-- </div> -->
</div>
