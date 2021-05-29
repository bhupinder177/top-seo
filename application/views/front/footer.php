<footer>
  <!-- <div class="container"> -->
  <!-- test -->
      <div  class="row chat-window col-xs-12 col-md-3" id="chat_window_1" style="margin-left:10px;">
          <div class="col-xs-12 col-md-12">
            <!-- form -->
            <div  class="chatform panel panel-default">
              <form action="<?php echo base_url(); ?>supportemail" id="chatvalidate" method="post" >
                  <div class="panel-heading top-bar">
                      <div class="col-md-8 col-xs-8">
                          <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span>Support Chat</h3>
                      </div>
                      <div class="col-md-4 col-xs-4" style="text-align: right;">
                          <a class="chattoggle"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                      </div>
                  </div>
                  <div class="form-details">
                    <div class="form-group">
                     <input type="text" name="name" placeholder="Please enter name" class="form-control name">
                    </div>
                    <div class="form-group">

                      <input type="text" placeholder="Please enter email" name="email" class="form-control email">
                    </div>
                    <div class="form-group">
                      <input type="text" placeholder="Please enter phone" name="phone" class="form-control phone">
                    </div>
                    <div class="form-group">

                      <input type="text" placeholder="Please enter skype" name="skype" class="form-control skype">
                    </div>
                    <div class="form-group">

                      <input type="text" name="website" placeholder="Please enter website" class="form-control website">
                    </div>
                    <div class="chat-recaptcha form-group">
 		                 <div class="g-recaptcha" data-sitekey="6Ld4cuQUAAAAAN2nhKhDLEjW11dSGqW3Kk0NrEHg"></div>
	                    </div>

                  <div class="form-group">
                      <div class="input-group">

                          <button type="submit" class="btn btn-primary btn-sm formbtn" id="btn-chat">Submit</button>

                      </div>
                  </div>
                      </div>
                </form>
          </div>
              <!-- form -->

          	<div style="display:none" class="chatpanel panel panel-default">
                  <div class="panel-heading top-bar">
                      <div class="col-md-8 col-xs-8">
                          <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Chat - Miguel</h3>
                      </div>
                      <div class="col-md-4 col-xs-4" style="text-align: right;">
                          <a class="chattoggle"><span id="minim_chat_window" class="glyphicon glyphicon-minus icon_minim"></span></a>
                          <!-- <a href="#"><span class="glyphicon glyphicon-remove icon_close" data-id="chat_window_1"></span></a> -->
                      </div>
                  </div>

                  <div class="panel-body msg_container_base msgappend">
                    <!-- <div class="chatdiv">
                    </div> -->
                      <!-- <div class="row msg_container base_sent">
                          <div class="col-md-12 col-xs-12">
                              <div class="messages msg_sent">
                                  <p>that mongodb thing looks good, huh?
                                  tiny master db, and huge document store</p>
                                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                              </div>
                          </div> -->
                           <!-- <div class="col-md-2 col-xs-2 avatar">
                              <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                          </div> -->
                      <!-- </div> -->

                      <!-- <div class="row msg_container base_receive">
                          <div class="col-md-2 col-xs-2 avatar">
                              <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                          </div>
                          <div class="col-xs-10 col-md-10">
                              <div class="messages msg_receive">
                                  <p>that mongodb thing looks good, huh?
                                  tiny master db, and huge document store</p>
                                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                              </div>
                          </div>
                      </div> -->

                    </div>
                    <input type="hidden" value="" class="nameh">
                    <input type="hidden" value="" class="emailh">
                    <input type="hidden" value="" class="phoneh">
                    <input type="hidden" value="" class="chatId">
                    <input type="hidden" value="" class="skypeh">
                    <input type="hidden" value="" class="websiteh">
                  <div class="panel-footer">
                      <div class="input-group">
                          <input id="btn-input" type="text" class="msg form-control input-sm chat_input" placeholder="Write your message here..." />
                          <span class="input-group-btn">
                          <button class="btn btn-primary btn-sm sendmsg" id="btn-chat">Send</button>
                          </span>
                      </div>
                  </div>
      		</div>


          </div>
      </div>

      <div class="btn-group dropup">
          <p><img class="chattoggle" width="100%" src="<?php echo base_url(); ?>assets/front/images/chat.png"></p>
      </div>
  <!-- </div> -->

  <!-- style -->

  <!-- style -->
    <!-- <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="footer-bx">
                    <img src="<?php echo base_url(); ?>assets/front/images/footer-logo.png" />
                    <ul class="social-icon">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footer-bx">
                    <h5>Company Information</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Why Us</a></li>
                        <li><a href="#">How It Works</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Careers</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footer-bx">
                    <h5>Rankings</h5>
                    <ul>
                        <li><a href="#">Best SEO Companies</a></li>
                        <li><a href="#">Best PPC Companies</a></li>
                        <li><a href="#">Integrated Search Companies</a></li>
                        <li><a href="#">Reputation Management</a></li>
                        <li><a href="#">Social Media Marketing</a></li>
                        <li><a href="#">More Rankings</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="footer-bx">
                    <h5>Rankings</h5>
                    <ul>
                        <li><a href="#">Best SEO Companies</a></li>
                        <li><a href="#">Best PPC Companies</a></li>
                        <li><a href="#">Integrated Search Companies</a></li>
                        <li><a href="#">Reputation Management</a></li>
                        <li><a href="#">Social Media Marketing</a></li>
                        <li><a href="#">More Rankings</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <div class="copyright">
          <div class="container">
       <ul>

         <!-- Start of WebFreeCounter Code -->
         <!-- <img src="https://www.webfreecounter.com/hit.php?id=gemxqafo&nd=9&style=1" border="0" alt="web counter"> -->
         <!-- End of WebFreeCounter Code -->
           <li>Copyright 2017 to <?php echo date("Y"); ?> © TopSEOs.
             <!-- Use of this website constitutes acceptance of <a href="#">Terms &amp; Conditions</a> -->
           <li><a href="#">Privacy Policy</a>    </li>
           <li> <a href="#">  Legal Disclosure</a> </li>
           <li> <a href="<?php echo base_url(); ?>sitemap.xml">Sitemap</a> </li>
           <li> <a href="<?php echo base_url(); ?>sitemap.html">Sitemap html</a> </li>
        </ul>
        </div>
     </div>
</footer>
<script src="<?php echo base_url(); ?>assets/front/js/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<script src="<?php echo base_url(); ?>assets/front/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/front/js/notify.js"></script>

<!-- country code -->
<script src="<?php echo base_url(); ?>assets/dashboard/countrycode/js/intlTelInput.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/countrycode/js/isValidNumber.js"></script>
<!-- country code -->
<!-- datepicker -->
<!-- <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet"> -->





<!-- datepiker -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.simplePagination.js"></script>
<!-- <script src="assets/multiselect/multiselect.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script src="<?php echo base_url(); ?>assets/front/js/custom.js"></script>

<!-- <script type='text/javascript' src='https://business.directconnect.com/assets/lead-widget/NdLfyH6rue/563/js/directconnect.js' ></script> -->

<script src="//cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>
<!-- <script async src="https://platform-api.sharethis.com/js/sharethis.js#property=5da6bf4f4c64b30012df2b65&product=sticky-share-buttons"></script> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>




<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
  $(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:3,
        itemsDesktop:[1000,3],
        itemsDesktopSmall:[980,2],
        itemsTablet:[768,2],
        itemsMobile:[650,1],
        pagination:true,
        navigation:false,
        slideSpeed:1000,
        autoPlay:true
    });
});

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

$(".specialcharacter").keypress(function(e){
    var charCode = !e.charCode ? e.which : e.charCode;

    if(e.shiftKey ||  charCode == 42 || charCode == 44 || charCode == 39 || charCode == 45 || charCode == 46 || charCode == 61 || charCode == 62 || charCode == 59 || charCode == 62 || charCode == 47 || charCode == 91 || charCode == 93 || charCode == 92  )
    {
        e.preventDefault();
    }
})
</script>

