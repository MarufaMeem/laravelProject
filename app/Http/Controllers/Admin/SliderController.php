<?php

namespace App\Http\Controllers\Admin;


use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SliderModel;
use Auth;

class SliderController extends Controller
{
    public function list()
    { 
        $data['getRecord']=SliderModel::getRecord();
        $data['header_title']='slider';
        return view('admin.slider.list',$data);
    }

    public function add()
    {
       
        $data['header_title']='Add New slider';
        return view('admin.slider.add',$data);
    }

    public function insert(Request $request)
    {
    
       
        $brand = new SliderModel;
        $brand->title = trim($request->title);
        $brand->button_name = trim($request->button_name);
        $brand->button_link = trim($request->button_link);
        $brand->status =trim($request->status);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/slider');
            $image->move($destinationPath, $imageName);
            $brand->image = $imageName;
        }
        $brand->save();
        Alert::success('Success', 'SLider created');
        return redirect('admin/slider/list');
    }
    public function edit($id)
    {
       $data['getRecord']= SliderModel::getSingle($id);
        $data['header_title']='Edit Slider';
        return view('admin.slider.edit',$data);
    }
    
    public function update($id,Request $request)
    {
    
       
        $brand = SliderModel::getSingle($id);
        $brand->title = trim($request->title);
        $brand->button_name = trim($request->button_name);
        $brand->button_link = trim($request->button_link);
        $brand->status =trim($request->status);
      if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/slider');
            $image->move($destinationPath, $imageName);
            $brand->image = $imageName;
        }
        $brand->save();
        Alert::success('Success', 'Slider updated');
        return redirect('admin/slider/list');
    }
    
    
    public function delete($id)
    {
      
        $brand = SliderModel::getSingle($id);
        $brand->is_delete = 1;
        $brand->save();
    
        Alert::success('Success', 'Slider Deleted');
        return redirect('admin/slider/list');
    
    }
}
