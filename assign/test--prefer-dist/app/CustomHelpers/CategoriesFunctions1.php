<?php
namespace App\CustomHelpers;
use App\Product;
use App\Controller\ProductController;
class CategoriesFunctions1
{
	public static function show_sub_category()
	{	
		$j=1;
		$output=Product::where('parent_id','=',0)->get();
		foreach($output as $c)
		{	
			echo "<option value='$c->id'>"."-".$c->name."</option>";			
			 self::SubCategories($c->id);			
     	}
	}

	public static function SubCategories ($id)
	{	global $j;
		$cats=Product::where('parent_id','=',$id)->get();
		if($cats!=null){
			 $j++;
			foreach($cats as $s)
			{
				echo "<option value='$s->id'>";
			  for($i=0;$i<$j;$i++)
				{
					echo "-- ";	
				}
				echo $j.$s->name."</option>";
	         	self::SubCategories($s->id);          	        
	     	}
	     	$j=$j-1;  
	    }
	    else{
	    	echo "0";
	    }
	}
	public static function parent_categories()
	{
		$parent_cat=Product::where('parent_id','=',0)->get();
		foreach($parent_cat as $p_cat)
			{
				echo "<option value='$p_cat->id'>".$p_cat->name."</option>";
			}
	}

	public static function edit_sub_category()
	{	
		$j=1;
		$output=Product::where('parent_id','=',0)->get();
		foreach($output as $c)
		{	
			echo "--".$c->name.'&nbsp;&nbsp;<button class="edit" value="'.$c->id.'">edit</button>';
			echo "<br><br>";		
			self::editSubCategories($c->id);			
     	}
	}

	public static function editSubCategories ($id)
	{	global $j;
		$cats=Product::where('parent_id','=',$id)->get();
		 $j++;
		foreach($cats as $s)
		{
		  for($i=0;$i<$j;$i++)
			{
				echo "----";	
			}
			echo $j.$s->name.'&nbsp;&nbsp;<button class="edit" value="'.$s->id.'">edit</button>';
			echo "<br><br>";
         	self::editSubCategories($s->id);          	        
     	}
     	$j=$j-1;  
	}		
}
?>