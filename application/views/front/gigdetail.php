
<div ng-cloak ng-app="myApp16" ng-controller="myCtrt16">

  <!-- image section -->
  <div id="gigCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php if(!empty($images))
      {
        $i = 0;
        foreach($images as $k=>$r)
        {
        ?>
      <li data-target="#gigCarousel" data-slide-to="<?php echo $k; ?>" class="<?php if($i == $k){ ?>active<?php } ?>"></li>
    <?php } } ?>
      <!-- <li data-target="#gigCarousel" data-slide-to="1" class=""></li> -->
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php if(!empty($images))
      {
        $i = 0;
        foreach($images as $k=>$r)
        {
        ?>
      <div class="item <?php if($i == $k){ ?>active <?php } ?>">
        <img src="<?php echo base_url(); ?>assets/gig/<?php echo $r->image; ?>">
      </div>
    <?php } } ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#gigCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#gigCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- image section -->
  <div class="clearfix"></div>
  <div class="main mt-4">
  <div class="container">
  <div class="row">
  <div class="col-md-8">
  <h3><?php echo ucwords($result->title); ?></h3>
  <div class="right-side-info">
  <p><?php echo $result->description; ?></p>
  <hr>
  <p>Service : <b><?php echo $result->services; ?></b></p>
  <p>Industry : <b><?php echo $result->industry; ?></b></p>
  </div>
  </div>
  <div class="col-md-4">
  <h3>Seller details</h3>
  <div class="right-side-info">
    <?php if(!empty($user))
    {
      ?>
  <p><span>Name :</span> <b><a target="_blank" href="<?php echo base_url(); ?>profile/<?php echo $name = str_replace(' ','-',strtolower($user->c_name.'-'.$user->u_id)); ?>"><?php echo $user->name; ?></a></b></p>
  <?php if(!empty($user->c_name))
     {
       ?>
  <p><span>Company :</span><b><?php echo $user->c_name; ?></b></p>
<?php } ?>
  <p><span>Country :</span> <b><?php echo $user->country; ?></b></p>
  <p><span>Gigs : </span><b><?php echo $gigcount; ?></b></p>
  <p><span>Earning : </span> <b><?php echo $totalearning; ?></b></p>
  <p><span>Success Score : </span><b><?php echo $user->successScore; ?>%</b></p>
<?php } ?>
  </div>
  </div>
  </div>
  </div>
  </div>





<!-- review section -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider" class="owl-carousel">
                     <?php

                     if(!empty($review))
                     {
                       foreach($review as $r)
                       {
                       ?>
                    <div class="testimonial">

                        <p class="description">
                            <?php echo substr($r->reviewOverall, 0, 270); ?>
                        </p>
                       <div class="mainreview testimonial-content">
                            <div class="reviewer-name"><?php echo $r->name; ?></div>
                            <div class="reviewer-star">
                              <span>
                              <i class="fa fa-star <?php if($r->score >= 1){ ?>checked <?php } ?>"></i>
                              <i class="fa fa-star <?php if($r->score >= 2){ ?>checked <?php } ?>"></i>
                              <i class="fa fa-star <?php if($r->score >= 3){ ?>checked <?php } ?>"></i>
                              <i class="fa fa-star <?php if($r->score >= 4){ ?>checked <?php } ?>"></i>
                              <i class="fa fa-star <?php if($r->score >= 5){ ?>checked <?php } ?>"></i>
                              </span>
                          </div>
                        </div>
                    </div>
                  <?php } } ?>

                </div>
            </div>
        </div>
    </div>

  <!-- review section -->


  <div class="clearfix"></div>
  <div class="main mt-4">
  <div class="container">
  <div class="container-main">
  <ul class="nav nav-tabs">

  <li ng-repeat="(key,x) in plan" ng-click="changeplan(key)" ng-class="{ 'active' :  x.user_gig_planId == selectedplan }"  ><a>
    <span ng-if="x.plan == 1">Basic</span>
    <span ng-if="x.plan == 2">Standard</span>
    <span ng-if="x.plan == 3">Premium</span></a></li>
  </ul>

  <div class="tab-content">

  <div id="base"  ng-repeat="(key,x1) in plan" ng-show="x1.user_gig_planId == selectedplan" class="">
  <div class="add-on">
  <div  class="task-div">
  <p ng-repeat="(key3,x2) in x1.task" class="d-flex"><span>Task {{ key3 + 1 }}</span><b>{{ x2.name }}</b></p>
  <p class="d-flex"><span>Description</span><b> {{ x1.description }}</b></p>
  <p class="d-flex"><span>Price</span><b>  {{ result.code }} {{ result.symbol }} {{ x1.amount }}</b></p>
  <p class="d-flex"><span>Duration</span><b>{{ x1.duration }} Days</b></p>
  </div>
  </div>
  </div>

<?php

if(isset($this->session->userdata['clientloggedin']))
{
if($this->session->userdata['clientloggedin']['type'] == 4 )
{
  ?>

<div ng-if="gigalreadybuy == 0" class="text-center"><button ng-click="confirm()" class="btn read-btn">Buy</button></div>
<div ng-if="gigalreadybuy == 1" class="text-center"><button  class="btn read-btn">Purchased</button></div>
<?php
   }

}
else
{
  ?>
  <div class="text-center"><a target="_blank" href="<?php echo base_url(); ?>login" class="btn read-btn">Buy</a></div>
  <?php
}
   ?>
  </div>

  </div>
  </div>
  </div>
    <!-- ****************** confirm************************ -->
    <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">

           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

           <h4  class="modal-title" id="myModalLabel">Are you sure you want to buy {{ selectedplanName }} Plan ?</h4>

         </div>
         <div class="modal-footer">
           <a  ng-click="buyplan()" ng-class="{'disabled': 1 == disabled}" ng-disabled="disabled" class="btn btn-success mb-0" id="yes">Buy</a>
           <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>

         </div>

       </div>

     </div>

    </div>
    <!-- ****************** confirm************************ -->
</div>
