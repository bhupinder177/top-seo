var base_url = $(".base_url").val();
var userId = $(".userId").val();
var socket = io('https://top-seo-sockets.herokuapp.com');
var senderId = $(".sessionId").val();

function online()
{
$.ajax({
 url :base_url+'onlinesave',
 type : 'post',
 success: function(response){
		 ///console.log(response);
	 }
	 });
 }
 setInterval('online()', 20000);



socket.on('messages', function(msg)
{
  var dates = new Date(Date.parse(msg.createdAt))
  var minutes = dates.getMinutes();
  if(minutes > 10)
  {
    var time = '' + dates.getHours() + ':' + dates.getMinutes();
  }
  else
  {
    var time = '' + dates.getHours() + ':'+'0'+dates.getMinutes();
  }

  var chatid = $('.chatId').val();
   var list = '';
   if(chatid == msg.MSG_SENTBY)
   {
  list += '<div class="row msg_container base_sent">';
   }
   else
   {
     list += '<div class="row msg_container base_receive">';
   }
  list +='<div class="col-md-12 col-xs-12">';
  if(chatid == msg.MSG_SENTBY)
  {
  list +='<div class="messages msg_sent">';
  }
  else
  {
    list +='<div class="messages msg_receive">';
  }
  list +='<p>'+msg.MSG_TEXT+'</p>';
  list +='<time datetime="2009-11-13T20:00">'+time+'</time>';
  list +='</div>';
  list +='</div>';
  list +='  </div>';

  $(".msgappend").append(list);
  $('.msgappend').scrollTop($('.msgappend')[0].scrollHeight);

});



function supportunread()
{
$.ajax({
 url :'https://top-seo-sockets.herokuapp.com/unread-msg?rec='+userId+'&&sender=0&&status=0',
 type : 'post',
 success: function(response){
	 if(response.messages > 0)
	  {
		 $(".support").html('Support chat ('+response.messages+')');
	  }
		else if(response.messages == 0)
		{
			$(".support").html('Support chat');

		}
	 }
	 });
 }

 setInterval('supportunread()', 20000);

