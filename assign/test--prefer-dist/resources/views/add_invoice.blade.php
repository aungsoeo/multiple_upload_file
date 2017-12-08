@extends('master')

@section('content')
<script>
	$(document).ready(function() {
		$(".datepicker").datepicker();
	});
	var $i=2;
	var $sum=0;
	$gtotal=0;
	
</script>
	<div class="container">

		<table class="table table-bordered" id="table-data" style="margin-top: 40px;">
			<thead>
				<tr>
					<th >No</th>
					<th class="text-center">Date</th>
					<th class="text-center">Item</th>
					<th class="text-center">Quality</th>
					<th class="text-center">Price</th>
					<th class="text-center">Total</th>
					<th class="text-center">Comment</th>
				</tr>
			</thead>
			<tbody>
				<input type="hidden" name="_token"  id="ctr_token" value="<?php echo csrf_token() ?>">
				<tr class="tr_clone">
					
					<td ><span id="num">1</span></td>
					<td><input type="text" class="datepicker"></td>
					<td><input type="text" class="item"></td>
					<td><input type="text" class="qty"></td>
					<td><input type="text" class="price"></td>
					<td><input type="text" class="totalvalue"></td>
					<td><input type="button" name="add" value="Add" class="tr_clone_add">&nbsp;&nbsp;
					<input type="button" name="delete" value="Remove" class="tr_remove"></td>			
				</tr>			
			</tbody>	
		</table>
			<div class="gg" style="margin-left: 50%;">
				<span>Discount</span>
				<input type="number" class="discount">
				<span>Grandtotal</span>
				<input type="text" class="grandtotal"><br>
			</div>			
			<input type="button" value="Save" class="inv_save" style="margin-left: 95%;">
	</div>	
<script type="text/javascript">
		
$(document).ready(function(){


		$('#table-data').delegate('.price', 'keyup', function() {
			var $tr = $(this).closest('tr');       
			$q=$tr.find('.qty').val();   
			$p=$tr.find('.price').val();
			var $total=$p*$q;
			$sum+=$total;
			$tr.find('.totalvalue').val($total);

		});

		$('#table-data').delegate('.tr_remove','click',function(){
			var $tr=$(this).closest('.tr_clone');
			$tr.remove();
			refreshTable();
		});

		$('#table-data').delegate('.tr_clone_add', 'click', function() {			
			var $tr  = $(this).closest('.tr_clone');
			var $clone = $tr.clone();
			$clone.find(':text').val('');
			$clone.find('.totalvalue').html('');
			$clone.find('.datepicker').removeClass('hasDatepicker')
									 .removeAttr('id');
			$clone.find('.datepicker').datepicker();			
			$clone.find('#num').html($i);		
			$('#table-data tbody').append($clone);			
			$i++;
			refreshTable();			
		}); 

		$('.discount').keyup(function() {
			var $dis=$('.discount').val();
			$gtotal=$sum*(1-($dis/100));
			$('.grandtotal').val($gtotal);
		});  		

		jQuery(".inv_save").click(function(){
		//alert('hello');
		items = [];
		invoice=[];
		j=1;
		jQuery(".tr_clone").each(function(){    
			arr = {
				inv_order : j,
				inv_date : jQuery(this).find('.datepicker').val(),
				inv_item : jQuery(this).find('.item').val(),
				inv_qty :  jQuery(this).find('.qty').val(),
				inv_price : jQuery(this).find('.price').val()
			};
			items.push(arr);
			j++;
		});
		invoice={
			inv_dis : jQuery('.gg').find('.discount').val(),
			inv_gtotal : jQuery('.gg').find('.grandtotal').val()
		};
		jQuery.ajax({
			url : "http://localhost/assign/test--prefer-dist/public/save",
			type : "POST",
			data : {item : items,totalinvoice : invoice, _token : $('#ctr_token').val() },
			dataType: "json",
	   
	});
	});
	

	});		
function refreshTable(){
				  var j = 1;
				  // subtotal = 0;
				  // grandtotal = 0;
				  // total=0;
				  $("#table-data > tbody > tr").each(function(){
				  	var row_no = $(this).find('#num').text();
	        	    var date=$(this).find('.datepicker').val();
				    var item=$(this).find('.item').val();
				    var qty=$(this).find('.qty').val();
				    var price=$(this).find('.price').val();
				    var total=$(this).find('.totalvalue').val();
				    $(this).find('#num').text(j);
				    $(this).find('.datepicker').val(date);
				    $(this).find('.item').val(item);
				    $(this).find('.qty').val(qty);
				    $(this).find('.price').val(price);
				    $(this).find('.totalvalue').val(total);	
				    j++;			    
				});
				}
</script>



@endsection