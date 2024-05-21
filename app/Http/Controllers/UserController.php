<?php

namespace App\Http\Controllers;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function dashboard()
    {
        $data['meta_title'] = 'dashboard';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('user.dashboard', $data);
    }
    public function orders()
    {
        $userId = Session::get('user_id');
        $data['getOrder']=OrderModel::getRecordUser($userId);
        $data['meta_title'] = 'orders';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('user.orders', $data);
    }

    public function editprofile()
    {
        $data['meta_title'] = 'editprofile';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        $userId = Session::get('user_id');
        $data['getRecord'] = User::getSingle($userId);

        return view('user.editprofile', $data);
    }

    public function updateprofile(Request $request)
    {
        $userId = Session::get('user_id');
        $user = User::find($userId);
        
        $user->name = trim($request->name);
        $user->lastname = trim($request->lastname);
        $user->email = trim($request->email);
        $user->streetaddress = trim($request->streetaddress);
        $user->town = trim($request->town);
        $user->state = trim($request->state);
        $user->postcode = trim($request->postcode);
        $user->phone = trim($request->phone);

        $user->save();

        Alert::success('Success', 'Profile updated');

        return redirect()->back();
    }
    public function changepw()
    {
        $data['meta_title'] = 'change password';
        $data['meta_description'] = '';
        $data['meta_keywords'] = '';

        return view('user.changepw', $data);
    }

    public function updatepw(Request $request)
    { $userId = Session::get('user_id');
        $user =    User::find($userId);
        if(Hash::check($request->old_password,$user->password))
        {
            if(
                $request->password == $request->cpassword)
                {
                    $user->password = Hash::make($request->password);
                    $user->save();
                    Alert::error('error', 'Password updated');
                    return redirect()->back();
                }
                else{
                    Alert::error('error', 'Password Doesnt Match');
                    return redirect()->back();
                }
        }
        else{
            Alert::error('error', 'Old password is not correct');
            return redirect()->back();
        }
    }
    
}
