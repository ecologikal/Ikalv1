<div class="element <?php  echo $randtypeclass .' '. $randpetalclass; ?> ">
	<div class="icon <?php echo $typeofcontent[$randtype]['Icon']; ?>"></div>

	<div id="memberpic"><img src="<?php $rand = rand(0,$sizesc); echo $scs[$rand]['ProfilePic'] ?>"></div>
	<div id="titlecontainer">
		
		<div id="reactionpoints">
			<div class="dharma tiptip" title="Give me some Dharma"></div>
			<div class="karma tiptip" title="Bad Karma"></div>
		</div>
		<div class="tiptip icon moreinfo" title="More Information" onclick="$(this).parent().find('a.moreinfo').trigger('click');"></div><a href="<?php echo _VIEWS_URL_ ?>sustcenters/moreinfo.php?scname=<?php echo $scs[$rand]['Name'];?>" title="More Info on <?php echo $scs[$rand]['Name'];?>" class="iframe moreinfo"></a>
		<div class="name"><?php echo $scs[$rand]['Name'];?></div>
		<span class="location"><?php echo $scs[$rand]['Country'].", ".$scs[$rand]['State']?></span>
		<div id="booknow">
			<div class="invisiblebutton notclicked" ></div>
			<button><div class="icon bookingicon"></div><a>Travel here</a></button>
			<a href="<?php echo _VIEWS_URL_;?>sustcenters/booking/booking.php?scname=<?php echo $scs[$rand]['Name']?>" title="Booking Accomodation in <?php echo $scs[$rand]['Name'];?>" class="booking iframe"></a>
		</div>
		<div class="description"><?php echo $scs[$rand]['Description']; ?></div>
		
	

		
	</div>
	<div id="content">
		<div id="reviews" onclick="$('a.vibe').trigger('click');" >
			<table >
				<tr class="atmosphere">
					<td class="attr" >Place Vibe</td>
					<td class="barcontainer" >
						<div class="value"><?php echo rand(30,100);?>%</div>
					</td>
				</tr>
				
			</table>
		</div>
		
		
		<!-- FLOWER BAR 
		<div class="flowerbar">
			<div class="tiptip petal1 red_bg" 		title="<?php $randperc = rand(50,100); echo $randperc ."% ".$petal_name[1];?> "><?php echo $randperc; ?>%</div>
			<div class="tiptip petal2 orange_bg" 	title="<?php $randperc = rand(50,100); echo $randperc ."% ".$petal_name[2];?> "><?php echo $randperc; ?>%</div>
			<div class="tiptip petal3 yellow_bg" 	title="<?php $randperc = rand(50,100); echo $randperc ."% ".$petal_name[3];?> "><?php echo $randperc; ?>%</div>
			<div class="tiptip petal4 green_bg" 	title="<?php $randperc = rand(50,100); echo $randperc ."% ".$petal_name[4];?> "><?php echo $randperc; ?>%</div>
			<div class="tiptip petal5 blue_bg" 		title="<?php $randperc = rand(50,100); echo $randperc ."% ".$petal_name[5];?> "><?php echo $randperc; ?>%</div>
			<div class="tiptip petal6 indigo_bg" 	title="<?php $randperc = rand(50,100); echo $randperc ."% ".$petal_name[6];?> "><?php echo $randperc; ?>%</div>
			<div class="tiptip petal7 purple_bg" 	title="<?php $randperc = rand(50,100); echo $randperc ."% ".$petal_name[7];?> "><?php echo $randperc; ?>%</div>
		</div>-->
		<!-- SERVICES -->
		<div id="services">
			<ul>
				<a title="<?php echo $scs[$rand]['Name'];?>'s Vibe" 				href="<?php echo _VIEWS_URL_ ?>sustcenters/vibe.php?scname=<?php echo $scs[$rand]['Name']; ?>" 			class="vibe iframe"		   ></a>
				<a title="<?php echo $scs[$rand]['Name'];?>'s Flower" 				href="<?php echo _VIEWS_URL_ ?>sustcenters/flower.php?scname=<?php echo $scs[$rand]['Name']; ?>" 		class="flower iframe"	   ></a>
				<a title="<?php echo $scs[$rand]['Name'];?>'s Photos" 				href="<?php echo _VIEWS_URL_ ?>sustcenters/pictures.php?scname=<?php echo $scs[$rand]['Name'];?>"		class="photos iframe"	   ></a>
				<a title="<?php echo $scs[$rand]['Name'];?>'s Workshops" 			href="<?php echo _VIEWS_URL_ ?>sustcenters/workshops.php?scname=<?php echo $scs[$rand]['Name']; ?>" 	class="workshops iframe"   ></a>
				<a title="<?php echo $scs[$rand]['Name'];?>'s Services" 			href="<?php echo _VIEWS_URL_ ?>sustcenters/services.php?scname=<?php echo $scs[$rand]['Name']; ?>" 		class="services iframe"	   ></a>
				<a title="<?php echo $scs[$rand]['Name'];?>'s Places" 				href="<?php echo _VIEWS_URL_ ?>sustcenters/places.php?scname=<?php echo $scs[$rand]['Name']; ?>&country=<?php echo $scs[$rand]['Country']?>&state=<?php echo $scs[$rand]['State'] ?>" 	class="places iframe"  ></a>
				<a title="<?php echo $scs[$rand]['Name'];?>'s Volunteer Vacancies" 	href="<?php echo _VIEWS_URL_ ?>sustcenters/volunteering/volunteervac.php?scname=<?php echo $scs[$rand]['Name']; ?>" 	class="volunteering iframe"></a>
				
				<li class="tiptip"	title="Place Vibe"			  onclick="$(this).parent().find('a.vibe').trigger('click');"		><div class="icon vibe">	</div></li>
				<li class="tiptip"	title="Flower"				  onclick="$(this).parent().find('a.flower').trigger('click');"		><div class="icon flower">	</div></li>
				<li class="tiptip"	title="Photos"			  	  onclick="$(this).parent().find('a.photos').trigger('click');"  	><div class="icon photos">	</div></li>
				<li class="tiptip"	title="Workshops"			  onclick="$(this).parent().find('a.workshops').trigger('click');"		><div class="icon workshops"></div></li>
				<li class="tiptip"	title="Products and Services" onclick="$(this).parent().find('a.services').trigger('click');"		><div class="icon services"></div></li>
				<li class="tiptip"	title="Places"		  	  	  onclick="$(this).parent().find('a.places').trigger('click');"  	><div class="icon places"></div></li>
				<li class="tiptip"	title="Volunteer Vacancies"	  onclick="$(this).parent().find('a.volunteering').trigger('click');"  	>	<div class="icon volunteervac"></div></li>
				
				
			</ul>
		</div><!--Services Section-->
		<div id="ecotravelers">
			<h4>Settlers</h4>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<div class="viewmore"><a href="#">View More</a></div>
			<h4>Latest Ecotravelers</h4>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<div class="viewmore"><a href="#">View More</a></div>
			<h4>Latest Volunteers</h4>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<memberavatar></memberavatar>
			<div class="viewmore"><a href="#">View More</a></div>
		</div>
	</div><!-- Content -->
	<div id="box">
		<div class="boxcontent">
			<div class="rp"><span class="val tiptip" title="Dharma Balance"><?php echo rand(1000,2000); ?></span><span class="thumb"></span></div>


			<span class="type web"></span>
			

		</div>
	</div><!-- box-->
</div> <!-- element-->