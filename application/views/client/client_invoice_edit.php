<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/invoicecss/style.css' />
<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/invoicecss/print.css' media="print" />


<?php include('sidebar.php'); ?>


  <div id="wrapper" class="content-wrapper">
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a>></li>
        <li class="active">Invoice Edit</li>
      </ol>
    </section>


<section class="content portfolio-cont bg-white">
  <div class=" no-margin user-dashboard-container">
        <div ng-cloak  ng-app="myApp15" ng-controller="myCtrt15">
          <div id="content">
                 <!-- main invoice page -->
                 <div id="page-wrap">

    <p>Edit Invoice {{ invoiceno }}</p>

  <div id="identity">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
    <input type="text" readonly="" id="address"  id="client" class="form-control" name="freelancer" ng-value="freelancer" ng-model="freelancer" >

    </div>
    </div>
    <div class="col-md-4">
         <div class="form-group">
       <select disabled  id="address"  class="form-control rounded-0" ng-model="contract" id="contract">
      <option value="">Select contract</option>
      <option ng-repeat="(key,x) in allcontract" value="{{ x.contractId	 }}">{{ x.jobTitle }}</option>
      </select>
    </div>
    </div>
    <div class="col-md-4">
         <div class="form-group">
      <select disabled=""  id="address"   class="form-control" name="currency" ng-model="currency"  >
        <option value="">Please select currency</option>
        <option ng-if="allcurrency.length != 0" ng-repeat="(key,x) in allcurrency" data-id="{{ key }}"  value="{{ x.id }}">{{ x.code }} {{ x.symbol }} </option>
      </select>
    </div>
    </div>
    <div class="col-md-4">
         <div class="form-group">
      <select disabled="" id="address"  id="client" class="form-control" name="discounttype" ng-model="discounttype"  >
        <option value="">Please select Discount</option>
        <option  value="1">Flat</option>
        <option  value="2">Percentage</option>
      </select>
    </div>
    </div>

    <div class="col-md-4">
         <div class="form-group">
        <input class="form-control" readonly="" numbers-only="numbers-only" ng-if="discounttype !=''" ng-keyup="counttotalhour()" class="discount form-control" id="address"   ng-model="discount" ng-value="discount" placeholder="Please enter discount">
        </div>
        </div>
    <div class="col-md-4">
     <div class="form-group">
<input class="form-control" readonly="" numbers-only="numbers-only" ng-keyup="counttotalhour()" id="address"  ng-model="tax" ng-value="tax" placeholder="Please enter tax (%)">
        </div>
    </div>
    <!-- <div class="col-md-4">
     <div class="form-group">
<input class="form-control" readonly="" id="address" ng-model="name" ng-value="name" placeholder="Please enter name">
        </div>
    </div>
    <div class="col-md-4">
     <div class="form-group">
         <input class="form-control" readonly="" id="address" ng-model="address" ng-value="address" placeholder="Please enter address">
        </div>
    </div> -->
    <!-- <div class="col-md-4">
     <div class="form-group">
<input class="form-control" readonly="" id="address" ng-model="phone" ng-value="phone" placeholder="Please enter phone no">
        </div>
    </div> -->
    <!-- <div class="col-md-4">
     <div class="form-group">
<input class="form-control" readonly="" id="address" ng-model="email" ng-value="email" placeholder="Please enter email">
        </div>
    </div> -->
    <div class="col-md-4">
         <div class="form-group">
        <select class="form-control" ng-model="status"  id="status">
        <option value="">Select Status</option>
        <option value="1">Paid</option>
        <option value="0">Unpaid</option>
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
        <td class="item-name"><div class="delete-wpr"><input placeholder="$650.00" class="form-control" readonly="" ng-model="x2.task" ng-value="x2.task"></div></td>
        <td><input class="form-control" readonly="" numbers-only="numbers-only" ng-keyup="counttotalhour()" ng-model="x2.hourly" ng-value="x2.hourly" placeholder="650.00" class="cost"></td>
        <td><input class="form-control" readonly="" numbers-only="numbers-only" ng-keyup="counttotalhour()" ng-model="x2.hours" ng-value="x2.hours" placeholder="1" class="qty"></td>
        <td><span class="price">{{ x2.amount }}</span></td>
    </tr>

    <tr>
      <td colspan="2" class="blank"> </td>
        <td  class="total-line">SubTotal</td>
        <td class="total-value"><div id="subtotal">{{ selectedcurrency }} {{ totalamount }}</div></td>
    </tr>
    <tr>

        <td colspan="2" class="blank"> </td>
        <td  class="total-line">Tax</td>
        <td class="total-value"><div id="total">{{ taxAmount }}</div></td>
    </tr>
    <tr>
        <td colspan="2" class="blank"> </td>
        <td  class="total-line">Discount</td>
        <td class="total-value form-group"><textarea id="paid" class="form-control">{{ discountAmount }}</textarea></td>
    </tr>
    <tr>
        <td colspan="2" class="blank"> </td>
        <td  class="total-line balance">Total Amount</td>
        <td class="total-value balance"><div class="due">{{ selectedcurrency }} {{ payable }}</div></td>
    </tr>

  </table>
      </div>

<input type="button" ng-click="updateinvoice()"  name="save" value="Update" class="btn btn-success">
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
             </div>
       </section>
      </div>
