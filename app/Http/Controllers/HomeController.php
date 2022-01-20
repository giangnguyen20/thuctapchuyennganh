<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\info;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listID = info::paginate(10);

        return view('home')->with('listid', $listID);
    }

    public function show_edit(){
        $info = DB::table('info')->paginate(10);
        return view('layoutquanly.edit')->with('listid', $info);
    }
}
