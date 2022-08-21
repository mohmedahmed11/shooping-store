<?php

namespace App\Http\Controllers\Properites;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;
class PropertiesController extends Controller
{
   
    
    function show() {

        $blog= Properties::all();
        
        return view('dashboard.Properties.showProp',compact('blog'));
    
    
    }
    
    function create() {
        $categories = Properties::all();
        return view('dashboard.Properties.create',compact('categories'));
    }

    public function save(Request $request){ 
        
        $validateData=$request->validate([
            'type'=>'required:properties',
            'name'=>'required',
            
         ]);


        $data=new Properties;
         $data->name=$request->name;
         $data->type=$request->type;
         $data->save();

         if($data){

               return back()->with('status','Properties Insert Successfully');

         }
         else
         {

            return back()->with('error', ' Something Wrong ..!');

         }


         
    }
    
// Update Properties

public function done()
{
    return "Wellcome";
}

 public function edit($id)
    
 {
    
    $data = Properties::find($id);
 
    return view('dashboard.Properties.editProperites', compact('data'));
     
}

// end

public function update(Request $request,$id)

{

    $data = Properties::find($id);
    $data->name = $request->input('name');
    $data->type = $request->input('type');

    $data->update();
    return redirect()->back()->with('status','Properties Updated Successfully');
    
}

// End Update Properties
public function destroy($id)
{
    
    $blogs = Properties::find($id);
    $blogs->delete();
    return redirect()->back()->with('error','Properties Deleted Successfully');
}

public function destrooy($id)
{
    
    $property = Properties::find($id);
    $property->delete();
    return redirect()->back()->with('error','Properties Deleted Successfully');
    
}


}
