<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LoaiHang;
use Exception;

class LoaiHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nloaihang = LoaiHang::all();
        return view('loaihang.index', compact('nloaihang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('loaihang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $malh = $request->input('malh');
        $tenlh = $request->input('tenlh');

        DB::statement('exec p_InsertLoaiHang @malh = ?, @tenlh = ?', [$malh, $tenlh]);
        return redirect()->route('nloaihang.index');
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
        $loaihang = LoaiHang::findOrFail($id);
        return view('loaihang.edit', compact('loaihang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $malh = $request->input('malh');
        $tenlh = $request->input('tenlh');

        DB::statement('exec p_UpdateLoaiHang @malh = ?, @tenlh = ?', [$malh, $tenlh]);
        return redirect()->route('nloaihang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::statement('exec p_DeleteLoaiHang @malh = ?', [$id]);
            return redirect()->route('nloaihang.index');
        }
        catch(Exception $e){
            return redirect()->route('nloaihang.index');
        }
        
    }
}
