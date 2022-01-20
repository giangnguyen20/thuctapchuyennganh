<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\info;
use Illuminate\Support\Facades\DB;
session_start();

class EditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listID = info::paginate(10);

        return view('home')->with('listid', $listID);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layoutquanly.addid');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new info;
        $check = DB::table('info')->where('tenkh', '=', $request->tenkh)->orWhere('phonenumber', '=', $request->sdt)->orwhere('idteamview', '=', $request->idteam)->first();
        
        if ($check != null){
            session()->flash('success', 'Thông tin vừa tạo đã tồn tại!');

            return redirect()->route('edit.create');
        } 
        else {
            $new->tenkh = $request->tenkh;
            $new->diachi = $request->diachi;
            $new->phonenumber = $request->sdt;
            $new->idteamview = $request->idteam;
            $new->password = $request->pass;

            $new->save();
            
            session()->flash('success', 'Thêm thành công!');

            return redirect()->route('edit.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info_kh = DB::table('info')->where('id', '=', $id)->get();

        return view('layoutquanly.editform')->with('info', $info_kh);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = info::find($id);

        $checkdata = DB::table('info')->where('tenkh', '=', $request->tenkh)->orWhere('phonenumber', '=', $request->sdt)->orwhere('idteamview', '=', $request->idteam)->first();
        
        if($checkdata == null){
            $data->tenkh = $request->tenkh;
            $data->diachi = $request->diachi;
            $data->phonenumber = $request->sdt;
            $data->idteamview = $request->idteam;
            $data->password = $request->pass;
    
            $data->save(); 
            session()->flash('success', 'chỉnh sửa thành công');
        }
        else{
            session()->flash('success', 'thông tin chỉnh sửa đã tồn tại');
        }

        return redirect()->route('edit.edit', $data->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        info::find($id)->delete();

        return redirect()->action('HomeController@show_edit');
    }
}
