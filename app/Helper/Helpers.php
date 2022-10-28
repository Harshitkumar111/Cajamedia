<?php
namespace App\Helper;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Product_inventory;
use App\Models\Product_category;
use App\Models\Discount;
use Auth;
  class Helpers
  {
    static function get_city($id=null)
	{
	    $catdata=City::where('id','=',$id)->first();
	    if($catdata){
	     return $catdata->name;
	    }else{
	        return " ";
	    }
       
    }
	static function get_state($id=null)
	{
	    $catdata=State::where('id','=',$id)->first();
	    if($catdata){
	     return $catdata->name;
	    }else{
	        return " ";
	    }
       
    }
	static function get_country($id=null)
	{
	    $catdata=Country::where('id','=',$id)->first();
	    if($catdata){
	     return $catdata->name;
	    }else{
	        return " ";
	    }
    }
	static function get_quantity($id=null)
	{
	    $catdata=Product_inventory::where('id','=',$id)->first();
	    if($catdata){
	     return $catdata->quantity;
	    }else{
	        return " ";
	    }
       
    }
	static function get_category($id=null)
	{
	    $catdata=Product_category::where('id','=',$id)->first();
	    if($catdata){
	     return $catdata->name;
	    }else{
	        return " ";
	    }
       
    }
	static function get_discount($id=null)
	{
	    $catdata=Discount::where('id','=',$id)->first();
	    if($catdata){
	     return $catdata->name;
	    }else{
	        return " ";
	    }
       
    }
  }

  ?>