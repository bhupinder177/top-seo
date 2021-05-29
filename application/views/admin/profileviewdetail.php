<?php include('sidebar.php'); ?>
<div id="wrapper" class="content-wrapper">
<section class="content-header">
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a> ></li>
<li class="active"><?php
 if($user->type == 2)
 {
  echo $userdetail->c_name;
 }
 else if($user->type == 3)
  {
    echo $userdetail->name;
  }
  ?> Profile View Details</li>
</ol>
</section>

<section class="content">
<div  class="box box-success" >
<div class="box-header p-3">
<div class="row">
<div class="col-md-4"><h3 class="box-title mb-0"><?php if($user->type == 2){ echo $userdetail->c_name; } else{ echo $userdetail->name; } ?> Profile View Details</h3> </div>

</div>

</div>
<div class="box-body">
<div id="chartContainer" class="dialog" style="height: 250px; width: 100%;"></div>
</div>

</div>

</section>
</div>