$(document).ready(function(){

  setTimeout(function() {
	 $('.alert-success').hide('fast');
 }, 4000);


jQuery.validator.addMethod("noSpace", function(value, element) {
		return value.indexOf(" ") < 0 && value != "";
	}, "Space are not allowed");

	var base_url = $(".base_url").val();


	//// client login validation start



	// $("#clientlogin").validate({
	// 	rules:
	// 	{
	// 		email:
	// 		{
	// 			required: true,
	// 			email: true
	// 		},
	// 		pass:
	// 		{
	// 			required: true,
	// 		},
	// 	},
	// 	messages:
	// 	{
	// 		email: {
	// 			email: "Please enter a valid email address",
	// 			required: "Please enter an email address",
	// 		},
	// 		pass: {
	// 			required: "Please Enter Password",
	// 		},
  //
	// 	},
  //
	// 	submitHandler: function(form)
	// 	{
	// 		form.submit();
	// 	}
	// });

	///attchment upload start company logo

 	$("#profileImg").change(function(e){
	var files = e.target.files;
   var f = files[0]
   var fileName = files.name;
   var filePath = fileName;
   var type = $("#ctype").val();


  var fileReader = new FileReader();
  fileReader.onload = (function(e) {
    jQuery('#myImagelogo').attr('src',e.target.result);


	 $.ajax({
		url :base_url+'freelancer/logo',
		type : 'post',
		data : {
			image : e.target.result,type:type
		},
		success: function(response){
			///$(".attchmentname1").val(response);


		 }
			});

});
 fileReader.readAsDataURL(f);
 });
 /////attchment upload end

////remove style start

// $('body').on('keyup', '.required', function() {
//  $(this).removeClass('border');
// });
//
// $('body').on('change', '.required', function() {
//  $(this).removeClass('border');
// });
//////remove style end




////////client profile validation

// $("#clientProfile").validate({
// 	rules:
// 	{
// 		name:
// 		{
// 			required: true,
// 		},
// 		image:
// 		{
// 			required: true,
// 		},
// 		rep_ph_num:
// 		{
// 			required: true,
// 		},
// 		address1:
// 		{
// 			required: true,
// 		},
// 		address2:
// 		{
// 			required: true,
// 		},
// 		zip:
// 		{
// 			required: true,
// 		},
//     country:
// 		{
// 			required: true,
// 		},
// 		state:
// 		{
// 			required: true,
// 		},
// 		city:
// 		{
// 			required: true,
// 		},
// 		about:
// 		{
// 			required: true,
// 		},
// 		website:
// 		{
// 			required: true,
// 			url: true
// 		},
// 	},
// 	messages:
// 	{
// 		name:
// 		{
// 			required: "Please enter name",
// 		},
// 		image:
// 		{
// 			required: "Please select image",
// 		},
// 		rep_ph_num:
// 		{
// 			required: "Please enter phone number",
// 		},
// 		address1:
// 		{
// 			required: "Please enter address",
// 		},
// 		address2:
// 		{
// 			required: "Please enter address1",
// 		},
// 		zip:
// 		{
// 			required: "Please enter zip code",
// 		},
//
// 		country:
// 		{
//       required: "Please select country",
// 		},
// 		state:
// 		{
// 			required: "Please select state",
// 		},
// 		city:
// 		{
// 			required: "Please select city",
// 		},
// 		about:
// 		{
// 			required: "Please enter about",
// 		},
// 		website:
// 		{
// 			url: "Please enter a valid link",
// 			required: "Please enter website link",
// 		},
// 		// skype:
// 		// {
// 		// 	required: "Please enter skype",
// 		// },
// 		// facebookLink:
// 		// {
// 		// 	url: "Please enter a valid link",
// 		// 	required: "Please enter facebook link",
// 		// },
// 		// linkedlnLink:
// 		// {
// 		// 	url: "Please enter a valid link",
// 		// 	required: "Please enter linkedIn link",
// 		// },
//
// 	},
//
// 	submitHandler: function(form)
// 	{
// 		form.submit();
// 	}
// });

////update
$("#clientProfileup").validate({
	rules:
	{
		name:
		{
			required: true,
		},
		rep_ph_num:
		{
			required: true,
		},
		address1:
		{
			required: true,
		},
		address2:
		{
			required: true,
		},
		zip:
		{
			required: true,
		},
    country:
		{
			required: true,
		},
		state:
		{
			required: true,
		},
		city:
		{
			required: true,
		},
		about:
		{
			required: true,
		},
		website:
		{
			required: true,
			url: true
		},
		skype:
		{
			required: true,
		},
		facebookLink:
		{
			required: true,
			url: true
		},
		linkedlnLink:
		{
			required: true,
			url: true
		},
	},
	messages:
	{
		name:
		{
			required: "Please enter name",
		},
		rep_ph_num:
		{
			required: "Please enter phone number",
		},
		address1:
		{
			required: "Please enter address",
		},
		address2:
		{
			required: "Please enter address1",
		},
		zip:
		{
			required: "Please enter zip code",
		},

		country:
		{
      required: "Please select country",
		},
		state:
		{
			required: "Please select state",
		},
		city:
		{
			required: "Please select city",
		},
		about:
		{
			required: "Please enter about",
		},
		website:
		{
				url: "Please enter a valid link",
			required: "Please enter website link",
		},
		skype:
		{
			required: "Please enter skype",
		},
		facebookLink:
		{
			url: "Please enter a valid link",
			required: "Please enter facebook link",
		},
		linkedlnLink:
		{
			url: "Please enter a valid link",
			required: "Please enter linkedIn link",
		},

	},

	submitHandler: function(form)
	{
		form.submit();
	}
});
/////////////client profile validation

  ////////////////////get states

	// $(".country").change(function(){
  //
	//     var id = $(this).val();
  //
	//     //alert(id);
	//     $.ajax({
	//       url:base_url+'getstate',
	//       dataType: 'json',
	//       type: 'POST',
	//       data : {
	//         id : id
	//       },
	//       success:
	//       function(data){
	//         if(data.message == "true"){
	//           var  list ='';
  //
	//           list +='<option value="">Select State</option>';
	//           //console.log(data.result);
	//           $.each(data.result,function(key, value){
	//             //  console.log(data.result[key].name);
	//             var id = data.result[key].id;
	//             var name = data.result[key].name;
	//             list +='<option data-text='+name+' value='+id+'>'+name+'</option>';
  //
  //                //console.log(list);
	//           });
  //                 $(".state").html(list);
	//         }
  //
	//       },
	//     });
  //
	//   });

   ////////// get states

/////////////	 get city


	  // $(".state").change(function(){
    //
	  //   var id = $(this).val();
	  //   //alert(id);
	  //   $.ajax({
	  //     url:base_url+'getcity',
	  //     dataType: 'json',
	  //     type: 'POST',
	  //     data : {
	  //       id : id
	  //     },
	  //     success:
	  //     function(data){
	  //       if(data.message == "true"){
	  //         var  list ='';
    //
	  //         list +='<option value="">Select City</option>';
	  //         //console.log(data.result);
	  //         $.each(data.result,function(key, value){
	  //           // console.log(data.result[key].name);
	  //           var id = data.result[key].id;
	  //           var name = data.result[key].name;
	  //           list +='<option data-text='+name+' value='+id+'>'+name+'</option>';
    //
	  //          });
    //                $(".city").html(list);
	  //       }
    //
	  //     },
	  //   });
    //
	  // });
////////////// get city

// scroll down hire button
$(".want-hire-btn").on('click', function(event) {
   if (this.hash !== "") {
     event.preventDefault();
     var hash = this.hash;
     $('html, body').animate({
       scrollTop: $(hash).offset().top
     }, 800, function(){

       // Add hash (#) to URL when done scrolling (default click behavior)
       window.location.hash = hash;
     });
   } // End if
 });

// scroll down hire button

// chat box
$("#chat_window_1").hide();

 $(".chattoggle").click(function(){
    $("#chat_window_1").toggle();

 });

 // formsubmit
 $("#chatvalidate").validate({
   rules:
   {
     email:
     {
       required: true,
       email: true
     },
     phone:
     {
       required: true,
       minlength:10,
       maxlength:12,
       number: true
     },
     name:
     {
       required: true,
     },
     skype:
     {
       required: true,
     },
     website:
     {
       required: true,
       url:true,
     },
   },
   messages:
   {
     email: {
       email: "Please enter a valid email address",
       required: "Please enter an email address",
     },
     phone: {
       required:  "Please enter phone",
        minlength: "Your phone must be at least 10 characters long",
        maxlength: "Your phone must be less than 12 characters long",
        number: "Your phone must be number"
     },
     name: {
       required: "Please enter name",
     },
     skype: {
       required: "Please enter skype",
     },
     website: {
       required: "Please enter website",
     },

   },

   submitHandler: function(form)
   {
     if(grecaptcha.getResponse() != "")
     {
     formSubmit(form);
     }
   }
 });
 // formsubmit

// Send message
$(".sendmsg").click(function(){
var msg = $(".msg").val();
var name =$(".nameh").val();
var senderId = $(".chatId").val();
 var roomId = 'Room_'+senderId+'_0';
 if(msg != '')
 {
   socket.emit('message', { MSG_SENTBYNAME:name,MSG_SENTBYIMAGE:'',MSG_SENTBY: senderId,MSG_SENTTONAME:'Support chat',  MSG_SENTTO :'0',MSG_SENTTOIMAGE:'',MSG_TEXT : msg,MSG_ATTACHMENT:'',MSG_ROOMID :roomId,MSG_SENTTOIMAGE:'' ,MSG_DELETE : 0 ,MSG_EDIT: 0,MSG_STATUS:0,MSG_TYPE:2});
   //console.log('Message send');
   $(".msg").val('');
 }

});

$('.msg').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13')
    {
      var msg = $(".msg").val();
      var name =$(".nameh").val();
      var senderId = $(".chatId").val();
       var roomId = 'Room_'+senderId+'_0';
       if(msg != '')
       {
         socket.emit('message', { MSG_SENTBYNAME:name,MSG_SENTBYIMAGE:'',MSG_SENTBY: senderId,MSG_SENTTONAME:'Support chat',  MSG_SENTTO :'0',MSG_SENTTOIMAGE:'',MSG_TEXT : msg,MSG_ATTACHMENT:'',MSG_ROOMID :roomId,MSG_SENTTOIMAGE:'' ,MSG_DELETE : 0 ,MSG_EDIT: 0,MSG_STATUS:0,MSG_TYPE:1});
         //console.log('Message send');
         $(".msg").val('');
       }
    }
});
// Send message

