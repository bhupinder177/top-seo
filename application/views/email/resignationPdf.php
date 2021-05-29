<html>
<head>
  	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'/>
  <style type="text/css">
  @media print {
  .new-page {
  page-break-before: always;
  }
  }
@page { margin:5px 5px 5px 5px; }
body { margin: 0px;}
/* @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400'); */
footer{position:fixed;left: 0;right:0;bottom: 0;height: 100px;}
</style>
</head>
<body>
  <header>
<table border="0" width="100%">
   <tbody>
      <tr>
         <td>
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="background:#fff; box-shadow:0 0 10px #ccc;" max-width="600">
               <tbody>
                  <tr>
                     <td>
                        <table cellpadding="0" cellspacing="0" width="100%">
                           <tbody>
                              <tr>
                                 <td width="15">&nbsp;</td>
                                 <td width="670">
                                    <table cellpadding="0" cellspacing="0" width="100%">
                                       <tbody>
                                          <tr>
                                             <td align="center">
                                                <?php if(!empty($logo))
                                                   {
                                                   	?>
                                                <img style="width: 150px; height: auto;	" src="<?php echo base_url(); ?>assets/client_images/<?php echo $logo; ?>"/>
                                                <!-- <img style="width: 250px; height: auto;	" src="http://docpoke.in/top-seo/assets/front/images/top-seo.png"/> -->

                                                <?php } ?>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td align="center" height="10"></td>
                                          </tr>
                                          <tr>
                                             <td align="center" style="text-decoration:underline;font-size: 30px;font-weight: 700;">RESIGNATION LETTER</td>
                                          </tr>
                                          <tr>
                                             <td align="center" height="10"></td>
                                          </tr>
                                          <tr>
                                             <td height="15">&nbsp;</td>
                                          </tr>
                                          <tr>
                                             <td width="530">
                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td style="font-family:Arial, Helvetica, sans-serif; padding:10px; font-size:13px;">
                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                               <tbody>
                                                                  <tr>
                                                                     <td>
                                                                        <p><?php echo $result->remarks; ?></p>
                                                                        <br>
                                                                        <p><b>Applied On : </b> <?php echo $newDate = date("d-m-Y", strtotime($result->date)); ?>  </p>
                                                                        <?php if(!empty($result->leaveDate))
                                                                           { ?>
                                                                        <p><b>Relieving Date : </b> <?php echo $newDate1 = date("d-m-Y", strtotime($result->leaveDate)); ?>  </p>
                                                                        <?php } ?>
                                                                        <br/>Thank You,<br/>
                                                                        <?php echo $user->name; ?></br>
                                                                        <br/><br/>
                                                                     </td>
                                                                  </tr>

                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                          <!-- <tr>
                                             <td height="15" style="padding-bottom:15px;">
                                             <p>*This email account is not monitored. Please do not reply to this email as we will not be able to read and respond to your messages.</p>
                                             </td>
                                             </tr> -->
                                       </tbody>
                                    </table>
                                 </td>
                                 <td width="15">&nbsp;</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>

            </table>
         </td>
      </tr>

   </tbody>

</table>

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
