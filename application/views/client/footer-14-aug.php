<div class="footer">
    <p class="mb-0">Copyright &copy; 2019 Top-SEOs All Rights Reserved.</p>
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
<!-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<script src="https://cdn.rawgit.com/Luegg/angularjs-scroll-glue/master/src/scrollglue.js"></script>
<script src="//cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/dashboard/js/jquery.simplePagination.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/js/notify.js"></script><!-- country code -->
<script src="<?php echo base_url(); ?>assets/dashboard/countrycode/js/intlTelInput.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/countrycode/js/isValidNumber.js"></script>
<!-- country code -->
<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.6.0.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>
<script src="https://rawgithub.com/angular-ui/ui-calendar/master/src/calendar.js"></script>
<!-- calendar -->

<!-- timepicker -->
<script src="<?php echo base_url(); ?>assets/dashboard/timepicker/timepicki.js"></script>
<script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
<!-- added custom -->

<script>
    // new WOW().init();
</script>
<script>
$('.app-sidebar__toggle').on('click', function() {
$('.main_wrapper').toggleClass('active')
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

 CKEDITOR.replaceClass = 'ckeditor';
/////////////////////// chat
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

		   return time;
	    };
    });


    app1.filter('date', function () {
         return function (item) {
           const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
             "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
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

		app1.directive('numbersOnly', function() {
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

				// app1.directive("scrollBottom", function(){
				// 	return {
				// 		link: function(scope, element, attr){
				// 			var $id= $("#" + attr.scrollBottom);
				// 			$(element).on("click", function(){
				// 				$id.scrollTop($id[0].scrollHeight);
				//
				// 			});
				// 		}
				// 	}
				// });

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



			app1.controller('myCtrt1', function($scope,$window,$http,$interval) {
				$scope.glued = true;

				$scope.person = [];
				$scope.messages = [];
				$scope.results='';
				$scope.getmessage ='';
				$scope.userId ='';
				$scope.userType='';
				$scope.username ='';
				$scope.userimage ='';
				$scope.selectedContact = 0;
				$scope.msgtext ='';
				$scope.edit ='';
				$scope.editmsgId ='';
				$scope.attachment ='';
				$scope.filterValue =1;
				$scope.jobtitle ='';
				$scope.milestones =[];
				$scope.jobdescription ='';
				$scope.offerTitle ='';
				$scope.jobs =[];
				$scope.jobId = '';
				$scope.jobdetail =[];
				$scope.jobskill =[];
		    $scope.refservices =[];
		    $scope.jobservices ='';
		    $scope.jobindustries =[];
		    $scope.industry = [];
		    $scope.services = [];
        $scope.jobrequiredf ='';
				$scope.editmsg ='';
				$scope.budget = 0;
				$scope.estimationHours ='';
				$scope.estimationHourlyPrice ='';
				$scope.selectedContactImage ='';
				$scope.type = 1;
				$scope.allcurrency = [];
				$scope.currency ='';
				$scope.roomId = '';
				$scope.typingLENGTH = 500;
				$scope.lastTypingTime='';
				$scope.typinguser = '';
				$scope.t = 0;
				$scope.chattype = 1;
				$scope.groupname = '';
				$scope.group = [];
				// $scope.selectedgroupId = '';
				$scope.selectmember = [];
				$scope.grouptypinguser = [];
				$scope.p = [];


				///var socket = io('https://top-seo-sockets.herokuapp.com');
				var socket = io('https://top-seo-sockets.herokuapp.com')
        //var socket = io('https://top-seo-sockets.herokuapp.com');

			  $scope.socketjoinchat = function (id)
				 {
           socket.emit('join-chat', { senderId: '<?php echo $this->session->userdata['clientloggedin']['id']; ?>',receiverId : id });
			   }
//test
				socket.on('messages', function(msg)
				{
					if(!$scope.messages[msg['MSG_ROOMID']])
					$scope.messages[msg['MSG_ROOMID']] = [];
        	$scope.messages[msg['MSG_ROOMID']].push(msg);

					if($scope.person)
					{
					  for(var a in $scope.person)
					 {
						 if($scope.person[a].fid == msg['MSG_SENTBY'])
							 {
								$scope.person[a]['unread'].push(msg);
								}
						 }
					 }
					$scope.$apply();
				});

				socket.on('typing', function(data)
		 	 {
				  //console.log(data);
		      $scope.t = 1;
		      $scope.typinguser = data.sendername;
		 	});

   socket.on('grouptyping',function(data)
	 {
     var user = data.sendername;

     if(data.type == 'stoppedtyping')
     $scope.grouptypinguser.splice($scope.grouptypinguser.indexOf(user),1);
     else
    {
      if($scope.grouptypinguser.indexOf(user) == -1)
      {
        $scope.grouptypinguser.push(user);
      }
    }
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

			// group typing updated

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
					 socket.emit('groupstopTyping', { roomId:$scope.roomId,sendername:$scope.username });
					 $scope.t = 0;

					 $scope.typing = false;
				 }
					},$scope.typingLENGTH);
		}

			/// group update typing

		 	 $scope.updateTyping = function ()
		 	 {

		 			if (!$scope.typing)
		 			{
		 				$scope.typing = true;
						socket.emit('statusupate', { senderId:$scope.userId,rec:$scope.selectedContactid,status:1});
		 				socket.emit('startTyping', { roomId:$scope.roomId,sendername:$scope.username });
						$scope.getunreadmsg();
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

			//	console.log($scope.messages);
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

				$http.get("<?php echo base_url(); ?>client-getsession")
				.then(function(response)
				{
					$scope.userId = response.data.userid;
					$scope.username = response.data.name;
					$scope.userimage = response.data.image;
					$scope.userType = response.data.type;
					$scope.getperson($scope.userId);
				});

				$scope.chatchange = function(t)
		 	 {
		 		 $scope.chattype = t;
		 		 if($scope.chattype == 2)
		 		 {
		 			 $scope.getallgroup();
		      }
		 	 }

				$scope.changetype = function(type)
				{
					$scope.type = type;
				}

				$scope.socketjoingroup = function (id)
		  	 {
		  	 	 socket.emit('join-group', { groupId: $scope.roomId });
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


				$scope.fixedtotalbudget = function($event)
				{
					$scope.estimationHours = angular.element('#hours').val();
					$scope.estimationHourlyPrice = angular.element('#hourlyrate').val();
					$scope.budget = $scope.estimationHours * $scope.estimationHourlyPrice;
       	}

				$scope.getperson = function(userId)
			 {

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
                      if(p1[a]['_id'] == $scope.userId)
                      {
                        db['fname'] = p1[a]['MSG_SENTTONAME'][0];
                        db['fid'] = p1[a]['MSG_SENTTO'][0];
                        if(p1[a]['MSG_SENTTOIMAGE'][0])
                        {
                        db['flogo'] = p1[a]['MSG_SENTTOIMAGE'][0];
                        }
                        db['cname'] = p1[a]['MSG_SENTBYNAME'][0];
                        db['cid'] = p1[a]['_id'];
                        if(p1[a]['MSG_SENTBYIMAGE'][0])
                        {
                        db['clogo'] = p1[a]['MSG_SENTBYIMAGE'][0];
                        }
                        db['unread'] = 0;
                      }
                      else if(p1[a]['MSG_SENTTO'][0] == $scope.userId)
                       {
                          db['fname'] = p1[a]['MSG_SENTBYNAME'][0];
                          db['fid'] = p1[a]['_id'];
                          if(p1[a]['MSG_SENTBYIMAGE'][0])
                          {
                          db['flogo'] = p1[a]['MSG_SENTBYIMAGE'][0];
                          }
                          db['cname'] = p1[a]['MSG_SENTTONAME'][0];
                          db['cid'] = p1[a]['MSG_SENTTO'][0];
                          if(p1[a]['MSG_SENTTOIMAGE'][0])
                          {
                          db['clogo'] = p1[a]['MSG_SENTTOIMAGE'][0];
                          }
                          db['unread'] = 0;
                        }
			              var match = false;
			 							 if($scope.p)
			 							 {
			 							   for(var v in $scope.p)
			 								 {
			 									 if($scope.p[v].fid == db['fid'])
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
                 //console.log($scope.p);

							 }

							 $scope.filterValue = 1;

						 }

						});
					}

				// $scope.getperson1 = function ()
				// {
				// 	$http.get("<?php echo base_url(); ?>client-getperson")
				// 	.then(function(response)
				// 	{
        //
				// 		$scope.person = response.data.person;
        //
        //
				// 		if($scope.person && $scope.person.length != 0 )
				// 		{
				// 			if($scope.person[0]['fid'] != $scope.userId )
				// 			{
				// 				if(parseInt($scope.person[0]['fid']) < parseInt($scope.userId))
				// 				{
				// 					$scope.roomId = 'Room_'+$scope.userId+'_'+$scope.person[0]['fid'];
				// 				}
				// 				else if(parseInt($scope.person[0]['fid']) > parseInt($scope.userId))
				// 				{
				// 					$scope.roomId = 'Room_'+$scope.person[0]['fid']+'_'+$scope.userId;
				// 				}
        //
				// 				$scope.socketjoinchat($scope.person[0]['fid']);
				// 				$scope.selectchat(0,$scope.person[0]['fid'],'all',$scope.person[0]['friendId']);
				// 			}
				// 			else if($scope.person[0]['cid'] != $scope.userId )
				// 			{
				// 				if(parseInt($scope.person[0]['cid']) < parseInt($scope.userId))
				// 				{
				// 					$scope.roomId = 'Room_'+$scope.userId+'_'+$scope.person[0]['cid'];
				// 				}
				// 				else if(parseInt($scope.person[0]['cid']) > parseInt($scope.userId))
				// 				{
				// 					$scope.roomId = 'Room_'+$scope.person[0]['cid']+'_'+$scope.userId;
				// 				}
				// 				$scope.socketjoinchat($scope.person[0]['cid']);
				// 				$scope.selectchat(0,$scope.person[0]['cid'],'all',$scope.person[0]['friendId']);
				// 			}
				// 			$scope.messages[$scope.roomId] = [];
				// 			$scope.jobtitle = $scope.person[0]['jobtitle'];
				// 			$scope.contract = $scope.person[0]['contract'];
				// 		  $scope.messages[$scope.roomId] = [];
				// 			$scope.getchat($scope.roomId);
				// 			$scope.getunreadmsg();
        //
        //       }
				// 	});
				// }

				$scope.selectgroup = function(id)
				{
					$scope.roomId = id;
					$scope.socketjoingroup($scope.roomId);
					$scope.getchat($scope.roomId);
				}

	  $scope.getmessage = function (id,type,friendId)
	   {
		    if(type != 'all')
		    {
			  var lastItem = $scope.messages[$scope.messages.length - 1];
			   if(lastItem)
         url      = '<?php echo base_url(); ?>client-getmessage/'+id+'/'+friendId+'/'+lastItem['id'];
			   else
			   url      = '<?php echo base_url(); ?>client-getmessage/'+id+'/'+friendId;

		    }
		    else
		    url      = '<?php echo base_url(); ?>client-getmessage/'+id+'/'+friendId;

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
										response.data.results[i];
									}
								}
							}
						});

	      }



					$scope.selectchat = function (i,uid,type,friendId)
					{
						$scope.selectedContact = i;
						$scope.selectedFriendid = friendId;
						$scope.selectedContactid = uid;
						$scope.getmessage(uid,type,friendId);
						$scope.jobtitle = $scope.person[i]['jobtitle'];
						$scope.selectedContactImage = $scope.person[i]['flogo'];
						$scope.socketjoinchat($scope.selectedContactid);
						if(parseInt($scope.selectedContactid) < parseInt($scope.userId))
						{
							$scope.roomId = 'Room_'+$scope.userId+'_'+$scope.selectedContactid;
						}
						else if(parseInt($scope.selectedContactid) > parseInt($scope.userId))
						{
							$scope.roomId = 'Room_'+$scope.selectedContactid+'_'+$scope.userId;
						}
						$scope.messages[$scope.roomId] = [];
						socket.emit('statusupate', { senderId:$scope.userId,rec:$scope.selectedContactid,status:1});
            $scope.getchat($scope.roomId);
						$scope.getunreadmsg();


					}

					$scope.selectchat2 = function ()
					{
					//	$scope.getmessage($scope.selectedContactid,'latest',$scope.selectedFriendid);
					}

	       $scope.request = function(id,status)
	       {

						var friendId = $scope.person[id]['friendId'];
						var d = JSON.stringify({ friendId : friendId,friendStatus : status});

						$http({
							url: '<?php echo base_url(); ?>client-request',
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
									$.notify("Request Reject successfully", "success");
								}

								$scope.person[id]['status'] = response.data.status;
							}

						});

	       }

	  $scope.sendmessage = function(uid,name,friendId)
	  {
		  error = false;

				 var msgtext = angular.element('.msgtext').val();
				 var m = JSON.stringify({ messageTo : uid,friendId: friendId,messageFrom : $scope.userId,messagetext: msgtext,messageAttachment : $scope.attachment  });

				 if($scope.userId =='' || uid == '' )
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
				socket.emit('message', { MSG_SENTBYNAME:$scope.username,MSG_SENTBYIMAGE:$scope.userimage, MSG_SENTBY: '<?php echo $this->session->userdata['clientloggedin']['id']; ?>',MSG_SENTTONAME:name,  MSG_SENTTO : uid,MSG_TEXT : msgtext,MSG_ATTACHMENT:$scope.attachment,MSG_ROOMID :$scope.roomId,MSG_SENTTOIMAGE:$scope.selectedContactImage ,MSG_DELETE : 0 ,MSG_EDIT: 0,MSG_STATUS:0 });
				// socket.emit('message', { MSG_SENTBYNAME:$scope.username,MSG_SENTBY:$scope.userimage, MSG_SENTBY: '<?php echo $this->session->userdata['clientloggedin']['id']; ?>',MSG_SENTTONAME:name,  MSG_SENTTO : uid,MSG_SENTTOIMAGE:$scope.image,MSG_TEXT : msgtext,MSG_ATTACHMENT:$scope.attachment,MSG_ROOMID :$scope.roomId });

		    angular.element('.msgtext').val('');

				// $http({
				// 	url: '<?php echo base_url(); ?>client-messageSend',
				// 	method: "POST",
				// 	data: m ,
				// 	headers: {
				// 		'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				// 	}
				// }).then(function(response) {
				//
				// 	if(response.data.message == "true")
				// 	{
				// 		$scope.attachment ='';
				// 		$scope.messages.push(response.data.result);
				// 		angular.element('.msgtext').val('');
				//
				// 	}
				//
				// });


	  }

		$scope.groupMessageSend = function(id)
		{
			error = false;
			var msgtext = angular.element('.msgtext').val();
			//console.log(msgtext);

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
					//console.log(id);
					$(".editmsg"+id).attr('contenteditable','true');
					$(".editmsg"+id).addClass("editedmsg");
				}


				$scope.messageUpdate = function(type,id)
				{

					if(type == "update")
					{

						var msg = $(".editmsg"+id).text();

					//	var m = JSON.stringify({ messageId : id ,messagetext: msg  });
						if(msg != '' )
						{

							socket.emit('updatemessage', { id:$scope.editmsgId,MSG_TEXT:msg,MSG_ROOMID:$scope.roomId,MSG_EDIT:1});
							$scope.edit = '';
							$scope.editmsgId = '';
							$(".editmsg"+id).attr('contenteditable','false');
							$(".editmsg"+id).removeClass("editedmsg");
							// $http({
							// 	url: '<?php echo base_url(); ?>client-messageUpdate',
							// 	method: "POST",
							// 	data: m ,
							// 	headers: {
							// 		'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
							// 	}
							// }).then(function(response) {
							//
							// 	if(response.data.message == "true")
							// 	{
							// 		$scope.messages[key]['message'] = msg;
							// 		$scope.messages[key]['edited'] = 1;
							// 		$scope.edit = '';
							// 		$scope.editmsgId = '';
							// 		$(".editmsg"+id).attr('contenteditable','false');
							// 		$(".editmsg"+id).removeClass("editedmsg");
							// 	}
							//
							// });
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
					// var m = JSON.stringify({ messageId : id  });
					//
					// $http({
					// 	url: '<?php echo base_url(); ?>client-messageDeleted',
					// 	method: "POST",
					// 	data: m ,
					// 	headers: {
					// 		'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					// 	}
					// }).then(function(response) {
					//
					// 	if(response.data.message == "true")
					// 	{
					// 		$scope.messages[key]['deleted'] = 1;
					// 	}
					//
					// });
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
				 $scope.personFilter = function()
				 {

					var d = JSON.stringify({ filter :  $scope.filterValue  });
					$scope.person = [];
					$http({
						url: '<?php echo base_url(); ?>client-chatpersonFilter',
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

								$scope.selectchat(0,$scope.person[0]['fid'],'all');
							}
							else if($scope.person[0]['cid'] != $scope.userId )
							{

								$scope.selectchat(0,$scope.person[0]['cid'],'all');
							}
						}

					});

				}

				$scope.getchat = function(roomId)
				{
					 $scope.messages[roomId] = [];
				 var m = JSON.stringify({ roomId :roomId});
				 $http({
				 url: 'https://top-seo-sockets.herokuapp.com/get-firm-messages?roomId='+roomId,
				 method: "GET",
				 data: m,
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
							 obj['userId'] =  $scope.person[key].fid;
							 obj['image'] =  $scope.person[key].flogo;
							 obj['name'] =  $scope.person[key].fname;
							 obj['GroupId'] = $scope.roomId;


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
				 for(var m in response.data.messages)
				 {
					 if($scope.person[a].fid == response.data.messages[m]['MSG_SENTBY'])
					 {
						$scope.person[a]['unread'].push(response.data.messages[m]);
						}
					}
				}
				socket.emit('statusupate', { senderId:$scope.userId,rec:$scope.person[0].fid,status:1});
      }

				});
			}



	// chat person filter end

	// job offer
	$scope.milestones.push({
		title : '',
		price : 0,
		task : [
			{
				task:'',
				hours:'',
				hourlyPrice:'',
				amount:0,
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
				amount:0,
			}
		],
		button:'',
	});

	}

	$scope.deletemilestone = function ($key)
	{
		//alert($key);
		$scope.milestones.splice($key,1);
	}


	$scope.totalmilestone = function($event)
	{
			$scope.budget = 0;
			 for(var i in $scope.milestones )
			{
				$scope.t = 0;
				$scope.p = 0;
				 for(var m in $scope.milestones[i]['task'])
				 {
					$scope.t = $scope.milestones[i]['task'][m]['hours'] * $scope.milestones[i]['task'][m]['hourlyPrice'];
					$scope.milestones[i]['task'][m]['amount'] = $scope.t;
					$scope.p += $scope.t;
				 }
				$scope.milestones[i]['price'] = $scope.p;
				$scope.budget = +$scope.budget + +$scope.milestones[i]['price'];
			}
		}


	$scope.taskadd = function ($key)
	{

	$scope.milestones[$key]['task'].push({

		task : '',
		hours:'',
		hourlyPrice:'',
		amount:0,
	});

	}

	$scope.deletetask = function ($mkey,$key)
	{
		//alert($key);
		$scope.milestones[$mkey]['task'].splice($key,1);
	}

	$scope.getindustry = function($event)
 {

	 $http({
	 url: '<?php echo base_url(); ?>freelancer/getindustry',
	 method: "POST",
	 headers: {
		'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

			if(response.data.message == "true")
			 {
				$scope.industry = response.data.result;

			 }
	 });
}

$scope.industrys = function($event)
{
var text = angular.element($event).val();
if(text != '')
{
 var m = JSON.stringify({ name : text });
 $http({
 url: '<?php echo base_url(); ?>freelancer/industrySearch',
 method: "POST",
 data: m,
 headers: {
	'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	 }
 }).then(function(response) {
			$scope.refindustry =[];
	 if(response.data.message == "true")
		{
			$scope.refindustry = response.data.result;
		}


		 });
	 }
}


$scope.changeindustry = function()
{

  var id = angular.element("#industry").val();

   $scope.getservices(id);

}

$scope.getservices = function(id)
{

   //var obj = {  id : $scope.jobindustries  };
 $http({
 url: '<?php echo base_url(); ?>admin/allservices',
 method: "POST",
// data:obj,
 headers: {
  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

    if(response.data.message == "true")
     {
      $scope.services = response.data.result;
      //console.log($scope.services);

     }
 });
}

  $scope.skills = function($event)
 {
  var text = angular.element($event).val();
  if(text != '')
	{
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
 }

 $scope.addskill = function (name,id)
 {
     var obj ={};
    obj['name'] = name;
    obj['id'] = id;
    check = false;
    for(var s in $scope.jobskill)
    {
      if($scope.jobskill[s]['id'] == id)
      {
        check = true;
      }
    }

     if(!check)
     {
      angular.element('.skills').val('');
      $scope.jobskill.push(obj);
     }

    $scope.refservices = [];
 }

 $scope.deleteskill = function (key)
 {
  $scope.jobskill.splice(key,1);
 }


 $scope.addindustry = function (name,id)
 {
     var obj ={};
    obj['name'] = name;
    obj['id'] = id;

    check =false;
    for(var v in $scope.jobindustries)
    {
      if($scope.jobindustries[v]['id'] == id)
      {
        check = true;
      }
    }
    if(!check)
    {
      $scope.jobindustries.push(obj);
    }
    angular.element('#industrys').val('');
    $scope.refindustry = [];
    $scope.getservices();
 }

 $scope.addrefindustry = function ()
 {
 var name = angular.element("#industrys").val();

   if(name != '')
   {
     var obj ={};
    obj['name'] = name;
    obj['id'] = 0;
    $scope.jobindustries.push(obj);
    angular.element('#industrys').val('');
    $scope.refindustry = [];
    //$scope.getservices();
   }
 }



 $scope.addrefskill = function (name,id)
 {
   var name = angular.element("#skills").val();
    if(name != '')
    {
     var obj ={};
     obj['name'] = name;
     obj['id'] = 0;
    $scope.jobskill.push(obj);
    angular.element('#skills').val('');
    $scope.refservices = [];
   }
 }


 $scope.deleteindustry = function (key)
 {
  $scope.jobindustries.splice(key,1);
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

	 $scope.submitjob = function ()
	 {

		 $scope.jobSubmit = true;
		 var error = false;
		//$scope.description = CKEDITOR.instances['description1'].getData();
		//console.log($scope.description);
		$scope.jobdescription = angular.element('#description').val();
		$scope.offTitle = angular.element('#jobtitle').val();
		$scope.jobservices = angular.element('#services').val();
		$scope.jobrequiredf = angular.element('#jobrequiredf').val();
		$scope.currency = angular.element('#jobcurrency').val();
	//	console.log($scope.jobindustries.length);
    // console.log($scope.jobservices);
		 if($scope.offTitle == '' || $scope.jobdescription == '' || $scope.jobservices == '' || $scope.jobskill.length == 0 || $scope.jobindustries.length == 0 || $scope.jobrequiredf == '' || $scope.budget == '' || $scope.currency == '')
		 {
			 error = true;
		 }

    if($scope.type == 2)
		{
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
								  if($scope.milestones[res]['task'][t]['task'] == '' || $scope.milestone[res]['task'][t]['amount'] || $scope.milestone[res]['task'][t]['hours'] || $scope.milestone[res]['task'][t]['hourlyPrice'])
								   {
									  error = true;
									 }
								}
						 }
		      }
			}

			if($scope.type == 1)
	    {
	      if($scope.estimationHours =='' || $scope.estimationHourlyPrice =='')
	      {
	       error = true;
	       }
	    }

		 if(error == true)
		 {
			return false;
		 }

		 var m = JSON.stringify({ offerto : $scope.selectedContactid,currencyId:$scope.currency,required:$scope.jobrequiredf,jobtitle : $scope.offTitle ,description : $scope.jobdescription,industry:$scope.jobindustries,service:$scope.jobservices,skill: $scope.jobskill,image:$scope.image ,totalAmount : $scope.total ,milestone : $scope.milestones,currency: $scope.currency,budget:$scope.budget,estimatehours:$scope.estimationHours,hourlyPrice: $scope.estimationHourlyPrice  });


		 //var m = JSON.stringify({ offerto : $scope.selectedContactid, jobtitle : $scope.offerTitle ,description : $scope.jobdescription,image:$scope.image ,totalAmount : $scope.total ,milestone : $scope.milestones });
		 angular.element(".preloader").show();
			$http({
			url: '<?php echo base_url(); ?>joboffer',
			method: "POST",
			data: m,
			headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				}
			}).then(function(response) {

				angular.element(".preloader").hide();

				if(response.data.message == "true")
				 {
           $scope.jobSubmit = false;
					 $scope.milestones.push({
						 title : '',
						 price : 0,
							 task : [
								 {
									 task:'',
									 hours:'',
									 hourlyPrice:'',
									 amount:0,
								 }
							 ],
						 button:'',
					 });
					 $scope.total = 0;
					 $scope.image = '';

					 angular.element("#attchment").val('');
					 angular.element("#title").val('');
					 $scope.offerTitle ='';
					 $scope.jobdescription ='';
           $scope.jobSubmit = false;
					 $scope.jobindustries =[];
					 $scope.jobskill =[];
					 angular.element('#jobcurrency').val('');
					 $scope.jobrequiredf = [];
					  angular.element('#description').val('');
					  angular.element('#jobtitle').val('');
					  angular.element('#services').val('');
					  angular.element('#jobrequiredf').val('');
						$scope.budget='';
						$scope.estimationHours ='';
						$scope.estimationHourlyPrice ='';

        	 angular.element("#joboffer").modal('hide');

					 $.notify("Job Created Successfuly", "success");
					 $scope.getperson();
				 }
				else if(response.data.message == "false")
				{
					$.notify("Job is Not send.", "error");
				}

					});

	 }

	 $scope.getjobdata = function()
		{
			$scope.milestones = [];
      $scope.jobId = angular.element("#jobId").val();
			var m = JSON.stringify({ id : $scope.jobId });

 			$http({
 			url: '<?php echo base_url(); ?>client-getjobdetail',
 			method: "POST",
 			data: m,
 			headers: {
 			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 				}
 			}).then(function(response) {

 	  	if(response.data.message == "true")
 				 {
           $scope.jobdetail = response.data.result;
 					 $scope.offerTitle = $scope.jobdetail.jobTitle;
 					 $scope.jobdescription = $scope.jobdetail.jobDescription;
					 $scope.total = $scope.jobdetail.jobAmount;
					 $scope.image = $scope.jobdetail.jobAttchment;

					// $scope.jobindustries = $scope.jobdetail.industryId;
           $scope.jobservices = $scope.jobdetail.servicesId;
					 $scope.jobrequiredf = $scope.jobdetail.jobRequiredFreelancer;

           for(var s in $scope.jobdetail.skills)
           {
             var obj ={};
             obj['name'] = $scope.jobdetail.skills[s]['service'];
             obj['id'] = $scope.jobdetail.skills[s]['id'];
             $scope.jobskill.push(obj);
           }

					 for(var i in $scope.jobdetail.industry)
					 {
					   var ob ={};
					   ob['name'] = $scope.jobdetail.industry[i]['industry'];
					   ob['id'] = $scope.jobdetail.industry[i]['id'];
					   $scope.jobindustries.push(ob);
					 }


					 for(var v in $scope.jobdetail.milestone)
					 {
						 $scope.milestones.push({
					 		title : $scope.jobdetail.milestone[v].milestoneTitle,
					 		price : $scope.jobdetail.milestone[v].milestoneAmount,
					 		task : [],
					 		button:'',
					 	  });

							for(var j in $scope.jobdetail.milestone[v].task)
							{
								$scope.milestones[v]['task'].push({

									task : $scope.jobdetail.milestone[v].task[j].taskTitle,
								});
							}
					 }
         }

 					});


		}

	 $http({
	 url: '<?php echo base_url(); ?>clientjobs',
	 method: "POST",
	 headers: {
	  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	   }
	 }).then(function(response) {

	  if(response.data.message == 'true')
	   {
	     $scope.jobs = response.data.result;
	   }
	    });

			$scope.getindustry();
			$scope.getservices();
	// job offer
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

				app3.directive('numbersOnly', function() {
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

	 app3.directive('ngEnter', function () {
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


   app3.controller('myCtrt3', function($scope,$window,$http,$interval) {

			$scope.milestones = [];
			$scope.total = 0
			$scope.image = '';
			$scope.jobtitle ='';
			$scope.description ='';
			$scope.page = 1;
			$scope.jobs = [];
			$scope.total1 = 0;
      $scope.jobskill =[];
			$scope.refservices =[];
			$scope.refindustry =[];
			$scope.jobservices ='';
			$scope.jobindustries = [];
			$scope.jobrequiredf='';
			$scope.industry = [];
			$scope.services = [];
			$scope.EditjobData=[];
      $scope.jobId ='';
			$scope.estimationHours ='';
			$scope.estimationHourlyPrice='';
			$scope.budget='';
			$scope.currency ='';
			$scope.allcurrency = [];
			$scope.typingLENGTH =800;
			$scope.lastTypingTime='';
			$scope.typing = false;
      $scope.type = 1;


      $scope.changetype = function (type)
      {
        $scope.type = type;
        if($scope.type == 1)
        {
          $scope.estimationHours ='';
          $scope.estimationHourlyPrice ='';
        }
      }


      $scope.showcreate = function()
      {
        $scope.jobSubmit = false;
       $scope.milestones.push({
         title : '',
         price : 0,
         task : [],
         button:'',
       });
       $scope.total = 0;
       $scope.image = '';

       angular.element("#attchment").val('');
       angular.element("#title").val('');
       $scope.jobtitle = '';
       $scope.currency ='';
       $scope.jobrequiredf ='';
       $scope.description ='';
       $scope.jobindustries =[];
       $scope.jobservices ='';
       $scope.jobskill =[];
       $scope.estimationHours ='';
       $scope.estimationHourlyPrice ='';
       $scope.budget ='';
       angular.element("#myJob").modal('show');
      }

      $scope.confirm = function(id)
      {
      $scope.jobId = id;
      angular.element('#confirm').modal('show');
      }

      $scope.delete = function()
      {
      var obj = { jobId :$scope.jobId };
      $http({
        url: '<?php echo base_url(); ?>client-jobdelete',
        method: "POST",
        data :obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        if(response.data.message == "true")
        {
          angular.element('#confirm').modal('hide');
          $.notify("Job Deleted Successfully", "success");
          $scope.job();
        }
      });
      }

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


			$scope.job = function ($event)
			{
				var obj = {  page : $scope.page  };

				$http({
					url: '<?php echo base_url(); ?>client-getjobs',
					method: "POST",
					data: obj,
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					}
				}).then(function(response) {

					$scope.jobs = response.data.result;
					$scope.total1 = response.data.pcount;

					 if($scope.page == 1)
					 {
					   if($scope.total1 > 10)
					   {
				    	$scope.pagination($scope.total1);
				     }
				   }
				});
			}

			  $scope.pagination = function ($event)
			  {
					if($scope.total1 > 10)
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

	// add fields

			$scope.milestones.push({
				title : '',
				price : 0,
				task : [],
				button:'',
			});

			$scope.milestoneadd = function ($event)
			{

				$scope.milestones.push({
					title : '',
					price : 0,
					task : [],
					button:'',
				});

			}

			$scope.deletemilestone = function ($key)
			{
				$scope.milestones.splice($key,1);
			}


		 $scope.totalmilestone = function($event)
	   {
		  $scope.total = 0;

		   for(var m in $scope.milestones)
		   {
			   $scope.total = +$scope.total + +$scope.milestones[m]['price'];
		    }
	   }

	   $scope.taskadd = function ($key)
	   {

				$scope.milestones[$key]['task'].push({
		     task : ''
				});

	    }

		 $scope.deletetask = function ($mkey,$key)
		 {
			$scope.milestones[$mkey]['task'].splice($key,1);
		 }

		 $scope.getindustry = function($event)
	  {

		  $http({
		  url: '<?php echo base_url(); ?>freelancer/getindustry',
		  method: "POST",
		  headers: {
			 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

			   if(response.data.message == "true")
				  {
					 $scope.industry = response.data.result;

				  }
      });
	 }

	 $scope.changeindustry = function()
	 {

		 var id = angular.element("#industry").val();

		  $scope.getservices(id);

	 }

	 $scope.getservices = function(id)
	{

     	//var obj = {  id : $scope.jobindustries  };
		$http({
		url: '<?php echo base_url(); ?>admin/allservices',
		method: "POST",
		//data:obj,
		headers: {
		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		 }
	 }).then(function(response) {

			 if(response.data.message == "true")
				{
				 $scope.services = response.data.result;
				 //console.log($scope.services);

				}
		});
 }

   $scope.skills = function ($event)
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
					$scope.keyskills($event);
					//console.log("Typing");

					$scope.typing = false;
				}
				 },$scope.typingLENGTH);
	 }

		 $scope.keyskills = function($event)
		{
		 var text = angular.element($event).val();
		 if(text != '')
		 {
			 $scope.refservices = [];
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
      else
      {
        $scope.refservices = [];
      }
		}

		$scope.addskill = function (name,id)
		{
				var obj ={};
			 obj['name'] = name;
			 obj['id'] = id;
       check = false;
			 for(var s in $scope.jobskill)
			 {
         if($scope.jobskill[s]['id'] == id)
				 {
					 check = true;
				 }
			 }

			  if(!check)
			  {
				 angular.element('#skills').val('');
				 $scope.jobskill.push(obj);
			  }

			 $scope.refservices = [];
		}

		$scope.addskill11 = function (name,id)
		{
				var obj ={};
			 obj['name'] = name;
			 obj['id'] = id;
       check = false;
			 for(var s in $scope.jobskill)
			 {
         if($scope.jobskill[s]['id'] == id)
				 {
					 check = true;
				 }
			 }

			  if(!check)
			  {
				 angular.element('#skillsedit11').val('');
				 $scope.jobskill.push(obj);
			  }

			 $scope.refservices = [];
		}

		$scope.deleteskill = function (key)
		{
		 $scope.jobskill.splice(key,1);
		}

    $scope.industrys = function($event)
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
					 $scope.keyindustry($event);
					 //console.log("Typing");

					 $scope.typing = false;
				 }
					},$scope.typingLENGTH);
		}

		$scope.keyindustry = function($event)
	 {
		var text = angular.element($event).val();
		if(text != '')
		{
		 var m = JSON.stringify({ name : text });
		 $http({
		 url: '<?php echo base_url(); ?>freelancer/industrySearch',
		 method: "POST",
		 data: m,
		 headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {
          $scope.refindustry =[];
			 if(response.data.message == "true")
				{
					$scope.refindustry = response.data.result;
				}


				 });
			 }
       else
       {
         $scope.refindustry = [];
       }
	 }

	 $scope.addindustry = function (name,id)
	 {
			 var obj ={};
			obj['name'] = name;
			obj['id'] = id;

			check =false;
			for(var v in $scope.jobindustries)
			{
			  if($scope.jobindustries[v]['id'] == id)
				{
					check = true;
				}
			}
			if(!check)
			{
				$scope.jobindustries.push(obj);
			}
			angular.element('#industrys').val('');
			$scope.refindustry = [];
			//$scope.getservices();
	 }

	 $scope.addindustry11 = function (name,id)
	 {
			 var obj ={};
			obj['name'] = name;
			obj['id'] = id;

			check =false;
			for(var v in $scope.jobindustries)
			{
			  if($scope.jobindustries[v]['id'] == id)
				{
					check = true;
				}
			}
			if(!check)
			{
				$scope.jobindustries.push(obj);
			}
			angular.element('#editindustrys').val('');
			$scope.refindustry = [];
			//$scope.getservices();
	 }

	 $scope.addrefindustry = function ()
	 {
     var name = angular.element("#industrys").val();
	   if(name != '')
		 {
			 var obj ={};
			obj['name'] = name;
			obj['id'] = 0;
      check =false;
			for(var v in $scope.jobindustries)
			{
        name = name.toLowerCase();
        name1 = $scope.jobindustries[v]['name'].toLowerCase();
			  if(name1 == name)
				{
					check = true;
				}
			}
			if(!check)
			{
			$scope.jobindustries.push(obj);
      }
			angular.element('#industrys').val('');
			$scope.refindustry = [];
			//$scope.getservices();
		 }
	 }


	 $scope.addrefindustry11 = function ()
	 {
     var name = angular.element("#editindustrys").val();
	   if(name != '')
		 {
			 var obj ={};
			obj['name'] = name;
			obj['id'] = 0;
      check =false;
			for(var v in $scope.jobindustries)
			{
        name = name.toLowerCase();
        name1 = $scope.jobindustries[v]['name'].toLowerCase();
			  if(name1 == name)
				{
					check = true;
				}
			}
			if(!check)
			{
			$scope.jobindustries.push(obj);
      }
			angular.element('#editindustrys').val('');
			$scope.refindustry = [];
			//$scope.getservices();
		 }
	 }






	 $scope.addrefskill = function (name,id)
	 {
		 var name = angular.element("#skills").val();
		  if(name != '')
			{
			 var obj ={};
			obj['name'] = name;
			obj['id'] = 0;
      check = false;
      for(var s in $scope.jobskill)
      {
        name = name.toLowerCase();
        name1 = $scope.jobskill[s]['name'].toLowerCase();
        if(name == name)
        {
          check = true;
        }
      }
      if(!check)
      {
			$scope.jobskill.push(obj);
      }
			angular.element('#skills').val('');
			$scope.refservices = [];
		 }
	 }

   $scope.addrefskill11 = function (name,id)
	 {
		 var name = angular.element("#skillsedit11").val();
		  if(name != '')
			{
			 var obj ={};
			obj['name'] = name;
			obj['id'] = 0;
      check = false;
      for(var s in $scope.jobskill)
      {
        name = name.toLowerCase();
        name1 = $scope.jobskill[s]['name'].toLowerCase();
        if(name1 == name)
        {
          check = true;
        }
      }

      if(!check)
      {
			$scope.jobskill.push(obj);
      }
			angular.element('#skillsedit11').val('');
			$scope.refservices = [];
		 }
	 }


	 $scope.deleteindustry = function (key)
	 {
		$scope.jobindustries.splice(key,1);
	 }
	////upload attchment image

	$scope.totalbudget = function(val,type)
	{
    if(type == 1)
    {
      $scope.budget = val;
    }
    else if(type == 2)
    {
      $scope.estimationHourlyPrice = val

    }


    if($scope.budget != '' && $scope.estimationHourlyPrice != '' )
    {
	  $scope.estimationHours = ($scope.budget / $scope.estimationHourlyPrice).toFixed(2);
    var estimate = $scope.estimationHours.split(".");
      if(estimate[1] == 00)
      {
        $scope.estimationHours = estimate[0];
      }
    }
    else if($scope.budget == '' || $scope.estimationHourlyPrice =='')
    {
      $scope.estimationHours = 0;
    }

	}

	$scope.submitjob = function ()
  {

    $scope.jobSubmit = true;
    var error = false;
   $scope.description = CKEDITOR.instances['description'].getData();
   //console.log($scope.description);
    if($scope.jobtitle == '' || $scope.description == '' || $scope.jobservices == '' || $scope.jobskill.length == 0 || $scope.jobrequiredf =='' || $scope.currency == '' || $scope.jobindustries.length == 0 || $scope.budget =='' )
    {
      error = true;
    }

    if($scope.type == 2)
    {
		  if($scope.estimationHours =='' || $scope.estimationHourlyPrice =='')
		  {
			  error = true;
		   }
    }


    // for( var res in $scope.milestones)
    // {
    //   if($scope.milestones[res]['title'] == '' || $scope.milestones[res]['price'] =='' )
    //    {
    //      error = true;
    //     }
		//
    //       if($scope.milestones[res]['task'].length != 0)
    //       {
    //           for(var t in $scope.milestones[res]['task'])
    //           {
    //             if($scope.milestones[res]['task'][t]['task'] == '')
    //             {
    //               error = true;
    //              }
    //             }
    //        }
    // }

    if(error == true)
    {
     return false;
    }

    var offerto = angular.element(".offerto").val();
    var m = JSON.stringify({ jobtitle : $scope.jobtitle,jobType:$scope.type ,currencyId:$scope.currency,required:$scope.jobrequiredf,description : $scope.description,industry:$scope.jobindustries,service:$scope.jobservices,skill: $scope.jobskill,image:$scope.image ,totalAmount : $scope.total ,milestone : $scope.milestones ,estimatehours:$scope.estimationHours,hourlyPrice: $scope.estimationHourlyPrice ,budget:$scope.budget});
    angular.element(".preloader").show();
     $http({
     url: '<?php echo base_url(); ?>client-create-job',
     method: "POST",
     data: m,
     headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

       angular.element(".preloader").hide();

       if(response.data.message == "true")
        {
           $scope.jobSubmit = false;
          $scope.milestones.push({
            title : '',
            price : 0,
            task : [],
            button:'',
          });
          $scope.total = 0;
          $scope.image = '';

          angular.element("#attchment").val('');
          angular.element("#title").val('');
          $scope.jobtitle = '';
          $scope.currency ='';
          $scope.jobrequiredf ='';
          $scope.description ='';
          $scope.jobindustries =[];
          $scope.jobservices ='';
          $scope.jobskill =[];
          $scope.estimationHours ='';
          $scope.estimationHourlyPrice ='';
          $scope.budget ='';
					angular.element("#myJob").modal('hide');
					CKEDITOR.instances['description'].setData('');
					$.notify("Job Created Successfully", "success");
					$scope.job();
        }
       else if(response.data.message == "false")
       {
         $.notify("Job is Not Created.", "error");
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
						//jQuery('#'+elName).attr('src',e.target.result);
						var d = JSON.stringify({ image :  e.target.result,name:filePath });
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

// edit job end
			 $scope.editjob = function(id)
			 {
				 var m = JSON.stringify({ jobId : id });
				 $http({
				 url: '<?php echo base_url(); ?>client-EditJob',
				 method: "POST",
				 data: m,
				 headers: {
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					 }
				 }).then(function(response) {
		          $scope.refindustry =[];
					 if(response.data.message == "true")
						{
							$scope.milestones =[];
							$scope.jobindustries =[];
							$scope.jobskill =[];

							$scope.EditjobData = response.data.result;
							$scope.jobId = $scope.EditjobData.jobId;
							$scope.jobtitle = $scope.EditjobData.jobTitle;
							CKEDITOR.instances['description1'].setData($scope.EditjobData.jobDescription);
	            $scope.total = $scope.EditjobData.jobAmount;
							$scope.jobrequiredf = $scope.EditjobData.jobRequiredFreelancer;
							$scope.jobservices = $scope.EditjobData.servicesId;
							$scope.image = $scope.EditjobData.jobAttchment;
							$scope.estimationHours =$scope.EditjobData.jobEstimateHours;
							$scope.estimationHourlyPrice=$scope.EditjobData.jobEstimateHourlyPrice;
							$scope.budget= $scope.EditjobData.jobBudget;
							$scope.currency = $scope.EditjobData.currencyId;
              $scope.type = $scope.EditjobData.jobType;

							for(var v in $scope.EditjobData.skill)
							{
								var obj ={};
								obj['name'] = $scope.EditjobData.skill[v]['service'];
								obj['id'] = $scope.EditjobData.skill[v]['id'];
								$scope.jobskill.push(obj);
							}

							for(var v in $scope.EditjobData.industry)
							{
								 var obj ={};
			 			   obj['name'] = $scope.EditjobData.industry[v]['industry'];
			 			   obj['id'] = $scope.EditjobData.industry[v]['id'];
			 			   $scope.jobindustries.push(obj);
							}

							// for(var v in $scope.EditjobData.milestone)
	 					 // {
	 						//  $scope.milestones.push({
	 					 // 		title : $scope.EditjobData.milestone[v].milestoneTitle,
	 					 // 		price : $scope.EditjobData.milestone[v].milestoneAmount,
	 					 // 		task : [],
	 					 // 		button:'',
	 					 // 	  });
						 //
	 						// 	for(var j in $scope.EditjobData.milestone[v].task)
	 						// 	{
	 						// 		$scope.milestones[v]['task'].push({
						 //
	 						// 			task : $scope.EditjobData.milestone[v].task[j].taskTitle,
	 						// 		});
	 						// 	}
	 					 // }


							angular.element("#editJob").modal('show');
						}


						 });
					 }
// edit job end
		$scope.UpdateJob = function()
		{
			$scope.jobSubmit = true;
			var error = false;
		 $scope.description = CKEDITOR.instances['description1'].getData();
		 //console.log($scope.description);
			if($scope.jobId == '' || $scope.jobtitle == '' || $scope.description == '' || $scope.budget =='' || $scope.currency == '' || $scope.jobservices == '' || $scope.jobskill.length == 0 || $scope.jobrequiredf =='' || $scope.jobindustries.length == 0)
			{
				error = true;
			}

      if($scope.type == 2)
      {
        if($scope.estimationHours =='' || $scope.estimationHourlyPrice =='')
        {
          error = true;
         }
      }

			// for( var res in $scope.milestones)
			// {
			// 	if($scope.milestones[res]['title'] == '' || $scope.milestones[res]['price'] =='' )
			// 	 {
			// 		 error = true;
			// 		}
			//
			// 			if($scope.milestones[res]['task'].length != 0)
			// 			{
			// 					for(var t in $scope.milestones[res]['task'])
			// 					{
			// 						if($scope.milestones[res]['task'][t]['task'] == '')
			// 						{
			// 							error = true;
			// 						 }
			// 						}
			// 			 }
			// }

			if(error == true)
			{
			 return false;
			}

			var m = JSON.stringify({ jobType:$scope.type,jobId:$scope.jobId, jobtitle : $scope.jobtitle ,required:$scope.jobrequiredf,description : $scope.description,industry:$scope.jobindustries,service:$scope.jobservices,skill: $scope.jobskill,image:$scope.image ,totalAmount : $scope.total ,milestone : $scope.milestones,estimatehours:$scope.estimationHours,hourlyPrice: $scope.estimationHourlyPrice ,budget:$scope.budget,currencyId:$scope.currency });
			angular.element(".preloader").show();
			 $http({
			 url: '<?php echo base_url(); ?>client-update-job',
			 method: "POST",
			 data: m,
			 headers: {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				 }
			 }).then(function(response) {

				 angular.element(".preloader").hide();

				 if(response.data.message == "true")
					{
						 $scope.jobSubmit = false;
						$scope.milestones.push({
							title : '',
							price : 0,
							task : [],
							button:'',
						});
						$scope.total = 0;
						$scope.image = '';

						angular.element("#attchment").val('');
						angular.element("#title").val('');
						$scope.title ='';
						$scope.description ='';
					 $scope.jobSubmit = false;
					 $.notify("Job Updated Successfully", "success");
					 angular.element("#editJob").modal('hide');
					 $scope.job();
					}
				 else if(response.data.message == "false")
				 {
					 $.notify("Job is Not Created.", "error");
				 }

					 });
		}



	// end add fields
	$scope.job();
	$scope.getindustry();
	$scope.getservices();
});

//// notification
var app4 = angular.module('myApp4', [])

		app4.filter('date', function () {
			return function (item) {
				var dates = new Date(Date.parse(item))
				var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
				return newDate;
			};
		});

 app4.controller('myCtrt4', function($scope,$window,$http,$interval) {
			$scope.notify = [];
			$scope.total = 0;
			$scope.count = 0;
			$scope.page = 1;
			$scope.unread = 0;
			$scope.noti =[];

	 $scope.notification = function (id = null)
	 {
				var obj = {  page : $scope.page  };
				if(id )
				obj['lastid'] = id;

				$http({
					url: '<?php echo base_url(); ?>client-getnotification',
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
				if($scope.total > 10)
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
			}

	   $scope.singleNotification = function(key,id)
	   {
         var obj = {  id : id }
			 $http({
				url: '<?php echo base_url(); ?>client-getOneNotification',
				method: "POST",
				data: obj,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				}
			}).then(function(response) {
				// angular.element(".preloader").hide();
				if(response.data.message == "true")
				{
					$scope.notify[key]['notificationStatus'] = 1;
					$scope.noti = response.data.result;
					angular.element("#notification").modal('show');
				}

				$scope.jobdetail(user);
			});

	   }

	$interval(function(){
		$scope.notification($scope.notify[0]['notificationId']);

	  },10000);

	 $scope.notification();

	 });
//// notification
// password update

		var app5 = angular.module('myApp5', [])

		app5.controller('myCtrt5', function($scope,$window,$http) {
			  $scope.pass = '';
			  $scope.cpass = '';
        $scope.allcurrency = [];
        $scope.currency ='';

			$scope.passupdate = function ()
			{
				$scope.submitpass = true;
				var error = false;
				$scope.pass = angular.element("#pass").val();
				$scope.cpass = angular.element("#cpass").val();

				if($scope.pass == '' || $scope.cpass == '')
				{
					error = true;
				}

				if($scope.pass != $scope.cpass)
				{
					return false;
				}

				if($scope.pass.length < 6)
				{
					return false;
				}

				if(error == true)
				{
					return false;
				}

				var obj = {  pass  : $scope.pass   };

				$http({
					url: '<?php echo base_url(); ?>client-password_update',
					method: "POST",
					data: obj,
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					}
				}).then(function(response) {
					//console.log(response);
					if(response.data.message == "true")
					{
						angular.element("#pass").val('');
						angular.element("#cpass").val('');
						$.notify("Password Update Successfully", "success");

					}

				});
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


$scope.bankdetail = function ()
{
$scope.submitbank = true;
var error = false;
  if($scope.currency == '' )
  {
    error = true;

  }
  if(error == true)
  {
    return false;
  }
var obj = {  currencyId:$scope.currency  };

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

//////////// contarct
var app6 = angular.module('myApp6', [])

app6.filter('underscoreless', function () {
	return function (input) {

		return input.split(' ').join('-');

	};
});

app6.filter('date', function () {
  return function (item) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
  ];
  var dates = new Date(Date.parse(item))
  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
  return newDate;
};
});

app6.filter('trustAsHtml',['$sce', function($sce) {

	return function(text) {

		return $sce.trustAsHtml(text);
       };
}]);

app6.controller('myCtrt6', function($scope,$window,$http) {

	$scope.page = 1;
	$scope.contracts = [];
	$scope.total = 0;

			$scope.contract = function ()
			{
				var obj = {  page : $scope.page }

				$http({
					url: '<?php echo base_url(); ?>client-getcontract',
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
				$scope.contract();
			}
		     });
	     }
	  }

		 $scope.contract();

	});


////////////contract


////////////contract detail

  var app7 = angular.module('myApp7',['luegg.directives'])

	app7.filter('date', function () {
			return function (item) {
				var dates = new Date(Date.parse(item))
				var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear();
				return newDate;
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

	 app7.directive('numbersOnly', function() {
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

  app7.controller('myCtrt7', function($scope,$window,$http,$interval) {
      $scope.glued = true;

			$scope.contracts = [];
			$scope.mid ='';
			$scope.message ='';
			$scope.freelancerId ='';
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
			$scope.schedule =1;
			$scope.cost = 1;
			$scope.overall = 1;
			$scope.contractId = '';
			$scope.allreview ='';
			$scope.userreview ='';
      $scope.milestoneId ='';
			$scope.f ='';
			$scope.milestones =[];
			$scope.end =[];
      $scope.typingLENGTH =800;
      $scope.lastTypingTime='';
      $scope.typing = false;

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

			// milestone create
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

			$scope.deletetask = function ($mkey,$key)
			{

			  $scope.milestones[$mkey]['task'].splice($key,1);
			}

			$scope.deletemilestone = function ($key)
			{
				//alert($key);
				$scope.milestones.splice($key,1);
			}

			$scope.totalmilestone = function($event)
			{

			     for(var i in $scope.milestones )
			    {
			      $scope.t = 0;
			      $scope.p = 0;
			       for(var m in $scope.milestones[i]['task'])
			       {
			        $scope.t = $scope.milestones[i]['task'][m]['hours'] * $scope.milestones[i]['task'][m]['hourlyPrice'];
			        $scope.milestones[i]['task'][m]['amount'] = $scope.t;
			        $scope.p += $scope.t;
			       }
			      $scope.milestones[i]['price'] = $scope.p;
			    }
			  }

			$scope.submitMilestone = function ()
		  {

		    $scope.mSubmit = true;
		    var error = false;

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

		                if($scope.milestones[res]['task'][t]['task'] == '' || $scope.milestones[res]['task'][t]['amount'] == '' || $scope.milestones[res]['task'][t]['hours'] == '' || $scope.milestones[res]['task'][t]['hourlyPrice'] == '' )
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
		    //var offerto = angular.element(".offerto").val();
		    var m = JSON.stringify({ jobId:$scope.contracts.jobId,contractId : $scope.contracts.contractId, milestone : $scope.milestones });
		    angular.element(".preloader").show();
		     $http({
		     url: '<?php echo base_url(); ?>client-create-milestone',
		     method: "POST",
		     data: m,
		     headers: {
		      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		       }
		     }).then(function(response) {

		       angular.element(".preloader").hide();

		       if(response.data.message == "true")
		        {
		          angular.element("#milestone").modal('hide');

		          $scope.milestones.push({
		            title : '',
		            price : 0,
		            task : [],
		            button:'',
		          });
		          $scope.total = 0;

		          $.notify("Milestone Created Successfully", "success");
							$scope.contractdetail(<?php if(!empty($contract)){ echo $contract; } ?>);
		        }
		       else if(response.data.message == "false")
		       {
		         $.notify("Milestone is Not created.", "error");
		       }

		         });

		  }

			// milestone create end

			$scope.contractdetail = function ($id)
	   {
		    var obj = {  id : $id }

					$http({
						url: '<?php echo base_url(); ?>client-getcontractdetail',
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
	 				 url: '<?php echo base_url(); ?>client-comment-submit',
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

			 $scope.milestoneRequest = function(key,id,freelancerId,status)
			 {
					 $scope.milestoneId = id;
					 $scope.freelancerId = freelancerId;
					 $scope.key = key;
					 $scope.status = status;
					 angular.element("#confirm").modal('show');
			 }

			 $scope.milestonereview = function(mid,freelancerId,key)
			 {
				 $scope.milestoneId = mid;
 			   $scope.f = freelancerId;
          //console.log($scope.f);
				 $scope.key = key;
 			   angular.element("#milestonereview").modal('show');
			 }

			 $scope.submitMilestoneReview = function()
			 {

						 $scope.msgSubmit = true;
						 var error = false;
						// console.log('dasdadda');
						 $scope.review =	angular.element("#review1").val();
						 $scope.reason = angular.element("#reason").val();


						 if($scope.milestoneId == '' || $scope.f == ''  || $scope.reason == '' || $scope.rating == '')
						 {
							 error = true;
						 }

						 if(error == true)
						 {
							 return false;
						 }


     var obj = {  milestoneId : $scope.milestoneId,overall:$scope.rating,freelancerId:$scope.freelancerId,communication : $scope.communication,skill:$scope.skill,deadline:$scope.deadline,quality:$scope.quality,cooperation:$scope.cooperation,review:$scope.review,rehire:$scope.rehire,cost:$scope.cost,availability:$scope.availability,total:$scope.overall }
					 angular.element(".preloader").show();
					 $http({
						 url: '<?php echo base_url(); ?>client-milestone-review',
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
							 $scope.contracts['milestone'][$scope.key]['milestoneStatus'] = 4;
							 $scope.milestoneId ='';
							 $scope.rating ='';
							 $scope.communication ='';
							 $scope.skill='';
							 $scope.deadline='';
							 $scope.quality ='';
							 $scope.cooperation='';
							 $scope.review=''
							 $scope.rehire='';
							 $scope.cost='';
							 $scope.availability='';
							}

						 angular.element("#milestonereview").modal('hide');

						 });

			 }

			 $scope.requestsend = function()
			 {
						var obj = {  milestoneId : $scope.milestoneId,freelancerId:$scope.f,status:$scope.status }
						angular.element(".preloader").show();
						$http({
							url: '<?php echo base_url(); ?>client-milestoneRequest',
							method: "POST",
							data: obj,
							headers: {
								'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
							}
						}).then(function(response) {
							angular.element(".preloader").hide();
							if(response.data.message == "true")
							{
								if($scope.status == 3)
								{
									$.notify("Request Accepted Successfully", "success");
										$scope.contractdetail();
								}
								else if($scope.status == 1)
								{
									$.notify("Request Rejected Successfully", "success");
								}
							}

							angular.element("#confirm").modal('hide');
							$scope.contracts['milestone'][$scope.key]['milestoneStatus'] = $scope.status;
							$scope.getlog($scope.contracts['jobId']);

							});
			   }


	   $scope.startcontract = function(key,id,freelancerId,status)
	   {
			   $scope.mid = id;
			   $scope.freelancerId = freelancerId;
			   $scope.key = key;
			   $scope.status = status;
			   angular.element("#contractstart").modal('show');
	   }

	 $scope.contractstart = function()
	 {
			 $scope.msgSubmit = true;
			 var error = false;
			 $scope.message =	angular.element("#message").val();

			 if($scope.message == '' || $scope.mid == '' || $scope.freelancerId == '' || $scope.status == '')
			 {
				error = true;
			 }

			 if(error == true)
			 {
				return false;
			 }

			 var obj = {  milestoneId : $scope.mid,message:$scope.message,freelancerId:$scope.freelancerId,status : $scope.status }
			 angular.element(".preloader").show();
			 $http({
				url: '<?php echo base_url(); ?>client-milestone-start',
				method: "POST",
				data: obj,
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
				}
			}).then(function(response) {
				angular.element(".preloader").hide();

				 if(response.data.message == "true")
				 {
					$.notify("Milestone Started Successfully", "success");
				 }

				else if(response.data.message == "false")
				 {
					$.notify("Milestone is Not Start", "error");
				 }

				angular.element("#contractstart").modal('hide');

				$scope.contracts['milestone'][$scope.key]['milestoneStatus'] = $scope.status;

			  });

	   }


		$scope.endcontract = function(contractId,freelancerId)
	  {
		  $scope.contractId = contractId;
		  $scope.f = freelancerId;
			//console.log($scope.f);
		  angular.element("#contractend").modal('show');
   	}


		$scope.submitContractReview = function()
	  {
				  $scope.msgSubmit = true;
				  var error = false;
				  $scope.review =	angular.element("#review2").val();
				  $scope.reason = angular.element("#reason").val();


				  if($scope.contractId == '' || $scope.f == ''  || $scope.reason == '' || $scope.rating == '' || $scope.review == '')
				  {
					  error = true;
				  }

				  if(error == true)
				  {
					  return false;
				  }


				var obj = { jobId: $scope.contracts.jobid,  contractId : $scope.contractId,overall:$scope.rating,freelancerId:$scope.f,communication : $scope.communication,skill:$scope.skill,deadline:$scope.deadline,quality:$scope.quality,cooperation:$scope.cooperation,review:$scope.review,rehire:$scope.rehire,cost:$scope.cost,availability:$scope.availability,total:$scope.overall }
				angular.element(".preloader").show();
				$http({
					url: '<?php echo base_url(); ?>client-review',
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
						$scope.getuserreview($scope.contractId);
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
      // console.log($scope.skill * 0.20);
			// console.log($scope.communication * 0.20);
			// console.log($scope.cooperation * 0.20);
			// console.log($scope.rehire * 0.20);
			// console.log($scope.deadline * 0.20);
			// console.log(add);
 		  $scope.overall  = add;
//			console.log($scope.overall);

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
			 url: '<?php echo base_url(); ?>client-getreview',
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
				 url: '<?php echo base_url(); ?>client-getclientReview',
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

       $scope.changeclientStatus = function($event)
       {
         var  status = angular.element($event).val();
         var a = angular.element($event);
         var b = a[0].selectedOptions[0];
         var id = b.getAttribute('data-id');
           var obj = {  clientStatus : status,id:id };
         if(status != '')
         {
           $http({
            url: '<?php echo base_url(); ?>client-contractStatus',
            method: "POST",
            data:obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
           }).then(function(response) {

            if(response.data.message == "true")
            {
             angular.element('.preloader').hide();
             $.notify("Task Status Changed Successfully", "success");
             }
          });
        }

       }

       $scope.changepaymentStatus = function($event)
       {
         var  status = angular.element($event).val();
         var a = angular.element($event);
         var b = a[0].selectedOptions[0];
         var id = b.getAttribute('data-id');
         var contractId = b.getAttribute('data-project');
           var obj = {  paymentStatus : status,contractId:contractId,milestoneId:id };
         if(status != '')
         {
           $http({
            url: '<?php echo base_url(); ?>client-contractpayment',
            method: "POST",
            data:obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
           }).then(function(response) {

            if(response.data.success == "true")
            {
             angular.element('.preloader').hide();
             $.notify("Payment Status Changed Successfully", "success");
             }
          });
        }

       }

       $scope.receivedkeyup = function (val,id,contractId)
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
     $scope.receivedSave(val,id,contractId);
     $scope.typing = false;
   }
 },$scope.typingLENGTH);
}

$scope.receivedSave = function(val,id,contractId)
{
  var obj = {  receivedAmount:val,contractId:contractId,milestoneId:id };

 $http({
   url: '<?php echo base_url(); ?>client-contractpayment',
   method: "POST",
   data :obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {
if(response.data.success == "true")
{

}
 });
}



	$scope.contractdetail(<?php if(!empty($contract)){ echo $contract; } ?>);

});
// end contract


// job details

var app8 = angular.module('myApp8', [])

app8.filter('trustAsHtml',['$sce', function($sce) {

	return function(text) {

		return $sce.trustAsHtml(text);
       };
}]);

app8.filter('date', function () {
     return function (item) {
       const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
         "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
       var dates = new Date(Date.parse(item))
       var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
       return newDate;
     };
   });


	app8.controller('myCtrt8', function($scope,$window,$http) {

	$scope.users ='';
	$scope.job = [];

   $scope.jobdetail = function ($id)
	 {
		  var obj = {  id : $id }

			 $http({
			  url: '<?php echo base_url(); ?>client-getjobdetail',
			  method: "POST",
			  data: obj,
			  headers: {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			  }
		  }).then(function(response) {

			  $scope.job = response.data.result;

		   });
	  }


	  $scope.jobdetail(<?php if(!empty($jobId)){ echo $jobId; } ?>);
});
//job detail

//// events start
<?php
if(isset($attendeeId))
 {
?>
var app9 = angular.module('demo', ['ui.calendar','ui.bootstrap']);
app9.controller('CalendarCtrl', function($scope,$window,$http,$interval,$timeout) {
  $scope.date ='';
	$scope.attendeeId ='';
	$scope.attendee = [];
  $scope.allevent =[];
  $scope.ev = [];

	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
	$scope.eventSources = [];

	$scope.eventshow = function(allevent)
	{
		//console.log($scope.allevent);
		//
		//  $scope.events = [
		//
		// 			{title: 'Repeating Event 2sss',start: new Date(y,m,25, 16, 0)},
		// 			{type:'party',id: 999,title: 'Repeating Event 2',start: new Date(y, m, d + 4, 16, 0),allDay: false},
		// 			{type:'party',title: 'Testing',start: new Date(y, m, d + 1,16),allDay: false}
		// ];
//console.log('$scope.allevent');
// console.log($scope.allevent);
    $scope.eventSources = [allevent];
		//console.log($scope.eventSources);

		$scope.uiConfig = {
		 calendar: {
			 dayClick: function(event) {
       $scope.openModal(event);
		   }
		 }
	 };

	 $scope.uiConfig = {
	  calendar: {
	  height: 450,
	  editable: true,
	  header: {
	 	 left: 'title',
	 	 center: '',
	 	 right: 'today prev,next'
	  },
	  eventClick: $scope.alertOnEventClick,
	  eventDrop: $scope.alertOnDrop,
	  eventResize: $scope.alertOnResize,
	  eventRender: $scope.eventRender,

	  dayClick: function( date, jsEvent, view ) {
	 	 angular.element('#addevent').modal('show');
	 	 //$scope.date = date;
		  //console.log(date.getDate());

		 $scope.date = '' + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate();

		 //console.log(newDate);
	 	}

	 }
	 };

}

	$scope.getevent = function()
	{

	var obj = {  attendeeId : <?php echo $attendeeId; ?> }
	$http({
		url: '<?php echo base_url(); ?>client-getevent',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {
			if(response.data.message == "true")
				{
				 $scope.ev = response.data.result;
         $scope.allevent =  [];
        for(var v in response.data.result )
				{
					var ev =  {};
						var date = new Date(response.data.result[v]['eventDate']);

						var d = date.getDate();
						var m = date.getMonth();
						var y = date.getFullYear();

            ev['title'] = response.data.result[v]['eventTitle'];
						// ev['start'] = new Date(response.data.result[v]['eventDate']);
						ev['start'] = new Date(y, m, d, 16);
						//console.log(ev['start']);
						$scope.allevent.push(ev);
				}
 // console.log($scope.allevent);
			//

				}
				$timeout(function(){
				$scope.eventshow($scope.allevent);
			},1000);

		});

	}



	$scope.getevent();

	$scope.userdetail = function()
	{

	var obj = {  userId : <?php echo $attendeeId; ?> }
	$http({
		url: '<?php echo base_url(); ?>client-getuser',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {


		$scope.attendee = response.data.result;

		});

	}


 $scope.openModal = function()
 {
	 angular.element('#addevent').modal('show');
	 $scope.date = date;
 }

    $scope.submitevent = function()
		{
			$scope.Submit = true;
			var error = false;
			$scope.title =	angular.element("#title").val();
			$scope.note = angular.element("#note").val();
      $scope.time = angular.element("#time").val();
			//console.log($scope.date);

      //console.log($scope.date.getDate() + 1);

			if($scope.title == '' || $scope.note == ''  || $scope.time == '' || $scope.date == '')
			{
				error = true;
			}

			if(error == true)
			{
				return false;
			}


		var obj = {  title : $scope.title,note:$scope.note,attendeeId:$scope.attendee['u_id'],time : $scope.time,date:$scope.date }
		angular.element(".preloader").show();
		$http({
			url: '<?php echo base_url(); ?>client-eventsave',
			method: "POST",
			data: obj,
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			}
		}).then(function(response) {
       angular.element(".preloader").hide();
      if(response.data.message == "true")
			 {
				 $scope.Submit = false;
				$.notify("Event Successfully Added", "success");
				 angular.element("#title").val('');
				 angular.element("#note").val('');
	       angular.element("#time").val('');

         // $scope.getevent();
			 }
			 angular.element("#addevent").modal('hide');

	 var date2 = new Date($scope.date);
		//
		 	var d = date2.getDate();
			var m = date2.getMonth();
		 	var y = date2.getFullYear();
		//
	   var start2 = new Date(y, m, d);
	//	 console.log(start2);
     $scope.eventSources[0].push({title: $scope.title,start: start2});



			});
		}









		// $scope.events = [
		// 		{
		// 				title: 'My Event',
		// 				start: new moment().add(-1,'days'),
		// 				description: 'This is a cool event',
		// 				color:'#5f6dd0'
		// 		},
		// 		{
		// 				title: 'My Event',
		// 				start: new moment().add(1,'days'),
		// 				description: 'This is a cool event',
		// 				color:'#af6dd0'
		// 		}
		// ];
		// $scope.addEvent = addEvent;

	  // var date = new Date();
		// var d = date.getDate();
		// var m = date.getMonth();
		// var y = date.getFullYear();





	//console.log($scope.allevent);




 // $scope.addEvent = function() {
	//  console.log('Adding event');
	// 	 $scope.events.push({type:'party',id: 34,title: 'Added with button',start: new Date(y, m, d + 1, 12, 0),allDay: false});
 // };


		// var count = 0;
		// function addEvent(){
		// 			$scope.events.push({
		// 					title: 'Event '+ count,
		// 					start: new moment(),
		// 					description: 'This is a cool event',
		// 					color:'#5f6dd0'
		// 			});
		// 			count++;
		// }

	//	$scope.getevent();
		$scope.userdetail();
		// $scope.eventshow();
});
<?php } ?>
////// event end


// proposal
<?php if(isset($proposaljobId))
      {
				?>
var app10 = angular.module('myApp10', [])

app10.filter('underscoreless', function () {
	return function (input) {

		return input.split(' ').join('-');

	};
});

app10.filter('date', function () {
     return function (item) {
       const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
         "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
       ];
       var dates = new Date(Date.parse(item))
       var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ',' + dates.getFullYear();
       return newDate;
     };
   });

app10.filter('trustAsHtml',['$sce', function($sce) {

	return function(text) {

		return $sce.trustAsHtml(text);
       };
}]);

app10.directive('numbersOnly', function() {
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

app10.controller('myCtrt10', function($scope,$window,$http) {

	$scope.page = 1;
	$scope.proposal = [];
	$scope.proposaldetail =[];
	$scope.total = 0;
	$scope.job =[];
	$scope.milestones =[];
  $scope.offerTotal = 0;
	//$scope.milestones =[];

			$scope.getproposal = function ()
			{
				var obj = {  page : $scope.page,jobId:<?php if(isset($proposaljobId)){ echo $proposaljobId; } ?> }

				$http({
					url: '<?php echo base_url(); ?>client-getproposal',
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

			$scope.getjob = function()
			{
				var obj = { id:<?php if(isset($proposaljobId)){ echo $proposaljobId; } ?> }

				$http({
					url: '<?php echo base_url(); ?>client-getjobdetail',
					method: "POST",
					data: obj,
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
					}
				}).then(function(response) {

					$scope.job = response.data.result;
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

	    $scope.hired = function (id)
	   {
			 $scope.proposaldetail =[];
       $scope.milestones =[];
	      var obj = {  id : id }


	       $http({
	        url: '<?php echo base_url(); ?>client-getproposaldetail',
	        method: "POST",
	        data: obj,
	        headers: {
	        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	        }
	      }).then(function(response) {

	        $scope.proposaldetail = response.data.result;
					 $scope.total = 0;
					 $scope.offerTotal = $scope.proposaldetail.proposalBid;
					 if($scope.proposaldetail.milestone.length != 0)
					 {
	           for(var v in $scope.proposaldetail.milestone)
	          {
						 $scope.total = +$scope.total + +$scope.proposaldetail.milestone[v]['price'];
		         $scope.offerTotal = $scope.total;

	           $scope.milestones.push({
	           title : $scope.proposaldetail.milestone[v].title,
	           price : $scope.proposaldetail.milestone[v].price,
	            task : []
	           });

	           for(var j in $scope.proposaldetail.milestone[v].task)
	           {
	             $scope.milestones[v]['task'].push({

	               task : $scope.proposaldetail.milestone[v].task[j].task,
								 hours:$scope.proposaldetail.milestone[v].task[j].hours,
								 hourlyPrice:$scope.proposaldetail.milestone[v].task[j].hourlyPrice,
	               amount : $scope.proposaldetail.milestone[v].task[j].amount,

	               });
	             }
	           }
				  }

					angular.element("#hire").modal('show');

	       });
	    }

			$scope.totalmilestone = function($event)
 		 {
 		     $scope.offerTotal = 0;
 		      for(var i in $scope.milestones )
 		     {
 		       $scope.t = 0;
 		       $scope.p = 0;
 		        for(var m in $scope.milestones[i]['task'])
 		        {
 		         $scope.t = $scope.milestones[i]['task'][m]['hours'] * $scope.milestones[i]['task'][m]['hourlyPrice'];
 		         $scope.milestones[i]['task'][m]['amount'] = $scope.t;
 		         $scope.p += $scope.t;
 		        }
 		       $scope.milestones[i]['price'] = $scope.p;
 		       $scope.offerTotal = +$scope.offerTotal + +$scope.milestones[i]['price'];
 		     }
 		   }

	    $scope.offersend = function()
	    {
	      $scope.submitpro = true;
	      var error = false;


	      if($scope.time == '' || $scope.offertotal == '' || $scope.proposal == ''  )
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

	      var m = JSON.stringify({ proposalId:$scope.proposaldetail.proposalId, jobId : $scope.proposaldetail.jobId,milestone:$scope.milestones,freelancerId:$scope.proposaldetail.u_id,offertotal : $scope.offerTotal});
	      angular.element(".preloader").show();
	       $http({
	       url: '<?php echo base_url(); ?>client-hire',
	       method: "POST",
	       data: m,
	       headers: {
	        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
	         }
	       }).then(function(response) {

	         angular.element(".preloader").hide();

	         if(response.data.message == "true")
	          {
	            angular.element("#hire").modal('hide');
	             $scope.getproposal();
	            $.notify("Offer Sent Successfully", "success");

	          }
	           });
	    }

		 $scope.getproposal();
		 $scope.getjob();

	});

// proposal
<?php
       }

			 ?>

			 // job details
<?php if(isset($proposalId))
        {
					?>
			 var app11 = angular.module('myApp11',['luegg.directives'])

			 app11.filter('trustAsHtml',['$sce', function($sce) {

			 	return function(text) {

			 		return $sce.trustAsHtml(text);
			        };
			 }]);

			 app11.filter('underscoreless', function () {
        return function (input) {
	   	  return input.split(' ').join('-');
          };
       });

			 app11.directive('numbersOnly', function() {
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

       app11.directive('ngEnter', function () {
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


         app11.filter('underscoreless', function () {
           return function (input) {
               if(input)
               {
              return input.split(' ').join('-');
               }
           };
         });

         app11.filter('time', function () {

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


         app11.filter('date', function () {
           return function (item) {
             const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
             "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
           ];
           var dates = new Date(Date.parse(item))
           var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
           return newDate;
         };
         });



			 	app11.controller('myCtrt11', function($scope,$window,$http) {

			 	$scope.users ='';
			 	$scope.proposal = [];
				$scope.milestones =[];
				$scope.offerTotal = 0;
        $scope.activitys =[];
        $scope.file = '';
        $scope.userId ='';
        $scope.glued = true;

        $http.get("<?php echo base_url(); ?>client-getsession")
        .then(function(response)
        {
          $scope.userId = response.data.userid;
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

  			$scope.deletetask = function ($mkey,$key)
  			{

  			  $scope.milestones[$mkey]['task'].splice($key,1);
					$scope.totalmilestone();
  			}

  			$scope.deletemilestone = function ($key)
  			{
  				$scope.milestones.splice($key,1);
					$scope.totalmilestone();
  			}

			    $scope.proposaldetail = function (id)
			 	 {
			 		  var obj = {  id : id }

			 			 $http({
			 			  url: '<?php echo base_url(); ?>client-getproposaldetail',
			 			  method: "POST",
			 			  data: obj,
			 			  headers: {
			 				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 			  }
			 		  }).then(function(response) {

			 			  $scope.proposal = response.data.result;
							$scope.offerTotal = $scope.proposal.proposalBid;
              $scope.getlog($scope.proposal.proposalId);

							if($scope.proposal.milestone.length != 0)
							{
							  for(var v in $scope.proposal.milestone)
							 {
								 $scope.milestones.push({
								 title : $scope.proposal.milestone[v].title,
								 price : $scope.proposal.milestone[v].price,
								 task : [],
								 });

								 for(var j in $scope.proposal.milestone[v].task)
								 {
									 $scope.milestones[v]['task'].push({

										 task : $scope.proposal.milestone[v].task[j].task,
										 hours:$scope.proposal.milestone[v].task[j].hours,
										 hourlyPrice:$scope.proposal.milestone[v].task[j].hourlyPrice,
										 amount : $scope.proposal.milestone[v].task[j].amount,

									 });
								 }
							}
						}

			 		   });
			 	  }

					$scope.totalmilestone = function($event)
					{
					    $scope.offerTotal = 0;
					     for(var i in $scope.milestones )
					    {
					      $scope.t = 0;
					      $scope.p = 0;
					       for(var m in $scope.milestones[i]['task'])
					       {
					        $scope.t = $scope.milestones[i]['task'][m]['hours'] * $scope.milestones[i]['task'][m]['hourlyPrice'];
					        $scope.milestones[i]['task'][m]['amount'] = $scope.t;
					        $scope.p += $scope.t;
					       }
					      $scope.milestones[i]['price'] = $scope.p;
					      $scope.offerTotal = +$scope.offerTotal + +$scope.milestones[i]['price'];
					    }
					  }

					$scope.offersend = function()
					{
						$scope.submitpro = true;
						var error = false;
						$scope.bid = angular.element('#bid').val();

						if($scope.time == '' || $scope.bid == '' || $scope.proposal == ''  )
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

						var m = JSON.stringify({ proposalId:$scope.proposal.proposalId, jobId : $scope.proposal.jobId,milestone:$scope.milestones,freelancerId:$scope.proposal.u_id,offertotal : $scope.offerTotal});
						angular.element(".preloader").show();
						 $http({
						 url: '<?php echo base_url(); ?>client-hire',
						 method: "POST",
						 data: m,
						 headers: {
							'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
							 }
						 }).then(function(response) {

							 angular.element(".preloader").hide();

							 if(response.data.message == "true")
								{
									angular.element("#hire").modal('hide');
									$scope.proposal.proposalStatus = 1;
									$.notify("Offer Sent Successfully", "success");

								}
								 });
					}

					$scope.ActiveMilestone = function(jobId,pid)
					{
						var m = JSON.stringify({ proposalId: pid, jobId : jobId });

						angular.element(".preloader").show();

						 $http({
						 url: '<?php echo base_url(); ?>client-activemilestone',
						 method: "POST",
						 data: m,
						 headers: {
							'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
							 }
						 }).then(function(response) {

							 angular.element(".preloader").hide();

							 if(response.data.message == "true")
								{
									$scope.proposal.proposalStatus = 1;
									angular.element("#milestoneActive").modal('hide');
									$scope.proposal.proposalStatus = 1;
									$.notify("Milestone Active Successfully", "success");

								}
								 });
					}

					$scope.freelancerContact = function()
					{
						$scope.submitm = true;
						var error = false;

            if($scope.message == '')
						{
							error = true;
						 }

					  if(error == true)
						{
						  return false;
						}

						var m = JSON.stringify({ message:$scope.message,jobId : $scope.proposal.jobId,freelancerId:$scope.proposal.u_id});
						angular.element(".preloader").show();
						 $http({
						 url: '<?php echo base_url(); ?>client-freelancer-contact',
						 method: "POST",
						 data: m,
						 headers: {
							'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
							 }
						 }).then(function(response) {

							 angular.element(".preloader").hide();

							 if(response.data.message == "1")
								{
									angular.element("#message").modal('hide');
									$scope.message ='';
									$.notify("Message Send Successfully", "success");
                }
								else if(response.data.message == "2")
								{
                  $window.location.href = '<?php echo base_url(); ?>client-chat';
								}
								 });
					}

          $scope.getlog = function (proposalId)
           {

             var  url= '<?php echo base_url(); ?>freelancer/getproposallog/'+proposalId;

             $http({
               url: url,
               method: "POST",
               headers: {
                 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
               }
             }).then(function(response) {

               if(response.data.message == "true")
               {
                 $scope.activitys = response.data.result;

               }

             });

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
               var obj = { logType:'proposal',logSubType:'offer', logText : text,logFile:$scope.file,logReference : id }
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
                   $scope.getlog($scope.proposal.proposalId);
                 }
               });
             }
           }


			 	  $scope.proposaldetail(<?php if(!empty($proposalId)){ echo $proposalId; } ?>);
			 });
			 <?php } ?>
			 //job detail


			 // support chat

			 var app12 = angular.module('myApp12',['luegg.directives'])

			   app12.filter('time', function () {

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


           app12.filter('date', function () {
                return function (item) {
                  const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
                  ];
                  var dates = new Date(Date.parse(item))
                  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ',' + dates.getFullYear();
                  return newDate;
                };
              });

			 		app12.filter('trustAsHtml',['$sce', function($sce) {

			 			return function(text) {

			 				return $sce.trustAsHtml(text);
			 		       };
			 		}]);

			 		app12.directive('numbersOnly', function() {
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

			 				app12.directive('ngEnter', function () {
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



			 			app12.controller('myCtrt12', function($scope,$window,$http,$interval) {
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

            //var socket = io('https://top-seo-sockets.herokuapp.com');
			         var socket = io('https://top-seo-sockets.herokuapp.com');

							$scope.getsessiondata = function()
							{
							 $http.get("<?php echo base_url(); ?>client-getsession")
 				 				.then(function(response)
 				 				{
 				 					$scope.userId = response.data.userid;
 				 					$scope.username = response.data.name;
 				 					$scope.userimage = response.data.image;
									$scope.socketjoinchat();
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
			 		      $scope.t = 1;
			 		      $scope.typinguser = data.sendername;
			 		 	});

			    socket.on('grouptyping',function(data)
			 	 {
			      var user = data.sendername;
			      if(data.type == 'stoppedtyping')
			      $scope.grouptypinguser.splice($scope.grouptypinguser.indexOf(user),1);
			      else
			     {
			       if($scope.grouptypinguser.indexOf(user) == -1)
			       {
			         $scope.grouptypinguser.push(user);
			       }
			     }
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
			 				socket.emit('message', { MSG_SENTBYNAME:$scope.username,MSG_SENTBYIMAGE:$scope.userimage,MSG_SENTBY:$scope.userimage, MSG_SENTBY: '<?php echo $this->session->userdata['clientloggedin']['id']; ?>',MSG_SENTTONAME:$scope.adminname,  MSG_SENTTO : $scope.adminId,MSG_SENTTOIMAGE:'',MSG_TEXT : msgtext,MSG_ATTACHMENT:$scope.attachment,MSG_ROOMID :$scope.roomId,MSG_DELETE : 0 ,MSG_EDIT: 0,MSG_STATUS:0,MSG_STATUS:2 });
              angular.element('.msgtext').val('');
            }

						$scope.statusupdate = function()
						{
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
			 				 data: m,
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


				$scope.getsessiondata();

			     });
			 // support chat

       ///profile

       var app13 = angular.module('myApp13', [])

       app13.directive('numbersOnly', function() {
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



       	 app13.directive('mydatepicker', function () {
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

       app13.controller('myCtrt13', function($interval,$scope,$window,$http) {

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

       	$scope.datepickerOptions = {
           datepickerMode:"'year'",
           minMode:"'year'",
           minDate:"minDate",
           showWeeks:"false",
        };

       	$http({
       		url: '<?php echo base_url(); ?>client-getprofile',
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
         $('#pimage').addClass('removeimageValue');

       }
       if($scope.profile.company_logo)
       {
         $('#logo').addClass('removeimageValue');
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
          $scope.profile.desig = angular.element("#desig").val();
       		$scope.profile.year = angular.element("#year").val();
       		$scope.profile.c_name = angular.element("#companyname").val();
       		$scope.profile.seoTitle = angular.element("#seotitle").val();
       		$scope.profile.seoDescription = angular.element("#seodescription").val();
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

       		if($scope.profile.name == '' || $scope.profile.rep_ph_num == '' || $scope.profile.zip == '' || $scope.profile.country == '' || $scope.profile.state == '' || $scope.profile.city == '' || $scope.profile.desig == '' || $scope.profile.year == '')
       		{
       			error = true;
       		}

       		if($scope.profile.address1 == '' ||  $scope.profile.about == '' || $scope.profile.minPrice == '' || $scope.profile.maxPrice == '' || $scope.profile.c_name =='' || $scope.profile.logo == '' || $scope.profile.company_logo == '' )
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

        if(pclass == "form-control phonenumber ng-pristine ng-valid ng-not-empty error11 ng-touched")
           {
             return false;
           }

       		if(error == true )
       		{
       			return false;
       		}

       		var obj = {  name : $scope.profile.name , zip : $scope.profile.zip ,logo : $scope.profile.logo , rep_ph_num : $scope.profile.rep_ph_num ,country : $scope.profile.country,state : $scope.profile.state ,city : $scope.profile.city,address1 : $scope.profile.address1,address2 : $scope.profile.address2,about : $scope.profile.about,website : $scope.profile.website,skype : $scope.profile.skype,facebookLink : $scope.profile.facebookLink , linkedlnLink : $scope.profile.linkedlnLink ,desig: $scope.profile.desig ,c_name: $scope.profile.c_name ,seoTitle:$scope.profile.seoTitle,seoDescription:$scope.profile.seoDescription,countryCode:$scope.countrycode,countryClass:cl,company_logo:$scope.profile.company_logo };

       		$http({
       			url: '<?php echo base_url(); ?>client-profile/update',
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
                  $window.location.href = '<?php echo base_url(); ?>client-profile';
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
       	/// logo upload

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
              jQuery('#logoview1').attr('src',e.target.result);
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

       ////profile end


             // invoice

             var app14 = angular.module('myApp14',[])

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



             app14.filter('date', function () {
               return function (item) {
                 const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                 "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
               ];
               var dates = new Date(Date.parse(item))
               var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
               return newDate;
             };
           });

           app14.directive('mydatepicker', function () {
             return {
               restrict: 'A',
               require: 'ngModel',
               link: function (scope, element, attrs, ngModelCtrl) {
                 element.datepicker({
                   dateFormat: 'd-m-yy',
                   // minDate: 0,
                   onSelect: function (date) {
                     scope.date = date;
                     scope.$apply();
                   }
                 });
               }
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

           app14.controller('myCtrt14', function($scope,$window,$http,$interval) {

             $scope.page = 1;
             $scope.allinvoice = [];

             $scope.status = '';



             $http.get("<?php echo base_url(); ?>freelancer/getsession")
             .then(function(response)
             {
               $scope.userId = response.data.userid;

             });


             $scope.submitinvoice = function()
             {
               $scope.submitl = true;
               var error = false;

               if($scope.name == '' || $scope.email == '' || $scope.address == '' || $scope.phone == '' || $scope.recipient == '' || $scope.contract == '' ||  $scope.amount == '' )
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


               var obj = { recipient:$scope.recipient,name:$scope.name,email:$scope.email,phone:$scope.phone,address:$scope.address,contractId:$scope.contract,task:$scope.task,amount:$scope.totalamount };
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
               var obj = { page :$scope.page };
               $http({
                 url: '<?php echo base_url(); ?>clientgetinvoice',
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
               if($scope.total > 10)
               {
                 $('#pagination').pagination({
                   items: $event,
                   itemsOnPage: 10,
                   cssStyle: 'light-theme',
                   onPageClick:  function (e) {
                     $scope.page  = e;
                     $scope.getinvoice();
                   }
                 });
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
             }

             $scope.getinvoice();


           });
           // invoice


             //  edit invoice
              <?php
              if(!empty($invoiceId))
                   {
                     ?>
             var app15 = angular.module('myApp15',[])

             app15.directive('numbersOnly', function() {
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



             app15.filter('date', function () {
               return function (item) {
                 const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                 "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
               ];
               var dates = new Date(Date.parse(item))
               var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
               return newDate;
             };
           });

           app15.directive('mydatepicker', function () {
             return {
               restrict: 'A',
               require: 'ngModel',
               link: function (scope, element, attrs, ngModelCtrl) {
                 element.datepicker({
                   dateFormat: 'd-m-yy',
                   // minDate: 0,
                   onSelect: function (date) {
                     scope.date = date;
                     scope.$apply();
                   }
                 });
               }
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

           app15.controller('myCtrt15', function($scope,$window,$http,$interval) {

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
             $scope.paymentReceived ='';
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
             $scope.status ='';
             $scope.freelancer ='';

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


             // $http.get("<?php echo base_url(); ?>freelancer/getsession")
             // .then(function(response)
             // {
             //   $scope.userId = response.data.userid;
             //
             // });


             $scope.updateinvoice = function()
             {
               $scope.submitl = true;
               var error = false;


               if(error == true)
               {
                 return false;
               }
               var obj = { invoiceId:$scope.invoice.invoiceId,status:$scope.status };
               angular.element('.preloader').show();
               $http({
                 url: '<?php echo base_url(); ?>client-invoiceupdate',
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
                 $.notify("Invoice Updated Successfully", "success");
                   $interval(callAtInterval, 2000);

                   function callAtInterval()
                   {
                     $window.location.href = '<?php echo base_url(); ?>client-invoice';
                   }

                 }

               });

             }


             $scope.getinvoice = function()
             {
               var obj = { invoiceId :'<?php echo $invoiceId; ?>' };
               $http({
                 url: '<?php echo base_url(); ?>client-geteditinvoice',
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
                   $scope.freelancer = $scope.invoice.freelancer;


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

           // gig
           // gig
           var app16 = angular.module('myApp16', [])


           app16.filter('trustAsHtml',['$sce', function($sce) {

               return function(text) {

                 return $sce.trustAsHtml(text);
                    };
             }]);

             app16.filter('date', function () {
               return function (item) {
                 const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                 "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
               ];
               var dates = new Date(Date.parse(item))
               var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
               return newDate;
             };
             });

             app16.filter('htmlToPlaintext', function() {
               return function(text) {
                 return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
               };
             });



             app16.filter('time', function () {

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

           app16.controller('myCtrt16', function($scope,$window,$http,$interval) {


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
                       url: '<?php echo base_url(); ?>getclient-gig',
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

           // gigdetail
           <?php if(!empty($gigId))
           { ?>
           var app17 = angular.module('myApp17',['luegg.directives'])


           app17.filter('trustAsHtml',['$sce', function($sce) {

               return function(text) {

                 return $sce.trustAsHtml(text);
                    };
             }]);

             app17.filter('underscoreless', function () {
               return function (input) {
                   if(input)
                   {
                  return input.split(' ').join('-');
                   }
               };
             });

             app17.filter('time', function () {

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


             app17.filter('date', function () {
               return function (item) {
                 const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
                 "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
               ];
               var dates = new Date(Date.parse(item))
               var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
               return newDate;
             };
             });

           app17.controller('myCtrt17', function($scope,$window,$http,$interval) {

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
            $scope.c = 1;
            $scope.cost = 1;
            $scope.overall = 1;
            $scope.contractId = '';
            $scope.userreview =[];

            $scope.userId ='';
            $scope.glued = true;

            $http.get("<?php echo base_url(); ?>client-getsession")
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
           url: '<?php echo base_url(); ?>getclient-gigdetail',
           method: "POST",
           data:obj,
           headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
           }
           }).then(function(response) {
           if(response.data.message == 'true')
           {
           $scope.gig = response.data.result;
           $scope.getuserreview();
           $scope.getlog($scope.gig.user_gig_buyId);


           }
            });
           }

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

          $scope.getuserreview = function()
     		 {
     	     var obj = {  user_gig_buyId : $scope.gig.user_gig_buyId }
     			 $http({
     				 url: '<?php echo base_url(); ?>client-getgigreview',
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


           $scope.get();
           });
           <?php } ?>
           // gigdetail

           // expense

           //expense
           var app18 = angular.module('myApp18',[])

           app18.directive('mydatepicker', function () {
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




           app18.filter('date', function () {
           return function (item) {
           const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
           "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
           ];
           var dates = new Date(Date.parse(item))
           var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
           return newDate;
           };
           });

           app18.directive('numbersOnly', function() {
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


           app18.controller('myCtrt18', function($scope,$window,$http,$interval) {

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
           $scope.totalpaid = 0;
           $scope.totalunpaid = 0;
           $scope.currentTotal = 0;
           $scope.month = '';
           $scope.year = '';
           $scope.atotal = '';
           $scope.apage = 1;
           $scope.monthEx = [];
           $scope.moonthwiseshow = 0;
           $scope.monthtotal = 0;
           $scope.monthtotalunpaid = 0;
           $scope.monthtotalpaid = 0;
           $scope.getuserlocalcurrency = [];

           $scope.monthNames = [ 'January', 'February', 'March', 'April', 'May', 'June',
                       'July', 'August', 'September', 'October', 'November', 'December' ];
           $scope.years = [];
           $scope.currentyear = new Date().getFullYear();
           $scope.currentmonth = new Date().getMonth() + 1;

           $scope.advanceSearchshow = 0;
           $scope.showmonthselect = 0;

           $scope.clickadvanceSearch =  function()
           {
             if($scope.advanceSearchshow == 0)
             {
               $scope.advanceSearchshow = 1;
             }
             else if($scope.advanceSearchshow == 1)
             {
               $scope.advanceSearchshow = 0;
             }
           }

           $scope.getlocalcurrency = function ()
           {
             $http({
               url: '<?php echo base_url(); ?>freelancer/getuserlocalcurrency',
               method: "POST",
               headers: {
                 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
               }
             }).then(function(response) {

               angular.element(".preloader").hide();
                if(response.data.success == "true")
                 {
                  $scope.getuserlocalcurrency = response.data.result;
                 }
              });
           }

           $scope.changeyear = function ($event)
           {
             $scope.year = $event.value;
             $scope.showmonthselect = 1;
           }


               $scope.generateArrayOfYears = function()
               {
                 var max = new Date().getFullYear()
                 var min = max - 2
                 for (var i = max; i >= min; i--)
                 {
                   $scope.years.push(i)
                 }
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
               $scope.getName();
               $scope.radioshow = 0;


             }
             else if(response.data.already == "true")
             {
               $.notify("Expense Already Exists", "error");
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
               $scope.getName();
               $scope.radioshow = 0;

             }
           });
           }

           $scope.getCurrentMonthExpense = function()
           {
           $scope.currentTotal = 0;
           $scope.totalunpaid = 0;
           $scope.totalpaid = 0;
           $scope.currentEx = [];
           $scope.total = 0;


           var obj = {  page:$scope.page,perpage:$scope.perpage,startdate:$scope.startdate,enddate:$scope.enddate,expense:$scope.sexpense};

           $http({
             url: '<?php echo base_url(); ?>freelancer/getCurrentMonthExpense',
             method: "POST",
             data:obj,
             headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {

             angular.element(".preloader").hide();


             if(response.data.message == "true")
             {

               $scope.loader= 1;
               $scope.currentEx = response.data.result;
               $scope.total = response.data.pcount;
               $scope.currentTotal = response.data.total;
               $scope.totalpaid = response.data.totalpaid;
               $scope.totalunpaid = response.data.totalunpaid;
               if($scope.startdate != '' || $scope.enddate != '' || $scope.sexpense != '')
               {
                 if($scope.currentEx)
                 {
                   $scope.currentTotal = 0;
                   $scope.totalpaid = 0;
                   $scope.totalunpaid = 0;
                   for(var i in $scope.currentEx)
                   {
                    $scope.currentTotal = +$scope.currentTotal + +$scope.currentEx[i].amount;
                    if($scope.currentEx[i].status == 1)
                    {
                      $scope.totalpaid = +$scope.totalpaid + +$scope.currentEx[i].amount;
                    }
                    if($scope.currentEx[i].status == 2)
                    {
                      $scope.totalunpaid = +$scope.totalunpaid + +$scope.currentEx[i].amount;
                    }
                    }
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
                 $scope.getCurrentMonthExpense();
               }
             });
           }
            else
            {
               $('#pagination').html('');
            }
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
               if($scope.editexpense1.paidBy != 0)
               {
               $scope.paidby1 = $scope.editexpense1.paidBy;
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

           if($scope.status1 == 1)
           {
             if($scope.paidby1 == '')
             {
               error = true;
             }
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
               $scope.getName();
               $scope.getMonthExpense();


             }

           });
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
                 return false;
              }
            }

             $scope.page = 1;
             $scope.getCurrentMonthExpense();
           }

           $scope.changePerPage = function ($event)
           {
             $scope.perpage = $event.value;
             $scope.page = 1;
             $scope.getCurrentMonthExpense();

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
               $scope.paidby = '';
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
               $scope.paidby1 = '';
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
                 if($scope.editexpense.paidBy != 0)
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

            $scope.getMonthExpense = function()
            {
              $scope.monthEx = [];
              $scope.atotal = [];
              $scope.monthtotal = 0;
              $scope.monthtotalunpaid = 0;
              $scope.monthtotalpaid = 0;
              error = false;
              $scope.year = angular.element('.year').val();
              $scope.month = angular.element('.month').val();
              if($scope.year == '' || $scope.month == '')
              {
                error = true;
              }

              if(error == true)
              {
                return false;
              }

             var obj = {  page:$scope.apage,month:$scope.month,year:$scope.year};
            $http({
              url: '<?php echo base_url(); ?>freelancer/getMonthExpense',
              method: "POST",
              data:obj,
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
              }
            }).then(function(response) {
              $scope.moonthwiseshow = 1;
              setTimeout(function(){ $('html, body').animate({
                scrollTop: $("#wrapper").offset().top+800
              }, 2000);}, 500);
              angular.element(".preloader").hide();
              if(response.data.message == "true")
              {
                $scope.monthEx = response.data.result;
                $scope.monthtotal = response.data.total;
                $scope.monthtotalunpaid = response.data.unpaidtotal;
                $scope.monthtotalpaid = response.data.paidtotal;

                $scope.atotal = response.data.pcount;
               if($scope.apage == 1)
               $scope.apagination($scope.atotal);
               }
               $scope.monthNameshow = response.data.month;
               $scope.yearNameshow = response.data.year;
            });
            }

            $scope.apagination = function ($event)
            {
            if($scope.atotal > 10)
            {

              $('#apagination').pagination({
                items: $event,
                itemsOnPage: 10,
                cssStyle: 'light-theme',
                onPageClick:  function (e) {
                  $scope.apage  = e;
                  $scope.getMonthExpense();
                }
              });
            }
             else
             {
                $('#apagination').html('');
             }
            }

            $scope.getlocalcurrency();
           $scope.getName();
           $scope.getCurrentMonthExpense();
           $scope.getbank();
           $scope.generateArrayOfYears();



           });


           // expense

           // income

           //expense
           var app19 = angular.module('myApp53',[])

           app19.directive('mydatepicker', function () {
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

           app19.filter('date2', function () {
             return function (item) {
               const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
               "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
             ];
             var dates = new Date(Date.parse(item))
             var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
             return newDate;
           };
           });

           app19.filter('underscoreless', function () {
             return function (input) {
                 if(input)
                 {
                 return input.split(' ').join('-');
                 }
             };
           });

           app19.directive('numbersOnly', function() {
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


           app19.controller('myCtrt19', function($scope,$window,$http,$interval) {

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
             $scope.received = '';
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
             $scope.received1 = '';

             $scope.editincomedata = [];
             $scope.datewisedata = [];
             $scope.startdate = '';
             $scope.enddate = '';
             $scope.searchtotal = 0;
             $scope.sclient = '';
             $scope.sproject = '';
             $scope.ssclient = '';
             $scope.ssproject = '';
             $scope.Receivedamount1 ='';

             $scope.disabled = 1;
             $scope.Totalreceived = 0;
             $scope.suggestionclient = [];
             $scope.suggestionproject = [];

             $scope.allclientsuggestion = [];
             $scope.allprojectsuggestion = [];

             $scope.month = '';
           $scope.year = '';
           $scope.atotal = '';
           $scope.apage = 1;
           $scope.monthEx = [];
           $scope.moonthwiseshow = 0;
           $scope.currentyear = new Date().getFullYear();
           $scope.currentmonth = new Date().getMonth() + 1;

           $scope.monthNames = [ 'January', 'February', 'March', 'April', 'May', 'June',
                       'July', 'August', 'September', 'October', 'November', 'December' ];
           $scope.years = [];
           $scope.advanceSearchshow = 0;
           $scope.monthtotal = 0;
           $scope.monthreceived = 0;
           $scope.showmonthselect = 0;
           $scope.typingLENGTH =800;
           $scope.lastTypingTime='';
           $scope.typing = false;


           $scope.receivedkeyup = function (val,id)
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
               $scope.receivedSave(val,id);
               $scope.typing = false;
             }
           },$scope.typingLENGTH);
           }


           $scope.receivedSave = function(val,id)
           {
           var obj = { incomeId :id,receivedAmount:val };
           $http({
            url: '<?php echo base_url(); ?>freelancer/incomereceivedSave',
            method: "POST",
            data :obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
           }).then(function(response) {
              if(response.data.success == "true")
              {
                $scope.getCurrentMonthIncome();
              }
           });
           }

           $scope.clickadvanceSearch =  function()
           {
             if($scope.advanceSearchshow == 0)
             {
               $scope.advanceSearchshow = 1;
             }
             else if($scope.advanceSearchshow == 1)
             {
               $scope.advanceSearchshow = 0;
             }
           }

           $scope.changeyear = function ($event)
           {
             $scope.year = $event.value;
             $scope.showmonthselect = 1;
           }

           $scope.getClientSuggestion = function ()
           {
             var obj = { client :$scope.client};
              if($scope.client)
             {
             $http({
               url: '<?php echo base_url(); ?>freelancer/getincomeclientAutoSuggestion',
               method: "POST",
               data: obj,
               headers: {
                 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
               }
             }).then(function(response) {

               angular.element(".preloader").hide();
                if(response.data.success == "true")
                 {
                  $scope.allclientsuggestion = response.data.result;
                 }
              });
             }
           }

           $scope.getlocalcurrency = function ()
           {
             $http({
               url: '<?php echo base_url(); ?>freelancer/getuserlocalcurrency',
               method: "POST",
               headers: {
                 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
               }
             }).then(function(response) {

               angular.element(".preloader").hide();
                if(response.data.success == "true")
                 {
                  $scope.getuserlocalcurrency = response.data.result;
                 }
              });
           }

           $scope.addclient = function (client)
           {
             $scope.client = client;
             $scope.allclientsuggestion = [];
           }

           $scope.getProjectSuggestion = function ()
           {
             var obj = { project :$scope.project};
              if($scope.project)
             {
             $http({
               url: '<?php echo base_url(); ?>freelancer/getincomeprojectAutoSuggestion',
               method: "POST",
               data: obj,
               headers: {
                 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
               }
             }).then(function(response) {

               angular.element(".preloader").hide();
                if(response.data.success == "true")
                 {
                  $scope.allprojectsuggestion = response.data.result;
                 }
              });
             }

           }

           $scope.addproject = function (project)
           {
             $scope.project = project;
             $scope.allprojectsuggestion = [];
           }

               $scope.generateArrayOfYears = function()
               {
                 var max = new Date().getFullYear()
                 var min = max - 2;
                 for (var i = max; i >= min; i--)
                 {
                   $scope.years.push(i)
                 }
               }



             // $scope.addclient = function (name)
             // {
             //   $scope.sclient = name;
             //   $scope.suggestionclient = [];
             // }

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
               if($scope.client == '' || $scope.project == '' ||  $scope.amount == '' || $scope.currency == '' ||  $scope.date == '' || $scope.status == ''  || $scope.amount == 0)
               {
                 error = true;
               }


               if($scope.status == 1)
               {
                 if($scope.deposited == '' || $scope.received == '')
                 {
                   error = true;
                 }
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
                   $scope.clientsuggestion();
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
                   $scope.clientsuggestion();

                 }
               });
             }

             $scope.getCurrentMonthIncome = function()
             {
               $scope.currentTotal = 0;
               $scope.Totalreceived = 0;
               $scope.currentIn = [];

               var obj = { page:$scope.page,perpage:$scope.perpage, startdate:$scope.startdate,enddate:$scope.enddate,sclient:$scope.sclient,sproject:$scope.sproject};
               $http({
                 url: '<?php echo base_url(); ?>freelancer/getCurrentMonthIncome',
                 method: "POST",
                 data:obj,
                 headers: {
                   'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                 }
               }).then(function(response) {

                 angular.element(".preloader").hide();
                 if(response.data.message == "true")
                 {
                   $scope.currentIn = response.data.result;
                   $scope.total = response.data.pcount;
                   $scope.currentTotal = response.data.total;
                   $scope.Totalreceived = response.data.received;


                     if($scope.currentIn)
                     {
                       if($scope.startdate != '' || $scope.enddate != '' || $scope.sclient != '' || $scope.sproject != '')
                       {
                       $scope.currentTotal = 0;
                       $scope.Totalreceived = 0;
                       }
                       for(var i in $scope.currentIn)
                       {
                         if($scope.startdate != '' || $scope.enddate != '' || $scope.sclient != '' || $scope.sproject != '')
                         {
                        $scope.currentTotal = +$scope.currentTotal + +$scope.currentIn[i].amount;
                         $scope.Totalreceived = +$scope.Totalreceived + +$scope.currentIn[i].receivedAmount;
                         }
                         if($scope.currentIn[i].status == 2)
                         {
                         $scope.currentIn[i].disabled = 1 ;
                         }
                         else if($scope.currentIn[i].status == 1)
                         {
                           $scope.currentIn[i].disabled = 0 ;
                         }

                        }
                       }


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
                     $scope.getCurrentMonthIncome();
                   }
                 });
               }
               else
               {
                $('#pagination').html('');
               }
             }

             $scope.getMonthIncome = function()
             {

                 $scope.monthEx = [];
                 $scope.atotal = 0;
                 $scope.monthtotal = 0;
                 $scope.monthreceived = 0;

               error = false;
               $scope.year = angular.element('.year').val();
               $scope.month = angular.element('.month').val();
               if($scope.year == '' || $scope.month == '')
               {
                 error = true;
               }
               if(error == true)
               {
                 return false;
               }

              var obj = {  page:$scope.apage,month:$scope.month,year:$scope.year};
             $http({
               url: '<?php echo base_url(); ?>freelancer/getMonthIncome',
               method: "POST",
               data:obj,
               headers: {
                 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
               }
             }).then(function(response) {
                $scope.moonthwiseshow = 1;
               angular.element(".preloader").hide();
               setTimeout(function(){ $('html, body').animate({
                 scrollTop: $("#wrapper").offset().top+800
               }, 2000);}, 500);
               if(response.data.message == "true")
               {


                 $scope.monthEx = response.data.result;
                 $scope.monthtotal = response.data.total;
                 $scope.monthreceived = response.data.received;

                 $scope.atotal = response.data.pcount;
                if($scope.apage == 1)
                $scope.apagination($scope.atotal);
                }



                $scope.monthNameshow = response.data.month;
                $scope.yearNameshow = response.data.year;
             });
             }

             $scope.apagination = function ($event)
             {
               if($scope.atotal > 10)
               {
                 $('#apagination').pagination({
                 items: $event,
                 itemsOnPage: 10,
                 cssStyle: 'light-theme',
                 onPageClick:  function (e) {
                   $scope.apage  = e;
                   $scope.getMonthIncome();
                 }
               });
              }
              else
               {
                 $('#apagination').html('');
               }
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

                   if($scope.editincomedata.deposited)
                   {
                   $scope.deposited1 =$scope.editincomedata.deposited;
                   }
                   else
                   {
                     $scope.deposited1 ='';
                   }
                   $scope.received1 =$scope.editincomedata.received;
                   $scope.Receivedamount1 = $scope.editincomedata.receivedAmount;
                   if($scope.status == 2)
                   {
                     $scope.disabled1 = 1;
                   }
                   else
                   {
                    $scope.disabled1 = 0;
                   }
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
               if($scope.client1 == '' || $scope.project1 == '' ||  $scope.amount1 == '' || $scope.currency1 == ''  || $scope.date1 == '' || $scope.status1 =='' ||  $scope.amount1 == 0)
               {
                 error = true;
               }

               if($scope.amount1 == $scope.Receivedamount1)
               {
                 $scope.status1 = 1;
               }

               if($scope.status1 == 1)
               {
                 if($scope.deposited1 == '' || $scope.received1 == '')
                 {
                   error = true;
                 }
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
                   $scope.clientsuggestion();

                   // $scope.getMonthIncome();

                 }

               });
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
               $scope.startdate = angular.element("#incomestartdate").val();
               $scope.enddate = angular.element("#incomeenddate").val();
               $scope.sclient = angular.element(".sclient").val();
               $scope.sproject = angular.element(".sproject").val();
               if($scope.startdate)
               {
                 if($scope.enddate == '')
                 {
                   return false;
                 }
               }
               $scope.page =1;
               $scope.getCurrentMonthIncome();
             }

            $scope.changePerPage = function ($event)
            {
              $scope.perpage = $event.value;
              $scope.page = 1;
              $scope.getCurrentMonthIncome();
            }

            $scope.changeStatus = function($event)
            {
              angular.element(".preloader").show();
              var status = $event.value;
              var a = angular.element($event);
              var b = a[0].selectedOptions[0];
              var id = b.getAttribute('data-id');
              if(status != '' && id != 0)
              {
              var obj = { incomeId:id,status:status};

              $http({
                url: '<?php echo base_url(); ?>freelancer/incomeStatusUpdate',
                method: "POST",
                data: obj,
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {

                angular.element(".preloader").hide();
                if(response.data.message == "true")
                {
                  $.notify("Income Status Updated Successfully", "success");
                  $scope.getCurrentMonthIncome();
                }
                  });
               }
               else
               {
                angular.element(".preloader").hide();
               }
            }

             function underscore(input)
             {
                  if(input)
                  {
                  return input.split(' ').join('-');
                  }
              }

            $scope.incomeExport = function ()
            {
              $scope.startdate = angular.element("#incomestartdate").val();
              $scope.enddate = angular.element("#incomeenddate").val();
              if($scope.sclient != '')
              {
                $scope.ssclient = underscore($scope.sclient);
              }
              if($scope.sproject != '')
              {
                $scope.ssproject = underscore($scope.sproject);
              }

              if($scope.ssclient != '' && $scope.ssproject == '' && $scope.startdate == '' && $scope.enddate == '')
              {
                $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/"+$scope.ssclient;
              }
              else if($scope.sclient != '' && $scope.sproject != '' && $scope.startdate == '' && $scope.enddate == '')
              {
                $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/"+$scope.ssclient+"/"+$scope.ssproject;
              }
              else if($scope.ssclient == '' && $scope.ssproject != '' && $scope.startdate == '' && $scope.enddate == '')
              {
                $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/client/"+$scope.ssproject;
              }
              else if($scope.ssclient != '' && $scope.ssproject == '' && $scope.startdate != '' && $scope.enddate != '')
              {
                $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/"+$scope.ssclient+"/project"+$scope.ssproject+"/"+scope.startdate+"/"+$scope.enddate;
              }
              else if($scope.sclient != '' && $scope.sproject == '' && $scope.startdate != '' && $scope.enddate != '')
              {
                $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/"+$scope.ssclient+"/project/"+scope.startdate+"/"+$scope.enddate;
              }
              else if($scope.sclient == '' && $scope.sproject != '' && $scope.startdate != '' && $scope.enddate != '')
              {
                $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/client/"+$scope.ssproject+"/"+scope.startdate+"/"+$scope.enddate;
              }
              else if($scope.ssclient == '' && $scope.ssproject == '' && $scope.startdate != '' && $scope.enddate != '')
              {
                $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/client/project/"+scope.startdate+"/"+$scope.enddate;
              }
              else if($scope.ssclient != '' && $scope.ssproject != '' && $scope.startdate != '' && $scope.enddate != '')
              {

                $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport/"+$scope.ssclient+"/"+$scope.ssproject+"/"+$scope.startdate+"/"+$scope.enddate;
              }
              else if($scope.ssclient == '' && $scope.ssproject == '' && $scope.startdate == '' && $scope.enddate == '')
              {
                $window.location.href = "<?php echo base_url(); ?>freelancer/incomeExport";
              }
            }

            $scope.changedStatus = function($event)
            {
              var status = $event.value;
              if(status == 2)
              {
                $scope.disabled = 1;
                $scope.deposited ='';
                $scope.received = '';
                $scope.Receivedamount ='';
                $scope.deposited1 ='';
                $scope.received1 = '';
                $scope.Receivedamount1 ='';
              }
              else
              {
                $scope.disabled = 0;
              }
            }

             $scope.clientsuggestion = function ()
             {
              $http({
                url: '<?php echo base_url(); ?>freelancer/getincomeclientSuggestion',
                method: "POST",
                headers: {
                  'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                }
              }).then(function(response) {
                 if(response.data.success == "true")
                  {
                  $scope.suggestionclient = response.data.result;
                  }
               });
             }

             $scope.changeclient = function($event)
             {
               var client = $event.value;
               var obj = { client: client };
               if(client != '')
               {
               $http({
                 url: '<?php echo base_url(); ?>freelancer/getincomeproject',
                 method: "POST",
                 data:obj,
                 headers: {
                   'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                 }
               }).then(function(response) {
                  if(response.data.success == "true")
                   {
                   $scope.suggestionproject = response.data.result;
                   }
                 });
               }
             }

             $scope.getCurrentMonthIncome();
             $scope.getbank();
             $scope.clientsuggestion();
             $scope.generateArrayOfYears();
             $scope.getlocalcurrency();




           });

           //income

</script>

</body>
</html>
