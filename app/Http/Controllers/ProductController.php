<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Product;
use App\ProductDetail;
class ProductController extends Controller
{

    public function getDanhSach()
    {
        $product = Product::all();
       
        return view('admin.product.danhsach',['product'=>$product]);
    }

    public function getThem()
    {   
        $product  = Product::all();
        $producttype = ProductDetail::all();
        return view('admin.product.them',['product'=>$product ,'producttype'=>$producttype]);
    }
    public function postThem(Request $request)
    {
         $this->validate($request,[
          
            'Name' =>'required',
            'DonViGia'=>'required',
            'GiaKM'=>'required',
            'MoTa'=>'required',
            'DonVi'=>'required',
            'New'=>'required'

        ],
        [
            //'ProductDetail.required'=>'Ban chưa nhập loại sản phẩm',
            'Name.required'=>'Bạn chưa nhập tên sản phẩm',
            'DonViGia.required'=>'Bạn chưa nhập đơn vị giá',
            'GiaKM.required'=>'Bạn chưa nhập giá khuyến mãi',
            'MoTa.required'=>'Bạn chưa nhập mô tả',
            'DonVi.required'=>'Bạn chưa nhập đơn vi',
            'New.required'=>'Bạn chưa nhập trạng thái sản phẩm',
        ]);
        $product = new Product();
        $product->Name = $request->Name;
        
        $product->idType=$request->ProductDetail;
        $product->DonViGia= $request->DonViGia;
        $product->GiaKM=$request->GiaKM;
        $product->MoTa = $request->MoTa;
        $product->DonVi = $request->DonVi;
        $product->New= $request->New;
        //check upload img
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            //check dinh dang img
           $duoi = $file->getClientOriginalExtension();
        if($duoi  != 'jpg' && $duoi !='png')
                {
             return redirect('admin/product/them')->with('loi','bạn chỉ được chọn file jpg, png');
             }
            $name=$file->getClientOriginalName();
            //radom ki tu de khong trung
            $Hinh = Str::random()."_". $name;
            echo $Hinh;
           while(file_exists("upload/product".$Hinh))
           {
           $Hinh = Str::random(4)."_".$name;
            }
           $file->move("upload/product".$Hinh);
           $product->Hinh= $Hinh;
        }
        else
        {
            $product->Hinh ="";   
         }
     
        $product->save();
        return redirect('admin/product/them')->with('thongbao','Thêm thành công');
    }


    public function getSua($id)
    {   $producttype = ProductDetail::all();
        $product = Product::find($id);
        return view('admin.product.sua',['product'=>$product,'producttype'=>$producttype]);
    }

    public function postSua(Request $request,$id)
    {
        $product = Product::find($id);
        $this->validate($request,[
            
            'Name'=>'required|min:3|max:100|unique:Product,Name',
            
            'DonViGia'=>'required',
            'GiaKM'=>'required',
            'MoTa'=>'required',
            'DonVi'=>'required',
            'New'=>'required'

        ],
        [
            //'ProductDetail.required'=>'Ban chưa nhập loại sản phẩm',
            'Name.required'=>'Bạn chưa nhập tên sản phẩm',
            'DonViGia.required'=>'Bạn chưa nhập đơn vị giá',
            'GiaKM.required'=>'Bạn chưa nhập giá khuyến mãi',
            'MoTa.required'=>'Bạn chưa nhập mô tả',
            'DonVi.required'=>'Bạn chưa nhập đơn vi',
            'New.required'=>'Bạn chưa nhập trạng thái sản phẩm',
        ]);
      
        $product->Name = $request->Name;
        
        $product->idType=$request->ProductDetail;
        $product->DonViGia= $request->DonViGia;
        $product->GiaKM=$request->GiaKM;
        $product->MoTa = $request->MoTa;
        $product->DonVi = $request->DonVi;
     
        //check upload img
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            //check dinh dang img
           $duoi = $file->getClientOriginalExtension();
        if($duoi  != 'jpg' && $duoi !='png')
                {
             return redirect('admin/product/them')->with('loi','bạn chỉ được chọn file jpg, png');
             }
            $name=$file->getClientOriginalName();
       
        }
       
        $product->save();
        return redirect('admin/product/sua/'.$id)->with('thongbao','Sua thành công');
    }

    public function getXoa($id)
    {
        $product = Product::find($id);
        if ($product != null)
            {
            $product->delete();
            }
            
            return redirect('admin/product/danhsach')->with('thongbao','Xóa thành công');
    }
    

}
