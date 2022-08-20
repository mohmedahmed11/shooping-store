<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Properties;
use App\Models\ProductProperty;
class ProductController extends Controller
{

    function index($product_id) {
        $product = DB::table('products')
        ->select('products.*')
        ->where('products.id', $product_id)
        ->get();

        if ($product){
            $product = $this->prepareProductData($product);
            
            return ["status" => true, "data" => $product];
        }else {
            return ["status" => false, "data" => NULL];
        }
    }

    function productsList($category_id) {
        $products = DB::table('products')
        ->select('products.*')
        ->where('products.category_id', $category_id)
        ->get();

        if ($products){
            foreach ($products as $key => $product) {
                $products[$key] = $this->prepareProductData($product);
            }
            return $products;
        }else {
            return [];
        }
    }

    function bestSeller() {
        $products = DB::table('best_seller_products')
        ->join('products', 'products.id', '=', 'best_seller_products.product_id')
        ->select('products.*')
        ->where('best_seller_products.status', 1)
        ->get();

        

        if ($products){
            foreach ($products as $key => $product) {
                $products[$key] = $this->prepareProductData($product);
            }
            return $products;
        }else {
            return [] ;
        }
    }

    function latest() {
        $products = DB::table('latest_products')
        ->join('products', 'products.id', '=', 'latest_products.product_id')
        ->select('products.*')
        ->where('latest_products.status', 1)
        ->get();

        if ($products){
            foreach ($products as $key => $product) {
                $products[$key] = $this->prepareProductData($product);
            }
            return $products;
        }else {
            return [] ;
        }
    }

    function similarProducts($id) {
        $products = DB::table('similar_products')
        ->join('products', 'products.id', '=', 'similar_products.similar_product_id')
        ->select('products.*')
        ->where('similar_products.product_id', $id)
        ->get();

        if ($products){
            foreach ($products as $key => $product) {
                $products[$key] = $this->prepareProductData($product);
            }
            return $products;
        }else {
            return [];
        }
    }

    function prepareProductData($product) {
        $images = DB::table('images')
        ->where('product_id', $product->id)
        ->get();

        if ($images) {
            $product->images = $images;
        }else {
            $product->images = [];
        }

        $properties = DB::table('product_properties')
        ->join('properties', 'properties.id', '=', 'product_properties.property_id')
        ->where('product_id', $product->id)
        ->get();

        if ($properties) {
            $product->properties = $properties;
        }else {
            $product->properties = [];
        }

        $categories = DB::table('categories')
        ->where('id', $product->category_id)
        ->get()->first();

        $product->category = $categories;
        
        $offer = DB::table('product_offers')
        ->where('product_id', $product->id)
        ->get()->first();
        $product->offer = $offer;
        return $product;
    }


    // new methods
   
    function show() {
        $products= Product::all();
        $categories = Category::all();
        return view('dashboard.products.show',compact('products','categories'));
    }
     
    function create() {
        $categories = Category::all();
        return view('dashboard.products.create',compact('categories'));
    }

    public function save(Request $request){ 
        
        $validateData=$request->validate([
            'quantity'=>'required:products',
            'name'=>'required',
            'details'=>'required',
         ]);

        $data=new Product;
        $imageName = ''.time().'.'.$request->image->extension();  
        $request->image->move(public_path('storage/img/'), $imageName);
        $imagePath = 'img/'.$imageName;
        $data->image=$imagePath;
        $data->name=$request->name;
        $data->category_id=$request->category_id;
        $data->code=$request->code;
        $data->quantity=$request->quantity;
        $data->status=1;
        $data->price=$request->price;
        $data->details=$request->details;
        $data->save();

        if($data){
            return back()->with('status','Product Insert Successfully');
        }else{
        return back()->with('fail', ' Something Wrong ..!');
        }
    }

    public function update($id)
    {
        $data = Product::find($id);
        $categories = Category::all();
        return view('dashboard.products.update', compact('data', 'categories'));
    }

    // for save updateProduct
    public function edit(Request $request,$id)
    {
        $data = Product::find($id);
        $data->name = $request->input('name');
        $data->category_id = $request->input('category_id');
        $data->code = $request->input('code');
        $data->quantity = $request->input('quantity');
        $data->details = $request->input('details');
        if($request->hasFile('image')){

            $imageName = ''.time().'.'.$request->image->extension();  
            $request->image->move(public_path('storage/img/'), $imageName);
            $imagePath = 'img/'.$imageName;
            $data->image=$imagePath;
        }

        $data->update();

        return redirect()->back()->with('status','Product Updated Successfully');
        
    }

    //  product proPariries
    public function properites($id)
    {
        $product = Product::find($id);
        $productProparities =  $this->productProparities($id);
        $properties =  Properties::all();
        return view('dashboard.products.properites', compact('product','properties', 'productProparities'));
    }

    function carete_proparity(Request $request) {
        $data = new ProductProperty;
        $data->property_id  = $request->property_id;
        $data->product_id  = $request->product_id;
        $data->property_value  = $request->property_value;
        $result = $data->save();
        if($result){
            return back()->with('status','Product Insert Successfully');
        }else{
            return back()->with('fail', ' Something Wrong ..!');
        }
    }

    function productProparities($id) {
        return DB::table('product_properties')
        ->join('properties', 'properties.id', '=', 'product_properties.property_id')
        ->where('product_id', $id)
        ->get();
    }
        
    // end of add Cato
    public function destroy($id)
    {
    $property = Product::find($id);
    $property->delete();
    return back()->with('error','Product Deleted Successfully');
    }

    // Update Product
    // for test
    public function done($id)
    {
        return "Wellcome";
    }


   
}
