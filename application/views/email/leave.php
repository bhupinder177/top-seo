<table border="0" width="100%">
	<tbody>
		<tr>
			<td>
			<table align="center" border="0" cellpadding="0" cellspacing="0" style="background:#fff; box-shadow:0 10px 60px rgba(4,75,194,0.2);" width="600">
				<tbody>
					<tr>
						<td align="center" height="100" width="100" style="background: #f6f6f6;
border-bottom: solid 1px #eaeaea;" valign="middle">
							<img width="150px" src="<?php echo base_url().'assets/front/images/top-seo.png'; ?>" alt="">
						</td>
					</tr>
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
																			 Hi <b><?php echo $name; ?>,</b>
																			 <br/>
																			 <br/>
																			 <p style="font-size: 14px;">Following employee applied for leave</p><br>
																		   <p style="font-size: 14px;"><b>Employee Name: </b><?php echo $from; ?> </p>
																		   <p style="font-size: 14px;"><b>Leave Type: </b><?php echo $type->type; ?> </p>
																		   <p style="font-size: 14px;"><b>Leave Applied on: </b><?php echo $date2 = date("d-m-Y", strtotime($date));  ?> </p>
																		   <p style="font-size: 14px;"><b>Leave From: </b><?php echo $date1 = date("d-m-Y", strtotime($result->date));  ?> </p>
																		   <p style="font-size: 14px;"><b>Leave To: </b><?php echo $date1 = date("d-m-Y", strtotime($result->date1));  ?> </p><br>
																			 <br>

																	<strong>Regards</strong>
																	<p><?php echo $from; ?></p>
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

										</tbody>
									</table>
									</td>
									<td width="15">&nbsp;</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<tr>
						<td align="center" style="padding:5px; background: #4895D2;
            color:#fff;" valign="top">
						<!-- <p>You have received this message by auto generated e-mail.</p> -->

						<center><?php echo '&copy; '.date('Y'). ' ALL RIGHTS RESERVED'; ?></center>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
