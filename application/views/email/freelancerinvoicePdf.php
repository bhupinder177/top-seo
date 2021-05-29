<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Invoice</title>

<style type="text/css">
@page { margin:30px 10px 10px 10px; }
body { margin: 0px; font-family: 'Open Sans', sans-serif;}
/* @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400'); */
footer{position:fixed;left: 0;right:0;bottom: 0;height: 100px;}

</style>
</head>

<body>
<header>
	<div id="page-wrap" style="max-width: 800px;margin: 0 auto;background: #f7f7f7;padding: 10px;">
		<p id="header1" style="height: 56px;width: 100%;text-align: center;color: white;font: bold 15px  Arial, Helvetica, sans-serif;text-decoration: uppercase;letter-spacing: 20px;padding: 8px 0px;">
			<?php if(!empty($user->company_logo))
			    {
						?>
			<img width="200" height="70" src="<?php echo base_url(); ?>assets/client_images/<?php echo $user->company_logo; ?>">
		<?php }
		    else
				{ ?>
			<img src="<?php echo base_url(); ?>assets/front/images/top-seo.png">
		<?php } ?>
		</p>
		<p id="header" style="height: auto;width: 100%;background: #55abdc;text-align: center;color: white;font: bold 15px Arial, Helvetica, sans-serif;text-decoration: uppercase; padding: 8px 0px;">INVOICE</p>

		<div id="identity">
            <table style="width: 100%">
                <tr>
									<th style="width: 50%;text-align:left; padding-bottom:10px;">
										<h3 style="margin-bottom:20px; line-height:30px; display:block;">Invoice From</h3>
									</th>
<th style="width: 50%;text-align:left; padding-bottom:10px;">
	<h3 style="margin-bottom:20px;line-height:30px;display:block;">Bill To </h3>
