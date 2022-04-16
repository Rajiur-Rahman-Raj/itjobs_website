<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use App\JobCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function jobCategoryPage(){
        $categories = JobCategory::all();
        return view('backend.category',compact('categories'));
    }
    public function addNewCategory(Request $request){
        JobCategory::insert([
            'category_name' => $request->category_name,
            'created_at'    => Carbon::now(),
        ]);
        Toastr::success('Category Added Successfully', 'Success');
        return redirect()->back();
    }
    public function deleteJobCategory($id){
        JobCategory::where('id',$id)->delete();
        Toastr::error('Category Deleted', 'Success');
        return redirect()->back();
    }
    public function getDataForModel($id){
        $product = JobCategory::where('id',$id)->first();
        return response()->json($product);
    }
}
