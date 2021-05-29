<?php include('sidebar.php');?>
<div id="wrapper" class="content-wrapper">
<section class="content-header">
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
<li class="active">Ranking Price</li>
</ol>
</section>

<section class="content">
<div ng-cloak class="box box-success" ng-app="myApp43" ng-controller="myCtrt43">
<div class="box-header p-3">
<div class="row">

  <div class="col-md-2">
      <div class="form-group">

                        <select ng-model="perpage" onchange="angular.element(this).scope().changePerPage(this)"   class="form-control">
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
    <input type="text" ng-model="searchtext" ng-keyup="search()" placeholder="Seach" class="form-control">
     </div>
  </div>
<div class="col-md-6"><a data-toggle="modal" data-target="#addprice" class="pull-right btn btn-success" >Add New</a></div>
</div>

<!-- add modal -->
<div id="addprice" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ranking Price</h4>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <label>Country <span class="red-text">*</span></label>
               <select onchange="angular.element(this).scope().getstate(this)"  id="country" ng-model="country" ng-value="country"  class="form-control country"  >
                 <option value="">Select Country</option>
                 <option ng-repeat="(key,x) in allcountry" value="{{ x.id }}">{{ x.name }}</option>
               </select>
               <p ng-show="submitc && country == ''" class="text-danger">Country is required.</p>
            </div>

            <div class="form-group">
               <label>State <span class="red-text">*</span></label>
               <select onchange="angular.element(this).scope().getcity(this)"  id="state" ng-model="state" ng-value="state"  class="form-control state"  >
                 <option value="">Select State</option>
                 <option ng-repeat="(key,x2) in allstate" value="{{ x2.id }}">{{ x2.name }}</option>
               </select>
            </div>

            <div class="form-group">
               <label>City<span class="red-text">*</span></label>
               <select   id="city" ng-model="city" ng-value="city"  class="form-control city"  >
                 <option value="">Select City</option>
                 <option value="0">All</option>
                 <option ng-repeat="(key,x3) in allcity" value="{{ x3.id }}">{{ x3.name }}</option>
               </select>
            </div>

            <div class="form-group">
               <label>Price<span class="red-text">*</span></label>
               <input type="text" ng-model="price" ng-value="price" id="price"   class="form-control price" >
               <p ng-show="submitc && price == ''" class="text-danger">Price is required.</p>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" ng-click="submit()" class="btn btn-success" >Submit</button>
         </div>
      </div>
   </div>
</div>
<!-- add modal -->

</div>
<div class="box-body">
<div class="table-responsive">
<table id="rankingTable" class="table">
<thead>
<tr>
<th>S.NO</th>
<th class="text-center">Country</th>
<th class="text-center">State</th>
<th class="text-center">City</th>
<th class="text-center">Price</th>
<th class="text-right">Action</th>
</tr>
</thead>
<tbody>
<tr ng-if="alldata.length != 0" ng-repeat="(key,x) in alldata">
<td>{{ start + key }} </td>
<td class="text-center">
  <span ng-if="x.country">{{ x.country }}</span>
  <span ng-if="!x.country">All</span>
</td>
<td class="text-center">{{ x.state }}</td>
<td class="text-center">{{ x.city }}</td>
<td class="text-center">USD $ {{ x.price }}</td>
<td>
<div class="d-flex pull-right">
<a title="edit" ng-click="edit(x.rankingPriceId)"  class="btn bg-blue mr-2" ><i class="fa fa-edit"></i></a>
<a title="delete" ng-click="confirm(x.rankingPriceId)" class="btn bg-blue mr-2" ><i class="fa fa-trash"></i></a>
</div>
</td>
</tr>
<tr ng-if="allview.length == 0"><td colspan="3" class="text-center">No Record Found.</td></tr>
</tbody>
</table>
</div>
<div id="pagination"></div>

<!-- delete modal-->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete it?</h4>
         </div>
         <div class="modal-footer">
            <a ng-click="delete()" class="btn btn-danger" id="yes">Yes</a>
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
         </div>
      </div>
   </div>
</div>
<!-- delete modal -->

 <!-- edit -->

 <div id="editprice" class="modal fade" role="dialog">
    <div class="modal-dialog">
       <!-- Modal content-->
       <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title">Ranking Price</h4>
          </div>
          <div class="modal-body">
             <div class="form-group">
                <label>Country <span class="red-text">*</span></label>
                <select onchange="angular.element(this).scope().getstate(this)"   id="country" ng-model="country1" ng-value="country1"  class="form-control country"  >
                  <option value="">Select Country</option>
                  <option value="0">All</option>
                  <option ng-repeat="(key,x) in allcountry" value="{{ x.id }}">{{ x.name }}</option>
                </select>
                <p ng-show="submitc && country1 == ''" class="text-danger">Country is required.</p>
             </div>
             <div class="form-group">
                <label>State <span class="red-text">*</span></label>
                <select id="state1" onchange="angular.element(this).scope().getcity(this)"   ng-model="state1" ng-value="state1"  class="form-control state"  >
                  <option value="">Select State</option>
                  <option ng-repeat="(key,x4) in allstate" value="{{ x4.id }}">{{ x4.name }}</option>
                </select>
             </div>

             <div class="form-group">
                <label>City<span class="red-text">*</span></label>
                <select   id="city1" ng-model="city1" ng-value="city1"  class="form-control city"  >
                  <option value="">Select City</option>
                  <option ng-repeat="(key,x5) in allcity" value="{{ x5.id }}">{{ x5.name }}</option>
                </select>
             </div>
             <div class="form-group">
                <label>Price<span class="red-text">*</span></label>
                <input type="text" ng-model="price1" ng-value="price1" id="price"   class="form-control price" >
                <p ng-show="submitc && price1 == ''" class="text-danger">Price is required.</p>
             </div>
          </div>
          <div class="modal-footer">
             <button type="button" ng-click="update()" class="btn btn-success" >Update</button>
          </div>
       </div>
    </div>
 </div>
 <!-- edit -->
</div>

</div>

</section>
</div>
