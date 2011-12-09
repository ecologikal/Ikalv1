<?php require_once($_SERVER['DOCUMENT_ROOT']."/ecologikalv1/_config/bootstrap.php"); ?>
<?php
$user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
if($user_id=="")$user_id=$GEN_USER_ID;
?>

<script>
	$(document).ready(function(e){
       
		// Filters Select

		$("select").change(function () {
		          $("select option:selected").each(function () {
						if($(this).hasClass('pop')) {$('.subfilter').hide();$('select.subfilter#pop').show();}
						if($(this).hasClass('date')){$('.subfilter').hide();$('select.subfilter#date').show();}
						if($(this).hasClass('geo')) {$('.subfilter').hide();$('span.subfilter#geo').show();}
		              });
		        })
		        .trigger('change');
		
		load_html("#stream_comments",'<?php echo _VIEWS_URL_?>members/stream/members_stream_get_messages.php?user_id=<?php echo $user_id;?>&q='+ 1*new Date());
	});
</script>

<div id="stream">
	<h1><div id="stream_btn" class="pageicon"></div>Tree of Knowledge</h1>
	
	<div id="filter"><p>Filter Knowledge By</p>
		<select id="mainfilter">
			<option class="pop">Popularity</option>
			<option class="date">Date</option>
			<option class="geo">GeoLocation</option>
		</select>
		<select class="subfilter" id="cat">
			<option>Building</option>
			<option>Community Governance</option>
			<option>Finance & Economics</option>
			<option>Land & Nature</option>
			<option>Culture & Education</option>
			<option>Tools & Technology</option>
			<option>Health & Spirituality</option>
		</select>
		<select class="subfilter" id="pop">
			<option>Best Rated</option>
			<option>Most Commented</option>
		</select>
		<select class="subfilter" id="date">
			<option>Newest</option>
			<option>Oldest</option>
		</select>
		<span class="subfilter" id="geo">Within <select>
				<option>10</option>
				<option>20</option>
				<option>50</option>
				<option>100</option>
			</select>
			<select>
				<option>km</option>
				<option>miles</option>
			</select>
		</span>
		
		<button>My Tree</button>
		<button>The Forest</button>
	</div>

<div id="stream_comments">
    <div id="stream_comments2">
    </div><!--stream_comments2-->
</div><!--stream_comments-->
		
</div>