@extends('master')

@section('content')

<div class="col-md-6" style="margin-top: 30px;">
	<p style="font-size: 18px;">
		 {!! CategoriesFunctions::edit_sub_category(); !!}
	</p>
</div>
<div class="col-md-6" style="margin-top: 30px;" id="cc">
	<form class="form-group data">
		<input type="hidden" name="_token"  id="ctr_token" value="<?php echo csrf_token() ?>">
		<label>Name</label>
		<input type="text" class="form-control name">
		Select Parent Category
		<select class="form-control sub_category">		
		</select>
	</form>
	<div class="output">
	
	</div>
</div>

		<script type="text/javascript">
			$(document).ready(function(){
				$(".edit").click(function(){
						$val=$(this).val();	
						jQuery.ajax({
								url : "edit/"+$val,
								type : "GET",
								dataType: "html",	
								success: function(data){  
								$('.output').html(data); 
						        }	   
						});			
				});	
			});			
		</script>


@endsection