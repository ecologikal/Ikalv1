<?php
$temp = array();
$skillarr = array();
// Getting the skills and number array
for ($x=1; $x < 8; $x++) { 
	$skillarr[$x]['noskills']= members_get_no_skills($userid, $x);
	$skillarr[$x]['petal']= $x;
}
array_multisort($skillarr);
?>
<div class="get">
	<?php
		for ($x=0;$x<7;$x++){ 
		?>
		<div class="petal">
			<span class="text"><?php echo get_petal_name($skillarr[$x]['petal']);?></span>
			<input type="hidden" class="percent" value="<?php echo members_get_petal_grade($userid, $skillarr[$x]['petal']);?>" />
			<input type="hidden" class="color" value="<?php echo get_petal_color($skillarr[$x]['petal']);?>" />
			<input type="hidden" class="noSkills" value="<?php echo members_get_no_skills($userid, $skillarr[$x]['petal']); ?>" />
		</div>
	<?php }?>
</div><!-- Get-->
<div class="petalslist">
	<div class="petalbuttons">
		<div class="tiptip icon petals p0" id="1" title="My Building Skills"></div>
		<div class="tiptip icon petals p1" id="2" title="My Community Governance Skills"></div>
		<div class="tiptip icon petals p2" id="3" title="My Finance & Economics Skills"></div>
		<div class="tiptip icon petals p3" id="4" title="My Land & Nature Skills"></div>
		<div class="tiptip icon petals p4" id="5" title="My Culture & Education Skills"></div>
		<div class="tiptip icon petals p5" id="6" title="My Tools & Technology Skills"></div>
		<div class="tiptip icon petals p6" id="7" title="My Health & Spirituality Skills"></div>
	</div>
	<div id="skillslist">
		<div id="overview">
			<div id="totalskills" class="tiptip" title="All the skills that <?php echo members_get_info('nombre', $userid); ?> has">
				<?php echo members_get_total_skills($userid);?> Skills
			</div>
			<div id="grade" class="tiptip" title="Average Grade of Skills ">
				<?php echo members_get_flower_grade($userid);?> %
			</div>
		</div>
		<?php if($myprofile){?>
				<?php if(members_get_skill_count($userid) == 0){?>
					<style>#flower{display:none}</style>
					<button class="green addfirstskill addskill" >Add First Skill</button>
					
			<?php }else{?>
				<button class="green addskill" onclick ="$(this).parent().find('a.manageskills').trigger('click');">Add Skill</button>
				<a href="<?php echo _VIEWS_URL_ ?>members/flower/manageskills.php?userid=<?php echo $userid?>" class="manageskills iframe fancylink"></a>
		<?php 	}//end else
			}//enf if?>
	</div>
	<flower>
		<?php
		for($x=1;$x<8;$x++){
			$petalname = get_petal_name($x); 
			$petalclass = get_petal_class($x);
			$skills = members_get_skills_by_petal($userid,$x);
			$noskills = members_get_no_skills($userid, $x);
			$petalgrade = members_get_petal_grade($userid, $x);?>
			<div id="p<?php echo $x?>" class="<?php echo $petalclass ?>" >
				<petalicon></petalicon>
				<span id="petalName"><?php echo $petalname ?></span>	
				<span id="noSkills"><?php echo $noskills?> skills</span>
				<span id="percSkills"><?php echo $petalgrade?> % </span>
					<?php foreach ($skills as $i => $value){?>
						<skill>
							<input type="hidden" id="skillid" value="<?php echo $skillid = $skills[$i]['id']?>">
							<name><?php if($myprofile){ echo '<span class="icon delete skill"></span>'; } echo $skills[$i]['name']?></name>
							<grade><?php echo $skills[$i]['grade']?> %</grade>
							<description><?php echo $skills[$i]['description'] ?><span id="showreferences"><span class="ui-icon ui-icon-comment"></span>Show References</span></description>
							<?php $references = members_get_skill_ref($userid, $skillid);
							foreach ($references as $key => $value) { ?>
								<reference>
									<userid><?php echo $references[$key]['user_from'];?></userid>
									<avatar><a href="#"><?php echo $references[$key]['user_avatar'];?></a></avatar>
									<username><?php echo $references[$key]['user_name'];?></username>
									<description><?php echo $references[$key]['description'];?></description>
									<refgrade><?php echo $references[$key]['grade'];?> %</grade>
								</reference>
							<?php	}?>
							<?php 
								if(!$myprofile && !members_check_reference($userid, $skillid)){?>
								<button class="green reference tiptip" title="Leave a reference if you know <?php echo members_get_info('nombre',$userid)?>">leave reference</button>
							<?php }?>
							
							
						</skill>
					<?php }// End foreach skills ?>
			</div>
		
		<?php 
		}// End Petals For?>
	</flower>
</div><!--Petal list-->