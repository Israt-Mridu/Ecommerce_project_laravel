<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class ProductController extends Model
{
    public function addProduct(){
        return view('admin.product.add-product');
    }
    public function saveProduct(Request $request){

        $product=new Product();
        $product->product_name=$request->product_name;
        $product->category_name=$request->category_name;
        $product->brand_name=$request->brand_name;
        $product->product_description=$request->product_description;
        $product->product_price=$request->product_price;
        $product->product_image=$this->saveImage($request);
        $product->save();
        return back();

    }
    private function saveImage($request){
        $image=$request->file('product_image');
        $imageName=rand().".".$image->getClientOriginalName();
        $directory='adminAsset/upload/product-image/';
        $imgUrl=$directory.$imageName;
        $image->move($directory,$imageName);
        return $imgUrl;

    }

    public function manageProduct(){
        return view('admin.product.manage-product',['products'=>Product::all()]);
    }

    public function status($id){
        $product=Product::find($id);
        if ($product->status==1){
            $product->status=0;
            $product->save();
            return back();
        }else{
            $product->status=1;
            $product->save();
            return back();
        }
    }
    public function edit($id){
        $product=Product::find($id);
        return view('admin.product.edit',['product'=>$product]);


    }
    public function updateProduct(Request $request){
        $product=Product::find($request->product_id);
        $product->product_name=$request->product_name;
        $product->category_name=$request->category_name;
        $product->brand_name=$request->brand_name;
        $product->product_description=$request->product_description;
        $product->product_price=$request->product_price;
        if ($request->file('product_image')){
            unlink($product->product_image);
            $product->product_image=$this->saveImage($request);
            $product->save();
        }
        else{
            $product->save();
        }
        return redirect('manage-product');
    }

    public function productDelete(Request $request){
        $product=Product::find($request->product_id);
        $product->delete();
        return back();

    }

}
