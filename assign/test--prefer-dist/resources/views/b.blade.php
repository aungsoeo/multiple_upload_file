<div class="container">
	<table class="table table-bordered" style="margin-top: 40px;">
		<thead>
			<tr>
				<th class="text-center">Invoice-No</th>
				<th class="text-center">Discount</th>
				<th class="text-center">Grandtotal</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($inv_output as $output)
			<tr>
				<td class="text-center"><a class="fancybox-button" rel="fancybox-button" 
					href="#" data-id="{{$output->id}}">Invoice-{{$output->id}}</a>
				</td>
				<td class="text-center">{{$output->discount}}%</td>
				<td class="text-center">${{$output->grandtotal}}</td>
				<td><a href="edit/{{$output->id}}" class="btn btn-primary">Edit</a><a href="#" style="margin-left: 30px;" class="btn btn-danger">Delete</a></td>						
			@endforeach
			</tbody>
	</table>
	{{$inv_output->render()}}
	<button id="pagi" >2324</button>
</div>
<script type="text/javascript">
 $(document).ready(function() {	
	$(".fancybox-button").click(function(){
		$(this).fancybox({
		href:"detail/"+$(this).attr('data-id') ,
		type:"iframe"
	});
});
});
</script>