</th>
</tr>
                <tr>
                    <td style="width: 50%;" >
                        <p id="customer-title"><b>Name: </b> <?php echo $user->name; ?><br><b>Email: </b><?php echo $user->email; ?><br><b>Address: </b>	<?php echo $user->address1; ?><br><b>Phone: </b> <?php echo $user->countryCode.$user->rep_ph_num; ?></p>
                    </td>
                    <td style="width: 50%;">

            <p id="address" style="text-align:center;">
                <b>Name: </b><?php echo $result->name; ?><br>
         <b>Email: </b>	<?php echo $result->email; ?><br>
         <b>Address: </b>	<?php echo $result->address; ?><br>
         <b>Phone: </b> <?php echo $result->countryCode.$result->phone; ?></p>

                </td>
        </tr>
            </table>
		</div>

		<div style="clear:both"></div>

		<div id="customer" style="overflow: hidden;margin-top:15px;">

        <div style="text-align:right;">
            <table id="meta" style="border-collapse: collapse;width:100%;">
                <tr style="border: 1px solid #ddd;">
                    <th class="meta-head" style="text-align:left;background: #eee;color: #000;border: 1px solid #ddd;padding: 5px;">Invoice #</th>
                    <th class="meta-head" style="text-align:left;background: #eee;color: #000;border: 1px solid #ddd;padding: 5px;">Date</th>
                    <th class="meta-head" style="text-align:left;background: #eee;color: #000;border: 1px solid #ddd;padding: 5px;">Amount Due</th>
                </tr>
                <tr>
                    <td style="border: 1px solid #ddd;padding: 5px;"><p><?php echo $result->reference.$result->invoiceNo; ?></p></td>
                    <td style="border: 1px solid #ddd;padding: 5px;"><p id="date"><?php $date=date_create($result->date);
 echo date_format($date,"M d,Y"); ?></p></td>
                    <td style="border: 1px solid #ddd;padding: 5px;"><div class="due"><?php echo $currency; ?> <?php echo $result->payable; ?></div></td>
                </tr>

            </table>
        </div>



		</div>

		<table id="items" style="width: 100%;margin: 15px 0 0 0;border-collapse: collapse;">
		  <tr style="border: 1px solid #ddd;">
		      <th style="text-align:left;background: #eee;color: #000;border: 1px solid #ddd;padding: 5px;">Task</th>
		      <th style="text-align:left;background: #eee;color: #000;border: 1px solid #ddd;padding: 5px;">Hours</th>
		      <th style="text-align:left;background: #eee;color: #000;border: 1px solid #ddd;padding: 5px;">Hourly Price</th>
		      <th style="text-align:left;background: #eee;color: #000;border: 1px solid #ddd;padding: 5px;">Amount</th>
		  </tr>
      <?php if(!empty($task))
			   { foreach($task as $t)
					 {
					 ?>
		  <tr class="item-row" style="border-left: 1px solid #ddd;border-right: 1px solid #ddd;border-bottom:1px solid #ddd">
		      <td style="border: 1px solid #ddd; vertical-align:middle;
    padding: 5px;" class="item-name" style="width: 175px;"><?php echo $t->task; ?></td>
		      <td style="border: 1px solid #ddd; vertical-align:middle;
    padding: 5px;"><p class="cost"><?php echo $t->hours; ?></p></td>
		      <td style="border: 1px solid #ddd; vertical-align:middle;
    padding: 5px;"><p class="qty"><?php echo $t->hourly; ?></p></td>
		      <td style="border: 1px solid #ddd; vertical-align:middle;
    padding: 5px;"><span class="price"><?php echo $t->amount; ?></span></td>
		  </tr><?php
	             } } ?>
                 <tr style="border-left:1px solid #ddd;border-right:1px solid #ddd;">
				 		      <td style="border: 0;" class="blank" colspan="2"> </td>
				 		      <td style="border-left:1px solid #ddd;border-bottom: 1px solid #ddd; vertical-align:middle;
    padding: 5px;" class="total-line">SubTotal</td>
				 		      <td style="border: 1px solid #ddd; vertical-align:middle;
    padding: 5px;" class="total-value"><div id="subtotal"><?php echo $currency; ?> <?php echo $result->amount; ?></div></td>
				 		  </tr>
							<tr style="border-left: 1px solid #ddd;border-right: 1px solid #ddd;">
									<td style="border: 0;" class="blank" colspan="2"> </td>
									<td style="border: 1px solid #ddd; vertical-align:middle;
		padding: 5px;" class="total-line">Discount <?php if($result->discountType == 1){ echo "(Flat $result->discount )"; } else { echo "( $result->discount %)"; } ?></td>

									<td style="border: 1px solid #ddd; vertical-align:middle;
		padding: 5px;" class="total-value"><p id="paid">  <?php echo $result->discountAmount; ?></p></td>
							</tr>
							<tr style="border-left: 1px solid #ddd;border-right:1px solid #ddd;">

				 		      <td style="border: 0;" class="blank" colspan="2"> </td>
				 		      <td style="border: 1px solid #ddd; vertical-align:middle;
    padding: 5px;" class="total-line">Tax ( <?php echo $result->tax; ?> %)</td>
				 		      <td style="border: 1px solid #ddd; vertical-align:middle;
    padding: 5px;" class="total-value"><div id="total"><?php echo $result->taxAmount; ?></div></td>
				 		  </tr>


							<tr style="border-left: 1px solid #ddd;border-right: 1px solid #ddd;">
				 		      <td style="border: 0;" class="blank" colspan="2"> </td>
				 		      <td style="border: 1px solid #ddd; vertical-align:middle;
    padding: 5px;background:#eee;font-weight: 800;" class="total-line balance"><b>Total Amount</b></td>
				 		      <td style="border: 1px solid #ddd; vertical-align:middle;
    padding: 5px;background:#eee;border-top:1px solid #ddd;font-weight: 800;" class="total-value balance"><div class="due"><b><?php echo $currency; ?> <?php echo $result->payable; ?></b></div></td>
				 		  </tr>
							<?php if(!empty($payment->bankdetail))
							{
								?>
							<tr style="border-top:1px solid #ddd;border-left: 1px solid #ddd;border-right: 1px solid #ddd;">
									<td style="border: 0;" class="blank" colspan="2"> </td>
									<td style="background: #eee;border: 1px solid #ddd; font-size:12px;vertical-align:middle;padding: 5px; font-size: 12px;" class="total-line balance"><b>Bank Detail</b></td>
									<td style="background: #eee;border: 1px solid #ddd; font-size: 12px;vertical-align:middle;
    padding: 5px;" class="total-value balance"><div class="due"><b><?php echo $payment->bankdetail; ?></b></div></td>
							</tr>
						<?php }
						if(!empty($payment->paypal))
				 	 {
						 ?>
							<tr style="border-top:1px solid #ddd;border-bottom: 1px solid #ddd;border-left: 1px solid #ddd;border-right: 1px solid #ddd;">
                                <td class="blank" colspan="2"></td>
									<td style="border: 1px solid #ddd;padding: 5px;font-size: 12px;"><b>For payment use this Paypal Account</b></td>
									<td style="border: 1px solid #ddd;padding: 5px;font-size: 12px;"><div class="due"><b><?php echo $payment->paypal; ?></b></div></td>
							</tr>
				<?php } ?>
		</table>
		</div>
	</header>
	<footer>

	    <table width="100%">
	      <tr>
	       <td>
	          <table width="100%">
	            <tr>
	              <td style="text-align:center">
	        <p>This is a computer generated invoice no signature is required</p></td>
	      </tr>
	    </table>
	    </td>
	  </tr>
	       <tr>
	         <td>
	  <table width="100%">
	    <tr>
	      <td style="padding-top:0;width:500px;"><sup>Powered By</sup><br> <img width="75px" height="40" src="<?php echo base_url(); ?>assets/dashboard/images/logo.png"/></td>
	      <td style="font-size:12px;" align="right" ><?php echo $address; ?></td>
	    </tr>
	  </table>
	         </td>

	       </tr>
	    </table>


	</footer>
</body>

</html>
