<?php include('sidebar.php');?>
<div id="wrapper" class="content-wrapper">
<section class="content-header">
<ol class="breadcrumb">
<li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
<li class="active">Paid Ranking Price</li>
</ol>
</section>

<section class="content">
<div ng-cloak class="box box-success" ng-app="myApp70" ng-controller="myCtrt70">
<div class="box-header p-3">
<div class="row">
<div class="col-md-4"><h3 class="box-title mb-0">Paid Ranking Price</h3> </div>

</div>



</div>
<div class="box-body">
<div class="table-responsive">
<table id="rankingTable" class="table">
<thead>
<tr>
<th>S. No.</th>
<th class="text-center">Country</th>
<th class="text-center">Price</th>
<th class="text-right">Buy</th>
</tr>
</thead>
<tbody>
<tr ng-if="alldata.length != 0" ng-repeat="(key,x) in alldata">
<td>{{ start + key }} </td>
<td class="text-center">
  <span ng-if="x.country">{{ x.country }}</span>
  <span ng-if="!x.country">All</span>
</td>
<td class="text-center">$ {{ x.price }}</td>
<td>
<div class="d-flex pull-right">
<a title="edit" ng-click="edit(x.rankingPriceId)"  class="btn bg-blue mr-2" ><i class="fa fa-paypal"></i>
</a>
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
            <a ng-click="delete()" class="btn btn-danger" id="yes">Delete</a>
            <button class="btn btn-warning" data-dismiss="modal" aria-hidden="true">No</button>
         </div>
      </div>
   </div>
</div>
<!-- delete modal -->


</div>

</div>

</section>
</div>
