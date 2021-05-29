// Setup an event listener to make an API call once auth is complete
// $(document).ready(function(){
// var base_url = $(".base_url").val();
// })
function onLinkedInLoad()
{
	IN.UI.Authorize().place();
	IN.Event.on(IN, "auth", getProfileData);
}
// Handle the successful return from the API call
function onSuccess(data) {
 var base_url = $(".base_url").val();
	$.ajax({
		beforeSend: function(){$(".preloader").toggleClass('d-none')},
		url: base_url+'home/linkedln',
		data : {oauth_provider:'linkedIn', userData : JSON.stringify(data)},
		method : 'post',
		dataType: 'json',
		success : function(resp){
			setTimeout(function(){
        console.log(resp.result);
				$(".socialBtns").addClass('d-none');
				$("#makeReview").removeClass('d-none');
				$("#revId").val(resp.result);
				IN.User.logout();
				$(".preloader").toggleClass('d-none');
			},1000);
		}
	})
}
// Handle an error response from the API call
function onError(error) {
	alert(error);
}
// Use the API call wrapper to request the member's basic profile data
function getProfileData() {
	IN.API.Raw("/people/~:(id,first-name,last-name,email-address,public-profile-url)").result(onSuccess).error(onError);
}
