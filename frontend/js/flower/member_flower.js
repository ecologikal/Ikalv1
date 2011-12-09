var o = {
	init: function(){
		this.diagram();
	},
	random: function(l, u){
		return Math.floor((Math.random()*(u-l+1))+l);
	},
	diagram: function(){
		var r = Raphael('flower', 300, 275),
			rad = 12,
			defaultText = '',
			speed = 250;

	//	r.circle(150,150, 13).attr({ stroke: '2px', fill: '#fff' });


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
					case "Building & Construction":
						if($('flower div#p1').is(':hidden')){
							$('flower div').slideUp(vel);
							$('flower div#p1').fadeIn(vel);
							$('flower div#p1 skill').slideDown(vel);
						}
						break;
					case "Community Governance":
						if($('flower div#p2').is(':hidden')){
							$('flower div').slideUp(vel);
							$('flower div#p2').fadeIn(vel);
							$('flower div#p2 skill').slideDown(vel);
						}
						break;
					case "Finance & Economics":
						if($('flower div#p3').is(':hidden')){
							$('flower div').slideUp(vel);
							$('flower div#p3').fadeIn(vel);
							$('flower div#p3 skill').slideDown(vel);
						}
						break;
					case "Land & Nature Stewardship":
						if($('flower div#p4').is(':hidden')){
							$('flower div').slideUp(vel);
							$('flower div#p4').fadeIn(vel);
							$('flower div#p4 skill').slideDown(vel);
						}
						break;
					case "Culture & Education":
						if($('flower div#p5').is(':hidden')){
							$('flower div').slideUp(vel);
							$('flower div#p5').fadeIn(vel);
							$('flower div#p5 skill').slideDown(vel);
						}
						break;
					case "Tools & Technology":
						if($('flower div#p6').is(':hidden')){
							$('flower div').slideUp(vel);
							$('flower div#p6').fadeIn(vel);
							$('flower div#p6 skill').slideDown(vel);
						}
						break;
					case "Health & Spirituality":
						if($('flower div#p7').is(':hidden')){
							$('flower div').slideUp(vel);
							$('flower div#p7').fadeIn(vel);
							$('flower div#p7 skill').slideDown(vel);
						}
						break;
				}
			});
		});

	}
}
$(function(){ o.init(); });
$(document).ready(function(e){
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
		// Collapse, Display Skills when clicking on title
		$('flower div #petalName').click(function(e){
			$('skill').not(this).slideUp(200);
			if ($(this).parent().find('skill').is(':hidden')){
				$(this).parent().find('skill').slideToggle(200);
			}
		});
		// Display Petal when clicking on icon
		$('div.icon.petals').click(function(e){
			petalno = $(this).attr('id');
			if($('div#p'+petalno).is(':hidden')){
				$('flower div').slideUp(200);
				$('div#p'+petalno).fadeIn(200).find('skill').slideDown(200);
			}
		});
});