<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Editable Invoice</title>

<style type="text/css">
@page { margin:30px 10px 10px 10px; }
body { margin: 0px; font-family: 'Open Sans', sans-serif;}
@import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400');
</style>
</head>

<body>

	< <tbody>
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
                                                <img style="width: 50px; height: auto;	" src="<?php echo base_url(); ?>assets/client_images/<?php echo $logo; ?>"/>
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
</body>

</html>
