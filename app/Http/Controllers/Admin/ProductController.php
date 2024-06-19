<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Models\Category;
use App\Models\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\AddProductRequest;
use DB;

class ProductController extends Controller
{
    public function getProduct() {
        $data['productlist'] = DB::table('products')
                               ->join('categories', 'products.prod_cate', '=', 'categories.cate_id')
                               ->orderBy('prod_id', 'desc')->get();
        return view('backend.product', $data);
    }

    public function getAddProduct() {
        $data['catelist'] = Category::all();
        return view('backend.addproduct', $data);
    }

    public function postAddProduct(AddProductRequest $request) {
        // $filename = $request->img->getClientOriginalName();
        $product = new Product;
        $product->prod_name = $request->name;
        $product->prod_slug = Str::slug($request->name);
        // $product->img = $filename;

        // upload image into public/storage/images
        if($request->hasFile('img')) {
            $destination_path = 'public/images/products';
            $image = $request->file('img');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('img')->storeAs($destination_path, $image_name);

            $product->img = $image_name;
        }

        $product->price = $request->price;
        $product->description = $request->description;
        $product->prod_cate = $request->cate;
        $product->save();

        // $request->img->storeAs('avatar', $filename);
        return back();
    }

    public function getEditProduct($id) {
        $data['product'] = Product::find($id);
        $data['catelist'] = Category::all();
        return view('backend.editproduct', $data);
    }

    public function postEditProduct(AddProductRequest $request, $id) {
        $product = new Product;
        $arr['prod_name'] = $request->name;
        $arr['prod_slug'] = Str::slug($request->name);
        $arr['price'] = $request->price;
        $arr['description'] = $request->description;
        $arr['prod_cate'] = $request->cate;

        // if($request->hasFile('img')) {
        //     $img = $request->img->getClientOriginalName();
        //     $arr['img'] = $img;
        //     $request->img->storeAs('avatar',$img);
        // }

        // upload image into public/storage/images
        if($request->hasFile('img')) {
            $destination_path = 'public/images/products';
            $image = $request->file('img');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('img')->storeAs($destination_path, $image_name);

            $arr['img'] = $image_name;
        }

        $product::where('prod_id', $id)->update($arr);
        return redirect('admin/product');
    }

    public function getDeleteProduct($id) {
        Product::destroy($id);
        return back();
    }
}
