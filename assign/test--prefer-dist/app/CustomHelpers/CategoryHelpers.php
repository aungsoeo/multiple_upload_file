<?php
namespace App\CustomHelpers;
use App\Product;
use App\Controller\ProductController;
class CategoriesHelpers
{
	public function show_sub_category()
	{	
		echo "hello";
		exit();
		$j=1;
		$output=Product::where('parent_id','=',0)->get();
		foreach($output as $c)
		{	
			echo "-".$c->name;
			echo "<br>";
			SubCategories($c->id);
     	}
	}

	public static function SubCategories ($id)
	{	global $j;
		$cats=Product::where('parent_id','=',$id)->get();
		 $j++;
		foreach($cats as $s)
		{
		  for($i=0;$i<$j;$i++)
			{
				echo "-- ";				
			}
			echo $j.$s->name;
          	echo "<br>";
          SubCategories($s->id);          	        
     	}
     	$j=$j-1;  
	}	

	
}
?>