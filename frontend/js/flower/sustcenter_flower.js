var o = {
	init: function(){
		this.diagram();
	},
	random: function(l, u){
		return Math.floor((Math.random()*(u-l+1))+l);
	},
	diagram: function(){
		var r = Raphael('flower', 300, 300),
			rad = 12,
			defaultText = '',
			speed = 250;
		r.circle(150,150, 120).attr({ stroke: '#27A6DE', 'stroke-width':'4px', fill: '#222' });
		r.circle(150,150, 13).attr({ stroke: '2px', fill: '#fff' });


		r.customAttributes.arc = function(value, color, rad){
			var v = 3.6*value,
				alpha = v == 360 ? 359.99 : v,
				random = o.random(91, 240),
				a = (random-alpha) * Math.PI/180,
				b = random * Math.PI/180,
				sx = 150 + rad * Math.cos(b),
				sy = 150 - rad * Math.sin(b),
				x = 150 + rad * Math.cos(a),
				y = 150 - rad * Math.sin(a),
				path = [['M', sx, sy], ['A', rad, rad, 0, +(alpha > 180), 1, x, y]];
			return { path: path, stroke: color }
		}

		$('.get').find('.petal').each(function(i){
			var t = $(this), 
				color = t.find('.color').val(),
				value = t.find('.percent').val(),
				noSkills = t.find('.noSkills').val(),
				text = t.find('.text').text();

			rad += 13;	
			var z = r.path().attr({ arc: [value, color, rad], 'stroke-width': 14 });

			z.mouseover(function(){
                this.animate({ 'stroke-width': 19, opacity: 1 }, 1000, 'elastic');
                if(Raphael.type != 'VML') //solves IE problem


				this.toFront();
            }).mouseout(function(){
				this.stop().animate({ 'stroke-width': 14, opacity: 1 }, speed*4, 'elastic');

            });
			z.click(function(){
				vel = 200;
				switch(text){
					case "Building":
						$('skill').slideUp(vel);
						if($('flower div.building skill').is(':hidden'))
							$('flower div.building skill').slideToggle(vel);
						break;
					case "Community Gov":
						$('skill').slideUp(vel);
						if($('flower div.communitygov skill').is(':hidden'))
						$('flower div.communitygov skill').slideDown(vel);
						break;
					case "Finance & Economics":
						$('skill').slideUp(vel);
						if($('flower div.finance skill').is(':hidden'))
						$('flower div.finance skill').slideDown(vel);
						break;
					case "Land & Nature":
						$('skill').slideUp(vel);
						if($('flower div.land skill').is(':hidden'))
						$('flower div.land skill').slideDown(vel);
						break;
					case "Culture & Education":
						$('skill').slideUp(vel);
						if($('flower div.culture skill').is(':hidden'))
						$('flower div.culture skill').slideDown(vel);
						break;
					case "Tools & Tech":
						$('skill').slideUp(vel);
						if($('flower div.tools skill').is(':hidden'))
						$('flower div.tools skill').slideDown(vel);
						break;
					case "Health & Spirituality":
						$('skill').slideUp(vel);
						if($('flower div.health skill').is(':hidden'))
						$('flower div.health skill').slideDown(vel);
						break;
				}
			});
		});

	}
}
$(function(){ o.init(); });
$(document).ready(function(e){
		//RATE SKILLS
		beingrated=false;
		$('skill').hover(function(e){

			if (!beingrated){
				$(this).append('<button class="rateme">Rate Me!</button>').find('button.rateme').click(function(e){
					beingrated=true;
					$(this).parent().find('button.rateme').fadeOut(200);
					$(this).parent().append('<div id="gradeform"><form>How skillful do you think I am <select><option>Not Skillful</option><option>Somewhat Skillful</option><option>Skillful</option><option>Very Skillful</option></select>Leave me a reference:<textarea></textarea><button class="grade">Send Rating</button></form></div>').find('button.grade').click(function(e){
						//ACCESS TO DATABASE AND UPDATE THE VALUES
						$(this).parent().parent().fadeOut();
						beingrated = false;
						rated = true;
					});
				});
			} //Being RATED

		}, function(e){

			$(this).find('button.rateme').remove();
		});


		$('reference').hide();

		$('span#showreferences').click(function(e){

			if ($(this).parent().parent().find('reference').is(":hidden")){
				$(this).parent().parent().find('reference').fadeIn(200);
				$(this).html("Hide References");
			}else{              
				$(this).parent().parent().find('reference').hide();
				$(this).html("Show References");
			}
		});
		$('flower div #petalName').click(function(e){
			$('skill').not(this).slideUp(200);
			if ($(this).parent().find('skill').is(':hidden')){
				$(this).parent().find('skill').slideToggle(200);
			}
		});
});