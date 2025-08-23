<?php

namespace App\Http\Controllers;

use App\Models\Lophoc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LophocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // lay role giao vien
   

    $giaoviens = \App\Models\User::where('role', 'teacher')->get(); 
        return view('lophocs.create', compact('giaoviens')); // Trả về view để tạo lớp học
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'ten_lop' => 'required|string|max:255',
        ]);

        Lophoc::create([
            'ten_lop' => $request->ten_lop,
            'mota' => $request->mota,
        ]);


        return redirect()->route('adminhomes.taikhoansv')->with('success', 'Lớp học đã được tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lophoc $lophoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lophoc $lophoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lophoc $lophoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lophoc $lophoc)
    {
        //
    }
}
