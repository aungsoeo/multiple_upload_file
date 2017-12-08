	<select class="parent_category">
		<option value="0">Please Select Category</option>
		@foreach($sub_cat as $output)
		  	<option value="{{$output->id}}" class="parent_id">{{$output->name}}</option>
		 @endforeach 
	</select>   
