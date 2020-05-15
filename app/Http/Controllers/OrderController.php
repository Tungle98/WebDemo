<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use Illuminate\Support\Facades\Redirect;
class OrderController extends Controller
{
    //
    public function getDanhSach()
    {  
        $order = Order::all();
        return view('admin.order.danhsach',['order'=> $order]);
    }

    public function getSua($id)
    {
        $order = Order::find($id);
        return view('admin.order.sua',['order'=>$order]);
    }
    public function postSua(Request $request, $id)
    {

    }
    

    public function getXoa($id)
    {
        $order = Order::find($id);
        if ($order != null)
            {
            $order->delete();
            }
            
        return view('admin/order/danhsach')->with('thongbao','Xóa thành công');;
    }
 
}
