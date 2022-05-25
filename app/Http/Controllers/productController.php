<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function index(){
        $product = Product::latest()->paginate(4);
        return view('product.index', compact('product'));
    }

    public function create(){
        return view('product.create');
    }

    public function store(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if($image){
            $image_name = date('dmy_H_s_i');
            $extension = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$extension;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['logo'] = $image_url;
        }

        Product::insert($data);
        return redirect()->route('product.index')->with('success', 'Product Created Successfully!');

    }

    public function edit($id){
        $product = Product::where('id', $id)->first();
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, $id){

        $oldlogo = $request->old_logo;

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if($image){
            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $extension = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$extension;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['logo'] = $image_url;
        }

        Product::where('id', $id)->update($data);
        return redirect()->route('product.index')->with('success', 'Product Updated Successfully!');

    }

    public function delete($id){
        $data = Product::where('id', $id)->first();
        $image = $data->logo;
        unlink($image);
        Product::where('id', $id)->delete(); 
        return redirect()->route('product.index')->with('success', 'Product Deleted Successfully!');
    }

    public function show($id){
        $data = Product::where('id', $id)->first();
        return view('product.show', compact('data'));
    }
}
