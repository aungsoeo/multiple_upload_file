@extends('master')

@section('content')
<script type="text/javascript">
	$(document).ready(function() {
    $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "edit/{id}",             
        dataType: "html",   //expect html to be returned                
        success: function(data){                    
            $(".edit_tpl").html(data); 
        }
    });

});
</script>
		<div class="container edit_tpl">
			
		</div>
@endsection