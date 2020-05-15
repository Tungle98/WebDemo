<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetail;

class OrderDetailController extends Controller
{
    //
   public function getDanhsach()
   {
       $odct = OrderDetail::all();
       return view('admin.orderDetail.danhsach',['odct'=>$odct]);
   }

   public function getSua($id)
   {
       $odct = OrderDetail::find($id);
       return view('admin.orderDetail.sua',['odct'=>$odct]);
   }

   public function postSua(Request $request,$id)
   {
    $odct = OrderDetail::find($id);
    $this->validate($request,
        [
            'quantity'=>'required|unique:OrderDetail,quantity'
        ],
        [
            //bat loi
            'quantity.required'=>'bạn chua nhập tên ',
            'quantity.unique'=>'Tên thể loại đã tồn tại',
           
        ]
        );
        $odct->idOrder= $request->idOrder;
        $odct->idProduct=$request->idProduct;
        $odct->quantity = $request->quantity;
        $odct->DonViGia=$request->DonViGia;
        $odct->save();

        return redirect('admin/orderDetail/sua/'.$id)->with('thongbao','Sửa thành công');
    }   
    public function getXoa($id)
   {
    $odct = OrderDetail::find($id)->delete();
    

    return redirect('admin/orderDetail/danhsach')->with('thongbbao','Xóa thành công');
   }
}
