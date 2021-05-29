<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/invoicecss/style.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/invoicecss/print.css' media="print" />


<?php include('sidebar.php');?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> > </li>
        <li class="active">Create An Invoice</li>
      </ol>
    </section>


<section class="content portfolio-cont">
        <div ng-cloak  ng-app="myApp46" ng-controller="myCtrt46">
          <div id="content">


                 <!-- main invoice page -->
                 <div id="page-wrap" class="bg-white">

  <p>INVOICE</p>

  <div id="identity">
        <div class="row">
      <div class="col-md-3">
          <input  class="form-control mb-3" id="reference"  ng-model="reference" ng-value="reference" placeholder="Please enter invoice no">
          <p ng-cloak ng-show="submitl && reference == ''" class="text-danger">Please enter reference.</p>
        </div>
       <div class="col-md-3">
          <input  class="form-control mb-3" id="reference"  ng-model="invoiceno" ng-value="invoiceno" >

        </div>
      </div>

   <!-- recurring -->
   <div class="row chck_box_rw">
     <div class="col-md-2">
      <p>Recurring <input ng-model="showrecurring" value="1" type="checkbox" ></p>
     </div>
     <div ng-if="showrecurring == 1" class="col-md-2">
       <div class="form-group">
       <select onchange="angular.element(this).scope().changerecurringtype(this)" ng-model="recurringevery" class="form-control">
        <option value="">Once Only</option>
        <option value="1">Every Week</option>
        <option value="2">Every Month</option>
        <option value="3">Custom</option>
       </select>
     </div>
     </div>

     <div ng-if="recurringevery == 3 && showrecurring == 1" class="col-md-2">
       <div class="form-group">
         <select  ng-model="recurringType" class="recurringtype form-control rounded-0">
           <option value="">Select Recurring Type</option>
           <option value="1">Daily</option>
           <option value="2">Weekly</option>
           <option value="3">Monthly</option>
         </select>
       </div>
     </div>

     <div ng-if="recurringevery == 3 && showrecurring == 1" class="col-md-2">
       <div class="form-group">
         <input class="form-control rounded-0 duration" min="1" ng-model="duration" ng-value="duration" type="number" placeholder="Please enter duration">
           <p ng-cloak ng-show="submitl &&  recurringType != '' && duration == ''" class="text-danger">Please enter duration.</p>
       </div>
     </div>
     <div ng-if="showrecurring == 1 &&  showrecurring == 1" class="col-md-2">
      <p>Ending <input value="1" ng-click="endclick($event)" ng-model="end" type="checkbox" ></p>
     </div>
     <div ng-if="end == 1 && showrecurring == 1" class="col-md-1">
       <p>Never <input type="radio" name="never" ng-click="clickendNever(1)" class="endNever"  ng-model="endNever" ng-value="endNever" value="1" ></p>
     </div>
     <div ng-if="end == 1 &&  showrecurring == 1" class="col-md-1">
       <p>After <input type="radio" class="endAfter" ng-click="clickendNever(2)" name="never" ng-model="endAfter" ng-value="endAfter" value="1" ></p>
     </div>
     <div ng-if="end == 1 &&  showrecurring == 1" class="col-md-3">
       <div class="form-group Occurrence_Frm">
       <input type="text" ng-model="Afterduration" ng-value="Afterduration" class="form-control afterduration" ng-model="never" value="" placeholder="Occurrence(s)" >
       </div>
     </div>
   </div>
   <!-- recurring -->


      <div class="row">
      <div class="col-md-4">
      <div class="form-group">
      <select id="address" onchange="angular.element(this).scope().getcontract(this)" id="client" class="form-control" name="recipient" ng-model="recipient" >
        <option value="">Please select recipient</option>
        <option data-key="{{ key }}" ng-repeat="(key,x) in allclient" value="{{ x.u_id }}">{{ x.name }} </option>
      </select>
          </div>
          </div>

          <div class="col-md-4">
              <div class="form-group">
      <select id="address" onchange="angular.element(this).scope().currency11(this)"   class="form-control" name="currency" ng-model="currency"  >
        <option value="">Please select currency</option>
        <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency" data-id="{{ key }}"  value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
      </select>
      <p ng-cloak ng-show="submitl && currency == ''" class="text-danger">Please select  currency .</p>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
      <select id="address" onchange="angular.element(this).scope().changeDiscount(this)" id="client" class="form-control" name="discounttype" ng-model="discounttype"  >
        <option value="">Select Discount Type</option>
        <option  value="1">Flat</option>
        <option  value="2">Percentage</option>
      </select>
              </div>
          </div>
          </div>
      <div class="row">
          <div class="col-sm-4"  ng-if="discounttype !=''">
              <div class="form-group">
