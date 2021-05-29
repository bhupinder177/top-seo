<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Editable Invoice</title>

	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/invoicecss/style.css' />
	<link rel='stylesheet' type='text/css' href='<?php echo base_url(); ?>assets/invoicecss/print.css' media="print" />


</head>

<body>

	<div id="page-wrap">

		<p id="header">INVOICE</p>

		<div id="identity">

            <p id="address">Chris Coyier
123 Appleseed Street
Appleville, WI 53719

Phone: (555) 555-5555</p>

            <div id="logo">


              <img id="image" src="images/logo.png" alt="logo" />
            </div>

		</div>

		<div style="clear:both"></div>

		<div id="customer">

            <p id="customer-title">Widget Corp.
c/o Steve Widget</p>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><p>000123</p></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><p id="date">December 15, 2009</p></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">$875.00</div></td>
                </tr>

            </table>

		</div>

		<table id="items">

		  <tr>
		      <th>Task</th>
		      <th>Hours</th>
		      <th>Hourly Price</th>
		      <th>Amount</th>
		  </tr>

			<?php if(!empty($task))
				{

					foreach($task as $t)
					{
					?>
		 <tr class="item-row">
				 <td class="item-name"><?php echo $t->task; ?></td>
				 <td><p class="cost"><?php echo $t->hours; ?></p></td>
				 <td><p class="qty"><?php echo $t->hourly; ?></p></td>
				 <td><span class="price"><?php echo $t->amount; ?></span></td>
		 </tr>
	 <?php $total += $t->amount;
							} } ?>






		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal"><?php echo $total; ?></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total"><?php echo $total; ?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><p id="paid">$0.00</p></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due"><?php echo $total; ?></div></td>
		  </tr>

		</table>

		<div id="terms">
		  <h5>Terms</h5>
		  <p>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</p>
		</div>

	</div>

</body>

</html>
