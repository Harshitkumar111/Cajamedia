<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_inventory;
use App\Models\Discount;

class ManageProductController extends Controller
{
   



// Product_catagory----------------

public function Product_category(){  
    $product= Product_category::all();  
    return view('Admin.Manage_product.product_category',compact('product'));
}
public function add_Product_category(){    
    return view('Admin.Manage_product.Add_product_category');
}
  public function savecatrgory(Request $request) {    
        $res=new Product_category;
        try {             
            $res->name=$request->input('product_category_name');
            $res->desc=$request->input('product_description_name');            
            $sucess= $res->save();
            return redirect('/product_category')->with('successs', 'Success' );            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Please Check Product Category');
          } 
    }   
    public function deletecategory(Request $request) {    
        $deleteid=$request->id;       
        $Users = Product_category::find($deleteid); 
        $category= $Users->delete($deleteid);
        if($category){
            return redirect('/product_category')->with('successs', 'delete Success');
          }else{
            return redirect()->back()->with('error', 'Please Check Product Category');
          }
    }  
    public function editcategory($id)
    {     
        $product = Product_category::find($id);
        return view('Admin.Manage_product.edit_product_category', compact('product'));     
    }
    public function updatecategory(Request $request) {    
        $res=Product_category::find($request->id);
        try {             
            $res->name=$request->input('product_category_name');
            $res->desc=$request->input('product_description_name');  
            $sucess= $res->save();
            return redirect('/product_category')->with('successs', 'Success' );            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Please Check Product Category');
          } 
    }





















// add Product-------------------
public function addproduct(){   
    $Product_category= Product_category::all();
    $Product_discount= Discount::all();
    return view('Admin.Manage_product.addproduct',compact('Product_category','Product_discount'));
}
 
    public function saveproduct(Request $request) {    
        $res=new Product;
        $product=new Product_inventory;
        // $Product_category=
        try {             
            $res->name=$request->input('product_name');
            $res->desc=$request->input('desc');
            $res->SKU=$request->input('sku'); 
            $res->category_id=$request->input('product_category_id');
            $product->quantity=$request->input('product_quantity');
            $sucess=$product->save();
            $insertedId = $product->id;
            $res->inventoey_id=$insertedId;
            $res->price=$request->input('product_price');
            $res->discount_id=$request->input('discount_id');
            $sucess=$res->save();
         

           
            return redirect('/product')->with('successs', 'Success' );            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Somthing is went Wrong');
          } 
    }
    public function index() {    
        $product= Product::all();
        return view('Admin.Manage_product.ManageProduct',compact('product'));
    }
    public function deleteproduct(Request $request) {    
        $deleteid=$request->id; 
         
        $Users = Product::find($deleteid); 
        $Product= $Users->delete($deleteid);
        if($Product){
            return redirect('/product')->with('successs', 'delete Success');
          }else{
            return redirect()->back()->with('error', 'Please Check Product ');
          }
    } 
    public function editproduct($id)
    {     
        $product = Product::find($id);
        $Product_category= Product_category::all();
        return view('Admin.Manage_product.edit_product', compact('product','Product_category'));     
    }
    public function updateproduct(Request $request) {    
        // $res=new Product;
        $res=Product::find($request->id);
        // $product=new Product_inventory;
        try {             
            $res->name=$request->input('product_name');
            $res->desc=$request->input('desc');
            $res->SKU=$request->input('sku'); 
            $res->category_id=$request->input('product_category_id');
            $res->inventoey_id=$request->input('product_quantity');
            // $product->inventoey_id=$request->input('product_quantity');
            $res->price=$request->input('product_price');
            $res->discount_id=$request->input('discount_id');
            $sucess=$res->save();
            return redirect('/product')->with('successs', 'Update Success' );            
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Somthing is went Wrong');
          } 
    }

// product discount -----------------------------------


    public function discount() {    
        $discount= Discount::all();
        return view('Admin.Manage_product.Product_Discount.Discount',compact('discount'));
    }
  public function adddiscount() {    
        return view('Admin.Manage_product.Product_Discount.Add_Discount');
    }

    public function savediscount(Request $request){    
        $res=new Discount;       
        try {      
          $discount= Discount::Where('name','=',$request->input('product_discount_name'))->first();
          if($discount==""){
            $res->name=$request->input('product_discount_name');
            $res->desc=$request->input('product_description_name');
            $res->discount_percent=$request->input('product_percent');
            $sucess=$res->save();
          
            return redirect('/discount')->with('successs', 'successs' );     
          }else{
            return redirect()->back()->with('error', 'Discount Already Save');

          }       
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Somthing is went Wrong');
          } 
    }

    public function deletediscount(Request $request) {    
        $deleteid=$request->id; 
         
        $discount_id =Discount::find($deleteid); 
        $discount= $discount_id->delete($deleteid);
        if($discount){
            return redirect('/discount')->with('successs', 'Delete Success');
          }else{
            return redirect()->back()->with('error', 'Unsuccess');
          }
    } 
    public function editdiscount($id)
    {     
        $discount = Discount::find($id); 
        return view('Admin.Manage_product.Product_Discount.Edit_discount', compact('discount'));
    }
    public function updatediscount(Request $request){    
        $res=Discount::find($request->id);;       
        try {   
          $discount= Discount::Where('name','=',$request->input('product_discount_name'))->first();
          if($discount==""){   
            $res->name=$request->input('product_discount_name');
            $res->desc=$request->input('product_description_name');
            $res->discount_percent=$request->input('product_percent');
            $res->active=$request->input('active');
            $sucess=$res->save();
            return redirect('/discount')->with('successs', 'successs' );            
          }else{
            return redirect()->back()->with('error', 'Discount Already Save');
          }
          }
           catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error', 'Somthing is went Wrong');
          } 
    }
}
