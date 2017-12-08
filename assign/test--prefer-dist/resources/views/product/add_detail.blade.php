@extends('master')

@section('content')
	<div class="form-group" style="margin-top: 20px;">
	 <input type="hidden" name="_token"  id="ctr_token" value="<?php echo csrf_token() ?>">
	  <label>Name</label>
	  <input type="text" class="form-control name" style="width: 400px;">
	  <label>Photo</label>
	  <input type="file" class="form-control photo" style="width:400px;">
	  <br>
	  <label>Select Category</label>
	  <select style="width:400px;" class="form-control cat">
	  	<option value="0">Please select category</option>
	  	{!! CategoriesFunctions::show_sub_category(); !!}
	  </select>
	  <br><br>
	 
	  <input type="button" class="btn btn-success product_save" value="Save">
	</div>
	<script type="text/javascript">

		$(".cat").change(function(){
			$val=$(this).val();
		});

	jQuery(".product_save").click(function(){
			items = [];
			arr = {
					product_name : $('.name').val(),
					product_photo : $('.photo').val(),
					product_category : $val
			};
		items.push(arr);			
		jQuery.ajax({
				url : "product_save",
				type : "POST",
				data : { product : items, _token : $('#ctr_token').val() },
				dataType: "json",
		   
		});		
    });
</script>

@endsection