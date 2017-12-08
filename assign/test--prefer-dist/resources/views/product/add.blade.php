@extends('master')

@section('content')

	<div class="form-group" style="margin-top: 30px;">
		<input type="hidden" name="_token"  id="ctr_token" value="<?php echo csrf_token() ?>">
		<label>Insert category</label>
		<input type="text" class="form-control name" style="width: 200px;"><br>
		<select class="form-control parent_category" style="width:400px;">
			<option>Please select parent category</option>
			{!! CategoriesFunctions::parent_categories(); !!}
		</select>
		<br><br>
		<div class="sub_cat"></div>
		<input type="button" class="btn btn-success product_save" value="Save">
	</div>
	<script type="text/javascript">
		$(".parent_category").change(function(){
			
				$val=$(this).val();	
				jQuery.ajax({
					url : "sub_cat/"+$val,
					type : "GET",
					dataType : "html",
					success: function(data){ 
						$('.sub_cat').html(data);						
						$(".sub_categories").change(function(){
							$sub_val=$(this).val();
						});		 
					}	   
				});
		});			

		jQuery(".product_save").click(function(){

			jQuery.ajax({
					url : "save",
					type : "POST",
					data : {parent_cat : $sub_val,name : $('.name').val(), _token : $('#ctr_token').val() },
					dataType: "json",
			   
			});
		});
	</script>
@endsection