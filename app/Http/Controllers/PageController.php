<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductDetail;
use App\Cart;
use App\Customer;
use App\Order;
use App\OrderDetail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Hash;


class PageController extends Controller
{
    //
    public function getIndex()
    {
        $slide = Slide::all();

        $new_product = Product::where('New',1)->paginate(4);

        $sanpham_km = Product::where('GiaKM','<>',0)->paginate(4);
       // return view('pages.trangchu',['slide'=>$slide]);
       return view('pages.trangchu',compact('slide','new_product','sanpham_km'));
    }

    public function getLoaisp($type)
    {
        $sp_theoloai = Product::where('idType',$type)->get();
        $sp_khac = Product::where('idType','<>',$type)->paginate(3);
        $loai =ProductDetail::all();
        $loai_sp = ProductDetail::where('id',$type)->first();
        return view('pages.loaisanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }

    public function getChitietsp(Request $request)
    {
        $sanpham = Product::where('id',$request->id)->first();
        $sp_tuongtu = Product::where('idType',$sanpham->idType)->paginate(3);
        return view('pages.chitietsp',compact('sanpham','sp_tuongtu'));
    }

    public function getLienhe()
    {
        return view('pages.lienhe');
    }

    public function getGioithieu()
    {
        return view('pages.gioithieu');
    }

    public function getAddtoCart(Request $request,$id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);

        return redirect()->back();
    }

    public function getDeleteCart($id)
    {
        $oldCart =  Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
            {
                Session::put('cart',$cart);
            }
        else
            {
                Session::forget('cart');
            }
        

        return redirect()->back();

    }

    public function getCheckout()
    {
        return view('pages.dathang');
    }
    public function postCheckout(Request $request)
    {
        $cart = Session::get('cart');

        $customer = new Customer;
        $customer->Name = $request->Name;
        $customer->GioiTinh = $request->GioiTinh;
        $customer->email= $request->email;
        $customer->DiaChi = $request->DiaChi;
        $customer->SDT = $request->SDT;
        $customer->GhiChu =$request->GhiChu;
        $customer->save();

        $order = new Order;
        $order->idCustomer = $customer->id;
        $order->NgayDat= date('y-m-d');
        $order->ThanhToan=$request->ThanhToan;
        $order->TongTien=$cart->totalPrice;
        $order->GhiChu = $request->GhiChu;
        $order->save();

        foreach($cart->items as $key => $value)
        {
            $order_detail = new OrderDetail;
            $order_detail->idOrder=$order->id;
            $order_detail->idProduct=  $key;
            $order_detail->quantity = $value['qty'];
            $order_detail->DonViGia= ($value['price']/$value['qty']);
            $order_detail->save();
            $request->session()->put('cart',$cart);

        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','dat hang thanh cong');
        
    }
    //function dang nhap
    public function getLogin()
    {
        return view('pages.login');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required|unique:users,email,password',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Ban chua nhap email',
            'email.email'=>'Ban nhap sai dinh dang mail',
            'password.required'=>'Ban chua nhap mat khau',
            'password.min'=>'mat khau it nhat 3 ki tu',
            'password.max'=>'mat khau nhieu nhat 20 ki tu'
        ]);
        $email = $request->input('email');
		$password = $request->input('password');
        if(Auth::attempt(['email'=> $request->email,'password'=>$request->password]))
        {
            return redirect('pages/trangchu')->with(['flag'=>'success','message'=>'Dang nhap thanh cong']);;
        }
        else
        {
            return redirect('pages.login')->with(['flag'=>'success','message'=>'Dang nhap khong thanh cong']);
        }
       
    }

    //function dangki
    public function getDangki()
    {
        return view('pages.dangki');
    }

    public function postDangki(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'name'=>'required',
            're_password'=>'required|same:password'
        ],
        [
            'email.required'=>'Ban chua nhap email',
            'email.email'=>'khong dung email',
            'email.unique'=>'Email da co nguoi su dung',
            'password.required'=>'',
            'password.min'=>'Mat khau phai co it nhat 6 ki tu',
            'password.max'=>'Mat khau nhieu nhat 20 ki tu',
            're_password.same'=>'mat khau  nhap lai khong giong',
            'name.required'=>'ban chua nhap ten',

        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->password);
        $user->Phone = $request->Phone;
        $user->DiaChi= $request->DiaChi;

        $user->save();
        return redirect()->back()->with('thongbao','Tao tai khoan thanh cong');
    }

  public  function getDangxuat()
    {
        Auth::logout();
        return redirect('pages.login');
    }

  public  function getSearch(Request $request)
  {
      $product = Product::where('name','like','%'.$request->key.'%')->orWhere('DonViGia',$request->key)->get();

      return view('pages.search',compact('product'));
  }

}
