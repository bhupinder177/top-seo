

<div class="blog-section single-blog" >
  <div class="container">


    <div class="blog-details ">
      <div class="row">
        <div class="col-sm-12">




          <div class="blog-content">
              <h1>Event Calendar <?php echo date("Y"); ?></h1>
            <h2><?php echo ucwords($result->title); ?></h2>
              <ul>
               <li><b>Name:</b> <?php echo $result->contactPerson; ?></li>
               <li><b>phone :</b> <?php echo $result->phone; ?></li>
               <li><b>Website:</b> <?php echo $result->website; ?></li>
               <li><b>Location:</b> <?php echo $result->location; ?></li>
               <li><b>Organizers:</b> <?php echo $result->organizers; ?></li>
              <li><b>Start Date:</b> <?php echo $result->startDate; ?></li>
              <li><b>End Date:</b> <?php echo $result->endDate; ?></li>
              </ul>
              <div class="clearfix"></div>
              <div class="overview">
                  <h3>Event Overview</h3>
                  <p><?php echo $result->about;  ?></p>
                  </div>
    </div>
        </div>
      </div>
    </div>
  </div>
</div>
