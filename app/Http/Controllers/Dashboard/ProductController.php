<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;

class ProductController extends Controller
{

    function create() {

        $categories = Category::all();
        return view('dashboard.products.create',compact('categories'));
    }

    public function save(Request $request){

        $validateData=$request->validate([
            'quantity'=>'required:products',
            'name'=>'required',
            'details'=>'required',
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

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

               return redirect()->route('products')->with('status','Product Insert Successfully');

         }else{

            return back()->with('fail', ' Something Wrong ..!');

         }



    }
    // edit
// Update Product
//
public function done($id)
{
    return "Wellcome";
}


 public function edit($id)
    {
        $data = Product::find($id);
        $categories = Category::all();
        return view('dashboard.products.update', compact('data', 'categories'));
    }

// end
public function update(Request $request,$id)
{
    $data = Product::find($id);
    $data->name = $request->input('name');
    $data->category_id = $request->input('category_id');
    $data->code = $request->input('code');
    $data->quantity = $request->input('quantity');
    $data->details = $request->input('details');
    if($request->hasFile('image')){

        $imageName = ''.time().'.'.$request->image->extension();
        $request->image->move(public_path('img/'), $imageName);
         $imagePath = 'img/'.$imageName;
         $data->image=$imagePath;


        // $file=$request->file('image');
        // $imageName= $file->getClientOriginalExtension();
        // $imageName = ''.time().'.'.$request->image->extension();
        //  $request->image->move(public_path('storage/img/'), $imageName);
        // $data->image = $imageName;
    }

    $data->update();

    return redirect()->back()->with('status','Product Updated Successfully');

}


// End Update Product


    //add Catogires

    // properties


    function show() {
        $blog= Product::all();
        $categories = Category::all();
        return view('dashboard.products.show',compact('blog','categories'));
    }

    //
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
        $images = DB::table('product_images')
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

      // end of add Cato
      public function destroy($id)
      {
          $blogs = Product::find($id);
          $blogs->delete();
          return back()->with('error','Product Deleted Successfully');
      }

      public function images(Request $request, $id)
      {
          $product = Product::with(['images'])->find($id);
          $images = $product->images;

          return view('dashboard.products.images', compact('product','images'));
      }

      public function imagestore(Request $request, $id)
      {
        // return $request;
        $request->validate([
            'image' => 'image|required',
        ]);
        $request_data = $request->except(['_token']);
        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('img/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if
        $request_data['product_id'] = $id;
        $request_data['image'] = 'img/'.$request_data['image'];
        $image = ProductImage::create($request_data);
        if ($image) {
            Toastr::success('تم الاضافه بنجاح', 'success');
        } else {
            Toastr::success('لم يتم اضافه الصوره', 'error');
        }
        return redirect()->back();


      }

      public function imagedelete(Request $request, $id)
      {
        $images = ProductImage::find($id);
        $images->delete();

        Toastr::success('تم حذف الصوره', 'success');
        return redirect()->back();
      }


















}
