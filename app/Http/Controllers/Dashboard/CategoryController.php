<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
// use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    function index() {
        if (Category::where('is_deleted', 0)->get()){

            $categories = Category::where('is_deleted', 0)->get();

            foreach ($categories as $key => $category) { 
                $newProducts = DB::table('new_products')
                ->where('category_id', $category->id)
                ->get()
                ->count();
                if ($newProducts > 0) {
                    $category->new_items = $newProducts;
                    $categories[$key] = $category;
                }else {
                    $category->new_items = 0;
                    $categories[$key] = $category;
                }
            }

            return $categories;
        }
    }
    ////////////////////////////////////////////////

    public function show()
    {
        $categories = Category::all();
        // return  $categories;
        return view('dashboard.category.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.category.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

            $request->validate([
                'name' => 'required',
                'image' => 'image|required',
            ]);

            $request_data = $request->except(['image']);

            if ($request->image) {

                Image::make($request->image)
                    ->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->save(public_path('icons/' . $request->image->hashName()));

                $request_data['image'] = $request->image->hashName();

            }//end of if

            $maincategory = Category::create($request_data);

            // Toastr::success('تم الاضافه بنجاح', 'success');


            return redirect()->route('category');
    }//end of store

    public function edit(Request $request, $id)
    {
        $categories = Category::selection()->find($id);
        // return $categories;
        return view('dashboard.category.edit', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        // return $request ;
        $request->validate([
            'name' => 'required',
            'image' => 'image|required',
        ]);

        $request_data = $request->except(['image','_token']);

        if ($request->image)
        {
            if ($request->image != '')
            {
                Storage::disk('public_uploads')->delete('icons/'. $request->image);
            }//end of inner if
            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('icons/'.$request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }//end of external if

        Category::where('id',$id)->update($request_data);

        // Toastr::success('تم التحديث بنجاح', 'success');

        return redirect()->route('category');
    }

    public function destroy($id)
    {
        
        $category = Category::find($id);
        $category->delete();


        // Toastr::success('تم الحذف بنجاح', 'success');

        return redirect()->route('category');
    }


}

