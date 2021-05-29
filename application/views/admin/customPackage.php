<?php include('sidebar.php');?>
<!-- Content Wrapper. Contains page content -->
<div id="wrapper" class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
         <li class="active">Custom Package</li>
      </ol>
   </section>
   <!--main-container-part-->
   <section class="content" ng-app="myApp48" ng-controller="myCtrt48">
      <div ng-cloak class="box box-success" >


         <div class="col-md-12">
           <div class="group-chat">
           <div class="">
           <ul class="nav nav-pills">
           <li>
           <a data-toggle="tab" class="active show" href="#company">Company</a>
           </li>
           <li >
          <a data-toggle="tab" href="#client">Client</a>
          </li>
           </ul>

           <div class="tab-content">
             <!-- ********************Company **************************-->
            <div id="company" class="tab-pane fade in active show membership-table">

         <div class="box-body">
           <div class="row">
           <div class="col-md-4">
           <div class="form-group">
             <label>Employee (Min)</label>
             <input type="text" numbers-only="numbers-only" class="form-control" ng-model="employeemin" ng-value="employeemin" placeholder="Please enter minimum employee">
             <p ng-show="submit && employeemin == ''" class="text-danger">this is required.</p>

            </div>
           </div>
           <div class="col-md-4">
           <div class="form-group">
             <label>Employee (Max)</label>
             <input type="text" numbers-only="numbers-only" class="form-control" ng-model="employeemax" ng-value="employeemax" placeholder="Please enter maximum employee">
             <p ng-show="submit && employeemax == ''" class="text-danger">this is required.</p>
             <p ng-show="submit && employeemax != '' && employeeerror" class="text-danger">Please enter valide number.</p>

            </div>
           </div>
           <div class="col-md-4">
           <div class="form-group">
             <label>Price </label>
             <input type="text"  class="form-control numberdecimalonly" ng-model="employeeprice" ng-value="employeeprice" placeholder="Please enter price">
             <p ng-show="submit && employeeprice == ''" class="text-danger">this is required.</p>

            </div>
           </div>
         </div>

         <div class="row">
         <div class="col-md-4">
         <div class="form-group">
           <label>Project (Min)</label>
           <input type="text" numbers-only="numbers-only" class="form-control" ng-model="projectmin" ng-value="projectmin" placeholder="Please enter minimum employee">
           <p ng-show="submit && projectmin == ''" class="text-danger">this is required.</p>

          </div>
         </div>
         <div class="col-md-4">
         <div class="form-group">
           <label>Project (Max)</label>
           <input type="text" numbers-only="numbers-only" class="form-control" ng-model="projectmax" ng-value="projectmax" placeholder="Please enter maximum project">
           <p ng-show="submit && projectmax == ''" class="text-danger">this is required.</p>
           <p ng-show="submit && projectmax != '' && projecterror " class="text-danger">Please enter valide number.</p>

          </div>
         </div>
         <div class="col-md-4">
         <div class="form-group">
           <label>Price </label>
           <input type="text"  class="form-control numberdecimalonly" ng-model="projectprice" ng-value="projectprice" placeholder="Please enter price">
           <p ng-show="submit && projectprice == ''" class="text-danger">this is required.</p>

          </div>
         </div>
       </div>

       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>Expense (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="expensemin" ng-value="expensemin" placeholder="Please enter minimum expense">
         <p ng-show="submit && expensemin == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Expense (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="expensemax" ng-value="expensemax" placeholder="Please enter maximum expense">
         <p ng-show="submit && expensemax == ''" class="text-danger">this is required.</p>
         <p ng-show="submit && expensemax != '' && expenseerror " class="text-danger">Please enter valide number.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text"  class="form-control numberdecimalonly" ng-model="expenseprice" ng-value="expenseprice" placeholder="Please enter price">
         <p ng-show="submit && expenseprice == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       </div>

       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>invoice (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="invoicemin" ng-value="invoicemin" placeholder="Please enter minimum invoice">
         <p ng-show="submit && invoicmin == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>invoice (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="invoicemax" ng-value="invoicemax" placeholder="Please enter maximum invoice">
         <p ng-show="submit && invoicmax == ''" class="text-danger">this is required.</p>
         <p ng-show="submit && invoicmax != '' && invoiceerror " class="text-danger">Please enter valide number.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text"  class="form-control numberdecimalonly" ng-model="invoiceprice" ng-value="invoiceprice" placeholder="Please enter price">
         <p ng-show="submit && invoiceprice == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       </div>

       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>Add package (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="packagemin" ng-value="packagemin" placeholder="Please enter minimum package">
         <p ng-show="submit && packagemin == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Add package (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="packagemax" ng-value="packagemax" placeholder="Please enter maximum package">
         <p ng-show="submit && packagemax == ''" class="text-danger">this is required.</p>
         <p ng-show="submit && packagemax != '' && packageerror " class="text-danger">Please enter valide number.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text"  class="form-control numberdecimalonly" ng-model="packageprice" ng-value="packageprice" placeholder="Please enter price">
         <p ng-show="submit && packageprice == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       </div>
       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>Testimonial (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="testimonialmin" ng-value="testimonialmin" placeholder="Please enter minimum testimonial">
         <p ng-show="submit && testimonialmin == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Testimonial (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="testimonialmax" ng-value="testimonialmax" placeholder="Please enter maximum testimonial">
         <p ng-show="submit && testimonialmax == ''" class="text-danger">this is required.</p>
         <p ng-show="submit && testimonialmax != '' && testimonialerror " class="text-danger">Please enter valide number.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text"  class="form-control numberdecimalonly" ng-model="testimonialprice" ng-value="testimonialprice" placeholder="Please enter price">
         <p ng-show="submit && testimonialprice == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       </div>

       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>Portfolio (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="portfoliomin" ng-value="portfoliomin" placeholder="Please enter minimum portfolio">
         <p ng-show="submit && portfoliomin == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Portfolio (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="portfoliomax" ng-value="portfoliomax" placeholder="Please enter maximum portfolio">
         <p ng-show="submit && portfoliomax == ''" class="text-danger">this is required.</p>
         <p ng-show="submit && portfoliomax != '' && portfolioerror " class="text-danger">Please enter valide number.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text"  class="form-control numberdecimalonly" ng-model="portfolioprice" ng-value="portfolioprice" placeholder="Please enter price">
         <p ng-show="submit && portfolioprice == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       </div>

       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>Case Studies (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="casestudiesmin" ng-value="casestudiesmin" placeholder="Please enter minimum casestudies">
         <p ng-show="submit && casestudiesmin == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Case Studies (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="casestudiesmax" ng-value="casestudiesmax" placeholder="Please enter maximum casestudies">
         <p ng-show="submit && casestudiesmax == ''" class="text-danger">this is required.</p>
         <p ng-show="submit && casestudiesmax != '' && casestudieserror " class="text-danger">Please enter valide number.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text"  class="form-control numberdecimalonly" ng-model="casestudiesprice" ng-value="casestudiesprice" placeholder="Please enter price">
         <p ng-show="submit && casestudiesprice == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       </div>

       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>Services (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="servicesmin" ng-value="servicesmin" placeholder="Please enter minimum services">
         <p ng-show="submit && servicesmin == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Services (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="servicesmax" ng-value="servicesmax" placeholder="Please enter maximum services">
         <p ng-show="submit && servicesmax == ''" class="text-danger">this is required.</p>
         <p ng-show="submit && servicesmax != '' && serviceserror " class="text-danger">Please enter valide number.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text"  class="form-control numberdecimalonly" ng-model="servicesprice" ng-value="servicesprice" placeholder="Please enter price">
         <p ng-show="submit && servicesprice == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       </div>

       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>industry (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="industrymin" ng-value="industrymin" placeholder="Please enter minimum industry">
         <p ng-show="submit && industrymin == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>industry (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="industrymax" ng-value="industrymax" placeholder="Please enter maximum industry">
         <p ng-show="submit && industrymax == ''" class="text-danger">this is required.</p>
         <p ng-show="submit && industrymax != '' && industryerror " class="text-danger">Please enter valide number.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text"  class="form-control numberdecimalonly" ng-model="industryprice" ng-value="industryprice" placeholder="Please enter price">
         <p ng-show="submit && industryprice == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       </div>


       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>Gig (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="gigmin" ng-value="gigmin" placeholder="Please enter minimum gig">
         <p ng-show="submit && gigmin == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Gig (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="gigmax" ng-value="gigmax" placeholder="Please enter maximum gig">
         <p ng-show="submit && gigmax == ''" class="text-danger">this is required.</p>
         <p ng-show="submit && gigmax != '' && gigerror " class="text-danger">Please enter valide number.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text"  class="form-control numberdecimalonly" ng-model="gigprice" ng-value="gigprice" placeholder="Please enter price">
         <p ng-show="submit && gigprice == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       </div>



       <div >
         <input type="button" ng-click="update()"  class="btn btn-success" value="Submit">
       </div >
         </div>

  </div>
  <!-- ************************company *****************-->
      <!-- ********************Client **************************-->
            <div id="client" class="tab-pane fade in  membership-table">

         <div class="box-body">


         <div class="row">
         <div class="col-md-4">
         <div class="form-group">
           <label>Job Post (Min)</label>
           <input type="text" numbers-only="numbers-only" class="form-control" ng-model="cjobpostmin" ng-value="cjobpostmin" placeholder="Please enter minimum job post">
           <p ng-show="csubmit && cjobpostmin == ''" class="text-danger">this is required.</p>

          </div>
         </div>
         <div class="col-md-4">
         <div class="form-group">
           <label>Job Post (Max)</label>
           <input type="text" numbers-only="numbers-only" class="form-control" ng-model="cjobpostmax" ng-value="cjobpostmax" placeholder="Please enter maximum job post">
           <p ng-show="csubmit && cjobpostmax == ''" class="text-danger">this is required.</p>
           <p ng-show="csubmit && cjobpostmax != '' && cjobposterror " class="text-danger">Please enter valide number.</p>

          </div>
         </div>
         <div class="col-md-4">
         <div class="form-group">
           <label>Price </label>
           <input type="text" numbers-only="numbers-only" class="form-control" ng-model="cjobpostprice" ng-value="cjobpostprice" placeholder="Please enter price">
           <p ng-show="csubmit && cjobpostprice == ''" class="text-danger">this is required.</p>

          </div>
         </div>
       </div>

       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>Expense (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="cexpensemin" ng-value="cexpensemin" placeholder="Please enter minimum expense">
         <p ng-show="csubmit && cexpensemin == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Expense (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="cexpensemax" ng-value="cexpensemax" placeholder="Please enter maximum expense">
         <p ng-show="csubmit && cexpensemax == ''" class="text-danger">this is required.</p>
         <p ng-show="csubmit && cexpensemax != '' && cexpenseerror " class="text-danger">Please enter valide number.</p>

        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="cexpenseprice" ng-value="cexpenseprice" placeholder="Please enter price">
         <p ng-show="csubmit && cexpenseprice == ''" class="text-danger">this is required.</p>

        </div>
       </div>
       </div>

       <div class="row">
       <div class="col-md-4">
       <div class="form-group">
         <label>invoice (Min)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="cinvoicemin" ng-value="cinvoicemin" placeholder="Please enter minimum invoice">
         <p ng-show="csubmit && cinvoicemin == ''" class="text-danger">this is required.</p>
        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>invoice (Max)</label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="cinvoicemax" ng-value="cinvoicemax" placeholder="Please enter maximum invoice">
         <p ng-show="csubmit && cinvoicemax == ''" class="text-danger">this is required.</p>
         <p ng-show="csubmit && cinvoicemax != '' && cinvoiceerror " class="text-danger">Please enter valide number.</p>


        </div>
       </div>
       <div class="col-md-4">
       <div class="form-group">
         <label>Price </label>
         <input type="text" numbers-only="numbers-only" class="form-control" ng-model="cinvoiceprice" ng-value="cinvoiceprice" placeholder="Please enter price">
         <p ng-show="csubmit && cinvoiceprice == ''" class="text-danger">this is required.</p>
        </div>
       </div>
     </div>


       <div>
         <input type="button" ng-click="cupdate()"  class="btn btn-success" value="Submit">
       </div >
         </div>

  </div>
  <!-- ************************ Client *****************-->

  </div>

</div>
</div>
</div>

      </div>
   </section>
</div>
