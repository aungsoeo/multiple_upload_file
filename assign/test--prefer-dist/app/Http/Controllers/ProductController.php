<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Classes\helpers;
use App\Http\Requests;
use App\Product;
class ProductController extends Controller
{
	public function save(Request $request)
	{	
		$data[] = array(
                    'name'=>$request->name,
                    'parent_id'=>$request->parent_cat ,
        );
		Product::insert($data);
		return('ok');
	}
		
	public function save_product(Request $request)
	{
		$product=$request->product;
		return($product);
	}

	public static function edit($id)
	{	
	    $cat=[];

		while($id!=0)
		{
			$output=Product::where('id','=',$id)->get();	
			$cat[]=$output[0]['name'];	
			self::rev_edit($output[0]['parent_id']);			
		}
		return view('product.tpl')->with('output',$res_out);
	}
	public static function rev_edit($id)
	{
		$rev_out=Product::where('parent_id','=',$id)->get();	
		foreach($rev_out as $output){
			$cat=$output['name'];
		}
	}

	public function sub_cat($id)
	{
		return view('product.sub_cat')->with('id',$id);
	}


}
