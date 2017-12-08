

<form method="post" id="multipleupload" action="updatephoto" enctype="multipart/form-data">
<table class="table table-striped table-bordered table-hover edit_table">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>Name</th>
         <th>Price</th>
         <th>Photos</th>
         <th colspan="2">Action</th>
     </tr>
     </thead>
     <tbody>
     <?php
        $images = array();
        $images[] = explode(",", $data[0]['image']);
      ?>
         <tr>          
          <input type="hidden" name="_token"  id="ctr_token" value="<?php echo csrf_token() ?>">
          <input type="hidden"  class="original_photo" value="{{ $data[0]['image'] }}">
          <input type="hidden" name="id" value="{{ $data[0]['id'] }}" >
             <td class="product_id">{{ $data[0]['id'] }}</td>
             <td><input type="text" value="{{ $data[0]['name'] }}" name="product_name"></td>
             <td><input type="number" value="{{ $data[0]['price'] }}" name="product_price"></td>
             <td>
               <?php
                  for($i=0; $i<count($images[0]); $i++){
                ?>
                <div class="photo" style="display: inline;">
               <img src="{{asset('image/'.$images[0][$i])}}" height="35" width="30" class="image" >
               <a href="#" photosrc="{{asset('image/'.$images[0][$i])}}" class="imagestore">&times;</a>
               </div>
               <?php
                  }
                ?>
               <input type="file" class="form-control" id="photo" name="files[]" multiple>
             </td>
             <td>
              <input type="submit" value="Update" class="btn btn update">
             </td>
          <input type="hidden" name="remained_photo[]" class="remain_photo" >
         </tr>
     </tbody>
</table>
</form>
<script type="text/javascript">
   items = [];
  $('.photo').delegate('.imagestore', 'click', function() {     
    var value=$(this).attr('photosrc'); 
    var finalvalue=value.split("http://localhost/assign/test--prefer-dist/public/image/").join("");$(this).closest('.photo').find('.image').hide();
    $(this).closest('.photo').find('.imagestore').hide();   
       items.push(finalvalue); 
       $('.remain_photo').val(items);
  });
  var form = $('#multipleupload');    
     form.submit(function() {
      $r=$('.remain_photo').val();
      if($r==''){
      $p=$('.original_photo').val();
      $('.remain_photo').val($p);
    }    
    //alert($p);  
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: { form_data : new FormData(this),_token : $('#ctr_token').val()},
        });
    });
</script>