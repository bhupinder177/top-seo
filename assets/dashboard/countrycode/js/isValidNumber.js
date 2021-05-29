var input = document.querySelector("#phone"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
var iti = window.intlTelInput(input, {
  utilsScript: "https://www.top-seos.com/assets/dashboard/countrycode/js/utils.js?<%= time %>"

});

var reset = function() {
  input.classList.remove("error11");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
};

// on blur: validate
input.addEventListener('blur', function() {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
      validMsg.classList.remove("hide");



    } else {
      input.classList.add("error11");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      errorMsg.classList.remove("hide");
     }
  }
});

$(document).on('click', '.iti__highlight .iti__active', function(){

var code =  $(this).attr('data-dial-code');
console.log(code);
});


// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);
