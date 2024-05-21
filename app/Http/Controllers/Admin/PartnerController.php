<?php

namespace App\Http\Controllers\Admin;


use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PartnerModel;


class PartnerController extends Controller
{
   
    public function list()
    { 
        $data['getRecord']=PartnerModel::getRecord();
        $data['header_title']='partner';
        return view('admin.partner.list',$data);
    }

    public function add()
    {
       
        $data['header_title']='Add New partner';
        return view('admin.partner.add',$data);
    }

    public function insert(Request $request)
    {
    
       
        $brand = new PartnerModel;
     
        $brand->button_link = trim($request->button_link);
        $brand->status =trim($request->status);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/partner');
            $image->move($destinationPath, $imageName);
            $brand->image = $imageName;
        }
        $brand->save();
        Alert::success('Success', 'partner created');
        return redirect('admin/partner/list');
    }
    public function edit($id)
    {
       $data['getRecord']= PartnerModel::getSingle($id);
        $data['header_title']='Edit partner';
        return view('admin.partner.edit',$data);
    }
    
    public function update($id,Request $request)
    {
    
       
        $brand = PartnerModel::getSingle($id);
       
        $brand->button_link = trim($request->button_link);
        $brand->status =trim($request->status);
      if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/partner');
            $image->move($destinationPath, $imageName);
            $brand->image = $imageName;
        }
        $brand->save();
        Alert::success('Success', 'partner updated');
        return redirect('admin/partner/list');
    }
    
    
    public function delete($id)
    {
      
        $brand = PartnerModel::getSingle($id);
        $brand->is_delete = 1;
        $brand->save();
    
        Alert::success('Success', 'partner Deleted');
        return redirect('admin/partner/list');
    
    }

}
