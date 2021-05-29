var base_url = $(".base_url").val();
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

$(document).ready(function(){

	// setTimeout(function() {
	//  $('.alert').hide('fast');
 // }, 2000);



jQuery.validator.addMethod("noSpace", function(value, element) {
		return value.indexOf(" ") < 0 && value != "";
	}, "Space are not allowed");
	var base_url = $(".base_url").val();

	//// client login validation start

	$("#clientlogin").validate({
		rules:
		{
			email:
			{
				required: true,
				email: true
			},
			pass:
			{
				required: true,
			},
		},
		messages:
		{
			email: {
				email: "Please enter a valid email address",
				required: "Please enter an email address",
			},
			pass: {
				required: "Please Enter Password",
			},

		},

		submitHandler: function(form)
		{
			form.submit();
		}
	});

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

$('body').on('keyup', '.required', function() {
 $(this).removeClass('border');
});

$('body').on('change', '.required', function() {
 $(this).removeClass('border');
});
//////remove style end




////////client profile validation

$("#clientProfile").validate({
	rules:
	{
		name:
		{
			required: true,
		},
		image:
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
		// skype:
		// {
		// 	required: true,
		// },
		// facebookLink:
		// {
		// 	required: true,
		// 	url: true
		// },
		// linkedlnLink:
		// {
		// 	required: true,
		// 	url: true
		// },
	},
	messages:
	{
		name:
		{
			required: "Please enter name",
		},
		image:
		{
			required: "Please select image",
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
		// skype:
		// {
		// 	required: "Please enter skype",
		// },
		// facebookLink:
		// {
		// 	url: "Please enter a valid link",
		// 	required: "Please enter facebook link",
		// },
		// linkedlnLink:
		// {
		// 	url: "Please enter a valid link",
		// 	required: "Please enter linkedIn link",
		// },

	},

	submitHandler: function(form)
	{
		form.submit();
	}
});

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

	$(".country").change(function(){

	    var id = $(this).val();

	    //alert(id);
	    $.ajax({
	      url:base_url+'getstate',
	      dataType: 'json',
	      type: 'POST',
	      data : {
	        id : id
	      },
	      success:
	      function(data){
	        if(data.message == "true"){
	          var  list ='';

	          list +='<option value="">Select State</option>';
	          //console.log(data.result);
	          $.each(data.result,function(key, value){
	            //  console.log(data.result[key].name);
	            var id = data.result[key].id;
	            var name = data.result[key].name;
	            list +='<option data-text='+name+' value='+id+'>'+name+'</option>';

                 console.log(list);
	          });
                  $(".state").html(list);
	        }

	      },
	    });

	  });

   ////////// get states

/////////////	 get city


	  $(".state").change(function(){

	    var id = $(this).val();
	    //alert(id);
	    $.ajax({
	      url:base_url+'getcity',
	      dataType: 'json',
	      type: 'POST',
	      data : {
	        id : id
	      },
	      success:
	      function(data){
	        if(data.message == "true"){
	          var  list ='';

	          list +='<option value="">Select City</option>';
	          //console.log(data.result);
	          $.each(data.result,function(key, value){
	            // console.log(data.result[key].name);
	            var id = data.result[key].id;
	            var name = data.result[key].name;
	            list +='<option data-text='+name+' value='+id+'>'+name+'</option>';

	           });
                   $(".city").html(list);
	        }

	      },
	    });

	  });
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



});
