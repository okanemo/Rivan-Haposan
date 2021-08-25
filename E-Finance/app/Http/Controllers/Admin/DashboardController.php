<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\DataRecord;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (Request $request){
        return view ('pages.admin.dashboard',[
            'category' => Category::count(),
            'sub_category' => SubCategory::count(),
            'data_record' => DataRecord::count()
        ]);
    }
}
