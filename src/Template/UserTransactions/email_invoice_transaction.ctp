
<div class="main">
	<div class="content">

		<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$('#horizontalTab').easyResponsiveTabs({
								type: 'default', //Types: default, vertical, accordion           
								width: 'auto', //auto or any width like 600px
								fit: true   // 100% fit in a container
							});
			});

		</script>
		<div>
		<span style="float:left;">
		Pay To:	 <strong>
			<?= 
				($userEmailInvoiceData->user->first_name.(isset($userEmailInvoiceData->user->last_name)?' '.$userEmailInvoiceData->user->last_name:''));
			?>
			</strong>
			</span>
			<span style="float:right;">
				<strong>Rs. 
			<?= 
				($userEmailInvoiceData->amount);
			?>
			</strong>
				
			</span>
		</div>
		

		<div class="sap_tabs">
		<div style="display: block; width: 100%; margin: 0px;">
		<span style="float:left;">Net Payable Amount:</span>
		<span style="float:right;"> <strong>Rs. <?= ($userEmailInvoiceData->amount);?></strong></span>
		</div>
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<div class="pay-tabs">
					<h2>Select Payment Mode</h2>
					<ul class="resp-tabs-list">
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span><label class="pic1"></label>Credit Card</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span><label class="pic3"></label>Net Banking</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span><label class="pic4"></label>Upi</span></li> 
						<li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span><label class="pic2"></label>Debit Card</span></li>
						<div class="clear"></div>
					</ul>	
				</div>
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						<div class="payment-info">
							<form method="post" action="http://localhost/myTestCode/transaction/<?= $userEmailInvoiceData->uuid; ?>">
								<div class="tab-for">				
									<h5>NAME ON CARD</h5>
									<input type="text" value="">
									<h5>CARD NUMBER</h5>													
									<input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
								</div>	
								<div class="transaction">
									<div class="tab-form-left user-form">
										<h5>EXPIRATION</h5>
										<ul>
											<li>
												<input type="number" class="text_box" type="text" value="6" min="1" />	
											</li>
											<li>
												<input type="number" class="text_box" type="text" value="1988" min="1" />	
											</li>

										</ul>
									</div>
									<input  type="hidden" value="<?= $userEmailInvoiceData->amount; ?>" name="amount">
									<input  type="hidden" value="<?= $userEmailInvoiceData->uuid; ?>" name="uuid">
									<input  type="hidden" value="e_in" name="t_t">
									<div class="tab-form-right user-form-rt">
										<h5>CVV NUMBER</h5>													
										<input type="text" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
									</div>
									<div class="clear"></div>
								</div>
								<div class="transaction">
										
									<div class="tab-form-left user-form">
										<span>transaction Status</span>													
									</div>
									<div class="tab-form-right user-form-rt">
										<select name="status">
										  <option value="1">Success</option> 
										  <option value="0">Failed</option>
										  <option value="2">Pending</option>
										  <option value="3">Refund</option>
										  <option value="4">Collection</option>
										</select>
									</div>
									<div class="clear"></div>
									</div>
								<input type="submit" value="SUBMIT">
							</form>
							<div class="single-bottom">
								<ul>
									<li>
										<input type="checkbox"  id="brand" value="">
										<label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="payment-info">
							<h3>Net Banking</h3>
							<div class="radio-btns">
								<div class="swit">								
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>Andhra Bank</label> </div></div>
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Allahabad Bank</label> </div></div>
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bank of Baroda</label> </div></div>
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Canara Bank</label> </div></div>	
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>IDBI Bank</label> </div></div>
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Icici Bank</label> </div></div>	
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Overseas Bank</label> </div></div>	
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Punjab National Bank</label> </div></div>	
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>South Indian Bank</label> </div></div>
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>State Bank Of India</label> </div></div>		
								</div>
								<div class="swit">								
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>City Union Bank</label> </div></div>
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>HDFC Bank</label> </div></div>
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>IndusInd Bank</label> </div></div>
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Syndicate Bank</label> </div></div>
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Deutsche Bank</label> </div></div>	
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Corporation Bank</label> </div></div>
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>UCO Bank</label> </div></div>	
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Indian Bank</label> </div></div>	
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Federal Bank</label> </div></div>	
									<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>ING Vysya Bank</label> </div></div>	
								</div>
								<div class="clear"></div>
							</div>
							<a href="#">Continue</a>
						</div>
					</div>
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
						<div class="payment-info">
							<div class="login-tab">
								<div class="user-login">
									<h2>Login</h2>

									<form>
										<input type="text" value="name@email.com" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'name@email.com';}" required="">
										<input type="password" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}" required="">
										<div class="user-grids">
											<div class="user-left">
												<div class="single-bottom">
													<ul>
														<li>
															<input type="checkbox"  id="brand1" value="">
															<label for="brand1"><span></span>Remember me?</label>
														</li>
													</ul>
												</div>
											</div>
											<div class="user-right">
												<input type="submit" value="LOGIN">
											</div>
											<div class="clear"></div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">	
						<div class="payment-info">

							<form>
								<div class="tab-for">				
									<h5>NAME ON CARD</h5>
									<input type="text" value="">
									<h5>CARD NUMBER</h5>													
									<input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '0000-0000-0000-0000';}" required="">
								</div>	
								<div class="transaction">
									<div class="tab-form-left user-form">
										<h5>EXPIRATION</h5>
										<ul>
											<li>
												<input type="number" class="text_box" type="text" value="6" min="1" />	
											</li>
											<li>
												<input type="number" class="text_box" type="text" value="1988" min="1" />	
											</li>

										</ul>
									</div>
									<div class="tab-form-right user-form-rt">
										<h5>CVV NUMBER</h5>													
										<input type="text" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'xxxx';}" required="">
									</div>
									<div class="clear"></div>
								</div>
								<input type="submit" value="SUBMIT">
							</form>
							<div class="single-bottom">
								<ul>
									<li>
										<input type="checkbox"  id="brand" value="">
										<label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
									</li>
								</ul>
							</div>
						</div>	
					</div>
				</div>	
			</div>
		</div>	

	</div>
</div>