<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/invoicecss/style.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/invoicecss/print.css' media="print" />


<?php include('sidebar.php'); ?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home </a>></li>
        <li class="active">Invoice edit</li>
      </ol>
    </section>


<section class="content portfolio-cont bg-white">
  <div class="no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp49" ng-controller="myCtrt49">
          <div id="content">
                 <!-- main invoice page -->
                 <div id="page-wrap">

    <p>Edit Invoice {{ invoiceno }}</p>

  <div id="identity">
    <div class="row">
  <div class="col-md-3">
      <input  class="form-control mb-3" id="reference"  ng-model="reference" ng-value="reference" placeholder="Please enter invoice no">
      <p ng-cloak ng-show="submitl && reference == ''" class="text-danger">Please enter reference.</p>
    </div>
   <div class="col-md-3">
      <input readonly class="form-control mb-3" id="reference"  ng-model="invoiceno" ng-value="invoiceno" >
    </div>
  </div>

  <!-- recurring -->
  <div class="row chck_box_rw">
    <div class="col-md-2">
     <p>Recurring<input ng-model="showrecurring" ng-checked="showrecurring == 1" value="1" type="checkbox" ></p>
    </div>
    <div ng-if="showrecurring == 1 && showrecurring == 1" class="col-md-2">
      <div class="form-group">
      <select convert-to-number onchange="angular.element(this).scope().changerecurringtype(this)" ng-model="recurringevery" class="recurringtype form-control">
       <option value="0">Once Only</option>
       <option value="1">Every Week</option>
       <option value="2">Every Month</option>
       <option value="3">Custom</option>
      </select>
    </div>
    </div>

    <div ng-if="recurringevery == 3 && showrecurring == 1" class="col-md-2">
      <div class="form-group">
        <select  ng-model="recurringType" class="recurring form-control rounded-0">
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
    <div ng-if="showrecurring == 1 && showrecurring == 1 " class="col-md-2">
     <p>Ending <input value="1" ng-checked="end == 1" ng-click="endclick($event)" ng-model="end" type="checkbox" ></p>
    </div>
    <div ng-if="end == 1 && showrecurring == 1" class="col-md-1">
      <p>Never<input type="radio" name="never" ng-click="clickendNever(1)" ng-checked="endNever == 1"  ng-model="endNever" ng-value="endNever" value="1" ></p>
    </div>
    <div ng-if="end == 1 && showrecurring == 1" class="col-md-1">
      <p>After<input type="radio" name="never" ng-click="clickendNever(2)" ng-checked="endAfter == 1" ng-model="endAfter" ng-value="endAfter" value="1" ></p>
    </div>
    <div ng-if="end == 1 && showrecurring == 1" class="col-md-3">
      <div class="form-group Occurrence_Frm">
      <input type="text" ng-model="Afterduration" ng-value="Afterduration" class="form-control afterduration" ng-model="never" value="" placeholder="Occurrence(s)" >
      </div>
    </div>
  </div>
  <!-- recurring -->

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
    <select ng-disabled="checked" id="address" onchange="angular.element(this).scope().getcontract(this)" id="client" class="form-control" name="recipient" >
        <option value="">Please select recipient</option>
        <option data-key="{{ key }}" ng-repeat="(key,x) in allclient" value="{{ x.u_id }}" ng-selected="projectType == x.projectType && recipient == x.u_id" projectType>{{ x.name }}</option>
      </select>
    </div>
    </div>

    <div class="col-md-4">
         <div class="form-group">
      <select ng-disabled="checked" onchange="angular.element(this).scope().currency(this)" id="address"   class="form-control" name="currency" ng-model="currency"  >
        <option value="">Please select currency</option>
        <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency" data-id="{{ key }}"  value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
      </select>
      <p ng-cloak ng-show="submitl && currency == ''" class="text-danger">Please select  currency .</p>

    </div>
    </div>
    <div class="col-md-4">
         <div class="form-group">
      <select onchange="angular.element(this).scope().changeDiscount(this)" ng-disabled="checked" id="address"  id="client" class="form-control" name="discounttype" ng-model="discounttype"  >
        <option value="">Select Discount Type</option>
        <option  value="1">Flat</option>
        <option  value="2">Percentage</option>
      </select>
    </div>
    </div>

    <div class="col-md-4">
         <div class="form-group">
        <input class="form-control discount" ng-keyup="counttotalhour()" ng-readonly="checked" numbers-only="numbers-only" ng-if="discounttype !=''" ng-keyup="counttotalhour()" class="discount form-control" id="discount"   ng-model="discount" ng-value="discount" placeholder="Please enter discount">
        </div>
        </div>
    <div class="col-md-4">
     <div class="form-group">
      <input class="form-control" ng-keyup="counttotalhour()" ng-readonly="checked" numbers-only="numbers-only" ng-keyup="counttotalhour()" id="address"  ng-model="tax" ng-value="tax" placeholder="Please enter tax (%)">
        </div>
    </div>
    <div class="col-md-4">
     <div class="form-group">
   <input class="form-control" ng-readonly="checked" id="address" ng-model="name" ng-value="name" placeholder="Please enter name">
   <p ng-cloak ng-show="submitl && name == ''" class="text-danger">Please enter name.</p>

        </div>
    </div>
    <div class="col-md-4">
     <div class="form-group">
         <input class="form-control" ng-readonly="checked" id="address" ng-model="address" ng-value="address" placeholder="Please enter address">
         <p ng-cloak ng-show="submitl && address == ''" class="text-danger">Please enter address.</p>
        </div>
    </div>
    <div class="col-md-4">
     <div class="form-group">