<input numbers-only="numbers-only" class="discount form-control" id="address" ng-keyup="counttotalhour()"  ng-model="discount" ng-value="discount" placeholder="Please enter discount">
      </div>
      </div>
          <div class="col-sm-4">
              <div class="form-group">
<input class="form-control" id="address" numbers-only="numbers-only" ng-keyup="counttotalhour()" ng-model="tax" ng-value="tax" placeholder="Please enter tax (%)">
              </div>
              </div>
          <div class="col-sm-4">
              <div class="form-group">
<input class="form-control" id="address" ng-model="name" ng-value="name" placeholder="Please enter name">
<p ng-cloak ng-show="submitl && name == ''" class="text-danger">Please enter name.</p>

              </div>
              </div>
          <div class="col-sm-4">
              <div class="form-group">
<input class="form-control" id="address" ng-model="address" ng-value="address" placeholder="Please enter address">
<p ng-cloak ng-show="submitl && address == ''" class="text-danger">Please enter address.</p>
          </div>
      </div>
          <div class="col-sm-4">
              <div class="form-group">
<input class="form-control" id="phone" ng-model="phone" ng-value="phone" placeholder="Please enter phone no">
<p ng-cloak ng-show="submitl && phone == ''" class="text-danger">Please enter phone number.</p>
<p ng-cloak ng-show="phone != '' && phone.length < 10 || phone.length > 11" class="text-danger">Please enter valid number.</p>

<!-- <p ng-cloak ng-show="submitl && phone != '' && phone.length != 10" class="text-danger">Please enter valid phone number.</p> -->
<!-- <span id="valid-msg" class="hide">✓ Valid</span>
<span id="error-msg" class="hide"></span> -->
              </div>
          </div>
          <div class="col-sm-4">
              <div class="form-group">
                  <input class="form-control" id="email" onkeyup="angular.element(this).scope().ctrl(this)"  ng-model="email" ng-value="email" placeholder="Please enter email"></div>
                  <p ng-cloak ng-show="submitl && email == ''" class="text-danger">Please enter email address.</p>
                  <p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>


          </div>

          <div ng-if="allcontract.length != 0" class="col-md-4">
              <div class="form-group">
       <select id="address" onchange="angular.element(this).scope().getmilestone(this)" class="form-control rounded-0 contract" ng-model="contract" id="contract">
      <option value="">Select contract</option>
      <option ng-repeat="(key,x) in allcontract" data-key="{{ key }}" data-id="contract" value="{{ x.contractId	 }}">{{ x.jobTitle }}</option>
      </select>

          </div>
          </div>

          <div ng-if="ownercontract.length != 0" class="col-md-4">
              <div class="form-group">
       <select id="address" onchange="angular.element(this).scope().getmilestone(this)" class="form-control rounded-0 contract" ng-model="contract" id="contract">
      <option value="">Select contract</option>
      <option ng-repeat="(key,x) in ownercontract" data-key="{{ key }}" data-id="own" value="{{ x.projectId	 }}">{{ x.projectName }}</option>
      </select>

          </div>
          </div>

           <div ng-if="gigcontract.length != 0" class="col-md-4">
              <div class="form-group">
       <select id="address" onchange="angular.element(this).scope().getgigtask(this)" class="form-control rounded-0 contract" ng-model="contract" id="contract">
      <option value="">Select gig</option>
      <option ng-repeat="(key,x) in gigcontract" data-key="{{ key }}"  data-id="gig" value="{{ x.gigId }}">{{ x.title }}</option>
      </select>

          </div>
          </div>

          <div ng-if="contactmilestone.length != 0" class="col-md-4">
              <div class="form-group">
       <select id="address" onchange="angular.element(this).scope().gettask(this)" class="form-control rounded-0 milestone" ng-model="contract" id="contract">
      <option value="">Select Milestone</option>
      <option ng-repeat="(key,x) in contactmilestone" data-id="contract" value="{{ x.id	 }}">{{ x.name }}</option>
      </select>

          </div>
          </div>
          <div ng-if="ownmilestone.length != 0" class="col-md-4">
              <div class="form-group">
       <select id="address" onchange="angular.element(this).scope().gettask(this)"  class="form-control rounded-0 milestone" ng-model="contract" id="contract">
      <option value="">Select Milestone</option>
      <option ng-repeat="(key,x) in ownmilestone" data-id="own" value="{{ x.id	 }}">{{ x.name }}</option>
      </select>

          </div>
          </div>

      </div>



  <div style="clear:both"></div>

  <div id="customer">
          <table id="meta">
              <tr>
                  <td class="meta-head">Amount Due</td>
                  <td><div class="due">{{ payable }}</div></td>
              </tr>

          </table>

  </div>
  <div class="invoice-table-sec">
