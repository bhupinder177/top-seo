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
																			 <p>Following are the details of Applicant: </p>
                                      <p><b>Position</b>: <?php echo  $vacancyPosition; ?> </p>
                                      <p><b>Name</b>: <?php echo $result->candidateName; ?></p>
                                      <p><b>Email</b>: <?php echo $result->candidateEmail; ?></p>
                                      <p><b>Phone no</b>: <?php echo $result->candidatePhone; ?></p>
                                      <p><b>Experience</b>: <?php echo $result->candidateExperience; ?></p>
                                      <p><b>Current Salary</b>: <?php echo $result->candidateCurrentSalary; ?></p>
                                      <p><b>Expected Salary</b>: <?php echo $result->candidateExpectedSalary; ?></p>
                                      <p><b>Notice Period</b>: <?php echo $result->candidateNoticePeriod; ?></p>
																<strong>Regards</strong></br></br>
																<p>Top-SEOs Team</p></br>
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
