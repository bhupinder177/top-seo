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
																		<p style="font-size: 14px;">Hope you are doing great. Today we are going to share our new Article
																<b><?php echo $blog->title; ?></b> that is related to <b><?php echo $category; ?></b> Posted by <b><?php echo $blog->author; ?></b>.</br>We invite you to participate in Blog
															Writing & Posting. You can share your unique and valuable articles via Submit Blog.</p><br/>

                                                                            <div style="text-align:center;">
                                                                            <a style="background: #03b2fb;padding: 12px 25px;
font-size: 15px;color:#fff;text-decoration: none;border-radius: 4px;display:inline-block;" href="<?php echo base_url(); ?>login">Click Here To Login</a></div>
                                                                            <br/>
                                                                            <p style="font-size: 14px;"><b>Title - <?php echo $blog->title; ?></b></p>
																		<p style="font-size: 14px;"><?php echo strip_tags(substr($blog->description, 0,400)); ?>...</p>
                                                                       <div style="text-align:center;">
                                                                           <p>
                                                                              <a style='background: #03b2fb;padding: 12px 25px;
font-size: 15px;color:#fff;text-decoration: none;border-radius: 4px;display:inline-block;' href="<?php echo $link; ?>">Click Here To Read More</a></p></div>
                                                                          <br/>
																	<strong>Regards</strong>
																	 Top-SEOs Team</br>
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
