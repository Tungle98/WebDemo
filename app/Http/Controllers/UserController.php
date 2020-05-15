<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
{
    //
    public function getDanhsach()
    {
        $user = User::all();
        return view('admin.user.danhsach',['user'=>$user]);
    }

    //function them
    public function getThem()
    {
        $user = User::all();
        return view('admin/user/them');
    }
    public  function postThem(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|max:8|min:3',

        ],
        [
            'name.required'=>'Bạn chưa nhập tên',
            'email.required'=>'Bạn chưa nhập mail',
            'email.email'=>'Sai định dạng email',
            'password.required'=>'Chưa nhập mật khẩu',

        ]);
        $user  =  new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->Phone = $request->Phone;
        $user->DiaChi = $request->DiaChi;

        $user->save();
        return redirect('admin/user/them')->with('thongbao','Thêm thành công người dùng');
    }
    //function sua
    public function getSua()
    {  $user = User::all();
        return view('admin.user.sua',['user'=>$user]);
    }
    public function postSua(Request $request,$id)
    {
        $user = User::find($id);
        $this->validate($request,
        [],
        []);
    }

    //function dang nhập
    public function getDangnhapAdmin()
    {
        return view('admin.login');
    }
    public function postDangnhapAdmin(Request $request)
    {
       $this->validate($request,[
            'email'=>'required',
            'password'=>'required|max:10|min:6'
       ],
       [
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Nhập sai định dạng email',
            'password.required'=>'Chưa nhập mật khẩu',
            'password.max'=>'Mật khẩu quá số kí tự',
            'password.min'=>'Mật khẩu quá ngắn'
       ]);
         if( Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/product/danhsach')->with('thongbao','Đăng nhập thành công');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập thất bại');
        }
    }
    public function getDangxuat()
    {
        Auth::logout();
        return redirect('admin/dangnhap')->with('thongbao','Đăng xuất thành công');

    }
}
