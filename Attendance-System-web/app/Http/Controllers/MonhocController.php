<?php

namespace App\Http\Controllers;

use App\Models\Monhoc;
use Illuminate\Http\Request;

class MonhocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('monhocs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'tenmon' => 'required|string|max:255|unique:monhocs', // Validate subject name
            'mota' => 'nullable|string|max:1000',
        ]);

        Monhoc::create([
         
            'tenmon' => $request->tenmon,
            'mota' => $request->mota,
   
        ]);
        return redirect()->route('adminhomes.monhoc_lophp')->with('success', 'Môn học đã được tạo thành công.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Monhoc $monhoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Monhoc $monhoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Monhoc $monhoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Monhoc $monhoc)
    {
        //
    }
}
