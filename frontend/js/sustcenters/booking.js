$(document).ready(function(e){
	
// Sets the width of the elements in page to avoid line break
	totalblocks = 0;
	$('.datesavailable:first .dateblock').each(function(e){
		totalblocks ++;
	});
	totalwidth = 650 + totalblocks * 60;
	$('datelabels').width(totalwidth - 420);
	$('room').css('width', totalwidth);

//	Delete elements from mybooking
	grandtotal=0;
	$('.delete').live('click',function(e){
		itemroomname = $(this).parent().find('.item').html();
		itemprice = $(this).parent().find('.total').html();
		itemprice = parseFloat(itemprice.replace(/\./g, '').replace(/,/g,'.').replace(/[^\d\.]/g,''), 10);
		$('room').each(function(e){
			temproomname = $(this).find('.name').html();
			if (temproomname === itemroomname){
				$(this).find('.guests select').fadeIn(200);
			}
		});
		grandtotal -= itemprice;
		$('#totals .grandtotalvalue').html("$ "+grandtotal);
		$('#totals .amountpayablevalue').html("$ "+grandtotal*0.1);
		if (grandtotal === 0){
			$('.mybooking').slideUp(100);
		}
		$(this).parent().remove();
	});
	$('button').click(function(e){
			i = 1; // iteration counter
			var items='', guests='', totals='';
			$('.roomitem .item').each(function(e){
				value = $(this).html();
				items += 'itemname' + i + '='+value+'&';
				i++;
			});
			i=1;
			$('.roomitem .guests').each(function(e){
				value = $(this).html();
				guests += 'guestsitem' + i + '='+value+'&';
				i++;
			});
			i=1;
			$('.roomitem .total').each(function(e){
				value = $(this).html();
				value = parseFloat(value.replace(/\./g, '').replace(/,/g,'.').replace(/[^\d\.]/g,''), 10);
				totals += 'totalsitem' + i + '='+value+'&';
				i++;
			});
			itemdata = items + guests + totals;

			bookingpaymenturl = viewsurl + "sustcenters/booking/bookingpayment.php?scname="+scname+"&dateto="+dateto+"&datefrom="+datefrom+"&numberofitems="+i+"&"+itemdata;
		   document.location.href=bookingpaymenturl;
	});
// Add items to mybooking
	function updateTotals() {
			guests = $(this).val();
			price = $(this).parent().parent().find('.price').html();
			roomname = $(this).parent().parent().find('.name').html();
			price = parseFloat(price.replace(/\./g, '').replace(/,/g,'.').replace(/[^\d\.]/g,''), 10);
			total = price * guests;
			if (total > 0){	
				$('.mybooking').slideDown(100);
				grandtotal += total;		
				$('#totals items').append('<div class="roomitem"><div class="item">'+roomname+"</div><div class='guests'>"+guests+"</div><div class='total'>$"+total+"</div><div class='icon delete tiptip' title='Delete Item'></div></div>");
				$(this).fadeOut(200);
				$('#totals .grandtotalvalue').html("$ "+grandtotal);
				$('#totals .amountpayablevalue').html("$ "+grandtotal*payableperc);
			}
			
	 }
	
    $("select").change(updateTotals);
    updateTotals();
});