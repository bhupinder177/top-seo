<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("form").submit();
});
</script>
<!-- https://www.sandbox.paypal.com/cgi-bin/webscr -->
<!-- https://www.paypal.com/cgi-bin/webscr -->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
 <!-- <input type="hidden" name="cmd" value="_xclick"> -->
 <!-- vinod@1wayit.com -->
 <input type="hidden" name="cmd" value="_xclick-subscriptions">
  <input type="hidden" name="business" value="vinod@1wayit.com">
 <input type="hidden" name="item_name" value="<?php echo $package->packageName; ?>">
 <input type="hidden" name="item_number" value="1">
 <input type="hidden" name="a3" value="<?php echo $package->packagePrice; ?>.00">
 <input type="hidden" name="no_shipping" value="0">
 <input type="hidden" name="no_note" value="1">
 <input type="hidden" name="currency_code" value="USD">
 <input type="hidden" name="notify_url" value="https://www.top-seos.com/client-paypalipn">
 <input type="hidden" name="return" value="https://www.top-seos.com/paypal-redirect">
 <input type="hidden" name="custom" value="<?php echo $userId; ?>,membership,<?php echo $package->packageId; ?>">
 <input type="hidden" name="lc" value="AU">

<input type="hidden" name="p3" value="1">
<input type="hidden" name="t3" value="<?php if($package->packageDuration == 1){ echo "M"; } else if($package->packageDuration == 2){ echo "Y"; } ?>">
<input type="hidden" name="src" value="1">
<input type="hidden" name="sra" value="1">

 <input type="hidden" name="bn" value="PP-BuyNowBF">
 <input style="display:none" type="image" src="https://www.paypal.com/en_AU/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="">
 <img style="display:none" alt="" border="0" src="https://www.paypal.com/en_AU/i/scr/pixel.gif" width="1" height="1">
 </form>