<script>
  var SITEURL = "<?php echo base_url() ?>";
  $('body').on('click', '.buy_now', function(e){
       $('#confirm').modal('hide');
    var totalAmount = $('.selectedamount').val();
    var employee = $('.selectedemployee').val();
    var project = $('.selectedproject').val();
    var expense = $('.selectedexpense').val();
    var invoice = $('.selectedinvoice').val();
    var packages = $('.selectedpackage').val();
    var testimonial = $('.selectedtestimonial').val();
    var portfolio = $('.selectedportfolio').val();
    var casestudies = $('.selectedcasestudies').val();
    var services = $('.selectedservices').val();
    var industry = $('.selectedIndustry').val();
    var gig = $('.selectedgig').val();
    var jobpost = $('.selectedjobpost').val();
    var product_id =  $('.selecteduser').val();
    var options = {
    "key": "rzp_live_fbwKJxaWgp96YZ",
    "amount": (totalAmount*100), // 2000 paise = INR 20
    "currency": "USD",
    "name": "Top-Seo",
    "description": "Payment",
    "image": "<?php echo base_url(); ?>assets/front/images/top-seo.png",
    "handler": function (response){
          $.ajax({
            url: SITEURL + 'paymentSuccess',
            type: 'post',
            dataType: 'json',
            data: {
                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,userId : product_id,employee:employee,project:project,expense:expense,invoice:invoice,package:packages,testimonial:testimonial,portfolio:portfolio,casestudies:casestudies,services:services,industry:industry,gig:gig,jobpost:jobpost,totalamount:totalAmount
            },
            dataType    : "json",
            beforeSend  : function ()
           {
            $(".preloader").css('display','block');
           },
           complete: function ()
          {
           $(".preloader").css('display','none');
           },
            success: function (msg) {
               if(msg.success == "true")
               {
                 $.notify("Account has been registered successfully. Please login to explore more.", "success");

                 setTimeout(function() { window.location.href= SITEURL+'login';},1000);
               }
               else
               {
                 $.notify("Email Is Not Send.", "error");

               }
            }
        });

    },

    "theme": {
        "color": "#35ace2"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.preventDefault();
  });

</script>
<!-- recatcha -->


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <script type="text/javascript">
     var onloadCallback = function() {
       grecaptcha.render('submit', {
               'sitekey' : '6Ld4cuQUAAAAAN2nhKhDLEjW11dSGqW3Kk0NrEHg',
               'callback' : onSubmit
             });

     };
   </script>
 <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
     async defer>
 </script>

 <!-- recatcha -->

<script>

$(".startdate").datepicker({
            dateFormat: "dd-mm-yy",
            minDate: 1,
            onSelect: function (date) {
                var date2 = $('.startdate').datepicker('getDate');
                date2.setDate(date2.getDate() + 1);
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
                if (dt2 <= dt1) {
                    var minDate = $('.endate').datepicker('option', 'minDate');
                    $('.enddate').datepicker('setDate', minDate);
                }
            }
        });



$("#startdate").datepicker({
            dateFormat: "dd-mm-yy",
            minDate: 1,
            onSelect: function (date) {
                var date2 = $('#startdate').datepicker('getDate');
                date2.setDate(date2.getDate() + 1);
                $('#enddate').datepicker('setDate', date2);
                $('#enddate').datepicker('option', 'minDate', date2);
            }
        });
        $('#enddate').datepicker({
            dateFormat: "dd-mm-yy",
            minDate: 1,

            onClose: function () {
                var dt1 = $('#startdate').datepicker('getDate');
                var dt2 = $('#enddate').datepicker('getDate');
                if (dt2 <= dt1) {
                    var minDate = $('#endate').datepicker('option', 'minDate');
                    $('#enddate').datepicker('setDate', minDate);
                }
            }
        });

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


 CKEDITOR.replaceClass = 'ckeditor';


var app = angular.module('myApp', [])

app.filter('underscoreless', function () {
  return function (input) {
    //console.log(input);
	   	return input.split(' ').join('-');

  };
});

app.filter('join', function () {
  return function (input) {
    //console.log(input);
	   	return input.split(' ').join('_');

  };
});

app.directive('checkImage', function() {
   return {
      link: function(scope, element, attrs) {
         element.bind('error', function() {
            element.attr('src', '<?php echo base_url(); ?>assets/client_images/noimage.jpg'); // set default image
         });
       }
   }
});

app.controller('myCtrt', function($scope,$window,$http) {

$scope.country1 = '';
$scope.gethours = '';
$scope.hourly123 = '';
$scope.sort = '';
$scope.sort123 = '';
$scope.getservice = '';
$scope.service123 = '';
$scope.allservice =[];
$scope.allcountry =[];
$scope.msgtext ='';
$scope.jobId ='';
$scope.userId ='';
$scope.jobs = [];
$scope.username ='';
$scope.userimage ='';
$scope.url='';
$scope.clientId = '';
$scope.clientname = '';
$scope.clientimage = '';
$scope.roomId ='';




$http({
url: '<?php echo base_url(); ?>getservices',
headers: {
 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response){
    if(response.data.message == 'true')
    {
      $scope.allservice = response.data.result;
    }
    });

    $http({
    url: '<?php echo base_url(); ?>getcountry',
    headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
       $scope.allcountry = response.data.result;
      }
        });

$scope.joinword = function(name)
{
  var name =  name.split(' ').join('-');
    return  name.toLowerCase();
}

$scope.filter = function ($event)
{

	var obj = {  country : $scope.country123 , hourly : $scope.hourly123, sort:$scope.sort123 ,service:$scope.service123  }
	$http({
		url: '<?php echo base_url(); ?>getfreelancer',
		method: "POST",
		data: obj,
		headers: {
			'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
		}
	}).then(function(response) {

	  $scope.results = response.data.result;


	    });
}

$scope.search = function ()
{

   var ind ='';
    $scope.searchv = true;
    var error = false;
    $scope.country = angular.element('#country').val();
    $scope.service = angular.element('#service').val();

   if($scope.service == '')
   {
     error = true;
   }



 if(error == true)
  {
   return false;
  }

  if($scope.country && $scope.country)
 {
  var url = "<?php echo base_url(); ?>best-"+$scope.service+'-companies-in-'+$scope.country;
 }
 else if($scope.service && !$scope.country)
 {
   var url = "<?php echo base_url(); ?>best-"+$scope.service+'-companies';
 }
 window.location.href = url;

}

$http.get("<?php echo base_url(); ?>client-getsession")
.then(function(response)
{
  $scope.clientId = response.data.userid;
  $scope.clientname = response.data.name;
  $scope.clientimage = response.data.image;

});


$scope.country1 = function($event)
{
  var id = angular.element($event).val();
  $scope.country123 = id;
  $scope.filter();
  angular.element(".freelancerangular").show();
  angular.element(".freelancerphp").hide();
}

$scope.getservice = function($event)
{

  var key = angular.element($event).val();
  var  id = $scope.allservice[key]['id'];
  var  url = $scope.allservice[key]['name'];
  var curl = $scope.allservice[key]['link'];

  if(curl)
  {
  $scope.url = curl;
  }
  else
  {
    $scope.url = url;
  }

  // $("#service option[data-id='0']").remove();
  $scope.service123 = id;
  $scope.filter();
  angular.element(".freelancerangular").show();
  angular.element(".freelancerphp").hide();
}

$scope.gethours = function($event)
{
	var hour = angular.element($event).val();
	$scope.hourly123  = hour;
	$scope.filter();
  angular.element(".freelancerangular").show();
  angular.element(".freelancerphp").hide();
}

$scope.sort = function($event)
{

	var sort1 = angular.element($event).val();
	$scope.sort123  = sort1;
	$scope.filter();
  angular.element(".freelancerangular").show();
  angular.element(".freelancerphp").hide();
}

  $scope.checkcontact = function(id,name,image)
  {

    $scope.userId = id;
    $scope.username  = name;
    $scope.userimage = image;
    $("#contactmodal").modal('show');

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

  $scope.messagesend = function()
  {
    $scope.msgSubmit = true;
    var error = false;
     $scope.msgtext = angular.element(".message").val();
     $scope.jobId = angular.element(".jobId").val();

    if($scope.msgtext == '' || $scope.jobId == '' )
    {
      error = true;
    }

    if(error == true)
    {
     return false;
    }

    var m = JSON.stringify({ msg : $scope.msgtext ,jobId : $scope.jobId, userId : $scope.userId  });

    angular.element(".preloader").show();
    $http({
    url: '<?php echo base_url(); ?>contact',
    method: "POST",
    data: m,
    headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      socket.emit('join-chat', { senderId: $scope.clientId,receiverId : $scope.userId });

      angular.element(".preloader").hide();

      if(response.data.success == '1')
      {
        if($scope.userId > $scope.clientId)
        {
          $scope.roomId = 'Room_'+$scope.userId+'_'+$scope.clientId;
        }
        else if($scope.clientId > $scope.userId)
        {
          $scope.roomId = 'Room_'+$scope.clientId+'_'+$scope.userId;
        }

        socket.emit('message', { MSG_SENTBYNAME:$scope.clientname,MSG_SENTBYIMAGE:$scope.clientimage,MSG_SENTBY:$scope.clientId,MSG_SENTTONAME:$scope.username, MSG_SENTTO : $scope.userId,MSG_SENTTOIMAGE:$scope.userimage,MSG_TEXT : $scope.msgtext,MSG_ATTACHMENT:'',MSG_ROOMID :$scope.roomId,MSG_SENTTOIMAGE:'' ,MSG_DELETE : 0 ,MSG_EDIT: 0,MSG_TYPE:1});

        $("#contactmodal").modal('hide');
        $.notify("Message send Successfully.", "success");
        angular.element(".message").val('');
        angular.element(".jobId").val('');
      }
      else if(response.data.success == '2')
      {
        $window.location.href = '<?php echo base_url(); ?>client-chat';
      }

         });
  }



$scope.filter();
});

/////////////////////// chat
var app1 = angular.module('myApp1', [])

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

  app1.directive("scrollBottom", function(){
    return {
        link: function(scope, element, attr){
            var $id= $("#" + attr.scrollBottom);
            $(element).on("click", function(){
              $id.scrollTop($id[0].scrollHeight);

            });
        }
    }
  });



/////////////////// registration form submit
var app2 = angular.module('myApp2', [])

app2.filter('capitalize', function() {
    return function(input) {
      return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
    }
});

app2.directive('ngEnter', function () {
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
// testing
app2.controller('myCtrt2', function($scope,$window,$http,$interval) {
    $scope.email ='';
    $scope.password ='';
    $scope.cpass ='';
    $scope.name ='';
    $scope.cname ='';
    $scope.type ='';
    $scope.packageId ='';
    $scope.types =[];
    $scope.url = '';



    $http({
    url: '<?php echo base_url(); ?>gettype',
    headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
       $scope.types = response.data.result;
      }
        });

    $scope.ctrl = function($event)
    {
      var email = $event.value;

      if(!email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
      {
        $scope.emailvalide = true;

       }
      else
      {
         $scope.emailvalide = false;
      }
      $scope.$apply();
     }

  $scope.register = function()
    {
      $scope.registerSubmit = true;
      $scope.emailvalide = false;
	    var error = false;
      $scope.email = angular.element("#email").val();
		  $scope.password = angular.element("#password").val();
      $scope.cpass = angular.element("#cpass").val();
      $scope.name = angular.element("#name").val();
      $scope.cname = angular.element("#cname").val();
      $scope.url = angular.element("#url").val();
      $scope.type =  angular.element("#type").val();
      $scope.packageId = angular.element("#packageId").val();
      //console.log($scope.packageId);

      if(!$scope.email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
      {
        error = true;
        $scope.emailvalide = true;

      }


      if($scope.email == '' || $scope.password == ''   || $scope.type == '' || $scope.cpass =='')
      {
        error = true;
      }
      if($scope.type == 2)
      {
        if($scope.cname == '' || $scope.url == '')
        {
          error = true;
        }
      }

      if($scope.type == 3 || $scope.type == 4)
      {
        if($scope.url == '' || $scope.name == '')
        {
          error = true;
        }
      }

      if($scope.password != $scope.cpass)
      {
        return false;
      }

      if($scope.password.length < 6)
      {
        return false;
      }

      if(error == true)
      {
       return false;
      }

      var m = JSON.stringify({ email : $scope.email ,password : $scope.password,name: $scope.name,c_name:$scope.cname,url:$scope.url,type:$scope.type,packageId:$scope.packageId });

      angular.element(".preloader").show();
       $http({
       url: '<?php echo base_url(); ?>register-user',
       method: "POST",
       data: m,
       headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {

         angular.element(".preloader").hide();

         if(response.data.success == "1")
          {
            $.notify("Registered Successfully.", "success");
            angular.element("#email").val('');
            angular.element("#password").val('');
            angular.element("#name").val('');
            angular.element("#cpass").val('');
            angular.element("#cname").val('');
            angular.element("#url").val('');
            $interval(callAtInterval, 2500);

              function callAtInterval()
              {
                if(response.data.packageId)
                {
                $window.location.href = '<?php echo base_url(); ?>freelancer/membership-payment/'+response.data.userId+'/'+response.data.packageId;
                }
               else
               {
                 $window.location.href = '<?php echo base_url(); ?>plan/'+response.data.userId;

                }
              }

          }
         else if(response.data.success == "2")
         {
           $.notify("Email is Already Registered .", "error");
         }
         else if(response.data.success == "0")
         {
           $.notify("user not registered", "error");
         }

           });



    }
})


///send job offers
<?php
if(isset($id))
{
 ?>
var app3 = angular.module('myApp3', [])


app3.filter('trustAsHtml',['$sce', function($sce) {

	return function(text) {

		return $sce.trustAsHtml(text);
       };
}]);

app3.filter('underscoreless', function () {
  return function (input) {
	   	return input.split(' ').join('-');
      //return input.replace('', '-');
  };
});

app3.filter('replace', [function () {
    return function (input)
    {
         //return input.replace(/[|&;$%@"<>()+,]/g, "");
       var a = input.replace(/[^\w\s]/gi, "");
       return a.split(' ').join('-');

     };
}]);

// var month_name = function(dt){
// mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
//   return mlist[dt.getMonth()];
// };

app3.filter('date', function () {
  return function (item) {
    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
  ];
  var dates = new Date(Date.parse(item))
  var newDate = '' + dates.getDate() + ' ' + (monthNames[dates.getMonth()]) + ', ' + dates.getFullYear();
  return newDate;
};
});

app3.filter('time', function () {

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


     app3.directive('mydatepicker', function () {
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
     app3.directive('mydatepicker1', function () {
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
     app3.directive('mydatepicker2', function () {
   		return {
   			restrict: 'A',
   			require: 'ngModel',
   			link: function (scope, element, attrs, ngModelCtrl) {
   				element.datepicker({
   					dateFormat: 'd-m-yy',
            maxDate: 0,
   					onSelect: function (date) {
   						scope.date = date;
              scope.reviewform.startdate = date;
   						scope.$apply();
   					}
   				});
   			}
   		};
   	});
     app3.directive('mydatepicker3', function () {
   		return {
   			restrict: 'A',
   			require: 'ngModel',
   			link: function (scope, element, attrs, ngModelCtrl) {
   				element.datepicker({
   					dateFormat: 'd-m-yy',
            maxDate: 0,
   					onSelect: function (date) {
   						scope.date = date;
              scope.reviewform.enddate = date;
   						scope.$apply();
   					}
   				});
   			}
   		};
   	});

    app.directive('jqdatepicker', function () {
    return {
        restrict: 'A',
        require: 'ngModel',
         link: function (scope, element, attrs, ngModelCtrl) {
            $(element).datepicker({
                dateFormat: 'd-m-yy',
                onSelect: function (date) {
                    scope.date = date;
                    scope.$apply();
                }
            });
        }
    };
});



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

app3.controller('myCtrt3', function($scope,$window,$http,$timeout,$interval) {

$scope.milestones = [];
$scope.total = 0;
$scope.image = '';
$scope.jobtitle ='';
$scope.description ='';
$scope.profile =[];
$scope.pricing = [];
$scope.testimonial =[];
$scope.case =[];
$scope.services = [];
$scope.industry =[];
$scope.team =[];
$scope.portfolio =[];
$scope.competitors=[];
$scope.review = [];
$scope.keypeople = [];
$scope.activeclient = [];
$scope.username ='';
$scope.userimage ='';
$scope.currents =[];
$scope.ended =[];
$scope.page =1;
$scope.teamprofiledata =[];
$scope.milestones.push({
  title : '',
  price : 0,
  task : [{
    task:'',
    hours:'',
    hourlyPrice:'',
    amount:'',
  }],
  button:'',
});
$scope.name = '';
$scope.phone ='';
$scope.companyname ='';
$scope.email='';
$scope.website ='';
$scope.service ='';
$scope.projectinfo ='';
$scope.date ='';
$scope.portfolio =[];
$scope.client =[];
$scope.successscore ="";
$scope.allcountry =[];
$scope.earning='';
$scope.localcurrency ='';
$scope.jobservices ='';
$scope.jobindustries =[];
$scope.jobskill =[];
$scope.refservices =[];
$scope.jobrequiredf ='';
$scope.jobs = [];
$scope.allservices =[];
$scope.estimationHours ='';
$scope.estimationHourlyPrice='';
$scope.budget='';


// rating
$scope.allcurrency = [];
$scope.reviewform =[];
$scope.reviewform.rating ='';
$scope.reviewform.communication = 1;
$scope.reviewform.skill = 1;
$scope.reviewform.responsiveness = 1;
$scope.reviewform.quality = 1;
$scope.reviewform.achieved = 1;
$scope.reviewform.rehire =1;
$scope.reviewform.availability =1;
$scope.reviewform.deadline =1;
$scope.reviewform.cooperation =1;
$scope.reviewform.schedule =1;
$scope.reviewform.cost = 1;
$scope.reviewform.overall = 1;
$scope.country1 =[];
$scope.st =[];
$scope.ci =[];
$scope.reviewform.fullname ='';
$scope.reviewform.company ='';
$scope.reviewform.email ='';
$scope.reviewform.phone ='';
$scope.reviewform.skype ='';
$scope.reviewform.website ='';
$scope.reviewform.country ='';
$scope.reviewform.state ='';
$scope.reviewform.city ='';
$scope.reviewform.companyaddress ='';
$scope.reviewform.projecttitle ='';
$scope.reviewform.projectamount ='';
$scope.reviewform.startdate ='';
$scope.reviewform.enddate ='';
$scope.reviewform.projectsummary ='';
$scope.reviewform.rindustry ='';
$scope.reviewform.rservice ='';
$scope.reviewform.targetlocation ='';
$scope.reviewform.companyfeedback ='';
$scope.reviewform.reviewtitle ='';
$scope.reviewform.feedbacksummary ='';
$scope.reviewform.currency ='';
$scope.reviewform.targetlocationState ='';
$scope.reviewform.targetlocationCity ='';
$scope.step = 1;
$scope.linkedinreview =[];
$scope.emname ='';
$scope.type =1;
$scope.allcurrency =[];
$scope.currency ='';
//$scope.table2 =[];
$scope.cupload = 2;
$scope.questionType =[];
$scope.question =[];
$scope.reviewquestion = [];
$scope.page = 1;
$scope.ltotal = 0;
$scope.clientId ='';
$scope.clientname ='';
$scope.clientimage ='';
$scope.roomId ='';
$scope.typingLENGTH =800;
$scope.lastTypingTime='';
$scope.typing = false;
$scope.plan = [];
$scope.preferredlocations = [];
$scope.preferredlocationState = [];
$scope.preferredlocationCity = [];

$scope.askquestionform =[];
$scope.askquestionform.question ='';
$scope.askquestionform.name ='';
$scope.askquestionform.email ='';
$scope.askquestionform.phone ='';
$scope.askquestionform.skype ='';
$scope.askquestionform.website ='';
$scope.callservice = '';
$scope.useraskQuestion = [];
$scope.asktotal ='';
$scope.askpage =1;
$scope.usergigdata = [];
$scope.gigtotal ='';
$scope.gigpage = 1;
$scope.websitevalide = false;
$scope.emailvalide = false;

 $scope.rename = '';
 $scope.rephone = '';
 $scope.recompanyname ='';
 $scope.reemail ='';
 $scope.reservice ='';
 $scope.rewebsite ='';
 $scope.reprojectinfo ='';

 $scope.scname ='';
 $scope.scphone ='';
 $scope.sccompanyname ='';
 $scope.scwebsite ='';
 $scope.scemail ='';
 $scope.scdate ='';
 $scope.scaddress ='';
 $scope.jobopenings = [];
 $scope.jobopeningstotal = 0;
 $scope.jobopeningpage = 1;
 $scope.reqemailerror = false;
 $scope.schemailerror = false;
 $scope.callemailerror = false;
 $scope.askemailerror = false;
 $scope.contactemailerror = false;
 $scope.checkrequestAQuote = function($event)
    {
      var email = $event.value;
      var regex = /^\S+@\S+\.\S+$/;
      if(regex.test(email) === false)
      {
        $scope.reqemailerror = true;
      }
      else
      {
         $scope.reqemailerror = false;
      }
       $scope.$apply();
     }

 $scope.checkschdule = function($event)
    {
      var email = $event.value;
      var regex = /^\S+@\S+\.\S+$/;
      if(regex.test(email) === false)
      {
        $scope.schemailerror = true;
      }
      else
      {
         $scope.schemailerror = false;
      }
       $scope.$apply();
     }

 $scope.chechcall = function($event)
    {
      var email = $event.value;
      var regex = /^\S+@\S+\.\S+$/;
      if(regex.test(email) === false)
      {
        $scope.callemailerror = true;
      }
      else
      {
         $scope.callemailerror = false;
      }
       $scope.$apply();
     }

 $scope.chechask = function($event)
    {
      var email = $event.value;
      var regex = /^\S+@\S+\.\S+$/;
      if(regex.test(email) === false)
      {
        $scope.askemailerror = true;
      }
      else
      {
         $scope.askemailerror = false;
      }
       $scope.$apply();
     }

     $scope.checkContact = function($event)
    {
          var email = $event.value;
          var regex = /^\S+@\S+\.\S+$/;
          if(regex.test(email) === false)
          {
            $scope.contactemailerror = true;
          }
          else
          {
             $scope.contactemailerror = false;
          }
           $scope.$apply();
    }

$http.get("<?php echo base_url(); ?>client-getsession")
.then(function(response)
{
  $scope.clientId = response.data.userid;
  $scope.clientname = response.data.name;
  $scope.clientimage = response.data.image;

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


$scope.preferred = function()
{
    var obj = { userId:<?php if(isset($id)){ echo $id; } ?>  }
  $http({
   url: '<?php echo base_url(); ?>userpreferredlocation',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response){
     if(response.data.success)
     {
      $scope.preferredlocations = response.data.result;
     }
   });
 }

 $scope.getpreferredstate = function ($event)
 {
    var  country = angular.element($event).val();
    var a = angular.element($event);
    var b = a[0].selectedOptions[0];
    var rankingPriceId = b.getAttribute('data-id');
    var obj = { rankingPriceId:rankingPriceId  }
    $http({
     url: '<?php echo base_url(); ?>userpreferredState',
     method: "POST",
     data: obj,
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response){
       if(response.data.success =="true")
       {
        $scope.preferredlocationState = response.data.state;
        $scope.preferredlocationCity = response.data.city;
        if($scope.preferredlocationState)
        {
          $scope.reviewform.targetlocationState = $scope.preferredlocationState.id;
        }
        if($scope.preferredlocationCity)
        {
          $scope.reviewform.targetlocationCity = $scope.preferredlocationCity.id;
        }
       }
     });

 }

$scope.userplan = function()
{

    var obj = { u_id:<?php if(isset($id)){ echo $id; } ?>  }
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

$scope.changetype = function (type)
{
  $scope.type = type;
}

$scope.firststep = function()
{
  $scope.submitr = true;
  var error = false;

  if($scope.reviewform.fullname == '' || $scope.reviewform.company == ''  || $scope.reviewform.email == '' || $scope.reviewform.phone == '' || $scope.reviewform.website == '' || $scope.reviewform.country == '')
  {
    error = true;
  }

   if(error == true)
   {
     return false;
   }

  $scope.step = 2;
  $scope.submitr = false;
}

$scope.backfirst= function()
{
  $scope.step =1;
}

$scope.backsecond = function()
{
  $scope.step =2;
}

$scope.backthird = function ()
{
  $scope.step =3;
}

$scope.secondstep = function()
{
  $scope.submitr = true;
  var error = false;
  $scope.reviewform.startdate = angular.element('.reviewstartdate').val();
  $scope.reviewform.enddate = angular.element('.reviewenddate').val();
 if( $scope.reviewform.projecttitle == '' || $scope.reviewform.projectamount == '' || $scope.reviewform.startdate == '' || $scope.reviewform.enddate == '' || $scope.reviewform.projectsummary == '' || $scope.reviewform.rindustry == ''  || $scope.reviewform.rservice == ''  || $scope.reviewform.currency =='')
  {
      error = true;
  }

  if($scope.reviewform.startdate > $scope.reviewform.enddate)
  {
    $scope.dateerror = 1;
    error = true;
  }

  if($scope.preferredlocations.length != 0)
  {
    if( $scope.reviewform.targetlocation == '')
     {
         error = true;
     }
  }

  if(error == true)
  {
    return false;
  }

   $scope.step = 3;
   $scope.submitr = false;
}

$scope.thirdstep = function()
{
  $scope.submitr = true;
  var error = false;

  if( $scope.reviewform.reviewtitle == '' || $scope.reviewform.feedbacksummary == '' || $scope.reviewform.rating == '')
  {
      error = true;
  }

 if(error == true)
  {
    return false;
  }
  $scope.step = 4;
  $scope.submitr = false;

}

$scope.fillanswer = function ()
{
  if($scope.question)
  {
    for(var v in $scope.question)
    {
      $scope.question[v]['filled'] = 0;
      for(var c in $scope.question[v]['question'])
      {
        if($scope.question[v]['question'][c]['answer'] != '' || $scope.question[v]['question'][c]['answer'])
        {

          $scope.question[v]['filled'] += 1;
        }
      }
    }
  }
}


$scope.submitReview = function()
{
  $scope.submitr = true;
  var error = false;

  if($scope.question)
  {
    for(var v in $scope.question)
    {

      for(var c in $scope.question[v]['question'])
      {
        if($scope.question[v]['question'][c]['answer'])
        {
          $scope.question[v]['filled'] += 1;
        }
      }
      if($scope.question[v]['required'] >  $scope.question[v]['filled'])
      {
        error = true;
      }
    }
  }


  if(error == true)
  {
    return false;
  }



  var obj = {  contractId :0,overall:$scope.reviewform.rating,reviewTo:<?php if(isset($id)){ echo $id; } ?>,communication : $scope.reviewform.communication,skill:$scope.reviewform.skill,deadline:$scope.reviewform.deadline,quality:$scope.reviewform.quality,cooperation:$scope.reviewform.cooperation,review:$scope.reviewform.review,rehire:$scope.reviewform.rehire,cost:$scope.reviewform.cost,availability:$scope.reviewform.availability,total:$scope.reviewform.overall,company:$scope.reviewform.company,fullname:$scope.reviewform.fullname,email:$scope.reviewform.email,phone:$scope.reviewform.phone,skype:$scope.reviewform.skype,website:$scope.reviewform.website,country:$scope.reviewform.country,state:$scope.reviewform.state,city:$scope.reviewform.city,companyaddress:$scope.reviewform.companyaddress,startdate:$scope.reviewform.startdate,enddate:$scope.reviewform.enddate,projecttitle:$scope.reviewform.projecttitle,projectamount:$scope.reviewform.projectamount,projectsummary:$scope.reviewform.projectsummary,industry:$scope.reviewform.rindustry,service:$scope.reviewform.rservice,targetlocation:$scope.reviewform.targetlocation,targetState:$scope.reviewform.targetlocationState,targetCity:$scope.reviewform.targetlocationState,reviewtitle:$scope.reviewform.reviewtitle,feedbacksummary:$scope.reviewform.feedbacksummary,question : $scope.question,currency:$scope.reviewform.currency   }



    angular.element(".preloader").show();
    $http({
      url: '<?php echo base_url(); ?>company_review',
      method: "POST",
      data: obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
      angular.element(".preloader").hide();

       if(response.data.message == "true")
       {
         angular.element('#Addreview').modal('hide');
        // $.notify("Review Successfully Submit", "success");

        $interval(callAtInterval, 2000);
          function callAtInterval()
          {
          $window.location.href = 'https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=81pbd8gm8gt964&redirect_uri=https://www.top-seos.com/linkedapproved&state='+response.data.result+'&scope=r_liteprofile%20r_emailaddress%20w_member_social';
          }

       }

      // angular.element("#contractend").modal('hide');

      });

}
// rating

$scope.reviewQuestion = function(id)
{
  var obj = {  linkedInId : id  };

  $http({
    url: '<?php echo base_url(); ?>reviewquestion',
    method: "POST",
    data: obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {
     if(response.data.message =="true")
     {
       $scope.reviewquestion = response.data.result;
       for(var v in $scope.reviewquestion)
       {
         for(var t in $scope.reviewquestion[v]['question'] )
         {
           var q = $scope.reviewquestion[v]['question'][t]['question'];

            if($scope.profile.type == "2")
            {
              var g = q.replace("{ name }",$scope.profile.c_name);
              //console.log(g);
              $scope.reviewquestion[v]['question'][t]['question'] = g;

            }

             else if($scope.profile.type == "3")
             {
             var g  = q.replace("{ name }",$scope.profile.name);
             //console.log(g);
             $scope.reviewquestion[v]['question'][t]['question'] = g;
             }
            }
          }
          angular.element("#review").modal('show');

      }
  });
}

$http({
url: '<?php echo base_url(); ?>questionType',
headers: {
 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
   $scope.questionType = response.data.result;
  }
    });



$http({
url: '<?php echo base_url(); ?>getcountry',
headers: {
 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
   $scope.allcountry = response.data.result;
  }
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



// get all country
    $http({
      url: '<?php echo base_url(); ?>freelancer/getcountry',
      method: "POST",
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      $scope.country1 = response.data.result;


    });

    ////////get all country

    // get state

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

    // get state

    /// get city

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
    /// get city

$scope.requestaquote = function()
{
  $scope.submitrequest1 = true;
  var error = false;
  $scope.reemail = angular.element('#requestquoteemail').val();

  if($scope.rename == '' || $scope.rephone == ''  || $scope.reemail == ''  || $scope.reprojectinfo == '' )
  {
    error = true;
  }

  var regex = /^\S+@\S+\.\S+$/;
  if(regex.test($scope.reemail) === false)
     {
       error = true;
       $scope.reqemailerror = true;
     }
     else
     {
        $scope.reqemailerror = false;
     }

   if($scope.rewebsite != '')
   {
    if(!$scope.rewebsite.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
    {
    error = true;
     $scope.websitevalide = true;
     }
    else
    {
     $scope.websitevalide = false;
    }
  }

 if(error == true)
  {
   return false;
  }


  var m = JSON.stringify({ name : $scope.rename,phone:$scope.rephone ,company : $scope.recompanyname ,email : $scope.reemail,serviceId:$scope.reservice,website:$scope.rewebsite,projectinfo:$scope.reprojectinfo,type:'quote' ,u_id:$scope.profile.u_id});
  angular.element(".preloader").show();
   $http({
   url: '<?php echo base_url(); ?>requestquote',
   method: "POST",
   data: m,
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     angular.element(".preloader").hide();

     if(response.data.message == "true")
      {
        angular.element("#Requestquote").modal('hide');
        $scope.submitrequest = false;
        $.notify("Request has been sent successfully", "success");

        $scope.rename = '';
        $scope.rephone ='';
        $scope.recompanyname ='';
        $scope.reemail='';
        $scope.rewebsite ='';
        $scope.reservice ='';
        $scope.reprojectinfo ='';
        $scope.redate ='';
        $scope.submitrequest1 = false;
      }
     else if(response.data.message == "false")
     {
       $.notify("Your Quote not send.", "error");
     }

       });

}
$scope.address = '';

$scope.ScheduleAVisit = function()
{
  $scope.submitrequest = true;
  var error = false;
  $scope.scdate = angular.element('#scdate').val();

  if($scope.scname == '' || $scope.scphone == '' ||   $scope.scemail == '' || $scope.scdate =='' || $scope.scaddress == '' )
  {
    error = true;
  }
  var regex = /^\S+@\S+\.\S+$/;
  if(regex.test($scope.scemail) === false)
    {
      error = true;
      $scope.schemailerror = true;
    }
    else
    {
       $scope.schemailerror = false;
    }

 if(error == true)
  {
   return false;
  }

  var m = JSON.stringify({ name : $scope.scname,phone:$scope.scphone ,company : $scope.sccompanyname ,website:$scope.scwebsite,email : $scope.scemail,type:'visit' ,u_id:$scope.profile.u_id,date:$scope.scdate,address:$scope.scaddress});
  angular.element(".preloader").show();
   $http({
   url: '<?php echo base_url(); ?>requestquote',
   method: "POST",
   data: m,
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     angular.element(".preloader").hide();

     if(response.data.message == "true")
      {
        $scope.submitrequest = false;
        angular.element("#Schedule").modal('hide');

        $.notify("Request has been sent successfully", "success");
        $scope.scname = '';
        $scope.scphone ='';
        $scope.sccompanyname ='';
        $scope.scemail='';
        $scope.scwebsite ='';
        $scope.scservice ='';
        $scope.scprojectinfo ='';
        $scope.scdate ='';
        $scope.scaddress ='';
        $scope.submitrequest = false;
      }
     else if(response.data.message == "false")
     {
       $.notify("Schedule a Visit is not Send.", "error");
     }

       });
}


$scope.requestacall = function()
{
  $scope.submitrequest = true;
  var error = false;

  if($scope.name == '' || $scope.phone == '' ||  $scope.email == '' )
  {
    error = true;
  }

     var regex = /^\S+@\S+\.\S+$/;
  if(regex.test($scope.email) === false)
     {
       error = true;
       $scope.callemailerror = true;
     }
     else
     {
        $scope.callemailerror = false;
     }

 if(error == true)
  {
   return false;
  }

  var m = JSON.stringify({ name : $scope.name,phone:$scope.phone ,website:$scope.website,company : $scope.companyname ,email : $scope.email,type:'call' ,u_id:$scope.profile.u_id,serviceId:$scope.callservice});
  angular.element(".preloader").show();
   $http({
   url: '<?php echo base_url(); ?>requestquote',
   method: "POST",
   data: m,
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     angular.element(".preloader").hide();

     if(response.data.message == "true")
      {
        angular.element("#RequestCall").modal('hide');

        $.notify("Request has been sent successfully", "success");
        $scope.submitrequest = false;

        $scope.name = '';
        $scope.phone ='';
        $scope.companyname ='';
        $scope.email='';
        $scope.website ='';
        $scope.service ='';

      }
     else if(response.data.message == "false")
     {
       $.notify("Request A call is not sent.", "error");
     }

       });
}

$scope.milestoneadd = function ($event)
{

$scope.milestones.push({
  title : '',
  price : 0,
  task : [{
    task:'',
    hours:'',
    hourlyPrice:'',
    amount:0,
  }],
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

 $scope.fixedtotalbudget = function($event)
 {
   $scope.estimationHours = angular.element('#hours').val();
   $scope.estimationHourlyPrice = angular.element('#hourlyrate').val();
   $scope.budget = $scope.estimationHours * $scope.estimationHourlyPrice;

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

////upload attchment image

$scope.uploadImage = function ($event) {

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

$scope.industrys = function ($event)
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
      $scope.keyupindustry($event);
      //console.log("Typing");

      $scope.typing = false;
    }
     },$scope.typingLENGTH);
}

 $scope.keyupindustry = function($event)
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

$scope.deleteskill = function (key)
{
	$scope.jobskill.splice(key,1);
}

 $scope.submitjob = function ()
 {

   $scope.jobSubmit = true;
   var error = false;
   $scope.description = CKEDITOR.instances['description'].getData();
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
                milestone = table2.push({title : rr[1],price:'0', task : [] }) - 1;
              }
              else
              {
                cols = rows[i].split(",");
                table2[milestone]['task'].push ({task : cols[5],hours : cols[6],hourlyPrice : cols[7]});
              }
             }

             if(table2)
             {
               $scope.cupload = 2;
               $scope.budget = 0;
              for(var res in table2)
              {
                 var mt = 0;
                 var tprice = 0;
                 for(var i in  table2[res]['task'])
                 {
                 //  console.log(table2[res]['milestone']);
                    if(table2[res]['task'][i]['hours'] && table2[res]['task'][i]['hourlyPrice'])
                    {
                   var tprice = table2[res]['task'][i]['hours'] * table2[res]['task'][i]['hourlyPrice'];
                   table2[res]['task'][i]['amount'] = tprice;
                    mt += tprice;
                   }
                 }
                 table2[res]['price'] = mt;
                   $scope.budget = +$scope.budget+ +table2[res]['price'];

              }



            }


       // csv


          //   console.log(table2);


       // console.log($scope.table2);
   if($scope.jobtitle == '' || $scope.description == '' || $scope.jobservices == '' || $scope.jobskill.length == 0 || $scope.jobskill.jobindustries == 0 || $scope.jobrequiredf == '' || $scope.currency == '' )
   {
     error = true;
   }

   if($scope.type == 1)
   {
     if($scope.estimationHours =='' || $scope.estimationHourlyPrice =='')
     {
      error = true;
      }
   }

   if($scope.budget =='')
   {
     error = true;
   }

   if($scope.type == 2 && $scope.cupload == 1 )
   {

    $scope.mSubmit = true;
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
    }

   if(error == true)
   {
    return false;
   }

   //console.log(error);

   var offerto = angular.element(".offerto").val();
   var m = JSON.stringify({ offerto : offerto,currencyId:$scope.currency,required:$scope.jobrequiredf, jobtitle : $scope.jobtitle ,description : $scope.description,image:$scope.image ,totalAmount : $scope.totalAmount ,industry:$scope.jobindustries,service:$scope.jobservices,skill: $scope.jobskill,milestone : $scope.milestones,estimatehours:$scope.estimationHours,hourlyPrice: $scope.estimationHourlyPrice ,budget:$scope.budget,csv: table2 });
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

         $scope.milestones.push({
           title : '',
           price : 0,
           task : [{
             task:'',
             hours:'',
             hourlyPrice:'',
             amount:0,
           }],
           button:'',
         });

         $scope.totalAmount = 0;
         $scope.image = '';
         $scope.jobindustries = [];
         $scope.jobservices ='';
         $scope.jobskill =[];
         angular.element("#attchment").val('');
         angular.element("#title").val('');
         angular.element("#hours").val('');
         angular.element("#hourlyrate").val('');
         $scope.title ='';
         $scope.description ='';
         CKEDITOR.instances['description'].setData('');
         $scope.jobSubmit = false;
         $scope.jobrequiredf ='';
         $scope.estimationHours = '';
         $scope.estimationHourlyPrice ='';
         $scope.budget = 0;
         $scope.currency ='';
         angular.element("#myJob").modal('hide');

         $.notify("Job Created Successfuly", "success");
       }
      else if(response.data.message == "false")
      {
        $.notify("Job is not send.", "error");
      }

        });

        // csv
           }

           reader.readAsText(filename.files[0]);

        }
        return false;
        }
        // csv

 }
///////upload attchment image


// contact
$scope.checkcontact = function(id,name,image)
{
  $("#contactmodal").modal('show');
  $scope.userId = id;
  $scope.username = name;
  $scope.userimage = image;
//  console.log($scope.userId);
  //console.log($scope.username);
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

$scope.messagesend = function()
{

  $scope.msgSubmit = true;
  var error = false;
   $scope.msgtext = angular.element(".message").val();
   $scope.jobId = angular.element(".jobs").val();

  if($scope.msgtext == '' || $scope.jobId == '' )
  {
    error = true;
  }

  if(error == true)
  {
   return false;
  }

  var m = JSON.stringify({ msg : $scope.msgtext ,jobId : $scope.jobId, userId : $scope.userId  });
  socket.emit('join-chat', { senderId: $scope.clientId,receiverId : $scope.userId });

  angular.element(".preloader").show();
  $http({
  url: '<?php echo base_url(); ?>contact',
  method: "POST",
  data: m,
  headers: {
   'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

    angular.element(".preloader").hide();

    if(response.data.success == '1')
    {
      if($scope.userId > $scope.clientId)
      {
        $scope.roomId = 'Room_'+$scope.userId+'_'+$scope.clientId;
      }
      else if($scope.clientId > $scope.userId)
      {
        $scope.roomId = 'Room_'+$scope.clientId+'_'+$scope.userId;
      }

      socket.emit('message', { MSG_SENTBYNAME:$scope.clientname,MSG_SENTBYIMAGE:$scope.clientimage,MSG_SENTBY:$scope.clientId,MSG_SENTTONAME:$scope.username, MSG_SENTTO : $scope.userId,MSG_SENTTOIMAGE:$scope.userimage,MSG_TEXT : $scope.msgtext,MSG_ATTACHMENT:'',MSG_ROOMID :$scope.roomId,MSG_SENTTOIMAGE:'' ,MSG_DELETE : 0 ,MSG_EDIT: 0});

      $("#contactmodal").modal('hide');
     $.notify("Message send Successfully.", "success");
       angular.element(".message").val('');
       angular.element(".jobId").val('');
    }
    else if(response.data.success == '2')
    {
      $window.location.href = '<?php echo base_url(); ?>client-chat';
    }

       });
}
//contact

// get profile
$scope.getprofile = function(id)
{

  var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
 $http({
   url: '<?php echo base_url(); ?>getprofile',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

     if(response.data.message == "true")
    {
      $scope.profile = response.data.result;
      // $scope.services = response.data.service;

    }

     });

}



$scope.getpricing = function(id)
{

  var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
 $http({
   url: '<?php echo base_url(); ?>getpricing',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

     if(response.data.message == "true")
    {
      $scope.pricing = response.data.result;
      // $scope.services = response.data.service;

    }

     });

}


$scope.gettestimonial = function(id)
{

  var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
 $http({
   url: '<?php echo base_url(); ?>gettestimonial',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

     if(response.data.message == "true")
    {
      $scope.testimonial = response.data.result;
    }

     });

}

$scope.getcase = function(id)
{

  var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
 $http({
   url: '<?php echo base_url(); ?>getcasestudy',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

     if(response.data.message == "true")
    {
      $scope.case = response.data.result;
    }

     });

}

$scope.getservices = function(id)
{

  var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
 $http({
   url: '<?php echo base_url(); ?>getuserservice',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

     if(response.data.message == "true")
    {
      $scope.services = response.data.result;
    }

     });

}

$scope.getAllservices = function(id)
{

 $http({
   url: '<?php echo base_url(); ?>admin/allservices',
   method: "POST",
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

     if(response.data.message == "true")
    {
      $scope.allservices = response.data.result;
    }

     });

}

$scope.getindustry = function(id)
{

  var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
 $http({
   url: '<?php echo base_url(); ?>getuserIndustry',
   method: "POST",
   data: obj,
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

$scope.getkeypeople = function()
{

  var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
 $http({
   url: '<?php echo base_url(); ?>getkeypeople',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

     if(response.data.message == "true")
    {
      $scope.keypeople = response.data.result;
    }

     });
}

$scope.getteam = function()
{

  var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
 $http({
   url: '<?php echo base_url(); ?>getteam',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

     if(response.data.message == "true")
    {
      $scope.team = response.data.result;
    }

     });
}

$scope.getcurrentjobs = function ()
{
 var obj = { userId : <?php if(isset($id)){ echo $id; } ?>, page : $scope.page }
  $http({
    url: '<?php echo base_url(); ?>getcurrentjobs',
    method: "POST",
    data:obj,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response) {

      $scope.currents = response.data.result;

      $scope.total = response.data.pcount;

       if($scope.page == 1)
       $scope.pagination1($scope.total);
    });
  }

  $scope.pagination1 = function ($event)
  {
    if($scope.total > 10)
    {
        $('#pagination').pagination({
          items: $event,
          itemsOnPage: 10,
          cssStyle: 'light-theme',
          onPageClick:  function (e) {
            $scope.page  = e;
            $scope.getcurrentjobs();
          }
        });
     }
  }

  $scope.getendedjobs = function ()
  {
   var obj = { userId : <?php if(isset($id)){ echo $id; } ?>, page : $scope.page }
    $http({
      url: '<?php echo base_url(); ?>getendedContract',
      method: "POST",
      data:obj,
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {
        $scope.ended = response.data.result;
        $scope.total1 = response.data.pcount;

        if($scope.page == 1)
        $scope.pagination2($scope.total1);
      });
    }

    $scope.pagination2 = function ($event)
    {
      if($scope.total1 > 10)
      {
            $('#endedpagination').pagination({
              items: $event,
              itemsOnPage: 10,
              cssStyle: 'light-theme',
              onPageClick:  function (e) {
                $scope.page  = e;
                $scope.getendedjobs();
              }
            });
        }
    }


    $scope.teamProfile = function(id)
    {
      var obj = { userId : id }
       $http({
         url: '<?php echo base_url(); ?>getTeamOne',
         method: "POST",
         data:obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {
           if(response.data.message =="true")
           {

              $scope.teamprofiledata = response.data.result;
              //console.log($scope.teamprofile1);
              //$timeout(callAtTimeout, 3000);
                // console.log($scope.teamprofiledata);
               $("#teamProfile").modal('show');



            }
         });
    }

    $scope.getportfolio = function()
    {

      var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
     $http({
       url: '<?php echo base_url(); ?>getportfolio',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

         if(response.data.message == "true")
        {
          $scope.portfolio = response.data.result;
        }

         });
    }

    $scope.oneportfolio = function(id)
    {
      var obj = { id : id }
       $http({
         url: '<?php echo base_url(); ?>getoneportfolio',
         method: "POST",
         data:obj,
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
         }
       }).then(function(response) {
           if(response.data.message =="true")
           {
              $scope.portfoliodata = response.data.result;
              $("#portfolioShow").modal('show');
             }
         });
    }


    $scope.getclient = function()
    {

      var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
     $http({
       url: '<?php echo base_url(); ?>getclient',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

         if(response.data.message == "true")
        {
          $scope.client = response.data.result;
          $scope.activeclient = response.data.active;

        }

         });
    }


    $scope.getjobsuccess = function()
    {

      var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
     $http({
       url: '<?php echo base_url(); ?>getjobsuccess',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

         if(response.data.message == "true")
        {
          $scope.successscore = response.data.result;
        }

         });
    }

    $scope.getjobdata = function()
 		{
 			$scope.milestones = [];
       $scope.jobId = angular.element("#jobs").val();
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
  				 $scope.jobtitle = $scope.jobdetail.jobTitle;
  				 $scope.description = $scope.jobdetail.jobDescription;
           CKEDITOR.instances['description'].setData($scope.description);
 					 $scope.totalAmount = $scope.jobdetail.jobAmount;
 					 $scope.image = $scope.jobdetail.jobAttchment;
 					 //$scope.jobindustries = $scope.jobdetail.industryId;
           $scope.jobservices = $scope.jobdetail.servicesId;
           $scope.jobrequiredf = $scope.jobdetail.jobRequiredFreelancer;

           $scope.estimationHours =$scope.jobdetail.jobEstimateHours;
           $scope.estimationHourlyPrice=$scope.jobdetail.jobEstimateHourlyPrice;
           $scope.budget= $scope.jobdetail.jobBudget;

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

    $scope.getfreelancerEarning = function()
    {

      var obj = {  userId : <?php if(isset($id)){ echo $id; } ?> };
     $http({
       url: '<?php echo base_url(); ?>freelancerEarning',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

         if(response.data.message == "true")
        {
          $scope.earning = response.data.result;
          $scope.localcurrency = response.data.localcurrency;
        }

         });
    }


    		$scope.starrating = function(type,val)
    	  {
    		    if(type == "comm")
    		    {
    			   $scope.reviewform.communication = val;
    		    }

    			 else if(type == "skill")
    		   {
    			   $scope.reviewform.skill = val;
    		   }

    			 else if(type == "res")
    		   {
    			  $scope.reviewform.responsiveness = val;
    		   }

    			 else if(type == "quality")
    		   {
    			  $scope.reviewform.quality = val;
    		   }

    			 else if(type == "rehire")
    		   {
    			  $scope.reviewform.rehire = val;
    		   }
    			 else if(type == "availability")
    			 {
    			   $scope.reviewform.availability = val;
    			 }

    			 else if(type == "deadline")
    		   {
    		 	 $scope.reviewform.deadline = val;
    		   }

    			 else if(type == "cooperation")
    		   {
    		     $scope.reviewform.cooperation = val;
    		   }

    			else if(type == "schedule")
    	    {
    		   $scope.reviewform.schedule = val;
    	    }

    			else if(type == "cost")
    			{
    			 $scope.reviewform.cost = val;
    			}


    			var add = parseFloat($scope.reviewform.communication * 0.20) + parseFloat($scope.reviewform.skill * 0.40) + parseFloat($scope.reviewform.rehire * 0.40) + parseFloat($scope.reviewform.quality * 0.20) + parseFloat($scope.reviewform.availability * 0.20) + parseFloat($scope.reviewform.deadline * 0.20) + parseFloat($scope.reviewform.cooperation * 0.20) +  parseFloat($scope.reviewform.cost * 0.20);

     		  $scope.reviewform.overall  = add;

    	}

    	 $scope.overallrating = function($event)
    	 {
         	if($event.target.checked ==  true)
    		  {
    			 $scope.reviewform.rating = $event.target.value;
    		  }
    	 }

       $scope.getlinkedinreview = function()
       {
         var obj = {  userId : <?php if(isset($id)){ echo $id; } ?>, page : $scope.page };
        $http({
          url: '<?php echo base_url(); ?>getlinkedinreview',
          method: "POST",
          data: obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

           $scope.linkedinreview = response.data.result;
           $scope.ltotal = response.data.pcount;

          	if($scope.page == 1)
          	$scope.paginationr($scope.ltotal);
          		});
          }

          $scope.paginationr = function ($event)
          {
         	 if($scope.ltotal > 10)
         	 {
         				$('#reviewpagination').pagination({
         					items: $event,
         					itemsOnPage: 10,
         					cssStyle: 'light-theme',
         					onPageClick:  function (e) {
         						$scope.page  = e;
         						$scope.getlinkedinreview();
         					}
         			  });
         		}
          }

       $scope.contactEmployee = function (name)
       {
         $scope.emname = name
         angular.element("#employeeContact").modal('show');
       }

       $scope.contactEmployeeSubmit = function ()
       {
         $scope.submitrequest = true;
         var error = false;

         if($scope.name == '' || $scope.phone == ''  || $scope.email == ''  ||  $scope.projectinfo == '' )
         {
           error = true;
         }

         var regex = /^\S+@\S+\.\S+$/;
        if(regex.test($scope.email) === false)
        {
         error = true;
         $scope.contactemailerror = true;
        }
        else
        {
         $scope.contactemailerror = false;
        }


        if(error == true)
         {
          return false;
         }

         var m = JSON.stringify({ contactto :$scope.emname, name : $scope.name,phone:$scope.phone ,company : $scope.companyname ,email : $scope.email,serviceId:$scope.service,website:$scope.website,projectinfo:$scope.projectinfo,type:'quote' ,u_id:$scope.profile.u_id});
         angular.element(".preloader").show();
          $http({
          url: '<?php echo base_url(); ?>requestquote',
          method: "POST",
          data: m,
          headers: {
           'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {

            angular.element(".preloader").hide();

            if(response.data.message == "true")
             {

               angular.element("#employeeContact").modal('hide');
              $.notify("Request has been sent successfully", "success");
               $scope.submitrequest = false;
               $scope.name = '';
               $scope.phone ='';
               $scope.companyname ='';
               $scope.email='';
               $scope.website ='';
               $scope.service ='';
               $scope.projectinfo ='';
               $scope.date ='';
             }
            else if(response.data.message == "false")
            {
              $.notify("Job is not send.", "error");
            }

              });
       }

      $scope.ask = function ()
      {
        error = false;
        $scope.submitq = true;

        if($scope.askquestionform.question != '')
        {
          angular.element('#askpop').modal('show');

        }

      }

      $scope.asksubmit = function ()
      {
        error = false;
        $scope.submitqq = true;
        $scope.askquestionform.email = angular.element('#emailask').val();
        if($scope.askquestionform.name == '' || $scope.askquestionform.email == '' || $scope.askquestionform.phone == '' ||  $scope.askquestionform.website == '')
        {
          error = true;
        }

     var regex = /^\S+@\S+\.\S+$/;
        if($scope.askquestionform.email)
        {
          if(regex.test($scope.askquestionform.email) === false)
          {
            error= true;
            $scope.askemailerror = true;
          }
          else
          {
             $scope.askemailerror = false;
          }
       }

        if(!$scope.askquestionform.website.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
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

        var m = JSON.stringify({ userId:$scope.profile.u_id,question:$scope.askquestionform.question, name : $scope.askquestionform.name,phone:$scope.askquestionform.phone ,skype :$scope.askquestionform.skype ,email :$scope.askquestionform.email,website:$scope.askquestionform.website});
        angular.element(".preloader").show();
         $http({
         url: '<?php echo base_url(); ?>askquestionSave',
         method: "POST",
         data: m,
         headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
           }
         }).then(function(response) {

           angular.element(".preloader").hide();

           if(response.data.message == "true")
            {
              angular.element("#askpop").modal('hide');

              $.notify("Your Question Submitted Successfully", "success");
              $scope.submitq = false;
              $scope.submitqq = false;
              $scope.askquestionform = [];
              angular.element('#emailask').val('');

            }
           else if(response.data.message == "false")
           {
             $.notify("Ask Question Is Not Submit.", "error");
           }

             });

      }

      $scope.getaskQuestionlist = function ()
      {
       var obj = { userId : <?php if(isset($id)){ echo $id; } ?>, page : $scope.askpage }
        $http({
          url: '<?php echo base_url(); ?>getaskquestionlist',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

           if(response.data.message =="true")
           {
            $scope.useraskQuestion = response.data.result;

            $scope.asktotal = response.data.pcount;

             if($scope.askpage == 1)
             $scope.pagination6($scope.asktotal);
            }
          });
        }

        $scope.pagination6 = function ($event)
        {
          if($scope.asktotal > 10)
          {
              $('#askpagination').pagination({
                items: $event,
                itemsOnPage: 10,
                cssStyle: 'light-theme',
                onPageClick:  function (e) {
                  $scope.askpage  = e;
                  $scope.getaskQuestionlist();
                }
              });
           }
        }


        $scope.getgiglist = function ()
        {
         var obj = { userId : <?php if(isset($id)){ echo $id; } ?>, page : $scope.gigpage }
          $http({
            url: '<?php echo base_url(); ?>getusergiglist',
            method: "POST",
            data:obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {

             if(response.data.message =="true")
             {
              $scope.usergigdata = response.data.result;

              $scope.gigtotal = response.data.pcount;

               if($scope.gigpage == 1)
               $scope.pagination7($scope.gigtotal);
              }
            });
          }

          $scope.pagination7 = function ($event)
          {
            if($scope.gigtotal > 10)
            {
                $('#gigpagination').pagination({
                  items: $event,
                  itemsOnPage: 10,
                  cssStyle: 'light-theme',
                  onPageClick:  function (e) {
                    $scope.gigpage  = e;
                    $scope.getgiglist();
                  }
                });
             }
          }

        $scope.getjobopening = function ()
        {
         var obj = { userId : <?php if(isset($id)){ echo $id; } ?>, page : $scope.jobopeningpage }
          $http({
            url: '<?php echo base_url(); ?>getjobOpening',
            method: "POST",
            data:obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {

             if(response.data.message =="true")
             {
              $scope.jobopenings = response.data.result;

              $scope.jobopeningtotal = response.data.pcount;

               if($scope.jobopeningpage == 1)
               $scope.pagination11($scope.jobopeningtotal);
              }
            });
          }

          $scope.pagination11 = function ($event)
          {
            if($scope.jobopeningtotal > 8)
            {
                $('#jobopeningpagination').pagination({
                  items: $event,
                  itemsOnPage: 6,
                  cssStyle: 'light-theme',
                  onPageClick:  function (e) {
                    $scope.jobopeningpage  = e;
                    $scope.getjobopening();
                  }
                });
             }
          }


// get profile
$scope.getjobopening();
$scope.getaskQuestionlist();
$scope.getgiglist();
$scope.preferred();
$scope.getlinkedinreview();
$scope.getfreelancerEarning();
$scope.getjobsuccess();
$scope.getclient();
$scope.getportfolio();
$scope.getcurrentjobs();
$scope.getendedjobs();
$scope.getkeypeople();
$scope.getteam();
$scope.getindustry();
$scope.getservices();
$scope.getcase();
$scope.gettestimonial();
$scope.getprofile();
$scope.getpricing();
$scope.getAllservices();
$scope.userplan();


//// question

$http({
url: '<?php echo base_url(); ?>question',
headers: {
 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

  if(response.data.message == "true")
  {
   $scope.question = response.data.result;
   for(var v in $scope.question)
   {
     for(var t in $scope.question[v]['question'] )
     {
       var q = $scope.question[v]['question'][t]['question'];

        if($scope.profile.type == "2")
        {
          var g = q.replace("{ name }",$scope.profile.c_name);
          //console.log(g);
          $scope.question[v]['question'][t]['question'] = g;
          $scope.question[v]['question'][t]['answer'] ='';
        }

         else if($scope.profile.type == "3")
         {
         var g  = q.replace("{ name }",$scope.profile.name);
         //console.log(g);
         $scope.question[v]['question'][t]['question'] = g;
         $scope.question[v]['question'][t]['answer'] ='';
         }
        }
      }
    }
    });
    // question
});

<?php } ?>
////send job offer

////// forgot password
var app4 = angular.module('myApp4', [])

app4.controller('myCtrt4', function($scope,$window,$http,$interval) {

$scope.email = '';
$scope.password ='';
$scope.emailvalide = false;

$scope.ctrl = function($event)
{
     var email = $event.value;
     var regex = /^\S+@\S+\.\S+$/;
     if(regex.test(email) === false)
     {
       $scope.emailvalide = true;
      }
      else
      {
        $scope.emailvalide = false;
      }
      $scope.$apply();
}

$scope.submitemail = function ()
{
  $scope.passwordSubmit = true;

  var error = false;
  $scope.email = angular.element("#email").val();
  if($scope.email == '')
  {
    error = true;
  }
 var regex = /^\S+@\S+\.\S+$/;
  if(regex.test($scope.email) === false)
  {
    $scope.emailvalide = true;
    error = true;
   }
   else
   {
     $scope.emailvalide = false;
   }

  if(error == true)
  {
   return false;
  }

  var m = JSON.stringify({ email : $scope.email });
  angular.element(".preloader").show();
   $http({
   url: '<?php echo base_url(); ?>email-recovery',
   method: "POST",
   data: m,
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     angular.element(".preloader").hide();

     if(response.data.message == "true")
      {
        $.notify("Email sent successfully.", "success");
        angular.element("#email").val('');
        // $interval(callAtInterval, 400);
        // function callAtInterval() {
        // $window.location.href = '<?php echo base_url(); ?>login';
        //   }

      }
     else if(response.data.message == "false")
     {
       $.notify("Email does not exist.", "error");
     }


       });
}

 $scope.updatepassword = function()
 {
   //console.log('working');
   $scope.passSubmit = true;
   var error = false;
   $scope.password = angular.element("#password").val();
   $scope.email  = angular.element("#email").val();
   //console.log($scope.password);
   //console.log($scope.email);
   if($scope.password == '')
   {
     error = true;
   }

   if(error == true)
   {
    return false;
   }

   var m = JSON.stringify({ email:$scope.email ,password : $scope.password });
   angular.element(".preloader").show();
    $http({
    url: '<?php echo base_url(); ?>password_update',
    method: "POST",
    data: m,
    headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      angular.element(".preloader").hide();

      if(response.data.message == "true")
       {
         $.notify("Password Updated Successfully.", "success");
         angular.element("#password").val('');
         $interval(callAtInterval, 400);
         function callAtInterval() {
         $window.location.href = '<?php echo base_url(); ?>login';
           }

       }
      else if(response.data.message == "false")
      {
        $.notify("Email is not exist.", "error");
      }


        });
 }

});

///////
/////////forgot password

//////profile listing
<?php if(isset($serviceId)) { ?>
var app5 = angular.module('myApp5', [])


app5.filter('trustAsHtml',['$sce', function($sce) {

	return function(text) {

		return $sce.trustAsHtml(text);
       };
}]);


app5.directive('mydatepicker', function () {
return {
    restrict: 'A',
    require: 'ngModel',
     link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
            dateFormat: 'd-m-yy',
            minDate: 0,
            onSelect: function (date) {
                scope.date = date;
                scope.$apply();
            }
        });
    }
  };
});

app5.filter('underscoreless', function () {
  return function (input) {
    //console.log(input);
	   	return input.split(' ').join('_');

  };
});

app5.controller('myCtrt5', function($scope,$window,$http) {

$scope.profiles = [];
$scope.singleprofiles =[];
$scope.id ='';
$scope.key ='';
$scope.content ='';
$scope.industry ='';
$scope.service ='';
$scope.country ='';
$scope.indKey = '';

$scope.name = '';
$scope.phone ='';
$scope.companyname ='';
$scope.email='';
$scope.website ='';
$scope.service ='';
$scope.projectinfo ='';
$scope.date ='';

 $scope.rename = '';
 $scope.rephone = '';
 $scope.recompanyname ='';
 $scope.reemail ='';
 $scope.reservice ='';
 $scope.rewebsite ='';
 $scope.reprojectinfo ='';

 $scope.scname ='';
 $scope.scphone ='';
 $scope.sccompanyname ='';
 $scope.scwebsite ='';
 $scope.scemail ='';
 $scope.scdate ='';
 $scope.scaddress ='';

 $scope.reqemailerror = false;
 $scope.schemailerror = false;
 $scope.callemailerror = false;

$scope.checkrequestAQuote = function($event)
    {
      var email = $event.value;
      var regex = /^\S+@\S+\.\S+$/;
      if(regex.test(email) === false)
      {
        $scope.reqemailerror = true;
      }
      else
      {
         $scope.reqemailerror = false;
      }
       $scope.$apply();
     }

 $scope.checkschdule = function($event)
    {
      var email = $event.value;
      var regex = /^\S+@\S+\.\S+$/;
      if(regex.test(email) === false)
      {
        $scope.schemailerror = true;
      }
      else
      {
         $scope.schemailerror = false;
      }
       $scope.$apply();
     }

 $scope.chechcall = function($event)
    {
      var email = $event.value;
      var regex = /^\S+@\S+\.\S+$/;
      if(regex.test(email) === false)
      {
        $scope.callemailerror = true;
      }
      else
      {
         $scope.callemailerror = false;
      }
       $scope.$apply();
     }


$http({
url: '<?php echo base_url(); ?>getservices',
headers: {
 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
  }
}).then(function(response) {

       if(response.data.message == 'true')
        {
          $scope.allservice = response.data.result;
        }
    });

    $http({
    url: '<?php echo base_url(); ?>getcountry',
    headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

      if(response.data.message == "true")
      {
       $scope.allcountry = response.data.result;
      }
        });

        $http({
        url: '<?php echo base_url(); ?>getindustry',
        headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {

          if(response.data.message == "true")
          {
           $scope.allindustry = response.data.result;
          }
            });

            $scope.getservice = function($event)
            {
              var key = angular.element($event).val();

              var m = JSON.stringify({ industryId:$scope.allindustry[key]['id'] });

               $http({
               url: '<?php echo base_url(); ?>getlinkedServices',
               method: "POST",
               data: m,
               headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                 }
               }).then(function(response) {
                   $scope.allservice = [];
                if(response.data.message == "true")
                  {
                    $scope.allservice = response.data.result;

                  }


                   });

            }

 $scope.getprofileList = function()
 {

   var m = JSON.stringify({ serviceId:<?php if(isset($serviceId)){ echo $serviceId; } ?>,industryId : '<?php if(isset($industryId)) { echo $industryId; } ?>',countryId:'<?php if(isset($countryId)){ echo $countryId; } ?>' });

    $http({
    url: '<?php echo base_url(); ?>profile_listing',
    method: "POST",
    data: m,
    headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      }
    }).then(function(response) {

     if(response.data.message == "true")
       {
         $scope.profiles = response.data.result;

       }


        });
 }



 $scope.snapshot = function (id)
 {
   angular.element('.snap'+id).toggle();
   // if($scope.profiles[key]['snapshot'])
   //  delete $scope.profiles[key]['snapshot'];
   // else
   //  $scope.profiles[key]['snapshot'] = 1;

 }

 $scope.request = function(type,id)
 {
   $scope.Id = id;
   var m = JSON.stringify({ userId:$scope.Id });

   $http({
   url: '<?php echo base_url(); ?>getRankingSingleProfile',
   method: "POST",
   data: m,
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {
    if(response.data.message == "true")
      {
        $scope.profiles = response.data.result;
        // console.log(response.data.result);
        // console.log($scope.profiles);

        if(type == "quote")
        {
         angular.element("#Requestquote").modal('show');
        }
        else if(type == "visit")
        {
           angular.element("#Schedule").modal('show');
        }
        else if(type == "call")
        {
            angular.element("#RequestCall").modal('show');
        }
      }

       });


 }

 $scope.requestaquote = function()
{
  $scope.submitrequest1 = true;
  var error = false;
  $scope.reemail = angular.element('#requestquoteemail1').val();

  if($scope.rename == '' || $scope.rephone == ''  || $scope.reemail == ''  || $scope.reprojectinfo == '' )
  {
    error = true;
  }


  var regex = /^\S+@\S+\.\S+$/;
 if(regex.test($scope.reemail) === false)
    {
      error = true;
      $scope.reqemailerror = true;
    }
    else
    {
       $scope.reqemailerror = false;
    }


   if($scope.rewebsite != '')
   {
    if(!$scope.rewebsite.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
    {
    error = true;
     $scope.websitevalide = true;
     }
    else
    {
     $scope.websitevalide = false;
    }
  }

 if(error == true)
  {
   return false;
  }


  var m = JSON.stringify({ name : $scope.rename,phone:$scope.rephone ,company : $scope.recompanyname ,email : $scope.reemail,serviceId:$scope.reservice,website:$scope.rewebsite,projectinfo:$scope.reprojectinfo,type:'quote' ,u_id:$scope.Id});
  angular.element(".preloader").show();
   $http({
   url: '<?php echo base_url(); ?>requestquote',
   method: "POST",
   data: m,
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     angular.element(".preloader").hide();

     if(response.data.message == "true")
      {
        angular.element("#Requestquote").modal('hide');
        $scope.submitrequest = false;
        $.notify("Request has been sent successfully", "success");

        $scope.rename = '';
        $scope.rephone ='';
        $scope.recompanyname ='';
        $scope.reemail='';
        $scope.rewebsite ='';
        $scope.reservice ='';
        $scope.reprojectinfo ='';
        $scope.redate ='';
        $scope.submitrequest1 = false;
      }
     else if(response.data.message == "false")
     {
       $.notify("Your Quote not send.", "error");
     }

       });

}
$scope.address = '';

$scope.ScheduleAVisit = function()
{
  $scope.submitrequest = true;
  var error = false;
  $scope.scdate = angular.element('#scdate').val();

  if($scope.scname == '' || $scope.scphone == '' ||   $scope.scemail == '' || $scope.scdate =='' || $scope.scaddress == '' )
  {
    error = true;
  }


var regex = /^\S+@\S+\.\S+$/;
  if(regex.test($scope.scemail) === false)
    {
      error = true;
      $scope.schemailerror = true;
    }
    else
    {
       $scope.schemailerror = false;
    }

 if(error == true)
  {
   return false;
  }

  var m = JSON.stringify({ name : $scope.scname,phone:$scope.scphone ,company : $scope.sccompanyname ,website:$scope.scwebsite,email : $scope.scemail,type:'visit' ,u_id:$scope.Id,date:$scope.scdate,address:$scope.scaddress});
  angular.element(".preloader").show();
   $http({
   url: '<?php echo base_url(); ?>requestquote',
   method: "POST",
   data: m,
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     angular.element(".preloader").hide();

     if(response.data.message == "true")
      {
        $scope.submitrequest = false;
        angular.element("#Schedule").modal('hide');

        $.notify("Request has been sent successfully", "success");
        $scope.scname = '';
        $scope.scphone ='';
        $scope.sccompanyname ='';
        $scope.scemail='';
        $scope.scwebsite ='';
        $scope.scservice ='';
        $scope.scprojectinfo ='';
        $scope.scdate ='';
        $scope.scaddress ='';
        $scope.submitrequest = false;
      }
     else if(response.data.message == "false")
     {
       $.notify("Job is not send.", "error");
     }

       });
}


$scope.requestacall = function()
{
  $scope.submitrequest = true;
  var error = false;

  if($scope.name == '' || $scope.phone == '' ||  $scope.email == '' )
  {
    error = true;
  }


 var regex = /^\S+@\S+\.\S+$/;
  if(regex.test($scope.email) === false)
     {
       error = true;
       $scope.callemailerror = true;
     }
     else
     {
        $scope.callemailerror = false;
     }

 if(error == true)
  {
   return false;
  }

  var m = JSON.stringify({ name : $scope.name,phone:$scope.phone ,website:$scope.website,company : $scope.companyname ,email : $scope.email,type:'call' ,u_id:$scope.Id,serviceId:$scope.callservice});
  angular.element(".preloader").show();
   $http({
   url: '<?php echo base_url(); ?>requestquote',
   method: "POST",
   data: m,
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     angular.element(".preloader").hide();

     if(response.data.message == "true")
      {
        angular.element("#RequestCall").modal('hide');

        $.notify("Request has been sent successfully", "success");
        $scope.submitrequest = false;

        $scope.name = '';
        $scope.phone ='';
        $scope.companyname ='';
        $scope.email='';
        $scope.website ='';
        $scope.service ='';

      }
     else if(response.data.message == "false")
     {
       $.notify("Job is not send.", "error");
     }

       });
}

 $scope.joinword = function(name)
 {
  var name =  name.split(' ').join('_');
    return  name.toLowerCase();
 }

 $scope.search = function ()
 {

    var ind ='';
     $scope.searchv = true;
     var error = false;
     var count = angular.element('#country').val();
     var ser = angular.element('#service').val();

    var ind = angular.element('#industry').val();



  $scope.industry = ind;
  $scope.service =  ser;
  $scope.country =  count;

    if($scope.service == '')
    {
      error = true;
    }



  if(error == true)
   {
    return false;
   }

   if(count && ind && ser)
  {

    var url = "<?php echo base_url(); ?>best-"+ind+'-'+ser+'-companies-in-'+count;
  }
  else if(count && !ind && ser)
  {
    var url = "<?php echo base_url(); ?>best-"+ser+'-companies-in-'+count;
  }
  else if(!count && !ind && ser)
  {
    var url = "<?php echo base_url(); ?>best-"+ser+'-companies';
  }
  else if(!count && ind && ser)
  {
   var url = "<?php echo base_url(); ?>best-"+ind+'-'+ser+'-companies';
  }
  else
  {
    var url = "<?php echo base_url(); ?>best-"+ind+'-companies';
  }

  window.location.href = url;

 }


// $scope.getprofileList();

});
<?php } ?>
//////profile listing

// search filter

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

app6.directive('checkImage', function() {
   return {
      link: function(scope, element, attrs) {
         element.bind('error', function() {
            element.attr('src', '<?php echo base_url(); ?>assets/client_images/noimage.jpg'); // set default image
         });
       }
   }
});

app6.controller('myCtrt6', function($scope,$window,$http) {

$scope.country1 = '';
$scope.gethours = '';
$scope.hourly123 = '';
$scope.sort = '';
$scope.sort123 = '';
$scope.getservice = '';
$scope.service123 = '';
$scope.allservice =[];
$scope.allcountry =[];
$scope.msgtext ='';
$scope.jobId ='';
$scope.userId ='';
$scope.jobs = [];
$scope.username ='';
$scope.url='';



$http({
url: '<?php echo base_url(); ?>getservices',
headers: {
'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 }
}).then(function(response) {

      if(response.data.message == 'true')
       {
         $scope.allservice = response.data.result;
       }
   });

   $http({
   url: '<?php echo base_url(); ?>getcountry',
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     if(response.data.message == "true")
     {
      $scope.allcountry = response.data.result;
     }
       });

$scope.joinword = function(name)
{
 var name =  name.split(' ').join('-');
   return  name.toLowerCase();
}

$scope.filter = function ($event)
{
 var obj = {  country : $scope.country123 , hourly : $scope.hourly123, sort:$scope.sort123 ,service:'<?php if(isset($serviceId)){ echo $serviceId; } ?>'  }
 $http({
   url: '<?php echo base_url(); ?>getfreelancer',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {
   $scope.results = response.data.result;


     });
}



$scope.country1 = function($event)
{

 var id = angular.element($event).val();
 $scope.country123 = id;
 $scope.filter();
 angular.element(".freelancerangular").show();
 angular.element(".freelancerphp").hide();
}

$scope.getservice = function($event)
{

 var id = angular.element($event).val();
 $scope.service123 = id;
 $scope.filter();
 angular.element(".freelancerangular").show();
 angular.element(".freelancerphp").hide();
}

$scope.gethours = function($event)
{
 var hour = angular.element($event).val();
 $scope.hourly123  = hour;
 $scope.filter();
 angular.element(".freelancerangular").show();
 angular.element(".freelancerphp").hide();
}

$scope.sort = function($event)
{

 var sort1 = angular.element($event).val();
 $scope.sort123  = sort1;
 $scope.filter();
 angular.element(".freelancerangular").show();
 angular.element(".freelancerphp").hide();
}

 $scope.checkcontact = function(id,name)
 {
   $("#contactmodal").modal('show');
   $scope.userId = id;
   $scope.username = name;

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

 $scope.messagesend = function()
{
  //console.log(angular.element(".message").val());

   $scope.msgSubmit = true;
   var error = false;
    $scope.msgtext = angular.element(".message").val();
    $scope.jobId = angular.element(".jobId").val();
   //
   // console.log($scope.jobId);
   // console.log($scope.msgtext);
   if($scope.msgtext == '' || $scope.jobId == '' )
   {
     error = true;
   }

   if(error == true)
   {
    return false;
   }

   var m = JSON.stringify({ msg : $scope.msgtext ,jobId : $scope.jobId, userId : $scope.userId  });

   angular.element(".preloader").show();
   $http({
   url: '<?php echo base_url(); ?>contact',
   method: "POST",
   data: m,
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     angular.element(".preloader").hide();

     if(response.data.success == '1')
     {
         $("#contactmodal").modal('hide');
      $.notify("Message send Successfully.", "success");
        angular.element(".message").val('');
        angular.element(".jobId").val('');
     }
     else if(response.data.success == '2')
     {
       $window.location.href = '<?php echo base_url(); ?>client-chat';
     }

        });
 }


$scope.filter();
});
// search filter

// client profiles

<?php
if(isset($clientId))
{
 ?>
var app7 = angular.module('myApp7', [])


app7.filter('trustAsHtml',['$sce', function($sce) {

	return function(text) {

		return $sce.trustAsHtml(text);
       };
}]);

app7.filter('underscoreless', function () {
  return function (input) {
	   	return input.split(' ').join('-');
      //return input.replace('', '-');
  };
});


app7.directive('mydatepicker', function () {
return {
    restrict: 'A',
    require: 'ngModel',
     link: function (scope, element, attrs, ngModelCtrl) {
        element.datepicker({
            dateFormat: 'd-m-yy',
            minDate: 0,
            onSelect: function (date) {
                scope.date = date;
                scope.$apply();
            }
        });
    }
  };
});

var month_name = function(dt){
mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
  return mlist[dt.getMonth()];
};

app7.filter('date', function () {
  return function (item) {
    var month = month_name(new Date(item));
    var dates = new Date(Date.parse(item))
     var newDate = '' +(month) + ' , ' + dates.getFullYear();
    return newDate;
    //console.log(newDate);
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

app7.controller('myCtrt7', function($scope,$window,$http,$timeout) {
$scope.profile =[];
$scope.currents =[];
$scope.ended =[];
$scope.page =1;
$scope.freelancer =[];
$scope.activeproject =[];
$scope.successscore =[];
$scope.total ='';
$scope.total1='';
$scope.spend ='';
$scope.openprojects =[];
$scope.industry =[];
$scope.services =[];


// get profile
$scope.getprofile = function(id)
{

  var obj = {  userId : <?php if(isset($clientId)){ echo $clientId; } ?> };
 $http({
   url: '<?php echo base_url(); ?>getprofile',
   method: "POST",
   data: obj,
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
 }).then(function(response) {

     if(response.data.message == "true")
    {
      $scope.profile = response.data.result;
      // $scope.services = response.data.service;

    }

     });

}


    $scope.getfreelancer = function()
    {

      var obj = {  userId : <?php if(isset($clientId)){ echo $clientId; } ?> };
     $http({
       url: '<?php echo base_url(); ?>getfreelancer',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

         if(response.data.message == "true")
        {
          $scope.freelancer = response.data.result;
        }

         });
    }

    $scope.getfreelancer = function()
    {

      var obj = {  userId : <?php if(isset($clientId)){ echo $clientId; } ?> };
     $http({
       url: '<?php echo base_url(); ?>getclientfreelancer',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

         if(response.data.message == "true")
        {
          $scope.freelancer = response.data.result;
        }

         });
    }


    $scope.getActiveProject = function()
    {

      var obj = {  userId : <?php if(isset($clientId)){ echo $clientId; } ?> };
     $http({
       url: '<?php echo base_url(); ?>getActiveProjects',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

         if(response.data.message == "true")
        {
          $scope.activeproject = response.data.result;
        }

         });
    }

    $scope.getjobsuccess = function()
    {

      var obj = {  userId : <?php if(isset($clientId)){ echo $clientId; } ?> };
     $http({
       url: '<?php echo base_url(); ?>getclientscore',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

         if(response.data.message == "true")
        {
          $scope.successscore = response.data.result;
          //console.log($scope.successscore);
        }

         });
    }




    $scope.getcurrentjobs = function ()
    {
     var obj = { userId : <?php if(isset($clientId)){ echo $clientId; } ?>, page : $scope.page }
      $http({
        url: '<?php echo base_url(); ?>clientcurrentjobs',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

          $scope.currents = response.data.result;

          $scope.total = response.data.pcount;

           if($scope.page == 1)
           $scope.pagination1($scope.total);
        });
      }

      $scope.pagination1 = function ($event)
      {
        if($scope.total > 10)
        {
            $('#pagination').pagination({
              items: $event,
              itemsOnPage: 10,
              cssStyle: 'light-theme',
              onPageClick:  function (e) {
                $scope.page  = e;
                $scope.getcurrentjobs();
              }
            });
         }
      }

      $scope.getendedjobs = function ()
      {
       var obj = { userId:<?php if(isset($clientId)){ echo $clientId; } ?>, page : $scope.page }
        $http({
          url: '<?php echo base_url(); ?>clientendedContract',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
            $scope.ended = response.data.result;
            $scope.total1 = response.data.pcount;

            if($scope.page == 1)
            $scope.pagination2($scope.total1);
          });
        }

        $scope.pagination2 = function ($event)
        {
          if($scope.total1 > 10)
          {
              $('#endedpagination').pagination({
                items: $event,
                itemsOnPage: 10,
                cssStyle: 'light-theme',
                onPageClick:  function (e) {
                  $scope.page  = e;
                  $scope.getendedjobs();
                }
              });
           }
        }

        // $scope.getclientspend = function()
        // {
        //
        //   var obj = {  userId : <?php if(isset($clientId)){ echo $clientId; } ?> };
        //  $http({
        //    url: '<?php echo base_url(); ?>clientspend',
        //    method: "POST",
        //    data: obj,
        //    headers: {
        //      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        //    }
        //  }).then(function(response) {
        //
        //      if(response.data.message == "true")
        //     {
        //       $scope.spend = response.data.result;
        //     }
        //
        //      });
        // }

        $scope.getopenjobs = function ()
        {
         var obj = { userId:<?php if(isset($clientId)){ echo $clientId; } ?> }
          $http({
            url: '<?php echo base_url(); ?>getClientOpenJob',
            method: "POST",
            data:obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
              $scope.openprojects = response.data.result;

            });
          }

          $scope.getservices = function(id)
          {

            var obj = {  userId : <?php if(isset($clientId)){ echo $clientId; } ?> };
           $http({
             url: '<?php echo base_url(); ?>getuserservice',
             method: "POST",
             data: obj,
             headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {

               if(response.data.message == "true")
              {
                $scope.services = response.data.result;
              }

               });

          }

          $scope.getindustry = function(id)
          {

            var obj = {  userId : <?php if(isset($clientId)){ echo $clientId; } ?> };
           $http({
             url: '<?php echo base_url(); ?>getuserIndustry',
             method: "POST",
             data: obj,
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




// get profile
$scope.getservices();
$scope.getindustry();
$scope.getopenjobs();
// $scope.getclientspend();
$scope.getjobsuccess();
$scope.getprofile();
$scope.getfreelancer();
$scope.getActiveProject();
$scope.getcurrentjobs();
$scope.getendedjobs();
});

<?php } ?>
// client profile

//job detail
<?php if(isset($jobId))

 {
   ?>
var app8 = angular.module('myApp8', [])


app8.filter('trustAsHtml',['$sce', function($sce) {

	return function(text) {

		return $sce.trustAsHtml(text);
       };
}]);

app8.filter('replace', [function () {

    return function (input, from, to) {

      if(input === undefined) {
        return;
      }
     var regex = new RegExp(from, 'g');
      return input.replace(regex, to);
     };
}]);

app8.filter('underscoreless', function () {
  return function (input) {
	   	return input.split(' ').join('-');
      //return input.replace('', '-');
  };
});



  app8.filter('date', function () {
    return function (item) {
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear() +' '+ dates.getHours() + ':' + dates.getMinutes();
      return newDate;
    };
  });


var month_name = function(dt){
mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
  return mlist[dt.getMonth()];
};

app8.directive('numbersOnly', function() {
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

app8.filter('date1', function () {
  return function (item) {
    var month = month_name(new Date(item));
    var dates = new Date(Date.parse(item))
     var newDate = '' +(month) + ', ' + dates.getFullYear();
    return newDate;
    //console.log(newDate);
  };
});



app8.controller('myCtrt8', function($scope,$window,$http,$timeout) {

$scope.job =[];
$scope.client = [];
$scope.currents =[];
$scope.ended =[];
$scope.page =1;
$scope.page1 = 1;
$scope.bid ='';
$scope.proposal ='';
$scope.time ='';
$scope.attachment ='';
$scope.proposalCount = 0;
$scope.milestones = [];
$scope.hiredRate = 0;
$scope.type = 1;
$scope.currency = '';
$scope.hourlyprice = 0;

// get profile

$scope.milestones.push({
  title : '',
  price : 0,
  task : [
    {
      task:'',
      hours:'',
      hourlyPrice:$scope.hourlyprice,
      amount:'',
    }
  ],
  button:'',
});

$scope.changetype = function (type)
{
  $scope.type = type;
}

$scope.milestoneadd = function ($event)
{

$scope.milestones.push({
  title : '',
  price : 0,
  task : [
    {
    task : '',
    hours:'',
    hourlyPrice:$scope.hourlyprice,
    amount:'',
   }],
  button:'',
});

}


$scope.deletemilestone = function ($key)
{
  $scope.milestones.splice($key,1);
  $scope.totalmilestone();

}


$scope.totalmilestone = function($event)
{
    $scope.bid = 0;
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
      $scope.bid = +$scope.bid + +$scope.milestones[i]['price'];
    }
  }

$scope.fixedtotalbudget = function($event)
{
  $scope.budget = $scope.estimationHours * $scope.estimationHourlyPrice;

}


$scope.taskadd = function ($key)
{

$scope.milestones[$key]['task'].push({

  task : '',
  hours:'',
  hourlyPrice:$scope.hourlyprice,
  amount:'',
});

}

$scope.deletetask = function ($mkey,$key)
{
  //alert($key);
  $scope.milestones[$mkey]['task'].splice($key,1);
  $scope.totalmilestone();

}

$scope.keyuphourly = function(val)
{
  $scope.hourlyprice = val;
  if($scope.milestones)
  {
     for( var res in $scope.milestones)
     {
       if($scope.milestones[res]['task'].length != 0)
       {
          for(var t in $scope.milestones[res]['task'])
          {
            $scope.milestones[res]['task'][t]['hourlyPrice'] = $scope.hourlyprice;
          }
        }
     }
   }
   $scope.totalmilestone();
}


    $scope.getjobdetail = function()
    {

      var obj = {  jobId : <?php if(isset($jobId)){ echo $jobId; } ?> };
     $http({
       url: '<?php echo base_url(); ?>getjobdetail',
       method: "POST",
       data: obj,
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {

         if(response.data.message == "true")
        {
          $scope.job = response.data.result;
          $scope.client = response.data.client;
          $scope.currency = $scope.job.currencycode +' '+ $scope.job.currencysymbol;
          if($scope.job.jobEstimateHourlyPrice != 0)
          {
          $scope.hourlyprice = $scope.job.jobEstimateHourlyPrice;
          }
          else
          {
          $scope.hourlyprice ='';
          }
          $scope.getcurrentjobs($scope.client.u_id);
          $scope.getendedjobs($scope.client.u_id);
          $scope.getproposal($scope.job.jobId);
          $scope.getopenjobs($scope.client.u_id);
          $scope.gethirerate($scope.client.u_id);
        }

         });
    }

    $scope.getcurrentjobs = function (id)
    {
     var obj = { userId : id, page : $scope.page }
      $http({
        url: '<?php echo base_url(); ?>clientcurrentjobs',
        method: "POST",
        data:obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

          $scope.currents = response.data.result;

          $scope.total = response.data.pcount;

           if($scope.page == 1)
           $scope.pagination1($scope.total);
        });
      }

      $scope.pagination1 = function ($event)
      {
         if($scope.total > 10)
         {
            $('#pagination').pagination({
              items: $event,
              itemsOnPage: 10,
              cssStyle: 'light-theme',
              onPageClick:  function (e) {
                $scope.page  = e;
                $scope.getcurrentjobs();
              }
            });
          }
      }

      $scope.getendedjobs = function (id)
      {
       var obj = { userId:id, page : $scope.page }
        $http({
          url: '<?php echo base_url(); ?>clientendedContract',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
            $scope.ended = response.data.result;
            $scope.total1 = response.data.pcount;

            if($scope.page == 1)
            $scope.pagination2($scope.total1);
          });
        }

        $scope.pagination2 = function ($event)
        {
          $('#endedpagination').pagination({
            items: $event,
            itemsOnPage: 10,
            cssStyle: 'light-theme',
            onPageClick:  function (e) {
              $scope.page  = e;
              $scope.getendedjobs();
            }
          });
        }

        $scope.submitproposal = function()
        {
          $scope.submitpro = true;
          var error = false;
          $scope.bid = angular.element('#bid').val();
          $scope.proposal = CKEDITOR.instances['proposal'].getData();
          if($scope.time == '' || $scope.bid == '' || $scope.proposal == ''  )
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
                       if($scope.milestones[res]['task'][t]['task'] == '' || $scope.milestones[res]['task'][t]['amount'] == '' || $scope.milestones[res]['task'][t]['hours'] == '' || $scope.milestones[res]['task'][t]['hourlyPrice'] == '')
                       {
                         error = true;
                        }
                      }
                 }
              }

              if($scope.hourlyprice == '' || $scope.hourlyprice == 0)
              {
                error = true;
              }
        }


         if(error == true)
          {
           return false;
          }

          var m = JSON.stringify({ jobId : $scope.job.jobId,proposalBid :$scope.bid ,proposalDuration : $scope.time ,proposalDescription :$scope.proposal,proposalAttachment:$scope.attachment,milestones:$scope.milestones});
        //  console.log(m);
          angular.element(".preloader").show();
           $http({
           url: '<?php echo base_url(); ?>proposalSubmit',
           method: "POST",
           data: m,
           headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {

             angular.element(".preloader").hide();

             if(response.data.message == "true")
              {
                angular.element("#myModal").modal('hide');
                 $scope.getproposal($scope.job.jobId);
                $.notify("Proposal Submitted Successfully", "success");

              }
               });
        }



      $scope.uploadAttachment = function ($event) {

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
      	url: '<?php echo base_url(); ?>proposalAttachment',
      	method: "POST",
      	data: d,
      	headers: {
      		'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      	}
      }).then(function(response) {
      		  $scope.attachment = response.data;

      		});

      });
       fileReader.readAsDataURL(f);
       }

       }

       $scope.getproposal = function (id)
       {
        var obj = { jobId:id }
         $http({
           url: '<?php echo base_url(); ?>proposalCheck',
           method: "POST",
           data:obj,
           headers: {
             'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
           }
         }).then(function(response) {
           if(response.data.message == "true")
           {
             $scope.proposalCount = response.data.result;
           }
             });
         }

         $scope.getopenjobs = function (id)
         {
          var obj = { userId:id }
           $http({
             url: '<?php echo base_url(); ?>getClientOpenJob',
             method: "POST",
             data:obj,
             headers: {
               'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {
               $scope.openprojects = response.data.result;

             });
           }

           $scope.gethirerate = function (id)
           {
            var obj = { userId:id }
             $http({
               url: '<?php echo base_url(); ?>clientHireRate',
               method: "POST",
               data:obj,
               headers: {
                 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
               }
             }).then(function(response) {
                if(response.data.message == "true")
                {
                 $scope.hiredRate = response.data.result;
                }

               });
             }



    $scope.getjobdetail();

});
<?php } ?>
//job detail

//find jobs
var app9 = angular.module('myApp9', [])


app9.filter('trustAsHtml',['$sce', function($sce) {

	return function(text) {

		return $sce.trustAsHtml(text);
       };
}]);

app9.filter('replace', [function () {

    return function (input, from, to) {

      if(input === undefined) {
        return;
      }
     var regex = new RegExp(from, 'g');
      return input.replace(regex, to);
     };
}]);

app9.filter('underscoreless', function () {
  return function (input) {
	   	return input.split(' ').join('-');
      //return input.replace('', '-');
  };
});



  app9.filter('date', function () {
    return function (item) {
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear() +' '+ dates.getHours() + ':' + dates.getMinutes();
      return newDate;
    };
  });


var month_name = function(dt){
mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
  return mlist[dt.getMonth()];
};

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

app9.filter('date1', function () {
  return function (item) {
    var month = month_name(new Date(item));
    var dates = new Date(Date.parse(item))
     var newDate = '' +(month) + ' , ' + dates.getFullYear();
    return newDate;
    //console.log(newDate);
  };
});



app9.controller('myCtrt9', function($scope,$window,$http,$timeout) {

$scope.job =[];
$scope.page = 1;
$scope.total = 0;
$scope.shownojob = 0;


      $scope.getalljobs = function (id)
      {
       var obj = {  page : $scope.page }
        $http({
          url: '<?php echo base_url(); ?>getfindWorks',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
            $scope.job = response.data.result;
            $scope.total = response.data.pcount;
            $scope.shownojob = 1;


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
                  $scope.getalljobs();
                    }
                    });
                  }
                }




    $scope.getalljobs();

});

/// search jobs

<?php if(isset($servicesId)) { ?>
var app10 = angular.module('myApp10', [])


app10.filter('trustAsHtml',['$sce', function($sce) {

	return function(text) {

		return $sce.trustAsHtml(text);
       };
}]);

app10.filter('replace', [function () {

    return function (input, from, to) {

      if(input === undefined) {
        return;
      }
     var regex = new RegExp(from, 'g');
      return input.replace(regex, to);
     };
}]);

app10.filter('underscoreless', function () {
  return function (input) {
	   	return input.split(' ').join('-');
      //return input.replace('', '-');
  };
});



  app10.filter('date', function () {
    return function (item) {
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear() +' '+ dates.getHours() + ':' + dates.getMinutes();
      return newDate;
    };
  });


var month_name = function(dt){
mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
  return mlist[dt.getMonth()];
};

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

app10.filter('date1', function () {
  return function (item) {
    var month = month_name(new Date(item));
    var dates = new Date(Date.parse(item))
     var newDate = '' +(month) + ' , ' + dates.getFullYear();
    return newDate;
    //console.log(newDate);
  };
});



app10.controller('myCtrt10', function($scope,$window,$http,$timeout) {

$scope.job =[];
$scope.page = 1;
$scope.total = 0;


      $scope.getalljobs = function ()
      {
       var obj = {  page : $scope.page,id:<?php if(isset($servicesId)){ echo $servicesId; } ?> }
        $http({
          url: '<?php echo base_url(); ?>getskillbyJobs',
          method: "POST",
          data:obj,
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          }
        }).then(function(response) {
            $scope.job = response.data.result;
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
                  $scope.getalljobs();
                    }
                    });
                  }
                }




    $scope.getalljobs();

});
<?php } ?>

/// search jobs

// find jobs

// contact form
var app11 = angular.module('myApp11', [])


app11.filter('trustAsHtml',['$sce', function($sce) {

	return function(text) {

		return $sce.trustAsHtml(text);
       };
}]);

app11.filter('underscoreless', function () {
  return function (input) {
	   	return input.split(' ').join('-');
      //return input.replace('', '-');
  };
});



  app11.filter('date', function () {
    return function (item) {
      var dates = new Date(Date.parse(item))
      var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear() +' '+ dates.getHours() + ':' + dates.getMinutes();
      return newDate;
    };
  });


var month_name = function(dt){
mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
  return mlist[dt.getMonth()];
};

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

app11.filter('date1', function () {
  return function (item) {
    var month = month_name(new Date(item));
    var dates = new Date(Date.parse(item))
     var newDate = '' +(month) + ' , ' + dates.getFullYear();
    return newDate;
    //console.log(newDate);
  };
});



app11.controller('myCtrt11', function($scope,$window,$http,$timeout) {

 $scope.name ='';
 $scope.email ='';
 $scope.skype ='';
 $scope.mobile ='';
 $scope.subject ='';
 $scope.message ='';
 $scope.code ='';

        $scope.submitcontact = function()
        {
          $scope.csubmit = true;
          var error = false;
          var pclass = $('#phone').attr('class');
          var code = $('.iti__selected-flag').attr('title');
          var code1 = code.split(":");
          $scope.code = code1[1];




          if($scope.name == '' || $scope.email == '' || $scope.skype == '' || $scope.mobile == '' || $scope.subject == '' || $scope.message =='' || $scope.code =='' )
          {
            error = true;
          }


        if(pclass == "form-control ng-valid ng-not-empty ng-dirty ng-valid-parse error11 ng-touched")
        {
          error = true;
        }

        if(error == true)
          {
           return false;
          }



          var m = JSON.stringify({ name : $scope.name,email :$scope.email ,skype : $scope.skype ,phone :$scope.mobile,subject:$scope.subject,message:$scope.message,code:$scope.code});
        //  console.log(m);
          angular.element(".preloader").show();
           $http({
           url: '<?php echo base_url(); ?>contactsave',
           method: "POST",
           data: m,
           headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {

             angular.element(".preloader").hide();

             if(response.data.message == "true")
              {
              $.notify("Contact form submit successfully", "success");
              $('#valid-msg').hide();
                $scope.name ='';
                $scope.email ='';
                $scope.skype ='';
                $scope.mobile ='';
                $scope.subject ='';
                $scope.message ='';
                $scope.csubmit = false;

              }
               });
        }





});
//contact form

/// conference

// contact form
var app12 = angular.module('myApp12', [])



app12.filter('underscoreless', function () {
  return function (input) {
	   	return input.split(' ').join('-');
      //return input.replace('', '-');
  };
});

app12.directive('mydatepicker', function () {
 return {
   restrict: 'A',
   require: 'ngModel',
   link: function (scope, element, attrs, ngModelCtrl) {
     element.datepicker({
       dateFormat: 'd-m-yy',
        minDate: 0,
        onSelect: function (date) {
         scope.date = date;
         scope.$apply();
       }
     });
   }
 };
});

app12.directive('mydatepicker1', function () {
 return {
   restrict: 'A',
   require: 'ngModel',
   link: function (scope, element, attrs, ngModelCtrl) {
     element.datepicker({
       dateFormat: 'd-m-yy',
        minDate:1,
        onSelect: function (date) {
         scope.date = date;
         scope.$apply();
       }
     });
   }
 };
});

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



app12.controller('myCtrt12', function($scope,$window,$http,$timeout) {

 $scope.title ='';
 $scope.startdate ='';
 $scope.enddate ='';
 $scope.url ='';
 $scope.location ='';
 $scope.organizers ='';
 $scope.person ='';
 $scope.phone ='';
 $scope.website ='';
 $scope.about ='';

 var editor = CKEDITOR.instances["about"] ;
     editor.on( 'contentDom', function() {
         var editable = editor.editable();

         editable.attachListener( editor.document, 'keydown', function() {
           $scope.about = CKEDITOR.instances['about'].getData();
           $scope.$apply();
         } );
     });

        $scope.submitconference = function()
        {
          $scope.csubmit = true;
          var error = false;
          $scope.startdate =angular.element("#startdate").val();
          $scope.enddate =angular.element("#enddate").val();
          $scope.about =  CKEDITOR.instances['about'].getData();

       if($scope.title == '' || $scope.startdate == '' || $scope.enddate == '' || $scope.url == '' || $scope.location == '' || $scope.organizers =='' || $scope.person =='' || $scope.phone =='' || $scope.website =='' || $scope.about ==''  )
       {
            error = true;
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

      if(!$scope.url.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/))
     {

      error = true;
     $scope.urlvalide = true;
     }
     else
     {
       $scope.urlvalide = false;
     }
     if($scope.phone < 10)
     {
       error = true;
     }

        if(error == true)
          {
           return false;
          }

          var m = JSON.stringify({ title : $scope.title,startDate :$scope.startdate ,endDate : $scope.enddate ,url :$scope.url,location:$scope.location,organizers:$scope.organizers,contactPerson:$scope.person,phone:$scope.phone,website:$scope.website,about:$scope.about,status:0});
          angular.element(".preloader").show();
           $http({
           url: '<?php echo base_url(); ?>conferencesave',
           method: "POST",
           data: m,
           headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
             }
           }).then(function(response) {

             angular.element(".preloader").hide();

             if(response.data.message == "true")
              {
              $.notify("Conference form submit successfully", "success");
              $scope.title ='';
              $scope.startdate ='';
              $scope.enddate ='';
              $scope.url ='';
              $scope.location ='';
              $scope.organizers ='';
              $scope.person ='';
              $scope.phone ='';
              $scope.website ='';
              $scope.about ='';
              CKEDITOR.instances['about'].setData('');
              $scope.csubmit = false;

              }
               });
        }





});

/// conference

// blog add


var app13 = angular.module('myApp13', [])

app13.filter('trustAsHtml',['$sce', function($sce) {

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

 $scope.allcategory =[];
 $scope.blog =[];
 $scope.tags =[];
 $scope.title ='';
 $scope.author ='';
 $scope.description ='';
 $scope.image ='';
 $scope.category ='';
 $scope.key ='';
 $scope.tagname ='';

 $http({
 	 url: '<?php echo base_url(); ?>admin/allcategory',
 	 method: "POST",
 	 headers: {
 		 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
 	 }
  }).then(function(response) {

 	 $scope.allcategory = response.data.result;

  		});




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

 var editor = CKEDITOR.instances["description"] ;
     editor.on( 'contentDom', function() {
         var editable = editor.editable();

         editable.attachListener( editor.document, 'keydown', function() {
           $scope.description = CKEDITOR.instances['description'].getData();
           $scope.$apply();
         } );
     });

 $scope.submitblog = function()
 {
	 $scope.submitc = true;
	error = false;
	$scope.description = CKEDITOR.instances['description'].getData();
	//console.log($scope.description);

	if($scope.description == '' || $scope.image == '' || $scope.title == ''  || $scope.category == '' || $scope.tags.length == 0 )
	{
		error = true;
	}

	if(error == true)
	{
		return false;
	}

	var obj = { description : $scope.description,categoryId:$scope.category,status : $scope.status ,title:$scope.title,image:$scope.image ,tags:$scope.tags  }

	 $http({
			 url: '<?php echo base_url(); ?>blogSave',
			 method: "POST",
			 data:obj,
			 headers: {
				 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			 }
		 }).then(function(response) {

				if(response.data.message == 'true')
			{
			 $.notify("Blog Added Successfully ", "success");
       $scope.submitc = false;
			 $scope.title ='';
			 $scope.status ='';
			 $scope.description ='';
			 $scope.author ='';
			 $scope.url ='';
       $scope.tags = [];
       $scope.category ='';

				CKEDITOR.instances['description'].setData('');
				$scope.submitc = false;
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


});

  // login
  var app14 = angular.module('myApp14', [])

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


   app14.filter('capitalize', function() {
       return function(input) {
         return (!!input) ? input.charAt(0).toUpperCase() + input.substr(1).toLowerCase() : '';
       }
   });

app14.controller('myCtrt14', function($scope,$window,$http,$interval) {
   $scope.email ='';
   $scope.password ='';
   $scope.remail ='';
   $scope.rpassword ='';
   $scope.rcpass ='';
   $scope.name ='';
   $scope.cname ='';
   $scope.type ='';
   $scope.packageId ='';
   $scope.types =[];
   $scope.url = '';
   $scope.userId = '';
   $scope.username = '';
   $scope.cname = '';
   $scope.emailalready = false;
   $scope.loginemailalready = false;

    var socket = io('https://top-seo-sockets.herokuapp.com');
  //  var socket = io('http://localhost:5000');

   socket.on('creategroupSupport', function(data)
   {

    socket.emit('addmember', { GroupId:data._id,'MemberName':$scope.username,UserId:$scope.userId});
    socket.emit('addmember', { GroupId:data._id,'MemberName':'Support chat',UserId:0});
  // $scope.$apply();
   });

   socket.on('addmember', function(data)
   {

   });

   $scope.submitgroup = function(id)
   {
     if($scope.type == 2)
     {
       socket.emit('creategroupSupport', { Name:"Support Chat",UserId:id,UserName:$scope.username,CName:$scope.cname,Type:1});
     }
     else
     {
       socket.emit('creategroupSupport', { Name:"Support Chat",UserId:id,UserName:$scope.username,CName:$scope.name,Type:1});

     }
   }

   $http({
   url: '<?php echo base_url(); ?>gettype',
   headers: {
    'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response) {

     if(response.data.message == "true")
     {
      $scope.types = response.data.result;
     }
       });

   $scope.ctrl = function($event)
   {
     var email = $event.value;
     // if(!email.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)\S+/))
     var regex = /^\S+@\S+\.\S+$/;
     if(regex.test(email) === false)
     {
       $scope.emailvalide = true;
      }
      else
      {
        $scope.emailvalide = false;
        var m = JSON.stringify({ email : email  });
         $http({
         url: '<?php echo base_url(); ?>checkmail',
         method: "POST",
         data: m,
         headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
           }
         }).then(function(response) {

           angular.element(".preloader").hide();

           if(response.data.success == "false")
            {
              $scope.emailalready = true;
            }
            else if(response.data.success == "true")
            {
              $scope.emailalready = false;
            }

             });
      }
      $scope.$apply();
    }

   $scope.loginctrl = function($event)
   {
     var email = $event.value;
     var regex = /^\S+@\S+\.\S+$/;
     if(regex.test(email) === false)
     {
       $scope.loginemailvalide = true;
      }
      else
      {
        $scope.loginemailvalide = false;
      }
      $scope.$apply();
    }

 $scope.register = function()
   {
     $scope.registerSubmit = true;
     $scope.emailvalide = false;
    var error = false;
     $scope.remail = angular.element("#email").val();
     $scope.rpassword = angular.element("#password").val();
     $scope.rcpass = angular.element("#cpass").val();
     $scope.name = angular.element("#name").val();
     $scope.cname = angular.element("#cname").val();
     $scope.url = angular.element("#url").val();
     $scope.type =  angular.element("#type").val();
     $scope.packageId = angular.element("#packageId").val();
     //console.log($scope.packageId);

     // if(!$scope.remail.match(/([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{1,6}(?:\.[a-z]{1})?)\S+/))
     var regex = /^\S+@\S+\.\S+$/;
     if(regex.test($scope.remail) === false)
      {
        error = true;
        $scope.emailvalide = true;
      }
      else
      {
        $scope.emailvalide = false;
      }


     if($scope.remail == '' || $scope.rpassword == ''   || $scope.type == '' || $scope.rcpass =='')
     {
       error = true;
     }
     if($scope.type == 2)
     {
       if($scope.cname == '' || $scope.url == '')
       {
         error = true;
       }
     }

     if($scope.type == 3 || $scope.type == 4)
     {
       if($scope.url == '' || $scope.name == '')
       {
         error = true;
       }
     }

     if($scope.rpassword != $scope.rcpass)
     {
       return false;
     }

     if($scope.rpassword.length < 6)
     {
       return false;
     }

     if(error == true)
     {
      return false;
     }

     var m = JSON.stringify({ email : $scope.remail ,password : $scope.rpassword,name: $scope.name,c_name:$scope.cname,url:$scope.url,type:$scope.type,packageId:$scope.packageId });

     angular.element(".preloader").show();
      $http({
      url: '<?php echo base_url(); ?>register-user',
      method: "POST",
      data: m,
      headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        angular.element(".preloader").hide();

        if(response.data.success == "1")
         {
           $scope.userId = response.data.userId;
           $scope.username = response.data.name;
           $scope.submitgroup(response.data.userId);
           $.notify("Successfully saved! Please perform further steps to complete registration", "success");
           angular.element("#email").val('');
           angular.element("#password").val('');
           angular.element("#name").val('');
           angular.element("#cpass").val('');
           angular.element("#cname").val('');
           angular.element("#url").val('');
           $interval(callAtInterval, 3000);

             function callAtInterval()
             {
               if(response.data.packageId)
               {
               $window.location.href = '<?php echo base_url(); ?>freelancer/membership-payment/'+response.data.userId+'/'+response.data.packageId;
               }
              else
              {
                $window.location.href = '<?php echo base_url(); ?>plan/'+response.data.userId;

              }
           }


         }
        else if(response.data.success == "2")
        {
          $.notify("Email is Already Registered .", "error");
        }
        else if(response.data.success == "0")
        {
          $.notify("User is not registered", "error");
        }

          });



   }

 $scope.login = function()
   {
     $scope.loginSubmit = true;
     var error = false;

     if($scope.email == '' || $scope.password == '')
     {
       error = true;
     }

     var regex = /^\S+@\S+\.\S+$/;
     if(regex.test($scope.email) === false)
     {
       $scope.loginemailvalide = true;
       error = true;
      }
      else
      {
        $scope.loginemailvalide = false;
      }

     if(error == true)
     {
      return false;
     }

     var m = JSON.stringify({ email : $scope.email ,password : $scope.password });
     angular.element(".preloader").show();
      $http({
      url: '<?php echo base_url(); ?>loginUser',
      method: "POST",
      data: m,
      headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {

        angular.element(".preloader").hide();
       $('.notifyjs-corner').empty();
        if(response.data.success == "true")
         {
           $.notify(response.data.message, "success");
           angular.element("#email").val('');
           angular.element("#password").val('');
           $interval(callAtInterval, 2000);
           //
           function callAtInterval()
           {
           $window.location.href = '<?php echo base_url(); ?>'+response.data.redirect;
           //console.log('<?php echo base_url(); ?>'+response.data.redirect);
            }

         }
        else if(response.data.error == "true")
        {
          $.notify(response.data.message, "error");
        }
         });

       }
});
  // login

  // country job
  <?php if(isset($country)) { ?>
  var app15 = angular.module('myApp15', [])


  app15.filter('trustAsHtml',['$sce', function($sce) {

    return function(text) {

      return $sce.trustAsHtml(text);
         };
  }]);

  app15.filter('replace', [function () {

      return function (input, from, to) {

        if(input === undefined) {
          return;
        }
       var regex = new RegExp(from, 'g');
        return input.replace(regex, to);
       };
  }]);

  app15.filter('underscoreless', function () {
    return function (input) {
        return input.split(' ').join('-');
        //return input.replace('', '-');
    };
  });



    app15.filter('date', function () {
      return function (item) {
        var dates = new Date(Date.parse(item))
        var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear() +' '+ dates.getHours() + ':' + dates.getMinutes();
        return newDate;
      };
    });


  var month_name = function(dt){
  mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
    return mlist[dt.getMonth()];
  };

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

  app15.filter('date1', function () {
    return function (item) {
      var month = month_name(new Date(item));
      var dates = new Date(Date.parse(item))
       var newDate = '' +(month) + ' , ' + dates.getFullYear();
      return newDate;
      //console.log(newDate);
    };
  });



  app15.controller('myCtrt15', function($scope,$window,$http,$timeout) {

  $scope.job =[];
  $scope.page = 1;
  $scope.total = 0;


        $scope.getalljobs = function ()
        {
         var obj = {  page : $scope.page,country:'<?php if(isset($country)){ echo $country; } ?>' }
          $http({
            url: '<?php echo base_url(); ?>getJobCountryWise',
            method: "POST",
            data:obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
              $scope.job = response.data.result;
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
                    $scope.getalljobs();
                      }
                      });
                    }
                  }




      $scope.getalljobs();

  });
  <?php } ?>
  // country job
  // gig buy
  <?php if(!empty($gigId))
      {
        ?>
  var app16 = angular.module('myApp16', [])


  app16.filter('trustAsHtml',['$sce', function($sce) {

    return function(text) {

      return $sce.trustAsHtml(text);
         };
  }]);

  app16.filter('replace', [function () {

      return function (input, from, to) {

        if(input === undefined) {
          return;
        }
       var regex = new RegExp(from, 'g');
        return input.replace(regex, to);
       };
  }]);

  app16.filter('underscoreless', function () {
    return function (input) {
        return input.split(' ').join('-');
        //return input.replace('', '-');
    };
  });



    app16.filter('date', function () {
      return function (item) {
        var dates = new Date(Date.parse(item))
        var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear() +' '+ dates.getHours() + ':' + dates.getMinutes();
        return newDate;
      };
    });


  var month_name = function(dt){
  mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
    return mlist[dt.getMonth()];
  };

  app16.directive('numbersOnly', function() {
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

  app16.filter('date1', function () {
    return function (item) {
      var month = month_name(new Date(item));
      var dates = new Date(Date.parse(item))
       var newDate = '' +(month) + ' , ' + dates.getFullYear();
      return newDate;
      //console.log(newDate);
    };
  });



  app16.controller('myCtrt16', function($scope,$window,$http,$timeout) {

  $scope.result =[];
  $scope.plan =[];
  $scope.additional =[];
  $scope.selectedplan = '';
  $scope.gigalreadybuy =0;
  $scope.selectedplanName ='';
  $scope.disabled = 0;
  $scope.selectedplanKey = 0;


        $scope.getgigdetail = function ()
        {
         var obj = {  gigId : '<?php echo $gigId; ?>' }
          $http({
            url: '<?php echo base_url(); ?>getusergigdetail',
            method: "POST",
            data:obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
              if(response.data.message == "true")
              {
              $scope.result = response.data.result;
              $scope.plan = response.data.plan;
              $scope.selectedplan = $scope.plan[0].user_gig_planId;
              $scope.selectedplanKey = 0;


              }

            });
          }

          $scope.changeplan= function (id)
          {
            $scope.selectedplan = $scope.plan[id].user_gig_planId;
            $scope.selectedplanName = $scope.plan[id].name;
            $scope.selectedplanKey = id;
          }

          $scope.confirm = function()
          {
            angular.element('#confirm').modal('show');
          }

          $scope.buyplan = function ()
          {
            $scope.disabled = 1;
            var plan = $scope.plan[$scope.selectedplanKey];

            var obj = {  gigId : '<?php echo $gigId; ?>',plan:plan,userId:$scope.result.userId }
             $http({
               url: '<?php echo base_url(); ?>buygig',
               method: "POST",
               data:obj,
               headers: {
                 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
               }
             }).then(function(response) {
                 if(response.data.message == "true")
                 {
                    $scope.checkgig();
                    angular.element('#confirm').modal('hide');
                    $.notify("Plan Purchased successfully", "success");
                 }

               });
          }

          $scope.checkgig = function ()
          {
           var obj = {  gigId : '<?php echo $gigId; ?>', }
            $http({
              url: '<?php echo base_url(); ?>checkgigbuy',
              method: "POST",
              data:obj,
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
              }
            }).then(function(response) {
                if(response.data.message == "true")
                {
                $scope.gigalreadybuy = 1;

                }

              });
            }


          $scope.getgigdetail();
          $scope.checkgig();


  });
<?php } ?>
  // gig buy


  //find jobs
  var app17 = angular.module('myApp17', [])


  app17.filter('trustAsHtml',['$sce', function($sce) {

  	return function(text) {

  		return $sce.trustAsHtml(text);
         };
  }]);

  app17.filter('replace', [function () {
      return function (input)
      {
           var text = input.replace(/[|&;$%@"<>()+,]/g, "");
           var text1 = input.replace('/'," ");
           var text2 = text1.toLowerCase();
           return text2.split(' ').join('-');
       };
  }]);

  app17.filter('underscoreless', function () {
    return function (input) {
  	   	return input.split(' ').join('-');
        //return input.replace('', '-');
    };
  });



    app17.filter('date', function () {
      return function (item) {
        var dates = new Date(Date.parse(item))
        var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear() +' '+ dates.getHours() + ':' + dates.getMinutes();
        return newDate;
      };
    });


  var month_name = function(dt){
  mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
    return mlist[dt.getMonth()];
  };

  app17.directive('numbersOnly', function() {
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

  app17.filter('date1', function () {
    return function (item) {
      var month = month_name(new Date(item));
      var dates = new Date(Date.parse(item))
       var newDate = '' +(month) + ' , ' + dates.getFullYear();
      return newDate;
      //console.log(newDate);
    };
  });



  app17.controller('myCtrt17', function($scope,$window,$http,$timeout) {

  $scope.gig =[];
  $scope.page = 1;
  $scope.total = 0;
  $scope.shownojob = 0;
  $scope.allservices = [];
  $scope.allindustry = [];
  $scope.allcountry = [];
  $scope.allduration = [];
  $scope.services = '';
  $scope.industry = '';
  $scope.country = '';
  $scope.duration = '';


  $scope.getservices = function()
  {
  $http({
    url: '<?php echo base_url(); ?>getgigServices',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response){
     if(response.data.message == "true")
     {
      $scope.allservices = response.data.result;
    }
  });
  }

  $scope.getduration = function()
  {
  $http({
    url: '<?php echo base_url(); ?>getgigDuration',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response){
     if(response.data.message == "true")
     {
      $scope.allduration = response.data.result;
    }
  });
  }

  $scope.getindustry = function()
  {
  $http({
    url: '<?php echo base_url(); ?>getgigIndustry',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response){
     if(response.data.message == "true")
     {
      $scope.allindustry = response.data.result;
    }
  });
  }

  $scope.getcountry = function()
  {
  $http({
    url: '<?php echo base_url(); ?>getgigCountry',
    method: "POST",
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    }
  }).then(function(response){
     if(response.data.message == "true")
     {
      $scope.allcountry = response.data.result;
    }
  });
  }

  $scope.selectservices = function($event)
  {
    $scope.services = $event.value;
    $scope.get();
  }

  $scope.selectindustry = function($event)
  {
    $scope.industry = $event.value;
    $scope.get();
  }

  $scope.selectcountry = function($event)
  {
    $scope.country = $event.value;
    $scope.get();
  }
  $scope.selectduration = function($event)
  {
    $scope.duration = $event.value;
    $scope.get();
  }

        $scope.get = function ()
        {
         var obj = {  page : $scope.page,services:$scope.services,industry:$scope.industry,country:$scope.country,duration:$scope.duration }
          $http({
            url: '<?php echo base_url(); ?>getgig',
            method: "POST",
            data:obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
              $scope.gig = response.data.result;
              $scope.total = response.data.pcount;
              $scope.shownojob = 1;


              if($scope.page == 1)

             $scope.pagination($scope.total);

            });
          }


               $scope.pagination = function ($event)
                {
                  if($scope.total > 9)
                  {

                    $('#pagination').pagination({
                    items: $event,
                    itemsOnPage: 9,
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




      $scope.get();
      $scope.getcountry();
      $scope.getindustry();
      $scope.getservices();
      $scope.getduration();

  });

  /// search gigs

   //plan
   //find jobs
   <?php if(!empty($userId))
    {
     ?>
   var app18 = angular.module('myApp18', [])


   app18.filter('trustAsHtml',['$sce', function($sce) {

    return function(text) {

      return $sce.trustAsHtml(text);
          };
   }]);

   app18.controller('myCtrt18', function($scope,$window,$http,$timeout,$interval) {
     $scope.employee = '';
     $scope.project = '';
     $scope.invoice = '';
     $scope.expense = '';
     $scope.package = '';
     $scope.casestudies = '';
     $scope.portfolio = '';
     $scope.jobpost = '';
     $scope.testimonial = '';
     $scope.employeemin = '';
     $scope.projectmin = '';
     $scope.invoicemin = '';
     $scope.expensemin = '';
     $scope.packagemin = '';
     $scope.portfoliomin = '';
     $scope.testimonialmin = '';
     $scope.casestudiesmin = '';
     $scope.jobpostmin = '';

     $scope.total = 0;
     $scope.employeeprice = '';
     $scope.projectprice = '';
     $scope.invoiceprice = '';
     $scope.expenseprice = '';
     $scope.packageprice = '';
     $scope.portfoliprice = '';
     $scope.testimonialprice = '';
     $scope.casestudiesprice = '';
     $scope.jobpostprice = '';

     $scope.employeemax = '';
     $scope.projectmax = '';
     $scope.invoicemax = '';
     $scope.expensemax = '';
     $scope.packagemax = '';
     $scope.portfolimax = '';
     $scope.testimonialmax = '';
     $scope.casestudiesmax = '';
     $scope.servicesmin = '';
     $scope.servicesmax = '';
     $scope.servicesprice = '';
     $scope.industrymin = '';
     $scope.industrymax = '';
     $scope.industryprice = '';
     $scope.gigmin = '';
     $scope.gigmax = '';
     $scope.gigprice = '';
     $scope.jobpostmax = '';


     $scope.employeetotal = 0;
     $scope.projecttotal = 0;
     $scope.expensetotal = 0;
     $scope.invoicetotal = 0;
     $scope.packagetotal = 0;
     $scope.portfoliototal = 0;
     $scope.testimonialtotal = 0;
     $scope.casestudiestotal = 0;
     $scope.servicestotal = 0;
     $scope.industrytotal = 0;
     $scope.gigtotal = 0;
     $scope.jobposttotal = 0;
     $scope.projecttotal = 0;


     $scope.expensepaid = 0;
     $scope.employeepaid = 0;
     $scope.projectpaid = 0;
     $scope.invoicepaid = 0;

     $scope.packagepaid = 0;
     $scope.portfoliopaid = 0;
     $scope.testimonialpaid = 0;
     $scope.casestudiespaid = 0;
     $scope.servicespaid = 0;
     $scope.industrypaid = 0;
     $scope.gigpaid = 0;
     $scope.jobpostpaid = 0;
     $scope.totalamount = 0;

     $scope.type = '';



  $scope.confirm = function()
  {
    angular.element('#confirm').modal('show');
    $scope.$apply();
  }

   $scope.click = function ()
  {
    angular.element(".preloader").show();

   var obj = {  userId : '<?php echo $userId; ?>',employee:$scope.employee,project:$scope.project,expense:$scope.expense,invoice:$scope.invoice,package:$scope.package,testimonial:$scope.testimonial,portfolio:$scope.portfolio,casestudies:$scope.casestudies,services:$scope.services,industry:$scope.industry,gig:$scope.gig,totalamount:$scope.total }
   $http({
     url: '<?php echo base_url(); ?>registerproceed',
     method: "POST",
     data:obj,
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response)
   {
     angular.element(".preloader").hide();

     if(response.data.success == "true")
     {
      $("#confirm").modal('hide');
      $interval(callAtInterval, 3000);

        function callAtInterval()
        {
          $window.location.href = '<?php echo base_url(); ?>';
        }

     $.notify("Your Account Is Inactive. Kindly check your Email and activate your account.", "success");
     }
     else
     {
       $.notify("Email Is not Send.", "error");
     }
     });
   }

   $scope.freeplanclick = function ()
  {
    angular.element(".preloader").show();

   var obj = {  userId : '<?php echo $userId; ?>',employee:$scope.employeemin,project:$scope.projectmin,expense:$scope.expensemin,invoice:$scope.invoicemin,package:$scope.package,testimonial:$scope.testimonial,portfolio:$scope.portfolio,casestudies:$scope.casestudies,services:$scope.services,industry:$scope.industry,gig:$scope.gig,totalamount:'0' }
   $http({
     url: '<?php echo base_url(); ?>registerproceed',
     method: "POST",
     data:obj,
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
   }).then(function(response)
   {
     angular.element(".preloader").hide();

     if(response.data.success == "true")
     {
      $("#confirm").modal('hide');
      $.notify("Your Account Is Inactive. Kindly check your Email and activate your account.", "success");

     $interval(callAtInterval, 2500);

       function callAtInterval()
       {
         $window.location.href = '<?php echo base_url(); ?>';
       }
     }
     else
     {
       $.notify("Email Is not Send.", "error");
     }


     });
   }

   $scope.getuserProfile = function()
   {
     var obj = { userId:'<?php echo $userId; ?>' };
     $http({
     url: '<?php echo base_url(); ?>getprofile',
     data:obj,
     method: "POST",
     headers: {
       'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
     }
     }).then(function(response) {
      if(response.data.message == 'true')
      {
        $scope.type = response.data.result.type;
        $scope.get();

      }
    });
    }

   $scope.get = function ()
   {
     if($scope.type == 4)
     {
      var url ='<?php echo base_url(); ?>admin/getclientcustom-package';
     }
     else
     {
       var url ='<?php echo base_url(); ?>admin/getcompanycustom-package';
     }
   $http({
   url: url,
   method: "POST",
   headers: {
     'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
   }
   }).then(function(response) {
    if(response.data.success == 'true')
    {
     $scope.plan = response.data.result;
     $scope.employeemin = response.data.result.employeeMin;
     $scope.employee = response.data.result.employeeMin;
     $scope.employeemax = response.data.result.employeeMax;
     $scope.employeeprice = response.data.result.employeePrice;
     $scope.projectmin =response.data.result.projectMin;
     $scope.project =response.data.result.projectMin;
     $scope.projectmax =response.data.result.projectMax;
     $scope.projectprice =response.data.result.projectPrice;
     $scope.expensemin =response.data.result.expenseMin;
     $scope.expense =response.data.result.expenseMin;
     $scope.expensemax =response.data.result.expenseMax;
     $scope.expenseprice =response.data.result.expensePrice;
     $scope.invoicemin =response.data.result.invoiceMin;
     $scope.invoice =response.data.result.invoiceMin;
     $scope.invoicemax =response.data.result.invoiceMax;
     $scope.invoiceprice =response.data.result.invoicePrice;
     $scope.packagemin =response.data.result.packageMin;
     $scope.package =response.data.result.packageMin;
     $scope.packagemax =response.data.result.packageMin;
     $scope.packageprice =response.data.result.packagePrice;
     $scope.testimonialmin = response.data.result.testimonialMin;
     $scope.testimonial = response.data.result.testimonialMin;
     $scope.testimonialmax = response.data.result.testimonialMax;
     $scope.testimonialprice = response.data.result.testimonialPrice;
     $scope.portfoliomin = response.data.result.portfolioMin;
     $scope.portfolio = response.data.result.portfolioMin;
     $scope.portfoliomax = response.data.result.portfolioMax;
     $scope.portfolioprice = response.data.result.portfolioPrice;
     $scope.casestudiesmin = response.data.result.casestudiesMin;
     $scope.casestudies = response.data.result.casestudiesMin;
     $scope.casestudiesmax = response.data.result.casestudiesMax;
     $scope.casestudiesprice = response.data.result.casestudiesPrice;
     $scope.servicesmin = response.data.result.casestudiesMin;
     $scope.casestudies = response.data.result.casestudiesMin;
     $scope.casestudiesmax = response.data.result.casestudiesMax;
     $scope.casestudiesprice = response.data.result.casestudiesPrice;
     $scope.servicesmin = response.data.result.servicesMin;
     $scope.services = response.data.result.servicesMin;
     $scope.servicesmax = response.data.result.servicesMax;
     $scope.servicesprice = response.data.result.servicesPrice;
     $scope.industrymin = response.data.result.industryMin;
     $scope.industry = response.data.result.industryMin;
     $scope.industrymax = response.data.result.industryMax;
     $scope.industryprice = response.data.result.industryPrice;
     $scope.gig = response.data.result.gigMin;
     $scope.gigmin = response.data.result.gigMin;
     $scope.gigmax = response.data.result.gigMax;
     $scope.gigprice = response.data.result.gigPrice;
     $scope.jobpost = response.data.result.jobpostMin;
     $scope.jobpostmax = response.data.result.jobpostMax;
     $scope.jobpostprice = response.data.result.jobpostPrice;
     $scope.jobpostmin = response.data.result.jobpostMin;


     angular.element('.selectedemployee').val($scope.employee);
     angular.element('.selectedproject').val($scope.project);
     angular.element('.selectedinvoice').val($scope.invoice);
     angular.element('.selectedexpense').val($scope.expense);
     angular.element('.selectedpackage').val($scope.package);
     angular.element('.selectedtestimonial').val($scope.testimonial);
     angular.element('.selectedportfolio').val($scope.portfolio);
     angular.element('.selectedcasestudies').val($scope.casestudies);
     angular.element('.selectedindustry').val($scope.industry);
     angular.element('.selectedgig').val($scope.gig);
     angular.element('.selectedservices').val($scope.services);
     angular.element('.selectedjobpost').val($scope.jobpost);




    }
      });
   }

   $scope.changeemp = function ($event)
   {
      $scope.employee = $event.value;
      if(parseInt($scope.employee) > parseInt($scope.employeemin))
      {
      $scope.employeepaid = parseInt($scope.employee) - parseInt($scope.employeemin);
      $scope.employeetotal = parseFloat($scope.employeepaid) * parseFloat($scope.employeeprice);
      }
      else
      {
        $scope.employeetotal = 0;
        $scope.employeepaid = 0;
      }
      $scope.total = $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;;

      angular.element('.selectedemployee').val($scope.employee);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

   $scope.changepro = function ($event)
   {
      $scope.project = $event.value;
      if(parseInt($scope.project) > parseInt($scope.projectmin))
      {
      $scope.projectpaid = parseInt($scope.project) - parseInt($scope.projectmin);
      $scope.projecttotal = parseFloat($scope.projectpaid) * parseFloat($scope.projectprice);
      }
      else
      {
        $scope.projecttotal = 0;
        $scope.projectpaid = 0;
      }
      $scope.total = $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;;
      angular.element('.selectedproject').val($scope.project);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

   $scope.changeinv = function ($event)
   {
       $scope.invoice = $event.value;
       if(parseInt($scope.invoice) > parseInt($scope.invoicemin))
       {
        $scope.invoicepaid = parseInt($scope.invoice) - parseInt($scope.invoicemin);
       $scope.invoicetotal = parseFloat($scope.invoicepaid ) * parseFloat($scope.invoiceprice);
       }
       else
       {
         $scope.invoicetotal =0;
         $scope.invoicepaid =0;
       }
      $scope.total = $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;;
       angular.element('.selectedinvoice').val($scope.invoice);
       angular.element('.selectedamount').val($scope.total);
       $scope.$apply();
   }

   $scope.changeex = function ($event)
   {
      $scope.expense = $event.value;
      if(parseInt($scope.expense) > parseInt($scope.expensemin))
      {
      $scope.expensepaid = parseInt($scope.expense) - parseInt($scope.expensemin);
      $scope.expensetotal = parseFloat($scope.expensepaid) * parseFloat($scope.expenseprice);
      }
      else
      {
        $scope.expensetotal = 0;
        $scope.expensepaid = 0;
      }
      $scope.total = $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal +  $scope.gigtotal + $scope.jobposttotal;;
      angular.element('.selectedexpense').val($scope.expense);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

   $scope.changepac = function ($event)
   {
      $scope.package = $event.value;
      if(parseInt($scope.package) > parseInt($scope.packagemin))
      {
      $scope.packagepaid = parseInt($scope.package) - parseInt($scope.packagemin);
      $scope.packagetotal = parseFloat($scope.packagepaid) * parseFloat($scope.packageprice);
      }
      else
      {
        $scope.packagetotal = 0;
        $scope.packagepaid = 0;
      }
      $scope.total = $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;;
      angular.element('.selectedpackage').val($scope.package);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

   $scope.changecasestud = function ($event)
   {
      $scope.casestudies = $event.value;
      if(parseInt($scope.casestudies) > parseInt($scope.casestudiesmin))
      {
      $scope.casestudiespaid = parseInt($scope.casestudies) - parseInt($scope.casestudiesmin);
      $scope.casestudiestotal = parseFloat($scope.casestudiespaid) * parseFloat($scope.casestudiesprice);
      }
      else
      {
        $scope.casestudiestotal = 0;
        $scope.casestudiespaid = 0;
      }
      $scope.total =  $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;;
      angular.element('.selectedcasestudies').val($scope.casestudies);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

   $scope.changetestimonial = function ($event)
   {
      $scope.testimonial = $event.value;
      if(parseInt($scope.testimonial) > parseInt($scope.testimonialmin))
      {
      $scope.testimonialpaid = parseInt($scope.testimonial) - parseInt($scope.testimonialmin);
      $scope.testimonialtotal = parseFloat($scope.testimonialpaid) * parseFloat($scope.testimonialprice);
      }
      else
      {
        $scope.testimonialtotal = 0;
        $scope.testimonialpaid = 0;
      }
      $scope.total = $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;;
      angular.element('.selectedtestimonial').val($scope.testimonial);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

   $scope.changeportfolio = function ($event)
   {
      $scope.portfolio = $event.value;
      if(parseInt($scope.portfolio) > parseInt($scope.portfoliomin))
      {
      $scope.portfoliopaid = parseInt($scope.portfolio) - parseInt($scope.portfoliomin);
      $scope.portfoliototal = parseFloat($scope.portfoliopaid) * parseFloat($scope.portfolioprice);
      }
      else
      {
        $scope.portfoliototal = 0;
        $scope.portfoliopaid = 0;
      }
      $scope.total = $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;;
      angular.element('.selectedportfolio').val($scope.portfolio);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

   $scope.changeindustry = function ($event)
   {
      $scope.industry = $event.value;
      if(parseInt($scope.industry) > parseInt($scope.industrymin))
      {
      $scope.industrypaid = parseInt($scope.industry) - parseInt($scope.industrymin);
      $scope.industrytotal = parseFloat($scope.industrypaid) * parseFloat($scope.industryprice);
      }
      else
      {
        $scope.industrytotal = 0;
        $scope.industrypaid = 0;
      }
      $scope.total  = $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;;
      angular.element('.selectedindustry').val($scope.industry);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

   $scope.changeservices = function ($event)
   {
      $scope.services = $event.value;
      if(parseInt($scope.services) > parseInt($scope.servicesmin))
      {
      $scope.servicespaid = parseInt($scope.services) - parseInt($scope.servicesmin);
      $scope.servicestotal = parseFloat($scope.servicespaid) * parseFloat($scope.servicesprice);
      }
      else
      {
        $scope.servicestotal = 0;
        $scope.servicespaid = 0;
      }
      $scope.total =  $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;;
      angular.element('.selectedservices').val($scope.services);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

   $scope.changegig = function ($event)
   {
      $scope.gig = $event.value;
      if(parseInt($scope.gig) > parseInt($scope.gigmin))
      {
      $scope.gigpaid = parseInt($scope.gig) - parseInt($scope.gigmin);
      $scope.gigtotal = parseFloat($scope.gigpaid) * parseFloat($scope.gigprice);
      }
      else
      {
        $scope.gigtotal = 0;
        $scope.gigpaid = 0;
      }
      $scope.total =  $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;;
      angular.element('.selectedgig').val($scope.gig);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

   $scope.changejobpost = function ($event)
   {
      $scope.jobpost = $event.value;
      if(parseInt($scope.jobpost) > parseInt($scope.jobpostmin))
      {
      $scope.jobpostpaid = parseInt($scope.jobpost) - parseInt($scope.jobpostmin);
      $scope.jobposttotal = parseFloat($scope.jobpostpaid) * parseFloat($scope.jobpostprice);
      }
      else
      {
        $scope.jobposttotal = 0;
        $scope.jobpostpaid = 0;
      }
      $scope.total =  $scope.employeetotal + $scope.projecttotal + $scope.expensetotal + $scope.invoicetotal + $scope.packagetotal + $scope.testimonialtotal + $scope.portfoliototal + $scope.casestudiestotal + $scope.servicestotal + $scope.industrytotal + $scope.gigtotal + $scope.jobposttotal;
      angular.element('.selectedgig').val($scope.gig);
      angular.element('.selectedamount').val($scope.total);
      $scope.$apply();
   }

    //$scope.get();
    $scope.getuserProfile();

   });
   //plan
   <?php }


     ?>



    /// jobopening list
   var app20 = angular.module('myApp20', [])


   app20.filter('trustAsHtml',['$sce', function($sce) {

    return function(text) {

      return $sce.trustAsHtml(text);
          };
   }]);

   app20.filter('replace', [function () {
       return function (input)
       {
            //return input.replace(/[|&;$%@"<>()+,]/g, "");
          var a = input.replace(/[^\w\s]/gi, "");
          return a.split(' ').join('-');

        };
   }]);

   app20.filter('underscoreless', function () {
     return function (input) {
        return input.split(' ').join('-');
         //return input.replace('', '-');
     };
   });



     app20.filter('date', function () {
       return function (item) {
         var dates = new Date(Date.parse(item))
         var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear() +' '+ dates.getHours() + ':' + dates.getMinutes();
         return newDate;
       };
     });


   var month_name = function(dt){
   mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
     return mlist[dt.getMonth()];
   };

   app20.directive('numbersOnly', function() {
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

   app20.directive('mydatepicker', function () {
   return {
       restrict: 'A',
       require: 'ngModel',
        link: function (scope, element, attrs, ngModelCtrl) {
           element.datepicker({
               dateFormat: 'd-m-yy',
               maxDate: 0,
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


   app20.filter('date1', function () {
     return function (item) {
       var month = month_name(new Date(item));
       var dates = new Date(Date.parse(item))
        var newDate = '' +(month) + ' , ' + dates.getFullYear();
       return newDate;
       //console.log(newDate);
     };
   });



   app20.controller('myCtrt20', function($scope,$window,$http,$timeout) {

   $scope.jobopenings = [];
   $scope.page = 1;
   $scope.total = 0;
   $scope.positionSearch ='';
   $scope.skillSearch ='';
   $scope.industrySearch ='';
   $scope.experienceSearch ='';
   $scope.vacanciesSearch ='';
   $scope.locationSearch ='';
   $scope.companySearch ='';
   $scope.allcompany = [];

   $scope.getcompany = function ()
   {
     $http({
       url: '<?php echo base_url(); ?>getcareersCompany',
       method: "POST",
       headers: {
         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
       }
     }).then(function(response) {
       if(response.data.success == "true")
       {
         $scope.allcompany  = response.data.result;
       }
     });
   }


    $scope.get = function()
    {
      var obj = { page:$scope.page,position:$scope.positionSearch,skill:$scope.skillSearch,experience:$scope.experienceSearch,vacancies:$scope.vacanciesSearch,location:$scope.locationSearch,company:$scope.companySearch,industry: $scope.industrySearch };
      $http({
        url: '<?php echo base_url(); ?>getcareers',
        method: "POST",
        data: obj,
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        }
      }).then(function(response) {
        angular.element(".preloader").hide();
        if(response.data.message == "true")
        {
          $scope.jobopenings  = response.data.result;
          $scope.total = response.data.pcount;
        }
        else
        {
          $scope.jobopenings  = []
          $scope.total = 0;
        }
        if($scope.page == 1)
        $scope.pagination($scope.total);
      });
    }

      $scope.pagination = function ($event)
      {

        if($scope.total > 12)
        {
         $('#jobopeningpagination').pagination({
         items: $event,
         itemsOnPage: 12,
         cssStyle: 'light-theme',
         onPageClick:  function (e) {
         $scope.page  = e;
         $scope.get();
         }
         });
       }
       else
       {
         $('#jobopeningpagination').html('');
        }
      }

      $scope.search = function()
      {
        $scope.get();
      }

    $scope.get();
    $scope.getcompany();

   });

   /// jobopening list

   // job opening detail
<?php
    if(!empty($result->vacancyId))
   {
     ?>
      var app19 = angular.module('myApp19', [])


      app19.filter('trustAsHtml',['$sce', function($sce) {

       return function(text) {

         return $sce.trustAsHtml(text);
             };
      }]);

      app19.filter('replace', [function () {
          return function (input)
          {
               return  input.replace(/[|&;$%@"<>()+,]/g, "");
           };
      }]);

      app19.filter('underscoreless', function () {
        return function (input) {
           return input.split(' ').join('-');
            //return input.replace('', '-');
        };
      });



        app19.filter('date', function () {
          return function (item) {
            var dates = new Date(Date.parse(item))
            var newDate = '' + dates.getDate() + '-' + (dates.getMonth() + 1) + '-' + dates.getFullYear() +' '+ dates.getHours() + ':' + dates.getMinutes();
            return newDate;
          };
        });


      var month_name = function(dt){
      mlist = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
        return mlist[dt.getMonth()];
      };

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

      app19.directive('mydatepicker', function () {
        var maxBirthdayDate = new Date();
   maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 18 );
      return {
          restrict: 'A',
          require: 'ngModel',
           link: function (scope, element, attrs, ngModelCtrl) {
              element.datepicker({
                  dateFormat: 'd-m-yy',
                  defaultDate: '-18yr',
                  changeMonth: true,
                  changeYear: true,
                  yearRange: "1980:"+new Date().getFullYear(),
                  maxDate: maxBirthdayDate,
                  onSelect: function (date) {
                      scope.date = date;
                      scope.birth = date;

                      scope.$apply();
                  }
              });
          }
        };
      });


      app19.filter('date1', function () {
        return function (item) {
          var month = month_name(new Date(item));
          var dates = new Date(Date.parse(item))
           var newDate = '' +(month) + ' , ' + dates.getFullYear();
          return newDate;
          //console.log(newDate);
        };
      });



      app19.controller('myCtrt19', function($scope,$window,$http,$timeout) {

      $scope.allcurrency = [];
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
      $scope.noticeperiod ='';
      $scope.age ='';
      $scope.teamprofiledata = [];
      $scope.loginuserParentId ='';
      $scope.parent ='';
      $scope.alreadyApplied = 0;




      $scope.phoneerror = false;
      $scope.cverror = false;
      $scope.emailvalide = false;

      $scope.loginctrl = function($event)
     {
       var email = $event.value;
       var regex = /^\S+@\S+\.\S+$/;
       if(regex.test(email) === false)
       {
         $scope.emailvalide = true;
        }
        else
        {
          $scope.emailvalide = false;
        }
        $scope.$apply();
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

       $scope.checkapplied = function(userId)
       {
         var obj = { vacancyId:'<?php echo $result->vacancyId; ?>',userId:userId };
         $http({
           url: '<?php echo base_url(); ?>checkVacancyApplied',
           method: "POST",
           data: obj,
           headers: {
             'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
           }
         }).then(function(response) {
           if(response.data.success == "true")
           {
             $scope.alreadyApplied = 1;

           }
           else
           {
             $scope.alreadyApplied = 0;
             //console.log($scope.alreadyApplied);
           }


         });
       }

       $scope.saverecruitment = function()
       {
         $scope.submitl = true;
         var error = false;
         $scope.birth = angular.element('#birth').val();
         if($scope.name == '' || $scope.email == '' || $scope.phone == '' || $scope.gender == '' || $scope.experience == '' || $scope.current == '' || $scope.expected =='' || $scope.birth == ''  || $scope.currency == '' || $scope.cv == '' || $scope.skill == '' || $scope.noticeperiod == '')
         {
           error = true;
         }

         if($scope.phone.length < 10 || $scope.phone.length > 12)
           {
             error = true;
             return false;
             $scope.phoneerror = true;
           }
           else
           {
               $scope.phoneerror = false;
           }

           var regex = /^\S+@\S+\.\S+$/;
           if(regex.test($scope.email) === false)
           {
             return false;
             $scope.emailvalide = true;
            }
            else
           {
              $scope.emailvalide = false;
           }

         if(error == true)
         {
           return false;
         }
         var obj = { vacancyId:'<?php echo $result->vacancyId; ?>',userId:'<?php echo $result->userId; ?>',candidateName :$scope.name,candidateEmail :$scope.email,candidatePhone :$scope.phone,candidateDateOfBirth  :$scope.birth,candidateGender  :$scope.gender,candidateExperience :$scope.experience,candidateCurrentSalary :$scope.current,candidateExpectedSalary :$scope.expected,candidateSkill:$scope.skill,candidateNoticePeriod:$scope.period,currencyId:$scope.currency,candidateCv:$scope.cv,candidateSkill:$scope.skill,candidateNoticePeriod:$scope.noticeperiod,candidateStatus:2 };
         angular.element('.preloader').show();
         $http({
           url: '<?php echo base_url(); ?>jobapply',
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
             $scope.currency ='';
             $scope.noticeperiod='';
             $scope.submitl = false;
           $.notify("Job Applied Successfully", "success");
           }
           if(response.data.message == "expired")
           {
             $.notify("Sorry, This job has been closed", "error");
           }
           if(response.data.message  == "already")
           {
             $.notify("You have already applied this job", "error");
           }

         });
       }


   $scope.cvupload = function ($event) {
         var files = $event.files;
         $scope.cv ='';
         var type = files[0].type.split("/");
       if ($.inArray(type[1], ['vnd.openxmlformats-officedocument.wordprocessingml.document','msword','pdf']) == -1)
       {
        $scope.cverror = true;
       }
       else
       {
         $scope.cverror = false;

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
        $scope.$apply();

       }

       $scope.teamProfile = function()
       {
         var obj = { userId :'' }
          $http({
            url: '<?php echo base_url(); ?>getTeamOne',
            method: "POST",
            data:obj,
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            }
          }).then(function(response) {
              if(response.data.message =="true")
              {
                 $scope.teamprofiledata = response.data.result;
                 $scope.checkapplied($scope.teamprofiledata.u_id);
                 $scope.parent = $scope.teamprofiledata.parent;
                 $scope.loginuserParentId =$scope.teamprofiledata.parent;

                 if($scope.teamprofiledata.parent != 0)
                 {
                 $scope.name = $scope.teamprofiledata.name;
                 $scope.email = $scope.teamprofiledata.email;
                 $scope.phone = $scope.teamprofiledata.rep_ph_num;
                 $scope.experience = $scope.teamprofiledata.experience;
                 $scope.current = $scope.teamprofiledata.salary;
                 $scope.birth = $scope.teamprofiledata.dateofbirth;
                 $scope.cv ='';
                 $scope.currency =$scope.teamprofiledata.currencyId;

                 }
               }
            });
       }


     //  $scope.checkapplied();

       $scope.teamProfile();


      });

<?php } ?>
   // job opening detail
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#testimonial-carousel').carousel({
            pause: true,
            interval: 4000,
        });
    });

</script>
</body>

</html>
