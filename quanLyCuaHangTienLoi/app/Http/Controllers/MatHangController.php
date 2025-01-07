<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MatHang;
use App\Models\LoaiHang;

class MatHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nmathang = MatHang::with('loaihang')->get();

        return view('mathang.index', compact('nmathang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nloaihang = LoaiHang::all();
        return view('mathang.create', compact('nloaihang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $mamh = $request->input('mamh');
       $tenmh = $request->input('tenmh');
       $malh = $request->input('malh');
       $dongia = $request->input('dongia');
       $soluong = $request->input('soluong');
       $gianhap = $request->input('gianhap');
       
       DB::statement('exec p_InsertMatHang @mamh = ?, @tenmh = ?, @malh = ?, @dongia = ?, @soluong = ?, @gianhap = ?', 
                    [$mamh, $tenmh, $malh, $dongia, $soluong, $gianhap]);

        return redirect()->route('nmathang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mathang = MatHang::findOrFail($id);
        $nloaihang = LoaiHang::all();

        return view('mathang.edit', compact('mathang', 'nloaihang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mamh = $request->input('mamh');
        $tenmh = $request->input('tenmh');
        $malh = $request->input('malh');
        $dongia = $request->input('dongia');
        $soluong = $request->input('soluong');
        $gianhap = $request->input('gianhap');
        
        DB::statement('exec p_UpdateMatHang @mamh = ?, @tenmh = ?, @malh = ?, @dongia = ?, @soluongtrongkho = ?, @gianhap = ?', 
                        [$mamh, $tenmh, $malh, $dongia, $soluong, $gianhap]);

        return redirect()->route('nmathang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::statement('exec p_DeleteMatHang @mamh = ?', [$id]);
        return redirect()->route('nmathang.index');
    }
}
