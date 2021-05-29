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

 function taskstop()
 {
 $.ajax({
  url :base_url+'freelancer/taskstopAutomatically',
  type : 'post',
  dataType: 'json',
  success: function(response)
  {
    var currenttitle = document.title;
    $('.currenttitle').val(currenttitle);
    if(response.success == "true")
    {
      $.notify("Task Stop Successfully","success");
      pageTitleNotification.off();
      var t = $('.currenttitle').val();
      document.title = t;
      location.reload(true);
    }
    else if(response.success =="false")
    {
      $.notify("Task Is Not Stop","error");
    }
     }
 	 });
  }

 function starttask()
 {
 $.ajax({
  url :base_url+'freelancer/taskcheck',
  type : 'post',
  dataType: 'json',
  success: function(response)
  {
    var currenttitle = document.title;
    $('.currenttitle').val(currenttitle);
    if(response.success == "true")
    {

        $('#inactivitypopup').modal('show');

    }
    else if(response.success =="false")
    {

      $('#inactivitypopup').modal('hide');

       taskstop();
    }
    if(response.error == "true")
    {

        $('#inactivitypopup').modal('hide');
        pageTitleNotification.off();
        var t = $('.currenttitle').val();
        document.title = t;

    }
    if(response.notification)
    {

       if(response.notification == "true")
       {
        pageTitleNotification.on("Inactivity Found", 1000);
       }
       else if(response.notification == "false")
       {
         pageTitleNotification.off();
         var t = $('.currenttitle').val();
         document.title = t;
       }
     }
 	  }
 	 });
  }

setInterval('starttask()', 10000);




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

	// setTimeout(function() {
	//  $('.alert').hide('fast');
 // }, 2000);
  // inactivity yes
  $('body').on('click','#inactivityYes',function(){

      $.ajax({
        dataType:'json',
        url :base_url + 'freelancer/taskActivityUpdate',
        type :'post',
        success: function(response)
        {
        if (response.message == "true")
        {
          $("#inactivitypopup").modal("hide");
          location.reload(true);
          pageTitleNotification.off();
          var t = $('.currenttitle').val();
          document.title = t;
        }
      }

      });


    });

 //inactivity yes



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

 $('body').on('click','.clicknotification',function(){
   var id = $(this).attr('data-id');
   var href = $(this).attr('data-href');
   $.ajax({
     dataType:'json',
     url :base_url + 'freelancer/notification_status',
     type :'post',
     data : {
       id:id,status:1
     },
     success: function(data){
       if(data.message =="true")
       {
          window.open(href, '_blank');
       }
     }
   });
 })

 // categories pagination
 $('body').on('click','.notificationpagination a',function(e){
    e.preventDefault();
    var pageno = $(this).attr('data-ci-pagination-page');

    if(!pageno)
    {
      pageno = 1;
    }
    $.ajax({
    dataType:'json',
      url :base_url + 'freelancer/getnotification/'+pageno,
      type :'post',
      data : {
        page:pageno
      },
      // beforeSend  : function () {
      //   $(".loader_panel").css('display','block');
      // },
      // complete: function () {
      //   $(".loader_panel").css('display','none');
      // },
      success: function(response){

      notificationrowmanage(response.result);

      }
    });
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

// jQuery('body').on('click', '.clicknotification', function () {
// var id = $(this).attr('data-id');
// alert(id);
// })


});

function stoptyping(lastTypingTime)
{
var typingTimer = (new Date()).getTime();
var timeDiff    = typingTimer - lastTypingTime;
if (timeDiff   >= typingLENGTH && typing) {
  console.log('stopeed typing');
  socket.emit('groupstopTyping', { type:'stoptyping', roomId:roomId,sendername:name });
  //$scope.t = 0;
  typing = false;
  }
}


function notificationrowmanage(data)
   {
     var base_url = $('.base_url').val();


    var rows = '';

    if(data.result.length != 0)
    {
    $.each( data.result, function( key, value )
    {
      var dates = new Date(Date.parse(value.notificationDate));
      var month = dates.getMonth() + 1;
      var day = dates.getDate();
      var year = dates.getFullYear();
       var date = ''+day+'-'+month+'-'+year;
    rows += '<tr>';
    rows += '<td>'+value.name+'</td>';
    rows += '<td>'+value.notificationMessage+'</td>';
    rows += '<td>'+date+'</td>';
    rows += '</tr>';

   });
 }
 else
 {
    rows += '<tr>';
    rows += '<td colspan="5">No Record Found</td>';
    rows += '</tr>';
 }
 $(".notificationdata").html(rows);
 $(".notificationpagination").html(data.links);

}


///////Jquery Start
jQuery(document).ready(function () {

var base_url = $('.base_url').val();

    //  // Access validation
    $("#incomeaccessUpdate").validate({
        errorClass: "has-error",
        highlight: function (element, errorClass) {
        jQuery(element).parents('.form-group').addClass(errorClass);
        },
        unhighlight: function (element, errorClass, validClass) {
        jQuery(element).parents('.form-group').removeClass(errorClass);
        },
        rules:
        {
        "access[]": {
        required: true,
        },
        },
        messages:
        {
        "access[]": {
        required: "Please select department",
        },
        },
        submitHandler: function (form)
        {
        formSubmit(form);
        }
    });
 // Access validation
   $(document).on('change','#incomeAcess2',function(e){

     $('#incomeAcess2-error').html('');
   });

});
///////Jquery Start



// Submit
function formSubmit(form)
{
$.ajax({
  url         : form.action,
  type        : form.method,
  data        : new FormData(form),
  enctype : 'multipart/form-data',
  contentType : false,
  cache       : false,
  headers     : {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  processData : false,
  dataType    : "json",
  beforeSend  : function () {
    $(".button-disabled").attr("disabled", "disabled");
    $(".preloader").css('display','block');
  },
  complete: function () {
    $(".preloader").css('display','none');
      $(".button-disabled").attr("disabled",false);
  },
  success: function (response) {

    if(response.url)
    {
      if(response.delayTime)
      setTimeout(function() { window.location.href=response.url;}, response.delayTime);
      else
      window.location.href=response.url;
    }

    if (response.success)
    {
      $.notify(response.success_message,"success");
     if (response.delay)
     {
        setTimeout(function (){ $(response.modelhide).modal('hide') },response.delay);
      }

    }
    else
    {
      if( response.formErrors)
      {
        $.notify(response.errors,"error");
      }
      else
      {
        $.notify(response.error_message,"error");
      }
    }
    if(response.ajaxPageCallBack)
    {
      response.formid = form.id;
      ajaxPageCallBack(response);
    }
    if(response.resetform)
      {
       $('.reset').resetForm();
       }
    if(response.url)
    {
      if(response.delayTime)
      setTimeout(function() { window.location.href=response.url;}, response.delayTime);
      else
      window.location.href=response.url;
    }
  },
  error:function(response)
  {
      $.notify("Server Error","success");
  }
});
}
// Submit
