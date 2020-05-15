<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\ProductDetail;
class ProductTypeController extends Controller
{
    //
    public  function getDanhSach()
    {
        $loaisp = ProductDetail::all();
        return view('admin.producttype.danhsach',['loaisp'=>$loaisp]);
    }
    public function getThem()
    {
        return  view('admin.producttype.them');
    }
    public function postThem(Request $request)
    {
        $loaisp =  new ProductDetail();
        $this->validate($request,[
            'Name'=>'required|unique:Product_type,Name',
          
        ],
        [
            'Name.required'=>'ban chua nhap ten loai banh'
        
        ]);
          //check upload img
          if($request->hasFile('Hinh'))
          {
              $file = $request->file('Hinh');
              //check dinh dang img
             $duoi = $file->getClientOriginalExtension();
          if($duoi  != 'jpg' && $duoi !='png')
                  {
               return redirect('admin/producttype/them')->with('loi','bạn chỉ được chọn file jpg, png');
               }
              $name=$file->getClientOriginalName();
              //radom ki tu de khong trung
           $Hinh = Str::random()."_". $name;
              echo $Hinh;
             while(file_exists("upload/producttype".$Hinh))
             {
             $Hinh = Str::random(4)."_".$name;
              }
             $file->move("upload/producttype".$Hinh);
             $loaisp->Hinh= $Hinh;
          }
          else
          {
              $loaisp->Hinh ="";   
           }
       
        $loaisp->Name = $request->Name;
        $loaisp->MoTa = $request->MoTa;
        $loaisp->Hinh= $request->Hinh;

        $loaisp->save();
        return redirect('admin/producttype/them')->with('thongbao','Thêm thành công');
    }


    public function getXoa($id)
    {
        $loaisp = ProductDetail::find($id);

        if($loaisp != null)
        {
            $loaisp->delete();
        }

        return redirect('admin/producttype/danhsach')->with('thongbao','Xóa thành công');
    }

    public function getSua($id)
    {   $loaisp = ProductDetail::find($id);
     
        return view('admin.producttype.sua',['loaisp'=>$loaisp]);
    }

    public function postSua(Request $request,$id)
    {
        $loaisp = ProductDetail::find($id);
        $this->validate($request,[
            
            'Name'=>'required|min:3|max:100|unique:product_type,Name',
            
            
            'MoTa'=>'required|min:3|max:100|unique:product_type,MoTa'

        ],
        [
            //'ProductDetail.required'=>'Ban chưa nhập loại sản phẩm',
            'Name.required'=>'Bạn chưa nhập tên sản phẩm',
            
            'MoTa.required'=>'Bạn chưa nhập mô tả',
            
        ]);
      
        $loaisp->Name = $request->Name;
        
       
        $loaisp->MoTa = $request->MoTa;
        
     
        //check upload img
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            //check dinh dang img
           $duoi = $file->getClientOriginalExtension();
        if($duoi  != 'jpg' && $duoi !='png')
                {
             return redirect('admin/producttype/them')->with('loi','bạn chỉ được chọn file jpg, png');
             }
            $name=$file->getClientOriginalName();
       
        }
       
        $loaisp->save();
        return redirect('admin/producttype/sua/'.$id)->with('thongbao','Sua thành công');
    }

}
