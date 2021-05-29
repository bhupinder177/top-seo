<div class="footer">
    <p class="mb-0">Copyright &copy; 2020 Top-SEOs All Rights Reserved.</p>
</div>
</div>
<!-- new -->
<script src="<?php echo base_url(); ?>assets/dashboard/js/jquery.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/dashboard/js/jquery-3.2.1.slim.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/dashboard/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/bootstrap.min.js"></script>
<!--wow-js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <!-- added custom -->
  <script src="<?php echo base_url(); ?>assets/js/notify.js" type="text/javascript" charset="utf-8"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://cdn.rawgit.com/Luegg/angularjs-scroll-glue/master/src/scrollglue.js"></script>
<script src="//cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.simplePagination.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/notify.js"></script>
<!-- country code -->
<script src="<?php echo base_url(); ?>assets/dashboard/countrycode/js/intlTelInput.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/countrycode/js/isValidNumber.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/imagecropper.js"></script>
<!-- country code -->
<!-- timepicker -->
<script src="<?php echo base_url(); ?>assets/dashboard/timepicker/timepicki.js"></script>
<script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
<!-- added custom -->
<!-- chart -->
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- chart -->
<script>
    new WOW().init();
    $(document).ready(function() {
        $('.app-sidebar__toggle').on('click', function() {
            $('.main_wrapper').toggleClass('active')
        });
     });
</script>

<script>

window.onload = function () {

  <?php if(!empty($profileview))
  {

    ?>
    var data2 = <?php echo json_encode($profileview); ?>;
    for(var a in data2)
    {
      data2[a].y = Number(data2[a].y);
    }
var options = {
	animationEnabled: true,
	title: {
		text: ""
	},
	axisY: {
		title: "",
		suffix: "",
		includeZero: false
	},
	axisX: {
		title: "Dates"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.0#"%"",
		dataPoints: data2
	}]
};


	$("#chartContainer").CanvasJSChart(options);

<?php } ?>
}
</script>

<!-- calender -->
<script>

function myFunction() {
  var elmnt = document.getElementById("bottom");
  var x = elmnt.scrollLeft;
  var y = elmnt.scrollTop;
   // console.log(x);
   //console.log(y);
   if(y == 0)
   {
    angular.element(document.getElementById('chatcontroller')).scope().lastMessages();
   }
}
 CKEDITOR.replaceClass = 'ckeditor';
 $(document).ready(function(){

 	$(".navbar-toggler").click(function(){

 		$("#content").toggleClass('mobile');
 		//   $("#sidebar").animate({left: '250px'});

     });
	 });
/////////////////// registration form submit


// all freelancer
var app1 = angular.module('myApp1', [])
// app1.filter('date', function () {
//   return function (item) {
//     var dates = new Date(Date.parse(item))
//      var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
//     return newDate;
//   };
// });
app1.filter('date', function () {
  return function (item) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
  ];
  var dates = new Date(Date.parse(item))
  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
  return newDate;
};
});
app1.controller('myCtrt1', function($scope,$window,$http) {

$scope.page = 1;
$scope.freelancers = [];
$scope.total = 0;
$scope.id ='';
$scope.key ='';
$scope.searchtext = '';


$scope.freelancer = function ($event)
{
	var obj = {  page : $scope.page,searchtext:$scope.searchtext  }

  $http({
		url: '<?php echo base_url(); ?>admin/getfreelancer',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

	  $scope.freelancers = response.data.result;
    $scope.total = response.data.pcount;

		if($scope.page == 1)
    $scope.pagination($scope.total);
	    });
}

$scope.pagination = function ($event)
{
	if($scope.total > 10)
	{
		$('#pagination').pagination({
			items: $event,
			itemsOnPage: 10,
			cssStyle: 'light-theme',
			onPageClick:  function (e) {
				$scope.page  = e;
			//	console.log($scope.page);
 				$scope.freelancer();
 			   }
 	   });
    }
    else
    {
      $('#pagination').html('');
    }
 }


 $scope.userStatus = function(st,key,uId)
 {
	var obj = {  userId : uId,status : st  };
	$http({
		url: '<?php echo base_url(); ?>admin/userStatus',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

			if(response.data.message == "true")
		 {

			 $scope.freelancers[key]['is_active'] = st;
			 $.notify("Status Changed successfully", "success");
		 }

			});
 }

 $scope.Viewprofile = function(id)
 {

	 var obj = {  userId : id };
	$http({
		url: '<?php echo base_url(); ?>admin/userprofile',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

			if(response.data.message == "true")
		 {
			 $scope.Viewd = response.data.result;
			 // $scope.services = response.data.service;
			 $("#userModal").modal('show');
		 }

			});

 }

  $scope.confirm = function(key,id)
  {
    $scope.id = id;
    $scope.key = key;
    angular.element('#Delete').modal('show');
  }

  $scope.delete = function()
 {
 var obj = {  userId : $scope.id}

  $http({
    url: '<?php echo base_url(); ?>admin/deleteuser',
    method: "POST",
    data: obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    if(response.data.message == "true")
    {
      angular.element("#Delete").modal('hide');
      $.notify("Freelancer Deleted Successfully", "success");
      $scope.page = 1;
      $scope.freelancer();
    }

  });

 }

 $scope.search = function ()
 {

  $scope.freelancer();
 }

$scope.freelancer();
});
// all freelancer end
//all client

var app2 = angular.module('myApp2', [])

// app2.filter('date', function () {
//   return function (item) {
//     var dates = new Date(Date.parse(item))
//      var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
//     return newDate;
//   };
// });

app2.filter('date', function () {
  return function (item) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
  ];
  var dates = new Date(Date.parse(item))
  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
  return newDate;
};
});

app2.controller('myCtrt2', function($scope,$window,$http) {

$scope.page = 1;
$scope.clients = [];
$scope.total = 0;
$scope.Viewd =[];
$scope.services=[];
$scope.searchtext ='';

$scope.client = function ($event)
{
	var obj = {  page : $scope.page,searchtext:$scope.searchtext  }

  $http({
		url: '<?php echo base_url(); ?>admin/getclient',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

	  $scope.clients = response.data.result;
    $scope.total = response.data.pcount;

		if($scope.page == 1)
    $scope.pagination($scope.total);
	    });
}

$scope.pagination = function ($event)
{
	if($scope.total > 10)
	{
		$('#pagination').pagination({
			items: $event,
			itemsOnPage: 10,
			cssStyle: 'light-theme',
			onPageClick:  function (e) {
				$scope.page  = e;
 				$scope.client();
 			   }
 	    });
   }
 }

 $scope.userStatus = function(st,key,uId)
 {
	 var obj = {  userId : uId,status : st  };
 	$http({
 		url: '<?php echo base_url(); ?>admin/userStatus',
 		method: "POST",
 		data: obj,
 		headers: {
 			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 		}
 	}).then(function(response) {

 			if(response.data.message == "true")
 		 {

 			 $scope.clients[key]['is_active'] = st;
 			 $.notify("Status Changed successfully", "success");
 		 }

 			});
 }

 $scope.Viewprofile = function(id)
 {

	 var obj = {  userId : id };
	$http({
		url: '<?php echo base_url(); ?>admin/userprofile',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

			if(response.data.message == "true")
		 {
			 $scope.Viewd = response.data.result;
			 // $scope.services = response.data.service;
			 $("#userModal").modal('show');
		 }

			});

 }

 $scope.confirm = function(key,id)
 {
   $scope.id = id;
   $scope.key = key;
   angular.element('#Delete').modal('show');
 }

 $scope.delete = function()
{
var obj = {  userId : $scope.id}

 $http({
   url: '<?php echo base_url(); ?>admin/deleteuser',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

   if(response.data.message == "true")
   {
     angular.element("#Delete").modal('hide');
     $.notify("Client Deleted Successfully", "success");
     $scope.page = 1;
     $scope.client();
   }

 });

 }

 $scope.search = function ()
 {
   $scope.client();
 }

$scope.client();
});
// all client end


///////client jobs
<?php
if(!empty($jobclientId))
{
	?>
var app3 = angular.module('myApp3', [])

app3.filter('underscoreless', function () {
  return function (input) {
	   	return input.split(' ').join('-');

  };
});


app3.controller('myCtrt3', function($scope,$window,$http) {
	$scope.milestones = [];
	$scope.total = 0
	$scope.image = '';
	$scope.jobtitle ='';
	$scope.description ='';

$scope.page = 1;
$scope.jobs = [];
$scope.total1 = 0;



$scope.job = function ($event)
{
	var obj = {  page : $scope.page ,userId : <?php if(!empty($jobclientId)){ echo $jobclientId; } ?>  }

  $http({
		url: '<?php echo base_url(); ?>admin/getclientjob',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

	  $scope.jobs = response.data.result;
    $scope.total1 = response.data.pcount;

		if($scope.page == 1)
    $scope.pagination($scope.total1);
	    });
}

$scope.pagination = function ($event)
{
	if($scope.total1 > 10)
	{
		$('#pagination').pagination({
			items: $event,
			itemsOnPage:10,
			cssStyle: 'light-theme',
			onPageClick:  function (e) {
				$scope.page  = e;
 				$scope.job();
 			}
 	  });
	 }
 }

$scope.job();
});
<?php } ?>
///////client jobs end

//////// freelancer jobs

<?php
if(!empty($jobfreelancerId))
{
	?>
var app4 = angular.module('myApp4', [])

app4.filter('underscoreless', function () {
  return function (input) {
	   	return input.split(' ').join('-');

  };
});


app4.controller('myCtrt4', function($scope,$window,$http) {
 $scope.page = 1;
 $scope.jobs = [];
 $scope.total = 0;



$scope.job = function ($event)
{
	var obj = {  page : $scope.page ,userId : <?php if(!empty($jobfreelancerId)){ echo $jobfreelancerId; } ?>  }

  $http({
		url: '<?php echo base_url(); ?>admin/getfreelancerjob',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

	  $scope.jobs = response.data.result;
    $scope.total = response.data.pcount;

		if($scope.page == 1)
    $scope.pagination($scope.total1);
	    });
}

$scope.pagination = function ($event)
{
	if($scope.total > 10)
	{
		$('#pagination').pagination({
			items: $event,
			itemsOnPage: 10,
			cssStyle: 'light-theme',
			onPageClick:  function (e) {
				$scope.page  = e;
 				$scope.job();
 			     }
    	 });
		}
 }

$scope.job();
});
<?php } ?>

/////////// freelancer jobs

///industries

var app5 = angular.module('myApp5', [])

app5.controller('myCtrt5', function($scope,$window,$http) {
 $scope.page = 1;
 $scope.industries = [];
 $scope.total = 0;
 $scope.key ='';
 $scope.id ='';
 $scope.name ='';
 $scope.editname ='';
 $scope.status ='';
 $scope.editstatus ='';
 $scope.services = [];
 $scope.linkeddata = [];
 $scope.searchtext ='';
 $scope.update = 0;



$scope.getIndustries = function ($event)
{
	var obj = {  page : $scope.page ,search:$scope.searchtext  }

  $http({
		url: '<?php echo base_url(); ?>admin/getindustry',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

	  $scope.industries = response.data.result;
    $scope.total = response.data.pcount;

		if($scope.page == 1)
    $scope.pagination($scope.total);
	    });
}

$scope.pagination = function ($event)
{
	if($scope.total > 10)
	{
		$('#pagination').pagination({
			items: $event,
			itemsOnPage: 10,
			cssStyle: 'light-theme',
			onPageClick:  function (e) {
				$scope.page  = e;
 				$scope.getIndustries();
 			 }
 	   });
   }
	 else
	 {
		 $('#pagination').html('');
   }
 }

 $scope.deletemodal = function(key,id)
 {
	 $scope.key = key;
	 $scope.id = id;
	 angular.element("#Delete").modal('show');

 }

 $scope.deleteIndustries = function()
 {
	 var obj = {  id : $scope.id }

 	$http({
 		url: '<?php echo base_url(); ?>admin/deleteindustry',
 		method: "POST",
 		data: obj,
 		headers: {
 			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 		}
 	}).then(function(response) {

 		if(response.data.message == "true")
 		{
 			angular.element("#Delete").modal('hide');
 			$.notify("industries deleted Successfully", "success");
 			//$scope.industries.splice($scope.key,1);
      $scope.page = 1;
			$scope.getIndustries();
 		}

 	});

 }

 $scope.industriesSave = function()
 {
	 $scope.submitind = true;
	 error = false;
	 $scope.name = angular.element("#name").val();
	 $scope.status = angular.element("#status").val();
	 if($scope.name == '' || $scope.status == '')
	 {
		 error = true;
	 }

	 // console.log(error);

	 if(error == true)
	 {
		 return false;
	 }

	 var obj = {  name : $scope.name,status:$scope.status }

 	$http({
 		url: '<?php echo base_url(); ?>admin/saveindustry',
 		method: "POST",
 		data: obj,
 		headers: {
 			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 		}
 	}).then(function(response) {

 		if(response.data.success == "1")
 		{
      angular.element("#name").val('');
			angular.element("#status").val();

 			$.notify("industries  Successfully added", "success");
			$scope.getIndustries();
    }
		else if(response.data.success == "2")
 		{
 			$.notify("industries already register", "error");
    }
		else if(response.data.success == "0")
		{
			$.notify("industries is not insert", "error");
		}

 	});
 }


 $scope.linkedto = function(key1,id,name)
 {
	 var obj = {};
	  obj['id'] = id;
	  obj['name'] = name;

				 //if($scope.linkeddata[res]['id'] != obj['id'] )
				 //{
					 	     $scope.linkeddata.push(obj);
								 $scope.services.splice(key1,1);
				 //}

 }



 $scope.deleteservice = function(key,id,name)
 {
	 $scope.linkeddata.splice(key,1);
	 var obj = {};
		obj['id'] = id;
		obj['name'] = name;
		 $scope.services.push(obj);
 }

  $scope.getlinkedservice = function(id)
	{
		var obj = {  id : id }
  	$http({
  		url: '<?php echo base_url(); ?>admin/getlinkedservice',
  		method: "POST",
  		data: obj,
  		headers: {
  			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  		}
  	}).then(function(response) {
         $scope.linkeddata = response.data.result;
				 $scope.services = response.data.services;
         $scope.id = id;
				 angular.element("#industryLinked").modal('show');
  	});
  }

	$scope.editindustry = function(id)
	{
		var obj = {  id : id }
  	$http({
  		url: '<?php echo base_url(); ?>admin/editindustry',
  		method: "POST",
  		data: obj,
  		headers: {
  			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  		}
  	}).then(function(response){
         if(response.data.message == "true")
				 {
          $scope.editname = response.data.result.name;
					$scope.editstatus =response.data.result.status;
					$scope.id = response.data.result.id;
				  $scope.update = 1;
			   }

  	});
  }

	$scope.industriesUpdate = function()
	{
		$scope.submitind = true;
		error = false;
		$scope.editname = angular.element("#editname").val();
		$scope.editstatus = angular.element("#editstatus").val();
		if($scope.editname == '' || $scope.id == '' || $scope.editstatus == '')
		{
			error = true;
		}

		if(error == true)
		{
			return false;
		}

		var obj = {  name : $scope.editname ,id : $scope.id,status : $scope.editstatus}
     angular.element('.preloader').show();
	 $http({
		 url: '<?php echo base_url(); ?>admin/updateindustry',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {
		 angular.element('.preloader').hide();

		 if(response.data.message == "true")
		 {
			 angular.element("#editname").val('');
			 $.notify("industries Updated  Successfully", "success");
			 $scope.getIndustries();
			 $scope.update =0;
			 $scope.submitind = false;
		 }
		 else
		 {
			 $.notify("industries Not Updated ", "error");

		 }
      });
	}



	$scope.savelinkedIndustry = function()
  {

 	 var obj = { industryId :$scope.id, services : $scope.linkeddata }

  	$http({
  		url: '<?php echo base_url(); ?>admin/savelinkedIndustry',
  		method: "POST",
  		data: obj,
  		headers: {
  			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  		}
  	}).then(function(response) {

  		if(response.data.message == "true")
  		{
        $.notify("industries  Successfully linked", "success");
			  angular.element("#industryLinked").modal('hide');
      }

  	});
	}

	$scope.search = function($event)
   {
     $scope.searchtext;
		 $scope.page = 1;
   	$scope.getIndustries();
   }


$scope.getIndustries();
//$scope.getservices();
});
///industries


////services

var app6 = angular.module('myApp6', [])

app6.directive('ngEnter', function () {
	 return function (scope, element, attrs) {
			 element.bind("keydown keypress", function (event) {
					 if (event.which === 13) {
							 scope.$apply(function () {
									 scope.$eval(attrs.ngEnter);
							 });

							 event.preventDefault();
					 }
			 });
	 };
});

app6.controller('myCtrt6', function($scope,$window,$http,$timeout) {
 $scope.page = 1;
 $scope.services = [];
 $scope.total = 0;
 $scope.key ='';
 $scope.id ='';
 $scope.name ='';
 $scope.servicetags = [];
 $scope.update = 0;
 $scope.searchtext = '';
 $scope.status ='';
 $scope.editstatus ='';

$scope.getservices = function ($event)
{
	var obj = {  page : $scope.page ,search:$scope.searchtext  }

  $http({
		url: '<?php echo base_url(); ?>admin/getservices',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

	  $scope.services = response.data.result;
    $scope.total = response.data.pcount;

		if($scope.page == 1)
    $scope.pagination($scope.total);
	    });
}

$scope.pagination = function ($event)
{
	if($scope.total > 10)
	{
		$('#pagination').pagination({
			items: $event,
			itemsOnPage: 10,
			cssStyle: 'light-theme',
			onPageClick:  function (e) {
				$scope.page  = e;
 				$scope.getservices();
 			   }
 	    });
		}
		else
		{
		$('#pagination').html('');
		}
 }

 $scope.deletemodal = function(key,id)
 {
	 $scope.key = key;
	 $scope.id = id;
	 angular.element("#Delete").modal('show');

 }

 $scope.deleteservices = function()
 {
	 var obj = {  id : $scope.id }

 	$http({
 		url: '<?php echo base_url(); ?>admin/deleteservices',
 		method: "POST",
 		data: obj,
 		headers: {
 			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 		}
 	}).then(function(response) {

 		if(response.data.message == "true")
 		{
 			angular.element("#Delete").modal('hide');
 			$.notify("services deleted Successfully", "success");
 			//$scope.services.splice($scope.key,1);
      $scope.perpage =1;
			$scope.getservices();
 		}

 	});

 }



 $scope.servicesSave = function()
 {
	 $scope.submitser = true;
	 error = false;
  $scope.status = angular.element('#status').val();
	 if($scope.servicetags.length == 0 || $scope.status == '')
	 {
		 error = true;
	 }

	 if(error == true)
	 {
		 return false;
	 }

	 var obj = {  name : $scope.servicetags,status:$scope.status }

 	$http({
 		url: '<?php echo base_url(); ?>admin/saveservices',
 		method: "POST",
 		data: obj,
 		headers: {
 			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 		}
 	}).then(function(response) {

 		if(response.data.success == "1")
 		{
			$scope.submitser = false;

       $scope.servicetags =[];
			 angular.element("#status").val('');

       $.notify("service  Successfully added", "success");
			 $scope.getservices();
    }
		else if(response.data.success == "2")
 		{
 			$.notify("service already register", "error");
    }
		else if(response.data.success == "0")
		{
			$.notify("service is not insert", "error");
		}

 	});
 }

 $scope.editservices = function(id)
 {

    var obj = {  id : id }

 	 $http({
 		url: '<?php echo base_url(); ?>admin/editservices',
 		method: "POST",
 		data: obj,
 		headers: {
 			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 		}
 	}).then(function(response) {
       $scope.servicetags =[];
			 $scope.update = 1;
 		  if(response.data.message == "true")
 		  {
				$scope.name = response.data.result['name'];
				$scope.editstatus = response.data.result['status'];
				$scope.id = response.data.result['id'];
      }

 	});


 }


  $scope.updateservices = function()
  {
 	 $scope.submitser = true;
 	 error = false;
  $scope.name = angular.element("#editname").val();
  $scope.editstatus = angular.element("#editstatus").val();
 	 if($scope.name == '' || $scope.editstatus == '')
 	 {
 		 error = true;
 	 }

 	 if(error == true)
 	 {
 		 return false;
 	 }

 	 var obj = {  name : $scope.name,id:$scope.id ,status:$scope.editstatus }

  	$http({
  		url: '<?php echo base_url(); ?>admin/updateservices',
  		method: "POST",
  		data: obj,
  		headers: {
  			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  		}
  	}).then(function(response) {

  		if(response.data.message == "true")
  		{
				$scope.submitser = false;
        $scope.update = 0;
				$scope.name ='';
				angular.element("#editstatus").val('');
       $.notify("Service Update Successfully ", "success");
 			 $scope.getservices();
     }
		 else
		 {
			 $.notify("Service is not Update", "error");
		 }


  	});
  }



 $scope.serviceadd =function ()
 {
	var name = angular.element("#name").val();


	 if($scope.servicetags.indexOf(name) === -1)
	 {
		 $scope.servicetags.push(name);
	 }
	 angular.element("#name").val('');
	 //console.log($scope.servicetags);

 }

 $scope.deleteservice = function (key)
 {
   $scope.servicetags.splice(key,1);
 }

 $scope.search = function($event)
  {
    $scope.searchtext;
		$scope.page = 1;
  	$scope.getservices();
  }

$scope.getservices();
});

/////services

 // ranking content

 var app7 = angular.module('myApp7', [])


 app7.filter('trustAsHtml',['$sce', function($sce) {

 		 return function(text) {

 			 return $sce.trustAsHtml(text);
 					};
 	 }]);

	 app7.filter('underscoreless', function () {
  return function (input)
	{
    if(input)
    {
	   	return input.split(' ').join('-');
    }
  };
});



 app7.controller('myCtrt7', function($scope,$window,$http,$timeout) {

  $scope.services = [];
  $scope.industry = [];
	$scope.country = [];
	$scope.ser ='';
	$scope.ind ='';
	$scope.content ='';
	$scope.page = 1;
	$scope.total =0;
	$scope.ranking =[];
	$scope.co ='';
	$scope.state ='';
	$scope.city ='';
	$scope.id ='';
	$scope.key ='';
  $scope.ci =[];
  $scope.st =[];
  $scope.metaTitle ='';
  $scope.metaDescription ='';
  $scope.heading='';

 $scope.getservices = function ()
 {

$http({
 		url: '<?php echo base_url(); ?>admin/allservices',
 		method: "POST",
 		headers: {
 			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 		}
 	}).then(function(response) {

 	  $scope.services = response.data.result;


 	    });
 }

 $scope.getindustry = function ()
 {

	 $http({
		 url: '<?php echo base_url(); ?>admin/allindustries',
		 method: "POST",
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 $scope.industry = response.data.result;

			 });
 }

 $scope.getcountry = function ()
 {

	$http({
		url: '<?php echo base_url(); ?>admin/allcountry',
		method: "POST",
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

		$scope.country = response.data.result;

			});
 }

 $scope.getstate = function ($event)
 {
   var  id = angular.element($event).val();
   var obj = {  id : id  };

   $http({
     url: '<?php echo base_url(); ?>freelancer/getstate',
     method: "POST",
     data: obj,
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     $scope.st = response.data.result;
   });
 }

     $scope.getcity = function ($event)
     {
       var  id = angular.element($event).val();

       var obj = {  id : id  };

       $http({
         url: '<?php echo base_url(); ?>freelancer/getcity',
         method: "POST",
         data: obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {

         $scope.ci = response.data.result;
       });
     }

 $scope.allcontent = function ()
 {
 	var obj = {  page : $scope.page   }

 $http({
 	 url: '<?php echo base_url(); ?>admin/getrankingContent',
 	 method: "POST",
 	 data:obj,
 	 headers: {
 		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 	 }
  }).then(function(response) {

 	 $scope.ranking = response.data.result;

 	 $scope.total = response.data.pcount;

  	if($scope.page == 1)
  	$scope.pagination($scope.total);
  		});
  }

  $scope.pagination = function ($event)
  {
		if($scope.total > 10)
		{
  	  $('#pagination').pagination({
  		items: $event,
  		itemsOnPage: 10,
  		cssStyle: 'light-theme',
  		onPageClick:  function (e) {
  			$scope.page  = e;
  			$scope.allcontent();
  		   }
      });
    }
 }


  $scope.submitcontent = function()
	{
		$scope.submit = true;
 	  error = false;
	 $scope.content = CKEDITOR.instances['content'].getData();

 	 if($scope.content == '' && $scope.ser == '')
 	 {
 		 error = true;
 	 }

 	 if(error == true)
 	 {
 		 return false;
 	 }

 	 var obj = {  content : $scope.content,servicesId : $scope.ser,industryId:$scope.ind,countryId:$scope.co,stateId:$scope.state,cityId:$scope.city,metaTitle:$scope.metatitle,metaDescription:$scope.metaDescription,heading:$scope.heading }

		$http({
		 		url: '<?php echo base_url(); ?>admin/rankingContentSave',
		 		method: "POST",
				data:obj,
		 		headers: {
		 			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 		}
		 	}).then(function(response) {

			   if(response.data.message == 'true')
			 {
		 	  $.notify("Ranking content Added Successfully ", "success");
				$scope.ser ='';
				$scope.ind ='';
				$scope.co ='';
				$scope.content ='';
        $scope.meta
        $scope.st = [];
        $scope.ci = [];
        $scope.metaTitle = '';
        $scope.metaDescription = '';
        $scope.heading = '';
				 CKEDITOR.instances['content'].setData('');
				 $scope.submit = false;
			  }
		 	    });
	}


	 $scope.deletemodal = function(key,id)
	 {
		$scope.key = key;
		$scope.id = id;
		angular.element("#Delete").modal('show');

	 }

	 $scope.deletecontent = function()
	 {
		var obj = {  id : $scope.id }

		 $http({
			 url: '<?php echo base_url(); ?>admin/rankingContentdelete',
			 method: "POST",
			 data: obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

			 if(response.data.message == "true")
			 {
				 angular.element("#Delete").modal('hide');
				 $.notify("Ranking Content Deleted Successfully", "success");
				 //$scope.services.splice($scope.key,1);
         $scope.perpage = 1;
			 $scope.allcontent();
			 }

		 });

	 }


	   $scope.editContent = function(id)
	 	{
	 		$scope.id = id;
	 		var obj = {  id : id  }

	 		 $http({
	 				 url: '<?php echo base_url(); ?>admin/EditRankingContent',
	 				 method: "POST",
	 				 data:obj,
	 				 headers: {
	 					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 				 }
	 			 }).then(function(response) {

	 					if(response.data.message == 'true')
	 				{
	 					$scope.ser = response.data.result.servicesId;
	  				$scope.ind =response.data.result.industryId;
	  				$scope.co =response.data.result.countryId;
	  				$scope.city =response.data.result.cityId;
	  				$scope.state =response.data.result.stateId;
	  				$scope.st = response.data.state;
	  				$scope.ci = response.data.city;
            $scope.metaTitle = response.data.result.metaTitle;
            $scope.metaDescription = response.data.result.metaDescription;
            $scope.heading = response.data.result.heading;

	 					 CKEDITOR.instances['description1'].setData(response.data.result.content);
	 					angular.element('#editcontent').modal('show');
	 				 }
	 					 });
	 	}

		$scope.updatecontent = function()
		{
			$scope.submitc = true;
	 	error = false;
	 	$scope.content = CKEDITOR.instances['description1'].getData();

	 	if($scope.content == '' || $scope.ser == '' )
	 	{
	 		error = true;
	 	}

	 	if(error == true)
	 	{
	 		return false;
	 	}

		var obj = {  id:$scope.id, content : $scope.content,servicesId : $scope.ser,industryId:$scope.ind,countryId:$scope.co,stateId:$scope.state,cityId:$scope.city,metaTitle:$scope.metaTitle,metaDescription:$scope.metaDescription,heading:$scope.heading  }


	 	 $http({
	 			 url: '<?php echo base_url(); ?>admin/RankingContentUpdate',
	 			 method: "POST",
	 			 data:obj,
	 			 headers: {
	 				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 			 }
	 		 }).then(function(response) {

	 				if(response.data.message == 'true')
	 			{
	 			 $.notify("Ranking content Updated Successfully ", "success");
				 angular.element('#editcontent').modal('hide');


	 				$scope.allcontent();
	 			 }
	 				 });

		}



$scope.allcontent();
 $scope.getcountry();
 $scope.getindustry();
 $scope.getservices();
 });

// ranking content

// hire ranking content

var app8 = angular.module('myApp8', [])

app8.filter('trustAsHtml',['$sce', function($sce) {

		 return function(text) {

			 return $sce.trustAsHtml(text);
					};
	 }]);

	 app8.filter('underscoreless', function () {
	return function (input) {
		//console.log(input);
		 return input.split(' ').join('-');

	};
});

app8.controller('myCtrt8', function($scope,$window,$http,$timeout) {

 $scope.services = [];
 $scope.content =[];
 $scope.ser ='';
 $scope.title ='';
 $scope.url='';
 $scope.description ='';
 $scope.mdescription ='';
 $scope.total =0;
 $scope.page =1;
 $scope.id='';
 $scope.key ='';

$scope.getservices = function ()
{

$http({
	 url: '<?php echo base_url(); ?>admin/allservices',
	 method: "POST",
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.services = response.data.result;


		 });
}

$scope.allcontent = function ()
{
	var obj = {  page : $scope.page   }

$http({
	 url: '<?php echo base_url(); ?>admin/getHireRankingContent',
	 method: "POST",
	 data:obj,
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.content = response.data.result;

	 $scope.total = response.data.pcount;

 	if($scope.page == 1)
 	$scope.pagination($scope.total);
 		});
 }

 $scope.pagination = function ($event)
 {
	 if($scope.total > 10)
	 {
 	   $('#pagination').pagination({
 		 items: $event,
 		 itemsOnPage: 10,
 		 cssStyle: 'light-theme',
 		 onPageClick:  function (e) {
 			$scope.page  = e;
       $scope.allcontent(); 		     }
      });
	  }
 }



 $scope.submitcontent = function()
 {
	 $scope.submitc = true;
	error = false;
	$scope.description = CKEDITOR.instances['description'].getData();


	if($scope.description == '' || $scope.ser == '' || $scope.title == '' || $scope.url =='' || $scope.mdescription =='')
	{
		error = true;
	}

	if(error == true)
	{
		return false;
	}

	var obj = { metaDescription:$scope.mdescription, description : $scope.description,servicesId : $scope.ser,metaTitle:$scope.title,url:$scope.url  }

	 $http({
			 url: '<?php echo base_url(); ?>admin/HireRankingContentSave',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

				if(response.data.message == '1')
			{
			 $.notify("Hire Ranking content Added Successfully ", "success");
			 $scope.ser ='';
			 $scope.title ='';
			 $scope.url ='';
			 $scope.description ='';
				CKEDITOR.instances['description'].setData('');
				$scope.submitc = false;
				angular.element('#addcontent').modal('hide');
				$scope.allcontent();
			 }
			 else if(response.data.message =='2')
			 {
				 $.notify("Services Content Already Exit", "error");
			}
				 });
 }

 $scope.deletemodal = function(key,id)
 {
	$scope.key = key;
	$scope.id = id;
	angular.element("#Delete").modal('show');

 }

 $scope.deletecontent = function()
 {
	var obj = {  id : $scope.id }

	 $http({
		 url: '<?php echo base_url(); ?>admin/deleteHireContent',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
			 angular.element("#Delete").modal('hide');
			 $.notify("Hire Content Deleted Successfully", "success");
			 //$scope.services.splice($scope.key,1);
       $scope.page = 1;
		 $scope.allcontent();
		 }

	 });

 }

  $scope.editContent = function(id)
	{
		$scope.id = id;
		var obj = {  id : id  }

		 $http({
				 url: '<?php echo base_url(); ?>admin/EditHireRankingContent',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

					if(response.data.message == 'true')
				{
					$scope.ser = response.data.result.servicesId;
 				 $scope.title =response.data.result.metaTitle;
				 $scope.mdescription = response.data.result.metaDescription
 				 $scope.url =response.data.result.url;
 				 response.data.result.description;
					 CKEDITOR.instances['description1'].setData(response.data.result.description);
					angular.element('#editcontent').modal('show');
				 }
					 });
	}

	$scope.updatecontent = function()
	{
		$scope.submitc = true;
 	error = false;
 	$scope.description = CKEDITOR.instances['description1'].getData();

 	if($scope.description == '' || $scope.ser == '' || $scope.title == '' || $scope.url =='' || $scope.metaDescription =='')
 	{
 		error = true;
 	}

 	if(error == true)
 	{
 		return false;
 	}

 	var obj = { id: $scope.id, description : $scope.description,servicesId : $scope.ser,metaTitle:$scope.title,url:$scope.url ,metaDescription : $scope.mdescription }

 	 $http({
 			 url: '<?php echo base_url(); ?>admin/HireRankingContentUpdate',
 			 method: "POST",
 			 data:obj,
 			 headers: {
 				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 			 }
 		 }).then(function(response) {

 				if(response.data.message == 'true')
 			{
 			 $.notify("Hire Ranking content Updated Successfully ", "success");
 				angular.element('#editcontent').modal('hide');
				$scope.ser ='';
 			 $scope.title ='';
 			 $scope.url ='';
 			 $scope.description ='';
 				CKEDITOR.instances['description'].setData('');
 				$scope.submitc = false;
 				$scope.allcontent();
 			 }
 				 });

	}



$scope.allcontent();
$scope.getservices();
});
// hire ranking content

// hire ranking content

var app9 = angular.module('myApp9', [])


app9.controller('myCtrt9', function($scope,$window,$http,$timeout) {

 $scope.industry = [];
 $scope.edit = [];
 $scope.title ='';
 $scope.description='';
 $scope.icon ='';
 $scope.image ='';
 $scope.url = '';
 $scope.status ='';
 $scope.total =0;
 $scope.page =1;
 $scope.id='';
 $scope.key ='';



$scope.allindustry = function ()
{
	var obj = {  page : $scope.page   }

$http({
	 url: '<?php echo base_url(); ?>admin/getTopIndustry',
	 method: "POST",
	 data:obj,
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.industry = response.data.result;


	 $scope.total = response.data.pcount;

 	if($scope.page == 1)
 	$scope.pagination($scope.total);
 		});
 }

 $scope.pagination = function ($event)
 {
	 if($scope.total > 10)
	 {
 	$('#pagination').pagination({
 		items: $event,
 		itemsOnPage: 10,
 		cssStyle: 'light-theme',
 		onPageClick:  function (e) {
 			$scope.page  = e;
 			$scope.allindustry();
 		}
     });
	 }
 }



 $scope.submitindustry = function()
 {
	 $scope.submitc = true;
	 error = false;


	if($scope.description == '' || $scope.title == '' || $scope.icon =='' || $scope.image =='' || $scope.status == '' || $scope.url == '')
	{
		error = true;
	}

	if(error == true)
	{
		return false;
	}

	var obj = { title:$scope.title, description : $scope.description,icon : $scope.icon,image:$scope.image,status:$scope.status ,url:$scope.url }

	 $http({
			 url: '<?php echo base_url(); ?>admin/TopIndustrySave',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

				if(response.data.message == '1')
			{
			 $.notify("Top Industry Added Successfully ", "success");
			 $scope.title ='';
       $scope.description ='';
			 $scope.icon ='';
			 $scope.image ='';
			 $scope.url ='';
			 $scope.submitc = false;
			 angular.element('#addcontent').modal('hide');
			 $scope.allindustry();
			 }

				 });
 }

 $scope.uploadImage = function ($event) {

		var files =$event.files;
		for (var i = 0; i < files.length; i++) {
			var f = files[i]
			var fileName = files[i].name;
			var filePath = fileName;

			var fileReader = new FileReader();
			fileReader.onload = (function(e) {
				var d = JSON.stringify({ image :  e.target.result });
				$http({
					url: '<?php echo base_url(); ?>admin/topindustryImage',
					method: "POST",
					data: d,
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					}
				}).then(function(response) {
					$scope.image = response.data;

				});

			});
			fileReader.readAsDataURL(f);
		}

	}

	$scope.uploadIcon = function ($event) {

		 var files =$event.files;
		 for (var i = 0; i < files.length; i++) {
			 var f = files[i]
			 var fileName = files[i].name;
			 var filePath = fileName;

			 var fileReader = new FileReader();
			 fileReader.onload = (function(e) {
				 var d = JSON.stringify({ image :  e.target.result });
				 $http({
					 url: '<?php echo base_url(); ?>admin/topindustryImage',
					 method: "POST",
					 data: d,
					 headers: {
						 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					 }
				 }).then(function(response) {
					 $scope.icon = response.data;

				 });

			 });
			 fileReader.readAsDataURL(f);
		 }

	 }

 $scope.deletemodal = function(key,id)
 {
	$scope.key = key;
	$scope.id = id;
	angular.element("#Delete").modal('show');

 }

 $scope.deletecontent = function()
 {
	var obj = {  id : $scope.id }

	 $http({
		 url: '<?php echo base_url(); ?>admin/deleteTopIndustry',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
       $scope.page = 1;
			 $scope.allindustry();
			 angular.element("#Delete").modal('hide');
			 $.notify("Top Industry Deleted Successfully", "success");

		 }

	 });

 }

  $scope.editindustry = function(id)
	{
		$scope.id = id;
		var obj = {  id : id  }

		 $http({
				 url: '<?php echo base_url(); ?>admin/EditTopIndustry',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

					if(response.data.message == 'true')
				{
					$scope.edit = response.data.result;
					$scope.title = response.data.result.title;
				 $scope.description = response.data.result.description
 				 $scope.status = response.data.result.status;
				 $scope.url = response.data.result.url;
         angular.element('#editcontent').modal('show');
				 }
					 });
	}

	$scope.updateindustry = function()
	{
		$scope.submitc = true;
 	  error = false;


 	if($scope.description == ''  || $scope.title == '' || $scope.status =='' || $scope.url == '' )
 	{
 		error = true;
 	}

 	if(error == true)
 	{
 		return false;
 	}

 	var obj = { id: $scope.id, description : $scope.description,title : $scope.title,icon:$scope.icon,image:$scope.image ,status : $scope.status, url : $scope.url}

 	 $http({
 			 url: '<?php echo base_url(); ?>admin/UpdateTopIndustry',
 			 method: "POST",
 			 data:obj,
 			 headers: {
 				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 			 }
 		 }).then(function(response) {

 				if(response.data.message == 'true')
 			{
				$scope.allindustry();
 			 $.notify("Top Industry Updated Successfully ", "success");
 				angular.element('#editcontent').modal('hide');
 			  $scope.title ='';
 			  $scope.description ='';
			  $scope.status ='';
			  $scope.icon ='';
			  $scope.image ='';
 				$scope.submitc = false;

 			 }
 				 });

	}



$scope.allindustry();
});
// Top rated industry


