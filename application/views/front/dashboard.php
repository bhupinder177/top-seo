<?php
if (!isset($this->session->userdata['clientloggedin']))
{
echo "<script> window.location.href='" . base_url() . "logout'</script>";
}
else
{
if ($this->session->userdata['clientloggedin']['role'] != 'client') {
echo "<script> window.location.href='" . base_url() . "logout'</script>";
}

}
?>

<div class="container">
<div class="row">
<div class="col-md-3">
<div class="sidebar">
<h1>Dashboard</h1>
<div class="link"><a href="<?php echo base_url(); ?>profile">Edit Profile</a></div>
<div class="link"><a href="<?php echo base_url(); ?>job/post">Post Job</a></div>
<div class="link"><a href="<?php echo base_url(); ?>chat">Message</a></div>
 </div>
</div>
</div>
</div>
