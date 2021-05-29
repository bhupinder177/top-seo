  <?php include('sidebar.php');?>
  <div id="wrapper" class="content-wrapper">
  <section class="content-header">
  <ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
  <li class="active">Profile View</li>
  </ol>
  </section>

  <section class="content">
  <div ng-cloak class="box box-success" ng-app="myApp42" ng-controller="myCtrt42">
  <div class="box-header p-3">
  <div class="row">
    <div class="col-md-4 col-lg-2">
        <div class="form-group">

                          <select ng-model="perpage" onchange="angular.element(this).scope().changePerPage(this)"   class="form-control">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                          </select>
                        </div>
    </div>
  <div class="col-md-4">
    <div class="form-group">
    <input type="text" ng-model="searchtext" placeholder="Search by name" ng-keyup="search()" class="form-control" >
    </div>
  </div>

  </div>

  </div>
  <div class="box-body">
  <div class="table-responsive">
  <table id="rankingTable" class="table">
  <thead>
  <tr>
  <th>S.NO</th>
  <th class="text-center">Company Name</th>
  <th class="text-center">Count</th>
  <th class="text-right">Action</th>
  </tr>
  </thead>
  <tbody>
  <tr ng-if="allview.length != 0" ng-repeat="(key,x) in allview">
  <td>{{ start + key }} </td>
  <td class="text-center">
  <span ng-if="x.type == 2">{{ x.c_name }}</span>
  <span ng-if="x.type == 3">{{ x.name }}</span>
  </td>
  <td class="text-center">{{ x.count }}</td>
  <td>
  <div class="d-flex pull-right">
  <a title="view" href="<?php echo base_url(); ?>admin/profileviewdetail/{{ x.userId }}" class="btn bg-blue mr-2" ><i class="fa fa-eye"></i></a>
  </div>
  </td>
  </tr>
  <tr ng-if="allview.length == 0"><td colspan="3" class="text-center">No Record Found.</td></tr>
  </tbody>
  </table>
  </div>
  <div id="pagination"></div>
  </div>

  </div>

  </section>
  </div>
