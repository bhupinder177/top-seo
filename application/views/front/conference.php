

<div ng-cloak class="blog-section conference" ng-app="myApp12" ng-controller="myCtrt12" >
    <div class="container">
     <div class="conference-form">
        <!-- col-md-6 -->
        <h4>Conference Details</h4>
         <div class="row">
             <div class="col-sm-6">
        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" placeholder="Please enter title" class="form-control" ng-model="title" ng-value="title">
          <p ng-show="csubmit && title == ''" class="text-danger">Title is required.</p>

         </div>
</div>
              <div class="col-sm-3">
       <div class="form-group">
         <label>Start Date</label>
         <!-- mydatepicker -->
         <input readonly id="startdate" placeholder="Please enter start date"  type="text" name="startdate" class="form-control" ng-model="startdate" ng-value="startdate">
         <p ng-show="csubmit && startdate == ''" class="text-danger">Start date is required.</p>
                  </div>
        </div>
 <div class="col-sm-3">
      <div class="form-group">
        <label>End date</label>
        <input readonly id="enddate" placeholder="Please enter end date" type="text" name="enddate" class="form-control" ng-model="enddate" ng-value="enddate">
        <p ng-show="csubmit && enddate == ''" class="text-danger">End date is required.</p>
     </div>
       </div>
 <div class="col-sm-6">
     <div class="form-group">
       <label>Url</label>
       <input type="text" name="url" placeholder="Please enter url" class="form-control" ng-model="url" ng-value="url">
       <p ng-show="csubmit && url == ''" class="text-danger">Url is required.</p>
       <p ng-show="csubmit && url != '' && urlvalide " class="text-danger">Please enter valide url.</p>

     </div>
      </div>
              <div class="col-sm-6">
     <div class="form-group">
       <label>Location</label>
       <input type="text" name="location" placeholder="Please enter location" class="form-control" ng-model="location" ng-value="location">
       <p ng-show="csubmit && location == ''" class="text-danger">Location is required.</p>
                  </div>
      </div>

      <div class="col-sm-12">
    <h4>Conference Organizers</h4>
             </div>
             <div class="col-sm-6">
    <div class="form-group">
      <label>Contact Person</label>
      <input type="text" name="person" placeholder="Please enter contact person" class="form-control" ng-model="person" ng-value="person">
      <p ng-show="csubmit && person == ''" class="text-danger">Contact Person is required.</p>
                 </div>
     </div>
<div class="col-sm-6">
   <div class="form-group">
     <label>Phone Number</label>
     <input numbers-only="numbers-only" placeholder="Please enter phone number" type="text" name="text" class="form-control" ng-model="phone" ng-value="phone">
     <p ng-show="csubmit && phone == ''" class="text-danger">Phone number is required.</p>
     <p ng-show="csubmit && phone != '' && phone.length < 10 " class="text-danger">Please enter valid phone number.</p>
    </div>
    </div>
<div class="col-sm-6">
  <div class="form-group">
    <label>Website</label>
    <input type="text" name="website" placeholder="Please enter website" class="form-control" ng-model="website" ng-value="website">
    <p ng-show="csubmit && website == ''" class="text-danger">Website is required.</p>
    <p ng-show="csubmit && website != '' && websitevalide " class="text-danger">Please enter valide website url.</p>
    </div>
   </div>
             <div class="col-sm-6">
   <div class="form-group">
     <label>Organizer</label>
     <input type="text" name="organizers" placeholder="Please enter organizer" class="form-control" ng-model="organizers" ng-value="organizers">
     <p ng-show="csubmit && organizers == ''" class="text-danger">Organizer is required.</p>
                 </div>
    </div>
<div class="col-sm-12">
 <div class="form-group">
   <label>About</label>
   <textarea type="text"   name="about" placeholder="Please enter about" class="form-control ckeditor" ng-model="about" ng-value="about"></textarea>
   <p ng-show="csubmit && about == ''" class="text-danger">About is required.</p>
    </div>
  </div>



<div class="col-md-12">
  <input type="button" ng-click="submitconference()" class="btn search-btn" name="submit" value="submit">
</div>
<!-- col-md-6 -->
   </div>

        </div>
        <h1>Event Calendar <?php echo date("Y"); ?></h1>

            <?php
             if(!empty($conferences))
             {
               foreach($conferences as $c)
               {

             ?>

                <div class="blog-details">
                  <div class="row">

            <div class="col-sm-12">
            <div class="blog-content">

                <h2><a href="<?php echo base_url(); ?>conference/detail/<?php echo $c->id; ?>"><?php echo ucwords($c->title); ?></a></h2>

             <b>Location: <?php echo $c->location; ?></b>
              <p><?php echo substr($c->about, 0, 270);  ?> <a class="read-more" href="<?php echo base_url(); ?>conference/detail/<?php echo $c->id; ?>" class="readmore">Read More</a></p>
                 </div>
               </div>
             </div>
                 </div>

             <?php } ?>
             <div class="text-center" id="pagination">
       <?php echo $links; ?>
</div>
    </div>
           <?php
            }
             else
             {
            ?>
            <div>No Conference</div>
            <?php
             }
             ?>


      </div>