// typing
var typingTimer;                //timer identifier
var TypingInterval = 500;  //time in ms, 5 second for example

//on keyup, start the countdown
$('#btn-input').keyup(function(){
  var senderId = $(".chatId").val();
  var roomId = 'Room_'+senderId+'_0';
  var name =$(".nameh").val();
  // console.log('start typing');
  socket.emit('groupstartTyping', { roomId:roomId,sendername:name });

    clearTimeout(typingTimer);
    if ($('#btn-input').val) {
        typingTimer = setTimeout(function(){
          // console.log('stop typing');
      socket.emit('groupstopTyping', { type:'stoptyping', roomId:roomId,sendername:name });
          }, TypingInterval);
    }
});

$(".notification").click(function(){
  var id = $(this).attr('data-id');
  $.ajax({
    dataType:'json',
    url :base_url + 'freelancer/notification/status',
    type :'post',
    data : {
      id:id,status:1
    },
    success: function(data){
      if(data.message =="true")
      {

     // $(".notify").addClass('show');
     $(".ncount").hide();
       }
    }
  });
});




});

function stoptyping(lastTypingTime)
{
var typingTimer = (new Date()).getTime();
var timeDiff    = typingTimer - lastTypingTime;
if (timeDiff   >= typingLENGTH && typing) {
  // console.log('stopeed typing');
  socket.emit('groupstopTyping', { type:'stoptyping', roomId:roomId,sendername:name });
  //$scope.t = 0;
  typing = false;
  }
}

function formSubmit(form)
{
var name = $(".name").val();
var phone = $(".phone").val();
var email = $(".email").val();
var skype = $(".skype").val();
var website = $(".website").val();
var min = 800000000;
var max = 40;
var chatId = Math.floor(Math.random()*(max-min+1)+min);

 localStorage.setItem("chatId",chatId);
 // var newMyObjectJSON = localStorage.getItem("chatId");
 $(".nameh").val(name);
 $(".phoneh").val(phone);
 $(".emailh").val(email);
 $(".skypeh").val(skype);
 $(".websiteh").val(website);
 $(".chatId").val(chatId);
 $(".chatpanel").show();
 $(".chatform").hide();
 //socket.emit('join-chat', { senderId: chatId,receiverId : 0 });


    // ajax
    $.ajax({
    url         : form.action,
    type        : form.method,
    data        : new FormData(form),
    contentType : false,
    cache       : false,
    headers     : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    processData : false,
    dataType    : "json",
    success: function (response) {
      // if (response.success)
      // {
      //
      //  }

      }
  });
    //ajax

}
