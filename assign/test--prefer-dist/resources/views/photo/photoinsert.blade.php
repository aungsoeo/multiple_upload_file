@extends('master')

@section('content')
<div class="panel panel-primary" style="margin-top: 30px;">
    <div class="panel-heading"><h3 style="text-align: center;">New Products</h3></div>
        <div class="panel-body">
			<div class="container form-group" style="margin-top: 30px;">
				<form  id="multipleupload" action="{{ url('saveall') }}" enctype="multipart/form-data">
				<input type="hidden" name="_token"  id="ctr_token" value="<?php echo csrf_token() ?>">
				<label> Name:</label>
				<input type="text" name="product_name" class="form-control name" style="width: 1000px;">
				<label>Price:</label>
				<input type="number" name="price" class="form-control price" style="width:1000px;">
				<label>Images:</label>
				<input type="file" class="form-control" id="photo" name="files[]"style="width:1000px;" multiple>
				<input type="submit" value="Save" class="btn btn-primary" style="margin-top: 30px;">
			   <div class="progress-bar" style="width:0px;height: 3px;background: red;display: block; transition: width .3s;"></div>
			   <div class="status"></div>
				</form>
				
			</div>
		</div>
</div>

<script type="text/javascript">

	$('#multipleupload').submit(function(e){
		e.preventDefault();
		var form_data=new FormData(this);
		$.ajax({
			xhr: function(){
              var xhr = $.ajaxSettings.xhr();
              if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(event) {
                      var percent = 0;
                      var position = event.loaded || event.position;
                      var total = event.total;
                      if (event.lengthComputable) {
                          percent = Math.ceil(position / total * 100);
                      }
                      //update progressbar
                      $(" .progress-bar").css("width", + percent +"%");
                      $(" .status").text(percent +"%");
                  }, true);
              }
              return xhr;
          },
            type: 'POST',
            url: $(this).attr('action'),
            cache:false,
            contentType: false,
            processData: false,
            data: form_data,
            success : function(data){
            	alert('done');
            },          
            
		});
	});
</script>

		                     

@endsection