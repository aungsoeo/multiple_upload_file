<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Classes\helpers;
use App\Http\Requests;
use App\MultipleUpload;
//use App\Http\Controllers\push();
class MultipleUploadController extends Controller
{
	public function photo()
	    {
	        return view('photo.photoinsert');
	    }

    public function save(Request $request)
	    {	
	    	$product_name=$request['product_name'];
	    	$price=$request['price'];
		    $images=array();
		    if($input=$request['files'])
		    {
		        foreach($input as $file)
		        {
		          $name = $file->getClientOriginalName();
		          $file->move('image', $name);
		          $images[] = $name;
		        }
		    }
		    $data = array(
	              'name'  => $product_name,
	              'price' => $price,
	              'image'=> implode(",",$images)
	              );
	          MultipleUpload::insert($data);
	          return view('photo.photoinsert');	   
	    }
	public function show()
		{
			$output=MultipleUpload::get();
			return view('photo.ajaxshow')->with('output',$output);
		}
	public function edit($id)
	{
		$output=MultipleUpload::where('id','=',$id)->get();
		//dd($output);
		return view('photo.edit')->with('data',$output);
	}
	public function update(Request $request){
	      $remained_photo = $request['remained_photo'][0];  
	      //echo $remained_photo;
	       if($input=$request['files'])
		    {
		        foreach($input as $file)
		        {
		          $name = $file->getClientOriginalName();
		          $file->move('image', $name);
		          $remained_photo=$remained_photo.",".$name;
		        }
		    }
		    //dd($remained_photo);
	       $insert_data = array(
	            'name'  => $request['product_name'],
	            'price'   => $request['product_price'],
	            'image'=>$remained_photo
	            );
	        MultipleUpload::where('id', $request['id'])->update($insert_data);
	       return view('photo.show');
	}

}
