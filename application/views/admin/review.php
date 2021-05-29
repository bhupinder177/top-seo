<?php include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
        <li class="active">Review</li>
      </ol>
    </section>
<section ng-cloak  ng-app="myApp31" ng-controller="myCtrt31" class="content box">
                               <div class="content-header p-3">
                                        <h4 class="mb-0">Review</h4>
                                </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
									<table class="table">
										<thead>
											<tr>
                        <th scope="col">S.No</th>
												<th scope="col">Client Name</th>
												<th scope="col">Project title</th>
												<th scope="col">Service</th>
												<th scope="col">Budget</th>
												<th scope="col">Review</th>
												<th scope="col">Duration</th>
												<th scope="col">Score</th>
												<th scope="col">Project Summary</th>
												<th scope="col">Action</th>
											</tr>
										</thead>
										<tbody>
                      <tr ng-if="review.length != 0" ng-repeat="(key,x) in review" ng-init="testimonials = key">
                      <td>{{ $index+ 1 }}</td>
                      <td>{{ x.fullName }}</td>
                      <td>{{ x.projectTitle }}</td>
                      <td>{{ x.service }}</td>
                      <td>{{ x.code }} {{ x.symbol }} {{ x.projectAmount }}</td>
                      <td>{{ x.reviewTitle }}</td>
                      <td>{{ x.projectStartDate | date }}-{{ x.projectEndDate | date }}</td>
                      <td>{{ x.rating }}</td>
                      <td>{{ x.projectSummary }}</td>
                      <td>
                  <div class="dropdown ac-cstm text-right">
                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                      <img src="<?php echo base_url(); ?>assets/dashboard/images/dots-img.png" class="pro-img">
                   </a>
                   <div class="dropdown-menu fadeIn">
                     <a  class="dropdown-item" ng-if="x.linkedInId" ng-click="view(x.linkedInId,2)"><i class="fa fa-eye"></i>View</a>
                     <a  class="dropdown-item" ng-if="!x.linkedInId" ng-click="view(x.contractId,1)"><i class="fa fa-eye"></i>View</a>
                     <a ng-if="x.linkedInId"  class="dropdown-item" ng-click="confirm(x.linkedInId,2)"><i class="fa fa-trash"></i>Delete</a>
                     <a ng-if="!x.linkedInId"  class="dropdown-item" ng-click="confirm(x.contractId,1)"><i class="fa fa-trash"></i>Delete</a>
                   </div>
                    </div>
                      </td>
											</tr>
											<tr ng-if="review.length == 0">
												<td class="text-center" colspan="6">No record</td>
											</tr>
                                        </tbody>
									</table>
                                        </div>
									<div id="pagination"></div>
				</div>

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
                              <div  class="mb-1">
                                <b>Email:</b> {{ viewdata.email }}
                              </div>
                              <div  class="mb-1">
                                <b>Skype:</b> {{ viewdata.skype }}
                              </div>
                              <div  class="mb-1">
                                <b>Phone:</b> {{ viewdata.phone }}
                              </div>
                              <div ng-if="viewdata.website"  class="mb-1">
                                <b>Website:</b> {{ viewdata.website }}
                              </div>
                              <div  class="mb-1">
                                <b>City:</b> {{ viewdata.city }}
                              </div>
                              <div  class="mb-1">
                                <b>State:</b> {{ viewdata.state }}
                              </div>
                              <div  class="mb-1">
                                <b>Country:</b> {{ viewdata.country }}
                              </div>
                              <div  class="mb-1">
                                <b>Address:</b> {{ viewdata.address }}
                              </div>
                              <div  class="mb-1">
                                <b>Feedback :</b> {{ viewdata.reviewOverall }}
                              </div>

                              <div  class="mb-1">
                                <b>Job Title :</b>{{ viewdata.title }}
                              </div>

                              <div class="mb-1">
                                <b>Budget :</b> {{ viewdata.code }} {{ viewdata.symbol }} {{ viewdata.budget }}
                              </div>
                              <div class="mb-1">
                                <b>Duration :</b> {{ viewdata.start | date }} - {{ viewdata.end | date }}
                              </div>
                              <div class="mb-1">
                                <b>Service :</b> {{ viewdata.service }}
                              </div>
                              <div class="mb-1">
                                <b>Industry :</b> {{ viewdata.industry }}
                              </div>
                              <div ng-if="viewdata.target" class="mb-1">
                                <b>Target Location :</b> {{ viewdata.target }}
                              </div>
                              <div ng-if="viewdata.reviewTitle"  class="mb-1">
                                <b>Review Title :</b> {{ viewdata.reviewTitle }}
                              </div>
                              <div  class="mb-1">
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
                              <button class="btn btn-info" data-dismiss="modal" aria-hidden="true" >Cancel</button>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!-- view -->

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
       <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
       <button type="button" ng-click="delete()" class="btn btn-danger" id="confirm">Delete</button>
       </div>
       </div>
       </div>
       </div>
                  <!-- delete confirm modal -->


</section>
</div>
