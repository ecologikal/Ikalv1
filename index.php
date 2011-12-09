
<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); ?>
<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="utf-8" /> 
        <title>Ecologikal</title> 
		
		<?php if (function_exists('load_css_files')){ $view= "index";load_css_files($view);} ?>
		<?php if (function_exists('load_js_scripts')){ load_js_scripts($view);$js_loaded=true;} ?>

    </head> 
	    <body>
		<background>
			
		</background>
		<div id="wrapperindex">
			<headerindex>
						<toolbar>
							
							<accountindex>
								<?php if (is_logged_in()){?>
								<div class="icon tiptip" id="account" title="My Account"></div>
								<div class="icon tiptip" id="notifications" title="Notifications">
									<nomessages>
										18
									</nomessages>
								</div>
								<div class="icon tiptip" id="messages" title="My Messages">
									<nomessages>
										12
									</nomessages>
								</div>
									
								<div id="accountlist">
									<ul>
										<li><a  href="<?=_VIEWS_URL_?>members/member_profile.php">Profile</a></li>
										<li><a  href="#">Settings</a></li>
										<li><a  href="?command=logout">Log out</a></li>
									</ul>
								</div>
								<?php }else{
										 include(_ROOT_PATH_."login/login_form.php");
										?>
									<div id="login_btn" class="icon tiptip" title="Login"></div>
									
								<?php }?>

							</accountindex>
							

						</toolbar>
						<logoindex></logoindex>
			</headerindex>

			<index>
	
					<h1>Travel, Live, Be and Play...</h1>
					<mainsection>
						<mainquote>Travel to amazing and natural destinations. Live the Ecologikal experience while making a positive impact in the environment and your everyday life.</mainquote>
						<button class="green" id="register">JOIN US</button>
					</mainsection>
					<gamesection>
						<videoimage onclick="$('a.introvideo').trigger('click');"></videoimage>
						<a id="vimeo_test2" href="http://vimeo.com/17348288" class="introvideo"></a>
						<h2 class="play">Play the game</h2>
						<gamequote> With Ecologikal you can develop your skills while sharing <strong>useful</strong> info, traveling as <strong>volunteer</strong> or ecotourist to <a href="#" class="tiptip" title="Click to learn what are these?">Sustainable centers</a>. Each action adds up in <strong>ecopoints</strong></gamequote>
						<arrow1></arrow1>
					</gamesection>
					<kinsection>
						<kinimage></kinimage>
						<h2 class="kins">Earn kins</h2>
						<kinsquote>
							With your <strong>ecopoints</strong> you can enjoy lots of benefits that other members are willing to exchange for
						</kinsquote>
						<arrow2></arrow2>
					</kinsection>
					<travelsection>
						<h2>Exchange your kins</h2>
						<travelquote>More kins = more traveling benefits, you can use your kins as an <a href="#">alternative currency</a></travelquote>
						<mapimage></map>
						<arrow3></arrow3>
					</travelsection>
					<testimonials>
									<h2>-Testimonials-</h2>
									<testimonial>
										<picture>
											<img src="<?php echo _IMAGES_URL_.'testimonial1.png'?>"></img>
										</picture>
										<description>
											"I wanted to feel rooted again and feel my connection with nature"
											<author>Tim Schneider, Professional Artist (Germany)</author>
										</description>
									</testimonial>
									<testimonial>
										<picture>
											<img src="<?php echo _IMAGES_URL_.'testimonial2.png'?>"></img>
										</picture>
										<description>
										"I wish I had knew about ecovillages before! There is so much to learn!"
											<author>Minnie (Canada)</author>
										</description>
									</testimonial>
									<testimonial>
										<picture>
											<img src="<?php echo _IMAGES_URL_.'testimonial3.png'?>"></img>
										</picture>
										<description>
					"As soon as I left home and started traveling, I realized the best place to grow and learn is out there, in nature and in community."						<author>Enrico, (Italy)</author>
										</description>
									</testimonial>
					</testimonials>

			</index>
		</div><!--Wrapper Index -->
<?php 	include(_VIEWS_PATH_."_registration/member_reg.php");
		include("footer.php")?>