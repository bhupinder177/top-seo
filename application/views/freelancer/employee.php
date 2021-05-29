
<div id="wrapper">
<section class="container-fluid light-bg user-dashboard no-padding">

	<div class="container1">

	<!-- get sidebar -->

		<div class=" no-margin user-dashboard-container">



			<div ng-cloak  ng-app="myApp23" ng-controller="myCtrt23">

				<div id="content">
                    <?php require('sidebar.php'); ?>
					<div id="content-header">

						<div id="breadcrumb">

							<a href="<?php echo base_url(); ?>dashboard/<?php echo $this->session->userdata['clientloggedin']['url']; ?>/<?php echo $this->session->userdata['clientloggedin']['aurl']; ?>" class="tip-bottom" data-original-title="Go to Home"><i class="fa fa-home"></i> Home</a>



							<a href="<?php echo base_url() ?>freelancer/team" class="current">Employee</a>

						</div>

					</div>

					<div class="container-fluid">

						<div class="content-box no-border-radius">

							<!-- <div class="content-header">

								<h1>Employee List</h1>


							</div> -->

							<!-- <hr/> -->




							<!-- Main content -->

								<div class="row">
									<div class="col-md-12">
										<div class="box box-success">

								<!-- 	<div class="emp-details mt-4"> -->
                                     <div class="with-border">
										<h3 class="box-title">Employees List</h3>
                    <a data-toggle="modal" data-target="#addemployee" class="pull-right btn btn-success">Add Employee</a>

                    <!-- add employee -->
                    <div id="addemployee" class="modal fade" role="dialog">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Employee</h4>
               </div>
               <div class="modal-body">

                <div class="form-group">
                  <label>Name<span class="red-text">*</span></label>
                  <input placeholder="Please enter name" type="text"  id="name" ng-model="name" ng-value="name"  class="form-control title required"  >
                   <p ng-show="submitc && name == ''" class="text-danger">Name is required.</p>
                </div>

                <div class="form-group">
                   <label>Email<span class="red-text">*</span></label>
                   <input placeholder="Please enter email" type="text"  id="email" ng-model="email" ng-value="email"  class="form-control title required"  >
                    <p ng-show="submitc && email == ''" class="text-danger">Email is required.</p>
                    <p ng-cloak ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>

                 </div>


                 <div class="form-group">
                  <label>Phone<span class="red-text">*</span></label>
                   <input placeholder="Please enter phone" type="text"  id="phone" ng-model="phone" ng-value="phone"  class="form-control title required"  >
                   <p ng-show="submitc && phone == ''" class="text-danger">Phone is required.</p>
                 </div>

                 <div class="form-group">
                  <label>Address<span class="red-text">*</span></label>
                   <input placeholder="Please enter address" type="text"  id="address" ng-model="address" ng-value="address"  class="form-control title required"  >
                   <p ng-show="submitc && address == ''" class="text-danger">Address is required.</p>
                 </div>

                 <div class="form-group">
                  <label>Skype<span class="red-text">*</span></label>
                   <input placeholder="Please enter skype" type="text"  id="skype" ng-model="skype" ng-value="skype"  class="form-control title required"  >
                   <p ng-show="submitc && skype == ''" class="text-danger">Skype is required.</p>
                 </div>

                 <div class="form-group">
                  <label>Experience<span class="red-text">*</span></label>
                   <input placeholder="Please enter experience" type="text"  id="experience" ng-model="experience" ng-value="experience"  class="form-control title required"  >
                   <p ng-show="submitc && experience == ''" class="text-danger">Experience is required.</p>
                 </div>


               <div class="form-group">
                <label>Skill<span class="red-text">*</span></label>
                <input onkeyup="angular.element(this).scope().servicekeyup(this)" placeholder="Please enter skill" type="text"  id="skill"   class="form-control title required"  >
                <ul  if-ng="services.length != 0" >
                  <li hand ng-repeat="(key,x) in services" ng-click="selectService(key)" value="{{ x.id }}">{{ x.name }}</li>
                </ul>
                <p ng-show="submitc && skill.length == 0" class="text-danger">Skill is required</p>
              </div>

              <div ng-if="skill.length != 0" id="tags">
                <a ng-repeat="(key,x) in skill"  > {{ x.name }}<span hand ng-click="removeService(key)" > &times; </span></a>
              </div>

              <div class="form-group">
               <label>Salary<span class="red-text">*</span></label>
                <input  placeholder="Please enter salary" type="text"  id="salary" ng-model="salary" ng-value="salary"  class="form-control title required"  >
                <p ng-show="submitc && salary == ''" class="text-danger">Salary is required.</p>
              </div>

              </div>
               <div class="modal-footer">
                 <button type="button" ng-click="saveemployee()" class="btn btn-success" >Submit</button>
               </div>
             </div>

           </div>
         </div>
                    <!-- add employee -->
									</div>



						         <table id="empTable" class="display table-bordered" style="width:100%">
                      <thead>
											 <tr>

													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Address</th>

													<th>Action</th>
												</tr>
                      </thead>
                        <tbody>
            <tr ng-if="teams.length != 0" ng-repeat="(key,x) in teams" ng-init="teams = key">
              <td>{{ x.name  }}</td>
							<td>{{ x.email }}</td>
              <td>{{ x.phone }}</td>
							<td>{{ x.address  }}</td>


							<td>

							 <a ng-click="edit_employee(x.id)" class="openDialog no-border-radius" title="Edit"  ><i class="fa fa-pencil-square-o"></i></a>
               <a ng-click="delete_confirm(key,x.id)" class="trigger-btn" data-toggle="modal" class="pointer delme_case" title="Delete" ><i class="fa fa-times mr-0"></i></a>
              </td>
						</tr>

      	<tr ng-if="teams.length == 0">
						<td ng-if="teams.length == 0" colspan="3"> Sorry no record found. </td>
       	</tr>


                        </tbody>
											</table>
                       <div id="pagination"></div>

													<!-- 	 edit team -->
                          <div id="Editemployee" class="modal fade" role="dialog">
                 <div class="modal-dialog">

                   <!-- Modal content-->
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Employee</h4>
                     </div>
                     <div class="modal-body">

                      <div class="form-group">
                        <label>Name<span class="red-text">*</span></label>
                        <input placeholder="Please enter name" type="text"  id="name" ng-model="name" ng-value="name"  class="form-control title required"  >
                         <p ng-show="updatesubmit && name == ''" class="text-danger">Name is required.</p>
                      </div>

                      <div class="form-group">
                         <label>Email<span class="red-text">*</span></label>
                         <input placeholder="Please enter email" type="text"  id="email" ng-model="email" ng-value="email"  class="form-control title required"  >
                          <p ng-show="updatesubmit && email == ''" class="text-danger">Email is required.</p>
                          <p  ng-show="email != '' && emailvalide" class="text-danger">Please enter valid email address.</p>

                       </div>


                       <div class="form-group">
                        <label>Phone<span class="red-text">*</span></label>
                         <input placeholder="Please enter phone" type="text"  id="phone" ng-model="phone" ng-value="phone"  class="form-control title required"  >
                         <p ng-show="updatesubmit && phone == ''" class="text-danger">Phone is required.</p>
                       </div>

                       <div class="form-group">
                        <label>Address<span class="red-text">*</span></label>
                         <input placeholder="Please enter address" type="text"  id="address" ng-model="address" ng-value="address"  class="form-control title required"  >
                         <p ng-show="updatesubmit && address == ''" class="text-danger">Address is required.</p>
                       </div>

                       <div class="form-group">
                        <label>Skype<span class="red-text">*</span></label>
                         <input placeholder="Please enter skype" type="text"  id="skype" ng-model="skype" ng-value="skype"  class="form-control title required"  >
                         <p ng-show="updatesubmit && skype == ''" class="text-danger">Skype is required.</p>
                       </div>

                       <div class="form-group">
                        <label>Experience<span class="red-text">*</span></label>
                         <input placeholder="Please enter experience" type="text"  id="experience" ng-model="experience" ng-value="experience"  class="form-control title required"  >
                         <p ng-show="updatesubmit && experience == ''" class="text-danger">Experience is required.</p>
                       </div>


                     <div class="form-group">
                      <label>Skill<span class="red-text">*</span></label>
                      <input onkeyup="angular.element(this).scope().servicekeyup(this)" placeholder="Please enter skill" type="text"  id="skill"   class="form-control title required"  >
                      <ul  if-ng="services.length != 0" >
                        <li hand ng-repeat="(key,x) in services" ng-click="selectService(key)" value="{{ x.id }}">{{ x.name }}</li>
                      </ul>
                      <p ng-show="updatesubmit && skill.length == 0" class="text-danger">Skill is required</p>
                    </div>

                    <div ng-if="skill.length != 0" id="tags">
                      <a ng-repeat="(key,x) in skill"  > {{ x.name }}<span hand ng-click="removeService(key)" > &times; </span></a>
                    </div>

                    <div class="form-group">
                     <label>Salary<span class="red-text">*</span></label>
                      <input  placeholder="Please enter salary" type="text"  id="salary" ng-model="salary" ng-value="salary"  class="form-control title required"  >
                      <p ng-show="updatesubmit && salary == ''" class="text-danger">Salary is required.</p>
                    </div>

                    </div>
                     <div class="modal-footer">
                       <button type="button" ng-click="updateEmployee()" class="btn btn-success" >Update</button>
                     </div>
                   </div>

                 </div>
               </div>

													<!-- edit team -->
											 <!-- delete confirm modal -->
											 <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
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
					 <button type="button" ng-click="delete_employee(id)" class="btn btn-danger" id="confirm">Delete</button>

	         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	       </div>
	     </div>
	   </div>
	 </div>
											 <!-- delete confirm modal -->


									</div>
					               </div>

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


<!--end-main-container-part-->
