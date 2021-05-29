<?php include('sidebar.php');?>

<div id="wrapper" class="content-wrapper">
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>"><i class="fa fa-dashboard"></i> Home</a> ></li>
      <li class="active">Reviews</li>
    </ol>
  </section>

  <section class="content portfolio-cont dep-cstm">
    <div class=" no-margin user-dashboard-container">
      <div ng-cloak  ng-app="myApp68" ng-controller="myCtrt68">
        <div id="content">
          <div class="no-border-radius">
            <div class="row">
              <div class="col-md-12">
                <div class="box">
                  <div class="box-body">
                      <div class="table-responsive">
                    <table  id="rankingTable" class="table">
                      <thead>
                        <tr>
                          <th>S. No.</th>
                          <th>Client</th>
                          <th style="min-width: 150px;">Project Title</th>
                          <th>Services</th>
                          <th>Budget</th>
                          <th>Review Score</th>
                          <th>Duration</th>
                          <th>Feedback</th>
                          <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-if="allreview.length != 0" ng-repeat="(key,x) in allreview">
                          <td>{{ start + $index  }}</td>
                          <td>{{ x.name }}</td>
                          <td>{{ x.title }}</td>
                          <td>{{ x.service }}</td>
                          <td>{{ x.budget }}</td>
                          <td>{{ x.score }}</td>
                          <td>{{ x.start | date }}-{{ x.end | date }}</td>
                          <td>{{ x.feedback }}</td>

                          <td>
                              <div class="dropdown ac-cstm text-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                       <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                    </a>
                    <div class="dropdown-menu fadeIn">
                      <a  class="dropdown-item" ng-if="x.linkedInId" ng-click="view(x.linkedInId,2)"><i class="fa fa-eye"></i>View</a>
                      <a  class="dropdown-item" ng-if="x.contractId" ng-click="view(x.contractId,1)"><i class="fa fa-eye"></i>View</a>
                      <a  class="dropdown-item" ng-if="x.user_gig_buyId" ng-click="view(x.user_gig_buyId,3)"><i class="fa fa-eye"></i>View</a>
                      <a ng-if="removed != plan.packageRemovalReview && x.linkedInId"  class="dropdown-item" ng-click="confirm(x.linkedInId,2)"><i class="fa fa-trash"></i>Delete</a>
                      <a ng-if="removed != plan.packageRemovalReview && !x.linkedInId"  class="dropdown-item" ng-click="confirm(x.contractId,1)"><i class="fa fa-trash"></i>Delete</a>
                                  </div>
                 </div>
                          </td>

                          <td >

                          </td>
                        </tr>
                        <tr ng-if="allreview.length == 0"><td colspan="7" class="text-center">No Record Found.</td></tr>
                      </tbody>
                    </table>
                      </div>
                    <div  id="pagination"></div>

                    <!-- delete confirm modal -->
                    <div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
         <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         <h4 class="modal-title">Delete</h4>
         </div>
         <div class="modal-body">
         <p>Are you sure you want to delete this ?</p>
         </div>
         <div class="modal-footer">
           <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>

         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         </div>
         </div>
         </div>
         </div>
                    <!-- delete confirm modal -->

                    <!-- view -->
                    <div id="view" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">View Review</h4>
                          </div>
                          <div class="modal-body">
                            <div class="repeat"  >

                            <div  class="mb-1">
                              <b>Client Name :</b> {{ viewdata.name }}
                            </div>
                            <div ng-if="viewdata.email" class="mb-1">
                              <b>Email:</b> {{ viewdata.email }}
                            </div>
                            <div ng-if="viewdata.skype" class="mb-1">
                              <b>Skype:</b> {{ viewdata.skype }}
                            </div>
                            <div ng-if="viewdata.phone" class="mb-1">
                              <b>Phone:</b> {{ viewdata.phone }}
                            </div>
                            <div ng-if="viewdata.website"  class="mb-1">
                              <b>Website:</b> {{ viewdata.website }}
                            </div>
                            <div ng-if="viewdata.city"  class="mb-1">
                              <b>City:</b> {{ viewdata.city }}
                            </div>
                            <div ng-if="viewdata.state" class="mb-1">
                              <b>State:</b> {{ viewdata.state }}
                            </div>
                            <div ng-if="viewdata.country" class="mb-1">
                              <b>Country:</b> {{ viewdata.country }}
                            </div>
                            <div ng-if="viewdata.address" class="mb-1">
                              <b>Address:</b> {{ viewdata.address }}
                            </div>
                            <div ng-if="viewdata.reviewOverall" class="mb-1">
                              <b>Feedback :</b> {{ viewdata.reviewOverall }}
                            </div>

                            <div ng-if="viewdata.title"  class="mb-1">
                              <b>Job Title :</b>{{ viewdata.title }}
                            </div>

                            <div ng-if="viewdata.budget" class="mb-1">
                              <b>Budget :</b> {{ viewdata.code }} {{ viewdata.symbol }} {{ viewdata.budget }}
                            </div>
                            <div  class="mb-1">
                              <b>Duration :</b> {{ viewdata.start | date }} - {{ viewdata.end | date }}
                            </div>
                            <div ng-if="viewdata.service" class="mb-1">
                              <b>Service :</b> {{ viewdata.service }}
                            </div>
                            <div ng-if="viewdata.industry" class="mb-1">
                              <b>Industry :</b> {{ viewdata.industry }}
                            </div>
                            <div  ng-if="viewdata.target" class="mb-1">
                              <b>Target Location :</b> {{ viewdata.target }}
                            </div>
                            <div ng-if="viewdata.reviewTitle"  class="mb-1">
                              <b>Review Title :</b> {{ viewdata.reviewTitle }}
                            </div>
                            <div ng-if="viewdata.target" class="mb-1">
                              <b>Project Summary :</b> {{ viewdata.projectSummary }}
                            </div>
                            <div ng-repeat="(key,x2) in viewdata.allrating" ng-if="x2.reviewType !='skill' || x2.reviewType != 'rehire' " class="mb-1">
                              <b>{{ x2.reviewType }} :</b>

                              <i class="fa fa-star " ng-class="{ 'checked' :  x2.rating >= 0.2  }"></i>
                              <i class="fa fa-star " ng-class="{ 'checked' :  x2.rating  >= 0.4  }"></i>
                              <i class="fa fa-star " ng-class="{ 'checked' :  x2.rating  >= 0.6  }"></i>
                              <i class="fa fa-star" ng-class="{ 'checked' :  x2.rating   >= 0.8  }"></i>
                              <i class="fa fa-star" ng-class="{ 'checked' :  x2.rating   >= 1  }"></i>
                            </div>
                            <div ng-repeat="(key,x2) in viewdata.allrating" ng-if="x2.reviewType =='skill' || x2.reviewType == 'rehire' " class="mb-1">
                              <b>{{ x2.reviewType }} :</b>

                              <i class="fa fa-star " ng-class="{ 'checked' :  x2.rating >= 0.2  }"></i>
                              <i class="fa fa-star " ng-class="{ 'checked' :  x2.rating  >= 0.4  }"></i>
                              <i class="fa fa-star " ng-class="{ 'checked' :  x2.rating  >= 0.6  }"></i>
                              <i class="fa fa-star" ng-class="{ 'checked' :  x2.rating   >= 0.8  }"></i>
                              <i class="fa fa-star" ng-class="{ 'checked' :  x2.rating   >= 1  }"></i>
                            </div>
                            <div  class="mb-1">
                              <b>Overall Rating :</b>
                              <i class="fa fa-star " ng-class="{ 'checked' :  viewdata.score >= 1  }"></i>
                              <i class="fa fa-star " ng-class="{ 'checked' :  viewdata.score >= 2  }"></i>
                              <i class="fa fa-star " ng-class="{ 'checked' :  viewdata.score >= 3  }"></i>
                              <i class="fa fa-star" ng-class="{ 'checked' :  viewdata.score >= 4  }"></i>
                              <i class="fa fa-star" ng-class="{ 'checked' :  viewdata.score >= 5  }"></i>
                            </div>

                            </div>
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Close</button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- view -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
