<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Slide;
class SlideController extends Controller
{
    //
    public function getDanhSach()
    {
        $slide =Slide::all();
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
    public function getThem()
    {
        return view('admin.slide.them');
    }

    public function postThem(Request $request)
    {
        $this->validate($request,[
            'link'=>'required|unique:slide,link'
        ],
        [
            'link.required'=>'Bạn chưa nhập link'
        ]);
        
        $slide = new Slide();
        $slide->link = $request->link;
        $slide->Hinh = $request->Hinh;
        if($request->hasFile('Hinh'))
        {
            $file = $request->file('Hinh');
            //check dinh dang img
           $duoi = $file->getClientOriginalExtension();
        if($duoi  != 'jpg' && $duoi !='png')
                {
             return redirect('admin/slide/them')->with('loi','bạn chỉ được chọn file jpg, png');
             }
            $name=$file->getClientOriginalName();
            //radom ki tu de khong trung
         $Hinh = Str::random()."_". $name;
            echo $Hinh;
           while(file_exists("upload/slide/".$Hinh))
           {
           $Hinh = str::random(4)."_".$name;
            }
           // unlink("upload/slide/".$slide->Hinh);
           $file->move("upload/slide/".$Hinh);
           $slide->Hinh= $Hinh;
        }
        
        
        
        $slide->save();

        return redirect('admin/slide/them')->with('thongbao','Bạn thêm thành công');
    }

    public function getSua($id)
    {
        $slide= Slide::find($id);
        return view('admin.slide.sua',['slide'=>$slide]);
    }
    public function postSua(Request $request,$id)
    {
        $this->validate($request,[
            'link'=>'required'
            
        ],[
            'link.required'=>'bạn chưa nhập tên'
            
        ]);
        $slide = Slide::find($id);
       
        if($request->has('link'))
            $slide->link = $request->link;

            if($request->hasFile('Hinh'))
            {
                $file = $request->file('Hinh');
                //check dinh dang img
               $duoi = $file->getClientOriginalExtension();
            if($duoi  != 'jpg' && $duoi !='png')
                    {
                 return redirect('admin/slide/them')->with('loi','bạn chỉ được chọn file jpg, png');
                 }
                $name=$file->getClientOriginalName();
                //radom ki tu de khong trung
             $Hinh = Str::random(4)."_". $name;
                echo $Hinh;
               while(file_exists("upload/slide".$Hinh))
               {
               $Hinh = Str::random(4)."_".$name;
                }
                unlink("upload/slide/".$slide->Hinh);
               $file->move("upload/slide".$Hinh);
               $slide->Hinh= $Hinh;
            }
           // else
            //{
             //   $slide->Hinh ="";   
            // }
             $slide->save();
             return redirect('admin/slide/sua/'.$id)->with('thongbao','Sửa thành công');
    }


    public function getXoa($id)
    {
        $slide = Slide::find($id);
        if ($slide != null)
            {
            $slide->delete();
            }
            
            return redirect('admin/slide/danhsach')->with('thongbao','Xóa thành công');
    }
}
