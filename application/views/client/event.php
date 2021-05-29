

<!--main-container-part-->
<?php

include('sidebar.php');
?>

  <!-- Content Wrapper. Contains page content -->
  <div id="wrapper" class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Event</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Event</li>
      </ol>
    </section>


<section class="content">

	<div class="container1" >

	<!-- get sidebar -->

		<div class="row no-margin user-dashboard-container">

			<div class="col-2 no-padding">



			</div>

			<div class="col-10 no-padding">

				<div id="content">



					<div class="container-fluid">

						<div class="content-box no-border-radius">

							<div class="row">
               <!-- content -->

							 <div class="col-md-12 no-padding-right">

			 <div ng-cloak class="box box-success" ng-controller="CalendarCtrl" ng-app="demo">

				 <div class="box-header with-border">

					 <h3 class="box-title">Event</h3>

				 </div>

				 <div class="box-body">

           <!-- calendar -->


           <!-- <div class="demo-container">
             <section   class="container demo">

               <div class="demo-calendar">
                 <div fc fc-options="calendarOptions" ng-model="events" class="calendar">
                 </div>
               </div>

             </section>
           </div> -->
					 <div ui-calendar="uiConfig.calendar" ng-if="eventSources.length != 0" ng-model="eventSources"></div>



             <!-- modal -->
						 <div id="addevent" class="modal fade" role="dialog">
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Event {{ attendee.name }} </h4>
       </div>
       <div class="modal-body">
        <div class="form-group">
					<label>Title</label>
					<input type="text"  id="title" ng-model="title" >
						<p ng-show="Submit && title == ''" class="text-danger">Title is required.</p>
				</div>
				<div class="form-group">
					<label>Time</label>
					<input type="time"  id="time" ng-model="time" >
					<p ng-show="Submit && time == ''" class="text-danger">Time is required.</p>
				</div>
				<div class="form-group">
					<label>Note</label>
					<textarea type="time" id="note" ng-model="note" ></textarea>
					<p ng-show="Submit && note == ''" class="text-danger">Note is required.</p>
				</div>

       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-success" ng-click="submitevent()" >Submit</button>
       </div>
     </div>

   </div>
 </div>
						 <!-- modal -->

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>
</div>
