<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Validator;
class Productscontroller extends Controller
{
    public function create (Request $request)
 { 
  $rules=array(
    "name"=>"required|min:2|max:9" , 
    "price"=>"required|min:2|max:9",
   "quantity"=>"required|min:2|max:9",
   "end_date"=>"required",
   "photo"=>"required",
   "comunication"=>"required|min:2|max:10",
   "category_id"=>"required"
  );
  $validator=Validator::make($request->all() , $rules);
  if($validator->fails()){
    return $validator->errors();
  }
  else{
   $product = new Product;
   $product->name=$request->name;
   $product->price=$request->price;
   $product->quantity=$request->quantity;
   $product->end_date=$request->end_date;
   $product->photo=$request->photo;
   $product->comunication=$request->comunication;
   $product->category_id=$request->category_id;
   $result=$product->save();
   if($result){
    return ["Result"=>"data has been saved"];
 }
 return ["Result"=>"operation failed"];
}
 }


 public function index()
 {
   return Product::all();
 }

 public function show($id)
 { 
    return Product::find($id);
    
 }

 public function update (Request $request)
 { 
  $rules=array(
    "name"=>"required|min:2|max:9" , 
    "price"=>"required|min:2|max:9",
   "quantity"=>"required|min:2|max:9",
   "photo"=>"required",
   "comunication"=>"required|min:2|max:9",
   "category_id"=>"required"
  );
  $validator=Validator::make($request->all() , $rules);
  if($validator->fails()){
    return $validator->errors();
  }
  else{
   $product= Product::find($request->id);
   $product->name=$request->name;
   $product->price=$request->price;
   $product->quantity=$request->quantity;
   $product->photo=$request->photo;
   $product->comunication=$request->comunication;
   $product->category_id=$request->category_id;
   $result=$product->save();
   if($result){
    return ["Result"=>"data has been updated"];
 }
 return ["Result"=>"operation failed"];
 }
}

public function delete($id)
{
   $product= Product::find($id);
   $result=$product->delete();
   if($result){
    return ["Result"=>"data has been deleted"];
 }
 return ["Result"=>"operation failed"];

}
public function search($name)
{

return Product::where("name","like","%".$name."%")->get();
}


}
