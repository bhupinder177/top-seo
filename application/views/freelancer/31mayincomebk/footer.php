<!-- activitypop -->
<div class="modal fade" id="inactivitypopup" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">InActivity Found</h4>
      </div>
      <div class="modal-body">
        <p>Are you still Active ?</p>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-success " id="inactivityYes">Yes</button>
      </div>
    </div>
  </div>
</div>
<!-- activitypop -->

<div class="footer">
    <p class="mb-0">Copyright &copy; 2020 Top-SEOs All Rights Reserved.</p>
</div>
</div>
<script src="<?php echo base_url(); ?>assets/dashboard/js/jquery.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/dashboard/js/jquery-3.2.1.slim.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/dashboard/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/bootstrap.min.js"></script>
<!--wow-js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
  <!-- added custom -->
  <script src="<?php echo base_url(); ?>assets/js/notify.js" type="text/javascript" charset="utf-8"></script>
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>  -->

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://cdn.rawgit.com/Luegg/angularjs-scroll-glue/master/src/scrollglue.js"></script>
<script src="//cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.simplePagination.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/PageTitleNotification.min.js"></script>
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
<!-- chart -->
<!-- multiple datepicker -->
<?php  if($this->uri->segment(2) == "lead-edit")
{
  ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src='<?php echo base_url(); ?>assets/dashboard/js/datepicker.js' type='text/javascript'></script>
<?php } ?>
<!-- multiple datepicker -->
<script>
// character only
$(function () {
		$('.characteronly').keydown(function (e) {
			if (e.shiftKey || e.ctrlKey || e.altKey) {
				e.preventDefault();
			} else {
				var key = e.keyCode;
				if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
					e.preventDefault();
				}
			}
		});
	});
// character only
// number decimal
//decimal
	$(function () {
		$(".numberdecimalonly").keydown(function (event) {


			if (event.shiftKey == true) {
				event.preventDefault();
			}

			if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

			} else {
				event.preventDefault();
			}

			if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
			event.preventDefault();

		});
	}); //decimal

// number decimal
window.onload = function () {

   <?php if(!empty($profileview))
   {

     ?>
     var data2 = <?php echo json_encode($profileview); ?>;
     for(var a in data2)
     {
       data2[a].y = Number(data2[a].y);
     }

     var options10 = {
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
   title: "Date"
 },
 data: [{
   type: "column",
   yValueFormatString: "#,##0.0#"%"",
   dataPoints: data2
 }]
};

  $("#profileviewchart1").CanvasJSChart(options10);

  // profile view chart
<?php }
 if(isset($salesearning))
{
  $dd = array();
  foreach ($salesearning as $key => $value) {
    $dd[] = $value;
  }
 ?>
var options = {
	animationEnabled: true,
	title: {
		text: "Total Earning"
	},
	axisY: {
		title: "Earning",
		includeZero: true
	},
	axisX: {
		title: "Month"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.0#"%"",
		dataPoints: <?php echo json_encode($dd); ?>
	}]
};

$("#chartContainer").CanvasJSChart(options);
<?php }
if(isset($salesprojectdatewise))
{

?>
var options2 = {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Actual vs Projected Sales"
	},
	axisX:{
		valueFormatString: "DD MMM"
	},
	axisY: {
		title: "Number of Sales",
		minimum: 30
	},
	toolTip:{
		shared:true
	},
	legend:{
		cursor:"pointer",
		verticalAlign: "bottom",
		horizontalAlign: "left",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
	},
	data: [{
		type: "line",
		showInLegend: true,
		name: "Projected Sales",
		markerType: "square",
		xValueFormatString: "DD MMM, YYYY",
		color: "#F08080",
		yValueFormatString: "#,##0K",
		dataPoints:<?php echo json_encode($salesprojectdatewise); ?>
	}]
};
$("#chartContainer1").CanvasJSChart(options2);

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

<?php } ?>


}
</script>


<!-- chart -->
<script>
    new WOW().init();
</script>
<!--wow-js-end-->
<script>
    $(document).ready(function() {
        $('.app-sidebar__toggle').on('click', function() {
            $('.main_wrapper').toggleClass('active')
        });

        $('.days>li').on('click', function() {
            $('.days>li.current').removeClass('current');
            $(this).addClass('current');
        });
    });
</script>
<script type="text/javascript">

interact('.dropzone').dropzone({
  accept: '.drop',
  overlap: 0.75,

})

interact('.drop')
  .draggable({
    inertia: true,
    modifiers: [
      interact.modifiers.restrictRect({
        restriction: 'self',
        endOnly: true
      })
    ],
    autoScroll: true,
    // dragMoveListener from the dragging demo above
    onmove: dragMoveListener
  })


function dragMoveListener(event) {
var target = event.target,
// keep the dragged position in the data-x/data-y attributes
x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy,

rotation = (parseFloat(target.getAttribute('data-angle')) || 0);

// translate the element
target.style.webkitTransform =
target.style.transform =
'translate(' + x + 'px, ' + y + 'px) rotate(' + rotation + 'rad)';

// update the posiion attributes
target.setAttribute('data-x', x);
target.setAttribute('data-y', y);
target.setAttribute('data-angle', rotation);
}

// this is used later in the resizing and gesture demos
window.dragMoveListener = dragMoveListener;




</script>
<!-- dashboard -->
<script>
<?php if(!empty($billing))
{ ?>
$('.event-calendar').equinox({
events: <?php echo json_encode($billing); ?>,
});
<?php } ?>
$(".numberonly").keydown(function (e) {
// Allow: backspace, delete, tab, escape, enter and .
if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
// Allow: Ctrl+A, Command+A
(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
// Allow: home, end, left, right, down, up
(e.keyCode >= 35 && e.keyCode <= 40)) {
  // let it happen, don't do anything
  return;
}
// Ensure that it is a number and stop the keypress
if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
  e.preventDefault();
}
}); //number only

$('#interviewTime').timepicki();
$('#interviewTime1').timepicki();
//decimal
$(function () {
$(".numberdecimalonly").keydown(function (event) {


  if (event.shiftKey == true) {
    event.preventDefault();
  }

  if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

  } else {
    event.preventDefault();
  }

  if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
  event.preventDefault();

});
});
//decimal
$(".startdate").datepicker({
          dateFormat: "dd-mm-yy",
          minDate: 1,
          onSelect: function (date) {
              var date2 = $('.startdate').datepicker('getDate');
              date2.setDate(date2.getDate());
              $('.enddate').datepicker('setDate', date2);
              $('.enddate').datepicker('option', 'minDate', date2);
          }
      });
      $('.enddate').datepicker({
          dateFormat: "dd-mm-yy",
          minDate: 1,

          onClose: function () {
              var dt1 = $('.startdate').datepicker('getDate');

              var dt2 = $('.enddate').datepicker('getDate');
              if (dt2 = dt1) {
                  var minDate = $('.endate').datepicker('option', 'minDate');
                  $('.enddate').datepicker('setDate', minDate);
              }
          }
      });

      // taskstart
      $(".taskstartdate").datepicker({
          dateFormat: "dd-mm-yy",
          minDate: 0,
          onSelect: function (date) {
              var date2 = $('.taskstartdate').datepicker('getDate');
              date2.setDate(date2.getDate());
              $('.taskenddate').datepicker('setDate', date2);
              $('.taskenddate').datepicker('option', 'minDate', date2);
          }
      });
      $('.taskenddate').datepicker({
          dateFormat: "dd-mm-yy",
          minDate: 0,

          onClose: function () {
              var dt1 = $('.taskstartdate').datepicker('getDate');

              var dt2 = $('.taskenddate').datepicker('getDate');
              if (dt2 = dt1) {
                  var minDate = $('.taskendate').datepicker('option', 'minDate');
                  $('.taskenddate').datepicker('setDate', minDate);
              }
          }
      });
      // taskstart

      $("#planstart").datepicker({
                  dateFormat: "dd-mm-yy",
                  // minDate: 1,
                  onSelect: function (date) {
                      var date2 = $('#planstart').datepicker('getDate');
                      date2.setDate(date2.getDate() + 1);
                      $('#planend').datepicker('setDate', date2);
                      $('#planend').datepicker('option', 'minDate', date2);
                  }
              });

              $('#planend').datepicker({
                  dateFormat: "dd-mm-yy",
                  // minDate: 1,

                  onClose: function () {
                      var dt1 = $('#planstart').datepicker('getDate');

                      var dt2 = $('#planend').datepicker('getDate');
                      if (dt2 = dt1) {
                          var minDate = $('#planend').datepicker('option', 'minDate');
                          $('#planend').datepicker('setDate', minDate);

                      }
                  }
              });


      $(".first").datepicker({
                  dateFormat: "dd-mm-yy",
                  // minDate: 1,
                  onSelect: function (date) {
                      var date2 = $('.startdate').datepicker('getDate');
                      date2.setDate(date2.getDate() + 1);
                      $('.enddate').datepicker('setDate', date2);
                      $('.enddate').datepicker('option', 'minDate', date2);
                  }
              });
              $('.last').datepicker({
                  dateFormat: "dd-mm-yy",
                  // minDate: 1,

                  onClose: function () {
                      var dt1 = $('.startdate').datepicker('getDate');

                      var dt2 = $('.enddate').datepicker('getDate');
                      if (dt2 = dt1) {
                          var minDate = $('.endate').datepicker('option', 'minDate');
                          $('.enddate').datepicker('setDate', minDate);
                      }
                  }
              });

$(".date").datepicker({
            dateFormat: "dd-mm-yy",
            minDate: 0,

        });

$(".expensedate").datepicker({
            dateFormat: "dd-mm-yy",

        });

        $(".startdate1").datepicker({
                  dateFormat: "dd-mm-yy",
                  onSelect: function (date) {
                      var date2 = $('.startdate1').datepicker('getDate');
                      date2.setDate(date2.getDate());
                      $('.enddate1').datepicker('setDate', date2);
                      $('.enddate1').datepicker('option', 'minDate', date2);
                  }
              });
              $('.enddate1').datepicker({
                  dateFormat: "dd-mm-yy",
                  onClose: function () {
                      var dt1 = $('.startdate1').datepicker('getDate');

                      var dt2 = $('.enddate1').datepicker('getDate');

                      if (dt2 = dt1) {
                          var minDate = $('.endate1').datepicker('option', 'minDate');
                          $('.enddate1').datepicker('setDate', minDate);
                      }
                  }
              });

</script>

<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();

// $( function() {
//   $( ".attdate" ).datepicker();
//    dateFormat: 'dd/mm/yy'
//
// });
$(".attclick").click(function(){
var first = $('.first').val();
var last = $('.last').val();
if(first != '' && last != '')
{
  first = first.replace("/", "-");
  first = first.replace("/", "-");
  last = last.replace("/", "-");
  last = last.replace("/", "-");
  window.location.href="<?php echo base_url(); ?>freelancer/searchattendance/"+first+'/'+last;
}
})
});
function myFunction() {
var elmnt = document.getElementById("bottom");
var x = elmnt.scrollLeft;
var y = elmnt.scrollTop;
if(y == 0)
{
angular.element(document.getElementById('chatcontroller')).scope().lastMessages();
}
}
$(document).ready(function(){

$(".navbar-toggler").click(function(){

$("#content").toggleClass('mobile');
//   $("#sidebar").animate({left: '250px'});

});

$(document).on("click", "body",function(e) {

var idd = $($(e.target).parent()).attr('id');
if( (!idd && e.target.id != 'unn') || (idd && idd != 'chosenresults'))
{
  $("#prac_areas_chosen").removeClass('chosen-with-drop');
  $("#prac_areas_chosen").removeClass('chosen-container-active');
}


});

$(document).on("click", "body",function(e) {

var idd = $($(e.target).parent()).attr('id');
if( (!idd && e.target.id != 'unns') || (idd && idd != 'chosenresults1'))
{
  $("#ser_chosen").removeClass('chosen-with-drop');
  $("#ser_chosen").removeClass('chosen-container-active');
}


});




});



/////////////////////// chat
CKEDITOR.replaceClass = 'ckeditor';



var app1 = angular.module('myApp1',['luegg.directives'])

app1.filter('time', function () {
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
//console.log(time);
return time;
};
});

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

app1.filter('trustAsHtml',['$sce', function($sce) {

return function(text) {

return $sce.trustAsHtml(text);
};
}]);



app1.directive('ngEnter', function () {
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

// app1.directive('scroll', function($window) {
//     return {
//         scope: {
//           offset: "@offset"
//         },
//         link: function (scope, element, attr)
// 				{
//             angular.element($window).bind("scroll", function() {
//                  if (this.pageYOffset >= scope.offset) {
//                      scope.scrollClass = true;
// 								 	//	console.log(this.pageYOffset);
//                  }
//                 scope.$apply();
//             });
//         }
//     }
// });



app1.controller('myCtrt1', function($scope,$window,$http,$interval) {

$scope.glued = true;
$scope.person = [];
$scope.messages = [];
$scope.results='';
$scope.getmessage ='';
$scope.userId ='';
$scope.username ='';
$scope.userType ='';
$scope.userimage ='';
$scope.selectedContact = 0;
$scope.selectedContactImage ='';
$scope.msgtext ='';
$scope.attachment ='';
$scope.jobtitle ='';
$scope.contractId ='';
$scope.filterValue = '';
$scope.msg ='';
$scope.editmsg ='';
$scope.offerId ='';
$scope.milestone = '';
$scope.milestones =[];
$scope.offerTotal = 0;
$scope.proposal ='';
$scope.time ='';
$scope.roomId ='';
$scope.typingLENGTH =500;
$scope.lastTypingTime='';
$scope.typing = false;
$scope.chattype = 1;
$scope.groupname = '';
$scope.group = [];
// $scope.selectedgroupId = '';
$scope.selectmember = [];
$scope.grouptypinguser =[];
$scope.p = [];
$scope.plan = [];
$scope.skip = 1;
 //var socket = io('https://top-seo-sockets.herokuapp.com');
var socket = io('https://top-seo-sockets.herokuapp.com');

$scope.socketjoinchat = function (id)
{
//console.log('joinchat');
socket.emit('join-chat', { senderId: '<?php echo $this->session->userdata['clientloggedin']['id']; ?>',receiverId : id });

}

$scope.socketjoingroup = function (id)
{
socket.emit('join-group', { groupId: id });
}

socket.on('typing', function(data)
{
//console.log(data);
$scope.t = 1;
$scope.typinguser = data.sendername;
});

socket.on('addmember', function(data)
{
if(data)
{
  $scope.selectmember = [];
  $("#addmember").modal('hide');
}
});


socket.on('stoptyping', function(data)
{
//console.log(data);
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

// group typing update

socket.on('grouptyping',function(data)
{
var user = data.sendername;
//console.log($scope.grouptypinguser.indexOf(user));
if(data.type == 'stoppedtyping')
$scope.grouptypinguser.splice($scope.grouptypinguser.indexOf(user),1);
else
{
  if($scope.grouptypinguser.indexOf(user) == -1)
  {
    $scope.grouptypinguser.push(user);
  }
}
//console.log($scope.grouptypinguser);
});

$scope.groupupdateTyping = function ()
{
if (!$scope.typing)
{
  $scope.typing = true;
  socket.emit('groupstartTyping', { roomId:$scope.roomId,sendername:$scope.username });
}

$scope.lastTypingTime = (new Date()).getTime();

$interval(function()
{
  var typingTimer = (new Date()).getTime();
  var timeDiff    = typingTimer - $scope.lastTypingTime;
  if (timeDiff   >= $scope.typingLENGTH && $scope.typing) {
    //console.log('stopeed');
    socket.emit('groupstopTyping', { type:'stoptyping', roomId:$scope.roomId,sendername:$scope.username });
    $scope.t = 0;

    $scope.typing = false;
  }
},$scope.typingLENGTH);
}

///group typing update

$scope.updateTyping = function ()
{
var typingTimer = (new Date()).getTime()

var timeDiff    = typingTimer - $scope.lastTypingTime;
if (!$scope.typing)
{
  $scope.typing = true;
  //	socket.emit('statusupate', { senderId:$scope.userId,rec:$scope.selectedContactid,status:1});
  socket.emit('startTyping', { roomId:$scope.roomId,sendername:$scope.username });
  $scope.getunreadmsg();
}

$scope.lastTypingTime = (new Date()).getTime();

$interval(function(){

  var typingTimer = (new Date()).getTime();
  var timeDiff    = typingTimer - $scope.lastTypingTime;
  if (timeDiff   >= $scope.typingLENGTH && $scope.typing) {
    socket.emit('stopTyping', { roomId:$scope.roomId,sendername:$scope.username });
    $scope.t = 0;
    $scope.typing = false;
  }
},$scope.typingLENGTH);
}



socket.on('messages', function(msg)
{
if(!$scope.messages[msg['MSG_ROOMID']])
$scope.messages[msg['MSG_ROOMID']] = [];
$scope.messages[msg['MSG_ROOMID']].push(msg);
if($scope.person)
{
  for(var a in $scope.person)
  {
    if($scope.person[a].cid == msg['MSG_SENTBY'])
    {
      $scope.person[a]['unread'].push(msg);
    }
  }
}
$scope.$apply();

});

socket.on('creategroup', function(data)
{
//console.log(data);
angular.element('#groupname').val('');
$scope.groupname = '';
angular.element("#group").modal('hide');
$scope.group.push(data);
socket.emit('addmember', { GroupId:data._id,UserId:'<?php echo $this->session->userdata['clientloggedin']['id']; ?>'});
$scope.$apply();

});





$http.get("<?php echo base_url(); ?>freelancer/getsession")
.then(function(response)
{
$scope.userId = response.data.userid;
$scope.userType = response.data.type;
$scope.username = response.data.name;
$scope.userimage = response.data.image;
// console.log($scope.userimage);
$scope.getperson($scope.userId);
$scope.userplan($scope.userId);

});

$scope.userplan = function(id)
{

var obj = { u_id:id  }
$http({
  url: '<?php echo base_url(); ?>freelancer/freelancerplan',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response){

  $scope.plan = response.data.result;
});
}

$scope.chatchange = function(t)
{
$scope.chattype = t;
if($scope.chattype == 2)
{
  $scope.getallgroup();
}
}

$scope.submitgroup = function()
{
$scope.gSubmit = true;
var error = false;
$scope.groupname = angular.element('#groupname').val();
if($scope.groupname == '')
{
  error = true;
}
if(error == true)
{
  return false;
}
socket.emit('creategroup', { Name:$scope.groupname,UserId:'<?php echo $this->session->userdata['clientloggedin']['id']; ?>'});

$scope.gSubmit = false;
}

$scope.milestones.push({
title : '',
price : 0,
task : [
  {
    task:'',
    hours:'',
    hourlyPrice:'',
    amount:'',
  }
],
button:'',
});

$scope.milestoneadd = function ($event)
{
$scope.milestones.push({
  title : '',
  price : 0,
  task : [
    {
      task:'',
      hours:'',
      hourlyPrice:'',
      amount:'',
    }
  ],
  button:'',
});
}


$scope.taskadd = function ($key)
{
$scope.milestones[$key]['task'].push({
  task : '',
  hours:'',
  hourlyPrice:'',
  amount:'',
});

}

$scope.selectgroup = function(id)
{
$scope.roomId = id;
$scope.socketjoingroup($scope.roomId);
$scope.getchat($scope.roomId);
}

$scope.deletetask = function ($mkey,$key)
{

$scope.milestones[$mkey]['task'].splice($key,1);
$scope.totalmilestone();
}

$scope.deletemilestone = function ($key)
{
//alert($key);
$scope.milestones.splice($key,1);
$scope.totalmilestone();
}

$scope.totalmilestone = function($event)
{
$scope.bid = 0;

for(var i in $scope.milestones )
{
  $scope.budget = 0;
  for(var m in $scope.milestones[i]['task'])
  {
    // console.log($scope.milestones[i]['task'][m]['amount']);
    $scope.budget = +$scope.budget + +$scope.milestones[i]['task'][m]['amount'];
  }
  // console.log($scope.budget);
  $scope.milestones[i]['price'] = $scope.budget;
  $scope.bid = +$scope.bid + +$scope.milestones[i]['price'];
  $scope.offerTotal = $scope.bid;
}
}

$scope.submitproposal = function()
{
$scope.submitpro = true;
var error = false;
$scope.proposal = angular.element('#proposal').val();
if($scope.proposal == ''  )
{
  error = true;
}


for( var res in $scope.milestones)
{
  if($scope.milestones[res]['title'] == '' || $scope.milestones[res]['price'] =='' )
  {
    error = true;
  }

  if($scope.milestones[res]['task'].length != 0)
  {
    for(var t in $scope.milestones[res]['task'])
    {
      if($scope.milestones[res]['task'][t]['task'] == '' || $scope.milestones[res]['task'][t]['amount'] == '' || $scope.milestones[res]['task'][t]['hours'] == '' || $scope.milestones[res]['task'][t]['hourlyPrice'] == '')
      {
        error = true;
      }
    }
  }
}

if(error == true)
{
  return false;
}

var m = JSON.stringify({ jobId : $scope.offerId,proposalBid :$scope.offerTotal ,proposalDuration : $scope.time ,proposalDescription :$scope.proposal,milestones:$scope.milestones});

angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/jobMilestoneCreate',
  method: "POST",
  data: m,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();

  if(response.data.message == "true")
  {
    $scope.person[$scope.selectedContact]['milestone'] = 1;
    $scope.milestone = 1;
    angular.element("#milestone").modal('hide');
    $.notify("Milestone Created Successfully", "success");
  }

});
}

$scope.getperson = function(userId)
{
$scope.person = [];
$http({
  url: 'https://top-seo-sockets.herokuapp.com/getfreelancerchatperson?userId='+userId,
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.messages.length > 0)
  {
    var p = response.data.messages;
    var p1 = p.reverse();



    for(var a in p1)
    {
      var db = {};
      // if(p1[a]['_Id'] == $scope.userId )
      // {
        if(p1[a]['_id'] == $scope.userId)
        {
          db['cname'] = p1[a]['MSG_SENTTONAME'][0];
          db['cid'] = p1[a]['MSG_SENTTO'][0];
          if(p1[a]['MSG_SENTTOIMAGE'][0])
          {
          db['clogo'] = p1[a]['MSG_SENTTOIMAGE'][0];
          }
          db['fname'] = p1[a]['MSG_SENTBYNAME'][0];
          db['fid'] = p1[a]['_id'];
          if(p1[a]['MSG_SENTBYIMAGE'][0])
          {
          db['flogo'] = p1[a]['MSG_SENTBYIMAGE'][0];
          }
          db['unread'] = 0;
        }
        else
         {
            db['cname'] = p1[a]['MSG_SENTBYNAME'][0];
            db['cid'] = p1[a]['_id'];
            if(p1[a]['MSG_SENTBYIMAGE'][0])
            {
            db['clogo'] = p1[a]['MSG_SENTBYIMAGE'][0];
            }
            db['fname'] = p1[a]['MSG_SENTTONAME'][0];
            db['fid'] = p1[a]['MSG_SENTTO'][0];
            if(p1[a]['MSG_SENTTOIMAGE'][0])
            {
            db['flogo'] = p1[a]['MSG_SENTTOIMAGE'][0];
            }
            db['unread'] = 0;
          }

      // }

      var match = false;
      if($scope.p)
      {
        for(var v in $scope.p)
        {
          if($scope.p[v].cid == db['cid'])
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



    if($scope.person && $scope.person.length != 0 )
    {
      if($scope.person[0]['fid'] != $scope.userId )
      {
        if(parseInt($scope.person[0]['fid']) < parseInt($scope.userId))
        {
          $scope.roomId = 'Room_'+$scope.userId+'_'+$scope.person[0]['fid'];
        }
        else if(parseInt($scope.person[0]['fid']) > parseInt($scope.userId))
        {
          $scope.roomId = 'Room_'+$scope.person[0]['fid']+'_'+$scope.userId;
        }
        $scope.socketjoinchat($scope.person[0]['fid']);
        //console.log($scope.person[0]['cid']);
        $scope.selectchat(0,$scope.person[0]['fid'],'all',$scope.person[0]['friendId']);
      }
      else if($scope.person[0]['cid'] != $scope.userId )
      {
        if(parseInt($scope.person[0]['cid']) < parseInt($scope.userId))
        {
          $scope.roomId = 'Room_'+$scope.userId+'_'+$scope.person[0]['cid'];
        }
        else if(parseInt($scope.person[0]['cid']) > parseInt($scope.userId))
        {
          $scope.roomId = 'Room_'+$scope.person[0]['cid']+'_'+$scope.userId;
        }

        $scope.socketjoinchat($scope.person[0]['cid']);
        $scope.selectchat(0,$scope.person[0]['cid'],'all',$scope.person[0]['friendId']);
      }
      $scope.messages[$scope.roomId] = [];
      $scope.jobtitle = $scope.person[0]['jobtitle'];
      $scope.contractId = $scope.person[0]['contractId'];
      $scope.offerId = $scope.person[0]['jobOffer'];
      $scope.milestone = $scope.person[0]['milestone'];
      $scope.getchat($scope.roomId);
      $scope.getunreadmsg();

    }

    $scope.filterValue = 1;

  }

});
}

// $scope.getperson1 = function (userId)
// {
// var d = JSON.stringify({ userId : userId });
//
// $http({
//   url: '<?php echo base_url(); ?>freelancer/getperson',
//   method: "POST",
//   data: d,
//   headers: {
//     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
//   }
// }).then(function(response)
// {
//
//   $scope.person = response.data.person;
//
//   ///  console.log($scope.person);
//   if($scope.person && $scope.person.length != 0 )
//   {
//     if($scope.person[0]['fid'] != $scope.userId )
//     {
//       if(parseInt($scope.person[0]['fid']) < parseInt($scope.userId))
//       {
//         $scope.roomId = 'Room_'+$scope.userId+'_'+$scope.person[0]['fid'];
//       }
//       else if(parseInt($scope.person[0]['fid']) > parseInt($scope.userId))
//       {
//         $scope.roomId = 'Room_'+$scope.person[0]['fid']+'_'+$scope.userId;
//       }
//       $scope.socketjoinchat($scope.person[0]['fid']);
//       //console.log($scope.person[0]['cid']);
//       $scope.selectchat(0,$scope.person[0]['fid'],'all',$scope.person[0]['friendId']);
//     }
//     else if($scope.person[0]['cid'] != $scope.userId )
//     {
//       if(parseInt($scope.person[0]['cid']) < parseInt($scope.userId))
//       {
//         $scope.roomId = 'Room_'+$scope.userId+'_'+$scope.person[0]['cid'];
//       }
//       else if(parseInt($scope.person[0]['cid']) > parseInt($scope.userId))
//       {
//         $scope.roomId = 'Room_'+$scope.person[0]['cid']+'_'+$scope.userId;
//       }
//
//       $scope.socketjoinchat($scope.person[0]['cid']);
//       $scope.selectchat(0,$scope.person[0]['cid'],'all',$scope.person[0]['friendId']);
//     }
//     $scope.messages[$scope.roomId] = [];
//     $scope.jobtitle = $scope.person[0]['jobtitle'];
//     $scope.contractId = $scope.person[0]['contractId'];
//     $scope.offerId = $scope.person[0]['jobOffer'];
//     $scope.milestone = $scope.person[0]['milestone'];
//     $scope.getchat($scope.roomId);
//     $scope.getunreadmsg();
//
//   }

//   $scope.filterValue = 1;
//
//
// });
// }



$scope.getmessage = function (id,type,userId,friendId)
{
//console.log(friendId);
if(type != 'all')
{

  var lastItem = $scope.messages[$scope.messages.length - 1];
  if(lastItem)
  {
    var  url      = '<?php echo base_url(); ?>freelancer/getmessage/'+id+'/'+friendId+'/'+userId+'/'+lastItem['id'];

  }
  else
  {
    var  url      = '<?php echo base_url(); ?>freelancer/getmessage/'+id+'/'+friendId+'/'+userId;

  }

}
else
{

  var  url      = '<?php echo base_url(); ?>freelancer/getmessage/'+id+'/'+friendId+'/'+userId;

}

$http({
  url: url,
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {


  if(type == 'all')
  {
    response.data.results;
  }
  else
  {
    if(response.data.results.length != 0)
    {
      for (let i = 0; i < response.data.results.length; i++)
      {
        //$scope.messages.push(response.data.results[i])
        response.data.results[i];
      }
    }
  }
});

}

$scope.selectchat = function (i,uid,type,friendid)
{
//console.log(friendid);
$scope.selectedContact = i;
$scope.selectedContactid = uid;
// $scope.selectedFriendid = friendid;
// $scope.offerId  = $scope.person[i]['jobOffer'];
// $scope.contractId = $scope.person[i]['contractId'];
// $scope.milestone = $scope.person[i]['milestone'];
$scope.getmessage(uid,type,$scope.userId,friendid);
$scope.jobtitle = $scope.person[i]['jobtitle'];
$scope.selectedContactImage = $scope.person[i]['clogo'];
$scope.socketjoinchat($scope.selectedContactid);

if(parseInt($scope.selectedContactid) < parseInt($scope.userId))
{
  $scope.roomId = 'Room_'+$scope.userId+'_'+$scope.selectedContactid;
}
else if(parseInt($scope.selectedContactid) > parseInt($scope.userId))
{
  $scope.roomId = 'Room_'+$scope.selectedContactid+'_'+$scope.userId;
}
$scope.getchat($scope.roomId);
$scope.messages[$scope.roomId] = [];
$scope.getunreadmsg();
}

$scope.selectchat2 = function ()
{
//$scope.getmessage($scope.selectedContactid,'latest',$scope.userId,$scope.selectedFriendid);
}

$scope.request = function(id,status)
{

var friendId = $scope.person[id]['friendId'];
var d = JSON.stringify({ friendId : friendId,friendStatus : status});

$http({
  url: '<?php echo base_url(); ?>freelancer/friendrequest',
  method: "POST",
  data: d,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    if(response.data.status == 1)
    {
      $.notify("Request accepted successfully", "success");
    }
    else if(response.data.status == 2)
    {
      $.notify("Request Reject Successfully", "success");
    }

    $scope.person[id]['status'] = response.data.status;
  }

});

}



$scope.sendmessage = function(uid,name,friendId)
{
error = false;
var msgtext = angular.element('.msgtext').val();

if($scope.userId =='' || uid == '' )
{
  error = true;
}

if(msgtext == '' && $scope.attachment == '')
{
  error = true;
}
//console.log(error);
if(error == true)
{
  return false;
}
// console.log(name);
// console.log($scope.selectedContactImage);
// console.log(uid);
//$scope.getperson($scope.userId);
socket.emit('message', { MSG_SENTBYNAME:$scope.username,MSG_SENTBYIMAGE:$scope.userimage,MSG_SENTBY: '<?php echo $this->session->userdata['clientloggedin']['id']; ?>',MSG_SENTTONAME:name,  MSG_SENTTO : uid,MSG_SENTTOIMAGE:$scope.image,MSG_TEXT : msgtext,MSG_ATTACHMENT:$scope.attachment,MSG_ROOMID :$scope.roomId,MSG_SENTTOIMAGE:$scope.selectedContactImage ,MSG_DELETE : 0 ,MSG_EDIT: 0,MSG_STATUS:0,MSG_TYPE:1});
angular.element('.msgtext').val('');
$scope.attachment ='';


}

$scope.groupMessageSend = function(id)
{
error = false;
var msgtext = angular.element('.msgtext').val();

if($scope.userId =='' )
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
socket.emit('groupmessage', { MSG_SENTBYNAME:$scope.username,MSG_SENTBYIMAGE:$scope.userimage, MSG_SENTBY: '<?php echo $this->session->userdata['clientloggedin']['id']; ?>',MSG_SENTTONAME:'',  MSG_SENTTO : '',MSG_SENTTOIMAGE:'',MSG_TEXT : msgtext,MSG_ATTACHMENT:$scope.attachment,MSG_ROOMID :id,MSG_SENTTOIMAGE:'' ,MSG_DELETE : 0 ,MSG_EDIT: 0});
angular.element('.msgtext').val('');
$scope.attachment ='';
}

$scope.messageEdit = function(key,id)
{
$scope.edit = 1;
$scope.editmsgId = id;
$scope.editmsg = $scope.messages[$scope.roomId][key]['MSG_TEXT'];
//console.log($scope.editmsg);
$(".editmsg"+id).attr('contenteditable','true');
$(".editmsg"+id).addClass("editedmsg");
}

$scope.groupmessageEdit = function(key,id)
{
$scope.edit = 1;
$scope.editmsgId = id;
$scope.editmsg = $scope.messages[$scope.roomId][key]['MSG_TEXT'];
//console.log($scope.editmsg);
$(".editmsg"+id).attr('contenteditable','true');
$(".editmsg"+id).addClass("editedmsg");
}

$scope.groupmessageupdate = function(type,id)
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
$scope.chatAttachment = function ($event) {
$scope.attch = true;
var files =$event.files;
for (var i = 0; i < files.length; i++) {
  var f = files[i]
  var fileName = files[i].name;
  var filePath = fileName;
  //console.log(filePath);
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

///person filter
// chat person filter
$scope.personFilter = function()
{

var d = JSON.stringify({ filter :  $scope.filterValue ,userId:$scope.userId });
$scope.person = [];
$http({
  url: '<?php echo base_url(); ?>freelancer/chatpersonFilter',
  method: "POST",
  data: d,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.person = response.data.person;

  if($scope.person && $scope.person.length != 0 )
  {
    if($scope.person[0]['fid'] != $scope.userId )
    {
      //  console.log("freelancer");
      $scope.selectchat(0,$scope.person[0]['fid'],'all',$scope.person[0]['friendId']);
    }
    else if($scope.person[0]['cid'] != $scope.userId )
    {
      //  console.log("client");
      $scope.selectchat(0,$scope.person[0]['cid'],'all',$scope.person[0]['friendId']);
    }
  }

});

}

$scope.getchat = function(roomId)
{
$scope.messages[roomId] = [];
// var m = JSON.stringify({ roomId :roomId});
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
    //console.log($scope.messages);
  }

});
}

$scope.getunreadmsg = function()
{
$http({
  url: 'https://top-seo-sockets.herokuapp.com/personalmsg-unread?rec='+$scope.userId+'&&status=0',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if($scope.person)
  {
    for(var a in $scope.person)
    {
      $scope.person[a]['unread'] = [];

      if(response.data.messages.length > 0)
      {
        $scope.person[a]['unread'] = [];

        for(var m in response.data.messages)
        {
          if($scope.person[a].cid == response.data.messages[m]['MSG_SENTBY'])
          {

            $scope.person[a]['unread'].push(response.data.messages[m]);
          }
        }
      }

    }
    //socket.emit('statusupate', { senderId:$scope.userId,rec:$scope.person[0].fid,status:1});
  }

});
}


$scope.getallgroup = function()
{
$scope.group = [];
// var m = JSON.stringify({ roomId :roomId});
$http({
  url: 'https://top-seo-sockets.herokuapp.com/get-all-group?userId='+$scope.userId,
  method: "GET",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.status == 200)
  {
    if(response.data.group.length != 0 )
    {

      $scope.group = response.data.group.reverse();
      $scope.roomId = $scope.group[0]._id;
      $scope.socketjoingroup($scope.roomId);
      $scope.getchat($scope.roomId);

    }
  }

});
}

$scope.memberAddGroup = function(key)
{
var obj = { };
obj['friendId'] =  $scope.person[key].friendId;
obj['userId'] =    $scope.person[key].cid;
obj['image'] =     $scope.person[key].clogo;
obj['name'] =      $scope.person[key].cname;
obj['GroupId'] =   $scope.roomId;


var match = false;
if($scope.selectmember)
{
  for(var c in $scope.selectmember)
  {
    if($scope.selectmember[c]['userId'] == obj['userId'])
    {
      match = true;
    }
  }
}

if(!match)
{
  $scope.selectmember.push(obj);
  $scope.person[key].select = 1;
}
}

$scope.memberRemove =  function(key)
{
var frndId = $scope.selectmember[key].friendId;
for(var c in $scope.person)
{
  if($scope.person[c].friendId == frndId)
  {
    $scope.person[c].select = 0;
  }
}
$scope.selectmember.splice(key,1);

}

$scope.submitmember = function()
{
$scope.data = [];
$scope.csubmit = true;
error = false;

if($scope.selectmember.length == 0)
{
  error = true;
}

if(error == true)
{
  return false;
}

for(var c in $scope.selectmember)
{
  var a = {};
  a['GroupId'] = $scope.selectmember[c].GroupId;
  a['UserId'] = $scope.selectmember[c].userId;
  $scope.data.push(a);
}
socket.emit('addmember',$scope.data);
$scope.selectmember = [];
}


// get last message


$scope.lastMessages = function()
{

$http({
  url: 'https://top-seo-sockets.herokuapp.com/last-msg?com='+$scope.roomId+'&&skip='+$scope.messages[$scope.roomId].length+'&&limit=10',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data == "message")
  {

    if(response.data.messages.length != 0)
    {
      var msg = response.data.messages;
      var msg1 = msg.reverse();
      $scope.messages[$scope.roomId].unshift(...msg1);

    }
  }
});
}

///person filter end
});
///////jobs
var app3 = angular.module('myApp3', [])

app3.filter('underscoreless', function () {
return function (input) {
//console.log(input);
return input.split(' ').join('-');

};
});

app3.filter('trustAsHtml',['$sce', function($sce) {

return function(text) {

return $sce.trustAsHtml(text);
};
}]);



app3.controller('myCtrt3', function($scope,$window,$http) {

$scope.user ='';
$scope.page = 1;
$scope.jobs = [];
$scope.total = 0;
$scope.message='';
$scope.start = '';



$http.get("<?php echo base_url(); ?>freelancer/getsession")
.then(function(response)
{

$scope.user = response.data.userid;
$scope.job($scope.user);
});


$scope.job = function (id)
{
var obj = {  page : $scope.page,userid:id }

$http({
  url: '<?php echo base_url(); ?>freelancer/getjobs',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.jobs = response.data.result;
  $scope.total = response.data.pcount;
  $scope.start = response.data.start;
  //console.log($scope.total);
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
      $scope.job();
    }
  });
}
}
//job status
$scope.offerStatus = function($offerid,$jobId,$user,$from,$status)
{
if($status == '1')
{
  angular.element(".jtitle").html("Job Offer Accepted");
  angular.element("#accept").modal('show');
}
else if($status == '2')
{
  angular.element(".jtitle").html("Job Offer Rejected");
  angular.element("#accept").modal('show');
}
angular.element(".offerId").val($offerid);
angular.element(".jobId").val($jobId);
angular.element(".userId").val($user);
angular.element(".from").val($from);
angular.element(".status").val($status);
}

//job status

//job message
$scope.offermessage = function()
{

$scope.msgSubmit = true;
var error = false;
var offerid	= angular.element(".offerId").val();
var jobId = angular.element(".jobId").val();
var user	= angular.element(".userId").val();
var from =	angular.element(".from").val();
var message =	angular.element(".message").val();
var status = angular.element(".status").val();
if(message == '' || offerid == ''  || user == '' || from == '' || jobId == '')
{
  error = true;
}

if(error == true)
{
  return false;
}


var obj = {  offerId : offerid,user:user,from:from,message:message,jobId:jobId,status:status }
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/jobMesaage',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  angular.element(".preloader").hide();
  if(response.data.message == "true")
  {

    $.notify("Message Send Successfully", "success");
  }
  else if(response.data.message == "false")
  {
    $.notify("Message Not Send", "error");
  }
  angular.element("#accept").modal('hide');
  angular.element(".modal-backdrop").hide();
  $scope.job(user);
});
}
//job message
$scope.job($scope.user);
});

// job details

var app5 = angular.module('myApp5', [])


app5.filter('trustAsHtml',['$sce', function($sce) {

return function(text) {

return $sce.trustAsHtml(text);
};
}]);

app5.controller('myCtrt5', function($scope,$window,$http) {

$scope.users ='';
$scope.job = [];
$scope.message1='';
$scope.messageTo ='';
$scope.messagetext ='';




$http.get("<?php echo base_url(); ?>freelancer/getsession")
.then(function(response)
{

$scope.users = response.data.userid;

});


$scope.jobdetail = function ($id)
{
var obj = {  id : $id }

$http({
  url: '<?php echo base_url(); ?>freelancer/getjobdetail',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.job = response.data.result;

});
}

$scope.messageSend = function ()
{
$scope.msgSubmit = true;
var error = false;
$scope.messagetext = angular.element('#messagetext').val();

if($scope.messagetext == '' )
{
  error = true;
}

if(error == true)
{
  return false;
}

var obj = { messageTo:$scope.job.offFrom,messageFrom :$scope.job.offTo ,message:$scope.messagetext,jobId:$scope.job.jobId }
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/messageToClient',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  angular.element(".preloader").hide();
  if(response.data.message == "true")
  {
    angular.element('#messagetext').val('');
    $.notify("Message Send Successfully", "success");
  }
  else if(response.data.message == "false")
  {
    $.notify("Message Not Send", "error");
  }
  angular.element("#message").modal('hide');
  angular.element(".modal-backdrop").hide();

});
}

//job status
$scope.offerStatus1 = function($offerid,$jobId,$user,$from,$status)
{
//console.log($jobId);
if($status == '1')
{
  angular.element(".jtitle").html("Job Offer Accepted");
  angular.element("#accept").modal('show');
}
else if($status == '2')
{
  angular.element(".jtitle").html("Job Offer Rejected");
  angular.element("#accept").modal('show');
}
angular.element(".offerId").val($offerid);
angular.element(".jobId").val($jobId);
angular.element(".userId").val($user);
angular.element(".from").val($from);
angular.element(".status").val($status);
}

//job status

//job message
$scope.offermessage1 = function()
{
//  console.log('fdssssss');
$scope.msgSubmit = true;
var error = false;
var offerid	= angular.element(".offerId").val();
var jobId = angular.element(".jobId").val();
var user	= angular.element(".userId").val();
var from =	angular.element(".from").val();
var message =	angular.element(".message").val();
var status = angular.element(".status").val();
if(message == '' || offerid == ''  || user == '' || from == '' || jobId == '')
{
  error = true;
}



if(error == true)
{
  return false;
}


var obj = {  offerId : offerid,user:user,from:from,message:message,jobId:jobId,status:status }
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/jobMesaage',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  angular.element(".preloader").hide();
  if(response.data.message == "true")
  {
    $.notify("Message Send Successfully", "success");
  }
  else if(response.data.message == "false")
  {
    $.notify("Message Not Send", "error");
  }
  angular.element("#accept").modal('hide');
  angular.element(".modal-backdrop").hide();
  $scope.jobdetail(user);
});
}
//job message
$scope.jobdetail(<?php if(!empty($id)){ echo $id; } ?>);
});
//job details


//////////// contarct
var app6 = angular.module('myApp6', [])

app6.filter('underscoreless', function () {
return function (input) {
//console.log(input);
return input.split(' ').join('-');

};
});

app6.filter('trustAsHtml',['$sce', function($sce) {

return function(text) {

return $sce.trustAsHtml(text);
};
}]);

app6.filter('date', function () {
return function (item) {
var dates = new Date(Date.parse(item))
var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
return newDate;
};
});

app6.controller('myCtrt6', function($scope,$window,$http) {

$scope.page = 1;
$scope.contracts = [];
$scope.total = 0;


$http.get("<?php echo base_url(); ?>freelancer/getsession")
.then(function(response)
{

$scope.user = response.data.userid;
$scope.contract($scope.user);
});

$scope.contract = function ($id)
{
var obj = {  page : $scope.page , freelancer : $id }

$http({
  url: '<?php echo base_url(); ?>freelancer/getcontract',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.contracts = response.data.result;
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
      $scope.contract($scope.user);
    }
  });
}
}
//$scope.contract($scope.user);
});


////////////contract


////////////contract detail

var app7 = angular.module('myApp7', ['luegg.directives'])

app7.filter('date', function () {
return function (item) {
var dates = new Date(Date.parse(item))
var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
return newDate;
};
});

app7.filter('trustAsHtml',['$sce', function($sce) {

return function(text) {

return $sce.trustAsHtml(text);
};
}]);


app7.filter('htmlToPlaintext', function() {
return function(text) {
return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
};
});


app7.filter('time', function () {

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

app7.controller('myCtrt7', function($scope,$window,$http) {

$scope.glued = true;

$scope.contracts = [];
$scope.mid ='';
$scope.message ='';
$scope.clientId ='';
$scope.key ='';
$scope.status ='';
$scope.jobId ='';
$scope.reason ='';
$scope.rating ='';
$scope.communication = 1;
$scope.skill = 1;
$scope.responsiveness = 1;
$scope.quality = 1;
$scope.achieved = 1;
$scope.rehire =1;
$scope.availability =1;
$scope.deadline =1;
$scope.cooperation =1;

$scope.cost = 1;
$scope.overall = 1;
$scope.contractId = '';
$scope.allreview ='';
$scope.userreview ='';
$scope.activity =[];
$scope.c ='';
$scope.end = [];



$scope.contractdetail = function ($id)
{
var obj = {  id : $id }

$http({
  url: '<?php echo base_url(); ?>freelancer/getcontractdetail',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.contracts = response.data.result;

  for(var c in $scope.contracts.milestone)
  {
    if($scope.contracts.milestone[c].milestoneStatus == 4)
    {
      $scope.end.push('1');
    }
  }

  $scope.getallreview($scope.contracts['contractId']);
  $scope.getuserreview($scope.contracts['contractId']);
  $scope.getlog($scope.contracts['jobId']);
});
}

$scope.removehtml = function(text)
{

return  text ? String(text).replace(/<[^>]+>&nbsp;/gm, '') : '';


}

$scope.milestoneRequest = function(key,id,clientId)
{
$scope.mid = id;
$scope.clientId = clientId;
$scope.key = key;

angular.element("#request").modal('show');
}

$scope.comment = function(id)
{

$(".comment").hide();
$(".cbt").hide();
$(".comment"+id).attr('contenteditable','true');
$(".comment"+id).show();
$(".cbtn"+id).show();
}

$scope.submitcomment = function(id,rid)
{
// console.log(id);
var text1 = angular.element(".comment"+id).html();
var text = $scope.removehtml(text1);
//console.log(text);
if(text != '')
{
  var obj = {  logText : text,logReference : id }
  $http({
    url: '<?php echo base_url(); ?>freelancer/logcomment',
    method: "POST",
    data: obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    angular.element(".preloader").hide();
    if(response.data.message == "true")
    {

      $.notify("Comment  Successfully Added", "success");
      var text = angular.element(".comment"+id).html('');
      $(".comment").hide();
      $(".cbt").hide();
      $scope.getlog($scope.contracts['jobId']);
    }
  });

}
}

$scope.requestsend = function()
{
$scope.msgSubmit = true;
var error = false;
$scope.message =	angular.element("#message").val();

if($scope.message == '' || $scope.mid == '' || $scope.clientId == '')
{
  error = true;
}

if(error == true)
{
  return false;
}


var obj = {  milestoneId : $scope.mid,message:$scope.message,clientId:$scope.clientId }
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/milestoneRequest',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  angular.element(".preloader").hide();
  if(response.data.message == "true")
  {

    $.notify("Request Send Successfully", "success");
  }
  else if(response.data.message == "false")
  {
    $.notify("Message Not Send", "error");
  }
  angular.element("#request").modal('hide');
  $scope.contracts['milestone'][$scope.key]['milestoneStatus'] = 2;
  $scope.getlog($scope.contracts['jobId']);
  $scope.contractdetail(<?php if(!empty($contract)){ echo $contract; } ?>);


});
}

$scope.endcontract = function(contractId,clientId)
{
$scope.contractId = contractId;
$scope.c = clientId;
//console.log($scope.c);
angular.element("#contractend").modal('show');
}



$scope.submitContractReview = function()
{

$scope.msgSubmit = true;
var error = false;
$scope.review =	angular.element("#review").val();
$scope.reason = angular.element("#reason").val();


if($scope.contractId == '' || $scope.c == ''  || $scope.reason == '' || $scope.rating == '' || $scope.review =='')
{
  error = true;
}

if(error == true)
{
  return false;
}


var obj = { jobId :$scope.contracts.jobId, contractId : $scope.contractId,overall:$scope.rating,clientId:$scope.c,communication : $scope.communication,skill:$scope.skill,deadline:$scope.deadline,quality:$scope.quality,cooperation:$scope.cooperation,review:$scope.review,rehire:$scope.rehire,cost:$scope.cost,availability:$scope.availability,total:$scope.overall }
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/review',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  angular.element(".preloader").hide();

  if(response.data.message == "true")
  {
    $.notify("Review Successfully Submit", "success");
    $scope.contracts['contractStatus'] = 2;
    $scope.getuserreview();
    $scope.contractdetail(<?php if(!empty($contract)){ echo $contract; } ?>);

  }

  angular.element("#contractend").modal('hide');

});

}


$scope.starrating = function(type,val)
{
if(type == "comm")
{
  $scope.communication = val;
}

else if(type == "skill")
{
  $scope.skill = val;
}

else if(type == "res")
{
  $scope.responsiveness = val;
}

else if(type == "quality")
{
  $scope.quality = val;
}

else if(type == "rehire")
{
  $scope.rehire = val;
}
else if(type == "availability")
{
  $scope.availability = val;
}

else if(type == "deadline")
{
  $scope.deadline = val;
}

else if(type == "cooperation")
{
  $scope.cooperation = val;
}

else if(type == "schedule")
{
  $scope.schedule = val;
}

else if(type == "cost")
{
  $scope.cost = val;
}


var add = parseFloat($scope.communication * 0.20) + parseFloat($scope.skill * 0.40) + parseFloat($scope.rehire * 0.40) + parseFloat($scope.quality * 0.20) + parseFloat($scope.availability * 0.20) + parseFloat($scope.deadline * 0.20) + parseFloat($scope.cooperation * 0.20) +  parseFloat($scope.cost * 0.20);

$scope.overall  = add;


}

$scope.overallrating = function($event)
{
if($event.target.checked ==  true)
{
  $scope.rating = $event.target.value;
}
}

$scope.getallreview = function(id)
{
var obj = {  contractId : $scope.contracts['contractId'] }
$http({
  url: '<?php echo base_url(); ?>freelancer/getreview',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.allreview = response.data.result;
  }

});
}

$scope.getuserreview = function(id)
{
var obj = {  contractId : $scope.contracts['contractId'] }
$http({
  url: '<?php echo base_url(); ?>freelancer/getfreelancerReview',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.userreview = response.data.result;
  }

});
}

$scope.taskcheck = function($event,id)
{
if($event.target.checked == true)
{
  var status = 1;
}
else
{
  var status = 0;
}
var obj = {  logReference : id,logStatus:status }
$http({
  url: '<?php echo base_url(); ?>freelancer/taskRequest',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $.notify("Task Request Successfully Added", "success");
    $scope.getlog($scope.contracts['jobId']);
  }

});
}

$scope.getlog = function (contractId,milestone = null,task = null)
{
//console.log($scope.contracts);
if(milestone)
{
  var  url= '<?php echo base_url(); ?>freelancer/getlog/contract/'+contractId+'/'+milestone;
}
else if(task)
{
  var  url= '<?php echo base_url(); ?>freelancer/getlog/contract/'+contractId+'/'+milestone+'/'+task;
}
else
{
  var  url= '<?php echo base_url(); ?>freelancer/getlog/contract/'+contractId;
}
$http({
  url: url,
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.activity = response.data.result;
    //console.log($scope.activity);
  }

});

}

$scope.contractdetail(<?php if(!empty($contract)){ echo $contract; } ?>);

//$scope.getlog();
//$scope.getreview();
});
// end contract


//// notification
var app8 = angular.module('myApp8', [])

app8.filter('date', function () {
return function (item) {
var dates = new Date(Date.parse(item))
var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
return newDate;
};
});

app8.controller('myCtrt8', function($scope,$window,$http,$interval) {
$scope.notify = [];
$scope.total = 0;
$scope.count = 0;
$scope.page = 1;
$scope.unread = 0;
$scope.noti =[];
$scope.user ='';
$scope.perpage = 10;

$http.get("<?php echo base_url(); ?>freelancer/getsession")
.then(function(response)
{

$scope.user = response.data.userid;
var id = null;
$scope.notification(id,$scope.userid);
});

$scope.notification = function (id = null,userId)
{
var obj = {  page : $scope.page ,id : $scope.user,perpage:$scope.perpage };
if(id )
obj['lastid'] = id;

$http({
  url: '<?php echo base_url(); ?>freelancer/getnotification',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(id == null)
  {
    $scope.notify = response.data.result;
    $scope.total = response.data.pcount;
  }
  else
  {
    $scope.unread = 0;
    if(response.data.result.length != 0)
    {
      for (let i = 0; i < response.data.result.length; i++)
      {

        $scope.notify.unshift(response.data.result[i]);
      }
      $scope.total =	$scope.total + response.data.pcount;
    }
  }

  for(var v in $scope.notify)
  {
    if($scope.notify[v]['notificationStatus'] == 0)
    {
      $scope.unread += $scope.notify[v]['notificationStatus'].length;

    }

  }
  // console.log($scope.unread);

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
    itemsOnPage: 10,
    cssStyle: 'light-theme',
    onPageClick:  function (e) {
      $scope.page  = e;
      $scope.notification();
    }
  });
}
else{
  $("#pagination").html('');
}
}

$scope.singleNotification = function(key,id)
{

var obj = {  id : id }
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/getOneNotification',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  angular.element(".preloader").hide();
  if(response.data.message == "true")
  {
    $scope.notify[key]['notificationStatus'] = 1;
    $scope.noti = response.data.result;
    angular.element("#notification").modal('show');
  }

  //$scope.notification();
});

}

$interval(function(){

$http.get("<?php echo base_url(); ?>account/inc/session.php")
.then(function(response)
{

  $scope.user = response.data.result;
  $scope.notification($scope.notify[0]['notificationId'],$scope.user);
});
},10000);


  $scope.changePerPage = function ($event)
  {
     $scope.perpage = $event.value;
     $scope.page = 1;
     $scope.notification();

  }

$scope.notification();
});
//// notification

///profile

var app9 = angular.module('myApp9', ['ngImgCrop'])

app9.directive('numbersOnly', function() {
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

app9.directive('mydatepicker', function () {
return {
restrict: 'A',
require: 'ngModel',
link: function (scope, element, attrs, ngModelCtrl) {
  element.datepicker({
    dateFormat: 'dd-mm-yy',
    onSelect: function (date) {
      scope.date = date;
      scope.$apply();
    }
  });
}
};
});

app9.directive('yearpicker', function () {
return {
restrict: 'A',
require: 'ngModel',
link: function (scope, element, attrs, ngModelCtrl) {
  element.datepicker({
    dateFormat: 'yy',
    changeMonth: true,
    changeYear: true,
     yearRange: "1980:"+new Date().getFullYear(),
    onSelect: function (date) {
      scope.date = date;
      scope.$apply();
    }
  });
}
};
});

app9.controller('myCtrt9', function($interval,$scope,$window,$http) {

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
$scope.countryCode = '';
$scope.countryClass ='';
$scope.websitevalide = false;
$scope.fbvalide = false;
$scope.twvalide = false;
$scope.livalide = false;
$scope.pivalide = false;
$scope.yovalide = false;
$scope.insvalide = false;
$scope.allcurrency = [];
$scope.myImage='';
$scope.myCroppedImage='';
$scope.myImage='';
$scope.myCroppedImage='';
$scope.selectedService =[];


$scope.getuserservice = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/userservices',
  method: "POST",
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

$scope.datepickerOptions = {
datepickerMode:"'year'",
minMode:"'year'",
minDate:"minDate",
showWeeks:"false",
};

$scope.checkmaxprice = function($event)
{
 if($scope.profile.type == 2)
  {
    $scope.profile.maxPrice = $event.value;
    if(parseInt($scope.profile.minPrice) > parseInt($scope.profile.maxPrice))
    {
     $scope.maxerror = true;
     error = true;
     }
    else
    {
     $scope.maxerror = false;
    }
 }
}

$http({
url: '<?php echo base_url(); ?>freelancer/getprofile',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.profile = response.data.result;
$scope.st = response.data.states;
$scope.ci = response.data.city;
CKEDITOR.instances['about'].setData($scope.profile.about);
if($scope.profile.countryCode)
{
$('.iti__selected-flag').attr("title",$scope.profile.countryCode);
$('.iti__selected-flag .iti__flag').removeClass('iti__us');
$('.iti__selected-flag .iti__flag').addClass($scope.profile.countryClass);
}
 if($scope.profile.logo)
{
  $('#Imagecroped').addClass('removeimageValue');

}
if($scope.profile.company_logo)
{
  $('#logocroped').addClass('removeimageValue');
}

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
var phone = angular.element("#phone").val();
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
var pclass = $('#phone').attr('class');
$scope.countrycode = $('.iti__selected-flag').attr('title');
var cl = $('.iti__flag').attr('class');
var cl = cl.split(' ');
cl = cl['1'];

phone = phone.replace("(", "");
phone = phone.replace(")", "");
phone = phone.replace("-", "");
var phone1 = phone.replace(/\s/g, '');
$scope.profile.rep_ph_num = phone1;

if($scope.profile.name == '' || $scope.profile.phone == '' || $scope.profile.zip == '' || $scope.profile.country == '' || $scope.profile.state == '' || $scope.profile.city == '' || $scope.profile.desig == '' || $scope.profile.year == '')
{
  error = true;
}

// $scope.profile.address2 == '' ||
if($scope.profile.address1 == '' ||  $scope.profile.about == '' || $scope.profile.minPrice == '' || $scope.profile.maxPrice == '' || $scope.profile.c_name =='' || $scope.profile.logo == '' ||  $scope.profile.currency == '' )
{
  error = true;
}

if($scope.profile.type == 2)
{
  if($scope.profile.company_logo == '' )
  {
    error = true;
  }

  if(parseInt($scope.profile.minPrice) > parseInt($scope.profile.maxPrice))
  {
    $scope.maxerror = true;
    error = true;
  }

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
else
{
  $scope.websitevalide = false;

}

if($scope.profile.facebookLink != '')
{
  if(!$scope.profile.facebookLink.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
  {
    error = true;
    $scope.fbvalide = true;
  }
  else
  {
    $scope.fbvalide = false;
  }
}
else
{
  $scope.fbvalide = false;

}

if($scope.profile.twitterLink != '')
{
  if(!$scope.profile.twitterLink.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
  {
    error = true;
    $scope.twvalide = true;
  }
  else
  {
    $scope.twvalide = false;
  }
}
else
{
  $scope.twvalide = false;

}

if($scope.profile.instagramLink != '')
{
  if(!$scope.profile.instagramLink.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
  {
    error = true;
    $scope.insvalide = true;
  }
  else
  {
    $scope.insvalide = false;
  }
}
else
{
  $scope.insvalide = false;

}

if($scope.profile.youtubeLink != '')
{
  if(!$scope.profile.youtubeLink.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
  {
    error = true;
    $scope.yovalide = true;
  }
  else
  {
    $scope.yovalide = false;
  }
}
else
{
  $scope.yovalide = false;

}

if($scope.profile.pinterestLink != '')
{
  if(!$scope.profile.pinterestLink.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
  {
    error = true;
    $scope.pivalide = true;
  }
  else
  {
    $scope.pivalide = false;
  }
}
else
{
  $scope.pivalide = false;

}

if($scope.profile.linkedlnLink != '')
{
  if(!$scope.profile.linkedlnLink.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
  {
    error = true;
    $scope.livalide = true;
  }
  else
  {
    $scope.livalide = false;
  }
}
else
{
  $scope.livalide = false;
}

if(pclass == "form-control phonenumber ng-pristine ng-valid ng-not-empty error11 ng-touched")
{
  return false;
}

if(error == true )
{
  return false;
}

var obj = {  name : $scope.profile.name , zip : $scope.profile.zip ,logo : $scope.profile.logo , rep_ph_num : $scope.profile.rep_ph_num ,country : $scope.profile.country,state : $scope.profile.state ,city : $scope.profile.city,address1 : $scope.profile.address1,address2 : $scope.profile.address2,about : $scope.profile.about,website : $scope.profile.website,skype : $scope.profile.skype,facebookLink : $scope.profile.facebookLink , linkedlnLink : $scope.profile.linkedlnLink ,desig: $scope.profile.desig ,year:$scope.profile.year,c_name: $scope.profile.c_name ,minPrice:$scope.profile.minPrice,maxPrice:$scope.profile.maxPrice,seoTitle:$scope.profile.seoTitle,seoDescription:$scope.profile.seoDescription,twitterLink:$scope.profile.twitterLink,instagramLink :$scope.profile.instagramLink,youtubeLink:$scope.profile.youtubeLink,pinterestLink:$scope.profile.pinterestLink,countryCode:$scope.countrycode,countryClass:cl,currencyId:$scope.profile.currencyId,company_logo:$scope.profile.company_logo };

$http({
  url: '<?php echo base_url(); ?>freelancer/profileupdate',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $.notify("Profile Updated Successfully", "success");
    $interval(callAtInterval, 2000);
       function callAtInterval()
       {
         if($scope.selectedService.length != 0)
         {
        $window.location.href = '<?php echo base_url(); ?>freelancer/profile';
         }
         else if($scope.selectedService.length == 0)
         {
           $window.location.href = '<?php echo base_url(); ?>freelancer/services';
         }
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
var companylogoupload1 = function (evt) {
var file= evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function($scope){
          $scope.myImage= evt.target.result;
        });
      };
      reader.readAsDataURL(file);
      angular.element('#myModal').modal('show');

}

var companyImageupload3 = function (evt) {
var file= evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function($scope){
          $scope.myImage= evt.target.result;
        });
      };
      reader.readAsDataURL(file);
      angular.element('#myModal1').modal('show');

}

angular.element(document.querySelector('#logocroped')).on('change',companylogoupload1);
angular.element(document.querySelector('#Imagecroped')).on('change',companyImageupload3);
$scope.companylogoupload = function () {

// var files =$event.files;
// for (var i = 0; i < files.length; i++) {
//   var f = files[i]
//   var fileName = files[i].name;
//   var filePath = fileName;
//
//   var fileReader = new FileReader();
  // fileReader.onload = (function(e) {
      var logo = $scope.myCroppedImage;
      $scope.myCroppedImage ='';
    jQuery('#logoview1').attr('src',logo);
    jQuery('#headerlogo').attr('src',logo);
    jQuery('#logoview1').show();
    var d = JSON.stringify({ image :  logo });
    $http({
      url: '<?php echo base_url(); ?>freelancer/companylogoupload',
      method: "POST",
      data: d,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      $scope.logo = response.data;
      $scope.profile.company_logo = response.data;
      angular.element('#myModal').modal('hide');

    });

  // });
  //fileReader.readAsDataURL(f);
// }

}
/// logo upload

////company logo upload
$scope.logoupload = function () {

// var files =$event.files;
// for (var i = 0; i < files.length; i++) {
//   var f = files[i]
//   var fileName = files[i].name;
//   var filePath = fileName;
//
//   var fileReader = new FileReader();
//   fileReader.onload = (function(e) {
//     //jQuery('#logoview').show();
var image = $scope.myCroppedImage;
    jQuery('#logoview').attr('src',image);
    jQuery('#logoview').show();

    var d = JSON.stringify({ image :  image });
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
      angular.element('#myModal1').modal('hide');

    });

//   });
//   fileReader.readAsDataURL(f);
// }

}
/// company logo upload

$scope.getuserservice();


});

////profile end

////services start
var app10 = angular.module('myApp10', [])


app10.controller('myCtrt10', function($scope,$window,$http,$interval) {
$scope.industry = [];
$scope.services = [];
$scope.selectedIndustry = [];
$scope.selectedService = [];

$scope.typingLENGTH =800;
$scope.lastTypingTime='';
$scope.typing = false;
$scope.plan = [];
$scope.suggestion = [];
$scope.req = false;
$scope.profile = [];
$scope.department = [];


$http({
url: '<?php echo base_url(); ?>freelancer/getprofile',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.profile = response.data.result;
});


$scope.userplan = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/selectedplan',
  method: "POST",
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


$scope.requestserviceSave = function()
{
$scope.submitr = true;
error = false;
$scope.reqservice = angular.element('#request_ser').val();
$scope.reqIndustry = angular.element('#request_ind').val();

if($scope.reqservice == "" || $scope.reqIndustry == "")
{
  error = true;
  $scope.req = true;
}
else
{
  $scope.req = false;

}
// console.log($scope.req);
// console.log(error);

if(error == true)
{
  return false;
}


var obj = {  service : $scope.reqservice, industry : $scope.reqIndustry  };
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/requestServiceSave',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    $scope.allsuggestion();
    angular.element('#request_ser').val('');
    angular.element('#request_ind').val('');
    $scope.reqservice = '';
    $scope.reqIndustry = '';
    $scope.submitr = false;
    angular.element(".preloader").hide();
    angular.element("#reqSerModal").modal('hide');
    $.notify("Service Successfully Added", "success");
  }
});
}

$scope.getuserservice = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/userservices',
  method: "POST",
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

$http({
  url: '<?php echo base_url(); ?>freelancer/userindustry',
  method: "POST",
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
    // url: '<?php //echo base_url(); ?>client-getservices',
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
// angular.element("#prac_areas_chosen").removeClass('chosen-with-drop chosen-container-active');
//	console.log("dssssss");
// $scope.getservice();

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

var obj = { industryId: $scope.selectedIndustry[key].id  };
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/deleteService',
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
//console.log('addservice');
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
var obj = { serviceId: $scope.selectedService[key].id  };
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/deleteService',
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

var obj = {  service : $scope.selectedService, industry : $scope.selectedIndustry  };
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/saveService',
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
    if($scope.profile.type == 2)
    {
      $interval(callAtInterval, 2000);
         function callAtInterval()
         {
           if($scope.department.length == 0)
           {
          $window.location.href = '<?php echo base_url(); ?>freelancer/departments';
           }
         }
    }
    $scope.getuserIndustry();
    $scope.getuserservice();
  }
});
}


        $scope.getdepartment = function()
        {
          var obj = { page :$scope.page };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getdepartment',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              $scope.department = response.data.result;
            }
            else
            {
              $scope.department = [];
            }
          });
        }


$scope.allsuggestion = function ()
{

var obj = {  page : $scope.page   }

$http({
  url: '<?php echo base_url(); ?>freelancer/getsuggestion',
  method: "POST",
  data:obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.suggestion = response.data.result;

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
      $scope.allsuggestion();
    }
  });
}
}

$scope.allsuggestion();
$scope.userplan();
$scope.getuserIndustry();
$scope.getuserservice();
$scope.getdepartment();

});

//// services end

/////////testimonial test
var app11 = angular.module('myApp11', [])


app11.filter('date', function () {
return function (item) {
var dates = new Date(Date.parse(item))
var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
return newDate;
};
});

app11.controller('myCtrt11', function($scope,$window,$http) {
$scope.logo ='';
$scope.title ='';
$scope.youtube_url='';
$scope.testimonial ='';
$scope.clientname='';
$scope.website ='';
$scope.testimonials = [];
$scope.page =1;
$scope.dkey ='';
$scope.did ='';
$scope.plan = '';
$scope.total = 0;


$scope.userplan = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/selectedplan',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response){

  $scope.plan = response.data.result;
});
}

$scope.savetestimonial = function ()
{
$scope.submittestimonial = true;
var error = false;
$scope.title =  angular.element("#title").val();
$scope.youtube_url = angular.element("#youtube_url").val();
$scope.testimonial = angular.element("#testimonial").val();
$scope.clientname = angular.element("#name").val();
$scope.website = angular.element("#website").val();



if($scope.title == '' ||  $scope.testimonial == '' || $scope.clientname == '' || $scope.website == '' )
{
  error = true;
}
if(error == true)
{
  return false;
}

angular.element(".preloader").show();
var obj = {  testimonialTitle : $scope.title ,testimonialYoutubeUrl : $scope.youtube_url,testimonialDescription  : $scope.testimonial,testimonialClientName  : $scope.clientname , testimonialWebsite  : $scope.website ,testimonialLogo : $scope.logo  };

$http({
  url: '<?php echo base_url(); ?>freelancer/testimonial/save',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.message == "true")
  {
    angular.element(".preloader").hide();
    angular.element("#title").val('');
    angular.element("#youtube_url").val('');
    angular.element("#testimonial").val('');
    angular.element("#name").val('');
    angular.element("#website").val('');
    $scope.logo='';
    $.notify("Testimonial Added Successfully", "success");
  }

});
}

$scope.logoupload = function ($event) {

var files =$event.files;
for (var i = 0; i < files.length; i++) {
  var f = files[i]
  var fileName = files[i].name;
  var filePath = fileName;

  var fileReader = new FileReader();
  fileReader.onload = (function(e) {
    jQuery('.testimonialview').show();
    jQuery('.testimonialview').attr('src',e.target.result);
    var d = JSON.stringify({ image :  e.target.result });
    $http({
      url: '<?php echo base_url(); ?>freelancer/testimonial_logoupload',
      method: "POST",
      data: d,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      $scope.logo = response.data;


    });

  });
  fileReader.readAsDataURL(f);
}

}

$scope.alltestimonial = function ()
{
var obj = {  page : $scope.page }

$http({
  url: '<?php echo base_url(); ?>freelancer/gettestimonial',
  method: "POST",
  data: obj,
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

$scope.delete_confirm = function(key,id)
{
$scope.dkey = key;
$scope.did = id;
angular.element("#confirmDelete").modal('show');
}


$scope.delete_testimonial = function (key,id)
{
var obj = {  id : id }

$http({
  url: '<?php echo base_url(); ?>freelancer/testimonial_delete',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    angular.element("#confirmDelete").modal('hide');
    $.notify("Testimonial Deleted Successfully", "success");
    $scope.page = 1;
    $scope.alltestimonial();

  }

});
}




$scope.testimonial_edit = function (id)
{
var obj = {  id : id  }

$http({
  url: '<?php echo base_url(); ?>freelancer/testimonial_edit',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.edittestimonial = response.data.result;
    $scope.title = $scope.edittestimonial.testimonialTitle;
    $scope.website = $scope.edittestimonial.testimonialWebsite;
    $scope.youtube_url = $scope.edittestimonial.testimonialYoutubeUrl;
    $scope.clientname = $scope.edittestimonial.testimonialClientName;
    $scope.description = $scope.edittestimonial.testimonialDescription;

    if($scope.edittestimonial.testimonialLogo)
    {
      angular.element("#logo").attr('src',"<?php echo base_url(); ?>assets/testimonial_logo/"+$scope.edittestimonial.testimonialLogo);
      angular.element("#logo").show();
    }
    angular.element("#edittestimonial").modal('show');
  }

});
}

$scope.testimonial_update = function()
{
$scope.testsubmit = true;
var error = false;
$scope.title =  angular.element("#title").val();
$scope.youtube_url = angular.element("#url").val();
$scope.testimonial = angular.element("#description").val();
$scope.clientname = angular.element("#clientname").val();
$scope.website = angular.element("#website").val();



if($scope.title == '' ||  $scope.testimonial == '' || $scope.clientname == '' || $scope.website == '' )
{
  error = true;
}
if(error == true)
{
  return false;
}
angular.element(".preloader").show();
var obj = {  testimonialId:$scope.edittestimonial.testimonialId,testimonialTitle : $scope.title ,testimonialYoutubeUrl : $scope.youtube_url,testimonialDescription  : $scope.testimonial,testimonialClientName  : $scope.clientname , testimonialWebsite  : $scope.website ,testimonialLogo : $scope.logo  };

$http({
  url: '<?php echo base_url(); ?>freelancer/testimonial_update',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.message == "true")
  {
    angular.element(".preloader").hide();
    $.notify("Testimonial Updated Successfully", "success");
    $scope.alltestimonial();
    angular.element("#edittestimonial").modal('hide');
  }

});
}


$scope.alltestimonial();
$scope.userplan();


});

/////////testimonial end

// case study
var app12 = angular.module('myApp12', [])


app12.controller('myCtrt12', function($scope,$window,$http) {
$scope.industry = [];
$scope.casestudys = [];
$scope.services = [];
$scope.casestudys = [];
$scope.ind ='';
$scope.ser ='';
$scope.case_title = '';
$scope.case_info ='';
$scope.case_document ='';
$scope.page =1;
$scope.dkey ='';
$scope.did ='';
$scope.total =0;
$scope.plan =[];
$scope.start ='';

$http({
url: '<?php echo base_url(); ?>freelancer/userindustry',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.industry = response.data.industry;
//console.log($scope.industry);
});

$http({
url: '<?php echo base_url(); ?>freelancer/userservices',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.services = response.data.service;

});

$scope.userplan = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/selectedplan',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response){

  $scope.plan = response.data.result;
});
}

$scope.savecasestudy = function ()
{
$scope.submitcasestudy = true;
var error = false;
$scope.ind =  angular.element("#industry").val();
$scope.ser = angular.element("#service").val();
$scope.case_title = angular.element("#case_title").val();
$scope.case_info = angular.element("#case_info").val();


if($scope.ind == '' || $scope.ser == '' || $scope.case_title == '' || $scope.case_info == '' || $scope.case_document == '' )
{
  error = true;
}
if(error == true)
{
  return false;
}

var obj = {  industryId : $scope.ind ,serviceId  : $scope.ser,casestudyTitle  : $scope.case_title,casestudyDocument   : $scope.case_document , casestudyInfo  : $scope.case_info  };
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/casestudySave',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.message == "true")
  {
    $scope.submitcasestudy =false;
    angular.element(".preloader").hide();
    angular.element("#industry").val('');
    angular.element("#service").val('');
    angular.element("#case_title").val('');
    angular.element("#case_info").val('');
    $scope.case_document='';
    angular.element(".document").text('choose file');
    $.notify("Case Study Added Successfully", "success");
    $scope.casestudy();
  }

});
}

$scope.casestudy_edit = function (id)
{
var obj = {  id : id  }

$http({
  url: '<?php echo base_url(); ?>freelancer/case_study_edit',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.editcasestudy = response.data.result;
    angular.element("#editcasestudy").modal('show');
  }

});
}

$scope.casestudy_update = function()
{
$scope.submitcasestudy1 = true;
var error = false;


if($scope.editcasestudy.casestudyTitle == '' || $scope.editcasestudy.industryId == '' ||  $scope.editcasestudy.ServiceId == '' || $scope.editcasestudy.casestudyDocument == '' || $scope.editcasestudy.casestudyInfo == ' ' )
{
  error = true;
}
if(error == true)
{
  return false;
}

angular.element(".preloader").show();
var obj = { casestudyId:$scope.editcasestudy.casestudyId, industryId : $scope.editcasestudy.industryId ,serviceId  : $scope.editcasestudy.ServiceId,casestudyTitle  : $scope.editcasestudy.casestudyTitle,casestudyDocument   : $scope.editcasestudy.casestudyDocument , casestudyInfo  : $scope.editcasestudy.casestudyInfo  };


$http({
  url: '<?php echo base_url(); ?>freelancer/casestudy_update',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.message == "true")
  {
    angular.element(".preloader").hide();
    angular.element("#editcasestudy").modal('hide');

    $.notify("Case Study Updated Successfully", "success");
    $scope.casestudy();
  }

});
}

// document upload
$scope.documentupload = function ($event) {

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
      url: '<?php echo base_url(); ?>freelancer/casestudy_upload',
      method: "POST",
      data: d,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      $scope.case_document = response.data;

    });

  });
  fileReader.readAsDataURL(f);
}

}

$scope.documentupload1 = function ($event) {

var files =$event.files;
for (var i = 0; i < files.length; i++) {
  var f = files[i]
  var fileName = files[i].name;
  var filePath = fileName;

  var fileReader = new FileReader();
  fileReader.onload = (function(e) {
    jQuery('#viewimage').attr('src',e.target.result);
    var d = JSON.stringify({ image :  e.target.result });
    $http({
      url: '<?php echo base_url(); ?>freelancer/casestudy_upload',
      method: "POST",
      data: d,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      $scope.editcasestudy.casestudyDocument = response.data;

    });

  });
  fileReader.readAsDataURL(f);
}

}
// document upload

//get case_study
$scope.casestudy = function ($id)
{
var obj = {  page : $scope.page }

$http({
  url: '<?php echo base_url(); ?>freelancer/getcasestudy',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.casestudys = response.data.result;
  $scope.total = response.data.pcount;
  $scope.start = response.data.start;

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
      $scope.casestudy();
    }
  });
}
}

$scope.delete_confirm = function(key,id)
{
$scope.dkey = key;
$scope.did = id;
angular.element("#confirmDelete").modal('show');
}


$scope.delete_casestudy = function (key,id)
{
var obj = {  id : id }

$http({
  url: '<?php echo base_url(); ?>freelancer/case_study_delete',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    angular.element("#confirmDelete").modal('hide');
    $.notify("Case Study Deleted Successfully", "success");
    $scope.page = 1;
    $scope.casestudy();

  }

});
}
$scope.casestudy();
$scope.userplan();



});

/// case study




/// service pricing
var app13 = angular.module('myApp13', [])


app13.filter('trustAsHtml',['$sce', function($sce) {

return function(text) {

return $sce.trustAsHtml(text);
};
}]);

app13.directive('ckEditor', function () {

return {
require: '?ngModel',
link: function (scope, elm, attr, ngModel) {
  var ck = CKEDITOR.replace(elm[0]);
  if (!ngModel) return;
  ck.on('instanceReady', function () {
    ck.setData(ngModel.$viewValue);
  });
  function updateModel() {
    scope.$apply(function () {
      ngModel.$setViewValue(ck.getData());
    });
  }
  ck.on('change', updateModel);
  ck.on('key', updateModel);
  ck.on('dataReady', updateModel);

  ngModel.$render = function (value) {
    ck.setData(ngModel.$viewValue);
  };
}
};
});

// app13.directive('numbersOnly', function() {
//     return {
//         require: 'ngModel',
//         link: function(scope, element, attrs, modelCtrl) {
//             modelCtrl.$parsers.push(function(inputValue) {
//                 if (inputValue == undefined) return ''
//                 var onlyNumeric = inputValue.replace(/[^0-9]/g, '');
//                 if (onlyNumeric != inputValue) {
//                     modelCtrl.$setViewValue(onlyNumeric);
//                     modelCtrl.$render();
//                 }
//                 return onlyNumeric;
//             });
//         }
//     };
//    });

app13.controller('myCtrt13', function($scope,$window,$http) {
$scope.pricings = [];
$scope.services = [];
$scope.ser ='';
$scope.price = '';
$scope.key ='';
$scope.page =1;
$scope.dkey ='';
$scope.did ='';
$scope.total = 0;
$scope.currencyId = '';
// edit
$scope.ser1 ='';
$scope.price1 = '';
$scope.key1 ='';
$scope.currencyId1 = '';
// edit

$scope.allcurrency = [];
$scope.plan =[];
$scope.editdata= [];
$scope.type = 1;

$http({
url: '<?php echo base_url(); ?>freelancer/userservices',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.services = response.data.service;

});

$http({
url: '<?php echo base_url(); ?>getcurrency',
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

if(response.data.message == "true")
{
  $scope.allcurrency = response.data.result;
}
});

$scope.userplan = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/selectedplan',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response){

  $scope.plan = response.data.result;
});
}

$scope.savepricing = function ()
{
$scope.submitpricing = true;
var error = false;
$scope.ser = angular.element("#service").val();
$scope.price = angular.element("#price").val();
$scope.currencyId = angular.element("#currencyId").val();
$scope.key = CKEDITOR.instances['key'].getData();



if($scope.ser == '' || $scope.price == '' || $scope.key == '' || $scope.currencyId == '')
{
  error = true;
}
if(error == true)
{
  return false;
}

var obj = {  serviceId  : $scope.ser , pricingKeyPoint  : $scope.key,pricingPrice    : $scope.price ,currencyId:$scope.currencyId  };

$http({
  url: '<?php echo base_url(); ?>freelancer/service_pricingSave',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.message == "true")
  {
    angular.element("#service").val('');
    angular.element("#price").val('');
    angular.element("#currencyId").val('');
    // CKEDITOR.instances['key'].setData('');
    $scope.key = '';
    $.notify("Pricing Added Successfully", "success");
    $scope.pricing();
    $scope.userplan();
  }

});
}

//get case_study
$scope.pricing = function ($id)
{
var obj = {  page : $scope.page }

$http({
  url: '<?php echo base_url(); ?>freelancer/getservice_pricing',
  method: "POST",
  data: obj,
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
      $scope.pricing();
    }
  });
}
}


$scope.delete_confirm = function(key,id)
{
$scope.dkey = key;
$scope.did = id;
angular.element("#confirmDelete").modal('show');
}


$scope.delete_pricing = function (key,id)
{
var obj = {  id : id }

$http({
  url: '<?php echo base_url(); ?>freelancer/service_pricing_delete',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    angular.element("#confirmDelete").modal('hide');
    $.notify("Pricing Deleted Successfully", "success");
    $scope.page = 1;
    $scope.pricing();
  }

});
}

$scope.edit = function (id)
{
var obj = {  id : id }

$http({
  url: '<?php echo base_url(); ?>freelancer/service_pricing_edit',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
 if(response.data.message == "true")
 {
  $scope.editdata = response.data.result;
  $scope.type = 2;
  $scope.ser1 =$scope.editdata.serviceId;
  $scope.price1 =$scope.editdata.pricingPrice;
  $scope.key1 =$scope.editdata.pricingKeyPoint;
  $scope.currencyId1 =$scope.editdata.currencyId;

 }
});
}

$scope.update = function ()
{
$scope.submitpricing = true;
var error = false;

$scope.key1 = CKEDITOR.instances['key1'].getData();

if($scope.ser1 == '' || $scope.price1 == '' || $scope.key1 == '' || $scope.currencyId1 == '')
{
  error = true;
}
console.log(error);
if(error == true)
{
  return false;
}

var obj = { pricingId:$scope.editdata.pricingId,  serviceId  : $scope.ser1 , pricingKeyPoint  : $scope.key1,pricingPrice    : $scope.price1 ,currencyId:$scope.currencyId1  };

$http({
  url: '<?php echo base_url(); ?>freelancer/service_pricingUpdate',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.message == "true")
  {
    $.notify("Pricing Updated Successfully", "success");
    $scope.type =1;
    $scope.pricing();
    $scope.userplan();
  }

});
}


$scope.pricing();
$scope.userplan();

});

/// service pricing



/// service pricing
var app14 = angular.module('myApp14',['ngImgCrop'])

app14.directive('mydatepicker', function () {
return {
restrict: 'A',
require: 'ngModel',
link: function (scope, element, attrs, ngModelCtrl) {
  element.datepicker({
    dateFormat: 'dd-mm-yy',
    onSelect: function (date) {
      scope.date = date;
      scope.$apply();
    }
  });
}
};
});

app14.directive('numbersOnly', function() {
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


app14.controller('myCtrt14', function($scope,$window,$http) {
$scope.teams =[];
$scope.services =[];
$scope.allproject = [];
$scope.years =[];
$scope.experience =[];

$scope.name ='';
$scope.designation = '';
$scope.perhour ='';
$scope.image ='';
$scope.email ='';
$scope.status ='';
$scope.access ='';
$scope.phone ='';
$scope.joiningdate ='';
$scope.currency ='';
$scope.countryCode = '';
$scope.countryClass ='';

$scope.skill ='';
$scope.perday ='';
$scope.skype ='';
$scope.phone ='';
$scope.address ='';
$scope.salary ='';

$scope.page =1;
$scope.dkey = '';
$scope.did = '';
$scope.editTeam = '';
$scope.name1 ='';
$scope.paccess = '';
$scope.department = '';
// edit v
$scope.name1 ='';
$scope.designation1 = '';
$scope.hourly1 ='';
$scope.image1 ='';
$scope.access1 ='';
$scope.phone1 ='';
$scope.address1 ='';
$scope.skill1 ='';
$scope.status1 = '';
$scope.perhour1 = '';
$scope.perday1 ='';
$scope.skype1 ='';
$scope.phone1 ='';
$scope.address1 ='';
$scope.salary1 ='';
$scope.currency1 ='';
$scope.department1 ='';
$scope.working = [];
$scope.alldepartment = [];
$scope.myImage='';
$scope.myCroppedImage='';
$scope.perpage = 10;



$http({
url: '<?php echo base_url(); ?>getcurrency',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.allcurrency = response.data.result;

});

$http({
url: '<?php echo base_url(); ?>freelancer/alldepartment',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.alldepartment = response.data.result;

});

$scope.getbank = function ()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/getpaymentmethod',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.success == "true")
  {
    $scope.currency = response.data.result.currencyId;
  }

});
}

$scope.month =  ["January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December"];


var l = new Date().getFullYear();
for (var i = 2010; i <= l; i++)
{
$scope.years.push(i);
}

$scope.ctrl = function()
{

var email = angular.element('#email').val();
$scope.email = email;
if(!email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
{
  $scope.emailvalide = true;
}
else
{
  $scope.emailvalide = false;
}
}



$scope.experienceAdd = function ($event)
{

$scope.experience.push({
  designation : '',
  MonthStart : '',
  YearStart : '',
  MonthEnd : '',
  YearEnd : '',
  description : '',
  company:'',
  working:'1',
  button:''
});

}

$scope.deleteexperience = function ($key)
{
$scope.experience.splice($key,1);
}

$scope.salaryCount = function()
{
$scope.salary = parseInt($scope.salary);
$scope.working.workingDays = parseInt($scope.working.workingDays);
$scope.working.workingHour = parseInt($scope.working.workingHour);
$scope.perday = parseInt(+$scope.salary / +$scope.working.workingDays) ;
$scope.perhour = parseInt(+$scope.perday / +$scope.working.workingHour) ;
angular.element('#perday').val($scope.perday);
angular.element('#perhour').val($scope.perhour);
}

$scope.salaryCount1 = function()
{
$scope.perday1 = parseInt($scope.salary1 / $scope.working.workingDays) ;
$scope.perhour = parseInt($scope.perday / $scope.working.workingHour) ;
}


$http({
url: '<?php echo base_url(); ?>freelancer/userservices',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.services = response.data.service;

});

$http({
url: '<?php echo base_url(); ?>freelancer/getworking',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.working = response.data.result;

});



$scope.saveteam = function ()
{
$scope.submitteam = true;
$scope.emailvalide = false;
var error = false;
$scope.name = angular.element("#name").val();
$scope.designation = angular.element("#designation").val();
$scope.perhour = angular.element("#perhour").val();
$scope.perday = angular.element("#perday").val();
$scope.phone = angular.element("#phone").val();
// $scope.address = angular.element("#address").val();
$scope.currency = angular.element("#currency").val();
$scope.skype = angular.element("#skype").val();
$scope.access = angular.element("#access").val();
$scope.status = angular.element("#status").val();
$scope.email = angular.element("#email").val();
$scope.skill = angular.element("#skill").val();
$scope.project = angular.element("#project").val();
$scope.salary = angular.element("#salary").val();
$scope.department = angular.element("#department").val();
$scope.joiningdate = angular.element("#joiningdate").val();
$scope.skill = angular.element("#skill").val();

var pclass = $('#phone').attr('class');
$scope.countrycode = $('.iti__selected-flag').attr('title');
var cl = $('.iti__flag').attr('class');
var cl = cl.split(' ');
cl = cl['1'];

// || $scope.status == ''
if($scope.name == '' || $scope.designation == '' || $scope.perhour == '' || $scope.image == '' ||  $scope.access == ''  || $scope.email == '')
{
  error = true;
}
// $scope.address == '' ||
if($scope.phone == '' || $scope.skype == '' || $scope.salary == '' ||  $scope.currency == '' || $scope.department == '' || $scope.joiningdate == '' || $scope.skill == '')
{
  error = true;

}
// $scope.perday == '' ||
if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
{
  $scope.emailvalide = true;
}

if(pclass == "form-control phonenumber ng-pristine ng-valid ng-not-empty error11 ng-touched")
{
  return false;
}

if(error == true)
{
  return false;
}

angular.element(".preloader").show();
// ,status : $scope.status
var obj = {  name  : $scope.name , desig  : $scope.designation,logo: $scope.image , maxPrice : $scope.perhour ,rep_ph_num : $scope.phone, address1  : $scope.address,services : $scope.skill, access :$scope.access ,email : $scope.email,project :$scope.project,salary:$scope.salary,perday:$scope.perday,skype:$scope.skype,countryCode:$scope.countrycode,countryClass:cl,currencyId:$scope.currency,department:$scope.department,joiningdate:$scope.joiningdate };


$http({
  url: '<?php echo base_url(); ?>freelancer/teamSave',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  angular.element(".preloader").hide();
  if(response.data.success == "1")
  {
    $scope.access ='';
    $scope.department ='';
    angular.element("#name").val('');
    angular.element("#designation").val('');
    angular.element("#phone").val('');
    angular.element("#address").val('');
    angular.element("#access").val('');
    angular.element("#status").val('');
    angular.element("#email").val('');
    angular.element("#empPic").val('');
    angular.element("#skill").val('');
    angular.element("#perhour").val('');
    angular.element("#perday").val('');
    angular.element("#currency").val('');
    angular.element("#salary").val('');
    angular.element("#skype").val('');
    angular.element("#joiningdate").val('');
    angular.element("#imageview2").hide();
    $scope.image ='';
    $.notify("Team Member Added Successfully", "success");
    $scope.team();
    $scope.submitteam = false;

  }
  else if(response.data.success == "2")
  {
    $.notify("Email Address Register Already", "error");
  }

});
}

//get team
$scope.team = function ($id)
{
var obj = {  page : $scope.page,perpage:$scope.perpage }

$http({
  url: '<?php echo base_url(); ?>freelancer/getteam',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.teams = response.data.result;
  $scope.total = response.data.pcount;

  if($scope.page == 1)
  $scope.pagination($scope.total);
});
}

$scope.resendEmail = function (id)
{
var obj = {  id : id }
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/teamResend',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  angular.element(".preloader").hide();
  if(response.data.message =="true")
  {
    $.notify("Email Sent Successfully", "success");

  }
});
}



$scope.pagination = function ($event)
{
if($scope.total > $scope.perpage)
{
  $('#pagination').pagination({
    items: $event,
    itemsOnPage: 10,
    cssStyle: 'light-theme',
    onPageClick:  function (e) {
      $scope.page  = e;
      $scope.team();
    }
  });
}
}

$scope.delete_confirm = function(key,id)
{
$scope.dkey = key;
$scope.did = id;
angular.element("#confirmDelete").modal('show');
}

$scope.delete_team = function (key,id)
{
var obj = {  id : id }

$http({
  url: '<?php echo base_url(); ?>freelancer/team_delete',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    angular.element("#confirmDelete").modal('hide');
    $.notify("Employee Deleted Successfully", "success");
    $scope.page  = 1;
    $scope.team();
  }

});
}

$scope.teamStatus = function (st,key,id)
{
var obj = {  id : id , status : st }

$http({
  url: '<?php echo base_url(); ?>freelancer/teamStatus',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $.notify("Successfully Changed Status", "success");
    $scope.teams[key]['is_active'] = st;
  }

});
}

// edit

$scope.edit_team = function (id)
{
var obj = {  id : id  }

$http({
  url: '<?php echo base_url(); ?>freelancer/editteam',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.editTeam = response.data.result;
    $scope.name1 = $scope.editTeam.name;
    $scope.designation1 = $scope.editTeam.desig;
    angular.element("#teamviewimg").attr('src',"<?php echo base_url(); ?>assets/client_images/"+$scope.editTeam.logo);

    $scope.id = $scope.editTeam.u_id;
    $scope.access1 = $scope.editTeam.access;
    $scope.phone1 = $scope.editTeam.rep_ph_num;
    $scope.address1 = $scope.editTeam.address1;
    $scope.salary1 = $scope.editTeam.salary;
    $scope.perday1 = $scope.editTeam.perday;
    $scope.perhour1 = $scope.editTeam.maxPrice;
    $scope.skill1 = $scope.editTeam.servicesId;
    $scope.skype1 = $scope.editTeam.skype;
    $scope.status1 = $scope.editTeam.is_active;
    $scope.currency1 = $scope.editTeam.currencyId;
    $scope.department1 = $scope.editTeam.department;
    $scope.joiningdate1 = $scope.editTeam.joiningdate;
    if($scope.editTeam.experience.length != 0)
    {
      for(var r in $scope.editTeam['experience'])
      {

        var ex = {};
        ex['designation'] = $scope.editTeam['experience'][r]['experienceDesignation'];
        ex['MonthStart'] = $scope.editTeam['experience'][r]['experienceMonthStart'];
        ex['YearStart'] = $scope.editTeam['experience'][r]['experienceYearStart'];
        ex['MonthEnd'] = $scope.editTeam['experience'][r]['experienceMonthEnd'];
        ex['YearEnd'] = $scope.editTeam['experience'][r]['experienceYearEnd'];
        ex['description'] = $scope.editTeam['experience'][r]['experienceDescription'];
        ex['company'] = $scope.editTeam['experience'][r]['experienceCompany'];
        ex['working'] = $scope.editTeam['experience'][r]['experienceCurrentlyWorking'];
        $scope.experience.push(ex);
      }
      // console.log($scope.experience);
    }

    angular.element("#editTeam").modal('show');
  }

});
}

$scope.accesschange = function()
{
var a = angular.element("#access").val();
if(a == '2')
{
  $scope.paccess =1;
}
}

$scope.updateteam = function (id)
{
$scope.updatesubmit = true;
var error = false;
$scope.joiningdate1 = angular.element('#joiningdate1').val();
if($scope.name1 == '' || $scope.designation1 == '' || $scope.perhour1 == ''   || $scope.access1 == '' || $scope.skill1 == '' || $scope.status1 == '' )
{
  error = true;
}

if($scope.phone1 == '' || $scope.address1 == '' || $scope.skype1 == '' || $scope.salary1 == '' || $scope.perday1 == '' || $scope.currency1 == '' || $scope.department1 =='' || $scope.joiningdate1 == '')
{
  error = true;
}

if($scope.experience.length != 0)
{
 for(var a in $scope.experience)
{
  if($scope.experience[a].designation == '' || $scope.experience[a].MonthStart == '' || $scope.experience[a].YearStart == '' || $scope.experience[a].description == '' || $scope.experience[a].company == '')
  {
    error = true;
  }
}
}

if(error == true)
{
  return false;
}

angular.element(".preloader").show();
var obj = {  name  : $scope.name1 , desig  : $scope.designation1,logo : $scope.image , maxPrice : $scope.perhour1 ,services : $scope.skill1, access :$scope.access1,id:$scope.editTeam.u_id,status:$scope.status1,salary:$scope.salary1,perday:$scope.perday1,skype:$scope.skype1,address1:$scope.address1,department:$scope.department1 ,currencyId:$scope.currency1,experience:$scope.experience,joiningdate:$scope.joiningdate1};
$http({
  url: '<?php echo base_url(); ?>freelancer/updateteam',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  angular.element(".preloader").hide();
  angular.element("#editTeam").modal('hide');
  if(response.data.message == "true")
  {

    $.notify("Employee Updated Successfully", "success");
    $scope.team();
  }


});

}

// $scope.selectproject = function(id)
// {
// 	$scope.project.push(id);
// 	console.log($scope.project);
// }
////edit
// image upload
$scope.imageupload = function ($event) {

var files =$event.files;
for (var i = 0; i < files.length; i++) {
  var f = files[i]
  var fileName = files[i].name;
  var filePath = fileName;

  var fileReader = new FileReader();
  fileReader.onload = (function(e) {
    jQuery('#teamviewimg').attr('src',e.target.result);
    var d = JSON.stringify({ image :  e.target.result });
    $http({
      url: '<?php echo base_url(); ?>freelancer/team_imageupload',
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

$scope.imageupload11 = function () {

      var ab = $scope.myCroppedImage;
      jQuery('#imageview2').show();
      jQuery('#imageview2').attr('src',ab);
       var d = JSON.stringify({ image :  ab });
    $http({
      url: '<?php echo base_url(); ?>freelancer/team_imageupload',
      method: "POST",
      data: d,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      angular.element('#myModal').modal('hide');

      $scope.image = response.data;



    });
}
// image upload

var companylogoupload1 = function (evt) {
var file= evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function($scope){
          $scope.myImage= evt.target.result;
        });
      };
      reader.readAsDataURL(file);
      angular.element('#myModal').modal('show');

}
angular.element(document.querySelector('#logocroped')).on('change',companylogoupload1);


///get project
$scope.getActiveContract = function (id)
{
$http({
  url: '<?php echo base_url(); ?>freelancer/getActiveContract',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.allproject = response.data.result;
  }


});

}

$scope.changePerPage = function ($event)
{
   $scope.perpage = $event.value;
   $scope.page = 1;
   $scope.team();

}
/// get project

$scope.team();
$scope.getbank();
$scope.getActiveContract();

});

/// team
// password update

var app15 = angular.module('myApp15', [])

app15.controller('myCtrt15', function($scope,$window,$http) {
$scope.pass = '';
$scope.cpass = '';
$scope.currentpass = '';
$scope.email = '';
$scope.oemail = '';
$scope.cemail = '';
$scope.type = 1;
$scope.account = '';
$scope.invoice = '';
$scope.paypal = '';
$scope.currency = '';
$scope.zone = '';
$scope.allcurrency = [];
$scope.allzones = [];



$http({
url: '<?php echo base_url(); ?>getcurrency',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.allcurrency = response.data.result;

});


$http({
url: '<?php echo base_url(); ?>freelancer/getzones',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.allzones = response.data.result;

});

$scope.ctrl = function()
{
var email = angular.element('#email').val();
if(!email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
{
  $scope.emailvalide = true;
}
else
{
  $scope.emailvalide = false;
}
}

$scope.ctrl1 = function()
{
var oemail = angular.element('#oemail').val();
if(!oemail.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
{
  $scope.emailvalide1 = true;
}
else
{
  $scope.emailvalide1 = false;
}
}

$scope.ctrl2 = function()
{
var cemail = angular.element('#cemail').val();
if(!cemail.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
{
  $scope.emailvalide2 = true;
}
else
{
  $scope.emailvalide2 = false;
}
}

$scope.getbank = function ()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/getpaymentmethod',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.success == "true")
  {
    $scope.account = response.data.result.bankdetail;
    $scope.paypal = response.data.result.paypal;
    $scope.invoice = response.data.result.invoice;
    $scope.currency = response.data.result.currencyId;
    $scope.zone = response.data.result.zone;
  }

});
}

$scope.passupdate = function ()
{
$scope.submitpass = true;
var error = false;
$scope.pass = angular.element("#pass").val();
$scope.cpass = angular.element("#cpass").val();
$scope.currentpass = angular.element("#currentpass").val();


if($scope.pass == '' || $scope.cpass == '' || $scope.currentpass == '')
{
  error = true;
}


if($scope.pass != $scope.cpass)
{
  error = true;
}


if($scope.pass.length < 6)
{
  error = true;
}


if(error == true)
{
  return false;
}

var obj = {  pass  : $scope.pass ,currentpass:$scope.currentpass  };

$http({
  url: '<?php echo base_url(); ?>freelancer/password_update',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.message == "true")
  {
    angular.element("#currentpass").val('');
    angular.element("#pass").val('');
    angular.element("#cpass").val('');
    $.notify("Password Update Successfully", "success");

  }
  else if(response.data.error == "true")
  {
    $.notify("Current password is Not Matched", "error");

  }

});
}

// email
$scope.emailupdate = function()
{
$scope.submitpass1 = true;

$scope.emailvalide = false;
$scope.emailvalide1 = false;
$scope.emailvalide2 = false;
var error = false;
$scope.email = angular.element("#email").val();
$scope.oemail = angular.element("#oemail").val();
$scope.cemail = angular.element("#cemail").val();

if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
{
  error = true;
  $scope.emailvalide = true;
}

if(!$scope.oemail.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
{
  error = true;
  $scope.emailvalide1 = true;

}

if(!$scope.cemail.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
{
  error = true;
  $scope.emailvalide2 = true;

}


if($scope.email == '' || $scope.cemail == ''  || $scope.oemail == '')
{
  error = true;
}

if($scope.email != $scope.cemail)
{
  return false;
}


if(error == true)
{
  return false;
}

var m = JSON.stringify({ email : $scope.email ,currentemail : $scope.oemail });

angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/changeemail',
  method: "POST",
  data: m,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();

  if(response.data.success == "1")
  {
    $.notify("Email is changed Successfully", "success");
    angular.element("#email").val('');
    angular.element("#cemail").val('');
    angular.element("#oemail").val('');
  }
  else if(response.data.success == "2")
  {
    $.notify("Email is Register Already.", "error");
  }
  else if(response.data.success == "0")
  {
    $.notify("Current Email is Not Matched", "error");
  }
  else if(response.data.error =="true")
  {
    $.notify("Email is Not Update","error");
  }

});



}
// email

// bank detail
$scope.bankdetail = function ()
{
$scope.submitbank = true;
var error = false;
  if($scope.currency == '' || $scope.zone == '')
  {
    error = true;

  }
  if(error == true)
  {
    return false;
  }
var obj = {  bankdetail  : $scope.account,paypal:$scope.paypal,invoice:$scope.invoice,currencyId:$scope.currency,zone:$scope.zone   };

$http({
  url: '<?php echo base_url(); ?>freelancer/paymentmethodupdate',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.success == "true")
  {
    $.notify("Payment Method Update Successfully", "success");

  }

});
}
// bank detail

  $scope.getbank();

});

// password update

//service information
var app16 = angular.module('myApp16', [])


app16.directive('ckEditor', function () {

return {
require: '?ngModel',
link: function (scope, elm, attr, ngModel) {
  var ck = CKEDITOR.replace(elm[0]);
  if (!ngModel) return;
  ck.on('instanceReady', function () {
    ck.setData(ngModel.$viewValue);
  });
  function updateModel() {
    scope.$apply(function () {
      ngModel.$setViewValue(ck.getData());
    });
  }
  ck.on('change', updateModel);
  ck.on('key', updateModel);
  ck.on('dataReady', updateModel);

  ngModel.$render = function (value) {
    ck.setData(ngModel.$viewValue);
  };
}
};
});

app16.controller('myCtrt16', function($scope,$window,$http) {
$scope.serviceinfo = [];



$scope.getserviceinfo = function ()
{

$http({
  url: '<?php echo base_url(); ?>freelancer/getservice_info',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    $scope.serviceinfo = response.data.result;

  }

});

}

$scope.submitserviceInfo = function ()
{

$scope.infoSubmit = true;
var error = true;

for( var res in $scope.serviceinfo)
{

  if($scope.serviceinfo[res]['description'] && $scope.serviceinfo[res]['description'] != '' )
  {
    error = false;
  }
}


if(error == true)
{
  return false;
}

var m = JSON.stringify({ serinfo : $scope.serviceinfo });
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/service_infoSave',
  method: "POST",
  data: m,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();

  if(response.data.message == "true")
  {
    $.notify("Service Description Successfully Added", "success");
    $scope.getserviceinfo();
  }


});

}

$scope.getserviceinfo();
});
//// service information


var app17 = angular.module('myApp17', [])

app17.filter('date', function () {
return function (item) {
var dates = new Date(Date.parse(item))
var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
return newDate;
};
});

app17.filter('capitalize', function() {
return function(input) {
return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
}
});

app17.controller('myCtrt17', function($scope,$window,$http) {

$scope.request = [];
$scope.page = 1;
$scope.plan = [];
$scope.userId = '';
$scope.userType = '';
$scope.username = '';
$scope.start = '';



$http.get("<?php echo base_url(); ?>freelancer/getsession")
.then(function(response)
{
$scope.userId = response.data.userid;
$scope.userType = response.data.type;
$scope.username = response.data.name;


});


$scope.userplan = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/selectedplan',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response){

  $scope.plan = response.data.result;
});
}




$scope.getrequest = function ()
{
var obj = {  page : $scope.page }
$http({
  url: '<?php echo base_url(); ?>freelancer/getrequest',
  method: "POST",
  data:obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  $scope.request = response.data.result;
  $scope.start = response.data.start;
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
      $scope.getrequest();
    }
  });
}
}

$scope.getrequest();
$scope.userplan();

});

/// end request

/// team member profileImg
var app18 = angular.module('myApp18',['ngImgCrop'])

app18.directive('mydatepicker', function () {
return {
  restrict: 'A',
  require: 'ngModel',
  link: function (scope, element, attrs, ngModelCtrl) {
    element.datepicker({
      dateFormat: 'dd-mm-yy',
       changeMonth: true,
       changeYear: true,
      // minDate: 0,
      yearRange: "1950:2020",
      onSelect: function (date) {
        scope.date = date;

        scope.$apply();
      }
    });
  }
};
});
app18.controller('myCtrt18', function($scope,$window,$http,$interval) {
$scope.profile = [];
$scope.experience =[];
$scope.activity ='';
$scope.other ='';
$scope.refservices = [];
$scope.services =[];
$scope.years =[];
$scope.image ='';
$scope.dateofbirth ='';
//$scope.certificate ='';
$scope.name ='';
$scope.designation ='';
$scope.rep_ph_num ='';
$scope.address ='';
$scope.about ='';
$scope.maritalStatus='';
$scope.countrycode ='';
$scope.myImage='';
$scope.myCroppedImage='';
$scope.month =  ["January", "February", "March", "April", "May", "June",
"July", "August", "September", "October", "November", "December"];


var l = new Date().getFullYear();
for (var i = 2010; i <= l; i++)
{
$scope.years.push(i);
}



$scope.experience.push({
designation : '',
MonthStart : '',
YearStart : '',
MonthEnd : '',
YearEnd : '',
description : '',
company:'',
working:'1',
button:''
});

$scope.experienceAdd = function ($event)
{

$scope.experience.push({
  designation : '',
  MonthStart : '',
  YearStart : '',
  MonthEnd : '',
  YearEnd : '',
  description : '',
  company:'',
  working:'',
  button:''
});

}

$scope.deleteexperience = function ($key)
{
$scope.experience.splice($key,1);
}

$http({
url: '<?php echo base_url(); ?>getcurrency',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.allcurrency = response.data.result;

});

$scope.skills = function($event)
{
var text = angular.element($event).val();
var m = JSON.stringify({ name : text });
$http({
  url: '<?php echo base_url(); ?>freelancer/serviceSearch',
  method: "POST",
  data: m,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.refservices = response.data.result;
  }


});
}

$scope.addservices = function (name,id)
{
   var obj ={};
   obj['name'] = name;
   obj['id'] = id;
   var match = false;

for(var v in $scope.services)
{
  if($scope.services[v]['id'] == obj['id'] )
  {
    match = true;
  }
}
  if(!match)
  {
   $scope.services.push(obj);
   angular.element('#skills').val('');
   $scope.refservices = [];
  }
}

$scope.deleteservice = function (key)
{
$scope.services.splice(key,1);
}


$scope.getuserprofile = function ()
{

$http({
  url: '<?php echo base_url(); ?>freelancer/getuserprofile',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    $scope.profile = response.data.result;
    $scope.profile.other = $scope.profile['activityType'];

    if($scope.profile.countryCode)
    {
    $('.iti__selected-flag').attr("title",$scope.profile.countryCode);
    $('.iti__selected-flag .iti__flag').removeClass('iti__us');
    $('.iti__selected-flag .iti__flag').addClass($scope.profile.countryClass);
    }

    if($scope.profile.logo)
    {
      $('#logocroped').addClass('removeimageValue');
    }

    for(var r in $scope.profile['services'])
    {
      var obj = {};
      obj['id'] = $scope.profile['services'][r]['id'];
      obj['name'] = $scope.profile['services'][r]['service'];

      $scope.services.push(obj);

    }
    $scope.experience = [];
    for(var r in $scope.profile['experience'])
    {

      var ex = {};
      ex['designation'] = $scope.profile['experience'][r]['experienceDesignation'];
      ex['MonthStart'] = $scope.profile['experience'][r]['experienceMonthStart'];
      ex['YearStart'] = $scope.profile['experience'][r]['experienceYearStart'];
      ex['MonthEnd'] = $scope.profile['experience'][r]['experienceMonthEnd'];
      ex['YearEnd'] = $scope.profile['experience'][r]['experienceYearEnd'];
      ex['description'] = $scope.profile['experience'][r]['experienceDescription'];
      ex['company'] = $scope.profile['experience'][r]['experienceCompany'];
      ex['working'] = $scope.profile['experience'][r]['experienceCurrentlyWorking'];
      $scope.experience.push(ex);
    }
  }

});
}

$scope.profileupdate = function ()
{

$scope.infoSubmit = true;
var error = false;
var phone = angular.element('#phone').val();
$scope.profile.dateofbirth = angular.element('#dateofbirth').val();
$scope.profile.marriageAnniversary = angular.element('#marriageAnniversary').val();
$scope.profile.about = CKEDITOR.instances['about'].getData();
var pclass = $('#phone').attr('class');
$scope.countrycode = $('.iti__selected-flag').attr('title');
var cl = $('.iti__flag').attr('class');
var cl = cl.split(' ');
cl = cl['1'];


phone = phone.replace("(", "");
phone = phone.replace(")", "");
phone = phone.replace("-", "");
var phone1 = phone.replace(/\s/g, '');
$scope.profile.rep_ph_num = phone1;


if($scope.profile.other == 2)
{
  $scope.activity = angular.element('#achivment').val();
  if($scope.activity == '')
  {
    error = true;
  }
}

if($scope.profile.maritalStatus == 2)
{
  if($scope.profile.marriageAnniversary == '')
  {
    error =true;
  }
}
if($scope.profile.name =='' || $scope.profile.desig == "" || $scope.profile.rep_ph_num == '' || $scope.profile.address == "" || $scope.profile.about == '' || $scope.services.lenth == 0 || $scope.profile.dateofbirth == '' ||  !$scope.profile.maritalStatus || $scope.profile.logo == '' || $scope.profile.address1 == '' || $scope.profile.other == '')
{
  error = true;
}

for(var a in $scope.experience)
{
  if($scope.experience[a].designation == '' || $scope.experience[a].MonthStart == '' || $scope.experience[a].YearStart == '' || $scope.experience[a].description == '' || $scope.experience[a].company == '')
  {
    error = true;
  }
}

if(pclass == "numberonly form-control ng-pristine ng-valid ng-not-empty error11 ng-touched")
{
  return false;
}

if(error == true)
{
  return false;
}


var m = JSON.stringify({ name  : $scope.profile.name,logo :$scope.profile.logo,desig: $scope.profile.desig ,rep_ph_num  : $scope.profile.rep_ph_num ,address1 : $scope.profile.address1,about : $scope.profile.about,experience:$scope.experience,services:$scope.services,activityType:$scope.other,activity : $scope.activity,countryCode:$scope.countrycode,countryClass:cl,dateofbirth:$scope.profile.dateofbirth,maritalStatus:$scope.profile.maritalStatus,marriageAnniversary:$scope.profile.marriageAnniversary });
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/teamProfileUpdate',
  method: "POST",
  data: m,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();

  if(response.data.message == "true")
  {
    $.notify("Profile Updated Successfully", "success");
    //$scope.getserviceinfo();
    $interval(callAtInterval, 2000);
       function callAtInterval()
       {
        $window.location.href = '<?php echo base_url(); ?>freelancer/team_profile';
       }
  }


});

}

$scope.uploadcertificate = function ($event) {

var files =$event.files;
for (var i = 0; i < files.length; i++) {
  var f = files[i]
  var fileName = files[i].name;
  var filePath = fileName;

  var fileReader = new FileReader();
  fileReader.onload = (function(e) {
    var d = JSON.stringify({ image :  e.target.result });
    $http({
      url: '<?php echo base_url(); ?>freelancer/team_certificate',
      method: "POST",
      data: d,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      $scope.activity = response.data;

    });

  });
  fileReader.readAsDataURL(f);
}

}

$scope.uploadImage = function ($event) {

// var files =$event.files;
// for (var i = 0; i < files.length; i++) {
//   var f = files[i]
//   var fileName = files[i].name;
//   var filePath = fileName;
//
//   var fileReader = new FileReader();
//   fileReader.onload = (function(e) {
var image = $scope.myCroppedImage;
jQuery('#logoview').attr('src',image);

    var d = JSON.stringify({ image :  image });
    $http({
      url: '<?php echo base_url(); ?>freelancer/team_imageupload',
      method: "POST",
      data: d,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      $scope.profile.logo = response.data;
      angular.element('#myModal').modal('hide');

    });

//   });
//   fileReader.readAsDataURL(f);
// }

}

var companylogoupload1 = function (evt) {
var file= evt.currentTarget.files[0];
      var reader = new FileReader();
      reader.onload = function (evt) {
        $scope.$apply(function($scope){
          $scope.myImage= evt.target.result;
        });
      };
      reader.readAsDataURL(file);
      angular.element('#myModal').modal('show');

}
angular.element(document.querySelector('#logocroped')).on('change',companylogoupload1);


$scope.getuserprofile();
});
/// team

///getportfolio
var app19 = angular.module('myApp19', [])

app19.filter('date', function () {
return function (item) {
var dates = new Date(Date.parse(item))
var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
return newDate;
};
});


app19.filter('trustAsHtml',['$sce', function($sce) {

return function(text) {

return $sce.trustAsHtml(text);
};
}]);

app19.controller('myCtrt19', function($scope,$window,$http) {

$scope.portfolio = [];
$scope.page = 1;
$scope.services =[];
$scope.title ='';
$scope.description ='';
$scope.website ='';
$scope.image ='';
$scope.id ='';
$scope.key='';
$scope.editportfolio = [];
$scope.plan = [];
$scope.total = 0;

$scope.userplan = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/selectedplan',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response){

  $scope.plan = response.data.result;
});
}

$scope.getportfolio = function ()
{
var obj = {  page : $scope.page }
$http({
  url: '<?php echo base_url(); ?>freelancer/getportfolio',
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
      $scope.getportfolio();
    }
  });
}
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
      url: '<?php echo base_url(); ?>freelancer/portfolioImage',
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

$scope.skills = function($event)
{
var text = angular.element($event).val();
var m = JSON.stringify({ name : text });
$http({
  url: '<?php echo base_url(); ?>freelancer/serviceSearch',
  method: "POST",
  data: m,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.refservices = response.data.result;
  }


});
}

$scope.addservices = function (name,id)
{
var obj ={};
obj['name'] = name;
obj['id'] = id;

var match = false;
for(var v in $scope.services)
{
  if($scope.services[v]['id'] == obj['id'] )
  {
    match = true;
  }

}

if(!match)
{
  $scope.services.push(obj);
  angular.element('#skills').val('');
  $scope.refservices = [];
}
}

$scope.deleteservice = function (key)
{
$scope.services.splice(key,1);
}

$scope.portfolioSave = function()
{
$scope.submitport = true;
var error = false;
$scope.title = angular.element('#title').val();
$scope.website = angular.element('#website').val();
$scope.description = CKEDITOR.instances['description'].getData();


if($scope.title =='' && $scope.description == '' && $scope.website == ''  && $scope.image == '' && $scope.services.length == 0)
{
  error = true;
}

if(error == true)
{
  return false;
}

var m = JSON.stringify({ portfolioTitle  : $scope.title,portfolioDescription :$scope.description,portfolioImage: $scope.image ,portfolioWebsite:$scope.website,services : $scope.services  });
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/portfolioSave',
  method: "POST",
  data: m,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();

  if(response.data.message == "true")
  {
    $scope.submitport = false;
    $.notify("Portfolio Added Successfully", "success");
    angular.element('#portfolio').modal('hide');
    angular.element('#title').val('');
    angular.element('#website').val('');
    $scope.services = [];
    $scope.image = '';
    CKEDITOR.instances['description'].setData('');
    angular.element('.image').val('');
    $scope.getportfolio();

  }


});

}

$scope.delete_confirm = function(key,id)
{
$scope.dkey = key;
$scope.id = id;
angular.element("#confirmDelete").modal('show');
}

$scope.delete_portfolio = function (key,id)
{
var obj = {  id : id }

$http({
  url: '<?php echo base_url(); ?>freelancer/portfolioDelete',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    angular.element("#confirmDelete").modal('hide');
    $.notify("Team Member Deleted Successfully", "success");
    $scope.page  = 1;
    $scope.getportfolio();
  }

});
}

$scope.editPortfolio = function(id)
{
var obj = {  id : id }
$http({
  url: '<?php echo base_url(); ?>freelancer/portfolioedit',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.editportfolio = response.data.result;
    $scope.title = $scope.editportfolio.portfolioTitle;
    $scope.website = $scope.editportfolio.portfolioWebsite;
    CKEDITOR.instances['descriptionedit'].setData($scope.editportfolio.portfolioDescription);
    $scope.services = [];

    for(var r in $scope.editportfolio['services'])
    {
      var obj ={};
      obj['name'] = $scope.editportfolio['services'][r]['service'];
      obj['id']  = $scope.editportfolio['services'][r]['id'];
      $scope.services.push(obj);
      //console.log($scope.services);
    }
    angular.element("#editportfolio").modal('show');
  }

});

}

$scope.portfolioUpdate = function()
{
$scope.submitport = true;
var error = false;
$scope.title = angular.element('#title').val();
$scope.website = angular.element('#website').val();
$scope.description = CKEDITOR.instances['descriptionedit'].getData();


if($scope.title =='' && $scope.description == '' && $scope.website == ''   && $scope.services.length == 0)
{
  error = true;
}

if(error == true)
{
  return false;
}

var m = JSON.stringify({ portfolioId:$scope.editportfolio.portfolioId,portfolioTitle  : $scope.title,portfolioDescription :$scope.description,portfolioImage: $scope.image ,portfolioWebsite:$scope.website,services : $scope.services  });
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/portfolioupdate',
  method: "POST",
  data: m,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();

  if(response.data.message == "true")
  {
    $.notify("Portfolio Updated Successfully", "success");
    angular.element('#editportfolio').modal('hide');
    $scope.getportfolio();
    $scope.services = [];

  }


});

}

$scope.userplan();
$scope.getportfolio();
});


//endgetportfolio

// account update
var app20 = angular.module('myApp20', [])
app20.controller('myCtrt20', function($scope,$window,$http) {

$scope.accounts = [];
$scope.email ='';



$scope.getaccount = function ()
{

$http({
  url: '<?php echo base_url(); ?>freelancer/getaccount',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  $scope.accounts = response.data.result;
  $scope.email = $scope.accounts.accountEmail;

});
}


$scope.Accountupdate = function()
{
$scope.submitacc = true;
var error = false;
$scope.email = angular.element('#email').val();

if($scope.email =='' )
{
  error = true;
}

if(error == true)
{
  return false;
}

var m = JSON.stringify({ accountEmail:$scope.email  });
angular.element(".preloader").show();
$http({
  url: '<?php echo base_url(); ?>freelancer/accountUpdate',
  method: "POST",
  data: m,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();

  if(response.data.message == "true")
  {
    $.notify("Account Updated Successfully", "success");

  }


});

}

$scope.getaccount();
});
///account update

// proposal

var app21 = angular.module('myApp21', [])

app21.filter('underscoreless', function () {
return function (input) {
//console.log(input);
return input.split(' ').join('-');

};
});

app21.filter('trustAsHtml',['$sce', function($sce) {

return function(text) {

return $sce.trustAsHtml(text);
};
}]);

app21.controller('myCtrt21', function($scope,$window,$http) {

$scope.page = 1;
$scope.proposal = [];
$scope.detail =[];
$scope.total = 0;


$scope.getproposal = function ($id)
{
var obj = {  page : $scope.page }

$http({
  url: '<?php echo base_url(); ?>freelancer/getproposal',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.proposal = response.data.result;
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
      $scope.getproposal();
    }
  });
}
}

$scope.proposalDetail = function(id)
{
var obj = {  id : id }

$http({
  url: '<?php echo base_url(); ?>freelancer/getproposaldetail',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    $scope.detail = response.data.result;
    angular.element('#proposalDetail').modal('show');
  }
});
}

$scope.getproposal();
});

///proposal endmy

// support chat


var app22 = angular.module('myApp22',['luegg.directives'])

app22.filter('time', function () {

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


app22.filter('date', function () {
return function (item) {
const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
"Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
];
var dates = new Date(Date.parse(item))
var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ',' + dates.getFullYear();
return newDate;
};
});

app22.filter('trustAsHtml',['$sce', function($sce) {

return function(text) {

return $sce.trustAsHtml(text);
};
}]);

app22.directive('numbersOnly', function() {
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



app22.controller('myCtrt22', function($scope,$window,$http,$interval) {
$scope.glued = true;


$scope.messages = [];

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
$scope.adminname ="Support team";

var socket = io('https://top-seo-sockets.herokuapp.com');
//var socket = io('https://top-seo-sockets.herokuapp.com');

$scope.getsessiondata = function()
{
$http.get("<?php echo base_url(); ?>freelancer/getsession")
.then(function(response)
{
  $scope.userId = response.data.userid;
  $scope.username = response.data.name;
  $scope.userimage = response.data.image;
  $scope.socketjoinchat();
  //$scope.getunread();
});
}

$scope.socketjoinchat = function (id)
{
socket.emit('join-chat', { senderId: '<?php echo $this->session->userdata['clientloggedin']['id']; ?>',receiverId : $scope.adminId });
$scope.roomId = 'Room_'+$scope.userId+'_'+$scope.adminId;
$scope.getchat($scope.roomId);
$scope.statusupdate();
}

socket.on('messages', function(msg)
{

if(!$scope.messages[msg['MSG_ROOMID']])
$scope.messages[msg['MSG_ROOMID']] = [];
$scope.messages[msg['MSG_ROOMID']].push(msg);

$scope.$apply();

});

socket.on('typing', function(data)
{
//console.log(data);

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

if (!$scope.typing)
{
  $scope.typing = true;
  $scope.statusupdate();
  socket.emit('startTyping', { roomId:$scope.roomId,sendername:$scope.username });
}

$scope.lastTypingTime = (new Date()).getTime();

$interval(function()
{

  var typingTimer = (new Date()).getTime();
  var timeDiff    = typingTimer - $scope.lastTypingTime;
  if (timeDiff   >= $scope.typingLENGTH && $scope.typing) {
    //console.log('stopeed');
    socket.emit('stopTyping', { roomId:$scope.roomId,sendername:$scope.username });
    $scope.t = 0;

    $scope.typing = false;
  }
},$scope.typingLENGTH);
}



$scope.sendmessage = function()
{
error = false;

var msgtext = angular.element('.msgtext').val();

if($scope.userId =='' )
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
socket.emit('message', { MSG_SENTBYNAME:$scope.username,MSG_SENTBYIMAGE:$scope.userimage, MSG_SENTBY: '<?php echo $this->session->userdata['clientloggedin']['id']; ?>',MSG_SENTTONAME:$scope.adminname,  MSG_SENTTO : $scope.adminId,MSG_SENTTOIMAGE:'',MSG_TEXT : msgtext,MSG_ATTACHMENT:$scope.attachment,MSG_ROOMID :$scope.roomId,MSG_DELETE : 0 ,MSG_EDIT: 0,MSG_STATUS:0,MSG_TYPE:2 });
angular.element('.msgtext').val('');

}

$scope.statusupdate = function()
{
//console.log("Status update");
socket.emit('statusupate', { senderId:$scope.userId,rec:$scope.adminId,status:1});
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


$scope.getchat = function(roomId)
{
$scope.messages[roomId] = [];
var m = JSON.stringify({ roomId :roomId});
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

$scope.getunread = function(roomId)
{
$scope.messages[roomId] = [];
$http({
  url: 'https://top-seo-sockets.herokuapp.com/unread-msg?rec='+$scope.userId+'&&sender='+$scope.adminId+'&&status=0',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(!$scope.messages[response.data.messages[0]['MSG_ROOMID']])
  $scope.messages[response.data.messages[0]['MSG_ROOMID']] = [];
  $scope.messages[response.data.messages[0]['MSG_ROOMID']] = response.data.messages.reverse();;


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

//$scope.dateDifference('2019-11-06T21:18:23');

$scope.getsessiondata();
$scope.socketjoinchat();


});
// support chat

// employee
var app23 = angular.module('myApp23',[])



app23.controller('myCtrt23', function($scope,$window,$http,$interval) {

$scope.teams =[];

$scope.name ='';
$scope.email = '';
$scope.phone ='';
$scope.skype ='';
$scope.address ='';
$scope.salary ='';
$scope.experience ='';
$scope.skill = [];
$scope.services = [];
$scope.perday = '';
$scope.perhour = '';
$scope.page =1;
$scope.id = '';
$scope.typingLENGTH =800;
$scope.lastTypingTime='';
$scope.typing = false;
$scope.editemployee = [];

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
var ser = angular.element('#skill').val();

if(ser != '')
{
  var m = JSON.stringify({ name : ser });
  $http({
    url: '<?php echo base_url(); ?>freelancer/serviceSearch',
    // url: '<?php //echo base_url(); ?>client-getservices',
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

$scope.selectService = function (key)
{

var ser =  {};
ser['name'] = $scope.services[key]['name'];
ser['id'] = $scope.services[key]['id'];

var  match = false;
for(var v in $scope.skill)
{
  if ($scope.skill[v]['id'] == ser['id'] )
  {
    match = true;
  }
}
if(!match)
{
  $scope.skill.push(ser);
  var ser = angular.element('#skill').val('');
  $scope.services = [];
}
}

$scope.removeService = function (key)
{
$scope.skill.splice(key,1);
}

$scope.saveemployee = function ()
{
$scope.submitteam = true;
var error = false;
$scope.name = angular.element("#name").val();
$scope.email = angular.element("#email").val();
$scope.phone = angular.element("#phone").val();
$scope.skype = angular.element("#skype").val();
$scope.address = angular.element("#address").val();
$scope.experience = angular.element("#experience").val();
$scope.salary = angular.element("#salary").val();


if($scope.name == '' || $scope.email == '' || $scope.phone == '' || $scope.skype == '' ||  $scope.address == '' || $scope.salary == '' || $scope.experience == '' )
{
  error = true;
}

if($scope.skill.length == 0)
{
  error = true;
}

if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
{
  error = true;
  $scope.emailvalide = true;
}


if(error == true)
{
  return false;
}

angular.element(".preloader").show();
var obj = {  name  : $scope.name , email  : $scope.email,phone: $scope.phone ,address  : $scope.address,skype:$scope.skype,salary:$scope.salary,experience:$scope.experience,skill:$scope.skill };


$http({
  url: '<?php echo base_url(); ?>freelancer/employeeSave',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  angular.element(".preloader").hide();
  if(response.data.message == "true")
  {
    angular.element("#addemployee").modal("hide");
    angular.element("#name").val('');
    angular.element("#email").val('');
    angular.element("#phone").val('');
    angular.element("#skype").val('');
    angular.element("#address").val('');
    angular.element("#experience").val('');
    angular.element("#salary").val('');

    $.notify("Employee Added Successfully", "success");
    $scope.team();
  }
  else if(response.data.message == "false")
  {
    $.notify("Email Address Register Already", "error");
  }

});
}

//get team
$scope.team = function ($id)
{
var obj = {  page : $scope.page }

$http({
  url: '<?php echo base_url(); ?>freelancer/getemployee',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.teams = response.data.result;
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
      $scope.team();
    }
  });
}
}

$scope.delete_confirm = function(key,id)
{

$scope.id = id;
angular.element("#confirmDelete").modal('show');
}

$scope.delete_employee = function (id)
{
var obj = {  id : id }

$http({
  url: '<?php echo base_url(); ?>freelancer/employeedelete',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    angular.element("#confirmDelete").modal('hide');
    $.notify("Employee Deleted Successfully", "success");
    $scope.page  = 1;
    $scope.team();
  }

});
}



// edit

$scope.edit_employee = function (id)
{
var obj = {  id : id  }

$http({
  url: '<?php echo base_url(); ?>freelancer/employeeedit',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
    $scope.editemployee = response.data.result;
    $scope.name = $scope.editemployee.name;
    $scope.email = $scope.editemployee.email;
    $scope.phone = $scope.editemployee.phone;
    $scope.skype = $scope.editemployee.skype;
    $scope.address = $scope.editemployee.address;
    $scope.salary = $scope.editemployee.salary;
    $scope.experience = $scope.editemployee.experience;

    if($scope.editemployee['skill'].length != 0)
    {
      for(var r in $scope.editemployee['skill'])
      {
        var ex = {};
        ex['id'] = $scope.editemployee['skill'][r]['id'];
        ex['name'] = $scope.editemployee['skill'][r]['service'];

        $scope.skill.push(ex);
      }

    }

    angular.element("#Editemployee").modal('show');
  }

});
}



$scope.updateEmployee = function (id)
{
$scope.updatesubmit = true;
var error = false;

if($scope.name == '' || $scope.email == '' || $scope.phone == '' || $scope.skype == '' ||  $scope.address == '' || $scope.salary == '' || $scope.experience == '' )
{
  error = true;
}

if($scope.skill.length == 0)
{
  error = true;
}

if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
{
  error = true;
  $scope.emailvalide = true;
}

if(error == true)
{
  return false;
}

angular.element(".preloader").show();
var obj = { id:$scope.id,name : $scope.name ,email : $scope.email,phone: $scope.phone ,address  : $scope.address,skype:$scope.skype,salary:$scope.salary,experience:$scope.experience,skill:$scope.skill };

$http({
  url: '<?php echo base_url(); ?>freelancer/updateEmployee',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();
  angular.element("#Editemployee").modal('hide');
  if(response.data.message == "true")
  {
    angular.element("#addemployee").modal("hide");
    angular.element("#name").val('');
    angular.element("#email").val('');
    angular.element("#phone").val('');
    angular.element("#skype").val('');
    angular.element("#address").val('');
    angular.element("#experience").val('');
    angular.element("#salary").val('');
    $scope.skill = [];
    $.notify("Employee Update Successfully", "success");
    $scope.team();
  }


});

}


////edit
// image upload
$scope.imageupload = function ($event) {

var files =$event.files;
for (var i = 0; i < files.length; i++) {
  var f = files[i]
  var fileName = files[i].name;
  var filePath = fileName;

  var fileReader = new FileReader();
  fileReader.onload = (function(e) {
    jQuery('#teamviewimg').attr('src',e.target.result);
    var d = JSON.stringify({ image :  e.target.result });
    $http({
      url: '<?php echo base_url(); ?>freelancer/team_imageupload',
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
// image upload


$scope.team();


});

// employee

//expense
var app24 = angular.module('myApp24',[])

app24.directive('mydatepicker', function () {
return {
restrict: 'A',
require: 'ngModel',
link: function (scope, element, attrs, ngModelCtrl) {
  element.datepicker({
    dateFormat: 'dd-mm-yy',
    // minDate: 0,
    onSelect: function (date) {
      scope.date = date;
      scope.$apply();
    }
  });
}
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


app24.controller('myCtrt24', function($scope,$window,$http,$interval) {

$scope.teams =[];
$scope.page =1;
$scope.id = '';
$scope.allex = [];
$scope.currentEx = [];
$scope.currentTotal = 0;
$scope.expense ='';
$scope.amount ='';
$scope.date ='';
$scope.paidby ='';
$scope.status ='';
$scope.currency = '';
$scope.editexpense1 = '';
$scope.total = '';
$scope.page = 1;
$scope.recurring ='';

$scope.expense1 ='';
$scope.currency1 = '';
$scope.amount1 ='';
$scope.date1 ='';
$scope.paidby1 ='';
$scope.status1 ='';
$scope.id = '';
$scope.recurring1 ='';
$scope.recurring2 ='';

$scope.allcurrency = [];
$scope.datewisedata = [];
$scope.show = 0;
$scope.startdate = '';
$scope.enddate = '';
$scope.perpage = 10;
$scope.loader= 0;
$scope.disabled = 1;
$scope.disabled1 = 1;
$scope.radioshow = 0;
$scope.expenseName = [];
$scope.sexpense ='';
$scope.suggestion =[];
$scope.suggestion1 =[];

$http({
url: '<?php echo base_url(); ?>getcurrency',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.allcurrency = response.data.result;

});

$scope.getbank = function ()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/getpaymentmethod',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  //console.log(response);
  if(response.data.success == "true")
  {
    $scope.currency = response.data.result.currencyId;
  }

});
}

$scope.submitexpense = function()
{
$scope.updatesubmit = true;
var error = false;
$scope.date = angular.element('#date').val();

if($scope.expense == '' ||  $scope.amount == '' || $scope.currency == '' || $scope.date == '' )
{
  error = true;
}

if($scope.amount == 0)
{
  error = true;
}

if($scope.status == 1)
{
  if($scope.paidby == '')
  {
    error = true;
  }
}

if(error == true)
{
  return false;
}

angular.element(".preloader").show();
var obj = {  expense :$scope.expense,amount:$scope.amount,paidby:$scope.paidby,status:$scope.status,currencyId:$scope.currency,recurring:$scope.recurring,date:$scope.date };

$http({
  url: '<?php echo base_url(); ?>freelancer/expenseSave',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();
  if(response.data.message == "true")
  {
    $.notify("Expense Added Successfully", "success");
    angular.element('#addexpense').modal('hide');
    $scope.updatesubmit = false;

    $scope.expense ='';
    $scope.amount ='';
    $scope.date ='';
    $scope.paidby ='';
    $scope.status ='';
    $scope.currency = '';
    $scope.getCurrentMonthExpense();
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
  url: '<?php echo base_url(); ?>freelancer/deleteExpense',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    angular.element('#confirm').modal('hide');
    $.notify("Expense Deleted Successfully", "success");
    $scope.getCurrentMonthExpense();
  }
});
}

$scope.getCurrentMonthExpense = function()
{
$scope.currentTotal = 0;
$http({
  url: '<?php echo base_url(); ?>freelancer/getCurrentMonthExpense',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();
  if(response.data.message == "true")
  {
    $scope.loader= 1;
    $scope.currentEx = response.data.result;
    if($scope.currentEx)
    {
      for(var i in $scope.currentEx)
      {
        $scope.currentTotal = +$scope.currentTotal + +$scope.currentEx[i].amount;

      }

    }
  }
});
}

$scope.edit = function(id)
{
var obj = { id :id };
$http({
  url: '<?php echo base_url(); ?>freelancer/editexpense',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    $scope.editexpense1 = response.data.result;
    $scope.expense1 =$scope.editexpense1.expense;
    $scope.amount1 = $scope.editexpense1.amount;
    $scope.date1 = $scope.editexpense1.date;
    if($scope.editexpense1.paidBy1)
    {
    $scope.paidby1 = $scope.editexpense1.paidBy1;
    }
    else
    {
    $scope.paidby1 ='';
    }
    $scope.status1 =$scope.editexpense1.status;
    $scope.currency1 =$scope.editexpense1.currencyId;
    $scope.recurring1 = $scope.editexpense1.recurring;
    if($scope.editexpense1.recurring == 1)
    {
    $scope.recurring2 ="true";
    }
    else if($scope.editexpense1.recurring == 0)
    {
      $scope.recurring2 ="false";
    }
    if($scope.status1 == 1)
    {
      $scope.disabled1 = 0;
    }
    else
    {
      $scope.disabled1 = 1;
    }

    angular.element('#editexpense').modal('show');

  }
});
}


$scope.updateExpense = function()
{
$scope.updatesubmit1 = true;
var error = false;
$scope.date1 = angular.element('#date1').val();

if($scope.expense1 == '' ||  $scope.amount1 == '' || $scope.date1 == ''  || $scope.status1 == '' || $scope.currency1 =='' || $scope.amount1 == 0 )
{
  error = true;
}


if(error == true)
{
  return false;
}

angular.element(".preloader").show();
var obj = {  id:$scope.editexpense1.id,expense :$scope.expense1,amount:$scope.amount1,date:$scope.date1,paidby:$scope.paidby1,status:$scope.status1,currencyId:$scope.currency1,recurring:$scope.recurring1 };

$http({
  url: '<?php echo base_url(); ?>freelancer/expenseUpdate',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  angular.element(".preloader").hide();
  if(response.data.message == "true")
  {
    $scope.updatesubmit1 = true;

    $.notify("Expense Updated Successfully", "success");
    angular.element('#editexpense').modal('hide');
    $scope.getCurrentMonthExpense();
  }

});
}

$scope.allexpense = function ()
{
var obj = {  page:$scope.page,perpage:$scope.perpage};

$http({
  url: '<?php echo base_url(); ?>freelancer/allExpense',
  method: "POST",
  data: obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  $scope.allex = response.data.result;
  $scope.total = response.data.pcount;
  if($scope.allex)
  {
    for(var i in $scope.allex)
    {
      $scope.allex[i].total = 0;
      for(var j in $scope.allex[i].expense)
      {
        $scope.allex[i].total = +$scope.allex[i].total + +$scope.allex[i].expense[j].amount;
      }
    }
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
      $scope.allexpense();
    }
  });
}
 else
 {
    $('#pagination').html('');
 }
}

$scope.searchdate = function ()
{
 error = false;
 $scope.startdate = angular.element("#expensestartdate").val();
 $scope.enddate = angular.element("#expenseenddate").val();


 if($scope.sexpense == '' && $scope.startdate == '' )
 {
   error = true;
 }
 if($scope.startdate)
 {
   if($scope.enddate == '')
   {
     error = true;
   }
 }

 if(error == true)
 {
   return false;
 }

 var obj = {  startdate:$scope.startdate,enddate:$scope.enddate,expense:$scope.sexpense};

 $http({
   url: '<?php echo base_url(); ?>freelancer/expenseSearchdate',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {
   $scope.show = 1;

   if(response.data.message == "true")
   {
     $scope.datewisedata = response.data.result;
   }
});
}

$scope.changePerPage = function ($event)
{
  $scope.perpage = $event.value;
  $scope.page = 1;
  $scope.allexpense();

}

$scope.paidBycheck = function ($event)
{
  $scope.status = $event.value;
  if($scope.status == 1)
  {
    $scope.disabled = 0;
  }
  else
  {
    $scope.disabled = 1;
  }
}

$scope.paidBycheck1 = function ($event)
{
  $scope.status1 = $event.value;
  if($scope.status1 == 1)
  {
    $scope.disabled1 = 0;
  }
  else
  {
    $scope.disabled1 = 1;
  }
}

 $scope.exportexcel = function ()
 {

    $scope.startdate = angular.element("#expensestartdate").val();
    $scope.enddate = angular.element("#expenseenddate").val();
    if($scope.sexpense != '' && $scope.startdate != '' && $scope.enddate != '')
    {
      $window.location.href = "<?php echo base_url(); ?>freelancer/exportExpense/"+$scope.sexpense+"/"+$scope.startdate+"/"+$scope.enddate;
    }
    else if($scope.sexpense != '' && $scope.startdate == '' && $scope.enddate == '')
    {
      $window.location.href = "<?php echo base_url(); ?>freelancer/exportExpense/"+$scope.sexpense;
    }
    else if($scope.sexpense == '' && $scope.startdate != '' && $scope.enddate != '')
    {
      $window.location.href = "<?php echo base_url(); ?>freelancer/exportExpense/expense/"+$scope.startdate+"/"+$scope.enddate;
    }
    else
    {
     $window.location.href = "<?php echo base_url(); ?>freelancer/exportExpense/";
    }

 }

$scope.clone = function ()
{
  $scope.radioshow = 1;

}

$scope.getclone = function (id)
{

  var obj = { id :id };
  $http({
    url: '<?php echo base_url(); ?>freelancer/editexpense',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      $scope.editexpense = response.data.result;
      $scope.expense =$scope.editexpense.expense;
      $scope.amount = $scope.editexpense.amount;
      $scope.date = $scope.editexpense.date;
      if($scope.editexpense.paidBy)
      {
      $scope.paidby = $scope.editexpense.paidBy;
      }
      else
      {
      $scope.paidby ='';
      }
      $scope.status =$scope.editexpense.status;
      $scope.currency =$scope.editexpense.currencyId;
      $scope.recurring = $scope.editexpense.recurring;
      if($scope.editexpense.recurring == 1)
      {
      $scope.recurring ="true";
      }
      else if($scope.editexpense.recurring == 0)
      {
        $scope.recurring ="false";
      }
      if($scope.status == 1)
      {
        $scope.disabled = 0;
      }
      else
      {
        $scope.disabled = 1;
      }

      angular.element('#addexpense').modal('show');
      $scope.radioshow = 0;
    }
  });
}

$scope.getName = function ()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/getallexpenseName',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
   if(response.data.success == "true")
   {
  $scope.expenseName = response.data.result;
   }
});
}

 $scope.getsuggestionName = function($event)
 {
     var obj = { expense :$scope.expense };
     if($scope.expense != '')
   {
    $http({
      url: '<?php echo base_url(); ?>freelancer/getexpenseSuggestion',
      method: "POST",
      data:obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
       if(response.data.success == "true")
        {
        $scope.suggestion = response.data.result;
        }
     });
   }
 }

 $scope.addsuggestion = function(name)
 {

   $scope.expense = name;
   $scope.suggestion = [];

 }

 $scope.getsuggestionName1 = function($event)
 {
     var obj = { expense :$scope.expense1 };
     if($scope.expense1 != '')
   {
    $http({
      url: '<?php echo base_url(); ?>freelancer/getexpenseSuggestion',
      method: "POST",
      data:obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
       if(response.data.success == "true")
        {
        $scope.suggestion1 = response.data.result;
        }
     });
   }
 }

 $scope.addsuggestion1 = function(name)
 {

   $scope.expense1 = name;
   $scope.suggestion1 = [];

 }

$scope.getName();
$scope.allexpense();
$scope.getCurrentMonthExpense();
$scope.getbank();



});

//expense

// leave


var app25 = angular.module('myApp25',[])
// 'datepicker'
app25.directive('numbersOnly', function() {
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

app25.controller('myCtrt25', function($scope,$window,$http,$interval) {

$scope.teams =[];
$scope.break = [];
$scope.page =1;
$scope.breakfasthr = '';
$scope.breakfastmin = '';
$scope.teahr = '';
$scope.teamin = '';
$scope.lunchhr = '';
$scope.lunchmin = '';
$scope.dinnerhr = '';
$scope.dinnermin = '';

$scope.leave    = [];
$scope.fullhr   = '';
$scope.fullmin  = '' ;
$scope.halfhr   = '';
$scope.halfmin  = '';
$scope.shorthr  = '';
$scope.shortmin = '';
$scope.holiday = [];
$scope.holidayfields = [];
$scope.workinghours = '';
$scope.workingdays =  '';
$scope.total  == '';
$scope.working = [];
$scope.days = '';

$scope.holidayfields.push(
{
  "title":'',
  "date":''
});

$scope.addholiday = function()
{
  $scope.submith = false;

  $scope.holidayfields.push(
    {
      "title":'',
      "date":''
    });
  }

  $scope.deleteholiday = function(key)
  {
    $scope.holidayfields.splice(key,1);
  }

  $scope.saveworking = function()
  {
    $scope.submitw = true;
    error = false;


    if($scope.workinghours   == '' || $scope.workingdays  == '' || $scope.total  == ''  )
    {
      error = true;
    }

    if(error == true)
    {
      return false;
    }

    var obj = {  workinghour :$scope.workinghours,workingdays:$scope.workingdays, total:$scope.total };
    $http({
      url: '<?php echo base_url(); ?>freelancer/workinghoursSave',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        $.notify("Working Hours added Successfully", "success");
      }
      else if(response.data.message == "false")
      {
        $.notify("Working Days is Not Added", "error");
      }

    });

  }


  $scope.saveBreak = function()
  {
    var obj = {  breakfasthr :$scope.breakfasthr,breakfastmin:$scope.breakfastmin, lunchhr:$scope.lunchhr,lunchmin:$scope.lunchmin,teahr :$scope.teahr,teamin:$scope.teamin,dinnerhr :$scope.dinnerhr,dinnermin:$scope.dinnermin };
    $http({
      url: '<?php echo base_url(); ?>freelancer/breakSave',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        $.notify("Break Time Added Successfully", "success");
      }
      else if(response.data.message == "false")
      {
        $.notify("Email Address Register Already", "error");
      }

    });
  }


  $scope.saveleave = function()
  {
    $scope.submitleave = true;
    error = false;

    if($scope.fullhr   == '' || $scope.fullmin  == '' || $scope.halfhr   == '' || $scope.halfmin  == '' || $scope.shorthr  == '' || $scope.shortmin == '' )
    {
      error = true;
    }

    if(error == true)
    {
      return false;
    }

    var obj = {  fullhr :$scope.fullhr,fullmin:$scope.fullmin, halfhr:$scope.halfhr,halfmin:$scope.halfmin,shorthr :$scope.shorthr,shortmin:$scope.shortmin };
    $http({
      url: '<?php echo base_url(); ?>freelancer/leaveSave',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        $.notify("Leave Added Successfully", "success");
      }
      else if(response.data.message == "false")
      {
        $.notify("Email Address Register Already", "error");
      }

    });
  }

  $scope.getbreak = function()
  {
    $http({
      url: '<?php echo base_url(); ?>freelancer/getbreak',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        $scope.break = response.data.result;
        if($scope.break.breakfasthr != 0)
        {
          $scope.breakfasthr = $scope.break.breakfasthr;
        }
        $scope.breakfastmin = $scope.break.breakfastmin;

        if($scope.break.teahr != 0)
        {
          $scope.teahr         = $scope.break.teahr;
        }
        $scope.teamin        = $scope.break.teamin;

        if($scope.break.lunchhr != 0)
        {
          $scope.lunchhr       = $scope.break.lunchhr;
        }
        $scope.lunchmin      = $scope.break.lunchmin;

        if($scope.break.dinnerhr != 0)
        {
          $scope.dinnerhr      = $scope.break.dinnerhr;
        }
        $scope.dinnermin     = $scope.break.dinnermin;
      }
    });
  }


  $scope.getleave = function()
  {
    $http({
      url: '<?php echo base_url(); ?>freelancer/getleave',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        $scope.leave    =     response.data.result;
        $scope.fullhr   =     $scope.leave.fullhr;
        $scope.fullmin  =     $scope.leave.fullmin;
        $scope.halfhr   =     $scope.leave.halfhr;
        $scope.halfmin  =     $scope.leave.halfmin;
        $scope.shorthr  =     $scope.leave.shorthr;
        $scope.shortmin =     $scope.leave.shortmin;
      }
    });
  }

  $scope.getresignationdays = function()
  {
    $http({
      url: '<?php echo base_url(); ?>freelancer/getresignationTime',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        $scope.days    =     response.data.result.days;

      }
    });
  }


  $scope.getworking = function()
  {
    $http({
      url: '<?php echo base_url(); ?>freelancer/getworking',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        $scope.working    =     response.data.result;
        $scope.workinghours   =     $scope.working.workingHour;
        $scope.workingdays  =     $scope.working.workingDays;
        $scope.total   =     $scope.working.total;

      }
    });
  }

  $scope.totalHours = function()
  {
    $scope.total = $scope.workinghours * $scope.workingdays;
  }


  $scope.saveHoliday = function()
  {
    $scope.submith = true;
    var error = false;

    if($scope.holidayfields)
    {
      for(var i in $scope.holidayfields)
      {
        if($scope.holidayfields[i].title == '' ||  $scope.holidayfields[i].date == '' )
        {
          error = true;
        }
      }
    }

    if(error == true)
    {
      return false;
    }

    angular.element(".preloader").show();
    var obj = {  data :$scope.holidayfields };
    $http({
      url: '<?php echo base_url(); ?>freelancer/holidaySave',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        $.notify("Holiday Added Successfully", "success");

      }
      else if(response.data.message == "false")
      {
        $.notify("Holiday Not Added", "error");
      }

    });
  }

  $scope.saveResignation = function()
  {
    $scope.submitr = true;
    var error = false;

    if($scope.days == '')
    {
      error = true;
    }

    if(error == true)
    {
      return false;
    }

    angular.element(".preloader").show();
    var obj = {  days : $scope.days };
    $http({
      url: '<?php echo base_url(); ?>freelancer/resignationTimeSave',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        $.notify("Resignation Days Added Successfully", "success");

      }
      else if(response.data.message == "false")
      {
        $.notify("Resignation Not Added", "error");
      }

    });
  }

  $scope.dateformat = function(item)
  {
    var dates = new Date(Date.parse(item))
    var newDate = '' + dates.getDate() + '.' + (dates.getMonth() + 1) + '.' + dates.getFullYear();
    return newDate;


  }


  $scope.getholiday = function()
  {
    $http({
      url: '<?php echo base_url(); ?>freelancer/getholiday',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        $scope.holidayfields = [];
        $scope.holiday = response.data.result;
        for(var g in $scope.holiday)
        {
          var d = {};
          d['title'] = $scope.holiday[g].title;
          d['date'] = $scope.dateformat($scope.holiday[g].date);
          $scope.holidayfields.push(d);
        }

      }
    });
  }

  $scope.checkbreakmin = function ()
  {
    if($scope.breakfastmin > 59)
    {
      $scope.breakfastmin = 59;
    }
  }

  $scope.checklunchmin = function ()
  {
      if($scope.lunchmin > 59)
      {
        $scope.lunchmin = 59;
      }
  }

  $scope.checkteamin = function ()
  {
    if($scope.teamin > 59)
    {
      $scope.teamin = 59;
    }
  }

  $scope.checkdinnermin = function()
  {
    if($scope.dinnermin > 59)
    {
      $scope.dinnermin = 59;
    }
  }




  $scope.getbreak();
  $scope.getleave();
  $scope.getholiday();
  $scope.getworking();
  $scope.getresignationdays();

});

// leave

// project add

var app26 = angular.module('myApp26',[])

app26.directive('numbersOnly', function() {
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

app26.controller('myCtrt26', function($scope,$window,$http,$interval) {

  $scope.milestones = [];
  $scope.projectname = '';
  $scope.hourlyprice = '';
  $scope.totalhour = '';
  $scope.buget = '';
  $scope.projectsource = '';
  $scope.clientname = '';
  $scope.email = '';
  $scope.phone = '';
  $scope.skype = '';
  $scope.currency = '';
  $scope.contactperson = '';
  $scope.projectmanager = '';
  $scope.total = 0;
  $scope.page =1;
  $scope.allproject = [];
  $scope.allprojectmanager = [];
  $scope.document = [];
  $scope.doc = '';
  $scope.allcurrency = [];
  $scope.countrycode ='';
  $scope.countryclass ='';
  $scope.start = '';
  $scope.allsource= [];

  $http({
    url: '<?php echo base_url(); ?>getcurrency',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    $scope.allcurrency = response.data.result;

  });

  $http({
  url: '<?php echo base_url(); ?>freelancer/getallleadsource',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
  }).then(function(response) {

  $scope.allsource = response.data.result;

  });

  $scope.milestones.push({
    title : '',
    hours : 0,
    task : [{
      task:'',
      description:'',
      hours:'',
    }],
    button:'',
  });

  $scope.ctrl = function()
  {

    var email = angular.element('#email').val();
    $scope.email = email;
    if(!email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
    {
      $scope.emailvalide = true;
    }
    else
    {
      $scope.emailvalide = false;
    }
  }

  $scope.milestoneadd = function ($event)
  {

    $scope.milestones.push({
      title : '',
      hours : 0,
      task : [{
        task:'',
        hours:'',
        description:'',
      }],
      button:'',
    });

  }

  $scope.deletetask = function ($mkey,$key)
  {
    $scope.milestones[$mkey]['task'].splice($key,1);
  }

  $scope.counttotalhour = function($event)
  {

    for(var i in $scope.milestones )
    {
      $scope.t = 0;
      $scope.p = 0;
      for(var m in $scope.milestones[i]['task'])
      {
        $scope.t =+ $scope.t + +$scope.milestones[i]['task'][m]['hours'];
        // $scope.p += $scope.t;
      }
      $scope.milestones[i]['hours'] = $scope.t;
    }
  }

  $scope.taskadd = function ($key)
  {

    $scope.milestones[$key]['task'].push({
      task : '',
      hours:'',
      description:'',
    });

  }


  $scope.deletemilestone = function ($key)
  {
    $scope.milestones.splice($key,1);
  }

  $scope.totalbuget = function()
  {
    $scope.budget = $scope.hourlyprice * $scope.totalhour;
  }

  $scope.csvdataexport = function()
  {
    var filename = document.getElementById("csv");

    if (filename.value.length < 1 ){
      ($scope.warning = "Please upload a file");
    }
    else {
      $scope.title = "Confirm file";
      if(filename.files[0])
      {
        var file = filename.files[0];
        //console.log(file)
        var fileSize = 0;
      }
      if (filename.files[0]) {

        var reader = new FileReader();
        reader.onload = function (e) {
          var table2 = [];

          var rows = e.target.result.split("\n");
          var title = rows[0];
          var milestone= 0;
          for (var i = 1; i < rows.length; i++) {

            var cells = rows[i].split(",");

            if(cells[0] != '')
            {
              var rr = rows[i].split(",");
              milestone = table2.push({title : rr[1],hours:'0', task : [] }) - 1;
            }
            else
            {
              cols = rows[i].split(",");
              if(cols[3] && cols[4])
              {
                table2[milestone]['task'].push ({task : cols[3],description: cols[4],hours : cols[5]});
              }
            }
          }

          if(table2)
          {
            $scope.cupload = 2;
            // $scope.budget = 0;
            for(var res in table2)
            {
              var mt = 0;
              var tprice = 0;
              for(var i in  table2[res]['task'])
              {

                if(table2[res]['task'][i]['hours'])
                {
                  var tprice = +table2[res]['task'][i]['hours'] + tprice;
                  // table2[res]['task'][i]['amount'] = tprice;
                  // mt += tprice;
                }
              }
              table2[res]['hours'] = tprice;
              //$scope.budget = +$scope.budget+ +table2[res]['price'];

            }
          }
          $scope.milestones = [];
          $scope.milestones = table2;
          // console.log($scope.milestones);
          $scope.$apply();

        }

        reader.readAsText(filename.files[0]);

      }
      return false;
    }


  }

  $scope.addDocument = function()
  {
    // console.log($scope.doc);
    if($scope.doc)
    {
      $scope.document.push($scope.doc);
      $('#document').val('');
      //$('#document').attr('src','');
      // console.log($scope.document);
    }
  }

  $scope.documentUpload = function ($event) {

    var files =$event.files;
    for (var i = 0; i < files.length; i++) {
      var f = files[i]
      var fileName = files[i].name;
      var filePath = fileName;

      var fileReader = new FileReader();
      fileReader.onload = (function(e) {
        jQuery('#teamviewimg').attr('src',e.target.result);
        var d = JSON.stringify({ image :  e.target.result });
        $http({
          url: '<?php echo base_url(); ?>freelancer/project_documentupload',
          method: "POST",
          data: d,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
          $scope.doc = response.data;

        });

      });
      fileReader.readAsDataURL(f);
    }

  }


  $scope.saveproject = function()
  {
    $scope.submitp = true;
    $scope.emailvalide = false;
    error = false;

    for( var res in $scope.milestones)
    {
      if($scope.milestones[res]['title'] == '' || $scope.milestones[res]['hours'] =='' || $scope.milestones[res]['description'] =='' )
      {
        error = true;
      }

      if($scope.milestones[res]['task'].length != 0)
      {
        for(var t in $scope.milestones[res]['task'])
        {
          if($scope.milestones[res]['task'][t]['task'] == '' || $scope.milestones[res]['task'][t]['hours'] == '' )
          {
            error = true;


          }
        }
      }
    }


    // $scope.email == '' ||  $scope.skype == '' ||
    if($scope.projectname == '' || $scope.hourlyprice == '' || $scope.totalhour == '' || $scope.budget == '' || $scope.projectsource == '' || $scope.clientname == '' ||  $scope.contactperson == '' || $scope.projectmanager == '' || $scope.currency == '' || $scope.phone == '')
    {
      error = true;
    }

    if($scope.email != '')
    {
      if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
      {
        error = true;
        $scope.emailvalide = true;
      }
    }
    var pclass = $('#phone').attr('class');
    $scope.countrycode = $('.iti__selected-flag').attr('title');
    var cl = $('.iti__flag').attr('class');
    var cl = cl.split(' ');
    $scope.countryclass = cl['1'];

    if(pclass == "form-control phonenumber ng-valid ng-dirty ng-valid-parse ng-not-empty error11 ng-touched")
    {
      return false;
    }

    if(error == true)
    {
      return false;
    }

    var obj = { projectName:$scope.projectname,hourlyPrice:$scope.hourlyprice,totalHour:$scope.totalhour,budget:$scope.budget,lead_sourceId:$scope.projectsource,clientName:$scope.clientname,email:$scope.email,phone:$scope.phone,skype:$scope.skype,contactPerson:$scope.contactperson,projectManagerId:$scope.projectmanager,milestones:$scope.milestones,document:$scope.document,currency:$scope.currency,countrycode:$scope.countrycode,countryclass:$scope.countryclass   };
    angular.element('.preloader').show();
    $http({
      url: '<?php echo base_url(); ?>freelancer/projectSave',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        $.notify("Project  Added Successfully", "success");
        $interval(callAtInterval, 2000);

        function callAtInterval()
        {
          $window.location.href = '<?php echo base_url(); ?>freelancer/project';
        }
      }
      else if(response.data.message == "false")
      {
        $.notify("Project is not Added", "error");
      }

    });
  }

  // getproject manager
  $scope.getprojectmanager = function()
  {
    $http({
      url: '<?php echo base_url(); ?>freelancer/getprojectmanager',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response){
      if(response.data.message == "true")
      {
        $scope.allprojectmanager  = response.data.result;
      }

    });
  }

  $scope.getproject = function()
  {
    var obj = {  page : $scope.page }
    $http({
      url: '<?php echo base_url(); ?>freelancer/getproject',
      method: "POST",
      data:obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        $scope.allproject = response.data.result;
        $scope.total      = response.data.pcount;
        $scope.start      = response.data.start;

        if($scope.page == 1)
        $scope.pagination($scope.total);

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
          $scope.job();
        }
      });
    }
  }

  $scope.delete_confirm = function(key,id)
  {
    $scope.key = key;
    $scope.id = id;
    angular.element("#confirmDelete").modal('show');
  }


  $scope.delete_project = function (key,id)
  {
    var obj = {  id : id }

    $http({
      url: '<?php echo base_url(); ?>freelancer/project_delete',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        angular.element("#confirmDelete").modal('hide');
        $.notify("Project Deleted Successfully", "success");
        $scope.page = 1;
        $scope.getproject();
      }

    });
  }

  $scope.getproject();
  $scope.getprojectmanager();

});


// project add

// manager project

var app27 = angular.module('myApp27',[])

app27.directive('numbersOnly', function() {
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

app27.controller('myCtrt27', function($scope,$window,$http,$interval) {


  $scope.total = 0;
  $scope.page =1;
  $scope.allproject = [];
  $scope.status = '';
  $scope.project = [];
  $scope.milestone = [];
  $scope.pro ='';
  $scope.mil ='';
  $scope.amount = '';
  $scope.start ='';

  $scope.getallproject = function()
  {
    $http({
      url: '<?php echo base_url(); ?>freelancer/allProjectAsigntoManager',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        $scope.project = response.data.result;
      }
    });
  }

  $scope.getmilestone = function()
  {
    $scope.pro = angular.element("#pro").val();
    var obj = {  projectId : $scope.pro }
    $http({
      url: '<?php echo base_url(); ?>freelancer/getproject_milestone',
      method: "POST",
      data:obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        $scope.milestone = response.data.result;
      }
    });
  }

  // $scope.getamount = function($event)
  // {
  //   var a = angular.element($event);
  //   var b = a[0].selectedOptions[0];
  //   var c = b.getAttribute('data-id');
  //   $scope.amount = $scope.milestone[c].amount;
  // }

  $scope.updateAmount = function()
  {
    $scope.updatesubmit = true;
    var error = false;
    $scope.pro = angular.element("#pro").val();
    $scope.mil = angular.element("#milestone").val();
    $scope.amount = angular.element("#amount").val();


    if($scope.pro == '' || $scope.mil == '' || $scope.amount == '')
    {
      error = true;
    }

    if(error == true)
    {
      return false;
    }

    var obj = {  projectId : $scope.pro,projectMilestoneId:$scope.mil,amount:$scope.amount };
    $http({
      url: '<?php echo base_url(); ?>freelancer/milestoneAmountupdate',
      method: "POST",
      data:obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        angular.element("#AddAmount").modal('hide');
        $.notify("Project Amount Added Successfully", "success");
        $scope.updatesubmit = false;
        angular.element("#pro").val('');
        angular.element("#milestone").val('');
        angular.element("#amount").val('');

      }
    });
  }


  $scope.getproject = function()
  {
    var obj = {  page : $scope.page }
    $http({
      url: '<?php echo base_url(); ?>freelancer/getproject_assign',
      method: "POST",
      data:obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        $scope.allproject = response.data.result;
        $scope.total      = response.data.pcount;
        $scope.start = response.data.start;


        if($scope.page == 1)
        $scope.pagination($scope.total);

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
          $scope.job();
        }
      });
    }
  }

  $scope.statusChange = function($event)
  {
    var status = angular.element($event).val();
    var a = angular.element($event);
    var b = a[0].selectedOptions[0];
    var c =b.getAttribute('data-id');

    var obj = {  projectId : c,status:status };
    $http({
      url: '<?php echo base_url(); ?>freelancer/project_status',
      method: "POST",
      data:obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
        $.notify("Project Status Changed Successfully", "success");
      }
    });

  }



  $scope.getproject();
  $scope.getallproject();

});

// manager project

// manage project detail
<?php if(isset($projectId))
{
  ?>
  var app28 = angular.module('myApp28',[])

  app28.directive('numbersOnly', function() {
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

  app28.controller('myCtrt28', function($scope,$window,$http,$interval) {

    $scope.project = [];

    $scope.typingLENGTH =800;
    $scope.lastTypingTime='';
    $scope.typing = false;
    $scope.users = [];
    $scope.taskId ='';
    $scope.userId ='';

    $scope.assignUser = function(ukey,mkey)
    {
      var name = $scope.users[ukey].name;
      var id = $scope.users[ukey].id;
      if($scope.project.milestone)
      {
        for(var i in $scope.project.milestone[mkey].task)
        {

          if($scope.project.milestone[mkey].task[i].checked)
          {
            var obj = {};
            obj['id'] = id;
            obj['name'] = name;
            $scope.project.milestone[mkey].task[i].assign.push(obj);
            $scope.project.milestone[mkey].task[i].checked = 0;
            angular.element('.assign').val('');
            $scope.users = [];

          }
          $scope.project.milestone[mkey].checked = 0;
        }
      if($scope.users.length != 0)
      {
        $.notify("Please select checkbox", "error");
       }
     }
    }

    $scope.showAssign = function(key)
    {
      $scope.project.milestone[key].show = 1;
    }


    $scope.assignkeyup = function ($event)
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
          $scope.getassignkeyup($event);
          // console.log("Typing");

          $scope.typing = false;
        }
      },$scope.typingLENGTH);
    }

    $scope.getassignkeyup = function($event)
    {
      $scope.users =[];
      var users = angular.element($event).val();

      if(users != '')
      {
        var m = JSON.stringify({ name : users });
        $http({
          url: '<?php echo base_url(); ?>freelancer/SearchCompanyUser',
          method: "POST",
          data:m,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          $scope.users = response.data.result;

        });
      }
    }


    $scope.getproject = function()
    {
      var obj = {  id : <?php echo $projectId; ?> }
      $http({
        url: '<?php echo base_url(); ?>freelancer/getproject_assign_detail',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message == "true")
        {
          $scope.project = response.data.result;
          for(var g in $scope.project.milestone)
          {
            $scope.project.milestone[g].checked = '';
            for(var i in $scope.project.milestone[g].task)
            {
              $scope.project.milestone[g].task[i].checked ='';
              //$scope.project.milestone[g].task[i].assign =[];
            }
          }
        }
      });
    }

    $scope.AssignMilestone = function()
    {
      $scope.submita = true;
      var error = false;

      if($scope.project.milestone)
      {
        for(var a in $scope.project.milestone)
        {
          for(var b in $scope.project.milestone[a].task)
          {
            if($scope.project.milestone[a].task[b].assign.length == 0 )
            {
              error = true;
            }
          }
        }
      }

      if(error == true)
      {
        return false;
      }

      var obj = {  project : $scope.project.milestone };
      angular.element('.preloader').show();

      $http({
        url: '<?php echo base_url(); ?>freelancer/projectAssignToUser',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message == "true")
        {
          angular.element('.preloader').hide();
          $.notify("Milestone Assign Successfully", "success");
        }
      });
    }

    $scope.milestoneChecked = function(key,$event)
    {
      if($event.target.checked ==  true)
      {
        $scope.project.milestone[key].checked = 1;
        for(var i in $scope.project.milestone[key].task)
        {
          $scope.project.milestone[key].task[i].checked = 1;

        }
      }
      else
      {
        $scope.project.milestone[key].checked = 0;

        for(var i in $scope.project.milestone[key].task)
        {
          $scope.project.milestone[key].task[i].checked = 0;
        }
      }
    }

    $scope.taskChecked = function(mkey,key,$event)
    {
      if($event.target.checked ==  true)
      {
        $scope.project.milestone[mkey].task[key].checked = 1;
      }
      else
      {
        $scope.project.milestone[mkey].task[key].checked = 0;
      }

      checked = true;
      for(var i in $scope.project.milestone[mkey].task)
      {
        if(!$scope.project.milestone[mkey].task[i].checked)
        {
          checked = false;
        }
      }

      if(checked)
      $scope.project.milestone[mkey].checked = 1;
      else
      $scope.project.milestone[mkey].checked = 0;

    }

    $scope.removeAssignedproject = function(uid,taskId)
    {
      $scope.userId = uid;
      $scope.taskId = taskId;
      angular.element('#confirmDelete').modal('show');
    }

    $scope.delete = function ()
    {
      var obj = {  userId : $scope.userId,taskId:$scope.taskId };

      $http({
        url: '<?php echo base_url(); ?>freelancer/unassigned_task',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message == "true")
        {
          angular.element("#confirmDelete").modal('hide');
          $.notify("Employee Deleted Successfully", "success");
          $scope.getproject();

        }

      });
    }

    $scope.getproject();

  });
  <?php } ?>
  // manage project detail

  // Employee task
  var app29 = angular.module('myApp29',[])

  app29.directive('numbersOnly', function() {
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

  app29.controller('myCtrt29', function($scope,$window,$http,$interval) {

    $scope.tasks = [];

    $scope.total = 0;
    $scope.page  = 1;


    $scope.gettask = function()
    {
      var obj = {  page : $scope.page }
      $http({
        url: '<?php echo base_url(); ?>freelancer/getemployee_task',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message == "true")
        {
          $scope.task = response.data.result;
          $scope.total      = response.data.pcount;

          if($scope.page == 1)
          $scope.pagination($scope.total);

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
            $scope.gettask();
          }
        });
      }
    }

    $scope.taskStatusChange = function($event)
    {
      var status = angular.element($event).val();
      var a = angular.element($event);
      var b = a[0].selectedOptions[0];
      var c =b.getAttribute('data-id');

      var obj = {  taskId : c,status:status };
      $http({
        url: '<?php echo base_url(); ?>freelancer/task_status',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message == "true")
        {
          $.notify("Task Status Changed Successfully", "success");
        }
      });

    }


    $scope.gettask();

  });
  // employee milestone

  // project detail page
  <?php if(isset($projectId))
  {
    ?>
    var app30 = angular.module('myApp30',[])

    app30.directive('numbersOnly', function() {
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

    app30.controller('myCtrt30', function($scope,$window,$http,$interval) {

      $scope.project = [];

      $scope.getproject = function()
      {
        var obj = {  id : <?php echo $projectId; ?> }
        $http({
          url: '<?php echo base_url(); ?>freelancer/getproject_assign_detail',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.project = response.data.result;

          }
        });
      }

      $scope.getproject();

    });
    <?php } ?>

    // project detail page

    // employee project
    var app31 = angular.module('myApp31',[])

    app31.directive('numbersOnly', function() {
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

    app31.controller('myCtrt31', function($scope,$window,$http,$interval) {

      $scope.project = [];

      $scope.total = 0;
      $scope.page  = 1;


      $scope.getproject = function()
      {
        var obj = {  page : $scope.page }
        $http({
          url: '<?php echo base_url(); ?>freelancer/getemployee_project',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.project = response.data.result;
            $scope.total      = response.data.pcount;

            if($scope.page == 1)
            $scope.pagination($scope.total);

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
              $scope.getproject();
            }
          });
        }
      }



      $scope.getproject();

    });
    //employee project

    var app32 = angular.module('myApp32',[])

    app32.directive('numbersOnly', function() {
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

    app32.controller('myCtrt32', function($scope,$window,$http,$interval) {

      $scope.project = [];

      $scope.total = 0;
      $scope.page  = 1;
      $scope.totalSeconds = 0;
      $scope.seconds =  0;
      $scope.minutes =  0;
      $scope.taskstartId = '';
      $scope.taskstartprojectId ='';
      $scope.start = '';

      $interval(setTime, 1000);

      function setTime()
      {
        $scope.totalSeconds++;
        $scope.seconds = $scope.pad(+$scope.totalSeconds % 60);
        $scope.minutes = $scope.pad(parseInt(+$scope.totalSeconds / 60));
      }

      $interval(taskstop1,240000);

      function taskstop1()
      {
        if($scope.taskstartId != '' && $scope.taskstartprojectId != '')
         {
           var obj = {  projectId : $scope.taskstartprojectId,taskId:$scope.taskstartId,type:1 }
           $http({
             url: '<?php echo base_url(); ?>freelancer/tasktimeStop',
             method: "POST",
             data:obj,
             headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {

             if(response.data.message == "true")
             {


             }
        });
      }

      }

      $scope.pad = function(val)
      {
        var valString = val + "";
        if (valString.length < 2)
        {
          return "0" + valString;
        }
        else
        {
          return valString;
        }
      }


      $scope.getproject = function()
      {
        var obj = {  page : $scope.page }
        $http({
          url: '<?php echo base_url(); ?>freelancer/getemployee_project',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.project = response.data.result;
            $scope.total      = response.data.pcount;
            $scope.start = response.data.start;

            if($scope.page == 1)
            $scope.pagination($scope.total);

            if($scope.project)
            {
              for(var i in $scope.project)
              {
                for(var j in $scope.project[i].task)
                {
                  $scope.project[i].task[j].showbutton = 1;
                  $scope.project[i].task[j].breakshowbutton = 1;

                  $scope.project[i].task[j].disable = 1;
                }
              }

            }

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
              $scope.getproject();
            }
          });
        }
      }



      $scope.startTime = function(pkey,key,projectId,taskId)
      {
        var obj = {  projectId : projectId,taskId:taskId,type:1 }
        $http({
          url: '<?php echo base_url(); ?>freelancer/tasktimeStart',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.taskstartId = taskId;
            $scope.taskstartprojectId = taskId;
            $scope.taskstartProjectKey = pkey;
            $scope.taskstarttaskKey = key;

            $scope.project[pkey].task[key].timer = 1;
            if($scope.project)
            {
              for(var i in $scope.project)
              {
                for(var j in $scope.project[i].task)
                {
                  $scope.project[i].task[j].disable = 0;
                }
              }
              $scope.project[pkey].task[key].disable = 1;
              $scope.project[pkey].task[key].showbutton = 2;
              $scope.totalSeconds = 0;
              setTime();


            }
            $.notify("Timer Start Successfully", "success");
          }
        });
      }

      $scope.stoptimer = function(pkey,key,projectId,taskId)
      {
        var obj = {  projectId : projectId,taskId:taskId,type:1 }
        $http({
          url: '<?php echo base_url(); ?>freelancer/tasktimeStop',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.project[pkey].task[key].timer = 1;
            if($scope.project)
            {
              for(var i in $scope.project)
              {
                for(var j in $scope.project[i].task)
                {
                  $scope.project[i].task[j].disable = 1;
                  $scope.project[pkey].task[key].showbutton = 1;

                }
              }
            }
            $.notify("Timer Stop Successfully", "success");
            $scope.getproject();

          }
        });
      }

      $scope.taskStatusChange = function($event)
      {
        var status = angular.element($event).val();
        var a = angular.element($event);
        var b = a[0].selectedOptions[0];
        var c =b.getAttribute('data-id');

        var obj = {  taskId : c,status:status };
        $http({
          url: '<?php echo base_url(); ?>freelancer/task_status',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $.notify("Task Status Changed Successfully", "success");
          }
        });

      }

      $scope.startBreak = function(type)
      {

        $scope.stoptimer($scope.taskstartProjectKey,$scope.taskstarttaskKey,$scope.taskstartprojectId,$scope.taskstartId);
        var obj = {  type:type }
        $http({
          url: '<?php echo base_url(); ?>freelancer/breaktimeStart',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            if(type == 2)
            {
            $.notify("Break Start Successfully", "success");
            }
            else if(type == 3)
            {
              $.notify("Tea Break Start Successfully", "success");
            }
            else if(type == 4)
            {
              $.notify("Lunch Break Start Successfully", "success");
            }
            else if(type == 5)
            {
              $.notify("Dinner Break Start Successfully", "success");
            }
          }
        });
      }

      $scope.stopBreak = function(type,t)
      {
        var obj = { type:type,task:t }
        $http({
          url: '<?php echo base_url(); ?>freelancer/breaktimeStop',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            if(type == 2)
            {
            $.notify("Breakfast End's Successfully", "success");
            }
            else if(type == 3)
            {
              $.notify("Tea Break End's Successfully", "success");
            }
            else if(type == 4)
            {
              $.notify("Lunch Break End's Successfully", "success");
            }
            else if(type == 5)
            {
              $.notify("Dinner Break End's Successfully", "success");
            }

          }
        });
      }



      $scope.getproject();

    });
    //employee project

    // project profit loss
    var app33 = angular.module('myApp33',[])

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

    app33.controller('myCtrt33', function($scope,$window,$http,$interval) {

      $scope.project = [];
      $scope.total = 0;
      $scope.page  = 1;
      $scope.employee = [];
      $scope.hourly = '';


      $scope.getproject = function()
      {
        var obj = {  page : $scope.page }
        $http({
          url: '<?php echo base_url(); ?>freelancer/getroi',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.project = response.data.result;
            $scope.total      = response.data.pcount;

            if($scope.page == 1)
            $scope.pagination($scope.total);

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
              $scope.getproject();
            }
          });
        }
      }

      $scope.getprojectDetail = function(key,projectId)
      {
        var obj = {  projectId : projectId }
        $http({
          url: '<?php echo base_url(); ?>freelancer/getroi_project',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.employee = response.data.result;
            $scope.hourly = $scope.project[key].hourlyPrice;
            angular.element("#Projectdetail").modal('show');


          }
        });
      }


      $scope.getproject();

    });
    // project profit loss

    // company roi
    var app34 = angular.module('myApp34',[])

    app34.directive('numbersOnly', function() {
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

    app34.controller('myCtrt34', function($scope,$window,$http,$interval) {

      $scope.data = [];



      $scope.getprojectbyMonth = function()
      {

        $http({
          url: '<?php echo base_url(); ?>freelancer/getcompany-roi',
          method: "POST",
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.data = response.data.result;
          }
        });

      }

      $scope.getprojectbyMonth()


    });
    // company roi

    var app35 = angular.module('myApp35',[])

    app35.directive('numbersOnly', function() {
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

    app35.controller('myCtrt35', function($scope,$window,$http,$interval) {

      $scope.data = [];
      $scope.working = [];

      $http({
        url: '<?php echo base_url(); ?>freelancer/getworking',
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        $scope.working = response.data.result;

      });



      $scope.getemployee = function()
      {
        $http({
          url: '<?php echo base_url(); ?>freelancer/getemployee-roi',
          method: "POST",
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.data = response.data.result;
          }
        });

      }

      $scope.getdetail = function(id,m,y)
      {
        var obj = { id:id,m:m,y:y  };
        $http({
          url: '<?php echo base_url(); ?>freelancer/getemployee-detail-roi',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.projects = response.data.result;
            angular.element('#detail').modal('show');
          }
          else
          {
            $.notify("No Record", "error");

          }
        });
      }

      $scope.getemployee()


    });
    // employee roi

    // employee salary

    var app36 = angular.module('myApp36',[])

    app36.directive('numbersOnly', function() {
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


    app36.directive('mydatepicker', function () {
      return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModelCtrl) {
          element.datepicker({
            dateFormat: 'dd-mm-yy',
            onSelect: function (date) {
              scope.date = date;
              scope.$apply();
            }
          });
        }
      };
    });

    app36.controller('myCtrt36', function($scope,$window,$http,$interval) {

      $scope.allemployee = [];
      $scope.page = 1;
      $scope.userId ='';
      $scope.netsalary ='';
      $scope.start ='';
      $scope.allmonth = [];
      $scope.grosstotal = '';
      $scope.netsalarytotal = '';
      $scope.datewisedata = [];
      $scope.show = 0;
      $scope.date ='';
      $scope.load = 0;
      $scope.load1 = 0;


      $scope.getemployee = function()
      {
        var obj = { page:$scope.page };
        $http({
          url: '<?php echo base_url(); ?>freelancer/getemployee-salary',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.load = 1;

            $scope.allemployee = response.data.result;
            $scope.start = response.data.start;
            if($scope.allemployee)
            {
              $scope.grosstotal = 0;
              $scope.netsalarytotal = 0;
              for(var i in $scope.allemployee)
              {
                $scope.grosstotal = +$scope.grosstotal + +$scope.allemployee[i].salary;
                if($scope.allemployee[i].customSalary != '')
                {
                $scope.netsalarytotal = +$scope.netsalarytotal + +$scope.allemployee[i].customSalary;
                }
                else
                {
                  $scope.netsalarytotal = +$scope.netsalarytotal + +$scope.allemployee[i].netsalary;
                }

              }
            }

          }
        });

      }



      $scope.addSalary = function(id,date)
      {
        $scope.userId =id;
        $scope.date = date;
        angular.element("#addSalary").modal('show');
      }

      $scope.calendaropen = function()
      {
        angular.element('#myModal').modal('show');
      }

      $scope.SaveSalary = function()
      {
        $scope.submitl = true;
        var error = false;
         $scope.netsalary = angular.element("#amount").val();

        if($scope.netsalary == '' && $scope.userId == '')
        {
          error = true;
        }

        if(error == true)
        {
          return false;
        }

        var obj = { netsalary:$scope.netsalary,userId:$scope.userId,date:$scope.date };
        angular.element('.preloader').show();
        $http({
          url: '<?php echo base_url(); ?>freelancer/netsalarySave',
          method: "POST",
          data: obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
          angular.element(".preloader").hide();
          if(response.data.success == "true")
          {
            angular.element('.preloader').hide();
            angular.element("#addSalary").modal('hide');
            angular.element("#amount").val('');
            $scope.netsalary ='';
            $scope.getemployee();
            $scope.allmonthSalary();

            $.notify("Net Salary Added Successfully", "success");

          }
          else if(response.data.success == "false")
          {
            $.notify("Net Salary Is Not Add", "error");
          }
          else if(response.data.error == "true")
          {
            $.notify("Net Salary is Already Exist", "error");
           }
        });
       }


       $scope.allmonthSalary = function()
       {
         var obj = {  page : $scope.page }
         $http({
           url: '<?php echo base_url(); ?>freelancer/getemployee-salary-monthwise',
           method: "POST",
           data:obj,
           headers: {
             'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
           }
         }).then(function(response) {

           if(response.data.message == "true")
           {
             $scope.load1 = 1;
             $scope.allmonth = response.data.result;
             if($scope.page == 1)
             $scope.pagination($scope.total);
             if($scope.allmonth)
             {
               for(var i in $scope.allmonth)
               {
                 $scope.allmonth[i]['totalgross'] = 0;
                 $scope.allmonth[i]['netsalarytotal'] = 0;
                 for(var j in $scope.allmonth[i].data)
                 {

                  $scope.allmonth[i]['totalgross']     = +$scope.allmonth[i]['totalgross'] + +$scope.allmonth[i].data[j].salary;
                  if($scope.allmonth[i].data[j].customSalary != '')
                  {
                  $scope.allmonth[i]['netsalarytotal'] = +$scope.allmonth[i]['netsalarytotal'] + +$scope.allmonth[i].data[j].customSalary;
                  }
                  else
                  {
                    $scope.allmonth[i]['netsalarytotal'] = +$scope.allmonth[i]['netsalarytotal'] + +$scope.allmonth[i].data[j].netsalary;

                  }
                }

               }
             }


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
               $scope.allmonthSalary();
             }
           });
         }
       }

       $scope.searchdate = function ()
       {
         error = false;
         $scope.startdate = angular.element(".saldates").val();
         if($scope.startdate == '')
         {
           error = true;
         }

         if(error == true)
         {
           return false;
         }

         var obj = {  startdate:$scope.startdate};

         $http({
           url: '<?php echo base_url(); ?>freelancer/searchSalary',
           method: "POST",
           data: obj,
           headers: {
             'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
           }
         }).then(function(response) {
           $scope.show = 1;

           if(response.data.message == "true")
           {
             $scope.datewisedata = response.data.result;

           }
           else
           {
             $scope.datewisedata = [];

           }

        });
      }


      $scope.getemployee();
      $scope.allmonthSalary();



    });
    // employee salary

    // Task detail
    // Employee task
    <?php
    if(!empty($taskId))
    {
      ?>
      var app37 = angular.module('myApp37',[])

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

      app37.filter('trustAsHtml',['$sce', function($sce) {

        return function(text) {

          return $sce.trustAsHtml(text);
        };
      }]);

      app37.filter('date', function () {
        return function (item) {
          var dates = new Date(Date.parse(item))
          var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
          return newDate;
        };
      });

      app37.filter('time', function () {

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

      app37.filter('htmlToPlaintext', function() {
        return function(text) {
          return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
        };
      });

      app37.directive('ngEnter', function () {
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

      app37.controller('myCtrt37', function($scope,$window,$http,$interval) {

        $scope.task = [];
        $scope.glued = true;
        $scope.file ='';



        $scope.gettask = function()
        {
          var obj = {  taskId : <?php if(!empty($taskId)){ echo $taskId; } ?> }
          $http({
            url: '<?php echo base_url(); ?>freelancer/gettask_detail',
            method: "POST",
            data:obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {

            if(response.data.message == "true")
            {
              $scope.task = response.data.result;
              $scope.getlog($scope.task.taskId);
            }
          });
        }

        $scope.getlog = function (taskId)
        {

          var  url= '<?php echo base_url(); ?>freelancer/getprojectlog/'+taskId;

          $http({
            url: url,
            method: "POST",
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {

            if(response.data.message == "true")
            {
              $scope.activity = response.data.result;

              // console.log($scope.activity);
            }

          });

        }

        $scope.comment = function(id)
        {
          $(".comment").hide();
          $(".cbt").hide();
          $(".comment"+id).attr('contenteditable','true');
          $(".comment"+id).show();
          $(".cbtn"+id).show();
        }

        $scope.submitcomment = function(id,rid,type)
        {

          var text1 = angular.element(".comment"+id).html();
          var text = $scope.removehtml(text1);
          //console.log(text);
          if(text != '')
          {
            var obj = { logType:'project',logSubType:'comment', logText : text,logReference : id }
            $http({
              url: '<?php echo base_url(); ?>freelancer/projectTaskcomment',
              method: "POST",
              data: obj,
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
              }
            }).then(function(response) {
              angular.element(".preloader").hide();
              if(response.data.message == "true")
              {
                // $.notify("Comment  Successfully Added", "success");
                var text = angular.element(".comment"+id).html('');
                $(".comment").hide();
                $(".cbt").hide();
                $scope.getlog($scope.task.taskId);
              }
            });

          }
        }

        $scope.removehtml = function(text)
        {
          return  text ? String(text).replace(/<[^>]+>&nbsp;/gm, '') : '';
        }

        $scope.submitMessage = function(id)
        {
          var text1 = angular.element(".message").val();
          var text = $scope.removehtml(text1);

          if(text != '')
          {
            var obj = { logType:'project',logSubType:'task', logText : text,logFile:$scope.file,logReference : id }
            $http({
              url: '<?php echo base_url(); ?>freelancer/projectTaskcomment',
              method: "POST",
              data: obj,
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
              }
            }).then(function(response) {
              angular.element(".preloader").hide();
              if(response.data.message == "true")
              {
                angular.element(".message").val('');
                $scope.getlog($scope.task.taskId);
              }
            });

          }
        }

        $scope.Attachment = function ($event) {
          $scope.attch = true;
          var files =$event.files;
          for (var i = 0; i < files.length; i++) {
            var f = files[i]
            var fileName = files[i].name;
            var filePath = fileName;
            //console.log(filePath);
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var d = JSON.stringify({ image :  e.target.result });
              $http({
                url: '<?php echo base_url(); ?>freelancer/taskAttachment',
                method: "POST",
                data: d,
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                $scope.file = response.data;
                $scope.attch = false;
              });

            });
            fileReader.readAsDataURL(f);
          }

        }

        $scope.gettask();

      });
      <?php } ?>
      // Task detail

      // resignation
      var app38 = angular.module('myApp38',[])

      app38.directive('numbersOnly', function() {
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

      app38.directive('ckEditor', function () {

      return {
      require: '?ngModel',
      link: function (scope, elm, attr, ngModel) {
        var ck = CKEDITOR.replace(elm[0]);
        if (!ngModel) return;
        ck.on('instanceReady', function () {
          ck.setData(ngModel.$viewValue);
        });
        function updateModel() {
          scope.$apply(function () {
            ngModel.$setViewValue(ck.getData());
          });
        }
        ck.on('change', updateModel);
        ck.on('key', updateModel);
        ck.on('dataReady', updateModel);

        ngModel.$render = function (value) {
          ck.setData(ngModel.$viewValue);
        };
      }
      };
      });

      // ck editor



      app38.filter('trustAsHtml',['$sce', function($sce) {
       return function(text)
       {
       return $sce.trustAsHtml(text);
       };
      }]);



      app38.filter('date', function () {
        return function (item) {
          const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
          "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
        ];
        var dates = new Date(Date.parse(item))
        var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
        return newDate;
      };
      });




      app38.directive('ngEnter', function () {
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

      app38.controller('myCtrt38', function($scope,$window,$http,$interval) {

        $scope.remarks = '';
        $scope.term = '';
        $scope.resignation = [];
        $scope.time = [];
        $scope.page = 1;
        $scope.perpage = 10;
        $scope.disabled =0;

        $scope.checkedterm = function ($event)
        {
          if($event.target.checked ==  true)
          {
            $scope.term="1";
          }
          else
          {
            $scope.term = '';
          }
        }

        $scope.submitResignation = function()
        {
          $scope.submitp = true;
          var error = false;
          // $scope.remarks = angular.element('#remarks').val();
          $scope.remarks = CKEDITOR.instances['remarks'].getData();


          if($scope.remarks == '' || $scope.term == '')
          {
            error = true;
          }

          if(error == true)
          {
            return false;
          }

          var obj = { remarks:$scope.remarks };
          angular.element('.preloader').show();
          $http({
            url: '<?php echo base_url(); ?>freelancer/resignationSave',
            method: "POST",
            data: obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              $.notify("Resignation Added Successfully", "success");

              angular.element('.preloader').hide();
              $scope.remarks ='';
              $scope.term ='';
              angular.element("#term").prop("checked", false);
              $scope.submitp = false;
              // $scope.getresignation();
              $interval(callAtInterval, 2000);
             function callAtInterval()
             {
              $window.location.href = '<?php echo base_url(); ?>freelancer/resignation';
             }

            }
          });

        }

        $scope.getresignation = function()
        {
          var obj = { page :$scope.page,perpage:$scope.perpage };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getresignation',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              $scope.resignation = response.data.result;
              $scope.total      = response.data.pcount;
              $scope.start      = response.data.start;

              if($scope.resignation[0].status == 0 || $scope.resignation[0].status == 1)
              {
                $scope.disabled = 1;
              }

              if($scope.page == 1)
              $scope.pagination($scope.total);

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
                $scope.getresignation();
              }
            });
          }
        }

        $scope.getresignationtime = function()
        {
          $http({
            url: '<?php echo base_url(); ?>freelancer/getresignationTime',
            method: "POST",
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              $scope.time = response.data.result;
            }
          });

        }

        $scope.rejectionreason = function(id)
        {
          var obj = { id :id };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getresignationreason',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.success == "true")
            {
             $scope.leavedata = response.data.result;
              angular.element('#rejection').modal('show');
            }
          });
        }

        $scope.getresignation();
        $scope.getresignationtime();


      });
      // resignation

      // resignation list
      var app39 = angular.module('myApp39',[])

      app39.directive('numbersOnly', function() {
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

      app39.filter('trustAsHtml',['$sce', function($sce) {
       return function(text)
       {
       return $sce.trustAsHtml(text);
       };
      }]);

      app39.directive('mydatepicker', function () {
      return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModelCtrl) {
          element.datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 0,
            // changeMonth: true,
            // changeYear: true,
            // yearRange: "1980:"+new Date().getFullYear(),
            onSelect: function (date) {
              scope.date = date;

              scope.$apply();
            }
          });
        }
      };
      });




      app39.filter('date', function () {
        return function (item) {
          const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
          "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
        ];
        var dates = new Date(Date.parse(item))
        var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
        return newDate;
      };
      });


      app39.directive('ngEnter', function () {
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

      app39.controller('myCtrt39', function($scope,$window,$http,$interval) {

        $scope.page = 1;
        $scope.resignation = [];
        $scope.total = '';
        $scope.status = '';
        $scope.id = '';
        $scope.userId = '';
        $scope.start = '';
        $scope.perpage =10;
        $scope.editdata = [];
        $scope.relievingdate = '';


        $scope.getresignation = function()
        {
          var obj = { page :$scope.page,perpage:$scope.perpage };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getallresignation',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              $scope.resignation = response.data.result;
              $scope.total      = response.data.pcount;
              $scope.start      = response.data.start;

              if($scope.page == 1)
              $scope.pagination($scope.total);

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
                $scope.getresignation();
              }
            });
          }
        }

        $scope.confirm = function(status,id,userId)
        {
          $scope.status = status;
          $scope.id = id;
          $scope.userId = userId;
          angular.element('#confirm').modal('show');
        }

        $scope.statusUpdate = function($event)
        {
          var a = angular.element($event);
          var b = a[0].selectedOptions[0];
          $scope.id = b.getAttribute('data-id');
          $scope.userId = b.getAttribute('data-user');
          $scope.status = $event.value;
          if($scope.status == 1)
          {
          var obj = { id :$scope.id,status:$scope.status,userId:$scope.userId };
          angular.element(".preloader").show();

          $http({
            url: '<?php echo base_url(); ?>freelancer/resignationStatus',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              angular.element('#confirm').modal('hide');
              if($scope.status == 1)
              {
              $.notify("Resignation Accepted Successfully", "success");
              }
              $scope.getresignation();
              }
           });
          }
          else if($scope.status == 2 || $scope.status == 3)
          {
             angular.element('#reasonbox').modal('show');
          }
        }

        $scope.reasonUpdate = function ()
        {
          $scope.submitl = true;
          var error = false;
          $scope.reason = angular.element('#reason').val();
          if($scope.reason == '')
          {
            error = true;
          }

          if(error == true)
          {
            return false;
          }
          var obj = { id :$scope.id,status:$scope.status,userId:$scope.userId,reason:$scope.reason };
          angular.element(".preloader").show();

          $http({
            url: '<?php echo base_url(); ?>freelancer/resignationReason',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              if($scope.status == 2)
              {
                $.notify("Resignation Rejected Successfully","success");
              }
              else if($scope.status == 3)
              {
                $.notify("Resignation  Cancelled Successfully","success");
              }
              $scope.getresignation();
              angular.element('#reasonbox').modal('hide');
              angular.element('#reason').val('');

            }
          });
        }

    $scope.changePerPage = function ($event)
     {
      $scope.perpage = $event.value;
      $scope.page = 1;
      $scope.getresignation();
    }

    $scope.edit = function (id)
    {
      var obj = { id :id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/resignationEdit',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.message == "true")
        {
          $scope.editdata = response.data.result;
          $scope.relievingdate = $scope.editdata.leaveDate;

          angular.element('#edit').modal('show');
        }

      });
      }

      $scope.update = function ()
      {
        $scope.submit = true;
        var error = false;
        $scope.relievingdate = angular.element('#relievingdate').val();
        if($scope.relievingdate == '')
        {
          error = true;
        }
        if(error == true)
        {
          return false;
        }
        var obj = { id :$scope.editdata.id,leaveDate:$scope.relievingdate };
        $http({
          url: '<?php echo base_url(); ?>freelancer/resignationUpdate',
          method: "POST",
          data :obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
          angular.element(".preloader").hide();
          if(response.data.message == "true")
          {
            angular.element('#edit').modal('hide');
            $scope.getresignation();
             $.notify("Relieving Date Changed Successfully", "success");
          }

        });
        }

        $scope.rejectionreason = function(id)
        {
          var obj = { id :id };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getresignationreason',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.success == "true")
            {
             $scope.leavedata = response.data.result;
              angular.element('#rejection').modal('show');
            }
          });
        }

        $scope.getresignation();


      });
      // resignation list

      // leave
      var app40 = angular.module('myApp40',[])

      app40.directive('numbersOnly', function() {
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



      app40.filter('date', function () {
        return function (item) {
          const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
          "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
        ];
        var dates = new Date(Date.parse(item))
        var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
        return newDate;
      };
      });

      app40.directive('mydatepicker', function () {
        return {
          restrict: 'A',
          require: 'ngModel',
          link: function (scope, element, attrs, ngModelCtrl) {
            element.datepicker({
              dateFormat: 'dd-mm-yy',
              minDate: 0,
              onSelect: function (date) {
                scope.date = date;
                scope.$apply();
              }
            });
          }
        };
      });

      app40.directive('mydatepicker1', function () {
        return {
          restrict: 'A',
          require: 'ngModel',
          link: function (scope, element, attrs, ngModelCtrl) {
            element.datepicker({
              dateFormat: 'dd-mm-yy',
              minDate: 0,
              onSelect: function (date) {
                scope.date = date;
                scope.$apply();
              }
            });
          }
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

      app40.controller('myCtrt40', function($scope,$window,$http,$interval) {

        $scope.page = 1;
        $scope.leave = [];
        $scope.total = '';
        $scope.status = '';
        $scope.id = '';
        $scope.userId = '';
        $scope.remark = '';
        $scope.date = '';
        $scope.type = '';
        $scope.date1 = '';
        $scope.start = '';

        $scope.editleave1 ='';
        $scope.remark1 = '';
        $scope.date11 = '';
        $scope.type1 = '';
        $scope.date12 = '';
        $scope.allleavetype = [];
        $scope.perpage=10;

        $http({
          url: '<?php echo base_url(); ?>freelancer/allleavetype',
          method: "POST",
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          $scope.allleavetype = response.data.result;

        });

        $scope.submitleave = function()
        {
          $scope.submitl = true;
          var error = false;
          $scope.remark = angular.element('#remark').val();
          $scope.date = angular.element('#date').val();
          $scope.type = angular.element('#type').val();
          $scope.date1 = angular.element('#date1').val();


          if($scope.remark == '' || $scope.date == '' || $scope.type == '' || $scope.date1 == '')
          {
            error = true;
          }

          if(error == true)
          {
            return false;
          }

          var obj = { remark:$scope.remark,date:$scope.date,type:$scope.type,date1:$scope.date1 };
          angular.element('.preloader').show();
          $http({
            url: '<?php echo base_url(); ?>freelancer/employee-leave-save',
            method: "POST",
            data: obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              angular.element('.preloader').hide();
              angular.element('#addleave').modal('hide');
              $scope.remark ='';
              $scope.date ='';
              $scope.type ='';
              $scope.date1 ='';
              $scope.getleave();
              $scope.submitl = false;

              $.notify("Leave Added Successfully", "success");

            }
            else if(response.data.already == "true")
            {
              $.notify("Leave Already Exists", "error");
            }
            else if(response.data.notavailble == "true")
            {
              $.notify("Leave is not Available", "error");
            }
          });

        }


        $scope.getleave = function()
        {
          var obj = { page :$scope.page,perpage:$scope.perpage };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getemployee_leave',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              $scope.leave = response.data.result;
              $scope.total      = response.data.pcount;
              $scope.start = response.data.start;

              if($scope.page == 1)
              $scope.pagination($scope.total);

            }
          });
        }

        $scope.pagination = function ($event)
        {
          if($scope.total > $scope.perpage)
          {
            $('#pagination').pagination({
              items: $event,
              itemsOnPage: 10,
              cssStyle: 'light-theme',
              onPageClick:  function (e) {
                $scope.page  = e;
                $scope.getleave();
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
     $scope.getleave();

  }

        $scope.confirm = function(status,id,userId)
        {
          $scope.status = status;
          $scope.id = id;
          $scope.userId = userId;
          angular.element('#confirm').modal('show');
        }

        $scope.statusUpdate = function()
        {
          angular.element('#confirm').modal('hide');
          var obj = { id :$scope.id,status:$scope.status,userId:$scope.userId };
          angular.element(".preloader").show();

          $http({
            url: '<?php echo base_url(); ?>freelancer/resignationStatus',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              angular.element('#confirm').modal('hide');
              $.notify("Resignation Status Updated Successfully", "success");
              $scope.getresignation();


            }
          });
        }


        $scope.editleave = function(id)
        {
          var obj = { id :id };
          $http({
            url: '<?php echo base_url(); ?>freelancer/editleave',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              $scope.editleave1 = response.data.result;
              $scope.remark1 = $scope.editleave1.remark;
              $scope.date11 = $scope.editleave1.date;
              $scope.type1 = $scope.editleave1.type;
              $scope.date12 = $scope.editleave1.date1;
              angular.element('#date11').val($scope.date11);
              angular.element('#date12').val($scope.date12);
              angular.element('#editleave').modal('show');

            }
          });
        }

        $scope.updateleave = function()
        {
          $scope.submitl = true;
          var error = false;
          $scope.remark1 = angular.element('#remark1').val();
          $scope.date11 = angular.element('#date11').val();
          $scope.type1 = angular.element('#type1').val();
          $scope.date12 = angular.element('#date12').val();


          if($scope.remark1 == '' || $scope.date11 == '' || $scope.type1 == '' || $scope.date12 == '')
          {
            error = true;
          }

          if(error == true)
          {
            return false;
          }

          var obj = { id:$scope.editleave1.id,remark:$scope.remark1,date:$scope.date11,type:$scope.type1,date1:$scope.date12 };
          angular.element('.preloader').show();
          $http({
            url: '<?php echo base_url(); ?>freelancer/updateleave',
            method: "POST",
            data: obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              angular.element('.preloader').hide();
              angular.element('#editleave').modal('hide');
              $scope.remark1 ='';
              $scope.date11 ='';
              $scope.type1 ='';
              $scope.date12 ='';
              $scope.getleave();
              $scope.submitl = false;

              $.notify("Leave Updated Successfully", "success");

            }
            else if(response.data.already == "true")
            {
              $.notify("Leave Already Exists", "error");
            }
          });

        }


        $scope.getleave();


      });
      // leave

      // get all leave list
      var app41 = angular.module('myApp41',[])

      app41.directive('numbersOnly', function() {
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


      app41.filter('date', function () {
        return function (item) {
          const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
          "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
        ];
        var dates = new Date(Date.parse(item))
        var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
        return newDate;
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

      app41.controller('myCtrt41', function($scope,$window,$http,$interval) {

        $scope.page = 1;
        $scope.leave = [];
        $scope.total = '';
        $scope.status = '';
        $scope.id = '';
        $scope.userId = '';
        $scope.start ='';
        $scope.perpage = 10;
        $scope.allteam = [];
        $scope.leavedata = [];


        $scope.getleave = function()
        {
          var obj = { page :$scope.page,perpage:$scope.perpage };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getallemployeeleave',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              $scope.leave = response.data.result;
              $scope.total      = response.data.pcount;
              $scope.start = response.data.start;

              if($scope.page == 1)
              $scope.pagination($scope.total);

            }
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
                $scope.getleave();
              }
            });
          }
          else
          {
            $("#pagination").html('');
          }
        }

        $scope.confirm = function(status,id,userId)
        {
          $scope.status = status;
          $scope.id = id;
          $scope.userId = userId;
          angular.element('#confirm').modal('show');
        }

        $scope.statusUpdate = function()
        {
          angular.element('#confirm').modal('hide');
          var obj = { id :$scope.id,status:$scope.status,userId:$scope.userId };
          angular.element(".preloader").show();

          $http({
            url: '<?php echo base_url(); ?>freelancer/leaveStatus',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              if($scope.status == 1)
              {
              $.notify("Leave Status Approved Successfully", "success");
              }
              else if($scope.status == 2)
              {
                $.notify("Leave Status Declined Successfully", "success");
              }
              else if($scope.status == 3)
              {
               $.notify("Leave Status Cancelled Successfully", "success");
              }
              $scope.getleave();


            }
          });
        }

        $scope.rejectionreason = function(id)
        {
          var obj = { id :id };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getrejectionreason',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.success == "true")
            {
             $scope.leavedata = response.data.result;
              angular.element('#rejection').modal('show');
            }
          });
        }


        $scope.changePerPage = function ($event)
        {
          $scope.perpage = $event.value;
          $scope.page = 1;

          $scope.getleave();

        }

        $scope.getteam = function()
        {
          $http({
            url: '<?php echo base_url(); ?>freelancer/allteam',
            method: "POST",
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              $scope.allteam = response.data.result;
            }
            else
            {
              $scope.allteam = [];
            }
          });
        }

        $scope.leaveassign = function ($event)
        {
          var reviewer = $event.value;
          var a = angular.element($event);
          var b = a[0].selectedOptions[0];
          var id = b.getAttribute('data-id');

          if(reviewer != '')
          {
          var obj = {  id  : id,reviewerId:reviewer };
          $http({
            url: '<?php echo base_url(); ?>freelancer/assignLeave',
            method: "POST",
            data: obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
              if(response.data.success == "true")
             {
               $.notify("Leave Assigned  Successfully", "success");
              }
            });
          }
        }



        $scope.getteam();
        $scope.getleave();


      });
      // get all leave list

      // leave
      var app42 = angular.module('myApp42',[])

      app42.directive('numbersOnly', function() {
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



      app42.filter('date', function () {
        return function (item) {
          var dates = new Date(Date.parse(item))
          var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
          return newDate;
        };
      });

      app42.directive('mydatepicker', function () {
        return {
          restrict: 'A',
          require: 'ngModel',
          link: function (scope, element, attrs, ngModelCtrl) {
            element.datepicker({
              dateFormat: 'dd-mm-yy',
              minDate: 0,
              onSelect: function (date) {
                scope.date = date;
                scope.$apply();
              }
            });
          }
        };
      });



      app42.directive('ngEnter', function () {
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

      app42.controller('myCtrt42', function($scope,$window,$http,$interval) {

        $scope.page = 1;
        $scope.leave = [];
        $scope.total = '';
        $scope.status = '';
        $scope.id = '';
        $scope.userId = '';
        $scope.title = '';
        $scope.title1 = '';
        $scope.start = '';
        $scope.totalemp = 0;
        $scope.perpage = 10;

        $scope.submitdepartment = function()
        {
          $scope.submitl = true;
          var error = false;
          $scope.title = angular.element('#title').val();


          if($scope.title == '')
          {
            error = true;
          }

          if(error == true)
          {
            return false;
          }

          var obj = { department:$scope.title };
          angular.element('.preloader').show();
          $http({
            url: '<?php echo base_url(); ?>freelancer/savedepartment',
            method: "POST",
            data: obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              angular.element('.preloader').hide();
              angular.element('#adddepartment').modal('hide');
              $scope.title ='';
              $scope.getdepartment();
              $scope.submitl = false;

              $.notify("Department Added Successfully", "success");

            }
            else if(response.data.already == "true")
            {
              $.notify("Department Already Exists", "error");
            }
          });

        }


        $scope.getdepartment = function()
        {
          var obj = { page :$scope.page,perpage:$scope.perpage };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getdepartment',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              $scope.department = response.data.result;
              $scope.total      = response.data.pcount;
              $scope.start = response.data.start;

              if($scope.page == 1)
              $scope.pagination($scope.total);
              if($scope.department)
              {
                $scope.totalemp = 0;
                for(var i in $scope.department)
                {
                  $scope.totalemp = $scope.totalemp + $scope.department[i].employee;
                }
              }
            }
            else
            {
              $scope.department = [];
            }
          });
        }

        $scope.pagination = function ($event)
        {
          if($scope.total > $scope.perpage)
          {
            $('#pagination').pagination({
              items: $event,
              itemsOnPage: 10,
              cssStyle: 'light-theme',
              onPageClick:  function (e) {
                $scope.page  = e;
                $scope.getdepartment();
              }
            });
          }
          else
          {
          $("#pagination").html('');
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
            url: '<?php echo base_url(); ?>freelancer/deletedepartment',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              angular.element('#confirm').modal('hide');
              $.notify("Department Deleted Successfully", "success");
              $scope.page =1;
              $scope.getdepartment();
            }
          });
        }


        $scope.editdepartment = function(id)
        {
          var obj = { id :id };
          $http({
            url: '<?php echo base_url(); ?>freelancer/editdepartment',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              $scope.editleave1 = response.data.result;
              $scope.title1 = $scope.editleave1.department;
              angular.element('#editdepartment').modal('show');

            }
          });
        }

        $scope.updatedepartment = function()
        {
          $scope.submitl = true;
          var error = false;
          $scope.title1 = angular.element('#title1').val();


          if($scope.title1 == '')
          {
            error = true;
          }

          if(error == true)
          {
            return false;
          }

          var obj = { id:$scope.editleave1.id,department:$scope.title1 };
          angular.element('.preloader').show();
          $http({
            url: '<?php echo base_url(); ?>freelancer/updatedepartment',
            method: "POST",
            data: obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              angular.element('.preloader').hide();
              angular.element('#editdepartment').modal('hide');
              $scope.title1 ='';
              $scope.getdepartment();
              $scope.submitl = false;

              $.notify("Department Updated Successfully", "success");

            }
            else if(response.data.already == "true")
            {
              $.notify("Department Already Exists", "error");
            }
          });

        }

        $scope.changePerPage = function ($event)
        {
          $scope.perpage = $event.value;
          $scope.page = 1;
          $scope.getdepartment();

        }




        $scope.getdepartment();


      });
      // department

      // leave type
      var app43 = angular.module('myApp43',[])

      app43.directive('numbersOnly', function() {
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



      app43.filter('date', function () {
        return function (item) {
          var dates = new Date(Date.parse(item))
          var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
          return newDate;
        };
      });

      app43.directive('mydatepicker', function () {
        return {
          restrict: 'A',
          require: 'ngModel',
          link: function (scope, element, attrs, ngModelCtrl) {
            element.datepicker({
              dateFormat: 'dd-mm-yy',
              minDate: 0,
              onSelect: function (date) {
                scope.date = date;
                scope.$apply();
              }
            });
          }
        };
      });



      app43.directive('ngEnter', function () {
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

      app43.controller('myCtrt43', function($scope,$window,$http,$interval) {

        $scope.page = 1;
        $scope.leavetype = [];
        $scope.total = '';
        $scope.status = '';
        $scope.id = '';
        $scope.userId = '';
        $scope.title = '';
        $scope.title1 = '';
        $scope.reoccuring = '';
        $scope.reoccuring1 = '';
        $scope.reoccuringType = '';
        $scope.reoccuringType1 = '';

        $scope.duration = '';
        $scope.durationtype = '';
        $scope.duration1 = '';
        $scope.durationtype1 = '';
        $scope.start = '';
        $scope.perpage = 10;

        $scope.submitleavetype = function()
        {
          $scope.submitl = true;
          var error = false;
          $scope.title = angular.element('#title').val();
          $scope.duration = angular.element('#duration').val();
          $scope.durationType = angular.element('#durationType').val();
          $scope.reoccuring = angular.element('#reoccuring').val();
          $scope.reoccuringType = angular.element('#reoccuringType').val();

          if($scope.title == '' || $scope.duration == '' || $scope.durationType == '' || $scope.reoccuring == '' || $scope.reoccuringType == '')
          {
            error = true;
          }

          if(error == true)
          {
            return false;
          }

          var obj = { type:$scope.title,duration:$scope.duration,durationType:$scope.durationType,reoccuring:$scope.reoccuring,reoccuringType:$scope.reoccuringType };
          angular.element('.preloader').show();
          $http({
            url: '<?php echo base_url(); ?>freelancer/saveleavetype',
            method: "POST",
            data: obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              angular.element('.preloader').hide();
              angular.element('#addleavetype').modal('hide');
              $scope.title ='';
              $scope.duration ='';
              $scope.durationType ='';
              $scope.reoccuring ='';
              $scope.reoccuringType ='';

              $scope.getleavetype();
              $scope.submitl = false;

              $.notify("Leave Configuration Added Successfully", "success");

            }
            else if(response.data.already == "true")
            {
              $.notify("Leave Type Already Exists", "error");
            }
          });

        }


        $scope.getleavetype = function()
        {
          var obj = { page :$scope.page,perpage:$scope.perpage };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getleavetype',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              $scope.leavetype = response.data.result;
              $scope.total      = response.data.pcount;
              $scope.start      = response.data.start;

              if($scope.page == 1)
              $scope.pagination($scope.total);
            }
            else
            {
              $scope.leavetype = [];
            }
          });
        }

        $scope.pagination = function ($event)
        {
          if($scope.total > $scope.perpage)
          {
            $('#pagination').pagination({
              items: $event,
              itemsOnPage: 10,
              cssStyle: 'light-theme',
              onPageClick:  function (e) {
                $scope.page  = e;
                $scope.getleavetype();
              }
            });
          }
          else{
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
            url: '<?php echo base_url(); ?>freelancer/deleteleavetype',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              angular.element('#confirm').modal('hide');
              $.notify("Leave Configuration Deleted Successfully", "success");
              $scope.page  = 1;
              $scope.getleavetype();
            }
          });
        }


        $scope.editleavetype = function(id)
        {
          var obj = { id :id };
          $http({
            url: '<?php echo base_url(); ?>freelancer/editleavetype',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              $scope.editleave1 = response.data.result;
              $scope.title1 = $scope.editleave1.type;
              $scope.duration1 = $scope.editleave1.duration;
              $scope.durationType1 = $scope.editleave1.durationType;
              $scope.reoccuring1 = $scope.editleave1.reoccuring;
              $scope.reoccuringType1 = $scope.editleave1.reoccuringType;
              angular.element('#editleavetype').modal('show');

            }
          });
        }

        $scope.updateleavetype = function()
        {
          $scope.submitl = true;
          var error = false;
          $scope.title1 = angular.element('#title1').val();
          $scope.duration1 = angular.element('#duration1').val();
          $scope.durationType1 = angular.element('#durationType1').val();
          $scope.reoccuring = angular.element('#reoccuring1').val();
          $scope.reoccuringType = angular.element('#reoccuringType1').val();

          if($scope.title1 == '' || $scope.duration1 == '' || $scope.durationType1 == '' || $scope.reoccuring1 == '' || $scope.reoccuringType1 == '')
          {
            error = true;
          }
          if(error == true)
          {
            return false;
          }
          var obj = { id:$scope.editleave1.id , type:$scope.title1,duration:$scope.duration1,durationType:$scope.durationType1,reoccuring:$scope.reoccuring1,reoccuringType:$scope.reoccuringType1 };

          angular.element('.preloader').show();
          $http({
            url: '<?php echo base_url(); ?>freelancer/updateleavetype',
            method: "POST",
            data: obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            angular.element(".preloader").hide();
            if(response.data.message == "true")
            {
              angular.element('.preloader').hide();
              angular.element('#editleavetype').modal('hide');
              $scope.title1 ='';
              $scope.getleavetype();
              $scope.submitl = false;

              $.notify("Leave Configuration Successfully", "success");

            }
            else if(response.data.already == "true")
            {
              $.notify("Leave Configuration Already Exists", "error");
            }
          });

        }

    $scope.changePerPage = function ($event)
    {
    $scope.perpage = $event.value;
    $scope.page = 1;
    $scope.getleavetype();
    }

    $scope.getleavetype();



      });

      // leave type

      // holidays
      var app44 = angular.module('myApp44',[])

      app44.directive('numbersOnly', function() {
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



      app44.filter('date', function () {
        return function (item) {
          const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
          "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
        ];
        var dates = new Date(Date.parse(item))
        var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
        return newDate;
      };
    });

    app44.filter('date1', function () {
      return function (item) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
      ];
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
      return newDate;
    };
  });

  app44.filter('time', function () {
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
      //console.log(time);
      return time;
    };
  });

    app44.directive('mydatepicker', function () {
      return {
        restrict: 'A',
        require: 'ngModel',
        link: function (scope, element, attrs, ngModelCtrl) {
          element.datepicker({
            dateFormat: 'dd-mm-yy',
            // minDate: 0,
            onSelect: function (date) {
              scope.date = date;
              scope.$apply();
            }
          });
        }
      };
    });



    app44.directive('ngEnter', function () {
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

    app44.controller('myCtrt44', function($scope,$window,$http,$interval) {

      $scope.page = 1;
      $scope.holiday = [];
      $scope.total = '';
      $scope.status = '';
      $scope.id = '';
      $scope.userId = '';
      $scope.title = '';
      $scope.title1 = '';
      $scope.editholiday1 = '';
      $scope.date = '';
      $scope.date1 = '';
      $scope.start = '';
      $scope.type ='';
      $scope.type1 ='';
      $scope.perpage = 10;

      $scope.submitholiday = function()
      {
        $scope.submitl = true;
        var error = false;
        $scope.title = angular.element('#title').val();
        $scope.date = angular.element('#date').val();
        $scope.type = angular.element('#type').val();
        if($scope.title == '' || $scope.date == '' || $scope.type == '' )
        {
          error = true;
        }

        if(error == true)
        {
          return false;
        }


        var obj = { title:$scope.title,date:$scope.date,type:$scope.type };
        angular.element('.preloader').show();
        $http({
          url: '<?php echo base_url(); ?>freelancer/holidaySave',
          method: "POST",
          data: obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
          angular.element(".preloader").hide();
          if(response.data.message == "true")
          {
            angular.element('.preloader').hide();
            angular.element('#addholiday').modal('hide');
            $scope.title ='';
            $scope.date ='';
            $scope.type ='';
            $scope.getholiday();
            $scope.submitl = false;

            $.notify("Holiday Added Successfully", "success");

          }
          else if(response.data.already == "true")
          {
            $.notify("Holiday Already Exists", "error");
          }
        });

      }


      $scope.getholiday = function()
      {
        var obj = { page :$scope.page,perpage:$scope.perpage };
        $http({
          url: '<?php echo base_url(); ?>freelancer/getholiday',
          method: "POST",
          data :obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
          if(response.data.message == "true")
          {
            $scope.holiday = response.data.result;
            $scope.start = response.data.start;
            $scope.total      = response.data.pcount;

            if($scope.page == 1)
            $scope.pagination($scope.total);
          }
          else
          {
            $scope.holiday = [];
          }
        });
      }

      $scope.pagination = function ($event)
      {
        if($scope.total > $scope.perpage)
        {
          $('#pagination').pagination({
            items: $event,
            itemsOnPage: 10,
            cssStyle: 'light-theme',
            onPageClick:  function (e) {
              $scope.page  = e;
              $scope.getholiday();
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
          url: '<?php echo base_url(); ?>freelancer/deleteholiday',
          method: "POST",
          data :obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
          if(response.data.message == "true")
          {
            angular.element('#confirm').modal('hide');
            $.notify("Holiday Deleted Successfully", "success");
            $scope.page  = 1;
            $scope.getholiday();
          }
        });
      }


      $scope.editholiday = function(id)
      {
        var obj = { id :id };
        $http({
          url: '<?php echo base_url(); ?>freelancer/editholiday',
          method: "POST",
          data :obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
          if(response.data.message == "true")
          {
            $scope.editholiday1 = response.data.result;
            $scope.title1 = $scope.editholiday1.title;
            $scope.date1 = $scope.editholiday1.date;
            $scope.type1 = $scope.editholiday1.type;
            angular.element('#editholiday').modal('show');

          }
        });
      }

      $scope.updateholiday = function()
      {
        $scope.submitl = true;
        var error = false;
        $scope.title1 = angular.element('#title1').val();

        $scope.date1 = angular.element('#date1').val();
        $scope.type1 = angular.element('#type1').val();

        if($scope.title1 == '' || $scope.date1 =='' || $scope.type1 =='')
        {
          error = true;
        }
        if(error == true)
        {
          return false;
        }
        var obj = { id:$scope.editholiday1.id,title:$scope.title1,date:$scope.date1,type:$scope.type1 };

        angular.element('.preloader').show();
        $http({
          url: '<?php echo base_url(); ?>freelancer/updateholiday',
          method: "POST",
          data: obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
          angular.element(".preloader").hide();
          if(response.data.message == "true")
          {
            angular.element('.preloader').hide();
            angular.element('#editholiday').modal('hide');
            $scope.title1 ='';
            $scope.date1 ='';
            $scope.getholiday();
            $scope.submitl = false;

            $.notify("Holiday Updated Successfully", "success");

          }
        });

      }

      $scope.changePerPage = function ($event)
       {
          $scope.perpage = $event.value;
          $scope.page = 1;
          $scope.getholiday();
       }
      $scope.getholiday();


    });
    // holidays

    // todo list
    // holidays
    var app45 = angular.module('myApp45',[])

    app45.directive('numbersOnly', function() {
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



    app45.filter('date', function () {
      return function (item) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
      ];
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
      return newDate;
    };
  });

  app45.directive('mydatepicker', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
          dateFormat: 'dd-mm-yy',
           minDate: 0,
          onSelect: function (date) {
            scope.date = date;
            scope.$apply();
          }
        });
      }
    };
  });

  app45.directive('mydatepicker1', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
          dateFormat: 'dd-mm-yy',
           minDate: 0,
          onSelect: function (date) {
            scope.date = date;
            scope.$apply();
          }
        });
      }
    };
  });



  app45.directive('ngEnter', function () {
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

  app45.controller('myCtrt45', function($scope,$window,$http,$interval) {

    $scope.page = 1;
    $scope.alltodo = [];
    $scope.currenttodo = [];
    $scope.total = '';
    $scope.status = '';
    $scope.id = '';
    $scope.userId = '';
    $scope.name = '';
    $scope.priority = '';
    $scope.department = '';
    $scope.team = '';
    $scope.description = '';
    $scope.status = '';
    $scope.date = '';
    $scope.duedate = '';
    $scope.file ='';
    $scope.loader = 0;
    $scope.cloader = 0;
    $scope.ctotal = '';
    $scope.cperpage = 10;
    $scope.cpage = 1;
    $scope.cstart ='';
    $scope.cspriority ='';
    $scope.csstatus ='';
    $scope.spriority ='';
    $scope.sstatus ='';

    $scope.name1 = '';
    $scope.priority1 = '';
    $scope.department1 = '';
    $scope.team1 = '';
    $scope.description1 = '';
    $scope.status1 = '';
    $scope.date1 = '';
    $scope.duedate1 = '';

    $scope.edittodo = '';
    $scope.start = '';
    $scope.alldepartment =[];
    $scope.allteam = [];
    $scope.userId = '';
    $scope.checked = false;

    $scope.taskstartkey = '';
    $scope.taskstartId = '';
    $scope.perpage = 10;
    $scope.pendingtask = '';
    $scope.activetask = '';
    $scope.type = '';
    $scope.disabled =0;
    $scope.check = false;


    $scope.todoopen = function ()
    {
      $scope.submitl = false;
      $scope.name = '';
      $scope.priority = '';
      $scope.department = '';
      $scope.team = '';
      $scope.description = '';
      $scope.status = '';
      $scope.date = '';
      $scope.allteam = [];
      $scope.file ='';
      angular.element('#addtodo').modal('show');
    }

    // $interval(setTime, 1000);
    // $interval(taskstop1,240000);

    // function taskstop1()
    // {
    //   if($scope.taskstartId != '')
    //    {
    //     var obj = {  todoId : $scope.taskstartId,type:1 }
    //     $http({
    //       url: '<?php echo base_url(); ?>freelancer/todotaskStop',
    //       method: "POST",
    //       data:obj,
    //       headers: {
    //         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    //       }
    //     }).then(function(response) {
    //
    //     });
    //   }
    //
    // }


    function setTime()
    {
      $scope.totalSeconds++;
      $scope.seconds = $scope.pad(+$scope.totalSeconds % 60);
      $scope.minutes = $scope.pad(parseInt(+$scope.totalSeconds / 60));
    }


    $scope.pad = function(val)
    {
      var valString = val + "";
      if (valString.length < 2)
      {
        return "0" + valString;
      }
      else
      {
        return valString;
      }
    }


    $http({
      url: '<?php echo base_url(); ?>freelancer/alldepartment',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
     if(response.data.message == "true")
     {
      $scope.alldepartment = response.data.result;
      }

    });

    $http.get("<?php echo base_url(); ?>freelancer/getsession")
    .then(function(response)
    {
      $scope.userId = response.data.userid;

    });

    $scope.getteam = function ($event)
    {
      var  id = angular.element($event).val();

      var obj = {  id : id  };

      $http({
        url: '<?php echo base_url(); ?>freelancer/getdepartmentbyteam',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        $scope.allteam = response.data.result;
      });
    }

    $scope.submittodo = function()
    {
      $scope.submitl = true;
      var error = false;
      $scope.date = angular.element('#date').val();
      $scope.duedate = angular.element('#duedate').val();
      // $scope.file == ''
      if($scope.name == '' || $scope.priority == '' || $scope.department == '' || $scope.team == '' || $scope.description == ''  || $scope.date == '' || $scope.duedate == '' )
      {
        error = true;
      }

      if(error == true)
      {
        return false;
      }


      var obj = { name:$scope.name,startDate:$scope.date,dueDate:$scope.duedate,priority:$scope.priority,dept:$scope.department,assignedTo:$scope.team,status:'2',description:$scope.description,file:$scope.file };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/todosave',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.message == "true")
        {
          angular.element('.preloader').hide();
          angular.element('#addtodo').modal('hide');

          $scope.gettodo();
          $scope.cgettodo();
          $scope.getactivetask();
          $scope.submitl = false;
          $scope.name = '';
          $scope.priority = '';
          $scope.department = '';
          $scope.team = '';
          $scope.description = '';
          $scope.status = '';
          $scope.date = '';
          $scope.allteam = [];
          $scope.file ='';

          $.notify("Task Added Successfully", "success");

        }
        else if(response.data.already == "true")
        {
          $.notify("Task Already exist", "error");
        }

      });

    }


    $scope.gettodo = function()
    {
      var obj = { page :$scope.page,perpage:$scope.perpage,status:$scope.sstatus,priority:$scope.spriority };
      $http({
        url: '<?php echo base_url(); ?>freelancer/gettodo',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.loader = 1;

          $scope.alltodo = response.data.result;
          $scope.start = response.data.start;
          $scope.total      = response.data.pcount;
          if($scope.alltodo)
          {
            for(var a in $scope.alltodo)
            {
              if($scope.alltodo[a].assignedTo == $scope.userId)
              {
                $scope.alltodo[a].showdelete = 1;
                $scope.alltodo[a].showbutton = 1;
                $scope.alltodo[a].disable = 1;
              }
              else
              {
                $scope.alltodo[a].showdelete = 0;
              }
            }
          }

          if($scope.page == 1)
          $scope.pagination($scope.total);
        }
        else
        {
          $scope.holiday = [];
          $scope.alltodo = [];
          $scope.total = 0;
          $scope.pagination($scope.total);

        }
      });
    }

    $scope.pagination = function ($event)
    {
      if($scope.total > $scope.perpage)
      {
        $('#pagination').pagination({
          items: $event,
          itemsOnPage: 10,
          cssStyle: 'light-theme',
          onPageClick:  function (e) {
            $scope.page  = e;
            $scope.gettodo();
          }
        });
      }
      else
      {
        $('#pagination').html('');
      }
    }

    // current

        $scope.cgettodo = function()
        {
          var obj = { page :$scope.cpage,perpage:$scope.cperpage,status:$scope.csstatus,priority:$scope.cspriority };
          $http({
            url: '<?php echo base_url(); ?>freelancer/getcurreenttodo',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              $scope.cloader = 1;

              $scope.currenttodo = response.data.result;
              $scope.cstart = response.data.start;
              $scope.ctotal      = response.data.pcount;
              // if start
               $scope.check = false;
              if($scope.currenttodo)
              {
                for(var a in $scope.currenttodo)
                {
                  if($scope.currenttodo[a].assignedTo == $scope.userId)
                  {
                    $scope.currenttodo[a].showdelete = 0;
                    $scope.currenttodo[a].showbutton = 0;
                    $scope.currenttodo[a].showreadonly = 0;
                  }
                  else
                  {
                    $scope.currenttodo[a].showdelete = 1;
                    $scope.currenttodo[a].showbutton = 1;
                    $scope.currenttodo[a].showreadonly = 1;
                  }

                   if($scope.currenttodo[a].status == 5)
                   {
                     $scope.currenttodo[a].disabled = 0;
                     $scope.check = true;
                   }
                   $scope.currenttodo[a].disabled = 0;
                 }

                 for(var b in $scope.currenttodo)
                 {
                   if($scope.check)
                   {
                      $scope.currenttodo[b].disabled = 1;
                   }
                   if($scope.currenttodo[b].status == 5)
                   {
                     $scope.currenttodo[b].disabled = 0;
                   }
                 }


                }
                // end if




              if($scope.cpage == 1)
              $scope.cpagination($scope.ctotal);
            }
            else
            {
              $scope.currenttodo = [];
              $scope.ctotal = 0;
              $scope.cpagination($scope.ctotal);

            }
          });
        }

        $scope.cpagination = function ($event)
        {
          if($scope.ctotal > $scope.cperpage)
          {
            $('#cpagination').pagination({
              items: $event,
              itemsOnPage: 10,
              cssStyle: 'light-theme',
              onPageClick:  function (e) {
                $scope.cpage  = e;
                $scope.cgettodo();
              }
            });
          }
          else
          {
            $('#cpagination').html('');
          }
        }
    // current

    $scope.confirm = function(id)
    {
      $scope.id = id;
      angular.element('#confirm').modal('show');
    }

    $scope.delete = function()
    {
      var obj = { id :$scope.id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/deletetodo',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          angular.element('#confirm').modal('hide');
          $.notify("Task Deleted Successfully", "success");
          $scope.page  = 1;
          $scope.cpage  = 1;
          $scope.gettodo();
          $scope.cgettodo();
          $scope.getactivetask();
        }
      });
    }


    $scope.edittodo = function(id)
    {
      var obj = { id :id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/edittodo',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.edittodo1 = response.data.result;
          $scope.name1 = $scope.edittodo1.name;
          $scope.priority1 = $scope.edittodo1.priority;
          $scope.department1 = $scope.edittodo1.dept;
          $scope.team1 = $scope.edittodo1.assignedTo;
          $scope.description1 = $scope.edittodo1.description;
          $scope.status1 = $scope.edittodo1.status;
          $scope.date1 = $scope.edittodo1.startDate;
          $scope.duedate1 = $scope.edittodo1.dueDate;
          $scope.allteam = response.data.team;
          $scope.file = $scope.edittodo1.file;
          if($scope.userId == response.data.result.assignedBy)
          {
            $scope.checked = false;
          }
          else
          {
            $scope.checked = true;
          }

          angular.element('#edittodo').modal('show');

        }
      });
    }

    $scope.updatetodo = function()
    {
      $scope.submitl = true;
      var error = false;

      $scope.date1 = angular.element('#date1').val();
      $scope.duedate1 = angular.element('#duedate1').val();

      if($scope.name1 == '' || $scope.priority1 == '' || $scope.department1 == '' || $scope.team1 == '' || $scope.description1 == '' || $scope.status1 == '' || $scope.date1 == '' || $scope.duedate1 == '' )
      {
        error = true;
      }

      if(error == true)
      {
        return false;
      }

      var obj = {id:$scope.edittodo1.id, name:$scope.name1,startDate:$scope.date1,dueDate:$scope.duedate1,priority:$scope.priority1,dept:$scope.department1,assignedTo:$scope.team1,status:$scope.status1,description:$scope.description1,file:$scope.file };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/updatetodo',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.message == "true")
        {
          angular.element('.preloader').hide();
          angular.element('#edittodo').modal('hide');

          $scope.gettodo();
          $scope.cgettodo();
          $scope.getactivetask();

          $scope.submitl = false;

          $.notify("Task Updated Successfully", "success");

        }
      });

    }

    $scope.confirmstart = function(id,type)
    {
      $scope.id = id;
      $scope.type = type;
      angular.element('#startconfirm').modal('show');

    }

    $scope.startTime = function($event)
    {
      var a = angular.element($event);
      var b = a[0].selectedOptions[0];
      var c = b.getAttribute('data-id');
      var status = $event.value;
      if(status != '')
      {
      var obj = {  id : c,status:status }
      $http({
        url: '<?php echo base_url(); ?>freelancer/todotaskStart',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message == "true")
        {
          $scope.cgettodo();
          angular.element('#startconfirm').modal('hide');
            if(status == 5 )
            {
            $.notify("Task Start Successfully", "success");
            }
            else if(status == 6)
            {
              $.notify("Task End Successfully","success");
            }
            else if(status == 2)
            {
              $.notify("Task Pending Successfully","success");
            }
            else if(status == 1)
            {
              $.notify("Task Done Successfully","success");
            }
            else if(status == 4)
            {
              $.notify("Task PostPone Successfully","success");
            }
           }
        });
      }
    }

    $scope.stoptimer = function()
    {
      var obj = {  todoId : $scope.id}
      $http({
        url: '<?php echo base_url(); ?>freelancer/todotaskStop',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message == "true")
        {
          $scope.cgettodo();
          angular.element('#startconfirm').modal('hide');

         $.notify("Task End Successfully", "success");

        }
      });
    }


    $scope.Attachment = function ($event) {
      $scope.attch = true;
      var files =$event.files;
      for (var i = 0; i < files.length; i++) {
        var f = files[i]
        var fileName = files[i].name;
        var filePath = fileName;
        //console.log(filePath);
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var d = JSON.stringify({ image :  e.target.result });
          $http({
            url: '<?php echo base_url(); ?>freelancer/todoAttachment',
            method: "POST",
            data: d,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            $scope.file = response.data;
            $scope.attch = false;
          });

        });
        fileReader.readAsDataURL(f);
      }

    }

    $scope.search = function()
    {
      $scope.gettodo();
    }

    $scope.csearch = function()
    {
      $scope.cgettodo();
    }


$scope.changePerPage = function ($event)
{
  $scope.perpage = $event.value;
  $scope.page = 1;
  $scope.gettodo();

}

$scope.cchangePerPage = function ($event)
{
  $scope.cperpage = $event.value;
  $scope.cpage = 1;
  $scope.cgettodo();

}


$scope.getactivetask = function()
{
    $http({
      url: '<?php echo base_url(); ?>freelancer/taskactive',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
       $scope.activetask = response.data.active;
       $scope.pendingtask = response.data.pending;
    });

}

    $scope.gettodo();
    $scope.cgettodo();
    $scope.getactivetask();


  });
  // todo list

  // invoice

  var app46 = angular.module('myApp46',[])

  app46.directive('numbersOnly', function() {
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



  app46.filter('date', function () {
    return function (item) {
      const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
      "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
    ];
    var dates = new Date(Date.parse(item))
    var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
    return newDate;
  };
});

app46.directive('mydatepicker', function () {
  return {
    restrict: 'A',
    require: 'ngModel',
    link: function (scope, element, attrs, ngModelCtrl) {
      element.datepicker({
        dateFormat: 'dd-mm-yy',
        // minDate: 0,
        onSelect: function (date) {
          scope.date = date;
          scope.$apply();
        }
      });
    }
  };
});



app46.directive('ngEnter', function () {
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

app46.controller('myCtrt46', function($scope,$window,$http,$interval) {

  $scope.page = 1;
  $scope.allinvoice = [];
  $scope.allclient = [];
  $scope.total = '';
  $scope.allcontract = [];

  $scope.status = '';
  $scope.id = '';
  $scope.recipient = '';
  $scope.contract ='';
  $scope.totalamount =0;
  $scope.start = '';
  $scope.task = [];
  $scope.currency ='';
  $scope.name = '';
  $scope.email = '';
  $scope.address = '';
  $scope.phone = '';
  $scope.allcurrency = [];
  $scope.currency ='';
  $scope.discounttype ='';
  $scope.discount = '';
  $scope.tax ='';
  $scope.payable = 0;
  $scope.discountAmount = '';
  $scope.taxAmount ='';
  $scope.selectedcurrency ='';
  $scope.startdate ='';
  $scope.enddate ='';
  $scope.datewisedata = [];
  $scope.show = 0;
  $scope.reference ='';
  $scope.perpage =10;


  $scope.task.push({
    task : '',
    hours:'',
    hourly:'',
    amount:'',
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

  $http({
    url: '<?php echo base_url(); ?>freelancer/getInvoicePrefix',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.success == "true")
    {
      $scope.reference = response.data.result.invoice;

    }
  });

  $scope.taskadd = function ($key)
  {
    $scope.task.push({
      task : '',
      hours:'',
      hourly:'',
      amount:'',
    });

  }

  $http({
    url: '<?php echo base_url(); ?>freelancer/getActiveClient',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    if(response.data.success == "true")
    {
      $scope.allclient = response.data.result;
    }
  });

  $http.get("<?php echo base_url(); ?>freelancer/getsession")
  .then(function(response)
  {
    $scope.userId = response.data.userid;

  });


  $scope.submitinvoice = function()
  {
    $scope.submitl = true;
    var error = false;

    // $scope.recipient == '' || $scope.contract == '' ||
    if($scope.name == '' || $scope.email == '' || $scope.address == '' || $scope.phone == '' ||   $scope.amount == '' || $scope.currency == '' || $scope.reference == '')
    {
      error = true;
    }
    //
    for(var i in $scope.task)
    {
      if($scope.task[i]['task'] == '' || $scope.task[i]['hours'] == '' || $scope.task[i]['hourly'] == '' || $scope.task[i]['amount'] == ''  )
      {
        error = true;
      }
    }

    if(error == true)
    {
      return false;
    }


    var obj = { recipient:$scope.recipient,name:$scope.name,email:$scope.email,phone:$scope.phone,address:$scope.address,contractId:$scope.contract,task:$scope.task,amount:$scope.totalamount,discount:$scope.discount,discounttype:$scope.discounttype,tax:$scope.tax,payable:$scope.payable,currencyId:$scope.currency,taxAmount:$scope.taxAmount,discountAmount:$scope.discountAmount,reference:$scope.reference };
    angular.element('.preloader').show();
    $http({
      url: '<?php echo base_url(); ?>freelancer/invoicesave',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        angular.element('.preloader').hide();
        angular.element('#addinvoice').modal('hide');
        $scope.allcontract = [];
        $scope.recipient = '';
        $scope.contract ='';
        $scope.totalamount ='';
        $scope.start = '';
        $scope.task = [];
        $scope.submitl = false;

        $scope.task.push({
          task : '',
          hours:'',
          hourly:'',
          amount:'',
        });


        $.notify("Invoice Created Successfully", "success");
        $interval(callAtInterval, 2000);

        function callAtInterval()
        {
          $window.location.href = '<?php echo base_url(); ?>freelancer/invoice';
        }

      }

    });

  }


  $scope.getinvoice = function()
  {
    var obj = { page :$scope.page,perpage:$scope.perpage };
    $http({
      url: '<?php echo base_url(); ?>freelancer/getinvoice',
      method: "POST",
      data :obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      if(response.data.message == "true")
      {
        $scope.allinvoice = response.data.result;
        $scope.start = response.data.start;
        $scope.total      = response.data.pcount;

        if($scope.page == 1)
        $scope.pagination($scope.total);
      }
      else
      {
        $scope.allinvoice = [];
      }
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
          $scope.getinvoice();
        }
      });
    }
    else
    {
     $('#pagination').html('');
    }
  }


  $scope.getcontract = function ($event)
  {
    var  id = angular.element($event).val();
    var a = angular.element($event);
    var b = a[0].selectedOptions[0];
    var c = b.getAttribute('data-key');
    $scope.getclientProfile(c);


    var obj = {  id : id  };

    $http({
      url: '<?php echo base_url(); ?>freelancer/getclientcontract',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      $scope.allcontract = response.data.result;
    });
  }

    $scope.getclientProfile = function(key)
    {
      $scope.name = $scope.allclient[key].name;
      $scope.email = $scope.allclient[key].email;
      $scope.address = $scope.allclient[key].address1;
      $scope.phone = $scope.allclient[key].phone;

    }

  $scope.deletetask = function (key)
  {

    $scope.task.splice(key,1);
    $scope.counttotalhour();
  }

  $scope.counttotalhour = function($event)
  {
    $scope.t = 0;
    var a = 0;
    for(var i in $scope.task )
    {
      var a = $scope.task[i]['hours'] * $scope.task[i]['hourly'];
      $scope.task[i]['amount'] = a;
      $scope.t =+ $scope.t + +$scope.task[i]['amount'];
    }
    $scope.totalamount = $scope.t;
    $scope.payable = $scope.totalamount;
    $scope.discount = angular.element('.discount').val();
    if($scope.discount)
    {
      if($scope.discounttype == 2)
      {
      $scope.discountAmount = $scope.payable * $scope.discount /100;
      $scope.payable = $scope.totalamount - $scope.discountAmount;
      }
      else if($scope.discounttype == 1)
      {
        $scope.discountAmount = $scope.discount;
        $scope.payable = $scope.payable - $scope.discount
       }
    }

    if($scope.tax != 0)
    {
      $scope.taxAmount = $scope.payable * $scope.tax /100;
      $scope.payable = $scope.payable + $scope.taxAmount;

    }


  }

  $scope.currency11 = function ($event)
  {
      var a = angular.element($event);
      var b = a[0].selectedOptions[0];
      var c = b.getAttribute('data-id');
      $scope.selectedcurrency = $scope.allcurrency[c].code+' '+$scope.allcurrency[c].symbol;
  }

  $scope.searchdate = function ()
  {
    error = false;
    $scope.startdate = angular.element(".date").val();
    $scope.enddate = angular.element(".date1").val();
    if($scope.startdate == '' || $scope.enddate =='')
    {
      error = true;
    }

    if(error == true)
    {
      return false;
    }

    var obj = {  startdate:$scope.startdate,enddate:$scope.enddate};

    $http({
      url: '<?php echo base_url(); ?>freelancer/invoiceSearchdate',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      $scope.show = 1;

      if(response.data.message == "true")
      {
        $scope.datewisedata = response.data.result;

      }

   });
 }


 $scope.changePerPage = function ($event)
 {
   $scope.perpage = $event.value;
   $scope.page = 1;

   $scope.getinvoice();

 }

  $scope.getinvoice();


});
// invoice

// projectid
// project add
<?php
if(!empty($projectId))
{
  ?>
  var app48 = angular.module('myApp48',[])

  app48.directive('numbersOnly', function() {
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

  app48.controller('myCtrt48', function($scope,$window,$http,$interval) {

    $scope.milestones = [];
    $scope.project = '';
    $scope.projectname = '';
    $scope.hourlyprice = '';
    $scope.totalhour = '';
    $scope.buget = '';
    $scope.projectsource = '';
    $scope.clientname = '';
    $scope.email = '';
    $scope.phone = '';
    $scope.skype = '';
    $scope.contactperson = '';
    $scope.projectmanager = '';
    $scope.total = 0;
    $scope.page =1;
    $scope.allproject = [];
    $scope.allprojectmanager = [];
    $scope.document = [];
    $scope.doc = '';
    $scope.m1 = [];
    $scope.allcurrency = [];
    $scope.currency =  '';
    $scope.countrycode ='';
    $scope.countryclass ='';
    $scope.allsource = [];



    $http({
      url: '<?php echo base_url(); ?>getcurrency',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      $scope.allcurrency = response.data.result;

    });

    $http({
    url: '<?php echo base_url(); ?>freelancer/getallleadsource',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
    }).then(function(response) {

    $scope.allsource = response.data.result;

    });


    $scope.milestones.push({
      title : '',
      hours : 0,
      task : [{
        task:'',
        description:'',
        hours:'',
      }],
      button:'',
    });

    $scope.ctrl = function()
    {

      var email = angular.element('#email').val();
      $scope.email = email;
      if(!email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
      {
        $scope.emailvalide = true;
      }
      else
      {
        $scope.emailvalide = false;
      }
    }

    $scope.milestoneadd = function ($event)
    {

      $scope.milestones.push({
        title : '',
        hours : 0,
        task : [{
          task:'',
          hours:'',
          description:'',
        }],
        button:'',
      });

    }

    $scope.deletetask = function ($mkey,$key)
    {
      $scope.milestones[$mkey]['task'].splice($key,1);
    }

    $scope.counttotalhour = function($event)
    {

      for(var i in $scope.milestones )
      {
        $scope.t = 0;
        $scope.p = 0;
        for(var m in $scope.milestones[i]['task'])
        {
          $scope.t =+ $scope.t + +$scope.milestones[i]['task'][m]['hours'];
          // $scope.p += $scope.t;
        }
        $scope.milestones[i]['hours'] = $scope.t;
      }
    }

    $scope.taskadd = function ($key)
    {

      $scope.milestones[$key]['task'].push({
        task : '',
        hours:'',
        description:'',
      });

    }


    $scope.deletemilestone = function ($key)
    {
      $scope.milestones.splice($key,1);
    }

    $scope.totalbuget = function()
    {
      $scope.budget = $scope.hourlyprice * $scope.totalhour;
    }

    $scope.csvdataexport = function()
    {
      var filename = document.getElementById("csv");

      if (filename.value.length < 1 ){
        ($scope.warning = "Please upload a file");
      }
      else {
        $scope.title = "Confirm file";
        if(filename.files[0])
        {
          var file = filename.files[0];
          //console.log(file)
          var fileSize = 0;
        }
        if (filename.files[0]) {

          var reader = new FileReader();
          reader.onload = function (e) {
            var table2 = [];

            var rows = e.target.result.split("\n");
            var title = rows[0];
            var milestone= 0;
            for (var i = 1; i < rows.length; i++) {

              var cells = rows[i].split(",");

              if(cells[0] != '')
              {
                var rr = rows[i].split(",");
                milestone = table2.push({title : rr[1],hours:'0', task : [] }) - 1;
              }
              else
              {
                cols = rows[i].split(",");
                if(cols[3] && cols[4])
                {
                  table2[milestone]['task'].push ({task : cols[3],description: cols[4],hours : cols[5]});
                }
              }
            }

            if(table2)
            {
              $scope.cupload = 2;
              // $scope.budget = 0;
              for(var res in table2)
              {
                var mt = 0;
                var tprice = 0;
                for(var i in  table2[res]['task'])
                {

                  if(table2[res]['task'][i]['hours'])
                  {
                    var tprice = +table2[res]['task'][i]['hours'] + tprice;
                    // table2[res]['task'][i]['amount'] = tprice;
                    // mt += tprice;
                  }
                }
                table2[res]['hours'] = tprice;
                //$scope.budget = +$scope.budget+ +table2[res]['price'];

              }
            }
            $scope.milestones = [];
            $scope.milestones = table2;
            // console.log($scope.milestones);
            $scope.$apply();

          }

          reader.readAsText(filename.files[0]);

        }
        return false;
      }


    }

    $scope.addDocument = function()
    {
      // console.log($scope.doc);
      if($scope.doc)
      {
        $scope.document.push($scope.doc);
        $('#document').val('');
        //$('#document').attr('src','');
        // console.log($scope.document);
      }
    }

    $scope.documentUpload = function ($event) {

      var files =$event.files;
      for (var i = 0; i < files.length; i++) {
        var f = files[i]
        var fileName = files[i].name;
        var filePath = fileName;

        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          jQuery('#teamviewimg').attr('src',e.target.result);
          var d = JSON.stringify({ image :  e.target.result });
          $http({
            url: '<?php echo base_url(); ?>freelancer/project_documentupload',
            method: "POST",
            data: d,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            $scope.doc = response.data;

          });

        });
        fileReader.readAsDataURL(f);
      }

    }


    $scope.updateproject = function()
    {
      $scope.submitp = true;
      $scope.emailvalide = false;
      error = false;

      for( var res in $scope.milestones)
      {
        if($scope.milestones[res]['title'] == '' || $scope.milestones[res]['hours'] =='' || $scope.milestones[res]['description'] =='' )
        {
          error = true;
        }

        if($scope.milestones[res]['task'].length != 0)
        {
          for(var t in $scope.milestones[res]['task'])
          {
            if($scope.milestones[res]['task'][t]['task'] == '' || $scope.milestones[res]['task'][t]['hours'] == '' )
            {
              error = true;
            }
          }
        }
      }


      // $scope.email == '' ||  $scope.skype == '' ||
      if($scope.projectname == '' || $scope.hourlyprice == '' || $scope.totalhour == '' || $scope.budget == '' || $scope.projectsource == '' || $scope.clientname == '' ||  $scope.contactperson == '' || $scope.projectmanager == '' || $scope.currency == '' || $scope.phone == '')
      {
        error = true;
      }

      if($scope.email != '')
      {
        if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
        {
          error = true;
          $scope.emailvalide = true;
        }
      }

      var pclass = $('#phone').attr('class');
      $scope.countrycode = $('.iti__selected-flag').attr('title');
      var cl = $('.iti__flag').attr('class');
      var cl = cl.split(' ');
      $scope.countryclass = cl['1'];

      if(pclass == "form-control phonenumber ng-valid ng-dirty ng-valid-parse ng-not-empty error11 ng-touched")
      {
        return false;
      }

      if(error == true)
      {
        return false;
      }

      var obj = { projectId:$scope.project.projectId,projectName:$scope.projectname,hourlyPrice:$scope.hourlyprice,totalHour:$scope.totalhour,budget:$scope.budget,lead_sourceId:$scope.projectsource,clientName:$scope.clientname,email:$scope.email,phone:$scope.phone,skype:$scope.skype,contactPerson:$scope.contactperson,projectManagerId:$scope.projectmanager,milestones:$scope.milestones,document:$scope.document,currency:$scope.currency,countrycode:$scope.countrycode,countryclass:$scope.countryclass   };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/projectupdate',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        angular.element(".preloader").hide();
        if(response.data.success == "true")
        {
          $.notify("Project  Updated Successfully", "success");
          $interval(callAtInterval, 2000);

          function callAtInterval()
          {
            $window.location.href = '<?php echo base_url(); ?>freelancer/project';
          }
        }
        else if(response.data.message == "false")
        {
          $.notify("Project is not Updated", "error");
        }

      });
    }

    // getproject manager
    $scope.getprojectmanager = function()
    {
      $http({
        url: '<?php echo base_url(); ?>freelancer/getprojectmanager',
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response){
        if(response.data.message == "true")
        {
          $scope.allprojectmanager  = response.data.result;
        }

      });
    }

    $scope.getproject = function()
    {
      var obj = {  projectId :'<?php echo $projectId; ?>'};
      $http({
        url: '<?php echo base_url(); ?>freelancer/getproject_edit',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message == "true")
        {
          $scope.project = response.data.result;
          $scope.projectsource = $scope.project.lead_sourceId;
          $scope.clientname = $scope.project.clientName;
          $scope.email = $scope.project.email;
          $scope.phone = $scope.project.phone;
          $scope.skype = $scope.project.skype;
          $scope.contactperson = $scope.project.contactPerson;
          $scope.projectmanager = $scope.project.projectManagerId;
          $scope.projectname = $scope.project.projectName;
          $scope.hourlyprice = $scope.project.hourlyPrice;
          $scope.totalhour = $scope.project.totalHour;
          $scope.budget =  $scope.project.budget;
          $scope.currency =  $scope.project.currency;

          $('.iti__selected-flag').attr("title",$scope.project.countrycode);
          $('.iti__selected-flag .iti__flag').removeClass('iti__us');
          $('.iti__selected-flag .iti__flag').addClass($scope.project.countryclass);


          $scope.m1 = $scope.project.milestone;
          if($scope.m1)
          {
             $scope.milestones = [];
            for(var i in $scope.m1)
            {
              $scope.milestones.push({
               title : $scope.m1[i]['title'],
               hours : $scope.m1[i]['hours'],
               task : [],
               button:'',

               });
// /ttttdsfgdgdf
///ssss
///bhupinder
              for(var m in $scope.m1[i].task)
              {


                $scope.milestones[i]['task'].push({
                  task : $scope.m1[i].task[m].task,
                  hours:$scope.m1[i].task[m].task,
                  hours:$scope.m1[i].task[m].hours,

                  description:$scope.m1[i].task[m].description
                });

              }
            }
          }
          if($scope.project.document.length != 0)
          {
            for(var d in $scope.project.document)
            {
              $scope.document.push($scope.project.document[d].document);
            }
          }
        }
      });
    }




    $scope.getproject();
    $scope.getprojectmanager();

  });
  // projectid
  <?php } ?>



  //  edit invoice
   <?php
   if(!empty($invoiceId))
        {
          ?>
  var app49 = angular.module('myApp49',[])

  app49.directive('numbersOnly', function() {
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



  app49.filter('date', function () {
    return function (item) {
      const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
      "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
    ];
    var dates = new Date(Date.parse(item))
    var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
    return newDate;
  };
});

app49.directive('mydatepicker', function () {
  return {
    restrict: 'A',
    require: 'ngModel',
    link: function (scope, element, attrs, ngModelCtrl) {
      element.datepicker({
        dateFormat: 'dd-mm-yy',
        // minDate: 0,
        onSelect: function (date) {
          scope.date = date;
          scope.$apply();
        }
      });
    }
  };
});



app49.directive('ngEnter', function () {
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

app49.controller('myCtrt49', function($scope,$window,$http,$interval) {

  $scope.page = 1;
  $scope.allinvoice = [];
  $scope.allclient = [];
  $scope.total = '';
  $scope.allcontract = [];

  $scope.id = '';
  $scope.recipient = '';
  $scope.contract ='';
  $scope.totalamount ='';
  $scope.start = '';
  $scope.task = [];
  $scope.name = '';
  $scope.email = '';
  $scope.address = '';
  $scope.phone = '';
  $scope.invoice = '';
  $scope.paymentReceived =0;
  $scope.checked = false;
  $scope.currency ='';
  $scope.discounttype ='';
  $scope.discount = '';
  $scope.tax ='';
  $scope.payable = 0;
  $scope.taxAmount ='';
  $scope.discountAmount ='';
  $scope.selectedcurrency = '';
  $scope.invoiceno = '';
  $scope.checked1 = false;
  $scope.status ='';

  $scope.task.push({
    task : '',
    hours:'',
    hourly:'',
    amount:'',
  });

  $scope.taskadd = function ($key)
  {
    $scope.task.push({
      task : '',
      hours:'',
      hourlyPrice:'',
      amount:'',
    });

  }

  $http({
    url: '<?php echo base_url(); ?>freelancer/getActiveClient',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    if(response.data.success == "true")
    {
      $scope.allclient = response.data.result;
    }
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


  $http.get("<?php echo base_url(); ?>freelancer/getsession")
  .then(function(response)
  {
    $scope.userId = response.data.userid;

  });


  $scope.updateinvoice = function()
  {
    $scope.submitl = true;
    var error = false;
    $scope.paymentReceived = angular.element("#paymentReceived").val();
    var status = angular.element("#status").val();
    if(status !='')
    {
      $scope.status = status;
    }

    if($scope.name == '' || $scope.email == '' || $scope.address == '' || $scope.phone == '' || $scope.recipient == '' || $scope.contract == '' ||  $scope.amount == ''  || $scope.currency == '' )
    {
      error = true;
    }

    //
    for(var i in $scope.task)
    {
      if($scope.task[i]['task'] == '' || $scope.task[i]['hours'] == '' || $scope.task[i]['hourly'] == '' || $scope.task[i]['amount'] == ''  )
      {
        error = true;
      }
    }

    if(error == true)
    {
      return false;
    }

    var obj = { invoiceId:$scope.invoice.invoiceId,status:$scope.status,recipient:$scope.recipient,name:$scope.name,email:$scope.email,phone:$scope.phone,address:$scope.address,contractId:$scope.contract,task:$scope.task,amount:$scope.totalamount,discount:$scope.discount,discounttype:$scope.discounttype,tax:$scope.tax,payable:$scope.payable,currencyId:$scope.currency,taxAmount:$scope.taxAmount,discountAmount:$scope.discountAmount,paymentReceived:$scope.paymentReceived,status:$scope.status };
    angular.element('.preloader').show();
    $http({
      url: '<?php echo base_url(); ?>freelancer/invoiceupdate',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        angular.element('.preloader').hide();

        $scope.submitl = false;


      $.notify("Invoice Updated Successfully", "success");
        $interval(callAtInterval, 2000);

        function callAtInterval()
        {
          $window.location.href = '<?php echo base_url(); ?>freelancer/invoice';
        }

      }

    });

  }


  $scope.getinvoice = function()
  {
    var obj = { invoiceId :'<?php echo $invoiceId; ?>' };
    $http({
      url: '<?php echo base_url(); ?>freelancer/geteditinvoice',
      method: "POST",
      data :obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      if(response.data.message == "true")
      {
        $scope.invoice     = response.data.result;
        $scope.recipient   = $scope.invoice.recipient;
        $scope.contract    = $scope.invoice.contract;
        $scope.totalamount = $scope.invoice.amount;
        $scope.task = [];
        $scope.name = $scope.invoice.name;
        $scope.email = $scope.invoice.email;
        $scope.address = $scope.invoice.address;
        $scope.phone = $scope.invoice.phone;
        $scope.allcontract = $scope.invoice.contract;
        $scope.contract = $scope.invoice.contractId;
        $scope.currency = $scope.invoice.currencyId;
        $scope.discounttype = $scope.invoice.discountType;
        $scope.discount = $scope.invoice.discount;
        $scope.tax = $scope.invoice.tax;
        $scope.payable = $scope.invoice.payable;
        $scope.taxAmount = $scope.invoice.taxAmount;
        $scope.discountAmount = $scope.invoice.discountAmount;
        $scope.selectedcurrency = $scope.invoice.currency;
        $scope.invoiceno = $scope.invoice.reference;
        $scope.status = $scope.invoice.status;
        $scope.paymentReceived = $scope.invoice.paymentReceived;

         if($scope.invoice.status == 0 )
         {
           $scope.checked = false;
         }
         else
         {
          $scope.checked = true;
         }
         if($scope.invoice.recipient == 0)
         {
            $scope.checked1 = true;
         }

        if($scope.invoice.task)
        {
          for(var a in $scope.invoice.task)
          {
            var t = {};
            t['task'] =$scope.invoice.task[a].task ;
            t['hours'] = $scope.invoice.task[a].hours;
            t['hourly'] = $scope.invoice.task[a].hourly;
            t['amount'] = $scope.invoice.task[a].amount;
            $scope.task.push(t);
          }
        }
      }
    });
  }




  $scope.getcontract = function ($event)
  {
    var  id = angular.element($event).val();
    var a = angular.element($event);
    var b = a[0].selectedOptions[0];
    var c = b.getAttribute('data-key');
    $scope.getclientProfile(c);


    var obj = {  id : id  };

    $http({
      url: '<?php echo base_url(); ?>freelancer/getclientcontract',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      $scope.allcontract = response.data.result;
    });
  }

    $scope.getclientProfile = function(key)
    {
      if(key != '')
      {
        $scope.name = $scope.allclient[key].name;
        $scope.email = $scope.allclient[key].email;
        $scope.address = $scope.allclient[key].address1;
        $scope.phone = $scope.allclient[key].phone;
      }

    }

  $scope.deletetask = function (key)
  {

    $scope.task.splice(key,1);
    $scope.counttotalhour();
  }

  $scope.counttotalhour = function($event)
  {
    $scope.t = 0;
    var a = 0;
    for(var i in $scope.task )
    {
      var a = $scope.task[i]['hours'] * $scope.task[i]['hourly'];
      $scope.task[i]['amount'] = a;
      $scope.t =+ $scope.t + +$scope.task[i]['amount'];
    }
    $scope.totalamount = $scope.t;
    $scope.payable = $scope.totalamount;
    $scope.discount = angular.element('.discount').val();
    if($scope.tax != 0)
    {
      $scope.taxAmount = $scope.payable * $scope.tax /100;
      $scope.payable = $scope.payable + $scope.taxAmount;

    }

    if($scope.discount)
    {
      if($scope.discounttype == 2)
      {
      $scope.discountAmount = $scope.payable * $scope.discount /100;
      $scope.payable = $scope.totalamount - $scope.discountAmount;
      }
      else if($scope.discounttype == 1)
      {
        $scope.discountAmount = $scope.discount;
        $scope.payable = $scope.payable - $scope.discount
       }
    }
  }

  $scope.currency = function ($event)
  {
      var a = angular.element($event);
      var b = a[0].selectedOptions[0];
      var c = b.getAttribute('data-id');
      $scope.selectedcurrency = $scope.allcurrency[c].code+' '+$scope.allcurrency[c].symbol;
 }

  $scope.getinvoice();


});
//edit  invoice
<?php } ?>

// employee dsr
var app50 = angular.module('myApp50',[])

app50.directive('numbersOnly', function() {
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



app50.filter('date', function () {
  return function (item) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
  ];
  var dates = new Date(Date.parse(item))
  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
  return newDate;
};
});

app50.directive('mydatepicker', function () {
return {
  restrict: 'A',
  require: 'ngModel',
  link: function (scope, element, attrs, ngModelCtrl) {
    element.datepicker({
      dateFormat: 'dd-mm-yy',
      // minDate: 0,
      onSelect: function (date) {
        scope.date = date;
        scope.$apply();
      }
    });
  }
};
});



app50.directive('ngEnter', function () {
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

app50.controller('myCtrt50', function($scope,$window,$http,$interval) {

$scope.page = 1;
$scope.alldsr = [];
$scope.total = '';

$scope.id = '';
$scope.task = '';
$scope.detail = '';
$scope.time = '';
$scope.status = '';
$scope.jobtitle = '';
$scope.client = '';
$scope.upload = '';
$scope.skype = '';
$scope.url = '';
$scope.view = [];

$scope.task1 = '';
$scope.detail1 = '';
$scope.time1 = '';
$scope.status1 = '';
$scope.edit = [];

$scope.getdsr = function()
{
  var obj = { page :$scope.page };
  $http({
    url: '<?php echo base_url(); ?>freelancer/getemployeedsr',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      $scope.alldsr = response.data.result;
      $scope.start = response.data.start;
      $scope.total      = response.data.pcount;

      if($scope.page == 1)
      $scope.pagination($scope.total);
    }
    else
    {
      $scope.alldsr = [];
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
        $scope.getdsr();
      }
    });
  }
}


$scope.savedsr = function()
{
  $scope.submitl = true;
  var error = false;
  $scope.client = angular.element('#client').val();
  $scope.skype = angular.element('#skype').val();
  $scope.url = angular.element('#url').val();
  $scope.jobtitle = angular.element('#jobtitle').val();
  if($scope.task == '' || $scope.detail == '' || $scope.time == '' || $scope.status == ''  )
  {
    error = true;
  }

  if($scope.task == 6)
  {
    if($scope.jobtitle == '' || $scope.url =='' )
    {
      error = true;
    }
  }

  if($scope.task == 7)
  {
    // || $scope.upload ==''
    if($scope.client == '' || $scope.skype =='' || $scope.url == ''  )
    {
      error = true;
    }
  }


  if($scope.task == 8)
  {
    if($scope.client == '' || $scope.skype =='' )
    {
      error = true;
    }
  }

  var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test($scope.time);

   if (isValid)
   {
    $scope.timeerror = false;
   }
   else
   {
     $scope.timeerror = true;
     return true;
   }

  if(error == true)
  {
    return false;
  }

  var obj = { upload:$scope.upload,skype:$scope.skype,client:$scope.clientname,url:$scope.url,jobTitle:$scope.jobtitle,task:$scope.task,taskDetail:$scope.detail,time:$scope.time,status:$scope.status };
  angular.element('.preloader').show();
  $http({
    url: '<?php echo base_url(); ?>freelancer/dsrSave',
    method: "POST",
    data: obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    angular.element(".preloader").hide();
    if(response.data.message == "true")
    {
      angular.element('.preloader').hide();
      angular.element('#adddsr').modal('hide');
      $scope.task = '';
      $scope.detail ='';
      $scope.time ='';
      $scope.status = '';
      $scope.client = '';
      $scope.skype = '';
      $scope.url = '';
      $scope.upload = '';
      $scope.jobtitle ='';
      $scope.submitl = false;
      $scope.getdsr();
    $.notify("Dsr Added Successfully", "success");
    }

  });
}

$scope.viewdsr = function(id,date)
{
  var obj = { id :id,date:date };
  $http({
    url: '<?php echo base_url(); ?>freelancer/getOneEmployeeDsr',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    if(response.data.success =="true")
    {
      $scope.view = response.data.result;
      angular.element('#view').modal('show');
    }
  });
}

$scope.timeformat = function(val)
{
  var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(val);

   if (isValid)
   {
    $scope.timeerror = false;
   }
   else
   {
     $scope.timeerror = true;
   }
}

$scope.confirm = function(id)
{
  $scope.id = id;
  angular.element('#Delete').modal('show');
}

$scope.delete = function()
{
  var obj = { id :$scope.id };
  $http({
    url: '<?php echo base_url(); ?>freelancer/deletedsr',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      angular.element('#Delete').modal('hide');
      $.notify("Dsr Deleted Successfully", "success");
      $scope.page = 1;
      $scope.getdsr();
    }
  });
}

$scope.Edit = function(id)
{
  var obj = { id :id };
  $http({
    url: '<?php echo base_url(); ?>freelancer/getOnedsr',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.success == "true")
    {
       angular.element('#Edit').modal('show');
       $scope.edit = response.data.result;
       $scope.task1 = $scope.edit.task;
       $scope.detail1 = $scope.edit.taskDetail;
       $scope.time1 = $scope.edit.time;
       $scope.status1 = $scope.edit.status;
       $scope.jobtitle1 = $scope.edit.jobTitle;
       $scope.client1 = $scope.edit.client;
       $scope.skype1 = $scope.edit.skype;
       $scope.url1 = $scope.edit.url;
       $scope.upload = $scope.edit.upload;
      }
  });
}

$scope.update = function()
{
  $scope.submitl = true;
  var error = false;
  $scope.client1 = angular.element('#client1').val();
  $scope.skype1 = angular.element('#skype1').val();
  $scope.url1 = angular.element('#url1').val();
  $scope.jobtitle1 = angular.element('#jobtitle1').val();

  if($scope.task1 == '' || $scope.detail1 == '' || $scope.time1 == '' || $scope.status1 == ''  )
  {
    error = true;
  }
  var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test($scope.time1);

   if (isValid)
   {
    $scope.timeerror = false;
   }
   else
   {
     $scope.timeerror = true;
     return true;
   }

   if($scope.task1 == 6)
   {
     if($scope.jobtitle1 == '' || $scope.url1 =='' )
     {
       error = true;
     }
   }

   if($scope.task1 == 7)
   {
     // || $scope.upload ==''
     if($scope.client1 == '' || $scope.skype1 =='' || $scope.url1 == ''  )
     {
       error = true;
     }
   }


   if($scope.task1 == 8)
   {
     if($scope.client1 == '' || $scope.skype1 =='' )
     {
       error = true;
     }
   }

  if(error == true)
  {
    return false;
  }
  var obj = { upload:$scope.upload1,skype:$scope.skype1,client:$scope.clientname1,url:$scope.url1,jobTitle:$scope.jobtitle1,dsrId:$scope.edit.dsrId,task:$scope.task1,taskDetail:$scope.detail1,time:$scope.time1,status:$scope.status1 };
  angular.element('.preloader').show();
  $http({
    url: '<?php echo base_url(); ?>freelancer/dsrUpdate',
    method: "POST",
    data: obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    angular.element(".preloader").hide();
    if(response.data.message == "true")
    {
      angular.element('.preloader').hide();
      angular.element('#Edit').modal('hide');
      $scope.task = '';
      $scope.detail ='';
      $scope.time ='';
      $scope.status = '';
      $scope.client1 = '';
      $scope.skype1 = '';
      $scope.url1 = '';
      $scope.jobtitle1 ='';
      $scope.upload ='';
      $scope.submitl = false;
      $scope.getdsr();
    $.notify("Dsr Updated Successfully", "success");
    }

  });
}

$scope.documentUpload = function ($event)
{
  var files =$event.files;
  for (var i = 0; i < files.length; i++) {
    var f = files[i]
    var fileName = files[i].name;
    var filePath = fileName;

    var fileReader = new FileReader();
    fileReader.onload = (function(e) {
      jQuery('#teamviewimg').attr('src',e.target.result);
      var d = JSON.stringify({ image :  e.target.result });
      $http({
        url: '<?php echo base_url(); ?>freelancer/dsr_documentupload',
        method: "POST",
        data: d,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        $scope.upload = response.data;

      });

    });
    fileReader.readAsDataURL(f);
  }

}

 $scope.getdsr();


});
// employee dsr

// manager dsr
var app51 = angular.module('myApp51',[])

app51.directive('numbersOnly', function() {
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



app51.filter('date', function () {
  return function (item) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
  ];
  var dates = new Date(Date.parse(item))
  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
  return newDate;
};
});

app51.directive('mydatepicker', function () {
return {
  restrict: 'A',
  require: 'ngModel',
  link: function (scope, element, attrs, ngModelCtrl) {
    element.datepicker({
      dateFormat: 'dd-mm-yy',
      // minDate: 0,
      onSelect: function (date) {
        scope.date = date;
        scope.$apply();
      }
    });
  }
};
});



app51.directive('ngEnter', function () {
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

app51.controller('myCtrt51', function($scope,$window,$http,$interval) {

$scope.page = 1;
$scope.alldsr = [];
$scope.total = '';

$scope.id = '';
$scope.task = '';
$scope.detail = '';
$scope.time = '';
$scope.status = '';
$scope.view = [];
$scope.type ='';
$scope.typingLENGTH =800;
$scope.lastTypingTime='';
$scope.typing = false;
$scope.name ='';
$scope.perpage = 10;



$scope.getdsr = function()
{
  var obj = { page :$scope.page,name:$scope.name,perpage:$scope.perpage };
  $http({
    url: '<?php echo base_url(); ?>freelancer/getmanagerdsr',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      $scope.alldsr = response.data.result;
      $scope.start = response.data.start;
      $scope.total      = response.data.pcount;

      if($scope.page == 1)
      $scope.pagination($scope.total);
    }
    else
    {
      $scope.alldsr = [];
    }
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
        $scope.getdsr();
      }
    });
  }
  else
  {
    $('#pagination').html('');

  }
}

$scope.timeformat = function(val)
{
  var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(val);

   if (isValid)
   {
    $scope.timeerror = false;
   }
   else
   {
     $scope.timeerror = true;
   }
}

$scope.savedsr = function()
{
  $scope.submitl = true;
  $scope.timeerror = false;
  var error = false;
  if($scope.task == '' || $scope.detail == '' || $scope.time == '' || $scope.status == ''  )
  {
    error = true;
  }

  var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test($scope.time);

   if (isValid)
   {
    $scope.timeerror = false;
   }
   else
   {
     $scope.timeerror = true;
     return true;
   }

  if(error == true)
  {
    return false;
  }
  var obj = { task:$scope.task,taskDetail:$scope.detail,time:$scope.time,status:$scope.status };
  angular.element('.preloader').show();
  $http({
    url: '<?php echo base_url(); ?>freelancer/dsrSave',
    method: "POST",
    data: obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    angular.element(".preloader").hide();
    if(response.data.message == "true")
    {
      angular.element('.preloader').hide();
      angular.element('#adddsr').modal('hide');
      $scope.task = '';
      $scope.detail ='';
      $scope.time ='';
      $scope.status = '';
      $scope.submitl = false;
      $scope.getdsr();
    $.notify("Dsr Added Successfully", "success");
    }

  });
}

$scope.viewdsr = function(date,id)
{
  var obj = { id :id,date:date };
  $http({
    url: '<?php echo base_url(); ?>freelancer/getOneEmployeeDsr',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    if(response.data.success =="true")
    {
      $scope.view = response.data.result;
      angular.element('#view').modal('show');
    }
  });
}

$scope.confirm = function(type,id)
{
  $scope.type = type;
   $scope.id = id;
  angular.element("#confirm").modal('show');
}

$scope.action = function()
{
   var obj = { dsrId :$scope.id,approved:$scope.type };
  $http({
    url: '<?php echo base_url(); ?>freelancer/dsrApproved',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    if(response.data.message =="true")
    {
      $scope.getdsr();
      angular.element('#confirm').modal('hide');
      if($scope.type == 1)
      {
      $.notify("Dsr Approved Successfully", "success");
      }
      else if($scope.type == 2)
      {
      $.notify("Dsr Rejected Successfully", "success");
      }

    }
  });
}


$scope.remarkskeyup = function (val,id)
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
      $scope.remarkSave(val,id);
      $scope.typing = false;
    }
  },$scope.typingLENGTH);
}

$scope.remarkSave = function(val,id)
{
  var obj = { dsrId :id,remarks:val };
 $http({
   url: '<?php echo base_url(); ?>freelancer/dsrRemarks',
   method: "POST",
   data :obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

 });
}

$scope.search = function()
{
  $scope.page =1;
  $scope.getdsr();
}


$scope.changePerPage = function ($event)
{
  $scope.perpage = $event.value;
  $scope.page = 1;

  $scope.getdsr();

}

 $scope.getdsr();


});
// manager dsr

// upgrade
var app52 = angular.module('myApp52',[])

app52.directive('numbersOnly', function() {
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



app52.filter('date', function () {
  return function (item) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
  ];
  var dates = new Date(Date.parse(item))
  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
  return newDate;
};
});

app52.directive('mydatepicker', function () {
return {
  restrict: 'A',
  require: 'ngModel',
  link: function (scope, element, attrs, ngModelCtrl) {
    element.datepicker({
      dateFormat: 'dd-mm-yy',
      // minDate: 0,
      onSelect: function (date) {
        scope.date = date;
        scope.$apply();
      }
    });
  }
};
});



app52.directive('ngEnter', function () {
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

app52.controller('myCtrt52', function($scope,$window,$http,$interval) {

$scope.userId = '';
$scope.userType = '';
$scope.username = '';




$scope.upgrade = function()
{
   var obj = { userId :$scope.userId,type:'3' };
  $http({
    url: '<?php echo base_url(); ?>freelancer/upgradeFreelancer',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    if(response.data.message =="true")
    {
      $.notify("Profile Upgrade Successfully", "success");
        $scope.getdetail();
    }

  });
}



    $scope.getdetail = function()
    {
      $http.get("<?php echo base_url(); ?>freelancer/getsession")
      .then(function(response)
      {
        $scope.userId = response.data.userid;
        $scope.userType = response.data.type;
        $scope.username = response.data.name;
        $scope.userimage = response.data.image;



      });
    }

    $scope.getdetail();

});
// upgrade


//expense
var app53 = angular.module('myApp53',[])

app53.directive('mydatepicker', function () {
  return {
    restrict: 'A',
    require: 'ngModel',
    link: function (scope, element, attrs, ngModelCtrl) {
      element.datepicker({
        dateFormat: 'dd-mm-yy',
        // minDate: 0,
        onSelect: function (date) {
          scope.date = date;
          scope.$apply();
        }
      });
    }
  };
});

app53.filter('date2', function () {
  return function (item) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
  ];
  var dates = new Date(Date.parse(item))
  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
  return newDate;
};
});

app53.directive('numbersOnly', function() {
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


app53.controller('myCtrt53', function($scope,$window,$http,$interval) {

  $scope.teams =[];
  $scope.page =1;
  $scope.id = '';
  $scope.allex = [];
  $scope.currentIn = [];
  $scope.currentTotal = 0;
  $scope.allcurrency = [];
  $scope.ownercontract = [];
  $scope.projecttype = 1;
  $scope.milestone ='';
  $scope.date ='';
  $scope.amount ='';
  $scope.project ='';
  $scope.milestone ='';
  $scope.client ='';
  $scope.currency ='';
  $scope.status ='';
  $scope.deposited ='';
  $scope.Receivedamount ='';
  $scope.show = 0;
  $scope.total ='';
  $scope.perpage = 10;

  $scope.projecttype1 = 1;
  $scope.milestone1 ='';
  $scope.date1 ='';
  $scope.amount1 ='';
  $scope.project1 ='';
  $scope.project2 ='';
  $scope.milestone1 ='';
  $scope.milestone2 ='';
  $scope.client1 ='';
  $scope.currency1 ='';
  $scope.status1 ='';
  $scope.deposited1 ='';
  $scope.editincomedata = [];
  $scope.datewisedata = [];
  $scope.startdate = '';
  $scope.enddate = '';
  $scope.searchtotal = 0;
  $scope.sclient = '';
  $scope.sproject = '';
  $scope.Receivedamount1 ='';



 $http({
    url: '<?php echo base_url(); ?>getcurrency',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    $scope.allcurrency = response.data.result;

  });

  $http({
    url: '<?php echo base_url(); ?>freelancer/getActiveClient',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    if(response.data.success == "true")
    {
      $scope.allclient = response.data.result;
    }
  });

  $scope.getbank = function ()
  {
    $http({
      url: '<?php echo base_url(); ?>freelancer/getpaymentmethod',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      //console.log(response);
      if(response.data.success == "true")
      {
        $scope.currency = response.data.result.currencyId;
      }

    });
  }

  $scope.submitincome = function()
  {
    $scope.submitl = true;
    var error = false;
    $scope.date = angular.element('#date').val();
    $scope.project = angular.element('.project').val();
    $scope.milestone = angular.element('.milestone').val();
    // $scope.project == '' ||
    // $scope.milestone == ''
    if($scope.client == '' || $scope.project == '' ||  $scope.amount == '' || $scope.currency == '' ||  $scope.date == '' || $scope.status =='' || $scope.deposited =='' || $scope.received == '' || $scope.amount == 0)
    {
      error = true;
    }

    if($scope.Receivedamount != '')
    {
      if($scope.Receivedamount == 0)
      {
        error = true;
      }
    }

    if(error == true)
    {
      return false;
    }

    angular.element(".preloader").show();
    var obj = { project:$scope.project, client :$scope.client,amount:$scope.amount,status:$scope.status,currencyId:$scope.currency,milestoneId:$scope.milestone,date:$scope.date,deposited:$scope.deposited,received:$scope.received,receivedAmount:$scope.Receivedamount};

    $http({
      url: '<?php echo base_url(); ?>freelancer/incomeSave',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        $.notify("Income Added Successfully", "success");
        angular.element('#addincome').modal('hide');
        $scope.milestone ='';
        $scope.date ='';
        $scope.amount ='';
        $scope.project ='';
        $scope.milestone ='';
        $scope.client ='';
        $scope.status ='';
        $scope.deposited ='';
        $scope.Receivedamount ='';
        $scope.submitl = false;

        $scope.getCurrentMonthIncome();
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
      url: '<?php echo base_url(); ?>freelancer/deleteincome',
      method: "POST",
      data :obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      if(response.data.message == "true")
      {
        angular.element('#confirm').modal('hide');
        $.notify("Income Deleted Successfully", "success");
        $scope.getCurrentMonthIncome();
      }
    });
  }

  $scope.getCurrentMonthIncome = function()
  {
    $scope.currentTotal = 0;
    $http({
      url: '<?php echo base_url(); ?>freelancer/getCurrentMonthIncome',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        $scope.currentIn = response.data.result;
        if($scope.currentIn)
        {
          for(var i in $scope.currentIn)
          {
            $scope.currentTotal = +$scope.currentTotal + +$scope.currentIn[i].amount;

          }

        }
      }
    });
  }

  $scope.editincome = function(id)
  {
    var obj = { id :id };
    $http({
      url: '<?php echo base_url(); ?>freelancer/editincome',
      method: "POST",
      data :obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      if(response.data.message == "true")
      {
        $scope.editincomedata = response.data.result;
        $scope.projecttype1 = $scope.editincomedata.projectType;
        $scope.milestone1 =$scope.editincomedata.milestoneId;
        $scope.milestone2 =$scope.editincomedata.milestoneId;
        $scope.date1 =$scope.editincomedata.date;
        $scope.amount1 =$scope.editincomedata.amount;
        $scope.project1 =$scope.editincomedata.project;
        $scope.project2 =$scope.editincomedata.projectId;
        $scope.client1 =$scope.editincomedata.client;
        $scope.currency1 =$scope.editincomedata.currencyId;
        $scope.status1 =$scope.editincomedata.status;
        $scope.deposited1 =$scope.editincomedata.deposited;
        $scope.received1 =$scope.editincomedata.received;
        $scope.Receivedamount1 = $scope.editincomedata.receivedAmount;
         $scope.getproject1($scope.editincomedata.clientId);
         $scope.getmilestone1($scope.editincomedata.projectId,$scope.projecttype1);
        angular.element('#editincome').modal('show');

      }
    });
  }


  $scope.updateincome = function()
  {
    $scope.updatesubmit = true;
    var error = false;
    $scope.date1 = angular.element('#date1').val();
    $scope.project1 = angular.element('.project3').val();

    // $scope.milestone1 = angular.element('.milestone3').val();
    // || $scope.project1 == '' || $scope.milestone1 == ''
    if($scope.client1 == '' || $scope.project1 == '' ||  $scope.amount1 == '' || $scope.currency1 == ''  || $scope.date1 == '' || $scope.status1 =='' || $scope.deposited1 == '' || $scope.received1 == '' || $scope.amount1 == 0)
    {
      error = true;
    }

    if($scope.Receivedamount1 != '')
    {
      if($scope.Receivedamount1 == 0)
      {
        error = true;
      }
    }

    if(error == true)
    {
      return false;
    }

    angular.element(".preloader").show();
    var obj = { incomeId:$scope.editincomedata.incomeId, client :$scope.client1,project:$scope.project1,amount:$scope.amount1,status:$scope.status1,currencyId:$scope.currency1,deposited:$scope.deposited1,date:$scope.date1,received:$scope.received1,receivedAmount:$scope.Receivedamount1};

    $http({
      url: '<?php echo base_url(); ?>freelancer/incomeUpdate',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      angular.element(".preloader").hide();
      if(response.data.message == "true")
      {
        $.notify("Expense Updated Successfully", "success");
        angular.element('#editincome').modal('hide');
        $scope.getCurrentMonthIncome();
      }

    });
  }

  $scope.allincome = function ()
  {
    var obj = {  page:$scope.page,perpage:$scope.perpage};

    $http({
      url: '<?php echo base_url(); ?>freelancer/getallincome',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      $scope.allex = response.data.result;
      $scope.total = response.data.pcount;
      if($scope.allex)
      {
        for(var i in $scope.allex)
        {
          $scope.allex[i].total = 0;
          for(var j in $scope.allex[i].income)
          {
            $scope.allex[i].total = +$scope.allex[i].total + +$scope.allex[i].income[j].amount;
          }
        }
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
          $scope.allincome();
        }
      });
    }
    else
    {
     $('#pagination').html('');
    }
  }

   $scope.getproject = function($event)
   {
     var  id = angular.element($event).val();
     var a = angular.element($event);
     var b = a[0].selectedOptions[0];
     var c = b.getAttribute('data-id');
     if(!c)
     {
       $scope.projecttype = 1;
     }
     else if(c)
     {
       $scope.projecttype = 2;
     }

    if($scope.projecttype == 1)
    {
      var obj = {  id : id  };

      $http({
       url: '<?php echo base_url(); ?>freelancer/getclientcontract',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
      }).then(function(response) {

       $scope.allcontract = response.data.result;
       });
     }
     else if($scope.projecttype == 2)
     {
       var obj = {  projectId : id  };

       $http({
        url: '<?php echo base_url(); ?>freelancer/getownerproject',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
       }).then(function(response) {

        $scope.ownercontract = response.data.result;
        });
     }

   }

   $scope.getmilestone = function($event)
   {
     var  id = angular.element($event).val();

       var obj = {  id : id ,type:$scope.projecttype };

       $http({
        url: '<?php echo base_url(); ?>freelancer/getmilestone',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
       }).then(function(response)
       {
          if(response.data.type == 1)
          {
            $scope.allmilestone = response.data.result;
           }
           else if(response.data.type == 2)
           {
             $scope.allownermilestone = response.data.result;
           }
        });


   }


   $scope.getproject1 = function(id)
   {

    if($scope.projecttype == 1)
    {
      var obj = {  id : id  };

      $http({
       url: '<?php echo base_url(); ?>freelancer/getclientcontract',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
      }).then(function(response) {

       $scope.allcontract = response.data.result;
       });
     }
     else if($scope.projecttype == 2)
     {
       var obj = {  projectId : id  };

       $http({
        url: '<?php echo base_url(); ?>freelancer/getownerproject',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
       }).then(function(response) {

        $scope.ownercontract = response.data.result;
        });
     }

   }

   $scope.getmilestone1 = function(id,type)
   {


       var obj = {  id : id ,type:type };

       $http({
        url: '<?php echo base_url(); ?>freelancer/getmilestone',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
       }).then(function(response)
       {
          if(response.data.type == 1)
          {
            $scope.allmilestone = response.data.result;
           }
           else if(response.data.type == 2)
           {
             $scope.allownermilestone = response.data.result;
           }
        });


   }

   $scope.getproject3 = function($event)
   {
     var  id = angular.element($event).val();
     var a = angular.element($event);
     var b = a[0].selectedOptions[0];
     var c = b.getAttribute('data-id');
     if(!c)
     {
       $scope.projecttype1 = 1;
     }
     else if(c)
     {
       $scope.projecttype1 = 2;
     }
  }

  $scope.searchdate = function ()
  {
    error = false;
    $scope.startdate = angular.element(".datef").val();
    $scope.enddate = angular.element(".date1").val();
    $scope.sclient = angular.element(".sclient").val();
    $scope.sproject = angular.element(".sproject").val();

    // if($scope.startdate == '' || $scope.enddate =='')
    // {
    //   error = true;
    // }

    if(error == true)
    {
      return false;
    }

    var obj = {  startdate:$scope.startdate,enddate:$scope.enddate,sclient:$scope.sclient,sproject:$scope.sproject};

    $http({
      url: '<?php echo base_url(); ?>freelancer/incomeSearchdate',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      $scope.show = 1;

      if(response.data.message == "true")
      {
        $scope.datewisedata = response.data.result;

      }
      else if(response.data.message =="false")
      {
        $scope.datewisedata = [];
      }
        // plus
        $scope.searchtotal = 0;
        if($scope.datewisedata)
        {
          for(var i in $scope.datewisedata)
          {
            $scope.searchtotal = +$scope.searchtotal + +$scope.datewisedata[i].amount;
            }
        }
        // plus
   });
 }

 $scope.changePerPage = function ($event)
 {
   $scope.perpage = $event.value;
   $scope.page = 1;
   $scope.allincome();

 }

 $scope.changeStatus = function($event)
 {
   angular.element(".preloader").show();
   var status = $event.value;
   var a = angular.element($event);
   var b = a[0].selectedOptions[0];
   var id = b.getAttribute('data-id');
   if(status != '')
   {
   var obj = { incomeId:id,status:status};

   $http({
     url: '<?php echo base_url(); ?>freelancer/incomeUpdate',
     method: "POST",
     data: obj,
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     angular.element(".preloader").hide();
     if(response.data.message == "true")
     {
       $.notify("Expense Status Updated Successfully", "success");
     }
       });
    }
 }

 $scope.incomeExport = function ()
 {
   $scope.startdate = angular.element("#incomestartdate").val();
   $scope.enddate = angular.element("#incomeenddate").val();
   if($scope.sclient != '' && $scope.sproject == '' && $scope.startdate == '' && $scope.enddate == '')
   {
     $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/"+$scope.sclient;
   }
   else if($scope.sclient != '' && $scope.sproject != '' && $scope.startdate == '' && $scope.enddate == '')
   {
     $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/"+$scope.sclient+"/"+$scope.sproject;
   }
   else if($scope.sclient == '' && $scope.sproject != '' && $scope.startdate == '' && $scope.enddate == '')
   {
     $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/client/"+$scope.sproject;
   }
   else if($scope.sclient != '' && $scope.sproject == '' && $scope.startdate != '' && $scope.enddate != '')
   {
     $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/"+$scope.sclient+"/project"+$scope.sproject+"/"+scope.startdate+"/"+$scope.enddate;
   }
   else if($scope.sclient != '' && $scope.sproject == '' && $scope.startdate != '' && $scope.enddate != '')
   {
     $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/"+$scope.sclient+"/project/"+scope.startdate+"/"+$scope.enddate;
   }
   else if($scope.sclient == '' && $scope.sproject != '' && $scope.startdate != '' && $scope.enddate != '')
   {
     $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/client/"+$scope.sproject+"/"+scope.startdate+"/"+$scope.enddate;
   }
   else if($scope.sclient == '' && $scope.sproject == '' && $scope.startdate != '' && $scope.enddate != '')
   {
     $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/client/project/"+scope.startdate+"/"+$scope.enddate;
   }
   else if($scope.sclient != '' && $scope.sproject != '' && $scope.startdate != '' && $scope.enddate != '')
   {

     $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/"+$scope.sclient+"/"+$scope.sproject+"/"+$scope.startdate+"/"+$scope.enddate;
   }
   else if($scope.sclient == '' && $scope.sproject == '' && $scope.startdate == '' && $scope.enddate == '')
   {
     $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport";
   }
 }

  $scope.allincome();
  $scope.getCurrentMonthIncome();
  $scope.getbank();



});

//income

// projectmanager edit project
<?php
if(!empty($projectId))
{
  ?>
  var app54 = angular.module('myApp54',[])

  app54.directive('numbersOnly', function() {
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

  app54.controller('myCtrt54', function($scope,$window,$http,$interval) {

    $scope.milestones = [];
    $scope.project = '';
    $scope.projectname = '';
    $scope.hourlyprice = '';
    $scope.totalhour = '';
    $scope.buget = '';
    $scope.projectsource = '';
    $scope.clientname = '';
    $scope.email = '';
    $scope.phone = '';
    $scope.skype = '';
    $scope.contactperson = '';
    $scope.projectmanager = '';
    $scope.total = 0;
    $scope.page =1;
    $scope.allproject = [];
    $scope.allprojectmanager = [];
    $scope.document = [];
    $scope.doc = '';
    $scope.m1 = [];
    $scope.allcurrency = [];
    $scope.currency =  '';


    $http({
      url: '<?php echo base_url(); ?>getcurrency',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      $scope.allcurrency = response.data.result;

    });

    $scope.milestones.push({
      title : '',
      hours : 0,
      task : [{
        task:'',
        description:'',
        hours:'',
      }],
      button:'',
    });

    $scope.ctrl = function()
    {

      var email = angular.element('#email').val();
      $scope.email = email;
      if(!email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
      {
        $scope.emailvalide = true;
      }
      else
      {
        $scope.emailvalide = false;
      }
    }

    $scope.milestoneadd = function ($event)
    {

      $scope.milestones.push({
        title : '',
        hours : 0,
        task : [{
          task:'',
          hours:'',
          description:'',
        }],
        button:'',
      });

    }

    $scope.deletetask = function ($mkey,$key)
    {
      $scope.milestones[$mkey]['task'].splice($key,1);
    }

    $scope.counttotalhour = function($event)
    {

      for(var i in $scope.milestones )
      {
        $scope.t = 0;
        $scope.p = 0;
        for(var m in $scope.milestones[i]['task'])
        {
          $scope.t =+ $scope.t + +$scope.milestones[i]['task'][m]['hours'];
          // $scope.p += $scope.t;
        }
        $scope.milestones[i]['hours'] = $scope.t;
      }
    }

    $scope.taskadd = function ($key)
    {

      $scope.milestones[$key]['task'].push({
        task : '',
        hours:'',
        description:'',
      });

    }


    $scope.deletemilestone = function ($key)
    {
      $scope.milestones.splice($key,1);
    }

    $scope.totalbuget = function()
    {
      $scope.budget = $scope.hourlyprice * $scope.totalhour;
    }

    $scope.csvdataexport = function()
    {
      var filename = document.getElementById("csv");

      if (filename.value.length < 1 ){
        ($scope.warning = "Please upload a file");
      }
      else {
        $scope.title = "Confirm file";
        if(filename.files[0])
        {
          var file = filename.files[0];
          //console.log(file)
          var fileSize = 0;
        }
        if (filename.files[0]) {

          var reader = new FileReader();
          reader.onload = function (e) {
            var table2 = [];

            var rows = e.target.result.split("\n");
            var title = rows[0];
            var milestone= 0;
            for (var i = 1; i < rows.length; i++) {

              var cells = rows[i].split(",");

              if(cells[0] != '')
              {
                var rr = rows[i].split(",");
                milestone = table2.push({title : rr[1],hours:'0', task : [] }) - 1;
              }
              else
              {
                cols = rows[i].split(",");
                if(cols[3] && cols[4])
                {
                  table2[milestone]['task'].push ({task : cols[3],description: cols[4],hours : cols[5]});
                }
              }
            }

            if(table2)
            {
              $scope.cupload = 2;
              // $scope.budget = 0;
              for(var res in table2)
              {
                var mt = 0;
                var tprice = 0;
                for(var i in  table2[res]['task'])
                {

                  if(table2[res]['task'][i]['hours'])
                  {
                    var tprice = +table2[res]['task'][i]['hours'] + tprice;
                    // table2[res]['task'][i]['amount'] = tprice;
                    // mt += tprice;
                  }
                }
                table2[res]['hours'] = tprice;
                //$scope.budget = +$scope.budget+ +table2[res]['price'];

              }
            }
            $scope.milestones = [];
            $scope.milestones = table2;
            // console.log($scope.milestones);
            $scope.$apply();

          }

          reader.readAsText(filename.files[0]);

        }
        return false;
      }


    }

    $scope.addDocument = function()
    {
      // console.log($scope.doc);
      if($scope.doc)
      {
        $scope.document.push($scope.doc);
        $('#document').val('');
        //$('#document').attr('src','');
        // console.log($scope.document);
      }
    }

    $scope.documentUpload = function ($event) {

      var files =$event.files;
      for (var i = 0; i < files.length; i++) {
        var f = files[i]
        var fileName = files[i].name;
        var filePath = fileName;

        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          jQuery('#teamviewimg').attr('src',e.target.result);
          var d = JSON.stringify({ image :  e.target.result });
          $http({
            url: '<?php echo base_url(); ?>freelancer/project_documentupload',
            method: "POST",
            data: d,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            $scope.doc = response.data;

          });

        });
        fileReader.readAsDataURL(f);
      }

    }


    $scope.updateproject = function()
    {
      $scope.submitp = true;
      $scope.emailvalide = false;
      error = false;

      for( var res in $scope.milestones)
      {
        if($scope.milestones[res]['title'] == '' || $scope.milestones[res]['hours'] =='' || $scope.milestones[res]['description'] =='' )
        {
          error = true;
        }

        if($scope.milestones[res]['task'].length != 0)
        {
          for(var t in $scope.milestones[res]['task'])
          {
            if($scope.milestones[res]['task'][t]['task'] == '' || $scope.milestones[res]['task'][t]['hours'] == '' )
            {
              error = true;
            }
          }
        }
      }


      // $scope.email == '' ||  $scope.skype == '' ||
      if($scope.projectname == '' || $scope.hourlyprice == '' || $scope.totalhour == '' || $scope.budget == '' || $scope.projectsource == '' || $scope.clientname == '' ||  $scope.contactperson == '' || $scope.projectmanager == '' || $scope.currency == '')
      {
        error = true;
      }

      if($scope.email != '')
      {
        if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
        {
          error = true;
          $scope.emailvalide = true;
        }
      }

      if(error == true)
      {
        return false;
      }

      var obj = { projectId:$scope.project.projectId,projectName:$scope.projectname,hourlyPrice:$scope.hourlyprice,totalHour:$scope.totalhour,budget:$scope.budget,projectSource:$scope.projectsource,clientName:$scope.clientname,email:$scope.email,phone:$scope.phone,skype:$scope.skype,contactPerson:$scope.contactperson,projectManagerId:$scope.projectmanager,milestones:$scope.milestones,document:$scope.document,currency:$scope.currency   };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/projectupdate',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        angular.element(".preloader").hide();
        if(response.data.success == "true")
        {
          $.notify("Project  Updated Successfully", "success");
          $interval(callAtInterval, 2000);

          function callAtInterval()
          {
            $window.location.href = '<?php echo base_url(); ?>freelancer/project-assign';
          }
        }
        else if(response.data.message == "false")
        {
          $.notify("Project is not Updated", "error");
        }

      });
    }

    // getproject manager
    $scope.getprojectmanager = function()
    {
      $http({
        url: '<?php echo base_url(); ?>freelancer/getprojectmanager',
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response){
        if(response.data.message == "true")
        {
          $scope.allprojectmanager  = response.data.result;
        }

      });
    }

    $scope.getproject = function()
    {
      var obj = {  projectId :'<?php echo $projectId; ?>'};
      $http({
        url: '<?php echo base_url(); ?>freelancer/getproject_edit',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message == "true")
        {
          $scope.project = response.data.result;
          $scope.projectsource = $scope.project.projectSource;
          $scope.clientname = $scope.project.clientName;
          $scope.email = $scope.project.email;
          $scope.phone = $scope.project.phone;
          $scope.skype = $scope.project.skype;
          $scope.contactperson = $scope.project.contactPerson;
          $scope.projectmanager = $scope.project.projectManagerId;
          $scope.projectname = $scope.project.projectName;
          $scope.hourlyprice = $scope.project.hourlyPrice;
          $scope.totalhour = $scope.project.totalHour;
          $scope.budget =  $scope.project.budget;
          $scope.currency =  $scope.project.currency;

          $scope.m1 = $scope.project.milestone;
          if($scope.m1)
          {
             $scope.milestones = [];
            for(var i in $scope.m1)
            {
              $scope.milestones.push({
               title : $scope.m1[i]['title'],
               hours : $scope.m1[i]['hours'],
               task : [],
               button:'',

               });
// /ttttdsfgdgdf
///ssss
///bhupinder
              for(var m in $scope.m1[i].task)
              {

                // var t = {};
                // t['task'] = $scope.m1[i].task[m].task;
                // t['hours'] = $scope.m1[i].task[m].hours;
                // t['description'] = $scope.m1[i].task[m].description;
                // $scope.milestones[i]['task'].push(t);
                $scope.milestones[i]['task'].push({
                  task : $scope.m1[i].task[m].task,
                  hours:$scope.m1[i].task[m].task,
                  hours:$scope.m1[i].task[m].hours,

                  description:$scope.m1[i].task[m].description
                });

              }
            }
          }
          if($scope.project.document.length != 0)
          {
            for(var d in $scope.project.document)
            {
              $scope.document.push($scope.project.document[d].document);
            }
          }
        }
      });
    }




    $scope.getproject();
    $scope.getprojectmanager();

  });
  // projectid
  <?php } ?>

// projectmanager edit project

// jobopening
var app55 = angular.module('myApp55',[])

app55.directive('numbersOnly', function() {
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



app55.filter('date', function () {
  return function (item) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
  ];
  var dates = new Date(Date.parse(item))
  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
  return newDate;
};
});

app55.directive('mydatepicker', function () {
return {
  restrict: 'A',
  require: 'ngModel',
  link: function (scope, element, attrs, ngModelCtrl) {
    element.datepicker({
      dateFormat: 'dd-mm-yy',
      // minDate: 0,
      onSelect: function (date) {
        scope.date = date;
        scope.$apply();
      }
    });
  }
};
});



app55.directive('ngEnter', function () {
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

app55.controller('myCtrt55', function($scope,$window,$http,$interval) {

$scope.page = 1;
$scope.allopening = [];
$scope.total = '';

$scope.id = '';
$scope.position = '';
$scope.opening = '';
$scope.profile = '';
$scope.skill = '';
$scope.experience = '';
$scope.industry = '';
$scope.responsibility = '';
$scope.status = 1;
$scope.view = [];

$scope.position1 = '';
$scope.opening1 = '';
$scope.profile1 = '';
$scope.skill1 = '';
$scope.experience1 = '';
$scope.industry1 = '';
$scope.responsibility1 = '';
$scope.status1 = '';
$scope.edit = [];
$scope.perpage = 10;

$scope.getopening = function()
{
  var obj = { page :$scope.page,perpage:$scope.perpage };
  $http({
    url: '<?php echo base_url(); ?>freelancer/getjobOpening',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      $scope.allopening = response.data.result;
      $scope.start = response.data.start;
      $scope.total      = response.data.pcount;

      if($scope.page == 1)
      $scope.pagination($scope.total);
    }
    else
    {
      $scope.allopening = [];
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
        $scope.getopening();
      }
    });
  }
  else{
    $('#pagination').html('');
  }
}


$scope.saveopening = function()
{
  $scope.submitl = true;
  var error = false;
  if($scope.position == '' || $scope.opening == '' || $scope.profile == '' || $scope.skill == '' || $scope.experience == '' || $scope.industry == '' || $scope.responsibility =='' || $scope.status == ''  )
  {
    error = true;
  }

  if(error == true)
  {
    return false;
  }
  var obj = { vacancyPosition :$scope.position,vacancyNoOfOpening:$scope.opening,vacancyProfile:$scope.profile,vacancySkill :$scope.skill,vacancyExperience :$scope.experience,vacancyIndustry :$scope.industry,vacancyResponsibilities  :$scope.responsibility,vacancyStatus :$scope.status };
  angular.element('.preloader').show();
  $http({
    url: '<?php echo base_url(); ?>freelancer/openingSave',
    method: "POST",
    data: obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    angular.element(".preloader").hide();
    if(response.data.message == "true")
    {
      angular.element('.preloader').hide();
      angular.element('#addopening').modal('hide');
      $scope.position = '';
      $scope.opening = '';
      $scope.profile = '';
      $scope.skill = '';
      $scope.experience = '';
      $scope.industry = '';
      $scope.responsibility = '';
      $scope.status = '';


      $scope.submitl = false;
      $scope.getopening();
    $.notify("job Opening Added Successfully", "success");
    }

  });
}

$scope.viewOpening = function(id)
{
  var obj = { id :id};
  $http({
    url: '<?php echo base_url(); ?>freelancer/editOpening',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    if(response.data.message =="true")
    {
      $scope.view = response.data.result;
      angular.element('#view').modal('show');
    }
  });
}

$scope.timeformat = function(val)
{
  var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test(val);

   if (isValid)
   {
    $scope.timeerror = false;
   }
   else
   {
     $scope.timeerror = true;
   }
}

$scope.confirm = function(id)
{
  $scope.id = id;
  angular.element('#Delete').modal('show');
}

$scope.delete = function()
{
  var obj = { id :$scope.id };
  $http({
    url: '<?php echo base_url(); ?>freelancer/deleteOpening',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      angular.element('#Delete').modal('hide');
      $.notify("Job Opening Deleted Successfully", "success");
      $scope.page = 1;
      $scope.getopening();
    }
  });
}

$scope.editOpening = function(id)
{
  var obj = { id :id };
  $http({
    url: '<?php echo base_url(); ?>freelancer/editOpening',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
       angular.element('#Edit').modal('show');
       $scope.edit = response.data.result;

       $scope.position1 = $scope.edit.vacancyPosition;
       $scope.opening1 = $scope.edit.vacancyNoOfOpening;
       $scope.profile1 = $scope.edit.vacancyProfile;
       $scope.skill1 = $scope.edit.vacancySkill;
       $scope.experience1 = $scope.edit.vacancyExperience;
       $scope.industry1 = $scope.edit.vacancyIndustry;
       $scope.status1 = $scope.edit.vacancyStatus;
       $scope.responsibility1 = $scope.edit.vacancyResponsibilities;


      }
  });
}

$scope.update = function()
{
  $scope.submitl = true;
  var error = false;
  if($scope.position1 == '' || $scope.opening1 == '' || $scope.profile1 == '' || $scope.skill1 == '' || $scope.experience1 == '' || $scope.industry1 == '' || $scope.responsibility1 =='' || $scope.status1 == ''  )
  {
    error = true;
  }

  if(error == true)
  {
    return false;
  }
  var obj = { vacancyId:$scope.edit.vacancyId,vacancyPosition :$scope.position1,vacancyNoOfOpening:$scope.opening1,vacancyProfile:$scope.profile1,vacancySkill :$scope.skill1,vacancyExperience :$scope.experience1,vacancyIndustry :$scope.industry1,vacancyResponsibilities  :$scope.responsibility1,vacancyStatus :$scope.status1 };
  angular.element('.preloader').show();
  $http({
    url: '<?php echo base_url(); ?>freelancer/openingUpdate',
    method: "POST",
    data: obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    angular.element(".preloader").hide();
    if(response.data.message == "true")
    {
      angular.element('.preloader').hide();
      angular.element('#Edit').modal('hide');

      $scope.submitl = false;
      $scope.getopening();
    $.notify("Job Opening Updated Successfully", "success");
    }

  });
}

$scope.changePerPage = function ($event)
 {
    $scope.perpage = $event.value;
    $scope.page = 1;
    $scope.getopening();
 }

 $scope.getopening();


});
// jobopening


    // jobopening
    var app56 = angular.module('myApp56',[])

    app56.directive('numbersOnly', function() {
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



    app56.filter('date', function () {
      return function (item) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
      ];
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
      return newDate;
    };
    });

    app56.directive('mydatepicker', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
          dateFormat: 'dd-mm-yy',
          changeMonth: true,
          changeYear: true,
          yearRange: "1980:"+new Date().getFullYear(),
          onSelect: function (date) {
            scope.date = date;

            scope.$apply();
          }
        });
      }
    };
    });



    app56.directive('ngEnter', function () {
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

    app56.controller('myCtrt56', function($scope,$window,$http,$interval) {

    $scope.page = 1;
    $scope.allrecruitment = [];
    $scope.total = '';

    $scope.name ='';
    $scope.email ='';
    $scope.phone ='';
    $scope.gender ='';
    $scope.experience ='';
    $scope.current ='';
    $scope.expected ='';
    $scope.status ='';
    $scope.skill ='';
    $scope.period ='';
    $scope.birth ='';
    $scope.cv ='';
    $scope.currency ='';
    $scope.phoneerror = false;

    $scope.name1 ='';
    $scope.email1 ='';
    $scope.phone1 ='';
    $scope.gender1 ='';
    $scope.experience1 ='';
    $scope.current1 ='';
    $scope.expected1 ='';
    $scope.status1 ='';
    $scope.skill1 ='';
    $scope.period1 ='';
    $scope.birth1 ='';
    $scope.cv1 ='';
    $scope.currency1 ='';


    $scope.view = [];
    $scope.edit = [];
    $scope.allcurrency = [];
    $scope.perpage=10;

    $http({
      url: '<?php echo base_url(); ?>getcurrency',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      $scope.allcurrency = response.data.result;

    });

    $scope.getrecruitment = function()
    {
      var obj = { page :$scope.page,search:$scope.searchname,perpage:$scope.perpage };
      $http({
        url: '<?php echo base_url(); ?>freelancer/getrecruitment',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.allrecruitment = response.data.result;
          $scope.start = response.data.start;
          $scope.total      = response.data.pcount;

          if($scope.page == 1)
          $scope.pagination($scope.total);
        }
        else
        {
          $scope.allrecruitment = [];
        }
      });
    }

    $scope.search = function()
    {
      $scope.getrecruitment();
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
            $scope.getrecruitment();
          }
        });
      }
    }


    $scope.saverecruitment = function()
    {
      $scope.submitl = true;
      var error = false;
      $scope.birth = angular.element('#birth').val();
      // || $scope.cv == ''
      if($scope.name == '' || $scope.email == '' || $scope.phone == '' || $scope.gender == '' || $scope.experience == '' || $scope.current == '' || $scope.expected =='' || $scope.birth == ''  || $scope.currency =='' || $scope.cv == '')
      {
        error = true;
      }

      if($scope.phone.length < 9)
        {
          error = true;
          $scope.phoneerror = true;
        }
        else
        {
            $scope.phoneerror = false;
        }

      if(error == true)
      {
        return false;
      }
      var obj = { candidateName :$scope.name,candidateEmail :$scope.email,candidatePhone :$scope.phone,candidateDateOfBirth  :$scope.birth,candidateGender  :$scope.gender,candidateExperience :$scope.experience,candidateCurrentSalary :$scope.current,candidateExpectedSalary :$scope.expected,candidateSkill:$scope.skill,candidateNoticePeriod:$scope.period,candidateCv:$scope.cv,candidateStatus:$scope.status,currencyId:$scope.currency,candidateCv:$scope.cv };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/recruitmentSave',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.message == "true")
        {
          angular.element('.preloader').hide();
          angular.element('#addcandidate').modal('hide');
          $scope.name ='';
          $scope.email ='';
          $scope.phone ='';
          $scope.gender ='';
          $scope.experience ='';
          $scope.current ='';
          $scope.expected ='';
          $scope.status ='';
          $scope.skill ='';
          $scope.period ='';
          $scope.birth ='';
          $scope.cv ='';
          $scope.submitl = false;
          $scope.getrecruitment();
        $.notify("Candidate Added Successfully", "success");
        }

      });
    }

    $scope.viewOpening = function(id)
    {
      var obj = { id :id};
      $http({
        url: '<?php echo base_url(); ?>freelancer/editRecruitment',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message =="true")
        {
          $scope.view = response.data.result;
          angular.element('#view').modal('show');
        }
      });
    }



    $scope.confirm = function(id)
    {
      $scope.id = id;
      angular.element('#Delete').modal('show');
    }

    $scope.delete = function()
    {
      var obj = { id :$scope.id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/deleteRecruitment',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          angular.element('#Delete').modal('hide');
          $.notify("Candidate Deleted Successfully", "success");
          $scope.page = 1;
          $scope.getrecruitment();
        }
      });
    }

    $scope.editRecruitment = function(id)
    {
      var obj = { id :id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/editRecruitment',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
           angular.element('#Edit').modal('show');
           $scope.edit = response.data.result;

           $scope.name1 =$scope.edit.candidateName;
           $scope.email1 =$scope.edit.candidateEmail;
           $scope.phone1 =$scope.edit.candidatePhone;
           $scope.gender1 = $scope.edit.candidateGender;
           $scope.experience1 = $scope.edit.candidateExperience;
           $scope.current1 = $scope.edit.candidateCurrentSalary;
           $scope.expected1 =$scope.edit.candidateExpectedSalary;
           $scope.status1 = $scope.edit.candidateStatus;
           $scope.skill = $scope.edit.candidateSkill;
           $scope.period1 = $scope.edit.candidateNoticePeriod;
           $scope.birth1 =  $scope.edit.candidateDateOfBirth;
           $scope.cv1 =  $scope.edit.candidateCv;
           $scope.currency1 =  $scope.edit.currencyId;

          }
      });
    }

    $scope.update = function()
    {
      $scope.submitl = true;
      var error = false;
      $scope.birth1 = angular.element('#birth1').val();
      if($scope.name1 == '' || $scope.email1 == '' || $scope.phone1 == '' || $scope.gender1 == '' || $scope.experience1 == '' || $scope.current1 == '' || $scope.expected1 ==''  || $scope.period1 == '' || $scope.birth1 == '' || $scope.cv1 == '' || $scope.currency1 == '' || $scope.skill == '' )
      {
        error = true;
      }

      if($scope.phone1.length < 9)
        {
          error = true;
          $scope.phoneerror = true;
        }
        else
        {
            $scope.phoneerror = false;
        }


      if(error == true)
      {
        return false;
      }
      var obj = { candidateId:$scope.edit.candidateId,candidateName :$scope.name1,candidateEmail :$scope.email1,candidatePhone :$scope.phone1,candidateDateOfBirth  :$scope.birth1,candidateGender  :$scope.gender1,candidateExperience :$scope.experience1,candidateCurrentSalary :$scope.current1,candidateExpectedSalary :$scope.expected1,candidateSkill:$scope.skill,candidateNoticePeriod:$scope.period1,candidateCv :$scope.cv1,candidateStatus:$scope.status1,currencyId:$scope.currency1 };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/recruitmentUpdate',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.message == "true")
        {
          angular.element('.preloader').hide();
          angular.element('#Edit').modal('hide');

          $scope.submitl = false;
          $scope.getrecruitment();
        $.notify("Candidate Updated Successfully", "success");
        }

      });
    }

    $scope.cvupload = function ($event) {
      var files =$event.files;
      for (var i = 0; i < files.length; i++) {
        var f = files[i]
        var fileName = files[i].name;
        var filePath = fileName;
        //console.log(filePath);
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var d = JSON.stringify({ image :  e.target.result,name:filePath });
          $http({
            url: '<?php echo base_url(); ?>freelancer/requritementCV',
            method: "POST",
            data: d,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            $scope.cv = response.data;
          });

        });
        fileReader.readAsDataURL(f);
      }
    }

    $scope.cvupload1 = function ($event) {
      var files =$event.files;
      for (var i = 0; i < files.length; i++) {
        var f = files[i]
        var fileName = files[i].name;
        var filePath = fileName;
        //console.log(filePath);
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var d = JSON.stringify({ image :  e.target.result,name:filePath });
          $http({
            url: '<?php echo base_url(); ?>freelancer/requritementCV',
            method: "POST",
            data: d,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            $scope.cv1 = response.data;
          });

        });
        fileReader.readAsDataURL(f);
      }


    }

    $scope.changePerPage = function ($event)
  {
    $scope.perpage = $event.value;
    $scope.page = 1;
    $scope.getrecruitment();
  }

     $scope.getrecruitment();


    });
    // recruitment

    // interview
    var app57 = angular.module('myApp57',[])

    app57.directive('numbersOnly', function() {
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



    app57.filter('date', function () {
      return function (item) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
      ];
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
      return newDate;
    };
    });

    app57.directive('mydatepicker', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
          dateFormat: 'dd-mm-yy',
          // changeMonth: true,
          // changeYear: true,
           minDate: 0,
          onSelect: function (date) {
            scope.date = date;

            scope.$apply();
          }
        });
      }
    };
    });



    app57.directive('ngEnter', function () {
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

    app57.controller('myCtrt57', function($scope,$window,$http,$interval) {

    $scope.page = 1;
    $scope.allinterview = [];
    $scope.allopening = [];
    $scope.allopening1 = [];
    $scope.allcandidate = [];
    $scope.allteam = [];
    $scope.allteam1 = [];
    $scope.total = '';

    $scope.candidate ='';
    $scope.position ='';
    $scope.Interviewer ='';
    $scope.time ='';
    $scope.date ='';

    $scope.candidate1 ='';
    $scope.position1 ='';
    $scope.Interviewer1 ='';
    $scope.time1 ='';
    $scope.date1 ='';
    $scope.status ='';
    $scope.feedback ='';
    $scope.id = '';
    $scope.sposition ='';
    $scope.sstatus ='';
    $scope.perpage = 10;
    $scope.selectedinterviewer = [];
    $scope.selectedinterviewer1 = [];
    $scope.typingLENGTH =800;
    $scope.lastTypingTime='';
    $scope.typing = false;
    $scope.view = [];
    $scope.edit = [];


    $scope.employeekeyup = function ()
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
          $scope.getemployeekeyup();
          //console.log("Typing");

          $scope.typing = false;
        }
      },$scope.typingLENGTH);
    }

    $scope.getemployeekeyup = function()
    {
      $scope.allreviwer = [];
      var emp = angular.element('.interviewer').val();
      var time = angular.element('#interviewTime').val();
      var date = angular.element('#date').val();
      var m = JSON.stringify({ name : emp,time:time,date:date });
      if(emp != '')
      {
        $http({
          url: '<?php echo base_url(); ?>freelancer/getInterviewers',
          method: "POST",
          data:m,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response){

          $scope.allteam = response.data.result;

        });
      }
    }

    $scope.addinterviewer = function (name,id)
    {

      var inds =  {};
      inds['name'] = name;
      inds['userId'] = id;

      var match = false;
        for(var v in $scope.selectedinterviewer)
        {
         if($scope.selectedinterviewer[v]['userId'] == inds['userId'] )
         {
          match = true;
         }
      }

      if(!match)
      {
        $scope.selectedinterviewer.push(inds);
        angular.element('.interviewer').val('');
        $scope.allteam = [];
      }


    }

    $scope.deleteinterviewer = function(key)
    {
      $scope.selectedinterviewer.splice(key,1);

    }

    $scope.deleteinterviewer1 = function(key)
    {
      $scope.selectedinterviewer1.splice(key,1);

    }

    // edit
    $scope.employeekeyup1 = function ()
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
       $scope.getemployeekeyup1();
       //console.log("Typing");

       $scope.typing = false;
     }
   },$scope.typingLENGTH);
 }

 $scope.getemployeekeyup1 = function()
 {
   $scope.allteam1 = [];
   var emp = angular.element('.interviewer1').val();
   var time = angular.element('#interviewTime1').val();
   var date = angular.element('#date1').val();
   var m = JSON.stringify({ name : emp,time:time,date:date });
   if(emp != '')
   {
     $http({
       url: '<?php echo base_url(); ?>freelancer/getInterviewers',
       method: "POST",
       data:m,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response){

       $scope.allteam1 = response.data.result;

     });
   }
 }

 $scope.addinterviewer1 = function (name,id)
 {

   var inds =  {};
   inds['name'] = name;
   inds['userId'] = id;

   var match = false;
     for(var v in $scope.selectedinterviewer1)
     {
      if($scope.selectedinterviewer1[v]['userId'] == inds['userId'] )
      {
       match = true;
      }
   }

   if(!match)
   {
     $scope.selectedinterviewer1.push(inds);
     angular.element('.interviewer1').val('');
     $scope.allteam1 = [];
   }


 }
    // edit



    $scope.getopening = function()
    {
      $http({
        url: '<?php echo base_url(); ?>freelancer/allopening',
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.allopening = response.data.result;
        }
        else
        {
          $scope.allopening = [];
        }
      });
    }

    $scope.getteam = function()
    {
      $http({
        url: '<?php echo base_url(); ?>freelancer/allteam',
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.allteam = response.data.result;
        }
        else
        {
          $scope.allteam = [];
        }
      });
    }

    $scope.getcandidate = function()
    {
      $http({
        url: '<?php echo base_url(); ?>freelancer/allcandidate',
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.allcandidate = response.data.result;
        }
        else
        {
          $scope.allcandidate = [];
        }
      });
    }
    $scope.getcandidate1 = function()
    {
      $http({
        url: '<?php echo base_url(); ?>freelancer/allcandidate1',
        method: "POST",
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.allcandidate1 = response.data.result;
        }
        else
        {
          $scope.allcandidate1 = [];
        }
      });
    }

    $scope.getinterview = function()
    {
      var obj = { page :$scope.page,position:$scope.sposition,status:$scope.sstatus,perpage:$scope.perpage };
      $http({
        url: '<?php echo base_url(); ?>freelancer/getinterview',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.allinterview = response.data.result;
          $scope.start = response.data.start;
          $scope.total      = response.data.pcount;

          if($scope.page == 1)
          $scope.pagination($scope.total);
        }
        else
        {
          $scope.allinterview = [];
          $scope.total = 0;
          $scope.pagination($scope.total);

        }
      });
    }

    $scope.pagination = function ($event)
    {
      if($scope.total > $scope.perpage)
      {
        $('#pagination').pagination({
          items: $event,
          itemsOnPage: 10,
          cssStyle: 'light-theme',
          onPageClick:  function (e) {
            $scope.page  = e;
            $scope.getinterview();
          }
        });
      }
      else
      {
        $('#pagination').html();
      }
    }


    $scope.saveinterview = function()
    {
      $scope.submitl = true;
      $scope.timeerror = false;
      var error = false;
      $scope.date = angular.element('#date').val();
      $scope.time = angular.element('#interviewTime').val();

      if($scope.candidate == '' || $scope.position == '' || $scope.selectedinterviewer.length == 0 || $scope.time == '' || $scope.date == ''  )
      {
        error = true;
      }
      // var isValid = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/.test($scope.time);
      //
      //  if (isValid)
      //  {
      //   $scope.timeerror = false;
      //  }
      //  else
      //  {
      //    $scope.timeerror = true;
      //    return true;
      //  }

      if(error == true)
      {
        return false;
      }
      var obj = { candidateId :$scope.candidate,vacancyId  :$scope.position,interviewer :$scope.selectedinterviewer,interviewTime  :$scope.time,interviewDate  :$scope.date };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/interviewSave',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.message == "true")
        {
          $scope.getinterview();
          $scope.getcandidate();


          angular.element('.preloader').hide();
          angular.element('#addinterview').modal('hide');
          $scope.candidate ='';
          $scope.position ='';
          $scope.Interviewer ='';
          $scope.time ='';
          $scope.date ='';
          $scope.selectedinterviewer = [];
          $scope.submitl = false;
        $.notify("Interview Added Successfully", "success");
        }
        else if(response.data.already == "true")
        {
          $.notify("Interview Already exist", "error");
        }

      });
    }

    $scope.viewinterview = function(id)
    {
      var obj = { id :id};
      $http({
        url: '<?php echo base_url(); ?>freelancer/viewinterview',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        if(response.data.message =="true")
        {
          $scope.view = response.data.result;
          angular.element('#view').modal('show');
        }
      });
    }



    $scope.confirm = function(id)
    {
      $scope.id = id;
      angular.element('#Delete').modal('show');
    }

    $scope.delete = function()
    {
      var obj = { id :$scope.id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/deleteinterview',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          angular.element('#Delete').modal('hide');
          $.notify("Interview Deleted Successfully", "success");
          $scope.page = 1;
          $scope.getinterview();
        }
      });
    }

    $scope.editInterview = function(id)
    {
      var obj = { id :id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/editInterview',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
           angular.element('#Edit').modal('show');
           $scope.edit = response.data.result;
           $scope.candidate1 =$scope.edit.candidateId;
           $scope.position1 =$scope.edit.vacancyId;
           $scope.Interviewer1 =$scope.edit.employeeId;
           $scope.time1 =$scope.edit.interviewTime;
           $scope.date1 =$scope.edit.interviewDate;
           $scope.status =$scope.edit.interviewStatus;
           $scope.feedback =$scope.edit.interviewFeedback;
           $scope.selectedinterviewer1 = [];
           var a = $scope.edit.interviewer;
           for(var i in a)
           {
             var inds ={};
             inds['name'] = a[i].name;
             inds['userId'] = a[i].u_id;
              $scope.selectedinterviewer1.push(inds);
           }

          }
      });
    }

    $scope.update = function()
    {
      $scope.timeerror1 = false;
      var error = false;
      $scope.date1 = angular.element('#date1').val();
      $scope.time1 = angular.element('#interviewTime1').val();
     if($scope.candidate1 == '' || $scope.position1 == '' || $scope.selectedinterviewer1.length == 0 || $scope.time1 == '' || $scope.date1 == '' || $scope.status == '' || $scope.feedback == ''  )
      {
        error = true;
      }

     if(error == true)
      {
        return false;
      }

      var obj = { interviewId:$scope.edit.interviewId,candidateId :$scope.candidate1,vacancyId  :$scope.position1,interviewer :$scope.selectedinterviewer1,interviewTime  :$scope.time1,interviewDate  :$scope.date1,interviewStatus:$scope.status,interviewFeedback:$scope.feedback };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/interviewUpdate',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.message == "true")
        {
          angular.element('.preloader').hide();
          angular.element('#Edit').modal('hide');

          $scope.submitl = false;
          $scope.getinterview();
        $.notify("Interview Updated Successfully", "success");
        }

      });
    }

    $scope.search = function()
    {
      $scope.getinterview();
    }

    $scope.changePerPage = function ($event)
  {
     $scope.perpage = $event.value;
     $scope.page = 1;
     $scope.getinterview();
  }

  $scope.statuschange = function ($event)
  {
    $scope.status = $event.value;
    var a = angular.element($event);
    var b = a[0].selectedOptions[0];
    $scope.interviewId = b.getAttribute('data-id');

    if($scope.status != '')
    {
    var obj = {  interviewStatus  : $scope.status,interviewId:$scope.interviewId };
    $http({
      url: '<?php echo base_url(); ?>freelancer/interviewStatus',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
        if(response.data.success == "true")
       {
         $.notify("Interview Status Updated Successfully", "success");
        }
      });
    }
  }


     $scope.getinterview();
     $scope.getopening();
     $scope.getcandidate();
     $scope.getcandidate1();

     // $scope.getteam();


    });
    // interview

    // interview feedback
    var app58 = angular.module('myApp58',[])

    app58.directive('numbersOnly', function() {
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



    app58.filter('date', function () {
      return function (item) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
      ];
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
      return newDate;
    };
    });

    app58.directive('mydatepicker', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
          dateFormat: 'dd-mm-yy',
          changeMonth: true,
          changeYear: true,
          // minDate: 0,
          onSelect: function (date) {
            scope.date = date;

            scope.$apply();
          }
        });
      }
    };
    });



    app58.directive('ngEnter', function () {
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

    app58.controller('myCtrt58', function($scope,$window,$http,$interval) {

    $scope.page = 1;
    $scope.allinterview = [];
    $scope.total = '';
    $scope.feedback ='';
    $scope.id = '';
    $scope.loading = 0;


    $scope.getinterview = function()
    {
      var obj = { page :$scope.page };
      $http({
        url: '<?php echo base_url(); ?>freelancer/getemployeeinterview',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        $scope.loading = 1;

        if(response.data.message == "true")
        {
          $scope.allinterview = response.data.result;
          $scope.start = response.data.start;
          $scope.total      = response.data.pcount;

          if($scope.page == 1)
          $scope.pagination($scope.total);
        }
        else
        {
          $scope.allinterview = [];
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
            $scope.getinterview();
          }
        });
      }
    }

    $scope.editInterview = function(id)
    {
      var obj = { id :id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/getemployeeinterviewfeedback',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.success == "true")
        {
           angular.element('#Edit').modal('show');
           $scope.edit = response.data.result;
           $scope.feedback =$scope.edit.feedBack;
          }
      });
    }


    $scope.update = function()
    {
      $scope.submitl = true;
      var error = false;

      if($scope.feedback == ''  )
      {
        error = true;
      }

      if(error == true)
      {
        return false;
      }
      var obj = { interviewId:$scope.edit.interviewId,feedBack:$scope.feedback };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/Updateemployeeinterviewfeedback',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.success == "true")
        {
          angular.element('.preloader').hide();
          angular.element('#Edit').modal('hide');

          $scope.submitl = false;
          $scope.getinterview();
        $.notify("Interview Feedback Added Successfully", "success");
        }

      });
    }


     $scope.getinterview();


    });
    // interview feedback

    // attdence
    // interview feedback
    var app59 = angular.module('myApp59',[])

    app59.directive('numbersOnly', function() {
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



    app59.filter('date', function () {
      return function (item) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
      ];
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
      return newDate;
    };
    });

    app59.directive('mydatepicker', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
          dateFormat: 'dd-mm-yy',
          // changeMonth: true,
          // changeYear: true,
          // minDate: 0,
          onSelect: function (date) {
            scope.date = date;

            scope.$apply();
          }
        });
      }
    };
    });



    app59.directive('ngEnter', function () {
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

    app59.controller('myCtrt59', function($scope,$window,$http,$interval) {

    $scope.page = 1;
    $scope.allinterview = [];
    $scope.total = '';
    $scope.feedback ='';
    $scope.id = '';

    });
    // attdence

    // Announcement
    var app60 = angular.module('myApp60',[])

    app60.directive('numbersOnly', function() {
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



    app60.filter('date', function () {
      return function (item) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
      ];
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
      return newDate;
    };
    });

    app60.directive('mydatepicker', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
          dateFormat: 'dd-mm-yy',
          // changeMonth: true,
          // changeYear: true,
          minDate: 0,
          onSelect: function (date) {
            scope.date = date;

            scope.$apply();
          }
        });
      }
    };
    });



    app60.directive('ngEnter', function () {
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

    app60.controller('myCtrt60', function($scope,$window,$http,$interval) {

    $scope.page = 1;
    $scope.all = [];
    $scope.start = '';

    $scope.subject ='';
    $scope.message ='';
    $scope.date ='';
    $scope.sendtoall ='';

    $scope.id = '';
    $scope.view = [];
    $scope.editdata = [];
    $scope.typingLENGTH =800;
    $scope.lastTypingTime='';
    $scope.typing = false;
    $scope.selectedemployee = [];
    $scope.allemployee = [];
    $scope.perpage = 10;
    $scope.disabled = false;
    $scope.disabled1 = false;
    $scope.disabled2 = false;
    $scope.disabled3 = false;



    $scope.get = function()
    {
      var obj = { page :$scope.page,perpage:$scope.perpage };
      $http({
        url: '<?php echo base_url(); ?>freelancer/getannouncement',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.all = response.data.result;
          $scope.start = response.data.start;
          $scope.total      = response.data.pcount;

          if($scope.page == 1)
          $scope.pagination($scope.total);
        }
        else
        {
          $scope.all = [];
        }
      });
    }

    $scope.pagination = function ($event)
    {
      if($scope.total > $scope.perpage)
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


    $scope.save = function()
    {
      $scope.submitl = true;
      $scope.timeerror = false;
      var error = false;
      $scope.date = angular.element('#date').val();

      if($scope.subject == '' || $scope.message == '' || $scope.date == ''  )
      {
        error = true;
      }

      if($scope.selectedemployee.length == 0 && !$scope.sendtoall)
      {
        error = true;
      }

      if(error == true)
      {
        return false;
      }
      var obj = { annDate :$scope.date,annSubject:$scope.subject,annMessage:$scope.message,annSendAll  :$scope.sendtoall,selectedEmployee:$scope.selectedemployee };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/announcementSave',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.message == "true")
        {
          $scope.get();

          angular.element('.preloader').hide();
          angular.element('#addannouncement').modal('hide');
          $scope.subject ='';
          $scope.message ='';
          $scope.date ='';
          $scope.sendtoall ='';
          $scope.selectedemployee = [];
          $scope.allemployee = [];

          $scope.submitl = false;
        $.notify("Announcement Added Successfully", "success");
        }

      });
    }




    $scope.confirm = function(id)
    {
      $scope.id = id;
      angular.element('#Delete').modal('show');
    }

    $scope.delete = function()
    {
      var obj = { id :$scope.id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/deleteAnnouncement',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          angular.element('#Delete').modal('hide');
          $.notify("Announcement Deleted Successfully", "success");
          $scope.page = 1;
          $scope.get();
        }
      });
    }

    $scope.edit = function(id)
    {
      var obj = { id :id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/editAnnouncement',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
           angular.element('#edit').modal('show');
           $scope.editdata = response.data.result;
           $scope.subject1 = $scope.editdata.annSubject;
           $scope.date1 = $scope.editdata.annDate;
           $scope.message1 = $scope.editdata.annMessage;
           if($scope.editdata.annSendAll == 1)
           {
            $scope.sendtoall1 = true;
            $scope.disabled3 = true;
           }
           else
           {
             $scope.sendtoall1 = false;
             $scope.disabled2 = false;

           }
           var users = [];
           users = $scope.editdata.users;
           if(users)
           {
             for(var v in users)
             {
               var inds =  {};
               inds['name'] = users[v]['name'];
               inds['id']   =   users[v]['id'];
              $scope.selectedemployee.push(inds);
              }
           }
         }
      });
    }

    $scope.update = function()
    {
      $scope.timeerror1 = false;
      var error = false;
      $scope.date1 = angular.element('#date1').val();

      if($scope.subject1 == '' || $scope.message1 == '' || $scope.date1 == ''  )
      {
        error = true;
      }

      if($scope.selectedemployee.length == 0 && !$scope.sendtoall1)
      {
        error = true;

      }

      if(error == true)
      {
        return false;
      }
      var obj = { annId:$scope.editdata.annId,annDate :$scope.date1,annSubject:$scope.subject1,annMessage:$scope.message1,annSendAll  :$scope.sendtoall1 ,selectedEmployee:$scope.selectedemployee};
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/announcementUpdate',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.message == "true")
        {
          angular.element('.preloader').hide();
          angular.element('#edit').modal('hide');

          $scope.submitl = false;
          $scope.get();
        $.notify("Announcement Updated Successfully", "success");
        }

      });
    }



    $scope.employeekeyup = function ()
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
          $scope.getemployeekeyup();
          //console.log("Typing");

          $scope.typing = false;
        }
      },$scope.typingLENGTH);
    }

    $scope.getemployeekeyup = function()
    {
      $scope.industry = [];
      var emp = angular.element('.sendto').val();
      var m = JSON.stringify({ name : emp });
      if(emp != '')
      {
        $http({
          url: '<?php echo base_url(); ?>freelancer/EmployeeSearch',
          method: "POST",
          data:m,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response){

          $scope.allemployee = response.data.result;

        });
      }
    }


      $scope.selectemployee = function (key)
      {
        var inds =  {};
        inds['name'] = $scope.allemployee[key]['name'];
        inds['id'] = $scope.allemployee[key]['id'];

        var match = false;
        if($scope.selectedemployee.length != 0)
        {
          for(var v in $scope.selectedemployee)
          {
           if($scope.selectedemployee[v]['id'] == inds['id'] )
           {
            match = true;
           }
          }
        }

        if(!match)
        {
          $scope.disabled1 = true;
          $scope.selectedemployee.push(inds);
          angular.element('.sendto').val('');
          $scope.allemployee = [];
        }

      }

      $scope.removeEmployee = function(key)
      {
        $scope.selectedemployee.splice(key,1);
        if($scope.selectedemployee.length == 0)
        {
          $scope.disabled1 = false;
        }
      }

      $scope.changePerPage = function ($event)
  {
     $scope.perpage = $event.value;
     $scope.page = 1;
     $scope.get();
  }

  $scope.checksendtoall = function()
  {
     if($scope.sendtoall)
     {
       $scope.disabled = true;
       $scope.allemployee = [];
       $scope.sendto ='';
     }
     else
     {
       $scope.disabled = false;
     }

  }


     $scope.get();



    });

    // Announcement
    // emp announcement
    var app61 = angular.module('myApp61',[])

    app61.directive('numbersOnly', function() {
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



    app61.filter('date', function () {
      return function (item) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
      ];
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
      return newDate;
    };
    });

    app61.directive('mydatepicker', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
          dateFormat: 'dd-mm-yy',
          // changeMonth: true,
          // changeYear: true,
          // minDate: 0,
          onSelect: function (date) {
            scope.date = date;

            scope.$apply();
          }
        });
      }
    };
    });



    app61.directive('ngEnter', function () {
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

    app61.controller('myCtrt61', function($scope,$window,$http,$interval) {

    $scope.page = 1;
    $scope.all = [];
    $scope.start = '';



    $scope.get = function()
    {
      var obj = { page :$scope.page };
      $http({
        url: '<?php echo base_url(); ?>freelancer/getemp-announcement',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.all = response.data.result;
          $scope.start = response.data.start;
          $scope.total      = response.data.pcount;

          if($scope.page == 1)
          $scope.pagination($scope.total);
        }
        else
        {
          $scope.all = [];
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
            $scope.get();
          }
        });
      }
    }

    $scope.view = function(id)
    {
      var obj = { id :id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/editAnnouncement',
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


  $scope.get();

    });
    // emp announcement


    // project payment detail

     <?php
       if(!empty($projectId))
       {
         ?>
    var app62 = angular.module('myApp62',[])

    app62.directive('numbersOnly', function() {
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



    app62.filter('date', function () {
      return function (item) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
      ];
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
      return newDate;
    };
    });

    app62.directive('mydatepicker', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
          dateFormat: 'dd-mm-yy',
          // changeMonth: true,
          // changeYear: true,
          // minDate: 0,
          onSelect: function (date) {
            scope.date = date;

            scope.$apply();
          }
        });
      }
    };
    });



    app62.directive('ngEnter', function () {
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

    app62.controller('myCtrt62', function($scope,$window,$http,$interval) {

    $scope.page = 1;
    $scope.all = [];
    $scope.start = '';
    $scope.totalhours = 0;
    $scope.estamount = 0;
    $scope.received = 0;



    $scope.get = function()
    {
      var obj = { id :<?php if(!empty($projectId)){ echo $projectId; } ?> };
      $http({
        url: '<?php echo base_url(); ?>freelancer/getproject-payment-detail',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          $scope.all = response.data.result;
          var milestone = $scope.all.milestone;
          if(milestone.length != 0)
          {
            for(var i in milestone)
            {
              for(var a in milestone[i].task )
              {
                $scope.totalhours = $scope.totalhours + +milestone[i].task[a].hours;
                $scope.estamount = $scope.estamount + +milestone[i].task[a].hours * $scope.all.hourlyPrice;
                $scope.time = $scope.time + +milestone[i].task[a].time;
              }
                $scope.received =   $scope.received + +milestone[i].received;
            }
          }
        }
        else
        {
          $scope.all = [];
        }
      });
    }


    $scope.view = function(id)
    {
      var obj = { id :id };
      $http({
        url: '<?php echo base_url(); ?>freelancer/editAnnouncement',
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


  $scope.get();

    });
    <?php } ?>
    // project payment detail

    // performance
    <?php if(!empty($performanceUserId))
    { ?>
    var app63 = angular.module('myApp63',[])

    app63.directive('numbersOnly', function() {
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



    app63.filter('date', function () {
      return function (item) {
        const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
      ];
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
      return newDate;
    };
    });

    app63.directive('mydatepicker', function () {
    return {
      restrict: 'A',
      require: 'ngModel',
      link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
          dateFormat: 'dd-mm-yy',
          // changeMonth: true,
          // changeYear: true,
          // minDate: 0,
          onSelect: function (date) {
            scope.date = date;

            scope.$apply();
          }
        });
      }
    };
    });



    app63.directive('ngEnter', function () {
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

    app63.controller('myCtrt63', function($scope,$window,$http,$interval) {

    $scope.page = 1;
    $scope.all = [];
    $scope.start ='';
    $scope.alldepartment = [];
    $scope.allteam = [];

    $scope.department ='';
    $scope.allreviwer = [];
    $scope.employee ='';
    $scope.date ='';
    $scope.reviwer ='';
    $scope.jobTitle ='';
    $scope.reviewperiod ='';

    $scope.qualite = 0;
    $scope.qualiteComment = '';
    $scope.attendance=0;
    $scope.attendanceComment ='';
    $scope.reliability=0;
    $scope.reliabilityComment='';
    $scope.communication= 0;
    $scope.communicationComment='';
    $scope.judgement= 0;
    $scope.judgementComment='';
    $scope.initiative= 0;
    $scope.initiativeComment='';
    $scope.leadership= 0;
    $scope.leadershipComment='';
    $scope.cooperation= 0;
    $scope.cooperationComment = '';
    $scope.knowledge = 0;
    $scope.knowledgeComment ='';
    $scope.training=0;
    $scope.trainingComment='';
    $scope.additionalComment ='';
    $scope.employeeComment ='';
    $scope.areafocus ='';
    $scope.planObjective ='';
    $scope.id = '';
    $scope.overall = 0;
    $scope.expectedOutcome ='';
    $scope.planstart = '';
    $scope.planend = '';
    $scope.expectations ='';
    $scope.employeeSignature = '';
    $scope.employeeSignatureDate = '';
    $scope.reviewerSignature = '';
    $scope.reviewerSignatureDate = '';
    $scope.typingLENGTH =800;
    $scope.lastTypingTime='';
    $scope.typing = false;
    $scope.selectedreviwer = [];
    $scope.semployee ='';
    $scope.sreviewer ='';
    $scope.viewdata = [];
    $scope.perpage =10;
    $scope.userdetail =[];



    $http({
      url: '<?php echo base_url(); ?>freelancer/alldepartment',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      if(response.data.message == "true")
      {
        $scope.alldepartment = response.data.result;

      }
      else
      {
        $scope.all = [];
      }
    });




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

    $scope.getuserdetail = function ()
    {
      var obj = {  userId : '<?php echo $performanceUserId; ?>'  };
       $http({
          url: '<?php echo base_url(); ?>freelancer/performanceUserdetail',
          method: "POST",
          data: obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          $scope.userdetail = response.data.result;
          $scope.department = $scope.userdetail.department;
          $scope.reviewperiodstart = $scope.userdetail.reviewstart;

        });
    }

    $scope.selectdepartment = function ($event)
    {
      $scope.departmentId = $event.value;
      var obj = {  id : $scope.departmentId  };
       $http({
          url: '<?php echo base_url(); ?>freelancer/getdepartmentbyteam',
          method: "POST",
          data: obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          $scope.allteam = response.data.result;
        });

    }

    $scope.employeekeyup = function ()
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
          $scope.getemployeekeyup();
          //console.log("Typing");

          $scope.typing = false;
        }
      },$scope.typingLENGTH);
    }

    $scope.getemployeekeyup = function()
    {
      $scope.allreviwer = [];
      var emp = angular.element('.reviwer').val();
      var m = JSON.stringify({ name : emp });
      if(emp != '')
      {
        $http({
          url: '<?php echo base_url(); ?>freelancer/EmployeeSearch',
          method: "POST",
          data:m,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response){

          $scope.allreviwer = response.data.result;

        });
      }
    }


      $scope.selectreviwer = function (key)
      {
        var inds =  {};
        inds['name'] = $scope.allreviwer[key]['name'];
        inds['id'] = $scope.allreviwer[key]['id'];

        var match = false;
        if($scope.selectedreviwer.length != 0)
        {
          for(var v in $scope.selectedreviwer)
          {
           if($scope.selectedreviwer[v]['id'] == inds['id'] )
           {
            match = true;
           }
          }
        }

        if(!match)
        {
          $scope.selectedreviwer.push(inds);
          angular.element('.reviwer').val('');
          $scope.allreviwer = [];
        }

      }

      $scope.removeReviwer = function(key)
      {
        $scope.selectedreviwer.splice(key,1);
      }

    $scope.submit = function()
    {
      $scope.forms = true;

      var error = false;
      $scope.date = angular.element('#date').val();
      $scope.reviewperiodstart = angular.element('.startdate1').val();
      $scope.reviewperiodend = angular.element('.enddate1').val();
      // $scope.planstart = angular.element('.planstart').val();
      // $scope.planend = angular.element('.planend').val();

      // $scope.overall = +$scope.qualite + +$scope.attendance + +$scope.reliability + +$scope.communication + +$scope.judgement + +$scope.initiative +  +$scope.leadership + +$scope.cooperation + +$scope.leadership + +$scope.training;
      // $scope.overall = $scope.overall /50 * 5;

     // $scope.qualiteComment =='' ||
     // $scope.reviewperiodstart == '' || $scope.reviewperiodend == '' || $scope.qualite == 0 ||
     // $scope.employee == ''
      if($scope.department == '' || $scope.date == ''  || $scope.jobTitle =='' || $scope.selectedreviwer == 0 ||   $scope.project =='' || $scope.reviewperiodstart == '' || $scope.reviewperiodend =='' )
      {
        error = true;
      }
      // $scope.attendance == 0 || $scope.attendanceComment =='' || $scope.reliability == 0 || $scope.reliabilityComment =='' || $scope.communication == 0 || $scope.communicationComment ==''
      // if($scope.attendance == 0 ||  $scope.reliability == 0 ||  $scope.communication == 0  )
      // {
      //   error = true;
      //
      // }
      // $scope.judgement == 0 || $scope.judgementComment =='' || $scope.initiative == 0 || $scope.initiativeComment =='' || $scope.leadership == 0
      // if( $scope.judgement == 0 ||  $scope.initiative == 0 ||  $scope.leadership == 0 )
      // {
      //   error = true;
      //
      // }
      // $scope.leadershipComment =='' || $scope.cooperation == 0 || $scope.cooperationComment =='' || $scope.knowledge == 0 || $scope.knowledgeComment =='' || $scope.training == 0 || $scope.trainingComment =='' ||  $scope.additionalComment =='' || $scope.employeeComment ==''
      // if( $scope.cooperation == 0 ||  $scope.knowledge == 0  || $scope.training == 0  )
      // {
      //   error = true;
      // }
      // $scope.areafocus == '' || $scope.planObjective == '' || $scope.planstart == '' || $scope.planend == '' || $scope.perExpectations == ''
      // if( $scope.planstart == '' || $scope.planend == '' )
      //  {
      //     error = true;
      //  }
       //
       // if( $scope.employeeSignature == '' || $scope.employeeSignatureDate == '' || $scope.reviewerSignature == '' || $scope.reviewerSignatureDate == '')
       // {
       //   error = true;
       // }

      if(error == true)
      {
        return false;
      }
      var obj = { employeeId:'<?php echo $performanceUserId; ?>',departmentId :$scope.department,perJobTitle :$scope.jobTitle,perReviwerId :$scope.selectedreviwer,perProject:$scope.project,date:$scope.date,perReviewPeriodStart:$scope.reviewperiodstart,perReviewPeriodEnd:$scope.reviewperiodend };
      angular.element('.preloader').show();
      $http({
        url: '<?php echo base_url(); ?>freelancer/performanceSave',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.success == "true")
        {
        $.notify("Performance Added Successfully", "success");

        $interval(callAtInterval, 2500);
           function callAtInterval()
           {
            $window.location.href = '<?php echo base_url(); ?>freelancer/performance';
           }
        }

      });
    }

    $scope.rating = function ()
    {
      $scope.overall = +$scope.qualite + +$scope.attendance + +$scope.reliability + +$scope.communication + +$scope.judgement + +$scope.initiative +  +$scope.leadership + +$scope.cooperation + +$scope.leadership + +$scope.training;
      $scope.overall = $scope.overall /50 * 5;
    }


  $scope.getuserdetail();


    });

    <?php } ?>
    // performance


   // incrment
   var app64 = angular.module('myApp64',[])

   app64.directive('numbersOnly', function() {
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



   app64.filter('date', function () {
     return function (item) {
       const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
       "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
     ];
     var dates = new Date(Date.parse(item))
     var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
     return newDate;
   };
   });

   app64.directive('mydatepicker', function () {
   return {
     restrict: 'A',
     require: 'ngModel',
     link: function (scope, element, attrs, ngModelCtrl) {
       element.datepicker({
         dateFormat: 'dd-mm-yy',
         // changeMonth: true,
         // changeYear: true,
         // minDate: 0,
         onSelect: function (date) {
           scope.date = date;

           scope.$apply();
         }
       });
     }
   };
   });



   app64.directive('ngEnter', function () {
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

   app64.controller('myCtrt64', function($scope,$window,$http,$interval) {

   $scope.page = 1;
   $scope.alldata = [];
   $scope.start = '';

   $scope.startingsalary ='';
   $scope.employeeId ='';
   $scope.joiningdate ='';
   $scope.date ='';
   $scope.hike ='';

   $scope.id = '';
   $scope.view = [];
   $scope.editdata = [];

   $scope.allemployee = [];
   $scope.editdata =[];

   $scope.startingsalary1 ='';
   $scope.employeeId1 ='';
   $scope.joiningdate1 ='';
   $scope.date1 ='';
   $scope.hike1 ='';
   $scope.perpage =10;



   $scope.get = function()
   {
     var obj = { page :$scope.page,perpage:$scope.perpage };
     $http({
       url: '<?php echo base_url(); ?>freelancer/getemployeeincrment',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.message == "true")
       {
         $scope.alldata = response.data.result;
         $scope.start = response.data.start;
         $scope.total      = response.data.pcount;

         if($scope.page == 1)
         $scope.pagination($scope.total);
       }
       else
       {
         $scope.all = [];
       }
     });
   }

   $scope.getteam = function()
   {
     $http({
       url: '<?php echo base_url(); ?>freelancer/allteam',
       method: "POST",
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.message == "true")
       {
         $scope.allteam = response.data.result;
       }
       else
       {
         $scope.allteam = [];
       }
     });
   }

   $scope.pagination = function ($event)
   {
     if($scope.total > $scope.perpage)
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


   $scope.save = function()
   {
     $scope.submitl = true;
     var error = false;
     $scope.date = angular.element('#date').val();
     if($scope.hike == '' || $scope.employeeId == '')
     {
       error = true;
     }

     if(error == true)
     {
       return false;
     }
     var obj = { currentSalary:$scope.startingsalary,employeeId :$scope.employeeId,date:$scope.date,increment :$scope.hike };
     angular.element('.preloader').show();
     $http({
       url: '<?php echo base_url(); ?>freelancer/employeeIncrmentSave',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       angular.element(".preloader").hide();
       if(response.data.success == "true")
       {
         $scope.get();

         angular.element('.preloader').hide();
         angular.element('#addincrement').modal('hide');
         $scope.employeeId ='';
         $scope.hike ='';
         $scope.startingsalary ='';
         $scope.date ='';

         $scope.submitl = false;
       $.notify("Employee Increment Added Successfully", "success");
       }

     });
   }




   $scope.confirm = function(id)
   {
     $scope.id = id;
     angular.element('#Delete').modal('show');
   }

   $scope.delete = function()
   {
     var obj = { id :$scope.id };
     $http({
       url: '<?php echo base_url(); ?>freelancer/deleteemployeeincrment',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.message == "true")
       {
         angular.element('#Delete').modal('hide');
         $.notify("Employee Incrment Deleted Successfully", "success");
         $scope.page = 1;
         $scope.get();
       }
     });
   }

   $scope.edit = function(id)
   {
     var obj = { id :id };
     $http({
       url: '<?php echo base_url(); ?>freelancer/incrmentEdit',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.success == "true")
       {
         $scope.editdata = response.data.result;
         $scope.employeeId1 = $scope.editdata.employeeId;
         $scope.hike1 = $scope.editdata.increment;
         $scope.startingsalary1 = $scope.editdata.currentSalary;
         $scope.date1 = $scope.editdata.date;
         angular.element('#editincrement').modal('show');

        }
     });
   }

   $scope.view = function(id)
   {
     var obj = { id :id };
     $http({
       url: '<?php echo base_url(); ?>freelancer/getOneEmployeeIncrement',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.success == "true")
       {
          angular.element('#view').modal('show');
          $scope.viewdata = response.data.result;
        }
     });
   }

   $scope.update = function()
   {
     $scope.submitl = true;
     var error = false;
     $scope.date1 = angular.element('#date1').val();
     if($scope.hike1 == '' || $scope.employeeId1 == '')
     {
       error = true;
     }

     if(error == true)
     {
       return false;
     }
     var obj = { incrementId:$scope.editdata.incrementId,currentSalary:$scope.startingsalary1,employeeId :$scope.employeeId1,date:$scope.date1,increment :$scope.hike1 };

     angular.element('.preloader').show();
     $http({
       url: '<?php echo base_url(); ?>freelancer/incrmentUpdate',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       angular.element(".preloader").hide();
       if(response.data.success == "true")
       {
         angular.element('.preloader').hide();
         angular.element('#editincrement').modal('hide');

         $scope.submitl = false;
         $scope.get();
       $.notify("Employee Increment Updated Successfully", "success");
       }

     });
   }

   $scope.changeemployee = function($event)
   {
     var a = angular.element($event);
     var b = a[0].selectedOptions[0];
     var c = b.getAttribute('data-id');
     $scope.startingsalary = $scope.allteam[c].salary;
     // $scope.joiningdate = $scope.allteam[c].joiningdate;
   }

   $scope.changePerPage = function ($event)
  {
     $scope.perpage = $event.value;
     $scope.page = 1;
     $scope.get();
  }

    $scope.get();
    $scope.getteam();




   });

   // incrment

   // edit performance
    <?php if(!empty($performanceId))
        {
          ?>
   var app65 = angular.module('myApp65',[])

   app65.directive('numbersOnly', function() {
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



   app65.filter('date', function () {
     return function (item) {
       const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
       "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
     ];
     var dates = new Date(Date.parse(item))
     var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
     return newDate;
   };
   });

   app65.directive('mydatepicker', function () {
   return {
     restrict: 'A',
     require: 'ngModel',
     link: function (scope, element, attrs, ngModelCtrl) {
       element.datepicker({
         dateFormat: 'dd-mm-yy',
         // changeMonth: true,
         // changeYear: true,
         // minDate: 0,
         onSelect: function (date) {
           scope.date = date;

           scope.$apply();
         }
       });
     }
   };
   });



   app65.directive('ngEnter', function () {
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

   app65.controller('myCtrt65', function($scope,$window,$http,$interval) {

   $scope.page = 1;
   $scope.all = [];
   $scope.start ='';
   $scope.alldepartment = [];
   $scope.allteam = [];

   $scope.department ='';
   $scope.allreviwer = [];
   $scope.employee ='';
   $scope.date ='';
   $scope.reviwer ='';
   $scope.jobTitle ='';
   $scope.reviewperiod ='';

   $scope.qualite = 0;
   $scope.qualiteComment = '';
   $scope.attendance=0;
   $scope.attendanceComment ='';
   $scope.reliability=0;
   $scope.reliabilityComment='';
   $scope.communication= 0;
   $scope.communicationComment='';
   $scope.judgement= 0;
   $scope.judgementComment='';
   $scope.initiative= 0;
   $scope.initiativeComment='';
   $scope.leadership= 0;
   $scope.leadershipComment='';
   $scope.cooperation= 0;
   $scope.cooperationComment = '';
   $scope.knowledge = 0;
   $scope.knowledgeComment ='';
   $scope.training=0;
   $scope.trainingComment='';
   $scope.additionalComment ='';
   $scope.employeeComment ='';
   $scope.areafocus ='';
   $scope.planObjective ='';
   $scope.id = '';
   $scope.overall = 0;
   $scope.expectedOutcome ='';
   $scope.planstart = '';
   $scope.planend = '';
   $scope.expectations ='';
   $scope.employeeSignature = '';
   $scope.employeeSignatureDate = '';
   $scope.reviewerSignature = '';
   $scope.reviewerSignatureDate = '';
   $scope.typingLENGTH =800;
   $scope.lastTypingTime='';
   $scope.typing = false;
   $scope.selectedreviwer = [];
   $scope.semployee ='';
   $scope.sreviewer ='';


   $http({
     url: '<?php echo base_url(); ?>freelancer/alldepartment',
     method: "POST",
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {
     if(response.data.message == "true")
     {
       $scope.alldepartment = response.data.result;

     }
     else
     {
       $scope.all = [];
     }
   });

   $scope.get = function()
   {
     var obj = { id :<?php echo $performanceId; ?> };

     $http({
       url: '<?php echo base_url(); ?>freelancer/getperformanceEdit',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.success == "true")
       {
         $scope.all = response.data.result;
         $scope.department = $scope.all.departmentId;
         $scope.employee = $scope.all.employeeId;
         $scope.selectdepartment($scope.all.departmentId);
         $scope.date = $scope.all.date;
         $scope.jobTitle = $scope.all.perJobTitle;
         $scope.project = $scope.all.perProject;
         $scope.reviewperiodstart = $scope.all.perReviewPeriodStart;
         $scope.reviewperiodend = $scope.all.perReviewPeriodEnd;
         $scope.qualite = $scope.all.perQualityOfWork;
         $scope.qualiteComment = $scope.all.perQualityComment;
         $scope.attendance= $scope.all.perAttendance ;
         $scope.attendanceComment = $scope.all.perAttendanceComment;
         $scope.reliability = $scope.all.perReliability;
         $scope.reliabilityComment = $scope.all.perReliabilityComment;
         $scope.communication = $scope.all.perCommunication;
         $scope.communicationComment = $scope.all.perCommunicationComment;
         $scope.judgement = $scope.all.perJudgement;
         $scope.judgementComment = $scope.all.perJudgementComment;
         $scope.initiative = $scope.all.perInitiative;
         $scope.initiativeComment = $scope.all.perInitiativeComment;
         $scope.leadership = $scope.all.perLeadership;
         $scope.leadershipComment = $scope.all.perLeadershipComment;
         $scope.cooperation = $scope.all.perCooperation;
         $scope.cooperationComment = $scope.all.perCooperationComment;
         $scope.knowledge = $scope.all.perKnowledge;
         $scope.knowledgeComment = $scope.all.perKnowledgeComment;
         $scope.training = $scope.all.perTraining;
         $scope.trainingComment = $scope.all.perTrainingComment ;
         $scope.additionalComment = $scope.all.perEmployeeGoalComment;
         $scope.employeeComment = $scope.all.perEmployeeComment;
         $scope.areafocus = $scope.all.perAreaFocus;
         $scope.planObjective = $scope.all.perPlanObjective;
         $scope.overall = $scope.all.perOverall;
         $scope.expectedOutcome = $scope.all.perExpectedOutcome;
         $scope.planstart = $scope.all.perPlanStart;
         $scope.planend = $scope.all.perPlanEnd;
         $scope.expectations = $scope.all.perExpectations ;
         $scope.reviewerSignature = $scope.all.perreviewerSignature ;
         $scope.reviewerSignatureDate = $scope.all.perreviewerSignatureDate;
         var inds = {};
         inds['name'] = $scope.all.reviewername;
         inds['id'] = $scope.all.perReviewerId;
         $scope.selectedreviwer.push(inds);

       }
     });
   }




   $scope.selectdepartment = function (id)
   {

     var obj = {  id : id  };
      $http({
         url: '<?php echo base_url(); ?>freelancer/getdepartmentbyteam',
         method: "POST",
         data: obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {

         $scope.allteam = response.data.result;
       });

   }

   $scope.employeekeyup = function ()
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
         $scope.getemployeekeyup();
         //console.log("Typing");

         $scope.typing = false;
       }
     },$scope.typingLENGTH);
   }

   $scope.getemployeekeyup = function()
   {
     $scope.allreviwer = [];
     var emp = angular.element('.reviwer').val();
     var m = JSON.stringify({ name : emp });
     if(emp != '')
     {
       $http({
         url: '<?php echo base_url(); ?>freelancer/EmployeeSearch',
         method: "POST",
         data:m,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response){

         $scope.allreviwer = response.data.result;

       });
     }
   }


     $scope.selectreviwer = function (key)
     {
       var inds =  {};
       inds['name'] = $scope.allreviwer[key]['name'];
       inds['id'] = $scope.allreviwer[key]['id'];

       var match = false;
       if($scope.selectedreviwer.length != 0)
       {
         for(var v in $scope.selectedreviwer)
         {
          if($scope.selectedreviwer[v]['id'] == inds['id'] )
          {
           match = true;
          }
         }
       }

       if(!match)
       {
         $scope.selectedreviwer.push(inds);
         angular.element('.reviwer').val('');
         $scope.allreviwer = [];
       }

     }

     $scope.removeReviwer = function(key)
     {
       $scope.selectedreviwer.splice(key,1);
     }

   $scope.submit = function()
   {
     $scope.forms = true;

     var error = false;
     $scope.date = angular.element('#date').val();
     $scope.reviewperiodstart = angular.element('.startdate1').val();
     $scope.reviewperiodend = angular.element('.enddate1').val();
     $scope.planstart = angular.element('.planstart').val();
     $scope.planend = angular.element('.planend').val();

     $scope.overall = +$scope.qualite + +$scope.attendance + +$scope.reliability + +$scope.communication + +$scope.judgement + +$scope.initiative +  +$scope.leadership + +$scope.cooperation + +$scope.leadership + +$scope.training;
     $scope.overall = $scope.overall /50 * 5;


      if($scope.department == '' || $scope.date == '' || $scope.employee == '' || $scope.jobTitle =='' || $scope.project =='' || $scope.selectedreviwer == 0 || $scope.reviewperiodstart == '' || $scope.reviewperiodend == '' || $scope.qualite == 0  )
      {
             error = true;
      }
           if($scope.attendance == 0 ||  $scope.reliability == 0 ||   $scope.communication == 0  )
           {
             error = true;

           }
           if( $scope.judgement == 0 || $scope.initiative == 0 || $scope.leadership == 0 )
           {
             error = true;

           }
           if($scope.cooperation == 0 ||  $scope.knowledge == 0  || $scope.training == 0  )
           {
             error = true;
           }

           if( $scope.planstart == '' || $scope.planend == '')
            {
               error = true;
            }

            if(!$scope.reviewerSignature || $scope.reviewerSignatureDate == '')
            {
              error = true;
            }


           if(error == true)
           {
             return false;
           }
      var obj = { id:$scope.all.perId,date:$scope.date,employeeId:$scope.employee,departmentId :$scope.department,perJobTitle :$scope.jobTitle,perProject:$scope.project,perReviwerId :$scope.selectedreviwer,perQualityOfWork :$scope.qualite,perQualityComment:$scope.qualiteComment,perAttendance:$scope.attendance,perAttendanceComment:$scope.attendanceComment,perReliability:$scope.reliability,perReliabilityComment:$scope.reliabilityComment,perCommunication:$scope.communication,perCommunicationComment:$scope.communicationComment,perJudgement:$scope.judgement,perJudgementComment:$scope.judgementComment,perInitiative:$scope.initiative,perInitiativeComment:$scope.initiativeComment,perleadership:$scope.leadership,perLeadershipComment:$scope.leadershipComment,perCooperation:$scope.cooperation,perCooperationComment:$scope.cooperationComment,perKnowledge:$scope.knowledge,perKnowledgeComment:$scope.knowledgeComment,perTraining:$scope.training,perTrainingComment:$scope.trainingComment,perEmployeeGoalComment:$scope.additionalComment,perEmployeeComment:$scope.employeeComment,perAreaFocus:$scope.areafocus,perPlanObjective:$scope.planObjective,perReviewPeriodStart:$scope.reviewperiodstart,perReviewPeriodEnd:$scope.reviewperiodend,perOverall:$scope.overall,perExpectedOutcome:$scope.expectedOutcome,perPlanStart:$scope.planstart,perPlanEnd:$scope.planend,perExpectations:$scope.expectations,perreviewerSignature:$scope.reviewerSignature,perreviewerSignatureDate:$scope.reviewerSignatureDate };
     angular.element('.preloader').show();
     $http({
       url: '<?php echo base_url(); ?>freelancer/performanceUpdate',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       angular.element(".preloader").hide();
       if(response.data.success == "true")
       {
       $.notify("Performance Updated Successfully", "success");

       $interval(callAtInterval, 2500);
          function callAtInterval()
          {
           $window.location.href = '<?php echo base_url(); ?>freelancer/performance';
          }
       }

     });
   }

   $scope.rating = function ()
   {
     $scope.overall = +$scope.qualite + +$scope.attendance + +$scope.reliability + +$scope.communication + +$scope.judgement + +$scope.initiative +  +$scope.leadership + +$scope.cooperation + +$scope.leadership + +$scope.training;
     $scope.overall = $scope.overall /50 * 5;
   }

   $scope.confirm = function(id)
   {
     $scope.id = id;
     angular.element('#Delete').modal('show');
   }

   $scope.delete = function()
   {
     var obj = { id :$scope.id };
     $http({
       url: '<?php echo base_url(); ?>freelancer/performanceDelete',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.message == "true")
       {
         angular.element('#Delete').modal('hide');
         $.notify("Performance Deleted Successfully", "success");
         $scope.page = 1;
         $scope.get();
       }
     });
   }

 $scope.search = function()
 {
   $scope.get();
 }

 $scope.get();

   });
   <?php } ?>
   // edit performance

   // lead
   var app66 = angular.module('myApp66',[])

   app66.directive('numbersOnly', function() {
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



   app66.filter('date', function () {
     return function (item) {
       const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
       "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
     ];
     var dates = new Date(Date.parse(item))
     var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
     return newDate;
   };
   });

   app66.directive('mydatepicker', function () {
   return {
     restrict: 'A',
     require: 'ngModel',
     link: function (scope, element, attrs, ngModelCtrl) {
       element.datepicker({
         dateFormat: 'dd-mm-yy',
         // changeMonth: true,
         // changeYear: true,
         // minDate: 0,
         onSelect: function (date) {
           scope.date = date;

           scope.$apply();
         }
       });
     }
   };
   });



   app66.directive('ngEnter', function () {
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

   app66.controller('myCtrt66', function($scope,$window,$http,$interval) {

   $scope.page = 1;
   $scope.alllead = [];
   $scope.start = '';
   $scope.total = '';

   $scope.id = '';
   $scope.empName  ='';
   $scope.clientName ='';
   $scope.phone ='';
   $scope.email ='';
   $scope.website ='';
   $scope.jobtitle ='';
   $scope.jobdescription ='';
   $scope.remark ='';
   $scope.budget ='';
   $scope.date ='';
   $scope.status ='';
   $scope.upload ='';
   $scope.leadcapture ='';
   $scope.skype ='';
   $scope.projecttype ='';
   $scope.timezone ='';
   $scope.alltimezone =[];
   $scope.allteam = [];
   $scope.allcurrency = [];
   $scope.currency = '';
   $scope.skill = [];
   $scope.allsource = [];
   $scope.perpage = 10;
   $scope.sstatus ='';
   $scope.sclient ='';
   $scope.sdate ='';

   $scope.ctrl = function()
   {
     $scope.email = angular.element('#email').val();
     if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
     {
       $scope.emailvalide = true;
      }
      else
      {
        $scope.emailvalide = false;
      }

    }


   $http({
   url: '<?php echo base_url(); ?>freelancer/getzones',
   method: "POST",
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
   }).then(function(response) {

   $scope.alltimezone = response.data.result;

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

   $http({
   url: '<?php echo base_url(); ?>freelancer/getallleadsource',
   method: "POST",
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
   }).then(function(response) {

   $scope.allsource = response.data.result;

   });

   $scope.get = function()
   {
     var obj = { page :$scope.page,perpage:$scope.perpage,client:$scope.sclient,status:$scope.sstatus,date:$scope.sdate };
     $http({
       url: '<?php echo base_url(); ?>freelancer/getlead',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.message == "true")
       {
         $scope.alllead = response.data.result;
         $scope.start = response.data.start;
         $scope.total      = response.data.pcount;

         if($scope.page == 1)
         $scope.pagination($scope.total);
       }
       else
       {
         $scope.alllead = [];
       }
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


   $scope.save = function()
   {
     $scope.submitp = true;
     var error = false;
     $scope.date = angular.element('#date').val();
     var pclass = $('#phone').attr('class');
     var countrycode = $('.iti__selected-flag').attr('title');
     var cl = $('.iti__flag').attr('class');
     var cl = cl.split(' ');
     cl = cl['1'];

     // || $scope.upload ==''
     if($scope.currency == '' || $scope.skype == '' || $scope.empName =='' || $scope.clientName == '' || $scope.phone =='' || $scope.email =='' || $scope.website =='' || $scope.jobtitle =='' || $scope.jobtitle =='' || $scope.jobdescription =='' || $scope.remark =='' || $scope.budget =='' || $scope.date =='' || $scope.status ==''  || $scope.leadcapture =='' || $scope.skill.length == 0 || $scope.projecttype =='' || $scope.timezone =='')
     {
       error = true;
     }

     if(pclass == "form-control ng-valid ng-not-empty ng-dirty ng-valid-parse ng-touched error11")
     {
       return false;
     }
  if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
  {
   error = true;
   $scope.emailvalide = true;
  }
  else
  {
  $scope.emailvalide = false;
  }


if(!$scope.website.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
{
 error = true;
 $scope.websitevalide = true;
}
else
{
 $scope.websitevalide = false;
}

     if(error == true)
     {
       return false;
     }
     var obj = { skill:$scope.skill, currencyId:$scope.currency,skype:$scope.skype,empName:$scope.empName,clientName :$scope.clientName,phone:$scope.phone,email :$scope.email,website:$scope.website,jobTitle:$scope.jobtitle,jobDescription:$scope.jobdescription,remark:$scope.remark,budget:$scope.budget,date:$scope.date,status:$scope.status,upload:$scope.upload,lead_sourceId:$scope.leadcapture,countryCode:countrycode,countryClass:cl,projectType:$scope.projecttype,timezone:$scope.timezone };
     angular.element('.preloader').show();
     $http({
       url: '<?php echo base_url(); ?>freelancer/leadSave',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       angular.element(".preloader").hide();
       if(response.data.success == "true")
       {
         $scope.submitp = false;
         $.notify("Lead Added Successfully", "success");
         $interval(callAtInterval, 2500);
            function callAtInterval()
            {
             $window.location.href = '<?php echo base_url(); ?>freelancer/lead';
            }
       }

     });
   }




   $scope.confirm = function(id)
   {
     $scope.id = id;
     angular.element('#Delete').modal('show');
   }

   $scope.delete = function()
   {
     var obj = { id :$scope.id };
     $http({
       url: '<?php echo base_url(); ?>freelancer/deletelead',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.message == "true")
       {
         angular.element('#Delete').modal('hide');
         $.notify("Lead Deleted Successfully", "success");
         $scope.page = 1;
         $scope.get();
       }
     });
   }

   $scope.edit = function(id)
   {
     var obj = { id :id };
     $http({
       url: '<?php echo base_url(); ?>freelancer/incrmentEdit',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.success == "true")
       {
         $scope.editdata = response.data.result;
         $scope.employeeId1 = $scope.editdata.employeeId;
         $scope.hike1 = $scope.editdata.increment;
         $scope.startingsalary1 = $scope.editdata.currentSalary;
         $scope.date1 = $scope.editdata.date;
         angular.element('#editincrement').modal('show');

        }
     });
   }

   $scope.view = function(id)
   {
     var obj = { id :id };
     $http({
       url: '<?php echo base_url(); ?>freelancer/viewlead',
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

   $scope.update = function()
   {
     $scope.submitl = true;
     var error = false;
     $scope.date1 = angular.element('#date1').val();
     if($scope.hike1 == '' || $scope.employeeId1 == '')
     {
       error = true;
     }

     if(error == true)
     {
       return false;
     }
     var obj = { incrementId:$scope.editdata.incrementId,currentSalary:$scope.startingsalary1,employeeId :$scope.employeeId1,date:$scope.date1,increment :$scope.hike1 };

     angular.element('.preloader').show();
     $http({
       url: '<?php echo base_url(); ?>freelancer/incrmentUpdate',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       angular.element(".preloader").hide();
       if(response.data.success == "true")
       {
         angular.element('.preloader').hide();
         angular.element('#editincrement').modal('hide');

         $scope.submitl = false;
         $scope.get();
       $.notify("Incrment Updated Successfully", "success");
       }

     });
   }

   $scope.documentUpload = function ($event)
   {
     var files =$event.files;
     for (var i = 0; i < files.length; i++) {
       var f = files[i]
       var fileName = files[i].name;
       var filePath = fileName;

       var fileReader = new FileReader();
       fileReader.onload = (function(e) {
         jQuery('#teamviewimg').attr('src',e.target.result);
         var d = JSON.stringify({ image :  e.target.result });
         $http({
           url: '<?php echo base_url(); ?>freelancer/lead_documentupload',
           method: "POST",
           data: d,
           headers: {
             'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
           }
         }).then(function(response) {
           $scope.upload = response.data;

         });

       });
       fileReader.readAsDataURL(f);
     }

   }

   $scope.getteam = function()
   {
     $http({
       url: '<?php echo base_url(); ?>freelancer/allteam',
       method: "POST",
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.message == "true")
       {
         $scope.allteam = response.data.result;
       }
       else
       {
         $scope.allteam = [];
       }
     });
   }


    $scope.serviceadd =function ()
    {
   	var name = angular.element(".skill").val();

    if(name)
   {
   	 if($scope.skill.indexOf(name) === -1)
   	 {
   		 $scope.skill.push(name);
   	 }
   	 angular.element(".skill").val('');
   }

    }

    $scope.deleteservice = function (key)
    {
      $scope.skill.splice(key,1);
    }

    $scope.changePerPage = function ($event)
    {
      $scope.perpage = $event.value;
      $scope.page = 1;
      $scope.get();

    }

    $scope.search = function()
    {
       $scope.sdate = angular.element('#sdate').val();
       $scope.get();
    }



    $scope.get();
    $scope.getteam();

   });

   // lead

   // editlead
   <?php if(!empty($leadId))
      {
        ?>
   var app67 = angular.module('myApp67',['datepicker'])

   app67.directive('numbersOnly', function() {
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



   app67.filter('date', function () {
     return function (item) {
       const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
       "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
     ];
     var dates = new Date(Date.parse(item))
     var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
     return newDate;
   };
   });

   app67.directive('mydatepicker', function () {
   return {
     restrict: 'A',
     require: 'ngModel',
     link: function (scope, element, attrs, ngModelCtrl) {
       element.datepicker({
         dateFormat: 'dd-mm-yy',
         // changeMonth: true,
         // changeYear: true,
         // minDate: 0,
         onSelect: function (date) {
           scope.date = date;

           scope.$apply();
         }
       });
     }
   };
   });



   app67.directive('ngEnter', function () {
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

   app67.controller('myCtrt67', function($scope,$window,$http,$interval) {

   $scope.page = 1;
   $scope.alllead = [];
   $scope.start = '';
   $scope.total = '';

   $scope.id = '';

   $scope.clientName ='';
   $scope.phone ='';
   $scope.email ='';
   $scope.skype ='';
   $scope.website ='';
   $scope.jobtitle ='';
   $scope.jobdescription ='';
   $scope.remark ='';
   $scope.budget ='';
   $scope.date ='';
   $scope.status ='';
   $scope.upload ='';
   $scope.leadcapture ='';
   $scope.skill = [];
   $scope.info = [];
   $scope.allcurrency = [];
   $scope.editdata = [];
  $scope.allsource = [];
  $scope.projecttype ='';
  $scope.timezone ='';
  $scope.alltimezone =[];

   $scope.info.push({
     date : '',
     budget : 0,
     employeeId : '',
     currencyId : '',
     status : '',
     remark : '',
   });

   $scope.ctrl = function()
{
  var email = angular.element('#email').val();
  if(!email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
  {
    $scope.emailvalide = true;
   }
   else
   {
     $scope.emailvalide = false;
   }
 }



   $http({
   url: '<?php echo base_url(); ?>freelancer/getzones',
   method: "POST",
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
   }).then(function(response) {

   $scope.alltimezone = response.data.result;

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

   $http({
   url: '<?php echo base_url(); ?>freelancer/getallleadsource',
   method: "POST",
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
   }).then(function(response) {

   $scope.allsource = response.data.result;

   });

   $scope.save = function()
   {
     $scope.submitp = true;
     var error = false;
     $scope.date = angular.element('#date').val();

     var pclass = $('#phone').attr('class');
     var countrycode = $('.iti__selected-flag').attr('title');
     var cl = $('.iti__flag').attr('class');
     var cl = cl.split(' ');
     cl = cl['1'];

     // || $scope.upload ==''
     if($scope.currency == '' || $scope.skype == '' || $scope.empName =='' || $scope.clientName == '' || $scope.phone =='' || $scope.email =='' || $scope.website =='' || $scope.jobtitle =='' || $scope.jobtitle =='' || $scope.jobdescription =='' || $scope.remark =='' || $scope.budget =='' || $scope.date =='' || $scope.status ==''  || $scope.leadcapture =='' || $scope.skill.length == 0 ||  $scope.projecttype =='' || $scope.timezone =='')
     {
       error = true;
     }

     for( var res in $scope.info)
     {
       if($scope.info[res]['employeeId'] == '' || $scope.info[res]['budget'] =='' || $scope.info[res]['remark'] == '' || $scope.info[res]['date'] == '' || $scope.info[res]['status'] == ''  )
       {
         error = true;
       }

     }

     if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
     {
       error = true;
       $scope.emailvalide = true;
     }
     else
     {
     $scope.emailvalide = false;
     }


     if(!$scope.website.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
     {
      error = true;
      $scope.websitevalide = true;
     }
     else
     {
      $scope.websitevalide = false;
     }

     if(pclass == "form-control ng-valid ng-not-empty ng-dirty ng-valid-parse ng-touched error11")
     {
       return false;
     }

     if(error == true)
     {
       return false;
     }
     var obj = { leadId:$scope.editdata.leadId,skill:$scope.skill,skype:$scope.skype,clientName :$scope.clientName,phone:$scope.phone,email :$scope.email,website:$scope.website,jobTitle:$scope.jobtitle,jobDescription:$scope.jobdescription,upload:$scope.upload,lead_sourceId:$scope.leadcapture,countryCode:countrycode,countryClass:cl ,info:$scope.info,projectType:$scope.projecttype,timezone:$scope.timezone};
     angular.element('.preloader').show();
     $http({
       url: '<?php echo base_url(); ?>freelancer/leadUpdate',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       angular.element(".preloader").hide();
       if(response.data.success == "true")
       {
         $scope.submitp = false;
         $.notify("Lead Updated Successfully", "success");
         $interval(callAtInterval, 2500);
            function callAtInterval()
            {
             $window.location.href = '<?php echo base_url(); ?>freelancer/lead';
            }
       }

     });
   }

   $scope.edit = function()
   {
     var obj = { id :<?php echo $leadId; ?>};
     $http({
       url: '<?php echo base_url(); ?>freelancer/geteditlead',
       method: "POST",
       data :obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.message == "true")
       {
         $scope.editdata = response.data.result;
         $scope.id = $scope.editdata.leadId;
         $scope.empName  =$scope.editdata.empName;
         $scope.clientName =$scope.editdata.clientName;
         $scope.phone =$scope.editdata.phone;
         $scope.email =$scope.editdata.email;
         $scope.website =$scope.editdata.website;
         $scope.jobtitle =$scope.editdata.jobTitle;
         $scope.jobdescription =$scope.editdata.jobDescription;
         $scope.remark =$scope.editdata.remark;
         $scope.budget =$scope.editdata.budget;
         $scope.date =$scope.editdata.date;
         $scope.status =$scope.editdata.status;
         $scope.upload =$scope.editdata.upload;
         $scope.leadcapture =$scope.editdata.lead_sourceId;
         $scope.skype = $scope.editdata.skype;
         $scope.currency = $scope.editdata.currencyId;
         $scope.projecttype =$scope.editdata.projectType;
         $scope.timezone = $scope.editdata.timezone;
         $('.iti__selected-flag').attr("title",$scope.editdata.countryCode);
         $('.iti__flag').removeClass('iti__us');
         $('.iti__selected-flag .iti__flag').addClass($scope.editdata.countryClass);

         var skill = $scope.editdata.skill;
         $scope.m1 = $scope.editdata.info;
         if(skill)
         {
           for(var i in skill)
            {
               $scope.skill.push(skill[i].skill);
            }
         }

         if($scope.m1)
         {
            $scope.info = [];
           for(var i in $scope.m1)
           {
             $scope.info.push({
              employeeId : $scope.m1[i]['employeeId'],
              budget : $scope.m1[i]['budget'],
              currencyId : $scope.m1[i]['currencyId'],
              date : $scope.m1[i]['date'],
              status : $scope.m1[i]['status'],
              remark : $scope.m1[i]['remark'],
              });
           }
         }

        }
     });
   }


   $scope.documentUpload = function ($event)
   {
     var files =$event.files;
     for (var i = 0; i < files.length; i++) {
       var f = files[i]
       var fileName = files[i].name;
       var filePath = fileName;

       var fileReader = new FileReader();
       fileReader.onload = (function(e) {
         jQuery('#teamviewimg').attr('src',e.target.result);
         var d = JSON.stringify({ image :  e.target.result });
         $http({
           url: '<?php echo base_url(); ?>freelancer/lead_documentupload',
           method: "POST",
           data: d,
           headers: {
             'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
           }
         }).then(function(response) {
           $scope.upload = response.data;

         });

       });
       fileReader.readAsDataURL(f);
     }

   }

   $scope.getteam = function()
   {
     $http({
       url: '<?php echo base_url(); ?>freelancer/allteam',
       method: "POST",
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.message == "true")
       {
         $scope.allteam = response.data.result;
       }
       else
       {
         $scope.allteam = [];
       }
     });
   }


    $scope.serviceadd =function ()
    {
   	var name = angular.element(".skill").val();

    if(name)
   {
   	 if($scope.skill.indexOf(name) === -1)
   	 {
   		 $scope.skill.push(name);
   	 }
   	 angular.element(".skill").val('');
   }

    }

    $scope.deleteservice = function (key)
    {
      $scope.skill.splice(key,1);
    }

    $scope.infoadd = function ($event)
    {
    $scope.info.push({
      date : '',
      budget : 0,
      employeeId : '',
      currencyId : '',
      status : '',
      remark : '',
    });
    }

    $scope.deleteinfo = function ($key)
    {
    $scope.info.splice($key,1);
    }

    $scope.getteam();
    $scope.edit();

   });
   // editlead
<?php } ?>

// review
var app68 = angular.module('myApp68',[])

app68.directive('numbersOnly', function() {
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



app68.filter('date', function () {
  return function (item) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
  ];
  var dates = new Date(Date.parse(item))
  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
  return newDate;
};
});

app68.directive('mydatepicker', function () {
return {
  restrict: 'A',
  require: 'ngModel',
  link: function (scope, element, attrs, ngModelCtrl) {
    element.datepicker({
      dateFormat: 'dd-mm-yy',
      // changeMonth: true,
      // changeYear: true,
      // minDate: 0,
      onSelect: function (date) {
        scope.date = date;

        scope.$apply();
      }
    });
  }
};
});



app68.directive('ngEnter', function () {
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

app68.controller('myCtrt68', function($scope,$window,$http,$interval) {

$scope.page = 1;
$scope.allreview = [];
$scope.start = '';
$scope.total = '';
$scope.id ='';
$scope.type ='';
$scope.plan = '';
$scope.removed = '';
$scope.viewdata = [];



$scope.userplan = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/selectedplan',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response){

  $scope.plan = response.data.result;
});
}

$scope.removedReview = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/removedReviewCount',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response){

  $scope.removed = response.data.count;
});
}

$scope.get = function()
{
  var obj = { page :$scope.page };
  $http({
    url: '<?php echo base_url(); ?>freelancer/getreviews',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      $scope.allreview = response.data.result;
      $scope.start = response.data.start;
      $scope.total      = response.data.pcount;

      if($scope.page == 1)
      $scope.pagination($scope.total);
    }
    else
    {
      $scope.allreview = [];
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
        $scope.get();
      }
    });
  }
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
  url: '<?php echo base_url(); ?>freelancer/removeReview',
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
    $scope.get();
  }
});
}

$scope.view = function(id,type)
{
var obj = { id :id,type:type };
$http({
  url: '<?php echo base_url(); ?>freelancer/viewReview',
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


$scope.removedReview();
 $scope.get();
 $scope.userplan();


});
// review

   // paid ranking
   var app69 = angular.module('myApp69', [])


app69.controller('myCtrt69', function($scope,$window,$http,$interval) {
$scope.alldata = [];
$scope.page =1;
$scope.start = '';
$scope.total = '';
$scope.allcountry = [];
$scope.country ='';
$scope.price ='';
$scope.country1 ='';
$scope.price1 ='';
$scope.id ='';
$scope.type = 1;
$scope.searchtext ='';
$scope.total ='';
$scope.perpage =20;



$scope.get = function ()
{
var obj = {  page : $scope.page,perpage:$scope.perpage,search:$scope.searchtext   }

$http({
 url: '<?php echo base_url(); ?>freelancer/getpaidranking',
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

  if($scope.page == 1)
  $scope.pagination($scope.total);
    });
}


$scope.pagination = function ($event)
{
   if($scope.total > $scope.perpage)
   {

       $('.pagination').pagination({
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

  $scope.tabchange = function(type)
  {
    $scope.type = type;
  }

  $scope.search = function()
  {
    $scope.searchtext = angular.element('#searchtext').val();
    $scope.get();
    $scope.page =1;
  }


$scope.get();
});

   // paid ranking

   // askquestions
   var app70 = angular.module('myApp70', [])

   app70.filter('trustAsHtml',['$sce', function($sce) {

   return function(text) {

   return $sce.trustAsHtml(text);
   };
   }]);


app70.controller('myCtrt70', function($scope,$window,$http,$interval) {
$scope.alldata = [];
$scope.page =1;
$scope.start = '';
$scope.total = '';
$scope.id ='';
$scope.name ='';
$scope.skype='';
$scope.website='';
$scope.phone='';
$scope.answer='';
$scope.question='';
$scope.email='';
$scope.editdata = [];
$scope.viewdata = [];
$scope.perpage=10;


$scope.get = function ()
{
var obj = {  page : $scope.page,perpage:$scope.perpage }

$http({
 url: '<?php echo base_url(); ?>freelancer/getaskquestion',
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

  if($scope.page == 1)
  $scope.pagination($scope.total);
    });
}


$scope.pagination = function ($event)
{
   if($scope.total > $scope.perpage)
   {

       $('.pagination').pagination({
      items: $event,
      itemsOnPage:10,
      cssStyle: 'light-theme',
      onPageClick:  function (e) {
        $scope.page  = e;
        $scope.get();
         }
      });
   }
   else
   {
     $('.pagination').html('');
   }
}

$scope.confirm = function(id)
{
$scope.id = id;
angular.element('#confirmDelete').modal('show');
}

$scope.delete = function()
{
var obj = { id :$scope.id};
$http({
  url: '<?php echo base_url(); ?>freelancer/askquestionDelete',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    angular.element('#confirmDelete').modal('hide');
    $.notify("Ask Question Deleted Successfully", "success");
    $scope.page =1;

    $scope.get();
  }
});
}

$scope.edit = function(id)
{
var obj = { id :id};
$http({
  url: '<?php echo base_url(); ?>freelancer/askquestionEdit',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    angular.element('#editaskquestion').modal('show');
    $scope.editdata = response.data.result;
    $scope.name = $scope.editdata.name;
    $scope.phone = $scope.editdata.phone;
    $scope.skype = $scope.editdata.skype;
    $scope.website = $scope.editdata.website;
    $scope.email = $scope.editdata.email;
    $scope.question = $scope.editdata.question;
    CKEDITOR.instances['answer'].setData($scope.editdata.answer);
  }
});
}

$scope.update = function ()
{
  error = false;
  $scope.submitqq = true;
  $scope.answer = CKEDITOR.instances['answer'].getData();

  if($scope.name == '' || $scope.email == '' || $scope.phone == '' || $scope.skype == '' || $scope.website == '' || $scope.question == '' || $scope.answer =='')
  {
    error = true;
  }
  if(error == true)
  {
    return false;
  }
  var obj = { askQuestionId :$scope.editdata.askQuestionId,name:$scope.name,phone:$scope.phone,email:$scope.email,skype:$scope.skype,question:$scope.question,answer:$scope.answer};
  $http({
    url: '<?php echo base_url(); ?>freelancer/askquestionUpdate',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      $scope.name = '';
      $scope.phone = '';
      $scope.skype = '';
      $scope.email = '';
      $scope.website = '';
      $scope.question = '';
      $scope.answer = '';
      angular.element('#editaskquestion').modal('hide');
      $.notify("Ask Question Updated Successfully", "success");
      $scope.get();
    }
  });

}

$scope.view = function(id)
{
var obj = { id :id};
$http({
  url: '<?php echo base_url(); ?>freelancer/askquestionEdit',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    angular.element('#viewaskquestion').modal('show');
    $scope.viewdata = response.data.result;
  }
});
}

$scope.changePerPage = function ($event)
{
  $scope.perpage = $event.value;
  $scope.page = 1;
  $scope.get();

}



$scope.get();
});


   // askquestions

   // gig
   var app71 = angular.module('myApp71', [])


   app71.filter('trustAsHtml',['$sce', function($sce) {

   		 return function(text) {

   			 return $sce.trustAsHtml(text);
   					};
   	 }]);

app71.controller('myCtrt71', function($scope,$window,$http,$interval) {

$scope.alldata = [];
$scope.page =1;
$scope.start = '';
$scope.total = '';
$scope.id ='';

$scope.viewdata = [];
$scope.perpage =10;


$scope.get = function ()
{
var obj = {  page : $scope.page,perpage:$scope.perpage}

$http({
 url: '<?php echo base_url(); ?>freelancer/getgig',
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

  if($scope.page == 1)
  $scope.pagination($scope.total);
    });
}


$scope.pagination = function ($event)
{
   if($scope.total > $scope.perpage)
   {

       $('.pagination').pagination({
      items: $event,
      itemsOnPage:10,
      cssStyle: 'light-theme',
      onPageClick:  function (e) {
        $scope.page  = e;
        $scope.get();
         }
      });
   }
   else
   {
     $('.pagination').html('');
   }
}

$scope.confirm = function(id)
{
$scope.id = id;
angular.element('#confirmDelete').modal('show');
}

$scope.delete = function()
{
var obj = { id :$scope.id};
$http({
  url: '<?php echo base_url(); ?>freelancer/gigDelete',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    angular.element('#confirmDelete').modal('hide');
    $.notify("Gig Deleted Successfully", "success");
    $scope.page =1;

    $scope.get();
  }
});
}

$scope.edit = function(id)
{
var obj = { id :id};
$http({
  url: '<?php echo base_url(); ?>freelancer/askquestionEdit',
  method: "POST",
  data :obj,
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    angular.element('#editaskquestion').modal('show');
    $scope.editdata = response.data.result;
    $scope.name = $scope.editdata.name;
    $scope.phone = $scope.editdata.phone;
    $scope.skype = $scope.editdata.skype;
    $scope.website = $scope.editdata.website;
    $scope.email = $scope.editdata.email;
    $scope.question = $scope.editdata.question;
  }
});
}

$scope.update = function ()
{
  error = false;
  $scope.submitqq = true;

  if($scope.name == '' || $scope.email == '' || $scope.phone == '' || $scope.skype == '' || $scope.website == '' || $scope.question == '' || $scope.answer =='')
  {
    error = true;
  }
  if(error == true)
  {
    return false;
  }
  var obj = { askQuestionId :$scope.editdata.askQuestionId,name:$scope.name,phone:$scope.phone,email:$scope.email,skype:$scope.skype,question:$scope.question,answer:$scope.answer};
  $http({
    url: '<?php echo base_url(); ?>freelancer/askquestionUpdate',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      $scope.name = '';
      $scope.phone = '';
      $scope.skype = '';
      $scope.email = '';
      $scope.website = '';
      $scope.question = '';
      CKEDITOR.instances['answer'].setData('');
      angular.element('#editaskquestion').modal('hide');
      $.notify("Ask Question Updated Successfully", "success");
      $scope.get();
    }
  });

}

$scope.view = function(id)
{
var obj = { gigId :id};
$http({
  url: '<?php echo base_url(); ?>freelancer/gigview',
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

$scope.changePerPage = function ($event)
{
  $scope.perpage = $event.value;
  $scope.page = 1;
  $scope.get();

}


$scope.get();
});
   // gig

   // gigadd
   // gig
   var app72 = angular.module('myApp72', [])

   app72.directive('numbersOnly', function() {
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

app72.controller('myCtrt72', function($scope,$window,$http,$interval) {

$scope.allservices =[];
$scope.allindustry =[];
$scope.title = '';
$scope.description ='';
$scope.industry ='';
$scope.services ='';
$scope.currency ='';

$scope.plans = [];
// $scope.standard = [];
// $scope.premium = [];
$scope.atask = [];
$scope.allcurrency = [];
$scope.image = '';
$scope.selectedplan =[];

$scope.plans.push({
  plan:'',
  explain:'',
  price:'',
  duration : '',
  description : '',
  task : [
    {
      task:'',
    }
  ],
});

$scope.showplans = [];

$scope.showplans.push(
  {
  id:'1',
  plan:'Basic',
},
{
id:'2',
plan:'Standard',
},
{
id:'3',
plan:'Premium',
}
);

$scope.planchange = function ($event)
{
  $scope.selectedplan.push($event.value);

}


$scope.plansadd = function ($event)
{
$scope.plans.push({
  plan:'',
  explain:'',
  price:'',
  duration : '',
  description : '',
  task : [
    {
      task:'',
    }
  ],
});
}


$scope.taskadd = function ($key)
{
$scope.plans[$key]['task'].push({
  task : '',
});

}


$scope.deletetask = function ($pkey,$key)
{
$scope.plans[$pkey]['task'].splice($key,1);
}

$scope.deleteplan = function ($key)
{
$scope.plans.splice($key,1);
}

$http({
url: '<?php echo base_url(); ?>getcurrency',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.allcurrency = response.data.result;

});

$scope.atask.push({
  task : '',
  price : '',
  duration : '',
});


  $scope.ataskadd = function ($event)
   {
   $scope.atask.push({
     task : '',
     price : '',
     duration : '',
   });
   }

 $scope.deletebasic = function ($key)
 {
 $scope.basic.splice($key,1);
 }

 $scope.deletestandard = function ($key)
 {
 $scope.standard.splice($key,1);
 }

 $scope.deletepremium = function ($key)
 {
 $scope.premium.splice($key,1);
 }

 $scope.adeletetask = function ($key)
 {
 $scope.atask.splice($key,1);
 }

$scope.getuserservice = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/userservices',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    $scope.allservices = response.data.service;
  }
});
}

$scope.getuserIndustry = function()
{

$http({
  url: '<?php echo base_url(); ?>freelancer/userindustry',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    $scope.allindustry = response.data.industry;
  }
});
}



$scope.save = function ()
{
  error = false;
  $scope.submitr = true;
  $scope.description = CKEDITOR.instances['description'].getData();

  if($scope.title == '' || $scope.description == '' ||  $scope.industry == '' || $scope.services == '' || $scope.currency =='' || $scope.image == '')
  {
    error = true;
  }


  for( var res in $scope.plans)
  {
    if($scope.plans[res]['plan'] == '' || $scope.plans[res]['explain'] == '' || $scope.plans[res]['price'] == '' || $scope.plans[res]['duration'] == '' )
    {
      error = true;
    }
  }



  if(error == true)
  {
    return false;
  }
  var obj = { title:$scope.title,image:$scope.image,currencyId:$scope.currency,description:$scope.description,industryId:$scope.industry,servicesId:$scope.services,task:$scope.atask,plans:$scope.plans};
  $http({
    url: '<?php echo base_url(); ?>freelancer/gigSave',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      $.notify("Gig Added Successfully", "success");
      $interval(callAtInterval, 2500);
         function callAtInterval()
         {
          $window.location.href = '<?php echo base_url(); ?>freelancer/giglist';
         }
    }
  });

}

$scope.imageupload = function ($event)
{
  var files =$event.files;
  for (var i = 0; i < files.length; i++) {
    var f = files[i]
    var fileName = files[i].name;
    var filePath = fileName;
    //console.log(filePath);
    var fileReader = new FileReader();
    fileReader.onload = (function(e) {
      var d = JSON.stringify({ image :  e.target.result });
      $http({
        url: '<?php echo base_url(); ?>freelancer/gigImageUpload',
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

$scope.getuserIndustry();
$scope.getuserservice();


});

   // gigadd

   // gig edit
   <?php if(!empty($gigId))
    { ?>


   var app73 = angular.module('myApp73', [])

   app73.directive('numbersOnly', function() {
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

app73.controller('myCtrt73', function($scope,$window,$http,$interval) {

$scope.allservices =[];
$scope.allindustry =[];
$scope.title = '';
$scope.description ='';
$scope.industry ='';
$scope.services ='';
$scope.currency ='';


$scope.allservices =[];
$scope.allindustry =[];
$scope.title = '';
$scope.description ='';
$scope.industry ='';
$scope.services ='';
$scope.currency ='';

$scope.plans = [];
// $scope.standard = [];
// $scope.premium = [];
$scope.atask = [];
$scope.allcurrency = [];
$scope.image = '';


$scope.plans.push({
  plan:'',
  explain:'',
  price:'',
  duration : '',
  description : '',
  task : [
    {
      task:'',
    }
  ],
});

$scope.plansadd = function ($event)
{
$scope.plans.push({
  plan:'',
  explain:'',
  price:'',
  price : '',
  duration : '',
  description : '',
  task : [
    {
      task:'',
    }
  ],
});
}


$scope.taskadd = function ($key)
{
$scope.plans[$key]['task'].push({
  task : '',
});

}


$scope.deletetask = function ($pkey,$key)
{
$scope.plans[$pkey]['task'].splice($key,1);
}

$scope.deleteplan = function ($key)
{
$scope.plans.splice($key,1);
}





$scope.atask.push({
  task : '',
  price : '',
  duration : '',
});


  $scope.ataskadd = function ($event)
   {
   $scope.atask.push({
     task : '',
     price : '',
     duration : '',
   });
   }

 $scope.deletebasic = function ($key)
 {
 $scope.basic.splice($key,1);
 }

 $scope.deletestandard = function ($key)
 {
 $scope.standard.splice($key,1);
 }

 $scope.deletepremium = function ($key)
 {
 $scope.premium.splice($key,1);
 }

 $scope.adeletetask = function ($key)
 {
 $scope.atask.splice($key,1);
 }


$http({
url: '<?php echo base_url(); ?>getcurrency',
method: "POST",
headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
}
}).then(function(response) {

$scope.allcurrency = response.data.result;

});


 $scope.edit = function()
 {
   var obj = { gigId:<?php echo $gigId; ?>};

 $http({
   url: '<?php echo base_url(); ?>freelancer/getgigedit',
   method: "POST",
   data:obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {
   if(response.data.message == "true")
   {
     $scope.editdata = response.data.result;
     $scope.title = $scope.editdata.title;
     $scope.description =$scope.editdata.description;
     $scope.industry = $scope.editdata.industryId;
     $scope.services =$scope.editdata.servicesId;
     $scope.currency = $scope.editdata.currencyId;
     $scope.image = $scope.editdata.image;


     $scope.p = $scope.editdata.plan;
     $scope.t = $scope.editdata.additionaltask;

     if($scope.p)
     {
        $scope.plans = [];
       for(var i in $scope.p)
       {
         $scope.plans.push({
          task : $scope.p[i]['task'],
          plan : $scope.p[i]['plan'],
          price : $scope.p[i]['price'],
          duration : $scope.p[i]['duration'],
          explain : $scope.p[i]['explain'],
          description : $scope.p[i]['description'],
          task:[ ],
          });

          for(var j in $scope.p[i].task)
           	{
         		   $scope.plans[i]['task'].push({
           		 	task : $scope.p[i].task[j].task,
           		 });
           	}
       }
     }

     if($scope.t)
     {
        $scope.atask = [];
       for(var i in $scope.t)
       {
         $scope.atask.push({
          task : $scope.t[i]['task'],
          duration : $scope.t[i]['duration'],
          price : $scope.t[i]['price'],
          });
       }
     }

   }
 });
 }

$scope.getuserservice = function()
{
$http({
  url: '<?php echo base_url(); ?>freelancer/userservices',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    $scope.allservices = response.data.service;
  }
});
}

$scope.getuserIndustry = function()
{

$http({
  url: '<?php echo base_url(); ?>freelancer/userindustry',
  method: "POST",
  headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {
  if(response.data.message == "true")
  {
    $scope.allindustry = response.data.industry;
  }
});
}



$scope.update = function ()
{
  error = false;
  $scope.submitr = true;
  $scope.description = CKEDITOR.instances['description'].getData();

if($scope.title == '' || $scope.description == '' ||  $scope.industry == '' || $scope.services == '' || $scope.currency =='' || $scope.image == '')
  {
    error = true;
  }


  for( var res in $scope.plans)
  {
    if($scope.plans[res]['plan'] == '' || $scope.plans[res]['explain'] == '' || $scope.plans[res]['price'] == '' || $scope.plans[res]['duration'] == '' )
    {
      error = true;
    }
  }

  if(error == true)
  {
    return false;
  }
  var obj = { gigId:$scope.editdata.gigId,title:$scope.title,image:$scope.image,currencyId:$scope.currency,description:$scope.description,industryId:$scope.industry,servicesId:$scope.services,task:$scope.atask,plans:$scope.plans};
  $http({
    url: '<?php echo base_url(); ?>freelancer/gigUpdate',
    method: "POST",
    data :obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
    if(response.data.message == "true")
    {
      $.notify("Gig Updated Successfully", "success");
      $interval(callAtInterval, 2500);
         function callAtInterval()
         {
          $window.location.href = '<?php echo base_url(); ?>freelancer/giglist';
         }
    }
  });

}

$scope.imageupload = function ($event)
{
  var files =$event.files;
  for (var i = 0; i < files.length; i++) {
    var f = files[i]
    var fileName = files[i].name;
    var filePath = fileName;
    //console.log(filePath);
    var fileReader = new FileReader();
    fileReader.onload = (function(e) {
      var d = JSON.stringify({ image :  e.target.result });
      $http({
        url: '<?php echo base_url(); ?>freelancer/gigImageUpload',
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


$scope.edit();
$scope.getuserIndustry();
$scope.getuserservice();


});

<?php } ?>
   // gig edit

   // lead source
   var app74 = angular.module('myApp74',[])

   app74.directive('numbersOnly', function() {
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



   app74.filter('date', function () {
     return function (item) {
       var dates = new Date(Date.parse(item))
       var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
       return newDate;
     };
   });

   app74.directive('mydatepicker', function () {
     return {
       restrict: 'A',
       require: 'ngModel',
       link: function (scope, element, attrs, ngModelCtrl) {
         element.datepicker({
           dateFormat: 'dd-mm-yy',
           minDate: 0,
           onSelect: function (date) {
             scope.date = date;
             scope.$apply();
           }
         });
       }
     };
   });



   app74.directive('ngEnter', function () {
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

   app74.controller('myCtrt74', function($scope,$window,$http,$interval) {

     $scope.page = 1;
     $scope.leave = [];
     $scope.total = '';
     $scope.status = '';
     $scope.id = '';
     $scope.userId = '';
     $scope.title = '';
     $scope.title1 = '';
     $scope.start = '';
     $scope.totalemp = 0;
     $scope.editdata = [];

     $scope.submit = function()
     {
       $scope.submitl = true;
       var error = false;
       $scope.title = angular.element('#title').val();


       if($scope.title == '')
       {
         error = true;
       }

       if(error == true)
       {
         return false;
       }

       var obj = { source:$scope.title };
       angular.element('.preloader').show();
       $http({
         url: '<?php echo base_url(); ?>freelancer/leadsourceSave',
         method: "POST",
         data: obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {
         angular.element(".preloader").hide();
         if(response.data.message == "true")
         {
           angular.element('.preloader').hide();
           angular.element('#addsource').modal('hide');
           $scope.title ='';
           $scope.get();
           $scope.submitl = false;

           $.notify("Lead Source Added Successfully", "success");

         }
         if(response.data.already == "true")
         {
           $.notify("Lead Capture Source Already Exists", "error");
         }
       });

     }


     $scope.get = function()
     {
       var obj = { page :$scope.page };
       $http({
         url: '<?php echo base_url(); ?>freelancer/getlead-source',
         method: "POST",
         data :obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {
         if(response.data.message == "true")
         {
           $scope.allsource = response.data.result;
           $scope.total      = response.data.pcount;
           $scope.start = response.data.start;

           if($scope.page == 1)
           $scope.pagination($scope.total);

         }
         else
         {
           $scope.allsource = [];
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
             $scope.get();
           }
         });
       }
     }

     $scope.confirm = function(id)
     {
       $scope.id = id;
       angular.element('#Delete').modal('show');
     }

     $scope.delete = function()
     {
       var obj = { id :$scope.id };
       $http({
         url: '<?php echo base_url(); ?>freelancer/getlead-sourcedelete',
         method: "POST",
         data :obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {
         if(response.data.message == "true")
         {
           angular.element('#Delete').modal('hide');
           $.notify("Lead Source Deleted Successfully", "success");
           $scope.page =1;
           $scope.get();
         }
       });
     }


     $scope.edit = function(id)
     {
       var obj = { id :id };
       $http({
         url: '<?php echo base_url(); ?>freelancer/leadSourceEdit',
         method: "POST",
         data :obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {
         if(response.data.message == "true")
         {
           $scope.editdata = response.data.result;
           $scope.title1 = $scope.editdata.source;
           angular.element('#editsource').modal('show');

         }
       });
     }

     $scope.update = function()
     {
       $scope.submitl = true;
       var error = false;
       $scope.title1 = angular.element('#title1').val();


       if($scope.title1 == '')
       {
         error = true;
       }

       if(error == true)
       {
         return false;
       }

       var obj = { lead_sourceId:$scope.editdata.lead_sourceId,source:$scope.title1 };
       angular.element('.preloader').show();
       $http({
         url: '<?php echo base_url(); ?>freelancer/leadSourceUpdate',
         method: "POST",
         data: obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {
         angular.element(".preloader").hide();
         if(response.data.message == "true")
         {
           angular.element('.preloader').hide();
           angular.element('#editsource').modal('hide');
           $scope.title1 ='';
           $scope.get();
           $scope.submitl = false;

           $.notify("Lead Source Updated Successfully", "success");

         }

       });

     }


     $scope.get();


   });

   // lead source

   // gig
          var app75 = angular.module('myApp75', [])


          app75.filter('trustAsHtml',['$sce', function($sce) {

              return function(text) {

                return $sce.trustAsHtml(text);
                   };
            }]);

            app75.filter('date', function () {
              return function (item) {
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
              ];
              var dates = new Date(Date.parse(item))
              var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
              return newDate;
            };
            });

          app75.controller('myCtrt75', function($scope,$window,$http,$interval) {

          $scope.alldata = [];
          $scope.page =1;
          $scope.start = '';
          $scope.total = '';
          $scope.id ='';

          $scope.viewdata = [];


          $scope.get = function ()
          {
          var obj = {  page : $scope.page}

          $http({
          url: '<?php echo base_url(); ?>freelancer/getbuygig',
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

          if($scope.page == 1)
          $scope.pagination($scope.total);
           });
          }


          $scope.pagination = function ($event)
          {
          if($scope.total > 10)
          {
              $('.pagination').pagination({
             items: $event,
             itemsOnPage:10,
             cssStyle: 'light-theme',
             onPageClick:  function (e) {
               $scope.page  = e;
               $scope.get();
                }
             });
          }
          else
          {
            $('.pagination').html('');
          }
          }



          $scope.changePerPage = function ($event)
          {
          $scope.perpage = $event.value;
          $scope.page = 1;
          $scope.get();

          }


          $scope.get();
          });

          // gig

          <?php if(!empty($gigId))
          { ?>

          var app76 = angular.module('myApp76',['luegg.directives'])

          app76.filter('trustAsHtml',['$sce', function($sce) {

              return function(text) {

                return $sce.trustAsHtml(text);
                   };
            }]);

            app76.filter('underscoreless', function () {
              return function (input) {
                  if(input)
                  {
            	   	return input.split(' ').join('-');
                  }
              };
            });


            app76.filter('htmlToPlaintext', function() {
              return function(text) {
                return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
              };
            });

            app76.filter('date', function () {
              return function (item) {
                const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
              ];
              var dates = new Date(Date.parse(item))
              var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
              return newDate;
            };
            });

            app76.filter('time', function () {

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

          app76.controller('myCtrt76', function($scope,$window,$http,$interval) {
          $scope.glued = true;
          $scope.gig = [];
          $scope.id ='';
          $scope.activity =[];
          $scope.status ='';
          $scope.jobId ='';
          $scope.reason ='';
          $scope.rating ='';
          $scope.communication = 1;
          $scope.skill = 1;
          $scope.responsiveness = 1;
          $scope.quality = 1;
          $scope.achieved = 1;
          $scope.rehire =1;
          $scope.availability =1;
          $scope.deadline =1;
          $scope.cooperation =1;
          $scope.cost = 1;
          $scope.overall = 1;
          $scope.contractId = '';
          $scope.allreview =[];
          $scope.c ='';
          $scope.userId ='';

          $http.get("<?php echo base_url(); ?>freelancer/getsession")
          .then(function(response)
          {
          $scope.userId = response.data.userid;

          });

          $scope.getlog = function (buygigId)
          {

            var  url= '<?php echo base_url(); ?>freelancer/getgiglog/'+buygigId;

            $http({
              url: url,
              method: "POST",
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
              }
            }).then(function(response) {

              if(response.data.message == "true")
              {
                $scope.activity = response.data.result;

                // console.log($scope.activity);
              }

            });

          }

          $scope.comment = function(id)
          {
            $(".comment").hide();
            $(".cbt").hide();
            $(".comment"+id).attr('contenteditable','true');
            $(".comment"+id).show();
            $(".cbtn"+id).show();
          }

          $scope.submitcomment = function(id)
          {

            var text1 = angular.element(".comment"+id).html();
            var text = $scope.removehtml(text1);
            //console.log(text);
            if(text != '')
            {
              var obj = { logType:'gig',logSubType:'comment', logText : text,logReference : id }
              $http({
                url: '<?php echo base_url(); ?>freelancer/projectTaskcomment',
                method: "POST",
                data: obj,
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                angular.element(".preloader").hide();
                if(response.data.message == "true")
                {
                  // $.notify("Comment  Successfully Added", "success");
                  var text = angular.element(".comment"+id).html('');
                  $(".comment").hide();
                  $(".cbt").hide();
                  $scope.getlog($scope.gig.user_gig_buyId);
                }
              });

            }
          }

          $scope.removehtml = function(text)
          {
            return  text ? String(text).replace(/<[^>]+>&nbsp;/gm, '') : '';
          }

          $scope.submitMessage = function(id)
          {
            var text1 = angular.element(".message").val();
            var text = $scope.removehtml(text1);

            if(text != '')
            {
              var obj = { logType:'gig',logSubType:'contract', logText : text,logFile:$scope.file,logReference : id }
              $http({
                url: '<?php echo base_url(); ?>freelancer/projectTaskcomment',
                method: "POST",
                data: obj,
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                angular.element(".preloader").hide();
                if(response.data.message == "true")
                {
                  angular.element(".message").val('');
                  $scope.getlog($scope.gig.user_gig_buyId);
                }
              });

            }
          }

          $scope.Attachment = function ($event) {
            $scope.attch = true;
            var files =$event.files;
            for (var i = 0; i < files.length; i++) {
              var f = files[i]
              var fileName = files[i].name;
              var filePath = fileName;
              //console.log(filePath);
              var fileReader = new FileReader();
              fileReader.onload = (function(e) {
                var d = JSON.stringify({ image :  e.target.result });
                $http({
                  url: '<?php echo base_url(); ?>freelancer/taskAttachment',
                  method: "POST",
                  data: d,
                  headers: {
                    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                  }
                }).then(function(response) {
                  $scope.file = response.data;
                  $scope.attch = false;
                });

              });
              fileReader.readAsDataURL(f);
            }

          }

          $scope.get = function ()
          {
          var obj = {  id : '<?php echo $gigId; ?>'}

          $http({
          url: '<?php echo base_url(); ?>freelancer/getbuygigdetail',
          method: "POST",
          data:obj,
          headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
          }).then(function(response) {
          if(response.data.message == 'true')
          {
          $scope.gig = response.data.result;
          $scope.getallreview();

          }
           });
          }

          // endcontract

          $scope.endcontract = function(contractId,clientId)
          {
          $scope.contractId = contractId;
          $scope.c = clientId;
          angular.element("#contractend").modal('show');
          }



          $scope.submitContractReview = function()
          {

          $scope.msgSubmit = true;
          var error = false;
          $scope.review =	angular.element("#review").val();
          $scope.reason = angular.element("#reason").val();


          if($scope.contractId == '' || $scope.c == ''  || $scope.reason == '' || $scope.rating == '' || $scope.review =='')
          {
          error = true;
          }

          if(error == true)
          {
          return false;
          }


          var obj = { gigId :$scope.gig.gigId, user_gig_buyId : $scope.contractId,overall:$scope.rating,clientId:$scope.c,communication : $scope.communication,skill:$scope.skill,deadline:$scope.deadline,quality:$scope.quality,cooperation:$scope.cooperation,review:$scope.review,rehire:$scope.rehire,cost:$scope.cost,availability:$scope.availability,total:$scope.overall }
          angular.element(".preloader").show();
          $http({
          url: '<?php echo base_url(); ?>freelancer/gigreview',
          method: "POST",
          data: obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
          }).then(function(response) {
          angular.element(".preloader").hide();

          if(response.data.message == "true")
          {
            $scope.gig.status =2;
            $.notify("Review Successfully Submit", "success");
            $scope.get();
            angular.element("#contractend").modal('hide');


          }


          });

          }


          $scope.starrating = function(type,val)
          {
          if(type == "comm")
          {
          $scope.communication = val;
          }

          else if(type == "skill")
          {
          $scope.skill = val;
          }

          else if(type == "res")
          {
          $scope.responsiveness = val;
          }

          else if(type == "quality")
          {
          $scope.quality = val;
          }

          else if(type == "rehire")
          {
          $scope.rehire = val;
          }
          else if(type == "availability")
          {
          $scope.availability = val;
          }

          else if(type == "deadline")
          {
          $scope.deadline = val;
          }

          else if(type == "cooperation")
          {
          $scope.cooperation = val;
          }

          else if(type == "schedule")
          {
          $scope.schedule = val;
          }

          else if(type == "cost")
          {
          $scope.cost = val;
          }


          var add = parseFloat($scope.communication * 0.20) + parseFloat($scope.skill * 0.40) + parseFloat($scope.rehire * 0.40) + parseFloat($scope.quality * 0.20) + parseFloat($scope.availability * 0.20) + parseFloat($scope.deadline * 0.20) + parseFloat($scope.cooperation * 0.20) +  parseFloat($scope.cost * 0.20);

          $scope.overall  = add;


          }

          $scope.overallrating = function($event)
          {
          if($event.target.checked ==  true)
          {
          $scope.rating = $event.target.value;
          }
          }

          $scope.getallreview = function()
          {
          var obj = {  user_gig_buyId : $scope.gig.user_gig_buyId }
          $http({
          url: '<?php echo base_url(); ?>freelancer/getgigreview',
          method: "POST",
          data: obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
          }).then(function(response) {

          if(response.data.message == "true")
          {
            $scope.allreview = response.data.result;
          }

          });
          }
          // endcontract


          $scope.getlog(<?php echo $gigId; ?>);


          $scope.get();
          });
          <?php } ?>
          // gigdetail

          // performance listing
          var app77 = angular.module('myApp77',[])

          app77.directive('numbersOnly', function() {
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



          app77.filter('date', function () {
            return function (item) {
              const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
              "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
            ];
            var dates = new Date(Date.parse(item))
            var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
            return newDate;
          };
          });

          app77.directive('mydatepicker', function () {
          return {
            restrict: 'A',
            require: 'ngModel',
            link: function (scope, element, attrs, ngModelCtrl) {
              element.datepicker({
                dateFormat: 'dd-mm-yy',
                // changeMonth: true,
                // changeYear: true,
                // minDate: 0,
                onSelect: function (date) {
                  scope.date = date;

                  scope.$apply();
                }
              });
            }
          };
          });



          app77.directive('ngEnter', function () {
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

          app77.controller('myCtrt77', function($scope,$window,$http,$interval) {

          $scope.page = 1;
          $scope.all = [];
          $scope.start ='';
          $scope.alldepartment = [];
          $scope.allteam = [];

          $scope.department ='';
          $scope.allreviwer = [];
          $scope.employee ='';
          $scope.date ='';
          $scope.reviwer ='';
          $scope.jobTitle ='';
          $scope.reviewperiod ='';

          $scope.qualite = 0;
          $scope.qualiteComment = '';
          $scope.attendance=0;
          $scope.attendanceComment ='';
          $scope.reliability=0;
          $scope.reliabilityComment='';
          $scope.communication= 0;
          $scope.communicationComment='';
          $scope.judgement= 0;
          $scope.judgementComment='';
          $scope.initiative= 0;
          $scope.initiativeComment='';
          $scope.leadership= 0;
          $scope.leadershipComment='';
          $scope.cooperation= 0;
          $scope.cooperationComment = '';
          $scope.knowledge = 0;
          $scope.knowledgeComment ='';
          $scope.training=0;
          $scope.trainingComment='';
          $scope.additionalComment ='';
          $scope.employeeComment ='';
          $scope.areafocus ='';
          $scope.planObjective ='';
          $scope.id = '';
          $scope.overall = 0;
          $scope.expectedOutcome ='';
          $scope.planstart = '';
          $scope.planend = '';
          $scope.expectations ='';
          $scope.employeeSignature = '';
          $scope.employeeSignatureDate = '';
          $scope.reviewerSignature = '';
          $scope.reviewerSignatureDate = '';
          $scope.typingLENGTH =800;
          $scope.lastTypingTime='';
          $scope.typing = false;
          $scope.selectedreviwer = [];
          $scope.semployee ='';
          $scope.sreviewer ='';
          $scope.viewdata = [];
          $scope.perpage =10;
          $scope.userdetail =[];



          $http({
            url: '<?php echo base_url(); ?>freelancer/alldepartment',
            method: "POST",
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.message == "true")
            {
              $scope.alldepartment = response.data.result;

            }
            else
            {
              $scope.all = [];
            }
          });

          $scope.get = function()
          {
            var obj = { page :$scope.page,employee:$scope.semployee,reviwer:$scope.sreviewer,perpage:$scope.perpage };

            $http({
              url: '<?php echo base_url(); ?>freelancer/getperformance',
              method: "POST",
              data :obj,
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
              }
            }).then(function(response) {
              if(response.data.message == "true")
              {
                $scope.all = response.data.result;
                $scope.start = response.data.start;
              }
              else
              {
                $scope.all = [];
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
                  $scope.get();
                }
              });
            }
          }







          $scope.rating = function ()
          {
            $scope.overall = +$scope.qualite + +$scope.attendance + +$scope.reliability + +$scope.communication + +$scope.judgement + +$scope.initiative +  +$scope.leadership + +$scope.cooperation + +$scope.leadership + +$scope.training;
            $scope.overall = $scope.overall /50 * 5;
          }

          $scope.confirm = function(id)
          {
            $scope.id = id;
            angular.element('#Delete').modal('show');
          }

          $scope.delete = function()
          {
            var obj = { id :$scope.id };
            $http({
              url: '<?php echo base_url(); ?>freelancer/performanceDelete',
              method: "POST",
              data :obj,
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
              }
            }).then(function(response) {
              if(response.data.message == "true")
              {
                angular.element('#Delete').modal('hide');
                $.notify("Performance Deleted Successfully", "success");
                $scope.get();
              }
            });
          }

        $scope.search = function()
        {
          $scope.get();
        }

        $scope.view = function(id)
        {
          var obj = { id :id };

          $http({
            url: '<?php echo base_url(); ?>freelancer/performanceView',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
            if(response.data.success == "true")
            {
              $scope.viewdata = response.data.result;
              angular.element('#view').modal('show');

            }
          });
        }


        $scope.changePerPage = function ($event)
        {
           $scope.perpage = $event.value;
           $scope.page = 1;
           $scope.get();

        }

        $scope.get();

          });
          // performance listing

          // leave approval request
          // get all leave list
          var app78 = angular.module('myApp78',[])

          app78.directive('numbersOnly', function() {
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


          app78.filter('date', function () {
            return function (item) {
              const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
              "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
            ];
            var dates = new Date(Date.parse(item))
            var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
            return newDate;
          };
          });



          app78.directive('ngEnter', function () {
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

          app78.controller('myCtrt78', function($scope,$window,$http,$interval) {

            $scope.page = 1;
            $scope.leave = [];
            $scope.total = '';
            $scope.status = '';
            $scope.id = '';
            $scope.userId = '';
            $scope.start ='';
            $scope.perpage = 10;
            $scope.allteam = [];


            $scope.getleave = function()
            {
              var obj = { page :$scope.page,perpage:$scope.perpage };
              $http({
                url: '<?php echo base_url(); ?>freelancer/getleaveapproval',
                method: "POST",
                data :obj,
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                angular.element(".preloader").hide();
                if(response.data.message == "true")
                {
                  $scope.leave = response.data.result;
                  $scope.total      = response.data.pcount;
                  $scope.start = response.data.start;

                  if($scope.page == 1)
                  $scope.pagination($scope.total);

                }
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
                    $scope.getleave();
                  }
                });
              }
              else
              {
                $("#pagination").html('');
              }
            }

            $scope.confirm = function(status,id,userId)
            {
              $scope.status = status;
              $scope.id = id;
              $scope.userId = userId;
              if($scope.status == 1)
              {
              angular.element('#confirm').modal('show');
              }
              else
              {
                angular.element('#reasonbox').modal('show');
              }
            }

            $scope.statusUpdate = function()
            {
              var obj = { id :$scope.id,status:$scope.status,userId:$scope.userId };
              angular.element(".preloader").show();

              $http({
                url: '<?php echo base_url(); ?>freelancer/employeeleaveStatus',
                method: "POST",
                data :obj,
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                angular.element(".preloader").hide();
                if(response.data.message == "true")
                {
                  if($scope.status == 1)
                  {
                  $.notify("Leave Status Approved Successfully", "success");
                  }
                  else if($scope.status == 2)
                  {
                    $.notify("Leave Status Declined Successfully", "success");
                  }
                  else if($scope.status == 3)
                  {
                   $.notify("Leave Status Cancelled Successfully", "success");
                  }
                  angular.element('#confirm').modal('hide');

                  $scope.getleave();

                }
              });
            }

            $scope.reasonUpdate = function ()
            {
              $scope.submitl = true;
              var error = false;
              $scope.reason = angular.element('#reason').val();


              if($scope.reason == '')
              {
                error = true;
              }

              if(error == true)
              {
                return false;
              }
              var obj = { id :$scope.id,status:$scope.status,userId:$scope.userId,reason:$scope.reason };
              angular.element(".preloader").show();

              $http({
                url: '<?php echo base_url(); ?>freelancer/employeeleaveStatus',
                method: "POST",
                data :obj,
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                angular.element(".preloader").hide();
                if(response.data.message == "true")
                {
                  if($scope.status == 1)
                  {
                  $.notify("Leave Status Approved Successfully", "success");
                  }
                  else if($scope.status == 2)
                  {
                    $.notify("Leave Status Declined Successfully", "success");
                  }
                  else if($scope.status == 3)
                  {
                   $.notify("Leave Status Cancelled Successfully", "success");
                  }
                  $scope.getleave();
                    angular.element('#reasonbox').modal('hide');
                  angular.element('#reason').val('');

                }
              });
            }


            $scope.changePerPage = function ($event)
            {
              $scope.perpage = $event.value;
              $scope.page = 1;
              $scope.getleave();
            }

            $scope.getleave();


          });

          // leave approval request

          // performance setting

          var app79 = angular.module('myApp79', [])

          app79.controller('myCtrt79', function($scope,$window,$http) {

          $scope.type = 1;
          $scope.account = '';
          $scope.invoice = '';
          $scope.paypal = '';
          $scope.currency = '';
          $scope.zone = '';
          $scope.allcurrency = [];
          $scope.allzones = [];
          $scope.allemployee = [];




            $scope.getperformance = function ()
            {
              $http({
                url: '<?php echo base_url(); ?>freelancer/getPerformanceSetting',
                method: "POST",
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                //console.log(response);
                if(response.data.message == "true")
                {
                  $scope.allemployee = response.data.result;

                }

              });
            }

            $scope.performanceUpdate = function ($event)
            {
              var a = angular.element($event);
              var b = a[0].selectedOptions[0];
              var c = b.getAttribute('data-id');
              var duration = $event.value;
              if(duration != '')
              {
              var obj = {  userId  : c,duration:duration };
              $http({
                url: '<?php echo base_url(); ?>freelancer/PerformanceSettingUpdate',
                method: "POST",
                data: obj,
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                  if(response.data.message == "true")
                 {
                   $.notify("Performance Setting Updated Successfully", "success");

                  }
                });
              }
            }

            $scope.getperformance();

          });

          // performance setting

          // task setting

          var app80 = angular.module('myApp80', [])

          app80.controller('myCtrt80', function($scope,$window,$http) {

         $scope.taskinactivitystart = '';
         $scope.taskinactivityend = '';
         $scope.questiontime = '';
         $scope.allowedgrace = '';
         $scope.data = [];


            $scope.get = function ()
            {
              $http({
                url: '<?php echo base_url(); ?>freelancer/gettasksetting',
                method: "POST",
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                //console.log(response);
                if(response.data.message == "true")
                {
                  $scope.data = response.data.result;
                  $scope.taskinactivitystart = $scope.data.taskInactivityStart;
                  $scope.taskinactivityend = $scope.data.taskInactivityEnd;
                  $scope.questiontime = $scope.data.taskQuestionTime;
                  $scope.allowedgrace = $scope.data.taskAllowedGrace;

                }

              });
            }

            $scope.Update = function ($event)
            {
              $scope.submit = true;
              var error = false;


              if($scope.taskinactivitystart == '' || $scope.taskinactivityend == '' || $scope.questiontime == '' ||  $scope.allowedgrace == '')
              {
                error = true;
              }
              if($scope.taskinactivitystart > $scope.taskinactivityend)
              {
                error = true;
              }

              if(error == true)
              {
                return false;
              }

              var obj = {  taskInactivityStart  : $scope.taskinactivitystart ,taskInactivityEnd:$scope.taskinactivityend,taskQuestionTime:$scope.questiontime,taskAllowedGrace:$scope.allowedgrace  };

              $http({
                url: '<?php echo base_url(); ?>freelancer/tasksettingUpdate',
                method: "POST",
                data: obj,
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                  if(response.data.message == "true")
                 {
                   $.notify("Task Setting Updated Successfully", "success");

                  }
                });

            }

            $scope.get();

          });

          // task setting
</script>



</body>

</html>
