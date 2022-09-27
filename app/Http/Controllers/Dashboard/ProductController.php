<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Properties;
use App\Models\ProductProperty;
use App\Models\ProductImage;
use App\Models\ProductOption;
use App\Models\SimilerProduct;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Brian2694\Toastr\Facades\Toastr;
use Facade\FlareClient\Stacktrace\File;

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

    public function bestSeller() {
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

    public function latest() {
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

        $newProduct = DB::table('new_products')
        ->where('product_id', $product->id)
        ->get()->first();
        if ($newProduct) {
            $product-> is_new = 1;
        }

        return $product;
    }
    // new methods
    function show() {
        $products= Product::all();
        foreach ($products as $key => $product) {
            $category = Category::find($product->category_id);
            $product->category = $category->name;
            $products[$key] = $product;
        }
        foreach ($products as $key => $pro) {
            $category = Category::find($pro->category_id);
            $pro->category = $category->name;
            $pro[$key] = $pro;
        }
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
            Toastr::success('تم اضافة المنتج', 'success');
             return redirect('/product')->with('success', 'successfully saved');
        }else{
        return back()->with('fail',' Something Wrong ..!');
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
        if($data)
        {


        Toastr::success('تمت  تعديل المنتج ', 'success');
        return redirect('/product');
    }
        ;

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
    public function done(Request $request)
    {
        return "Wellcome";
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
              ->save(public_path('storage/img/' . $request->image->hashName()));

          $request_data['image'] = $request->image->hashName();
      }//end of if
      $request_data['product_id'] = $id;
      $request_data['image'] = 'img/'.$request_data['image'];
      $image = ProductImage::create($request_data);
      if ($image) {
        //   Toastr::success('تم الاضافه بنجاح', 'success');
      } else {
        //   Toastr::success('لم يتم اضافه الصوره', 'error');
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

    public function details($id)
    {
        $product= Product::find($id);
        if ( $product) {
            $category = Category::find($product->category_id);
            $product->category = $category->name;
        }
            $similerProducts=Product::with(['simlier'=>function($q){
        }])->find($id);

        foreach ($similerProducts->simlier as $key => $similer) {
            # code...
            $similerProducts->simlier[$key]->product = Product::find($similer->similar_product_id);
        }
        $product->proparities =  $this->productProparities($id);
        $products = Product::with(['images'])->find($id);
        $images = $product->images;
        $sim= Product::all();
        $alloption= Product::all();
        $options=Product::with(['option'=>function($q){
        }])->find($id);
        foreach ($options->option as $key => $optiion) {
            # code...
            $options->option[$key]->product = Product::find($optiion->product_id);
        }
        return view('dashboard.products.details',compact('sim','product','products','images','similerProducts','alloption','options'));

    }
    function productSimiler($id) {
            return DB::table('similar_products')
            ->join('products', 'products.id', '=', 'similar_products.similar_product_id')
            ->where('product_id', $id)
            ->get();
    }

    public function deleteSimilerProduct($id)
    {
        $data = SimilerProduct::find($id);
        $data->delete();
        Toastr::success('تم حذف المنتج..!', 'fail');
                return redirect()->back();
    }
    public function Crate_Silmiler(Request $request){

        $data = new SimilerProduct();
        $data->status = $request->status;
        $data->similar_product_id = $request->similar_product_id;
        $data->product_id = $request->product_id;
         $data->save();
        if($data){
            Toastr::success('تمت اضافة المنتج المشابه ', 'success');
            return redirect()->back();
        }
        else{
            Toastr::success('خطأ..!', 'fail');
            return redirect()->back();
        }
    }
    public function productoption(Request $request){
        $data = new ProductOption();
        $imageName = ''.time().'.'.$request->image->extension();
        $request->image->move(public_path('storage/option/'), $imageName);
        $imagePath = 'option/'.$imageName;
        $data->image=$imagePath;
        $data->name = $request->name;
        $data->product_id = $request->product_id;
         $data->save();
        if($data){
            Toastr::success('تمت اضافة خيارات المنتج ', 'success');
            return redirect()->back();
        }
        else{
            Toastr::success('خطأ..!', 'fail');
            return redirect()->back();
        }

    }
    public function deleteOptionProduct($id)
    {

    $data = ProductOption::find($id);
    $data->delete();
    Storage::delete(public_path('storage/option/'));
    Toastr::success('تم حذف المنتج..!', 'fail');
            return redirect()->back();
    }

        public function new (){

            return view('dashboard.products.new');
        }

}