<div class="table-responsive">
  <table id="items" class="table">
    <thead>
      <tr>
        <th>Task</th>
        <th>Hourly</th>
        <th>Hours</th>
        <th>Price</th>
    </tr>
      </thead>
      <tbody>
    <tr class="item-row" ng-repeat="(key2,x2) in task">
        <td class="item-name item_nm_cus">
          <div class="delete-wpr form-group">
                <input class="form-control" ng-model="x2.task" ng-value="x2.task">
                  <p ng-cloak ng-show="submitl && x2.task == ''" class="text-danger">Please enter task.</p>
            <a class="delete" ng-if="task.length != 1" ng-click="deletetask(key2)" title="Remove row">X</a></div>
        </td>
        <td class="form-group">
            <input class="form-control" numbers-only="numbers-only" ng-keyup="counttotalhour()" ng-model="x2.hourly" ng-value="x2.hourly" class="cost" value="">
            <p ng-cloak ng-show="submitl && x2.hourly == ''" class="text-danger">Please enter hourly price.</p>

        </td>
        <td class="form-group">
            <input class="form-control" numbers-only="numbers-only" ng-keyup="counttotalhour()" ng-model="x2.hours" ng-value="x2.hours" class="qty" value="">
            <p ng-cloak ng-show="submitl && x2.hours == ''" class="text-danger">Please enter hours.</p>

        </td>
        <td><span class="price">{{ x2.amount }}</span></td>
    </tr>
   <tr id="hiderow">
      <td colspan="5"><a id="addrow" ng-click="taskadd(key)" title="Add a row">Add a row</a></td>
    </tr>
     <tr>
      <td colspan="2" class="blank"> </td>
        <td  class="total-line">SubTotal</td>
        <td class="total-value"><div id="subtotal">{{ selectedcurrency }} {{ totalamount }}</div></td>
    </tr>
    <tr>
        <td colspan="2" class="blank"> </td>
        <td  class="total-line">Discount <span ng-if="discount != 0 && discounttype == 1">({{ discount }} Flat )</span><span ng-if="discount != 0 && discounttype == 2">({{ discount }} % )</span></td>

        <td class="total-value"><div id="paid">{{ discountAmount  }}</div></td>
    </tr>
    <tr>

        <td colspan="2" class="blank"> </td>
        <td  class="total-line">Tax <span ng-if="tax != 0">({{ tax }} %)</span></td>
        <td class="total-value"><div id="total">{{ taxAmount }}</div></td>
    </tr>

    <tr>
        <td colspan="2" class="blank"> </td>
        <td  class="total-line balance">Total Amount</td>
        <td class="total-value balance"><div class="due">{{ selectedcurrency }} {{ payable }}</div></td>
    </tr>
</tbody>
  </table>
      </div>
      </div>
<input type="button" ng-click="submitinvoice()"  name="save" value="Save" class="btn btn-success">
<!-- <input type="button" name="send" value="Save & send" class="btn btn-success"> -->
  <!-- <div id="terms">
     <h5>Terms</h5>
    <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
  </div> -->

</div>
                 <!-- main invoice page -->





               </div>
              </div>
             </div>
       </section>
      </div>
