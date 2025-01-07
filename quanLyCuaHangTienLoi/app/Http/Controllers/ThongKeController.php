<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function index(){
        return view('thongke.index');
    }

    public function tieudungkh(){
        $tieudungkhs = DB::select('select * from v_khachHangTieuDung');
        return view('thongke.khachhangmuagi', compact('tieudungkhs'));
    }

    public function doanhthumh(){
        $doanhthumhs = DB::select("select * from v_ThongKeMatHang order by 'Doanh thu' DESC");
        return view('thongke.doanhthumoimathang', compact('doanhthumhs'));
    }
}
