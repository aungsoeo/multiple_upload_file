@extends('master')

@section('content')
<script type="text/javascript">
$(document).ready(function() {
    getData("showinvoice");
});
 
function getData(urlval){
    $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: urlval,             
        dataType: "html",   //expect html to be returned                
        success: function(data){                    
            $(".output").html(data); 
            
            $( ".output .pagination li a" ).click(function(e){
                e.preventDefault();
                getData($(this).attr('href'));
            });

        }
    });
}
</script>
		<h1 class="text-center">Invoice List</h1>
	<div id="ctr_ajax_view" class="container output" style="margin-top: 50px;">
		
	</div>


@endsection