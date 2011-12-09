<?php 	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
		$noitems = $_GET['numberofitems'];
		$grandtotal = 0;
		$scname = $_GET['scname'];
		$datefrom = $_GET['datefrom'];
		$dateto = $_GET['dateto'];
		
		$items = array();
		for ($x=1;$x<$noitems;$x++){
			$items[$x] = array(
				'Name'=> $_GET['itemname'.$x],
				'Guests'=> $_GET['guestsitem'.$x],
				'Totals'=> $_GET['totalsitem'.$x],
				'UnitCost'=> $_GET['totalsitem'.$x] / $_GET['guestsitem'.$x]
			);
			$grandtotal += $items[$x]['Totals'];
			//echo $items[$x]['UnitCost'];
		}
		
		if(isset($_GET['currency'])){ $currency = $_GET['currency'];}else{ $currency = 'MXP';}
		
		$view = 'bookingpayment';
		include_once(_BACKEND_PATH_."sustcenters/bookingdata.php");
		
		$payable = $grandtotal * $fee;
		$balance = $grandtotal - $payable;
		if (function_exists('load_js_scripts')){ load_js_scripts($view);}
		if (function_exists('load_js_scripts')){ load_css_files('booking');} ?>
		<script src="<?php echo _PLUGINS_URL_?>maskedinput.js" type="text/javascript"></script>
<div id="iframe">	
		<div class="filter">
			Display Prices in
			<select>
				<?php foreach($currencies as $i=> $value){?>
				<option><?php echo $currencies[$i]['Name'];?></option>
				<?php }?>
			</select>
		</div>
		<div class="leftcol">
			<div id="bookingdetails">
				<h2><span class="number">1</span> Your Booking Details</h2>
				These are your booking details for <?php echo  $scname?> from <?php echo $datefrom?> to <?php echo $dateto?>
				<table>
					<thead>
						<tr>
							<th>Room Details</th>
							<th>Unit Cost</th>
							<th>Guests</th>
							<th>Total</th>
						</tr>
					</thead>
					<?php for($x=1;$x<$noitems;$x++){?>
					<tr>
						<td><?php echo $items[$x]['Name'];?></td>
						<td>$<?php echo $items[$x]['UnitCost'];?></td>
						<td><?php echo $items[$x]['Guests'];?></td>
						<td>$<?php echo $items[$x]['Totals'];?></td>
					</tr>
					<?php }?>
					<tr class="total">
						<td colspan=3>
							<strong>TOTAL</strong> 
						</td>
						<td>$<?php echo $grandtotal?></td>
					</tr>
					<tr class="payable">
						<td colspan=3>
							<strong>Payable Now</strong> 
						</td>
						<td>$<?php echo $payable?></td>
					</tr>
					<tr class="balance">
						<td colspan=3>
							<strong>Pay on Arrival to <?php echo $scname?></strong> 
						</td>
						<td>$<?php echo $balance?></td>
					</tr>
				</table>
			</div>
			<div id="memberdetails">
				<h2><span class="number">2</span> Your Personal Details</h2>
				<div class="leftcol">
					<memberavatar><?php
					$user_dir=members_get_info("hash",$_SESSION['user_id']);
					if(file_exists(_MEMBER_PICS_PATH_.$user_dir."/profile_th.jpg")){?>
						<img src="<?php echo _MEMBER_PICS_URL_.$user_dir."/profile_th.jpg";?>">
					<?php }else{?>
						<img src="<?=_IMAGES_URL_?>avatar.png";?>
					
					<?php }?>
					</memberavatar>
					<div class="name"><?php echo members_get_info("nombre",$_SESSION['user_id'])?> <?php echo members_get_info("apellido",$_SESSION['user_id'])?> </div>
					<div class="email"><a href="#" class="tiptip" title="Click to change email"><?php echo members_get_info("email",$_SESSION['user_id'])?></a></div>
				</div>
				<div class="rightcol">
						<input type="text" title="Enter your phone" id="phone" name="phone" maxlength=10></input>
					<select class="arrival">
						<option>Arrival Time</option>
						<?php for($y=0;$y<24;$y++){
							if($y<10){
							?>
								<option>0<?php echo $y;?>:00</option>
							<?php }else{?>
								<option><?php echo $y;?>:00</option>
							<?php }?>
						<?php }?>
					</select>
					
				</div>
			</div><!--Memberdetails-->
		</div><!--LeftCol-->
		<div id="payment">
			<h2><span class="number">3</span> Your Credit Card Information</h2>
			
			<input type="text" title="Cardholder's name" name="card_name" value="" id="card_name">
			<input type="text" title="Card Number" name="card_number" value="" id="card_number" onkeyup="detect_card();">
			<label class="vericode tiptip" title="The three digits behind your card">Verification Code</label>
			<input type="text" title="" name="verification_code" value="" id="verification_code" maxlength=3>
			
			<div class="rightcol">
				<select name="card_type" id="card_type">
				    <option value="0">----</option>
				    <option value="Visa">Visa</option>
				    <option value="Mastercard">Mastercard</option>
				    <option value="Discover">Discover</option>
				    <option value="Amex">Amex</option>
				</select>
				<select name="expiration_year" id="expiration_year"onchange="" size="1">
					<?php for($y=2011;$y<2050;$y++){?>
					<option><?php echo $y?></option>
					<?php }?>
				</select>
				<select name="expiration_month" id="expiration_month" onchange="" size="1">
					<?php for($y=1;$y<13;$y++){?>
					<option><?php echo $y ?></option>
					<?php }?>
				
				</select>
				
				<label id="expirationlabel">Expiration Date</label>
			</div>
			
			<div class="checkboxes">
				<input type="checkbox" name="save_card" value="save_card" id="save_card"><label for="save_card">Save Credit Card Details</label>
				<br/>
				<input type="checkbox" name="terms_of_service" value="" id="terms_of_service"><label for="terms_of_service">I Agree to the <a href="#">Terms of service</a></label>
			</div>
			<button id="confirm" class="green">Confirm Payment of $<?php echo $payable?></button>
		</div><!-- -->
		<div class="trustcertificate">
			Here goes the Security Certificate
			
		</div>
		
</div>