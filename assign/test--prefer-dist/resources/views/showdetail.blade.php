@extends('master')

@section('content')

<div class="container">
	<h1 class="text-center">Item Lists</h1>
	<table class="table table-bordered" style="margin-top: 40px;">
		<thead>
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Date</th>
				<th class="text-center">Item Name</th>
				<th class="text-center">Quantity</th>
				<th class="text-center">Price</th>
				<th class="text-center">Total</th>
			</tr>
		</thead>
		<tbody>
			@foreach($inv_detail as $output)
			<tr>
				<td class="text-center">{{$output->id}}</td>
				<td class="text-center">{{$output->date}}</td>
				<td class="text-center">{{$output->item_name}}</td>
				<td class="text-center">{{$output->qty}}</td>
				<td class="text-center">{{$output->price}}</td>
				<td class="text-center">{{$output->qty*$output->price}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


@endsection