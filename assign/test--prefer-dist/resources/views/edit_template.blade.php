@extends('master')

@section('content')
	<script>
		$(document).ready(function() {
			$(".datepicker").datepicker();
		});
		var $sum=0;
		$gtotal=0;
		var additem=0;
		var removeitem=0;
		var remove_array=[];
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
				<?php $num=1;?>
				@foreach($edit_data as $output)
				<tr class="tr_clone">	
					<input type="hidden" class="item_id" value="{{$output->id}}">
					<td><span id="num">{{$num}}</span></td>
					<td><input type="text" class="datepicker" value="{{$output->date}}"></td>
					<td><input type="text" class="item" value="{{$output->item_name}}"></td>
					<td><input type="text" class="qty" value="{{$output->qty}}"></td>
					<td><input type="text" class="price" value="{{$output->price}}"></td>
					<td><input type="text"  class="totalvalue" value="{{($output->qty)*($output->price)}}"></span></td>
					<td><input type="button" name="add" value="Add" class="tr_clone_add">
					<input type="button" name="delete" value="Remove" class="tr_remove"></td>			
				</tr>	
				<?php $num++; ?>
				@endforeach		
			</tbody>	
		</table>

			<div class="gg" style="margin-left: 50%;">
				<input type="hidden" class="inv_id" value="{{$invoice_data[0]['id']}}">
				<span>Discount</span>
				<input type="number" class="discount" value="{{$invoice_data[0]['discount']}}">
				<span>Grandtotal</span>
				<input type="text" class="grandtotal" value="{{$invoice_data[0]['grandtotal']}}"><br>
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
			$del_item=$tr.find('.item_id').val();
			remove_array.push($del_item);
			$tr.remove();
			removeitem++;
			refreshTable();
		});

		$('#table-data').delegate('.tr_clone_add', 'click', function() {			
			var $tr  = $(this).closest('.tr_clone');
			var $clone = $tr.clone();
			$clone.find('.item_id').val('');
			$clone.find(':text').val('');
			$clone.find('.totalvalue').html('');
			$clone.find('.datepicker').removeClass('hasDatepicker')
									 .removeAttr('id');
			$clone.find('.datepicker').datepicker();					
			$('#table-data tbody').append($clone);			
			refreshTable();	
			additem++;	

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
				item_id : jQuery(this).find('.item_id').val(),
				inv_date : jQuery(this).find('.datepicker').val(),
				inv_item : jQuery(this).find('.item').val(),
				inv_qty :  jQuery(this).find('.qty').val(),
				inv_price : jQuery(this).find('.price').val(),
			};
			items.push(arr);
			j++;
			
		});
		invoice={
			inv_id : jQuery('.gg').find('.inv_id').val(),
			inv_dis : jQuery('.gg').find('.discount').val(),
			inv_gtotal : jQuery('.gg').find('.grandtotal').val()
		};
		jQuery.ajax({
			url : "http://localhost/assign/test--prefer-dist/public/update",
			type : "POST",
			data : {item : items,totalinvoice : invoice,addeditem : additem,removed_item : removeitem,removed_array : remove_array, _token : $('#ctr_token').val() },
			dataType: "json",
	   
	});
	});
	

	});		
	function refreshTable(){
	  var j = 1;
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