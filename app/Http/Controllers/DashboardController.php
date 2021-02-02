<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DashboardController extends Controller
{
    public function index(Request $request){
        $title ='Dashboard';
        return view("admin.index",compact("title"));
    }
}
