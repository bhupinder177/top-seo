<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css"/ >
<title>Authorize.net Payment Gateway Integration using PHP</title>
</head>
<style>
body {
    font-family: Arial;
    width: 550px;
}

#frmPayment {
    max-width: 300px;
    padding: 25px;
    border: #D0D0D0 1px solid;
    border-radius: 4px;
}

.test-data {
    margin-top: 40px;
}

.tutorial-table {
    border: #D0D0D0 1px solid;
    font-size: 0.8em;
    color: #4e4e4e;
}

.tutorial-table th {
    background: #efefef;
    padding: 12px;
    border-bottom: #e0e0e0 1px solid;
    text-align: left;
}

.tutorial-table td {
    padding: 12px;
    border-bottom: #D0D0D0 1px solid;
}

#frmPayment .field-row {
    margin-bottom: 20px;
}

#frmPayment div label {
    margin: 5px 0px 0px 5px;
    color: #49615d;
    width: auto;
}

.demoInputBox {
    padding: 10px;
    border: #d0d0d0 1px solid;
    border-radius: 4px;
    background-color: #FFF;
    width: 100%;
    margin-top: 5px;
    box-sizing:border-box;
}

.demoSelectBox {
    padding: 10px;
    border: #d0d0d0 1px solid;
    border-radius: 4px;
    background-color: #FFF;
    margin-top: 5px;
}

select.demoSelectBox {
    height: 35px;
    margin-right: 10px;
}

.info {
    font-size: .8em;
    color: #FF6600;
    letter-spacing: 2px;
    padding-left: 5px;
}

.btnAction {
   	background-color: #ff7000;
    padding: 10px 40px;
    color: #FFF;
    border: #ef6901 1px solid;
    border-radius: 4px;
    cursor: pointer;
}

.column-right {
    margin-right: 6px;
}

.contact-row {
    display: inline-block;
}

.cvv-input {
    width: 60px;
}

#error-message {
    margin: 0px 0px 10px 0px;
    padding: 5px 25px;
    border-radius: 4px;
    line-height: 25px;
    font-size: 0.9em;
    color: #ca3e3e;
    border: #ca3e3e 1px solid;
    display: none;
    width: 300px;
}

#response-message {
    margin: 0px 0px 10px 0px;
    padding: 5px 25px;
    border-radius: 4px;
    line-height: 25px;
    font-size: 0.9em;
    width: 300px;
}

.success {
    color: #3da55d;
    border: #43b567 1px solid;
}

.error {
    color: #ca3e3e;
    border: #ca3e3e 1px solid;
}

.display-none {
    display:none;
}

#loader {
    display: none;
}

#loader img {
    width: 45px;
    vertical-align: middle;
}
</style>
<body>
    <?php if(!empty($message)) { ?>
    <div id="response-message" class="<?php echo $reponseType; ?>"><?php echo $message; ?></div>
    <?php  } ?>
    <div id="error-message"></div> 
  <form id="frmPayment" action="<?php echo base_url(); ?>client-authorize-payment" method="post" onSubmit="return cardValidation();">
                <div class="field-row form-group">
                    <label>Card Number</label> <span
                        id="card-number-info" class="info"></span><br> <input
                        type="text" id="card-number" name="card-number"
                        class="demoInputBox form-control">
                </div>
                <div class="field-row form-group">
                    <div class="contact-row column-right">
                        <label>Expiry Month / Year</label> <span
                            id="userEmail-info" class="info"></span><br>
                        <select name="month" id="month"
                            class="demoSelectBox form-control">
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select> <select name="year" id="year"
                            class="demoSelectBox form-control">
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                            <option value="2029">2029</option>
                            <option value="2030">2030</option>
                        </select>
                    </div>
                </div>
                <div>
                    <input type="submit" name="pay_now" value="Submit"
                        id="submit-btn" class="btn bg-orange btnAction"> 
                    <div id="loader">
                        <img alt="loader" src="LoaderIcon.gif">
                    </div>
                </div>
                <input type='hidden' name='amount' value='1'>
            </form>
    <div class="test-data">
        <h3>Test Card Information</h3>
        <p>Use these test card numbers with valid expiration month
            / year for testing.</p>
        <table class="tutorial-table" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <th>CARD NUMBER</th>
                <th>BRAND</th>
            </tr>
            <tr>
                <td>4111111111111111</td>
                <td>Visa</td>
            </tr>

            <tr>
                <td>5424000000000015</td>
                <td>Mastercard</td>
            </tr>

            <tr>
                <td>370000000000002</td>
                <td>American Express</td>
            </tr>

            <tr>
                <td>6011000000000012</td>
                <td>Discover</td>
            </tr>

            <tr>
                <td>38000000000006</td>
                <td>Diners Club/ Carte Blanche</td>
            </tr>

            <tr>
                <td>3088000000000017</td>
                <td>JCB</td>
            </tr>

        </table>
    </div>
    <script src="vendor/jquery/jquery-3.2.1.min.js"
        type="text/javascript"></script>
    <script>
function cardValidation () {
    var valid = true;
    var cardNumber = $('#card-number').val();
    var month = $('#month').val();
    var year = $('#year').val();

    $("#error-message").html("").hide();

    if (cardNumber.trim() == "") {
    	   valid = false;
    }

    if (month.trim() == "") {
    	    valid = false;
    }
    if (year.trim() == "") {
        valid = false;
    }

    if(valid == false) {
        $("#error-message").html("All Fields are required").show();
    }

    return valid;
}
</script>
</body>
</html>