// blog section


var app10 = angular.module('myApp10', [])

app10.filter('trustAsHtml',['$sce', function($sce) {

		 return function(text) {

			 return $sce.trustAsHtml(text);
					};
	 }]);

	 app10.filter('underscoreless', function () {
	return function (input) {
		//console.log(input);
		 return input.split(' ').join('-');

	};
});

app10.directive('ngEnter', function () {
	 return function (scope, element, attrs) {
			 element.bind("keydown keypress", function (event) {
					 if (event.which === 13) {
							 scope.$apply(function () {
									 scope.$eval(attrs.ngEnter);
							 });

							 event.preventDefault();
					 }
			 });
	 };
});

app10.controller('myCtrt10', function($scope,$window,$http,$timeout) {

 $scope.allcategory =[];
 $scope.blog =[];
 $scope.tags =[];
 $scope.title ='';
 $scope.author ='';
 $scope.description ='';
 $scope.image ='';
 $scope.status ='';
 $scope.url ='';
 $scope.category ='';
 $scope.total =0;
 $scope.page =1;
 $scope.id='';
 $scope.key ='';
 $scope.tagname ='';
 $scope.status1 ='';

 $http({
 	 url: '<?php echo base_url(); ?>admin/allcategory',
 	 method: "POST",
 	 headers: {
 		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 	 }
  }).then(function(response) {

 	 $scope.allcategory = response.data.result;

  		});


$scope.allblog = function ()
{
	var obj = {  page : $scope.page   }

$http({
	 url: '<?php echo base_url(); ?>admin/getblog',
	 method: "POST",
	 data:obj,
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.blog = response.data.result;

	 $scope.total = response.data.pcount;

 	if($scope.page == 1)
 	$scope.pagination($scope.total);
 		});
 }

 $scope.pagination = function ($event)
 {
	 if($scope.total > 10)
	 {
			   $('#pagination').pagination({
				items: $event,
				itemsOnPage: 10,
				cssStyle: 'light-theme',
				onPageClick:  function (e) {
					$scope.page  = e;
					$scope.allblog();
				   }
		    });
			}
 }

 $scope.tagadd =function ()
 {
  var name = angular.element("#tagsnew").val();


   if($scope.tags.indexOf(name) === -1)
   {
     $scope.tags.push(name);
   }
	 $scope.tagname ='';
   angular.element("#tagsnew").val('');
   //console.log($scope.servicetags);

 }

 $scope.deletetag = function (key)
 {
   $scope.tags.splice(key,1);
 }

 $scope.submitblog = function()
 {
	 $scope.submitc = true;
	error = false;
	$scope.description = CKEDITOR.instances['description'].getData();
	//console.log($scope.description);

	if($scope.description == '' || $scope.image == '' || $scope.title == '' || $scope.status =='' || $scope.author =='' || $scope.category == '' || $scope.tags.length == 0 )
	{
		error = true;
	}

	if(error == true)
	{
		return false;
	}

	var obj = { description : $scope.description,categoryId:$scope.category,status : $scope.status ,title:$scope.title,image:$scope.image ,author:$scope.author,tags:$scope.tags,url:$scope.url  }

	 $http({
			 url: '<?php echo base_url(); ?>admin/blogSave',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

				if(response.data.message == 'true')
			{
			 $.notify("Blog Added Successfully ", "success");

			 $scope.title ='';
			 $scope.status ='';
			 $scope.description ='';
			 $scope.author ='';
			 $scope.url ='';
				CKEDITOR.instances['description'].setData('');
				$scope.submitc = false;
        $scope.tags =[];
				angular.element('#addblog').modal('hide');
				$scope.allblog();
			 }

				 });
 }

 $scope.deletemodal = function(key,id)
 {
	$scope.key = key;
	$scope.id = id;
	angular.element("#Delete").modal('show');

 }

 $scope.deleteblog = function()
 {
	var obj = {  id : $scope.id }

	 $http({
		 url: '<?php echo base_url(); ?>admin/blogdelete',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
			 angular.element("#Delete").modal('hide');
			 $.notify("Blog Deleted Successfully", "success");
			 //$scope.services.splice($scope.key,1);
       $scope.page = 1;
		 $scope.allblog();
		 }

	 });

 }

  $scope.editblog = function(id)
	{
		$scope.id = id;
    $scope.tags =[];
		var obj = {  id : id  }

		 $http({
				 url: '<?php echo base_url(); ?>admin/blogEdit',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

					if(response.data.message == 'true')
				{
         $scope.editdata = response.data.result;
 				 $scope.title =  response.data.result.title;
				 $scope.status = response.data.result.status;
 				 $scope.image =  response.data.result.image;
				 $scope.author = response.data.result.author;
				 $scope.category = response.data.result.categoryId;

				 if(response.data.result.url != '')
				 {
				 $scope.url = response.data.result.url;
			   }
        //console.log($scope.editdata.tags.length);
				 if($scope.editdata.tags.length != 0)
				 {
				    for(var v in $scope.editdata.tags)
				    {
					   $scope.tags.push($scope.editdata.tags[v].tag);
            }
			   }
					 CKEDITOR.instances['description1'].setData(response.data.result.description);
					angular.element('#editblog').modal('show');
				 }
					 });
	}

	$scope.updateblog = function()
	{
		$scope.submitc = true;
 	  error = false;
 	$scope.description = CKEDITOR.instances['description1'].getData();

 	if($scope.description == '' || $scope.status == '' || $scope.title == '' || $scope.author == '' || $scope.category == '' || $scope.tags.length == 0)
 	{
 		error = true;
 	}

 	if(error == true)
 	{
 		return false;
 	}

 	var obj = { blogId: $scope.id, description : $scope.description,status : $scope.status,title:$scope.title,image : $scope.image ,author:$scope.author,categoryId:$scope.category ,tags:$scope.tags,url:$scope.url}

 	 $http({
 			 url: '<?php echo base_url(); ?>admin/blogUpdate',
 			 method: "POST",
 			 data:obj,
 			 headers: {
 				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 			 }
 		 }).then(function(response) {

 				if(response.data.message == 'true')
 			{
 			 $.notify("Blog Updated Successfully ", "success");
 				angular.element('#editblog').modal('hide');
				$scope.status ='';
 			 $scope.title ='';
			 $scope.author ='';
 			 $scope.url ='';
			 $scope.tags =[];
 				CKEDITOR.instances['description'].setData('');
 				$scope.submitc = false;
 				$scope.allblog();
 			 }
 				 });

	}

	$scope.statusmodal = function(id,status)
	{
		$scope.id = id;
		$scope.status1 = status;
		angular.element("#Status").modal('show');

	}

	$scope.blogStatus = function()
	{
	var obj = {  id : $scope.id,status:$scope.status1 }

	 $http({
		 url: '<?php echo base_url(); ?>admin/blogStatus',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
			 angular.element("#Status").modal('hide');
			 $.notify("Blog Status Changed Successfully", "success");
			 $scope.allblog();
		 }

	 });

	}

	$scope.uploadImage = function ($event) {

 		var files =$event.files;
 		for (var i = 0; i < files.length; i++) {
 			var f = files[i]
 			var fileName = files[i].name;
 			var filePath = fileName;

 			var fileReader = new FileReader();
 			fileReader.onload = (function(e) {
					jQuery('#logoview').attr('src',e.target.result);
 				var d = JSON.stringify({ image :  e.target.result });
 				$http({
 					url: '<?php echo base_url(); ?>admin/blogImage',
 					method: "POST",
 					data: d,
 					headers: {
 						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 					}
 				}).then(function(response) {
 					$scope.image = response.data;

 				});

 			});
 			fileReader.readAsDataURL(f);
 		}

 	}




$scope.allblog();

});

// blog section

// currency
// currency


var app11 = angular.module('myApp11', [])


app11.controller('myCtrt11', function($scope,$window,$http,$timeout) {

 $scope.allcurrency = [];
 $scope.edit = [];
 $scope.currency='';
 $scope.id='';
 $scope.key ='';
 $scope.page = 1;



$scope.getcurrency = function ()
{
	var obj = {  page : $scope.page   }

$http({
	 url: '<?php echo base_url(); ?>admin/getcurrency',
	 method: "POST",
	 data:obj,
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.allcurrency = response.data.result;


	 $scope.total = response.data.pcount;

 	if($scope.page == 1)
 	$scope.pagination($scope.total);
 		});
 }

 $scope.pagination = function ($event)
 {
	 if($scope.total > 10)
	 {
 	$('#pagination').pagination({
 		items: $event,
 		itemsOnPage: 10,
 		cssStyle: 'light-theme',
 		onPageClick:  function (e) {
 			$scope.page  = e;
 			$scope.getcurrency();
 		}
     });
	 }
 }



 $scope.submitcurrency = function()
 {
	 $scope.submitc = true;
	 error = false;


	if($scope.currency == '' )
	{
		error = true;
	}

	if(error == true)
	{
		return false;
	}

	var obj = { currency:$scope.currency  }

	 $http({
			 url: '<?php echo base_url(); ?>admin/currencySave',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

				if(response.data.message == '1')
			{
			 $.notify("Currency Added Successfully ", "success");
			 $scope.currency ='';

			 angular.element('#addcontent').modal('hide');
			 $scope.getcurrency();
			 }

				 });
 }


 $scope.deletemodal = function(key,id)
 {
	$scope.key = key;
	$scope.id = id;
	angular.element("#Delete").modal('show');

 }

 $scope.deletecurrency = function()
 {
	var obj = {  id : $scope.id }

	 $http({
		 url: '<?php echo base_url(); ?>admin/currencydelete',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
			 $scope.getcurrency();
			 angular.element("#Delete").modal('hide');
			 $.notify("Currency Deleted Successfully", "success");

		 }

	 });

 }

  $scope.editcurrency = function(id)
	{
		$scope.id = id;
		var obj = {  id : id  }

		 $http({
				 url: '<?php echo base_url(); ?>admin/currencyEdit',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

					if(response.data.message == 'true')
				{
					$scope.edit = response.data.result;
					$scope.currency = response.data.result.currency;

         angular.element('#editcontent').modal('show');
				 }
					 });
	}

	$scope.updatecurrency = function()
	{
		$scope.submitc = true;
 	  error = false;


 	if($scope.currency == '' )
 	{
 		error = true;
 	}

 	if(error == true)
 	{
 		return false;
 	}

 	var obj = { currency : $scope.currency,currencyId:$scope.edit.currencyId }

 	 $http({
 			 url: '<?php echo base_url(); ?>admin/currencyUpdate',
 			 method: "POST",
 			 data:obj,
 			 headers: {
 				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 			 }
 		 }).then(function(response) {

 				if(response.data.message == 'true')
 			{
				$scope.getcurrency();
 			 $.notify("Currency Updated Successfully ", "success");
 				angular.element('#editcontent').modal('hide');
 			  $scope.currency ='';

 				$scope.submitc = false;

 			 }
 				 });

	}



$scope.getcurrency();
});

///currency


/////category

var app12 = angular.module('myApp12', [])

app12.filter('trustAsHtml',['$sce', function($sce) {

		 return function(text) {

			 return $sce.trustAsHtml(text);
					};
	 }]);

	 app12.filter('underscoreless', function () {
	return function (input) {
		//console.log(input);
		 return input.split(' ').join('-');

	};
});

app12.controller('myCtrt12', function($scope,$window,$http,$timeout) {


 $scope.acategory =[];
 $scope.category ='';
  $scope.total =0;
 $scope.page =1;
 $scope.id='';
 $scope.key ='';


 $scope.dateDifference = function(date)
 {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }
    today = yyyy + '/' + mm + '/' + dd;
    $scope.today = today;
    var date2 = new Date(today);
    var date1 = new Date(date);
    var timeDiff = Math.abs(date2.getTime() - date1.getTime());
    $scope.dayDifference = Math.ceil(timeDiff / (1000 * 3600 * 24));
    return $scope.dayDifference;
    //console.log($scope.dayDifference);
  }

$scope.allcategory = function ()
{
	var obj = {  page : $scope.page   }

$http({
	 url: '<?php echo base_url(); ?>admin/getcategory',
	 method: "POST",
	 data:obj,
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.acategory = response.data.result;

	 $scope.total = response.data.pcount;

 	if($scope.page == 1)
 	$scope.pagination($scope.total);
 		});
 }

 $scope.pagination = function ($event)
 {
	 if($scope.total > 10)
	 {
 	   $('#pagination').pagination({
 		 items: $event,
 		 itemsOnPage: 10,
 		 cssStyle: 'light-theme',
 		 onPageClick:  function (e) {
 			$scope.page  = e;
 			$scope.allcategory();
 		   }
     });
	 }
 }



 $scope.submitcategory = function()
 {
	 $scope.submitc = true;
	 error = false;

	if($scope.category =='' )
	{
		error = true;
	}

	if(error == true)
	{
		return false;
	}

	var obj = { category:$scope.category  }

	 $http({
			 url: '<?php echo base_url(); ?>admin/categorySave',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

				if(response.data.message == '1')
			{
			 $.notify("Category Added Successfully ", "success");

			 $scope.category ='';
				$scope.submitc = false;
				angular.element('#addcategory').modal('hide');
				$scope.allcategory();
			 }
			 else if(response.data.message =='2')
			 {
				 $.notify("Category Already Exist", "error");

			 }

				 });
 }

 $scope.deletemodal = function(key,id)
 {
	$scope.key = key;
	$scope.id = id;
	angular.element("#Delete").modal('show');

 }

 $scope.deletecategory = function()
 {
	var obj = {  id : $scope.id }

	 $http({
		 url: '<?php echo base_url(); ?>admin/categorydelete',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
			 angular.element("#Delete").modal('hide');
			 $.notify("Category Deleted Successfully", "success");
			 //$scope.services.splice($scope.key,1);
       $scope.page = 1;
		 $scope.allcategory();
		 }

	 });

 }

  $scope.editblog = function(id)
	{
		$scope.id = id;
		var obj = {  id : id  }

		 $http({
				 url: '<?php echo base_url(); ?>admin/categoryEdit',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

					if(response.data.message == 'true')
				{
         $scope.editdata = response.data.result;
 				 $scope.category =  response.data.result.category;
					angular.element('#editcategory').modal('show');
				 }
					 });
	}

	$scope.updatecategory = function()
	{
		$scope.submitc = true;
 	  error = false;


 	if($scope.category == '' )
 	{
 		error = true;
 	}

 	if(error == true)
 	{
 		return false;
 	}

 	var obj = { categoryId: $scope.id,category:$scope.category }

 	 $http({
 			 url: '<?php echo base_url(); ?>admin/categoryUpdate',
 			 method: "POST",
 			 data:obj,
 			 headers: {
 				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 			 }
 		 }).then(function(response) {

 				if(response.data.message == 'true')
 			{
 			 $.notify("Category Updated Successfully ", "success");
 				angular.element('#editcategory').modal('hide');

 			  $scope.category ='';
 				$scope.submitc = false;
 				$scope.allcategory();
 			 }
 				 });

	}


