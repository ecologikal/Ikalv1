<?php 	require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
		if(isset($_GET['currency'])){ $currency = $_GET['currency'];}else{ $currency = 'MXP';}
		$scname = $_GET['scname'];
		$date = $_GET['date'];
		$days = $_GET['days']; 
		$date = strtotime($date);
		$datefrom = date('d-M-Y', $date); 
		$dateto = date('d-M-Y', strtotime($datefrom."+".$days." days"));
		
		$view = 'booking';
		
		include_once(_BACKEND_PATH_."sustcenters/bookingdata.php"); ?>
		
		<?php if (function_exists('load_js_scripts')){ load_js_scripts($view);} ?>
		<script>
			//declaring the php views path to use it in javascript
			viewsurl = "<?php echo _VIEWS_URL_ ?>";
			scname = "<?php echo $scname ?>";
			datefrom = "<?php echo $datefrom ?>";
			dateto = "<?php echo $dateto ?>";
			payableperc = "<?php echo $fee ?>";
		</script>
		<?php if (function_exists('load_js_scripts')){ load_css_files($view);} ?>
		
		
		
	<div id="iframe">
		
		<h2>Booking Accommodation for</h2>
		These are the results of your room search in <?php echo $scname?> for the following dates:
		<div class="dates">
			<a href="#" class="changedate tiptip" title="Click to Change Date From">
				<?php echo $datefrom?>
			</a> to 
			<a href="#" class="changedate tiptip" title="Click to Change Date To">
				<?php echo $dateto?>
			</a>
		</div>
		
		<rooms>
			<datelabels>
				<?php $newdate = $datefrom; // new date element for displaying the available dates
				 for($x=0; $x < $days; $x++){?>
					<div class="dateblock"><?php  echo date('d-M',strtotime($newdate));  $newdate = date('d-M', strtotime($newdate."+1 day")); ?></div>
				<?php }?>
			</datelabels>
			<?php foreach($rooms as $i=> $value){?>
			<room>
				<div class="picturecontainer"><img src="<?php echo $rooms[$i]['RoomPic']?>"/></div>
				<div class="details">
					<div class="name"><?php echo $rooms[$i]['RoomName']?></div>
					<div class="description"><?php echo $rooms[$i]['RoomDesc']?></div>
				</div>
				<div class="datesavailable">
					<?php for($x=0; $x < $days; $x++){?>
						<div class="dateblock tiptip" ><a href="#" title="Spots Available <?php echo $occupancy = $rooms[$i]['Occupancy']?>" class="tiptip"><?php if ($occupancy > 0){ echo "<div class='icon tick'></div>";}else{ echo "N/A";} ?></a></div>
					<?php } ?>
				</div>
				<div class="price">
					$<?php if($currency === 'MXP'){
						echo $rooms[$i]['RoomPriceMXP']. " MXN";
					}else{ 
						if ($currency == 'USD'){
							echo $rooms[$i]['RoomPriceUSD'] . " USD";
						}
					} ?>
				</div>
				<?php if ($rooms[$i]['Occupancy']>0){?>
				<div class="guests">
					
					<select>
						<option>Guests</option>
						<?php for($x=0;$x<$rooms[$i]['Occupancy'];$x++){?>
							<option value="<?php echo $x+1?>"><?php echo $x+1?></option>
						<?php }?>
					</select>
					
				</div>
				<?php } //If the room available?>
			</room>
			<?php }?>
		</rooms>
		<div id="totals">
			<div class="filter">
				Display Prices in
				<select>
					<?php foreach($currencies as $i=> $value){?>
					<option><?php echo $currencies[$i]['Name'];?></option>
					<?php }?>
				</select>
			</div>
			<div class="mybooking nodisplay">
				<h3>My Booking Details</h3>
				<items></items>
				<div class="grandtotal">
					<span class="grandtotallabel">TOTAL</span>
					<div class="grandtotalvalue"></div>
				</div>
				<button class="green"><div class="buttontext">Pay Now only</div><div class="amountpayablevalue"></div></button>
			</div>
		</div>
	</div>