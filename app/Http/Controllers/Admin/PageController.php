<?php

namespace App\Http\Controllers\Admin;
use App\Models\PageModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PageController extends Controller
{
    public function list()
    { 
        $data['getRecord']=PageModel::getRecord();
        $data['header_title']='Page';
        return view('page.list',$data);
    }

    public function edit($id)
    {
       $data['getRecord']= PageModel::getSingle($id);
        $data['header_title']='Edit Page';
        return view('page.edit',$data);
    }
    
    public function update($id,Request $request)
    {
    
        
        $brand = PageModel::getSingle($id);
        $brand->name = trim($request->name);
        $brand->slug = trim($request->slug);
        $brand->title =trim($request->title);
        $brand->description = trim($request->description); 
        $brand->meta_title =trim($request->meta_title);
        $brand->meta_description = trim($request->meta_description);
        $brand->meta_keywords = trim($request->meta_keywords);
       

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $imageNames = [];
    
            foreach($images as $image) {
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/page'); // public/uploads/photos
                $image->move($destinationPath, $imageName);
                $brand->image = $imageName;
            }
            
         
        }


        $brand->save();
        Alert::success('Success', 'Page updated');
        return redirect('admin/page/list');
    }

}