$scope.allcategory();

});

/////category

////////// testimonial

var app13 = angular.module('myApp13', [])

app10.filter('trustAsHtml',['$sce', function($sce) {

		 return function(text) {

			 return $sce.trustAsHtml(text);
					};
	 }]);

	 app13.filter('underscoreless', function () {
	return function (input) {
		//console.log(input);
		 return input.split(' ').join('-');

	};
});

app13.directive('ngEnter', function () {
	 return function (scope, element, attrs) {
			 element.bind("keydown keypress", function (event) {
					 if (event.which === 13) {
							 scope.$apply(function () {
									 scope.$eval(attrs.ngEnter);
							 });

							 event.preventDefault();
					 }
			 });
	 };
});

app13.controller('myCtrt13', function($scope,$window,$http,$timeout) {


 $scope.testimonial =[];
 $scope.title ='';
 $scope.designation ='';
 $scope.description ='';
 $scope.image ='';
 $scope.status ='';
 $scope.total =0;
 $scope.page =1;
 $scope.id='';
 $scope.key ='';


$scope.alltestimonial = function ()
{
	var obj = {  page : $scope.page   }

$http({
	 url: '<?php echo base_url(); ?>admin/gettestimonial',
	 method: "POST",
	 data:obj,
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.testimonial = response.data.result;

	 $scope.total = response.data.pcount;

 	if($scope.page == 1)
 	$scope.pagination($scope.total);
 		});
 }

 $scope.pagination = function ($event)
 {
	 if($scope.total > 10)
	 {
				$('#pagination').pagination({
					items: $event,
					itemsOnPage: 10,
					cssStyle: 'light-theme',
					onPageClick:  function (e) {
						$scope.page  = e;
						$scope.alltestimonial();
					}
			  });
		}
 }



 $scope.submittestimonial = function()
 {
	 $scope.submitc = true;
	 error = false;


	if($scope.description == '' || $scope.image == '' || $scope.title == '' || $scope.status =='' || $scope.designation ==''  )
	{
		error = true;
	}

	if(error == true)
	{
		return false;
	}

	var obj = { description : $scope.description,status : $scope.status ,title:$scope.title,image:$scope.image ,designation:$scope.designation  }

	 $http({
			 url: '<?php echo base_url(); ?>admin/testimonialSave',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

				if(response.data.message == 'true')
			{
			 $.notify("Testimonial Added Successfully ", "success");

			 $scope.title ='';
			 $scope.status ='';
			 $scope.description ='';
			 $scope.designation ='';

				$scope.submitc = false;
				angular.element('#addtestimonial').modal('hide');
				$scope.alltestimonial();
			 }

				 });
 }

 $scope.deletemodal = function(key,id)
 {
	$scope.key = key;
	$scope.id = id;
	angular.element("#Delete").modal('show');

 }

 $scope.deletetestimonial = function()
 {
	var obj = {  id : $scope.id }

	 $http({
		 url: '<?php echo base_url(); ?>admin/testimonialdelete',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
			 angular.element("#Delete").modal('hide');
			 $.notify("Testimonial Deleted Successfully", "success");
			 //$scope.services.splice($scope.key,1);
       $scope.page = 1;
		 $scope.alltestimonial();
		 }

	 });

 }

  $scope.edittestimonial = function(id)
	{
		$scope.id = id;
		var obj = {  id : id  }

		 $http({
				 url: '<?php echo base_url(); ?>admin/testimonialEdit',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

					if(response.data.message == 'true')
				{
         $scope.editdata = response.data.result;
 				 $scope.title =  response.data.result.title;
				 $scope.status = response.data.result.status;
 				 $scope.image =  response.data.result.image;
				 $scope.designation = response.data.result.designation;
				 $scope.description = response.data.result.description;

					angular.element('#edittestimonial').modal('show');
				 }
					 });
	}

	$scope.updatetestimonial = function()
	{
		$scope.submitc = true;
 	error = false;


 	if($scope.description == '' || $scope.status == '' || $scope.title == '' || $scope.designation == '')
 	{
 		error = true;
 	}

 	if(error == true)
 	{
 		return false;
 	}

 	var obj = { testimonialId: $scope.id, description : $scope.description,status : $scope.status,title:$scope.title,image : $scope.image ,designation:$scope.designation}

 	 $http({
 			 url: '<?php echo base_url(); ?>admin/testimonialUpdate',
 			 method: "POST",
 			 data:obj,
 			 headers: {
 				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 			 }
 		 }).then(function(response) {

 				if(response.data.message == 'true')
 			{
 			 $.notify("Testimonial Updated Successfully ", "success");
 				angular.element('#edittestimonial').modal('hide');
				$scope.status ='';
 			 $scope.title ='';
			 $scope.description ='';
 			 $scope.designation ='';

 				$scope.submitc = false;
 				$scope.alltestimonial();
 			 }
 				 });

	}

	$scope.uploadImage = function ($event) {

 		var files =$event.files;
 		for (var i = 0; i < files.length; i++) {
 			var f = files[i]
 			var fileName = files[i].name;
 			var filePath = fileName;

 			var fileReader = new FileReader();
 			fileReader.onload = (function(e) {
					jQuery('#logoview').attr('src',e.target.result);
 				var d = JSON.stringify({ image :  e.target.result });
 				$http({
 					url: '<?php echo base_url(); ?>admin/testimonialImage',
 					method: "POST",
 					data: d,
 					headers: {
 						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 					}
 				}).then(function(response) {
 					$scope.image = response.data;

 				});

 			});
 			fileReader.readAsDataURL(f);
 		}

 	}




$scope.alltestimonial();

});

///////////testimonial

// how it works section
////////// testimonial

var app14 = angular.module('myApp14', [])

app14.filter('trustAsHtml',['$sce', function($sce) {

		 return function(text) {

			 return $sce.trustAsHtml(text);
					};
	 }]);

	 app14.filter('underscoreless', function () {
	return function (input) {
		//console.log(input);
		 return input.split(' ').join('-');

	};
});

app14.directive('ngEnter', function () {
	 return function (scope, element, attrs) {
			 element.bind("keydown keypress", function (event) {
					 if (event.which === 13) {
							 scope.$apply(function () {
									 scope.$eval(attrs.ngEnter);
							 });

							 event.preventDefault();
					 }
			 });
	 };
});

app14.controller('myCtrt14', function($scope,$window,$http,$timeout) {


 $scope.works =[];
 $scope.title ='';
 $scope.description ='';
 $scope.image ='';
 $scope.status ='';
 $scope.total =0;
 $scope.page =1;
 $scope.id='';
 $scope.key ='';


$scope.allworks = function ()
{
	var obj = {  page : $scope.page   }

$http({
	 url: '<?php echo base_url(); ?>admin/getworks',
	 method: "POST",
	 data:obj,
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.works = response.data.result;

	 $scope.total = response.data.pcount;

 	if($scope.page == 1)
 	$scope.pagination($scope.total);
 		});
 }

 $scope.pagination = function ($event)
 {
	 if($scope.total > 10)
	 {
			$('#pagination').pagination({
				items: $event,
				itemsOnPage: 10,
				cssStyle: 'light-theme',
				onPageClick:  function (e) {
					$scope.page  = e;
					$scope.allworks();
				}
		    });
		}
 }



 $scope.submitworks = function()
 {
	 $scope.submitc = true;
	 error = false;


	if($scope.description == '' || $scope.image == '' || $scope.title == '' || $scope.status =='' )
	{
		error = true;
	}

	if(error == true)
	{
		return false;
	}

	var obj = { description : $scope.description,status : $scope.status ,title:$scope.title,image:$scope.image }

	 $http({
			 url: '<?php echo base_url(); ?>admin/worksSave',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

				if(response.data.message == 'true')
			{
			 $.notify("Works Added Successfully ", "success");

			 $scope.title ='';
			 $scope.status ='';
			 $scope.description ='';
       $scope.submitc = false;
				angular.element('#addwork').modal('hide');
				$scope.allworks();
			 }

				 });
 }

 $scope.deletemodal = function(key,id)
 {
	$scope.key = key;
	$scope.id = id;
	angular.element("#Delete").modal('show');

 }

 $scope.deleteworks = function()
 {
	var obj = {  id : $scope.id }

	 $http({
		 url: '<?php echo base_url(); ?>admin/worksdelete',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
			 angular.element("#Delete").modal('hide');
			 $.notify("Works Deleted Successfully", "success");
			 //$scope.services.splice($scope.key,1);
       $scope.page = 1;
		 $scope.allworks();
		 }

	 });

 }

  $scope.editworks = function(id)
	{
		$scope.id = id;
		var obj = {  id : id  }

		 $http({
				 url: '<?php echo base_url(); ?>admin/worksEdit',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

					if(response.data.message == 'true')
				{
         $scope.editdata = response.data.result;
 				 $scope.title =  response.data.result.title;
				 $scope.status = response.data.result.status;
 				 $scope.image =  response.data.result.image;
				 $scope.description = response.data.result.description;

					angular.element('#editworks').modal('show');
				 }
					 });
	}

	$scope.updateworks = function()
	{
		$scope.submitc = true;
 	error = false;


 	if($scope.description == '' || $scope.status == '' || $scope.title == '' )
 	{
 		error = true;
 	}

 	if(error == true)
 	{
 		return false;
 	}

 	var obj = { id: $scope.id, description : $scope.description,status : $scope.status,title:$scope.title,image : $scope.image }

 	 $http({
 			 url: '<?php echo base_url(); ?>admin/worksUpdate',
 			 method: "POST",
 			 data:obj,
 			 headers: {
 				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 			 }
 		 }).then(function(response) {

 				if(response.data.message == 'true')
 			{
 			 $.notify("Works Updated Successfully ", "success");
 				angular.element('#editworks').modal('hide');
				$scope.status ='';
 			 $scope.title ='';
			 $scope.description ='';
 				$scope.submitc = false;
 				$scope.allworks();
 			 }
 				 });

	}

	$scope.uploadImage = function ($event) {

 		var files =$event.files;
 		for (var i = 0; i < files.length; i++) {
 			var f = files[i]
 			var fileName = files[i].name;
 			var filePath = fileName;

 			var fileReader = new FileReader();
 			fileReader.onload = (function(e) {
					jQuery('#logoview').attr('src',e.target.result);
 				var d = JSON.stringify({ image :  e.target.result });
 				$http({
 					url: '<?php echo base_url(); ?>admin/worksImage',
 					method: "POST",
 					data: d,
 					headers: {
 						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 					}
 				}).then(function(response) {
 					$scope.image = response.data;

 				});

 			});
 			fileReader.readAsDataURL(f);
 		}

 	}




$scope.allworks();

});

// how it works section


//////////  Question type

var app15 = angular.module('myApp15', [])

app15.filter('trustAsHtml',['$sce', function($sce) {

		 return function(text) {

			 return $sce.trustAsHtml(text);
					};
	 }]);

	 app15.filter('underscoreless', function () {
	return function (input) {
		//console.log(input);
		 return input.split(' ').join('-');

	};
});

app15.directive('ngEnter', function () {
	 return function (scope, element, attrs) {
			 element.bind("keydown keypress", function (event) {
					 if (event.which === 13) {
							 scope.$apply(function () {
									 scope.$eval(attrs.ngEnter);
							 });

							 event.preventDefault();
					 }
			 });
	 };
});

app15.controller('myCtrt15', function($scope,$window,$http,$timeout) {


 $scope.questiontype =[];
 $scope.category ='';
 $scope.status ='';
 $scope.total =0;
 $scope.page =1;
 $scope.id='';
 $scope.key ='';


$scope.allquestionType = function ()
{
	var obj = {  page : $scope.page   }

$http({
	 url: '<?php echo base_url(); ?>admin/getquestionType',
	 method: "POST",
	 data:obj,
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.questiontype = response.data.result;

	 $scope.total = response.data.pcount;

 	if($scope.page == 1)
 	$scope.pagination($scope.total);
 		});
 }

 $scope.pagination = function ($event)
 {
	 if($scope.total > 10)
	 {
				$('#pagination').pagination({
				items: $event,
				itemsOnPage: 10,
				cssStyle: 'light-theme',
				onPageClick:  function (e) {
					$scope.page  = e;
					$scope.allquestionType();
				}
				});
		}
 }



 $scope.submitquestionType = function()
 {
	 $scope.submitc = true;
	 error = false;

	if($scope.category == ''  || $scope.status == '' )
	{
		error = true;
	}

	if(error == true)
	{
		return false;
	}

	var obj = { status : $scope.status ,name:$scope.category }

	 $http({
			 url: '<?php echo base_url(); ?>admin/questionTypeSave',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

				if(response.data.message == '1')
			{
			 $.notify("Question Type Added Successfully ", "success");

			 $scope.category ='';
			 $scope.status ='';
       $scope.submitc = false;
			 angular.element('#addquestionType').modal('hide');
			 $scope.allquestionType();
			 }
			 else
			 {
				 $.notify("Question Type Already Added", "error");

			 }

				 });
 }

 $scope.deletemodal = function(key,id)
 {
	$scope.key = key;
	$scope.id = id;
	angular.element("#Delete").modal('show');

 }

 $scope.deletequestionType = function()
 {
	var obj = {  id : $scope.id }

	 $http({
		 url: '<?php echo base_url(); ?>admin/questionTypedelete',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
			 angular.element("#Delete").modal('hide');
			 $.notify("Question Type Deleted Successfully", "success");
			 //$scope.services.splice($scope.key,1);
       $scope.page = 1;
		 $scope.allquestionType();
		 }

	 });

 }

  $scope.editquestionType = function(id)
	{
		$scope.id = id;
		var obj = {  id : id  }

		 $http({
				 url: '<?php echo base_url(); ?>admin/questionTypeEdit',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

					if(response.data.message == 'true')
				{
         $scope.editdata = response.data.result;
 				 $scope.category =  response.data.result.name;
				 $scope.status = response.data.result.status;

					angular.element('#editquestionType').modal('show');
				 }
					 });
	}

	$scope.updatequestionType = function()
	{
		$scope.submitc = true;
 	error = false;


 	if($scope.status == '' || $scope.category == '' )
 	{
 		error = true;
 	}

 	if(error == true)
 	{
 		return false;
 	}

 	var obj = { id: $scope.id, status : $scope.status,name:$scope.category }

 	 $http({
 			 url: '<?php echo base_url(); ?>admin/questionTypeUpdate',
 			 method: "POST",
 			 data:obj,
 			 headers: {
 				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 			 }
 		 }).then(function(response) {

 				if(response.data.message == 'true')
 			{
 			 $.notify("Question Type Updated Successfully ", "success");
 				angular.element('#editquestionType').modal('hide');
				$scope.status ='';
 			  $scope.category ='';
 				$scope.submitc = false;
 				$scope.allquestionType();
 			 }
 				 });

	}






$scope.allquestionType();

});

// Question type

//// Question


var app16 = angular.module('myApp16', [])

app16.filter('trustAsHtml',['$sce', function($sce) {

		 return function(text) {

			 return $sce.trustAsHtml(text);
					};
	 }]);

	 app16.filter('underscoreless', function () {
	return function (input) {
		//console.log(input);
		 return input.split(' ').join('-');

	};
});

app16.directive('ngEnter', function () {
	 return function (scope, element, attrs) {
			 element.bind("keydown keypress", function (event) {
					 if (event.which === 13) {
							 scope.$apply(function () {
									 scope.$eval(attrs.ngEnter);
							 });

							 event.preventDefault();
					 }
			 });
	 };
});

app16.controller('myCtrt16', function($scope,$window,$http,$timeout) {


 $scope.aquestion =[];
 $scope.allquestionType =[];
 $scope.question ='';
 $scope.questionType ='';
 $scope.status ='';
 $scope.total =0;
 $scope.page =1;
 $scope.id='';
 $scope.key ='';

 $http({
 	 url: '<?php echo base_url(); ?>admin/allquestionType',
 	 method: "POST",
 	 headers: {
 		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 	 }
  }).then(function(response) {

 	 $scope.allquestionType = response.data.result;

  	});

$scope.allquestion = function ()
{
	var obj = {  page : $scope.page   }

$http({
	 url: '<?php echo base_url(); ?>admin/getquestion',
	 method: "POST",
	 data:obj,
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.aquestion = response.data.result;

	 $scope.total = response.data.pcount;

 	if($scope.page == 1)
 	$scope.pagination($scope.total);
 		});
 }

 $scope.pagination = function ($event)
 {
	 if($scope.total > 10)
	 {
			$('#pagination').pagination({
			items: $event,
			itemsOnPage: 10,
			cssStyle: 'light-theme',
			onPageClick:  function (e) {
				$scope.page  = e;
				$scope.allquestion();
			}
			});
		}
 }



 $scope.submitquestion = function()
 {
	 $scope.submitc = true;
	 error = false;

	if($scope.question == ''  || $scope.status == '' || $scope.questionType == '')
	{
		error = true;
	}

	if(error == true)
	{
		return false;
	}

	var obj = { status : $scope.status ,question:$scope.question,questionTypeId :$scope.questionType }

	 $http({
			 url: '<?php echo base_url(); ?>admin/questionSave',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

				if(response.data.message == '1')
			{
			 $.notify("Question  Added Successfully ", "success");

			 $scope.question ='';
			 $scope.questionType ='';
			 $scope.status ='';
       $scope.submitc = false;
			 angular.element('#addquestion').modal('hide');
			 $scope.allquestion();
			 }

				 });
 }

 $scope.deletemodal = function(key,id)
 {
	$scope.key = key;
	$scope.id = id;
	angular.element("#Delete").modal('show');

 }

 $scope.deletequestion = function()
 {
	var obj = {  id : $scope.id }

	 $http({
		 url: '<?php echo base_url(); ?>admin/questiondelete',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
			 angular.element("#Delete").modal('hide');
			 $.notify("Question  Deleted Successfully", "success");
			 //$scope.services.splice($scope.key,1);
       $scope.page = 1;
		 $scope.allquestion();
		 }

	 });

 }

  $scope.editquestion = function(id)
	{
		$scope.id = id;
		var obj = {  id : id  }

		 $http({
				 url: '<?php echo base_url(); ?>admin/questionEdit',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

					if(response.data.message == 'true')
				{
         $scope.editdata = response.data.result;
 				 $scope.question =  response.data.result.question;
 				 $scope.questionType =  response.data.result.questionTypeId;
				 $scope.status = response.data.result.status;

					angular.element('#editquestion').modal('show');
				 }
					 });
	}

	$scope.updatequestion = function()
	{
		$scope.submitc = true;
 	error = false;


 	if($scope.status == '' || $scope.question == '' || $scope.questionType == '' )
 	{
 		error = true;
 	}

 	if(error == true)
 	{
 		return false;
 	}

 	var obj = { id: $scope.id, status : $scope.status,question:$scope.question ,questionTypeId : $scope.questionType}

 	 $http({
 			 url: '<?php echo base_url(); ?>admin/questionUpdate',
 			 method: "POST",
 			 data:obj,
 			 headers: {
 				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 			 }
 		 }).then(function(response) {

 				if(response.data.message == 'true')
 			{
 			 $.notify("Question Updated Successfully ", "success");
 				angular.element('#editquestion').modal('hide');
				$scope.status ='';
 			  $scope.question ='';
				$scope.questionType ='';
 				$scope.submitc = false;
 				$scope.allquestion();
 			 }
 				 });

	}






$scope.allquestion();

});

//// Question

/// contact

var app17 = angular.module('myApp17', [])

app17.filter('trustAsHtml',['$sce', function($sce) {

		 return function(text) {

			 return $sce.trustAsHtml(text);
					};
	 }]);

	 app17.filter('underscoreless', function () {
	return function (input) {
		//console.log(input);
		 return input.split(' ').join('-');

	};
});

app17.directive('ngEnter', function () {
	 return function (scope, element, attrs) {
			 element.bind("keydown keypress", function (event) {
					 if (event.which === 13) {
							 scope.$apply(function () {
									 scope.$eval(attrs.ngEnter);
							 });

							 event.preventDefault();
					 }
			 });
	 };
});

