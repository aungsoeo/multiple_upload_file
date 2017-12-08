<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>Name</th>
         <th>Price</th>
         <th>Photos</th>
         <th colspan="3">Action</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($output as $data)
     <?php
        $images = array();
        $images[] = explode(",", $data['image']);
      ?>
         <tr>
             <td>{{ $data->id }}</td>
             <td>{{ $data->name }}</td>
             <td>{{ $data->price }}</td>
             <td>
               <?php
                  for($i=0; $i<count($images[0]); $i++){
                ?>
               <img src="{{asset('image/'.$images[0][$i])}}" height="35" width="30">
               <?php
                  }
                ?>
             </td>
             <td>
               <button class="btn btn-primary editphoto" value="{{$data->id}}">Edit</button>
             </td>
             <td>
              <button class="btn btn-danger delete">Delete</button>
             </td>

         </tr>
     @endforeach
     </tbody>
</table>