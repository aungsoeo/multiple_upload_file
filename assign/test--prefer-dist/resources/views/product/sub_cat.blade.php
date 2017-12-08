Please select Sub-categories
<select class="form-control sub_categories" style="width:400px;">	
	<option value="0">Please select Categories</option>
	<option value='{{$id}}'></option>
	{!! CategoriesFunctions::SubCategories($id); !!}	
</select> 
<br><br>