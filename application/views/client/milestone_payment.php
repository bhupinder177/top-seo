<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("form").submit();
});
</script>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
 <input type="hidden" name="cmd" value="_xclick">
  <!-- <input type="hidden" name="business" value="<?php //echo $freelancer_email; ?>"> -->
  <input type="hidden" name="business" value="ranjan@1wayit.com">
 <input type="hidden" name="item_name" value="<?php echo $title; ?>">
 <input type="hidden" name="item_number" value="1">
 <input type="hidden" name="amount" value="<?php echo $amount; ?>">
 <input type="hidden" name="no_shipping" value="0">
 <input type="hidden" name="no_note" value="1">
 <input type="hidden" name="currency_code" value="USD">
 <input type="hidden" name="notify_url" value="<?php echo base_url(); ?>client-paypalipn">
 <input type="hidden" name="return" value="<?php echo base_url(); ?>paypal-redirect">
 <input type="hidden" name="custom" value="<?php echo $this->session->userdata['clientloggedin']['id']; ?>,milestone,<?php echo $freelancerId; ?>,<?php echo $milestoneId; ?>">
 <input type="hidden" name="lc" value="AU">
 <input type="hidden" name="bn" value="PP-BuyNowBF">
 <input type="image" src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="">
 <img alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
 </form>