<input class="form-control" ng-readonly="checked" id="phone" ng-model="phone" ng-value="phone" placeholder="Please enter phone no">
<p ng-cloak ng-show="submitl && phone == ''" class="text-danger">Please enter phone number.</p>
<p ng-cloak ng-show="phone != '' && phone.length < 10 || phone.length > 11" class="text-danger">Please enter valid number.</p>
<!-- <span id="valid-msg" class="hide">✓ Valid</span>
<span id="error-msg" class="hide"></span> -->
<!-- <p ng-cloak ng-show="submitl && phone != '' && phone.length != 10" class="text-danger">Please enter valid phone number.</p> -->
        </div>
    </div>
    <div class="col-md-4">
     <div class="form-group">
        <input class="form-control" ng-readonly="checked" onkeyup="angular.element(this).scope().ctrl(this)" id="address" ng-model="email" ng-value="email" placeholder="Please enter email">
        <p ng-cloak ng-show="submitl && email == ''" class="text-danger">Please enter email address.</p>
        <p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>
    </div>
    </div>
    <div ng-if="checked || checked1" class="col-md-4">
         <div class="form-group">
      <select ng-disabled="sdisabled" onchange="angular.element(this).scope().changepaid(this)"  class="form-control" ng-model="status"  id="status">
        <option value="">Select Payment Status</option>
        <option value="1">Paid</option>
        <option value="0">Unpaid</option>
      </select>
      <p ng-cloak ng-show="submitl && status == ''" class="text-danger">Please select status.</p>
    </div>
    </div>
    <div ng-if="checked || checked1" class="col-md-4">
         <div class="form-group">
      <select ng-disabled="disabled"  class="form-control" ng-model="paymentReceived"  id="paymentReceived">
        <option value="0">Select Received by</option>
        <option value="1">Bank</option>
        <option value="2">Cash</option>
        <option value="3">Paypal</option>
      </select>
      <p ng-cloak ng-show="submitl && paymentReceived == ''" class="text-danger">Please select payment received by.</p>
    </div>
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

    <div ng-if="contactmilestone.length != 0" class="col-md-4">
        <div class="form-group">
 <select id="address" onchange="angular.element(this).scope().gettask(this)" class="form-control rounded-0 milestone" ng-model="contract" id="contract">
<option value="">Select Milestone</option>
<option ng-repeat="(key,x) in contactmilestone" data-id="contract" value="{{ x.contractId	 }}">{{ x.name }}</option>
</select>

    </div>
    </div>
    <div ng-if="ownmilestone.length != 0" class="col-md-4">
        <div class="form-group">
 <select id="address" onchange="angular.element(this).scope().gettask(this)"  class="form-control rounded-0 milestone"  id="contract">
<option value="">Select Milestone</option>
<option ng-repeat="(key,x) in ownmilestone" data-id="own" ng-selected="x.id == selectedmilestone" value="{{ x.id	 }}">{{ x.name }}</option>
</select>

    </div>
    </div>



  </div>



  <div style="clear:both"></div>

  <div id="customer">


      <div class="table-responsive">
          <table id="meta" class="table table-border">

              <tr>
                  <td class="meta-head">Amount Due</td>
                  <td><div class="due">{{ payable }}</div></td>
              </tr>
          </table>
      </div>
  </div>

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
    <tr class="item-row" ng-repeat="(key2,x2) in task">
        <td class="item-name">
          <div class="delete-wpr">
            <input  class="form-control" ng-readonly="checked" ng-model="x2.task" ng-value="x2.task">
              <p ng-cloak ng-show="submitl && x2.task == ''" class="text-danger">Please enter task.</p>
            <a class="delete" ng-if="task.length != 1" ng-click="deletetask(key2)" title="Remove row">X</a>
          </div>
        </td>
        <td>
          <input class="form-control" ng-readonly="checked" numbers-only="numbers-only" ng-keyup="counttotalhour()" ng-model="x2.hourly" ng-value="x2.hourly" placeholder="" class="cost">
          <p ng-cloak ng-show="submitl && x2.hourly == ''" class="text-danger">Please enter hourly price.</p>

        </td>
        <td>
          <input class="form-control" ng-readonly="checked" numbers-only="numbers-only" ng-keyup="counttotalhour()" ng-model="x2.hours" ng-value="x2.hours" placeholder="" class="qty">
          <p ng-cloak ng-show="submitl && x2.hours == ''" class="text-danger">Please enter hours.</p>

        </td>
        <td><span class="price">{{ x2.amount }}</span></td>
    </tr>
    <tr id="hiderow">
      <td colspan="4"><a ng-readonly="checked" id="addrow" class="btn bg-yellow" ng-click="taskadd(key)" title="Add a row">Add a row</a></td>
    </tr>
    <tr>
      <td colspan="2" class="blank"> </td>
        <td  class="total-line">SubTotal</td>
        <td class="total-value"><div id="subtotal">{{ selectedcurrency }} {{ totalamount }}</div></td>
    </tr>
    <tr>
        <td colspan="2" class="blank"> </td>
        <td  class="total-line">Discount <span ng-if="discount != 0 && discounttype == 1">({{ discount }} Flat )</span><span ng-if="discount != 0 && discounttype == 2">({{ discount }} % )</span></td>
        <td class="total-value form-group"><div id="paid">{{ discountAmount }}</div></td>
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

  </table>
      </div>

<input type="button" ng-click="updateinvoice()"  name="save" value="Update" class="btn btn-success">


</div>
                 <!-- main invoice page -->
               </div>
              </div>
             </div>
             </div>
       </section>
      </div>
