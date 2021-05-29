<!DOCTYPE html >
<html >

<head>
	<title>performance</title>
<style type="text/css">
 @page { margin:10px 10px 5px 10px; }
body { margin: 0px; font-family: 'Open Sans', sans-serif;}
/* @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400'); */
table.tbl-wrp b {
	 padding-right: 22px;
}
.tbl-wrp {
 border-collapse: collapse;
}
.tbl-wrp  th, td{border:1px solid #ccc; padding:8px;}
footer{position:fixed;left: 0;right:0;bottom: 0;height: 100px;}

</style>
</head>
<body>
	  <header>
	<div id="page-wrap" style="max-width: 800px;margin: 0 auto;background: #fff;">
		<div id="identity">
          <table style="width: 100%; padding:0 15px;">
              <tr>
                 <td style="width:100%; margin:0 auto; text-align:center; border:none;">
									 <?php if($logo)
									 {
										 ?>
									 <img style="width: 100px; height: auto;" src="<?php echo base_url(); ?>assets/client_images/<?php echo $logo; ?>"/>
								 <?php } ?>
								 </td>
                 </tr>

               </table>
              <table style="width: 100%;">

                 <tr>
                     <td style="border:none;"><b>Employer Name:</b> <?php echo $performance->name; ?> </td>
										<td  style="border:none;"><b>Joining Date:</b> <?php echo $performance->joiningdate; ?></td>
                  </tr>
                  <tr>
                      <td style="border:none;"><b>Review Period Start:</b> <?php echo $performance->perReviewPeriodStart; ?> </td>
                     <td  style="border:none;"><b>Review Period End:</b> <?php echo $performance->perReviewPeriodEnd; ?></td>
                   </tr>
									 <tr>
	                     <td style="border:none;"><b>Designation:</b> <?php echo $performance->perDesignation; ?></td>
											<td style="border:none;"><b>Department:</b> <?php echo $department->department; ?> </td>
	                  </tr>
										<tr>
												<td style="border:none;"><b>Reviewer:</b> <?php echo $reviewer->name; ?></td>
												<?php if($reviewer->project != '')
												{
													?>
											 <td style="border:none;"><b>Project:</b> <?php echo $reviewer->project; ?> </td>
										 <?php } ?>
										 </tr>
										 <tr>
                        <td style="border:none;" colspan="2"></td>
										 </tr>
            </table>
						<?php if(!empty($reviewer->forms))
						{
							 ?>
						<table  class="tbl-wrp" style="width:100%; ">
            <?php foreach($reviewer->forms as $f)
						  {
								?>
							<tr>
								<td  colspan="6" style="background:#c5ccd0;">Core Services</td>
							</tr>
							<?php foreach($f->criteria as $c)
							{
								?>
							<tr>
								<th style="font-size:14px;text-align:left;font-weight:bold;width:250px;"><?php echo $c->title; ?></th>
								<th style="font-weight:bold; font-size:14px;">Poor <?php if($c->rating == 1){ ?><img style="width:100%; max-width:20px; " src="<?php echo base_url(); ?>assets/dashboard/images/black-checkmark-png-4.png"><?php } ?></th>
								<th  style="font-weight:bold; font-size:14px;">Fair <?php if($c->rating == 2){ ?><img style="width:100%; max-width:20px; " src="<?php echo base_url(); ?>assets/dashboard/images/black-checkmark-png-4.png"><?php } ?></th>
								<th style="font-weight:bold; font-size:14px;">Satisfactory <?php if($c->rating == 3){ ?><img  style="width:100%; max-width:20px; "src="<?php echo base_url(); ?>assets/dashboard/images/black-checkmark-png-4.png"><?php } ?></th>
								<th style="font-weight:bold; font-size:14px;">Good <?php if($c->rating == 4){ ?><img style="width:100%; max-width:20px; " src="<?php echo base_url(); ?>assets/dashboard/images/black-checkmark-png-4.png"><?php } ?></th>
								<th style="font-weight:bold; font-size:14px;">Excellent <?php if($c->rating == 5){ ?><img  style="width:100%; max-width:20px; "src="<?php echo base_url(); ?>assets/dashboard/images/black-checkmark-png-4.png"><?php } ?></th>
							</tr>
							<tr>
								<td style="font-weight:normal; color:#000;">Remark</td>
							<td colspan="5" style="padding-left:10px;"><?php echo $c->comment; ?></td>
							</tr>
						<?php } } ?>

		</table>
					<?php } ?>

		</div>

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
