<?php

namespace App\Http\Controllers;
use App\SideAd;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function sideAddPage(){
        $ads = SideAd::orderBy('id','desc')->paginate(10);
        return view('backend.ads.side_ad',compact('ads'));
    }
    public function addNewSideAd(Request $request){
        if ($request->hasFile('image')){

            $get_image = $request->file('image');
            $image_name = time() . str::random(5) . '.' . $get_image->getClientOriginalExtension();
            Image::make($get_image)->save('ads/' . $image_name, 100);

            SideAd::insert([
                'image'  => 'ads/' . $image_name,
                'side'   => $request->side,
                'link'   => $request->link,
                'created_at' => Carbon::now()
            ]);

            Toastr::success('New Advertise Added Successfully', 'Success');
            return back();

        }
        else{
            SideAd::insert([
                'side'   => $request->side,
                'link'   => $request->link,
                'created_at' => Carbon::now()
            ]);

            Toastr::success('New Advertise Added Successfully', 'Success');
            return back();
        }
    }
    public function deleteSideAd($id){
        $image_name = SideAd::find($id)->image;
        if($image_name != null){
            unlink($image_name);
        }
        SideAd::where('id',$id)->delete();
        Toastr::error('Successfully Deleted', 'Deleted');
        return back();
    }
}
