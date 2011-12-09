<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php");
 	if (function_exists('load_js_scripts')){ $view = 'sustcenter'; load_js_scripts($view);}
	
	$scname = $_GET['scname'];?>
	<link rel="stylesheet" href="<?php echo _CSS_URL_;?>flower.css" type="text/css" />
	<h1 id="title"><?php echo $scname?>'s Sustainability Index</h1>

	<div id="flowercontainer" class="container">
		
		<div id="flower"></div>

		
	</div>
	
	

	<div class="get">
		<div class="petal">
			<span class="text">Building</span>
			<input type="hidden" class="percent" value="90" />
			<input type="hidden" class="color" value="#ff3333" />
			<input type="hidden" class="noSkills" value="10" />
		</div>
		<div class="petal">
			<span class="text">Community Gov</span>
			<input type="hidden" class="percent" value="90" />
			<input type="hidden" class="color" value="#ff9933" />
			<input type="hidden" class="noSkills" value="10" />
		</div>
		<div class="petal">
			<span class="text">Finance & Economics</span>
			<input type="hidden" class="percent" value="80" />
			<input type="hidden" class="color" value="#FFE91D" />
			<input type="hidden" class="noSkills" value="10" />
		</div>
		<div class="petal">
			<span class="text">Land & Nature</span>
			<input type="hidden" class="percent" value="80" />
			<input type="hidden" class="color" value="#A4DE00" />
			<input type="hidden" class="noSkills" value="10" />
		</div>
		<div class="petal">
			<span class="text">Culture & Education</span>
			<input type="hidden" class="percent" value="45" />
			<input type="hidden" class="color" value="#33cccc" />
			<input type="hidden" class="noSkills" value="10" />
		</div>
		<div class="petal">
			<span class="text">Tools & Tech</span>
			<input type="hidden" class="percent" value="90" />
			<input type="hidden" class="color" value="#403BDC" />
			<input type="hidden" class="noSkills" value="10" />
		</div>
		<div class="petal">
			<span class="text">Health & Spirituality</span>
			<input type="hidden" class="percent" value="85" />
			<input type="hidden" class="color" value="#cc3399" />
			<input type="hidden" class="noSkills" value="10" />
		</div>
	</div><!-- Get-->
	<flower>
		<div id="p1" class = "building">
			<petalicon></petalicon>

			<span id="petalName">Building</span>	
			<span id="noSkills">10 skills</span>
			<span id="percSkills">100%</span>
			<skill>
				<name>Bioconstruction</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>

				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>77%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>80%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>67%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d14f0baee/profile_mini2.jpg" /></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>90%</grade>
				</reference>
			</skill>
			<skill>
				<name>Test Skill Health</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>97%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>95%</grade>
				</reference>
			</skill>
			<skill>
				<name>Test Skill Health</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>97%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>95%</grade>
				</reference>
			</skill>
			<skill>
				<name>Test Skill 2</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>93%</grade>
				</reference>
			</skill>

		</div>
		<div id="p2" class = "communitygov">
			<petalicon></petalicon>
			<span id="petalName">Community Gov</span>	
			<span id="noSkills">10 skills</span>
			<span id="percSkills">100%</span>
			<skill>
				<name>Test Skill Comm</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>44%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>55%</grade>
				</reference>
			</skill>
			<skill>
				<name>Test Skill Health</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>97%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>95%</grade>
				</reference>
			</skill>		
		</div>
		<div id="p3" class = "finance">
			<petalicon></petalicon>
			<span id="petalName">Finance & Economics</span>	
			<span id="noSkills">10 skills</span>
			<span id="percSkills">100%</span>
			<skill>
				<name>Test Skill Finance</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>95%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>95%</grade>
				</reference>
			</skill>	
		</div> 
		<div id="p4" class = "land">
			<petalicon></petalicon>
			<span id="petalName">Land & Nature</span>	
			<span id="noSkills">10 skills</span>
			<span id="percSkills">100%</span>
			<skill>
				<name>Test Skill Land</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>90%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>75%</grade>
				</reference>
			</skill>
			<skill>
				<name>Test Skill Health</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>97%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>95%</grade>
				</reference>
			</skill>
			<skill>
				<name>Test Skill Health</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>97%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>95%</grade>
				</reference>
			</skill>	
		</div> 
		<div id="p5" class = "culture">
			<petalicon></petalicon>
			<span id="petalName">Culture & Education</span>	
			<span id="noSkills">10 skills</span>
			</span><span id="percSkills">100%</span>
			<skill>
				<name>Test Skill Culture</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>88%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>98%</grade>
				</reference>
			</skill>	
		</div>
		<div id="p6" class = "tools">
			<petalicon></petalicon>
			<span id="petalName">Tools & Technology</span>	
			<span id="noSkills">10 skills</span>
			<span id="percSkills">100%</span>
			<skill>
				<name>Test Skill Tools</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>	
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>91%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>65%</grade>
				</reference>
			</skill>	
		</div> 
		<div id="p7" class = "health">
			<petalicon></petalicon>
			<span id="petalName">Health & Spirituality</span>	
			<span id="noSkills">10 skills</span>
			<span id="percSkills">100%</span>
			<skill>
				<name>Test Skill Health 1</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>97%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>95%</grade>
				</reference>
			</skill>
			<skill>
				<name>Test Skill Health 2</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>97%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>95%</grade>
				</reference>
			</skill>
			<skill>
				<name>Test Skill Health 3</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>97%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>95%</grade>
				</reference>
			</skill>
			<skill>
				<name>Test Skill Health 4</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>97%</grade>
				</reference>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Alex Mass</username>
					<description>I think you are very skillFull in this area</description>
					<refgrade>95%</grade>
				</reference>
			</skill>
			<skill>
				<name>Test Skill Health 5</name>
				<grade>100%</grade>
				<description>This is just a test DescriptionThis is just a test DescriptionThis is just a test DescriptionThis is just a test Description<span id="showreferences">Show References (<refnumber>)</span></description>
				<reference>
					<userid>12</userid>
					<avatar><a href="#"><img src="<?=_MEMBER_PICS_URL_?>4e39d0ac405fa/profile_mini2.jpg"/></a></avatar>
					<username>Carlos Pérez Priego</username>
					<description>I think you are very skillFull</description>
					<refgrade>97%</grade>
				</reference>
			</skill>	
		</div>
	</flower>