app17.controller('myCtrt17', function($scope,$window,$http,$timeout) {

 $scope.total =0;
 $scope.page =1;
 $scope.id='';
 $scope.key ='';
 $scope.contact =[];



$scope.allcontact = function ()
{
	var obj = {  page : $scope.page   }

$http({
	 url: '<?php echo base_url(); ?>admin/getcontact',
	 method: "POST",
	 data:obj,
	 headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {

	 $scope.contact = response.data.result;

	 $scope.total = response.data.pcount;

 	if($scope.page == 1)
 	$scope.pagination($scope.total);
 		});
 }

 $scope.pagination = function ($event)
 {
	 if($scope.total > 10)
	 {
			$('#pagination').pagination({
			items: $event,
			itemsOnPage: 10,
			cssStyle: 'light-theme',
			onPageClick:  function (e) {
			$scope.page  = e;
			$scope.allcontact();
			}
			});
		}
 }


 $scope.deletemodal = function(key,id)
 {
	$scope.key = key;
	$scope.id = id;
	angular.element("#Delete").modal('show');

 }

 $scope.deletequestion = function()
 {
	var obj = {  id : $scope.id }

	 $http({
		 url: '<?php echo base_url(); ?>admin/contactdelete',
		 method: "POST",
		 data: obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 if(response.data.message == "true")
		 {
			 angular.element("#Delete").modal('hide');
			 $.notify("Question  Deleted Successfully", "success");
			 //$scope.services.splice($scope.key,1);
       $scope.page = 1;
		 $scope.allcontact();
		 }

	 });

 }



$scope.allcontact();

});

////contact


  /////portfolio
<?php
     if(isset($freelancerId))
      {
				?>
	var app18 = angular.module('myApp18', [])

	app18.filter('trustAsHtml',['$sce', function($sce) {

			 return function(text) {

				 return $sce.trustAsHtml(text);
						};
		 }]);

		 app18.filter('underscoreless', function () {
		return function (input) {
			//console.log(input);
			 return input.split(' ').join('-');

		};
	});

	app18.directive('ngEnter', function () {
		 return function (scope, element, attrs) {
				 element.bind("keydown keypress", function (event) {
						 if (event.which === 13) {
								 scope.$apply(function () {
										 scope.$eval(attrs.ngEnter);
								 });

								 event.preventDefault();
						 }
				 });
		 };
	});

	app18.controller('myCtrt18', function($scope,$window,$http,$timeout) {

	 $scope.total =0;
	 $scope.page =1;
	 $scope.id='';
	 $scope.key ='';
	 $scope.portfolio =[];



	$scope.allportfolio = function ()
	{
		var obj = {  page : $scope.page ,id: <?php if(isset($freelancerId)){ echo $freelancerId; } ?>  }

	$http({
		 url: '<?php echo base_url(); ?>admin/getportfolio',
		 method: "POST",
		 data:obj,
		 headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

		 $scope.portfolio = response.data.result;

		 $scope.total = response.data.pcount;

	 	if($scope.page == 1)
	 	$scope.pagination($scope.total);
	 		});
	 }

	 $scope.pagination = function ($event)
	 {
		 if($scope.total > 10)
		{
	 	  $('#pagination').pagination({
	 		items: $event,
	 		itemsOnPage: 10,
	 		cssStyle: 'light-theme',
	 		onPageClick:  function (e) {
	 			$scope.page  = e;
	 			$scope.allportfolio();
	 		   }
	     });
		 }
	 }

	$scope.allportfolio();

	});

<?php } ?>

  /////portfolio

	<?php
			 if(isset($freelancerId))
				{
					?>
		var app19 = angular.module('myApp19', [])

		app19.filter('trustAsHtml',['$sce', function($sce) {

				 return function(text) {

					 return $sce.trustAsHtml(text);
							};
			 }]);

			 app19.filter('underscoreless', function () {
			return function (input) {
				//console.log(input);
				 return input.split(' ').join('-');

			};
		});

		app19.directive('ngEnter', function () {
			 return function (scope, element, attrs) {
					 element.bind("keydown keypress", function (event) {
							 if (event.which === 13) {
									 scope.$apply(function () {
											 scope.$eval(attrs.ngEnter);
									 });

									 event.preventDefault();
							 }
					 });
			 };
		});

		app19.controller('myCtrt19', function($scope,$window,$http,$timeout) {

		 $scope.total =0;
		 $scope.page =1;
		 $scope.id='';
		 $scope.key ='';
		 $scope.testimonials =[];



		$scope.alltestimonial = function ()
		{
			var obj = {  page : $scope.page ,id: <?php if(isset($freelancerId)){ echo $freelancerId; } ?>  }

		$http({
			 url: '<?php echo base_url(); ?>admin/getfreelancertestimonial',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

			 $scope.testimonials = response.data.result;

			 $scope.total = response.data.pcount;

			if($scope.page == 1)
			$scope.pagination($scope.total);
				});
		 }

		 $scope.pagination = function ($event)
		 {
			 if($scope.total > 10)
	 		{
					$('#pagination').pagination({
					items: $event,
					itemsOnPage: 10,
					cssStyle: 'light-theme',
					onPageClick:  function (e) {
					$scope.page  = e;
					$scope.alltestimonial();
					}
					});
			 }
		 }

		$scope.alltestimonial();

		});

	<?php } ?>
	////testimonial

	/// case study

		<?php
				 if(isset($freelancerId))
					{
						?>
			var app20 = angular.module('myApp20', [])

			app20.filter('trustAsHtml',['$sce', function($sce) {

					 return function(text) {

						 return $sce.trustAsHtml(text);
								};
				 }]);

				 app20.filter('underscoreless', function () {
				return function (input) {
					//console.log(input);
					 return input.split(' ').join('-');

				};
			});

			app20.directive('ngEnter', function () {
				 return function (scope, element, attrs) {
						 element.bind("keydown keypress", function (event) {
								 if (event.which === 13) {
										 scope.$apply(function () {
												 scope.$eval(attrs.ngEnter);
										 });

										 event.preventDefault();
								 }
						 });
				 };
			});

			app20.controller('myCtrt20', function($scope,$window,$http,$timeout) {

			 $scope.total =0;
			 $scope.page =1;
			 $scope.id='';
			 $scope.key ='';
			 $scope.casestudys =[];



			$scope.allcasestudy = function ()
			{
				var obj = {  page : $scope.page ,id: <?php if(isset($freelancerId)){ echo $freelancerId; } ?>  }

			$http({
				 url: '<?php echo base_url(); ?>admin/getcasestudy',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

				 $scope.casestudys = response.data.result;

				 $scope.total = response.data.pcount;

				if($scope.page == 1)
				$scope.pagination($scope.total);
					});
			 }

			 $scope.pagination = function ($event)
			 {
				 if($scope.total > 10)
		 		 {
						$('#pagination').pagination({
						items: $event,
						itemsOnPage: 10,
						cssStyle: 'light-theme',
						onPageClick:  function (e) {
						$scope.page  = e;
						$scope.allcasestudy();
						}
						});
				 }
			 }

			$scope.allcasestudy();

			});

		<?php }
	/// case study

	////service pricing

			 if(isset($freelancerId))
				{
					?>

		var app21 = angular.module('myApp21', [])

		app21.filter('trustAsHtml',['$sce', function($sce) {

				 return function(text) {

					 return $sce.trustAsHtml(text);
							};
			 }]);

		app21.directive('ngEnter', function () {
			 return function (scope, element, attrs) {
					 element.bind("keydown keypress", function (event) {
							 if (event.which === 13) {
									 scope.$apply(function () {
											 scope.$eval(attrs.ngEnter);
									 });

									 event.preventDefault();
							 }
					 });
			 };
		});

		app21.controller('myCtrt21', function($scope,$window,$http,$timeout) {

		 $scope.total =0;
		 $scope.page =1;
		 $scope.id='';
		 $scope.key ='';
		 $scope.pricings =[];



		$scope.allpricing = function ()
		{
			var obj = {  page : $scope.page ,id: <?php if(isset($freelancerId)){ echo $freelancerId; } ?>  }

		$http({
			 url: '<?php echo base_url(); ?>admin/getpricing',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

			 $scope.pricings = response.data.result;

			 $scope.total = response.data.pcount;

			if($scope.page == 1)
			$scope.pagination($scope.total);
				});
		 }

		 $scope.pagination = function ($event)
		 {
			 if($scope.total > 10)
	 		{
					$('#pagination').pagination({
					items: $event,
					itemsOnPage: 10,
					cssStyle: 'light-theme',
					onPageClick:  function (e) {
					$scope.page  = e;
					$scope.allpricing();
					}
					});
				}
		 }

		$scope.allpricing();

		});

	<?php } ?>
	////service pricing

	//// request form
<?php
			 if(isset($freelancerId))
				{
					?>

		var app22 = angular.module('myApp22', [])

		app22.filter('trustAsHtml',['$sce', function($sce) {

				 return function(text) {

					 return $sce.trustAsHtml(text);
							};
			 }]);

		app22.directive('ngEnter', function () {
			 return function (scope, element, attrs) {
					 element.bind("keydown keypress", function (event) {
							 if (event.which === 13) {
									 scope.$apply(function () {
											 scope.$eval(attrs.ngEnter);
									 });

									 event.preventDefault();
							 }
					 });
			 };
		});

		app22.controller('myCtrt22', function($scope,$window,$http,$timeout) {

		 $scope.total =0;
		 $scope.page =1;
		 $scope.id='';
		 $scope.key ='';
		 $scope.request =[];



		$scope.allrequest = function ()
		{
			var obj = {  page : $scope.page ,id: <?php if(isset($freelancerId)){ echo $freelancerId; } ?>  }

		$http({
			 url: '<?php echo base_url(); ?>admin/getrequestform',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

			 $scope.request = response.data.result;

			 $scope.total = response.data.pcount;

			if($scope.page == 1)
			$scope.pagination($scope.total);
				});
		 }

		 $scope.pagination = function ($event)
		 {
			 if($scope.total > 10)
			{
					$('#pagination').pagination({
					items: $event,
					itemsOnPage: 10,
					cssStyle: 'light-theme',
					onPageClick:  function (e) {
					$scope.page  = e;
					$scope.allrequest();
					}
					});
				}
		 }

		$scope.allrequest();

		});

	<?php } ?>
	////request form

	//review
	<?php
				if(isset($freelancerId))
				 {
					 ?>

		 var app31 = angular.module('myApp31', [])

		 app31.filter('trustAsHtml',['$sce', function($sce) {

					return function(text) {

						return $sce.trustAsHtml(text);
							 };
				}]);

		 app31.directive('ngEnter', function () {
				return function (scope, element, attrs) {
						element.bind("keydown keypress", function (event) {
								if (event.which === 13) {
										scope.$apply(function () {
												scope.$eval(attrs.ngEnter);
										});

										event.preventDefault();
								}
						});
				};
		 });

		 app31.controller('myCtrt31', function($scope,$window,$http,$timeout) {

			$scope.total =0;
			$scope.page =1;
			$scope.id='';
			$scope.key ='';
			$scope.review =[];
      $scope.viewdata = [];




		 $scope.allreview = function ()
		 {
			 var obj = {  page : $scope.page ,id: <?php if(isset($freelancerId)){ echo $freelancerId; } ?>  }

		 $http({
				url: '<?php echo base_url(); ?>admin/getreview',
				method: "POST",
				data:obj,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				}
			}).then(function(response) {

				$scope.review = response.data.result;

				$scope.total = response.data.pcount;

			 if($scope.page == 1)
			 $scope.pagination($scope.total);
				 });
			}

			$scope.pagination = function ($event)
			{
				if($scope.total > 10)
			 {
					 $('#pagination').pagination({
					 items: $event,
					 itemsOnPage: 10,
					 cssStyle: 'light-theme',
					 onPageClick:  function (e) {
					 $scope.page  = e;
					 $scope.allreview();
					 }
					 });
				 }
			}

$scope.view = function(id,type)
{
 var obj = { id :id,type:type };
 $http({
  url: '<?php echo base_url(); ?>admin/viewReview',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    $scope.viewdata = response.data.result;
    angular.element('#view').modal('show');
  }
 });
}

$scope.confirm = function(id,type)
{
$scope.id = id;
$scope.type = type;
angular.element('#confirm').modal('show');
}

$scope.delete = function()
{
var obj = { id :$scope.id,type:$scope.type };
$http({
  url: '<?php echo base_url(); ?>admin/removeReview',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    angular.element('#confirm').modal('hide');
    $.notify("Review Deleted Successfully", "success");
    $scope.page = 1;
    $scope.allreview();

  }
});
}

		 $scope.allreview();

		 });

	 <?php } ?>

	//review

	// membership
	// blog section


	var app23 = angular.module('myApp23', [])

	app23.filter('trustAsHtml',['$sce', function($sce) {

			return function(text) {

				return $sce.trustAsHtml(text);
					 };
		}]);

	// 	app23.directive('numbersOnly', function() {
 //     return {
 //     require: 'ngModel',
 //    link: function(scope, element, attrs, modelCtrl) {
 //    modelCtrl.$parsers.push(function(inputValue) {
 //        if (inputValue == undefined) return ''
 //        var onlyNumeric = inputValue.replace(/[^0-9]/g, '');
 //        if (onlyNumeric != inputValue) {
 //            modelCtrl.$setViewValue(onlyNumeric);
 //            modelCtrl.$render();
 //        }
 //        return onlyNumeric;
 //    });
 //  }
 //    };
 // });

		app23.filter('underscoreless', function () {
	 return function (input) {
		 //console.log(input);
			return input.split(' ').join('-');

	 };
	});

	app23.directive('ngEnter', function () {
		return function (scope, element, attrs) {
				element.bind("keydown keypress", function (event) {
						if (event.which === 13) {
								scope.$apply(function () {
										scope.$eval(attrs.ngEnter);
								});

								event.preventDefault();
						}
				});
		};
	});

	app23.controller('myCtrt23', function($scope,$window,$http,$timeout,$interval) {


	 $scope.package =[];
	 $scope.name ='';
	 $scope.price ='';
	 $scope.company ='';
	 $scope.industry ='';
	 $scope.services ='';
	 $scope.review ='';
	 $scope.chat ='';
	 $scope.request ='';
	 $scope.ranking ='';
	 $scope.location ='';
	 $scope.keypeople ='';
	 $scope.testimonial ='';
	 $scope.casestudies ='';
	 $scope.groupchat ='';
	 $scope.total =0;
	 $scope.page =1;
	 $scope.id='';
	 $scope.key ='';
   $scope.content = '';
   $scope.hourly = '';
   $scope.customtitle ='';
   $scope.service_briefing ='';
   $scope.currency ='';
   $scope.review ='';
   $scope.guestpost ='';
   $scope.conference ='';
   $scope.team ='';
   $scope.employeeprofile ='';
   $scope.department ='';
   $scope.salary ='';
   $scope.attdendance ='';
   $scope.announcement ='';
   $scope.performance ='';
   $scope.increment ='';
   $scope.holiday ='';
   $scope.leavetype ='';
   $scope.leave ='';
   $scope.resignation ='';
   $scope.jobopening ='';
   $scope.candidate ='';
   $scope.interview ='';
   $scope.interviewfeedback ='';
   $scope.expense ='';
   $scope.invoice ='';
   $scope.income ='';
   $scope.dsr ='';
   $scope.timesheet ='';
   $scope.dsrremark ='';


	$scope.allpackage = function ()
	{
	 var obj = {  page : $scope.page   }

	$http({
		url: '<?php echo base_url(); ?>admin/getpackage',
		method: "POST",
		data:obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	 }).then(function(response) {

		$scope.package = response.data.result;

		$scope.total = response.data.pcount;

		 if($scope.page == 1)
		 $scope.pagination($scope.total);
			 });
	 }


   $scope.submitcontent = function()
  {
    $scope.submit = true;
     error = false;
   $scope.content = CKEDITOR.instances['content'].getData();

     if($scope.content == '' )
     {
       error = true;
     }

     if(error == true)
     {
       return false;
     }

     var obj = {  content : $scope.content  }

    $http({
        url: '<?php echo base_url(); ?>admin/packageContentUpdate',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

         if(response.data.message == 'true')
       {
        $.notify("Content Updated Successfully ", "success");
         $scope.submit = false;
        }
          });
    }

	 $scope.pagination = function ($event)
	 {
		if($scope.total > 10)
		{
					$('#pagination').pagination({
				 items: $event,
				 itemsOnPage: 10,
				 cssStyle: 'light-theme',
				 onPageClick:  function (e) {
					 $scope.page  = e;
					 $scope.allpackage();
						}
				 });
			 }
	 }

   $scope.getcontent = function()
  {
     $http({
        url: '<?php echo base_url(); ?>admin/getpackageContent',
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

      if(response.data.message == 'true')
       {
          CKEDITOR.instances['content'].setData(response.data.result.content);
        }
          });
    }

	 $scope.submitpackage = function()
	 {
		$scope.submitc = true;
	 error = false;

	 if($scope.name == '' || $scope.price == '' || $scope.company == '' || $scope.industry =='' || $scope.services =='' || $scope.review == '' || $scope.chat == "" || $scope.request == "" || $scope.ranking == '' || $scope.location == "")
	 {
		 error = true;
	 }

	 if($scope.keypeople == '' || $scope.testimonial == '' || $scope.casestudies == '' || $scope.groupchat == '' )
	 {
		 error = true;
	 }

   if($scope.hourly == '' || $scope.customtitle =='' ||  $scope.service_briefing =='' || $scope.currency =='' || $scope.review =='' || $scope.guestpost =='' || $scope.conference =='' || $scope.team == '')
   {
     error = true;
   }

   if( $scope.team =='' || $scope.employeeprofile =='' || $scope.department =='' || $scope.salary =='' || $scope.attdendance =='' || $scope.announcement =='' || $scope.performance =='' || $scope.increment =='' || $scope.holiday =='' || $scope.leavetype =='' || $scope.leave =='' || $scope.resignation =='')
   {
     error =true;
   }

   if($scope.jobopening == '' || $scope.candidate == '' || $scope.interview == '' || $scope.interviewfeedback == '')
   {
     error =true;
   }

   $scope.income = angular.element('#income').val();

   if($scope.expense =='' || $scope.invoice =='' || $scope.income =='')
   {
     error = true;
   }

   if($scope.dsr =='' || $scope.timesheet =='' || $scope.dsrremark =='')
   {
     error = true;
   }
	 if(error == true)
	 {
		 return false;
	 }

	 var obj = { packageName : $scope.name,packagePrice :$scope.price,packageProfile  : $scope.company ,packageIndustry :$scope.industry,packageService:$scope.services ,packageRemovalReview:$scope.review,packageChat :$scope.chat,packageRequestQuote:$scope.request,packageRanking :$scope.ranking,packagePreferredLocation:$scope.location,packageKeyPeople :$scope.keypeople,packageGroupChat:$scope.groupchat,packageTestimonial :$scope.testimonial,packageCaseStudies:$scope.casestudies,packageHourly:$scope.hourly,packageCustomTitle:$scope.customtitle,packageServiceBriefing:$scope.service_briefing,packageCurrency:$scope.currency,packageReview:$scope.review,packageGuestPost:$scope.guestpost,packageConference:$scope.conference,packageTeam:$scope.team,packageTeamProfile :$scope.employeeprofile,packageDepartment:$scope.department,packageSalary:$scope.salary,packageAttdendance:$scope.attdendance,packageAnnouncement:$scope.announcement,packagePerformance :$scope.performance,packageIncrement :$scope.increment,packageHoliday :$scope.holiday,packageLeaveType:$scope.leavetype,packageLeave :$scope.leave,packageResignation :$scope.resignation,packageJobOpening:$scope.jobopening,packageCandidateAdd:$scope.caniddate,packageInterview:$scope.interview,packageInterviewFeedback:$scope.interviewfeedback,packageInvoice:$scope.invoice,packageExpense:$scope.expense,packageIncome:$scope.income,packageDsr:$scope.dsr,packageTimesheet:$scope.timesheet,packageDsrRemark:$scope.dsrremark }


		$http({
				url: '<?php echo base_url(); ?>admin/packageSave',
				method: "POST",
				data:obj,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				}
			}).then(function(response) {

				 if(response.data.message == 'true')
			 {
				$.notify("Package Added Successfully ", "success");
        $interval(callAtInterval, 2000);

          function callAtInterval()
          {
            $window.location.href = '<?php echo base_url(); ?>admin/package';
          }

				}

					});
	 }

	 $scope.deletemodal = function(key,id)
	 {
	 $scope.key = key;
	 $scope.id = id;
	 angular.element("#Delete").modal('show');

	 }

	 $scope.deletepackage = function()
	 {
	 var obj = {  id : $scope.id }

		$http({
			url: '<?php echo base_url(); ?>admin/packagedelete',
			method: "POST",
			data: obj,
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			}
		}).then(function(response) {

			if(response.data.message == "true")
			{
				angular.element("#Delete").modal('hide');
				$.notify("Package Deleted Successfully", "success");
				//$scope.services.splice($scope.key,1);
        $scope.page = 1;
			$scope.allpackage();
			}

		});

	 }

		$scope.editpackage = function(id)
	 {
		 $scope.id = id;
		 var obj = {  id : id  }

			$http({
					url: '<?php echo base_url(); ?>admin/packageEdit',
					method: "POST",
					data:obj,
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					}
				}).then(function(response) {

					 if(response.data.message == 'true')
				 {
					 $scope.editdata = response.data.result;
					$scope.name =  response.data.result.packageName;
					$scope.price = response.data.result.packagePrice;
					$scope.company =  response.data.result.packageProfile ;
					$scope.industry = response.data.result.packageIndustry;
					$scope.services = response.data.result.packageService;
					$scope.review = response.data.result.packageRemovalReview;
					$scope.chat  = response.data.result.packageChat;
					$scope.request = response.data.result.packageRequestQuote;
					$scope.ranking = response.data.result.packageRanking;
					$scope.location = response.data.result.packagePreferredLocation;
					$scope.keypeople =response.data.result.packageKeyPeople;
				  $scope.testimonial = response.data.result.packageTestimonial;
				  $scope.casestudies =response.data.result.packageCaseStudies;
				  $scope.groupchat = response.data.result.packageGroupChat;


           angular.element('#editpackage').modal('show');
					}
						});
	 }

	 $scope.updatepackage = function()
	 {
		 $scope.submitc = true;
		 error = false;
		 if($scope.name == '' || $scope.price == '' || $scope.company == '' || $scope.industry =='' || $scope.services =='' || $scope.review == '' || $scope.chat == "" || $scope.request == "" || $scope.ranking == '' || $scope.location == "")
		{
			error = true;
		}

		if($scope.keypeople == '' || $scope.testimonial == '' || $scope.casestudies == '' || $scope.groupchat == '' )
 	 {
 		 error = true;
 	 }


		if(error == true)
		{
			return false;
		}

var obj = { packageId : $scope.id,packageName : $scope.name,packagePrice :$scope.price,packageProfile  : $scope.company ,packageIndustry :$scope.industry,packageService:$scope.services ,packageRemovalReview:$scope.review,packageChat :$scope.chat,packageRequestQuote:$scope.request,packageRanking :$scope.ranking,packagePreferredLocation:$scope.location,packageKeyPeople :$scope.keypeople,packageGroupChat:$scope.groupchat,packageTestimonial:$scope.testimonial,packageCaseStudies:$scope.casestudies}

			$http({
					url: '<?php echo base_url(); ?>admin/packageUpdate',
					method: "POST",
					data:obj,
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					}
				}).then(function(response) {

					 if(response.data.message == 'true')
				 {
					$.notify("package Updated Successfully ", "success");
					 angular.element('#editpackage').modal('hide');

					 $scope.name ='';
				 	$scope.price ='';
				 	$scope.company ='';
				 	$scope.industry ='';
				 	$scope.services ='';
				 	$scope.review ='';
				 	$scope.chat ='';
				 	$scope.request ='';
				 	$scope.ranking ='';
				 	$scope.location ='';
		      $scope.submitc = false;
					 $scope.allpackage();
					}
						});

	 }



	$scope.allpackage();
  $scope.getcontent();
	});
	// membership

	  // support chat

		var app24 = angular.module('myApp24',['luegg.directives'])

			app24.filter('time', function () {

				 return function (item) {
				 var dates = new Date(Date.parse(item))
				 var minutes = dates.getMinutes();

				 if(minutes > 10)
				 {
					 var time = '' + dates.getHours() + ':' + dates.getMinutes();
				 }

					else
				 {
					 var time = '' + dates.getHours() + ':'+'0'+dates.getMinutes();
					}

					return time;
				 };
				});


        app24.filter('date', function () {
             return function (item) {
               const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                 "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
               ];
               var dates = new Date(Date.parse(item))
               var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
               return newDate;
             };
           });

			 app24.filter('trustAsHtml',['$sce', function($sce) {

				 return function(text) {

					 return $sce.trustAsHtml(text);
							};
			 }]);

			 app24.directive('numbersOnly', function() {
		return {
			 require: 'ngModel',
			 link: function(scope, element, attrs, modelCtrl) {
					 modelCtrl.$parsers.push(function(inputValue) {
							 if (inputValue == undefined) return ''
							 var onlyNumeric = inputValue.replace(/[^0-9]/g, '');
							 if (onlyNumeric != inputValue) {
									 modelCtrl.$setViewValue(onlyNumeric);
									 modelCtrl.$render();
							 }
							 return onlyNumeric;
					 });
			 }
		};
		});

					 app24.directive('ngEnter', function () {
					 return function (scope, element, attrs) {
							 element.bind("keydown keypress", function (event) {
									 if (event.which === 13) {
											 scope.$apply(function () {
													 scope.$eval(attrs.ngEnter);
											 });

											 event.preventDefault();
									 }
							 });
					 };
				});



				 app24.controller('myCtrt24', function($scope,$window,$http,$interval) {
					 $scope.glued = true;


					 $scope.messages = [];
           $scope.p =[];
					 $scope.userId ='';
					 $scope.username ='';
					 $scope.userimage ='';
					 $scope.msgtext ='';
					 $scope.edit ='';
					 $scope.editmsgId ='';
					 $scope.attachment ='';
					 $scope.editmsg ='';
					 $scope.roomId = '';
					 $scope.typingLENGTH = 500;
					 $scope.lastTypingTime='';
					 $scope.typinguser = '';
					 $scope.t = 0;
					 $scope.adminId = 0;
					 $scope.adminname ="Support";
					 $scope.page = 1;
					 $scope.total = 0;
					 $scope.selectedContact = 0;
					 $scope.selectedContactId = '';
					 $scope.person = [];

				 var socket = io('https://top-seo-sockets.herokuapp.com');



					 $scope.socketjoinchat = function (id)
						{
							socket.emit('join-chat', { senderId: $scope.adminId,receiverId : $scope.selectedContactId });
							$scope.roomId = 'Room_'+id+'_'+$scope.adminId;
							$scope.getchat($scope.roomId);
						 }

					 socket.on('messages', function(msg)
					 {
              //console.log(msg);
						//	alert(msg);
						 if(!$scope.messages[msg['MSG_ROOMID']])
						 $scope.messages[msg['MSG_ROOMID']] = [];
						 $scope.messages[msg['MSG_ROOMID']].push(msg);

						 if($scope.person)
						 {
						 for(var a in $scope.person)
							{
								if($scope.person[a].u_id == msg['MSG_SENTBY'])
								{
									 $scope.person[a]['unread'].push(msg);
								}

							 }
							 socket.emit('statusupate', { senderId:$scope.adminId,rec:$scope.person[0].u_id,status:1});

						 }

						 $scope.$apply();
					 });



					 socket.on('typing', function(data)
					{
          	 $scope.t = 1;
						 $scope.typinguser = data.sendername;
				 });

			  socket.on('stoptyping', function(data)
				 {
						 $scope.t = 0;
				 });

				 socket.on('deletemessage', function(data)
				 {

					 for(var v in $scope.messages[data.MSG_ROOMID])
					 {
						 if($scope.messages[data.MSG_ROOMID][v]['_id'] == data.id)
							 {
								 $scope.messages[data.MSG_ROOMID][v]['MSG_DELETE'] = data.MSG_DELETE;
							 }

					 }
					 $scope.$apply();
					 // console.log("MSG Deleted");
				 });

				 socket.on('updatemessage', function(data)
				 {

					 for(var v in $scope.messages[data.MSG_ROOMID])
					 {
						 if($scope.messages[data.MSG_ROOMID][v]['_id'] == data.id)
							 {
								 $scope.messages[data.MSG_ROOMID][v]['MSG_EDIT'] = 1;
								 $scope.messages[data.MSG_ROOMID][v]['MSG_TEXT'] = data.MSG_TEXT;
							 }

					 }
					 $scope.$apply();
						//console.log("MSG Updated");
				 });


					$scope.updateTyping = function ()
					{
					//	console.log("typing");

						 if (!$scope.typing)
						 {
							 $scope.typing = true;
							 socket.emit('startTyping', { roomId:$scope.roomId,sendername:$scope.adminname });
						 }

						 $scope.lastTypingTime = (new Date()).getTime();

						 $interval(function()
						 {

						 var typingTimer = (new Date()).getTime();
							var timeDiff    = typingTimer - $scope.lastTypingTime;
							if (timeDiff   >= $scope.typingLENGTH && $scope.typing) {
								//console.log('stopeed');
								socket.emit('stopTyping', { roomId:$scope.roomId,sendername:$scope.adminname });
								$scope.t = 0;

								$scope.typing = false;
							}
							 },$scope.typingLENGTH);
				 }



			 $scope.sendmessage = function(k,id)
			 {
				   error = false;
						var msgtext = angular.element('.msgtext').val();

						if(id =='' )
						{
							error = true;
						}

						if(msgtext == '' && $scope.attachment == '')
						{
						 error = true;
						}

					 if(error == true)
					 {
						 return false;
					 }
					 var name =  $scope.person[k].name;
					 var image =  $scope.person[k].logo;
					 socket.emit('message', { MSG_SENTBYNAME:$scope.adminname,MSG_SENTBYIMAGE:'', MSG_SENTBY:$scope.adminId,MSG_SENTTONAME:name,  MSG_SENTTO : id,MSG_SENTTOIMAGE:image,MSG_TEXT : msgtext,MSG_ATTACHMENT:'',MSG_ROOMID :$scope.roomId,MSG_DELETE : 0 ,MSG_EDIT: 0,MSG_STATUS:0,MSG_TYPE:2 });
					 angular.element('.msgtext').val('');
				 }


					 $scope.messageEdit = function(key,id)
					 {
						 $scope.edit = 1;
						 $scope.editmsgId = id;
						 $scope.editmsg = $scope.messages[$scope.roomId][key]['MSG_TEXT'];

						 $(".editmsg"+id).attr('contenteditable','true');
						 $(".editmsg"+id).addClass("editedmsg");
					 }


					 $scope.messageUpdate = function(type,id)
					 {

						 if(type == "update")
						 {
							var msg = $(".editmsg"+id).text();
							 if(msg != '' )
							 {

								 socket.emit('updatemessage', { id:$scope.editmsgId,MSG_TEXT:msg,MSG_ROOMID:$scope.roomId,MSG_EDIT:1});
								 $scope.edit = '';
								 $scope.editmsgId = '';
								 $(".editmsg"+id).attr('contenteditable','false');
								 $(".editmsg"+id).removeClass("editedmsg");

							 }

						 }
						 else if(type == "cancel")
						 {
							 $(".editmsg"+id).text($scope.editmsg);
							 $scope.edit = '';
							 $scope.editmsgId = '';
							 $(".editmsg"+id).attr('contenteditable','false');
							 $(".editmsg"+id).removeClass("editedmsg");
						 }

					 }

						$scope.messageDelete = function(key,id)
						{
							 socket.emit('deletemessage', { id:id,MSG_DELETE:1,MSG_ROOMID:$scope.roomId});
		        }

					 $scope.deleteAttachment = function ()
					 {
						 $scope.attachment ='';
					 }
		 /// attchment upload
					 $scope.chatAttachment = function ($event)
					 {
						 $scope.attch = true;
						 var files =$event.files;
						 for (var i = 0; i < files.length; i++) {
							 var f = files[i]
							 var fileName = files[i].name;
							 var filePath = fileName;

							 var fileReader = new FileReader();
							 fileReader.onload = (function(e) {
								 var d = JSON.stringify({ image :  e.target.result,name : filePath });
								 $http({
									 url: '<?php echo base_url(); ?>chatAttachment',
									 method: "POST",
									 data: d,
									 headers: {
										 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
									 }
								 }).then(function(response) {
									 $scope.attachment = response.data;
									 $scope.attch = false;

								 });

							 });
							 fileReader.readAsDataURL(f);
						 }

					 }
		 /// attchment upload

		 // chat person filter
		 $scope.getperson = function ()
		 {
			var obj = {  page : $scope.page   }

		 $http({
			 url: '<?php echo base_url(); ?>admin/supportchatperson',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
			}).then(function(response)
			{
				$scope.getunreadmsg();

			 $scope.person = response.data.result;
			 $scope.selectedContactId = $scope.person[0].u_id;
       $scope.roomId = 'Room_'+$scope.selectedContactId+'_'+$scope.adminId;
			 $scope.socketjoinchat($scope.selectedContactId);
       $scope.getchat($scope.roomId);

			 $scope.total = response.data.pcount;
			// $scope.supportchatperson();

				if($scope.page == 1)
				$scope.pagination($scope.total);
					});
			}

			$scope.pagination = function ($event)
			{
			 if($scope.total > 10)
			 {
						 $('#pagination').pagination({
						items: $event,
						itemsOnPage: 10,
						cssStyle: 'light-theme',
						onPageClick:  function (e) {
							$scope.page  = e;
							$scope.getperson();
							 }
						});
					}
			}

			$scope.selectchat = function (k)
			{
				$scope.selectedContact = k;
				$scope.selectedContactId = $scope.person[k].u_id;
				socket.emit('statusupate', { senderId:$scope.adminId,rec:$scope.person[k].u_id,status:1});
        $scope.roomId = 'Room_'+$scope.selectedContactId+'_'+$scope.adminId;
				$scope.socketjoinchat($scope.selectedContactId);
        $scope.getchat($scope.roomId);

        $scope.getunreadmsg();
			}

					 $scope.getchat = function(roomId)
					 {
							$scope.messages[roomId] = [];

						$http({
						url: 'https://top-seo-sockets.herokuapp.com/get-firm-messages?roomId='+roomId,
						method: "GET",
						headers: {
						 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
							}
						}).then(function(response) {

							if(response.data.messages.length > 0)
							{
							 if(!$scope.messages[response.data.messages[0]['MSG_ROOMID']])
							$scope.messages[response.data.messages[0]['MSG_ROOMID']] = [];
							$scope.messages[response.data.messages[0]['MSG_ROOMID']] = response.data.messages.reverse();
						  }


								});
							}

							$scope.getunreadmsg = function()
							{
               $http({
							 url: 'https://top-seo-sockets.herokuapp.com/adminunread-msg',
							 method: "GET",
							 headers: {
								'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
								 }
							 }).then(function(response) {
								// console.log(response.data.messages[0]['MSG_SENTBY']);

								 if($scope.person)
								 {
                 for(var a in $scope.person)
								  {
										$scope.person[a]['unread'] = [];
									  for(var m in response.data.messages)
									  {
											if($scope.person[a].u_id == response.data.messages[m]['MSG_SENTBY'])
											{
										   $scope.person[a]['unread'].push(response.data.messages[m]);
										   }
									   }
								   }
									 socket.emit('statusupate', { senderId:$scope.adminId,rec:$scope.person[0].u_id,status:1});

								 }
                 // console.log($scope.person);
									 });
								 }


		 // message pagination
		 $scope.lastMessages = function()
		 {
			 $http({
			url: 'https://top-seo-sockets.herokuapp.com/last-msg?com='+$scope.roomId+'&&skip='+$scope.messages[$scope.roomId].length+'&&limit=10',
			method: "POST",
			headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			}
			}).then(function(response) {

				if(response.data.messages.length != 0)
				{
				var msg = response.data.messages;
				var msg1 = msg.reverse();
				 $scope.messages[$scope.roomId].unshift(...msg1);

				 }
					 });
			}

			// $scope.supportchatperson = function()
			// {
			// 	$http({
			//  url: 'https://top-seo-sockets.herokuapp.com/getsupportchatperson',
			//  method: "POST",
			//  headers: {
			// 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			//  }
			//  }).then(function(response) {
      //      if(response.data.messages.length != 0)
			// 		 {
			// 			 var p = response.data.messages;
			// 			 var p1 = p.reverse();
			// 			 var match = false;
			//
			// 			 for(var a in p1)
			// 			 {
			// 				  var db = {};
			// 				  db['name'] = p1[a]['MSG_SENTBYNAME'];
			// 				  db['u_id'] = p1[a]['MSG_SENTBY'];
			// 					db['type'] = '5';
			// 				 if($scope.p)
			// 				 {
			// 				   for(var v in $scope.p)
			// 					 {
			// 						 if($scope.p[v].u_id == db['u_id'])
			// 						 {
      //                match = true;
			// 						 }
			// 					 }
			// 				 }
			//
			// 				 if(!match)
			// 				 {
      //           $scope.p.push(db);
			// 				  }
			// 			 }
			//
			//
			// 			  $scope.person.unshift(...$scope.p);
			//
			//
      //         }
			// 			});
			//  }

		////upload attchment image

		 $scope.uploadImage = function ($event)
		 {

			var files =$event.files;
			for (var i = 0; i < files.length; i++) {
			var f = files[i]
			var fileName = files[i].name;
			var filePath = fileName;

			var fileReader = new FileReader();
			fileReader.onload = (function(e) {
			//jQuery('#'+elName).attr('src',e.target.result);
			var d = JSON.stringify({ image :  e.target.result });
		 $http({
			 url: '<?php echo base_url(); ?>imageUpload',
			 method: "POST",
			 data: d,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {
					 $scope.image = response.data;

				 });

		 });
			fileReader.readAsDataURL(f);
			}

			}

		$scope.getperson();
		//$scope.supportchatperson();

				});
	  // support chat

		// conference

			var app25 = angular.module('myApp25', [])

			app25.filter('trustAsHtml',['$sce', function($sce) {

					return function(text) {

						return $sce.trustAsHtml(text);
							 };
				}]);

				app25.filter('underscoreless', function () {
			 return function (input) {
				 //console.log(input);
					return input.split(' ').join('-');

			 };
			});

			app25.directive('ngEnter', function () {
				return function (scope, element, attrs) {
						element.bind("keydown keypress", function (event) {
								if (event.which === 13) {
										scope.$apply(function () {
												scope.$eval(attrs.ngEnter);
										});

										event.preventDefault();
								}
						});
				};
			});

			app25.controller('myCtrt25', function($scope,$window,$http,$timeout) {


			 $scope.conference =[];
			 $scope.total =0;
			 $scope.page =1;
			 $scope.id='';
			 $scope.key ='';
			 $scope.status ='';
       $scope.viewc =[];

			$scope.allconference = function ()
			{
			 var obj = {  page : $scope.page   }

			$http({
				url: '<?php echo base_url(); ?>admin/getconference',
				method: "POST",
				data:obj,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				}
			 }).then(function(response) {

				$scope.conference = response.data.result;

				$scope.total = response.data.pcount;

				 if($scope.page == 1)
				 $scope.pagination($scope.total);
					 });
			 }

			 $scope.pagination = function ($event)
			 {
				if($scope.total > 10)
				{
							$('#pagination').pagination({
						 items: $event,
						 itemsOnPage: 10,
						 cssStyle: 'light-theme',
						 onPageClick:  function (e) {
							 $scope.page  = e;
							 $scope.allconference();
								}
						 });
					 }
			 }


			 $scope.statusmodal = function(id,status)
			 {
         $scope.id = id;
         $scope.status = status;
			   angular.element("#Status").modal('show');

			 }

       $scope.confirm = function(id)
 			 {
         $scope.id = id;
 			   angular.element("#Delete").modal('show');
       }

			 $scope.conferenceStatus = function()
			 {
			 var obj = {  id : $scope.id,status:$scope.status }

				$http({
					url: '<?php echo base_url(); ?>admin/conferenceStatus',
					method: "POST",
					data: obj,
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					}
				}).then(function(response) {

					if(response.data.message == "true")
					{
						angular.element("#Status").modal('hide');
						$.notify("Conference Status Changed Successfully", "success");
					  $scope.allconference();
					}

				});

			 }

       $scope.delete = function()
      {
      var obj = {  id : $scope.id}

       $http({
         url: '<?php echo base_url(); ?>admin/conferenceDelete',
         method: "POST",
         data: obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {

         if(response.data.message == "true")
         {
           angular.element("#Delete").modal('hide');
           $.notify("Conference Delete Successfully", "success");
           $scope.page = 1;
           $scope.allconference();
         }

       });

      }

			 $scope.viewConference = function (id)
			 {
				var obj = {  id :id   }

			 $http({
				 url: '<?php echo base_url(); ?>admin/getoneconference',
				 method: "POST",
				 data:obj,
				 headers: {
					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
				}).then(function(response) {

				 $scope.viewc = response.data.result;
				 angular.element('#viewConference').modal('show');


						});
				}



			$scope.allconference();

			});
		// conference

		// user testimonial

			var app26 = angular.module('myApp26', [])

			app26.filter('trustAsHtml',['$sce', function($sce) {

					return function(text) {

						return $sce.trustAsHtml(text);
							 };
				}]);

				app26.filter('underscoreless', function () {
			 return function (input) {
				 //console.log(input);
					return input.split(' ').join('-');

			 };
			});

			app26.directive('ngEnter', function () {
				return function (scope, element, attrs) {
						element.bind("keydown keypress", function (event) {
								if (event.which === 13) {
										scope.$apply(function () {
												scope.$eval(attrs.ngEnter);
										});

										event.preventDefault();
								}
						});
				};
			});

			app26.controller('myCtrt26', function($scope,$window,$http,$timeout) {


			 $scope.user =[];
			 $scope.total =0;
			 $scope.page =1;
			 $scope.id='';
			 $scope.key ='';
			 $scope.status ='';


			$scope.alluser = function ()
			{
			 var obj = {  page : $scope.page   }

			$http({
				url: '<?php echo base_url(); ?>admin/getusertestimonial',
				method: "POST",
				data:obj,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				}
			 }).then(function(response) {

				$scope.user = response.data.result;

				$scope.total = response.data.pcount;

				 if($scope.page == 1)
				 $scope.pagination($scope.total);
					 });
			 }

			 $scope.pagination = function ($event)
			 {
				 if($scope.total > 10)
				 {
							$('#pagination').pagination({
						 items: $event,
						 itemsOnPage: 10,
						 cssStyle: 'light-theme',
						 onPageClick:  function (e) {
							 $scope.page  = e;
							 $scope.alluser();
								}
						 });
				}
		}


			$scope.alluser();

			});
		// user testimonial

		// user portfolio

					var app27 = angular.module('myApp27', [])

					app27.filter('trustAsHtml',['$sce', function($sce) {

							return function(text) {

								return $sce.trustAsHtml(text);
									 };
						}]);

						app27.filter('underscoreless', function () {
					 return function (input) {
						 //console.log(input);
							return input.split(' ').join('-');

					 };
					});

					app27.directive('ngEnter', function () {
						return function (scope, element, attrs) {
								element.bind("keydown keypress", function (event) {
										if (event.which === 13) {
												scope.$apply(function () {
														scope.$eval(attrs.ngEnter);
												});

												event.preventDefault();
										}
								});
						};
					});

					app27.controller('myCtrt27', function($scope,$window,$http,$timeout) {


					 $scope.user =[];
					 $scope.total =0;
					 $scope.page =1;
					 $scope.id='';
					 $scope.key ='';
					 $scope.status ='';


					$scope.alluser = function ()
					{
					 var obj = {  page : $scope.page   }

					$http({
						url: '<?php echo base_url(); ?>admin/getuserportfolio',
						method: "POST",
						data:obj,
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
						}
					 }).then(function(response) {

						$scope.user = response.data.result;

						$scope.total = response.data.pcount;

						 if($scope.page == 1)
						 $scope.pagination($scope.total);
							 });
					 }

					 $scope.pagination = function ($event)
					 {
						 if($scope.total > 10)
						 {
									$('#pagination').pagination({
								 items: $event,
								 itemsOnPage: 10,
								 cssStyle: 'light-theme',
								 onPageClick:  function (e) {
									 $scope.page  = e;
									 $scope.alluser();
										}
								 });
						}
				}


					$scope.alluser();

					});
		// user portfolio

		// case study

						 var app28 = angular.module('myApp28', [])

						 app28.filter('trustAsHtml',['$sce', function($sce) {

								 return function(text) {

									 return $sce.trustAsHtml(text);
											};
							 }]);

							 app28.filter('underscoreless', function () {
							return function (input) {
								//console.log(input);
								 return input.split(' ').join('-');

							};
						 });

						 app28.directive('ngEnter', function () {
							 return function (scope, element, attrs) {
									 element.bind("keydown keypress", function (event) {
											 if (event.which === 13) {
													 scope.$apply(function () {
															 scope.$eval(attrs.ngEnter);
													 });

													 event.preventDefault();
											 }
									 });
							 };
						 });

						 app28.controller('myCtrt28', function($scope,$window,$http,$timeout) {


							$scope.user =[];
							$scope.total =0;
							$scope.page =1;
							$scope.id='';
							$scope.key ='';
							$scope.status ='';


						 $scope.alluser = function ()
						 {

							var obj = {  page : $scope.page   }

						 $http({
							 url: '<?php echo base_url(); ?>admin/getusercasestudy',
							 method: "POST",
							 data:obj,
							 headers: {
								 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
							 }
							}).then(function(response) {

							 $scope.user = response.data.result;

							 $scope.total = response.data.pcount;

								if($scope.page == 1)
								$scope.pagination($scope.total);
									});
							}

							$scope.pagination = function ($event)
							{
								if($scope.total > 10)
								{
										 $('#pagination').pagination({
										items: $event,
										itemsOnPage: 10,
										cssStyle: 'light-theme',
										onPageClick:  function (e) {
											$scope.page  = e;
											$scope.alluser();
											 }
										});
							 }
					 }


						 $scope.alluser();

						 });
		// case study

		// user pricings

						var app29 = angular.module('myApp29', [])

						app29.filter('trustAsHtml',['$sce', function($sce) {

								return function(text) {

									return $sce.trustAsHtml(text);
										 };
							}]);

							app29.filter('underscoreless', function () {
						 return function (input) {
							 //console.log(input);
								return input.split(' ').join('-');

						 };
						});

						app29.directive('ngEnter', function () {
							return function (scope, element, attrs) {
									element.bind("keydown keypress", function (event) {
											if (event.which === 13) {
													scope.$apply(function () {
															scope.$eval(attrs.ngEnter);
													});

													event.preventDefault();
											}
									});
							};
						});

						app29.controller('myCtrt29', function($scope,$window,$http,$timeout) {


						 $scope.user =[];
						 $scope.total =0;
						 $scope.page =1;
						 $scope.id='';
						 $scope.key ='';
						 $scope.status ='';


						$scope.alluser = function ()
						{

						 var obj = {  page : $scope.page   }

						$http({
							url: '<?php echo base_url(); ?>admin/getuserpricing',
							method: "POST",
							data:obj,
							headers: {
								'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
							}
						 }).then(function(response) {

							$scope.user = response.data.result;

							$scope.total = response.data.pcount;

							 if($scope.page == 1)
							 $scope.pagination($scope.total);
								 });
						 }

						 $scope.pagination = function ($event)
						 {
							 if($scope.total > 10)
							 {
										$('#pagination').pagination({
									 items: $event,
									 itemsOnPage: 10,
									 cssStyle: 'light-theme',
									 onPageClick:  function (e) {
										 $scope.page  = e;
										 $scope.alluser();
											}
									 });
							}
					}

						$scope.alluser();

					});

		// user pricing

		/// user request form

								var app30 = angular.module('myApp30', [])

								app30.filter('trustAsHtml',['$sce', function($sce) {

										return function(text) {

											return $sce.trustAsHtml(text);
												 };
									}]);

									app30.filter('underscoreless', function () {
								 return function (input) {
									 //console.log(input);
										return input.split(' ').join('-');

								 };
								});

								app30.directive('ngEnter', function () {
									return function (scope, element, attrs) {
											element.bind("keydown keypress", function (event) {
													if (event.which === 13) {
															scope.$apply(function () {
																	scope.$eval(attrs.ngEnter);
															});

															event.preventDefault();
													}
											});
									};
								});

								app30.controller('myCtrt30', function($scope,$window,$http,$timeout) {


								 $scope.user =[];
								 $scope.total =0;
								 $scope.page =1;
								 $scope.id='';
								 $scope.key ='';
								 $scope.status ='';


								$scope.alluser = function ()
								{

								 var obj = {  page : $scope.page   }

								$http({
									url: '<?php echo base_url(); ?>admin/getuserrequestform',
									method: "POST",
									data:obj,
									headers: {
										'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
									}
								 }).then(function(response) {

									$scope.user = response.data.result;

									$scope.total = response.data.pcount;

									 if($scope.page == 1)
									 $scope.pagination($scope.total);
										 });
								 }

								 $scope.pagination = function ($event)
								 {
									 if($scope.total > 10)
									 {
												$('#pagination').pagination({
											 items: $event,
											 itemsOnPage: 10,
											 cssStyle: 'light-theme',
											 onPageClick:  function (e) {
												 $scope.page  = e;
												 $scope.alluser();
													}
											 });
									}
							}

								$scope.alluser();

							});

		/// user request form

		// suggestion
		var app32 = angular.module('myApp32', [])

		app32.filter('trustAsHtml',['$sce', function($sce) {

				return function(text) {

					return $sce.trustAsHtml(text);
						 };
			}]);

			app32.filter('underscoreless', function () {
		 return function (input) {
			 //console.log(input);
				return input.split(' ').join('-');

		 };
		});

		app32.directive('ngEnter', function () {
			return function (scope, element, attrs) {
					element.bind("keydown keypress", function (event) {
							if (event.which === 13) {
									scope.$apply(function () {
											scope.$eval(attrs.ngEnter);
									});

									event.preventDefault();
							}
					});
			};
		});

		app32.controller('myCtrt32', function($scope,$window,$http,$timeout) {


		 $scope.user =[];
		 $scope.total =0;
		 $scope.page =1;
		 $scope.id='';
		 $scope.key ='';
		 $scope.status ='';
		 $scope.referenceId ='';
		 $scope.type ='';


		$scope.alluser = function ()
		{

		 var obj = {  page : $scope.page   }

		$http({
			url: '<?php echo base_url(); ?>admin/getsuggestion',
			method: "POST",
			data:obj,
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			}
		 }).then(function(response) {

			$scope.user = response.data.result;

			$scope.total = response.data.pcount;

			 if($scope.page == 1)
			 $scope.pagination($scope.total);
				 });
		 }

		 $scope.pagination = function ($event)
		 {
			 if($scope.total > 10)
			 {
						$('#pagination').pagination({
					 items: $event,
					 itemsOnPage: 10,
					 cssStyle: 'light-theme',
					 onPageClick:  function (e) {
						 $scope.page  = e;
						 $scope.alluser();
							}
					 });
			}
	  }

		$scope.status = function(ref,logId,status,type)
		{
			var obj = {  ref : ref,logId : logId,status : status,type:type   }

 		$http({
 			url: '<?php echo base_url(); ?>admin/suggestionStatus',
 			method: "POST",
 			data:obj,
 			headers: {
 				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 			}
 		 }).then(function(response) {
          if(response.data.message =="true")
					{
						$.notify("Suggestion Status Changed Successfully", "success");
						$scope.alluser();
					}
					else
					{
						$.notify("Suggestion Status is not Changed", "error");
          }
 				 });
		}

		$scope.deletemodal = function(logId,reference,type)
	  {
	 	 $scope.id = logId;
	 	 $scope.referenceId = reference;
	 	 $scope.type = type;
	 	 angular.element("#Delete").modal('show');

	  }

	  $scope.deletesuggestion = function()
	  {
	 	 var obj = {  logId : $scope.id,referenceId:$scope.referenceId,type:$scope.type }

	  	$http({
	  		url: '<?php echo base_url(); ?>admin/deletesuggestion',
	  		method: "POST",
	  		data: obj,
	  		headers: {
	  			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	  		}
	  	}).then(function(response) {

	  		if(response.data.message == "true")
	  		{
	  			angular.element("#Delete").modal('hide');
	  			$.notify("Suggestion Deleted Successfully", "success");
	  			//$scope.services.splice($scope.key,1);
          $scope.page = 1;
	 			$scope.alluser();
	  		}

	  	});

	  }


		$scope.alluser();

	});

		// suggestion

		// support external
		// support chat

	 var app33 = angular.module('myApp33',['luegg.directives'])

		 app33.filter('time', function () {

				return function (item) {
				var dates = new Date(Date.parse(item))
				var minutes = dates.getMinutes();

				if(minutes > 10)
				{
					var time = '' + dates.getHours() + ':' + dates.getMinutes();
				}

				 else
				{
					var time = '' + dates.getHours() + ':'+'0'+dates.getMinutes();
				 }

				 return time;
				};
			 });


       app33.filter('date', function () {
            return function (item) {
              const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
              var dates = new Date(Date.parse(item))
              var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
              return newDate;
            };
          });

			app33.filter('trustAsHtml',['$sce', function($sce) {

				return function(text) {

					return $sce.trustAsHtml(text);
						 };
			}]);

			app33.directive('numbersOnly', function() {
	 return {
			require: 'ngModel',
			link: function(scope, element, attrs, modelCtrl) {
					modelCtrl.$parsers.push(function(inputValue) {
							if (inputValue == undefined) return ''
							var onlyNumeric = inputValue.replace(/[^0-9]/g, '');
							if (onlyNumeric != inputValue) {
									modelCtrl.$setViewValue(onlyNumeric);
									modelCtrl.$render();
							}
							return onlyNumeric;
					});
			}
	 };
	 });

					app33.directive('ngEnter', function () {
					return function (scope, element, attrs) {
							element.bind("keydown keypress", function (event) {
									if (event.which === 13) {
											scope.$apply(function () {
													scope.$eval(attrs.ngEnter);
											});

											event.preventDefault();
									}
							});
					};
			 });



				app33.controller('myCtrt33', function($scope,$window,$http,$interval) {
					$scope.glued = true;


					$scope.messages = [];
					 $scope.p =[];
					$scope.userId =0;
					$scope.username ='';
					$scope.userimage ='';
					$scope.msgtext ='';
					$scope.edit ='';
					$scope.editmsgId ='';
					$scope.attachment ='';
					$scope.editmsg ='';
					$scope.roomId = '';
					$scope.typingLENGTH = 500;
					$scope.lastTypingTime='';
					$scope.typinguser = '';
					$scope.t = 0;
					$scope.adminId = 0;
					$scope.adminname ="Support team";
					$scope.page = 1;
					$scope.total = 0;
					$scope.selectedContact = 0;
					$scope.selectedContactId = '';
					$scope.person = [];

				var socket = io('https://top-seo-sockets.herokuapp.com');



         $scope.dateDifference = function(date)
         {
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
            if (dd < 10) {
              dd = '0' + dd
            }
            if (mm < 10) {
              mm = '0' + mm
            }
            today = yyyy + '/' + mm + '/' + dd;
            $scope.today = today;
            var date2 = new Date(today);
            var date1 = new Date(date);
            var timeDiff = Math.abs(date2.getTime() - date1.getTime());
            $scope.dayDifference = Math.ceil(timeDiff / (1000 * 3600 * 24));
            return $scope.dayDifference;
            //console.log($scope.dayDifference);
          }

					$scope.socketjoinchat = function (id)
					 {
						 socket.emit('join-chat', { senderId: $scope.adminId,receiverId : $scope.selectedContactId });
						 $scope.roomId = 'Room_'+id+'_'+$scope.adminId;
						 $scope.getchat($scope.roomId);
						}

					socket.on('messages', function(msg)
					{
							//console.log(msg);
					 //	alert(msg);
						if(!$scope.messages[msg['MSG_ROOMID']])
						$scope.messages[msg['MSG_ROOMID']] = [];
						$scope.messages[msg['MSG_ROOMID']].push(msg);

						if($scope.person)
						{
						for(var a in $scope.person)
						 {
							 if($scope.person[a].u_id == msg['MSG_SENTBY'])
							 {
									$scope.person[a]['unread'].push(msg);
							 }

							}
							socket.emit('statusupate', { senderId:$scope.adminId,rec:$scope.person[0].u_id,status:1});

						}

						$scope.$apply();
					});



					socket.on('typing', function(data)
				 {
						$scope.t = 1;
						$scope.typinguser = data.sendername;
				});

			 socket.on('stoptyping', function(data)
				{
						$scope.t = 0;
				});

				socket.on('deletemessage', function(data)
				{

					for(var v in $scope.messages[data.MSG_ROOMID])
					{
						if($scope.messages[data.MSG_ROOMID][v]['_id'] == data.id)
							{
								$scope.messages[data.MSG_ROOMID][v]['MSG_DELETE'] = data.MSG_DELETE;
							}

					}
					$scope.$apply();
					// console.log("MSG Deleted");
				});

				socket.on('updatemessage', function(data)
				{

					for(var v in $scope.messages[data.MSG_ROOMID])
					{
						if($scope.messages[data.MSG_ROOMID][v]['_id'] == data.id)
							{
								$scope.messages[data.MSG_ROOMID][v]['MSG_EDIT'] = 1;
								$scope.messages[data.MSG_ROOMID][v]['MSG_TEXT'] = data.MSG_TEXT;
							}

					}
					$scope.$apply();
					 //console.log("MSG Updated");
				});


				 $scope.updateTyping = function ()
				 {
				 //	console.log("typing");

						if (!$scope.typing)
						{
							$scope.typing = true;
							socket.emit('startTyping', { roomId:$scope.roomId,sendername:$scope.adminname });
						}

						$scope.lastTypingTime = (new Date()).getTime();

						$interval(function()
						{

						var typingTimer = (new Date()).getTime();
						 var timeDiff    = typingTimer - $scope.lastTypingTime;
						 if (timeDiff   >= $scope.typingLENGTH && $scope.typing) {
							 //console.log('stopeed');
							 socket.emit('stopTyping', { roomId:$scope.roomId,sendername:$scope.adminname });
							 $scope.t = 0;

							 $scope.typing = false;
						 }
							},$scope.typingLENGTH);
				}



			$scope.sendmessage = function(k,id)
			{
					error = false;
					 var msgtext = angular.element('.msgtext').val();

					 if(id =='' )
					 {
						 error = true;
					 }

					 if(msgtext == '' && $scope.attachment == '')
					 {
						error = true;
					 }

					if(error == true)
					{
						return false;
					}
					var name =  $scope.person[k].name;
					var image =  $scope.person[k].logo;
					socket.emit('message', { MSG_SENTBYNAME:$scope.adminname,MSG_SENTBYIMAGE:'', MSG_SENTBY:$scope.adminId,MSG_SENTTONAME:name,  MSG_SENTTO : id,MSG_SENTTOIMAGE:image,MSG_TEXT : msgtext,MSG_ATTACHMENT:'',MSG_ROOMID :$scope.roomId,MSG_DELETE : 0 ,MSG_EDIT: 0,MSG_STATUS:0,MSG_TYPE:2 });
					angular.element('.msgtext').val('');
				}


					$scope.messageEdit = function(key,id)
					{
						$scope.edit = 1;
						$scope.editmsgId = id;
						$scope.editmsg = $scope.messages[$scope.roomId][key]['MSG_TEXT'];

						$(".editmsg"+id).attr('contenteditable','true');
						$(".editmsg"+id).addClass("editedmsg");
					}


					$scope.messageUpdate = function(type,id)
					{

						if(type == "update")
						{
						 var msg = $(".editmsg"+id).text();
							if(msg != '' )
							{

								socket.emit('updatemessage', { id:$scope.editmsgId,MSG_TEXT:msg,MSG_ROOMID:$scope.roomId,MSG_EDIT:1});
								$scope.edit = '';
								$scope.editmsgId = '';
								$(".editmsg"+id).attr('contenteditable','false');
								$(".editmsg"+id).removeClass("editedmsg");

							}

						}
						else if(type == "cancel")
						{
							$(".editmsg"+id).text($scope.editmsg);
							$scope.edit = '';
							$scope.editmsgId = '';
							$(".editmsg"+id).attr('contenteditable','false');
							$(".editmsg"+id).removeClass("editedmsg");
						}

					}

					 $scope.messageDelete = function(key,id)
					 {
							socket.emit('deletemessage', { id:id,MSG_DELETE:1,MSG_ROOMID:$scope.roomId});
					 }

					$scope.deleteAttachment = function ()
					{
						$scope.attachment ='';
					}
		/// attchment upload
					$scope.chatAttachment = function ($event)
					{
						$scope.attch = true;
						var files =$event.files;
						for (var i = 0; i < files.length; i++) {
							var f = files[i]
							var fileName = files[i].name;
							var filePath = fileName;

							var fileReader = new FileReader();
							fileReader.onload = (function(e) {
								var d = JSON.stringify({ image :  e.target.result,name : filePath });
								$http({
									url: '<?php echo base_url(); ?>chatAttachment',
									method: "POST",
									data: d,
									headers: {
										'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
									}
								}).then(function(response) {
									$scope.attachment = response.data;
									$scope.attch = false;

								});

							});
							fileReader.readAsDataURL(f);
						}

					}
		/// attchment upload

		// chat person filter
		// $scope.getperson = function ()
		// {
		//  var obj = {  page : $scope.page   }
		//
		// $http({
		// 	url: '<?php echo base_url(); ?>admin/supportchatperson',
		// 	method: "POST",
		// 	data:obj,
		// 	headers: {
		// 		'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		// 	}
		//  }).then(function(response)
		//  {
		// 	 $scope.getunreadmsg();
		//
		// 	$scope.person = response.data.result;
		// 	$scope.selectedContactId = $scope.person[0].u_id;
		// 	 $scope.roomId = 'Room_'+$scope.selectedContactId+'_'+$scope.adminId;
		// 	$scope.socketjoinchat($scope.selectedContactId);
		// 	 $scope.getchat($scope.roomId);
		//
		// 	$scope.total = response.data.pcount;
		// 	$scope.supportchatperson();
		//
		// 	 if($scope.page == 1)
		// 	 $scope.pagination($scope.total);
		// 		 });
		//  }

		 // $scope.pagination = function ($event)
		 // {
			// if($scope.total > 10)
			// {
			// 			$('#pagination').pagination({
			// 		 items: $event,
			// 		 itemsOnPage: 10,
			// 		 cssStyle: 'light-theme',
			// 		 onPageClick:  function (e) {
			// 			 $scope.page  = e;
			// 			 $scope.getperson();
			// 				}
			// 		 });
			// 	 }
		 // }

		 $scope.selectchat = function (k)
		 {
			 $scope.selectedContact = k;
			 $scope.selectedContactId = $scope.person[k].u_id;
			 socket.emit('statusupate', { senderId:$scope.adminId,rec:$scope.person[k].u_id,status:1});
				$scope.roomId = 'Room_'+$scope.selectedContactId+'_'+$scope.adminId;
			 $scope.socketjoinchat($scope.selectedContactId);
				$scope.getchat($scope.roomId);

				$scope.getunreadmsg();
		 }

					$scope.getchat = function(roomId)
					{
						 $scope.messages[roomId] = [];

					 $http({
					 url: 'https://top-seo-sockets.herokuapp.com/get-firm-messages?roomId='+roomId,
					 method: "GET",
					 headers: {
						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
						 }
					 }).then(function(response) {

						 if(response.data.messages.length > 0)
						 {
							if(!$scope.messages[response.data.messages[0]['MSG_ROOMID']])
						 $scope.messages[response.data.messages[0]['MSG_ROOMID']] = [];
						 $scope.messages[response.data.messages[0]['MSG_ROOMID']] = response.data.messages.reverse();
						 }


							 });
						 }

						 $scope.getunreadmsg = function()
						 {
							 $http({
							url: 'https://top-seo-sockets.herokuapp.com/adminunread-msg',
							method: "GET",
							headers: {
							 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
								}
							}).then(function(response) {
							 // console.log(response.data.messages[0]['MSG_SENTBY']);

								if($scope.person)
								{
								 for(var a in $scope.person)
								 {
									 $scope.person[a]['unread'] = [];
									 for(var m in response.data.messages)
									 {
										 if($scope.person[a].u_id == response.data.messages[m]['MSG_SENTBY'])
										 {
											$scope.person[a]['unread'].push(response.data.messages[m]);
											}
										}
									}
									socket.emit('statusupate', { senderId:$scope.adminId,rec:$scope.person[0].u_id,status:1});

								}
								 // console.log($scope.person);
									});
								}


		// message pagination
		$scope.lastMessages = function()
		{
			$http({
		 url: 'https://top-seo-sockets.herokuapp.com/last-msg?com='+$scope.roomId+'&&skip='+$scope.messages[$scope.roomId].length+'&&limit=10',
		 method: "POST",
		 headers: {
		'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
		 }).then(function(response) {

			 if(response.data.messages.length != 0)
			 {
			 var msg = response.data.messages;
			 var msg1 = msg.reverse();
				$scope.messages[$scope.roomId].unshift(...msg1);

				}
					});
		 }

		 $scope.supportchatperson = function()
		 {
			 $http({
			url: 'https://top-seo-sockets.herokuapp.com/getsupportchatperson',
			method: "POST",
			headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			}
			}).then(function(response) {
					 if(response.data.messages.length != 0)
					{
						var p = response.data.messages;
						var p1 = p.reverse();
						var match = false;

						for(var a in p1)
						{
							 var db = {};
							 db['name'] = p1[a]['MSG_SENTBYNAME'];
							 db['u_id'] = p1[a]['MSG_SENTBY'];
							 db['type'] = '5';
							if($scope.p)
							{
								for(var v in $scope.p)
								{
									if($scope.p[v].u_id == db['u_id'])
									{
										 match = true;
									}
								}
							}

							if(!match)
							{
								$scope.p.push(db);
							 }
						}


						 $scope.person.unshift(...$scope.p);


							}
					 });
			}

	 ////upload attchment image

		$scope.uploadImage = function ($event)
		{

		 var files =$event.files;
		 for (var i = 0; i < files.length; i++) {
		 var f = files[i]
		 var fileName = files[i].name;
		 var filePath = fileName;

		 var fileReader = new FileReader();
		 fileReader.onload = (function(e) {
		 //jQuery('#'+elName).attr('src',e.target.result);
		 var d = JSON.stringify({ image :  e.target.result });
		$http({
			url: '<?php echo base_url(); ?>imageUpload',
			method: "POST",
			data: d,
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			}
		}).then(function(response) {
					$scope.image = response.data;

				});

		});
		 fileReader.readAsDataURL(f);
		 }

		 }

	 //$scope.getperson();
	 $scope.supportchatperson();

			 });
	 // support chat

		// support external


		// all emails

		var app34 = angular.module('myApp34', [])

		app34.controller('myCtrt34', function($scope,$window,$http) {
		 $scope.page = 1;
		 $scope.emails = [];
		 $scope.total = 0;
		 $scope.key ='';
		 $scope.id ='';
		 $scope.email ='';
		 $scope.update = 0;



		$scope.getemail = function ($event)
		{
			var obj = {  page : $scope.page   }

		  $http({
				url: '<?php echo base_url(); ?>admin/getemail',
				method: "POST",
				data: obj,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				}
			}).then(function(response) {

			  $scope.emails = response.data.result;
		    $scope.total = response.data.pcount;

				if($scope.page == 1)
		    $scope.pagination($scope.total);
			    });
		}

		$scope.pagination = function ($event)
		{
			if($scope.total > 10)
			{
				$('#pagination').pagination({
					items: $event,
					itemsOnPage: 10,
					cssStyle: 'light-theme',
					onPageClick:  function (e) {
						$scope.page  = e;
		 				$scope.getemail();
		 			 }
		 	   });
		   }
			 else
			 {
				 $('#pagination').html('');
		   }
		 }

     $scope.confirm = function(id)
     {
     $scope.id = id;
     angular.element('#confirm').modal('show');
     }

     $scope.delete = function()
     {
     var obj = { id :$scope.id };
     $http({
       url: '<?php echo base_url(); ?>admin/deleteEmail',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.message == "true")
       {
         angular.element('#confirm').modal('hide');
         $.notify("Email Deleted Successfully", "success");
         $scope.page = 1;
         $scope.getemail();

       }
     });
     }

		 $scope.change = function () {
      $scope.email = $scope.email;
    }

		 $scope.blur = function () {
      $scope.email = $scope.email.trim();
    }

		 $scope.saveemail = function()
		 {
			 $scope.submitind = true;
			 $scope.emailvalide = false;
			 error = false;
			 $scope.email = angular.element("#email").val();
			 $scope.email.trim();

			 if($scope.email == '')
			 {
				 error = true;
			 }

			 if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
			 {
				 error = true;
				 $scope.emailvalide = true;
       }

			 // console.log(error);

			 if(error == true)
			 {
				 return false;
			 }

			 var obj = {  email : $scope.email }

		 	$http({
		 		url: '<?php echo base_url(); ?>admin/saveemail',
		 		method: "POST",
		 		data: obj,
		 		headers: {
		 			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 		}
		 	}).then(function(response) {

		 		if(response.data.success == "1")
		 		{
		      angular.element("#email").val('');
          $.notify("Email  Successfully added", "success");
					$scope.getemail();
		    }
				else if(response.data.success == "2")
		 		{
		 			$.notify("Email Already Submitted", "error");
		    }
				else if(response.data.success == "0")
				{
					$.notify("Email is not insert", "error");
				}

		 	});
		 }


			$scope.edit = function(id)
			{
				var obj = {  id : id }
		  	$http({
		  		url: '<?php echo base_url(); ?>admin/editemail',
		  		method: "POST",
		  		data: obj,
		  		headers: {
		  			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		  		}
		  	}).then(function(response){
		         if(response.data.message == "true")
						 {
		          $scope.email = response.data.result.email;
							$scope.id = response.data.result.id;
						  $scope.update = 1;
					   }

		  	});
		  }

      $scope.updateemail = function()
      {
        $scope.submitind = true;
        $scope.emailvalide = false;
        error = false;
        $scope.email = angular.element(".email").val();
        $scope.email.trim();

        if($scope.email == '')
        {
          error = true;
        }

        if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
        {
          error = true;
          $scope.emailvalide = true;
        }

        // console.log(error);

        if(error == true)
        {
          return false;
        }

        var obj = {  email : $scope.email,id:$scope.id }

       $http({
         url: '<?php echo base_url(); ?>admin/emailUpdate',
         method: "POST",
         data: obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {

         if(response.data.message == "true")
         {
           $scope.email ='';
           angular.element(".email").val('');
           $scope.update = 0;
           $scope.submitind = false;
           $.notify("Email  Successfully Updated", "success");
           $scope.getemail();
         }


       });
      }



		$scope.getemail();

		});


		// all emails

		// userreview


			var app35 = angular.module('myApp35', [])

			app35.filter('trustAsHtml',['$sce', function($sce) {

					return function(text) {

						return $sce.trustAsHtml(text);
							 };
				}]);

				app35.filter('underscoreless', function () {
			 return function (input) {
				 //console.log(input);
					return input.split(' ').join('-');

			 };
			});

			app35.directive('ngEnter', function () {
				return function (scope, element, attrs) {
						element.bind("keydown keypress", function (event) {
								if (event.which === 13) {
										scope.$apply(function () {
												scope.$eval(attrs.ngEnter);
										});

										event.preventDefault();
								}
						});
				};
			});

			app35.controller('myCtrt35', function($scope,$window,$http,$timeout) {


			 $scope.user =[];
			 $scope.total =0;
			 $scope.page =1;
			 $scope.id='';
			 $scope.key ='';
			 $scope.status ='';


			$scope.alluser = function ()
			{
			 var obj = {  page : $scope.page   }

			$http({
				url: '<?php echo base_url(); ?>admin/getuserreview',
				method: "POST",
				data:obj,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				}
			 }).then(function(response) {

				$scope.user = response.data.result;

				$scope.total = response.data.pcount;

				 if($scope.page == 1)
				 $scope.pagination($scope.total);
					 });
			 }

			 $scope.pagination = function ($event)
			 {
				 if($scope.total > 10)
				 {
							$('#pagination').pagination({
						 items: $event,
						 itemsOnPage: 10,
						 cssStyle: 'light-theme',
						 onPageClick:  function (e) {
							 $scope.page  = e;
							 $scope.alluser();
								}
						 });
				}
		}


			$scope.alluser();

			});

		// userreview

    // featured
    // blog section


        var app36 = angular.module('myApp36', [])

        app36.filter('trustAsHtml',['$sce', function($sce) {

        		 return function(text) {

        			 return $sce.trustAsHtml(text);
        					};
        	 }]);

        	 app36.filter('underscoreless', function () {
        	return function (input) {
        		//console.log(input);
        		 return input.split(' ').join('-');

        	};
        });

        app36.directive('ngEnter', function () {
        	 return function (scope, element, attrs) {
        			 element.bind("keydown keypress", function (event) {
        					 if (event.which === 13) {
        							 scope.$apply(function () {
        									 scope.$eval(attrs.ngEnter);
        							 });

        							 event.preventDefault();
        					 }
        			 });
        	 };
        });

        app36.controller('myCtrt36', function($scope,$window,$http,$timeout) {


         $scope.featured =[];
         $scope.title ='';
         $scope.description ='';
         $scope.image ='';
         $scope.status ='';
         $scope.open ='';
         $scope.metatitle ='';
         $scope.total =0;
         $scope.page =1;
         $scope.id='';
         $scope.key ='';

         $scope.status1 ='';


        $scope.allfeatured = function ()
        {
        	var obj = {  page : $scope.page   }

        $http({
        	 url: '<?php echo base_url(); ?>admin/getfeatured',
        	 method: "POST",
        	 data:obj,
        	 headers: {
        		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        	 }
         }).then(function(response) {

        	 $scope.featured = response.data.result;

        	 $scope.total = response.data.pcount;

         	if($scope.page == 1)
         	$scope.pagination($scope.total);
         		});
         }

         $scope.pagination = function ($event)
         {
        	 if($scope.total > 10)
        	 {
        			   $('#pagination').pagination({
        				items: $event,
        				itemsOnPage: 10,
        				cssStyle: 'light-theme',
        				onPageClick:  function (e) {
        					$scope.page  = e;
        					$scope.allfeatured();
        				   }
        		    });
        			}
         }


         $scope.submitfeatured = function()
         {
        	 $scope.submitc = true;
        	error = false;
        	$scope.description = CKEDITOR.instances['description'].getData();

        	if($scope.title == '' || $scope.description == '' || $scope.image == ''  || $scope.status =='' || $scope.open == '' || $scope.metatitle == ''  )
        	{
        		error = true;
        	}

        	if(error == true)
        	{
        		return false;
        	}

        	var obj = { title : $scope.title,description : $scope.description,status : $scope.status ,title:$scope.title,image:$scope.image,metaTitle:$scope.metatitle }

        	 $http({
        			 url: '<?php echo base_url(); ?>admin/featuredSave',
        			 method: "POST",
        			 data:obj,
        			 headers: {
        				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        			 }
        		 }).then(function(response) {

        				if(response.data.message == 'true')
        			{
        			 $.notify("Feature Added Successfully ", "success");


        			 $scope.status ='';
        			 $scope.description ='';
               $scope.title ='';
        		   CKEDITOR.instances['description'].setData('');
        				$scope.submitc = false;
        				angular.element('#addfeatured').modal('hide');
        				$scope.allfeatured();
        			 }

        				 });
         }

         $scope.deletemodal = function(key,id)
         {
        	$scope.key = key;
        	$scope.id = id;
        	angular.element("#Delete").modal('show');

         }

         $scope.deletefeatured = function()
         {
        	var obj = {  id : $scope.id }

        	 $http({
        		 url: '<?php echo base_url(); ?>admin/featureddelete',
        		 method: "POST",
        		 data: obj,
        		 headers: {
        			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        		 }
        	 }).then(function(response) {

        		 if(response.data.message == "true")
        		 {
        			 angular.element("#Delete").modal('hide');
        			 $.notify("Feature Deleted Successfully", "success");
        			 //$scope.services.splice($scope.key,1);
               $scope.page = 1;
        		 $scope.allfeatured();
        		 }

        	 });

         }

          $scope.editfeatured = function(id)
        	{
        		$scope.id = id;
            $scope.tags =[];
        		var obj = {  id : id  }

        		 $http({
        				 url: '<?php echo base_url(); ?>admin/featuredEdit',
        				 method: "POST",
        				 data:obj,
        				 headers: {
        					 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        				 }
        			 }).then(function(response) {

        					if(response.data.message == 'true')
        				{
                 $scope.editdata = response.data.result;
         				 $scope.title =  response.data.result.title;
        				 $scope.status = response.data.result.status;
        				 $scope.open = response.data.result.open;
        				 $scope.metatitle = response.data.result.metaTitle;

        					 CKEDITOR.instances['description1'].setData(response.data.result.description);
        					angular.element('#editfeatured').modal('show');
        				 }
        					 });
        	}

        	$scope.updatefeatured = function()
        	{
        		$scope.submitc = true;
         	  error = false;
         	$scope.description = CKEDITOR.instances['description1'].getData();

         	if($scope.title == '' || $scope.description == '' || $scope.status == '' || $scope.open == '' || $scope.metatitle == '' )
         	{
         		error = true;
         	}

         	if(error == true)
         	{
         		return false;
         	}

         	var obj = { id: $scope.id,title : $scope.title, description : $scope.description,status : $scope.status,open:$scope.open,image:$scope.image,metaTitle:$scope.metatitle};

         	 $http({
         			 url: '<?php echo base_url(); ?>admin/featuredUpdate',
         			 method: "POST",
         			 data:obj,
         			 headers: {
         				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         			 }
         		 }).then(function(response) {

         				if(response.data.message == 'true')
         			{
         			 $.notify("Feature Updated Successfully ", "success");
         				angular.element('#editfeatured').modal('hide');
        				$scope.status ='';
        				$scope.open ='';
        				$scope.image ='';
                $scope.title ='';

         				CKEDITOR.instances['description'].setData('');
         				$scope.submitc = false;
         				$scope.allfeatured();
         			 }
         				 });

        	}

        	$scope.statusmodal = function(id,status)
        	{
        		$scope.id = id;
        		$scope.status1 = status;
        		angular.element("#Status").modal('show');

        	}

        	$scope.featuredStatus = function()
        	{
        	var obj = {  id : $scope.id,status:$scope.status1 }

        	 $http({
        		 url: '<?php echo base_url(); ?>admin/featuredStatus',
        		 method: "POST",
        		 data: obj,
        		 headers: {
        			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        		 }
        	 }).then(function(response) {

        		 if(response.data.message == "true")
        		 {
        			 angular.element("#Status").modal('hide');
        			 $.notify("Feature Status Changed Successfully", "success");
        			 $scope.allfeatured();
        		 }

        	 });

        	}

        	$scope.uploadImage = function ($event) {

         		var files =$event.files;
         		for (var i = 0; i < files.length; i++) {
         			var f = files[i]
         			var fileName = files[i].name;
         			var filePath = fileName;

         			var fileReader = new FileReader();
         			fileReader.onload = (function(e) {
        					jQuery('#logoview').attr('src',e.target.result);
         				var d = JSON.stringify({ image :  e.target.result });
         				$http({
         					url: '<?php echo base_url(); ?>admin/featuredImage',
         					method: "POST",
         					data: d,
         					headers: {
         						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         					}
         				}).then(function(response) {
         					$scope.image = response.data;

         				});

         			});
         			fileReader.readAsDataURL(f);
         		}

         	}




        $scope.allfeatured();

        });

    // featured

    // edit freelancer
    <?php if(isset($freelancerId))
          {
            ?>
    var app37 = angular.module('myApp37', [])

    app37.directive('numbersOnly', function() {
        return {
            require: 'ngModel',
            link: function(scope, element, attrs, modelCtrl) {
                modelCtrl.$parsers.push(function(inputValue) {
                    if (inputValue == undefined) return ''
                    var onlyNumeric = inputValue.replace(/[^0-9]/g, '');
                    if (onlyNumeric != inputValue) {
                        modelCtrl.$setViewValue(onlyNumeric);
                        modelCtrl.$render();
                    }
                    return onlyNumeric;
                });
            }
        };
       });

      app37.directive('mydatepicker', function () {
      return {
          restrict: 'A',
          require: 'ngModel',
           link: function (scope, element, attrs, ngModelCtrl) {
              element.datepicker({
                  dateFormat: 'd-m-yy',
                  onSelect: function (date) {
                      scope.date = date;
                      scope.$apply();
                  }
              });
          }
        };
      });

      app37.directive('yearpicker', function () {
        return {
          restrict: 'A',
          require: 'ngModel',
          link: function (scope, element, attrs, ngModelCtrl) {
            element.datepicker({
              dateFormat: 'yy',
              changeMonth: true,
              changeYear: true,
              onSelect: function (date) {
                scope.date = date;
                scope.$apply();
              }
            });
          }
        };
      });

    app37.controller('myCtrt37', function($scope,$window,$http,$interval) {

     $scope.profile = [];
     $scope.country1 = [];
     $scope.st = [];
     $scope.ci = [];
     $scope.name ='';
     $scope.logo ='';
     $scope.phone ='';
     $scope.zip ='';
     $scope.address1 ='';
     $scope.address2 ='';
     $scope.country ='';
     $scope.state = '';
     $scope.city ='';
     $scope.about ='';
     $scope.website ='';
     $scope.skype ='';
     $scope.facebookLink ='';
     $scope.linkedlnLink ='';
     $scope.minPrice ='';
     $scope.maxPrice ='';
     $scope.year ='';
     $scope.desig ='';
     $scope.cname ='';
     $scope.seoTitle ='';
     $scope.seoDescription ='';
     $scope.twitterLink ='';
     $scope.instagramLink  ='';
     $scope.pinterestLink ='';
     $scope.youtubeLink  ='';
     $scope.websitevalide = false;

     $scope.datepickerOptions = {
        datepickerMode:"'year'",
        minMode:"'year'",
        minDate:"minDate",
        showWeeks:"false",
     };

     var obj1 = { freelancerId: '<?php if(isset($freelancerId)){ echo $freelancerId; } ?>'};
     $http({
       url: '<?php echo base_url(); ?>admin/getfreelancerprofile',
       method: "POST",
       data: obj1,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

       $scope.profile = response.data.result;
       $scope.st = response.data.states;
       $scope.ci = response.data.city;
       CKEDITOR.instances['about'].setData($scope.profile.about);



     });

     $http({
       url: '<?php echo base_url(); ?>freelancer/getcountry',
       method: "POST",
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

       $scope.country1 = response.data.result;


     });

     $http({
     url: '<?php echo base_url(); ?>getcurrency',
     method: "POST",
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
     }).then(function(response) {

     $scope.allcurrency = response.data.result;

     });


     $scope.profileupdate = function ()
     {
       $scope.submitprofile = true;
       var error = false;
       $scope.profile.name =  angular.element("#name").val();
       $scope.profile.zip = angular.element("#zip").val();
       $scope.profile.phone = angular.element("#phone").val();
       $scope.profile.country = angular.element("#country").val();
       $scope.profile.state = angular.element("#states").val();
       $scope.profile.city = angular.element("#city").val();
       $scope.profile.address1 = angular.element("#address1").val();
       $scope.profile.address2 = angular.element("#address2").val();
       $scope.profile.about = CKEDITOR.instances['about'].getData();
       $scope.profile.website = angular.element("#website").val();
       $scope.profile.skype = angular.element("#skype").val();
       $scope.profile.facebookLink = angular.element("#facebook").val();
       $scope.profile.linkedlnLink = angular.element("#linked").val();
       $scope.profile.minPrice = angular.element("#minPrice").val();
       $scope.profile.maxPrice = angular.element("#maxPrice").val();
        $scope.profile.desig = angular.element("#desig").val();
       $scope.profile.year = angular.element("#year").val();
       $scope.profile.c_name = angular.element("#companyname").val();
       $scope.profile.seoTitle = angular.element("#seotitle").val();
       $scope.profile.seoDescription = angular.element("#seodescription").val();
       $scope.profile.twitterLink = angular.element("#twitter").val();
       $scope.profile.instagramLink = angular.element("#instragram").val();
       $scope.profile.youtubeLink = angular.element("#youtube").val();
       $scope.profile.pinterestLink =angular.element("#pinterest").val();
       $scope.profile.currencyId = angular.element("#currency").val();


       if($scope.profile.name == '' || $scope.profile.phone == '' || $scope.profile.zip == '' || $scope.profile.country == '' || $scope.profile.state == '' || $scope.profile.city == '' || $scope.profile.desig == '' || $scope.profile.year == '')
       {
         error = true;
       }


       if($scope.profile.address1 == ''  || $scope.profile.about == '' || $scope.profile.minPrice == '' || $scope.profile.maxPrice == '' || $scope.profile.c_name =='' || $scope.profile.logo == '' ||  $scope.profile.currency == '' )
       {
         error = true;
       }

         if($scope.profile.website != '')
        {
          if(!$scope.profile.website.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
         {

          error = true;
         $scope.websitevalide = true;
          }
         else
         {
           $scope.websitevalide = false;
         }
       }



       if(error == true )
       {
         return false;
       }

       var obj = { u_id:'<?php if(isset($freelancerId)){ echo $freelancerId; } ?>', name : $scope.profile.name , zip : $scope.profile.zip ,logo : $scope.profile.logo , rep_ph_num : $scope.profile.phone ,country : $scope.profile.country,state : $scope.profile.state ,city : $scope.profile.city,address1 : $scope.profile.address1,address2 : $scope.profile.address2,about : $scope.profile.about,website : $scope.profile.website,skype : $scope.profile.skype,facebookLink : $scope.profile.facebookLink , linkedlnLink : $scope.profile.linkedlnLink ,desig: $scope.profile.desig ,year:$scope.profile.year,c_name: $scope.profile.c_name ,minPrice:$scope.profile.minPrice,maxPrice:$scope.profile.maxPrice,seoTitle:$scope.profile.seoTitle,seoDescription:$scope.profile.seoDescription,twitterLink:$scope.profile.twitterLink,instagramLink :$scope.profile.instagramLink,youtubeLink:$scope.profile.youtubeLink,pinterestLink:$scope.profile.pinterestLink,company_logo:$scope.profile.company_logo,currencyId:$scope.profile.currencyId };

       $http({
         url: '<?php echo base_url(); ?>admin/freelancerprofileupdate',
         method: "POST",
         data: obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {

         if(response.data.message == "true")
         {
           $.notify("Profile Update Successfully", "success");
           $interval(callAtInterval, 2000);

             function callAtInterval()
             {
               $window.location.href = '<?php echo base_url(); ?>admin/freelancer';
             }
       }

       });
     }

     $scope.getstate = function ($event)
     {
       var  id = angular.element($event).val();
       //console.log(id);

       var obj = {  id : id  };

       $http({
         url: '<?php echo base_url(); ?>freelancer/getstate',
         method: "POST",
         data: obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {

         $scope.st = response.data.result;
       });
     }

         $scope.getcity = function ($event)
         {
           var  id = angular.element($event).val();

           var obj = {  id : id  };

           $http({
             url: '<?php echo base_url(); ?>freelancer/getcity',
             method: "POST",
             data: obj,
             headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {

             $scope.ci = response.data.result;
           });
         }

     ////logo upload
     $scope.logoupload = function ($event) {

       var files =$event.files;
       for (var i = 0; i < files.length; i++) {
         var f = files[i]
         var fileName = files[i].name;
         var filePath = fileName;

         var fileReader = new FileReader();
         fileReader.onload = (function(e) {
           //jQuery('#logoview').show();
           jQuery('#logoview').attr('src',e.target.result);
           var d = JSON.stringify({ image :  e.target.result });
           $http({
             url: '<?php echo base_url(); ?>freelancer/logoupload',
             method: "POST",
             data: d,
             headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {
             $scope.logo = response.data;
              $scope.profile.logo = response.data;
           });

         });
         fileReader.readAsDataURL(f);
       }

     }

     // company logo
     $scope.companylogoupload = function ($event) {

       var files =$event.files;
       for (var i = 0; i < files.length; i++) {
         var f = files[i]
         var fileName = files[i].name;
         var filePath = fileName;

         var fileReader = new FileReader();
         fileReader.onload = (function(e) {
           //jQuery('#logoview').show();
           jQuery('#companylogoview').attr('src',e.target.result);
           var d = JSON.stringify({ image :  e.target.result });
           $http({
             url: '<?php echo base_url(); ?>freelancer/logoupload',
             method: "POST",
             data: d,
             headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {
             $scope.logo = response.data;
              $scope.profile.company_logo = response.data;
           });

         });
         fileReader.readAsDataURL(f);
       }

     }
     // company logo




    });
<?php } ?>
    // edit freelancer

    // freelancer services
    <?php if(isset($freelancerId))
          {  ?>
    var app38 = angular.module('myApp38', [])


app38.controller('myCtrt38', function($scope,$window,$http,$interval) {
 $scope.industry = [];
 $scope.services = [];
 $scope.selectedIndustry = [];
 $scope.selectedService = [];

 $scope.typingLENGTH =800;
 $scope.lastTypingTime='';
 $scope.typing = false;
 $scope.plan = [];
 $scope.suggestion = [];


 $scope.userplan = function()
 {
   var obj = { freelancerId :'<?php if(isset($freelancerId)){ echo $freelancerId; } ?>'  };

   $http({
    url: '<?php echo base_url(); ?>admin/freelancerselectedplan',
    method: "POST",
    data:obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response){

    $scope.plan = response.data.result;
    });
  }

 $scope.industrykeyup = function ()
 {
  var typingTimer = (new Date()).getTime()

   var timeDiff    = typingTimer - $scope.lastTypingTime;
    if (!$scope.typing)
    {
      $scope.typing = true;
    }

    $scope.lastTypingTime = (new Date()).getTime();

    $interval(function(){

      var typingTimer = (new Date()).getTime();
     var timeDiff    = typingTimer - $scope.lastTypingTime;
     if (timeDiff   >= $scope.typingLENGTH && $scope.typing) {
       $scope.getindustrykeyup();
       //console.log("Typing");

       $scope.typing = false;
     }
      },$scope.typingLENGTH);
 }

$scope.getindustrykeyup = function()
{
  $scope.industry = [];
  var ind = angular.element('.industry').val();
 var m = JSON.stringify({ name : ind });
 if(ind != '')
{
  $http({
   url: '<?php echo base_url(); ?>freelancer/industrySearch',
   method: "POST",
   data:m,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response){

   $scope.industry = response.data.result;

 });
 }
}




 $scope.getuserservice = function()
 {
   var obj = { freelancerId :'<?php if(isset($freelancerId)){ echo $freelancerId; } ?>'  };

   $http({
     url: '<?php echo base_url(); ?>admin/getservicesfreelancer',
     method: "POST",
     data:obj,
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {
     if(response.data.message == "true")
     {
      $scope.selectedService = response.data.service;
     }
   });
 }

 $scope.getuserIndustry = function()
 {
   var obj = { freelancerId :'<?php if(isset($freelancerId)){ echo $freelancerId; } ?>'  };

   $http({
     url: '<?php echo base_url(); ?>admin/getfreelancerIndustry',
     method: "POST",
     data:obj,
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {
     if(response.data.message == "true")
     {
       $scope.selectedIndustry = response.data.industry;
     }
   });
 }

 $scope.servicekeyup = function ()
 {
  var typingTimer = (new Date()).getTime()

   var timeDiff    = typingTimer - $scope.lastTypingTime;
    if (!$scope.typing)
    {
      $scope.typing = true;
    }

    $scope.lastTypingTime = (new Date()).getTime();

    $interval(function(){

      var typingTimer = (new Date()).getTime();
     var timeDiff    = typingTimer - $scope.lastTypingTime;
     if (timeDiff   >= $scope.typingLENGTH && $scope.typing) {
       $scope.getservicekeyup();
       // console.log("Typing");

       $scope.typing = false;
     }
      },$scope.typingLENGTH);
 }

 $scope.getservicekeyup = function()
 {
   $scope.services =[];
   var ser = angular.element('.services').val();

   if(ser != '')
   {
     var m = JSON.stringify({ name : ser });
    $http({
    url: '<?php echo base_url(); ?>freelancer/serviceSearch',
    method: "POST",
    data:m,
    headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
   }).then(function(response) {

   $scope.services = response.data.result;

   });
 }
}

 $scope.industryclick = function ($event)
 {
   angular.element("#prac_areas_chosen").addClass('chosen-with-drop chosen-container-active');
   angular.element('.industry').removeAttr('placeholder');

 }

 $scope.selectIndustry = function (key)
 {
   var inds =  {};
   inds['name'] = $scope.industry[key]['name'];
   inds['id'] = $scope.industry[key]['id'];

    //console.log($scope.selectedIndustry);
     var match = false;

      for(var v in $scope.selectedIndustry)
      {
       if($scope.selectedIndustry[v]['id'] == inds['id'] )
        {
           match = true;
         }
       }

      if($scope.selectedIndustry.length >= $scope.plan.packageIndustry )
      {
        match = true;
      }


      if(!match)
      {
      $scope.selectedIndustry.push(inds);
      angular.element('.industry').val('');
       $scope.industry = [];
      }

 }



 $scope.removeIndustry = function(key)
 {

   var obj = { industryId: $scope.selectedIndustry[key].id,freelancerId :'<?php if(isset($freelancerId)){ echo $freelancerId; } ?>'  };
   angular.element(".preloader").show();
   $http({
     url: '<?php echo base_url(); ?>admin/freelancerserviceDelete',
     method: "POST",
     data: obj,
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {
     if(response.data.message == "true")
     {
       angular.element(".preloader").hide();

      $scope.selectedIndustry.splice(key,1);
      //remove industry

     }
   });

 }


 // service start
 $scope.serviceclick = function()
 {
   angular.element("#ser_chosen").addClass('chosen-with-drop chosen-container-active');
   angular.element('.services').removeAttr('placeholder');

 }

 $scope.selectService = function (key)
 {
   var ser =  {};
   ser['name'] = $scope.services[key]['name'];
   ser['id'] = $scope.services[key]['id'];

     var  match = false;
     for(var v in $scope.selectedService)
      {
         if ($scope.selectedService[v]['id'] == ser['id'] )
         {

              match = true;

         }
      }

      if($scope.selectedService.length >= $scope.plan.packageService )
      {
        match = true;
      }

      if(!match)
       {
         $scope.selectedService.push(ser);
         var ser = angular.element('.services').val('');
         $scope.services = [];
       }
 //angular.element("#ser_chosen").removeClass('chosen-with-drop chosen-container-active');
 }




 $scope.removeService = function(key)
 {
   var obj = { serviceId: $scope.selectedService[key].id,freelancerId :'<?php if(isset($freelancerId)){ echo $freelancerId; } ?>'  };
   angular.element(".preloader").show();
   $http({
     url: '<?php echo base_url(); ?>admin/freelancerserviceDelete',
     method: "POST",
     data: obj,
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {
     if(response.data.message == "true")
     {
       angular.element(".preloader").hide();

       $scope.selectedService.splice(key,1);

     }
   });
 }


 $scope.saveIndustryService = function()
 {
   $scope.submitIndSer = true;
   error = false;
   if($scope.selectedService.length == 0 || $scope.selectedIndustry.length == 0)
   {
     error = true;
   }

   if(error == true)
   {
     return false;
   }

   var obj = { freelancerId:'<?php if(isset($freelancerId)){ echo $freelancerId; } ?>',service : $scope.selectedService, industry : $scope.selectedIndustry  };
   angular.element(".preloader").show();
   $http({
     url: '<?php echo base_url(); ?>admin/freelancersaveService',
     method: "POST",
     data: obj,
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {
     if(response.data.message == "true")
     {
       angular.element(".preloader").hide();
       $.notify("Service Successfully Added", "success");
       $scope.getuserIndustry();
       $scope.getuserservice();
     }
   });
 }

 $scope.userplan();
 $scope.getuserIndustry();
 $scope.getuserservice();
});

<?php } ?>
    // freelancer services

    // membership

    	var app40 = angular.module('myApp40', [])

    	app40.filter('trustAsHtml',['$sce', function($sce) {

    			return function(text) {

    				return $sce.trustAsHtml(text);
    					 };
    		}]);

    	// 	app23.directive('numbersOnly', function() {
     //     return {
     //     require: 'ngModel',
     //    link: function(scope, element, attrs, modelCtrl) {
     //    modelCtrl.$parsers.push(function(inputValue) {
     //        if (inputValue == undefined) return ''
     //        var onlyNumeric = inputValue.replace(/[^0-9]/g, '');
     //        if (onlyNumeric != inputValue) {
     //            modelCtrl.$setViewValue(onlyNumeric);
     //            modelCtrl.$render();
     //        }
     //        return onlyNumeric;
     //    });
     //  }
     //    };
     // });

    		app40.filter('underscoreless', function () {
    	 return function (input) {
    		 //console.log(input);
    			return input.split(' ').join('-');

    	 };
    	});

    	app40.directive('ngEnter', function () {
    		return function (scope, element, attrs) {
    				element.bind("keydown keypress", function (event) {
    						if (event.which === 13) {
    								scope.$apply(function () {
    										scope.$eval(attrs.ngEnter);
    								});

    								event.preventDefault();
    						}
    				});
    		};
    	});

    	app40.controller('myCtrt40', function($scope,$window,$http,$timeout,$interval) {


    	 $scope.package =[];
    	 $scope.name ='';
    	 $scope.price ='';
    	 $scope.company ='';
    	 $scope.industry ='';
    	 $scope.services ='';
    	 $scope.review ='';
    	 $scope.chat ='';
    	 $scope.request ='';
    	 $scope.ranking ='';
    	 $scope.location ='';
    	 $scope.keypeople ='';
    	 $scope.testimonial ='';
    	 $scope.casestudies ='';
    	 $scope.groupchat ='';
    	 $scope.total =0;
    	 $scope.page =1;
    	 $scope.id='';
    	 $scope.key ='';
       $scope.content = '';
       $scope.hourly = '';
       $scope.customtitle ='';
       $scope.service_briefing ='';
       $scope.currency ='';
       $scope.review ='';
       $scope.guestpost ='';
       $scope.conference ='';
       $scope.team ='';
       $scope.employeeprofile ='';
       $scope.department ='';
       $scope.salary ='';
       $scope.attdendance ='';
       $scope.announcement ='';
       $scope.performance ='';
       $scope.increment ='';
       $scope.holiday ='';
       $scope.leavetype ='';
       $scope.leave ='';
       $scope.resignation ='';
       $scope.jobopening ='';
       $scope.candidate ='';
       $scope.interview ='';
       $scope.interviewfeedback ='';
       $scope.expense ='';
       $scope.invoice ='';
       $scope.income ='';
       $scope.dsr ='';
       $scope.timesheet ='';
       $scope.dsrremark ='';

       $scope.lead = '';
       $scope.leadhistory = '';
       $scope.createproject = '';
       $scope.assignproject = '';
       $scope.projectmanagment = '';
       $scope.assignteam = '';
       $scope.manageteamtask = '';
       $scope.managefund = '';
       $scope.taskmanagement = '';
       $scope.roi = '';
       $scope.companyroi = '';
       $scope.paypal = '';
       $scope.bank = '';
       $scope.chat = '';
       $scope.email = '';
       $scope.phone = '';
       $scope.skype = '';
       $scope.support = '';
       $scope.portfolio='';
       $scope.servicepricing ='';
       $scope.duration ='';
       $scope.employeeroi ='';


    	 $scope.submitpackage = function()
    	 {
    		$scope.submitc = true;
    	  error = false;
        $scope.income = angular.element('#income').val();
        $scope.candidate = angular.element('#candidate').val();


    	 if($scope.name == '' || $scope.duration == '' || $scope.price == '' || $scope.company == '' || $scope.industry =='' || $scope.services =='' || $scope.review == '' || $scope.chat == "" || $scope.request == "" || $scope.ranking == '' || $scope.location == "")
    	 {
    		 error = true;
    	 }

    	 if($scope.keypeople == '' || $scope.portfolio =='' || $scope.testimonial == '' || $scope.casestudies == '' || $scope.groupchat == '' )
    	 {
    		 error = true;
    	 }

       if($scope.hourly == '' || $scope.customtitle =='' ||  $scope.service_briefing =='' || $scope.currency =='' || $scope.review =='' || $scope.guestpost =='' || $scope.conference =='' || $scope.team == '')
       {
         error = true;
       }

       if( $scope.team =='' || $scope.employeeprofile =='' || $scope.department =='' || $scope.salary =='' || $scope.attdendance =='' || $scope.announcement =='' || $scope.performance =='' || $scope.increment =='' || $scope.holiday =='' || $scope.leavetype =='' || $scope.leave =='' || $scope.resignation =='')
       {
         error =true;
       }

       if($scope.jobopening == '' || $scope.candidate == '' || $scope.interview == '' || $scope.interviewfeedback == '')
       {
         error =true;
       }


       if($scope.expense =='' || $scope.invoice =='' || $scope.income =='')
       {
         error = true;
       }

       if($scope.dsr =='' || $scope.timesheet =='' || $scope.dsrremark =='')
       {
         error = true;
       }

       if($scope.lead == '' || $scope.leadhistory == '' || $scope.createproject == '' || $scope.assignproject == '' || $scope.projectmanagment == '' || $scope.assignteam == '' || $scope.manageteamtask == '' || $scope.managefund == '' || $scope.taskmanagement == '' )
       {
         error = true;
       }


       if($scope.employeeroi =='' || $scope.roi == '' || $scope.companyroi == '' || $scope.paypal == '' || $scope.bank == ''  || $scope.email == '' || $scope.phone == '' || $scope.skype == '' || $scope.support == '' || $scope.servicepricing =='')
        {
          error = true;
        }

    	 if(error == true)
    	 {
    		 return false;
    	 }

    	 var obj = { packageName : $scope.name,packagePrice :$scope.price,packageProfile  : $scope.company ,packageIndustry :$scope.industry,packageService:$scope.services ,packageRemovalReview:$scope.review,packageChat :$scope.chat,packageRequestQuote:$scope.request,packageRanking :$scope.ranking,packagePreferredLocation:$scope.location,packageKeyPeople :$scope.keypeople,packageGroupChat:$scope.groupchat,packageTestimonial :$scope.testimonial,packageCaseStudies:$scope.casestudies,packageHourly:$scope.hourly,packageCustomTitle:$scope.customtitle,packageServiceBriefing:$scope.service_briefing,packageCurrency:$scope.currency,packageReview:$scope.review,packageGuestPost:$scope.guestpost,packageConference:$scope.conference,packageTeam:$scope.team,packageTeamProfile :$scope.employeeprofile,packageDepartment:$scope.department,packageSalary:$scope.salary,packageAttdendance:$scope.attdendance,packageAnnouncement:$scope.announcement,packagePerformance :$scope.performance,packageIncrement :$scope.increment,packageHoliday :$scope.holiday,packageLeaveType:$scope.leavetype,packageLeave :$scope.leave,packageResignation :$scope.resignation,packageJobOpening:$scope.jobopening,packageCandidateAdd:$scope.caniddate,packageInterview:$scope.interview,packageInterviewFeedback:$scope.interviewfeedback,packageInvoice:$scope.invoice,packageExpense:$scope.expense,packageIncome:$scope.income,packageDsr:$scope.dsr,packageTimesheet:$scope.timesheet,packageDsrRemark:$scope.dsrremark,packageLead:$scope.lead,packageLeadHistory:$scope.leadhistory,packageCreateProject:$scope.createproject,packageAssignProject:$scope.assignproject,packageProjectManagment:$scope.projectmanagment,packageAssignTeam:$scope.assignteam,packageManageTeamTask:$scope.manageteamtask,packageManageFund:$scope.managefund,packageTaskManagement:$scope.taskmanagement,packageRoi:$scope.roi,packageCompanyRoi:$scope.companyroi,packagePaypal:$scope.paypal,packageBank:$scope.bank,packageEmail:$scope.email,packagePhone:$scope.phone,packageSkype:$scope.skype,packageSupport:$scope.support,packagePortfolio:$scope.portfolio,packageServicePricing:$scope.servicepricing,packageDuration:$scope.duration,packageEmployeeRoi:$scope.employeeroi }


    		$http({
    				url: '<?php echo base_url(); ?>admin/packageSave',
    				method: "POST",
    				data:obj,
    				headers: {
    					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    				}
    			}).then(function(response) {

    				 if(response.data.message == 'true')
    			 {
    				$.notify("Package Added Successfully ", "success");
            $interval(callAtInterval, 2000);

              function callAtInterval()
              {
                $window.location.href = '<?php echo base_url(); ?>admin/package';
              }

    				}

    					});
    	 }





    	});

    // membership
<?php if(!empty($packageId))
{
  ?>
    // edit membership
    var app41 = angular.module('myApp41', [])

    app41.filter('trustAsHtml',['$sce', function($sce) {

        return function(text) {

          return $sce.trustAsHtml(text);
             };
      }]);

    // 	app23.directive('numbersOnly', function() {
   //     return {
   //     require: 'ngModel',
   //    link: function(scope, element, attrs, modelCtrl) {
   //    modelCtrl.$parsers.push(function(inputValue) {
   //        if (inputValue == undefined) return ''
   //        var onlyNumeric = inputValue.replace(/[^0-9]/g, '');
   //        if (onlyNumeric != inputValue) {
   //            modelCtrl.$setViewValue(onlyNumeric);
   //            modelCtrl.$render();
   //        }
   //        return onlyNumeric;
   //    });
   //  }
   //    };
   // });

      app41.filter('underscoreless', function () {
     return function (input) {
       //console.log(input);
        return input.split(' ').join('-');

     };
    });

    app41.directive('ngEnter', function () {
      return function (scope, element, attrs) {
          element.bind("keydown keypress", function (event) {
              if (event.which === 13) {
                  scope.$apply(function () {
                      scope.$eval(attrs.ngEnter);
                  });

                  event.preventDefault();
              }
          });
      };
    });

    app41.controller('myCtrt41', function($scope,$window,$http,$timeout,$interval) {


     $scope.editdata =[];
     $scope.name ='';
     $scope.price ='';
     $scope.company ='';
     $scope.industry ='';
     $scope.services ='';
     $scope.review ='';
     $scope.chat ='';
     $scope.request ='';
     $scope.ranking ='';
     $scope.location ='';
     $scope.keypeople ='';
     $scope.testimonial ='';
     $scope.portfolio = '';
     $scope.casestudies ='';
     $scope.groupchat ='';
     $scope.total =0;
     $scope.page =1;
     $scope.id='';
     $scope.key ='';
     $scope.content = '';
     $scope.hourly = '';
     $scope.customtitle ='';
     $scope.service_briefing ='';
     $scope.currency ='';
     $scope.review ='';
     $scope.guestpost ='';
     $scope.conference ='';
     $scope.team ='';
     $scope.employeeprofile ='';
     $scope.department ='';
     $scope.salary ='';
     $scope.attdendance ='';
     $scope.announcement ='';
     $scope.performance ='';
     $scope.increment ='';
     $scope.holiday ='';
     $scope.leavetype ='';
     $scope.leave ='';
     $scope.resignation ='';
     $scope.jobopening ='';
     $scope.candidate ='';
     $scope.interview ='';
     $scope.interviewfeedback ='';
     $scope.expense ='';
     $scope.invoice ='';
     $scope.income ='';
     $scope.dsr ='';
     $scope.timesheet ='';
     $scope.dsrremark ='';

     $scope.lead = '';
     $scope.leadhistory = '';
     $scope.createproject = '';
     $scope.assignproject = '';
     $scope.projectmanagment = '';
     $scope.assignteam = '';
     $scope.manageteamtask = '';
     $scope.managefund = '';
     $scope.taskmanagement = '';
     $scope.roi = '';
     $scope.companyroi = '';
     $scope.paypal = '';
     $scope.bank = '';
     $scope.email = '';
     $scope.phone = '';
     $scope.skype = '';
     $scope.support = '';
     $scope.servicepricing = '';
     $scope.duration = '';
     $scope.employeeroi = '';


      $scope.get = function()
      {
        var obj = { id :'<?php if(isset($packageId)){ echo $packageId; } ?>'  };
        $http({
          url: '<?php echo base_url(); ?>admin/getpackageEdit',
          method: "POST",
          data: obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
          if(response.data.message == "true")
          {
            $scope.editdata = response.data.result;
            $scope.name =  response.data.result.packageName;
            $scope.price = response.data.result.packagePrice;
            $scope.company =  response.data.result.packageProfile ;
            $scope.industry = response.data.result.packageIndustry;
            $scope.services = response.data.result.packageService;
            $scope.review = response.data.result.packageRemovalReview;
            $scope.chat  = response.data.result.packageChat;
            $scope.request = response.data.result.packageRequestQuote;
            $scope.ranking = response.data.result.packageRanking;
            $scope.location = response.data.result.packagePreferredLocation;
            $scope.keypeople = response.data.result.packageKeyPeople;
            $scope.testimonial = response.data.result.packageTestimonial;
            $scope.casestudies =response.data.result.packageCaseStudies;
            $scope.groupchat = response.data.result.packageGroupChat;
            $scope.hourly = response.data.result.packageHourly;
            $scope.customtitle = response.data.result.packageCustomTitle ;
            $scope.service_briefing = response.data.result.packageServiceBriefing ;
            $scope.currency = response.data.result.packageCurrency ;
            $scope.review = response.data.result.packageReview ;
            $scope.guestpost = response.data.result.packageGuestPost;
            $scope.conference = response.data.result.packageConference ;
            $scope.team = response.data.result.packageTeam ;
            $scope.employeeprofile = response.data.result.packageTeamProfile ;
            $scope.department = response.data.result.packageDepartment ;
            $scope.salary = response.data.result.packageSalary ;
            $scope.attdendance = response.data.result.packageAttdendance ;
            $scope.announcement = response.data.result.packageAnnouncement;
            $scope.performance = response.data.result.packagePerformance;
            $scope.increment = response.data.result.packageIncrement ;
            $scope.holiday = response.data.result.packageHoliday;
            $scope.leavetype = response.data.result.packageLeaveType ;
            $scope.leave = response.data.result.packageLeave;
            $scope.resignation = response.data.result.packageResignation;
            $scope.jobopening = response.data.result.packageJobOpening;
            $scope.candidate = response.data.result.packageCandidateAdd;
            $scope.interview = response.data.result.packageInterview ;
            $scope.interviewfeedback = response.data.result.packageInterviewFeedback;
            $scope.expense = response.data.result.packageExpense ;
            $scope.invoice = response.data.result.packageInvoice ;
            $scope.income = response.data.result.packageIncome ;
            $scope.dsr = response.data.result.packageDsr;
            $scope.timesheet = response.data.result.packageTimesheet ;
            $scope.dsrremark = response.data.result.packageDsrRemark ;
            $scope.lead = response.data.result.packageLead ;
            $scope.leadhistory = response.data.result.packageLeadHistory ;
            $scope.createproject = response.data.result.packageCreateProject ;
            $scope.assignproject = response.data.result.packageAssignProject ;
            $scope.projectmanagment = response.data.result.packageProjectManagment ;
            $scope.assignteam = response.data.result.packageAssignTeam ;
            $scope.manageteamtask = response.data.result.packageManageTeamTask ;
            $scope.managefund = response.data.result.packageManageFund;
            $scope.taskmanagement = response.data.result.packageTaskManagement;
            $scope.roi = response.data.result.packageRoi ;
            $scope.companyroi = response.data.result.packageCompanyRoi ;
            $scope.paypal = response.data.result.packagePaypal ;
            $scope.bank = response.data.result.packageBank;
            $scope.email = response.data.result.packageEmail ;
            $scope.phone = response.data.result.packagePhone ;
            $scope.skype = response.data.result.packageSkype ;
            $scope.support = response.data.result.packageSupport ;
            $scope.portfolio = response.data.result.packagePortfolio;
            $scope.servicepricing = response.data.result.packageServicePricing;
            $scope.duration = response.data.result.packageDuration;
            $scope.employeeroi = response.data.result.packageEmployeeRoi;
          }
        });
      }

     $scope.submitpackage = function()
     {
      $scope.submitc = true;
      error = false;

      $scope.income = angular.element('#income').val();
      $scope.candidate = angular.element('#candidate').val();

     if($scope.name == '' || $scope.duration == '' || $scope.price == '' || $scope.company == '' || $scope.industry =='' || $scope.services =='' || $scope.review == '' || $scope.chat == "" || $scope.request == "" || $scope.ranking == '' || $scope.location == "")
     {
       error = true;
     }

     if($scope.keypeople == '' || $scope.portfolio == '' || $scope.testimonial == '' || $scope.casestudies == '' || $scope.groupchat == '' )
     {
       error = true;
     }

     if($scope.hourly == '' || $scope.customtitle =='' ||  $scope.service_briefing =='' || $scope.currency =='' || $scope.review =='' || $scope.guestpost =='' || $scope.conference =='' || $scope.team == '')
     {
       error = true;
     }

     if( $scope.team =='' || $scope.employeeprofile =='' || $scope.department =='' || $scope.salary =='' || $scope.attdendance =='' || $scope.announcement =='' || $scope.performance =='' || $scope.increment =='' || $scope.holiday =='' || $scope.leavetype =='' || $scope.leave =='' || $scope.resignation =='')
     {
       error =true;
     }

     if($scope.jobopening == '' || $scope.candidate == '' || $scope.interview == '' || $scope.interviewfeedback == '')
     {
       error =true;
     }



     if($scope.expense =='' || $scope.invoice =='' || $scope.income =='')
     {
       error = true;
     }

     if($scope.dsr =='' || $scope.timesheet =='' || $scope.dsrremark =='')
     {
       error = true;
     }

     if($scope.lead == '' || $scope.leadhistory == '' || $scope.createproject == '' || $scope.assignproject == '' || $scope.projectmanagment == '' || $scope.assignteam == '' || $scope.manageteamtask == '' || $scope.managefund == '' || $scope.taskmanagement == '' )
     {
       error = true;
     }

     if($scope.employeeroi == '' || $scope.roi == '' || $scope.companyroi == '' || $scope.paypal == '' || $scope.bank == ''  || $scope.email == '' || $scope.phone == '' || $scope.skype == '' || $scope.support == '' || $scope.servicepricing =='')
      {
        error = true;
      }

     if(error == true)
     {
       return false;
     }

     var obj = { packageId:$scope.editdata.packageId,packageName : $scope.name,packagePrice :$scope.price,packageProfile  : $scope.company ,packageIndustry :$scope.industry,packageService:$scope.services ,packageRemovalReview:$scope.review,packageChat :$scope.chat,packageRequestQuote:$scope.request,packageRanking :$scope.ranking,packagePreferredLocation:$scope.location,packageKeyPeople :$scope.keypeople,packageGroupChat:$scope.groupchat,packageTestimonial :$scope.testimonial,packageCaseStudies:$scope.casestudies,packageHourly:$scope.hourly,packageCustomTitle:$scope.customtitle,packageServiceBriefing:$scope.service_briefing,packageCurrency:$scope.currency,packageReview:$scope.review,packageGuestPost:$scope.guestpost,packageConference:$scope.conference,packageTeam:$scope.team,packageTeamProfile :$scope.employeeprofile,packageDepartment:$scope.department,packageSalary:$scope.salary,packageAttdendance:$scope.attdendance,packageAnnouncement:$scope.announcement,packagePerformance :$scope.performance,packageIncrement :$scope.increment,packageHoliday :$scope.holiday,packageLeaveType:$scope.leavetype,packageLeave :$scope.leave,packageResignation :$scope.resignation,packageJobOpening:$scope.jobopening,packageCandidateAdd :$scope.candidate,packageInterview:$scope.interview,packageInterviewFeedback:$scope.interviewfeedback,packageInvoice:$scope.invoice,packageExpense:$scope.expense,packageIncome:$scope.income,packageDsr:$scope.dsr,packageTimesheet:$scope.timesheet,packageDsrRemark:$scope.dsrremark,packageLead:$scope.lead,packageLeadHistory:$scope.leadhistory,packageCreateProject:$scope.createproject,packageAssignProject:$scope.assignproject,packageProjectManagment:$scope.projectmanagment,packageAssignTeam:$scope.assignteam,packageManageTeamTask:$scope.manageteamtask,packageManageFund:$scope.managefund,packageTaskManagement:$scope.taskmanagement,packageRoi:$scope.roi,packageCompanyRoi:$scope.companyroi,packagePaypal:$scope.paypal,packageBank:$scope.bank,packageEmail:$scope.email,packagePhone:$scope.phone,packageSkype:$scope.skype,packageSupport:$scope.support,packagePortfolio:$scope.portfolio,packageServicePricing:$scope.servicepricing,packageDuration:$scope.duration,packageEmployeeRoi:$scope.employeeroi }


      $http({
          url: '<?php echo base_url(); ?>admin/packageUpdate',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

           if(response.data.message == 'true')
         {
          $.notify("Package Added Successfully ", "success");
           $interval(callAtInterval, 2000);

             function callAtInterval()
             {
               $window.location.href = '<?php echo base_url(); ?>admin/package';
             }

          }

            });
     }


   $scope.get();


    });
    // edit membership
      <?php } ?>

      // profile view
      var app42 = angular.module('myApp42', [])


  app42.controller('myCtrt42', function($scope,$window,$http,$interval) {
   $scope.allview = [];
   $scope.page =1;
   $scope.start = '';
   $scope.total = '';
   $scope.perpage =10;
   $scope.searchtext ='';



   $scope.get = function ()
 	{
 	 var obj = {  page : $scope.page,perpage:$scope.perpage,search:$scope.searchtext   }

 	$http({
 		url: '<?php echo base_url(); ?>admin/getprofileview',
 		method: "POST",
 		data:obj,
 		headers: {
 			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 		}
 	 }).then(function(response) {

 		$scope.allview = response.data.result;
 		$scope.start = response.data.start;
    $scope.total = response.data.pcount;

 		 if($scope.page == 1)
 		 $scope.pagination($scope.total);
 			 });
 	 }


 	 $scope.pagination = function ($event)
 	 {
 		if($scope.total > $scope.perpage)
 		{
      $('#pagination').pagination({
 				 items: $event,
 				 itemsOnPage: $scope.perpage,
 				 cssStyle: 'light-theme',
 				 onPageClick:  function (e) {
 					 $scope.page  = e;
 					 $scope.get();
 						}
 				 });
 			}
      else
      {
       $('#pagination').html('');
      }
 	 }


   $scope.changePerPage = function ($event)
   {
     $scope.perpage = $event.value;
     $scope.page = 1;
     $scope.get();
   }

   $scope.search = function()
   {
      $scope.get();
      $scope.page =1;
   }


   $scope.get();
  });
      // profile view

      // ranking price
      var app43 = angular.module('myApp43', [])


  app43.controller('myCtrt43', function($scope,$window,$http,$interval) {
   $scope.alldata = [];
   $scope.page =1;
   $scope.start = '';
   $scope.total = '';
   $scope.allcountry = [];
   $scope.allstate = [];
   $scope.allcity = [];
   $scope.country ='';
   $scope.state ='';
   $scope.city ='';
   $scope.price ='';
   $scope.country1 ='';
   $scope.state1 ='';
   $scope.city1 ='';
   $scope.price1 ='';
   $scope.id ='';
   $scope.perpage = 20;
   $scope.searchtext ='';


   $scope.get = function ()
  {
   var obj = {  page : $scope.page,perpage:$scope.perpage,search:$scope.searchtext  }

  $http({
    url: '<?php echo base_url(); ?>admin/getrankingPrice',
    method: "POST",
    data:obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
   }).then(function(response) {
     if(response.data.message == 'true')
     {
      $scope.alldata = response.data.result;
      $scope.start = response.data.start;
      $scope.total = response.data.pcount;
     }
     else
     {
       $scope.alldata = [];

     }

     if($scope.page == 1)
     $scope.pagination($scope.total);
       });
   }


   $scope.pagination = function ($event)
   {
    if($scope.total > $scope.perpage)
    {
          $('#pagination').pagination({
         items: $event,
         itemsOnPage: $scope.perpage,
         cssStyle: 'light-theme',
         onPageClick:  function (e) {
           $scope.page  = e;
           $scope.get();
            }
         });
       }
   }

   $scope.getcountry = function ()
   {
   $http({
     url: '<?php echo base_url(); ?>admin/allcountry',
     method: "POST",
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     $scope.allcountry = response.data.result;

       });
   }

   $scope.getstate = function ($event)
   {
     var  id = angular.element($event).val();
     var obj = {  id : id  };

     $http({
       url: '<?php echo base_url(); ?>freelancer/getstate',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

       $scope.allstate = response.data.result;
     });
   }

       $scope.getcity = function ($event)
       {
         var  id = angular.element($event).val();

         var obj = {  id : id  };

         $http({
           url: '<?php echo base_url(); ?>freelancer/getcity',
           method: "POST",
           data: obj,
           headers: {
             'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
           }
         }).then(function(response) {

           $scope.allcity = response.data.result;
         });
       }

   $scope.submit = function()
   {
     $scope.submitc = true;
     error = false;
     $scope.state = angular.element('#state').val();
     $scope.city = angular.element('#city').val();


    if($scope.country == '' || $scope.price == '' )
    {
      error = true;
    }

    if(error == true)
    {
      return false;
    }

    var obj = { countryId : $scope.country,price :$scope.price,stateId:$scope.state,cityId:$scope.city }

     $http({
         url: '<?php echo base_url(); ?>admin/rankingPriceSave',
         method: "POST",
         data:obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {

          if(response.data.message == 'true')
        {
         $.notify("Ranking Price Added Successfully ", "success");
         $scope.country ='';
         $scope.price ='';
         $scope.city ='';
         $scope.state ='';

          angular.element('#addprice').modal('hide');
          $scope.get();
         }

           });
       }



       $scope.confirm = function(id)
       {
       $scope.id = id;
       angular.element('#confirm').modal('show');
       }

       $scope.delete = function()
       {
       var obj = { id :$scope.id };
       $http({
         url: '<?php echo base_url(); ?>admin/delete-ranking-price',
         method: "POST",
         data :obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {
         if(response.data.message == "true")
         {
           angular.element('#confirm').modal('hide');
           $.notify("Ranking Price Deleted Successfully", "success");
           $scope.page = 1;
           $scope.get();

         }
       });
       }

       $scope.edit = function(id)
       {
       var obj = { id :id };
       $http({
         url: '<?php echo base_url(); ?>admin/edit-ranking-price',
         method: "POST",
         data :obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {
         if(response.data.message == "true")
         {
           $scope.editdata = response.data.result;
           $scope.country1 = $scope.editdata.countryId;
           $scope.state1 = $scope.editdata.stateId;
           $scope.city1 = $scope.editdata.cityId;
           $scope.price1 = $scope.editdata.price;
           $scope.allstate = $scope.editdata.state;
           $scope.allcity = $scope.editdata.city;
           angular.element('#editprice').modal('show');

         }
       });
       }

       $scope.update = function()
       {
         $scope.submitc = true;
         error = false;
         $scope.state1 = angular.element('#state1').val();
         $scope.city1 = angular.element('#city1').val();

        if($scope.country1 == '' || $scope.price1 == '' )
        {
          error = true;
        }

        if(error == true)
        {
          return false;
        }

        var obj = { rankingPriceId:$scope.editdata.rankingPriceId,countryId : $scope.country1,price :$scope.price1,stateId:$scope.state1,cityId:$scope.city1 }

         $http({
             url: '<?php echo base_url(); ?>admin/update-ranking-price',
             method: "POST",
             data:obj,
             headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {

              if(response.data.message == 'true')
            {
             $.notify("Ranking Price Updated Successfully ", "success");
             $scope.country1 ='';
             $scope.price1 ='';
             $scope.city1 ='';
             $scope.state1 ='';

              angular.element('#editprice').modal('hide');
              $scope.get();
             }

               });
           }

           $scope.changePerPage = function ($event)
           {
             $scope.perpage = $event.value;
             $scope.page = 1;
             $scope.get();
           }

           $scope.search = function()
           {
              $scope.get();
              $scope.page =1;
           }


   $scope.get();
   $scope.getcountry();
  });
  // ranking price

  // askquestion
  <?php if(!empty($askuserId))
  {
    ?>
  var app44 = angular.module('myApp44', [])


app44.controller('myCtrt44', function($scope,$window,$http,$interval) {
$scope.alldata = [];
$scope.page =1;
$scope.start = '';
$scope.total = '';

$scope.get = function ()
{
var obj = {  page : $scope.page,userId:<?php echo $askuserId; ?> }

$http({
url: '<?php echo base_url(); ?>admin/getaskquestionlist',
method: "POST",
data:obj,
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {
 if(response.data.message == 'true')
 {
  $scope.alldata = response.data.result;
  $scope.start = response.data.start;
  $scope.total = response.data.pcount;
 }
 else
 {
   $scope.alldata = [];

 }

 if($scope.page == 1)
 $scope.pagination($scope.total);
   });
}


$scope.pagination = function ($event)
{
if($scope.total > 10)
{
      $('#pagination').pagination({
     items: $event,
     itemsOnPage: 10,
     cssStyle: 'light-theme',
     onPageClick:  function (e) {
       $scope.page  = e;
       $scope.get();
        }
     });
   }
}

$scope.get();
});
<?php } ?>
  // askquestion

  // useraskquestion
  var app45 = angular.module('myApp45', [])


app45.controller('myCtrt45', function($scope,$window,$http,$interval) {
$scope.alldata = [];
$scope.page =1;
$scope.start = '';
$scope.total = '';

$scope.get = function ()
{
var obj = {  page : $scope.page }

$http({
url: '<?php echo base_url(); ?>admin/getaskquestion',
method: "POST",
data:obj,
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {
 if(response.data.message == 'true')
 {
  $scope.alldata = response.data.result;
  $scope.start = response.data.start;
  $scope.total = response.data.pcount;
 }
 else
 {
   $scope.alldata = [];

 }

 if($scope.page == 1)
 $scope.pagination($scope.total);
   });
}


$scope.pagination = function ($event)
{
if($scope.total > 10)
{
      $('#pagination').pagination({
     items: $event,
     itemsOnPage: 10,
     cssStyle: 'light-theme',
     onPageClick:  function (e) {
       $scope.page  = e;
       $scope.get();
        }
     });
   }
}

$scope.get();
});
  // usersaskquestion

  // giguser
  var app46 = angular.module('myApp46', [])


app46.controller('myCtrt46', function($scope,$window,$http,$interval) {
$scope.alldata = [];
$scope.page =1;
$scope.start = '';
$scope.total = '';

$scope.get = function ()
{
var obj = {  page : $scope.page }

$http({
url: '<?php echo base_url(); ?>admin/getusergig',
method: "POST",
data:obj,
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {
 if(response.data.message == 'true')
 {
  $scope.alldata = response.data.result;
  $scope.start = response.data.start;
  $scope.total = response.data.pcount;
 }
 else
 {
   $scope.alldata = [];

 }

 if($scope.page == 1)
 $scope.pagination($scope.total);
   });
}


$scope.pagination = function ($event)
{
if($scope.total > 10)
{
      $('#pagination').pagination({
     items: $event,
     itemsOnPage: 10,
     cssStyle: 'light-theme',
     onPageClick:  function (e) {
       $scope.page  = e;
       $scope.get();
        }
     });
   }
}

$scope.get();
});
  // giguser

  // getgig
  <?php if(!empty($gigId))
  {
    ?>
  var app47 = angular.module('myApp47', [])

  app47.filter('trustAsHtml',['$sce', function($sce) {

  		 return function(text) {

  			 return $sce.trustAsHtml(text);
  					};
  	 }]);

app47.controller('myCtrt47', function($scope,$window,$http,$interval) {
$scope.alldata = [];
$scope.page =1;
$scope.start = '';
$scope.total = '';

$scope.get = function ()
{
var obj = {  page : $scope.page,userId:<?php echo $gigId; ?> }

$http({
url: '<?php echo base_url(); ?>admin/getgig',
method: "POST",
data:obj,
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {
 if(response.data.message == 'true')
 {
  $scope.alldata = response.data.result;
  $scope.start = response.data.start;
  $scope.total = response.data.pcount;
 }
 else
 {
   $scope.alldata = [];

 }

 if($scope.page == 1)
 $scope.pagination($scope.total);
   });
}


$scope.pagination = function ($event)
{
if($scope.total > 10)
{
      $('#pagination').pagination({
     items: $event,
     itemsOnPage: 10,
     cssStyle: 'light-theme',
     onPageClick:  function (e) {
       $scope.page  = e;
       $scope.get();
        }
     });
   }
}

$scope.view = function(id)
{
var obj = { gigId :id};
$http({
  url: '<?php echo base_url(); ?>admin/gigview',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    angular.element('#view').modal('show');
    $scope.viewdata = response.data.result;
  }
});
}


$scope.get();
});
<?php } ?>
  // getgig

  // custom package
  var app48 = angular.module('myApp48', [])

  app48.filter('trustAsHtml',['$sce', function($sce) {

       return function(text) {

         return $sce.trustAsHtml(text);
            };
     }]);

app48.controller('myCtrt48', function($scope,$window,$http,$interval) {
$scope.employeemin ='';
$scope.employeemax ='';
$scope.employeeprice ='';
$scope.projectmin ='';
$scope.projectmax ='';
$scope.projectprice ='';
$scope.expensemin ='';
$scope.expensemax ='';
$scope.expenseprice ='';
$scope.invoicemin ='';
$scope.invoicemax ='';
$scope.invoiceprice ='';
$scope.packagemin ='';
$scope.packagemax ='';
$scope.packageprice ='';
$scope.testimonialmin ='';
$scope.testimonialmax ='';
$scope.testimonialprice ='';
$scope.portfoliomin ='';
$scope.portfoliomax ='';
$scope.portfolioprice ='';
$scope.casestudiesmin ='';
$scope.casestudiesmax ='';
$scope.casestudiesprice ='';
$scope.servicesmin = '';
$scope.servicesmax = '';
$scope.servicesprice = '';
$scope.industrymin = '';
$scope.industrymax = '';
$scope.industryprice = '';
$scope.employeeerror= false;
$scope.projecterror= false;
$scope.expenseerror= false;
$scope.invoiceerror= false;
$scope.packageerror= false;
$scope.testimonialerror= false;
$scope.portfolioerror= false;
$scope.casestudieserror= false;
$scope.serviceserror= false;
$scope.industryerror= false;


$scope.get = function ()
{
$http({
url: '<?php echo base_url(); ?>admin/getcustom-package',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {
 if(response.data.success == 'true')
 {
  $scope.employeemin = response.data.result.employeeMin;
  $scope.employeemax = response.data.result.employeeMax;
  $scope.employeeprice = response.data.result.employeePrice;
  $scope.projectmin =response.data.result.projectMin;
  $scope.projectmax =response.data.result.projectMax;
  $scope.projectprice =response.data.result.projectPrice;
  $scope.expensemin =response.data.result.expenseMin;
  $scope.expensemax =response.data.result.expenseMax;
  $scope.expenseprice =response.data.result.expensePrice;
  $scope.invoicemin =response.data.result.invoiceMin;
  $scope.invoicemax =response.data.result.invoiceMax;
  $scope.invoiceprice =response.data.result.invoicePrice;
  $scope.packagemin =response.data.result.packageMin;
  $scope.packagemax =response.data.result.packageMin;
  $scope.packageprice =response.data.result.packagePrice;
  $scope.testimonialmin = response.data.result.testimonialMin;
  $scope.testimonialmax = response.data.result.testimonialMax;
  $scope.testimonialprice = response.data.result.testimonialPrice;
  $scope.portfoliomin = response.data.result.portfolioMin;
  $scope.portfoliomax = response.data.result.portfolioMax;
  $scope.portfolioprice = response.data.result.portfolioPrice;
  $scope.casestudiesmin = response.data.result.casestudiesMin;
  $scope.casestudiesmax = response.data.result.casestudiesMax;
  $scope.casestudiesprice = response.data.result.casestudiesPrice;
  $scope.servicesmin = response.data.result.servicesMin;
  $scope.servicesmax = response.data.result.servicesMax;
  $scope.servicesprice = response.data.result.servicesPrice;
  $scope.industrymin = response.data.result.industryMin;
  $scope.industrymax = response.data.result.industryMax;
  $scope.industryprice = response.data.result.industryPrice;
 }
   });
}

$scope.update = function()
{
  $scope.submit = true;
  error = false;

 if($scope.employeemin == '' || $scope.employeemax == '' || $scope.employeeprice == '')
 {
   error = true;
 }

 if(parseInt($scope.employeemin) > parseInt($scope.employeemax))
 {
   error = true;
   $scope.employeeerror = true;
 }
 else
 {
   $scope.employeeerror = false;
 }

 if($scope.projectmin == '' || $scope.projectmax == '' || $scope.projectprice == '' )
 {
   error = true;
 }

 if(parseInt($scope.projectmin) > parseInt($scope.projectmax))
 {
   error = true;
   $scope.projecterror= true;
 }
 else
 {
   $scope.projecterror= false;
 }

 if($scope.invoicemin == '' || $scope.invoicemax == '' || $scope.invoiceprice == '' )
 {
   error = true;
 }

 if(parseInt($scope.invoicemin) > parseInt($scope.invoicemax))
 {
   error = true;
   $scope.invoiceerror = true;
 }
 else
 {
   $scope.invoiceerror = false;
 }

 if($scope.expensemin == '' || $scope.expensemax == '' || $scope.expenseprice == '' )
 {
   error = true;
 }

 if(parseInt($scope.expensemin) > parseInt($scope.expensemax))
 {
   error = true;
   $scope.expenseerror = true;
 }
 else
 {
   $scope.expenseerror = false;
 }

 if($scope.casestudiesmin == '' || $scope.casestudiesmax == '' || $scope.casestudiesprice == '')
 {
   error = true;
 }

 if(parseInt($scope.casestudiesmin) > parseInt($scope.casestudiesmax))
 {
   error = true;
   $scope.casestudieserror = true;
 }
 else
 {
   $scope.casestudieserror = false;
 }

 if($scope.packagemin == '' || $scope.packagemax == '' || $scope.packageprice == '')
 {
   error = true;
 }

 if(parseInt($scope.packagemin) > parseInt($scope.packagemax))
 {
   error = true;
   $scope.packageerror = true;
 }
 else
 {
   $scope.packageerror = false;
 }
 if($scope.portfoliomin == '' || $scope.portfoliomax == '' || $scope.portfolioprice == '')
 {
   error = true;
 }

 if(parseInt($scope.portfoliomin) > parseInt($scope.portfoliomax))
 {
   error = true;
   $scope.portfolioerror = true;
 }
 else
 {
   $scope.portfolioerror = false;
 }

 if($scope.testimonialmin == '' || $scope.testimonialmax == '' || $scope.testimonialprice == '')
 {
   error = true;
 }

 if(parseInt($scope.testimonialmin) > parseInt($scope.testimonialmax))
 {
   error = true;
   $scope.testimonialerror = true;
 }
 else
 {
   $scope.testimonialerror = false;
 }

 if($scope.servicesmin == '' || $scope.servicesmax == '' || $scope.servicesprice == '')
 {
   error = true;
 }

 if(parseInt($scope.servicesmin) > parseInt($scope.servicesmax))
 {
   error = true;
   $scope.serviceserror = true;
 }
 else
 {
   $scope.serviceserror = false;
 }

 if($scope.industrymin == '' || $scope.industrymax == '' || $scope.industryprice == '')
 {
   error = true;
 }

 if(parseInt($scope.industrymin) > parseInt($scope.industrymax))
 {
   error = true;
   $scope.industryerror = true;
 }
 else
 {
   $scope.industryerror = false;
 }

 if(error == true)
 {
   return false;
 }
var obj = { employeeMin :$scope.employeemin,employeemax:$scope.employeemax,employeePrice:$scope.employeeprice,projectMin:$scope.projectmin,projectMax:$scope.projectmax,projectPrice:$scope.projectprice,expenseMin:$scope.expensemin,expenseMax:$scope.expensemax,expensePrice:$scope.expenseprice,invoiceMin:$scope.invoicemin,invoiceMax:$scope.invoicemax,invoicePrice:$scope.invoiceprice,packageMin :$scope.packagemin,packagemax:$scope.packagemax,packagePrice:$scope.packageprice,testimonialMin :$scope.testimonialmin,testimonialmax:$scope.testimonialmax,testimonialPrice:$scope.testimonialprice,portfolioMin :$scope.portfoliomin,portfoliomax:$scope.portfoliomax,portfolioPrice:$scope.portfolioprice,casestudiesMin :$scope.casestudiesmin,casestudiesmax:$scope.casestudiesmax,casestudiesPrice:$scope.casestudiesprice,industryMin :$scope.industrymin,industrymax:$scope.industrymax,industryPrice:$scope.industryprice,servicesMin :$scope.servicesmin,servicesmax:$scope.servicesmax,servicesPrice:$scope.servicesprice};
$http({
  url: '<?php echo base_url(); ?>admin/customPackageUpdate',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.success == "true")
  {
    $.notify("Package Updated Successfully ", "success");
  }
});
}


$scope.get();
});

  // custom package



</script>
</body>
</html>
